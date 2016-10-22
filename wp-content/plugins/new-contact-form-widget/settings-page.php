<?php
	wp_enqueue_style( 'cfw-bootstrap-css', plugin_dir_url( __FILE__ ).'css/cfw-bootstrap.css' );
	wp_enqueue_style( 'cfw-font-awesome-css', plugin_dir_url( __FILE__ ).'css/font-awesome.min.css' );
	wp_enqueue_script( 'cfw-boostrap-js', plugin_dir_url( __FILE__ ).'js/bootstrap.js', array('jquery'), '3.3.6', true );
	wp_enqueue_style( 'wp-color-picker' );
	// js
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'cfw-color-picker-js',  plugin_dir_url( __FILE__ ).'js/cfw-color-picker.js', array( 'jquery', 'wp-color-picker' ), '', true  );
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_localize_script( 'cfw-ajax', 'cfw_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	// load saved setting from option table
	$all_setttings = get_option('cfw_settings');
	//print_r($all_setttings);
		if(isset($all_setttings)){
		// Design Setting
		if($all_setttings['title_field'])
			$title_field = $all_setttings['title_field'];
		else
			$title_field = "Contact Form";

		if($all_setttings['title_color'])
			$title_color = $all_setttings['title_color'];
		else
			$title_color = "#FAFAFA";

		if($all_setttings['description_field'])
			$description_field = $all_setttings['description_field'];
		else
			$description_field = "Please fill below form if you have any query with us.";

		if($all_setttings['name_field'])
			$name_field = $all_setttings['name_field'];
		else
			$name_field = "Type Your Name Here";

		if($all_setttings['email_field'])
			$email_field = $all_setttings['email_field'];
		else
			$email_field = "Type Your Email Here";

		if($all_setttings['subject_field'])
			$subject_field = $all_setttings['subject_field'];
		else
			$subject_field = "Type Your Query Subject Here";

		if($all_setttings['message_field'])
			$message_field = $all_setttings['message_field'];
		else
			$message_field = "Type Your Query Message Here";


		if($all_setttings['name_error_field'])
			$name_error_field = $all_setttings['name_error_field'];
		else
			$name_error_field = "Name cannot be blank.";

		if($all_setttings['email_error_field'])
				$email_error_field = $all_setttings['email_error_field'];
			else
				$email_error_field = "Email cannot be blank.";

		if($all_setttings['email_error_field_2'])
				$email_error_field_2 = $all_setttings['email_error_field_2'];
			else
				$email_error_field_2 = "Email is invalid.";

		if($all_setttings['subject_error_field'])
				$subject_error_field = $all_setttings['subject_error_field'];
			else
				$subject_error_field = "Subject cannot be blank.";

		if($all_setttings['message_error_field'])
				$message_error_field = $all_setttings['message_error_field'];
			else
				$message_error_field = "Message cannot be blank.";

		if($all_setttings['ph_text_color'])
			$ph_text_color = $all_setttings['ph_text_color'];
		else
			$ph_text_color = "black";

		if($all_setttings['lebal_icon_color'])
			$lebal_icon_color = $all_setttings['lebal_icon_color'];
		else
			$lebal_icon_color = "black";

		if($all_setttings['bg_color'])
			$bg_color = $all_setttings['bg_color'];
		else
			$bg_color = "#FFFFFF";

		if($all_setttings['show_query'])
			$show_query = $all_setttings['show_query'];
		else
			$show_query = 10;

		if($all_setttings['sb_button_color'])
			$sb_button_color = $all_setttings['sb_button_color'];
		else
			$sb_button_color = "btn-info";

		if($all_setttings['sb_button_text'])
			$sb_button_text = $all_setttings['sb_button_text'];
		else
			$sb_button_text = "Submit";

		if($all_setttings['cus_css'])
			$cus_css = $all_setttings['cus_css'];
		else
			$cus_css = "";

		// Message Setting
		if($all_setttings['qsm'])
			$qsm = $all_setttings['qsm'];
		else
			$qsm = "Thank you for submitting query. We will be back to you shortly.";

		if($all_setttings['qfm'])
			$qfm = $all_setttings['qfm'];
		else
			$qfm = "Sorry! contact from not working properly. Please directly contact to site admin using this email: ".get_option( 'admin_email' );

		// Auto Responder Setting
		if($all_setttings['auto_res'])
			$auto_res = $all_setttings['auto_res'];
		else
			$auto_res = 0;

		if($all_setttings['res_sub'])
			$res_sub = $all_setttings['res_sub'];
		else
			$res_sub = "Thanks You, We have received your query - ".get_option( 'blogname' );

		if($all_setttings['res_msg'])
			$res_msg = $all_setttings['res_msg'];
		else
			$res_msg = "Thank you for submitting query. We will be back to you shortly.";

		// Email Setting
		if($all_setttings['admin_email'])
			$admin_email = $all_setttings['admin_email'];
		else
			$admin_email = get_option( 'admin_email' );

		if($all_setttings['email_carrier'])
			$email_carrier = $all_setttings['email_carrier'];
		else
			$email_carrier = "php";

		if($all_setttings['sm_name'])
			$sm_name = $all_setttings['sm_name'];
		else
			$sm_name = "";

		if($all_setttings['sm_email'])
			$sm_email = $all_setttings['sm_email'];
		else
			$sm_email = "";

		if($all_setttings['sm_Password'])
			$sm_Password = $all_setttings['sm_Password'];
		else
			$sm_Password = "";

		if($all_setttings['sm_port'])
			$sm_port = $all_setttings['sm_port'];
		else
			$sm_port = "";

		if($all_setttings['smtp_encryption'])
			$smtp_encryption = $all_setttings['smtp_encryption'];
		else
			$smtp_encryption = "ssl";
	} else {

		$title_field = "Contact Form";
		$title_color = "#FAFAFA";
		$description_field = "Please fill below form if you have any query with us.";
		$name_field = "Type Your Name Here";
		$email_field = "Type Your Email Here";
		$subject_field = "Type Your Query Subject Here";
		$message_field = "Type Your Query Message Here";
		$name_error_field = "Name cannot be blank.";
		$email_error_field = "Email cannot be blank.";
		$email_error_field_2 = "Email is invalid.";
		$subject_error_field = "Subject cannot be blank.";
		$message_error_field = "Message cannot be blank.";
		$ph_text_color = "black";
		$lebal_icon_color = "black";
		$bg_color = "#FFFFFF";
		$show_query = 10;
		$sb_button_color = "btn-info";
		$sb_button_text = "Submit";
		$cus_css= "";

		$qsm = "Thank you for submitting query. We will be back to you shortly.";
		$qfm = "Sorry! contact from not working properly. Please directly contact to site admin using this email: ".get_option( 'admin_email' );

		$auto_res = 0;
		$res_sub = "Thanks You, We have received your query - ".get_option( 'blogname' );
		$res_msg = "Thank you for submitting query. We will be back to you shortly.";

		$email_carrier = "php";
		$admin_email = get_option( 'admin_email' );
		$sm_name = "";
		$sm_email = "";
		$sm_Password = "";
		$sm_port = "";
		$smtp_encryption = "ssl";
	}
	?>
	<style>
	body {
		background-color: #F1F1F1 !important;
	}
	.row {
		margin-left: 0px !important;
		margin-right: 0px !important;
	}
	.wp-core-ui .button-group.button-hero .button, .wp-core-ui .button.button-hero {
		height: 60px !important;
		padding: 9px 36px !important;
		font-size: 12px !important;
	}
	.setting-toggle-div {
		background-color: #FFFFFF;
		padding: 10px;
		margin-bottom: 15px;
		border: 2px solid #CCCCCC;
		border-radius: 3px;
	}

	#cfw-settings-form div{
		padding-top: 2px;
	}
	.wp-color-result {
		height: auto !important;
	}
	h1 {
		font-size: 28px;
	}
	.aline {
		text-decoration: none !important;
	}
	</style>
	<div class="row">
		<div class="container" id="">
			<h1 class="text-center">Contact Form Settings</h1>

			<form id="cfw-settings-form" name="cfw-settings-form" >

				<p id="design-settings" onclick="return ClickToggle(this.id, 'cfw-ds');">
					<a class="button button-hero btn-block">
						<i class="fa fa-plus-square fa-3x" aria-hidden="true"> Design Settings</i>
					</a>
				</p>

				<!-- Design Setting -->
				<div id="cfw-ds" style="display: none;" class="setting-toggle-div">
					<div>
						<p>
						<label>Contact Form Title</label>
						<input type="text" class="form-control" id="title_field" name="title_field" placeholder="Type your Title" value="<?php echo $title_field; ?>">
						</p>
					</div>

					<div>
						<p>
						<label>Title Color</label><br>
						<input type="text" class="form-control" id="title_color" name="title_color" placeholder="chose form color" value="<?php echo $title_color; ?>" default-color="<?php echo $title_color; ?>">
						</p>
					</div>

					<div>
						<p>
						<label>Contact Form Description</label>
						<input type="text" class="form-control" id="description_field" name="description_field" placeholder="Type your description " value="<?php echo $description_field; ?>">
						</p>
					</div>

					<div>
						<p>
						<label>Name Field Place Holder Text</label>
						<input type="text" class="form-control" id="name_field" name="name_field" placeholder="Type your Name" value="<?php echo $name_field; ?>">
						</p>
					</div>

					<div>
						<p>
						<label>Email Field Place Holder Text</label>
						<input type="text" class="form-control" id="email_field" name="email_field" placeholder="Type your Email" value="<?php echo $email_field; ?>">
						</p>
					</div>

					<div>
						<p>
						<label>Subject Field Place Holder Text</label>
						<input type="text" class="form-control" id="subject_field" name="subject_field" placeholder="Type your Subject" value="<?php echo $subject_field; ?>">
						</p>
					</div>

					<div>
						<p>
						<label>Message Field Place Holder Text</label>
						<input type="text" class="form-control" id="message_field" name="message_field" placeholder="Type your Message" value="<?php echo $message_field; ?>">
						</p>
					</div>

					<div>
						<p>
							<label>Place Holder Text Color</label><br>
							<input type="radio" class="form-control" id="ph_text_color" name="ph_text_color" value="skyblue" <?php if($ph_text_color == "skyblue") echo "checked" ; ?>> Sky Blue
							<input type="radio" class="form-control" id="ph_text_color" name="ph_text_color" value="red" <?php if($ph_text_color == "red") echo "checked"; ?>> Red
							<input type="radio" class="form-control" id="ph_text_color" name="ph_text_color" value="green" <?php if($ph_text_color == "green") echo "checked"; ?>> Green
							<input type="radio" class="form-control" id="ph_text_color" name="ph_text_color" value="yellow" <?php if($ph_text_color == "yellow") echo "checked"; ?>> Yellow
							<input type="radio" class="form-control" id="ph_text_color" name="ph_text_color" value="black" <?php if($ph_text_color == "black") echo "checked"; ?>> Black
							<input type="radio" class="form-control" id="ph_text_color" name="ph_text_color" value="white" <?php if($ph_text_color == "white") echo "checked"; ?>> White
						</p>
					</div>

					<div>
						<p>
							<label>Form Label & Icon Color</label><br>
							<input type="radio" class="form-control" id="lebal_icon_color" name="lebal_icon_color" value="skyblue" <?php if($lebal_icon_color == "blue") echo "checked" ; ?>> Blue
							<input type="radio" class="form-control" id="lebal_icon_color" name="lebal_icon_color" value="red" <?php if($lebal_icon_color == "red") echo "checked"; ?>> Red
							<input type="radio" class="form-control" id="lebal_icon_color" name="lebal_icon_color" value="green" <?php if($lebal_icon_color == "green") echo "checked"; ?>> Green
							<input type="radio" class="form-control" id="lebal_icon_color" name="lebal_icon_color" value="yellow" <?php if($lebal_icon_color == "yellow") echo "checked"; ?>> Yellow
							<input type="radio" class="form-control" id="lebal_icon_color" name="lebal_icon_color" value="black" <?php if($lebal_icon_color == "black") echo "checked"; ?>> Black
							<input type="radio" class="form-control" id="lebal_icon_color" name="lebal_icon_color" value="white" <?php if($lebal_icon_color == "white") echo "checked"; ?>> White
							<input type="radio" class="form-control" id="lebal_icon_color" name="lebal_icon_color" value="gold" <?php if($lebal_icon_color == "gold") echo "checked"; ?>> Gold
							<input type="radio" class="form-control" id="lebal_icon_color" name="lebal_icon_color" value="orange" <?php if($lebal_icon_color == "orange") echo "checked"; ?>> Orange
						</p>
					</div>

					<div>
						<p><label>Form Background Color</label><br>
						<input type="radio" class="form-control" id="bg_color" name="bg_color" value="#8B4584" <?php if($bg_color == "#8B4584") echo "checked" ; ?>> Radiant Orchid
						<input type="radio" class="form-control" id="bg_color" name="bg_color" value="#1E3176" <?php if($bg_color == "#1E3176") echo "checked"; ?>> Royal Blue
						<input type="radio" class="form-control" id="bg_color" name="bg_color" value="#A90118" <?php if($bg_color == "#A90118") echo "checked"; ?>> Aurora Red
						<input type="radio" class="form-control" id="bg_color" name="bg_color" value="#D9B74B" <?php if($bg_color == "#D9B74B") echo "checked"; ?>> Misted Yellow
						<input type="radio" class="form-control" id="bg_color" name="bg_color" value="#760030" <?php if($bg_color == "#760030") echo "checked"; ?>> Sangria
						<input type="radio" class="form-control" id="bg_color" name="bg_color" value="#AF8EA9" <?php if($bg_color == "#AF8EA9") echo "checked"; ?>> Mauve Mist
						<input type="radio" class="form-control" id="bg_color" name="bg_color" value="#000000" <?php if($bg_color == "#000000") echo "checked"; ?>> Black
						<input type="radio" class="form-control" id="bg_color" name="bg_color" value="#FFFFFF" <?php if($bg_color == "#FFFFFF") echo "checked"; ?>> White
						</p>
					</div>

					<div>
						<p><label>Show Query Per Page</label><br>
						<select id="show_query" name="show_query">
							<option>Select Number of Rows</option>
							<option value="5" <?php if($show_query == "5") echo "selected=selected"; ?>>5</option>
							<option value="10" <?php if($show_query == "10") echo "selected=selected"; ?>>10</option>
							<option value="20" <?php if($show_query == "20") echo "selected=selected"; ?>>20</option>
							<option value="25" <?php if($show_query == "25") echo "selected=selected"; ?>>25</option>
							<option value="50" <?php if($show_query == "50") echo "selected=selected"; ?>>50</option>
							<option value="100" <?php if($show_query == "100") echo "selected=selected"; ?>>100</option>
							<option value="200" <?php if($show_query == "200") echo "selected=selected"; ?>>200</option>
							<option value="250" <?php if($show_query == "250") echo "selected=selected"; ?>>250</option>
						</select>
						</p>
					</div>

					<div>
						<p>
						<label>Form Submit Button Text</label><br>
						<input type="text" class="form-control" id="sb_button_text" name="sb_button_text" placeholder="" value="<?php echo $sb_button_text; ?>">
						</p>
					</div>

					<div>
						<p>
						<label>Form Submit Button Color</label><br>
						<input type="radio" class="form-control" id="sb_button_color" name="sb_button_color" value="btn-default" <?php if($sb_button_color == "btn-default") echo "checked" ; ?>> White
						<input type="radio" class="form-control" id="sb_button_color" name="sb_button_color" value="btn-info" <?php if($sb_button_color == "btn-info") echo "checked"; ?>> Light Blue
						<input type="radio" class="form-control" id="sb_button_color" name="sb_button_color" value="btn-primary" <?php if($sb_button_color == "btn-primary") echo "checked"; ?>> Blue
						<input type="radio" class="form-control" id="sb_button_color" name="sb_button_color" value="btn-success" <?php if($sb_button_color == "btn-success") echo "checked"; ?>> Green
						<input type="radio" class="form-control" id="sb_button_color" name="sb_button_color" value="btn-warning" <?php if($sb_button_color == "btn-warning") echo "checked"; ?>> Golden
						<input type="radio" class="form-control" id="sb_button_color" name="sb_button_color" value="btn-danger" <?php if($sb_button_color == "btn-danger") echo "checked"; ?>> Red
						</p>
					</div>

					<div>
						<p>
						<label>Custom CSS</label> <br>
						<textarea class="form-control" id="cus_css" name="cus_css" placeholder="Type your CSS without <style>...</style> tag"><?php echo $cus_css; ?></textarea>
						</p>
					</div>
				</div>


				<!-- Message Setting -->
				<p id="message-setting" onclick="return ClickToggle(this.id, 'cfw-ms');">
					<a class="button button-hero btn-block">
						<i class="fa fa-plus-square fa-3x" aria-hidden="true"> Message Setting</i>
					</a>
				</p>

				<div id="cfw-ms" style="display: none;" class="setting-toggle-div">
					<div>
						<p>
						<label>Blank Name Error Text</label>
						<input type="text" class="form-control" id="name_error_field" name="name_error_field" placeholder="Type your Name Error Text" value="<?php echo $name_error_field; ?>">
						</p>
					</div>

					<div>
						<p>
						<label>Blank Email Error Text</label>
						<input type="text" class="form-control" id="email_error_field" name="email_error_field" placeholder="Type your Email Error Text" value="<?php echo $email_error_field; ?>">
						</p>
					</div>

					<div>
						<p>
						<label>Invalid Email Error Text</label>
						<input type="text" class="form-control" id="email_error_field_2" name="email_error_field_2" placeholder="Type your Email Error Text" value="<?php echo $email_error_field_2; ?>">
						</p>
					</div>

					<div>
						<p>
						<label>Blank Subject Error Text</label>
						<input type="text" class="form-control" id="subject_error_field" name="subject_error_field" placeholder="Type your Subject Error Text" value="<?php echo $subject_error_field; ?>">
						</p>
					</div>

					<div>
						<p>
						<label>Blank Message Error Text</label>
						<input type="text" class="form-control" id="message_error_field" name="message_error_field" placeholder="Type your Message Error Text" value="<?php echo $message_error_field; ?>">
						</p>
					</div>

					<div class="form-group">
						<p>
						<label>Message To User / Visitor After Successful Query Submission</label>
						<textarea class="form-control" id="qsm" name="qsm" placeholder="Type your message Here"><?php echo $qsm; ?></textarea>
						</p>
					</div>

					<div class="form-group">
						<p>
						<label>Message To User / Visitor When Query Submission Failed</label>
						<textarea class="form-control" id="qfm" name="qfm" placeholder="Type your message Here" style="height: 110px;"><?php echo $qfm; ?></textarea>
						</p>
					</div><br>
				</div>


				<!-- Auto Responder Setting -->
				<p id="auto-respond" onclick="return ClickToggle(this.id, 'cfw-ars');">
					<a class="button button-hero btn-block">
						<i class="fa fa-plus-square fa-3x" aria-hidden="true"> Auto Responder Setting</i>
					</a>
				</p>

				<div id="cfw-ars" style="display: none;" class="setting-toggle-div">
					<h2>Upgrade to Premium Version</h2>
					<a href="http://demo.awplife.com/contact-form-premium/" class="btn btn-info btn-lg aline" target="_new"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Premium Plugin Live Demo</a>
					<a href="http://demo.awplife.com/contact-form-premium-admin-demo/" class="btn btn-primary btn-lg aline" target="_new"><i class="fa fa-user" aria-hidden="true"></i> Try Premium Plugin Admin Demo</a>
					<a href="http://awplife.com/product/contact-form-premium/" target="_new" class="btn btn-success btn-lg aline"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Premium Plugin</a>
				</div>


				<!-- Email Setting -->
				<p id="email-setting" onclick="return ClickToggle(this.id, 'cfw-es');">
					<a class="button button-hero btn-block">
						<i class="fa fa-plus-square fa-3x" aria-hidden="true"> Email Setting</i>
					</a>
				</p>
				<div id="cfw-es" style="display: none;" class="setting-toggle-div">
					<h2>Upgrade to Premium Version</h2>
					<a href="http://demo.awplife.com/contact-form-premium/" class="btn btn-info btn-lg aline" target="_new"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Premium Plugin Live Demo</a>
					<a href="http://demo.awplife.com/contact-form-premium-admin-demo/" class="btn btn-primary btn-lg aline" target="_new"><i class="fa fa-user" aria-hidden="true"></i> Try Premium Plugin Admin Demo</a>
					<a href="http://awplife.com/product/contact-form-premium/" target="_new" class="btn btn-success btn-lg aline"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Premium Plugin</a>
				</div>

				<!--Google-re-captcha setting-->
				    <p id="google-captcha-setting" onclick="return ClickToggle(this.id, 'cfw-gcs');">
					   <a class="button button-hero btn-block">
						<i class="fa fa-plus-square fa-3x" aria-hidden="true"> Google reCAPTCHA</i>
					   </a>
				    </p>

				<div id="cfw-gcs" style="display: none;" class="setting-toggle-div">
					<h2>Upgrade to Premium Version</h2>
					<a href="http://demo.awplife.com/contact-form-premium/" class="btn btn-info btn-lg aline" target="_new"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Premium Plugin Live Demo</a>
					<a href="http://demo.awplife.com/contact-form-premium-admin-demo/" class="btn btn-primary btn-lg aline" target="_new"><i class="fa fa-user" aria-hidden="true"></i> Try Premium Plugin Admin Demo</a>
					<a href="http://awplife.com/product/contact-form-premium/" target="_new" class="btn btn-success btn-lg aline"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Premium Plugin</a>
				</div>
			  <button id="cfw-save-settings" name="cfw-save-settings" type="button" href="#" class="btn btn-primary btn-lg" onclick="return SaveSettings();"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
			</form>


			<!-- loading message--->
			<div id="loading-msg" class="alert alert-warning" style="display:none;">
				<i class='fa fa-cog fa-spin fa-5x fa-fw margin-bottom'></i>
				<p>Saving setting is under processing...</p>
			</div>

			<!-- settings saved message--->
			<div id="success-msg" class="alert alert-warning text-center" style="display:none;">
				<p>Setting successfully saved.</p>
			</div>
		</div>
	</div>

	<!-- settings ajax post code -->
	<script>
	// on load
	var email_carrier = jQuery('input[name=email_carrier]:checked', '#cfw-settings-form').val();
	if(email_carrier == "php"){
		jQuery(".php-email").show();
		jQuery(".smtp-email").hide();
	}
	if(email_carrier == "smtp"){
		jQuery(".php-email").hide();
		jQuery(".smtp-email").show();
	}

	// on click and change carrier option of email setting
	function CheckCarrier() {
		var email_carrier = jQuery('input[name=email_carrier]:checked', '#cfw-settings-form').val();
		if(email_carrier == "php"){
			jQuery(".php-email").show();
			jQuery(".smtp-email").hide();
		}
		if(email_carrier == "smtp"){
			jQuery(".php-email").hide();
			jQuery(".smtp-email").show();
		}
	}

	function SaveSettings() {
		jQuery(".error").hide();
		var action = 'cfw-save-setting';
		var qsm = jQuery("#qsm").val();
		var qfm = jQuery("#qfm").val();
		var auto_res = jQuery('input[name=auto_res]:checked', '#cfw-settings-form').val();
		var email_carrier = jQuery('input[name=email_carrier]:checked', '#cfw-settings-form').val();
		var admin_email = jQuery("#admin_email").val();
		var res_sub = jQuery("#res_sub").val();
		var res_msg = jQuery("#res_msg").val();
		var sm_name = jQuery("#sm_name").val();
		var sm_email = jQuery("#sm_email").val();
		var sm_Password = jQuery("#sm_Password").val();
		var sm_port = jQuery("#sm_port").val();
		var smtp_encryption = jQuery("#smtp_encryption").val();


		var title_field = jQuery("#title_field").val();

		var title_color = jQuery("#title_color").val();
		var description_field = jQuery("#description_field").val();
		var name_field = jQuery("#name_field").val();
		var email_field = jQuery("#email_field").val();
		var subject_field = jQuery("#subject_field").val();
		var message_field = jQuery("#message_field").val();
		var name_error_field = jQuery("#name_error_field").val();
		var email_error_field = jQuery("#email_error_field").val();
		var email_error_field_2 = jQuery("#email_error_field_2").val();
		var subject_error_field = jQuery("#subject_error_field").val();
		var message_error_field = jQuery("#message_error_field").val();
		var lebal_icon_color = jQuery('input[name=lebal_icon_color]:checked', '#cfw-settings-form').val()
		var ph_text_color = jQuery('input[name=ph_text_color]:checked', '#cfw-settings-form').val()
		var sb_button_color = jQuery('input[name=sb_button_color]:checked', '#cfw-settings-form').val()
		var sb_button_text = jQuery("#sb_button_text").val();
		var bg_color = jQuery('input[name=bg_color]:checked', '#cfw-settings-form').val()
		var show_query = jQuery("#show_query").val();
		var cus_css = jQuery("#cus_css").val();


		/* if(qsm == "") {
			jQuery("#qsm").after('<p class="error alert alert-warning"><strong>Please Type Successful Query Submission Message.</strong></p>');
			jQuery("#qsm").focus();
			jQuery(".error").fadeOut(4000);
			return false;
		}

		if(qfm == "") {
			jQuery("#qfm").after('<p class="error alert alert-warning"><strong>Please Type Failed Query Submission Message.</strong></p>');
			jQuery("#qfm").focus();
			jQuery(".error").fadeOut(4000);
			return false;
		}

		if(admin_email == "") {
			jQuery("#admin_email").after('<p class="error alert alert-warning"><strong>Email cannot be blank.</strong></p>');
			jQuery("#admin_email").focus();
			jQuery(".error").fadeOut(4000);
			return false;
		}

		if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(admin_email) == false) {
			jQuery("#admin_email").after('<p class="error alert alert-warning"><strong>Please enter a valid email like: yourname@gmail.com</strong></p>');
			jQuery("#admin_email").focus();
			jQuery(".error").fadeOut(4000);
			return false;
		}

		 if(res_sub == "") {
			jQuery("#res_sub").after('<p class="error alert alert-warning"><strong>Please Type Mail Subject.</strong></p>');
			jQuery("#res_sub").focus();
			jQuery(".error").fadeOut(4000);
			return false;
		}

		if(res_msg == "") {
			jQuery("#res_msg").after('<p class="error alert alert-warning"><strong>Please Type Mail Message.</strong></p>');
			jQuery("#res_msg").focus();
			jQuery(".error").fadeOut(4000);
			return false;
		} */


		var CFWAjax = new XMLHttpRequest();

		// hide saving button
		jQuery("#cfw-save-settings").hide();

		//show loading icon
		jQuery("#loading-msg").show();

		//check object request
		CFWAjax.onreadystatechange = function() {
			jQuery("#loading-msg").show();

			if (CFWAjax.readyState == 4 && CFWAjax.status == 200) {
				if(CFWAjax.responseText.indexOf("setting-successfully-saved") > 0) {
					//hide loading icon
					jQuery("#loading-msg").hide();

					// show saving button
					jQuery("#cfw-save-settings").show();

					//show setting saved successfully message
					jQuery("#success-msg").show();
					jQuery("#success-msg").fadeOut(3000);
				}
			}

			if(CFWAjax.status == 404) {
				alert('File not found & Object not responding.');
				return false;
			}
		};
		CFWAjax.open("POST", location.href, true);
		CFWAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		CFWAjax.send('action=' + action + '&qsm=' + qsm + '&qfm=' + qfm + '&auto_res=' + auto_res + '&email_carrier=' + email_carrier +'&admin_email=' + admin_email + '&res_sub=' + res_sub + '&res_msg=' + res_msg + '&sm_name=' + sm_name+ '&sm_email=' + sm_email+ '&sm_Password=' + sm_Password+ '&sm_port=' + sm_port  + '&smtp_encryption=' + smtp_encryption  + '&title_field=' + title_field  +  '&name_error_field=' + name_error_field  +  '&email_error_field=' + email_error_field +  '&email_error_field_2=' + email_error_field_2  + '&subject_error_field=' + subject_error_field  +  '&message_error_field=' + message_error_field  +  '&title_color=' + title_color  + '&description_field=' + description_field  + '&lebal_icon_color=' + lebal_icon_color + '&name_field=' + name_field + '&email_field=' + email_field + '&subject_field=' + subject_field + '&message_field=' + message_field + '&sb_button_color=' + sb_button_color + '&sb_button_text=' + sb_button_text  + '&ph_text_color=' + ph_text_color  + '&bg_color=' + bg_color+ '&show_query=' + show_query +  '&cus_css=' + cus_css );
	}

	//color-picker
	(function( jQuery ) {
		jQuery(function() {
			// Add Color Picker to all inputs that have 'color-field' class
			jQuery('#title_color').wpColorPicker();
		});
	})( jQuery );

	// toggle div open close
	function ClickToggle(id, divid) {
		jQuery( "div#" + divid ).slideToggle( "slow" );
		jQuery("#"+id +" i").toggleClass("fa-plus-square fa-minus-square");

		jQuery( document ).ready(function() {
			jQuery( "div#cfw-settings-form" ).sortable({
				revert: true
			});
			jQuery( "#sortable" ).sortable({
				revert: true
			});
		});
	}

	//color-picker
	(function( jQuery ) {
		jQuery(function() {
			// Add Color Picker to all inputs that have 'color-field' class
			jQuery('#title_color').wpColorPicker();
			//jQuery('#label_icon_color').wpColorPicker();
			jQuery('#Background_Color').wpColorPicker();
			jQuery('#Place_Holder_Text_Color').wpColorPicker();
			jQuery('#Submit_Button_Color').wpColorPicker();
			//jQuery('#ph_text_color').wpColorPicker();
		});
	})( jQuery );
	jQuery(document).ajaxComplete(function() {
		jQuery('#title_color,#Background_Color,#Place_Holder_Text_Color,#Submit_Button_Color').wpColorPicker();
	});
	</script>
	<?php
	// php save settings
	if(isset($_POST['action'])) {
		$action = $_POST['action'];
		if($action == "cfw-save-setting") {
			$qsm = $_POST['qsm'];
			$qfm = $_POST['qfm'];
			$auto_res = $_POST['auto_res'];
			$email_carrier = $_POST['email_carrier'];
			$admin_email = $_POST['admin_email'];
			$res_sub = $_POST['res_sub'];
			$res_msg = $_POST['res_msg'];
			$sm_name = $_POST['sm_name'];
			$sm_email = $_POST['sm_email'];
			$sm_Password = $_POST['sm_Password'];
			$sm_port = $_POST['sm_port'];
			$smtp_encryption = $_POST['smtp_encryption'];

			$title_field = $_POST['title_field'];
			$title_color = $_POST['title_color'];
			$description_field = $_POST['description_field'];
			$lebal_icon_color = $_POST['lebal_icon_color'];
			$name_field = $_POST['name_field'];
			$email_field = $_POST['email_field'];
			$subject_field = $_POST['subject_field'];
			$message_field = $_POST['message_field'];
			$name_error_field = $_POST['name_error_field'];
			$email_error_field = $_POST['email_error_field'];
			$email_error_field_2 = $_POST['email_error_field_2'];
			$subject_error_field = $_POST['subject_error_field'];
			$message_error_field = $_POST['message_error_field'];

			$sb_button_color = $_POST['sb_button_color'];
			$sb_button_text = $_POST['sb_button_text'];
			$ph_text_color = $_POST['ph_text_color'];
			$bg_color = $_POST['bg_color'];
			$show_query = $_POST['show_query'];
			$cus_css = $_POST['cus_css'];

			$all_settings = array(
				'qsm' => $qsm,
				'qfm' => $qfm,
				'auto_res' => $auto_res,
				'email_carrier' => $email_carrier,
				'admin_email' => $admin_email,
				'res_sub' => $res_sub,
				'res_msg' => $res_msg,
				'sm_name' => $sm_name,
				'sm_email' => $sm_email,
				'sm_Password' => $sm_Password,
				'sm_port' => $sm_port,
				'smtp_encryption' => $smtp_encryption,

				//Design settings
				'title_field' => $title_field,
				'title_color' => $title_color,
				'description_field' => $description_field,
				'lebal_icon_color' => $lebal_icon_color,
				'name_field' => $name_field,
				'email_field' => $email_field,
				'subject_field' => $subject_field,
				'message_field' => $message_field,
				'name_error_field' => $name_error_field,
				'email_error_field' => $email_error_field,
				'email_error_field_2' => $email_error_field_2,
				'subject_error_field' => $subject_error_field,
				'message_error_field' => $message_error_field,
				'sb_button_color' => $sb_button_color,
				'sb_button_text' => $sb_button_text,
				'ph_text_color' => $ph_text_color,
				'bg_color' => $bg_color,
				'show_query' => $show_query,
				'cus_css' => $cus_css,
			);

			if(update_option('cfw_settings', $all_settings)) {
				echo "<p id='setting-saved'>setting-successfully-saved</p>";
			}
		}
	}
?>
