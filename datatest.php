<?php

//$curl_url = "http://www.pgatour.com/15s/.element/ssi/auto/3.0/sdms/leaderboards/r505/data/current/leaderboard-1-all.json";
//$curl_url = "http://www.pgatour.com/15s/.element/ssi/auto/3.0/sdms/leaderboards/r028/data/current/leaderboard-1-all.json";
$curl_url = "http://www.pgatour.com/data/r/current/leaderboard.json?ts=" . time();
//http://www.pgatour.com/15s/.element/ssi/auto/3.0/sdms/leaderboards/r505/data/current/leaderboard-1-all.json
$curl = curl_init($curl_url);
$curlResponse = curl_exec($curl);
curl_close($curl);
echo $curlResponse;

?>
