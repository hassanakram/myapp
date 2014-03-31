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
					    	<?php if($this->tank_auth->isTutor()): ?>
					        	<h3 class="heading"><small>Search is not for tutors, go to <?php echo anchor('/bookings/index/', "your booking's list"); ?> </small></h3>
					        	
					        <?php else: ?>
					        	<h3 class="heading"><small>Search results</small></h3>
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

<?php if(!$this->tank_auth->isTutor()): ?>
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
				'name'	=> 'postel_code',
				'id'	=> 'postel_code',
				'placeholder'	=> 'Postal Code',
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

			$hourly_rate = array(
				'name'	=> 'hourly_rate',
				'id'	=> 'hourly_rate',
				'placeholder'	=> 'Hourly Rate $',
				'style'=>'width:170px',
				
			);

			$rating = array(
				'name'	=> 'rating',
				'id'	=> 'rating',
				'style'=>'width:170px',
			);
		?>


	<?php echo form_open('auth/search',"id='search_form'"); ?>
		<div class="sidebar">
		    
			<div class="sidebar_inner_scroll">
				<div class="sidebar_inner">
					<div class="sidebar_filters">
						
						<h2>Search Tutor</h2>
						
						<div class="filter_items">
							<?php foreach($specialities as $key => $value) : ?>
						        <input type="checkbox" class="specialities" name="<?php echo $key;?>" value="<?php echo $value;?>">&nbsp;<?php echo $key;?><br />
						    <?php endforeach;?>

						    <input type="checkbox" id="other" name="other" value="other">&nbsp;Other(any)<br />

						</div>

						<div class="filter_items">
							<?php echo form_input($postel_code); ?>
						</div>
						<div class="filter_items">
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
			</div>
		</div>
<?php endif; ?>




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
