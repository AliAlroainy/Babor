@include('partials.header')

<div class="container">
    <div class="row">
        <div class="col-sm-6 border m-auto mt-5">
            <div class="text-center">
                <h3><i class="fa fa-lock fa-2x my-3"></i></h3>
                <h2 class="text-center">هل نسيت كلمة المرور ؟</h2>
                <div class="panel-body my-5">
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني" >
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="oldPassword" class="form-control" placeholder="كلمة المرور القديمة" >
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="newPassword" class="form-control" placeholder="كلمة المرور الجديدة" >
                        </div>


                            <input name="recover-submit" class="btn btn-sm px-5 py-2 btn-primary btn-block" value="تغيير " type="submit">

                        <input type="hidden" class="hide" name="token" id="token" value="">
                        <a href="{{url('login')}}" class="btn btn-inverse-secondary px-5 py-2">العودة</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

