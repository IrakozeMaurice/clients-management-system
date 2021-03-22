<div class="col-lg-2 float-left pl-0">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/home">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-fw fa-users"></i>
                <span>Clients</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/clients/create">New</a>
                    <a class="collapse-item" href="/clients">View all</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cart-plus"></i>
                <span>Orders</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/orders/create">New</a>
                    <a class="collapse-item" href="/orders">View all</a>
                </div>
            </div>
        </li>

        @if (auth()->user()->is_admin)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Services</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/hostings">Hosting</a>
                        <a class="collapse-item" href="/domains">Domain</a>
                        <a class="collapse-item" href="/web">Web</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Users</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/users/create">New</a>
                        <a class="collapse-item" href="/users">View all</a>
                    </div>
                </div>
            </li>
        @endif
        @if (auth()->user()->is_finance || auth()->user()->is_admin)
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Finance</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/expenseCategories">Expense Categories</a>
                        <a class="collapse-item" href="/expenses">Expenses</a>
                    </div>
                </div>
            </li>
        @endif
        <!-- Nav Item - projects -->
        @if (auth()->user()->is_tech || auth()->user()->is_admin)

            <li class="nav-item">
                <a class="nav-link" href="/projects">
                    <i class="fas fa-fw fa-rocket"></i>
                    <span>Projects</span></a>
            </li>
        @endif
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>
        <!-- Nav Item - reports Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Report</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/reports/clients">Clients</a>
                    <a class="collapse-item" href="/reports/orders">Orders</a>
                    <a class="collapse-item" href="/reports/expenses">Expenses</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - profile -->
        <li class="nav-item">
            <a class="nav-link" href="/profile/{{ auth()->id() }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Profile</span></a>
        </li>
        <!-- Nav Item - settings -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-table"></i>
                <span>Settings</span></a>
        </li>
    </ul>
</div>
<!-- End of Sidebar -->
