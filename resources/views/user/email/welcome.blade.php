<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1> مرحبا بك يا {{ $name }}</h1>
<p> نحن سعداء بإنظمامك لنا تبقى خطوة
     لاكمال عملية التسجيل يرجى الضغط على الرابط التالي لتفعيل حسابك </p>
     <a href="{{ $activation_url }}">اضغط خنا لتفعيل حسابك</a>
</body>
</html>
