            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link notifyLink" data-toggle="dropdown">
                                    <i class="nc-icon nc-bell-55"></i>
                                    @if (auth()->user())
                                    @if (auth()->user()->unreadNotifications->count()>0)
                                    <span class="notification">{{ auth()->user()->unreadNotifications->count() }}</span>
                                    @endif

                                    @endif
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                @if (auth()->user())
                                <ul class="dropdown-menu">
                                    @foreach(auth()->user()->notifications()->limit(5)->get() as $notification)
                                    <a class="dropdown-item waves-effect waves-light" href="{{route('admin.orders.show', $notification->data['id'])}}">
                                        {!! $notification->data['title'] !!}
                                        <p class="abouttime"> {{ $notification->created_at->diffForHumans()}}</p>
                                    </a>

                                @endforeach
                                @endif
                                </ul>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
