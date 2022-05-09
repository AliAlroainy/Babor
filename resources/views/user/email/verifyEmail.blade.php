<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>تأكيد الحساب</title>
    {{-- <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'> --}}
    <link rel="stylesheet" href="{{ @asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ @asset('assets/css/styles.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap');

    </style>
</head>

<body>
    <table>
        <!-- LOGO -->
        <tr>
            <td class="bg-secondary-color" align="center">
                <table border="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="bg-secondary-color" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top"
                            style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'ja', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size: 48px; font-weight: 400; font-family: tajawal;">اهلا بك</h1> <img
                                src=" {{ @asset('assets/images/auth/handshake.png') }}" width="125" height="120"
                                style="display: block; border: 0px;" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff"
                            style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'tajawal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">نحن متحمسون لبدايتك معنا, لكن في البداية لابد ان تتم عملية تأكيد
                                الحساب</p>
                            <p style="margin: 0;">لقد ارسلنا لك رسالة لبريدك الالكتروني لتفعيل حسابك</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff">
                            <table>
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->

                    <tr>
                        <td bgcolor="#ffffff"
                            style="padding: 0px 30px 20px 30px; color: #666666; font-family: 'tajawal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">في حال لا زال لديك المزيد من الاسئلة يمكنك التوالصل معنا دائما عبر
                                البريد الالكتروني </p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff"
                            style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'tajawal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">تحياتنا,<br>فريق بابور</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td class="bg-secondary-color text-center"
                            style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'tajawal', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">تحتاج المزيد من
                                المساعدة ؟</h2>
                            <p style="margin: 0;"><a href="#" target="_blank" style="color: #fff;">ىحن هنا لنقدمها </a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
    <!--<script type='text/javascript'></script>-->

    <script src='{{ @asset('assets/js/bootstrap.js') }}'></script>
</body>

</html>
