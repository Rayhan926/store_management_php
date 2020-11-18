<?php


include "config/db.php";
include 'functions.php';

if (isset($_REQUEST["log_out_1"])) {

  $id_id = $_COOKIE["i35esda5asd"];

  $select = mysqli_query($connect, "SELECT * FROM `users` WHERE id = '$id_id' ");
  $fetch = mysqli_fetch_array($select);

  $usr__id = $fetch['id'];
  $usr__name = $fetch['user_name'];
  $usr__desc = $usr__name.' loged out to his account';

  $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));
  $now = $dt->format('Y-m-d H:i:s');
  $time   = strtotime($now);
  $time   = $time - (60*(60*13)); //one hour
  $time_is = date("Y-m-d H:i:s", $time); // Our Local Correct Time

  $insert = "INSERT INTO owner_notification (`n_title`, `n_desc`, `n_time`, `n_type`, `n_seen`, `n_image`, `n_from`) VALUES ('User Log Out', '$usr__desc', '$time_is', '', 'unseen', '$usr__id', '')";

  $run_insert = mysqli_query($connect, $insert);


  setcookie('t35e6and45easn','asa',time()-(86400*15), '/', null, null, true);
  setcookie('p35edasdd785easd','asas',time()-(86400*15), '/', null, null, true);
  setcookie('i35esda5asd','asas',time()-(86400*15), '/', null, null, true);
  header("location: login.php");
}


if (isset($_REQUEST["logout_2"])) {

  $id_id = $_COOKIE["iasasaddffsfd"];

  $select = mysqli_query($connect, "SELECT * FROM `owner` WHERE id = '$id_id' ");
  $fetch = mysqli_fetch_array($select);

  $usr__id = $fetch['id'];
  $usr__name = $fetch['owner_name'];
  $usr__desc = $usr__name.' loged out to his account';

  $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));
  $now = $dt->format('Y-m-d H:i:s');
  $time   = strtotime($now);
  $time   = $time - (60*(60*13)); //one hour
  $time_is = date("Y-m-d H:i:s", $time); // Our Local Correct Time

  $insert = "INSERT INTO owner_notification (`n_title`, `n_desc`, `n_time`, `n_type`, `n_seen`, `n_image`, `n_from`) VALUES ('Admin Log Out', '$usr__desc', '$time_is', '', 'unseen', '$usr__id', 'ow')";

  $run_insert = mysqli_query($connect, $insert);

    
  setcookie('toawasnsdeaden','',time()-(86400*15), '/', null, null, true);
  setcookie('psasgsfsafsgdsad','',time()-(86400*15), '/', null, null, true);
  setcookie('iasasaddffsfd','',time()-(86400*15), '/', null, null, true);

  header("location: login.php");
}

function get_info($x){
  $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  $pass = $_COOKIE["p35edasdd785easd"];
  $token = $_COOKIE["t35e6and45easn"];


  $select = "SELECT * FROM users WHERE user_password = '$pass' && user_token = '$token'";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    if (mysqli_num_rows($run) === 1) {
      while($data = mysqli_fetch_array($run)){
        if ($x == 'name') {
          echo $data["user_name"];
        }
        if ($x == 'pic') {
          if ($data["user_image"] == '') {
            if ($data['user_gender'] == 'male') {
              echo 'male.png';
            }else{
              echo 'female.png';
            }
          }else{
            echo $data["user_image"];
          }
        }
        if ($x == 'user') {
          echo $data["user_username"];
        }
      }
    }
  }

}
/*
function get_all_due(){
  $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  $id = $_COOKIE["i35esda5asd"];

  $select = "SELECT * FROM users_due WHERE due_user_id = '$id' ";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
      while($data = mysqli_fetch_array($run)){

        $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

        $now = $dt->format('Y-m-d H:i:s');
        $time   = strtotime($now);
        $time   = $time - (60*(60*13)); //one hour
        $beforeOneHour = date("d-m-Y", $time); // Our Local Correct Time

        echo '
      <div class="single_due_list_wrap">
        <div class="single_due_list_name">
          <span>'.$data["product_name"].'</span>
        </div>
        <div class="single_due_list_price">
          <span>'.$data["product_price"].' tk</span>
        </div>
        <div class="due_list_more_option_wrap flex_all">
          <i class="fas fa-ellipsis-v"></i>
          <ul class="due_list_more_option_ul">
            <li>Sold by: '.$data["sold_by"].'</li>
            <li class="cstm_tooltip_top cstm_relative">
              <div class="cstm_toll_tip_box" style="width: 125px !important;">Data: '.$beforeOneHour.'</div>
              Sold at: '.day_ago($data["sold_date"]).'
            </li>
          </ul>
        </div>
      </div>';
      }
  }
}
*/

function user_total_due($e){
  $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  $select = "SELECT SUM(product_price) as total_due FROM users_due WHERE due_user_id = '$e' && due_status = 'due' ";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    if (mysqli_num_rows($run) >= 1) {
      while($data = mysqli_fetch_array($run)){
        echo $data['total_due'];
      }
    }
  }
}
/*
function owner_data($e){

  $id = $_COOKIE["iasasaddffsfd"];
  $pass = $_COOKIE["psasgsfsafsgdsad"];
  $token = $_COOKIE["cb5654c557d332ca2026168b9bcdcfc9"];
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
*/


if (isset($_POST['users_due']) && isset($_POST["limit_row"])) {
  sleep(1);
  $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  $users_due = $_POST["users_due"];
  $limit_row = $_POST["limit_row"];
  $id = $_COOKIE["i35esda5asd"];

  
  $select = "SELECT * FROM (SELECT * FROM users_due WHERE due_user_id = '$id' ORDER BY id DESC LIMIT $limit_row)Var1 ORDER BY id ASC";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    if (mysqli_num_rows($run) >= 1) {
     
      while($data = mysqli_fetch_array($run)){

        $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

        $now = $dt->format('Y-m-d H:i:s');
        $time   = strtotime($now);
        $time   = $time - (60*(60*13)); //one hour
        $beforeOneHour = date("d-m-Y", $time); // Our Local Correct Time

        /// Paid List Mark
        if ($data["due_status"] == 'paid' && $data["due_paid_list"] == '') {
          $paid_list = 'its_paid_list';
        }else{
          $paid_list = '';
        }
        // Due List Red Border
        if ($data["product_price"] != '0' && $data["due_paid_list"] == 'spe_due') {
          $due_list_i = 'its_red_list';
        }else{
          $due_list_i = '';
        }

        echo '
      <div class="single_due_list_wrap from_bottom pay_is_'.$data['due_paid_list'].' '.$paid_list.' '.$due_list_i.'">
        <div class="single_due_list_name">
          <span>'.$data["product_name"].'</span>
        </div>
        <div class="single_due_list_price">
          <span>'.$data["product_price"].' tk</span>
        </div>
        <div class="due_list_more_option_wrap flex_all">
          <i class="fas fa-ellipsis-v"></i>
          <ul class="due_list_more_option_ul">
            <li>Sold by: '.$data["sold_by"].'</li>
            <li class="cstm-tooltip cstm_relative">
              <div class="cstm-tooltip-box text-center" style="width: 125px !important;">Data: '.$beforeOneHour.'</div>
              Sold at: '.day_ago($data["sold_date"]).'
            </li>
          </ul>
        </div>
      </div>';
      }
    }else{
      echo 'no_row';
    }
  }else{
    echo 'no';
  }
}

///// Get last payment done date Start
function last_pay_date(){
  
  if (isset($_COOKIE["i35esda5asd"]) && isset($_COOKIE["p35edasdd785easd"]) && isset($_COOKIE["t35e6and45easn"])) {
    $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $id = $_COOKIE["i35esda5asd"];
    
    $select_it = "SELECT * FROM users_due WHERE due_user_id = '$id' && due_paid_list = 'spe_due' ORDER BY id DESC LIMIT 1 ";
    $run_select_it = mysqli_query($connect, $select_it);
    if ($run_select_it == true && mysqli_num_rows($run_select_it) === 1) {
      while($get_last_date = mysqli_fetch_array($run_select_it)){
        $last_date = $get_last_date["sold_date"];

        return $last_payment_day = day_ago($last_date);
        
      }
    }else{
      return $last_payment_day = '-- / -- / --';
    }
  }
}