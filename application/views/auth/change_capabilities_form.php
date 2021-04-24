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
				<td colspan="6" style="text-align:center"><?php echo form_submit($change); ?></td>
			</tr>
			
		
			<tr>
				<td colspan="5"><strong>Facility</strong></td>
				<td><input type="checkbox" class="all" id="fasilitas" /></td>
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