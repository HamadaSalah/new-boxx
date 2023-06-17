<nav class="navbar navbar-expand-lg navbar-dark bg-dark first-navbar">
    {{-- <a class="navbar-brand" href="/">{{WebName()}}</a> --}}
    <a class="navbar-brand" href="/"><img src="{{asset('/storage/logo/logo.png')}}" alt="" style="height: 50px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">@lang('site.home') <span class="sr-only">(current)</span></a>
        </li>
        @foreach (MainBoxes() as $box)
        @if (app()->getLocale() == 'en')
        <li class="nav-item">
            <a class="nav-link" href="{{Route('boxes', $box->id)}}">{{$box->name_en}}</a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{Route('boxes', $box->id)}}">{{$box->name_ar}}</a>
        </li>
        @endif
        @endforeach
              {{-- <li class="nav-item">
          <a class="nav-link" href="{{Route('products')}}">@lang('site.Products')</a>
        </li> --}}
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">@lang('site.HowItWork')</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">@lang('site.Blog')</a>
        </li> --}}
      </ul>
      <div class="div-inline ">
        <ul class="navbar-nav mr-auto">
            @if (LaravelLocalization::getCurrentLocale() == 'en')
            <li class="nav-item">
                <a class="nav-link languages" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                  <img src="{{asset('front/img/flag2.png')}}" class="flagicon"> العربية</a>
              </li>

            @else
            <li class="nav-item">
                <a class="nav-link languages" href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                  <img src="{{asset('front/img/ukk.png')}}" class="flagicon">EN</a>
              </li>

            @endif
          {{-- @auth('web')
          <li class="nav-item  login">
            <a class="nav-link" > <i class="fas fa-user"></i> {{auth()->user()->name}}</a>
          </li>
        @endauth --}}
        {{-- @guest
          <li class="nav-item  login">
            <a class="nav-link" href="#"  data-toggle="modal" data-target="#LoginModal" > <i class="fas fa-sign-in-alt"></i> @lang('site.login')</a>
          </li>
          <li class="nav-item login">
            <a class="nav-link" href="#"   data-toggle="modal" data-target="#RegisterModal" > <i class="fas fa-user-alt"></i> @lang('site.register')</a>
          </li>
          @endguest
          <li class="nav-item" style="position: relative">
            <span class="item-count">
                @if (session('cart'))
                {{(int)count(session('cart'))}}
                @else 0
                @endif
            </span>
            <a class="nav-link" href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i> @lang('site.Cart')</a>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>
