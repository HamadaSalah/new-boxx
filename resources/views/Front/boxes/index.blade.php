@extends('Front.master')
@section('content')
<div class="wrapper">
 <div class="container">
   <div class="row">
    <h1 class="wp_head">        @if (app()->getLocale() == 'en')
       {{$mainbox->name_en}}
        @else
      {{$mainbox->name_ar}}
        @endif
</h1>

        @if (app()->getLocale() == 'en')
        <h4 class="boxdesc">{{$mainbox->desc_en}}</h4>
        @else
        <h4 class="boxdesc">{{$mainbox->desc_ar}}</h4>
        @endif
    <div class="col-md-4 offset-md-4 float-right" >
        <div class="box mainbox" style="margin: auto;display:block">
            <div class="box-header">
                @if (app()->getLocale() == 'en')
                <p>{{$mainbox->name_en}}</p>
                @else
                <p>{{$mainbox->name_ar}}</p>
                @endif
                <span class="price">{{$mainbox->priceto}}$</span>
            </div>
            <div class="box-body">
                <img src="{{asset('/storage/mainboxes/'.$mainbox->img)}}">
                <div id="MyCounter">
                    {{$mainbox->endDate->format('l, F d y h:i:s')}}
                    <?php
//                     $old_date = date('l, F d y h:i:s');              // returns Saturday, January 30 10 02:06:34
// $old_date_timestamp = strtotime($old_date);
// $new_date = date('Y-m-d H:i:s', $old_date_timestamp);
// echo $old_date;
                    ?>
                   </div>

            </div>
            <div class="box-footer">
                <button class="btn opennow BOXNO" style="font-weight: bold;font-size: 25px">+0</button>
            </div>
        </div>
    </div>


@isset ($boxes)

    @if ($boxes->count() >0)

    <div class="col-12 text-center" style="padding: 100px 0">
        <form method="POST" action="{{route('SelectBoxes')}}">
            @csrf
            @foreach ($boxes as  $box)
            <label  @if( $box->isPurchase() ){{"disabled"}} @endif  class="selectLabel  @if( !$box->isPurchase() ){{"selectThis"}} @else {{"DisabledButton"}} @endif " type="button" for="{{$box->id}}">
                <input @if( $box->isPurchase() ){{"disabled"}} @endif type="checkbox" name="boxes[]" id="{{$box->id}}" class="checkBOX" style="display: none" value="{{$box->id}}">
                {{$loop->index+1}}
            </label>
            @endforeach
        <div class="form-group">
            {{-- <input class="btn checkoutNow" style="margin-top: 50px" type="submit" value="Checkout Now"> --}}
            <button type="button" class="btn btn-success checkoutNow" data-toggle="modal" data-target="#exampleModalLong" disabled>@lang('site.checkoutnow')</button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog checkoutModal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">@lang('site.checkoutnow')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="text-left"><i class="fa fa-user"> </i> <label for="exampleFormControlInput1" class="form-label" > Full Name</label></div>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name...." name="full_name"  required>
                    </div>
                    <div class="mb-3">
                        <div class="text-left">
                        <i class="fa fa-envelope-open-text"> </i> <label for="exampleFormControlInput1" class="form-label"> Email</label>
                        </div>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Email...." name="email" required>
                    </div>
                    <div class="mb-3">
                        <div class="text-left">
                        <i class="fa fa-envelope-open-text"> </i> <label for="exampleFormControlInput1" class="form-label"> Phone</label>
                        </div>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Phone...." name="phone" required>
                    </div>
                    <div class="mb-3">
                        <div class="text-left">
                        <i class="fa fa-address-card"> </i> <label for="exampleFormControlInput1" class="form-label"> Address</label>
                        </div>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Address...." name="address" required>
                    </div>
                    <div class="mb-3">
                        <div class="text-left">
                        <i class="fa fa-city"> </i> <label for="exampleFormControlInput1" class="form-label"> City</label>
                        </div>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="City...." name="city" required>
                    </div>
                    <div class="mb-3">
                        <div class="text-left">
                        <i class="fa fa-university"> </i> <label for="exampleFormControlInput1" class="form-label"> State</label>
                        </div>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="State...." name="state" required>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Checkout</button>
                </div>
            </div>
            </div>
        </div>

        </form>
    </div>
    @else
    <div class="col-12 text-center" style="padding: 50px 20px 100px 20px">
        <h3 class="notice">@lang("site.The_Boxes_Is_Out_Now_You_can_Send_Your_Email_and_Will_Notice_You_when_Get_New_boxes")</h3>
        <form method="post" action="{{route('emailSend')}}">
            @csrf
            <input type="text" placeholder="Write Your Email Or Phone" class="emialOrPhone" name="email"  required>
            <input type="submit" value="Send" class="emailSend" >
        </form>
    </div>

    @endif
@else
<div class="col-12 text-center" style="padding: 50px 20px 100px 20px">
    <h3 class="notice">@lang("site.The_Boxes_Is_Out_Now_You_can_Send_Your_Email_and_Will_Notice_You_when_Get_New_boxes")</h3>
    <form method="POST" action="{{route('emailSend')}}">
        @csrf
        <input type="text" placeholder="@lang('site.write_your_email_or_phone')" class="emialOrPhone" name="email"  required>
        <input type="submit" value="@lang("site.Send")" class="emailSend" >
</form>
</div>
@endisset




    {{-- <button  class="selectThis" >
        <input type="hidden" name="boxes[]" class="selectThis" value="{{$box->id}}">
        {{$key+1}}
    </button> --}}

    {{-- <h1 class="wp_head">@lang('site.OpenMysteryBoxes') <span>@lang('site.Online')</span></h1>
     <div class="clearfix"></div>
            @foreach ($boxes as $Offerbox )
            <div class="col-md-4 col-xs-6 col-6">
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
   </div> --}}
 </div>
</div>

@endsection
{{-- @push('custome-scripts')
    <script>
        $(".selectThis").toggle(
  function(){$(this).css({"color": "red"});},
  function(){$(this).css({"color": "blue"});}
});
    </script>
@endpush --}}
