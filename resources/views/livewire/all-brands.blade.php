<div>
    <div class="table-responsive">
        <table class="table user-table no-wrap">
            <thead>
                <tr>
                    <th class="border-top-0">#</th>
                    <th class="border-top-0">Brand Name</th>
                    <th class="border-top-0">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                <tr>
                    <td>{{$brand->id}}</td>
                    <td>{{$brand->name}}</td>
                    <td>
                        <button class="btn btn-danger">Delete</button>
                        <a href="{{Route('admin.brand.edit', $brand->id)}}">
                            <button class="btn btn-success">Edit</button>
                        </a>
                    </td>

                </tr>

                @endforeach
            </tbody>
        </table>
        {{ $brands->links() }}
    </div>
</div>
