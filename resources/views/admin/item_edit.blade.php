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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
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
                            <h6 class="m-0 font-weight-bold text-primary">EDIT ITEM INFORMATIONS</h6>
                            @include('shared.notification')
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin_update_item',$item->id)}}" method="POST">
                            	@csrf
                            	<div class="row">
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="product_code" class="form-control" placeholder="PRODUCT CODE" value="{{$item->product_code}}">
                            			</div>
                            		</div>
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="item_name" class="form-control" placeholder="ITEM NAME" value="{{$item->item_name}}">
                            			</div>
                            		</div>
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="item_type" class="form-control" placeholder="ITEM TYPE" value="{{$item->item_type}}">
                            			</div>
                            		</div>
                            	</div>
                            	<div class="row">
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="material" class="form-control" placeholder="Material" value="{{$item->material}}">
                            			</div>
                            		</div>
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="variant" class="form-control" placeholder="VARIANT" value="{{$item->variant}}">
                            			</div>
                            		</div>
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="connection_type" class="form-control" placeholder="CONNECTION TYPE" value="{{$item->connection_type}}">
                            			</div>
                            		</div>
                            	</div>
                            	<div class="row">
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="country_origin" class="form-control" placeholder="COUNTRY OF ORIGIN" value="{{$item->country_origin}}">
                            			</div>
                            		</div>
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="brand" class="form-control" placeholder="BRAND " value="{{$item->brand}}">
                            			</div>
                            		</div>
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="inches" class="form-control" placeholder="INCHES" value="{{$item->inches}}">
                            			</div>
                            		</div>
                            	</div>
                            	<div class="row">
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="mm" class="form-control" placeholder="MM" value="{{$item->mm}}">
                            			</div>
                            		</div>
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="thickness" class="form-control" placeholder="THICKNESS" value="{{$item->thickness}}">
                            			</div>
                            		</div>
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="stock" disabled class="form-control" placeholder="STOCK" value="{{$item->stock}}">
                            			</div>
                            		</div>
                            	</div>
                            	<div class="row">
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="price" class="form-control" placeholder="PRICE" value="{{$item->price}}">
                            			</div>
                            		</div>
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="discount" class="form-control" placeholder="DISCOUNT" value="{{$item->discount}}">
                            			</div>
                            		</div>
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="discounted_price" class="form-control" placeholder="DISCOUNTED PRICE" value="{{$item->discounted_price}}">
                            			</div>
                            		</div>
                            	</div>
                            	
                            	<div class="row">
                            		<div class="col-lg-4">
                            			<div class="form-group">
                            				 <input type="text" name="unit_cost" class="form-control" placeholder="UNIT COST" value="{{$item->unit_cost}}">
                            			</div>
                            		</div>
                            		
                            	</div>
                            	<button type="submit" class="btn btn-success btn-block">SUBMIT</button>
                            </form>
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

</body>

</html>EDIT ITEM