<!-- Navbar Start -->
<div class="sticky">
    <div class="navbar navbar-expand d-flex justify-content-between bd-navbar white shadow">
        <div class="relative">
            <div class="d-flex">
                <div>
                    <a href="#" data-toggle="offcanvas" class="paper-nav-toggle pp-nav-toggle">
                        <i></i>
                    </a>
                </div>
            </div>
        </div>
        <!--Top Menu Start -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @can('Super Admin')
                @if(url()->current() == route('partner.home'))
                    <li>
                        <a href="{{ route('admin.device.doorlock') }}" class="btn btn-s btn-primary ml-2">Door Lock</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.billing.create') }}" class="btn btn-s btn-danger ml-2">Utilities Bills</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.service_package.index') }}" class="btn btn-s btn-success ml-2">Service Package</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.billing_template.index') }}" class="btn btn-s btn-secondary ml-2 text-light">Billing Settings</a>
                    </li>
                @endif
                @endcan
            </ul>
        </div>
    </div>
</div>
<!-- Navbar End -->
