<?php

include "../config/db.php";

////// Creating New Client Start
if (isset($_POST["c_1"]) && isset($_POST["c_2"]) && isset($_POST["c_3"]) && isset($_POST["c_4"]) && isset($_FILES["c_5"]) && isset($_POST["c_6"]) && isset($_POST["c_7"]) && isset($_POST["c_address"])) {
  sleep(1);
  $c_1 = trim(htmlspecialchars(str_replace("'", "\'", $_POST["c_1"])), ' ');
  $c_2 = trim(htmlspecialchars(str_replace("'", "\'", $_POST["c_2"])), ' ');
  $c_3 = trim($_POST["c_3"], ' ');
  $c_4 = trim(htmlspecialchars(str_replace("'", "\'", $_POST["c_4"])), ' ');
  $c_6 = trim(htmlspecialchars(str_replace("'", "\'", $_POST["c_6"])), ' ');
  $c_7 = trim(htmlspecialchars(str_replace("'", "\'", $_POST["c_7"])), ' ');
  $c_address = trim(htmlspecialchars(str_replace("'", "\'", $_POST["c_address"])), ' ');

  $encript_pass = md5(sha1(sha1(md5($c_7))));
  $token = md5(sha1(sha1(md5($c_6.$c_7))));


  $c_5 = $_FILES["c_5"];
  
  if ($c_5["name"] != '') {
    $fileName = $_FILES["c_5"]["name"];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
  
    $new_name = uniqid().'.'. $ext ;
    $path = "../users_photo/". $new_name;
    move_uploaded_file($_FILES["c_5"]["tmp_name"], $path);
    $final_img = $new_name;
  }else{
    $final_img = '';
  }

  $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

  $now = $dt->format('Y-m-d H:i:s');
  $time   = strtotime($now);
  $time   = $time - (60*(60*13)); //one hour
  $beforeOneHour = date("Y-m-d H:i:s", $time); // Our Local Correct Time
  
  $date = $beforeOneHour;

  $check_username = "SELECT * FROM users WHERE user_username = '$c_6' ";
  $run_check = mysqli_query($connect, $check_username);

  $check_username_owner = "SELECT * FROM `owner` WHERE owner_username = '$c_6' ";
  $run_check_owner = mysqli_query($connect, $check_username_owner);


  if ($run_check == true && $run_check_owner == true) {
    if (mysqli_num_rows($run_check) === 0 && mysqli_num_rows($run_check_owner) === 0) {
      

      $insert = "INSERT INTO users (`user_name`,`user_phone`, `user_gender`, `user_email`, `user_image`, `user_username`, `user_password`, `user_token`, `user_joined`, `user_address`) VALUES ('$c_1', '$c_2', '$c_3', '$c_4', '$final_img', '$c_6', '$encript_pass', '$token', '$date', '$c_address')";


      $run = mysqli_query($connect, $insert);

      $select = mysqli_query($connect, "SELECT * FROM users ORDER BY id DESC LIMIT 1");
      $fetch = mysqli_fetch_array($select);

      if ($run == true) {
        echo "yes";
        owner_notification('New Client Created', 'created a new client.<br/> <span class="cstm_bold">Client name: '.$c_1.'</span><br/><span class="view_pro_frm_noti" onclick="go_to_profile('.$fetch["id"].')">View Profile</span> ', '', 'ow');
      }else{
        echo"no";
      }
  }else{
    echo "user_exist";
  }
}
}
////// Creating New Client End



////// Creating New Admin Start
if (isset($_POST["admin_name"]) && isset($_POST["admin_gender"]) && isset($_POST["admin_email"]) && isset($_FILES["admin_pic"]) && isset($_POST["admin_username"]) && isset($_POST["admin_password"])) {
  sleep(1);
  $admin_name = trim(htmlspecialchars(str_replace("'", "\'", $_POST["admin_name"])), ' ');
  $admin_gender = trim(htmlspecialchars(str_replace("'", "\'", $_POST["admin_gender"])), ' ');
  $admin_email = trim($_POST["admin_email"], ' ');
  $admin_username = trim(htmlspecialchars(str_replace("'", "\'", $_POST["admin_username"])), ' ');
  $admin_password = trim(htmlspecialchars(str_replace("'", "\'", $_POST["admin_password"])), ' ');

  $encript_pass = md5(sha1(sha1(md5($admin_password))));
  $token = md5(sha1(sha1(md5($admin_username.$admin_password))));


  $admin_pic = $_FILES["admin_pic"];
  
  if ($admin_pic["name"] != '') {
    $fileName = $_FILES["admin_pic"]["name"];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
  
    $new_name = uniqid().'.'. $ext ;
    $path = "../users_photo/". $new_name;
    move_uploaded_file($_FILES["admin_pic"]["tmp_name"], $path);
    $final_img = $new_name;
  }else{
    $final_img = '';
  }

  if ($admin_email != '') {
    $two_step = "on";
  }else{
    $two_step = "off";
  }

  $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

  $now = $dt->format('Y-m-d H:i:s');
  $time   = strtotime($now);
  $time   = $time - (60*60); //one hour
  $beforeOneHour = date("Y-m-d H:i:s", $time); // Our Local Correct Time
  
  $date = $beforeOneHour;

  $check_username = "SELECT * FROM `owner` WHERE owner_username = '$admin_username' ";
  $run_check = mysqli_query($connect, $check_username);

  
  $check_username_owner = "SELECT * FROM users WHERE user_username = '$admin_username' ";
  $run_check_owner = mysqli_query($connect, $check_username_owner);


  if ($run_check == true && $run_check_owner == true) {
    if (mysqli_num_rows($run_check) === 0 && mysqli_num_rows($run_check_owner) === 0) {
      
      $insert = "INSERT INTO `owner` (`owner_name`, `owner_gender`, `owner_email`, `owner_image`, `owner_username`, `owner_password`, `owner_token`, `owner_joined`, `owner_two_step`) VALUES ('$admin_name', '$admin_gender', '$admin_email', '$final_img', '$admin_username', '$encript_pass', '$token', '$date', '$two_step')";

      $run = mysqli_query($connect, $insert);
      if ($run == true) {
        echo "yes";
      }else{
        echo"no";
      }
  }else{
    echo "owner_exist";
  }
}
}
////// Creating New Admin End


/////// Creating Client Due List Start

if (isset($_POST["f_1"]) && isset($_POST["f_2"]) && isset($_POST["f_3"]) && $_POST["f_4"]) {
  //sleep(1);
  $f_1 = htmlspecialchars(str_replace("'", "\'", $_POST["f_1"]));
  $f_2 = htmlspecialchars(str_replace("'", "\'", $_POST["f_2"]));
  $f_3 = htmlspecialchars(str_replace("'", "\'", $_POST["f_3"]));
  $f_4 = $_POST["f_4"];


  $slod_by = "Ex_saymon"; // Here will be the active User Real Name. I will be from the cookie.

  $due_status = "due";

  $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

  $now = $dt->format('Y-m-d H:i:s');
  $time   = strtotime($now);
  $time   = $time - (60*(60*13)); //one hour
  $beforeOneHour = date("Y-m-d H:i:s", $time); // Our Local Correct Time
  
  $date = $beforeOneHour;

  // Due Only Month
  $dot = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

  $now_dot = $dot->format('Y-m-d H:i:s');
  $time_dot   = strtotime($now_dot);
  $time_dot   = $time_dot - (60*(60*13)); //one hour
  $beforeOneHour_dot = date("m-Y", $time_dot); // Our Local Correct Time
  $todays = date("Y-m-d", $time_dot); // Todays
  
  $date_dot = $beforeOneHour_dot;

  $insert = "INSERT INTO users_due (`product_name`, `product_price`, `sold_date`, `sold_by`, `due_user_id`, `due_status`, `due_note`, `due_month_name` , `todays_collection`) VALUES ('$f_1', '$f_2', '$date', '$slod_by', '$f_4', '$due_status', '$f_3', '$date_dot', '$todays') ";
  $run = mysqli_query($connect, $insert);
  if ($run == true) {
    echo "yes";
    
    $select = mysqli_query($connect, "SELECT * FROM users WHERE id = '$f_4' ");
    $fetch = mysqli_fetch_array($select);
    $u_n = $fetch["user_name"];
    owner_notification('Inserted New List', 'inserted a new list on <span class="cstm_bold">'.$u_n.'’s</span> profile. <br/> <span class="cstm_bold">List name: '.$f_1.'</span><br/> <span class="cstm_bold">List price: '.$f_2.'</span>', '', 'ow');

  }else{
    echo "no";
  }

}


/////// Creating Client Due List End




//////////////// Verify Otp Start //////////////////

if (isset($_POST["email_is"]) && isset($_POST["username_is"]) && isset($_POST["submiting_otp"]) && $_POST["re_type"]) {
  sleep(1);
  $username_is = $_POST["username_is"];
  $email_is = $_POST["email_is"];
  $code = $_POST["submiting_otp"];
  $re_type = $_POST["re_type"];

  if ($re_type == 'ow') {
    $check = "SELECT * FROM `owner` WHERE owner_username = '$username_is'&& owner_email = '$email_is' && owner_otp = '$code' ";
    $run = mysqli_query($connect, $check);
    
    if ($run == true) {
      if (mysqli_num_rows($run) == 1) {
        $update = "UPDATE `owner` SET owner_otp = '' WHERE owner_username = '$username_is' && owner_email = '$email_is'";
        $run_update = mysqli_query($connect, $update);
        if ($run_update == true) {
          echo "yes";
        }else{
          echo "no";
        }
      }else{
        echo 'wrong';
      }
  
    }else{
      echo 'no';
    }
  }else if($re_type == 'us'){
    $check = "SELECT * FROM users WHERE user_username = '$username_is'&& user_email = '$email_is' && user_otp = '$code' ";
    $run = mysqli_query($connect, $check);
    
    if ($run == true) {
      if (mysqli_num_rows($run) == 1) {
        $update = "UPDATE users SET user_otp = '' WHERE user_username = '$username_is' && user_email = '$email_is'";
        $run_update = mysqli_query($connect, $update);
        if ($run_update == true) {
          echo "yes";
        }else{
          echo "no";
        }
      }else{
        echo 'wrong';
      }
  
    }else{
      echo 'no';
    }
  }else{
    echo 'no';
  }

}

//////////////// Verify Otp End ////////////////////

function owner_notification($title, $desc, $type, $from){

  $id = $_COOKIE["iasasaddffsfd"];
  $pass = $_COOKIE["psasgsfsafsgdsad"];
  $token = $_COOKIE["toawasnsdeaden"];
  $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

  $now = $dt->format('Y-m-d H:i:s');
  $time   = strtotime($now);
  $time   = $time - (60*(60*13)); //one hour
  $time_is = date("Y-m-d H:i:s", $time); // Our Local Correct Time


  $get = "SELECT * FROM `owner` WHERE id = '$id' && owner_password = '$pass' && owner_token = '$token'";
  $run_get = mysqli_query($connect, $get);
  if ($run_get == true && mysqli_num_rows($run_get) === 1) {
    while($get_data = mysqli_fetch_array($run_get)){

      $id_ow = $get_data['id'];
      $name = $get_data['owner_name'];

      $final_desc = $name.' '.$desc;

      if ($type == '') {
        $final_type = 'null';
      }else{
        $final_type = $type;
      }

      $insert = "INSERT INTO owner_notification (`n_title`, `n_desc`, `n_time`, `n_type`, `n_seen`, `n_image`, `n_from`) VALUES ('$title', '$final_desc', '$time_is', '$final_type', 'unseen', '$id_ow', '$from')";

      $run_insert = mysqli_query($connect, $insert);

    }
  }

}

///////// User Payment Start

if (isset($_POST["user_pay_is"]) && isset($_POST["user_total_due"]) && isset($_POST["user_pay_id_is"])) {
  sleep(1);
  $user_pay_is = $_POST["user_pay_is"];
  $user_total_due = $_POST["user_total_due"];
  $user_pay_id_is = $_POST["user_pay_id_is"];


  $slod_by = "Ex_saymon"; // Here will be the active User Real Name. I will be from the cookie.


  $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

  $now = $dt->format('Y-m-d H:i:s');
  $time   = strtotime($now);
  $time   = $time - (60*(60*13)); //one hour
  $beforeOneHour = date("Y-m-d H:i:s", $time); // Our Local Correct Time
  
  $date = $beforeOneHour;

  // Due Only Month
  $dot = new DateTime("now", new DateTimeZone('Asia/Dhaka'));
  
  $now_dot = $dot->format('Y-m-d H:i:s');
  $time_dot   = strtotime($now_dot);
  $time_dot   = $time_dot - (60*(60*13)); //one hour
  $beforeOneHour_dot = date("m-Y", $time_dot); // Our Local Correct Time
  $todays = date("Y-m-d", $time_dot); // Todays
  
  $date_dot = $beforeOneHour_dot;

  
  $update_all_due = "UPDATE `users_due` SET due_status = 'paid' WHERE due_user_id = '$user_pay_id_is'";
  $run_update_all_due = mysqli_query($connect, $update_all_due);
  if ($run_update_all_due == true) {

    $insert_total = "INSERT INTO users_due (`product_name`, `product_price`, `sold_date`, `sold_by`, `due_user_id`, `due_status`, `due_note`, `due_month_name`, `due_paid_list`, `todays_collection`) VALUES ('Total due', '$user_total_due', '$date', '$slod_by', '$user_pay_id_is', 'total_due', '', '$date_dot', 'spe_total', '$todays') ";
    $run_total = mysqli_query($connect, $insert_total);
    if ($run_total == true) {

      $insert_pay = "INSERT INTO users_due (`product_name`, `product_price`, `sold_date`, `sold_by`, `due_user_id`, `due_status`, `due_note`, `due_month_name`, `due_paid_list`, `todays_collection`) VALUES ('Pay amount', '$user_pay_is', '$date', '$slod_by', '$user_pay_id_is', 'pay_amount', '', '$date_dot', 'spe_pay', '$todays') ";
      $run_pay = mysqli_query($connect, $insert_pay);

      if ($run_pay == true) {

        $due_iss = ($user_total_due*1 - $user_pay_is*1);
        $insert_due = "INSERT INTO users_due (`product_name`, `product_price`, `sold_date`, `sold_by`, `due_user_id`, `due_status`, `due_note`, `due_month_name`, `due_paid_list`, `todays_collection`) VALUES ('Due amount', '$due_iss', '$date', '$slod_by', '$user_pay_id_is', 'due', '', '$date_dot', 'spe_due', '$todays') ";
        $run_due = mysqli_query($connect, $insert_due);
        if ($run_due == true) {
          echo 'yes';

          $select = mysqli_query($connect, "SELECT * FROM users WHERE id = '$user_pay_id_is' ");
          $fetch = mysqli_fetch_array($select);
          owner_notification('Payment Received', 'received a payment.
          <br/>
          <span class="cstm_bold">Client name: '.$fetch["user_name"].'</span>
          <br/>
          <span class="cstm_bold">Payment amount: '.$user_pay_is.' tk</span>', 'unblocked', 'ow');

        }

      }else{
        echo 'no';
      }

    }else{
      echo 'no';
    }
              
  }else{
    echo 'no';
  }


}

///////// User Payment End



if (isset($_POST["main_wrd"]) && isset($_POST["related_wrd"])) {
  sleep(1);
  $mn_wrd = str_replace("'", "\'",  $_POST["main_wrd"]);
  $rl_wrd = str_replace("'", "\'",  $_POST["related_wrd"]);
  

  $insert = mysqli_query($connect, "INSERT INTO sgst_word (`main_sgst`,`related_sgst`) VALUES ('$mn_wrd','$rl_wrd') ");
  if ($insert == true) {
     $select_last = "SELECT * FROM sgst_word ORDER BY id DESC LIMIT 1";
     $run_last = mysqli_query($connect, $select_last);
     if ($run_last == true) {
        while($e = mysqli_fetch_array($run_last)){

           $main_wrd = $e["main_sgst"];
           $rela_wrd = $e["related_sgst"];
           $sgst_id = $e["id"];

           echo $result = '
           <div class="single_suggested_list_wrap find_sgst_row_id_'.$sgst_id.'">
            <div class="main_word_wrap">
              <p>'.$main_wrd.'</p>
            </div>
            <div class="related_word_wrap text-center">
              <p>'.$rela_wrd.'</p>
            </div>
            <div class="actions_wrap text-right">
              <span class="cstm_relative sgst_edit_spn" onclick="update_sgst_list('.$sgst_id.')">Edit</span> |
              <span class="cstm_relative sgst_dlt_spn"  data-deletesgst = "'.$sgst_id.'" >Delete</span>
            </div>
          </div>';
           
        }
     }
  }else{
     echo "no";
  }
}



?>