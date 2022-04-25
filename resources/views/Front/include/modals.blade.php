<!-- Start Login Modal -->
<form class="modal fade " id="modal_login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" dir="rtl">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header   ">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        <h3 class=" w-100 text-center " id="exampleModalLabel">تسجيل الدخول</h3>
      </div>
      <div class="modal-body w-100 p-5  ">
      <!-- modal boday -->
        <div > <img src="svg\login.svg" class="" /> </div>

        <div class=" align-items-center mt-2"> 
      <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                {{-- <i class="fa fa-envelope"></i> --}}
            </span>
            <input type="email"  name="email" class="form-control form-control-lg" placeholder=" البريد الالكتروني" />
        </div>
        <small class="form-text "> لن نقوم بمشاركة بياناتك مع طرف اخر</small>
    </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                {{-- <i class="fa fa-unlock-alt" ></i> --}}
            </span>
            <input type="password"  name="password" class="form-control form-control-lg" placeholder="كلمة المرور" />

        </div>
        
    </div>
    <small class="form-text link "><a href="#"> هل نسيت كلمة المرور؟</a></small>
<br/>
    <label class=" custom-control custom-checkbox">
        <input type="checkbox" id="modal_login_remember" class="custom-control-input" />
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> تذكرني</span>
    </label>
</div>
       
</div>
      <div class="modal-footer d-flex align-items-center justify-content-center" >
      
        <button type="submit" class="btn btn-dark  ">تسجيل الدخول</button>
      
        
      </div>
      <button type="button" data-toggle="modal" data-target="#modal_reg" class="btn btn-light">ليس لديك حساب</button>
    </div>
  
  </div>
</form>

<!-- End Login Modal -->


<!-- Regeister  Modal -->
<form class="modal fade " id="modal_reg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" dir="rtl">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header   ">
  
      </div>
      <div class="modal-body w-100 p-5  ">
      <!-- modal boday -->
    



      <div class="container">
      
        <div style="display: flex; width: 100%; border-bottom: 1px solid rgba(51, 51, 51, 0.192); justify-content: center; align-items: center;margin-bottom: 5px; padding: 5px;">
          <h3>انشاء حساب</h3>
        </div>
  
        <div class="d-flex flex-row ">
        <input type="number" class="" placeholder="رقم الجوال" name="uname" required />
  
        
  
        <select placeholder="رقم الجوال"  required 
        class="select" style="width: 10%"
        >
         
          <option>+967</option>
          <option>+966</option>
          <option> +970</option>
        </select>
    
  
      </div>
  
        <div style="width: 80%; align-items: flex-start;">
        <p> سوف نرسل لك رمز التحقق عن طريق رساله نصية  </p>
      </div>
        <button type="submit" class="btn btn-light" >ارسال رمز التحقق</button>
      
        <input type="text" class="form-control mb-2 mt-2" placeholder="الاسم الاول" name="fname" required />
        <input type="text" class="form-control mb-2" placeholder="اسم العائلة" name="lname" required />
        <input
          type="email"
          class="form-control mb-2"
          placeholder="البريد الالكتروني"
          name="email"
          required
        />
    
        <input class="form-control mb-2" type="password" placeholder="كلمة السر" name="psw" required />
        <input class="form-control mb-2" type="password" placeholder="تاكيد كلمة السر" name="psw" required />

        <div style="display: flex; flex-direction: column; justify-content: flex-start;width: 80%;margin-top: 10px;" >
          <div >
            <input type="checkbox" checked style="width: 20px; height: 20px;" />
            <label> اوافق <a style="text-decoration: none; color: #0089B6;" href="#"> على الشروط والاحكام </a> </label>
          </div>
          <div>
            <input type="checkbox"  checked style="width: 20px; height: 20px;" />
            <label> التسجيل للانضمام للنشرة البريدية </label>
          </div>
        </div>
       
  
        <button class="btn btn-dark"  type="submit">
          انشاء حساب
        </button>
      </div>
  
      {{-- <div style="display: flex; flex-direction: row; align-items: center; justify-content: center; gap: 5px; margin-top: 50px;">
  
        <div
          
        >
           لديك حساب ؟
        </div>
        <div style="color: #0089B6; cursor: pointer;"  onclick="document.getElementById('id01').style.display='block' ;document.getElementById('id02').style.display='none'"
        >  تسجيل الدخول < </div> --}}


        
      </div>
      <button type="button" data-toggle="modal" data-target="#modal_log" class="btn btn-light"> لديك حساب ؟</button>
    </div>
  
  </div>
</form>

<!-- End Regeister Modal -->


<!-- reg -- >


<div id="id02" class="modal2">
  <form
    class="modal-content animate"
    action="/action_page.php"
    method="post"
  >
    <div class="container">
      
      <div style="display: flex; width: 100%; border-bottom: 1px solid rgba(51, 51, 51, 0.192); justify-content: center; align-items: center;margin-bottom: 5px; padding: 5px;">
        <h3>انشاء حساب</h3>
      </div>

      <div style="display: flex; flex-direction: row; width: 80%; align-items: center;">
      <input type="text" placeholder="رقم الجوال" name="uname" required />

      <div style="position: relative; width: 50px;">
      

      <select placeholder="رقم الجوال"  required style="width: 80px; height: 40px; background-color: rgb(233, 232, 232);
      box-sizing: border-box;
      border: none;
      direction: rtl;
      border-radius: 5px;">
        <option> +970</option>
        <option>+967</option>
        <option>+966</option>
      </select>
      <img src="assets/svg/flag.svg" width="20" height="20" style="position: absolute; top: 9px; left: -9px;"/>
      <div style="position: absolute; right: 1px; top: 1px; font-size: 0.2rem;">رمز البلد</div>
    </div>

    </div>

      <div style="width: 80%; align-items: flex-start;">
      <p> سوف نرسل لك <samp style="font-weight: bold;" > رمز التحقق عن طريق رساله نصية</samp>   </p>
    </div>
      <button type="submit" style="background-color: rgb(223, 223, 223);font-size: 1rem; color: #333;" >ارسال رمز التحقق</button>
    
      <input type="text" placeholder="الاسم الاول" name="fname" required />
      <input type="text" placeholder="اسم العائلة" name="lname" required />
      <input
        type="text"
        placeholder="البريد الالكتروني"
        name="email"
        required
      />
      <input
        type="text"
        placeholder="تاكيد البريد الالكتروني"
        name="conf-email"
        required
      />
      <input type="password" placeholder="كلمة السر" name="psw" required />
      <div style="display: flex; flex-direction: column; justify-content: flex-start;width: 80%;margin-top: 10px;" >
        <div >
          <input type="checkbox" checked style="width: 20px; height: 20px;" />
          <label> اوافق <a style="text-decoration: none; color: #0089B6;" href="#"> على الشروط والاحكام </a> </label>
        </div>
        <div>
          <input type="checkbox"  checked style="width: 20px; height: 20px;" />
          <label> التسجيل للانضمام للنشرة البريدية </label>
        </div>
      </div>
     

      <button style="background-color: rgb(223, 223, 223);font-size: 1rem; color: #333;"  type="submit">
        انشاء حساب
      </button>
    </div>

    <div style="display: flex; flex-direction: row; align-items: center; justify-content: center; gap: 5px; margin-top: 50px;">

      <div
        
      >
         لديك حساب ؟
      </div>
      <div style="color: #0089B6; cursor: pointer;"  onclick="document.getElementById('id01').style.display='block' ;document.getElementById('id02').style.display='none'"
      >  تسجيل الدخول < </div>

    </div>
  </form>
</div>
  <-- end -->
