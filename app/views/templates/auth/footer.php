 <!--Start Back To Top Button-->
 <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="<?=BASEURL?>assets/js/jquery.min.js"></script>
  <script src="<?=BASEURL?>assets/js/popper.min.js"></script>
  <script src="<?=BASEURL?>assets/js/bootstrap.min.js"></script>
	
  <!-- horizontal-menu js -->
  <script src="<?=BASEURL?>assets/js/horizontal-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="<?=BASEURL?>assets/js/app-script.js"></script>

  <script>
      $(function(){
        $('.changebutton i').css('cursor','pointer');
      })
      myspecialButton = () => {
        var btnid = $('.changebutton i').attr('id');
        // console.log('class: '+btnclass+' id: '+btnid);
        switch(btnid){
          case 'eyeslash' :
            $('.changebutton i').attr('class','fa fa-eye');
            $('.changebutton i').attr('id','eye');
            $('#password').attr('type','text');
            break;
          case 'eye' :
            $('.changebutton i').attr('class','fa fa-eye-slash');
            $('.changebutton i').attr('id','eyeslash');
            $('#password').attr('type','password');
            break;
          default :
            $('#password').attr('type','text');
            $('#password').val('Sorry Something Was Wrong!!')
            break;
        }
      }
  </script>
  
</body>
</html>