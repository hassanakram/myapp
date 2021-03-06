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

        <link rel="stylesheet" href="<?php echo site_url('../lib/chosen/chosen.css'); ?>" />
        
        <link rel="stylesheet" href="<?php echo site_url('../css/bootstrap-dialog.css'); ?>" />

        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    
        <!--[if lt IE 9]>
            <script src="../js/ie/html5.js'); ?>"></script>
			<script src="../js/ie/respond.min.js'); ?>"></script>
        <![endif]-->
    </head>
  <body class="full_width">

  	
		<div id="maincontainer" class="clearfix">
			<div id="contentwrapper">
                <div class="main_content">
					<div class="row search_page">

					<?php if ($this->tank_auth->isTutor()): ?>
						<div class="add_subjects">
							<h2>My Subjects</h2>
							<table id="subs_table" class="table table-bordered">
							  <tr>
							    <th>Subjects</th>
							    <th>Grades</th>
							  </tr>
							<?php  
								foreach ($subjects as $val) 
								{
									if(str_replace(' ', '', $val)=="")
										break;
									$pieces=explode(":", $val);
									echo '<tr><td>'.$pieces[0].'</td><td>'.$pieces[1].'</td></tr>';
								}
							?>
							  
							</table>
							<div class="add_new">
								<a id="add_new_subject" href="javascript:void(0)" >Add New Subject</a>
								<div class="hidden_div">
									<div class="form-group">
										<select id="subjects" name ='action'>
								            <?php
								                
								                $array = array(
												         "English",
												         "Math",
												    	 "Geography",
												         "Chemistry",
												         "Physics",
												         "Biology",
												);
								                foreach ($array as $value) {
								                    echo "<option value='$value'>$value</option>\n";
								                }       
								            ?>
								        </select>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input type="text" id="grades" placeholder="Grades" size="50" />
										</div>
									</div>
									<div class="form-group">
										<div id="#add_clicked" class="input-group">
											<button onclick="hideAndSubmit()"  type="submit" class="btn btn-default">Add Subject</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					    <div style="margin-left: -100px;" class="col-sm-12 col-md-12">

							<?php

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
								'placeholder' => "Phone number",
								'value'	=> $phone,
								'maxlength'	=> 25,
								'size'	=> 25,
							);

							$postel_code = array(
								'name'	=> 'postel_code',
								'id'	=> 'postel_code',
								'placeholder' => "Postcode",
								'value'	=> $postel_code,
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
								<?php echo form_open_multipart('auth/update_profile',"id='login_form'"); ?>
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
													<label for="fileinput" class="control-label col-sm-2">User avatar</label>
													<div class="col-sm-8">
														<div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden" value="" name="">
															<?php
																$path=site_url('../uploads').'/'.$thumb;

																if(!is_array(getimagesize($path)))
																{
																	$path="http://www.placehold.it/80x80/EFEFEF/AAAAAA";
																}
															?>

																<div class="fileupload-new thumbnail" style="width: 80px; height: 80px;"><img src="<?php echo $path ?>"></div>

															

																<!-- <div class="fileupload-new thumbnail" style="width: 80px; height: 80px;"><img src="http://www.placehold.it/80x80/EFEFEF/AAAAAA"></div> -->

															
															<div class="fileupload-preview fileupload-exists thumbnail" style="width: 80px; height: 80px; line-height: 80px;"></div>
															<span class="btn btn-default btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="userfile" size="20"></span>
															<a href="#" class="btn btn-link fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
												</div>

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
														<span class="input-group-addon">$</span>
														<?php echo form_input($hourly_rate); ?>
														
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


											<div class="btm_b tac">
												
												<?php echo form_submit('save', 'Save',"class='btn btn-default'"); ?>
												
											</div>  
										</form>
										<?php echo form_close(); ?>
									</div>

							    </div>
							</div>           
						</div>
					</div>
				</div>

				

			<?php
				$rootDir = "";
				if(strpos($_SERVER['HTTP_HOST'],'localhost')===FALSE)
				{
				  //On Production
				  $rootDir = $_SERVER['DOCUMENT_ROOT'].'/application/views';
				}
				else
				{
				  //On Dev server
				  $rootDir = $_SERVER['DOCUMENT_ROOT'].'/myapp/application/views';
				}
			?>
			<?php include($rootDir.'/sidebar.php');?>


		<script src="<?php echo site_url('../js/jquery.min.js'); ?>"></script>
        <script src="<?php echo site_url('../js/jquery.actual.min.js'); ?>"></script>
        <script src="<?php echo site_url('../lib/validation/jquery.validate.js'); ?>"></script>
		<script src="<?php echo site_url('../bootstrap/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo site_url('../js/gebo_user_profile.js'); ?>"></script>


    <script src="<?php echo site_url('../js/jquery-migrate.min.js'); ?>"></script>
    
    <script src="<?php echo site_url('../js/bootstrap-dialog.js'); ?>"></script>
    <script src="<?php echo site_url('../lib/jquery-ui/jquery-ui-1.10.0.custom.min.js'); ?>"></script>
    <!-- touch events for jquery ui-->
	<script src="<?php echo site_url('../js/forms/jquery.ui.touch-punch.min.js'); ?>"></script>
    <!-- easing plugin -->
	<script src="<?php echo site_url('../js/jquery.easing.1.3.min.js'); ?>"></script>
    <!-- smart resize event -->
	<script src="<?php echo site_url('../js/jquery.debouncedresize.min.js'); ?>"></script>
    <!-- js cookie plugin -->
	<script src="<?php echo site_url('../js/jquery_cookie_min.js'); ?>"></script>
    
    <!-- bootstrap plugins -->
	<script src="<?php echo site_url('../js/bootstrap.plugins.min.js'); ?>"></script>
	
    <!-- code prettifier -->
	<script src="<?php echo site_url('../lib/google-code-prettify/prettify.min.js'); ?>"></script>
    <!-- sticky messages -->
	<script src="<?php echo site_url('../lib/sticky/sticky.min.js'); ?>"></script>
    <!-- tooltips -->
	<script src="<?php echo site_url('../lib/qtip2/jquery.qtip.min.js'); ?>"></script>
    <!-- lightbox -->
	<script src="<?php echo site_url('../lib/colorbox/jquery.colorbox.min.js'); ?>"></script>
    <!-- jBreadcrumbs -->
	<script src="<?php echo site_url('../lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js'); ?>"></script>
	
	<!-- custom scrollbar -->
	<script src="<?php echo site_url('../lib/slimScroll/jquery.slimscroll.js'); ?>"></script>
	<!-- fix for ios orientation change -->
	<script src="<?php echo site_url('../js/ios-orientationchange-fix.js'); ?>"></script>
	<!-- to top -->
	<script src="<?php echo site_url('../lib/UItoTop/jquery.ui.totop.min.js'); ?>"></script>
	<!-- mobile nav -->
	<script src="<?php echo site_url('../js/selectNav.js'); ?>"></script>

	
	<!-- common functions -->
	<script src="<?php echo site_url('../lib/chosen/chosen.jquery.min.js'); ?>"></script>

	

	<!-- autosize -->
	<script src="<?php echo site_url('../lib/autosize/jquery.autosize.min.js'); ?>"></script>	



        <script>
	        
	        function hideAndSubmit()
			{
				 $('.hidden_div').hide();
				var e = document.getElementById("subjects");
				var subects = e.options[e.selectedIndex].value;
				var grade=document.getElementById('grades').value;
				
				$.ajax({
					type: "POST",
					url:'<?php echo site_url("/auth/addSubject") ?>', 
					data: {subject: subects,
					grades: grade},
					dataType: "text",  
					cache:false,
					success: 
				    function(data){
				    	$('#subs_table tr:last').after('<tr><td>'+subects+'</td><td>'+grade+'</td></tr>');
				    }
				});// you have missed this bracket
 
			}

            $(document).ready(function(){


            	
            	$('.hidden_div').hide();

            	$('#add_new_subject').click(function(){
				    $('.hidden_div').show();
				});

				
				$(function() {
				    var items = [ 'English', 'Biology', 'Physics', 'Chemistry', 
				        'Math', 'History', 'Geography' ];

				    var items2 = [ 'k-6', '7-10', '2U', '3U', 
				        '4U', 'University'];
				        
				    function split( val ) {
				      return val.split( /,\s*/ );
				    }
				    function extractLast( term ) {
				      return split( term ).pop();
				    }
				 
				    $( "#subjects" )
				      .autocomplete({
				        minLength: 0,
				        source: function( request, response ) {
				          response( $.ui.autocomplete.filter(
				            items, extractLast( request.term ) ) );
				        },
				        focus: function() {
				          return false;
				        },
				        select: function( event, ui ) {
				          var terms = split( this.value );
				          // remove the current input
				          terms.pop();
				          // add the selected item
				          terms.push( ui.item.value );
				          // add placeholder to get the comma-and-space at the end
				          terms.push( "" );
				          this.value = terms.join( ", " );
				          return false;
				        }
				      });

				      $( "#grades" )
				      .autocomplete({
				        minLength: 0,
				        source: function( request, response ) {
				          response( $.ui.autocomplete.filter(
				            items2, extractLast( request.term ) ) );
				        },
				        focus: function() {
				          return false;
				        },
				        select: function( event, ui ) {
				          var terms = split( this.value );
				          // remove the current input
				          terms.pop();
				          // add the selected item
				          terms.push( ui.item.value );
				          // add placeholder to get the comma-and-space at the end
				          terms.push( "" );
				          this.value = terms.join( ", " );
				          return false;
				        }
				      });
				  });
             	 

                
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