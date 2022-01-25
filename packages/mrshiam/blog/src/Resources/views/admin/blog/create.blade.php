@extends('admin::layouts.content')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="offset-3 col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Blog</h3>

            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group blog-div">
                    <label for="writer_name">Writer Name</label>
                    <input type="text" name="writer_name" class="form-control" id="writer_name" value="{{old('writer_name',isset($writer)?$writer->writer_name:null)}}" placeholder="Enter writer name" required>
                    @error('writer_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group blog-div">
                    <label for="blog_title">Blog Title</label>
                    <input type="text" name="blog_title" class="form-control" id="blog_title" value="{{old('blog_title',isset($writer)?$writer->blog_title:null)}}" placeholder="Enter Blog Title" required>
                    @error('blog_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group blog-div">
                    <label for="details">Details</label>
                    <textarea name="details" class="form-control" id="details" cols="30" placeholder="Enter Full Writings..." rows="4">{{old('details',isset($writer)?$writer->details:null)}}</textarea>
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