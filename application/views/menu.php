<?php
if (isset($capabilities)) $user_cap = $capabilities;
?>
<!-- untuk merubah dari unserialize -->
<?php $cap = unserialize($user_cap); ?>
<div class="navbar navbar-fixed-top navbar-inverse" style="height:15px">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?php echo base_url(); ?>">Freight - PT.Bina Sinar Amity</a>
			<div class="nav-collapse">
				<ul class="nav">
					<?php if (
						in_array('read_sales', $cap)

						|| in_array('read_sales_com', $cap)

					) { ?>
						<li class="dropdown" id="nav_master">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#master">
								<i class="icon-book icon-white"></i> Master<b class="caret"></b></a>
							<ul class="dropdown-menu">


								<?php if (
									in_array('read_sales', $cap)
									|| in_array('read_sales_com', $cap)
								) { ?>
									<li class="dropdown-submenu">
										<a href="#stock">Sales</a>
										<ul class="dropdown-menu submenu-show submenu-hide">
											<?php if (in_array('read_sales', $cap)) { ?>
												<li><a href="<?php echo base_url('master/sales'); ?>">Sales</a></li>
											<?php }

											if (in_array('read_sales_com', $cap)) { ?>
												<li><a href="<?php echo base_url('master/sales_com'); ?>" target="Sales Commision">Sales Commision</a></li>
											<?php }
											?>
											<li><a href="<?php echo base_url('contoh'); ?>">Contoh Fitur</a></li>
										</ul>
									</li>
								<?php } ?>



							</ul>
						</li>
					<?php } ?>


					<!--	<?php if (in_array('read_user', $cap)) { ?>
					<li class="dropdown" id="nav_laporan">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#fasilitas">
						<i class="icon-folder-close icon-white"></i> Facility<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<?php if (in_array('read_user', $cap)) { ?>
							<li><a href="<?php echo base_url('fasilitas/user'); ?>" target="User">User</a></li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>-->

				</ul>
				<ul class="nav pull-right">
					<li class="dropdown" id="fat-menu">
						<a data-toggle="dropdown" class="dropdown-toggle" role="button" id="drop3" href="#"><i class="icon-user icon-white"></i>
							<?php if (isset($name)) $username = $name; // transition, deprecated soon 
							?>
							<?php echo ucwords(strtolower($username)); ?> <b class="caret"></b></a>
						<ul aria-labelledby="drop3" role="menu" class="dropdown-menu">
							<li><a href="/"><i class="icon-asterisk"></i> HOME</a></li>
							<li><a href="<?php echo base_url('auth/change_password'); ?>"><i class="icon-lock"></i> Update Password</a></li>
							<li><a href="<?php echo base_url('auth/logout'); ?>"><i class="icon-off"></i> Logout</a></li>
							<li class="divider"></li>
							<li><a>Version</a></li>
							<li><a>v.0.5 - 24 March 2015</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
</div>