<!-- start horizontal Menu -->
<nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <h3>Menu</h3>
            <button type="button" id="menu-btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
		
        <ul id="respMenu" class="horizontal-menu">
		
			<li class="menunav">
                <a href="<?=BASEURL;?>Home" class="active">
                    <i class="zmdi zmdi-view-dashboard" aria-hidden="true"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="menunav">
                <a href="<?=BASEURL;?>Cabang" class="">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <span class="title">Cabang</span>
                </a>
            </li>
            <li class="menunav">
                <a href="<?=BASEURL;?>Manager" class="">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span class="title">Manager</span>
                </a>
            </li>
            <li class="menunav">
                <a href="<?=BASEURL;?>Anggota" class="">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="title">AO</span>
                </a>
            </li>
            <!-- <li class="menunav">
                <a href="<?//=BASEURL;?>Penghargaan" class="">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    <span class="title">Penghargaan</span>
                </a>
            </li> -->
            <li class="menunav">
                <a href="<?=BASEURL;?>Transaksi" class="">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <span class="title">Transaksi</span>
                </a>
            </li>
           
            <li class="menunav">
                <a class="">
                    <i class="zmdi zmdi-view-dashboard" aria-hidden="true"></i>
                    <span class="title">Laporan</span>
                    <span class="arrow"></span>
                </a>
                <ul>
                <li class="">
                <a href="javascript:;" class="">
                    <i class="zmdi zmdi-view-dashboard" aria-hidden="true"></i>
                    <span class="title">Laporan Aktifitas</span>
                </a>
            </li>
                <li class="">
                <a href="javascript:;" class="">
                    <i class="zmdi zmdi-view-dashboard" aria-hidden="true"></i>
                    <span class="title">Laporan Kendaraan</span>
                </a>
            </li>
            <li class="">
                <a href="javascript:;" class="">
                    <i class="zmdi zmdi-view-dashboard" aria-hidden="true"></i>
                    <span class="title">Laporan AO</span>
                </a>
            </li>
                </ul>
            </li>
            
        </ul>
    </nav>
    <!-- end horizontal Menu -->