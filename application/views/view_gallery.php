		<div class="row">
            <div class="col-lg-12">
                <h2>Vehicle Gallery</h2>
	              <?php 
					if($msg != NULL) {
						echo "
							<div class='alert alert-danger alert-dismissable'>
				  				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				  				<strong>" . $msg . "</strong>
							</div>";
					}
				?>
            </div>
        </div>

		<div class="row">
			<div class="col-xs-12 col-md-3">
				<div class="panel panel-primary" style="height:474px;">
					<div class="panel-heading"><i class="fa fa-search"></i> Search Filter</div>
					<div class="panel-body">
					<?php
						echo form_open('/gallery/search', array('id' => 'search', 'class' => 'form', 'method' => 'post' , 'role' => 'form'));
						//echo form_label('Location', 'location');
						//echo form_input(array('name' => 'location', 'class' => 'form-control', 'value' => set_value('location'), 'placeholder' => 'Location name or Address, E.g. Kuala Lumpur', 'required' => 'required', 'autofocus' => 'autofocus'));
						//echo form_checkbox(array('name' => 'return', 'value' => true));
						//echo form_label('&nbsp;Return at different location');
						//echo '<br>';
						//echo '<br>';
					?>

					<div class="row">
						<div class="col-xs-6">
						<?php
							echo form_label('Pick-Up Date', 'pickup');					
							echo form_input(array('name' => 'pickup', 'class' => 'form-control', 'data-provide' => 'datepicker', 'value' => set_value('pickup'), 'placeholder' => 'MM/DD/YYYY', 'required' => 'required'));
							
						?>
						</div>
						<div class="col-xs-6">
						<?php
							echo form_label('Time', 'pickuptime');
							echo form_dropdown('pickuptime', array('8 a.m' => '8 a.m', '12 p.m' => '12 p.m', '4 p.m' => '4 p.m', '8 p.m' => '8 p.m', '12 a.m' => '12 a.m'), set_value('pickuptime'), 'class="form-control"');
						?>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
						<?php
							echo form_label('Drop-Off Date', 'dropoff');
							echo form_input(array('name' => 'dropoff', 'class' => 'form-control', 'data-provide' => 'datepicker', 'value' => set_value('dropoff'), 'placeholder' => 'MM/DD/YYYY', 'required' => 'required'));
						?>
						</div>
						<div class="col-xs-6">
						<?php
							echo form_label('Time', 'dropofftime');
							echo form_dropdown('dropofftime', array('8 a.m' => '8 a.m', '12 p.m' => '12 p.m', '4 p.m' => '4 p.m', '8 p.m' => '8 p.m', '12 a.m' => '12 a.m'), set_value('dropofftime'), 'class="form-control"');
						?>
						</div>
					</div>

					<br/>

					<div class="row">
						<div class="col-xs-12">
						<?php
							echo form_label('Car Size', 'size');
							echo form_dropdown('size', array('compact' => 'Compact', 'standard' => 'Standard', 'luxury' => 'Luxury', 'van' => 'Van', 'mpv' => 'MPV'), set_value('size'), 'class="form-control"');
							echo '<br>';
							echo form_submit('submit', 'Search Now', 'class="btn btn-primary pull-right"');
							echo form_close();
						?>
						</div>
					</div>
					</div>
				</div>
			</div>

			<?php foreach($rows as $row) { ?>
            <div class="col-xs-12 col-md-3">
                <div class="thumbnail">
                    <img src="<?php echo base_url(); ?>public/car/<?php echo $row->vehicle_id;?>.jpg" alt="">
					
                    <div class="caption">
                        <h3><?php echo $row->name; ?><small> - <?php echo $row->type; ?></small></h3>
                        <p>
                        	<ul class="list-unstyled">
						  		<li><small><i class="fa fa-road"></i> Unlimited Mileage</small></li>
						  		<li><small><i class="fa fa-user"></i> <?php echo  $row->capacity; ?> Adults</small></li>
						  		<li><small><i class="fa fa-briefcase"></i> <?php echo  $row->luggage; ?> bags</small></li>
						  		<li><small><i class="fa fa-cog"></i> <?php echo $row->transmission; ?> Transmission</small></li>
						  		<li><small><i class="fa fa-leaf"></i> 
								<?php 
									if($row->ac == '1') 
										echo 'Air Conditioning';
									else 
										echo 'No Air Conditioning';
								?>
								</small></li>
								<li><small><i class="fa fa-usd"></i> Price starting from
								<?php 
									echo '<h3><center>RM' . $row->daily . '/day</center></h3><br>';
									//echo '/week - RM' . $row->weekly . '<br>';
									//echo '/day - RM' . $row->daily . '<br>';
									//echo '/month - RM' . $row->monthly . '<br>';
								
								?>							 
								</small></li>

								<?php
									echo form_open(base_url() . 'gallery/booking/' . $row->vehicle_id, array('id' => 'book', 'class' => 'form', 'method' => 'post' , 'role' => 'form'));
									echo form_input(array('name' => 'pickup', 'class' => 'hidden', 'value' => set_value('pickup')));
									echo form_input(array('name' => 'pickuptime', 'class' => 'hidden', 'value' => set_value('pickuptime')));
									echo form_input(array('name' => 'dropoff', 'class' => 'hidden', 'value' => set_value('dropoff')));
									echo form_input(array('name' => 'dropofftime', 'class' => 'hidden', 'value' => set_value('dropofftime')));
									echo '<center>';
									echo '<div class="btn-group btn-group-justified">';
									echo '<div class="btn-group">';
									if($msg != NULL || $toggle == false) {
										echo form_submit('submit', 'Select', 'class="btn btn-success" disabled="disabled"');
									} else {
										echo form_submit('submit', 'Select', 'class="btn btn-success"');
									}
									echo '</div>';
									echo '</div>';
									echo '</center>';
									echo form_close();
								?>
							</ul>
						</p>
                    </div>
					
                </div>
            </div>
			<?php } ?>
        </div>