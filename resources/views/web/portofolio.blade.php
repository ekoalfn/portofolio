@extends('layouts.app')

@section('content')
<section id="portfolio">
  <div class="wrapper bg-gray">
    <div class="container py-15 py-md-17 text-center">
      <div class="row">
        <div class="col-lg-11 col-xl-10 mx-auto mb-10">
          <h2 class="fs-16 text-uppercase text-muted text-center mb-3">Portofolio</h2>
          <h3 class="display-3 text-center px-lg-5 px-xl-10 px-xxl-16 mb-0">Elegantly designed, expertly engineered, and highly reliable.</h3>
        </div>
      </div>
      <!-- /.row -->
      <div class="grid grid-view projects-masonry">
        <div class="isotope-filter filter mb-10">
          <ul>
            <li><a class="filter-item active" data-filter="*">All</a></li>
            <li><a class="filter-item" data-filter=".web">Web</a></li>
            <li><a class="filter-item" data-filter=".mobile">Mobile</a></li>
          </ul>
        </div>
        <div class="grid grid-view projects-masonry">
          <div class="row gx-md-8 gy-10 gy-md-13 isotope">
            @foreach ($portfolios as $porto)
              @php
                  $categories = implode(' ', $porto['category']);
              @endphp
              <div class="project item col-md-6 col-xl-4 {{$categories}}">
                <figure class="rounded mb-6"><img src="{{ $porto['image'] }}" srcset="{{ $porto['image'] }}" alt="" /><a class="item-link" href="{{ $porto['image'] }}" data-glightbox data-gallery="projects-group"><i class="uil uil-focus-add"></i></a></figure>
                <div class="project-details d-flex justify-content-center flex-column">
                  <div class="post-header">
                    <h2 class="post-title h3 fs-22"><a href="{{$porto['url']}}"  target="_blank" class="link-dark">{{ $porto['title'] }}</a></h2>
                    <div class="post-category text-ash">{{ $porto['description'] }}</div>
                  </div>
                  <!-- /.post-header -->
                </div>
                <!-- /.project-details -->
              </div>
            @endforeach
    
            
          </div>
          <!-- /.row -->
        </div>

        <!-- /.row -->
      </div>
      <!-- /.grid -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.wrapper -->
</section>

@endsection