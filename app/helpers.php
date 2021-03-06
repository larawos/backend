<?php

if (! function_exists('api_token')) {
    
    function api_token()
    {
        return bin2hex(openssl_random_pseudo_bytes(30));
    }

}

if (! function_exists('parse_base64')) {
    
    function parse_base64($content)
    {
        $name = md5_file($content);
        $content = substr($content, strpos($content, 'base64,') + 7);
        return collect(compact('name', 'content'));
    }

}

if (! function_exists('encode_file_token')) {
    
    function encode_file_token($token)
    {
        return "[file:$token]";
    }

}

if (! function_exists('decode_file_token')) {
    
    function decode_file_token($str)
    {
        preg_match_all('/\[file:(.*?)\]/', $str, $matchs);

        $matchs = collect($matchs)->filter()->toArray();
        $names = [];
        $domain = rtrim(config('filesystems.disks.qiniu.domains.custom'), '/');

        $domain = false !== strpos($domain, 'http://') ? $domain : 'http://' . $domain;

        if (!empty($matchs)) {
            foreach ($matchs[1] as $key => $match) {
                $names[$key] = $domain . '/' . $match;
            }

            $str = str_replace($matchs[0], $names, $str);
        }

        return $str;
    }

}