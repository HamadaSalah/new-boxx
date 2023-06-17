@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">All Boxes</h2>

<div class="clear"></div>

    <div class="table-responsive">
        <table class="table user-table no-wrap" id="myDTable">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">img</th>
                    <th class="border-top-0">price</th>
                    <th class="border-top-0">Date</th>
                    <th class="border-top-0">Generate Qr Code</th>
                    <th class="border-top-0">Hide / Show</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($boxes as $box)
                <tr>
                    <td>{{$box->id}}</td>
                    <td>{{$box->name ? $box->name : 'NULL'}}</td>
                    <td>
                        <a data-fancybox="gallery" href="{{asset('storage/img/boxes/'.$box->img)}}"> <img src="{{asset('storage/img/boxes/'.$box->img)}}" style="width: 50px;height: 50px;" class="img-thumbnail" alt=""></a>
                    </td>
                    <td>{{$box->price}}</td><?php $absolute = false;?>
                    <td><span class="date_green">
                        @if (now()->diffInDays(\Carbon\Carbon::createFromTimestamp(strtotime($box->end_date)), $absolute) > 0)
                        {{now()->diffInDays(\Carbon\Carbon::createFromTimestamp(strtotime($box->end_date)), $absolute)}} Days
                        @else
                        <button class="btn btn-danger">Box Time Ended</button>
                        @endif
                        </span></td>
                    <td>
                        <a href="{{Route('admin.QrCode', $box->uuid)}}"  target='_newtab'>
                            <button  class="btn btn-primary">QRCode</button>
                        </a>

                    </td>
                    <td>
                        <span class="MyToggleBtn">

                            <input value="{{$box->id}}" id="" type="checkbox" data-toggle="toggle" data-style="ios" data-onstyle="outline-success" data-offstyle="outline-danger"
                            <?php if ($box->status == 0) {
                                echo "checked";
                            } ?>>
                        </span>
                    </td>
                    <td>
                        <form style="display: inline;" action="{{route('admin.boxes.destroy', $box->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                        <a href="{{Route('admin.boxes.show', $box->id)}} ">
                            <button class="btn btn-primary"><i class="fa fa-eye"></i> show</button>
                        </a>
                        <a href="{{Route('admin.boxes.edit', $box->id)}} ">
                            <button class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</button>
                        </a>
                    </td>

                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
@push('custom-scripts')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script>
$(".MyToggleBtn").click(function() {
    $.ajax({
        type: 'POST',
        url: '{{route('admin.UpdateStatus')}}',
        data: {
            _token:"{{csrf_token()}}",
            'id': $(this).find(':input').val()
        },
        success: function(data){
                           console.log(data);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            /* implementation goes here */
                        }
    });

});

</script>
@endpush



@endsection
