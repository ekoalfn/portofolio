@extends('layouts.backend')

@section('content')

<div class="content">
    <div class="d-flex flex-row-reverse">
        <nav class="breadcrumb push bg-transparent">
            <a class="breadcrumb-item" href="{{ route('admin.home') }}">{{ __('Home') }}</a>
            <a class="breadcrumb-item" href="{{ route('blog.index') }}">{{ __('List Blog') }}</a>
            <span class="breadcrumb-item active">{{ __('Detail Blog') }}</span>
        </nav>
    </div>

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <div class="d-flex gap-4 align-items-center">
                <h3 class="block-title"></i>Detail Blog
                </h3>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-hover table-vcenter">
                <tbody>
                    <tr>
                        <td>Category Blog Name</td>
                        <td>:</td>
                        <td>{{$blog->categoryBlogs->name}}</td>
                    </tr>
                    <tr>
                        <td>Author</td>
                        <td>:</td>
                        <td>{{$blog->users->name}}</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>:</td>
                        <td>{{$blog->title}}</td>
                    </tr>
                    <tr>
                        <td>Content</td>
                        <td>:</td>
                        <td>{!! $blog->content !!}</td>
                    </tr>
                    <tr>
                        <td>Feature Image</td>
                        <td>:</td>
                        <td>
                            <div id="logo_b_image_preview" class="d-inline-block p-3 preview">
                                <img width="20%" height="10%" src="{{asset('feature_image/'.$blog->feature_image)}}">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Seo Title</td>
                        <td>:</td>
                        <td>{{$blog->seo_title}}</td>
                    </tr>
                    <tr>
                        <td>Seo Description</td>
                        <td>:</td>
                        <td>{{$blog->seo_description}}</td>
                    </tr>
                    <tr>
                        <td>Publish</td>
                        <td>:</td>
                        <td>
                            @if ($blog->publish == 1)
                                Publish
                            @else
                                Not Publish
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection