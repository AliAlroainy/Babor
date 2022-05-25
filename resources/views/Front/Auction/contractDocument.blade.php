@include('Front.include.header')
<div class="container mb-5" dir="rtl">
    <div class="d-flex justify-content-center">
        @if ($buyer_confirmed == '1' && $seller_confirmed == '1')
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_1dlnyjbb.json" background="transparent"
                speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        @else
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_cyn8dgwy.json" background="transparent"
                speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        @endif

    </div>
    <div class="text-center">
        <div class="">
            <div class="col-12">
                <div class="section-title mt-4">
                    @if ($buyer_confirmed == '1' && $seller_confirmed == '1')
                        <h2> تم تاكيد عملية الشراء </h2>
                    @else
                        <h2> تاكيد عملية الشراء </h2>
                    @endif
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

    @if ($user == 'buyer' || $user == 'seller' || \App\Models\User::first())
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
            @if ($buyer_confirmed == '1')
                <button class="btn btn-success">
                    <i class="bi bi-check-circle"></i>
                    تم تاكيد المشتري </button>
            @elseif($buyer_confirmed == '0')
                <button class="btn btn-danger">
                    <i class="fa fa-ban"></i>
                    تم تراجع المشتري</button>
            @else
                @if ($user == 'buyer')
                    <!-- Button  (to Trigger Modal) -->
                    <p> المشتري : {{ $bid->user->name }}</p>
                    <a href="#buyModal" class="btn btn-warning " data-toggle="modal">
                        <i class="bi bi-pen-fill"></i>
                        تاكيد المشتري
                    </a>

                    <a href="#backModal" class="btn btn-defult mt-2" data-toggle="modal">
                        <i class="bi bi-info-circle"></i>
                        تراجع </a>
                @endif
            @endif
        </div>

        <div class="d-flex flex-column align-items-center">
            @if ($seller_confirmed != null)
                <button class="btn btn-success">
                    <i class="bi bi-check-circle"></i>
                    تم تاكيد البائع </button>
            @else
                @if ($user == 'seller')
                    <p> البائع : {{ $bid->auction->user->name }}</p>

                    <!-- Button  (to Trigger Modal) -->
                    <a href="#buyModal" class="btn btn-warning " data-toggle="modal">
                        <i class="bi bi-pen-fill"></i>
                        تاكيد البائع
                    </a>
                @endif
            @endif
        </div>
    </div>
</div>
<!-- confirm Modal  -->


<form action="{{ route('confirm', $bid->payment_bill->id) }}" method="POST">
    @csrf
    <div id="buyModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header w-100 d-flex align-items-center justify-content-center text-center"
                    style="top:-80px;">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                        style=" background-color: rgb(57, 57, 57)">إلغاء</button>
                    <button type="submit" class="btn btn-warning text-white" name="approve">حفظ</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Back Modal  -->
<form action="{{ route('confirm', $bid->payment_bill->id) }}" method="POST">
    @csrf
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
                    <h4 class="w-90 m-3 mt-5"> التراجع عن البيع </h4>
                    <textarea class="form-control myTextarea" dir="rtl" name="buyer_undoReason"></textarea>
                </div>
                <div>
                    <a class="btn btn-dark " href="#" style=" background-color: rgb(57, 57, 57)" data-dismiss="modal">
                        الغاء
                    </a>
                    <button type="submit" class="btn btn-success" name="disapprove">
                        ارسال
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('Front.include.footer')
