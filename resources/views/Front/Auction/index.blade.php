<form action="{{ route('auctions.store') }}" enctype="multipart/form-data">
    <div>تعبئة بيانات السيارة</div>
    <select name="brand_id">
        <option selected disabled>اختر البراند</option>
        @if (isset($brands) && $brands->count() > 0)
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        @endif
    </select>
    <input type="text" name="">


    <div>تعبئة بيانات المزاد</div>
</form>
