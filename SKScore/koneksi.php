<?php
	$host="localhost";
	$user="u3332521_makjang";
	$pw="feliksl123";
	$db="u3332521_sksman";
	//$host="localhost";
	//$user="root";
	//$pw="";
	//$db="dbkardikax";

	$koneksi=mysql_connect($host,$user,$pw) or die ("Koneksi gagal");
	mysql_select_db($db, $koneksi) or die ("Gagal memilih database");
	
	
	//-------setup no-------------------------//
    function transno($nomer){
    	if(strlen($nomer)==1){
    			$nomer = "0000".$nomer;
    		}
    	elseif(strlen($nomer)==2){
    			$nomer = "000".$nomer;
    		}
    	elseif(strlen($nomer)==3){
    			$nomer = "00".$nomer;
    		}
    	elseif(strlen($nomer)==4){
    			$nomer = "0".$nomer;
    		}
    	return $nomer;
    }
//--------------------------------------//
?>