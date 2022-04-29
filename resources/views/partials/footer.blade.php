<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<footer class="footer text-center">
    <span class="text-muted d-block d-sm-inline-block" style="font-family: Tajawal">جميع الحقوق محفوضة لدى © <a href="" target="_blank"> Babor
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

        $('#carColor').click(){
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
        // $('#nav-tab a[data-bs-toggle="tab" href="#{{ old('tab') }}"]').tab('show');
    });
</script>
<script src="{{ @asset('assets/js/jQuery.min.js') }}"></script>
<script src="{{ @asset('assets/js/multistep-form.js') }}"></script>
<script src="{{ @asset('assets/js/template.js') }}"></script>
<script src="{{ @asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ @asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ @asset('assets/vendors/base/vendor.bundle.base.js') }}"></script>


</body>

</html>
