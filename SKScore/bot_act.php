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
        'text'  => $text,
        'parse_mode' => "markdown"
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
        if (isset($message_data["text"])) {
	    $chatid = $message_data["chat"]["id"];
        $message_id = $message_data["message_id"];
        $text = $message_data["text"];
        
        mysql_query("INSERT INTO `p_chat`(ch_id,or_id,ch_text,ch_time) VALUES ('','$chatid','$text',NOW());");
        
        $cekdata=mysql_num_rows(mysql_query("select * from p_orang where or_id ='$chatid'"));
        
        if($cekdata>0){
            
            $rsdata=mysql_fetch_array(mysql_query("select * from p_orang where or_id ='$chatid'"));    
            $nama = $rsdata['or_nama'];
            $sex  = $rsdata['or_sex'];
            $hpno = $rsdata['or_hp'];
            $stat = $rsdata['or_status'];
            $bugno= $rsdata['or_bug'];
            $level= $rsdata['or_level'];
            $kode = $rsdata['or_kode'];
            $suks = $rsdata['or_sukses'];
            $batl = $rsdata['or_batal'];
            
            
            if($nama==""){
                
                mysql_query("UPDATE p_orang SET or_nama = '$text' WHERE or_id='$chatid'");
                $text ="Okay ,".$text."\nNice to meet you :)";
                $responx=1;
                
            }else{
                
                if($stat==1)
                {
                    $text=strtolower($text);
                    
                    if (strpos($text, '/Patch') > -1 or strpos($text, '/patch') > -1)
                        { 
                            mysql_query("UPDATE p_orang SET or_status = '2' WHERE or_id='$chatid'");
                            $text=" Please describe your patch : ";
                            $responx=1;
                            
                            
                        }
                    elseif (strpos($text, '/Info') > -1 or strpos($text, '/info') > -1)
                        { 
                            
                            mysql_query("UPDATE p_orang SET or_status = '3' WHERE or_id='$chatid'");
                            $text=" Please describe your info : ";
                            $responx=1;

                            
                        }
                    elseif (strpos($text, '/Bug') > -1 or strpos($text, '/bug') > -1)
                        { 
                            
                            mysql_query("UPDATE p_orang SET or_status = '4' WHERE or_id='$chatid'");
                            $text=" Please describe your bug : ";
                            $responx=1;

                            
                        }
                    elseif (strpos($text, 'Help') > -1 or strpos($text, 'help') > -1)
                        { 
                            
                            $text=" Halo ".$nama." \n\n*First* ,You can type \n/Patch for Patch\n/Bug for Report Bug\n/Info for giving info to team";
                            $responx=1;

                            
                        }
                    elseif (strpos($text, 'About') > -1 or strpos($text, 'about') > -1)
                        { 
                            $text=" SKS Notifier is automated system based on telegram chatbot.";
                            $responx=1;
                            
                        }
                    else{
                        
                        $text="Sorry, i don't understand what are you type \nif you confuse, just type *help* ok?";
                        $responx=1;
                        
                    }
                        
                    
                }else{
                    if($stat==2){
                        
                            mysql_query("UPDATE p_orang SET or_status = '22',or_company='$text' WHERE or_id='$chatid'");
                            $text=" Thanks for your information !";
                            $responx=1;
                            
                            //Areal Broadcast
                            
                                    // persiapkan curl
                                    $ch = curl_init(); 
                                
                                    // set url 
                                    curl_setopt($ch, CURLOPT_URL, "https://felikslourensius.com/SKScore/bot_bcpatch.php");
                                
                                    // return the transfer as a string 
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                                
                                    // $output contains the output string 
                                    $output = curl_exec($ch); 
                                
                                    // tutup curl 
                                    curl_close($ch);
                            
                            
                            //Ending Areal Broadcast
                            
                            mysql_query("UPDATE p_orang SET or_status = '1',or_company='' WHERE or_id='$chatid'");
                            
                        
                    }elseif($stat==3){
                        
                        mysql_query("UPDATE p_orang SET or_status = '33',or_company='$text' WHERE or_id='$chatid'");
                            $text=" Thanks for your information !";
                            $responx=1;
                            
                            //Areal Broadcast
                            
                                    // persiapkan curl
                                    $ch = curl_init(); 
                                
                                    // set url 
                                    curl_setopt($ch, CURLOPT_URL, "https://felikslourensius.com/SKScore/bot_bcpatch.php");
                                
                                    // return the transfer as a string 
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                                
                                    // $output contains the output string 
                                    $output = curl_exec($ch); 
                                
                                    // tutup curl 
                                    curl_close($ch);
                            
                            
                            //Ending Areal Broadcast
                            
                            mysql_query("UPDATE p_orang SET or_status = '1',or_company='' WHERE or_id='$chatid'");
                            
                    }elseif($stat==4){
                        
                        mysql_query("UPDATE p_orang SET or_status = '44',or_company='$text' WHERE or_id='$chatid'");
                            $text=" Thanks for your information !";
                            $responx=1;
                            
                            //Areal Broadcast
                            
                                    // persiapkan curl
                                    $ch = curl_init(); 
                                
                                    // set url 
                                    curl_setopt($ch, CURLOPT_URL, "https://felikslourensius.com/SKScore/bot_bcpatch.php");
                                
                                    // return the transfer as a string 
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                                
                                    // $output contains the output string 
                                    $output = curl_exec($ch); 
                                
                                    // tutup curl 
                                    curl_close($ch);
                            
                            
                            //Ending Areal Broadcast
                            
                            mysql_query("UPDATE p_orang SET or_status = '1',or_company='' WHERE or_id='$chatid'");
                        
                    }else{
                        
                        $text ="Hola ,".$nama."\nWhat can i do for you ?\nOr if you need help, type *Help*, and magic will be happens";
                        mysql_query("UPDATE p_orang SET or_status = '1' WHERE or_id='$chatid'");
                        $responx=1;
                        
                    }
                    
                
                    
                
                }
                
            }
            
        }else{
        
            $text ="Hi, Seems we dont know each other.\nSo, What's your name ?\n(Type your name)";
            
            mysql_query("INSERT INTO `p_orang`(or_id,or_nama,or_sex,or_hp) VALUES ('$chatid','','','');");
            $responx=1;
            
        }
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