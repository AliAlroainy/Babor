@include('partials.header')

<div class="container">
    <div class="row">
        <div class="col-sm-6 border m-auto mt-5">
            <div class="text-center">
                <h3><i class="fa fa-lock fa-2x my-3"></i></h3>
                <h2 class="text-center">هل نسيت كلمة المرور ؟</h2>
                <div class="panel-body my-5">
                    <form method="POST" action="/forget-password">
                      @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني">
                        </div>
                        <input name="recover-submit" class="btn btn-sm px-5 py-2 btn-primary text-white btn-block"
                            value="إرسال لبريدك الإلكتروني لتغيير كلمة السر" type="submit">
                        <input type="hidden" class="hide" name="token" id="token" value="">
                        <a href="{{ route('login') }}" class="btn btn-inverse-secondary px-5 py-2">العودة</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
