<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<footer class="footer text-center">
    <span class="text-muted d-block d-sm-inline-block" style="font-family: Tajawal">جميع الحقوق محفوضة لدى © <a href=""
            target="/"> Babor
        </a>2022</span>
</footer>
<!-- page-body-wrapper ends -->
</div>




<!-- plugins:js -->
<!-- endinject -->

<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script>
    $(document).ready(function() {

        $('#carColor').click() {
            $('#color').textContent = $('#carColor').value();
        }

        $('.previewImage').change(function() {
            for (var i = 0; i < $(this)[0].files.length; i++) {
                $(".previewFrames").append(
                    `<button type="button" class="btn close" id="btn-${i}"
                                data-bs-dismiss="alert" style="position: absolute; font-size:30px; padding:0;">&times;</button>`
                );
                $(".previewFrames").append('<img src="' + window.URL.createObjectURL(this.files[
                        i]) +
                    '" width="100px" height="100px" style="overflow:auto;"/>');
                $(`#btn-${i}`).click(function() {
                    $('.previewFrames').val(null);
                });
            }
        });
    });
</script>
<script src="{{ @asset('assets/js/jQuery.min.js') }}"></script>
<script src="{{ @asset('assets/js/multistep-form.js') }}"></script>
{{-- <script src="{{ @asset('assets/js/bootstrap.bundle.js') }}"></script> --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#brand').on('change', function() {
            var brandId = this.value;
            $('#series').html('<option value="">اختر سلسلة للبراند</option>');
            $.ajax({
                url: '{{ route('getSeries') }}?brand_id=' + brandId,
                type: 'get',
                success: function(res) {

                    $.each(res, function(key, value) {
                        $('#series').append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
<script>
    // $(document).ready(function() {
    //     $('#filterByStatus').on('change', function(e) {
    //         indexWithFilter();
    //     });
    // });

    function indexWithFilter() {
        var selectedFilterByStatus = $("#filterByStatus option:selected").val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        alert(selectedFilterByStatus);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('auction.filter') }}",
            type: "GET",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                status: selectedFilterByStatus
            },
            success: function(data) {
                $('#filteredSection').html(data);
            },
            error: function(response) {
                alert(response.status);
            }
        });
    }
</script>
<script src="{{ @asset('assets/js/template.js') }}"></script>
<script src="{{ @asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ @asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ @asset('assets/vendors/base/vendor.bundle.base.js') }}"></script>
<script src="{{ @asset('assets/js/dropfiy.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
<!-- Add plugin scripts -->
{{-- <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script> --}}
<script>
    //     // register the plugins with FilePond
    // FilePond.registerPlugin(
    //   FilePondPluginImagePreview,
    //   FilePondPluginImageResize,
    //   FilePondPluginImageTransform,

    // );



    // Basic
    $('.dropify').dropify();

    // Translated

    $('.dropify').dropify({
        messages: {
            'default': 'قم بسحب وإسقاط ملف هنا أو انقر',
            'replace': 'قم بسحب وإسقاط ملف هنا أو انقر لاستبداله',
            'remove': 'احذف',
            'error': 'خطا، حاول مره اخري'
        }

    });

    // // const inputElement = document.querySelector('input[type="file"]');
    // // const pond = FilePond.create(inputElement);

    //     const inputElement = document.querySelector('input[type="file"]');
    //     const pond = FilePond.create(inputElement, {
    //   imageResizeTargetWidth:256,
    //   // set contain resize mode
    // //   imageResizeMode: 'contain',

    //   // add onaddfile callback
    //   onaddfile: (err, fileItem) => {
    //     console.log(err, fileItem.getMetadata('resize'));
    //   },

    //   // add onpreparefile callback
    //   onpreparefile: (fileItem, output) => {
    //     // create a new image object
    //     const img = new Image();

    //     // set the image source to the output of the Image Transform plugin
    //     img.src = URL.createObjectURL(output);

    //     // add it to the DOM so we can see the result
    //     document.body.appendChild(img);
    //   }

    // });
</script>
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
{{-- <script src="/js/Notifications/notifications.js"></script> --}}
<script>
    var pusher = new Pusher('{{ env('MIX_PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        encrypted: true
    });

    let channel = pusher.subscribe('notify-channel');
    let channel2 = pusher.subscribe('notify-channel2');

    channel.bind('App\\Events\\Notify', function(data) {
        let node = document.createElement('li');
        if (data.user_id.toString() == "{!! Auth::id() !!}" && data.type == 1) {
            // if( data.type == 1 ) {
            node.innerHTML = `
                <span class="dropdown-item">
                    <span class="cart-img ms-2" ><img src="/images/cars/${data.thumbnail}" alt="#"></span>
                    <a class="quantity text-dark" href="auction/${data.link}">
                        <p class="fw-bold m-0"> ${data.message}</p>
                        <span class="amount">${data.price}</span>
                        <span class="d-block mb-0 date">ينتهي بتاريخ ${data.endDate} </span>
                    </a>
                </span>
`;
            {{-- alert({!! \Illuminate\Support\Facades\Auth::id() !!}) --}}
            //             document.getElementById('dropdown-menu').append(node);
            let menu = document.getElementById('dropdown-menu');
            insertAfter(node, menu.firstElementChild)

        }

        if (data.user_id.toString() == "{!! Auth::id() !!}" && data.type == 2) {
            node.innerHTML = `
                <span class="dropdown-item">
                    <a class="quantity text-dark" href="{{ url('user/auction/details') }}/${data.link}">
                        <p class="fw-bold m-0"> ${data.message}</p>
                    </a>
                </span>
`;
            {{--             alert("{!! Auth::id() !!}");--}}
            let menu = document.getElementById('dropdown-menu');
            insertAfter(node, menu.firstElementChild)
        }
        if (data.type == 3) {
            node.innerHTML = `
                <span class="dropdown-item">
                        <a class="quantity text-dark" href="{{ url('user/auction/details') }}/${data.link}">
                        <p class="fw-bold m-0"> ${data.message}</p>
                        <p class="m-0">إضغط لمعرفة السبب</p>
                    </a>
                </span>
`;
            {{--alert("{!! Auth::id() !!}");--}}
            let menu = document.getElementById('dropdown-menu');
            insertAfter(node, menu.firstElementChild)
        }


        if(  data.user_id.toString() == "{!! Auth::id() !!}" && (data.type == 5 || data.type == 6)  ) {
            {{--alert(data.user_id.toString() != "{!! Auth::id() !!}" && data.winner_id.toString() != "{!! Auth::id() !!}" && "{!! Auth::id() !!}" != "");--}}
            node = document.createElement('li');
            node.innerHTML =`
                <span class="dropdown-item">
                        <a class="quantity text-dark" href="{{ url('user/auction/details') }}/${data.link}">
                        <p class="fw-bold m-0"> ${data.message}</p>
                    </a>
                </span>
`;
            alert("{!! Auth::id() !!}");
            let menu = document.getElementById('dropdown-menu');
            insertAfter(node, menu.firstElementChild)
        }

        if( data.user_id.toString() == "{!! Auth::id() !!}" && "{!! Auth::id() !!}" != 1 && "{!! Auth::id() !!}" != "" && data.type == 7) {
            node = document.createElement('li');
            node.innerHTML = `
                <span class="dropdown-item">
                        <a class="quantity text-dark" href="{{ url('user/auction/details') }}/${data.link}">
                        <p class="fw-bold m-0"> ${data.message}</p>
                    </a>
                </span>
`;
            {{--alert("{!! Auth::id() !!}");--}}
            let menu = document.getElementById('dropdown-menu');
            insertAfter(node, menu.firstElementChild)
        }

    });

    channel2.bind('App\\Events\\Notify', function(data) {
        var node = document.createElement('li');
        node.innerHTML = `
                <span class="dropdown-item">
                    <a class="quantity text-dark" href="{{ url('user/auction/details') }}/${data.link}">
                        <p class="fw-bold m-0"> ${data.message}</p>
                    </a>
                </span>
`;
        if (data.user_id.toString() == "{!! Auth::id() !!}") {
            {{-- alert("{!! Auth::id() !!}"); --}}
            // document.getElementById('dropdown-menu').append(node);
            let menu = document.getElementById('dropdown-menu');
            insertAfter(node, menu.firstElementChild)
        }

    });

    function insertAfter(newNode, existingNode) {
        existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
    }
</script>

</body>

</html>
