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
					</div>
				</div>
			<?php else: ?>
				<div class="sidebar">
					<div class="sidebar_inner_scroll">
						<div class="sidebar_inner">
							<div class="sidebar_filters">
								
								<div class="filter_items">
									<h2><?php echo anchor('', 'Home'); ?></h2>
								</div>

								<div class="filter_items">
									<?php if ($this->tank_auth->isTutor()): ?>

										<h2><?php echo anchor('/bookings/index/', 'Bookings'); ?></h2>
									<?php else: ?>
										<li><?php echo anchor('/bookings/index/', 'Requested Bookings'); ?></li>
										
										<li><?php echo anchor('/bookings/Existing/', 'Existing Bookings'); ?></li>
										<li><?php echo anchor('/bookings/past/', 'Past Bookings'); ?></li>
									<?php endif; ?>
									
								</div>
								<div class="filter_items">
									<h2><?php echo anchor('/bookings/upcoming', 'Calendar'); ?></h2>
										<?php if ( isset($calender) ): ?>
											<?php if(isset($upcoming)): ?>
											
												<u><h3 style="margin-left: 20px;"><?php echo anchor('/bookings/upcoming', 'Upcomming bookings'); ?></h3></u>
												<h3 style="margin-left: 20px;"><?php echo anchor('auth/timing_calender/'.$this->tank_auth->get_user_id(), 'Availabilities'); ?></h3>
											
											<?php else: ?>
											
												<h3 style="margin-left: 20px;"><?php echo anchor('/bookings/upcoming', 'Upcomming bookings'); ?></h3>
												<u><h3 style="margin-left: 20px;"><?php echo anchor('auth/timing_calender/'.$this->tank_auth->get_user_id(), 'Availabilities'); ?></h3></u>
											
											<?php endif; ?>	
										<?php endif; ?>
								</div>
								
								<div class="filter_items">
									<h2><?php echo anchor('/auth/edit_view/', 'Profile'); ?></h2>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>