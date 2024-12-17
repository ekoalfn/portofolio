@extends('layouts.backend')

@section('title')
    Blog
@endsection
@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
@endsection
@section('content')
    <div class="content">

        <div class="d-flex flex-row-reverse bg-transparent">
            <nav class="breadcrumb push">
                <a class="breadcrumb-item" href="{{ route('admin.home') }}">{{ __('Home') }}</a>
                <a class="breadcrumb-item" href="{{ route('blog.index') }}">{{ __('List Blog') }}</a>
                <span class="breadcrumb-item active">{{ __('Update Blog') }}</span>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-users-gear me-1 text-muted"></i> {{ __('Update Blog') }}
                        </h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="{{ route('blog.update', [$blog->id]) }}" method="POST" class="form-setting" data-toggle="validator" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="published">
                                                Category Blog Name <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select" id="category_id" name="category_id"
                                                style="width: 100%;" data-placeholder="Choose Name" required>
                                                <option value="" selected>Choose Category</option>     
                                                @foreach ($categoryBlogs as $item)
                                                    <option value="{{$item->id}}" @if ($blog->category_id == $item->id)selected="selected"@endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="mb-4">
                                            <label class="form-label" for="published">
                                                Author<span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select" id="author_id" name="author_id"
                                                style="width: 100%;" data-placeholder="Choose Author" required>
                                                <option value="">Choose Category</option>     
                                                @foreach ($users as $item)
                                                    <option value="{{$item->id}}" @if ($blog->author_id == $item->id)selected="selected"@endif>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="mb-4">
                                            <label class="form-label" for="example-text-input">Title <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Ex. Mathematics" value="{{old('title', $blog->title)}}" required>
                                            @if ($errors->has('title'))
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-4">
                                            <label for="example-description-input" class="form-label">Tags <span
                                                class="text-danger">*</span></label>
                                                <input class="form-control" type="text" data-role="tagsinput" name="tags" value="{{ implode(', ', $tags) }}">
                                                @if ($errors->has('tags'))
                                                <span class="text-danger">{{ $errors->first('tags') }}</span>
                                                @endif
                                        </div>
        
                                     
                                        <textarea name="content" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{old('content', $blog->content)}}</textarea>
                                        @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('content') }}</span>
                                            @endif
                                        <div class="mb-4">
                                            <label class="form-label" for="files">
                                            Feature Image
                                            </label>
                                            @if($blog->feature_image != '')
                                                <br>
                                                <div id="logo_b_image_preview" class="d-inline-block p-3 preview">
                                                    <img width="20%" height="10%" src="{{asset('feature_image/'.$blog->feature_image)}}">
                                                </div>
                                            @endif
                                            <input type="file" class="form-control @error('feature_image') is-invalid @enderror" name="feature_image" id="feature_image">
                                            <span class="help-block with-errors"></span>
                                            <small>Feature Image <b> cannot more than 1mb </b>, with format : jpeg,jpg,png</small>
                                            <br>
                                            <small>Feature Image names are <span class="text-danger"><b>prohibited </b></span> using <b>
                                                    #,%,\,/,?
                                                </b></small>
                                            @error('feature_image')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
        
                                        <div class="mb-4">
                                            <label class="form-label" for="example-text-input">
                                                Seo Title
                                            </label>
                                            <input type="text" class="form-control" id="seo_title" name="seo_title"
                                                placeholder="Seo Title" value="{{ old('seo_title', $blog->seo_title) }}">
                                                @if ($errors->has('seo_title'))
                                                    <span class="text-danger">{{ $errors->first('seo_title') }}</span>
                                                @endif
                                        </div>
        
                                        <div class="mb-4">
                                            <label class="form-label" for="example-text-input">
                                                Seo Description
                                            </label>
                                            <input type="text" class="form-control" id="seo_description" name="seo_description"
                                                value="{{ old('seo_description', $blog->seo_description) }}" placeholder="Seo Description">
                                            @if ($errors->has('seo_description'))
                                                <span class="text-danger">{{ $errors->first('seo_description') }}</span>
                                            @endif
                                        </div>
        
                                        <div class="mb-4">
                                            <label class="form-label" for="publish">
                                                Publish <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select" id="publish" name="publish"
                                                aria-label="Floating label select example" required>
                                                <option value=""> Select Publish </option>
                                                <option value="1" {{ $blog->publish == 1 ? 'selected' : '' }}> Publish </option>
                                                <option value="2" {{ $blog->publish == 2 ? 'selected' : '' }}> Non Publish </option>
                                            </select>
                                        </div>
        
                                        <div class="box-footer">
                                            <button class="btn btn-sm  float-end  btn-primary"><i class="fa fa-save"></i>
                                                Save
                                            </button>
                                            <a class="btn btn-white  float-end btn-active-light-primary me-2"
                                                href="{{ route('blog.index') }}">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

       
    </div>
@endsection

@section('footerSection')
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{  asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
    $(function () {
     
      CKEDITOR.replace('editor1');
    });
</script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
@endsection
