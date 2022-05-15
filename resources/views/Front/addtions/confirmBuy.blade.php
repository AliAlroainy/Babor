@include('Front.include.header')
<div class="container mb-5" dir="rtl">
    <div class="d-flex justify-content-center">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_cyn8dgwy.json" background="transparent"
            speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        {{-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_1dlnyjbb.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player> --}}
    </div>
    <div class="text-center">
        <div class="">
            <div class="col-12">
                <div class="section-title mt-4">
                    <h2> تاكيد عملية الشراء </h2>
                    {{-- <h2 > تم تاكيد عملية الشراء  </h2> --}}

                </div>
            </div>
        </div>
        <div class="mb-4">
            <h4> في حال تم التاكيد على البيع من قبل الطرفين سيقوم الموقع بتحويل المبلغ الى البائع</h4>
        </div>
    </div>
    <div class="container d-flex flex-column align-items-center justify-content-center mt-3  ">
        <ol>
            <div style=" background-color: rgba(255, 166, 0, 0.555); height: 6px; width: 100px; position: relative;">
                <p style="position: absolute; top: -15px"> تعليمات هامة </p>
            </div>
            <li>
                يخلي الموقع كامل مسؤوليته بعد عملية التاكيد.
            </li>
            <li>
                يجب التاكد بشكل كامل من قبل المشتري على استلام السيارة.
            </li>
            <li>
                في حال كان هناك عدم اتفاق او تراجع بالبيع يرجى ضغط زر التراجع مع ذكر السبب.
            </li>
            <li>
                في حال تم التراجع على البيع من قبل احد الطرفين بدون مبرر سيتم خصم عقوبة.
            </li>
            <li>
                اضغط على زر التاكيد لتاكيد عملية الشراء والبيع.
            </li>
        </ol>
    </div>
    @if ($route == 'buyer.confirm')
        <div class="container d-flex align-items-center justify-content-center w-75">
            <div class="w-75 alert-light p-3"
                style="border-right: 3px solid rgba(78, 78, 78, 0.716); border-radius: 6px">
                انا المشتري : <strong>{{ $bid->user->name }}</strong>
                <br />
                اوؤكد استلامي من البائع : <strong>{{ $bid->auction->user->name }}</strong>
                <br />
                {{ $bid->auction->car->category->name }} من النوع
                <strong>{{ $bid->auction->type_and_model() }}</strong>
                بمواصفات كما ذكر في التفاصيل بدون اي اضرار زائدة
                <br />
                في المزاد رقم <strong>{{ $bid->id }}</strong> وبسعر فوز المزاد المقدر
                <strong>{{ $bid->currentPrice }}</strong>
                الذي تم نشره بتاريخ
                <strong>{{ $bid->auction->startDate }}
                </strong>
                <br />
                والله على ما نقول شهيد ..
            </div>
        </div>
    @endif

    <div class="container d-flex justify-content-around mt-4">
        <div class="d-flex flex-column align-items-center">
            @if ($route == 'buyer.confirm')
                <!-- Button  (to Trigger Modal) -->
                <p> المشتري : {{ $bid->user->name }}</p>
                <a href="#buyModal" class="btn btn-warning " data-toggle="modal">
                    <i class="bi bi-pen-fill"></i>
                    تاكيد المشتري
                </a>

                {{-- <button class="btn btn-success">
            <i class="bi bi-check-circle"></i>
            تم تاكيد المشتري </button> --}}

                <a href="#backModal" class="btn btn-defult mt-2" data-toggle="modal">
                    <i class="bi bi-info-circle"></i>
                    تراجع </a>
            @endif
        </div>

        <div class="d-flex flex-column align-items-center">
            @if ($route == 'seller.confirm')
                <p> البائع : علي الرعيني</p>

                <!-- Button  (to Trigger Modal) -->
                <a href="#buyModal" class="btn btn-warning " data-toggle="modal">
                    <i class="bi bi-pen-fill"></i>
                    تاكيد البائع
                </a>

                {{-- <button class="btn btn-success ">
                    <i class="bi bi-check-circle"></i>
                    تم تاكيد البائع </button> --}}

                <a href="#backModal" class="btn btn-defult mt-2" data-toggle="modal">
                    <i class="bi bi-info-circle"></i>
                    تراجع </a>
            @endif
        </div>
    </div>
</div>
<!-- confirm Modal  -->
<div id="buyModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header w-100 d-flex align-items-center justify-content-center text-center"
                style="top:-80px; ">
                <div>
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_accg3lm5.json"
                        background="transparent" speed="1" style="width: 150px; height: 150px;" loop autoplay>
                    </lottie-player>
                </div>
            </div>
            <div class="modal-body">
                <h4 class=" w-90 m-3 mt-5"> هل انت متاكد</h4>

                <p class="text-center alert alert-warning">عملية التاكيد بمثابة عقد نهائي للبيع بين الطرفين </p>
            </div>

            <div>
                <a class="btn btn-dark " href="#" style=" background-color: rgb(57, 57, 57)"
                    data-dismiss="modal">تراجع</a>
                <button class="btn btn-success " data-dismiss="modal">تاكيد</button>
            </div>
        </div>
    </div>
</div>

<!-- Back Modal  -->
<div id="backModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header w-100 d-flex align-items-center justify-content-center text-center"
                style="top:-80px; ">
                <div>
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_accg3lm5.json"
                        background="transparent" speed="1" style="width: 150px; height: 150px;" loop autoplay>
                    </lottie-player>
                </div>
            </div>
            <div class="modal-body">
                <h4 class=" w-90 m-3 mt-5"> التراجع عن البيع </h4>
                <textarea class="form-control" dir="rtl">يرجى كتابة سبب التراجع.. </textarea>
            </div>
            <div>
                <a class="btn btn-dark " href="#" style=" background-color: rgb(57, 57, 57)" data-dismiss="modal">
                    الغاء
                </a>
                <button class="btn btn-success " data-dismiss="modal">
                    ارسال
                    <i class="bi bi-send"></i>
                </button>
            </div>
        </div>
    </div>
</div>

@include('Front.include.footer')
