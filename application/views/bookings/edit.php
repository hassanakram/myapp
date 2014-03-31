<!DOCTYPE html>
<html lang="en" class="login_page">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Edit Profile</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
        <!-- theme color-->
            <link rel="stylesheet" href="../../css/blue.css" />
        <!-- tooltip -->    
			<link rel="stylesheet" href="../../lib/qtip2/jquery.qtip.min.css" />
        <!-- main styles -->
            <link rel="stylesheet" href="../../css/style.css" />
    
        <!-- favicon -->
            <link rel="shortcut icon" href="../../favicon.ico" />
    
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    
        <!--[if lt IE 9]>
            <script src="../../js/ie/html5.js"></script>
			<script src="../../js/ie/respond.min.js"></script>
        <![endif]-->
		
    </head>
  <body>

	  	<script src="../../js/jquery.min.js"></script>
	    <script src="../../js/jquery.actual.min.js"></script>
	    

		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="../../css/jquery.timepicker.css">
		<script src="//code.jquery.com/jquery-1.9.1.js"></script>
		<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<script src="../../js/jquery.timepicker.js"></script>
		<script src="../../lib/validation/jquery.validate.js"></script>
		<script src="../../bootstrap/js/bootstrap.min.js"></script>
		
  	
  	<script>

$( document ).ready(function() {
  $("#from_date").datepicker({
    dateFormat: 'yy-mm-dd'
  });
  $("#till_date").datepicker({
    dateFormat: 'yy-mm-dd'
  });

  $("#from_time").timepicker({
    
  });

  $("#till_time").timepicker({
    
  });


});

</script>

<?php

$from_date = array(
	'name'	=> 'from_date',
	'id'	=> 'from_date',
	'value' => $from_date,
	'placeholder' => 'Start Date',
	'maxlength'	=> 80,
	'size'	=> 30,
);

$till_date = array(
	'name'	=> 'till_date',
	'id'	=> 'till_date',
	'value' => $till_date,
	'placeholder' => 'End Date',
	'maxlength'	=> 80,
	'size'	=> 30,
);

$from_time = array(
	'name'	=> 'from_time',
	'id'	=> 'from_time',
	'value' => $from_time,
	'placeholder' => 'Start Time',
	'maxlength'	=> 80,
	'size'	=> 30,
);



$till_time = array(
	'name'	=> 'till_time',
	'id'	=> 'till_time',
	'value' => $till_time,
	'placeholder' => 'End Date',
	'maxlength'	=> 10,
	'size'	=> 10,
);



?>


	<?php echo form_open('bookings/update',"id='login_form'"); ?>
				<div class="top_b">Edit booking </div>
				
				<div class="cnt_b">

					<input type="hidden" name="booking_id" value=<?php echo  $id; ?> >
					
					
					<div class="form-group">
						<div class="input-group">
							
							<?php echo form_input($from_date); ?>
							
							<td style="color: red;"><?php echo form_error($from_date['name']); ?><?php echo isset($errors[$from_date['name']])?$errors[$from_date['name']]:''; ?></td>
							
						</div>
					</div>

					

										<div class="form-group">
						<div class="input-group">
							<?php echo form_input($from_time); ?>
							<td style="color: red;"><?php echo form_error($from_time['name']); ?><?php echo isset($errors[$from_time['name']])?$errors[$from_time['name']]:''; ?>
						</div>
					</div>


					



				<div class="btm_b tac">
					
					<?php echo form_submit('Update', 'Update',"class='btn btn-default'"); ?>
					
				</div>  
			
			<?php echo form_close(); ?>



		
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
						from_date: { required: true },
						till_date: { required: true },
						from_time: { required: true },
						till_time: { required: true },
						
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