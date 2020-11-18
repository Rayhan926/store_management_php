<?php

include "config/db.php";

function day_ago($e){

  $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

  $now = $dt->format('Y-m-d H:i:s');
  $time   = strtotime($now);
  $time   = $time - (60*(60*13)); //one hour
  $beforeOneHour = date("Y-m-d H:i:s", $time); // Our Local Correct Time

  $old_time = $e; // Old Time
  $date1 = strtotime($old_time);
  $date2 = strtotime($beforeOneHour);

  $a = $date1;
  $b = $date2;

  $difference = $b-$a;

  $second = 1;
  $minute = 60*$second;
  $hour   = 60*$minute;
  $day    = 24*$hour;
  $week    = 7*$day;
  $month    = 30*$day;
  $year    = 12*$month;

  $ans["year"]    = floor($difference/$year);
  $ans["month"]    = floor($difference/$month);
  $ans["week"]    = floor($difference/$week);
  $ans["day"]    = floor($difference/$day);
  $ans["hour"]   = floor(($difference%$day)/$hour);
  $ans["minute"] = floor((($difference%$day)%$hour)/$minute);
  $ans["second"] = floor(((($difference%$day)%$hour)%$minute)/$second);

  
  if ($ans["year"]>=1) {
    return $his_time_ago = $ans["year"]." year ago";
  }elseif($ans["month"]>=1){
    return $his_time_ago = $ans["month"]." month ago";
  }elseif($ans["week"]>=1){
    return $his_time_ago = $ans["week"]." week ago";
  }elseif($ans["day"]>=1){                  
    return $his_time_ago = $ans["day"]." day ago";
  }elseif($ans["hour"]>=1){
    return $his_time_ago = $ans["hour"]." hour ago";
  }elseif($ans["minute"]>=1){
    return $his_time_ago = $ans["minute"]." min ago";
  }elseif($ans["second"]>=1){
    return $his_time_ago = "Just now";
  }else{
    return $his_time_ago = "Just now";
  }


}


function second_ago($e){
  $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));
      
  $now = $dt->format('Y-m-d H:i:s');
  $time   = strtotime($now);
  $time   = $time - (60*(60*13)); //one hour
  $beforeOneHour = date("Y-m-d H:i:s", $time); // Our Local Correct Time

  $old_time = $e; // Old Time
  $date1 = strtotime($old_time);
  $date2 = strtotime($beforeOneHour);

  $a = $date1;
  $b = $date2;

  $difference = $b-$a;

  $second = 1;
  $minute = 60*$second;
  $hour   = 60*$minute;
  $day    = 24*$hour;
  $week    = 7*$day;
  $month    = 30*$day;
  $year    = 12*$month;

  $ans["year"]    = floor($difference/$year);
  $ans["month"]    = floor($difference/$month);
  $ans["week"]    = floor($difference/$week);
  $ans["day"]    = floor($difference/$day);
  $ans["hour"]   = floor(($difference%$day)/$hour);
  $ans["minute"] = floor((($difference%$day)%$hour)/$minute);
  $ans["second"] = floor(((($difference%$day)%$hour)%$minute)/$second);

  
  if ($ans["year"]>=1) {
    return $ans["year"]." yr ago";
  }elseif($ans["month"]>=1){
    return $ans["month"]." month ago";
  }elseif($ans["week"]>=1){
    return $ans["week"]." week ago";
  }elseif($ans["day"]>=1){                  
    return $ans["day"]." d ago";
  }elseif($ans["hour"]>=1){
    return $ans["hour"]." hr ago";
  }elseif($ans["minute"]>=1){
    return $ans["minute"]." min ago";
  }elseif($ans["second"]>=1){
    return "Just now";
  }else{
    return 'Just now';
  }
}



function owner_data($e){

  $id = $_COOKIE["iasasaddffsfd"];
  $pass = $_COOKIE["psasgsfsafsgdsad"];
  $token = $_COOKIE["toawasnsdeaden"];
  $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  $get = mysqli_query($connect, "SELECT * FROM `owner` WHERE id = '$id' && owner_password = '$pass' && owner_token = '$token' ");
  if ($get == true && mysqli_num_rows($get) === 1) {
    while($data = mysqli_fetch_array($get)){
      if ($e == 'pic') {
        if ($data['owner_image'] == '') {
          if ($data['owner_gender'] == 'male') {
            echo 'male.png';
          }else{
            echo 'female.png';
          }
        }else{
          echo $data['owner_image'];
        }
      }
      if($e == 'name'){
        echo $data['owner_name'];
      }
      if($e == 'username'){
        echo $data['owner_username'];
      }
    }
  }
}

// function owner_two_step(){
//   $id = $_COOKIE["iasasaddffsfd"];
//   $pass = $_COOKIE["psasgsfsafsgdsad"];
//   $token = $_COOKIE["toawasnsdeaden"];
//   $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//   $get = mysqli_query($connect, "SELECT * FROM `owner` WHERE id = '$id' && owner_password = '$pass' && owner_token = '$token' && owner_two_step = 'on' ");
//   if ($get == true) {
//     if ( mysqli_num_rows($get) === 1) {
//       echo 'checked';
//     }else{
//       echo '';
//     }
//   }else{
//     echo '';
//   }
// }

function two_step_check($e){
  $id = $_COOKIE["iasasaddffsfd"];
  $pass = $_COOKIE["psasgsfsafsgdsad"];
  $token = $_COOKIE["toawasnsdeaden"];
  $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  $get = mysqli_query($connect, "SELECT * FROM `owner` WHERE id = '$id' && owner_password = '$pass' && owner_token = '$token' && owner_two_step = 'on' ");
  if ($get == true) {
    
    $count = mysqli_num_rows($get);

    if ($count === 1 && $e == 'on_off') {
      return 'On';
    }else if ($count === 1 && $e == 'check') {
      return 'checked';
    }else{
      return 'Off';
    }
    
  }
}

function store_secrect_code($e){
  $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  $get = mysqli_query($connect, "SELECT * FROM `store_settings` WHERE setting_name = 'store_code' && setting_status = 'on'");
  if ($get == true) {
    $count = mysqli_num_rows($get);

    if ($count === 1 && $e == 'on_off') {
      return 'On';
    }else if ($count === 1 && $e == 'check') {
      return 'checked';
    }else{
      return 'Off';
    }

    
  }
}

?>