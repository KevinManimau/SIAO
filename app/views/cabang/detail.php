<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title"><?=$data['cbg']['status'];?> <?=$data['cbg']['nama_cab'];?></h4>
        </div>
        
     </div>
     <div class="row">
       <div class="col-lg-6">
         <?php Flasher::alert();?>
       </div>
     </div>
    <!-- End Breadcrumb-->

    <div class="row">
        <div class="col-lg-4">
           <div class="card profile-card-2">
            <div class="card-img-block">
                <img class="img-fluid" src="<?=BASEURL;?>assets/images/company/nita/gedung/nita.jpeg" alt="Card image cap">
            </div>
            <div class="card-body pt-5">
                <img src="<?=BASEURL;?>assets/images/company/nita/profile/harry.jpg" alt="profile-image" class="profile">
                <h5 class="card-title">Nama Manager AO</h5>
                <p class="card-text">Deskripsi manager, Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quibusdam, veritatis voluptatibus laboriosam, ullam ipsam ad obcaecati incidunt eligendi quisquam tenetur fugiat explicabo, architecto ratione neque libero sunt iure! Ex.</p>
                <div class="icon-block">
                  <a href="javascript:void();"><i class="fa fa-facebook bg-facebook text-white"></i></a>
				  <a href="javascript:void();"> <i class="fa fa-twitter bg-twitter text-white"></i></a>
				  <a href="javascript:void();"> <i class="fa fa-google-plus bg-google-plus text-white"></i></a>
                </div>
            </div>

            <div class="card-body border-top border-light">
                <div class="row">  
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body gradient-forest">
                            <h5 class="text-white mb-0">14 <span class="float-right"><i class="fa fa-users"></i></span></h5>
                            <p class="mb-0 text-white small-font">ACCOUNT OFFICER (AO) AKTIF</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body gradient-forest">
                        <h5 class="text-white mb-0">15 <span class="float-right"><i class="fa fa-line-chart"></i></span></h5>
                        <p class="mb-0 text-white small-font">JUMLAH TRANSAKSI</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card ">
                        <div class="card-body gradient-forest">
                        <h5 class="text-white mb-0">25.000 <span class="float-right"><i class="fa fa-user"></i></span></h5>
              <p class="mb-0 text-white small-font">JUMLAH ANGGOTA</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body gradient-forest">
                        <h5 class="text-white mb-0">4.261.200 <span class="float-right"><i class="fa fa-money"></i></span></h5>
              <p class="mb-0 text-white small-font">NILAI TRANSAKSI</p>
                        </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>

        </div>

        <div class="col-lg-8">
           <div class="card">
            <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="fa fa-building"></i> <span class="hidden-xs">Company Profile</span></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#timeline" data-toggle="pill" class="nav-link"><i class="fa fa-clock-o"></i> <span class="hidden-xs">Timeline</span></a>
                </li>
                
            </ul>
            <div class="tab-content p-3">
            <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">User Profile</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>About</h6>
                            <p>
                                Web Designer, UI/UX Engineer
                            </p>
                            <h6>Hobbies</h6>
                            <p>
                                Indie music, skiing and hiking. I love the great outdoors.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Recent badges</h6>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">html5</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">react</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">codeply</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">angularjs</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">css3</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">jquery</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">bootstrap</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">responsive-design</a>
                            <hr>
                            <span class="badge badge-primary"><i class="fa fa-user"></i> 900 Followers</span>
                            <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
                            <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>
                        </div>
                        <div class="col-md-12">
                            <h5 class="mt-2 mb-3"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                             <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tbody>                                    
                                    <tr>
                                        <td>
                                            <strong>Abby</strong> joined ACME Project Team in <strong>`Collaboration`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Gary</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Kensington</strong> deleted MyBoard3 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>John</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Skell</strong> deleted his post Look at Why this is.. in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="messages">
                    <div class="alert alert-info alert-dismissible" role="alert">
				   <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <div class="alert-icon">
					 <i class="icon-info"></i>
				    </div>
				    <div class="alert-message">
				      <span><strong>Info!</strong> Lorem Ipsum is simply dummy text.</span>
				    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <tbody>                                    
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link to the latest summary report from the..
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">Yesterday</span> There has been a request on your account since that was..
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/10</span> Porttitor vitae ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus. 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/4</span> Vestibulum tincidunt ullamcorper eros eget luctus. 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/4</span> Maxamillion ais the fix for tibulum tincidunt ullamcorper eros. 
                                </td>
                            </tr>
                        </tbody> 
                    </table>
                  </div>
                </div>
                <div class="tab-pane" id="timeline">
                <div class="row">
        <div class="col-lg-12">
          <section class="cd-timeline js-cd-timeline">
            <div class="cd-timeline__container">
              <div class="cd-timeline__block js-cd-block">
                <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                  <img src="assets/images/timeline/cd-icon-picture.svg" alt="Picture">
                </div> <!-- cd-timeline__img -->

                <div class="cd-timeline__content js-cd-content">
                  <h4>Title of section 1</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                  <a href="javascript:void();" class="cd-timeline__read-more">Read more</a>
                  <span class="cd-timeline__date">Jan 14</span>
                </div> <!-- cd-timeline__content -->
              </div> <!-- cd-timeline__block -->

              <div class="cd-timeline__block js-cd-block">
                <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                  <img src="assets/images/timeline/cd-icon-movie.svg" alt="Movie">
                </div> <!-- cd-timeline__img -->

                <div class="cd-timeline__content js-cd-content">
                  <h4>Title of section 2</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?</p>
                  <a href="javascript:void();" class="cd-timeline__read-more">Read more</a>
                  <span class="cd-timeline__date">Jan 18</span>
                </div> <!-- cd-timeline__content -->
              </div> <!-- cd-timeline__block -->

              <div class="cd-timeline__block js-cd-block">
                <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                  <img src="assets/images/timeline/cd-icon-picture.svg" alt="Picture">
                </div> <!-- cd-timeline__img -->

                <div class="cd-timeline__content js-cd-content">
                  <h4>Title of section 3</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat consequuntur perferendis enim amet quae quasi repudiandae sed quod veniam dolore possimus rem voluptatum eveniet eligendi quis fugiat aliquam sunt similique aut adipisci.</p>
                  <a href="javascript:void();" class="cd-timeline__read-more">Read more</a>
                  <span class="cd-timeline__date">Jan 24</span>
                </div> <!-- cd-timeline__content -->
              </div> <!-- cd-timeline__block -->

              <div class="cd-timeline__block js-cd-block">
                <div class="cd-timeline__img cd-timeline__img--location js-cd-img">
                  <img src="assets/images/timeline/cd-icon-location.svg" alt="Location">
                </div> <!-- cd-timeline__img -->

                <div class="cd-timeline__content js-cd-content">
                  <h4>Title of section 4</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                  <a href="javascript:void();" class="cd-timeline__read-more">Read more</a>
                  <span class="cd-timeline__date">Feb 14</span>
                </div> <!-- cd-timeline__content -->
              </div> <!-- cd-timeline__block -->

              <div class="cd-timeline__block js-cd-block">
                <div class="cd-timeline__img cd-timeline__img--location js-cd-img">
                  <img src="assets/images/timeline/cd-icon-location.svg" alt="Location">
                </div> <!-- cd-timeline__img -->

                <div class="cd-timeline__content js-cd-content">
                  <h4>Title of section 5</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.</p>
                  <a href="javascript:void();" class="cd-timeline__read-more">Read more</a>
                  <span class="cd-timeline__date">Feb 18</span>
                </div> <!-- cd-timeline__content -->
              </div> <!-- cd-timeline__block -->

              <div class="cd-timeline__block js-cd-block">
                <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                  <img src="assets/images/timeline/cd-icon-movie.svg" alt="Movie">
                </div> <!-- cd-timeline__img -->

                <div class="cd-timeline__content js-cd-content">
                  <h4>Final Section</h4>
                  <p>This is the content of the last section</p>
                  <span class="cd-timeline__date">Feb 26</span>
                </div> <!-- cd-timeline__content -->
              </div> <!-- cd-timeline__block -->
            </div>
          </section> <!-- cd-timeline -->
        </div>
      </div>
                </div>
            </div>
            
            </div>
            
                
           
        </div>
      </div>
      </div>
        
    </div>