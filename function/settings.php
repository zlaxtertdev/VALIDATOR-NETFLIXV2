<?php
/*==========> INFO 
 * CODE     : BY ZLAXTERT
 * SCRIPT   : NETFLIX VALIDATOR
 * VERSION  : V2
 * TELEGRAM : t.me/zlaxtert
 * BY       : DARKXCODE
 */
$settings = array(
    "mode_proxy" => "off", // on or off
    "proxy_list" => "proxy.txt", // proxy list file (ex: proxy.txt)
    "proxy_Auth" => "", // proxy password (ex: username:pass)
    "type_proxy" => "http", // type proxy (ex: http, https or socks)
    "apikey"     => "apikey.txt", // apikey file (ex: apikey.txt)
    "APIs"       => "API.txt", // apikey file (ex: apikey.txt)
);

$mode_proxy = $settings["mode_proxy"];
$proxy_list = $settings["proxy_list"];
$proxy_pwd  = $settings["proxy_Auth"];
$typeProxy  = $settings["type_proxy"];
$thisKey    = $settings["apikey"];
$thisAPIs   = $settings["APIs"];
