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
            <?php foreach($_SESSION['menu'] as $menu): ?>
			<li class="menunav">
                <a href="<?=BASEURL.$menu['url']?>" class="active">
                    <i class="<?=$menu['icon']?>" aria-hidden="true"></i>
                    <span class="title"><?=$menu['judul_menu']?></span>
                </a>
            </li>
            <?php endforeach;?>
            <!-- <li class="menunav">
                <a href="<?//=BASEURL;?>Cabang" class="">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <span class="title">Cabang</span>
                </a>
            </li>
            <li class="menunav">
                <a href="<?//=BASEURL;?>Manager" class="">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span class="title">Manager</span>
                </a>
            </li>
            <li class="menunav">
                <a href="<?//=BASEURL;?>Anggota" class="">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="title">AO</span>
                </a>
            </li> -->
            <!-- <li class="menunav">
                <a href="<?//=BASEURL;?>Penghargaan" class="">
                    <i class="fa fa-trophy" aria-hidden="true"></i>
                    <span class="title">Penghargaan</span>
                </a>
            </li> -->
            <!-- <li class="menunav">
                <a href="Transaksi" class="">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <span class="title">Transaksi</span>
                </a>
            </li>
           
            <li class="menunav">
                <a class="">
                    <i class="fa fa-file" aria-hidden="true"></i>
                    <span class="title">Laporan</span>
                    <span class="arrow"></span>
                </a>
                <ul>
                <li class="">
                <a href="javascript:;" class="">
                   
                    <span class="title">Laporan Aktifitas</span>
                </a>
            </li>
                <li class="">
                <a href="javascript:;" class="">
                   
                    <span class="title">Laporan Kendaraan</span>
                </a>
            </li>
            <li class="">
                <a href="javascript:;" class="">
                 
                    <span class="title">Laporan AO</span>
                </a>
            </li>
                </ul>
            </li> -->
            <!-- <li class="menunav">
                <a class="">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <span class="title">Recovery</span>
                    <span class="arrow"></span>
                </a>
                <ul>
                <li class="">
                <a href="javascript:;" class="">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    <span class="title">Trash</span>
                    <span class="arrow"></span>
                </a>
                <ul>
                <li class="">
                <a href="javascript:;" class="">
                    <span class="title">Cabang</span>
                </a>
            </li>
                <li class="">
                <a href="javascript:;" class="">
                    <span class="title">Manager</span>
                </a>
            </li>
            <li class="">
                <a href="javascript:;" class="">
                    <span class="title">AO</span>
                </a>
            </li>
            <li class="">
                <a href="javascript:;" class="">
                    <span class="title">Transaksi</span>
                </a>
            </li>
            <li class="">
                <a href="javascript:;" class="">
                    <span class="title">Laporan</span>
                </a>
            </li>
                </ul>
            </li>
                <li class="">
                <a href="javascript:;" class="">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    <span class="title">Backup Data</span>
                </a>
            </li>
                </ul>
            </li>
            <li class="menunav">
                <a class="">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                    <span class="title">Help</span>
                    <span class="arrow"></span>
                </a>
                <ul>
                <li class="">
                <a href="javascript:;" class="">
                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                    <span class="title">How To Use ?</span>
                </a>
            </li>
                <li class="">
                <a href="javascript:;" class="">
                    <i class="fa fa-reply" aria-hidden="true"></i>
                    <span class="title">FAQ</span>
                </a>
            </li>
            </li>
                <li class="">
                <a href="javascript:;" class="">
                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                    <span class="title">Contact Support</span>
                </a>
            </li>
                </ul>
            </li> -->
            
        </ul>
    </nav>
    <!-- end horizontal Menu -->