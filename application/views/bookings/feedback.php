
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





		
		<div class="login_box">
			
			
				<div class="top_b"  style="margin-left: 52;">Review and Rating</div>    
				<div class="cnt_b" style="padding-top: 0px; padding-bottom: 0px;">
					<div class="form-group">
						<div class="input-group">
							

						<?php 	echo form_open("bookings/feedback"); ?>


							 <input type="hidden" id="id" name="user_id" value="<?php echo $user_id; ?>"> 

							 <input type="hidden" id="id" name="booking_id" value="<?php echo $booking_id; ?>"> 


							 <textarea style="width:250px" name="review" id="txtarea_sp" cols="20" rows="3" placeholder="Give review about the tutuor" class="form-control"></textarea>
							
									<label>Rating</label>
									<div class="input-group">
										
										<?php

													$options = array(
																	   '1' => '1'  ,
													                    '2' => '2',
													                   '3' => '3',
													                  '4' => '4',
													                  '5'=> '5' ,
													                );

													echo form_dropdown('rating', $options);
										?>
									</div>
								
						</div>
					</div>

				</div>
				<div 
				class="btm_b clearfix">
					 <button class="btn btn-default btn-sm pull-right" type="submit">Submit</button> 

					<?php echo form_close();   ?>							

				</div>  
			</form>
			
			
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
