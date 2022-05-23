<?php

namespace Tests\Unit;


use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Profile;
use GuzzleHttp\Promise\Create;
use Illuminate\Contracts\Cookie\Factory;
use Illuminate\Support\Facades\Auth;
use tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
  public function test_login_form(){
      $response = $this->get('login');
      $response->assertStatus(200);
  }
  public function test_user_duplication() {

    $user1=User::make([
       'name' => 'admin',
       'email' => 'admin@gmail.com'
    ]);
    $user2=User::make([
        'name' => 'Ali',
        'email' => 'Ali@gmail.com'
     ]);
     $this->assertTrue($user1->email !=  $user2->email);
  }
  public function test_it_stor_user(){
      $response=$this->post('/save_user',[
      'name' => 'Jehad',
      'email' => 'deeppp901@gmail.com',
       'password' => '123',
       'is_active' => '1',
       'remember_token' =>'OyM9011kkSwTOhWc6Xtyp3Dt4RPagpaNjeUMLyW9IZkrpqnGkRN4d5si9GNA'

      ]);
      $response->assertRedirect('/');
  }





  public function test_Database(){
      $this->assertDatabaseHas('users',[
          'name' => 'Reem',
      ]);
      $this->assertDatabaseHas('cars',[
        'color' => 'هونداي',
    ]);
  }
  public function test_Missing_Database(){
    $this->assertDatabaseMissing('auctions',[
        'id' =>9,
    ]);

    $this->assertDatabaseMissing('users',[
        'id' =>1000,
    ]);
}

public function test_if_user_has_profile() {
    $returnvalues=(new Profile)->show();

}

public function test_show_all_users() {
    $returnvalues=(new AuthController)->showAllUsers();
    $this->assertnotEmpty($returnvalues);

}

public function test_active_admin_user() {
    Auth::check();
    $this->withoutExceptionHandling();
        $admin = User::find(1);

        $response = $this
            ->actingAs($admin)
            ->json('POST',
            '/active_admin_user',
            ['userid' => '2']);

        $response->assertRedirect('showAllUsers');



}



}
