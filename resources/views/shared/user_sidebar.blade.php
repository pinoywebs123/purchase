<!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Side Bar
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
           

            <li class="nav-item active">
                <a class="nav-link " href="{{url('/')}}">
                    <i class="fas fa-fw fa-solid fa-house-user"></i>

                    <span>Store</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link " href="{{route('user_home')}}">
                    <i class="fas fa-fw fa-solid fa-house-user"></i>

                    <span>Home</span></a>
            </li>

            

            <li class="nav-item active">
                <a class="nav-link " href="{{route('user_items')}}">
                    <i class="fas fa-fw fa-regular fa-coins"></i>
                    <span>Items</span></a>
            </li>

           

            <li class="nav-item active">
                <a class="nav-link " href="{{route('user_message')}}">
                    <i class="fas fa-fw fa-solid fa-comment-dollar"></i>
                    <span>Message</span></a>
            </li>

           
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>