]<!-- Modal -->
<form class="modal fade needs-validation" id="modal_login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" dir="rtl"novalidate>
  <div class="modal-dialog">
    <div class="modal-content d-flex align-items-center ">
      <div class="modal-header align-items-center ">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        <h3 class=" modal-title " id="exampleModalLabel">تسجيل الدخول</h3>
      </div>
      <div class="modal-body d-flex align-items-center justify-content-center flex-column ">
      <!-- modal boday -->

      <div class="form-group">
        <label for="modal_login_email">البريد الالكتروني</label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </span>
            <input type="email" id="modal_login_email" name="modal_login_email" class="form-control" placeholder=" البريد الالكتروني" />
        </div>
        <small class="form-text "> لن نقوم بمشاركة بياناتك مع طرف اخر</small>
    </div>
    <div class="form-group">
        <label for="modal_login_password">كلمة المرور</label>
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-unlock-alt"></i>
            </span>
            <input type="password" id="modal_login_password" name="modal_login_password" class="form-control" placeholder="كلمة المرور" />
        </div>
    </div>
    <label class="custom-control custom-checkbox">
        <input type="checkbox" id="modal_login_remember" class="custom-control-input" />
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> تذكرني</span>
    </label>
</div>
        <button type="submit" class="btn btn-dark  justify-content-end">تسجيل الدخول</button>
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-light">ليس لديك حساب</button>
      </div>
    </div>
  </div>
</form>


