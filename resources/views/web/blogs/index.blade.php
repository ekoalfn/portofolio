@extends('layouts.app')

@section('content')

  <section class="wrapper bg-gradient-primary">
    <div class="container py-14 py-md-16">
      <div class="row gx-lg-8 gx-xl-12">
        <div class="col-lg-8">
          <div class="blog classic-view">
            <div class="blog grid grid-view">
              <div class="row isotope gx-md-8 gy-8 mb-8">
                @foreach ($blogs as $item)

                  <article class="item post col-md-6">
                    <div class="card">
                      <figure class="card-img-top overlay overlay-1 hover-scale"><a href="{{route('web.article.detail_article',$item->slug)}}"> <img src="{{asset('feature_image/'.$item->feature_image)}}" alt="" /></a>
                        <figcaption>
                          <h5 class="from-top mb-0">Read More</h5>
                        </figcaption>
                      </figure>
                      <div class="card-body">
                        <div class="post-header">
                          <div class="post-category text-line">
                            <a href="{{ url("article?category=").$item->categoryBlogs->slug }}" class="hover" rel="category">{{$item->categoryBlogs->name}}</a>
                          </div>
                          <!-- /.post-category -->
                          <h4 class="post-title mt-1 mb-0"><a class="link-dark" href="{{route('web.article.detail_article',$item->slug)}}"> {{ \Illuminate\Support\Str::limit($item->title, 45, '...') }}</a></h4>
                        </div>
                      </div>
                      <!--/.card-body -->
                      <div class="card-footer">
                        <ul class="post-meta d-flex mb-0">
                          {{-- <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{date_format($item->created_at,"d M Y")}}</span></li> --}}
                          <li class="post-author"></i><i class="uil uil-user"></i><span>{{$item->users->name}}</span></li>
                          <li class="post-likes ms-auto"><a href="#"><i class="uil uil-eye"></i>{{$item->IpTracker->count()}}</a></li>
                        </ul>
                      </div>
                      <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                  </article>
                  
                @endforeach
              </div>
            </div>
          </div>
          {{ $blogs->appends(['category' => $categorySlug])->links('vendor.pagination.custom') }}
    
      
        </div>
        <!-- /column -->
        <aside class="col-lg-4 sidebar mt-8 mt-lg-6">
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
                  <h6 class="mb-2"> <a class="link-dark" href="{{route('web.article.detail_article',$item->slug)}}">{{ \Illuminate\Support\Str::limit($item->title, 45, '...') }}</a> </h6>
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
                <li><a href="{{url("article?category=$item->slug")}}">{{$item->name}} ({{$item->blog->where('publish', 1)->count()}})</a></li>
              @endforeach
            </ul>
          </div>
          
        </aside>
        <!-- /column .sidebar -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </section>
  <!-- /section -->
@endsection