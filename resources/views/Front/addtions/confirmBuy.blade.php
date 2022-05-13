@include('Front.include.header')


<div class="container mb-5" dir="rtl" >

    <div class="d-flex justify-content-center">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets1.lottiefiles.com/packages/lf20_cyn8dgwy.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>

    <div class="text-center">
    <div>
        <h1> تاكيد عملية الشراء بين الطرفين </h1>
    </div>

    <div>
        <h4>  في حال تم التاكيد على البيع من قبل الطرفين سيقوم الموقع بتحويل المبلغ الى البائع</h4>
    </div>

    </div>
    <div>
        <p> تعليمات هامة  </p>
        <ul>
            <li>
                يخلي الموقع كامل مسؤليته بعد عملية التاكيد
            </li>
            <li>
                يجب التاكد بشكل كامل من قبل المشتري على استلام السيارة
            </li>
            <li>
                في حال كان هناك عدم اتفاك او تراجع بالبيع يرجى  ضغط زر التراجع مع ذكر السبب
            </li>
            <li>
                في حال تم التراجع على البيع من قبل احد الطرفين بدون مبرر سيتم خصم عقوبة
            </li>
        </ul>
    </div>

    <div class="d-flex justify-content-around">
        <div>
        <button>تاكيد البائع </button>
        تراجع
        </div>

        <div>
            <button>تاكيد المشتري </button>
            تراجع
            </div>
        
    </div>

</div>

@include('Front.include.footer')
