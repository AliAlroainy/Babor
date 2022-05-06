
{{-- <h1> مرحبا بك يا {{ $name }}</h1>
<p> نحن سعداء بإنظمامك لنا تبقى خطوة
     لاكمال عملية التسجيل يرجى الضغط على الرابط التالي لتفعيل حسابك </p>
     <a href="{{ $activation_url }}">اضغط خنا لتفعيل حسابك</a> --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ @asset('assets/images/logo-mini.svg') }}" alt="logo" />
        <div class="card-body">
          <h5 class="card-title"> مرحبا بك يا {{ $name }}</h5>
          <p class="card-text"> نحن سعداء بإنظمامك لنا تبقى خطوة
          لاكمال عملية التسجيل يرجى الضغط على الرابط التالي لتفعيل حسابك </p>

          <a href="{{ $activation_url }}" class="btn btn-warning">اضغط هنا لتفعيل حسابك</a>
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html> --}}

@include('partials.header')

<div class="container">
    <div class="row">
        <div class="col-sm-6 border m-auto mt-5">
            <div class="text-center">
                <h3>                <img class="card-img-top" src="{{ @asset('assets/images/logo.png') }}" alt="logo" /></h3>

                <h2 class="text-center">مرحبا بك يا{{ $name }} </h2>
                <div class="panel-body my-5">
                    <form method="POST" action="/forget-password">
                      @csrf
                        <div class="input-group mb-3">
                            <p> نحن سعداء بإنظمامك لنا تبقى خطوة
                                لاكمال عملية التسجيل يرجى الضغط على الرابط التالي لتفعيل حسابك </p>
                        </div>

                        <a href="{{ $activation_url }}" class="btn btn-inverse-secondary px-5 py-2">اضغط هنا لتفعيل حسابك</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
