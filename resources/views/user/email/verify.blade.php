

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">لاجل استعاده كلمه المرور الرجاء  </div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('A fresh verification link has been sent to your email address.') }}
                       </div>
                   @endif
                   <a
                   href="http://127.0.0.1:8000/reset-password/{{$token}}">اضغط هنا </a>.
               </div>
           </div>
       </div>
   </div>
</div>

