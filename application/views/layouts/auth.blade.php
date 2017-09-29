<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{base_url('public/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{base_url('public/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{base_url('public/css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{base_url('public/css/colors/blue.css')}}" id="theme"  rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId: '1520644794645847',
        cookie: true, // This is important, it's not enabled by default
        version: 'v2.2'
      });
    };

    (function(d, s, id){
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
    <div class="login-box login-sidebar">
        <div class="white-box">
            @yield('content')
        </div>
    </div>
</section>
<!-- jQuery -->
<script src="{{base_url('public/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{base_url('public/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{base_url('public/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>

<!--slimscroll JavaScript -->
<script src="{{base_url('public/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{base_url('public/js/waves.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{base_url('public/js/custom.min.js')}}"></script>
<script src="{{base_url('public/js/auth.js')}}"></script>
<script src="{{base_url('public/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>

</body>
</html>
