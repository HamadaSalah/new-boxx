@extends('Front.master')
@section('content')
{{-- {{ dd(count(session('cart'))) }} --}}
{{-- <div class="slider">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="MySlider">
            <div class="container">
              <div class="row">
              <div class="col-lg-7 col-md-12">
                <h1 class="intro introtop">@lang('site.mystery')<h1>
                <h1 class="intro introbtm">@lang('site.waitforyou')</h1>
              </div>
              <div class="col-lg-5 hidden-md d-none d-lg-block del_man">
                <img src="{{asset('front/img/man.png')}}"  style="margin-top: 39px;">
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="MySlider">
            <div class="container">
              <div class="row">
              <div class="col-lg-7 col-md-12">
                <h1 class="intro introtop">@lang('site.mystery') <h1>
                <h1 class="intro introbtm">@lang('site.waitforyou')</h1>
              </div>
              <div class="col-lg-5 d-none d-lg-block del_man">
                <img src="{{asset('front/img/man.png')}}"  style="margin-top: 39px;">
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="MySlider">
            <div class="container">
              <div class="row">
              <div class="col-lg-7 col-md-12">
                <h1 class="intro introtop">@lang('site.mystery') <h1>
                <h1 class="intro introbtm">@lang('site.waitforyou')</h1>
              </div>
              <div class="col-lg-5 d-none d-lg-block del_man">
                <img src="{{asset('front/img/man.png')}}"  style="margin-top: 39px;">
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div> --}}
<div class="wrapper">
 <div class="container">
   <div class="row">
    <h1 class="wp_head">@lang('site.OpenMysteryBoxes') <span>@lang('site.Online')</span></h1>
        <div class="clearfix"></div>
        @foreach (MainBoxes() as $box)
        @if (app()->getLocale() == 'en')
        <div class="col-md-4">
           <div class="box">
           <div class="box-header">
               <p>{{$box->name_en}}</p>
               <span class="price">{{$box->priceto}}$</span>
           </div>
           <div class="box-body">
               <img src="{{asset('storage/mainboxes/'.$box->img)}}">
           </div>
           <div class="box-footer">
               <a class="nav-link" href="{{Route('boxes', $box->id)}}">
               <button class="btn opennow">@lang('site.SELECTBOXNOW')</button>
               </a>
           </div>
           </div>
        </div>
        @else
        <div class="col-md-4">
            <div class="box">
            <div class="box-header">
                <p>{{$box->name_ar}}</p>
                <span class="price">{{$box->priceto}}$</span>
            </div>
            <div class="box-body">
                <img src="{{asset('storage/mainboxes/'.$box->img)}}">
            </div>
            <div class="box-footer">
                <a class="nav-link" href="{{Route('boxes', $box->id)}}">
                <button class="btn opennow">@lang('site.SELECTBOXNOW')</button>
                </a>
            </div>
            </div>
         </div>

        @endif
        @endforeach
   {{-- <div class="col-md-4">
    <div class="box">
    <div class="box-header">
        <p>@lang('site.GOLDENBOX')</p>
        <span class="price">2000$</span>
    </div>
    <div class="box-body">
        <img src="{{asset('storage/BoxImg/BoxImg.png')}}">
    </div>
    <div class="box-footer">
        <a class="nav-link" href="{{Route('boxes', 'gold')}}">
        <button class="btn opennow ">@lang('site.SELECTBOXNOW')</button>
        </a>
    </div>
    </div>
</div>
<div class="col-md-4">
    <div class="box">
    <div class="box-header">
        <p>@lang('site.VIPBOX')</p>
        <span class="price">3000$</span>
    </div>
    <div class="box-body">
        <img src="{{asset('storage/BoxImg/BoxImg.png')}}">
    </div>
    <div class="box-footer">
        <a class="nav-link" href="{{Route('boxes', 'vip')}}">
            <button class="btn opennow">@lang('site.SELECTBOXNOW')</button>
        </a>
    </div>
    </div>
</div> --}}

     {{-- <div class="themain" style="width: 100%">
         <div class="sliderSlickerr">
            @foreach ($Offerboxes as $Offerbox )
            <div>
                <div class="box">
                <div class="box-header">
                    <p>{{$Offerbox->name}}</p>
                    <span class="price">{{$Offerbox->price}}$</span>
                </div>
                <div class="box-body">
                    <img src="{{asset('storage/img/boxes/'.$Offerbox->img)}}">
                </div>
                <div class="box-footer">
                        <button class="btn opennow OrderNow" value="{{$Offerbox->id}}">ADD TO CART</button>
                </div>
                </div>
           </div>
           @endforeach

        </div>
     </div> --}}


      {{-- <div class="col-12">
        <p class="box-type">@lang('site.hotboxes')</p>
      </div> --}}
      {{-- <div class="themain" style="width: 100%">
        <div class="sliderSlickerr">
           @foreach ($HotBoxes as $Offerbox )
           <div>
               <div class="box">
               <div class="box-header">
                   <p>{{$Offerbox->name}}</p>
                   <span class="price">{{$Offerbox->price}}$</span>
               </div>
               <div class="box-body">
                   <img src="{{asset('storage/img/boxes/'.$Offerbox->img)}}">
               </div>
               <div class="box-footer">
                <button class="btn opennow OrderNow" value="{{$Offerbox->id}}">ADD TO CART</button>
               </div>
               </div>
          </div>
          @endforeach

       </div>
    </div> --}}

   </div>
 </div>
</div>

@endsection
