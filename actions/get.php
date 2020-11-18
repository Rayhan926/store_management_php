<?php
include "../config/db.php";
include "../functions.php";
//include '../profile_function.php';
//////////// Getting All Client Start ///////////////

if (isset($_POST["table_name"]) && isset($_POST["offset_row"])) {
  sleep(1);
  $table_name = $_POST["table_name"];
  $offset_row = $_POST["offset_row"];

  if ($offset_row != '') {
    $count_row_query = "SELECT * FROM users";
    $run_query = mysqli_query($connect, $count_row_query);
    if ($run_query == true) {
      $offset_row_is = mysqli_num_rows($run_query) - 1;
    }
  }else{
    $offset_row_is = 0;
  }

  $get = "SELECT * FROM users LIMIT  $offset_row_is , 18446744073709551615";
  $run = mysqli_query($connect, $get);
  if ($run == true) {
    if (mysqli_num_rows($run) >= 1) {
      while($data = mysqli_fetch_array($run)){

        

        $dt = new DateTime($data["user_joined"]);  
        $joined = $dt->format('d/m/Y');
         
        // Client Joined Day Ago
        $joined_day_ago = day_ago($data["user_joined"]);

        // Client Image
        if ($data["user_image"] == '') {
          if ($data["user_gender"] == "male") {
            $user_img = 'male.png';
          }else{
            $user_img = 'female.png';
          }
        }else{
          $user_img = $data["user_image"];
        }


        if ($data["user_action"] == "block") {
          $show_block_hide = "you_hide";
          $block_class = "";
        }else{
          $block_class = "d-none";
          $show_block_hide = "you_show";
        }

        if ($data["user_action"] == "unblock") {
          $show_unblock_hide = "you_hide";
        }else{
          $show_unblock_hide = "you_show";
        }
        $total_id = $data["id"];
        $select_total = "SELECT SUM(product_price) as total_due FROM users_due WHERE due_user_id = '$total_id' && due_status = 'due' ";
        $run_total = mysqli_query($connect, $select_total);
        if ($run_total == true) {
          if (mysqli_num_rows($run_total) >= 1) {
            while($totla_data = mysqli_fetch_array($run_total)){
              if ($totla_data['total_due'] > 0) {
                $user_total_due = $totla_data['total_due'];
              }else{
                $user_total_due = 0;
              }
            }
          }
        }

        ///// Get last payment done date Start
        $select_it = "SELECT * FROM users_due WHERE due_user_id = '$total_id' && due_paid_list = 'spe_due' ORDER BY id DESC LIMIT 1 ";
        $run_select_it = mysqli_query($connect, $select_it);
        if ($run_select_it == true && mysqli_num_rows($run_select_it) === 1) {
          while($get_last_date = mysqli_fetch_array($run_select_it)){
            $last_date = $get_last_date["sold_date"];

            $dt_dt = new DateTime($last_date);  
            $last_payment_date_is = $dt_dt->format('d/m/Y');
            $last_payment_day_hide = '';
            $last_payment_day = day_ago($last_date);
            
          }
        }else{
          $last_payment_day_hide = ' d-none';
          $last_payment_day = '- - -';
          $last_payment_date_is = '-- / -- / --';
        }

        ///// Get last payment done date End

        $get_data = '
        <!-- Single Client List Start -->
      <div class="cstm_col from_bottom">
        <div class="single_client_list client_row_id_'.$data["id"].'">
          <div class="mobile_view_more_info_wrap">
            <div class="close_mob_vie_more_wrap"  onclick="close_view_more_user('.$data["id"].')">
              <i class="fas fa-times"></i>
            </div>
            <ul>
              <li>
                <span class="title_mobile_more_info">Total Due:</span>
                <span class="info_span_small mob_totl_du">'.$user_total_due.' tk</span>
              </li>
              <li>
                <span class="title_mobile_more_info">Last Payment</span>
                <span class="info_span_small mob_lst_py_dt"> '.$last_payment_date_is.' </span> 
                <span class="title_v_sml_day_ago mob_lst_py_day_ago">'.$last_payment_day.'</span>
              </li>
              <li>
                <span class="title_mobile_more_info">Joined</span>
                <span class="info_span_small mob_join_day"> '.$joined.' 
                  <span class="title_v_sml_day_ago mob_join_day_ago">'.$joined_day_ago.'</span> 
                </span>
              </li>
            </ul>
          </div>
          <div class="cstommer_block_tol_wrap '.$block_class.'">
            <p class="m-0">Blocked</p>
          </div>
          <div class="client_details_img_name">
          <div class="client_list_img">
          <img src="./users_photo/'.$user_img.'" alt="Client_img" class="img_w_100">
          <input type="checkbox" class="action_list_chekcbox d-none" value="'.$data["id"].'">
            <div class="selected_icon_wrap">
              <img src="./img/check_icon.png"/>
            </div>
            </div>
            <div class="client_info">
              <h4>'.$data["user_name"].'</h4>
              <p>'.$data["user_address"].'</p>
            </div>
          </div>
          <div class="client_total_due_body h_grid">
            <span>'.$user_total_due.' tk</span>
          </div>
          <div class="client_last_pay_body h_grid">
            <span class="c_l_pay_date">'.$last_payment_date_is.'</span>
            <span class="client_list_days_ago_sapn c_l_pay_day'.$last_payment_day_hide.'">'.$last_payment_day.'</span>
            </div>
            <div class="client_joined_body h_grid">
            <span>'.$joined.'</span>
            <span class="client_list_days_ago_sapn">'.$joined_day_ago.'</span>
          </div>
          <div class="client_goto_profile h_list text-center">
            <span class="cstm_btn view_profile_span_button" onclick="go_to_profile('.$data["id"].')" >View Profile</span>
          </div>

          <div class="single_client_more_actions_wrap">
            <i class="fas fa-ellipsis-v flex_all"></i>
            <ul class="single_client_more_action_ul">
            
            <div class="change_usr_pass_form_wrap chng_pass_form_id_'.$data["id"].'">
              <span class="close_usr_chng_pass" onclick="close_it()">&times;</span>
              <h4 class="cstm_heading">Change Password</h4>
                <form action="#" onsubmit="return false">
                  <input type="text" placeholder="New password" class="usr_chng_pass_input">
                  <input type="hidden" class="usr_chng_pass_username" value="'.$data["user_username"].'">
                  <button type="submit" class="cstm_btn_small w-100" onclick="change_pass_submit('.$data["id"].')">Change</button>
                </form>
            </div>

            <div class="loading_long_bar slim_loading">
              <div class="loading_bar"></div>
            </div>
              <li onclick="edit_user('.$data["id"].')" >  <i class="fas fa-user-edit"></i></i>Edit User</li>
              <li onclick="change_pass_user('.$data["id"].')" ><i class="fas fa-lock"></i>Change Password</li>
              <li onclick="block_user('.$data["id"].')" class="block_li '.$show_block_hide.'"><i class="fas fa-user-lock"></i>Block User</li>
              <li onclick="unblock_user('.$data["id"].')" class="unblock_li '.$show_unblock_hide.'"><i class="fas fa-user-alt-slash"></i>Unblock User</li>
              <li class="delete_user__li" data-deleteuserli="'.$data["id"].'"><i class="fas fa-trash"></i>Delete User</li>
              <li onclick="view_more_user('.$data["id"].')" class="mob_view_more_li"><i class="fas fa-eye"></i>View more</li>
            </ul>
          </div>
          <span class="goto_profile_when_list_view h_grid view_profile_span_button" onclick="go_to_profile('.$data["id"].')" >View Profile</span>
        </div>
      </div>
        <!-- Single Client List End -->';
        echo $get_data;
      }
      //onclick="delete_user('.$data["id"].')"
    }else{
      echo "no_user";
    }
  }else{
    echo "no";
  }
}

//////////// Getting All Client End ///////////////


//////////// Getting Client Data To Edit Start /////////////

if (isset($_POST["user_data"])) {
  sleep(1);
  $user_data = $_POST["user_data"];

  $get = "SELECT * FROM users WHERE id = '$user_data' ";
  $run = mysqli_query($connect, $get);
  if ($run == true) {
    if (mysqli_num_rows($run) >= 1) {
      while($data = mysqli_fetch_array($run)){
        $name = $data["user_name"];
        $phone = $data["user_phone"];
        $gender = $data["user_gender"];
        $email = $data["user_email"];
        $image = $data["user_image"];
        $id = $data["id"];
        $adsress = $data["user_address"];

        echo json_encode(array($name, $phone, $gender, $email, $image, $id, $adsress));
      }
    }else{
      echo "no_user";
    }
  }else{
    echo "no";
  }
}

//////////// Getting Client Data To Edit End ///////////////



//////////// Getting Admin Data To Edit Start /////////////

if (isset($_POST["admin_data"])) {
  sleep(1);
  $admin_data = $_POST["admin_data"];

  $get = "SELECT * FROM `owner` WHERE id = '$admin_data' ";
  $run = mysqli_query($connect, $get);
  if ($run == true) {
    if (mysqli_num_rows($run) >= 1) {
      while($data = mysqli_fetch_array($run)){
        $name = $data["owner_name"];
        $gender = $data["owner_gender"];
        $email = $data["owner_email"];
        $image = $data["owner_image"];
        $id = $data["id"];

        echo json_encode(array($name, $gender, $email, $image, $id));
      }
    }else{
      echo "no_user";
    }
  }else{
    echo "no";
  }
}

//////////// Getting Admin Data To Edit End ///////////////



/////////// Get Single Client Data Start /////////////

if (isset($_POST["s_data"])) {
  sleep(1);
  $s_data = $_POST["s_data"];
  $get = "SELECT * FROM users WHERE id = '$s_data' ";
  $run = mysqli_query($connect, $get);
  if ($run == true) {
    if (mysqli_num_rows($run) >= 1) {
      while($data = mysqli_fetch_array($run)){
        

        $total_id = $s_data;
        $select_total = "SELECT SUM(product_price) as total_due FROM users_due WHERE due_user_id = '$total_id' && due_status = 'due' ";
        $run_total = mysqli_query($connect, $select_total);
        if ($run_total == true) {
          if (mysqli_num_rows($run_total) >= 1) {
            while($totla_data = mysqli_fetch_array($run_total)){
              if ($totla_data['total_due'] > 0) {
                $user_total_due = $totla_data['total_due'];
              }else{
                $user_total_due = 0;
              }
            }
          }
        }

        ///// Get last payment done date Start

        $select_it = "SELECT * FROM users_due WHERE due_user_id = '$total_id' && due_paid_list = 'spe_due' ORDER BY id DESC LIMIT 1 ";
        $run_select_it = mysqli_query($connect, $select_it);
        if ($run_select_it == true && mysqli_num_rows($run_select_it) === 1) {
          while($get_last_date = mysqli_fetch_array($run_select_it)){
            $last_date = $get_last_date["sold_date"];

            $dt_dt = new DateTime($last_date);  

            $last_payment_date_is = $dt_dt->format('d/m/Y');
            $last_payment_day = day_ago($last_date);
            $last_payment_day_hide = 'r_t_c' ;
            
          }
        }else{
          $last_payment_day_hide = '';
          $last_payment_day = '- - -';
          $last_payment_date_is = '-- / -- / --';
        }

      

        $name = $data["user_name"];
        $image = $data["user_image"];
        $gender = $data["user_gender"];
        $address = $data["user_address"];

        echo json_encode(array($name, $image, $gender, $address, $user_total_due.' tk', $last_payment_date_is, $last_payment_day, $last_payment_day_hide));
      }
    }
  }else{
    echo "no";
  }

}

/////////// Get Single Client Data End ///////////////



/////////// Get Single Client Data Start /////////////

if (isset($_POST["s_data_for_inner"])) {
  sleep(1);
  $s_data_for_inner = $_POST["s_data_for_inner"];
  $get = "SELECT * FROM users WHERE id = '$s_data_for_inner' ";
  $run = mysqli_query($connect, $get);
  if ($run == true) {
    if (mysqli_num_rows($run) === 1) {
      while($data = mysqli_fetch_array($run)){
        $name = $data["user_name"];
        $image = $data["user_image"];
        $username = $data["user_username"];
        $phone = $data["user_phone"];
        $gender = $data["user_gender"];
        $address = $data["user_address"];
        $email = $data["user_email"];
        $block = $data["user_action"];

        $dt = new DateTime($data["user_joined"]);  
        $join = $dt->format('d/m/Y');

        $select_it = "SELECT * FROM users_due WHERE due_user_id = '$s_data_for_inner' && due_paid_list = 'spe_due' ORDER BY id DESC LIMIT 1 ";
        $run_select_it = mysqli_query($connect, $select_it);
        if ($run_select_it == true && mysqli_num_rows($run_select_it) === 1) {
          while($get_last_date = mysqli_fetch_array($run_select_it)){
            $last_date = $get_last_date["sold_date"];

            $dt_dt = new DateTime($last_date);  
            $last_pay_dt_final = $dt_dt->format('d/m/Y');
          }
        }else{
          $last_pay_dt_final = '-- / -- / --';
        }

        echo json_encode(array($name, $image, $username, $phone, $gender,$address, $email, $join, $last_pay_dt_final, $block));
      }
    }else{
      echo 'no_user';
    }
  }else{
    echo "no";
  }

}

/////////// Get Single Client Data End ///////////////




/////////// Get Single Admin Data Start /////////////

if (isset($_POST["admn_data"])) {
  sleep(1);
  $admn_data = $_POST["admn_data"];
  $get = "SELECT * FROM `owner` WHERE id = '$admn_data' ";
  $run = mysqli_query($connect, $get);
  if ($run == true) {
    if (mysqli_num_rows($run) >= 1) {
      while($data = mysqli_fetch_array($run)){
        $name = $data["owner_name"];
        $image = $data["owner_image"];

        echo json_encode(array($name, $image));
      }
    }
  }else{
    echo "no";
  }

}

/////////// Get Single Admin Data End ///////////////


/////////// Get Store All Admin Start ///////////////

if (isset($_POST["tb_name"])) {
  $tb_name = $_POST["tb_name"];
  $get = "SELECT * FROM $tb_name ";
  $run = mysqli_query($connect, $get);
  if ($run == true) {
    if (mysqli_num_rows($run) >= 1) {
      while($data = mysqli_fetch_array($run)){

        if ($data["owner_image"] == '') {
          if ($data["owner_gender"] == 'male') {
            $img_is = 'male.png';
          }else{
            $img_is = 'female.png';
          }
        }else{
          $img_is = $data["owner_image"];
        }

        $get_data = '
      <div class="single_store_admin_wrap admin_row_id_'.$data["id"].'">
        <div class="single_store_admin_img_name_wrap">
          <div class="single_store_admin_img">
            <img src="./users_photo/'.$img_is.'" alt="" class="img_w_100">
          </div>
          <div class="single_store_admin_name">
            <h6>'.$data["owner_name"].'</h6>
            <p>User: '.$data["owner_username"].'</p>
          </div>
        </div>
        <div class="single_store_admin_actions_wrap">
          <span onclick="edit_admin('.$data["id"].')">
            <i class="fas fa-pen"></i>
          </span>
          <span class="dtl__admin__span" data-dtladminid="'.$data["id"].'" >
            <i class="fas fa-trash"></i>
          </span>
        </div>
      </div>';
        echo $get_data ;

      } 
    }else{
      echo "no_user";
    }
  }else{
    echo "no";
  }
}


/////////// Get Store All Admin End ///////////////


///////////  Live Client Count Start ///////////
  if (isset($_POST["live_client_count"])) {
    sleep(1);
    $get = "SELECT * FROM users ";
    $run = mysqli_query($connect, $get);
    if ($run == true) {
      $all_rows =  mysqli_num_rows($run);
      echo $all_rows;
    }else{
      echo 'no';
    }
  }

///////////  Live Client Count End ///////////


//////// Getting Client Due List Start

if (isset($_POST["due_list_id"]) && isset($_POST["due_offset"])) {

  $user_id = $_POST["due_list_id"];
  $offset = $_POST["due_offset"];

  $select = "SELECT * FROM users_due WHERE due_user_id = '$user_id' ";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    $count_all_row = mysqli_num_rows($run);
    /*if ($count_all_row < $offset) {
      $offset_is = 0;
    }else{ 
      $offset_is = ($count_all_row - $offset);
    }*/

    $select_again = "SELECT * FROM (SELECT * FROM users_due WHERE due_user_id = '$user_id' ORDER BY id DESC LIMIT $offset)Var1 ORDER BY id ASC";
    $run_select_again = mysqli_query($connect, $select_again);
    if ($run_select_again == true) {
      if (mysqli_num_rows($run_select_again) >= 1) {
        while($data = mysqli_fetch_array($run_select_again)){

          // Note
          if ($data["due_note"] == '') {
            $note_permission = 'disabled_note';
          }else{
            $note_permission = 'php_null_class';
          }

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

          /// List Edit Delete Permission
          if ($data["due_status"] === 'due' && $data["due_paid_list"] === '') {
            $list_edit = '<li onclick="edit_due_list('.$data['id'].')"><i class="fas fa-pen"></i>Edit List</li>';
            $list_delete = '<li class="user_list_delete__li" data-usrlistdtl="'.$data['id'].'"><i class="fas fa-trash"></i>Delete List</li>';
          }else{
            $list_delete = '';
            $list_edit = '';
          }

          /// List Created Date
          $dt = new DateTime($data["sold_date"]);  
          $sold_date_is = $dt->format('d/m/Y');

          $final_data = '<div class="client_due_list_wrap_single_due_list_wrap due_list_id_'.$data['id'].' pay_is_'.$data['due_paid_list'].' '.$paid_list.' '.$due_list_i.'">  
          <div class="product_name">
            <span>'.$data['product_name'].'</span>
          </div>
          <div class="product_price d-flex justify-content-center align-items-center">
            <span>'.$data['product_price'].' tk</span>
          </div>
          <div class="client_due_list_wrap_three_dot_wrap">
            <i class="fas fa-ellipsis-v flex_all"></i>
            <ul class="inner_list_ul">
              <li><i class="fas fa-user"></i>Sold by: '.$data['sold_by'].'</li>
              <li class="cstm-tooltip cstm_relative" data-cstm-tooltip="">
                <div class="cstm-tooltip-box text-center" style="width: 130px !important">
                  Date: '.$sold_date_is.'
                </div>
                <i class="fas fa-user-clock"></i>
              
              Sold at: '.day_ago($data['sold_date']).'</li>
              <li onclick="view_note('.$data['id'].')" class="'.$note_permission.' view_note_li"><i class="fas fa-book-open"></i>View Note</li>
              '.$list_edit.'
              '.$list_delete.'
            </ul>
          </div>
        </div>';

        echo $final_data;
        }
      }else{
        echo 'no_list';
      }
    }else{
      echo 'no';
    }

  }
}

//////// Getting Client Due List End
            

////////////////// Getting Data For Edit Single Due List Start /////////////////////


if (isset($_POST["due_id"])) {
  sleep(1);
  $due_id = $_POST["due_id"];
  $get = "SELECT * FROM users_due WHERE id = '$due_id' ";
  $run = mysqli_query($connect, $get);
  if ($run == true) {
    if (mysqli_num_rows($run) >= 1) {
      while($data = mysqli_fetch_array($run)){
        $name = $data["product_name"];
        $price = $data["product_price"];
        $note = $data["due_note"];
        $id = $data["id"];

        echo json_encode(array($name, $price, $note, $id));
      }
    }else{
      echo "no_list";
    }
  }else{
    echo "no";
  }

}

////////////////// Getting Data For Edit Single Due List End ///////////////////////


////////////////// Getting Current Month Due Start /////////////////////

if (isset($_POST["get_month_due"])) {
  sleep(1);
  $get_month_due = $_POST["get_month_due"]; 

  $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

  $now = $dt->format('Y-m-d H:i:s');
  $time   = strtotime($now);
  $time   = $time - (60*(60*13)); //one hour
  $beforeOneHour = date("m-Y", $time); // Our Local Correct Time
  
  $curnt_month = $beforeOneHour;

  $select = "SELECT SUM(product_price) as 'total_month_due' FROM users_due WHERE due_month_name = '$curnt_month' && due_paid_list != 'spe_total'  && due_paid_list != 'spe_pay'  && due_paid_list != 'spe_due' ";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    $tottaLdue_of_this_month_is = mysqli_fetch_array($run);
    echo $tottaLdue_of_this_month_is['total_month_due'];
  }

}

if (isset($_POST["get_month_due_collect"])) {
  sleep(1);
  $get_month_due_collect = $_POST["get_month_due_collect"]; 

  $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

  $now = $dt->format('Y-m-d H:i:s');
  $time   = strtotime($now);
  $time   = $time - (60*(60*13)); //one hour
  $beforeOneHour = date("m-Y", $time); // Our Local Correct Time
  
  $curnt_month = $beforeOneHour;

  $select = "SELECT SUM(product_price) as 'total_month_due' FROM users_due WHERE due_month_name = '$curnt_month' && due_paid_list = 'spe_pay' ";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    $tottaLdue_of_this_month_is = mysqli_fetch_array($run);
    echo $tottaLdue_of_this_month_is['total_month_due'];
  }

}

////////////////// Getting Current Month Due End ///////////////////////

/////////////// View Note Stat ///////////////

if (isset($_POST["view_note_id"])) {
  $view_note_id = $_POST["view_note_id"];
  $select_again = "SELECT * FROM users_due WHERE id = '$view_note_id' ";
    $run_select_again = mysqli_query($connect, $select_again);
    if ($run_select_again == true) {
      while($data = mysqli_fetch_array($run_select_again)){
        echo  $data["due_note"];
      }
    }else{
      echo 'no';
    }
}

/////////////// View Note End ///////////////

///////////// User Login Start ///////////////

if (isset($_POST["user_name"]) && isset($_POST["password"])) {
  sleep(1);
  $user_name = $_POST["user_name"];
  $password = $_POST["password"];

  $encript_pass = md5(sha1(sha1(md5($password))));
  $token = md5(sha1(sha1(md5($user_name.$password))));

  // User Check
  $user_check = "SELECT * FROM users WHERE user_username = '$user_name' ";
  $run_user_check = mysqli_query($connect, $user_check);

  // Password Check
  $password_check = "SELECT * FROM users WHERE user_username = '$user_name' && user_password = '$encript_pass' ";
  $run_password_check = mysqli_query($connect, $password_check);
  
  /// User Block Check
  $block_check = "SELECT * FROM users WHERE user_password = '$encript_pass' && user_token = '$token' && user_action = 'unblock' ";
  $run_block = mysqli_query($connect, $block_check);
  
  /// User Chekc Together
  /*
  $check_both = "SELECT * FROM users WHERE user_password = '$encript_pass' && user_token = '$token' ";
  $run_both = mysqli_query($connect, $check_both);
  */


  // Owner Username Check
  $owner_user_check = "SELECT * FROM `owner` WHERE owner_username = '$user_name' ";
  $run_owner_user_check = mysqli_query($connect, $owner_user_check);

  // Owner Password Check
  $owner_password_check = "SELECT * FROM `owner` WHERE owner_username = '$user_name' && owner_password = '$encript_pass' ";
  $run_owner_password_check = mysqli_query($connect, $owner_password_check);

  //// Owner Block Check 
  $owner_both_check = "SELECT * FROM `owner` WHERE owner_password = '$encript_pass' && owner_token = '$token' && owner_action = 'unblock' ";
  $run_owner_both_check = mysqli_query($connect, $owner_both_check);

  if ($run_user_check == true && mysqli_num_rows($run_user_check) === 1) {
    if ($run_password_check == true && mysqli_num_rows($run_password_check) === 1) {
      if ($run_block == true && mysqli_num_rows($run_block) === 1) {
        while($get_id = mysqli_fetch_array($run_block)){
          $user_id_is = $get_id["id"];
          setcookie('t35e6and45easn',$token,time()+(86400*15), '/', null, null, true);
          setcookie('p35edasdd785easd',$encript_pass,time()+(86400*15), '/', null, null, true);
          setcookie('i35esda5asd',$user_id_is,time()+(86400*15), '/', null, null, true);

          $usr__id = $get_id['id'];
          $usr__name = $get_id['user_name'];
          $usr__desc = $usr__name.' loged in to his account';

          $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));
          $now = $dt->format('Y-m-d H:i:s');
          $time   = strtotime($now);
          $time   = $time - (60*(60*13)); //one hour
          $time_is = date("Y-m-d H:i:s", $time); // Our Local Correct Time

          $insert = "INSERT INTO owner_notification (`n_title`, `n_desc`, `n_time`, `n_type`, `n_seen`, `n_image`, `n_from`) VALUES ('User Log In', '$usr__desc', '$time_is', '', 'unseen', '$usr__id', 'usr')";
    
          $run_insert = mysqli_query($connect, $insert);

          echo 'proceed_user';
        }
      }else{
        echo 'user_block';
      }
    }else{
      echo 'wrong_password';
    }
  }else if($run_owner_user_check == true && mysqli_num_rows($run_owner_user_check) === 1){
    if ($run_owner_password_check == true && mysqli_num_rows($run_owner_password_check) === 1) {
      if ($run_owner_both_check == true && mysqli_num_rows($run_owner_both_check) === 1) {
        while($get_id = mysqli_fetch_array($run_owner_both_check)){
          if ($get_id["owner_two_step"] == 'on') {

            $otp_code = rand(111111,999999);

            $update_it = "UPDATE `owner` SET owner_otp = '$otp_code' WHERE owner_username = '$user_name' && owner_password = '$encript_pass' ";
            mysqli_query($connect, $update_it);

            echo 'proceed_owner_for_two_step';
          }else{
            echo 'proceed_owner';
          }
        }
      }else{
        echo 'user_block';
      }
    }else{
      echo 'wrong_password';
    }
  }else{
    echo 'wrong_user';
  }

}

///////////// User Login End ///////////////

/////// Get Owner Otp Code Start

if (isset($_POST["username_ownr"]) && isset($_POST["password_ownr"])) {
  sleep(1);
  $user_n = $_POST["username_ownr"];

  $encript_pass = md5(sha1(sha1(md5($_POST["password_ownr"]))));
  $token = md5(sha1(sha1(md5($user_n.$_POST["password_ownr"]))));
  
  $select = "SELECT * FROM `owner` WHERE owner_username = '$user_n' && owner_password = '$encript_pass' && owner_token = '$token' ";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    if (mysqli_num_rows($run) === 1) {
      while($get_code = mysqli_fetch_array($run)){
        $code = $get_code["owner_otp"];
        $emil = $get_code["owner_email"];

        echo json_encode(array($code, $emil));
      }
    }else{
      echo 'no';
    }
  }else{
    echo 'no';
  }

}

/////// Get Owner Otp Code End

////////// Find User Start ////////////////

if (isset($_POST["find_val"])) {
  sleep(1);
  $find_val = $_POST["find_val"];
  
  $get = "SELECT * FROM users WHERE user_username = '$find_val' || user_email = '$find_val' ";
  $run = mysqli_query($connect, $get);
  if ($run == true) {
    if (mysqli_num_rows($run) === 1) {
      while($data = mysqli_fetch_array($run)){
        $block_check = $data['user_action'];
          if ($block_check != 'block') {
            $email = $data["user_email"];
          if ($email != '') {
            $img = $data["user_image"];
            $name = $data["user_name"];
            $user_name = $data["user_username"];
            $user_gender = $data["user_gender"];
            $reset_type = 'us';

            echo json_encode(array($email,$img,$name,$user_name,$user_gender, $reset_type));
          }else{
            echo 'no_email';
          }
        }else{
          echo 'block';
        }
      }
    }else{
      $get_ow = "SELECT * FROM `owner` WHERE owner_username = '$find_val' || owner_email = '$find_val' ";
      $run_ow = mysqli_query($connect, $get_ow);
      if (mysqli_num_rows($run_ow) === 1) {
        while($data = mysqli_fetch_array($run_ow)){
          $block_check = $data['owner_action'];
            if ($block_check != 'block') {
              $email = $data["owner_email"];
            if ($email != '') {
              $img = $data["owner_image"];
              $name = $data["owner_name"];
              $user_name = $data["owner_username"];
              $user_gender = $data["owner_gender"];
              $reset_type = 'ow';
  
              echo json_encode(array($email,$img,$name,$user_name,$user_gender, $reset_type));
            }else{
              echo 'no_email';
            }
          }else{
            echo 'block';
          }
        }
      }else{
        echo 'no_user_found';
      }
    }
  }else{
    echo 'no';
  }
}

////////// Find User End ////////////////

////////// Get Owner Notification Start ////////////

if (isset($_POST["n_offset"]) && isset($_POST["n_limit"])) {
  sleep(1);
  $n_offset = $_POST["n_offset"];
  $n_limit = $_POST["n_limit"];

  $check_row = "SELECT * FROM owner_notification";
  $run_check_row = mysqli_query($connect,$check_row);
  $count_row = mysqli_num_rows($run_check_row);

  if ($count_row > 0) {

  if ($n_offset > $count_row || $n_offset == $count_row) {
    $final_offset = 0;
  }else{
    $final_offset = $n_offset;
  }

  $select = "SELECT * FROM owner_notification ORDER BY id DESC LIMIT $final_offset, $n_limit ";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    while($data = mysqli_fetch_array($run)){
      if ($data["n_type"] == '') {
        $no_type = '';
      }else{
        $no_type = 'no_'.$data["n_type"];
      }

      $no_id = $data["n_image"];

      if ($data["n_from"] == 'ow') {
        $get = mysqli_query($connect, "SELECT * FROM `owner` WHERE id = '$no_id' ");
        if ($get == true && mysqli_num_rows($get) === 1) {
          while($imgg = mysqli_fetch_array($get)){
            if ($imgg["owner_image"] == '') {
              if ($imgg["owner_gender"] == 'male') {
                $noti_img = './users_photo/male.png';
              }else{
                $noti_img = './users_photo/female.png';
              }
            }else{
              $noti_img = './users_photo/'.$imgg["owner_image"];
            }
          }
        }else{
          $noti_img = './img/question_user.png';
        } 
      }else{
        $get = mysqli_query($connect, "SELECT * FROM `users` WHERE id = '$no_id' ");
        if ($get == true && mysqli_num_rows($get) === 1) {
          while($imgg = mysqli_fetch_array($get)){
            if ($imgg["user_image"] == '') {
              if ($imgg["user_gender"] == 'male') {
                $noti_img = './users_photo/male.png';
              }else{
                $noti_img = './users_photo/female.png';
              }
            }else{
              $noti_img = './users_photo/'.$imgg["user_image"];
            }
          }
        }else{
          $noti_img = './img/question_user.png';
        }
      }



      echo '
      <!-- Single Notification Start -->
      <div class="single_notification_wrap '.$no_type.' sing_notifi_id_'.$data["id"].'">
        <div class="single_notification_actions_wrap">
          <i class="fas fa-ellipsis-v flex_all"></i>
          <ul class="single_notification_actions_wrap_ul">
            <li onclick="remove_single_notification('.$data["id"].')">Remove notification</li>
          </ul>
        </div>
        <div class="notification_time flex_all">
          <p><i class="fas fa-clock"></i>'.second_ago($data["n_time"]).'</p>
        </div>
        <div class="single_notification_img">
          <img src="'.$noti_img.'" alt="" class="img_w_100">
        </div>
        <div class="single_notificaticontent">
          <h5>'.$data["n_title"].'</h5>
          <p>'.$data["n_desc"].'</p>
        </div>
      </div>
      <!-- Single Notification End -->';
    }
  }else{
    echo 'no';
  }
      
}else{
  echo 'no_row';
}
}

////////// Get Owner Notification End //////////////


if (isset($_POST["get_all"])) {
  sleep(1);
  $get_all = $_POST["get_all"];

  $select = "SELECT * FROM $get_all ORDER BY id DESC ";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    if (mysqli_num_rows($run) >= 1) {
    while($data = mysqli_fetch_array($run)){
      if ($data["n_type"] == '') {
        $no_type = '';
      }else{
        $no_type = 'no_'.$data["n_type"];
      }

      $no_id = $data["n_image"];

      if ($data["n_from"] == 'ow') {
        $get = mysqli_query($connect, "SELECT * FROM `owner` WHERE id = '$no_id' ");
        if ($get == true && mysqli_num_rows($get) === 1) {
          while($imgg = mysqli_fetch_array($get)){
            if ($imgg["owner_image"] == '') {
              if ($imgg["owner_gender"] == 'male') {
                $noti_img = './users_photo/male.png';
              }else{
                $noti_img = './users_photo/female.png';
              }
            }else{
              $noti_img = './users_photo/'.$imgg["owner_image"];
            }
          }
        }else{
          $noti_img = './img/question_user.png';
        } 
      }else{
        $get = mysqli_query($connect, "SELECT * FROM users WHERE id = '$no_id' ");
        if ($get == true && mysqli_num_rows($get) === 1) {
          while($imgg = mysqli_fetch_array($get)){
            if ($imgg["user_image"] == '') {
              if ($imgg["user_gender"] == 'male') {
                $noti_img = './users_photo/male.png';
              }else{
                $noti_img = './users_photo/female.png';
              }
            }else{
              $noti_img = './users_photo/'.$imgg["user_image"];
            }
          }
        }else{
          $noti_img = './img/question_user.png';
        }
      }

      echo '
      <!-- Single Notification Start -->
      <div class="single_notification_wrap from_bottom '.$no_type.' sing_notifi_id_'.$data["id"].'">
        <div class="single_notification_actions_wrap">
          <i class="fas fa-ellipsis-v flex_all"></i>
          <ul class="single_notification_actions_wrap_ul">
            <li onclick="remove_single_notification('.$data["id"].')">Remove notification</li>
          </ul>
        </div>
        <div class="notification_time flex_all">
          <p><i class="fas fa-clock"></i>'.second_ago($data["n_time"]).'</p>
        </div>
        <div class="single_notification_img">
          <img src="'.$noti_img.'" alt="" class="img_w_100">
        </div>
        <div class="single_notificaticontent">
          <h5>'.$data["n_title"].'</h5>
          <p>'.$data["n_desc"].'</p>
        </div>
      </div>
      <!-- Single Notification End -->';
    }
}else{
  echo 'no_row';
}
  }else{
    echo 'no';
  }
      

}



////////// Get Owner Last Notification Start ////////////

if (isset($_POST["last_n"])) {
  $last_n = $_POST["last_n"];
  
  $select = "SELECT * FROM $last_n ORDER BY id DESC LIMIT 1";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    while($data = mysqli_fetch_array($run)){
      if ($data["n_type"] == '') {
        $no_type = '';
      }else{
        $no_type = 'no_'.$data["n_type"];
      }


      $no_id = $data["n_image"];
      if ($data["n_from"] == 'ow') {
        $get = mysqli_query($connect, "SELECT * FROM `owner` WHERE id = '$no_id' ");
        if ($get == true && mysqli_num_rows($get) === 1) {
          while($imgg = mysqli_fetch_array($get)){
            if ($imgg["owner_image"] == '') {
              if ($imgg["owner_gender"] == 'male') {
                $noti_img = './users_photo/male.png';
              }else{
                $noti_img = './users_photo/female.png';
              }
            }else{
              $noti_img = './users_photo/'.$imgg["owner_image"];
            }
          }
        }else{
          $noti_img = './img/question_user.png';
        } 
      }else{
        $get = mysqli_query($connect, "SELECT * FROM `users` WHERE id = '$no_id' ");
        if ($get == true && mysqli_num_rows($get) === 1) {
          while($imgg = mysqli_fetch_array($get)){
            if ($imgg["user_image"] == '') {
              if ($imgg["user_gender"] == 'male') {
                $noti_img = './users_photo/male.png';
              }else{
                $noti_img = './users_photo/female.png';
              }
            }else{
              $noti_img = './users_photo/'.$imgg["user_image"];
            }
          }
        }else{
          $noti_img = './img/question_user.png';
        }
      }


      echo '
      <!-- Single Notification Start -->
      <div class="single_notification_wrap '.$no_type.' sing_notifi_id_'.$data["id"].'">
        <div class="single_notification_actions_wrap">
          <i class="fas fa-ellipsis-v flex_all"></i>
          <ul class="single_notification_actions_wrap_ul">
            <li onclick="remove_single_notification('.$data["id"].')">Remove notification</li>
          </ul>
        </div>
        <div class="notification_time flex_all">
          <p><i class="fas fa-clock"></i>'.second_ago($data["n_time"]).'</p>
        </div>
        <div class="single_notification_img">
          <img src="'.$noti_img.'" alt="" class="img_w_100">
        </div>
        <div class="single_notificaticontent">
          <h5>'.$data["n_title"].'</h5>
          <p>'.$data["n_desc"].'</p>
        </div>
      </div>
      <!-- Single Notification End -->';
    }
  }else{
    echo 'no';
  }
}

////////// Get Owner Last Notification End //////////////


/////////// Unseen Notification Check Start 

if (isset($_POST["unssen_notification"])) {
  $unssen_notification = $_POST["unssen_notification"];
  $select = "SELECT * FROM `owner_notification` WHERE n_seen = '$unssen_notification' ";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    $count = mysqli_num_rows($run);
    echo $count;

  }

}

/////////// Unseen Notification Check End

///// Client Total Due Start

if (isset($_POST["total_Due_id"])) {
  $total_Due_id = $_POST["total_Due_id"];
  $select_total = "SELECT SUM(product_price) as total_due FROM users_due WHERE due_user_id = '$total_Due_id' && due_status = 'due' ";
  $run_total = mysqli_query($connect, $select_total);
  if ($run_total == true) {
    while($totla_data = mysqli_fetch_array($run_total)){
      if ($totla_data['total_due'] > 0) {
        echo $user_total_due = $totla_data['total_due'];
      }else{
        echo $user_total_due = 0;
      }
    }
  }
}

///// Client Total Due End

///// Store Total Due Start

if (isset($_POST["store_total"])) {
  sleep(1);
  $store_total =$_POST["store_total"];
  $select_total = "SELECT SUM(product_price) as total_due FROM users_due WHERE due_status = '$store_total' ";
  $run_total = mysqli_query($connect, $select_total);
  if ($run_total == true) {
    while($totla_data = mysqli_fetch_array($run_total)){
      if ($totla_data['total_due'] > 0) {
        echo $totla_data['total_due'];
      }else{
        echo 0;
      }
    }
  }
}

///// Store Total Due End

////////// Owner Two Step Code Check Start

if (isset($_POST["code"]) && isset($_POST["usr"]) && isset($_POST["pass"])) {

  sleep(1);
  $code = $_POST["code"];
  $usr = $_POST["usr"];
  $pass = $_POST["pass"];

  $encript_pass = md5(sha1(sha1(md5($pass))));
  $token = md5(sha1(sha1(md5($usr.$pass))));

  $select = "SELECT * FROM `owner` WHERE owner_username = '$usr' && owner_password = '$encript_pass' && owner_token = '$token' && owner_otp = '$code' ";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    if (mysqli_num_rows($run) === 1) {
      echo 'yes';
    }else{
      echo 'wrong_code';
    }
  }else{
    echo 'no';
  }

}

////////// Owner Two Step Code Check End

////////// Store Secrect Code Check Start

if (isset($_POST["store_code"]) && isset($_POST["store_usr"]) && isset($_POST["store_pass"])) {

  sleep(1);
  $store_code = $_POST["store_code"];
  $store_usr = $_POST["store_usr"];
  $store_pass = $_POST["store_pass"];

  $encript_pass = md5(sha1(sha1(md5($store_pass))));
  $token = md5(sha1(sha1(md5($store_usr.$store_pass))));

  $select = mysqli_query($connect, "SELECT * FROM store_settings WHERE setting_name = 'store_code' && setting_password = '$store_code' ");
  if ($select == true) {
    if (mysqli_num_rows($select) === 1) {
          
    $select_ow = "SELECT * FROM `owner` WHERE owner_username = '$store_usr' && owner_password = '$encript_pass' && owner_token = '$token' ";
    $run = mysqli_query($connect, $select_ow);
    if ($run == true) {
      if (mysqli_num_rows($run) === 1) {
        while($get_code = mysqli_fetch_array($run)){
          $id = $get_code["id"];
          setcookie('toawasnsdeaden',$token,time()+(86400*15), '/', null, null, true);
          setcookie('psasgsfsafsgdsad',$encript_pass,time()+(86400*15), '/', null, null, true);
          setcookie('iasasaddffsfd',$id,time()+(86400*15), '/', null, null, true);

          $ow__name = $get_code['owner_name'];
          $ow__desc = $ow__name.' loged in to his account';

          $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));
          $now = $dt->format('Y-m-d H:i:s');
          $time   = strtotime($now);
          $time   = $time - (60*(60*13)); //one hour
          $time_is = date("Y-m-d H:i:s", $time); // Our Local Correct Time

          $insert = "INSERT INTO owner_notification (`n_title`, `n_desc`, `n_time`, `n_type`, `n_seen`, `n_image`, `n_from`) VALUES ('Admin Log In', '$ow__desc', '$time_is', '', 'unseen', '$id', 'ow')";

          $run_notifi = mysqli_query($connect, $insert);

          echo 'yes';
        }
      }
    }
    }else{
      echo 'wrong_code';
    }
  }else{
    echo 'no';
  }


}

////////// Store Secrect Code Check End

///// Check Store Code Start

if (isset($_POST["check_store_code"]) && isset($_POST["cokkie_usr"]) && isset($_POST["cokkie_pass"])) {

  $check_store_code = $_POST["check_store_code"];
  $cokkie_usr = $_POST["cokkie_usr"];
  $cokkie_pass = $_POST["cokkie_pass"];

  $select = mysqli_query($connect, "SELECT * FROM store_settings WHERE setting_name = '$check_store_code' && setting_status = 'on' ");
  if ($select == true && mysqli_num_rows($select) === 1) {
    echo 'yes';
  }else{

    $encript_pass = md5(sha1(sha1(md5($cokkie_pass))));
    $token = md5(sha1(sha1(md5($cokkie_usr.$cokkie_pass))));
    
    $select = "SELECT * FROM `owner` WHERE owner_username = '$cokkie_usr' && owner_password = '$encript_pass' && owner_token = '$token' ";
    $run = mysqli_query($connect, $select);
    if ($run == true) {
      if (mysqli_num_rows($run) === 1) {
        while($get_code = mysqli_fetch_array($run)){
          $id_is_id = $get_code["id"];
          setcookie('toawasnsdeaden',$token,time()+(86400*15), '/', null, null, true);
          setcookie('psasgsfsafsgdsad',$encript_pass,time()+(86400*15), '/', null, null, true);
          setcookie('iasasaddffsfd',$id_is_id,time()+(86400*15), '/', null, null, true);

          $ow__name = $get_code['owner_name'];
          $ow__desc = $ow__name.' loged in to his account';

          $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));
          $now = $dt->format('Y-m-d H:i:s');
          $time   = strtotime($now);
          $time   = $time - (60*(60*13)); //one hour
          $time_is = date("Y-m-d H:i:s", $time); // Our Local Correct Time

          $insert = "INSERT INTO owner_notification (`n_title`, `n_desc`, `n_time`, `n_type`, `n_seen`, `n_image`, `n_from`) VALUES ('Admin Log In', '$ow__desc', '$time_is', '', 'unseen', '$id_is_id', 'ow')";

          $run_notifi = mysqli_query($connect, $insert);
        }
      }
    }
    echo 'no';

  }


}


///// Check Store Code End


////// Reset Ow Password Start

if(isset($_POST["forgot_ow_pass"])){
  sleep(1);
  $forgot_ow_pass = $_POST["forgot_ow_pass"];

  $otp_code = rand(111111,999999);
  
  $id = $_COOKIE["iasasaddffsfd"];
  $pass = $_COOKIE["psasgsfsafsgdsad"];
  $token = $_COOKIE["toawasnsdeaden"];

      
  $select = "SELECT * FROM `owner` WHERE id = '$id' && owner_password = '$pass' && owner_token = '$token' ";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    if (mysqli_num_rows($run) === 1) {
      while($get_code = mysqli_fetch_array($run)){
      $eml = $get_code["owner_email"];
      $update_it = "UPDATE `owner` SET owner_otp = '$otp_code' WHERE id = '$id' && owner_password = '$pass' && owner_token = '$token' ";
      $run_up = mysqli_query($connect, $update_it);
      if($run_up == true){
        echo json_encode(array($otp_code, $eml));
      }else{
        echo 'no';
      }
    }
  }
}else{
  echo 'no';
}
  
}
////// Reset Ow Password End

if (isset($_POST["pass_2_veri"]) && isset($_POST["veri"])) {
  sleep(1);
  $pass_2_veri = $_POST["pass_2_veri"];
  $veri = $_POST["veri"];

    
  $id = $_COOKIE["iasasaddffsfd"];
  $pass = $_COOKIE["psasgsfsafsgdsad"];
  $token = $_COOKIE["toawasnsdeaden"];

  $select = "SELECT * FROM `owner` WHERE id = '$id' && owner_password = '$pass' && owner_token = '$token' && owner_otp = '$veri' ";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    if (mysqli_num_rows($run) === 1) {
      while($gt = mysqli_fetch_array($run)){
        $usr_iss = $gt['owner_username'];

        $encript_pass = md5(sha1(sha1(md5($pass_2_veri))));
        $token = md5(sha1(sha1(md5($usr_iss.$pass_2_veri))));

        $update_it = "UPDATE `owner` SET owner_otp = '', owner_password = '$encript_pass', owner_token = '$token'  WHERE id = '$id' && owner_password = '$pass' && owner_token = '$token' ";
         $run_updt =  mysqli_query($connect, $update_it);

         if ($run_updt == true) {
          setcookie('t35e6and45easn',$token,time()+(86400*15), '/', null, null, true);
          setcookie('p35edasdd785easd',$encript_pass,time()+(86400*15), '/', null, null, true);
           echo 'yes';

         }else{
           echo 'no';
         }



      }
    }else{
      echo 'wrong';
    }
  }else{
    echo 'no';
  }


}


//////// Check Owner Current Password Start

if (isset($_POST["pass_1"])) {
  $pass_1 = $_POST["pass_1"];

  $encript_pass = md5(sha1(sha1(md5($pass_1))));

  $pass = $_COOKIE["psasgsfsafsgdsad"];

  if ($encript_pass === $pass) {
    echo "yes";
  }else{
    echo 'no';
  }


}

//////// Check Owner Current Password End

if (isset($_POST["no_more_noti"])) {
  $no_more_noti = $_POST["no_more_noti"];

  $select  = "SELECT * FROM $no_more_noti";
  $run = mysqli_query($connect, $select);
  if ($run == true && mysqli_num_rows($run) === 0) {
    echo 'yes';
  }
}

if (isset($_POST["pic_alert_per"])) {
  $pic_alert_per = $_POST["pic_alert_per"];

  echo $_COOKIE[$pic_alert_per];
}



if (isset($_POST["tbl_nm"])) {
  sleep(2);
  $select = "SELECT * FROM sgst_word";
  $run = mysqli_query($connect, $select);
  if ($run == true ) {
     $count_sgst = mysqli_num_rows($run);
     if ($count_sgst >= 1) {
        while($data = mysqli_fetch_array($run)){
           $main_wrd = $data["main_sgst"];
           $rela_wrd = $data["related_sgst"];
           $sgst_id = $data["id"];

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
              <span class="cstm_relative sgst_dlt_spn" data-deletesgst = "'.$sgst_id.'" >Delete</span>
            </div>
          </div>';
        }
     }else{
        echo $result = '<div class="nothind_found_wrap" style="height: 20rem;">
                          <p>¯\_(ツ)_/¯</p>
                          <p>You have no list to show</p>
                          <p class="try_onc_sgst"><span>Add new &nbsp; <i class="fas fa-plus"></i></span></p>
                       </div>';
  }
  }else{
     echo $result = '<div class="nothind_found_wrap" style="height: 20rem;">
                          <p>¯\_(ツ)_/¯</p>
                          <p>Something went wrong!</p>
                       </div>';
  }
}


if (isset($_POST["sgst_edit_id"])) {
  sleep(1);
  $sgst_edit_id = $_POST["sgst_edit_id"];
  $select = "SELECT * FROM sgst_word WHERE id = '$sgst_edit_id' ";
  $run = mysqli_query($connect, $select);
  if ($run == true && mysqli_num_rows($run) > 0) {
     while($data = mysqli_fetch_array($run)){
        $mn_wrd = $data["main_sgst"];
        $rel_wrd = $data["related_sgst"];
        echo json_encode(array($mn_wrd, $rel_wrd));
     }
  }else{
     echo "no";
  }
}

if (isset($_POST["get_sugst"])) {
  $get_sugst = $_POST["get_sugst"];
  $select = "SELECT * FROM sgst_word WHERE related_sgst LIKE '%$get_sugst%' || main_sgst LIKE '%$get_sugst%'";
  $run = mysqli_query($connect, $select);
  if ($run == true) {
    if ( mysqli_num_rows($run) > 0) {
      $list_id = 1;
      while($data = mysqli_fetch_array($run)){
        $final = $data["main_sgst"];
        
        echo '<li class="li_'.$list_id.'" data-limit-li="'.$list_id.'">'.$final.'</li>';
        $list_id++;
      }
    }else{
      echo  'no_row';
    }
  }else{
     echo "no";
  }
}


if (isset($_POST["tdy_coll_li"])) {
  //sleep(2);
  // Due Only Month
  $dot = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

  $now_dot = $dot->format('Y-m-d H:i:s');
  $time_dot   = strtotime($now_dot);
  $time_dot   = $time_dot - (60*(60*13)); //one hour
  $beforeOneHour_dot = date("Y-m-d", $time_dot); // Our Local Correct Time

  $date_dot = $beforeOneHour_dot;

  $select_total = "SELECT SUM(product_price) as total_due FROM users_due WHERE todays_collection = '$date_dot' && due_paid_list = 'spe_pay' ";
  $run_total = mysqli_query($connect, $select_total);
  if ($run_total == true) {
    if (mysqli_num_rows($run_total) > 0) {
      while($totla_data = mysqli_fetch_array($run_total)){
        if ($totla_data['total_due'] >= 1) {
          echo $totla_data['total_due'];
        }else{
           echo 'no_collect';
        }
      }
    }else{
      echo 'no_collect';
    }
  }else{
    echo 'no';
  }
}

if (isset($_POST["today_paid_name"])) {
  
  $dot = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

  $now_dot = $dot->format('Y-m-d H:i:s');
  $time_dot   = strtotime($now_dot);
  $time_dot   = $time_dot - (60*(60*13)); //one hour
  $beforeOneHour_dot = date("Y-m-d", $time_dot); // Our Local Correct Time
  
  $date_dot = $beforeOneHour_dot;

  $select_total = "SELECT * FROM users_due WHERE todays_collection = '$date_dot' && due_paid_list = 'spe_pay' ORDER BY id DESC";
  $run_total = mysqli_query($connect, $select_total);
  if ($run_total == true) {
    if (mysqli_num_rows($run_total) > 0) {
      while($totla_data = mysqli_fetch_array($run_total)){
        $usr_id = $totla_data['due_user_id'];
        $usr_pay_amount = $totla_data['product_price'];
        $ago = $totla_data["sold_date"];

        $ago_in_hour = day_ago($ago);

        $select_user = "SELECT * FROM `users` WHERE id = '$usr_id' ";
        $run_it = mysqli_query($connect, $select_user);
        if ($run_it == true ) {
          while($data = mysqli_fetch_array($run_it)){
            $usr_name = $data["user_name"];
            $usr_img = $data["user_image"];

            if ($usr_img == '') {
              if ($data["user_gender"] == 'male') {
                $main_img = 'male.png';
              }else{
                $main_img = 'female.png';
              }
            }else{
              $main_img = $usr_img;
            }


            echo '<li> <div class="left_part"> <div class="sml_img"> <img src="./users_photo/'.$main_img.'" alt="'.$usr_name.'"> </div><div class="sml_name"> <h6>'.$usr_name.'</h6> <p class="m-0">'.$ago_in_hour.'</p></div></div><div class="right_part"> <div class="pay_amount_box_x"> <p class="m-0"> '.$usr_pay_amount.' tk</p></div></div></li>';

          }
        }else{
          echo 'no1';
        }
      }
    }else{
      echo 'no_collect';
    }
  }else{
    echo 'no';
  }

}



?>