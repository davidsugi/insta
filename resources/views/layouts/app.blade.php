<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
       <title> @yield('title') </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    @yield('ext')
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="{{ route('home') }}" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                {{ config('app.name', 'Eddy Wedding') }}
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
               
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                       
                        @guest
                        <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                                <span>Guest<i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                            <li class="user-header bg-light-blue">
                                Logged in as Guest
                            </li>
                            <li class="user-footer">
                                <a href="{{ route('login') }}"class="btn btn-default btn-flat"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                                    </li>
                            </ul>
                        </li>
                        @else
                                     <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>{{ Auth::user()->name }}<i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        {{ Auth::user()->name }}
                                        <small>{{ Auth::user()->email }}</small>
                                    </p>
                                </li>
                                
                                <li class="user-footer">
                        <!-- Authentication Links -->

                                     <div class="pull-left">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('home') }}" class="btn btn-default btn-flat">Dashboard</a>
                                    </div>
                        @endguest
                                 </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                
                <section class="content-header">
                    <h1>
                        @yield('Header')
                        {{-- <small>Control panel</small> --}}
                    </h1>
                    <ol class="breadcrumb">
                        @yield('bread')
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>
@stack('script')

<script type="text/javascript">
    $('div.alert').not('.alert-important').delay(3000).slideUp(300)
</script>
    </body>
</html>