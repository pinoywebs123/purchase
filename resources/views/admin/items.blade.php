<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Dashboard</title>

    <!-- Custom fonts for this template -->
    <link href="{{URL::to('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{URL::to('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{URL::to('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Name: <sup>2</sup></div>
            </a>

            @include('shared.admin_sidebar')

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                       

                        <!-- Nav Item - Alerts -->
                    

                        <!-- Nav Item - Messages -->
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{URL::to('img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ITEM LIST</h6>
                            <a href="{{route('admin_create_item')}}" class="btn btn-primary btn-sm">New Item</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ITEM NAME</th>
                                            <th>TYPE</th>
                                            <th>MATERIAL</th>
                                            <th>BRAND</th>
                                            <th>INCHES</th>
                                            <th>THICKNESS</th>
                                            <th>VARIANT</th>
                                            <th>CONNECTION TYPE</th>
                                            <th>STOCK</th>
                                            <th>DISCOUNT</th>
                                            <th>PRICE</th>
                                            <th>UNIT COST</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($items as $item)
                                        <tr>
                                            <th>{{$item->item_name}}</th>
                                            <th>{{$item->item_type}}</th>
                                            <th>{{$item->material}}</th>
                                            <th>{{$item->brand}}</th>
                                            <th>{{$item->inches}}</th>
                                            <th>{{$item->thickness}}</th>
                                            <th>{{$item->variant}}</th>
                                            <th>{{$item->connection_type}}</th>
                                            <th>{{$item->stock}}</th>
                                            <th>{{$item->discount}}</th>
                                            <th>{{$item->discounted_price}}</th>
                                            <th>{{$item->unit_cost}}</th>
                                            <td>
                                               
                                                <a href="{{route('admin_edit_item',$item->id)}}" class="btn btn-info btn-sm">EDIT</a>
                                                <button class="btn btn-primary btn-sm stock" value="{{$item->id}}" data-toggle="modal" data-target="#stockModal">Stock</button>
                                                <button class="btn btn-dark btn-sm discount" value="{{$item->id}}" data-toggle="modal" data-target="#discountModal">Discount</button>
                                                <a href="{{route('admin_history_item',$item->id)}}" class="btn btn-warning btn-sm">Sold</a>
                                                
                                            </td>
                                            
                                        </tr>
                                        
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('admin_logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>

   <div class="modal fade" id="stockModal" tabindex="-1" role="dialog" aria-labelledby="stockModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Stock?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('admin_update_item_stock_check')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="item_id" id="stock_item_id">
                        <input type="number" name="stock" class="form-control" id="stock_item_value">
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="discountModal" tabindex="-1" role="dialog" aria-labelledby="discountModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Discount?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('admin_update_item_discount_check')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="item_id" id="discount_item_id">
                        <input type="number" name="discount" class="form-control" id="discount_item_value">
                    </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" >Submit</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{URL::to('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{URL::to('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{URL::to('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{URL::to('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::to('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{URL::to('js/demo/datatables-demo.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var urlStock = '{{route('admin_update_item_stock')}}';
            var urlDiscount = '{{route('admin_update_item_discount')}}';
            var token = '{{Session::token()}}';

            $(".stock").click(function(){
                var item_id = $(this).val();
                    $.ajax({
                       type:'POST',
                       url: urlStock,
                       data:{_token: token, item_id : item_id},
                       success:function(data) {
                          console.log(data);
                          $("#stock_item_id").val(data.id);
                          $("#stock_item_value").val(data.stock);
                       }
                    });
            });

            $(".discount").click(function(){
                var item_id = $(this).val();
                    $.ajax({
                       type:'POST',
                       url: urlDiscount,
                       data:{_token: token, item_id : item_id},
                       success:function(data) {
                          console.log(data);
                          $("#discount_item_id").val(data.id);
                          $("#discount_item_value").val(data.discount);
                       }
                    });
            });

        });
    </script>

</body>

</html>