<?php
/*
При добавлении нового менеджера добавить его в экран "Прием Домашки" и $type=='fbk'

*/
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');  
$type = '';
if(isset($_REQUEST['type'])&&$_REQUEST['type']){
    $type = $_REQUEST['type'];
}

function curlrequest($array){
    $link = 'https://app.botmother.com/api/bot/action/0ar_Kw9iy/AC5BSCQDsCOQdWDxGB9BYDNBFBWDrBJCBDCyC5DLC6B2BoBjuCZBWDduBkC4CFC0';
    $id = '';
    $data = '';
    $platform = '';
    extract($array);

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
     
    //Initiate cURL.
    $ch = curl_init($link);
     
    //The JSON data.
    $jsonData = array(
        'platform' => $_REQUEST['platform'],
        'users' => array($_REQUEST['users']),
    );
     
    //Encode the array into JSON.
    $jsonDataEncoded = json_encode($jsonData);
     
    //Tell cURL that we want to send a POST request.
    curl_setopt($ch, CURLOPT_POST, 1);
     
    //Attach our encoded JSON string to the POST fields.
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
     
    //Set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
     
    //Execute the request
    $result = curl_exec($ch);
}

if($type=='sendmsg'){
    $array = array(
        'id' => $_REQUEST['users'],
        'platform' => $_REQUEST['platform']
    );
    curlrequest($array);
}
if($type=='fbk'){
    $array = array(
        'id' => $_REQUEST['users'],
        'platform' => $_REQUEST['platform']
    );
    curlrequest($array);
}
















