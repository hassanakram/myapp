


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

					        <div id="dt_a_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-sm-6"><div class="dt_actions"></div><div id="dt_a_length" class="dataTables_length"></div></div><div class="col-sm-6"><div class="dataTables_filter" id="dt_a_filter"></div></div></div><table class="table table-striped table-bordered dTableR dataTable" id="dt_a" aria-describedby="dt_a_info">

					        <thead>
					        	<tr role="row"><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 200px;" aria-label="Browser: activate to sort column ascending">Date</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 200px;" aria-label="Engine version: activate to sort column ascending">Time</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">Subject</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">Tutor</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">Rating</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">Review</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="dt_a" rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">Dispute</th></tr>
					        </thead>
					        <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">

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
													
												echo '<tr class="odd">';

												echo '<td class=" sorting_1">'.$row->from_date.'</td>';

												echo '<td class=" sorting_1">'.$row->from_time.'</td>';
												
												echo '<td class=" sorting_1">'.$row->subject.'</td>';

												echo '<td class=" sorting_1">'.$name.'</td>';

												echo '<td class=" sorting_1">'.$row->rating.'</td>';

												echo '<td class=" sorting_1">'.$row->review.'</td>';

												

												$combinedDT = date('Y-m-d H:i:s',strtotime("$row->from_date $row->from_time"));												

												$interval =  date_create($combinedDT)->diff(date_create('now'));

												if($row->is_disputed==1)
												{
													echo '<td class=" sorting_1" style="color:red;">A dispute request has been submitted</td>';

												}
												else if($interval->days==0)
												{
													if($row->is_disputed==0)
													{
														echo '<td class=" sorting_1">';
														echo form_open("bookings/make_dispute","style ='float: left; padding: 5px;' ");
														echo ' <input type="hidden" id="id" name="user_id" value="'.$row->tutor_id.'">  <input type="hidden" id="id" name="booking_id" value="'.$row->id.'">  <input type="submit" value="Make Dispute Transanction" class="btn btn-gebo" />  ';
														echo form_close();
														echo '</td>';
													}
												}
												else
												{
													echo '<td class=" sorting_1">Time passed more then 24 hours</td>';	
												}
												echo '</tr>';
													
												$i++;
											}
											else   // Tutor
											{
											
											}
										}
									}
								?>
					        
					        </tr>
						</tbody>
					</table>

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

								<h2>Past Bookings</h2>
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
									You can submit dispute request within 24 hours
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
