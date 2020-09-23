<?php
if (!function_exists('mcrypt_create_iv')) {
    function mcrypt_create_iv($length) {
        return openssl_random_pseudo_bytes($length, NULL);
    }
}
?>