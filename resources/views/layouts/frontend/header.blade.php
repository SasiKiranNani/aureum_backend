
        <header class="transparent">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex">
                            <div class="de-flex-col">
                                <!-- logo begin -->
                                <div id="logo">
                                    <a href="{{ route('home') }}">
                                        <img class="logo-main" src="{{ asset('frontend/images/logo.webp') }}" alt="" >
                                        <img class="logo-scroll" src="{{ asset('frontend/images/logo.webp') }}" alt="" >
                                        <img class="logo-mobile" src="{{ asset('frontend/images/logo.webp') }}" alt="" >
                                    </a>
                                </div>
                                <!-- logo close -->
                            </div>

                            <div class="de-flex-col">
                                <div class="de-flex-col header-col-mid">
                                    <ul id="mainmenu">
                                        <li>
                                            <a class="menu-item active" href="{{ route('home') }}">Home</a>
                                        </li>
                                        <li><a class="menu-item" href="">About</a></li>
                                        <li><a class="menu-item" href="">Categories</a></li>
                                        <li><a class="menu-item" href="">NewsRoom</a></li>
                                        <li><a class="menu-item" href="">Contact</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="de-flex-col">
                                <a class="btn-main fx-slide w-100" href=""><span>Login/Register</span></a>

                                <div class="menu_side_area">
                                    <span id="menu-btn"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>