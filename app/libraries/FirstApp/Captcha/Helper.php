<?php

namespace FirstApp\Captcha;

require_once('recaptchalib.php');

/**
 * Description of Helper
 *
 * @author user1
 */
class Helper {

    const PUBLIC_KEY = '6Ld_0-4SAAAAAHSUzdj3KENlWEEhxgq_WZaELttp';
    const PRIVATE_KEY = '6Ld_0-4SAAAAAFueVvh-R0V2qTOC1I1mi-ai7QUn';
    const ERROR_MESSAGE = 'reCAPTCHA failed';
    const RESPONSE_FIELD = 'recaptcha_response_field';
    const CHALLENGE_FIELD = 'recaptcha_challenge_field';

    public static function input() {
        return recaptcha_get_html(self::PUBLIC_KEY);
    }

    public static function validate() {
        $resp = recaptcha_check_answer(
                self::PRIVATE_KEY, $_SERVER["REMOTE_ADDR"], 
                $_POST[self::CHALLENGE_FIELD], 
                $_POST[self::RESPONSE_FIELD]);
        return $resp->is_valid;
    }

}
