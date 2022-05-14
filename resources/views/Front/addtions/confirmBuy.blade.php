@include('Front.include.header')


<div class="container mb-5" dir="rtl" >

    <div class="d-flex justify-content-center">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<lottie-player src="https://assets1.lottiefiles.com/packages/lf20_cyn8dgwy.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
    </div>

    <div class="text-center">

    <div class="">
        <div class="col-12">
            <div class="section-title mt-4" >
                <h2 >  تاكيد عملية الشراء </h2>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <h4>  في حال تم التاكيد على البيع من قبل الطرفين سيقوم الموقع بتحويل المبلغ الى البائع</h4>
    </div>

    </div>
    <div class="container d-flex flex-column align-items-center justify-content-center mt-3  ">
        <ol >
           <div style=" background-color: rgba(255, 166, 0, 0.555); height: 6px; width: 100px; position: relative;">
             <p style="position: absolute; top: -15px" > تعليمات هامة  </p> </div> 

            <li>
                يخلي الموقع كامل مسؤوليته بعد عملية التاكيد.
            </li>
            <li>
                يجب التاكد بشكل كامل من قبل المشتري على استلام السيارة.
            </li>
            <li>
                في حال كان هناك عدم اتفاق او تراجع بالبيع يرجى  ضغط زر التراجع مع ذكر السبب.
            </li>
            <li>
                في حال تم التراجع على البيع من قبل احد الطرفين بدون مبرر سيتم خصم عقوبة.
            </li>
        </ol>
    </div>

    <div class="container d-flex justify-content-around mt-4">
        <div class="d-flex flex-column align-items-center">
        <button class="btn btn-warning">تاكيد المشتري </button>
        <button class="btn  mt-2">تراجع  </button>

        </div>

            <div class="d-flex flex-column align-items-center">
            <button class="btn btn-warning">تاكيد البائع </button>
            <button class="btn btn-defult mt-2">تراجع  </button>
            </div>
        
    </div>

</div>

@include('Front.include.footer')
