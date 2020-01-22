<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ورود</title>
  <link rel="stylesheet" href="{{ url('admin_auth/style.css') }}">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-page">
  <div class="form">
   
    <form class="login-form" action="{{url('/login_admin')}}" method="POST">

      <input type="text" name="username" placeholder="نام کاربری"/>
      <input type="password" name="pass" placeholder="گذرواژه"/>
      <button type="submit">
        ورود
      </button>
      
    </form>
  </div>
</div>


</body>
</html>
