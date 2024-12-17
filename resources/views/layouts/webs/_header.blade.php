@if(Route::currentRouteName() == 'web.home')
<style>
  .bg-blue-cahyo{
    background:#1e4875;
  }
  .text-blue-cahyo{
    color:#1e4875;
  }
  .bg-green-cahyo{
    background:#a1cd95;
  }
  .btn-green-cahyo{
    background:#a1cd95;
    color:#1e4875;
  }
  .btn-primary-cahyo,
  .form-check-input:checked, .icon-list.bullet-primary.bullet-bg i, .navbar.navbar-light.fixed .btn:not(.btn-expand):not(.btn-gradient), .text-line.text-primary:before, .text-line:before, .tooltip-inner{
    background:#a1cd95;
    border-color:#a1cd95;
    color:#1e4875;
  }
</style>
<header class="wrapper bg-soft-primary">
  <nav class="navbar navbar-expand-lg classic transparent position-absolute navbar-dark">
    <div class="container flex-lg-row flex-nowrap align-items-center">
      <div class="navbar-brand w-100">
        <a href="https://cahyosaputro.my.id">
            <div class="d-flex align-items-center">
                <img class=" w-9 h-9 object-cover rounded-circle logo-light" src="./web/img/photos/cahyo-upwork.png" alt="" style="margin-right: 8px;">
                <span class="h3 mt-0 mb-0 ml-4 text-white logo-light">Cahyo Saputro</span>
            </div>
            <div class="d-flex align-items-center">
                <img class="w-9 h-9 object-cover rounded-circle logo-dark" src="./web/img/photos/cahyo-upwork.png" alt="" style="margin-right: 8px;">
                <span class="h3 mt-0 mb-0 ml-2 logo-dark">Cahyo Saputro</span>
            </div>
        </a>
    </div>
      <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
        <div class="offcanvas-header d-lg-none">
          <h3 class="text-white fs-30 mb-0">Cahyo Saputro</h3>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
          <ul class="navbar-nav">
              <li class="nav-item "><a class="nav-link {{Request::is('portofolio') ? "active " : "" }}" href="{{route('web.portofolio')}}" wire:navigate  wire:loading >Portofolio</a></li>
              
              <li class="nav-item "><a class="nav-link {{Request::is('article') ? "active " : "" }}" href="{{route('web.article.index')}}" wire:navigate  wire:loading >Articles</a></li>
              
              <li class="nav-item "><a class="nav-link" target="_blank" href="https://www.upwork.com/freelancers/~01a593edbb46b2e4d1" >Upwork</a></li>
          </ul>
          <!-- /.navbar-nav -->
          <div class="offcanvas-footer d-lg-none">
            <div>
              <a href="mailto:cahyoortupas@gmail.com" class="link-inverse">cahyoortupas@gmail.com</a>
              <a href="https://api.whatsapp.com/send/?phone=6285740322375" class="link-inverse"target="_blank"> 085-740-322-375</a>
              <nav class="nav social social-white mt-4">
                <a target='_blank' href="https://www.linkedin.com/in/cahyosaputro/"><i class="uil uil-linkedin"></i></a>
                <a target='_blank' href="https://github.com/cahyoortupas"><i class="uil uil-github"></i></a>
              </nav>
              <!-- /.social -->
            </div>
          </div>
          <!-- /.offcanvas-footer -->
        </div>
        <!-- /.offcanvas-body -->
      </div>
      <!-- /.navbar-collapse -->
      <div class="navbar-other ms-lg-4">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li class="nav-item d-none d-md-block">
                
                <a class="btn btn-white btn-icon btn-icon-start rounded-pill"  href="https://api.whatsapp.com/send/?phone=6285740322375" target="_blank">
                  Whatsapp
                </a>
                  <!-- <a href="#" class="btn btn-sm btn-primary-cahyo rounded-pill" data-bs-toggle="modal" data-bs-target="trueLink">Download CV</a> -->
              </li>
              <li class="nav-item d-lg-none">
                <button class="hamburger offcanvas-nav-btn"><span></span></button>
              </li>
        </ul>
        <!-- /.navbar-nav -->
      </div>
      <!-- /.navbar-other -->
    </div>
    <!-- /.container -->
  </nav>
</header>
@else
<nav class="navbar navbar-expand-lg classic navbar-light navbar-bg-light">
  <div class="container flex-lg-row flex-nowrap align-items-center">
    <div class="navbar-brand w-100">
      <a href="{{url('/')}}">
          <div class="d-flex align-items-center">
            <img class="w-9 h-9 object-cover rounded-circle logo-dark" src="{{asset('web/img/photos/cahyo-upwork.png')}}" alt="" style="margin-right: 8px;">
            <span class="h3 mt-0 mb-0 ml-2 logo-dark">Cahyo Saputro</span>
          </div>
      </a>
    </div>
    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
      <div class="offcanvas-header d-lg-none">
        <a href="./index.php">
          <div class="d-flex align-items-center">
            <img class="w-9 h-9 object-cover rounded-circle logo-light" src="{{asset('web/img/photos/cahyo-upwork.png')}}" alt="" style="margin-right: 8px;">
            <span class="h3 mt-0 mb-0 ml-2 text-white logo-light">Cahyo Saputro</span>
          </div>
        </a>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
        <ul class="navbar-nav">
              <li class="nav-item "><a class="nav-link {{Request::is('portofolio') ? "active " : "" }}" href="{{route('web.portofolio')}}" wire:navigate  wire:loading >Portofolio</a></li> 
               <li class="nav-item "><a class="nav-link {{Request::is('article') ? "active " : "" }}" href="{{route('web.article.index')}}" wire:navigate  wire:loading >Articles</a></li>
               <li class="nav-item "><a class="nav-link" target="_blank" href="https://www.upwork.com/freelancers/~01a593edbb46b2e4d1" >Upwork</a></li>
        </ul>
        <!-- /.navbar-nav -->
        <div class="d-lg-none mt-auto pt-6 pb-6 order-4">
          <a href="mailto:cahyoortupas@gmail.com" class="link-inverse">cahyoortupas@gmail.com</a>
          <a href="https://api.whatsapp.com/send/?phone=6285740322375" class="link-inverse"target="_blank">085-740-322-375 </a>
          <nav class="nav social social-white mt-4">
            <a target='_blank' href="https://www.linkedin.com/in/cahyosaputro/"><i class="uil uil-linkedin"></i></a>
            <a target='_blank' href="https://github.com/cahyoortupas"><i class="uil uil-github"></i></a>
          </nav>
          <!-- /.social -->
        </div>
        <!-- /offcanvas-nav-other -->
      </div>
      <!-- /.offcanvas-body -->
    </div>
    <!-- /.navbar-collapse -->
    <div class="navbar-other ms-lg-4">
      <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li class="nav-item d-none d-md-block">
                
                <a href="https://api.whatsapp.com/send/?phone=085740322375" target="_blank" class="btn btn-navy btn-icon btn-icon-start rounded-pill">
                  <i class="uil uil-whatsapp-alt"></i> whatsapp
                </a>
                  <!-- <a href="#" class="btn btn-sm btn-primary-cahyo rounded-pill" data-bs-toggle="modal" data-bs-target="trueLink">Download CV</a> -->
              </li>
              <li class="nav-item d-lg-none">
                <button class="hamburger offcanvas-nav-btn"><span></span></button>
              </li>
        </ul>
      <!-- /.navbar-nav -->
    </div>
    <!-- /.navbar-other -->
  </div>
  <!-- /.container -->
</nav>
<!-- /.navbar -->


@endif

