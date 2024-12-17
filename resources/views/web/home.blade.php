@extends('layouts.app')

@section('content')

<!--<section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-400 bg-content text-white" data-image-src="./web/img/photos/bg13.jpg">-->
    
<section class="wrapper image-wrapper bg-blue-cahyo bg-content text-white">
  <div class="container pt-12 pt-md-14 pb-14 pb-md-16"  style="z-index: 5; position:relative">
    <div class="row gy-10 gy-md-13 gy-lg-0 align-items-center">
      <div class="col-md-8 col-lg-5 d-flex position-relative mx-auto" data-cues="slideInDown" data-group="header">
        <div class="img-mask mask-1" style="width: 500px"><img src="./web/img/photos/cahyo-upwork.png" srcset="./web/img/photos/cahyo-upwork.png 2x" alt="" /></div>
        <div class="card shadow-lg position-absolute" style="bottom: 10%; right: 2%;">
          <div class="card-body py-4 px-5">
            <div class="d-flex flex-row align-items-center">
              <div>
                <img src="./web/img/icons/lineal/check.svg" class="svg-inject icon-svg icon-svg-sm text-primary mx-auto me-3" alt="" />
              </div>
              <div>
                <h3 class="counter mb-0 text-nowrap">200+</h3>
                <h4 class="fs-14 lh-sm mb-0 text-nowrap text-grey">Projects Done</h4>
              </div>
            </div>
          </div>
          <!--/.card-body -->
        </div>
        <!--/.card -->
      </div>
      <!--/column -->
      <div class="col-lg-6 offset-lg-1 col-xxl-5 text-center text-lg-start" data-cues="slideInDown" data-group="page-title" data-delay="600">
        <h1 class="display-1 mb-5 text-white">Hi, I'm Cahyo Saputro</h1>
        <p class="lead fs-18 lh-sm mb-7 px-md-10 px-lg-0 text-white">A Senior Full stack developer with over 7 years of experience and more than 200 projects under my belt. I am curious and open-minded, always eager to learn and adapt to new technologies. With a background in web services & programming. I have successfully completed more than 200+ projects utilizing the latest technologies such as Laravel, VueJs, ExpressJs, NextJs, and NuxtJs. I am ready to collaborate with you!.</p>
        <div class="d-flex justify-content-center justify-content-lg-start" data-cues="slideInDown" data-group="page-title-buttons" data-delay="900">
          <span><a href="https://api.whatsapp.com/send/?phone=6285740322375" target="_blank" class="btn btn-lg btn-green-cahyo rounded-pill me-2">Whatsapp </a></span>
          
          <span><a href="https://www.upwork.com/freelancers/~01a593edbb46b2e4d1" target="_blank" class="btn btn-lg btn-outline-white rounded-pill">Upwork</a></span>
        </div>
      </div>
      <!--/column -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->

<section class="wrapper bg-light">
  <div class="container py-14 py-md-16 text-center">
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
        <h3 class="display-4 mb-10 px-xl-10">My Services</h3>
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
    <div class="position-relative">
      <div class="shape rounded-circle bg-soft-blue rellax w-16 h-16" data-rellax-speed="1" style="bottom: -0.5rem; right: -2.2rem; z-index: 0;"></div>
      <div class="shape bg-dot yellow rellax w-16 h-17" data-rellax-speed="1" style="top: -0.5rem; left: -2.5rem; z-index: 0;"></div>
      <div class="row gx-md-5 gy-5 text-center">
        <!--/column -->
        <div class="col-md-6 col-xl-3">
          <div class="card shadow-lg ">
            <div class="card-body ">
              <img src="./web/img/icons/lineal/menu.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
              <h4>Laravel Development</h4>
              <p class="mb-2">I have more than 7+ years of experience in Laravel technologies, skilled in developing responsive and interactive web applications.</p>
            </div>
            <!--/.card-body -->
          </div>
          <!--/.card -->
        </div>
        <!--/column -->
        <div class="col-md-6 col-xl-3 ">
          <div class="card shadow-lg bg-blue-cahyo">
            <div class="card-body">
              <img src="./web/img/icons/lineal/browser.svg" class="svg-inject icon-svg icon-svg-sm text-white  mb-3" alt="" />
              <h4 class="text-white">VueJS Development</h4>
              <p class="mb-2 text-white">I have deep experience in software development with the platform Vue.js, also  Express.js, React, and Node.js.</p>
            </div>
            <!--/.card-body -->
          </div>
          <!--/.card -->
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="card shadow-lg">
            <div class="card-body">
              <img src="./web/img/icons/lineal/analytics.svg" class="svg-inject icon-svg icon-svg-sm text-primary mb-3" alt="" />
              <h4>Wordpress Development</h4>
              <p class="mb-2">I have experience with WordPress using Elementor, creating custom templates, converting HTML to WordPress, and developing plugins.</p>
            </div>
            <!--/.card-body -->
          </div>
          <!--/.card -->
        </div>
        <div class="col-md-6 col-xl-3">
          <div class="card shadow-lg bg-blue-cahyo">
            <div class="card-body">
              <img src="./web/img/icons/lineal/web.svg" class="svg-inject icon-svg icon-svg-sm text-primary mb-3" alt="" />
              <h4 class='text-white'>Restful API Development</h4>
              <p class="mb-2 text-white">Experienced in Restful Development skilled in crafting custom web applications, seamless integration of functionalities, and third-party API integration.</p>
            </div>
            <!--/.card-body -->
          </div>
          <!--/.card -->
        </div>
        <!--/column -->
      </div>
      <!--/.row -->
    </div>
    <!-- /.position-relative -->
  </div>
  <!-- /.container -->
</section>
<!-- /section -->

<section class="wrapper bg-light">
  <div class="container py-14 py-md-16">
    <div class="row gx-md-8 gx-xl-12 gy-10">
      <div class="col-lg-5 mx-auto">
        <h2 class="display-2 mb-3">My Experiences</h2>
        <p class="lead fs-24 pe-xxl-8">I've had the pleasure to work with companies across a variety of industries. I am curious and open-minded, always eager to learn and adapt to new technologies</p>
        <a href="{{route('web.portofolio')}}" class="btn btn-primary-cahyo btn-icon btn-icon-end mt-2">See Portofolio<i class="uil uil-arrow-up-right"></i></a>
      </div>
      <!--/column -->
      <div class="col-lg-7">
        <ul class="timeline">
          <li class="timeline-item">
            <div class="timeline-info meta fs-14">September 2024 - Present</div>
            <div class="timeline-marker"></div>
            <div class="timeline-content">
              <h3 class="timeline-title">Full Time Freelance</h3>
              <p>As a Full-Time Freelance Full Stack Developer, I dedicate myself to delivering comprehensive solutions across the entire stack, leveraging my expertise and experience to meet project requirements efficiently and effectively.</p>
            </div>
          </li>
          <li class="timeline-item">
            <div class="timeline-info meta fs-14">Jan 2023 - Jul 2024</div>
            <div class="timeline-marker"></div>
            <div class="timeline-content">
              <h3 class="timeline-title">Head Of Programmer</h3>
              <h4 class="timeline-title">Ministry of Agrarian Affairs and Spatial Planning/National Land Agency</h4>
              <p>I build app & internal administration system as remote programmer (freelancer) specified in Purworejo Regency and Semarang Regency</p>
            </div>
          </li>
          <li class="timeline-item">
            <div class="timeline-info meta fs-14">Jun 2019 - Dec 2022</div>
            <div class="timeline-marker"></div>
            <div class="timeline-content">
              <h3 class="timeline-title">Senior Stack Developer</h3>
              <h4 class="timeline-title">Nine Dragon Labs</h4>
              <p>Ninedragonlabs was founded 6 years ago, serving dozens of clients in more than 5 countries around the world. Trusted by developing companies and has a team with superior competence in the fields of front-end, back-end, UI/UX Design, Technology consultants, and Blockchain (smart contract) Developers.</p>
            </div>
          </li>
        </ul>
      </div>
      <!--/column -->
    </div>
  </div>
</section>

<section class="wrapper">
  <div class="container py-14 py-md-16">
    <div class="row">
      <div class="col-lg-11 col-xl-10 mx-auto mb-10">
        <h2 class="fs-16 text-uppercase text-muted text-center mb-3">Portofolio</h2>
        <h3 class="display-3 text-center px-lg-5 px-xl-10 px-xxl-16 mb-0">Elegantly Designed, Expertly Engineered, and Highly Reliable.</h3>
      </div>
      <!-- /column -->
    </div>
    <!-- /.row -->
    <div class="grid grid-view projects-masonry">
        <div class="row gx-md-8 gy-10 gy-md-13 isotope">
            @foreach($portfolios as $portfolio)
                <div class="project item col-md-6 col-xl-4 {{ implode(' ', $portfolio['category']) }}">
                    <figure class="rounded mb-6">
                        <img src="{{ $portfolio['image'] }}" srcset="{{ $portfolio['image'] }}" alt="" />
                        <a class="item-link" href="{{ $portfolio['image'] }}" data-glightbox data-gallery="projects-group">
                            <i class="uil uil-focus-add"></i>
                        </a>
                    </figure>
                    <div class="project-details d-flex justify-content-center flex-column">
                        <div class="post-header">
                            <h2 class="post-title h3 fs-22">
                                <a href="{{ $portfolio['url'] }}" target="_blank" class="link-dark">{{ $portfolio['title'] }}</a>
                            </h2>
                            <div class="post-category text-ash">{{ $portfolio['description'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    
        <div class="text-center mt-10">
            <a href="{{route('web.portofolio')}}" class="btn btn-lg btn-primary-cahyo rounded-pill">More Portofolio</a>
        </div>
    </div>
  </div>
  <!-- /.container -->
</section>
<!-- /section -->
<!-- /section -->

  <section class="wrapper bg-light">
      <div class="container py-14 py-md-16">
          <h2 class="display-4 mb-3 text-center">Testimonials</h2>
          <p class="lead text-center mb-6 px-md-16 px-lg-0">My Objective is customer satisfaction. What Customers say about our work</p>
          <div class="position-relative">
          <div class="shape rounded-circle bg-soft-yellow rellax w-16 h-16" data-rellax-speed="1" style="bottom: 0.5rem; right: -1.7rem;"></div>
          <div class="shape bg-dot primary rellax w-16 h-16" data-rellax-speed="1" style="top: -1rem; left: -1.7rem;"></div>
          <div class="swiper-container dots-closer mb-6" data-margin="0" data-dots="true" data-items-xl="3" data-items-md="2" data-items-xs="1">
              <div class="swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="item-inner">
                        <div class="card">
                        <div class="card-body">
                           <span class="ratings five mb-3"></span>
                            <blockquote class="icon mb-0">
                            <p>“Professional and well organized. You planed a step by step in trello and completed nice & quickly. You have good management and progress.”</p>
                            <div class="blockquote-details">
                                <img class="rounded-circle w-12" src="./web/img/avatars/ninedragonlabs-michael.jpg" srcset="./web/img/avatars/ninedragonlabs-michael.jpg" alt="" />
                                <div class="info">
                                <h5 class="mb-1">Michael kravc</h5>
                                <p class="mb-0">Road To Virtuosity</p> 
                                </div>
                            </div>
                            </blockquote>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                  </div>
                <div class="swiper-slide">
                    <div class="item-inner">
                        <div class="card">
                        <div class="card-body">
                           <span class="ratings five mb-3"></span>
                            <blockquote class="icon mb-0">
                            <p>“Professional, The work has been done very well. The work is done with great patience so that customer satisfaction is guaranteed. The value of the money spent is very much paid off with satisfying results.”</p>
                            <div class="blockquote-details">
                                <img class="rounded-circle w-12" src="./web/img/avatars/turai.PNG" srcset="./web/img/avatars/turai.PNG" alt="" />
                                <div class="info">
                                <h5 class="mb-1">Turai</h5>
                                <p class="mb-0">Agrommunity</p> 
                                </div>
                            </div>
                            </blockquote>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="item-inner">
                        <div class="card">
                        <div class="card-body">
                          <span class="ratings five mb-3"></span>
                            <blockquote class="icon mb-0">
                            <p>“Talented and excellent developer in building applications with the latest technology. Also, his communication with clients is very good and always tries to satisfy the needs of clients. I highly recommend him with A++”</p>
                            <div class="blockquote-details">
                                <img class="rounded-circle w-12" src="./web/img/avatars/samah.jpg" srcset="./web/img/avatars/samah.jpg 2x" alt="" />
                                <div class="info">
                                <h5 class="mb-1">Ahmed Samah</h5>
                                <p class="mb-0">Jobsicle</p>
                                </div>
                            </div>
                            </blockquote>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="item-inner">
                        <div class="card">
                        <div class="card-body">
                           <span class="ratings five mb-3"></span>
                            <blockquote class="icon mb-0">
                            <p>“Working with Cahyo Saputro was amazing. Not only did they fulfill the task, he challenged the requirements and got improvements. Every time there was a new requirement.”</p>
                            <div class="blockquote-details">
                                <img class="rounded-circle w-12" src="./web/img/avatars/risdyono.jpg" srcset="./web/img/avatars/risdyono.jpg" alt="" />
                                <div class="info">
                                <h5 class="mb-1">Risdyono</h5>
                                <p class="mb-0">Triz Academy</p>
                                </div>
                            </div>
                            </blockquote>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.item-inner -->
                  </div>
                 
                  <div class="swiper-slide">
                    <div class="item-inner">
                        <div class="card">
                        <div class="card-body">
                        <span class="ratings five mb-3"></span>
                            <blockquote class="icon mb-0">
                            <p>“Job done perfectly, couldn't ask for more. They know what they are doing and the fact that they deliver quality work on time is all that is needed.”</p>
                            <div class="blockquote-details">
                                <img class="rounded-circle w-12" src="./web/img/avatars/te1.jpg" srcset="./web/img/avatars/te1.jpg" alt="" />
                                <div class="info">
                                <h5 class="mb-1">judegilbert</h5>
                                <p class="mb-0">Kenya</p> 
                                </div>
                            </div>
                            </blockquote>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                  </div>
               
                 
                  <!--/.swiper-slide -->
                  <div class="swiper-slide">
                    <div class="item-inner">
                        <div class="card">
                        <div class="card-body">
                            <span class="ratings five mb-3"></span>
                            <blockquote class="icon mb-0">
                            <p>“Have strong back-end and dev-ops skills, high quality assurance skills, and detail-oriented person.”</p>
                            <div class="blockquote-details">
                                <img class="rounded-circle w-12" src="./web/img/avatars/te3.jpg" srcset="./web/img/avatars/te3@2x.jpg 2x" alt="" />
                                <div class="info">
                                <h5 class="mb-1">Michael Thomp</h5>
                                <p class="mb-0">United Kingdom</p>
                                </div>
                            </div>
                            </blockquote>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.item-inner -->
                  </div>
                 
              </div>
              <!--/.swiper-wrapper -->
              </div>
              <!-- /.swiper -->
          </div>
          <!-- /.swiper-container -->
          </div>
          <!-- /.position-relative -->
      </div>
  </section>

  <section class="wrapper bg-light">
    <div class="container py-14 py-md-16">
      <div class="row gx-lg-8 gx-xl-12 gy-10 gy-lg-0">
        <div class="col-lg-4 mt-lg-2">
          <h2 class="display-4 mb-3">My journal</h2>
          <p class="lead fs-lg mb-6 pe-xxl-5">Here are the most popular news from my articles</p>
          <a href="{{route('web.article.index')}}" class="btn btn-soft-primary rounded-pill">View All Articles</a>
        </div>
        <!-- /column -->
        <div class="col-lg-8">
          <div class="swiper-container blog grid-view mb-6" data-margin="30" data-dots="true" data-items-md="2" data-items-xs="1">
            <div class="swiper">
              <div class="swiper-wrapper">
                @foreach ($blogs as $item)
                  <div class="swiper-slide">
                    <article>
                      <figure class="overlay overlay-1 hover-scale rounded mb-5"><a href="{{route('web.article.detail_article',$item->slug)}}"> <img src="{{asset('feature_image/'.$item->feature_image)}}" alt="" /></a>
                        <figcaption>
                          <h5 class="from-top mb-0">Read More</h5>
                        </figcaption>
                      </figure>
                      <div class="post-header">
                        <div class="post-category text-line">
                          <a href="{{ url("article?category=").$item->categoryBlogs->slug }}" class="hover" rel="category">{{$item->categoryBlogs->name}}</a>
                        </div>
                        <!-- /.post-category -->
                        <h4 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="{{route('web.article.detail_article',$item->slug)}}">{{ \Illuminate\Support\Str::limit($item->title, 35, '...') }}</a></h4>
                      </div>
                      <!-- /.post-header -->
                      <div class="post-footer">
                        <ul class="post-meta mb-0">
                          <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{date_format($item->created_at,"d M Y")}}</span></li>
                          <li class="post-author"></i><i class="uil uil-user"></i><span>{{$item->users->name}}</span></li>
                        </ul>
                        <!-- /.post-meta -->
                      </div>
                      <!-- /.post-footer -->
                    </article>
                  </div> 
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection