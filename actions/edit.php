<?php
include "../config/db.php";
include "../functions.php";

////// Edit Client Start
if (isset($_POST["c_1_edit"]) && isset($_POST["c_2_edit"]) && isset($_POST["c_3_edit"]) && isset($_POST["c_4_edit"]) && isset($_FILES["c_5_edit"]) && isset($_POST["curnt_pic_path"]) && isset($_POST["user_edit_id"]) && isset($_POST["c_address_edit"])) {
  sleep(1);
  $c_1_edit = trim(htmlspecialchars(str_replace("'", "\'", $_POST["c_1_edit"])). ' ');
  $c_2_edit = trim(htmlspecialchars(str_replace("'", "\'", $_POST["c_2_edit"])), ' ');
  $c_3_edit = trim($_POST["c_3_edit"], ' ');
  $curnt_pic_path = trim($_POST["curnt_pic_path"], ' ');
  $user_edit_id = trim($_POST["user_edit_id"], ' ');
  $c_address_edit = trim(htmlspecialchars(str_replace("'", "\'", $_POST["c_address_edit"])), ' ');
  $c_4_edit = trim(htmlspecialchars(str_replace("'", "\'", $_POST["c_4_edit"])), ' ');
  $c_5_edit = $_FILES["c_5_edit"];

  if ($c_5_edit["name"] != '') {
    $fileName = $c_5_edit["name"];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
  
    $new_name = uniqid().'.'. $ext ;
    $path = "../users_photo/". $new_name;
    move_uploaded_file($c_5_edit["tmp_name"], $path);
    $img_path = $new_name;

  }else{
    $img_path = $curnt_pic_path;
  }

  if ($curnt_pic_path != '' && $c_5_edit["name"] != '') {
    unlink("../users_photo/$curnt_pic_path");
  }


  $update = "UPDATE users SET `user_name` = '$c_1_edit', `user_phone` = '$c_2_edit', `user_gender` = '$c_3_edit', `user_address` = '$c_address_edit', `user_email` = '$c_4_edit', `user_image` = '$img_path' WHERE id = '$user_edit_id' ";


    $select = mysqli_query($connect, "SELECT * FROM users WHERE id = '$user_edit_id' ");
    $fetch = mysqli_fetch_array($select);

    if ($fetch["user_name"] != $c_1_edit) {
      $n_li = '';
    }else{
      $n_li = 'd-none';
    }

    if ($fetch["user_phone"] != $c_2_edit) {
      $p_li = '';
    }else{
      $p_li = 'd-none';
    }

    if ($fetch["user_gender"] != $c_3_edit) {
      $g_li = '';
    }else{
      $g_li = 'd-none';
    }

    if ($fetch["user_address"] != $c_address_edit) {
      $a_li = '';
    }else{
      $a_li = 'd-none';
    }

    if ($fetch["user_email"] != $c_4_edit) {
      if ($fetch["user_email"] == '') {
        $emp_emil = '- - -';
      }else{
        $emp_emil = $fetch["user_email"];
      }
      if ($c_4_edit == '') {
        $em_c_email = '- - -';
      }else{
        $em_c_email = $c_4_edit;
      }
      $e_li = '';
    }else{
      $e_li = 'd-none';
      $emp_emil = '';
      $em_c_email = '';
    }

    owner_notification(
    'User Info Updated',
    'updated a client information.<br/>
    <span class="cstm_bold">Client name: <span onclick="go_to_profile('.$fetch["id"].')" class="span_user_line">'.$fetch["user_name"].'</span></span>
    <ul class="notification_ul">
      <li class="'.$n_li.'">Name: '.$fetch["user_name"]. '<i class="fas fa-exchange-alt"></i>' .$c_1_edit.'</li>
      <li class="'.$p_li.'">Phone: '.$fetch["user_phone"]. '<i class="fas fa-exchange-alt"></i>' .$c_2_edit.'</li>
      <li class="'.$g_li.'">Gender: '.$fetch["user_gender"]. '<i class="fas fa-exchange-alt"></i>' .$c_3_edit.'</li>
      <li class="'.$a_li.'">Address: '.$fetch["user_address"]. '<i class="fas fa-exchange-alt"></i>' .$c_address_edit.'</li>
      <li class="'.$e_li.'">Email: '.$emp_emil. '<i class="fas fa-exchange-alt"></i>' .$em_c_email.'</li>
    </ul>',
   '', 'ow');


  $run = mysqli_query($connect, $update);
  if ($run == true) {

    echo "yes";
  }else{
    echo "no";
  }




}

////// Edit Client End




////// Edit Admin Start
if (isset($_POST["admn_1_edit"])  && isset($_POST["admn_3_edit"]) && isset($_POST["admn_4_edit"]) && isset($_FILES["admn_5_edit"]) && isset($_POST["curnt_pic_path_admn"]) && isset($_POST["admn_edit_id"])) {
  sleep(1);
  $admn_1_edit = trim(htmlspecialchars(str_replace("'", "\'", $_POST["admn_1_edit"])), ' ');
  $admn_3_edit = trim($_POST["admn_3_edit"], ' ');
  $curnt_pic_path_admn = trim($_POST["curnt_pic_path_admn"], ' ');
  $admn_edit_id = trim($_POST["admn_edit_id"], ' ');
  $admn_4_edit = trim(htmlspecialchars(str_replace("'", "\'", $_POST["admn_4_edit"])), ' ');
  $admn_5_edit = $_FILES["admn_5_edit"];

  if ($admn_5_edit["name"] != '') {
    $fileName = $admn_5_edit["name"];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
  
    $new_name = uniqid().'.'. $ext ;
    $path = "../users_photo/". $new_name;
    move_uploaded_file($admn_5_edit["tmp_name"], $path);
    $img_path = $new_name;

  }else{
    $img_path = $curnt_pic_path_admn;
  }

  if ($curnt_pic_path_admn != '' && $admn_5_edit["name"] != '') {
    unlink("../users_photo/$curnt_pic_path_admn");
  }


  $update = "UPDATE `owner` SET `owner_name` = '$admn_1_edit', `owner_gender` = '$admn_3_edit', `owner_email` = '$admn_4_edit', `owner_image` = '$img_path' WHERE id = '$admn_edit_id' ";
  $run = mysqli_query($connect, $update);
  if ($run == true) {
    echo "yes";
  }else{
    echo "no";
  }




}

////// Edit Admin End



/// Block User Start
if (isset($_POST["block_id"])) {
  sleep(1);
  $block_id = $_POST["block_id"];
  $update = "UPDATE users SET user_action = 'block' WHERE id = '$block_id'";
  $run = mysqli_query($connect, $update);
  if ($run == true) {

    $select = mysqli_query($connect, "SELECT * FROM users WHERE id = '$block_id' ");
    $fetch = mysqli_fetch_array($select);
    owner_notification('Client Blocked', 'blocked a client.<br/> <span class="cstm_bold">Client name: '.$fetch["user_name"].'</span><br/>', 'blocked', 'ow');

    echo "yes";
  }else{
    echo "no";
  }
}
/// Block User End

/////// User Block By Check Box Start

if (isset($_POST["check_id"])) {
  $check_id = $_POST["check_id"];

  $update = "UPDATE users SET user_action = 'block' WHERE id = '$check_id'";
  $run = mysqli_query($connect, $update);
  if ($run == true) {
    echo "yes";
  }else{
    echo "no";
  }

}

/////// User Block By Check Box End

/// Unblock User Start
if (isset($_POST["unblock_id"])) {
  sleep(1);
  $unblock_id = $_POST["unblock_id"];
  $update = "UPDATE users SET user_action = 'unblock' WHERE id = '$unblock_id'";
  $run = mysqli_query($connect, $update);
  if ($run == true) {
    
    $select = mysqli_query($connect, "SELECT * FROM users WHERE id = '$unblock_id' ");
    $fetch = mysqli_fetch_array($select);
    owner_notification('Client Unblocked', 'unblocked a client.<br/> <span class="cstm_bold">Client name: '.$fetch["user_name"].'</span><br/>', 'unblocked', 'ow');

    echo "yes";
  }else{
    echo "no";
  }
}
/// Unblock User End

// User password Change Start

if (isset($_POST["id"]) && isset($_POST["new_pass"]) && isset($_POST["usr_name"])) {
  sleep(1);
  $id = $_POST["id"];
  $new_pass = $_POST["new_pass"];
  $usr_name = $_POST["usr_name"];

  $encript_pass = md5(sha1(sha1(md5($new_pass))));
  $token = md5(sha1(sha1(md5($usr_name.$new_pass))));

  $update = "UPDATE users SET user_password = '$encript_pass', user_token = '$token' WHERE id = '$id'";
  $run = mysqli_query($connect, $update);
  if ($run == true) {

    $select = mysqli_query($connect, "SELECT * FROM users WHERE id = '$id' ");
    $fetch = mysqli_fetch_array($select);
    owner_notification('Password Changed', 'changed a client password.<br/> <span class="cstm_bold">Client name: '.$fetch["user_name"].'</span><br/>', '', 'ow');

    echo "yes";
  }else{
    echo "no";
  }

}

// User password Change End


//////////// Edit Single Due list Start /////////////////

if (isset($_POST["e_p_name"]) && isset($_POST["e_p_price"]) && isset($_POST["e_p_note"]) && isset($_POST["e_p_id"])) {
  
  sleep(1);
  $e_p_name = trim(htmlspecialchars(str_replace("'", "\'", $_POST["e_p_name"])), ' ');
  $e_p_note = trim(htmlspecialchars(str_replace("'", "\'", $_POST["e_p_note"])), ' ');
  $e_p_price = trim($_POST["e_p_price"], ' ');
  $e_p_id = trim($_POST["e_p_id"], ' ');

  $update = "UPDATE users_due SET product_name = '$e_p_name', product_price = '$e_p_price' , due_note = '$e_p_note' WHERE id = '$e_p_id'";
  $run = mysqli_query($connect, $update);
  if ($run == true) {
    echo "yes";
  }else{
    echo "no";
  }




}

//////////// Edit Single Due list End /////////////////


////////////// Creating Otp Start ////////////////////

if (isset($_POST["otp_email"]) && isset($_POST["otp_user"]) && isset($_POST["re_type"])) {
  sleep(1);
  $otp_user = $_POST["otp_user"];
  $otp_email = $_POST["otp_email"];
  $re_type = $_POST["re_type"];
  $otp_code = rand(111111,999999);

  if ($re_type == 'ow') {
    $update = "UPDATE `owner` SET owner_otp = '$otp_code' WHERE owner_username = '$otp_user' && owner_email = '$otp_email' ";
    $run = mysqli_query($connect, $update);
    if ($run == true) {
      echo $otp_code;
    }else{
      echo "no";
    }
  }else if($re_type == 'us'){
    $update = "UPDATE users SET user_otp = '$otp_code' WHERE user_username = '$otp_user' && user_email = '$otp_email' ";
    $run = mysqli_query($connect, $update);
    if ($run == true) {
      echo $otp_code;
    }else{
      echo "no";
    }
  }else{
    echo 'no';
  }

}

////////////// Creating Otp End ////////////////////



// User password Reset Start

if (isset($_POST["auth_user"]) && isset($_POST["auth_email"]) && isset($_POST["new_pass"]) && isset($_POST["log_in_me"]) && isset($_POST["re_type"])) {
  sleep(1);
  $auth_user = $_POST["auth_user"];
  $auth_email = $_POST["auth_email"];
  $new_pass = $_POST["new_pass"];
  $log_in_me = $_POST["log_in_me"];
  $re_type = $_POST["re_type"];

  $encript_pass = md5(sha1(sha1(md5($new_pass))));
  $token = md5(sha1(sha1(md5($auth_user.$new_pass))));

  if ($re_type == 'ow') {
    $select = "SELECT * FROM `owner` WHERE owner_username = '$auth_user' && owner_email = '$auth_email' ";
    $run_select = mysqli_query($connect, $select);
    if ($run_select == true) {
      while($get_id = mysqli_fetch_array($run_select)){
        $real_id_is = $get_id["id"];
      }
    }else{
      echo 'no';
    }
  
    $update = "UPDATE `owner` SET owner_password = '$encript_pass', owner_token = '$token' WHERE owner_username = '$auth_user' && owner_email = '$auth_email' ";
    $run = mysqli_query($connect, $update);
    if ($run == true) {
      if ($log_in_me == 'yes') {

        $select_chekc = "SELECT * FROM `owner` WHERE owner_username = '$auth_user' && owner_email = '$auth_email' && owner_password = '$encript_pass'";
        $run_select_chekc = mysqli_query($connect, $select_chekc);
        if ($run_select_chekc == true && mysqli_num_rows($run_select_chekc) === 1) {
          while($fetch = mysqli_fetch_array($run_select_chekc)){
            if ($fetch['owner_two_step'] == 'on') {

              $otp_code = rand(111111,999999);
              $update_otpp = "UPDATE `owner` SET owner_otp = '$otp_code' WHERE owner_username = '$auth_user' && owner_email = '$auth_email' ";
              $run_otpp = mysqli_query($connect, $update_otpp);
              if ($run_otpp == true) {
                //echo $otp_code;
                echo 'login_with_two_step';
              }else{
                echo "no";
              }
            }else{
              echo 'login_dash_yes';
            }
          }
        }else{
          echo 'no';
        }


        /*setcookie('toawasnsdeaden',$token,time()+(86400*15), '/', null, null, true);
        setcookie('psasgsfsafsgdsad',$encript_pass,time()+(86400*15), '/', null, null, true);
        setcookie('iasasaddffsfd',$real_id_is,time()+(86400*15), '/', null, null, true);*/
      }else{
        echo 'normal_yes';
      }
    }else{
      echo "no";
    }
  }else if($re_type == 'us'){
    $select = "SELECT * FROM users WHERE user_username = '$auth_user' && user_email = '$auth_email' ";
    $run_select = mysqli_query($connect, $select);
    if ($run_select == true) {
      while($get_id = mysqli_fetch_array($run_select)){
        $real_id_is = $get_id["id"];
      }
    }else{
      echo 'no';
    }
  
    $update = "UPDATE users SET user_password = '$encript_pass', user_token = '$token' WHERE user_username = '$auth_user' && user_email = '$auth_email' ";
    $run = mysqli_query($connect, $update);
    if ($run == true) {
      if ($log_in_me == 'yes') {
        setcookie('t35e6and45easn',$token,time()+(86400*15), '/', null, null, true);
        setcookie('p35edasdd785easd',$encript_pass,time()+(86400*15), '/', null, null, true);
        setcookie('i35esda5asd',$real_id_is,time()+(86400*15), '/', null, null, true);
        echo 'login_yes';
      }else{
        echo 'normal_yes';
      }
    }else{
      echo "no";
    }
  }else{
    echo 'no';
  }


}

// User password Reset End


//////////// Expiring Code Start 

/*
if (isset($_POST["expire_email"]) && isset($_POST["expire_user"])) {

  $expire_email = $_POST["expire_email"];
  $expire_user = $_POST["expire_user"];

  $update = "UPDATE users SET user_otp = '' WHERE user_username = '$expire_user' && user_email = '$expire_email' ";
  $run = mysqli_query($connect, $update);
  if ($run == true) {
    echo 'yes';
  }else{
    echo "no";
  }

}
*/

//////////// Expiring Code End 

/////////// Update Notification Unseen To Seen Start

if (isset($_POST["all_seen"])) {
  $all_seen = $_POST["all_seen"];

  $update = "UPDATE owner_notification SET n_seen = '$all_seen'";
  $run = mysqli_query($connect, $update);
  if ($run == true) {
    echo 'yes';
  }else{
    echo "no";
  }
}

/////////// Update Notification Unseen To Seen End

if (isset($_POST["pic_alert"])) {
  $pic_alert =$_POST["pic_alert"];
  setcookie('pic_alert',$pic_alert,time()+(86400*1));
}



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

//////////// Owner Profile Pic Changing Start

if (isset($_FILES["owner_pro_pic_inp"])) {
  sleep(1);
  $id = $_COOKIE["iasasaddffsfd"];
  $pass = $_COOKIE["psasgsfsafsgdsad"];
  $token = $_COOKIE["toawasnsdeaden"];

  $owner_pro_pic_inp = $_FILES["owner_pro_pic_inp"]["tmp_name"];
  $owner_pro_pic_name = $_FILES["owner_pro_pic_inp"]["name"];

  $ext = pathinfo($owner_pro_pic_name, PATHINFO_EXTENSION);

  $new_name = uniqid().'.'. $ext ;
  $path = "../users_photo/". $new_name;
  move_uploaded_file($owner_pro_pic_inp, $path);
  $final_img = $new_name;
  //  && owner_password = '$pass' && owner_token = '$token' 
  $update = "UPDATE `owner` SET owner_image = '$final_img' WHERE id = '$id' && owner_password = '$pass' && owner_token = '$token' ";
  $run = mysqli_query($connect, $update);
  if ($run == true) {
    echo 'yes';
  }else{
    echo 'no';
  }





}

//////////// Owner Profile Pic Changing End

/////// On Owner Two Step Start

if (isset($_POST["on_two_step"])) {
  sleep(1);
  $on_two_step = $_POST["on_two_step"];

  $id = $_COOKIE["iasasaddffsfd"];
  $pass = $_COOKIE["psasgsfsafsgdsad"];
  $token = $_COOKIE["toawasnsdeaden"];

  $update = "UPDATE `owner` SET owner_two_step = '$on_two_step' WHERE id = '$id' && owner_password = '$pass' && owner_token = '$token' ";
  $run = mysqli_query($connect, $update);
  if ($run == true) {
    echo 'yes';
  }else{
    echo 'no';
  }
}

/////// On Owner Two Step End

/////// Off Owner Two Step Start

if (isset($_POST["off_two_step"])) {
  sleep(1);
  $off_two_step = $_POST["off_two_step"];

  $id = $_COOKIE["iasasaddffsfd"];
  $pass = $_COOKIE["psasgsfsafsgdsad"];
  $token = $_COOKIE["toawasnsdeaden"];

  $update = "UPDATE `owner` SET owner_two_step = '$off_two_step' WHERE id = '$id' && owner_password = '$pass' && owner_token = '$token' ";
  $run = mysqli_query($connect, $update);
  if ($run == true) {
    echo 'yes';
  }else{
    echo 'no';
  }
}

/////// Off Owner Two Step End

/////// Store Secrect Code Start

if (isset($_POST["scrt_on"])) {
  sleep(1);
  $scrt_on = $_POST["scrt_on"];

  $update = "UPDATE `store_settings` SET setting_status = '$scrt_on' WHERE setting_name = 'store_code' ";
  $run = mysqli_query($connect, $update);
  if ($run == true) {
    echo 'yes';
  }else{
    echo 'no';
  }
}

if (isset($_POST["scrt_off"])) {
  sleep(1);
  $scrt_off = $_POST["scrt_off"];

  $update = "UPDATE `store_settings` SET setting_status = '$scrt_off' WHERE setting_name = 'store_code' ";
  $run = mysqli_query($connect, $update);
  if ($run == true) {
    echo 'yes';
  }else{
    echo 'no';
  }
}

/////// Store Secrect Code End


////// Owner Password Change Start

if (isset($_POST["pass_2"])) {
  sleep(1);
  $pass_2 = $_POST["pass_2"];

  $id = $_COOKIE["iasasaddffsfd"];
  $pass = $_COOKIE["psasgsfsafsgdsad"];
  $token = $_COOKIE["toawasnsdeaden"];

  $select = "SELECT * FROM `owner` WHERE id = '$id' && owner_password = '$pass' && owner_token = '$token' ";
    $run_select = mysqli_query($connect, $select);
    if ($run_select == true) {
      while($get_id = mysqli_fetch_array($run_select)){
        $userName = $get_id["owner_username"];


        $encript_pass_new = md5(sha1(sha1(md5($pass_2))));
        $token_new = md5(sha1(sha1(md5($userName.$pass_2))));

        $update = "UPDATE `owner` SET `owner_password` = '$encript_pass_new', `owner_token` = '$token_new' WHERE id = '$id' && owner_username = '$userName'  ";
        $run = mysqli_query($connect, $update);
        if ($run == true) {

          setcookie('toawasnsdeaden',$token_new,time()+(86400*15), '/', null, null, true);
          setcookie('psasgsfsafsgdsad',$encript_pass_new,time()+(86400*15), '/', null, null, true);

          echo "yes";
        }else{
          echo "no";
        }
      }
    }else{
      echo 'no';
    }
}

////// Owner Password Change End



if (isset($_POST["main_wrd_ed"]) && isset($_POST["related_wrd_ed"]) && isset($_POST["sgst_edit_id_n"])) {
  sleep(1);
  $main_wrd_ed = str_replace("'", "\'",  $_POST["main_wrd_ed"]);
  $related_wrd_ed = str_replace("'", "\'",  $_POST["related_wrd_ed"]);
  $sgst_edit_id_n = $_POST["sgst_edit_id_n"];

  $update = "UPDATE sgst_word SET main_sgst = '$main_wrd_ed', related_sgst = '$related_wrd_ed' WHERE id = '$sgst_edit_id_n' ";

  $run = mysqli_query($connect ,$update);
  
  if ($run == true) {
     echo "yes";
  }else{
     echo "no";
  }
}


?>