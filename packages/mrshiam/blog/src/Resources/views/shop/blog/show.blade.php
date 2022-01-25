@extends('shop::layouts.master')

@section('page_title')
    Package Blog
@stop

@section('content-wrapper')

    <div class="main">
        <div class="row">
            <div class="col-md-8 offset-3">
                <h2>{{$blog->blog_title}}</h2>
                <p class="post-meta">
                    Posted by
                    <a href="#">{{$blog->writer_name}}</a>
                    on {{$blog->created_at}}
                </p>
                <hr>
                    <div class="post-preview">
                        <div class="blog-image">
                            <img src="{{asset($blog->image)}}" alt="" width="100%">
                        </div>
                        <div class="blog-image">
                            {{$blog->details}}
                        </div>

                    </div>

            </div>


        </div>
    </div>

@stop