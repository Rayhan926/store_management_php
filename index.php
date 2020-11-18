
  <?php
  include "./config/db.php";
  include "functions.php";


  if (isset($_COOKIE["toawasnsdeaden"]) && isset($_COOKIE["psasgsfsafsgdsad"]) && isset($_COOKIE["iasasaddffsfd"])) {
    $token = $_COOKIE["toawasnsdeaden"];
    $pass = $_COOKIE["psasgsfsafsgdsad"];
    $id = $_COOKIE["iasasaddffsfd"];
    $check = "SELECT * FROM `owner` WHERE owner_password = '$pass' && owner_token = '$token' && owner_action = 'unblock' && id = '$id' ";
    $run_check = mysqli_query($connect, $check);
    if ($run_check == true) {
      if (mysqli_num_rows($run_check) !== 1) {
        header("location: no-page.php");
      }
    }
  }else{
    header("location: ./login.php");
  }



  ?>

<!DOCTYPE html>
<html lang="en" data-theme='light'>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="./vendor/bootstrap/bootstrap.min.css">
  <!-- Fontawesome CSS File -->
  <link rel="stylesheet" href="./vendor/fontawesome/css/all.min.css">
  <!-- Main Custom CSS File -->
  <link rel="stylesheet" href="./css/style.css">
  <!-- <link rel="stylesheet" href="./css/sass.css"> -->
  <!-- Dark theme CSS File -->
  <link rel="stylesheet" href="./css/dark_off.css" class="dark_theme">
  <!-- Responsive Css File -->
  <link rel="stylesheet" href="./css/responsive.css">

  

</head>
<body>

<!-- <div class="dark_theme_changer_circle"></div> -->

  <div class="adad"></div>
  <!-- <div class="cstm_overly flex_all">
    <div class="cstm_close flex_all">
      <i class="fas fa-times"></i>
    </div>
  </div>

  <div class="cstm_overly_off flex_all">
    <div class="cstm_close flex_all">
      <i class="fas fa-times"></i>
    </div>
  </div>

  <div class="cstm_checkbox">
    <input type="checkbox" id="cstm_ckeck">
    <label for="cstm_ckeck">
      <div class="cstm_checkbox_boll"></div>
    </label>
  </div>

  <div class="cstm_radio">
    <input type="radio" id="cstm_rad">
    <label for="cstm_rad">
      <div class="cstm_radio_boll"></div>
    </label>
  </div>

  <i class="fas fa-sync-alt rotate_right"></i>

  <div class="loading_long_bar">
    <div class="loading_bar"></div>
  </div>

  <div class="cstm_alert"></div>


  <div class="form-group">
    <label class="form-label" for="first">What is your name?</label>
    <input id="first" class="form-input input_animated" type="text"/>
  </div> -->

  <!-- Include Header File -->
  <?php include "header.php"; ?>


  <!-- Suggested Word Area Start -->
  <div class="cstm_overly_off sgst_overly_main_wrap">
    <div class="cstm_close flex_all"><i class="fas fa-times"></i></div>

    <div class="suggest_container">
      <div class="suggested_title_wrap">
        <h3 class="text-center mb-0">Suggested Word</h3>
        <div class="top_add_div cstm_relative">
          <div class="noti_search_wrap">
            <div class="noti_sreach_bar_icon_wrap">
              <div class="nti_search_input_wrap">
                <input type="text" placeholder="Search suggested word" />
              </div>
              <div class="noti_search_icon_wrap cstm-tooltip left-center cstm_relative" data-cstm-tooltip="">
              <div class="cstm-tooltip-box alws_show" style="width: 85px; text-align: center;">Search word</div>
              <div class="cstm-tooltip-box close_tool_tip" style="width: 50px; text-align: center;">Close</div>
                <i class="fas fa-search"></i>
              </div>
            </div>
          </div>
          <span class="cstm_pointer ml-2 cstm-tooltip left-center add_new_sgst cstm_relative" data-cstm-tooltip=" Add New ">
            <i class="fas fa-plus"></i>
          </span>
        </div>
      </div>
      <div class="suggested_top_fixed_bar">
        <h5>Main Word</h5>
        <h5>Related Word</h5>
        <h5>Actions</h5>
      </div>
      <div class="ex_sgst_wrap cstm_relative">
      <!-- Edit Suggest Form Start -->
      <div class="edit_sgst_wrap_overly flex_all">
        <div class="cstm_close flex_all close_sgst_edit"><i class="fas fa-times"></i></div>
        <div class="edit_sgst_wrap">
          <h4>Edit List</h4>
          <form action="#" class="sgst_form">
            <label>Main word</label>
            <input type="text" class="edt_sgst_input_main">
            <label>Related word</label>
            <textarea cols="30" rows="5" class="cstm_scrollbar edt_sgst_input_related"></textarea>
            <p class="use_space_p">Use <span>Space</span> to make separate.</p>
            <input type="hidden" class="edt_sgst_input_re_id">
            <input type="hidden" class="sgst_form_type" value="sbmt">
            <button type="submit" class="cstm_relative sgst_fire_btn">Update</button>
          </form>
        </div>
      </div>
      <!-- Edit Suggest Form End -->
      <div class="suggested_search_wrap cstm_relative">
        <div class="nothing_found_wrap flex_all sgst_nothing_found">
          <div class="nothing_found_icon_wrap">
            <img src="./img/no_page.png" alt="Nothing Found">
          </div>
          <p class="no_res_found text-center its_black_txt_1">No result found with <span class="live_search_tag">"<span></span>"</span></p>
          <p class="try_another text-center its_black_txt_2">Try another search tag</p>
        </div>
        <div class="suggested_list_wrap cstm_scrollbar"></div>
      </div>
      </div>
    </div>
  </div>
  <!-- Suggested Word Area End -->

  <!-- Today Collections Area Start -->
  <div class="cstm_overly todays_collections_overly">
    <div class="todays_collections_wrap flex_all flex-column">
      <div class="today_result_wrap">
        <h3>Today's total collection is</h3>
        <div class="animation_today_tk_wrap">
          <span>0</span>&nbsp;tk
        </div>
        <div class="text-center">
          <button class="view_more_det flex_all">View more</button>
        </div>
      </div>
      <div class="today_more_details_list_wrap">
        <h4>Client who paid today</h4>
        <div class="all_list_tod_wrap">
          <ul class="cstm_scrollbar">
            

          </ul>
        </div>
      </div>
      <div class="todays_spinner_wrap">
        <div class="spinner_double"></div>
      </div>
    </div>
  </div>
  <!-- Today Collections Area End -->

  <!-- Main Area Start -->
  <main>
  <div class="cstm_alert"></div>
  <div class="cstm_overly note_overly">
    <div class="note_text_wrap cstm_scrollbar">
      <h2 class="mb-2">Note</h2>
      <p></p>
    </div>
  </div>
  <!-- Custom Confirm Start -->
  <div class="cstm_overly_off cstm_confirm show_all">
    <div class="confirm_wrap">
      <h3 class="conf_title">Are you sure to delete?</h3>
      <p class="conf_desc">This can’t be undone and you are going to delete it permanently.</p>
      <div class="confirm_btn_wrap">
        <input type="hidden" class="conf_code">
        <input type="hidden" class="actin_id_is">
        <button type="button" class="cncl_btn">Cancel</button>
        <button type="button" class="dlt_btn">Delete it</button>
      </div>
    </div>
  </div>
  <!-- Custom Confirm End -->

    <!-- Store All In One Report Section Start -->
    <div class="cstm_container">
      <h3 class="cstm_heading report_heading">Store All Reports</h3>
      <div class="all_in_one_report_wrap">
        <div class="single_report_box overflow-hidden cstm_relative total_due_boxxx">
          <h6>Total Due</h6>
          <h4 class="store_total_due_h count_h4_lenght"><span>0</span> tk</h4>
          <div class="report_bg_img">
            <img src="./img//total_due.png" alt="Taka Icon" class="img_w_100">
          </div>
        </div>
        <div class="single_report_box due_on_this_month overflow-hidden cstm_relative">
          <h6>Due on 
          <?php
          $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

          $now = $dt->format('Y-m-d H:i:s');
          $time   = strtotime($now);
          $time   = $time - (60*(60*13)); //one hour
          $beforeOneHour = date("Y-m-d H:i:s", $time);

           echo date("F", strtotime($beforeOneHour)); 
          
          ?>
           </h6>
          <h4 class="current_month_due count_h4_lenght"><span>0</span> tk</h4>
          <div class="report_bg_img">
            <img src="./img/monthly_collect.png" alt="Taka Icon" class="img_w_100">
          </div>
        </div>
        <div class="single_report_box collect_box overflow-hidden">
          <div class="client_parts_dots_wrap">
            <i class="fas fa-ellipsis-v flex_all"></i>
            <ul class="client_parts_ul">
              <li class="tdy_coll_li">Today's collections</li>
              <li data-cstm-tooltip="Not available" class="cstm_relative cstm-tooltip warning_tooltip top-center">Last week collections</li>
            </ul>
          </div>
          <h6>Due Collect On 
          <?php
          $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));

          $now = $dt->format('Y-m-d H:i:s');
          $time   = strtotime($now);
          $time   = $time - (60*(60*13)); //one hour
          $beforeOneHour = date("Y-m-d H:i:s", $time);

           echo date("F", strtotime($beforeOneHour)); 
          
          ?>
          </h6>
          <h4 class="count_h4_lenght due_cllect_on_this_mont_h"><span>0</span> tk</h4>
          <div class="report_bg_img">
            <img src="./img/taka_icon.png" alt="Taka Icon" class="img_w_100">
          </div>
        </div>
        <div class="single_report_box cstm_relative total_client_box">
          <h6>Total Clients</h6>
          <h4 class="totl_cl_count count_h4_lenght"><span>0</span></h4>
          <div class="report_bg_img">
            <img src="./img/main_client.png" alt="Taka Icon" class="img_w_100">
          </div>
        </div>
      </div>
    </div>
    <!-- Store All In One Report Section End -->


    <!-- Store Main Client Section Start -->
    <div class="cstm_container">
      <div class="all_clients_layout_wrap">
        <h3 class="cstm_heading clients_section_heading">All Clients</h3>
        <div class="layout_option_box">
          <div class="clients_search_box">
            <input type="text" placeholder="Search Client">
          </div>
          <div class="layout_box">
            <span class="flex_all list_view_span cstm-tooltip cstm_relative active_layout" data-cstm-tooltip="List view">
              <i class="fas fa-list"></i>
            </span>

            <span class="flex_all grid_view_span cstm-tooltip top-right cstm_relative"  data-cstm-tooltip="Grid view">
              <i class="fas fa-th"></i>
            </span>
          </div>
        </div>
      </div>
      
      <div class="all_clients_list_wrap">
      <div class="client_profile_view_extar_wrap">
        <!-- Single Client Add List Hidden Area Start -->
        <div class="client_profile_view_wrap">
          <div class="client_profile_wrap">
            <div class="loading_content_wrap">
              <div class="l_img delay_1"></div>
              <div class="l_line delay_2"></div>
              <div class="l_line delay_3 half_line"></div>
              <br><br>
              <div class="l_line delay_4"></div>
              <div class="l_line delay_5 half_line"></div>
              <br><br>
              <div class="l_line delay_6"></div>
              <div class="l_line delay_7 half_line"></div>
              <br><br>
              <div class="l_line delay_8"></div>
            </div>
            <div class="extra">
              <div class="client_profile_wrap_img">
                <img src="" alt="" class="img_w_100">
              </div>
              <input type="hidden" class="rafer_user_id">
              <div class="overlap_div">
                <h4 class="client_profile_name cstm_cap cstm_relative">
                  <span></span> 
                  <div class="block_toltip_div cstm_relative d-none">
                    Blocked
                  </div>
                </h4>
              </div>
              <p class="client_profile_user">User: <span></span></p>
              <div class="cstm_devider"></div>
              <p class="client_profile_total_due">Total Due: <span>0</span> tk</p>
              <p class="client_profile_last_payment">Last Payment: <span></span></p>
              <div class="cstm_devider"></div>
              <p class="client_profile_address">Address: <span class="cstm_cap"></span></p>
              <p class="client_profile_phone">Phone Number: <span></span></p>
              <p class="client_profile_email">Email: <span></span></p>
              <p class="client_profile_joined">Joined: <span></span></p>
              <p class="client_profile_gender">Gender: <span class="cstm_cap"></span></p>
              <div class="add_pay_wrap">
                <span class="add_due_list_on_off_span">Add List</span>
                <span class="payment_due_list_on_off_span">Payment</span>
              </div>
            </div>
            <div class="profile_part_on_off cstm-tooltip" data-cstm-tooltip = "Toggle sidebar">
              <i class="fas fa-chevron-left"></i>
            </div>
          </div>
          <div class="client_due_list_wrap">
            <div class="blur_div toggle_bar">
              <i class="fas fa-hand-point-left"></i>
              <h6>Close the sidebar to show list</h6>
            </div>
            
            <div class="go_one_stap_back cstm-tooltip bottom-right" data-cstm-tooltip = " Go back ">
              <i class="fas fa-times"></i>
            </div>
            <h3 class="client_due_list_wrap_heading">
            <div class="all_list_of_sml_img_wrap">
              <img src="./img/test.png" alt="" class="img_w_100">
            </div>
            All list of&nbsp;<span></span>
            </h3>
            <div class="client_due_list_wrap_filter_search">
              <div class="client_due_list_wrap_search">
                <input type="text" placeholder="Search due list">
              </div>
              <div class="client_due_list_wrap_filter cstm_relative cstm-tooltip" data-cstm-tooltip="Filter due list">
                <div class="due_fiter_div flex_all">
                  <span><p class="m-0">Last 15 rows</p> <i class="fas fa-sort-down"></i></span>
                  <input type="hidden" class="crntly_filter_value" value="15">
                  <input type="hidden" class="user_no_due_list">
                  <ul class="filter_dur_all_option_wrap user_filter_duee_list_ul_by_ow">
                    <li data-userlist-filter = '5'>Last 5 rows</li>
                    <li class="active_filter default_filter_li" data-userlist-filter = '15'>Last 15 rows</li>
                    <li data-userlist-filter = '30'>Last 30 rows</li>
                    <li data-userlist-filter = '50'>Last 50 rows</li>
                    <li data-userlist-filter = '100'>Last 100 rows</li>
                    <li data-userlist-filter = '500'>Last 500 rows</li>
                    <li data-userlist-filter = '18446744073709551615'>Lifetime</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="client_due_list_wrap_header">
              <div class="client_due_list_wrap_product_name">
                <span>Product Name</span>
              </div>
              <div class="client_due_list_wrap_product_price">
                <span>Product Price</span>
              </div>
            </div>
            <div class="ex_list_body_wrap cstm_relative">
              <div class="nothing_found_wrap flex_all due_list_nothing_found">
                <div class="nothing_found_icon_wrap">
                  <img src="./img/no_page.png" alt="Nothing Found">
                </div>
                <p class="no_res_found text-center">No result found with <span class="live_search_tag">"<span></span>"</span></p>
                <p class="try_another text-center">Try another search tag</p>
              </div>
            <div class="loading_long_bar slim_loading overflow-hidden">
              <div class="loading_bar"></div>
            </div>
            <div class="product_list_loader">
              <br>
              <div class="l_line delay_1"></div>
              <div class="l_line delay_2"></div>
              <div class="l_line delay_3"></div>
              <div class="l_line delay_4"></div>
              <div class="l_line delay_5"></div>
              <div class="l_line delay_6"></div>
              <div class="l_line delay_7"></div>
              <div class="l_line delay_8"></div>
            </div>
              <div class="client_due_list_wrap_body cstm_scrollbar cstm_relative">
                
              </div>
            </div>

            <!-- New Due List Add Form Start -->
            <div class="add_new_due_list_wrap">
              <div class="cstm_checkbox onnOffSuggest cstm-tooltip bottom-right" data-cstm-tooltip="Turn on to get bangla suggestion">
                <input type="checkbox" id="on_off_sugst" />
                <label for="on_off_sugst">
                  <div class="cstm_checkbox_boll"></div>
                </label>
              </div>
              <div class="close_add_due_form flex_all add_due_close">
                <span>&times;</span>
              </div>
              <h4 class="pay_form_heading">Add New List <i class="fas fa-sync-alt rotate_right ml-3 d-none"></i></h4>
              <form class="client_due_list_add_form">
                <div class="suggest_input_wrap cstm_relative">
                  <input type="text" placeholder="Product Name" class="product_name w-100 mr-0" >
                  <div class="suggested_word_wrap">
                    <ul class="m-0 cstm_scrollbar"></ul>
                  </div>
                </div>
                <input type="text" placeholder="Product Price" class="product_price">
                <input type="text" placeholder="Any note" class="product_note">
                <input type="hidden" class="hidden_user_id_due_list" >
                <input type="hidden" class="form_submit_yes_no" value="true">
                <button type="submit">Add</button>
              </form>
            </div>
            <!-- New Due List Add Form End -->

            <!-- Payment Add Form End -->
            <div class="payment_list_wrap">
              <div class="close_add_due_form flex_all payment_close">
                <span>&times;</span>
              </div>
              <h4 class="pay_form_heading">Payment Form <i class="fas fa-sync-alt rotate_right d-none"></i></h4>
              <form class="client_payment_form">
                <div class="pay_formm_wrap">
                  <div class="payment_box client_due_total_input">
                    <label for="due_pay">Total Due</label>
                    <input type="text" id="due_pay" disabled>
                  </div>
                  <div class="payment_box client_due_total_pay_input">
                    <label for="pay_amount">Pay Amount</label>
                    <input type="text" id="pay_amount">
                  </div>
                  <div class="payment_box client_due_will_input">
                    <label for="due_amount">Due Amount</label>
                    <input type="text" id="due_amount" disabled>
                  </div>
                  <div class="payment_box payment_box_submit">
                    <button type="submit" class="user_pay_submit_btnn">Pay</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- Payment Add Form End -->

          </div>

        </div>
      </div>
        <!-- Single Client Add List Hidden Area End -->

      <div class="all_down_part_wrap">
        <!-- All Client List Header Area Start -->
        <div class="all_clients_list_header">
          <div class="clietn_details text-left">
            <span>Client Details</span>
          </div>
          <div class="clietn_current_due">
            <span>Total Due</span>
          </div>
          <div class="clietn_last_payment_date">
            <span>Last Payment</span>
          </div>
          <div class="clietn_since">
            <span>Client Joined</span>
          </div>
        </div>
        <!-- All Client Action Wrap Start -->
        <div class="all_c_action_wrap">
          <button class="delete_all_btn">Delete</button>
          <button class="send_request_btn cstm_relative cstm-tooltip warning_tooltip bottom-center" data-cstm-tooltip="Not available">Send Payement Request</button>
          <button class="block_all_btn">Block</button>
        </div>
        <!-- All Client Action Wrap End -->
        <!-- All Client List Header Area End -->
        

        
        <div class="ex_client_search_wrap cstm_relative">
          <div class="nothing_found_wrap flex_all client_nothing_found">
            <div class="nothing_found_icon_wrap">
              <img src="./img/no_page.png" alt="Nothing Found">
            </div>
            <p class="no_res_found text-center">No result found with <span class="live_search_tag">"<span></span>"</span></p>
            <p class="try_another text-center">Try another search tag</p>
          </div>
          <div class="all_clients_list_body mobile_view cstm_scrollbar">
            <div class="loading_long_bar slim_loading">
              <div class="loading_bar"></div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <!-- Store Main Client Section End -->
  </main>
  <!-- Main Area End -->


  <!-- Footer Area Start -->
  <footer></footer>
  <!-- Footer Area End -->

  <!-- Jquery Library File -->
  <script src="./vendor/jquery/jquery.js"></script>
  <script src="./vendor/confetti/confetti.js"></script>
  <!-- Bootstrap JS File -->
  <script src="./vendor/bootstrap/bootstrap.min.js"></script>
  <!-- Main Custom JS File -->
  <script src="./js/main.js"></script>
  <script src="./js/app.js"></script>
</body>
</html>