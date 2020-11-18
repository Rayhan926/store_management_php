<?php

require_once './config/db.php';

if (isset($_COOKIE["t35e6and45easn"]) && isset($_COOKIE["p35edasdd785easd"]) && isset($_COOKIE["i35esda5asd"])) {
  $token = $_COOKIE["t35e6and45easn"];
  $pass = $_COOKIE["p35edasdd785easd"];
  $id = $_COOKIE["i35esda5asd"];
  $check = "SELECT * FROM users WHERE user_password = '$pass' && user_token = '$token' && user_action = 'unblock' && id = '$id' ";
  $run_check = mysqli_query($connect, $check);
  if ($run_check == true) {
    if (mysqli_num_rows($run_check) !== 1) {
      header("location: no-page.php");
    }
  }
}else{
  header("location: ./login.php");
}

include "profile_function.php";


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <!-- Bootstrap CSS File -->
    <link rel="stylesheet" href="./vendor/bootstrap/bootstrap.min.css" />
    <!-- Fontawesome Css File -->
    <link rel="stylesheet" href="./vendor/fontawesome/css/all.min.css" />
    <!-- Main Custom CSS File -->
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/dark_off.css" class="dark_theme" />
    <!-- Responsive Css File -->
    <link rel="stylesheet" href="./css/responsive.css" />
  </head>
  <body>
    <!-- User Overly All Settings Wrap Start -->
    <div class="cstm_alert"></div>

    <div class="cstm_overly_off flex_all user_setting_overly">
      <div class="cstm_close flex_all">
        <i class="fas fa-times"></i>
      </div>

      <div class="user_settings_wrap">
        <h3 class="text-center">Set up your profile settings</h3>

        <div class="all_settings_tab_wrap cstm_scrollbar">
          <!-- Single Setting Tab Start -->
          <div class="single_setting_tab">
            <div class="setting_tab_title_div">
              <input type="hidden" class="tab_input" value="off_tab" />
              <h4 class="m-0">Change Password</h4>
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="setting_tab_body_div">
              <br />
              <form action="#">
                <div class="form-group">
                  <label class="form-label" for="curnt_pass"
                    >Current Password</label
                  >
                  <input
                    id="curnt_pass"
                    class="form-input input_animated"
                    type="text"
                  />
                </div>
                <div class="form-group">
                  <label class="form-label" for="new_pass">New Password</label>
                  <input
                    id="new_pass"
                    class="form-input input_animated"
                    type="text"
                  />
                </div>
                <div class="form-group">
                  <label class="form-label" for="confirm_pass"
                    >Confirm Password</label
                  >
                  <input
                    id="confirm_pass"
                    class="form-input input_animated"
                    type="text"
                  />
                </div>
                <button type="submit" class="cstm_btn">Change Password</button>
              </form>
            </div>
          </div>
          <!-- Single Setting Tab End -->

          <!-- Single Setting Tab Start -->
          <div class="single_setting_tab">
            <div class="setting_tab_title_div ch_pr_pic_tab">
              <input type="hidden" class="tab_input" value="off_tab" />
              <h4 class="m-0">Change Profile Picture</h4>
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="setting_tab_body_div">
              <div class="profile_pic_change_wrap">
                <div class="profile_pic_preview">
                  <img
                    src="./users_photo/<?php get_info('pic');?>"
                    alt=""
                    class="img_w_100"
                  />
                </div>
                <div class="profile_pic_action_wrap">
                  <button class="cstm_btn">Chose picture</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Single Setting Tab End -->

          <!-- Single Setting Tab Start -->
          <div class="single_setting_tab">
            <div class="setting_tab_title_div">
              <input type="hidden" class="tab_input" value="off_tab" />
              <h4 class="m-0">Manage e-mail address</h4>
              <i class="fas fa-chevron-down"></i>
            </div>
            <div class="setting_tab_body_div">
              <form action="#">
                <div class="all_added_email_show_wrap cstm_scrollbar">
                  <div class="single_email_as_a_username_wrap">
                    <div class="cstm_radio">
                      <input type="radio" id="cstm_rad" />
                      <label for="cstm_rad">
                        <div class="cstm_radio_boll"></div>
                      </label>
                    </div>
                    <label
                      for="cstm_rad"
                      class="email_to_user_label cstm_tooltip_top cstm_relative"
                      data-cstm-tooltip="Click to set as a Username"
                      >rayhanbd7075@gmail.com</label
                    >

                    <div class="single_email_actions">
                      <i class="fas fa-trash"></i>
                    </div>
                  </div>
                </div>
                <button type="submit" class="cstm_btn_small">Save</button>
              </form>
              <span class="add_new_email_span">Add new e-mail</span>
              <div class="add_new_email_user_wrap">
                <h6>Add new e-mail</h6>
                <form action="#">
                  <div class="form-group">
                    <label class="form-label" for="curnt_pass"
                      >Enter your e-mail</label
                    >
                    <input
                      id="curnt_pass"
                      class="form-input input_animated"
                      type="text"
                    />
                  </div>
                  <button type="submit" class="cstm_btn">Add</button>
                </form>
              </div>
            </div>
          </div>
          <!-- Single Setting Tab End -->
        </div>
      </div>
    </div>

    <!-- User Overly All Settings Wrap End -->

    <!-- User Profile Header Start -->
    <header class="user_header">
      <div class="store_logo_for_user_profile nadira_logo">
        <a href="#">Nadira Store</a>
      </div>
      <!-- <div class="user_welcome_div">
      <span>Good morning Saymon</span>
    </div> -->
      <div class="user_log_out_wrap">
        <div class="cstm_relative notification_li user_notification_wrap cstm_relative cstm-tooltip warning_tooltip left-center" data-cstm-tooltip="Not available">
          <span><i class="fas fa-bell animated_icon_s"></i></span>
          <div class="notifications_wrap">
            <div class="go_top_notification flex_all click_to_up">
              <i class="fas fa-chevron-up"></i>
            </div>

            <div class="notification_header">
              <h4 class="cstm_heading">Notifications</h4>
              <p>Clear all</p>
            </div>
            <div class="notification_body cstm_scrollbar">
              <!-- New Notification Wrap Start -->
              <div class="notification_new_wrap">
                <h6 class="cstm_heading notification_part_heading">New</h6>

                <!-- Single Notification Start -->
                <div class="single_notification_wrap">
                  <div class="notification_time flex_all">
                    <p><i class="fas fa-clock"></i>5 min</p>
                  </div>
                  <div class="single_notification_img">
                    <img src="./img/test.png" alt="" class="img_w_100" />
                  </div>
                  <div class="single_notificaticontent">
                    <h5>Payment Succes</h5>
                    <p>
                      Saymon just pay 1500 tk on Nadira Store just just pay 1500
                      tk on Nadira Store pay 1500 tk on Nadira Store
                    </p>
                  </div>
                </div>
                <!-- Single Notification End -->

                <!-- Single Notification Start -->
                <div class="single_notification_wrap">
                  <div class="notification_time flex_all">
                    <p><i class="fas fa-clock"></i>5 min</p>
                  </div>
                  <div class="single_notification_img">
                    <img src="./img/test.png" alt="" class="img_w_100" />
                  </div>
                  <div class="single_notificaticontent">
                    <h5>Payment Succes</h5>
                    <p>
                      Saymon just pay 1500 tk on Nadira Store just just pay 1500
                      tk on Nadira Store pay 1500 tk on Nadira Store
                    </p>
                  </div>
                </div>
                <!-- Single Notification End -->

                <!-- Single Notification Start -->
                <div class="single_notification_wrap">
                  <div class="notification_time flex_all">
                    <p><i class="fas fa-clock"></i>5 min</p>
                  </div>
                  <div class="single_notification_img">
                    <img src="./img/test.png" alt="" class="img_w_100" />
                  </div>
                  <div class="single_notificaticontent">
                    <h5>Payment Succes</h5>
                    <p>
                      Saymon just pay 1500 tk on Nadira Store just just pay 1500
                      tk on Nadira Store pay 1500 tk on Nadira Store
                    </p>
                  </div>
                </div>
                <!-- Single Notification End -->

                <!-- Single Notification Start -->
                <div class="single_notification_wrap">
                  <div class="notification_time flex_all">
                    <p><i class="fas fa-clock"></i>5 min</p>
                  </div>
                  <div class="single_notification_img">
                    <img src="./img/test.png" alt="" class="img_w_100" />
                  </div>
                  <div class="single_notificaticontent">
                    <h5>Payment Succes</h5>
                    <p>
                      Saymon just pay 1500 tk on Nadira Store just just pay 1500
                      tk on Nadira Store pay 1500 tk on Nadira Store
                    </p>
                  </div>
                </div>
                <!-- Single Notification End -->

                <!-- Single Notification Start -->
                <div class="single_notification_wrap">
                  <div class="notification_time flex_all">
                    <p><i class="fas fa-clock"></i>5 min</p>
                  </div>
                  <div class="single_notification_img">
                    <img src="./img/test.png" alt="" class="img_w_100" />
                  </div>
                  <div class="single_notificaticontent">
                    <h5>Payment Succes</h5>
                    <p>Saymon just pay 1500 tk on Nadira</p>
                  </div>
                </div>
                <!-- Single Notification End -->
              </div>
              <!-- New Notification Wrap End -->

              <!-- Earlier Notification Wrap Start -->
              <div class="notification_new_wrap">
                <h6 class="cstm_heading notification_part_heading">Earlier</h6>

                <!-- Single Notification Start -->
                <div class="single_notification_wrap">
                  <div class="notification_time flex_all">
                    <p><i class="fas fa-clock"></i>5 min</p>
                  </div>
                  <div class="single_notification_img">
                    <img src="./img/test.png" alt="" class="img_w_100" />
                  </div>
                  <div class="single_notificaticontent">
                    <h5>Payment Succes</h5>
                    <p>
                      Saymon just pay 1500 tk on Nadira Store just just pay 1500
                      tk on Nadira Store pay 1500 tk on Nadira Store
                    </p>
                  </div>
                </div>
                <!-- Single Notification End -->
                <!-- Single Notification Start -->
                <div class="single_notification_wrap">
                  <div class="notification_time flex_all">
                    <p><i class="fas fa-clock"></i>5 min</p>
                  </div>
                  <div class="single_notification_img">
                    <img src="./img/test.png" alt="" class="img_w_100" />
                  </div>
                  <div class="single_notificaticontent">
                    <h5>Payment Succes</h5>
                    <p>Saymon just pay 1500 tk on Nadira</p>
                  </div>
                </div>
                <!-- Single Notification End -->
              </div>
              <!-- Earlier Notification Wrap End -->
            </div>
          </div>
        </div>

        <!-- <div class="animated_bell flex_all user_notification_bell">
      <i class="fas fa-bell"></i>
    </div> -->

        <div class="would_u_like_to_pic">
          <p>Would you like to set your profile picture?</p>
          <p>Your profile picture always prove your identity correctly.</p>
          <div class="would_u_like_to_pic_btn_wrap">
            <button type="button" class="not_now_btn">Not now</button>
            <button type="button" class="yes_btn">Yes</button>
          </div>
        </div>

        <div class="totlat_due_show_wrap">
          <h5>
            Total due:
            <?php user_total_due($_COOKIE["i35esda5asd"])?>
            tk
          </h5>
          <p>Last payment: <?php echo last_pay_date();?></p>
        </div>

        <div class="user_profile_pic user_p_pic_sml_check">
          <img src="./users_photo/<?php get_info('pic');?>" alt="" />
        </div>
        <div class="user_drop_down_nav">
          <div class="user_big_profile_pic">
            <img src="./users_photo/<?php get_info('pic');?>" alt="" />
          </div>
          <h5><?php get_info('name');?></h5>
          <span
            >User:
            <?php get_info('user');?></span
          >
          <ul class="user_actions_wrap">
            <li class="user_dark_mode_on_off cstm_relative cstm-tooltip warning_tooltip bottom-left" data-cstm-tooltip="Not available">
              <i class="fas fa-moon"></i>Dark mode
              <div class="cstm_checkbox">
                <input type="checkbox" id="cstm_ckeck" />
                <label for="cstm_ckeck">
                  <div class="cstm_checkbox_boll"></div>
                </label>
              </div>
            </li>
            <li class="user_notification_li cstm_relative cstm-tooltip warning_tooltip bottom-left"  data-cstm-tooltip="Not available">
              <i class="fas fa-bell"></i>Notifications
            </li>
            <li class="user_settings_on_li cstm_relative cstm-tooltip warning_tooltip bottom-left"  data-cstm-tooltip="Not available">
              <i class="fas fa-cog"></i>Settings
            </li>
            <li>
              <a href="./profile_function.php?log_out_1"
                ><i class="fas fa-sign-out-alt"></i>Log out</a
              >
            </li>
          </ul>
        </div>
      </div>
    </header>
    <!-- User Profile Header End -->

    <!-- User All Due Start -->
    <div class="user_all_due_wrap">
      <h3 class="cstm_heading">Your all due records on Nadira Store</h3>

      <div class="due_filter_and_search_wrap">
        <div class="due_search_div">
          <input type="text" placeholder="Search due list" />
        </div>
        <div class="due_fiter_div flex_all">
          <span class="curnt_active_filter_span"
            >Last 15 rows <i class="fas fa-sort-down"></i
          ></span>

          <ul class="filter_dur_all_option_wrap user_filter_ul_wrap">
            <li data-filter-value="5">Last 5 rows</li>
            <li data-filter-value="15" class="active_filter">Last 15 rows</li>
            <li data-filter-value="30">Last 30 rows</li>
            <li data-filter-value="50">Last 50 rows</li>
            <li data-filter-value="100">Last 100 rows</li>
            <li data-filter-value="500">Last 500 rows</li>
            <li data-filter-value="18446744073709551615">Lifetime</li>
          </ul>
        </div>
      </div>

      <div class="due_product_title_wrap">
        <div class="product_name_div">
          <span>Product Name</span>
        </div>
        <div class="product_price_div">
          <span>Product Price</span>
        </div>
      </div>
      <div
        class="all_due_list_showcase_wrap cstm_relative cstm_scrollbar"
      ></div>
    </div>
    <!-- User All Due End -->

    <!-- Jquery Library File -->
    <script src="./vendor/jquery/jquery.js"></script>
    <!-- Bootstrap JS File -->
    <script src="./vendor/bootstrap/bootstrap.min.js"></script>
    <!-- Main Custom JS File -->
    <script src="./js/main.js"></script>
    <script defer>
      function cstm_tooltip() {
        $(".cstm-tooltip").each(function () {
          var tool_tip_content = $(this).data("cstm-tooltip");
          var tool_tip_class = $(this).data("cstm-tooltip-class");

          let text_align = "";
          let final_width = "";
          let t_t_c = "";

          if (tool_tip_class == undefined) {
            t_t_c = "";
          } else {
            t_t_c = tool_tip_class;
          }

          var txt_length = tool_tip_content.length;

          // var width = $(this).outerWidth();
          var tool_tip_width = 5.9 * txt_length + 16;

          if (txt_length > 0) {
            final_width = "width: " + tool_tip_width + "px;";
            text_align = "text-align: center;";

            $(this).append(
              '<div class="cstm-tooltip-box ' +
                t_t_c +
                '" style="' +
                final_width +
                " " +
                text_align +
                '" >' +
                tool_tip_content +
                "</div>"
            );
          }
        });
      }
      cstm_tooltip();
    </script>
  </body>
</html>
