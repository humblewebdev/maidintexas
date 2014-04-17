<?php
global $wpdb;
$reservations = $wpdb->get_results( 
	"SELECT * 
	FROM `wp_reservations`"
);
// foreach ( $reservations as $reservation ) 
// 	{
// 		print_r($reservation);
// 	}

?>
<div id="wpbody-content" aria-label="Main content" tabindex="0">
	<div class="wrap">
		<img src="<?php echo get_template_directory_uri() . '/images/logo.png';?>" height="60px">
		<h2> Maid In Texas Online Cleaning Requests</h2>
		<table class="wp-list-table widefat">
			<tr>
				<th class="manage-column column-cb check-column">Clean Date</th>
				<th class="manage-column column-cb check-column">First</th>
				<th class="manage-column column-cb check-column">Last</th>
				<th class="manage-column column-cb check-column">Address</th>				
				<th class="manage-column column-cb check-column">City</th>
				<th class="manage-column column-cb check-column">State</th>
				<th class="manage-column column-cb check-column">Phone</th>
				<th class="manage-column column-cb check-column">Pets</th>
				<th class="manage-column column-cb check-column">Get In</th>
				<th class="manage-column column-cb check-column">Options</th>
				<th class="manage-column column-cb check-column">Est Hrs</th>
				<th class="manage-column column-cb check-column">Est Cost</th>
				<th class="manage-column column-cb check-column">Clean time</th>
				<th class="manage-column column-cb check-column">House Size</th>
				<th class="manage-column column-cb check-column">Clean Type</th>
			</tr>
			<?php
				foreach ( $reservations as $reservation ) 
					{
						$row_template = <<<EOL
						<tr>
							<td>{$reservation->cleaningDate}</td>
							<td>{$reservation->firstName}</td>
							<td>{$reservation->lastName}</td>
							<td>{$reservation->address} {$reservation->address2}</td>
							<td>{$reservation->city}</td>
							<td>{$reservation->state}</td>
							<td>{$reservation->phone}</td>
							<td>{$reservation->pet_type}</td>
							<td>{$reservation->getIn}</td>
							<td>{$reservation->option1} {$reservation->option2}</td>
							<td>{$reservation->estHours}</td>
							<td>{$reservation->estCost}</td>
							<td>{$reservation->startTime}</td>
							<td>{$reservation->houseSize}</td>
							<td>{$reservation->cleanType}</td>
						</tr>
EOL;
						echo $row_template;
					}
			?>
		</table>
	</div>
</div>