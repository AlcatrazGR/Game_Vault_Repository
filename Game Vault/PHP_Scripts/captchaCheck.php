<?php
	require_once('recaptchalib.php');
	if (isset($_POST["recaptcha_response_field"])) {
        $resp = recaptcha_check_answer ("6LcM6f4SAAAAAGfaAumQ5_GS_oW87dKqgkFkJM9b",
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) {
                # they got the captcha right
                echo "Do something here, such as setting a variable you can use later.";
        } else {
                # set the error code so that we can display it
                $error = $resp->error;
        }
	}
?>