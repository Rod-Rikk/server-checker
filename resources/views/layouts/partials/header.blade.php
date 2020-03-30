<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                {{-- <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search"
                        placeholder="Search for datas &amp; reports...">
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form> --}}

                @guest
                <div class="content text-uppercase" style="margin-left:90%;font-family:'Nunito Sans'">
                    <h5 class="name">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </h5>
                </div>
                @if(Route::has('Register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif

                @else
                <div class="header-button float-right" style="margin-left:900px">
                    <div class="noti-wrap">

                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <span class="quantity">{{Auth::user()->notifications->count()}}</span>
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>You have {{Auth::user()->notifications->count()}} Notifications</p>
                                </div>
                                @foreach (Auth::user()->notifications as $notification)
                                <div class="notifi__item">
                                    <div class="bg-c1 img-cir img-40">
                                        <i class="zmdi zmdi-email-open"></i>
                                    </div>
                                    <div class="content">
                                        @if ($notification->type == 'App\Notifications\SiteOffline')
                                        <p>Your {{$notification->data['server']}} server is offline</p>
                                        @endif
                                        <span class="date">{{$notification->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                                @endforeach


                                <div class="notifi__footer">
                                    <a href="#">All notifications</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="images/icon/avatar-01.jpg" alt="John Doe">
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">{{Auth::user()->name}}</a>
                                        </h5>
                                        <span class="email">{{Auth::user()->email}}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();"> <i
                                            class="zmdi zmdi-power"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endguest

            </div>
        </div>
    </div>
</header>