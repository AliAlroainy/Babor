<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    {{-- <!-- Add plugin styles -->
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    <!-- Required meta tags --> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <title>Babor Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ @asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ @asset('assets/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- dropfiy:css -->
    <link rel="stylesheet" href="{{ @asset('assets/css/maps/dropfiy.css') }}">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/fonts/dropify.eot">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/fonts/dropify.svg">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/fonts/dropify.ttf">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/fonts/dropify.woff">
    <!-- inject:css --> --}}
    <link rel="stylesheet" href="{{ @asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ @asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ @asset('assets/css/multistep-form.css') }}">
    <link rel="stylesheet" href="{{ @asset('assets/css/all.min.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ @asset('assets/images/favicon.png') }}" />

    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="{{ @asset('assets/js/ajax.js') }}"></script>
    <script src="/js/search.js"></script>
    {{-- tiny editor --}}
    <script type="text/javascript"
        src="https://cdn.tiny.cloud/1/q6t3hc09adutz0zx8yu3y7y69c75wwfeg3ux14tbrxthyd8g/tinymce/5/tinymce.min.js"
        referrerpolicy="origin">
    </script>
    <script type="text/javascript">
        tinymce.init({
            selector: '.myTextarea',
            width: 600,
            height: 300,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
            ],
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons | help',
            menu: {
                favs: {
                    title: 'My Favorites',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table help',
            content_css: 'css/content.css'
        });
    </script>
    {{-- end --}}
    <style>
        tr td {
            padding-block: 10px !important;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>

    <!--These jQuery libraries for
   chosen need to be included-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.min.css" />

    <!--These jQuery libraries for select2
   need to be included-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" />
    <script>
        $(document).ready(function() {
            //Select2
            $(".progLang").select2({
                tags: true,
            });
            //Chosen
            $(".progLang1").chosen({
                tags: true,
            });
        });
    </script>

</head>

<body>

        {{-- <!-- Preloader -->
        <div class="preloader">
            <div class="preloader-inner">
                <div class="preloader-icon">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!-- End Preloader --> --}}
        <script src="/js/active.js"></script>

    