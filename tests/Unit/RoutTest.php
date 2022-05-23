<?php

namespace Tests\Unit;

use Tests\TestCase;

class RoutTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_URL()
    {
        $response=$this->get('/');
        $response->assertStatus(200);
    }
}
