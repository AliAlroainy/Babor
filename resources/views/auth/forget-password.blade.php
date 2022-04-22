
<html>
<head>
    <title>forget password</title>
    <link href="{{@asset('assets/css/bootstrap.css')}}" rel="stylesheet" id="bootstrap-css">
    <link href="{{@asset('assets/css/all.min.css')}}" rel="stylesheet" >
</head>
    <!------ Include the above in your HEAD tag ---------->
<body>
<div class="form-gap"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 border m-auto mt-5">
            <div class="text-center">
                <h3><i class="fa fa-lock fa-2x my-3"></i></h3>
                <h2 class="text-center">Forgot Password?</h2>
                <p>You can reset your password here.</p>
                <div class="panel-body my-5">

                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Your email" >
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Your old password" >
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Your email" >
                        </div>

                            <input name="recover-submit" class="btn btn-sm px-5 py-1 btn-primary btn-block" value="Reset Password" type="submit">

                        <input type="hidden" class="hide" name="token" id="token" value="">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{@asset('assets/js/bootstrap.bundle.js')}}"></script>
<script src="{{@asset('assets/js/jQuery.js')}}"></script>

</body>
</html>
