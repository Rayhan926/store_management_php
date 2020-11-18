<?php
include "../config/db.php";

/////////// Deleting User Start ////////////

if (isset($_POST["usr_delete_id"])) {
  $usr_delete_id = $_POST["usr_delete_id"];
  $delete_due_list = "DELETE FROM users_due WHERE due_user_id = '$usr_delete_id' ";
  $run_top = mysqli_query($connect, $delete_due_list);
  if ($run_top == true) {

    $select = mysqli_query($connect, "SELECT * FROM users WHERE id = '$usr_delete_id' ");
    $fetch = mysqli_fetch_array($select);
    owner_notification('Client Deleted', 'deleted a client.<br/> <span class="cstm_bold">Client name was: '.$fetch["user_name"].'</span><br/>', 'deleted', 'ow');

    $delete = "DELETE FROM users WHERE id = '$usr_delete_id' ";
    $run = mysqli_query($connect, $delete);
    if ($run == true) {
      echo "yes";
    }else{
      echo 'no';
    }
  }
}


if (isset($_POST["check_id"])) {
  $check_id = $_POST["check_id"];
  $delete_due_list = "DELETE FROM users_DUE WHERE due_user_id = '$check_id' ";
  $run_top = mysqli_query($connect, $delete_due_list);
  if ($run_top == true) {
    $delete = "DELETE FROM users WHERE id = '$check_id' ";
    $run = mysqli_query($connect, $delete);
    if ($run == true) {
      echo "yes";
    }else{
      echo 'no';
    }
  }
}


/////////// Deleting User End ////////////

/////////// Deleting Admin Start ////////////

if (isset($_POST["admin_delete_id"])) {
  $admin_delete_id = $_POST["admin_delete_id"];
  $delete = "DELETE FROM `owner` WHERE id = '$admin_delete_id' ";
  $run = mysqli_query($connect, $delete);
  if ($run == true) {
    echo "yes";
  }else{
    echo 'no';
  }
}

//////////// Delete Admin End ///////////////

/////////// Deleting Single Due list Start ////////////

if (isset($_POST["due_dlt_id"])) {
  $due_dlt_id = $_POST["due_dlt_id"];
  $delete = "DELETE FROM `users_due` WHERE id = '$due_dlt_id' ";

  $select = mysqli_query($connect, "SELECT * FROM users_due WHERE id = '$due_dlt_id' ");
  $fetch = mysqli_fetch_array($select);
  $s_u_name = $fetch["due_user_id"];
  $p_u_n = $fetch["product_name"];
  $p_u_p = $fetch["product_price"];

  $select_u = mysqli_query($connect, "SELECT * FROM users WHERE id = '$s_u_name' ");
  $fetch_u = mysqli_fetch_array($select_u);

  owner_notification('Deleted A List', 'deleted a list from <span class="cstm_bold">'.$fetch_u["user_name"].'’s</span> profile. <br/> <span class="cstm_bold">List name was: '.$p_u_n.'</span><br/> <span class="cstm_bold">List price was: '.$p_u_p.'</span>', 'deleted', 'ow');

  $run = mysqli_query($connect, $delete);
  if ($run == true) {
    echo "yes";
  }else{
    echo 'no';
  }
}

//////////// Delete Single Due list End ///////////////

/////////// Deleting  All Notification  Start ////////////

if (isset($_POST["dtl_all_noti"])) {
  sleep(1);
  $dtl_all_noti = $_POST["dtl_all_noti"];
  $delete = "DELETE FROM `$dtl_all_noti` ";
  $run = mysqli_query($connect, $delete);
  if ($run == true) {
    echo 'yes';
  }else{
    echo 'no';
  }
}

//////////// Delete  All Notification End ///////////////


/////////// Remove Single Notification Start


if (isset($_POST["rem_si_noti"])) {
  
  sleep(1);
  $rem_si_noti = $_POST["rem_si_noti"];
  $delete = "DELETE FROM `owner_notification` WHERE id = $rem_si_noti ";
  $run = mysqli_query($connect, $delete);
  if ($run == true) {
    echo 'yes';
  }else{
    echo 'no';
  }
}

/////////// Remove Single Notification End




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


if (isset($_POST["sgst_dlt_id"])) {
  sleep(1);
  $sgst_dlt_id = $_POST["sgst_dlt_id"];
  $delete = "DELETE FROM sgst_word WHERE id = '$sgst_dlt_id' ";
  $run = mysqli_query($connect, $delete);
  if ($run == true) {
     echo "yes";
  }else{
     echo "no";
  }
}





?>