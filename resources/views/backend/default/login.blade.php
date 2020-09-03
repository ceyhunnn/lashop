<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DShop | Login</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="/backend/login/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="/backend/login/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="/backend/login/css/style.css" rel="stylesheet">
  <link href="/backend/login/css/style-responsive.css" rel="stylesheet">


</head>

<body>
  <!-- ***********
      MAIN CONTENT
    ************ -->
  <div id="login-page">
    <div class="container">

      <form class="form-login" method="post" action="{{route('nedmin.Authenticate')}}">
        @CSRF
        <h2 class="form-login-heading">sign in dshop</h2>
        <br>
        @if(Session::has('success'))
          <div class="alert alert-success">
            {{session('success')}}
          </div>
        @endif
        <div class="login-wrap">
          <input type="text" class="form-control" required name="email" placeholder="Email" autofocus value="{{old('email')}}">
          <br>
          <input type="password" class="form-control" required name="password" placeholder="Password">
          <label class="checkbox">
            <input type="checkbox" name="remember_me" {{old('remember_me') ? 'checked' : ""}}> Remember me

            </label>
          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
          @if(Session::has('error'))
            <div class="alert alert-danger">
              {{session('error')}}
            </div>
          @endif
          <div class="registration">
            Don't have an account yet?<br/>
            <a href="#">
              Create an account
              </a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="/backend/login/lib/jquery/jquery.min.js"></script>
  <script src="/backend/login/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <script type="text/javascript" src="/backend/login/lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("/backend/login/lg1.jpg", {
      speed: 600
    });
  </script>
</body>

</html>
