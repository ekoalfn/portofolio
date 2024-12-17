@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="{{ asset('web/css/prism.css') }}">
@endsection
@section('content')
<!-- <style>
  pre {background-color: #f6f7f9;padding: 1rem} 
</style> -->
<section class="wrapper bg-gradient-primary">
  <div class="container py-14 py-md-16">
    <div class="row gx-lg-8 gx-xl-12">
      <div class="col-lg-8">
        <div class="blog single">
          <div class="card">
            <figure class="card-img-top"><img src="{{asset('feature_image/'.$blog->feature_image)}}" alt="" /></figure>
            
            <div class="card-body">
              <div class="classic-view">
                
                <article class="post">
                  <div class="post-content mb-5">
                    
                    <h2 class="h1 mb-4">{{$blog->title}}</h2>
                    <ul class="post-meta text-black mb-4">
                      <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{date_format($blog->created_at,"m/d/Y")}}</span></li>
                      <li class="post-author"><i class="uil uil-user"></i><a href="#" class="text-reset"><span>{{$blog->users->name}}</span></a></li>
                      <li class="post-comments"><i class="uil uil-eye"></i><a href="#" class="text-reset">{{$blog->IpTracker->count()}}<span></span></a></li>
                    </ul>
                    {!!$blog->content !!}
                  </div>
                  <!-- /.post-content -->
                  <div class="post-footer d-md-flex flex-md-row justify-content-md-between align-items-center mt-8">
                    <div>
                      <ul class="list-unstyled tag-list mb-0">
                        @foreach($blog->tags as $tag)
                          <li><a href="#" class="btn btn-soft-ash btn-sm rounded-pill mb-0">{{$tag->name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                    <div class="mb-0 mb-md-2">
                      <div class="dropdown share-dropdown btn-group">
                        <button class="btn btn-sm btn-red rounded-pill btn-icon btn-icon-start dropdown-toggle mb-0 me-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="uil uil-share-alt"></i> Share </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="https://twitter.com/share?url={{ route('web.article.detail_article',$blog->slug) }}&text={{ $blog->title }}" target="_blank"><i class="uil uil-twitter"></i>Twitter</a>
                            <a class="dropdown-item" href="https://www.facebook.com/sharer.php?u={{ route('web.article.detail_article',$blog->slug) }}"  target="_blank"><i class="uil uil-facebook-f"></i>Facebook</a>
                            <a class="dropdown-item" href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('web.article.detail_article',$blog->slug) }}"><i class="uil uil-linkedin"></i>Linkedin</a>
                        </div>
                        <!--/.dropdown-menu -->
                      </div>
                      <!--/.share-dropdown -->
                    </div>
                  </div>
                  <!-- /.post-footer -->
                </article>
                <!-- /.post -->
              </div>
              <!-- /.classic-view -->
              <hr />
              <div class="author-info d-md-flex align-items-center mb-3">
                <div class="d-flex align-items-center">
                  <figure class="user-avatar"><img class="rounded-circle" alt="" src="{{ URL::to('avatar/' . $blog->users->avatar) }}" /></figure>
                  <div>
                    <h6><a href="#" class="link-dark">{{$blog->users->name}}</a></h6>
                    <span class="post-meta fs-15">Software Engineer</span>
                  </div>
                </div>
                <div class="mt-3 mt-md-0 ms-auto">
                  {{-- <a href="#" class="btn btn-sm btn-soft-ash rounded-pill btn-icon btn-icon-start mb-0"><i class="uil uil-file-alt"></i> All Posts</a> --}}
                </div>
              </div>
              <!-- /.author-info -->
              <p>{{$blog->users->description}}</p>
              <nav class="nav social">
                <a href="{{$blog->users->twitter}}" target="_blank"><i class="uil uil-twitter"></i></a>
                  <a href="{{$blog->users->facebook}}" target="_blank"><i class="uil uil-facebook-f"></i></a>
                  <a href="{{$blog->users->instagram}}" target="_blank"><i class="uil uil-instagram"></i></a>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <aside class="col-lg-4 sidebar mt-11 mt-lg-6">
        <div class="widget">
       
          <form action="{{ route('web.article.index') }}" method="GET" class="search-form">
            <div class="form-floating mb-0">
              <input id="search-form" type="text" class="form-control" name="search" value="{{ request('search')}}"placeholder="Search">
              <label for="search-form">Search</label>
            </div>
          </form>
          <!-- /.search-form -->
        </div>
        <div class="widget">
          <h4 class="widget-title mb-3">Tekno Update</h4>
          <p>Present the latest information about technology every week</p>
          
        </div>
       
        <div class="widget">
          <h4 class="widget-title mb-3">Popular Posts</h4>
          <ul class="image-list">
          @foreach ($blogTop as $item)
            <li>
              <figure class="rounded"><a href=""><img src="{{asset('feature_image/'.$item->feature_image)}}" alt="" /></a></figure>
              <div class="post-content">
                <h6 class="mb-2"> <a class="link-dark" href="{{route('web.article.detail_article',$item->slug)}}">{{ \Illuminate\Support\Str::limit($item->title, 35, '...') }}</a> </h6>
                <ul class="post-meta">
                  <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{date_format($item->created_at,"m/d/Y")}}</span></li>
                </ul>
                <!-- /.post-meta -->
              </div>
            </li>
            @endforeach
            
          </ul>
          <!-- /.image-list -->
        </div>
        <!-- /.widget -->
        <div class="widget">
          <h4 class="widget-title mb-3">Categories</h4>
          <ul class="unordered-list bullet-primary text-reset">
            <li><a href="{{url("article")}}"> All</a></li>
            @foreach ($categories as $item)
              <li><a href="{{url("article?category=$item->slug")}}">{{$item->name}} ({{$item->blog->count()}})</a></li>
            @endforeach
          </ul>
        </div>
        
      </aside>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>


@endsection

@section('footer')
<script src="{{ asset('web/js/prism.js') }}"></script>
@endsection