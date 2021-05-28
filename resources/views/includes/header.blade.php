<!-- Top header -->
<div class="top-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <h1>OSFY</h1>
                        <!-- <img src="img/logo.jpg" alt="Logo"> -->
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 d-none d-lg-block">
                <div class="row">
                    <div class="col-4">
                        <div class="top-bar-item">
                            <div class="top-bar-icon">
                                <i class="flaticon-calendar"></i>
                            </div>
                            <div class="top-bar-text">
                                <h3>Working hours</h3>
                                <p>Mon - Fri 8:00h - 18:00h</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="top-bar-item">
                            <div class="top-bar-icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <div class="top-bar-text">
                                <h3>Contact-us</h3>
                                <p>+216 25 470 729</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="top-bar-item">
                            <div class="top-bar-icon">
                                <i class="flaticon-send-mail"></i>
                            </div>
                            <div class="top-bar-text">
                                <h3>Email-us</h3>
                                <p>benahmedabdelhamid345@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bottom header -->
<div class="nav-bar">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    @guest
                    <a href="{{ url('/') }}" class="nav-item nav-link @if(Request::is('/')) active @endif">Home</a>
                    @else 
                    <a href="{{ url('/home') }}" class="nav-item nav-link @if(Request::is('/home')) active @endif">Home</a>

                    @endif
                    <a href="{{ url('/#service') }}" class="nav-item nav-link">Services</a>
                    @if(Auth::check())
                        <a href="{{ url('appointments') }}" class="nav-item nav-link @if(Request::is('appointments')) active @endif)">Appointments</a>
                    @endif
                </div>
                <div class="ml-auto">
                    @guest
                    <a class="btn btn-login" href="{{ url('login') }}">Login</a>
                    <a class="btn " href="{{ url('register') }}">Register</a>
                    @else 
                        <a class=" " style="font-weight: bold; color: white" href="{{ url('profile') }}">
                            {{ Auth::user()->name  }}
                        </a>
                        <a class="btn" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</div>