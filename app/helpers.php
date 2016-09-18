<?php

if (! function_exists('api_token')) {
    
    function api_token()
    {
        return bin2hex(openssl_random_pseudo_bytes(30));
    }

}