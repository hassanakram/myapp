<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>My App</title>

	      <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo site_url('../bootstrap/css/bootstrap.min.css'); ?>" />
        <!-- jQuery UI theme -->
            <link rel="stylesheet" href="<?php echo site_url('../lib/jquery-ui/css/Aristo/Aristo.css'); ?>" />
        <!-- tooltips-->
            <link rel="stylesheet" href="<?php echo site_url('../lib/jBreadcrumbs/css/BreadCrumb.css'); ?>" />
        <!-- tooltips-->
            <link rel="stylesheet" href="<?php echo site_url('../lib/qtip2/jquery.qtip.min.css'); ?>" />
		<!-- colorbox -->
            <link rel="stylesheet" href="<?php echo site_url('../lib/colorbox/colorbox.css'); ?>" />
        <!-- code prettify -->
            <link rel="stylesheet" href="<?php echo site_url('../lib/google-code-prettify/prettify.css'); ?>" />    
        <!-- sticky notifications -->
            <link rel="stylesheet" href="<?php echo site_url('../lib/sticky/sticky.css'); ?>" />    
        <!-- aditional icons -->
            <link rel="stylesheet" href="<?php echo site_url('../img/splashy/splashy.css'); ?>" />
		<!-- flags -->
            <link rel="stylesheet" href="<?php echo site_url('../img/flags/flags.css'); ?>" />	
        <!-- datatables -->
            <link rel="stylesheet" href="<?php echo site_url('../lib/datatables/extras/TableTools/media/css/TableTools.css'); ?>">


        <!-- main styles -->
            <link rel="stylesheet" href="<?php echo site_url('../css/style.css'); ?>" />
		<!-- theme color-->
            <link rel="stylesheet" href="<?php echo site_url('../css/blue.css" id="link_theme'); ?>" />	
            
            <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>

        <!-- favicon -->
            <link rel="shortcut icon" href="<?php echo site_url('../favicon.ico'); ?>" />

        <!--[if lte IE 8]>
            <link rel="stylesheet" href="<?php echo site_url('../css/ie.css'); ?>" />
        <![endif]-->
        	
        <!--[if lt IE 9]>
			<script src="<?php echo site_url('../js/ie/html5.js'); ?>"></script>
			<script src="<?php echo site_url('../js/ie/respond.min.js'); ?>"></script>
			<script src="<?php echo site_url('../lib/flot/excanvas.min.js'); ?>"></script>
        <![endif]-->

        

    </head>
    <body class="full_width">

    <?php
					$specialities= array(
		                'English' => 'english',
		                'Math' => 'math',
		                'Science' => 'Science',
		                'Biology' => 'biology',
		                'Physics' => 'physics',
		                'Chemistry' => 'chemistry',
		                );

					$postel_code = array(
						'5',
						'10',
						'20',
						'50',
						'Unlimited'
					);

					$last_name = array(
						'name'	=> 'lastname',
						'id'	=> 'lastname',
						'placeholder'	=> 'Last Name',
						'width'=>'150px',
						'style'=>'width:170px',
					);

					$hourly_rate = array(
						'name'	=> 'hourly_rate',
						'id'	=> 'hourly_rate',
						'placeholder'	=> 'Hourly Rate $',
						'style'=>'width:170px',

					);

					$rating = array(
						'1',
						'2',
						'3',
						'4',
						'5'
					);
				?>


		<div id="maincontainer" class="clearfix">
			<div id="contentwrapper">
                <div class="main_content">
					<div class="row search_page">
					    <div style="margin-left: 30px;" class="col-sm-12 col-md-12">
					    	<?php if($this->tank_auth->isTutor()): ?>
					        	
					        	<div style="display:inline; float:left" class='rating_details'>
					        		<h4 style="display:inline;font-size:20px;">average star rating : 
					        		 </h4>


					        	</div>
					        	<?php 
									$percent= ($average_rating/5)*100; 
								?>
				        		<span style="margin-left: 200px; display: block; width: 65px; height: 13px; background: url('<?php echo site_url('../img/stars.png'); ?>') 0 0;">
									<span style="display: block; width: <?php echo $percent; ?>%; height: 13px; background: url('<?php echo site_url('../img/stars.png'); ?>') 0 -13px;"></span>
								</span>
					        </br>
					        	<div style="display:inline; float:left" class='rating_details'>
					        		<h4 style="display:inline; font-size:20px;" >Last ten star rating :  </h4>
					        		
					        	</div>
					        	<?php 
									$percent= ($LastTen_rating/5)*100; 
								?>
				        		<span style="margin-left: 200px; display: block; width: 65px; height: 13px; background: url('<?php echo site_url('../img/stars.png'); ?>') 0 0;">
									<span style="display: block; width: <?php echo $percent; ?>%; height: 13px; background: url('<?php echo site_url('../img/stars.png'); ?>') 0 -13px;"></span>
								</span>

					        </br>
											        	
					    		<div style="float:right;margin-top: -40;margin-right: 73px;" class='rating_details'>
					        		<h4 style="font-size:20px;" >Status Points : <?php echo $status_points; ?> </h4>
					        	</div>

					        </br>

					        	<?php
					        		if($status_points>100)
					        		{
					        			$status_points_remaining=0;
					        		}
					        	?>
					        </br>
					        	<div style="float:right;margin-top: -60;margin-right: 40px;" class='rating_details'>
					        		<h4 style="font-size:20px;margin-top:5px;">Points until <div style="color:#FFD65A;display:inline;">GOLD</div>  : <?php echo $status_points_remaining ?> </h4>
					        	</div>

					        	<div class='rating_details'>
					        		<h4>You have <b> <?php echo count($lastWeekBookings);  ?> </b> bookings in the next week  </h4>
					        	</div>
					        	
					        	<div class="row search_page">
								    <div class="col-sm-12 col-md-12">
								        

								        <div id="dt_a_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div class="dt_actions"></div><div id="dt_a_length" class="dataTables_length"></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dt_a_filter"></div></div></div><table  class="table table-striped table-bordered dTableR dataTable" id="dt_a" aria-describedby="dt_a_info">

								        <thead>
								        	<tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 200px;" aria-label="Browser: activate to sort column ascending">Date</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">Time</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">Subject</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">User</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">Location</th></tr>
								        </thead>
								        <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
								        	

					        	<?php 
						        	foreach($lastWeekBookings as $row)
									{
										
												$name=$this->tank_auth->get_fullname($row->user_id);

												

												echo '<tr class="odd">';

												echo '<td class=" sorting_1">'.$row->from_date.'</td>';
												echo '<td class=" sorting_1">'.$row->from_time.'</td>';
												
												echo '<td class=" sorting_1">'.$row->subject.'</td>';

												echo '<td class=" sorting_1">'.$name.'</td>';

												echo '<td class=" sorting_1">742 Evergreen Terrace, Springfield</td>';

												echo '</tr>';
										
									}
								?>

										</tr>
								</tbody>
							</table>
							        </div>

							    </div>
							</div>

					        <?php else: ?>
					        	<h3 class="heading"><small>Search For Tutors</small></h3>
					        	
					        	<div class="row search_page">
									    <div style="margin-left: 30px;" class="col-sm-12 col-md-12">
									    	<h2>Search Tutor</h2>
												<?php echo form_open('auth/search',"id='search_form'"); ?>
												<div class="filter_items">
													<h3>Distance</h3>
													<?php
														$options = array(
														                  	'English' => 'english',
															                'Math' => 'math',
															                'Science' => 'Science',
															                'Biology' => 'biology',
															                'Physics' => 'physics',
															                'Chemistry' => 'chemistry',
															                'History' => 'History',
															                'Geography' => 'Geography',
														                );

														echo form_dropdown('subjects', $options,"","style='width:170px'");
													?>
												</div>

												<div class="filter_items">
													<h3>Distance</h3>
													<?php
														$options = array(
														                  '0'  => 'Unlimited',
														                  '5'  => '5',
														                  '10'  => '10',
														                  '20'  => '20',
														                  '50'  => '50'
														                );

														echo form_dropdown('rating', $options,"","style='width:170px'");
													?>
												</div>
												<div  class="filter_items">
													<?php echo form_input($hourly_rate); ?>
												</div>
												
												<div class="filter_items">
													<h3>Minimum Rating</h3>
													<?php
														$options = array(
														                  '0'  => 'Any',
														                  '1'  => '1',
														                  '2'  => '2',
														                  '3'  => '3',
														                  '4'  => '4',
														                  '5'  => '5'
														                );

														echo form_dropdown('rating', $options,"","style='width:170px'");
													?>
												</div>
												
												<?php echo form_submit('Search', 'Search',"class='btn btn-default'"); ?>
									    </div>
									</div>
									
								

					        <?php endif; ?>

					        <?php
								if ( $result == false )
								{

								}
								else if ( $result == 11111 )
								{

								}
								else
								{
									if(!$this->tank_auth->isTutor())
									{
										$i=1;
										foreach($result as $row)
										{
											if($row->user_type=="tutor" && $row->user_id != $user_id  )
											{
												echo '<div class="search_item clearfix"> <span class="searchNb">'.$i.'</span> <div class="thumbnail pull-left"> <img alt="" src="http://placehold.it/80x80/efefef"> </div><div class="search_content"> <h4> <a href="/index.php/auth/profiles/'.$row->user_id.'">'.$row->firstname.' '.$row->lastname.'</a> </h4><p class="sepH_b item_description">I am a tutor for diffrent programming languges having experience of many years. I also made video tutorials for various programing laguages and frmaeworks</p> ';

												$id = $row->user_id;
												$name=$row->firstname.' '.$row->lastname;
												echo form_open("bookings/create","id='login_form' ");
												echo ' <input type="hidden" id="id" name="tutor_id" value="'.$id.'"> <input type="hidden" id="id" name="tutor_name" value="'.$name.'"> <input type="submit" value="Hire Me" class="btn btn-primary" />  ';
												echo form_close();

												echo '</div></div>';

												$i++;
											}
										}
									}
									else
									{
										echo "You are a tutor, You can't hire people";
									}
								}
							?>

					        
					             
					        </div>

					    </div>
					</div>           
				</div>
			</div>

			<?php include("sidebar.php"); ?>


			<script src="<?php echo site_url('../js/jquery.min.js'); ?>"></script>
		    <script src="<?php echo site_url('../js/jquery-migrate.min.js'); ?>"></script>
		    <script src="<?php echo site_url('../lib/jquery-ui/jquery-ui-1.10.0.custom.min.js'); ?>"></script>
		    <!-- touch events for jquery ui-->
			<script src="<?php echo site_url('../js/forms/jquery.ui.touch-punch.min.js'); ?>"></script>
		    <!-- easing plugin -->
			<script src="<?php echo site_url('../js/jquery.easing.1.3.min.js'); ?>"></script>
		    <!-- smart resize event -->
			<script src="<?php echo site_url('../js/jquery.debouncedresize.min.js'); ?>"></script>
		    <!-- js cookie plugin -->
			<script src="<?php echo site_url('../js/jquery_cookie_min.js'); ?>"></script>
		    <!-- main bootstrap js -->
			<script src="<?php echo site_url('../bootstrap/js/bootstrap.min.js'); ?>"></script>
		    <!-- bootstrap plugins -->
			<script src="<?php echo site_url('../js/bootstrap.plugins.min.js'); ?>"></script>
			<!-- typeahead -->
			<script src="<?php echo site_url('../lib/typeahead/typeahead.min.js'); ?>"></script>
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
			<!-- hidden elements width/height -->
			<script src="<?php echo site_url('../js/jquery.actual.min.js'); ?>"></script>
			<!-- custom scrollbar -->
			<script src="<?php echo site_url('../lib/slimScroll/jquery.slimscroll.js'); ?>"></script>
			<!-- fix for ios orientation change -->
			<script src="<?php echo site_url('../js/ios-orientationchange-fix.js'); ?>"></script>
			<!-- to top -->
			<script src="<?php echo site_url('../lib/UItoTop/jquery.ui.totop.min.js'); ?>"></script>
			<!-- mobile nav -->
			<script src="<?php echo site_url('../js/selectNav.js'); ?>"></script>

			<!-- common functions -->
			<script src="<?php echo site_url('../js/gebo_common.js'); ?>"></script>

			<!-- search page functions -->
		    <script src="<?php echo site_url('../js/gebo_search.js'); ?>"></script>

    
			<script type="text/javascript">
    			$('#other').click(function(){
				   var paramChangeBoxes = $('input:checkbox.specialities');
				   if ($(this).is(':checked')) {
				      paramChangeBoxes.attr('disabled', 'disabled');
				   }
				  else {
				      paramChangeBoxes.removeAttr('disabled');
				   }
				});
    		</script>

	  
		</div>
	</body>
</html>