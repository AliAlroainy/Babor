]<!-- Modal -->
<form class="modal fade needs-validation" id="modal_login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" dir="rtl"novalidate>
  <div class="modal-dialog">
    <div class="modal-content d-flex align-items-center ">
      <div class="modal-header  w-100 align-items-center ">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        <h3 class=" w-100 text-center " id="exampleModalLabel">تسجيل الدخول</h3>
      </div>
      <div class="modal-body w-100 p-5  ">
      <!-- modal boday -->
        <div > <img src="svg\login.svg" class="" /> </div>
      <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </span>
            <input type="email"  name="email" class="form-control form-control-lg" placeholder=" البريد الالكتروني" />
        </div>
        <small class="form-text "> لن نقوم بمشاركة بياناتك مع طرف اخر</small>
    </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-unlock-alt" ></i>
            </span>
            <input type="password"  name="password" class="form-control form-control-lg" placeholder="كلمة المرور" />

        </div>
        
    </div>
    <small class="form-text link "> نسيت كلمة المرور؟</small>
<br/>
    <label class=" custom-control custom-checkbox">
        <input type="checkbox" id="modal_login_remember" class="custom-control-input" />
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> تذكرني</span>
    </label>
</div>
       
      
      <div class="modal-footer">
        <button type="submit" class="btn btn-dark  justify-content-end">تسجيل الدخول</button>
        <button type="button" class="btn btn-light">ليس لديك حساب</button>
      </div>
    </div>
  </div>
</form>


