<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 */
if(! class_exists('Cloudstich_Admin') ) {
	
	class Cloudstitch_Admin {

		function __construct() {
			add_action( 'admin_menu', array( $this, 'cloudstitch_admin_menu' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'cloudstitch_admin_scripts' ) );
		}
	
		function cloudstitch_admin_menu() {
			add_options_page(
				'',
				'Cloudstitch',
				'manage_options',
				'cloudstitch_options',
				array(
					$this,
					'cloudstitch_options_page'
				)
			);
		}
	
		function cloudstitch_options_page() {
						
			ob_start();
			
			//Options page template html
			?>
			
			<div class="wrap cloudstitch-options-wrap">
			  <table style="width:100%;max-width:678px;">
				<tbody>
				  <tr>
					<th align="center"><img src="<?php echo CLOUDSTITCH_PLUGIN_URL . '/assets/images/cloudstitch-logo.png'; ?>" width="200"><br>
					  <h2>Cloudstitch lets you connect Wordpress to data in ordinary spreadsheets</h2>
					</th>
				  </tr>
				</tbody>
			  </table>
			  <form method="post" action="/">
				<?php echo wp_nonce_field( 'cloudstitch_options_nonce' ); ?>
				<h2 class="nav-tab-wrapper cloudstitch-nav-tab"> <a href="#settings-widget" id="settings-widget-tab" class="nav-tab nav-tab-active">A Widget</a> <a href="#settings-form" id="settings-form-tab" class="nav-tab">A Form</a> <a href="#settings-post_type" id="settings-post-type-tab" class="nav-tab">Custom Post Types</a> </h2>
				<div id="settings-widget" class="settings_panel" style="display: block;">
				  <table class="form-table">
					<tbody>
					  <tr>
						<th><h3>Power Wordpress pages with spreadsheets.</h3></th>
					  </tr>
					  <tr>
						<td><table class="form-table">
							<tbody>
							  <tr>
								<td><a href="https://www.cloudstitch.com/collection/Visualizations" target="_blank"> <img src="<?php echo CLOUDSTITCH_PLUGIN_URL . '/assets/images/vis-heat.png'; ?>" width="150">
								  <h4>Visualizations</h4>
								  </a> <span>D3 visualizations you can control <br>
								  with a linked spreadsheet.</span></td>
								<td><a href="https://www.cloudstitch.com/collection/Price%20Tables" target="_blank"> <img src="<?php echo CLOUDSTITCH_PLUGIN_URL . '/assets/images/price-table.png'; ?>" width="150">
								  <h4>Price Tables</h4>
								  </a> <span>Pre-made price table widgets to <br>
								  add to your page.</span></td>
								<td><a href="https://www.cloudstitch.com/collection/Restaurant%20Menus" target="_blank"> <img src="<?php echo CLOUDSTITCH_PLUGIN_URL . '/assets/images/menu-pizza.png'; ?>" width="150">
								  <h4>Restaurant Menus</h4>
								  </a> <span>Manage these menus right from a <br>
								  spreadsheet.</span></td>
								<td><a href="https://www.cloudstitch.com/collection/Timelines" target="_blank"> <img src="<?php echo CLOUDSTITCH_PLUGIN_URL . '/assets/images/timelines.png'; ?>" width="150">
								  <h4>Timelines</h4>
								  </a> <span>Show off important events and <br>
								  accomplishments</span></td>
							  </tr>
							</tbody>
						  </table></td>
					  </tr>
					  <tr>
						<th><h3>Creating a widget is a two-step process:</h3></th>
					  </tr>
					  <tr>
						<td><h4>1. Creating a widget on Cloudstitch</h4>
						  <p>Pick from hundreds of pre-designed widgets and customize how you like Cloudstitch automatically generates the spreadsheet that power it.</p></td>
					  </tr>
					  <tr>
						<td align="center"><a href="https://www.cloudstitch.com/starter-projects" class="button-primary" target="_blank">Create a widget on Cloudstitch</a><br>
						  <span style="font-size:13px"><em>This will open a new window</em></span></td>
					  </tr>
					  <tr>
						<td><h4>2. Add your widget to Wordpress</h4>
						  <p>From inside Cloudstitch, click on the <strong>Publish</strong> tab and then <strong>Wordpress</strong>. You will be given a <em>shortcode</em> to type into any Wordpress post to make the widget appear.</p></td>
					  </tr>
					  <tr>
						<td align="center"><img src="<?php echo CLOUDSTITCH_PLUGIN_URL . '/assets/images/no-image-icon-big.jpg'; ?>" width="400"></td>
					  </tr>
					</tbody>
				  </table>
				</div>
				<!-- #settings-widget -->
				
				<div id="settings-form" class="settings_panel" style="display:none;">
				  <table class="form-table">
					<tbody>
					  <tr>
						<th colspan="3"><h3>Cloudstitch froms lets you:</h3></th>
					  </tr>
					  <tr>
					   <td>
						 <table class="form-table">
						   <tbody>
							<tr>
							  <td><i class="fa fa-file-excel-o fa-fw fa-2x" aria-hidden="true"></i>Upload data to a spreadsheet</td>
							  <td><i class="fa fa-folder-open fa-fw fa-2x" aria-hidden="true"></i>Upload files to a sharefolder
								</p></td>
							</tr>
							<tr>
							  <td><i class="fa fa-envelope fa-fw fa-2x" aria-hidden="true"></i>Get templated email notifications</td>
							  <td><i class="fa fa-cc-visa fa-fw fa-2x" aria-hidden="true"></i>Accept Stripe payments</td>
							</tr>
						   </tbody>
						 </table>
					   </td>
					  </tr>
					  <tr>
						<th><h3>Creating a form is a two-step process:</h3></th>
					  </tr>
					  <tr>
						<td><h4>1. Creating a form on Cloudstitch</h4>
						  <p>You can pick from hundreds of pre-designed forms and customize however you like. Cloudstitch will automatically share a spreadsheet and folder with for form results.</p></td>
					  </tr>
					  <tr>
						<td align="center"><a href="https://www.cloudstitch.com/starter-projects" class="button-primary" target="_blank">Create a form on Cloudstitch</a><br>
						  <span style="font-size:13px"><em>This will open a new window</em></span></td>
					  </tr>
					  <tr>
						<td><h4>2. Add your form to Wordpress</h4>
						  <p>From inside Cloudstitch, click on the <strong>Publish</strong> tab and then <strong>Wordpress</strong>. You will be given a <em>shortcode</em> to type into any Wordpress post to make the form appear.</p></td>
					  </tr>
					  <tr>
						<td align="center"><img src="<?php echo CLOUDSTITCH_PLUGIN_URL . '/assets/images/no-image-icon-big.jpg'; ?>" width="400"></td>
					  </tr>
					</tbody>
				  </table>
				</div>
				<!-- #settings-form -->
				
				<div id="settings-post_type" class="settings_panel" style="display:none;">
				  <table class="form-table">
					<tbody>
					  <tr>
						<th><h3>Synchronize your Custom Post Types with a Spreadsheet!</h3></th>
					  </tr>
					  <tr>
						<td><h4>1. Create a Custom Post Type project in Cloudstitch.</h4>
						  <?php
							   //show list of custom post types
								$i = 1;
								$list = '';
								$post_types = get_post_types( '', 'names' );
				
								foreach ( $post_types as $post_type ) {
								   //exclude default wordpress post types
								   if( $post_type != 'attachment' && 
									   $post_type != 'revision' && 
									   $post_type != 'custom_css' &&
									   $post_type != 'customize_changeset' ) {
									   
									   $list .= count($post_types) != $i ? "{$post_type}, " : $post_type;
								   }
								   $i++;
								}
								?>
						  <p style="color:#58b6df;">(Post Types (comma seprated) currently registered: <em><?php echo $list; ?></em>)</p></td>
					  </tr>
					  <tr>
						<td align="center"><a href="https://www.cloudstitch.com/starter-projects" class="button-primary" target="_blank" style="font-size:16px;">Create</a></td>
					  </tr>
					  <tr>
						<td><h4>1. Enter your Cloudstitch username and password.</h4></td>
					  </tr>
					  <tr>
						<td><table class="form-table">
							<tbody>
							  <tr>
								<td width="25%"><label for="Username" style="color:#999">Username</label>
								  <br>
								  <input type="text" name="user_name" id="user-name"></td>
								<td width="25%"><label for="Appname" style="color:#999">Cloudstitch Appname</label>
								  <br>
								  <input type="text" name="app_name" id="app-name"></td>
								<td><a href="https://www.cloudstitch.com/" class="button-secondary open-cloudstitch-app"><i class="fa fa-external-link fa-lg" style="color:#000"></i>Open</a></td>
							  </tr>
							</tbody>
						  </table></td>
					  </tr>
					  <tr>
						<td><table class="form-table">
							<tbody>
							  <tr>
								<td width="50%" align="center"><a href="https://www.cloudstitch.com/starter-projects/" class="button-primary button-sync-data" style="font-size:16px;padding:10px 20px;">Sync</a></td>
								<td>
								  <input type="checkbox" value="1" name="update_posts"> <label for="update posts">Update posts already in Wordpress</label> <br>
								  <input type="checkbox" value="1" name="delete_posts"> <label for="delete posts">Delete posts not in spreadsheet</label> </td>
							  </tr>
							</tbody>
						  </table></td>
					  </tr>
					  <tr>
						<td>
						  <h4><em>Last Sync Result</em></h4>
						  <table class="form-table sync-result-table">
							<tbody>
							  <tr>
							   <th>Post Type</th>
							   <th>Created</th>
							   <th>Modified <br><em>Skipped</em></th>
							   <th>Removed <br><em>Skipped</em></th>
							   <th>Unchanged</th>
							  </tr>
							  <tr>
								<td>Houses</td>
								<td><span class="sync-count sync-created">2</span></td>
								<td><span class="sync-count sync-modified">3</span></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<td align="left">Neighborhoods</td>
								<td><span class="sync-count sync-created">3</span></td>
								<td>&nbsp;</td>
								<td><span class="sync-count sync-removed">2</span></td>
								<td><span class="sync-count sync-unchanged">3</span></td>
							  </tr>
							  <tr>
								<td align="left">Rooms</td>
								<td>&nbsp;</td>
								<td><span class="sync-count sync-modified">1</span></td>
								<td>&nbsp;</td>
								<td><span class="sync-count sync-unchanged">2</span></td>
							  </tr>
							</tbody>
						  </table>
						</td>
					  </tr>
					</tbody>
				  </table>
				</div>
				<!-- #settings-post_type -->
			  </form>
			</div><!-- .cloudstitch-options-wrap -->
            
            <?php
			
			$template = ob_get_contents();
			
			ob_get_clean();
			
			echo $template;

		}
		
		function cloudstitch_admin_scripts($hook) {
			// Load only on ?page=cloudstich_options
			if($hook != 'settings_page_cloudstitch_options') {
					return;
			}
			
			wp_enqueue_style( 'font-awesome-admin', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
			wp_enqueue_style( 'cloudstich-admin-css', CLOUDSTITCH_PLUGIN_URL . '/assets/css/cloudstitch-admin.css' );
			wp_enqueue_script('jquery');
			wp_enqueue_script( 
			       'cloudstich-admin-js', 
				    CLOUDSTITCH_PLUGIN_URL . '/assets/js/cloudstitch-admin.js', 
					array('jquery'),
					false,
					true
			);
		}
		
	}
	
	
	new Cloudstitch_Admin;
}
