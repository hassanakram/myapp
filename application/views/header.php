<!-- Bootstrap framework -->
<div>
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
            <link rel="stylesheet" href="<?php echo site_url('../lib/datatables/extras/TableTools/media/css/TableTools.css'); ?>"/>


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

    




</div>

		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
					<div class="navbar-inner">
						<div class="container">
							<?php echo anchor('', 'My App',"class='brand pull-left' "); ?>
							
							<ul class="nav navbar-nav user_menu pull-right">
								<li class="hidden-phone hidden-tablet">
									<div class="nb_boxes clearfix">
										<a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a>
										<a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="New tasks">10 <i class="splashy-calendar_week"></i></a>
									</div>
								</li>
								<li class="divider-vertical hidden-sm hidden-xs"></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav_condensed" data-toggle="dropdown"><i class="flag-gb"></i> <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="javascript:void(0)"><i class="flag-de"></i> Deutsch</a></li>
										<li><a href="javascript:void(0)"><i class="flag-fr"></i> Français</a></li>
										<li><a href="javascript:void(0)"><i class="flag-es"></i> Español</a></li>
										<li><a href="javascript:void(0)"><i class="flag-ru"></i> Pусский</a></li>
									</ul>
								</li>
								
								<li class="divider-vertical hidden-sm hidden-xs"></li>
								<li class="dropdown">
									<?php if ($this->tank_auth->is_logged_in()): ?>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo site_url('../img/user_avatar.png'); ?>" alt="" class="user_avatar"> <?php echo $this->tank_auth->get_username(); ?> <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><?php echo anchor('/auth/unregister/', 'Delete Account'); ?></li>
											<li class="divider"></li>
											<li><?php echo anchor('/auth/logout/', 'Logout'); ?> </li>

										</ul>
									<?php else: ?>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo site_url('../img/user_avatar.png'); ?>" alt="" class="user_avatar"> Login <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><?php echo anchor('/auth/login/', 'Login'); ?></li>
										</ul>
									<?php endif; ?>
								</li>
							</ul>
						</div>
					</div>
				</nav>		
</div>