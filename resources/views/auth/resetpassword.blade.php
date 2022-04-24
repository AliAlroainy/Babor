@include('partials.header')

<div class="container">
    <div class="row">
        <div class="col-sm-6 border m-auto mt-5">
            <div class="text-center">
                <h3><i class="fa fa-lock fa-2x my-3"></i></h3>
                <h2 class="text-center">استعد كلمه المرور ؟</h2>
                <div class="panel-body my-5">
                    <form method="POST" action="/forget-password">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                            <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}"  placeholder="البريد الالكتروني">
                            @error('email')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="كلمه السر">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="تاكيد كلمه المرور">
                        </div>
                        <input name="recover-submit" class="btn btn-sm px-5 py-2 btn-primary text-white btn-block"
                            value="استعد كلمه المرور" type="submit">
                        <input type="hidden" class="hide" name="token" id="token" value="">
                        <a href="{{ route('login') }}" class="btn btn-inverse-secondary px-5 py-2">العودة</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
