<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UPCC</title>
  
  <!-- FAVICON -->
  <link href="img/favicon.png" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{URL::to('home/plugins/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('home/plugins/bootstrap/css/bootstrap-slider.css')}}">
  <!-- Font Awesome -->
  <link href="{{URL::to('home/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="{{URL::to('home/plugins/slick-carousel/slick/slick.css')}}" rel="stylesheet">
  <link href="{{URL::to('home/plugins/slick-carousel/slick/slick-theme.css')}}" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="{{URL::to('home/plugins/fancybox/jquery.fancybox.pack.css')}}" rel="stylesheet">
  <link href="{{URL::to('home/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="{{URL::to('home/css/style.css')}}" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="body-wrapper">


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light navigation">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img src="{{URL::to('home/images/logo.png')}}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                        <ul class="navbar-nav ml-auto mt-10">
                            
                                 @auth
                                 <li class="nav-item">
                                   <a href="{{route('user_items')}}" class="nav-link login-button">
                                    <i class="bi bi-cart">
                                        
                                    </i>
                                    <span >{{$cart}}</span>
                                    
                                     </a> 
                                </li>  
                                @else
                                <li class="nav-item">
                                <a href="{{url('/login')}}" class="nav-link login-button">
                                    
                                    Login
                                    
                                </a>
                                </li> 
                                <li class="nav-item">
                                <a href="{{url('/about')}}" class="nav-link login-button">
                                    
                                    About
                                    
                                </a>
                                </li> 
                                @endauth

                                
                           
                            @auth
                            <li class="nav-item">
                                <a class="nav-link text-white add-button" href="{{url('/user/home')}}"> {{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Contetnt -->
                <div class="content-block">
                    <h1>Top Industrial Store</h1>
                    <p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
                    
                    
                </div>
                <!-- Advance Search -->
                <div class="advance-search">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-12 align-content-center">
                                        <h2 class="text-center">About Us</h2>
                                        <p>
                                            With an ever-growing demand for brand loyalty and repeat business, UPCC has done just that in large part due to keeping up with the times. Stocking the newest and more improved materials, to associating ourselves with the latest international standards, to being prevalent in its digital information and accessibility, we are a company of experience, instilled with youth and both immersed in dedication.
                                        </p>
                                    </div>
                                </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->
@auth
<section class="popular-deals section bg-gray">
    <div class="container">
        
      
            
        </div>
    </div>
</section>
@endauth

<section class="popular-deals section bg-gray">
    <div class="container">
        
            
            
        </div>
    </div>
</section>


<!--==========================================
=            All Category Section            =
===========================================-->




<!--====================================
=            Call to Action            =
=====================================-->



<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-12">
        <!-- Copyright -->
        <div class="copyright">
          
        </div>
      </div>
      <div class="col-sm-6 col-12">
        <!-- Social Icons -->
        <ul class="social-media-icons text-right">
          <li><a class="fa fa-facebook" href="https://www.facebook.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-twitter" href="https://www.twitter.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-pinterest-p" href="https://www.pinterest.com/themefisher" target="_blank"></a></li>
          <li><a class="fa fa-vimeo" href=""></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Container End -->
  <!-- To Top -->
  <div class="top-to">
    <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>

<!-- JAVASCRIPTS -->
<script src="{{URL::to('home/plugins/jQuery/jquery.min.js')}}"></script>
<script src="{{URL::to('home/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{URL::to('home/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('home/plugins/bootstrap/js/bootstrap-slider.js')}}"></script>
  <!-- tether js -->
<script src="{{URL::to('home/plugins/tether/js/tether.min.js')}}"></script>
<script src="{{URL::to('home/plugins/raty/jquery.raty-fa.js')}}"></script>
<script src="{{URL::to('home/plugins/slick-carousel/slick/slick.min.js')}}"></script>
<script src="{{URL::to('home/plugins/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{URL::to('home/plugins/fancybox/jquery.fancybox.pack.js')}}"></script>
<script src="{{URL::to('home/plugins/smoothscroll/SmoothScroll.min.js')}}"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="{{URL::to('home/plugins/google-map/gmap.js')}}"></script>
<script src="{{URL::to('home/js/script.js')}}"></script>

</body>

</html>



