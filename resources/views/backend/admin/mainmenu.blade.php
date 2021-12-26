<div id="sidebar-left" class="span2">
    <div class="nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">

            <li><a href="{{url('/admin-dashboard')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>

            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Supplier</span></a>
                <ul>
                    <li><a class="submenu" href="{{url('/add-supplier')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Supplier</span></a></li>
                    <li><a class="submenu" href="{{url('/all-supplier')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">All Supplier</span></a></li>
                </ul>
            </li>

            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Customer</span></a>
                <ul>
                    <li><a class="submenu" href="{{url('/add-customer')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Customer</span></a></li>
                    <li><a class="submenu" href="{{url('/all-customer')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">All Customers</span></a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
