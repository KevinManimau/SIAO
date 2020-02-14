

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img width="75" src="<?=BASEURL?>assets/images/pintuair.jpg" alt="logo icon">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">
              SISTEM INFORMASI<br><span style="font-size:20px;">ACCOUNT OFFICER</span>
          </div>
		    <form action="<?=BASEURL?>Auth/login" method="post">
			  <div class="form-group">
			  <label for="username" class="sr-only">Username</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="username" name="username" class="form-control input-shadow" placeholder="Enter Username">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="password" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="password" name="password" class="form-control input-shadow" placeholder="Enter Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
             <button type="submit" class="btn btn-primary btn-block">Sign In</button>
             <div class="mt-5">
             <?php Flasher::alert();?>
             </div>
			 </form>
		   </div>
		  </div>
	     </div>
    
    
