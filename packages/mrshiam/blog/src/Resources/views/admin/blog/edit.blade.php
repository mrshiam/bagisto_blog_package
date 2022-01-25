@extends('admin::layouts.content')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="offset-3 col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Blog</h3>

            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('blog.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group blog-div">
                    <label for="writer_name">Writer Name</label>
                    <input type="text" name="writer_name" class="form-control" id="writer_name" value="{{$blog->writer_name}}">
                    @error('writer_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group blog-div">
                    <label for="blog_title">Blog Title</label>
                    <input type="text" name="blog_title" class="form-control" id="blog_title" value="{{$blog->blog_title}}">
                    @error('blog_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group blog-div">
                    <label for="details">Details</label>
                    <textarea name="details" class="form-control" id="details" cols="30" placeholder="Enter Full Writings..." rows="4">{{$blog->details}}</textarea>
                    @error('details')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group blog-div">
                    <label for="image">Blog's Photo</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>
    <!--/.col (left) -->

</div>
@endsection
