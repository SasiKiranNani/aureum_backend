<header class="transparent">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex">
                    <div class="de-flex-col">
                        <!-- logo begin -->
                        <div id="logo">
                            <a href="{{ route('home') }}">
                                <img class="logo-main" src="{{ asset('logo.png') }}" alt="">
                                <img class="logo-scroll" src="{{ asset('logo.png') }}" alt="">
                                <img class="logo-mobile" src="{{ asset('logo.png') }}" alt="">
                            </a>
                        </div>
                        <!-- logo close -->
                    </div>

                    <div class="de-flex-col">
                        <div class="de-flex-col header-col-mid">
                            <ul id="mainmenu">
                                <li>
                                    <a class="menu-item {{ Route::is('home') ? 'active' : '' }}"
                                        href="{{ route('home') }}">Home</a>
                                </li>
                                <li><a class="menu-item {{ Route::is('about-us') ? 'active' : '' }}"
                                        href="{{ route('about-us') }}">About</a></li>
                                <li><a class="menu-item {{ Route::is('categories') ? 'active' : '' }}"
                                        href="{{ route('categories') }}">Categories</a></li>
                                <li><a class="menu-item {{ Route::is('judges') ? 'active' : '' }}"
                                        href="{{ route('judges') }}">Judges</a></li>
                                <li><a class="menu-item {{ Route::is('past-winners') ? 'active' : '' }}"
                                        href="{{ route('past-winners') }}">Winners</a></li>
                                <li><a class="menu-item {{ Route::is('award-trophy') ? 'active' : '' }}"
                                        href="{{ route('award-trophy') }}">Award Trophy</a></li>
                                <li><a class="menu-item {{ Route::is('contact-us') ? 'active' : '' }}"
                                        href="{{ route('contact-us') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="de-flex-col">
                        @guest
                            <a class="btn-main fx-slide w-100" href="javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#authModal">
                                <span class="auth-icon-wrap">
                                    <i class="fa fa-user auth-btn-icon"></i>
                                </span>
                                <span class="auth-btn-text">Login/Register</span>
                            </a>
                        @endguest

                        @auth
                            <div class="header-profile-dropdown">
                                <div class="profile-trigger">
                                    <div class="profile-icon">
                                        <i class="fa fa-user-circle"></i>
                                    </div>
                                    <div class="profile-info">
                                        <span class="user-name">{{ Auth::user()->name }}</span>
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="profile-menu">
                                    <div class="menu-header">
                                        <div class="menu-user-img">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <div class="menu-user-info">
                                            <span class="name">{{ Auth::user()->name }}</span>
                                            <span class="email">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                    <ul class="menu-list">
                                        <li>
                                            <a href="{{ route('dashboard') }}">
                                                <i class="fa fa-th-large"></i>
                                                Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                class="logout-link">
                                                <i class="fa fa-sign-out"></i>
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endauth

                        <div class="menu_side_area">
                            <span id="menu-btn"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    window.isUserLoggedIn = {{ Auth::check() ? 'true' : 'false' }};

    document.addEventListener('DOMContentLoaded', function () {
        // Nomination Auth Check (Auth -> Season Check)
        const nomLinks = document.querySelectorAll('.auth-check-nomination');
        nomLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                if (!window.isUserLoggedIn) {
                    e.preventDefault();
                    e.stopImmediatePropagation(); // Stop other handlers (like season check)
                    var authModal = new bootstrap.Modal(document.getElementById('authModal'));
                    authModal.show();
                }
            });
        });

        // Judge Application Auth Check (Auth Only)
        const judgeLinks = document.querySelectorAll('.auth-check-judge');
        judgeLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                if (!window.isUserLoggedIn) {
                    e.preventDefault();
                    var authModal = new bootstrap.Modal(document.getElementById('authModal'));
                    authModal.show();
                }
            });
        });
    });
</script>