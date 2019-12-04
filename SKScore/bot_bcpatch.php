<?php
include("token.php");
include("koneksi.php");

function request_url($method)
{
	global $TOKEN;
	return "https://api.telegram.org/bot" . $TOKEN . "/". $method;
}
function send_reply($chatid, $msgid, $text)
{
    $data = array(
        'chat_id' => $chatid,
        'text'  => $text
    );
    // use key 'http' even if you send the request to https://...
    $options = array(
    	'http' => array(
        	'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        	'method'  => 'POST',
        	'content' => http_build_query($data),
    	),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents(request_url('sendMessage'), false, $context);
}
function create_response($text)
{
   return $text;
}
function process_message($message)
{
        $updateid = $message["update_id"];
        $message_data = $message["message"];
        
	    $chatid = $message_data["chat"]["id"];
        $message_id = $message_data["message_id"];
        $text = $message_data["text"];
        
        
        
        
        $sqlstaf=mysql_query("select * from p_orang where or_level='STAFF' order by or_id ASC");
        while($rsstaf=mysql_fetch_array($sqlstaf)){

                $chatid=$rsstaf['or_id'];
            
                $rsdata=mysql_fetch_array(mysql_query("select or_nama,or_company,or_status from p_orang where or_id='$chatid'"));
                $msg  = $rsdata['or_company'];
                $nama = $rsdata['or_nama'];
                $stts = $rsdata['or_status'];
                
                if($stts=="22"){ $stts="Patch"; }
                if($stts=="33"){ $stts="Info"; }
                if($stts=="44"){ $stts="Bug"; }
                
                $text ="For all team, New ".$stts." From ".$nama." with message ".$msg;
                
                $responx=1;
                
            if($responx==1){
            $response = create_response($text);
            send_reply($chatid, $message_id, $response);
            }
            
        }
    return $updateid;
}
$entityBody = file_get_contents('php://input');
$message = json_decode($entityBody, true);

process_message($message);

?>