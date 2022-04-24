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
    <small class="form-text link "> هل نسيت كلمة المرور؟</small>
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        <h3 class=" w-100 text-center " id="exampleModalLabel">تسجيل بالموقع</h3>
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
<br/>
    <label class=" custom-control custom-checkbox">
        <input type="checkbox" id="modal_login_remember" class="custom-control-input" />
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> اوافق على شروط الخصوصية </span>
    </label>
</div>
       
</div>
      <div class="modal-footer d-flex align-items-center justify-content-center" >
      
        <button type="submit" class="btn btn-dark  ">تسجيل </button>
      
        
      </div>
      <button type="button" data-toggle="modal" data-target="#modal_log" class="btn btn-light"> لديك حساب</button>
    </div>
  
  </div>
</form>

<!-- End Regeister Modal -->



