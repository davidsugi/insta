<header class="header">
            <a href="{{ route('home') }}" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                {{ config('app.name', 'Eddy Wedding') }}
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
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