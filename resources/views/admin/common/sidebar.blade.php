<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="{{asset('assets/images/logo.svg')}}" alt="logo" srcset="">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                <li class='sidebar-title'>Main Menu</li>

                <li class="sidebar-item active ">
                    <a href="index.html" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="user" width="20"></i>
                        <span>Authentication</span>
                    </a>


                    <ul class="submenu ">

                        <li>
                            <a href="auth-login.html">Login</a>
                        </li>

                        <li>
                            <a href="auth-register.html">Register</a>
                        </li>

                        <li>
                            <a href="auth-forgot-password.html">Forgot Password</a>
                        </li>

                    </ul>

                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>