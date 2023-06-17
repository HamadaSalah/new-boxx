<div>
        <div class="table-responsive">
            <table class="table user-table no-wrap">
                <thead>
                    <tr>
                        <th class="border-top-0">#</th>
                        <th class="border-top-0">Category Name</th>
                        <th class="border-top-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <form method="POST" action="{{route('admin.category.destroy', $category->id)}}" style="display: inline-block">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{Route('admin.category.edit', $category->id)}} ">
                                <button class="btn btn-success">Edit</button>
                            </a>
                        </td>

                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>


</div>
