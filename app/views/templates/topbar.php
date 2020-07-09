 <!--Start topbar header-->
 <header class="topbar-nav">
 <nav class="navbar navbar-expand">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link" href="javascript:void();">
        <div class="media align-items-center">
          <div class="media-body anwater">
            <h5 class="logo-text">STICO</h5>
            <h5 class="logo-text">STICO</h5>
          </div>
        </div>
     </a>
    </li>
    
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
        <!-- <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
    <i class="fa fa-bell-o"></i><span class="badge badge-info badge-up">14</span></a>
      <div class="dropdown-menu dropdown-menu-right">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center">
          You have 14 Notifications
          <span class="badge badge-info">14</span>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <i class="zmdi zmdi-accounts fa-2x mr-3 text-info"></i>
            <div class="media-body">
            <h6 class="mt-0 msg-title">New Registered Users</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <i class="zmdi zmdi-coffee fa-2x mr-3 text-warning"></i>
            <div class="media-body">
            <h6 class="mt-0 msg-title">New Received Orders</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
             <i class="zmdi zmdi-notifications-active fa-2x mr-3 text-danger"></i>
            <div class="media-body">
            <h6 class="mt-0 msg-title">New Updates</h6>
            <p class="msg-info">Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item text-center"><a href="javaScript:void();">See All Notifications</a></li>
        </ul>
      </div>
    </li> -->
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="<?=BASEURL;?>assets/images/pintuair.jpg" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="<?=BASEURL?>Manager/myprofile/<?=$_SESSION['manager']['id_manager']?>">
           <div class="media">
              <div class="avatar"><img class="align-self-start mr-3" src="<?=BASEURL;?>assets/images/pintuair.jpg" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title uppercase"><?=$_SESSION['info']['uname']?></h6>
            <p class="user-subtitle"><?=$_SESSION['info']['role']?></p>
            </div>
           </div>
          </a>
        </li>
        
        <!-- <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-clock mr-2"></i>Jadwal<span class="ml-5 badge badge-info">14</span></li>-->
        <!-- <li class="dropdown-divider"></li>
        <a href="<?//=BASEURL?>Help"><li class="dropdown-item"><i class="icon-question mr-2"></i> Help</li></a>
        <li class="dropdown-divider"></li>
        <a href="<?//=BASEURL?>Auth/lockon"><li class="dropdown-item"><i class="icon-lock mr-2"></i> Lock On</li></a> -->
        <li class="dropdown-divider"></li>
        <a href="<?=BASEURL?>Auth/logout"><li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li></a>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->