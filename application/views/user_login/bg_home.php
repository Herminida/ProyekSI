<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>RUMAH SAKIT KALIWARU JEMBER ADMIN PANEL - Login Page</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap-responsive.min.css" />
        
        <!-- main styles -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>css/style_login.css" />
    
        <!-- Favicons and the like (avoid using transparent .png) -->
            <link rel="shortcut icon" href="favicon.ico" />
            <link rel="apple-touch-icon-precomposed" href="icon.png" />
    
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    
        <!--[if lte IE 8]>
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
        <![endif]-->
		
    <!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  --></head>
    <body>
    	<div class="login_page">
		
		<div class="login_box">
			
			<form name="form1" method="post" action="">
				
				<!-- <div class="alert alert-info alert-login">
					Clear username and password field to see validation.
				</div> -->
				<div class="cnt_b">
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-user"></i></span>
							<input type="text" id="username" name="username" placeholder="Username"  />
						</div>
					</div>
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-lock"></i></span>
							<input type="password" id="password" name="password" placeholder="Password" />
						</div>
					</div>

					<!-- <div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-lock"></i></span>
							 <select name="log_as" id="as">
	<option value="">-- Pilih --</option>
	<option value="admin_dinkes">  Admin Dinkes  </option>
	<option value="admin_puskesmas">  Admin Puskesmas  </option>
	<option value="loket">  Loket  </option>
	<option value="farmasi">  Farmasi  </option>
	<option value="apotik">  Apotek  </option>
	<option value="laporans">  Laporan  </option>
	<option value="klinik">  Klinik  </option>
	<option value="gudang">  Gudang  </option>
</select>
						</div>
					</div> -->
					<div class="formRow clearfix">
						<!-- <label class="checkbox"><input type="checkbox" /> Remember me</label> -->
					</div>
				</div>
				<div class="btm_b clearfix">
					
					<button class="btn btn-danger " type="submit">Sign In</button>
					
				</div>  
			</form>
			
			
			
		</div>
		
		
        
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.actual.min.js"></script>
        <script src="lib/validation/jquery.validate.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                
				//* boxes animation
				form_wrapper = $('.login_box');
                $('.linkform a,.link_reg a').on('click',function(e){
					var target	= $(this).attr('href'),
						target_height = $(target).actual('height');
					$(form_wrapper).css({
						'height'		: form_wrapper.height()
					});	
					$(form_wrapper.find('form:visible')).fadeOut(400,function(){
						form_wrapper.stop().animate({
                            height	: target_height
                        },500,function(){
                            $(target).fadeIn(400);
                            $('.links_btm .linkform').toggle();
							$(form_wrapper).css({
								'height'		: ''
							});	
                        });
					});
					e.preventDefault();
				});
				
				//* validation
				$('#login_form').validate({
					onkeyup: false,
					errorClass: 'error',
					validClass: 'valid',
					rules: {
						username: { required: true, minlength: 3 },
						password: { required: true, minlength: 3 }
					},
					highlight: function(element) {
						$(element).closest('div').addClass("f_error");
					},
					unhighlight: function(element) {
						$(element).closest('div').removeClass("f_error");
					},
					errorPlacement: function(error, element) {
						$(element).closest('div').append(error);
					}
				});
            });
        </script>
    </div>
    </body>
</html>
