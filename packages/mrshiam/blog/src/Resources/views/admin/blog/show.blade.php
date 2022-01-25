@extends('admin::layouts.content')
@section('content')
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$blog->blog_title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="row">

                        <div class="col-md-3">
                            <table class="table table-bordered">

                                <tr>
                                    <td>Writer</td>
                                    <td>{{$blog->writer_name}}</td>
                                </tr>
                                <tr>
                                    <td>Posted Time</td>
                                    <td>{{$blog->created_at}}</td>
                                </tr>


                            </table>
                        </div>
                        <div class="col-md-9">
                            <h1>{{$blog->blog_title}}</h1>
                            <img src="{{asset($blog->image)}}" alt="" width="100%">
                            <p>{{$blog->details}}</p>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </div>
        <!-- /.col -->

    </div>
@endsection
