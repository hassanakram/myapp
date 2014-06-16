


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
											if( $this->tank_auth->isTutor($user_id) && $row->status == 1 ) //Tutor
											{
												$combinedDT = date('Y-m-d H:i:s',strtotime("$row->from_date $row->from_time"));												

												$interval =  date_create($combinedDT)->diff(date_create('now'));

												if($interval->days<29)
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
													
													
													echo form_open("bookings/delete","style ='float: left; padding: 5px;'");
													echo ' <input type="hidden" id="id" name="booking_id" value="'.$id.'"> <input type="hidden" id="id" name="tutor_name" value="'.$name.'"> <input type="submit" value="Cancel Booking" class="btn btn-primary" />  ';
													echo form_close();

													echo '</div>';
													echo '</div></div>';

													$i++;
												}
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

    
	


	</body>
</html>
