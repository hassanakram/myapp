<?php if(!$this->tank_auth->isTutor()): ?>
				<div class="sidebar">
					<div class="sidebar_inner_scroll">
						<div class="sidebar_inner">
							<div class="sidebar_filters">
								
								<div class="filter_items">
									<h2><?php echo anchor('', 'Search'); ?></h2>
								</div>

								<div class="filter_items">
									<h2><?php echo anchor('/bookings/index/', 'Bookings'); ?></h2>
								</div>
								
								<div class="filter_items">
									<h2><?php echo anchor('/bookings/upcoming', 'Calendar'); ?></h2>
										<?php if ($this->tank_auth->isTutor()): ?>
											<?php if ( isset($calender) ): ?>
												<?php if(isset($upcoming)): ?>
												
													<u><h3 style="margin-left: 20px;"><?php echo anchor('/bookings/upcoming', 'Upcoming sessions'); ?></h3></u>
													<h3 style="margin-left: 20px;"><?php echo anchor('auth/timing_calender/'.$this->tank_auth->get_user_id(), 'Availabilities'); ?></h3>
												
												<?php else: ?>
												
													<h3 style="margin-left: 20px;"><?php echo anchor('/bookings/upcoming', 'Upcoming sessions'); ?></h3>
													<u><h3 style="margin-left: 20px;"><?php echo anchor('auth/timing_calender/'.$this->tank_auth->get_user_id(), 'Availabilities'); ?></h3></u>
												
												<?php endif; ?>	
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