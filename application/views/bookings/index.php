


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
		
		<div id="maincontainer" class="clearfix">
			


			<div id="contentwrapper">
                <div class="main_content">
                    				                    
					<div class="row search_page">
					    <div class="col-sm-12 col-md-12">
					        <h3 class="heading"><small>Booking with</small></h3>
								<?php
									if ( $result == false )
									{
										echo 'No Bookings Exists...';
									}
									else if ( $result == 11111 )
									{
										echo 'No Bookings Exists...';
									}
									else
									{
										$i=1;
										
										foreach($result as $row)
										{
											if( ! $this->tank_auth->isTutor($user_id) ) //common USER
											{
												$name=$this->tank_auth->get_fullname($row->tutor_id);
												
												$path=$this->tank_auth->getThumb($row->tutor_id);	

												$path=site_url('../uploads').'/'.$path;

												if(!is_array(getimagesize($path)))
												{
													$path="http://www.placehold.it/80x80/EFEFEF/AAAAAA";
												}

												echo '<div class="search_item clearfix"> <span class="searchNb">'.$i.'</span> <div class="thumbnail pull-left" style="margin-right: 15px;"> <img alt="" src="'.$path.'"> </div><div class="search_content"> <h4> <a href="javascript:void(0)" class="sepV_a">'.$name.'</a>';

												if($row->status==NULL)
												{
													echo '<span class="label label-info">Pending</span>';
												}
												else if($row->status==0)
												{
													echo '<span class="label label-info">Rejected</span>';	
												} 
												else
												{
													echo '<span class="label label-info"> Accepted  </span>';
												}


												echo '</h4><p class="sepH_b item_description">'.$row->from_date.' To '.$row->till_date.'</br>'.$row->from_time.' To '.$row->till_time.'</p> ';

												$id = $row->id;

												echo "<div 'style=' display:inline; ' '>";

												


												if($row->status==1)
												{
													if($row->feedback==0)
													{
														echo form_open("bookings/feedbackview","style ='float: left; padding: 5px;' ");
														echo ' <input type="hidden" id="id" name="user_id" value="'.$row->tutor_id.'">  <input type="hidden" id="id" name="booking_id" value="'.$id.'">  <input type="submit" value="Give feedback" class="btn btn-gebo" />  ';
														echo form_close();
													}
												}
												else
												{
													echo form_open("bookings/edit","style ='float: left; padding: 5px;' ");
												
													echo ' <input type="hidden" id="id" name="booking_id" value="'.$id.'"> <input type="hidden" id="id" name="tutor_name" value="'.$name.'"> <input type="submit" value="Edit Booking" class="btn btn-primary" />  ';
													
													echo form_close();

													
												}

												echo "</div>";
												echo '</div></div>';

												$i++;
											}
											else   // Tutor
											{
											
												$name=$this->tank_auth->get_fullname($row->user_id);

												$path=$this->tank_auth->getThumb($row->user_id);	

												$path=site_url('../uploads').'/'.$path;

												if(!is_array(getimagesize($path)))
												{
													$path="http://www.placehold.it/80x80/EFEFEF/AAAAAA";
												}


												echo '<div class="search_item clearfix"> <span class="searchNb">'.$i.'</span> <div class="thumbnail pull-left" style="margin-right: 15px;"> <img alt="" src="'.$path.'"> </div><div class="search_content"> <h4> <a href="javascript:void(0)" class="sepV_a">'.$name.'</a> </h4><p class="sepH_b item_description">'.$row->from_date.' To '.$row->till_date.'</br>'.$row->from_time.' To '.$row->till_time.'</p> ';

												$id = $row->id;
												echo "<div 'style=' display:inline; ' '>";
												
												
												if($row->status == NULL || $row->changed ==1 )
												{
													echo form_open("bookings/accept","style ='float: left; padding: 5px;' ");
													echo ' <input type="hidden" id="id" name="user_id" value="'.$row->user_id.'"> <input type="hidden" id="id" name="booking_id" value="'.$id.'"> <input type="hidden" id="id" name="tutor_name" value="'.$name.'"> <input type="submit" value="Accept Booking" class="btn btn-success" />  ';
													echo form_close();

													echo form_open("bookings/reject","style ='float: left; padding: 5px;' ");
													echo ' <input type="hidden" id="id" name="user_id" value="'.$row->user_id.'"> <input type="hidden" id="id" name="booking_id" value="'.$id.'"> <input type="hidden" id="id" name="tutor_name" value="'.$name.'"> <input type="submit" value="Reject Booking" class="btn btn-danger" />  ';
													echo form_close();
												}
												else
												{
													echo form_open("bookings/delete","style ='float: left; padding: 5px;'");
													echo ' <input type="hidden" id="id" name="booking_id" value="'.$id.'"> <input type="hidden" id="id" name="tutor_name" value="'.$name.'"> <input type="submit" value="Cancel Booking" class="btn btn-primary" />  ';
													echo form_close();
												}
												
												

												echo '</div>';
												echo '</div></div>';

												$i++;
											}
										}
									}
								?>
					        </div>

					    </div>
					</div>           
				</div>
            </div>


<?php
			$first_name = array(
				'name'	=> 'firstname',
				'id'	=> 'firstname',
				'placeholder'	=> 'First Name',
				'width'=>'150px',
				'style'=>'width:170px',
			);
			$last_name = array(
				'name'	=> 'lastname',
				'id'	=> 'lastname',
				'placeholder'	=> 'Last Name',
				'width'=>'150px',
				'style'=>'width:170px',
			);
			
			$gender = array(
				'name'	=> 'gender',
				'id'	=> 'gender',
				'placeholder'	=> 'Gender',
				'style'=>'width:170px',
			);
		?>


	
		<div class="sidebar">
			<div class="sidebar_inner_scroll">
				<div class="sidebar_inner">
					<div class="sidebar_filters">
						
							<?php if ($this->tank_auth->isTutor()): ?>

								<h2>My Bookings</h2>

							<?php else: ?>

								<h2>Requested Bookings</h2>
							<?php endif; ?>

							<?php if ($this->tank_auth->isTutor()): ?>
								<div class="filter_items">
									You can cancel a Booking
								</div>
								<div class="filter_items">
									You can accept a Booking
								</div>

								<div class="filter_items">
									You can reject a Booking
								</div>
								

							<?php else: ?>

								<div class="filter_items">
									You can Edit a booking
								</div>
							<?php endif; ?>
						

						<div class="filter_items">
							
							<?php echo anchor('', 'Back To search Page'); ?>
						</div>
						
					</div>
				</div>
			</div>
		</div>





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

		

	<!-- Pop up for feed back -->
	<script src="<?php echo site_url('../js/jquery.leanModal.min.js'); ?>"></script>	

	<!-- common functions -->
	<script src="<?php echo site_url('../js/gebo_common.js'); ?>"></script>

	<!-- search page functions -->
    <script src="<?php echo site_url('../js/gebo_search.js'); ?>"></script>

    
	

	  
</div>
					</body>
				</html>
