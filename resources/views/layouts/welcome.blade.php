<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/blog/app.js') }}" defer></script> --}}

    <script src="{{ asset('js/popper.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}" defer></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}" defer></script>
    <script src="{{ asset('js/jquery.timepicker.min.js') }}" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false" defer></script>
    <script src="{{ asset('js/google-map.js') }}" defer></script>


    <script src="{{ asset('js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}" defer></script>
    <script src="{{ asset('js/aos.js') }}" defer></script>
    <script src="{{ asset('js/scrollax.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}" defer></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/open-iconic-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.timepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icomoon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  </head>
  <body>

    <nav id="colorlib-main-nav" role="navigation">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
        <div class="js-fullheight colorlib-table">
          <div class="colorlib-table-cell js-fullheight">
            <div class="row d-flex justify-content-end">
              <div class="col-md-12 px-5">
                <ul class="mb-5">
                  <li class="active"><a href="{{ route('blogIndex') }}"><span>Главная</span></a></li>
                  <li><a href="{{ route('blogAbout') }}"><span>Обо мне</span></a></li>

                  @forelse ($categories as $category)
                  <li><a href="{{ route('showCat',[$category->id]) }}"><span>{{$category->name}}</span></a></li>
                  @empty
                  <li><a href="{{ route('categories.index') }}"><span>Создать</span></a></li>
                  @endforelse

                </ul>
              </div>
              <div class="col px-5 copyright">
                  <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены
                  </p>
              </div>
            </div>
          </div>
        </div>
      </nav>

      <div id="colorlib-page">
        <header>
            <div class="container-fluid">
              <div class="row no-gutters">
                <div class="col-md-12">
                  <div class="colorlib-navbar-brand">
                    <a class="colorlib-logo" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                  </div>
                  <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
                </div>
              </div>
          </div>
        </header>

        <section class="ftco-fixed clearfix">
            <div class="image js-fullheight float-left">
                <div class="home-slider owl-carousel js-fullheight">

                @forelse ($categories as $category)

                @if ($category->url)
                    <div class="slider-item js-fullheight" style="background-image: url({{ asset('storage/' . $category->url) }});">
                @else
                    <div class="slider-item js-fullheight" style="background-image: url(https://c.wallhere.com/photos/26/e7/diyemedim_ya_la-14708.jpg!d);">
                @endif



                    <div class="overlay"></div>
                    <div class="container">
                      <div class="row slider-text align-items-end" data-scrollax-parent="true">
                        <div class="col-md-10 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <p class="cat"><span>{{$category->name}}</span></p>
                          <h1 class="mb-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{$category->comment}}</h1>
                        </div>
                      </div>
                    </div>
                </div>
                @empty
                 <p class="mt-5 ml-5">Категории еще не созданы...</p>
                {{-- <li><a href="{{ asset('images/bg_1.jpg') }}"><span></span></a></li> --}}
                @endforelse





                </div>
            </div>


    <div class="page-container float-right">

        <main class="py-4">
            @yield('content')
        </main>

    </div><!-- end: page-container-->
    </section>

        <!-- loader -->
    @component('blog.parts.loader')
    @endcomponent

    </div>

    {{-- <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script> --}}

  </body>
</html>
