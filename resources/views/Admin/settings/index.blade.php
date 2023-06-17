
@extends('Admin.master')
@section('content')
<h2 class="collectioName">All Orders</h2>
<a href="{{route('admin.settings.edit', $settings->id)}}">
<button class="btn btn-primary" style="float: right">Edit Settings</button>
</a>
<div class="clearfix"></div>
<div class="table-responsive">
    <table class="table OrdersTable">
        <tbody>
            <tr>
                <th>Website Name </th>
                <td>{{$settings->name}}</td>
            </tr>
            <tr>
                <th>logo </th>
                <td><img src="{{asset('storage/logo/logo.png')}}" alt="" width="50px"> </td>
            </tr>
            <tr>
                <th>Box Design </th>
                <td><img src="{{asset('storage/BoxImg/BoxImg.png')}}" alt="" width="50px"> </td>
            </tr>
            <tr>
                <th>Slid 1 Img </th>
                <td>{{$settings->slid1_img}}</td>
            </tr>
            <tr>
                <th>Slid 1 intro (EN) </th>
                <td>{{$settings->slid1_intro_en}}</td>
            </tr>
            <tr>
                <th>Slid 1 intro (AR) </th>
                <td>{{$settings->slid1_intro_ar}}</td>
            </tr>
            <tr>
                <th>Slid 2 Img </th>
                <td>{{$settings->slid2_img}}</td>
            </tr>
            <tr>
                <th>Slid 2 intro (EN) </th>
                <td>{{$settings->slid2_intro_en}}</td>
            </tr>
            <tr>
                <th>Slid 2 intro (AR) </th>
                <td>{{$settings->slid2_intro_ar}}</td>
            </tr>
            <tr>
                <th>Slid 3 Img </th>
                <td>{{$settings->slid3_img}}</td>
            </tr>
            <tr>
                <th>Slid 3 intro (EN) </th>
                <td>{{$settings->slid3_intro_en}}</td>
            </tr>
            <tr>
                <th>Slid 3 intro (AR) </th>
                <td>{{$settings->slid3_intro_ar}}</td>
            </tr>
            <tr>
                <th>Box Intro (EN) </th>
                <td>{{$settings->box_intro_en}}</td>
            </tr>
            <tr>
                <th>Box Intro (AR) </th>
                <td>{{$settings->box_intro_ar}}</td>
            </tr>
            <tr>
                <th>Website Status </th>
                <td>
                    <span class="MyToggleBtn">

                        <input type="checkbox" data-toggle="toggle" data-style="ios" data-onstyle="outline-success" data-offstyle="outline-danger"
                        <?php if ($settings->WebsiteStatus == 0) {
                            echo "checked";
                        } ?>>
                    </span>
                    </td>
            </tr>
            <tr>
                <th>Copy Rights (EN) </th>
                <td>{!!$settings->CopyRights_en!!}</td>
            </tr>
            <tr>
                <th>Copy Rights (AR)  </th>
                <td>{!!$settings->CopyRights_ar!!}</td>
            </tr>
        </tbody>
    </table>
</div>


@endsection

@push('custom-scripts')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endpush



