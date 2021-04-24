<?php
$id = ( isset( $_POST['id'] ) ) ? $_POST['id'] : '';
if (empty($id)){
redirect('fasilitas/user');
}
$form = array(
	'class' => 'form-horizontal'
);
$label = array(
	'class' => 'control-label'
);
$role = array(
	'name'	=> 'role',
	'class'	=> 'role',
	'id'	=> 'role',
	'value' => set_value('role'),
	'onkeydown' => 'moveto(event)',
);

if (intval($user_role)==1){
	$role_list = array(
		1  => 'Member',
	);
}elseif (intval($user_role)==10){
	$role_list = array(
		1  => 'Member',
	);
}elseif (intval($user_role)==20){
	$role_list = array(
		1  => 'Member',
		10    => 'Admin',
	);
}elseif (intval($user_role)==30){
	$role_list = array(
		1  => 'Member',
		10    => 'Admin',
		20    => 'Supervisor',
	);
}elseif (intval($user_role)==40){
	$role_list = array(
		1  => 'Member',
		10    => 'Admin',
		20    => 'Supervisor',
		30    => 'Manager',
	);
}elseif (intval($user_role)==50){
	$role_list = array(
		1  => 'Member',
		10    => 'Admin',
		20    => 'Supervisor',
		30    => 'Manager',
		40    => 'Director',
	);
}else{
	$role_list = array(
		1  => 'Member',
		10    => 'Admin',
		20    => 'Supervisor',
		30    => 'Manager',
		40    => 'Director',
		99   => 'Super Admin',
	);
}
$change = array(
		'name' => 'change',
		'class' => 'btn btn-primary',
			'id' => 'change',
		'value' => 'Update Capabilities'
);
if( isset( $capabilities ) ){
	$user_cap = $capabilities;
}
$cap = unserialize( $user_cap );
?>
<div class="container">

	<p><a href="<?php echo base_url('fasilitas/user'); ?>" class="btn">&lt;&lt;Kembali ke halaman sebelumnya</a></p>
	<?php echo ( isset( $message ) ) ? $message : ''; ?>
	<?php echo form_open( $this->uri->uri_string() ); ?>
	<input type="hidden" name="id" value="<?php echo $id; ?>"/>
	<div class="control-group">
		<?php if ((intval($user_role)==99) || (intval($user_role)==0)){ echo form_label('Role', $role['id'], $label); ?>
		<div class="controls">
			<?php echo form_dropdown($role['name'], $role_list); ?>
			<?php echo form_error($role['name']);} ?>
		</div>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>Module</th>
				<th>Create</th>
				<th>Read</th>
				<th>Update</th>
				<th>Delete</th>
				<th>Select All</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td colspan="5"><strong>Master</strong></td>
				<td><input type="checkbox" class="all" id="master" /></td>
			</tr>


			
			<tr>
				<td>Charges</td>
				<td><input type="checkbox" name="capabilities[]" value="create_charges" <?php echo ( in_array( 'create_charges', $cap ) ) ? 'checked' : ''; ?> class="create master charges" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_charges" <?php echo ( in_array( 'read_charges', $cap ) ) ? 'checked' : ''; ?> class="read master charges" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_charges" <?php echo ( in_array( 'update_charges', $cap ) ) ? 'checked' : ''; ?>  class="update master charges" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_charges" <?php echo ( in_array( 'delete_charges', $cap ) ) ? 'checked' : ''; ?> class="delete master charges" /></td>
				<td><input type="checkbox" class="all" id="charges" /></td>
			</tr>

			<tr>
				<td>City</td>
				<td><input type="checkbox" name="capabilities[]" value="create_city" <?php echo ( in_array( 'create_city', $cap ) ) ? 'checked' : ''; ?> class="create master city" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_city" <?php echo ( in_array( 'read_city', $cap ) ) ? 'checked' : ''; ?> class="read master city" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_city" <?php echo ( in_array( 'update_city', $cap ) ) ? 'checked' : ''; ?>  class="update master city" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_city" <?php echo ( in_array( 'delete_city', $cap ) ) ? 'checked' : ''; ?> class="delete master city" /></td>
				<td><input type="checkbox" class="all" id="city" /></td>
			</tr>


			<tr>
				<td>Commodity Class</td>
				<td><input type="checkbox" name="capabilities[]" value="create_commodity_class" <?php echo ( in_array( 'create_commodity_class', $cap ) ) ? 'checked' : ''; ?> class="create master commodity_class" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_commodity_class" <?php echo ( in_array( 'read_commodity_class', $cap ) ) ? 'checked' : ''; ?> class="read master commodity_class" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_commodity_class" <?php echo ( in_array( 'update_commodity_class', $cap ) ) ? 'checked' : ''; ?>  class="update master commodity_class" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_commodity_class" <?php echo ( in_array( 'delete_commodity_class', $cap ) ) ? 'checked' : ''; ?> class="delete master commodity_class" /></td>
				<td><input type="checkbox" class="all" id="commodity_class" /></td>
			</tr>
			
			<tr>
				<td>Company</td>
				<td><input type="checkbox" name="capabilities[]" value="create_company" <?php echo ( in_array( 'create_company', $cap ) ) ? 'checked' : ''; ?> class="create master company" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_company" <?php echo ( in_array( 'read_company', $cap ) ) ? 'checked' : ''; ?> class="read master company" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_company" <?php echo ( in_array( 'update_company', $cap ) ) ? 'checked' : ''; ?>  class="update master company" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_company" <?php echo ( in_array( 'delete_company', $cap ) ) ? 'checked' : ''; ?> class="delete master company" /></td>
				<td><input type="checkbox" class="all" id="company" /></td>
			</tr>


			<tr>
				<td>Country</td>
				<td><input type="checkbox" name="capabilities[]" value="create_country" <?php echo ( in_array( 'create_country', $cap ) ) ? 'checked' : ''; ?> class="create master country" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_country" <?php echo ( in_array( 'read_country', $cap ) ) ? 'checked' : ''; ?> class="read master country" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_country" <?php echo ( in_array( 'update_country', $cap ) ) ? 'checked' : ''; ?>  class="update master country" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_country" <?php echo ( in_array( 'delete_country', $cap ) ) ? 'checked' : ''; ?> class="delete master country" /></td>
				<td><input type="checkbox" class="all" id="country" /></td>
			</tr>

			<tr>
				<td>Currency</td>
				<td><input type="checkbox" name="capabilities[]" value="create_currency" <?php echo ( in_array( 'create_currency', $cap ) ) ? 'checked' : ''; ?> class="create master currency" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_currency" <?php echo ( in_array( 'read_currency', $cap ) ) ? 'checked' : ''; ?> class="read master currency" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_currency" <?php echo ( in_array( 'update_currency', $cap ) ) ? 'checked' : ''; ?>  class="update master currency" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_currency" <?php echo ( in_array( 'delete_currency', $cap ) ) ? 'checked' : ''; ?> class="delete master currency" /></td>
				<td><input type="checkbox" class="all" id="currency" /></td>
			</tr>
			

			<tr>
				<td>Customer</td>
				<td><input type="checkbox" name="capabilities[]" value="create_customer" <?php echo ( in_array( 'create_customer', $cap ) ) ? 'checked' : ''; ?> class="create master customer" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_customer" <?php echo ( in_array( 'read_customer', $cap ) ) ? 'checked' : ''; ?> class="read master customer" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_customer" <?php echo ( in_array( 'update_customer', $cap ) ) ? 'checked' : ''; ?>  class="update master customer" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_customer" <?php echo ( in_array( 'delete_customer', $cap ) ) ? 'checked' : ''; ?> class="delete master customer" /></td>
				<td><input type="checkbox" class="all" id="customer" /></td>
			</tr>
			
			<tr>
				<td>Freight Term</td>
				<td><input type="checkbox" name="capabilities[]" value="create_freight_term" <?php echo ( in_array( 'create_freight_term', $cap ) ) ? 'checked' : ''; ?> class="create master freight_term" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_freight_term" <?php echo ( in_array( 'read_freight_term', $cap ) ) ? 'checked' : ''; ?> class="read master freight_term" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_freight_term" <?php echo ( in_array( 'update_freight_term', $cap ) ) ? 'checked' : ''; ?>  class="update master freight_term" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_freight_term" <?php echo ( in_array( 'delete_freight_term', $cap ) ) ? 'checked' : ''; ?> class="delete master freight_term" /></td>
				<td><input type="checkbox" class="all" id="freight_term" /></td>
			</tr>
			
			
			<tr>
				<td>Airport</td>
				<td><input type="checkbox" name="capabilities[]" value="create_airport" <?php echo ( in_array( 'create_airport', $cap ) ) ? 'checked' : ''; ?> class="create master airport" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_airport" <?php echo ( in_array( 'read_airport', $cap ) ) ? 'checked' : ''; ?> class="read master airport" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_airport" <?php echo ( in_array( 'update_airport', $cap ) ) ? 'checked' : ''; ?>  class="update master airport" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_airport" <?php echo ( in_array( 'delete_airport', $cap ) ) ? 'checked' : ''; ?> class="delete master airport" /></td>
				<td><input type="checkbox" class="all" id="airport" /></td>
			</tr>
	
			<tr>
				<td>Seaport</td>
				<td><input type="checkbox" name="capabilities[]" value="create_seaport" <?php echo ( in_array( 'create_seaport', $cap ) ) ? 'checked' : ''; ?> class="create master seaport" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_seaport" <?php echo ( in_array( 'read_seaport', $cap ) ) ? 'checked' : ''; ?> class="read master seaport" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_seaport" <?php echo ( in_array( 'update_seaport', $cap ) ) ? 'checked' : ''; ?>  class="update master seaport" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_seaport" <?php echo ( in_array( 'delete_seaport', $cap ) ) ? 'checked' : ''; ?> class="delete master seaport" /></td>
				<td><input type="checkbox" class="all" id="seaport" /></td>
			</tr>		

			<tr>
				<td>Region</td>
				<td><input type="checkbox" name="capabilities[]" value="create_region" <?php echo ( in_array( 'create_region', $cap ) ) ? 'checked' : ''; ?> class="create master region" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_region" <?php echo ( in_array( 'read_region', $cap ) ) ? 'checked' : ''; ?> class="read master region" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_region" <?php echo ( in_array( 'update_region', $cap ) ) ? 'checked' : ''; ?>  class="update master region" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_region" <?php echo ( in_array( 'delete_region', $cap ) ) ? 'checked' : ''; ?> class="delete master region" /></td>
				<td><input type="checkbox" class="all" id="region" /></td>
			</tr>
			
			<tr>
				<td>Sales</td>
				<td><input type="checkbox" name="capabilities[]" value="create_sales" <?php echo ( in_array( 'create_sales', $cap ) ) ? 'checked' : ''; ?> class="create master sales" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_sales" <?php echo ( in_array( 'read_sales', $cap ) ) ? 'checked' : ''; ?> class="read master sales" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_sales" <?php echo ( in_array( 'update_sales', $cap ) ) ? 'checked' : ''; ?>  class="update master sales" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_sales" <?php echo ( in_array( 'delete_sales', $cap ) ) ? 'checked' : ''; ?> class="delete master sales" /></td>
				<td><input type="checkbox" class="all" id="sales" /></td>
			</tr>
			
			<tr>
				<td>Sales Commision</td>
				<td><input type="checkbox" name="capabilities[]" value="create_sales_com" <?php echo ( in_array( 'create_sales_com', $cap ) ) ? 'checked' : ''; ?> class="create master sales_com commision" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_sales_com" <?php echo ( in_array( 'read_sales_com', $cap ) ) ? 'checked' : ''; ?> class="read master sales_com commision" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_sales_com" <?php echo ( in_array( 'update_sales_com', $cap ) ) ? 'checked' : ''; ?>  class="update master sales_com commision" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_sales_com" <?php echo ( in_array( 'delete_sales_com', $cap ) ) ? 'checked' : ''; ?> class="delete master sales_com commision" /></td>
				<td><input type="checkbox" class="all" id="sales_com" /></td>
			</tr>
			
			<tr>
				<td>Devisi</td>
				<td><input type="checkbox" name="capabilities[]" value="create_devisi" <?php echo ( in_array( 'create_devisi', $cap ) ) ? 'checked' : ''; ?> class="create master devisi" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_devisi" <?php echo ( in_array( 'read_devisi', $cap ) ) ? 'checked' : ''; ?> class="read master devisi" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_devisi" <?php echo ( in_array( 'update_devisi', $cap ) ) ? 'checked' : ''; ?>  class="update master devisi" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_devisi" <?php echo ( in_array( 'delete_devisi', $cap ) ) ? 'checked' : ''; ?> class="delete master devisi" /></td>
				<td><input type="checkbox" class="all" id="devisi" /></td>
			</tr>

			<tr>
				<td>Unit</td>
				<td><input type="checkbox" name="capabilities[]" value="create_unit" <?php echo ( in_array( 'create_unit', $cap ) ) ? 'checked' : ''; ?> class="create master unit" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_unit" <?php echo ( in_array( 'read_unit', $cap ) ) ? 'checked' : ''; ?> class="read master unit" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_unit" <?php echo ( in_array( 'update_unit', $cap ) ) ? 'checked' : ''; ?>  class="update master unit" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_unit" <?php echo ( in_array( 'delete_unit', $cap ) ) ? 'checked' : ''; ?> class="delete master unit" /></td>
				<td><input type="checkbox" class="all" id="unit" /></td>
			</tr>
			
			<tr>
				<td>Vessel</td>
				<td><input type="checkbox" name="capabilities[]" value="create_vessel" <?php echo ( in_array( 'create_vessel', $cap ) ) ? 'checked' : ''; ?> class="create master vessel" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_vessel" <?php echo ( in_array( 'read_vessel', $cap ) ) ? 'checked' : ''; ?> class="read master vessel" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_vessel" <?php echo ( in_array( 'update_vessel', $cap ) ) ? 'checked' : ''; ?>  class="update master vessel" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_vessel" <?php echo ( in_array( 'delete_vessel', $cap ) ) ? 'checked' : ''; ?> class="delete master vessel" /></td>
				<td><input type="checkbox" class="all" id="vessel" /></td>
			</tr>
			
			

			<tr>
				<td>Publish Rate(Air)</td>
				<td><input type="checkbox" name="capabilities[]" value="create_publish_rate_air" <?php echo ( in_array( 'create_publish_rate_air', $cap ) ) ? 'checked' : ''; ?> class="create master publish_rate_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_publish_rate_air" <?php echo ( in_array( 'read_publish_rate_air', $cap ) ) ? 'checked' : ''; ?> class="read master publish_rate_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_publish_rate_air" <?php echo ( in_array( 'update_publish_rate_air', $cap ) ) ? 'checked' : ''; ?> class="update master publish_rate_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_publish_rate_air" <?php echo ( in_array( 'delete_publish_rate_air', $cap ) ) ? 'checked' : ''; ?> class="delete master publish_rate_air" /></td>
				<td><input type="checkbox" class="all" id="publish_rate_air" /></td>
			</tr>
			
			<tr>
				<td>Publish Rate(Sea)</td>
				<td><input type="checkbox" name="capabilities[]" value="create_publish_rate_sea" <?php echo ( in_array( 'create_publish_rate_sea', $cap ) ) ? 'checked' : ''; ?> class="create master publish_rate_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_publish_rate_sea" <?php echo ( in_array( 'read_publish_rate_sea', $cap ) ) ? 'checked' : ''; ?> class="read master publish_rate_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_publish_rate_sea" <?php echo ( in_array( 'update_publish_rate_sea', $cap ) ) ? 'checked' : ''; ?> class="update master publish_rate_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_publish_rate_sea" <?php echo ( in_array( 'delete_publish_rate_sea', $cap ) ) ? 'checked' : ''; ?> class="delete master publish_rate_sea" /></td>
				<td><input type="checkbox" class="all" id="publish_rate_sea" /></td>
			</tr>
			
			<tr>
				<td>Selling Rate(Air)</td>
				<td><input type="checkbox" name="capabilities[]" value="create_selling_rate_air" <?php echo ( in_array( 'create_selling_rate_air', $cap ) ) ? 'checked' : ''; ?> class="create master selling_rate_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_selling_rate_air" <?php echo ( in_array( 'read_selling_rate_air', $cap ) ) ? 'checked' : ''; ?> class="read master selling_rate_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_selling_rate_air" <?php echo ( in_array( 'update_selling_rate_air', $cap ) ) ? 'checked' : ''; ?> class="update master selling_rate_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_selling_rate_air" <?php echo ( in_array( 'delete_selling_rate_air', $cap ) ) ? 'checked' : ''; ?> class="delete master selling_rate_air" /></td>
				<td><input type="checkbox" class="all" id="selling_rate_air" /></td>
			</tr>
			
			<tr>
				<td>Selling Rate(Sea)</td>
				<td><input type="checkbox" name="capabilities[]" value="create_selling_rate_sea" <?php echo ( in_array( 'create_selling_rate_sea', $cap ) ) ? 'checked' : ''; ?> class="create master selling_rate_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_selling_rate_sea" <?php echo ( in_array( 'read_selling_rate_sea', $cap ) ) ? 'checked' : ''; ?> class="read master selling_rate_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_selling_rate_sea" <?php echo ( in_array( 'update_selling_rate_sea', $cap ) ) ? 'checked' : ''; ?> class="update master selling_rate_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_selling_rate_sea" <?php echo ( in_array( 'delete_selling_rate_sea', $cap ) ) ? 'checked' : ''; ?> class="delete master selling_rate_sea" /></td>
				<td><input type="checkbox" class="all" id="selling_rate_sea" /></td>
			</tr>
			
			
			
			<tr>
				<td colspan="6" style="text-align:center"><?php echo form_submit($change); ?></td>
			</tr>
			<tr>
				<td colspan="5"><strong>Transaction</strong></td>
				<td><input type="checkbox" class="all" id="transaksi" /></td>
			</tr>
			
			<tr>
				<td>Air Quotation</td>
				<td><input type="checkbox" name="capabilities[]" value="create_air_quotation" <?php echo ( in_array( 'create_air_quotation', $cap ) ) ? 'checked' : ''; ?> class="create transaksi air_quotation" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_air_quotation" <?php echo ( in_array( 'read_air_quotation', $cap ) ) ? 'checked' : ''; ?> class="read transaksi air_quotation" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_air_quotation" <?php echo ( in_array( 'update_air_quotation', $cap ) ) ? 'checked' : ''; ?> class="update transaksi air_quotation" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_air_quotation" <?php echo ( in_array( 'delete_air_quotation', $cap ) ) ? 'checked' : ''; ?> class="delete transaksi air_quotation" /></td>
				<td><input type="checkbox" class="all" id="air_quotation" /></td>
			</tr>
			<tr>
				<td>Sea Quotation</td>
				<td><input type="checkbox" name="capabilities[]" value="create_sea_quotation" <?php echo ( in_array( 'create_sea_quotation', $cap ) ) ? 'checked' : ''; ?> class="create transaksi sea_quotation" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_sea_quotation" <?php echo ( in_array( 'read_sea_quotation', $cap ) ) ? 'checked' : ''; ?> class="read transaksi sea_quotation" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_sea_quotation" <?php echo ( in_array( 'update_sea_quotation', $cap ) ) ? 'checked' : ''; ?> class="update transaksi sea_quotation" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_sea_quotation" <?php echo ( in_array( 'delete_sea_quotation', $cap ) ) ? 'checked' : ''; ?> class="delete transaksi sea_quotation" /></td>
				<td><input type="checkbox" class="all" id="sea_quotation" /></td>
			</tr>
			
			<tr>
				<td>Booking Cargo Sea</td>
				<td><input type="checkbox" name="capabilities[]" value="create_booking_cargo_sea" <?php echo ( in_array( 'create_booking_cargo_sea', $cap ) ) ? 'checked' : ''; ?> class="create transaksi booking_cargo_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_booking_cargo_sea" <?php echo ( in_array( 'read_booking_cargo_sea', $cap ) ) ? 'checked' : ''; ?> class="read transaksi booking_cargo_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_booking_cargo_sea" <?php echo ( in_array( 'update_booking_cargo_sea', $cap ) ) ? 'checked' : ''; ?> class="update transaksi booking_cargo_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_booking_cargo_sea" <?php echo ( in_array( 'delete_booking_cargo_sea', $cap ) ) ? 'checked' : ''; ?> class="delete transaksi booking_cargo_sea" /></td>
				<td><input type="checkbox" class="all" id="booking_cargo_sea" /></td>
			</tr>
			<tr>
				<td>Booking Cargo Air</td>
				<td><input type="checkbox" name="capabilities[]" value="create_booking_cargo_air" <?php echo ( in_array( 'create_booking_cargo_air', $cap ) ) ? 'checked' : ''; ?> class="create transaksi booking_cargo_air" /></td>
				<td><input type="checkbox" name="capabilities[]"   value="read_booking_cargo_air" <?php echo ( in_array(   'read_booking_cargo_air', $cap ) ) ? 'checked' : ''; ?> class="read transaksi   booking_cargo_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_booking_cargo_air" <?php echo ( in_array( 'update_booking_cargo_air', $cap ) ) ? 'checked' : ''; ?> class="update transaksi booking_cargo_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_booking_cargo_air" <?php echo ( in_array( 'delete_booking_cargo_air', $cap ) ) ? 'checked' : ''; ?> class="delete transaksi booking_cargo_air" /></td>
				<td><input type="checkbox" class="all" id="booking_cargo_air" /></td>
			</tr>
			<tr>
				<td>Carrier Booking Sea</td>
				<td><input type="checkbox" name="capabilities[]" value="create_carrier_booking_air" <?php echo ( in_array( 'create_carrier_booking_air', $cap ) ) ? 'checked' : ''; ?> class="create transaksi carrier_booking_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_carrier_booking_air" <?php echo ( in_array( 'read_carrier_booking_air', $cap ) ) ? 'checked' : ''; ?> class="read transaksi carrier_booking_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_carrier_booking_air" <?php echo ( in_array( 'update_carrier_booking_air', $cap ) ) ? 'checked' : ''; ?> class="update transaksi carrier_booking_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_carrier_booking_air" <?php echo ( in_array( 'delete_carrier_booking_air', $cap ) ) ? 'checked' : ''; ?> class="delete transaksi carrier_booking_air" /></td>
				<td><input type="checkbox" class="all" id="carrier_booking_air" /></td>
			</tr>

			<tr>
				<td>Carrier Booking Sea</td>
				<td><input type="checkbox" name="capabilities[]" value="create_carrier_booking_sea" <?php echo ( in_array( 'create_carrier_booking_sea', $cap ) ) ? 'checked' : ''; ?> class="create transaksi carrier_booking_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_carrier_booking_sea" <?php echo ( in_array( 'read_carrier_booking_sea', $cap ) ) ? 'checked' : ''; ?> class="read transaksi carrier_booking_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_carrier_booking_sea" <?php echo ( in_array( 'update_carrier_booking_sea', $cap ) ) ? 'checked' : ''; ?> class="update transaksi carrier_booking_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_carrier_booking_sea" <?php echo ( in_array( 'delete_carrier_booking_sea', $cap ) ) ? 'checked' : ''; ?> class="delete transaksi carrier_booking_sea" /></td>
				<td><input type="checkbox" class="all" id="carrier_booking_sea" /></td>
			</tr>

			<tr>
				<td>Shipment Inbound Air</td>
				<td><input type="checkbox" name="capabilities[]" value="create_shipment_inbound_air" <?php echo ( in_array( 'create_shipment_inbound_air', $cap ) ) ? 'checked' : ''; ?> class="create transaksi shipment_inbound_air" /></td>
				<td><input type="checkbox" name="capabilities[]"   value="read_shipment_inbound_air" <?php echo ( in_array(   'read_shipment_inbound_air', $cap ) ) ? 'checked' : ''; ?> class="read transaksi   shipment_inbound_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_shipment_inbound_air" <?php echo ( in_array( 'update_shipment_inbound_air', $cap ) ) ? 'checked' : ''; ?> class="update transaksi shipment_inbound_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_shipment_inbound_air" <?php echo ( in_array( 'delete_shipment_inbound_air', $cap ) ) ? 'checked' : ''; ?> class="delete transaksi shipment_inbound_air" /></td>
				<td><input type="checkbox" class="all" id="shipment_inbound_air" /></td>
			</tr>
			<tr>
				<td>Shipment Inbound Sea</td>
				<td><input type="checkbox" name="capabilities[]" value="create_shipment_inbound_sea" <?php echo ( in_array( 'create_shipment_inbound_sea', $cap ) ) ? 'checked' : ''; ?> class="create transaksi shipment_inbound_sea" /></td>
				<td><input type="checkbox" name="capabilities[]"   value="read_shipment_inbound_sea" <?php echo ( in_array(   'read_shipment_inbound_sea', $cap ) ) ? 'checked' : ''; ?> class="read transaksi   shipment_inbound_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_shipment_inbound_sea" <?php echo ( in_array( 'update_shipment_inbound_sea', $cap ) ) ? 'checked' : ''; ?> class="update transaksi shipment_inbound_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_shipment_inbound_sea" <?php echo ( in_array( 'delete_shipment_inbound_sea', $cap ) ) ? 'checked' : ''; ?> class="delete transaksi shipment_inbound_sea" /></td>
				<td><input type="checkbox" class="all" id="shipment_inbound_sea" /></td>
			</tr>

			<tr>
				<td>Shipment Outbound Air</td>
				<td><input type="checkbox" name="capabilities[]" value="create_shipment_outbound_air" <?php echo ( in_array( 'create_shipment_outbound_air', $cap ) ) ? 'checked' : ''; ?> class="create transaksi shipment_outbound_air" /></td>
				<td><input type="checkbox" name="capabilities[]"   value="read_shipment_outbound_air" <?php echo ( in_array(   'read_shipment_outbound_air', $cap ) ) ? 'checked' : ''; ?> class="read transaksi   shipment_outbound_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_shipment_outbound_air" <?php echo ( in_array( 'update_shipment_outbound_air', $cap ) ) ? 'checked' : ''; ?> class="update transaksi shipment_outbound_air" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_shipment_outbound_air" <?php echo ( in_array( 'delete_shipment_outbound_air', $cap ) ) ? 'checked' : ''; ?> class="delete transaksi shipment_outbound_air" /></td>
				<td><input type="checkbox" class="all" id="shipment_outbound_air" /></td>
			</tr>

			<tr>
				<td>Shipment Outbound Sea</td>
				<td><input type="checkbox" name="capabilities[]" value="create_shipment_outbound_sea" <?php echo ( in_array( 'create_shipment_outbound_sea', $cap ) ) ? 'checked' : ''; ?> class="create transaksi shipment_outbound_sea" /></td>
				<td><input type="checkbox" name="capabilities[]"   value="read_shipment_outbound_sea" <?php echo ( in_array(   'read_shipment_outbound_sea', $cap ) ) ? 'checked' : ''; ?> class="read transaksi   shipment_outbound_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_shipment_outbound_sea" <?php echo ( in_array( 'update_shipment_outbound_sea', $cap ) ) ? 'checked' : ''; ?> class="update transaksi shipment_outbound_sea" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_shipment_outbound_sea" <?php echo ( in_array( 'delete_shipment_outbound_sea', $cap ) ) ? 'checked' : ''; ?> class="delete transaksi shipment_outbound_sea" /></td>
				<td><input type="checkbox" class="all" id="shipment_outbound_sea" /></td>
			</tr>
		
			
			<tr>
				<td colspan="6" style="text-align:center"><?php echo form_submit($change); ?></td>
			</tr>
			<tr>
				<td colspan="5"><strong>Laporan</strong></td>
				<td><input type="checkbox" class="all" id="laporan" /></td>
			</tr>

			<tr>
				<td colspan="6" style="text-align:center"><?php echo form_submit($change); ?></td>
			</tr>
			<tr>
				<td colspan="5"><strong>Facility</strong></td>
				<td><input type="checkbox" class="all" id="fasilitas" /></td>
			</tr>
			<tr>
				<td>Proses Jurnal</td>
				<td><input type="checkbox" name="capabilities[]" value="create_proses_jurnal" <?php echo ( in_array( 'create_proses_jurnal', $cap ) ) ? 'checked' : ''; ?> class="create fasilitas proses_jurnal" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_proses_jurnal" <?php echo ( in_array( 'read_proses_jurnal', $cap ) ) ? 'checked' : ''; ?> class="read fasilitas proses_jurnal" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_proses_jurnal" <?php echo ( in_array( 'update_proses_jurnal', $cap ) ) ? 'checked' : ''; ?> class="update fasilitas proses_jurnal" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_proses_jurnal" <?php echo ( in_array( 'delete_proses_jurnal', $cap ) ) ? 'checked' : ''; ?> class="delete fasilitas proses_jurnal" /></td>
				<td><input type="checkbox" class="all" id="proses_jurnal" /></td>
			</tr>
			<tr>
				<td>Proses Posting</td>
				<td><input type="checkbox" name="capabilities[]" value="create_proses_posting" <?php echo ( in_array( 'create_proses_posting', $cap ) ) ? 'checked' : ''; ?> class="create fasilitas proses_posting" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_proses_posting" <?php echo ( in_array( 'read_proses_posting', $cap ) ) ? 'checked' : ''; ?> class="read fasilitas proses_posting" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_proses_posting" <?php echo ( in_array( 'update_proses_posting', $cap ) ) ? 'checked' : ''; ?> class="update fasilitas proses_posting" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_proses_posting" <?php echo ( in_array( 'delete_proses_posting', $cap ) ) ? 'checked' : ''; ?> class="delete fasilitas proses_posting" /></td>
				<td><input type="checkbox" class="all" id="proses_posting" /></td>
			</tr>
			<tr>
				<td>Tutup Buku</td>
				<td><input type="checkbox" name="capabilities[]" value="create_tutup_buku" <?php echo ( in_array( 'create_tutup_buku', $cap ) ) ? 'checked' : ''; ?> class="create fasilitas tutup_buku" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_tutup_buku" <?php echo ( in_array( 'read_tutup_buku', $cap ) ) ? 'checked' : ''; ?> class="read fasilitas tutup_buku" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_tutup_buku" <?php echo ( in_array( 'update_tutup_buku', $cap ) ) ? 'checked' : ''; ?> class="update fasilitas tutup_buku" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_tutup_buku" <?php echo ( in_array( 'delete_tutup_buku', $cap ) ) ? 'checked' : ''; ?> class="delete fasilitas tutup_buku" /></td>
				<td><input type="checkbox" class="all" id="tutup_buku" /></td>
			</tr>
			<tr>
				<td>Batal Tutup Buku</td>
				<td><input type="checkbox" name="capabilities[]" value="create_batal_tutup_buku" <?php echo ( in_array( 'create_batal_tutup_buku', $cap ) ) ? 'checked' : ''; ?> class="create fasilitas batal_tutup_buku" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_batal_tutup_buku" <?php echo ( in_array( 'read_batal_tutup_buku', $cap ) ) ? 'checked' : ''; ?> class="read fasilitas batal_tutup_buku" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_batal_tutup_buku" <?php echo ( in_array( 'update_batal_tutup_buku', $cap ) ) ? 'checked' : ''; ?> class="update fasilitas batal_tutup_buku" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_batal_tutup_buku" <?php echo ( in_array( 'delete_batal_tutup_buku', $cap ) ) ? 'checked' : ''; ?> class="delete fasilitas batal_tutup_buku" /></td>
				<td><input type="checkbox" class="all" id="batal_tutup_buku" /></td>
			</tr>
			<tr>
				<td>User</td>
				<td><input type="checkbox" name="capabilities[]" value="create_user" <?php echo ( in_array( 'create_user', $cap ) ) ? 'checked' : ''; ?> class="create fasilitas user" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_user" <?php echo ( in_array( 'read_user', $cap ) ) ? 'checked' : ''; ?> class="read fasilitas user" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_user" <?php echo ( in_array( 'update_user', $cap ) ) ? 'checked' : ''; ?> class="update fasilitas user" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_user" <?php echo ( in_array( 'delete_user', $cap ) ) ? 'checked' : ''; ?> class="delete fasilitas user" /></td>
				<td><input type="checkbox" class="all" id="user" /></td>
			</tr>
			<tr>
				<td>Company</td>
				<td><input type="checkbox" name="capabilities[]" value="create_company" <?php echo ( in_array( 'create_company', $cap ) ) ? 'checked' : ''; ?> class="create fasilitas company" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_company" <?php echo ( in_array( 'read_company', $cap ) ) ? 'checked' : ''; ?> class="read fasilitas company" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_company" <?php echo ( in_array( 'update_company', $cap ) ) ? 'checked' : ''; ?> class="update fasilitas company" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_company" <?php echo ( in_array( 'delete_company', $cap ) ) ? 'checked' : ''; ?> class="delete fasilitas company" /></td>
				<td><input type="checkbox" class="all" id="company" /></td>
			</tr>
			<tr>
				<td>Backup Database</td>
				<td><input type="checkbox" name="capabilities[]" value="create_backup_database" <?php echo ( in_array( 'create_backup_database', $cap ) ) ? 'checked' : ''; ?> class="create fasilitas backup_database" /></td>
				<td><input type="checkbox" name="capabilities[]" value="read_backup_database" <?php echo ( in_array( 'read_backup_database', $cap ) ) ? 'checked' : ''; ?> class="read fasilitas backup_database" /></td>
				<td><input type="checkbox" name="capabilities[]" value="update_backup_database" <?php echo ( in_array( 'update_backup_database', $cap ) ) ? 'checked' : ''; ?> class="update fasilitas backup_database" /></td>
				<td><input type="checkbox" name="capabilities[]" value="delete_backup_database" <?php echo ( in_array( 'delete_backup_database', $cap ) ) ? 'checked' : ''; ?> class="delete fasilitas backup_database" /></td>
				<td><input type="checkbox" class="all" id="backup_database" /></td>
			</tr>
			<tr>
				<td colspan="6" style="text-align:center"><?php echo form_submit($change); ?></td>
			</tr>
		<tbody>
	</table>
	<?php echo form_close(); ?>
	<p><a href="<?php echo base_url('fasilitas/user'); ?>" class="btn">&lt;&lt; Kembali ke halaman sebelumnya</a></p>
	<!--<div class="pull-right">&copy; 2012 <a href="//dutamegah.co.id/" target="_blank">Migent Software</a> &middot; {elapsed_time} s &middot; {memory_usage} s</div>-->
</div>
<div id="mask"></div>
<?php
echo '<!--'; ?>
<pre>
<?php print_r( unserialize( $capabilities ) ); ?>
</pre><?php
echo '-->'; ?>
<script>
$( document ).ready( function() {
		$('.fasilitas').each( function(){
			if ((Left($(this).val(),6)=='create') || (Left($(this).val(),6)=='delete') || (Left($(this).val(),6)=='update')){
				$(this).attr("disabled", true);
			}
		});
		$('.laporan').each( function(){
			if ((Left($(this).val(),6)=='create') || (Left($(this).val(),6)=='delete') || (Left($(this).val(),6)=='update')){
				$(this).attr("disabled", true);
			}
		});

var att=document.createAttribute("class");
att.value="role";
document.getElementsByName("role")[0].setAttributeNode(att);
var att2=document.createAttribute("id");
att2.value="role";
document.getElementsByName("role")[0].setAttributeNode(att2);
$('.role').val('<?php echo $level; ?>')
	$('.role').click(function(){
		$('.delete').attr("disabled", false);
		if (Number($('.role').val())==99){
			$('.all').each( function(){
				var id = $(this).attr('id');
				var checked = $(this).attr('checked');
				$('.'+id).each( function(){
					$(this).attr('checked', 'checked');
				});
			});
		}else if (Number($('.role').val())==1){
			$('.delete').removeAttr('checked');
			$('.delete').attr("disabled", true);
		}
		$('.fasilitas').each( function(){
			if ((Left($(this).val(),6)=='create') || (Left($(this).val(),6)=='delete') || (Left($(this).val(),6)=='update')){
				$(this).attr("disabled", true);
			}
		});
		$('.laporan').each( function(){
			if ((Left($(this).val(),6)=='create') || (Left($(this).val(),6)=='delete') || (Left($(this).val(),6)=='update')){
				$(this).attr("disabled", true);
			}
		});
	});

	$('.all').click( function(){
		var id = $(this).attr('id');
		var checked = $(this).attr('checked');
		$('.'+id).each( function(){
			if (Number($('.role').val())==1){
				if ($(this).is(':enabled')){
					if( checked ) $(this).attr('checked', 'checked');
					else $(this).removeAttr('checked');
				}else{
					$(this).removeAttr('checked');
				}
			}else{
				if( checked ) $(this).attr('checked', 'checked');
				else $(this).removeAttr('checked');
			}
		});
	});
});
</script>