<!DOCTYPE html>
<html lang="en" class="login_page">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Edit Profile</title>
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

$specialities= array(
                'English' => 'English',
                'Math' => 'Math',
                'Science' => 'Science',
                'Biology' => 'Biology',
                'Physics' => 'Physics',
                'Chemistry' => 'Chemistry',
                );

$firstname = array(
	'name'	=> 'firstname',
	'id'	=> 'firstname',
	'value'	=> $firstname,
	'maxlength'	=> 80,
	'size'	=> 30,
);



$lastname = array(
	'name'	=> 'lastname',
	'id'	=> 'lastname',
	'value'	=> $lastname,
	'maxlength'	=> 80,
	'size'	=> 30,
);






$school = array(
	'name'	=> 'school',
	'id'	=> 'school',
	'placeholder' => "School",
	'value'	=> $school,
	'maxlength'	=> 80,
	'size'	=> 30,
);

$paypal_id = array(
	'name'	=> 'paypal_id',
	'id'	=> 'paypal_id',
	'placeholder' => "Pay Pal id",
	'value'	=> $paypal_id,
	'maxlength'	=> 20,
	'size'	=> 20,
);


$phone = array(
	'name'	=> 'phone',
	'id'	=> 'phone',
	'placeholder' => "Phone #",
	'value'	=> $phone,
	'maxlength'	=> 25,
	'size'	=> 25,
);

$postel_code = array(
	'name'	=> 'postel_code',
	'id'	=> 'postel_code',
	'placeholder' => "Postal Code",
	'value'	=> $postel_code,
	'maxlength'	=> 25,
	'size'	=> 25,
);



$specialties = array(
	'name'	=> 'specialities_other',
	'id'	=> 'specialties',
	'placeholder' => "specialities (Other)",
	'value'	=> $specialities_other,
	'maxlength'	=> 25,
	'size'	=> 25,
);



$biography = array(
	'name'	=> 'biography',
	'id'	=> 'biography',
	'cols'=>"20",
	'rows'=>"3",
	'class'=>"form-control",
	'placeholder' => "Biography",
	'value'	=> $biography,
	'width' =>'255px',
	'maxlength'	=> 250,
	'size'	=> 250,
);

$hourly_rate = array(
	'name'	=> 'hourly_rate',
	'class'=>"form-control",
	'id'	=> 'hourly_rate',
	'placeholder' => "Hourly Rate",
	'value'	=> $hourly_rate,
	'type'=>"text",
	'maxlength'	=> 25,
	'size'	=> 16,
);

$start_time = array(
	'name'	=> 'start_time',
	'id'	=> 'start_time',
	'placeholder' => "Start Time e.g 10:00 A.M",
	'value'	=> $start_time,
	'maxlength'	=> 20,
	'size'	=> 20,
);


$end_time = array(
	'name'	=> 'end_time',
	'id'	=> 'end_time',
	'placeholder' => "End Time e.g 08:00 P.M",
	'value'	=> $end_time,
	'maxlength'	=> 20,
	'size'	=> 20,
);




?>

<!-- <form action="dashboard.html" method="post" id="reg_form" > -->
	<?php echo form_open('auth/update_profile',"id='login_form'"); ?>
				<div class="top_b">Edit Your Profile</div>
				<?php 
					if($success == TRUE) {
						echo '<div class="alert alert-warning alert-login">Profile Updated Successfully</div>'; 
					}

					if(!$this->tank_auth->isUpdated()) {
						echo '<div class="alert alert-warning alert-login">Complete Your Profile</div>'; 
					}

				?>
				
				<div class="cnt_b">
					<div class="form-group">
						<div class="input-group">
							
							<?php echo form_input($firstname); ?>
							<label style="color: red;"><?php echo form_error($firstname['name']); ?><?php echo isset($errors[$firstname['name']])?$errors[$firstname['name']]:''; ?></label>
							
						</div>
					</div>

					

					<div class="form-group">
						<div class="input-group">
							<?php echo form_input($lastname); ?>
							<label style="color: red;"><?php echo form_error($lastname['name']); ?><?php echo isset($errors[$lastname['name']])?$errors[$lastname['name']]:''; ?></label>
						</div>
					</div>
					

					
				<?php if( ! $this->tank_auth->isTutor()): ?>

					<div class="form-group">
						<div class="input-group">
							<?php echo form_input($school); ?>
							<label style="color: red;"><?php echo form_error($school['name']); ?><?php echo isset($errors[$school['name']])?$errors[$school['name']]:''; ?></label>
						</div>
					</div>				


					<div class="form-group">
						<div class="input-group">
							
							<?php

										$options = array(
														  ''  => $grade,
														  '' => 'Grade',
										                   '1' => 'Grade 1'  ,
										                    '2' => 'Grade 2',
										                   '3' => 'Grade 3',
										                  '4' => 'Grade 4',
										                  '5'=> 'Grade 5' ,
										                  '6'=> 'Grade 6' ,
										                  '7'=> 'Grade 7'  ,
										                   '8'=> 'Grade 8' ,
										                  '9' => 'Grade 9'  ,
										                  '10'=> 'Grade 10'  ,
										                  '11' => 'Grade 11' ,
										                   '12'=> 'Grade 12' ,
										                  'university' => 'University',
										                );

										echo form_dropdown('grade', $options);
							?>
						</div>
					</div>

				<?php else: ?>

					

					<div class="form-group">
						<div class="input-group">	
							<br />

							<?php foreach($specialities as $key => $value) : ?>
								        <input type="checkbox" class="specialities" name="<?php echo $key;?>" value="<?php echo $value;?>">&nbsp;<?php echo $key;?>&nbsp;&nbsp;
								    <?php endforeach;?>
								    <br /><br />
							<input type="checkbox" id="other" name="other" value="other">&nbsp;Other(any)<br /><br />
						</div>
					</div>


					

					<div class="form-group">
						<div class="input-group">
							<?php echo form_input($specialties); ?>
							<label style="color: red;"><?php echo form_error($specialties['name']); ?><?php echo isset($errors[$specialties['name']])?$errors[$specialties['name']]:''; ?></label>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">$</span>
							<?php echo form_input($hourly_rate); ?>
							<span class="input-group-addon">.00</span>
							<label style="color: red;"><?php echo form_error($hourly_rate['name']); ?><?php echo isset($errors[$hourly_rate['name']])?$errors[$hourly_rate['name']]:''; ?></label>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<?php echo form_textarea($biography); ?>
							<label style="color: red;"><?php echo form_error($biography['name']); ?><?php echo isset($errors[$biography['name']])?$errors[$biography['name']]:''; ?></label>
						</div>
					</div>

				<?php endif; ?>


					<div class="form-group">
						<div class="input-group">
							<?php echo form_input($paypal_id); ?>
							<label style="color: red;"><?php echo form_error($paypal_id['name']); ?><?php echo isset($errors[$paypal_id['name']])?$errors[$paypal_id['name']]:''; ?></label>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<?php echo form_input($postel_code); ?>
							<label style="color: red;"><?php echo form_error($postel_code['name']); ?><?php echo isset($errors[$postel_code['name']])?$errors[$postel_code['name']]:''; ?></label>
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<?php echo form_input($phone); ?>
							<label style="color: red;"><?php echo form_error($phone['name']); ?><?php echo isset($errors[$phone['name']])?$errors[$phone['name']]:''; ?></label>
						</div>
					</div>

					

					

					<div class="form-group">
						<div class="input-group">
							Available Days & Time
						</div>
						</br>
						<div class="input-group">
							
							<?php

										$options = array(
										                  'Monday'  => 'Monday',
										                  'Tuesday'    => 'Tuesday',
										                  'Wednesday'    => 'Wednesday',
										                  'Thursday'    => 'Thursday',
										                  'Friday'    => 'Friday',
										                  'Saturday'    => 'Saturday',
										                  'Sunday'    => 'Sunday',
										                );

										echo form_dropdown('free_from', $options);
							?>

							 to 
							
							<?php

										$options = array(
										                  'Sunday'    => 'Sunday',
												  'Monday'  => 'Monday',
										                  'Tuesday'    => 'Tuesday',
										                  'Wednesday'    => 'Wednesday',
										                  'Thursday'    => 'Thursday',
										                  'Friday'    => 'Friday',
										                  'Saturday'    => 'Saturday',
										                  
										                );

										echo form_dropdown('free_till', $options);
							?>

						</div>
					</div>
					
					<div class="form-group">
						<div class="input-group">
							<?php echo form_input($start_time); ?>
							
							to

							<?php echo form_input($end_time); ?>
							
						</div>

					</div>



				<div class="btm_b tac">
					
					<?php echo form_submit('save', 'Save',"class='btn btn-default'"); ?>
					
				</div>  
			</form>
			<?php echo form_close(); ?>

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
						firstname: { required: true },
						lastname: { required: true },
						gender: { required: true },
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