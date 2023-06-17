
@extends('Admin.master')
@section('content')
<h2 class="collectioName">All Main Boxes</h2>
<a href="{{route('admin.mainboxes.create')}}" style="float: right">
    <button class="btn btn-primary mb-4">Add New Main Box</button>
</a>

<div class="clearfix"></div>
<div class="table-responsive">
    @if ($boxes->count() > 0)
    <table class="table user-table no-wrap" id="myDTable">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">Box Name EN</th>
                <th class="border-top-0">Box Name AR</th>
                <th class="border-top-0">IMG</th>
                <th class="border-top-0">Price</th>
                <th class="border-top-0">End Date</th>
                <th class="border-top-0">Views</th>
                <th class="border-top-0">Status</th>
                <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($boxes as $key => $box)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$box->name_en}}</td>
                <td>{{$box->name_ar}}</td>
                <td>
                    <a data-fancybox="gallery" href="{{asset('storage/mainboxes/'.$box->img)}}"> <img src="{{asset('storage/mainboxes/'.$box->img)}}" style="width: 50px;height: 50px;" class="img-thumbnail" alt=""></a>
                </td>
                <td>from {{$box->pricefrom}}$ to {{$box->priceto}}$</td>
                <td>{{$box->endDate}}</td>
                <td>{{$box->views}}</td>
                <td>
                    <span class="MyToggleBtn">
                    <input value="{{$box->id}}" id="" type="checkbox" data-toggle="toggle" data-style="ios" data-onstyle="outline-success" data-offstyle="outline-danger"
                    <?php if ($box->status == 0) {
                        echo "checked";
                    } ?>>
                    </span>
                </td>
                <td>
                    <form style="display: inline;" action="{{route('admin.mainboxes.destroy', $box->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                    <a href="{{Route('admin.mainboxes.edit', $box->id)}} ">
                        <button class="btn btn-primary"> <i class="fa fa-eye"> </i> Edit</button>
                    </a>
                </td>

            </tr>

            @endforeach
        </tbody>
    </table>

    @else
    <p style="text-align: center">No Boxes</p>
    @endif
</div>
@push('custom-scripts')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script>
$(".MyToggleBtn").click(function() {
    $.ajax({
        type: 'POST',
        url: '{{route('admin.UpdateStatusMain')}}',
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
