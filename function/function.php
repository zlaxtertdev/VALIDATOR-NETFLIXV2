<?php

/*==========> INFO 
 * CODE     : BY ZLAXTERT
 * SCRIPT   : VALIDATOR NETFLIX
 * VERSION  : V2
 * TELEGRAM : t.me/zlaxtert
 * BY       : DARKXCODE
 */

 date_default_timezone_set("Asia/Jakarta");
 error_reporting(1);
 ini_set("memory_limit", '-1');
 define("OS", strtolower(PHP_OS));
 $date = date("l, d-m-Y (H:m:s)");

 //==============> CREATE FOLDER RESULT
if (!file_exists('result')) {
    mkdir('result', 0777, true);
}

//============> COLLOR
$BL   = collorLine("BL");
$RD   = collorLine("RD");
$GR   = collorLine("GR");
$YL   = collorLine("YL");
$MG   = collorLine("MG");
$DEF  = collorLine("DEF");
$CY   = collorLine("CY");
$WH   = collorLine("WH");
//============> FUNCTION

function save_file($name_file, $isi){
    $click = fopen("$name_file","a");
    fwrite($click,"$isi"."\n");
    fclose($click);
}

function RandColl(){
    //============> COLLOR
    $BL   = collorLine("BL");
    $RD   = collorLine("RD");
    $GR   = collorLine("GR");
    $YL   = collorLine("YL");
    $MG   = collorLine("MG");
    $DEF  = collorLine("DEF");
    $CY   = collorLine("CY");
    $WH   = collorLine("WH");
    $dataCol = array(
        1=> $BL,
        2=> $RD,
        3=> $GR,
        4=> $YL,
        5=> $MG,
        6=> $CY,
        7=> $WH
   );
   $randCol = array_rand($dataCol);
   $collor = $dataCol[$randCol];
   return $collor;
}
function banner(){
    //============> COLLOR
    $DEF    = collorLine("DEF");

    $data = array(
        
       1 => "
".RandColl()."                 (            (        )    )         ) (          
                 )\ )   (     )\ )  ( /( ( /(   (  ( /( )\ )       
                (()/(   )\   (()/(  )\()))\())  )\ )\()|()/(  (    
                 /(_)|(((_)(  /(_))((_)\((_)\ (((_|(_)\ /(_)) )\   
                (_))_ )\ _ )\(_)) |_ ((_)_((_))\___ ((_|_))_ ((_)  
".RandColl()."                 |   \(_)_\(_) _ \| |/ /\ \/ ((/ __/ _ \|   \| __| 
".RandColl()."                 | |) |/ _ \ |   /  ' <  >  < | (_| (_) | |) | _|  
".RandColl()."                 |___//_/ \_\|_|_\ _|\_\/_/\_\ \___\___/|___/|___|",
       
       2 => "

".RandColl()."    ██████╗  █████╗ ██████╗ ██╗  ██╗██╗  ██╗ ██████╗ ██████╗ ██████╗ ███████╗
".RandColl()."    ██╔══██╗██╔══██╗██╔══██╗██║ ██╔╝╚██╗██╔╝██╔════╝██╔═══██╗██╔══██╗██╔════╝
".RandColl()."    ██║  ██║███████║██████╔╝█████╔╝  ╚███╔╝ ██║     ██║   ██║██║  ██║█████╗  
".RandColl()."    ██║  ██║██╔══██║██╔══██╗██╔═██╗  ██╔██╗ ██║     ██║   ██║██║  ██║██╔══╝  
".RandColl()."    ██████╔╝██║  ██║██║  ██║██║  ██╗██╔╝ ██╗╚██████╗╚██████╔╝██████╔╝███████╗
".RandColl()."    ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═╝ ╚═════╝ ╚═════╝ ╚═════╝ ╚══════╝ ",

       3 => "
".RandColl()."               ·▄▄▄▄   ▄▄▄· ▄▄▄  ▄ •▄ ▐▄• ▄  ▄▄·       ·▄▄▄▄  ▄▄▄ .
".RandColl()."               ██▪ ██ ▐█ ▀█ ▀▄ █·█▌▄▌▪ █▌█▌▪▐█ ▌▪▪     ██▪ ██ ▀▄.▀·
".RandColl()."               ▐█· ▐█▌▄█▀▀█ ▐▀▀▄ ▐▀▀▄· ·██· ██ ▄▄ ▄█▀▄ ▐█· ▐█▌▐▀▀▪▄
".RandColl()."               ██. ██ ▐█ ▪▐▌▐█•█▌▐█.█▌▪▐█·█▌▐███▌▐█▌.▐▌██. ██ ▐█▄▄▌
".RandColl()."               ▀▀▀▀▀•  ▀  ▀ .▀  ▀·▀  ▀•▀▀ ▀▀·▀▀▀  ▀█▄▀▪▀▀▀▀▀•  ▀▀▀ ",

       4 => "
".RandColl()."     ______  _______ ______  _     _ _     _ _______ _______ ______  _______ 
".RandColl()."    (______)(_______|_____ \(_)   | (_)   (_|_______|_______|______)(_______)
".RandColl()."     _     _ _______ _____) )_____| |  ___   _       _     _ _     _ _____   
".RandColl()."    | |   | |  ___  |  __  /|  _   _) |   | | |     | |   | | |   | |  ___)  
".RandColl()."    | |__/ /| |   | | |  \ \| |  \ \ / / \ \| |_____| |___| | |__/ /| |_____ 
".RandColl()."    |_____/ |_|   |_|_|   |_|_|   \_)_|   |_|\______)\_____/|_____/ |_______)",
    );
    $rand = array_rand($data);
    $banner = $data[$rand];
    return $banner;
}

function banner2(){
    //============> COLLOR
    $BL   = collorLine("BL");
    $RD   = collorLine("RD");
    $GR   = collorLine("GR");
    $YL   = collorLine("YL");
    $MG   = collorLine("MG");
    $DEF  = collorLine("DEF");
    $CY   = collorLine("CY");
    $WH   = collorLine("WH");
    $out = "
$WH       ===================================================================$DEF
                    |$GR SCRIPT$DEF  :$MG NETFLIX VALIDATOR           $DEF |
                    |$BL VERSION$DEF :$CY V2  $DEF                         |
$WH       ===================================================================$DEF
";
    return $out;
}

function Jam(){
    date_default_timezone_set("Asia/Jakarta");
    $jam = date("H:m:s");
    return $jam;
}
function RatioCheck($total_live, $total_lists){
    $ratioValid = $total_live / $total_lists * 100;
    return $ratioValid;
}
function GetProxy($proxies){
    $proxyLists  = array_unique(explode("\n",str_replace("\r","",file_get_contents($proxies))));
    $randProxies = array_rand($proxyLists);
    $proxy       = $proxyLists[$randProxies];
    return $proxy;
}
function GetKey($key){
    $apikey = file_get_contents($key);
    return $apikey;
}
 
function collorLine($col){
    $data = array(
        "GR" => "\e[32;1m",
        "RD" => "\e[31;1m",
        "BL" => "\e[34;1m",
        "YL" => "\e[33;1m",
        "CY" => "\e[36;1m",
        "MG" => "\e[35;1m",
        "WH" => "\e[37;1m",
        "DEF" => "\e[0m"
    );
    $collor = $data[$col];
    return $collor;
}
function multiexplode($delimiters, $string)
{
 $one = str_replace($delimiters, $delimiters[0], $string);
 $two = explode($delimiters[0], $one);
 return $two;
}