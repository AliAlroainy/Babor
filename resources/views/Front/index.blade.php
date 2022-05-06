@include('Front.include.header')
<div class="container d-flex flex-column justify-content-center align-items-center mt-5 ">
    <h1 class="m-3 text-center "> معنا تقدر تبيع وتشتري سيارتك بسهولة </h1>
    <div class=" ">

        <a href="/buy" class="btn-link">
            <button class="btn btn-light m-1 shadow-sm "> بيع سيارتك </button>
        </a>
        <a href="{{ route('site.available.auction') }}" class="btn-link">
            <button class="btn btn-dark m-3 shadow-sm ">اشتري سيارة </button>
        </a>
    </div>
    <img src="img/car1.png" class="img-fluid" />
</div>
<div class="container d-flex flex-column justify-content-center align-items-center">
    <div class="section-title mb-1">
        <h2>ليش بابور..!؟</h2>
    </div>

    <div class=" p-3 mb-2 ">لان احنا نقدم لك احلى خدمة بامان عالي ونوفر عليك وقتك وبحثك </div>
</div>

<!-- Start Shop Services Area -->
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->

                <div class="single-service">
                    <div> <i class="ti-rocket"></i> </div>

                    <div>
                        <h4>خدمة سريعة</h4>
                        <p>نوفر عليك مجهود البحث</p>
                    </div>

                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>ضمان استرجاع</h4>
                    <p>في حال ماطابق المواصفات</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>دفع آمن</h4>
                    <p>عن طريق بوابة الكترونية مالية امنه </p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>افضل الاسعار</h4>
                    <p>عروض وخصومات باسعار منافسة</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Services Area -->


@include('Front.include.produacts')






<div class="section-title mb-1">
    <h2>اشهر العلامات التجارية</h2>
</div>

<div class="d-flex flex-column flex-sm-row justify-content-evenly align-items-center bg-light w-100 mt-5">

    <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 192.756 192.756">
            <g fill-rule="evenodd" clip-rule="evenodd">
                <path fill="rgba(255, 255, 255, 0)" d="M0 0h192.756v192.756H0V0z" />
                <path
                    d="M24.037 110.41c-2.514-1.575-4.367-7.01-4.367-13.469 0-.237.001-.471.007-.704l.002.003c-6.994-1.099-12.047-4.11-12.177-7.672l-.02.042c-1.711 2.127-2.688 4.586-2.688 7.206 0 7.71 8.463 14.027 19.198 14.586l.045.008zM1.56 96.378c0-8.626 10.736-15.621 23.979-15.621 13.244 0 23.98 6.995 23.98 15.621 0 8.627-10.736 15.622-23.98 15.622-13.243 0-23.979-6.995-23.979-15.622zm23.98-13.367c2.557 0 4.732 3.879 5.538 9.291l.002-.009c4.975-.774 8.457-2.56 8.457-4.639 0-2.789-6.267-5.048-13.997-5.048-7.729 0-13.996 2.259-13.996 5.048 0 2.079 3.482 3.864 8.456 4.639l.003.009c.806-5.412 2.981-9.291 5.537-9.291zm1.548 27.39c10.735-.559 19.199-6.876 19.199-14.586 0-2.62-.978-5.079-2.688-7.206l-.021-.042c-.129 3.562-5.182 6.573-12.177 7.672l.003-.003c.005.233.007.467.007.704 0 6.459-1.854 11.894-4.367 13.469l.044-.008zM25.54 92.703a37.94 37.94 0 0 0 3.325-.142l-.001.001c-.53-3.468-1.818-5.917-3.323-5.917s-2.792 2.449-3.323 5.917l-.001-.001a38.27 38.27 0 0 0 3.323.142zm0 12.846c1.925 0 3.496-4.006 3.579-9.029l.01.003a39.115 39.115 0 0 1-7.177 0l.01-.003c.083 5.023 1.653 9.029 3.578 9.029zM123.922 96.378c0-6.593 5.346-11.939 11.939-11.939 6.596 0 11.941 5.346 11.941 11.939 0 6.595-5.346 11.939-11.941 11.939-6.593 0-11.939-5.344-11.939-11.939zm11.939 7.561c3.682 0 6.668-3.386 6.668-7.562 0-4.175-2.986-7.561-6.668-7.561s-6.666 3.386-6.666 7.561c0 4.177 2.985 7.562 6.666 7.562zM161.35 89.413v18.362h-5.032V89.413h.018-7.035v-4.151h19.066v4.151h-7.017zM174.453 102.71l-.004.005-1.93 5.061h-5.877l9.289-22.514h6.262l9.287 22.514h-5.875l-1.93-5.061-.006-.005H174.453zm4.609-3.8h3.166l-.002.001-3.143-8.24h-.043l-3.143 8.24-.002-.001h3.167zM68.617 89.413v18.362h-5.031V89.413h.018-7.036v-4.151h19.067v4.151h-7.018zM76.922 96.378c0-6.593 5.346-11.939 11.941-11.939 6.594 0 11.94 5.346 11.94 11.939 0 6.595-5.346 11.939-11.94 11.939-6.595 0-11.941-5.344-11.941-11.939zm11.941 7.561c3.681 0 6.667-3.386 6.667-7.562 0-4.175-2.986-7.561-6.667-7.561-3.682 0-6.667 3.386-6.667 7.561 0 4.177 2.985 7.562 6.667 7.562zM112.361 107.775h2.551v-8.548l8.777-13.965h-5.875l-5.453 9.463-5.451-9.463h-5.875l8.776 13.965v8.548h2.55z"
                    fill="#cc2229" />
            </g>
        </svg>
    </div>

    <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 1013.718 1013.696">
            <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="-1120.126" y1="2189.824" x2="-44.679"
                y2="1150.587" gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)">
                <stop offset="0" stop-color="#dff4ff" />
                <stop offset=".098" stop-color="#d6eaf5" />
                <stop offset=".268" stop-color="#bfd0d9" />
                <stop offset=".488" stop-color="#98a5ac" />
                <stop offset=".747" stop-color="#646b6e" />
                <stop offset="1" stop-color="#2b2b2b" />
            </linearGradient>
            <path
                d="M506.86 0C226.94 0 0 226.918 0 506.848c0 279.927 226.94 506.849 506.86 506.849 279.94 0 506.857-226.922 506.857-506.849C1013.719 226.918 786.802 0 506.86 0zm0 988.352c-265.939 0-481.495-215.573-481.495-481.504 0-265.927 215.556-481.512 481.495-481.512 265.938 0 481.511 215.584 481.511 481.512 0 265.93-215.573 481.504-481.511 481.504z"
                fill="url(#a)" />
            <path
                d="M992.004 506.848c0 267.914-217.228 485.134-485.144 485.134-267.919 0-485.123-217.22-485.123-485.134 0-267.929 217.204-485.133 485.123-485.133 267.916 0 485.144 217.204 485.144 485.133z"
                fill="#333" />
            <radialGradient id="b" cx="-1052.247" cy="2101.652" r="720.108"
                gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#fff" />
                <stop offset=".306" stop-color="#a8a8a8" />
                <stop offset=".646" stop-color="#4f4f4f" />
                <stop offset=".885" stop-color="#161616" />
                <stop offset="1" />
            </radialGradient>
            <path
                d="M988.371 506.848c0 265.931-215.573 481.504-481.511 481.504-265.939 0-481.495-215.573-481.495-481.504 0-265.927 215.556-481.512 481.495-481.512 265.938 0 481.511 215.585 481.511 481.512z"
                fill="url(#b)" />
            <linearGradient id="c" gradientUnits="userSpaceOnUse" x1="-818.029" y1="1409.977" x2="-133.081" y2="748.092"
                gradientTransform="matrix(-1 0 0 1 58.906 -545.52)">
                <stop offset="0" stop-color="#dff4ff" />
                <stop offset=".086" stop-color="#d6eaf5" />
                <stop offset=".233" stop-color="#bed0d9" />
                <stop offset=".424" stop-color="#96a4ac" />
                <stop offset=".652" stop-color="#5f686d" />
                <stop offset=".907" stop-color="#1a1d1e" />
                <stop offset="1" />
            </linearGradient>
            <path
                d="M829.677 506.848c0 178.28-144.53 322.804-322.815 322.804-178.289 0-322.819-144.522-322.819-322.804 0-178.289 144.53-322.815 322.819-322.815 178.284-.001 322.815 144.527 322.815 322.815z"
                fill="url(#c)" />
            <path
                d="M519.791 175.308l33.533-88.877v88.877h25.469V48.021h-38.275l-34.814 91.136h.331l-34.812-91.136h-38.276v127.287h25.469V86.431l33.533 88.877zM869.313 232.384l-43.514 63.447 68.347-33.615 18.538 22.231-107.569 54.012-21.735-26.315 41.697-62.869-.247-.31-69.357 29.686-21.984-26.138 72.532-96.044 18.542 22.243-45.417 61.159 70.287-31.349z" />
            <path
                d="M281.427 208.068c-10.251-9.951-26.069-12.951-40.939-3.733 2.847-7.363 1.691-14.858.187-19.015-6.414-11.662-8.662-13.137-13.899-17.561-17.097-14.324-35.082-2.093-47.93 13.219l-62.116 74.028 97.65 81.925 65.5-78.047c14.971-17.838 17.282-35.523 1.547-50.816zm-126.321 35.7l37.311-44.464c4.33-5.146 14.106-4.939 20.375.341 6.908 5.795 6.929 14.002 2.289 19.54l-36.896 43.95-23.079-19.367zm102.934 7.393l-38.896 46.353-24.355-20.47 39.186-46.711c4.434-5.281 14.312-6.817 20.974-1.229 7.504 6.312 8.246 15.912 3.091 22.057z"
                fill="#333" />
            <radialGradient id="d" cx="-1181.576" cy="2174.985" r="1730.313"
                gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#fff" />
                <stop offset=".31" stop-color="#fdfdfd" />
                <stop offset=".451" stop-color="#f6f6f6" />
                <stop offset=".557" stop-color="#e9e9e9" />
                <stop offset=".646" stop-color="#d7d7d7" />
                <stop offset=".724" stop-color="#bfbfbf" />
                <stop offset=".794" stop-color="#a2a2a2" />
                <stop offset=".859" stop-color="gray" />
                <stop offset=".92" stop-color="#575757" />
                <stop offset=".975" stop-color="#2b2b2b" />
                <stop offset="1" stop-color="#141414" />
            </radialGradient>
            <path fill="url(#d)"
                d="M520.06 170.39l33.533-88.875v88.875h25.47V43.103h-38.279l-34.811 91.133h.33l-34.812-91.133h-38.278V170.39h25.47V81.515l33.536 88.875z" />
            <radialGradient id="e" cx="-1181.653" cy="2174.985" r="1730.461"
                gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#fff" />
                <stop offset=".31" stop-color="#fdfdfd" />
                <stop offset=".451" stop-color="#f6f6f6" />
                <stop offset=".557" stop-color="#e9e9e9" />
                <stop offset=".646" stop-color="#d7d7d7" />
                <stop offset=".724" stop-color="#bfbfbf" />
                <stop offset=".794" stop-color="#a2a2a2" />
                <stop offset=".859" stop-color="gray" />
                <stop offset=".92" stop-color="#575757" />
                <stop offset=".975" stop-color="#2b2b2b" />
                <stop offset="1" stop-color="#141414" />
            </radialGradient>
            <path fill="url(#e)"
                d="M869.563 223.844l-43.496 63.449 68.347-33.626 18.52 22.242-107.553 54.012-21.736-26.325 41.7-62.861-.245-.319-69.38 29.698-21.96-26.151 72.531-96.033 18.539 22.234-45.41 61.158 70.26-31.337z" />
            <radialGradient id="f" cx="-1181.748" cy="2175.493" r="1731.785"
                gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#fff" />
                <stop offset=".31" stop-color="#fdfdfd" />
                <stop offset=".451" stop-color="#f6f6f6" />
                <stop offset=".557" stop-color="#e9e9e9" />
                <stop offset=".646" stop-color="#d7d7d7" />
                <stop offset=".724" stop-color="#bfbfbf" />
                <stop offset=".794" stop-color="#a2a2a2" />
                <stop offset=".859" stop-color="gray" />
                <stop offset=".92" stop-color="#575757" />
                <stop offset=".975" stop-color="#2b2b2b" />
                <stop offset="1" stop-color="#141414" />
            </radialGradient>
            <path
                d="M276.868 205.563c-10.229-9.951-26.068-12.953-40.916-3.743 2.824-7.364 1.67-14.86.166-18.996-6.415-11.682-8.642-13.137-13.923-17.57-17.096-14.333-35.059-2.095-47.887 13.231l-62.14 74.016 97.653 81.926 65.499-78.059c14.954-17.839 17.283-35.512 1.548-50.805zm-126.316 35.698l37.307-44.453c4.312-5.155 14.086-4.949 20.376.319 6.909 5.806 6.93 14.023 2.268 19.54l-36.873 43.959-23.078-19.365zm102.951 7.393l-38.896 46.352-24.398-20.47 39.207-46.721c4.434-5.269 14.291-6.806 20.953-1.216 7.547 6.32 8.29 15.9 3.134 22.055z"
                fill="url(#f)" />
            <radialGradient id="g" cx="-871.677" cy="1935.101" r="466.718"
                gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#e6e6e6" />
                <stop offset=".104" stop-color="#d6d6d6" />
                <stop offset=".307" stop-color="#adadad" />
                <stop offset=".588" stop-color="#6c6c6c" />
                <stop offset=".933" stop-color="#121212" />
                <stop offset="1" />
            </radialGradient>
            <path
                d="M194.788 506.853c0-172.358 139.725-312.083 312.073-312.083 172.367 0 312.072 139.724 312.072 312.083 0 172.351-139.705 312.07-312.072 312.07-172.35 0-312.073-139.72-312.073-312.07z"
                fill="url(#g)" />
            <radialGradient id="h" cx="-744.024" cy="1872.327" r="678.742"
                gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#fff" />
                <stop offset=".344" stop-color="#fdfdfd" />
                <stop offset=".481" stop-color="#f6f6f6" />
                <stop offset=".582" stop-color="#eaeaea" />
                <stop offset=".665" stop-color="#d8d8d8" />
                <stop offset=".737" stop-color="#c2c2c2" />
                <stop offset=".802" stop-color="#a6a6a6" />
                <stop offset=".86" stop-color="#848484" />
                <stop offset=".913" stop-color="#5f5f5f" />
                <stop offset=".949" stop-color="#404040" />
                <stop offset=".957" stop-color="#404040" />
                <stop offset="1" stop-color="#404040" />
                <stop offset="1" />
            </radialGradient>
            <path
                d="M203.76 506.853c0-167.399 135.701-303.112 303.102-303.112s303.12 135.712 303.12 303.112S674.26 809.965 506.861 809.965 203.76 674.253 203.76 506.853z"
                fill="url(#h)" />
            <radialGradient id="i" cx="-943.312" cy="2129.614" r="1202.06"
                gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)" gradientUnits="userSpaceOnUse">
                <stop offset=".169" stop-color="#fff" />
                <stop offset=".196" stop-color="#e0eff7" />
                <stop offset=".241" stop-color="#b2d9ec" />
                <stop offset=".287" stop-color="#8bc5e2" />
                <stop offset=".335" stop-color="#6bb5da" />
                <stop offset=".384" stop-color="#52a9d4" />
                <stop offset=".436" stop-color="#41a0cf" />
                <stop offset=".491" stop-color="#369bcd" />
                <stop offset=".556" stop-color="#39c" />
                <stop offset=".606" stop-color="#3396c8" />
                <stop offset=".655" stop-color="#328ebc" />
                <stop offset=".705" stop-color="#3180a8" />
                <stop offset=".754" stop-color="#2f6d8c" />
                <stop offset=".803" stop-color="#2d5468" />
                <stop offset=".851" stop-color="#2a373d" />
                <stop offset=".871" stop-color="#292929" />
            </radialGradient>
            <path d="M203.284 506.853H506.86V203.277c-167.669 0-303.576 135.908-303.576 303.576z" fill="url(#i)" />
            <radialGradient id="j" cx="-943.312" cy="2129.623" r="1202.037"
                gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)" gradientUnits="userSpaceOnUse">
                <stop offset=".169" stop-color="#fff" />
                <stop offset=".196" stop-color="#e0eff7" />
                <stop offset=".241" stop-color="#b2d9ec" />
                <stop offset=".287" stop-color="#8bc5e2" />
                <stop offset=".335" stop-color="#6bb5da" />
                <stop offset=".384" stop-color="#52a9d4" />
                <stop offset=".436" stop-color="#41a0cf" />
                <stop offset=".491" stop-color="#369bcd" />
                <stop offset=".556" stop-color="#39c" />
                <stop offset=".606" stop-color="#3396c8" />
                <stop offset=".655" stop-color="#328ebc" />
                <stop offset=".705" stop-color="#3180a8" />
                <stop offset=".754" stop-color="#2f6d8c" />
                <stop offset=".803" stop-color="#2d5468" />
                <stop offset=".851" stop-color="#2a373d" />
                <stop offset=".871" stop-color="#292929" />
            </radialGradient>
            <path d="M506.86 506.853v303.578c167.667 0 303.576-135.933 303.576-303.578H506.86z" fill="url(#j)" />
            <radialGradient id="k" cx="-865.303" cy="1929.222" r="457.773"
                gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#e6e6e6" />
                <stop offset=".104" stop-color="#d6d6d6" />
                <stop offset=".307" stop-color="#adadad" />
                <stop offset=".588" stop-color="#6c6c6c" />
                <stop offset=".933" stop-color="#121212" />
                <stop offset="1" />
            </radialGradient>
            <path fill="url(#k)"
                d="M812.95 501.458H512.242V200.75h-10.766v300.708H200.768v10.767h300.708v300.717h10.766V512.225H812.95z" />
            <linearGradient id="l" gradientUnits="userSpaceOnUse" x1="-599.096" y1="2043.521" x2="-152.677"
                y2="1612.133" gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)">
                <stop offset="0" stop-color="#f0f4ff" />
                <stop offset=".109" stop-color="#ebeff9" />
                <stop offset=".247" stop-color="#dce0ea" />
                <stop offset=".403" stop-color="#c4c7cf" />
                <stop offset=".57" stop-color="#a2a4ab" />
                <stop offset=".747" stop-color="#76777c" />
                <stop offset=".929" stop-color="#414243" />
                <stop offset="1" stop-color="#2b2b2b" />
            </linearGradient>
            <path
                d="M512.242 209.267c160.142 2.848 289.366 132.062 292.232 292.191h5.359c-2.862-163.099-134.481-294.736-297.593-297.583l.002 5.392z"
                fill="url(#l)" />
            <path
                d="M208.729 501.418c2.845-160.347 132.256-289.747 292.604-292.604v-5.383c-163.336 2.856-295.12 134.669-297.987 297.986l5.383.001z"
                fill="#c2d7e8" />
            <linearGradient id="m" gradientUnits="userSpaceOnUse" x1="-961.44" y1="1679.306" x2="-515.015" y2="1247.911"
                gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)">
                <stop offset="0" stop-color="#f0f4ff" />
                <stop offset=".109" stop-color="#ebeff9" />
                <stop offset=".247" stop-color="#dce0ea" />
                <stop offset=".403" stop-color="#c4c7cf" />
                <stop offset=".57" stop-color="#a2a4ab" />
                <stop offset=".747" stop-color="#76777c" />
                <stop offset=".929" stop-color="#414243" />
                <stop offset="1" stop-color="#2b2b2b" />
            </linearGradient>
            <path
                d="M501.476 804.433c-160.14-2.844-289.364-132.068-292.211-292.208h-5.381c2.865 163.108 134.483 294.75 297.593 297.595l-.001-5.387z"
                fill="url(#m)" />
            <path
                d="M804.475 512.225c-2.866 160.14-132.092 289.364-292.232 292.208v5.387c163.11-2.845 294.747-134.485 297.593-297.595h-5.361z"
                fill="#12404f" />
            <linearGradient id="n" gradientUnits="userSpaceOnUse" x1="-745.471" y1="1833.135" x2="-513.982" y2="1609.44"
                gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)">
                <stop offset="0" stop-color="#c2d7e8" />
                <stop offset=".134" stop-color="#bacfe1" />
                <stop offset=".343" stop-color="#a4bacd" />
                <stop offset=".6" stop-color="#8098ac" />
                <stop offset=".894" stop-color="#4e697f" />
                <stop offset="1" stop-color="#3a566d" />
            </linearGradient>
            <path fill="url(#n)" d="M495.724 203.432v292.119h-292.11v5.764h297.862V203.432z" />
            <linearGradient id="o" gradientUnits="userSpaceOnUse" x1="-861.404" y1="1778.32" x2="-419.473" y2="1351.268"
                gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)">
                <stop offset="0" stop-color="#f0f4ff" />
                <stop offset=".097" stop-color="#e8ebf6" />
                <stop offset=".257" stop-color="#d1d4dd" />
                <stop offset=".459" stop-color="#abaeb5" />
                <stop offset=".695" stop-color="#78797d" />
                <stop offset=".958" stop-color="#363637" />
                <stop offset="1" stop-color="#2b2b2b" />
            </linearGradient>
            <path fill="url(#o)" d="M495.229 806.995V518.391h-289.2V512.7h294.892V806.995z" />
            <linearGradient id="p" gradientUnits="userSpaceOnUse" x1="-535.674" y1="1619.907" x2="-380.656"
                y2="1470.109" gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)">
                <stop offset="0" stop-color="#d9def0" />
                <stop offset=".123" stop-color="#d4daec" />
                <stop offset=".263" stop-color="#c7cfe2" />
                <stop offset=".411" stop-color="#b0bcd1" />
                <stop offset=".566" stop-color="#90a1b8" />
                <stop offset=".725" stop-color="#677f99" />
                <stop offset=".885" stop-color="#355674" />
                <stop offset=".972" stop-color="#173d5d" />
            </linearGradient>
            <path fill="url(#p)" d="M518.409 806.995V518.391h288.602V512.7H512.737V806.995z" />
            <linearGradient id="q" gradientUnits="userSpaceOnUse" x1="-694.251" y1="1940.398" x2="-252.797"
                y2="1513.809" gradientTransform="matrix(1 0 0 -1 1045.93 2135.176)">
                <stop offset="0" stop-color="#f0f4ff" />
                <stop offset=".109" stop-color="#ebeff9" />
                <stop offset=".247" stop-color="#dce0ea" />
                <stop offset=".403" stop-color="#c4c7cf" />
                <stop offset=".57" stop-color="#a2a4ab" />
                <stop offset=".747" stop-color="#76777c" />
                <stop offset=".929" stop-color="#414243" />
                <stop offset="1" stop-color="#2b2b2b" />
            </linearGradient>
            <path fill="url(#q)" d="M518.409 206.011v288.602h288.602v5.682H512.737V206.011z" />
        </svg>
    </div>

    <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 36.179 21.871">
            <path
                d="M27.932 2.152c1.822.997 3.884 2.75 3.669 5.087-.25 2.166-2.269 3.678-4.073 4.589-5.268 2.518-12.666 2.595-18.105.395-1.838-.765-3.901-2.08-4.674-4.056-.592-1.624.129-3.316 1.341-4.442C8.625 1.422 11.856.632 15.181.176c3.609-.438 7.407-.051 10.638 1.057.722.267 1.434.559 2.113.919zM33.905 16.641v5.23h-1.137v-1.504h-2.594v1.504h-1.137V17.77c0-.725.293-1.13 1.137-1.13h3.731z"
                fill="#397db7" />
            <path d="M32.768 17.601h-2.135c-.359.021-.458.11-.458.546v1.199h2.594v-1.745z" fill="#fff" />
            <path d="M27.9 17.77v2.83c0 .901-.506 1.271-1.137 1.271h-3.586v-5.23h3.586c.969-.001 1.137.614 1.137 1.129z"
                fill="#397db7" />
            <path d="M26.75 18.084c0-.286-.174-.484-.48-.484h-1.955v3.269h1.955c.446-.023.48-.29.48-.502v-2.283z"
                fill="#fff" />
            <path fill="#397db7"
                d="M0 16.64h1.137v2.061h2.544V16.64h1.137v5.23H3.681v-2.135H1.137v2.135H0zM6.767 16.64l1.425 2.137L9.6 16.64h1.381L8.76 19.983v1.887H7.623v-1.887L5.386 16.64zM17.363 16.64h3.664c.522 0 1.028.073 1.013 1.13v4.101h-1.137v-3.725c0-.451-.054-.546-.407-.546H18.5v4.271h-1.137V16.64zM35.042 16.641h1.137v5.23h-1.137zM11.549 21.87h3.664c.729 0 1.028-.211 1.013-1.262V16.64h-1.137v3.733c0 .448-.054.502-.408.502h-1.996V16.64h-1.137v5.23z" />
            <path
                d="M20.912 8.494c.207 1.065-.352 1.95-.816 2.81-.516.799-1.366 1.486-2.389 1.384a24.285 24.285 0 0 1-6.616-1.014.413.413 0 0 1-.241-.172c-.043-.12.018-.232.104-.309 1.899-1.538 4.159-2.251 6.393-2.999.833-.241 1.719-.499 2.655-.378.386.051.773.317.91.678zM28.74 3.94c1.065.876 2.028 2.071 1.701 3.514-.533 2.131-2.853 3.266-4.7 3.987-1.005.335-2.019.679-3.119.782-.069-.008-.181.009-.198-.094l.026-.12c1.563-1.762 2.749-3.738 3.789-5.74.481-.902.928-1.83 1.34-2.741a.457.457 0 0 1 .189-.129c.388.034.663.334.972.541zM13.746 1.671l-.035.129c-2.26 2.569-3.746 5.551-5.155 8.515-.275.258-.542-.086-.791-.197-1.254-.825-2.388-2.157-2.061-3.738.524-2.062 2.646-3.163 4.417-3.91a16.557 16.557 0 0 1 3.291-.894c.119.001.274-.016.334.095zM24.959 2.084c.129.068.284.094.361.223.069.146-.069.241-.146.335-1.779 1.392-3.815 2.165-5.895 2.844-1.057.257-2.123.722-3.3.464a1.096 1.096 0 0 1-.679-.516c-.292-.808.103-1.65.447-2.354.456-.885 1.263-1.925 2.38-1.942 2.407-.016 4.676.344 6.832.946z"
                fill="#fff" />
        </svg>
    </div>


</div>




<div class="container d-flex flex-column justify-content-center align-items-center mt-5">
    <div class="section-title mb-1">
        <h2>عروض نقترحها لك</h2>
    </div>
    <!-- 3D coverflow effect -->
    <div class="col-12 mb-4">

        <div class="swiper-container" id="swiper-3d-coverflow-effect">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(img/c1.jpg)"> لاندكروسر 2020</div>
                <div class="swiper-slide" style="background-image:url(img/c2.webp)">كيا</div>
                <div class="swiper-slide" style="background-image:url(img/c3.jpg)"> سوناتا</div>
                <div class="swiper-slide" style="background-image:url(img/c4.jpg)">هونداي</div>
                <div class="swiper-slide" style="background-image:url(img/c5.jpg)">فورد</div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

</div>




<div class="d-flex justify-content-end bg-light w-100 mt-5">
    <div class="d-flex w-100 flex-column  justify-content-center align-items-center">
        <h1> ..اسبق العالم بخطوة </h1>

        <h1> وسوق سيارتك ودووووس </h1>
    </div>

    <img src="img/car2.1.png" class="img-fluid" />

</div>




@include('Front.include.footer')
