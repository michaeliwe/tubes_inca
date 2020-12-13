<!-- Sidebar -->
<aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <div class="mt-3 mb-3 ml-3">
            <h5 class="s-18 has-icon">
                <img src="{{ asset('img/logo.png') }}" style="max-height: 25px">
                WAREHOUSE
            </h5>
        </div>
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    Goods Information
                    {{-- <i class="icon icon-angle-left s-18"></i> --}}
                </a>

                <ul class="treeview-menu">
                   <li class="treeview">
                       <a href="{{ route('informasi_barang_masuk') }}">Goods Receipt</a>
                   </li>
                   <li class="treeview">
                       <a href="{{ route('informasi_barang_keluar') }}">Goods Issue</a>
                   </li>
               </ul>
            </li>
            <li>
                <a href="{{ route('jenis_barang.index') }}">Types of Goods</a>
            </li>
            <li>
                <a href="{{ route('lokasi_warehouse.index') }}">Warehouse Location</a>
            </li>

            <li><a href="{{route('logout')}}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Logout</a>
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                    @csrf
                </form>
            </li>
        </ul>
    </section>
</aside>
<!--Sidebar End-->
