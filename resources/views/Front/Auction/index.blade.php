<html>

<head>
    <title>Dependent dropdown example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<form action="" enctype="multipart/form-data">
    <div>تعبئة بيانات السيارة</div>
    <select name="brand_id" id="brand">
        <option selected disabled>اختر البراند</option>
        @if (isset($brands) && $brands->count() > 0)
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        @endif
    </select>
    <div class="mb-3">
        <select id="series" name="series_id"></select>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        $('#brand').on('change', function() {
            var brandId = this.value;
            $('#series').html('');
            $.ajax({
                url: '{{ route('getSeries') }}?brand_id=' + brandId,
                type: 'get',
                success: function(res) {
                    $('#series').html('<option value="">اختر سلسلة للبراند</option>');
                    $.each(res, function(key, value) {
                        $('#series').append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
