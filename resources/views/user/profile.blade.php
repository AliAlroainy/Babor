<span>{{ $user->name }}</span><br>
<span>{{ $user->profile->username }}</span><br>
<form action="{{ route('avatar.change') }}" method="POST" enctype="multipart/form-data">
    @csrf
    Image: <input type="file" name="avatar" id="">
    <input type="submit" value="حفظ">
</form>
<form action="{{ route('info.save') }}" method="POST">
    @csrf

    name: <input type="text" name="name"><br>
    @error('name')
        {{ $message }}
    @enderror
    Email: <input type="text" name="email"><br>
    @error('email')
        {{ $message }}
    @enderror
    Username: <input type="text" name="username"><br>
    @error('username')
        {{ $message }}
    @enderror
    phone: <input type="text" name="phone"><br>
    @error('phone')
        {{ $message }}
    @enderror
    address:
    <textarea name="address" cols="30" rows="10"></textarea>
    @error('address')
        {{ $message }}
    @enderror

    <input type="submit" value="حفظ">
</form>
