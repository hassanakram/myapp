<!DOCTYPE html>
<html lang="en" class="login_page">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>My App - Login Page</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo site_url('../bootstrap/css/bootstrap.min.css'); ?>" />
        <!-- theme color-->
            <link rel="stylesheet" href="<?php echo site_url('../css/blue.css'); ?>" />
        <!-- tooltip -->    
			<link rel="stylesheet" href="<?php echo site_url('../lib/qtip2/jquery.qtip.min.css'); ?>" />
        <!-- main styles -->
            <link rel="stylesheet" href="<?php echo site_url('../css/style.css'); ?>" />
    
        <!-- favicon -->
            <link rel="shortcut icon" href="<?php echo site_url('../favicon.ico'); ?>" />
    
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    
        <!--[if lt IE 9]>
            <script src="../js/ie/html5.js'); ?>"></script>
			<script src="../js/ie/respond.min.js'); ?>"></script>
        <![endif]-->
		
    </head>
    <body>

    	<?php
			$login = array(
				'name'	=> 'login',
				'id'	=> 'username',
				'placeholder' => 'User Name or Email',
				'value' => set_value('login'),
				'maxlength'	=> 80,
				'size'	=> 30,
			);
			if ($login_by_username AND $login_by_email) {
				$login_label = 'Email or login';
			} else if ($login_by_username) {
				$login_label = 'Login';
			} else {
				$login_label = 'Email';
			}
			$password = array(
				'name'	=> 'password',
				'id'	=> 'password',
				'size'	=> 30,
			);
			$remember = array(
				'name'	=> 'remember',
				'id'	=> 'remember',
				'value'	=> 1,
				'checked'	=> set_value('remember'),
				'style' => 'margin:0;padding:0',
			);
			$captcha = array(
				'name'	=> 'captcha',
				'id'	=> 'captcha',
				'maxlength'	=> 8,
			);
		?>

		
		<div class="login_box">
			
			<?php echo form_open($this->uri->uri_string() , "id='login_form'"); ?>
				<div class="top_b" style="margin-left: 52;">Sign in to My app</div>    
				<div class="cnt_b">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon input-sm"><i class="glyphicon glyphicon-user"></i></span>
							<!-- <input class="form-control input-sm" type="text" id="username" name="username" placeholder="Username" value="John Smith" /> -->
							<?php echo form_input($login); ?></td>
							<label style="color: red;">   <?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></label>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon input-sm"><i class="glyphicon glyphicon-lock"></i></span>
							<!-- <input class="form-control input-sm" type="password" id="password" name="password" placeholder="Password" value="password" /> -->
							<?php echo form_password($password,"","class='form-control input-sm' type='password' id='password' name='password' placeholder='Password'"); ?>
							<label style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></label>
						</div>
					</div>
					<div class="form-group">
						 <label class="checkbox-inline"><?php echo form_checkbox($remember); ?> Remember me</label>
						
						
					</div>
				</div>
				<div 
				class="btm_b clearfix">
					<!-- <button class="btn btn-default btn-sm pull-right" type="submit">Sign In</button> -->

					<?php echo form_submit('submit', 'Sign In',"class='btn btn-default btn-sm pull-right'"); ?>

					<span><a href="register">Not registered? Sign up here</a></span>
					


				</div>  
			</form>
			



			 <form action="dashboard.html" method="post" id="pass_form" style="display:none">
				<div class="top_b">Can't sign in?</div>    
					<div class="alert alert-info alert-login">
					Please enter your email address. You will receive a link to create a new password via email.
				</div>
				<div class="cnt_b">
					<div class="formRow clearfix">
						<div class="input-group">
							<span class="input-group-addon input-sm">@</span>
							<input type="text" placeholder="Your email address" class="form-control input-sm" />
						</div>
					</div>
				</div>
				<div class="btm_b tac">
					<button class="btn btn-default" type="submit">Request New Password</button>
				</div>  
			</form>
			
			
			
			
			<div class="links_b links_btm clearfix">
				<!-- <span class="linkform"><a href="#pass_form">Forgot password?</a></span> -->
				<?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
			</div>
			
		</div>
		 
        <script src="<?php echo site_url('../js/jquery.min.js'); ?>"></script>
        <script src="<?php echo site_url('../js/jquery.actual.min.js'); ?>"></script>
        <script src="<?php echo site_url('../lib/validation/jquery.validate.js'); ?>"></script>
		<script src="<?php echo site_url('../bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script>
            $(document).ready(function(){
                
				//* boxes animation
				form_wrapper = $('.login_box');
				function boxHeight() {
					form_wrapper.animate({ marginTop : ( - ( form_wrapper.height() / 2) - 24) },400);	
				};
				form_wrapper.css({ marginTop : ( - ( form_wrapper.height() / 2) - 24) });
                $('.linkform a,.link_reg a').on('click',function(e){
					var target	= $(this).attr('href'),
						target_height = $(target).actual('height');
					$(form_wrapper).css({
						'height'		: form_wrapper.height()
					});	
					$(form_wrapper.find('form:visible')).fadeOut(400,function(){
						form_wrapper.stop().animate({
                            height	 : target_height,
							marginTop: ( - (target_height/2) - 24)
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
						login: { required: true, minlength: 4 },
						password: { required: true, minlength: 4 }
					},
					highlight: function(element) {
						$(element).closest('div').addClass("f_error");
						setTimeout(function() {
							boxHeight()
						}, 200)
					},
					unhighlight: function(element) {
						$(element).closest('div').removeClass("f_error");
						setTimeout(function() {
							boxHeight()
						}, 200)
					},
					errorPlacement: function(error, element) {
						$(element).closest('div').append(error);
					}
				});
            });
        </script>
    </body>
</html>
