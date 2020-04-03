<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>نتیجه پرداخت</title>
</head>
<body>
    <div>
        <p>پرداخت شما با موفقیت انجام و دوره خریداری گردید</p>
        <p>کد پیگیری آی دی پی: 
            {{ $callback->id_pay_unique_id }}
        </p>
        <p>لطفا جهت برگشت به وب اپلیکیشن روی دکمه ی زیر کلیک کنید</p>
        <a href="{{ url("/") }}">برگشت به اپ</a>
    </div>
</body>
</html>
<style>
    body{
        background: #236297;
    }
    div{
        display: block;
        text-align: center;
        background: #ffffff;
        padding: 1rem;
        border-radius: .3rem;
    }
    div a {
        padding: .6rem 1.5rem;
        display: inline-block;
        background: #236297;
        color: white;
        text-decoration: none;
    }
</style>