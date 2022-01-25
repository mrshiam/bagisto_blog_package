@extends('admin::layouts.content')
@section('content')
<div class="row">
    <!-- /.col -->
    <div class="col-md-12">

        <div class="card">
            <div class="card-header" style="display: flex; justify-content: space-between;">
                <h3 class="card-title">List of Blogs</h3>
                <a href="{{route('blog.create')}}" class="btn btn-sm btn-outline-info">Add New Blog</a>

            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Writer's Name</th>
                            <th style="width: 40px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $serial++ }}</td>
                            <td>{{$blog->blog_title}}</td>
                            <td>{{$blog->writer_name}}</td>
                            <td>
                                <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{route('blog.show',$blog->id)}}" class="btn btn-info btn-sm">Details</a>
                                <form action="{{route('blog.delete', $blog->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are sure to delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $blogs->links() !!}
        </div>
    </div>
    <!-- /.col -->

</div>
@endsection