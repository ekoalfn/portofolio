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
                <span class="breadcrumb-item active">{{ __('Create Blog') }}</span>
            </nav>
        </div>
        <div class="row">
          
            <div class="col-lg-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-users-gear me-1 text-muted"></i> {{ __('Create Blog') }}
                        </h3>
                    </div>
                   
                    <div class="block-content block-content-full">
                        <form action="{{ route('blog.store') }}" method="POST" class="form-setting" data-toggle="validator"
                            enctype="multipart/form-data">
                            @csrf
                            @method('post')
        
                            <div class="box-body">
                                <div class="row">
                                  
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="published">
                                                Category Blog Name <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select" id="category_id" name="category_id"
                                                style="width: 100%;" data-placeholder="Choose Name" required>
                                                <option value="">Choose Category</option>     
                                                @foreach ($categoryBlogs as $item)
                                                    <option value="{{$item->id}}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="mb-4">
                                            <label class="form-label" for="published">
                                                Author <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select" id="author_id" name="author_id"
                                                style="width: 100%;" data-placeholder="Choose Author" required>
                                                <option value="">Choose Category</option>     
                                                @foreach ($users as $item)
                                                    <option value="{{$item->id}}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
        
                                        <div class="mb-4">
                                            <label class="form-label" for="example-maxlength4">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="js-maxlength form-control" id="example-maxlength4" name="title" maxlength="160"  minlength="35" placeholder="At a minimum 35" data-always-show="true" data-pre-text="Used " data-separator=" of " data-post-text=" characters" required value="{{ old('title') }}">
                                            <small>At a minimum <span class="text-success"> <b>35 words</b> </span></small>
                                            @if ($errors->has('title'))
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                            @endif
        
                                        </div>
                                        <div class="mb-4">
                                            <label for="example-description-input" class="form-label">Tags <span
                                                class="text-danger">*</span></label>
                                                <input class="form-control" type="text" data-role="tagsinput" name="tags">
                                                @if ($errors->has('tags'))
                                                <span class="text-danger">{{ $errors->first('tags') }}</span>
                                                @endif
                                        </div>
                                        <div class="mb-4">
                                        <label class="form-label mb-1" for="files">
                                             Content <span class="text-danger">*</span>
                                            <textarea name="content" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('content') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label " for="files">
                                            Feature Image <span class="text-danger">*</span>
                                            </label>
                                            <input type="file" class="form-control @error('feature_image') is-invalid @enderror" name="feature_image" id="feature_image" required>
                                            <span class="help-block with-errors"></span>
                                            <small>Feature Image <b> cannot more than 1mb </b>, with format : jpeg,jpg,png. <span class="text-danger"> <b>Size 750x433</b> </span></small>
                                            <br>
                                            <small>Feature Image names are <span class="text-danger"><b>prohibited </b></span> using <b>
                                                    #,%,\,/,?
                                                </b></small>
                                                @if ($errors->has('feature_image'))
                                                    <span class="text-danger">{{ $errors->first('feature_image') }}</span>
                                                @endif
                                        </div>
        
                                        <div class="mb-4">
                                            <label class="form-label" for="example-text-input">
                                                Seo Title
                                            </label>
                                            <input type="text" class="form-control" id="seo_title" name="seo_title"
                                                placeholder="" value="{{ old('seo_title') }}">
                                                @if ($errors->has('seo_title'))
                                                    <span class="text-danger">{{ $errors->first('seo_title') }}</span>
                                                @endif
                                        </div>
        
                                        <div class="mb-4">
                                            <label class="form-label" for="example-text-input">
                                                Seo Description
                                            </label>
                                            <input type="text" class="form-control" id="seo_description" name="seo_description"
                                                value="{{ old('seo_description') }}" placeholder="Ex. Mathematics">
                                            @if ($errors->has('seo_title'))
                                                <span class="text-danger">{{ $errors->first('seo_title') }}</span>
                                            @endif
                                        </div>
        
                                        <div class="mb-4">
                                            <label class="form-label" for="publish">
                                                Publish <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select" id="publish" name="publish"
                                                aria-label="Floating label select example" required>
                                                <option value=""> Select Publish </option>
                                                <option value="1"> Publish </option>
                                                <option value="0"> Non Publish </option>
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

