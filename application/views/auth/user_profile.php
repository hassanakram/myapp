


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
					    <div  class="col-sm-12 col-md-12">


					        <!-- ********************************************************* -->
					        
					        <div class="col-sm-12 col-md-12">
        						
    							<h3 class="heading">Tutor Profile  </h3>
    						
    						

								<div class="row">
									<div class="col-sm-12 col-md-12">
									<div class="vcard">
										<img class="thumbnail" src="http://www.placehold.it/80x80/EFEFEF/AAAAAA" alt="">
										<ul>
											<li class="v-heading">
												User info
											</li>

											<li>
												<span class="item-key">Full name</span>
												<div class="vcard-item"><?php echo $full_name; ?></div>
											</li>
											
											<li>
												<span class="item-key">Hourly Rate</span>
												<div class="vcard-item">$<?php echo $hourly_rate; ?></div>
											</li>

											<li>
												<span class="item-key">Rating</span>
													<div class="vcard-item">
														<?php 

															$percent= ($rating/5)*100; 

														?>


<span style="display: block; width: 65px; height: 13px; background: url('<?php echo site_url('../img/stars.png'); ?>') 0 0;">
														    <span style="display: block; width: <?php echo $percent; ?>%; height: 13px; background: url('<?php echo site_url('../img/stars.png'); ?>') 0 -13px;"></span>
														</span>
												</div>
											</li>


											<li>
												<span class="item-key">Specialities:</span>
												<div class="vcard-item">
													<ul class="list_a">
													<? if ($eng=='English'): ?>
														<li>English</li>
													<? endif; ?>

													<? if ($eng=='English'): ?>
														<li>Math</li>
													<? endif; ?>

													<? if ($phy=='Physics'): ?>
														<li>Physics</li>
													<? endif; ?>

													<? if ($chem=='Chemistry'): ?>
														<li>Chemistry</li>
													<? endif; ?>

													<? if ($bio=='Biology'): ?>
														<li>Biology</li>
													<? endif; ?>

													<? if ($science=='Science'): ?>
														<li>General Science</li>
													<? endif; ?>

													
														<li>Others</li>
													
													</ul>
												</div>
											</li>



											

											<li>
												<span class="item-key">Biography</span>
												
												<div class="vcard-item"><?php echo $biography; ?></div>
												
											</li>
											 

											 

											 <li class="v-heading">
												<?php
					        						echo form_open("bookings/create","id='login_form' ");
																	echo ' <input type="hidden" id="id" name="tutor_id" value="'.$id.'"> <input type="hidden" id="id" name="tutor_name" value="'.$name.'"> <input type="submit" value="Book a session with me" class="btn btn-primary" />  ';
																	echo form_close();

												?>
											</li>
											
											<!--<li>
												<ul class="sepH_b item-list list-unstyled">
													<li><i class="splashy-comment sepV_b"></i>John <a href="#">commented</a> on <a href="#">Lorem ipsum dolor sit amet...</a></li>
													<li><i class="splashy-document_letter_edit sepV_b"></i>John <a href="#">posted</a> new article <a href="#">Lorem ipsum dolor sit amet, consectetur...</a></li>
													<li><i class="splashy-image_cultured  sepV_b"></i>John added <a href="#">new_image,jpg</a></li>
													<li><i class="splashy-comment sepV_b"></i>John <a href="#">commented</a> on <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></li>
													<li class="item-list-more"><i class="splashy-comment sepV_b"></i>John <a href="#">commented</a> on <a href="#">Lorem ipsum dolor sit </a></li>
													<li class="item-list-more"><i class="splashy-comment sepV_b"></i>John <a href="#">commented</a> on <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></li>
													<li class="item-list-more"><i class="splashy-comment sepV_b"></i>John <a href="#">commented</a> on <a href="#">Lorem ipsum dolor sit amet, consectetur </a></li>
													<li class="item-list-more"><i class="splashy-comment sepV_b"></i>John <a href="#">commented</a> on <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing</a></li>
													<li class="item-list-more"><i class="splashy-comment sepV_b"></i>John <a href="#">commented</a> on <a href="#">Lorem ipsum, consectetur adipiscing elit</a></li>
													<li class="item-list-more"><i class="splashy-comment sepV_b"></i>John <a href="#">commented</a> on <a href="#">Lorem ipsum dolor sit </a></li>
													<li class="item-list-more"><i class="splashy-comment sepV_b"></i>John <a href="#">commented</a> on <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></li>
													<li class="item-list-more"><i class="splashy-comment sepV_b"></i>John <a href="#">commented</a> on <a href="#">Lorem ipsum dolor sit amet, consectetur </a></li>
													<li class="item-list-more"><i class="splashy-comment sepV_b"></i>John <a href="#">commented</a> on <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing</a></li>
													<li class="item-list-more"><i class="splashy-comment sepV_b"></i>John <a href="#">commented</a> on <a href="#">Lorem ipsum, consectetur adipiscing elit</a></li>
												</ul>
												<a href="#" data-items="5" class="item-list-show btn btn-default btn-xs">Show 5 more...</a>
											</li> -->
											
										</ul>
									</div>
									</div>
								</div>	
    						
    						</div>

    						<!-- ********************************************************* -->

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
			$middle_name = array(
				'name'	=> 'middlename',
				'id'	=> 'middlename',
				'placeholder'	=> 'Middle Name',
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
						
						<h2>Your Bookings</h2>
						<div class="filter_items">
							You can Edit a booking
						</div>
						<div class="filter_items">
							You can cencel a Booking
						</div>
						<div class="filter_items">
							You can accept a Booking
						</div>
						<div class="filter_items">
							You can reject a Booking
						</div>

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

	<!-- common functions -->
	<script src="<?php echo site_url('../js/gebo_common.js'); ?>"></script>

	<!-- search page functions -->
    <script src="<?php echo site_url('../js/gebo_search.js'); ?>"></script>

    <script type="text/javascript">
	    $.fn.stars = function() {
	    return $(this).each(function() {
	        $(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * 16));
	    });
		}
    </script>
	

	  
</div>
					</body>
				</html>
