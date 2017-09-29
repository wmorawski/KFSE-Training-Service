<!DOCTYPE html>
<!--
   This is a starter template page. Use this page to start your new project from
   scratch. This page gets rid of all links and provides the needed markup only.
   -->
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{base_url('public/img/favicon.ico')}}">

    <!-- Bootstrap Core CSS -->
    <link href="{{base_url('public/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- This is Sidebar menu CSS -->
    <link href="{{base_url('public/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- This is a Animation CSS -->
    <link href="{{base_url('public/css/animate.css')}}" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="{{base_url('public/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (default.css) for this starter
         page. However, you can choose any other skin from folder css / colors .
         -->
    <link href="{{base_url('public/css/colors/default.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('headcss')

    @yield('tscript')

</head>

<body class="fix-sidebar">
<!-- Preloader -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<div id="wrapper">

    <!-- Top Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <!-- Toggle icon for mobile view -->
            <div class="top-left-part">
                <!-- Logo -->
                <a class="logo" href="/">
                    <strong>KFSE</strong>
                </a>
            </div>
            <!-- /Logo -->
            <!-- Search input and Toggle icon -->
            <ul class="nav navbar-top-links navbar-left">
                <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i class="ti-close ti-menu"></i></a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="fa icon-bell v-middle"></i>
                        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                    </a>
                    <ul class="dropdown-menu mailbox animated bounceInDown">
                        <li>
                            <div class="drop-title">Masz 4 nowe wiadomości</div>
                        </li>
                        <li>
                            <div class="message-center">
                                <a href="#">
                                    <div class="user-img"> <img src="/public/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="text-center" href="javascript:void(0);"> <strong>Zobacz wszystkie powiadomienia</strong><i class="fa fa-angle-right"></i> </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- .Task dropdown -->
            </ul>
            <!-- This is the message dropdown -->
            <ul class="nav navbar-top-links navbar-right pull-right">
                <!-- /.Task dropdown -->
                <!-- /.dropdown -->
                <li>
                    <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                        <input type="text" placeholder="Wyszukaj..." class="form-control"><a href=""><i class="fa-fw fa icon-magnifier"></i></a>
                    </form>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{$this->session->photo}}" alt="{{$this->session->username}}-avatar" width="36" class="img-circle"><b class="hidden-xs">{{$this->user->getUsername()}}</b><span class="caret"></span> </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="{{base_url('/usersss')}}" class="dw-user-box">
                                <div class="u-img">
                                    <img src="{{$this->session->photo}}" alt="{{$this->user->getUsername()}} photo" />
                                </div>
                                <div class="u-text">
                                    <h4>{{ ($this->user->getFirstName() && $this->user->getLastName()) ? $this->user->getFirstName()." ".$this->user->getLastName() : $this->user->getUsername() }}</h4>
                                    <p class="text-muted">{{$this->user->getEmail()}}</p>
                                </div>
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{base_url('usersss/friendships')}}"><i class="ti-user"></i> Lista znajomych</a></li>
                        <li><a href="{{base_url('messages')}}"><i class="ti-email"></i> Wiadomości</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{base_url('/settings/profile')}}"><i class="ti-settings"></i> Ustawienia</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{base_url('/logout')}}"><i class="fa icon-power"></i> Wyloguj się</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>

                <!-- /.dropdown -->
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- End Top Navigation -->
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
			<h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Nawigacja</span></h3></div>
			<ul class="nav" id="side-menu">
                <li><a href="{{base_url('/')}}" class="waves-effect {{set_active('welcome')}}"><i data-icon="7" class="icon-home fa-fw"></i><span class="hide-menu">Strona domowa</span></a></li>
                <li><a href="{{base_url('stats/')}}" class="waves-effect {{set_active("stats")}}"><i data-icon="7" class="icon-graph fa-fw"></i><span class="hide-menu">Statystyki</span></a></li>
                <li><a href="{{base_url('training/')}}" class="waves-effect {{set_active("training")}}"><i data-icon="7" class="icon-organization fa-fw"></i><span class="hide-menu">Treningi</span></a></li>
                <li><a href="{{base_url('matches/')}}" class="waves-effect {{set_active("matches")}}"><i data-icon="7" class="icon-game-controller fa-fw"></i><span class="hide-menu">Mecze</span></a></li>
                <li><a href="{{base_url('meetings/')}}" class="waves-effect {{set_active("meetings")}}"><i data-icon="7" class="icon-location-pin fa-fw"></i><span class="hide-menu">Spotkania</span></a></li>
                <li><a href="{{base_url('events/')}}" class="waves-effect {{set_active("events")}}"><i data-icon="7" class="icon-trophy fa-fw"></i><span class="hide-menu">Turnieje</span></a></li>
                <li><a href="{{base_url('/calendar')}}" class="waves-effect {{set_active('calendar')}}"><i data-icon="7" class="icon-calendar fa-fw"></i><span class="hide-menu">Kalendarz</span></a></li>
                <li><a href="javascript:void(0)" class="waves-effect"><i class="mdi mdi-checkbox-multiple-marked-outline fa-fw"></i><span class="hide-menu">Ustawienia<span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="javascript:void(0)" class="waves-effect"><i class="icon-people linea-basic fa-fw"></i><span class="hide-menu">Użytkownicy i Grupy</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li><a href="javascript:void(0)"><i class=" fa-fw">U</i><span class="hide-menu">Użytkownicy</span></a></li>
                                <li><a href="javascript:void(0)"><i class=" fa-fw">G</i><span class="hide-menu">Grupy</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper" style="">
        <div class="container-fluid" style="padding-right: 0; margin-right: 0;" >
            <div class="col-md-10" style="position: relative;">
                @yield('content')
            </div>
            <div class="col-md-2" style="padding-right: 0; margin-right: 0; max-height: 100%;" id="rightSidebar">
                <div class="panel panel-themecolor">
                    <div class="panel-body  user-activity">
                        <div class="steamline">
                            <div class="sl-item">
                                <div class="sl-left bg-success"> <i class="ti-user"></i></div>
                                <div class="sl-right">
                                    <div><a href="#">Tohnathan Doe</a> <span class="sl-date">5 minutes ago</span></div>
                                    <div class="desc">Contrary to popular belief</div>
                                </div>
                            </div>
                            <div class="sl-item">
                                <div class="sl-left bg-info"><i class="fa fa-image"></i></div>
                                <div class="sl-right">
                                    <div><a href="#">Hritik Roshan</a> <span class="sl-date">5 minutes ago</span></div>
                                    <div class="desc">Lorem Ipsum is simply dummy</div>
                                    <div class="row inline-photos">
                                        <div class="col-xs-4"><img class="img-responsive" alt="user" src="/public/plugins/images/small/vd1.jpg"></div>
                                        <div class="col-xs-4"><img class="img-responsive" alt="user" src="/public/plugins/images/small/vd2.jpg"></div>
                                        <div class="col-xs-4"><img class="img-responsive" alt="user" src="/public/plugins/images/small/vd3.jpg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="sl-item">
                                <div class="sl-left"> <img class="img-circle" alt="user" src="/public/plugins/images/users/sonu.jpg"> </div>
                                <div class="sl-right">
                                    <div><a href="#">Gohn Doe</a> <span class="sl-date">5 minutes ago</span></div>
                                    <div class="desc">The standard chunk of ipsum </div>
                                </div>
                            </div>
                            <div class="sl-item">
                                <div class="sl-left"> <img class="img-circle" alt="user" src="/public/plugins/images/users/ritesh.jpg"> </div>
                                <div class="sl-right">
                                    <div><a href="#">Varun Dhavan</a> <span class="sl-date">5 minutes ago</span></div>
                                    <div class="desc">Contrary to popular belief</div>
                                </div>
                            </div>
                            <div class="sl-item">
                                <div class="sl-left"> <img class="img-circle" alt="user" src="/public/plugins/images/users/govinda.jpg"> </div>
                                <div class="sl-right">
                                    <div><a href="#">Tiger Sroff</a> <span class="sl-date">5 minutes ago</span></div>
                                    <div class="desc">The generated lorem ipsum
                                        <br><a href="javascript:void(0)" class="btn m-t-10 m-r-5 btn-rounded btn-outline btn-success">Apporve</a> <a href="javascript:void(0)" class="btn m-t-10 btn-rounded btn-outline btn-danger">Refuse</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sk-chat-widgets">
                    <div class="panel panel-themecolor" style="height: 100%; border-top:1px solid rgba(120, 130, 140, 0.13);">
                        <div class="panel-body contacts">

                            <ul class="chatonline">
                                <div class="panel-heading heading-sidebar">
                                    KONTAKTY
                                </div>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2017 &copy; All Rights Reserved <strong>KFSE</strong> </footer>

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="{{base_url('public/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{base_url('public/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.slim.js"></script>
<script src="{{base_url('public/js/js.cookie.js')}}"></script>
<script src="{{base_url('/public/js/noty.min.js')}}"></script>
<script src="{{base_url('/public/js/jquery.md5.js')}}"></script>
<script src="{{base_url('/public/js/jquery.countdown.min.js')}}"></script>
<!-- Sidebar menu plugin JavaScript -->
<script src="{{base_url('public/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
<!--Slimscroll JavaScript For custom scroll-->
<script src="{{base_url('public/js/jquery.slimscroll.js')}}"></script>
<script src="{{base_url('public/js/moment-with-locales.js')}}"></script>
<!--Wave Effects -->
<script src="{{base_url('public/js/waves.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{base_url('public/js/custom.js')}}"></script>
<script src="{{base_url('public/js/app.js')}}"></script>

@yield('bscript')

</body>

</html>