<?php

function get_ip_address(){
        $ipaddress='';
        if(isset($_SERVER['HTTP_CLIENT_IP'])){
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        }else if(isset($_SERVER['HTTP_FORWARDED_FOR'])){
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];       
        }else if(isset($_SERVER['REMOTE_ADDR'])){
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        }else{
            $ipaddress="UNKNOWN";
        }
        return $ipaddress;
    }

function get_EP($point){
    $status="";
    if($point==0){
        $status="Not Applicable";
}elseif ($point>0 && $point<=20 ) {
        $status="Basic Knowledge";
    }elseif ($point>21 && $point<=40 ) {
        $status="Novice";
    }elseif ($point>41 && $point<=60 ) {
        $status="Intermediate";
    }elseif ($point>61 && $point<=75 ) {
        $status="Advanced";
    }elseif ($point>76 && $point<=100 ) {
        $status="Expert";
    }
    return $status;
}