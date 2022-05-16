@include('Front.include.header')


<div class="container d-flex flex-column align-items-center justify-content-center w-100 h-100 mb-5" dir="rtl">

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets2.lottiefiles.com/packages/lf20_6s2xGI.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    <h2> لايوجد اتصال بالانترنت</h2>

    <h4 class="text-muted mb-3"> يرجى التاكد من اتصالك  بشبكة الانترنت </h4>

    <a href="/" class="btn btn-warning">
        <i class="bi bi-arrow-clockwise"></i>
        تحديث</a>

</div>


@include('Front.include.footer')