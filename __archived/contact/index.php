<?php
function clean($data) {
	$data = trim(stripslashes(strip_tags($data)));
	return $data;
}
$exploits = "/(content-type|bcc:|cc:|document.cookie|onclick|onload)/i";
foreach ($_POST as $key => $val) {
	$c[$key] = clean($val);

	if (preg_match($exploits, $val)) {
		exit("<p class=\"error\">No exploits, please!</p>");
	}
}

$show_form = true;
$error_msg = NULL;

if (isset($c['submit'])) {
	if (empty($c['name']) || empty($c['email']) || empty($c['subject']) || empty($c['comments'])) {
		$error_msg .= "Name, email, subject and message are all required fields. \n";
	} elseif (strlen($c['name']) > 15) {
		$error_msg .= "The name field is limited at 15 characters. Your first name or nickname will do! \n";
	} elseif (!ereg("^[A-Za-z' -]", $c['name'])) {
		$error_msg .= "The name field must not contain special characters. \n";
	} elseif (!ereg("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$",strtolower($c['email']))) {
		$error_msg .= "That is not a valid e-mail address. \n";
	}

	if ($error_msg == NULL) {
		$show_form = false;

		$subject = $c['subject'];

		$message = "You received this e-mail message through your website: \n\n";
		foreach ($c as $key => $val) {
			$message .= ucwords($key) . ": $val \n";
		}
		$message .= "IP: {$_SERVER['REMOTE_ADDR']} \n";
		$message .= "Browser: {$_SERVER['HTTP_USER_AGENT']}";

		if (strstr($_SERVER['SERVER_SOFTWARE'], "Win")) {
			$headers   = "From: {$c['email']} \n";
			$headers  .= "Reply-To: {$c['email']}";
		} else {
			$headers   = "From: {$c['email']} \n";
			$headers  .= "Reply-To: {$c['email']}";
		}

		$recipient = "shout@sampenrose.co.uk";

		if (mail($recipient,$subject,$message,$headers)) {
			echo '<p class="success" style="font-family:sans-serif;"><strong>Wayhay! I&rsquo;ll be in touch!</strong> <a href="/" style="color:#00aeef;">Go back home.</a></p><meta http-equiv="refresh" content="3;url=/"> ';
		} else {
			echo "<p class=\"error\"><strong>Sorry, your mail could not be sent at this time.</strong></p>";
		}
	}
}
if (!isset($c['submit']) || $show_form == true) {
	function get_data($var) {
		global $c;
		if (isset($c[$var])) {
			echo $c[$var];
		}
	}

	if ($error_msg != NULL) {
		echo '<p class="error" style="font-family:sans-serif; color:#c00;"><strong>Error:</strong> ';
		echo nl2br($error_msg) . "</p>";
	}
?>
			<form action="/contact/" method="post" id="contact-form" style="font-family:sans-serif;">
				<fieldset>
				
					<legend>Talk to me&hellip;</legend>
					
					<p>
						<label for="name">Name*:</label>
						<input type="text" name="name" id="name" class="text-input" value="<?php get_data("name"); ?>" />
					</p>
					
					<p>
						<label for="form-email">Email*:</label>
						<input type="text" name="email" id="form-email" class="text-input" value="<?php get_data("email"); ?>" />
					</p>
					
					<p>
						<label for="subject">Subject*:</label>
						<input type="text" name="subject" id="subject" class="text-input" value="<?php get_data("subject"); ?>" />
					</p>
					
					<p>
						<label for="comments">Message*:</label>
						<textarea name="comments" id="comments" cols="50" rows="10"><?php get_data("comments"); ?></textarea>
					</p>
					
					<p>
						<input type="submit" name="submit" id="submit" value="Send" /> Or email me at <a href="ma&#105;lto&#58;shout&#64;&#115;am&#112;enr&#111;&#115;e&#46;c&#111;&#46;&#117;k">shout@sampenrose.co.uk</a>
					</p>
					
				</fieldset>
			</form>
<?php
}
?>