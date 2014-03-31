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
    
        	<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    </head>
	<body>
		<?php
			$first_name = array(
				'name'	=> 'firstname',
				'id'	=> 'firstname',
				'placeholder'	=> 'First Name',
				'maxlength'	=> 80,
				'size'	=> 30,
			);
			$last_name = array(
				'name'	=> 'lastname',
				'id'	=> 'lastname',
				'placeholder'	=> 'Last Name',
				'maxlength'	=> 80,
				'size'	=> 30,
			);
			$middle_name = array(
				'name'	=> 'middlename',
				'id'	=> 'middlename',
				'placeholder'	=> 'Middle Name',
				'maxlength'	=> 80,
				'size'	=> 30,
			);
			$gender = array(
				'name'	=> 'gender',
				'id'	=> 'gender',
				'placeholder'	=> 'Gender',
				'maxlength'	=> 10,
				'size'	=> 10,
			);
		?>
		<?php echo form_open('auth/search',"id='search_form'"); ?>
			<div class="top_b">
				Search Tutor
			</div>
			
			<div class="cnt_b">
				<div class="form-group">
					<div class="input-group">
						<?php echo form_input($first_name); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="input-group">
						<?php echo form_input($middle_name); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="input-group">
						<?php echo form_input($last_name); ?>
					</div>
				</div>
				
				<div class="form-group">
					<div class="input-group">
						<?php echo form_input($gender); ?>
					</div>
				</div>

				<div class="btm_b tac">			
					<?php echo form_submit('save', 'Save',"class='btn btn-default'"); ?>
				</div>  
			</div>
		<?php echo form_close(); ?>
		<div>
			<?php
				if ( $result == false )
				{
					echo 'No such Tutor Exists...';
				}
				else if ( $result == 11111 )
				{
					echo 'No such Tutor Exists...';
				}
				else
				{
					foreach($result as $row)
					{
						echo '<p>' . $row->firstname . ' ' . $row->middlename . ' ' . $row->lastname . ' ' . $row->gender . '<p>';
					}
				}
			?>
		</div>
	</body>
</html>