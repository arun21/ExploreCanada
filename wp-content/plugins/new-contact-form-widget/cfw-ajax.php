<script>
		function ValidateForm() {

			jQuery(".error").hide();
			var action = "submit-query";
			var name = jQuery("#name").val();
			var email = jQuery("#email").val();
			var subject = jQuery("#subject").val();
			var message = jQuery("#message").val();
			var captcha_status = jQuery("#captcha_status").val();
			var captcha_response = "";

			//validation check
			if(name == "") {
				jQuery("#name").after('<p class="error alert alert-warning"><strong><?php echo $name_error_field; ?></strong></p>');
				jQuery("#name").focus();
				//jQuery(".error").fadeOut(3000);
				return false;
			}

			if(email == "") {
				jQuery("#email").after('<p class="error alert alert-warning"><strong><?php echo $email_error_field; ?></strong></p>');
				jQuery("#email").focus();
				jQuery(".error").fadeOut(3000);
				return false;
			}

			if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) == false) {
				jQuery("#email").after('<p class="error alert alert-warning"><strong>Please enter a valid email like: yourname@gmail.com</strong></p>');
				jQuery("#email").focus();
				jQuery(".error").fadeOut(3000);
				return false;
			}

			if(subject == "") {
				jQuery("#subject").after('<p class="error alert alert-warning"><strong><?php echo $subject_error_field; ?></strong></p>');
				jQuery("#subject").focus();
				jQuery(".error").fadeOut(3000);
				return false;
			}

			if(message == "") {
				jQuery("#message").after('<p class="error alert alert-warning"><strong><?php echo $message_error_field; ?></strong></p>');
				jQuery("#message").focus();
				jQuery(".error").fadeOut(3000);
				return false;
			}

			if(captcha_status == false) {
				//google captcha check

				var captcha_response = grecaptcha.getResponse();
				if(captcha_response.length == 0) {
					jQuery(".g-recaptcha").after('<p class="error alert alert-warning"><strong>Please varify your are not a robot.</strong></p>');
					jQuery(".g-recaptcha").focus();
					jQuery(".error").fadeOut( 5000, "linear" );
					return false;
				}
			}

			jQuery("#user-contact-form").hide();
			jQuery("#awp-loading-icon").show();

/* 			var alldata = {
				'action': 'submit_user_query',
				'formsdata': jQuery("#user-contact-form").serialize(),
			};

			jQuery.post(cfw_ajax.ajaxurl, alldata, function(response) {
				jQuery("#awp-loading-icon").hide();
				jQuery("#contact-result").show();
				jQuery("#contact-result").text(response.substring(0, response.indexOf('0')));
			}); */

		}
</script>
