<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Title Here</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{URL::to('home/assets/favicon.ico')}}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{URL::to('home/css/styles.css')}}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <style type="text/css">
            a {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Industrial Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        
                    </ul>
                    
                    <form class="d-flex">
                        @auth
                           <a href="{{route('user_items')}}" class="btn btn-outline-dark">
                            <i class="bi bi-cart">
                                
                            </i>
                            <span >{{$cart}}</span>
                            
                             </a> 
                        @else
                        <a href="{{url('/login')}}" class="btn btn-outline-dark">
                            <i class="bi bi-person-lines-fill"></i>
                            Login
                            
                        </a>
                        @endauth
                        
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-danger py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Buy now and build you're Future.</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Enjoy the most reliable and cheapest items.</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                  <div style="float: right;">
                      <form method="GET">
                         
                          <input type="text" name="search">
                          <button type="submit">Search</button>
                      </form>
                  </div>  
                  <form method="GET">
                    <button type="submit" class="btn btn-danger btn-sm">Filter</button>
                      <div class="row">
                          <div class="col-lg-3">
                             <div class="form-group">
                                <label>Material</label>
                                <select class="form-control" name="material">
                                    <option value="0">ALL</option>
                                    @foreach($materials as $material)
                                    <option value="{{$material->material}}" {{isset($_GET['material']) == $material->material ? 'selected' : ''}}>{{$material->material}}</option>
                                    @endforeach
                                </select>
                             </div>
                          </div>

                          <div class="col-lg-3">
                             <div class="form-group">
                                <label>Item type</label>
                                <select class="form-control" name="item_type">
                                    <option value="0">ALL</option>
                                    @foreach($item_types as $item_type)
                                    <option value="{{$item_type->item_type}}" {{isset($_GET['item_type']) == $item_type->item_type ? 'selected' : ''}}>{{$item_type->item_type}}</option>
                                    @endforeach
                                </select>
                             </div>
                          </div>

                          <div class="col-lg-3">
                             <div class="form-group">
                                <label>Brand</label>
                                <select class="form-control" name="brand">
                                    <option value="0">ALL</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->brand}}" {{isset($_GET['brand']) == $brand->brand ? 'selected' : ''}}>{{$brand->brand}}</option>
                                    @endforeach
                                </select>
                             </div>
                          </div>

                          <div class="col-lg-3">
                             <div class="form-group">
                                <label>Country</label>
                                <select class="form-control" name="country">
                                    <option value="0">ALL</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->country_origin}}" {{isset($_GET['country']) == $country->country_origin ? 'selected' : ''}}>{{$country->country_origin}}</option>
                                    @endforeach
                                </select>
                             </div>

                          </div>
                          
                          

                      </div>

                      

                  </form>
                  <h3>Products</h3>
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        

                        @foreach($items as $item)
                        
                        <div class="col-4 mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{URL::to('images/'.$item->image)}}" height="250" width="400" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$item->item_name}}</h5>
                                        <!-- Product price-->
                                        Price: {{$item->discounted_price}}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    @auth
                                        <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="{{route('add_cart',$item->id)}}">Add Cart</a></div>
                                    @else
                                        <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="{{url('/login')}}">Add Cart</a></div>
                                    @endauth
                                    
                                </div>
                            </div>
                        </div>

                        @endforeach
                        
                        
                        </div>
                        
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="{{URL::to('vendor/jquery/jquery.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{URL::to('home/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        
            <script type="text/javascript">
                @if(Session::has('success'))
                    toastr.success('Added to Cart', 'Success')
                @endif
            </script>
        
    </body>
</html>
