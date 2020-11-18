<?php
  include "./config/db.php";

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

<!-- Header Area Start -->
<header class="main_header">
  <!-- Create New Client Start -->
  <div class="cstm_overly_off flex_all create_new_client_overly">
    <div class="cstm_close flex_all">
      <i class="fas fa-times"></i>
    </div>

    <div class="cr_new_cl_wrap c_new_wrap">
      <div class="cstm_successfull">
        <p></p>
      </div>

      <div class="loading_long_bar">
        <div class="loading_bar"></div>
      </div>

      <h4 class="cstm_heading">Create New Client</h4>
      <form action="#" class="create_new_client_form">
        <div class="two_part_box">
          <div class="form-group">
            <label class="form-label"
              >Client Name<span class="red_start">*</span></label
            >
            <input
              class="form-input input_animated c_1"
              type="text"
              name="c_1"
              autocomplete="off"
            />
          </div>
          <div class="form-group">
            <label class="form-label"
              >Address<span class="red_start">*</span></label
            >
            <input
              class="form-input input_animated c_address"
              type="text"
              name="c_address"
              autocomplete="off"
            />
          </div>
        </div>
        <div class="two_part_box">
          <div class="form-group">
            <label class="form-label"
              >Phone Number<span class="red_start">*</span></label
            >
            <input
              class="form-input input_animated c_2"
              type="text"
              name="c_2"
              autocomplete="off"
            />
          </div>
          <div class="gander_box">
            <!-- <span>Gander<span class="red_start">*</span></span> -->

            <div class="male_box">
              <label for="male_radio">Male</label>
              <div class="cstm_radio">
                <input
                  type="radio"
                  id="male_radio"
                  name="c_3"
                  value="male"
                  class="c_3"
                />
                <label for="male_radio">
                  <div class="cstm_radio_boll"></div>
                </label>
              </div>
            </div>

            <div class="male_box">
              <label for="female_radio">Female</label>
              <div class="cstm_radio">
                <input
                  type="radio"
                  id="female_radio"
                  name="c_3"
                  value="female"
                  class="c_3"
                />
                <label for="female_radio">
                  <div class="cstm_radio_boll"></div>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="two_part_box">
          <div class="form-group">
            <label class="form-label">Email</label>
            <input
              class="form-input input_animated c_4"
              type="text"
              name="c_4"
              autocomplete="off"
            />
          </div>
          <div class="profile_img_create text-center">
            <div class="c_pic_preview_wrap">
              <img src="./img/test.png" class="img_w_100" alt="" />
            </div>
            <div class="c_pic_select_btn_wrap text-right">
              <button class="cstm_btn_small c_chose_btn" type="button">
                Chose Profile Pic
              </button>
              <button type="button" class="cstm_btn_small c_pic_cancel">
                Cancel
              </button>
            </div>
            <input type="file" class="d-none hidden_file_c" name="c_5" />
          </div>
        </div>
        <div class="two_part_box">
          <div class="form-group">
            <label class="form-label"
              >Username<span class="red_start">*</span></label
            >
            <input
              class="form-input input_animated c_6"
              type="text"
              name="c_6"
              autocomplete="off"
            />
          </div>
          <div class="form-group cstm_relative">
            <div class="password_show_hide">
              <i class="fas fa-eye"></i>
            </div>
            <label class="form-label"
              >Password<span class="red_start">*</span></label
            >
            <input
              class="form-input input_animated c_7 p_r45"
              type="password"
              name="c_7"
              autocomplete="off"
            />
          </div>
        </div>
        <button type="submit" class="cstm_btn w-100 submit_c_btn">
          Create New Client
        </button>
      </form>
    </div>
  </div>
  <!-- Create New Client End -->

  <!-- Edit Client Form Start -->
  <div class="cstm_overly_off flex_all edit_client_overly">
    <div class="cstm_close flex_all">
      <i class="fas fa-times"></i>
    </div>

    <div class="cr_new_cl_wrap edit_c_wrap">
      <div class="cstm_successfull">
        <p></p>
      </div>

      <div class="loading_long_bar">
        <div class="loading_bar"></div>
      </div>

      <h4 class="cstm_heading">Edit Client</h4>
      <form action="#" class="edit_client_form">
        <div class="two_part_box">
          <div class="form-group">
            <label class="form-label"
              >Client Name<span class="red_start">*</span></label
            >
            <input
              class="form-input input_animated c_1"
              type="text"
              name="c_1_edit"
              autocomplete="off"
            />
          </div>
          <div class="form-group">
            <label class="form-label"
              >Address<span class="red_start">*</span></label
            >
            <input
              class="form-input input_animated c_address_edit"
              type="text"
              name="c_address_edit"
              autocomplete="off"
            />
          </div>
        </div>
        <div class="two_part_box">
          <div class="form-group">
            <label class="form-label"
              >Phone Number<span class="red_start">*</span></label
            >
            <input
              class="form-input input_animated c_2"
              type="text"
              name="c_2_edit"
              autocomplete="off"
            />
          </div>
          <div class="gander_box">
            <!-- <span>Gander<span class="red_start">*</span></span> -->
            <div class="male_box">
              <label for="male_radio_edit">Male</label>
              <div class="cstm_radio">
                <input
                  type="radio"
                  id="male_radio_edit"
                  name="c_3_edit"
                  value="male"
                  class="c_3"
                />
                <label for="male_radio_edit">
                  <div class="cstm_radio_boll"></div>
                </label>
              </div>
            </div>

            <div class="male_box">
              <label for="female_radio_edit">Female</label>
              <div class="cstm_radio">
                <input
                  type="radio"
                  id="female_radio_edit"
                  name="c_3_edit"
                  value="female"
                  class="c_3"
                />
                <label for="female_radio_edit">
                  <div class="cstm_radio_boll"></div>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="two_part_box">
          <div class="form-group">
            <label class="form-label">Email</label>
            <input
              class="form-input input_animated c_4"
              type="text"
              name="c_4_edit"
              autocomplete="off"
            />
          </div>
          <div class="profile_img_create text-center">
            <div class="c_pic_preview_wrap">
              <img src="" class="img_w_100" alt="" />
            </div>
            <div class="c_pic_select_btn_wrap text-right">
              <button class="cstm_btn_small c_chose_btn" type="button">
                Chose Profile Pic
              </button>
              <button type="button" class="cstm_btn_small c_pic_cancel">
                Cancel
              </button>
            </div>
            <input type="file" class="d-none hidden_file_c" name="c_5_edit" />
          </div>
        </div>
        <input
          type="hidden"
          name="curnt_pic_path"
          value=""
          class="curnt_pic_path"
        />
        <input type="hidden" name="user_edit_id" class="user_edit_id" />
        <button type="submit" class="cstm_btn w-100 submit_c_edit_btn">
          Edit Client
        </button>
      </form>
    </div>
  </div>
  <!-- Edit Client Form End -->

  <!-- Edit Single Due List Form Start -->
  <div class="cstm_overly_off flex_all edit_due_list_overly">
    <div class="cstm_close flex_all">
      <i class="fas fa-times"></i>
    </div>

    <div class="cr_new_cl_wrap edit_due_list_wrap">
      <div class="cstm_successfull">
        <p></p>
      </div>

      <div class="loading_long_bar">
        <div class="loading_bar"></div>
      </div>

      <h4 class="cstm_heading">Edit Due List</h4>
      <form class="edit_due_list_form">
        <div class="form-group">
          <label class="form-label"
            >Product Name<span class="red_start">*</span></label
          >
          <input
            class="form-input input_animated edit_p_name"
            type="text"
            autocomplete="off"
          />
        </div>
        <div class="form-group">
          <label class="form-label"
            >Product Price<span class="red_start">*</span></label
          >
          <input
            class="form-input input_animated edit_p_price"
            type="text"
            autocomplete="off"
          />
        </div>
        <div class="form-group">
          <label class="form-label">Product Note</label>
          <input
            class="form-input input_animated edit_p_note"
            type="text"
            autocomplete="off"
          />
        </div>
        <input type="hidden" class="edit_p_id" />
        <button type="submit" class="cstm_btn w-100 submit_c_edit_btn">
          Edit List
        </button>
      </form>
    </div>
  </div>
  <!-- Edit Single Due List Form End -->

  <!-- Edit Admin Form Start -->
  <div class="cstm_overly_off flex_all edit_admin_overly top_off">
    <div class="cstm_close flex_all">
      <i class="fas fa-times"></i>
    </div>

    <div class="cr_new_cl_wrap edit_admn_wrap">
      <div class="cstm_successfull">
        <p></p>
      </div>

      <div class="loading_long_bar">
        <div class="loading_bar"></div>
      </div>

      <h4 class="cstm_heading">Edit Admin</h4>
      <form action="#" class="edit_admin_form">
        <div class="form-group">
          <label class="form-label"
            >Admin Name<span class="red_start">*</span></label
          >
          <input
            class="form-input input_animated c_1"
            type="text"
            name="admn_1_edit"
            autocomplete="off"
          />
        </div>

        <div class="gander_box">
          <span>Gander<span class="red_start">*</span></span>

          <div class="male_box">
            <label for="male_radio_edit_admin">Male</label>
            <div class="cstm_radio">
              <input
                type="radio"
                id="male_radio_edit_admin"
                name="admn_3_edit"
                value="male"
                class="c_3"
              />
              <label for="male_radio_edit_admin">
                <div class="cstm_radio_boll"></div>
              </label>
            </div>
          </div>

          <div class="male_box">
            <label for="female_radio_edit_admin">Female</label>
            <div class="cstm_radio">
              <input
                type="radio"
                id="female_radio_edit_admin"
                name="admn_3_edit"
                value="female"
                class="c_3"
              />
              <label for="female_radio_edit_admin">
                <div class="cstm_radio_boll"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="two_part_box">
          <div class="form-group">
            <label class="form-label">Email</label>
            <input
              class="form-input input_animated c_4"
              type="text"
              name="admn_4_edit"
              autocomplete="off"
            />
          </div>
          <div class="profile_img_create text-center">
            <div class="c_pic_preview_wrap">
              <img src="" class="img_w_100" alt="" />
            </div>
            <div class="c_pic_select_btn_wrap text-right">
              <button class="cstm_btn_small c_chose_btn" type="button">
                Chose Profile Pic
              </button>
              <button type="button" class="cstm_btn_small c_pic_cancel">
                Cancel
              </button>
            </div>
            <input
              type="file"
              class="d-none hidden_file_c"
              name="admn_5_edit"
            />
          </div>
        </div>
        <input
          type="hidden"
          name="curnt_pic_path_admn"
          value=""
          class="curnt_pic_path"
        />
        <input type="hidden" name="admn_edit_id" class="user_edit_id" />
        <button type="submit" class="cstm_btn w-100 submit_c_edit_btn">
          Edit Admin
        </button>
      </form>
    </div>
  </div>
  <!-- Edit Admin Form End -->

  <!-- Create New Admin Start -->
  <div class="cstm_overly_off flex_all new_admin_setting_overly">
    <div class="cstm_close flex_all">
      <i class="fas fa-times"></i>
    </div>

    <div class="cr_new_cl_wrap cr_new_admin_wrap">
      <div class="cstm_successfull">
        <p></p>
      </div>

      <div class="loading_long_bar">
        <div class="loading_bar"></div>
      </div>

      <h4 class="cstm_heading">Create New Admin</h4>
      <form action="#" class="cr_new_admin_form">
        <div class="form-group">
          <label class="form-label"
            >Your Name<span class="red_start">*</span></label
          >
          <input
            class="form-input input_animated c_1"
            type="text"
            name="admin_name"
          />
        </div>

        <div class="gander_box">
          <span>Gander<span class="red_start">*</span></span>

          <div class="male_box">
            <label for="admin_male_radio">Male</label>
            <div class="cstm_radio">
              <input
                type="radio"
                id="admin_male_radio"
                class="c_2"
                name="admin_gender"
                value="male"
              />
              <label for="admin_male_radio">
                <div class="cstm_radio_boll"></div>
              </label>
            </div>
          </div>

          <div class="male_box">
            <label for="admin_female_radio">Female</label>
            <div class="cstm_radio">
              <input
                type="radio"
                id="admin_female_radio"
                class="c_2"
                name="admin_gender"
                value="female"
              />
              <label for="admin_female_radio">
                <div class="cstm_radio_boll"></div>
              </label>
            </div>
          </div>
        </div>
        <div class="two_part_box">
          <div class="form-group">
            <label class="form-label">Email</label>
            <input
              class="form-input input_animated c_3"
              type="text"
              name="admin_email"
            />
          </div>
          <div class="profile_img_create text-center">
            <div class="c_pic_preview_wrap">
              <img src="./img/test.png" class="img_w_100" alt="" />
            </div>
            <div class="c_pic_select_btn_wrap text-right">
              <button class="cstm_btn_small admin_pic_chose_btn" type="button">
                Chose Profile Pic
              </button>
              <button type="button" class="cstm_btn_small c_pic_cancel">
                Cancel
              </button>
            </div>
            <input
              type="file"
              name="admin_pic"
              class="admin_pic_input d-none"
            />
          </div>
        </div>
        <div class="two_part_box">
          <div class="form-group">
            <label class="form-label"
              >Username<span class="red_start">*</span></label
            >
            <input
              class="form-input input_animated c_4"
              type="text"
              name="admin_username"
            />
          </div>
          <div class="form-group cstm_relative">
            <div class="password_show_hide">
              <i class="fas fa-eye"></i>
            </div>
            <label class="form-label"
              >Password<span class="red_start">*</span></label
            >
            <input
              class="form-input input_animated c_5 p_r45"
              type="password"
              name="admin_password"
            />
          </div>
        </div>
        <button type="submit" class="cstm_btn w-100 submit_c_btn">
          Create New Admin
        </button>
      </form>
    </div>
  </div>
  <!-- Create New Admin End -->

  <!-- Our Overly All Settings Wrap Start -->
  <div class="cstm_overly_off flex_all our_setting_overly">
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
          <div class="setting_tab_body_div ow_pass_body_div cstm_relative">
            <div class="loading_long_bar slim_loading profile_pic_load_owner">
              <div class="loading_bar"></div>
            </div>
            <br />
            <form class="owner_chng_pass_whn_loged_in_form">
              <input type="hidden" class="ver_fi_cation_on_off" />
              <div class="form-group ow_cur_nt_pass">
                <div class="password_show_hide">
                  <i class="fas fa-eye"></i>
                </div>
                <label class="form-label" for="curnt_pass"
                  >Current Password</label
                >
                <input
                  id="curnt_pass"
                  class="form-input input_animated crnt_ow_pass pr_45"
                  type="password"
                />
              </div>
              <div class="form-group ow_ver_fication_code">
                <label class="form-label" for="curnt_vari"
                  >Verification code</label
                >
                <input
                  id="curnt_vari"
                  class="form-input input_animated ow_ver_cod_inpt"
                  type="text"
                />
              </div>
              <div class="form-group">
                <div class="password_show_hide">
                  <i class="fas fa-eye"></i>
                </div>
                <label class="form-label" for="new_pass">New Password</label>
                <input
                  id="new_pass"
                  class="form-input input_animated new_ow_pass pr_45"
                  type="password"
                />
              </div>
              <div class="form-group">
                <div class="password_show_hide">
                  <i class="fas fa-eye"></i>
                </div>
                <label class="form-label" for="confirm_pass"
                  >Confirm Password</label
                >
                <input
                  id="confirm_pass"
                  class="form-input input_animated con_ow_pass pr_45"
                  type="password"
                />
              </div>
              <p class="ow_pass_change_error_p"></p>
              <div class="d-flex justify-content-between align-items-center">
                <button
                  type="submit"
                  class="cstm_btn owner_chng_pass_whn_loged_in_btn"
                >
                  Change Password
                </button>
                <div class="ow_for_got_pass_rap">
                  <span class="forgot_pass mt-1 ow_frogot_pass_whn_lg_in"
                    >Forgot password?</span
                  >
                  <span
                    class="forgot_pass mt-1 d-block ow_frogot_pass_loading text-decoration-none"
                  ></span>
                  <span
                    class="forgot_pass mt-1 ow_frogot_pass_whn_lg_in_re_send"
                    >Resend code</span
                  >
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- Single Setting Tab End -->

        <!-- Single Setting Tab Start -->
        <div class="single_setting_tab">
          <div class="setting_tab_title_div">
            <input type="hidden" class="tab_input" value="off_tab" />
            <h4 class="m-0">Change Profile Picture</h4>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="setting_tab_body_div cstm_relative">
            <div class="loading_long_bar slim_loading profile_pic_load_owner">
              <div class="loading_bar"></div>
            </div>
            <div class="profile_pic_change_wrap">
              <div class="profile_pic_preview profile_pic_preview_owner">
                <img
                  src="./users_photo/<?php owner_data('pic')?>"
                  alt=""
                  class="img_w_100"
                />
              </div>
              <div class="profile_pic_action_wrap">
                <button
                  class="cstm_btn_small owner_pro_pic_chose_btn"
                  type="button"
                >
                  Chose picture
                </button>
                <button
                  class="cstm_btn_small owner_pro_pic_cancel_btn d-none"
                  type="button"
                >
                  Cancel
                </button>
                <form class="d-inline-block owner_chng_pic_form">
                  <div class="owner_pro_pic_chose_input_wrap d-none">
                    <input
                      type="file"
                      name="owner_pro_pic_inp"
                      class="owner_pro_pic_inp_cls"
                    />
                  </div>
                  <button
                    class="cstm_btn_small owner_pro_pic_save_btn d-none"
                    type="submit"
                  >
                    Save
                  </button>
                </form>
                <span class="owner_pro_pic_chose_again_btn d-none"
                  >Chose again</span
                >
              </div>
            </div>
          </div>
        </div>
        <!-- Single Setting Tab End -->

        <!-- Single Setting Tab Start -->
        <div class="single_setting_tab cstm_relative cstm-tooltip warning_tooltip top-right tip-bottom-left" data-cstm-tooltip="Not available">
          <div class="setting_tab_title_div">
            <input type="hidden" class="tab_input" value="off_tab" />
            <h4 class="m-0">Change E-mail Address</h4>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="setting_tab_body_div">
            <form class="mt-3">
              <div class="form-group">
                <label class="form-label" for="confirm_pass_email"
                  >Enter your new email</label
                >
                <input
                  id="confirm_pass_email"
                  class="form-input input_animated con_ow_pass"
                  type="text"
                />
              </div>
              <button type="submit" class="cstm_btn_small">Change</button>
              <p class="ow_crnt_email_is_p">
                Current email: <span>rayhanbd7075@gmail.com</span>
              </p>
            </form>
          </div>
        </div>
        <!-- Single Setting Tab End -->

        <!-- Single Setting Tab Start -->
        <div class="single_setting_tab">
          <div class="setting_tab_title_div">
            <input type="hidden" class="tab_input" value="off_tab" />
            <h4 class="m-0">Two Step Verification</h4>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="setting_tab_body_div">
            <div class="tow_fector_verification_wrap">
              <label class="two_step_title two_step_title_ow_clck mt-0"
                >Two step verification
                <p
                  class="crntly_is_on_pp tw_stp_off_p_txt <?php echo two_step_check('on_off')?>"
                >
                  Currently is
                  <?php echo two_step_check('on_off')?>
                </p>
              </label>
              <div class="cstm_checkbox mt-2">
                <input type="checkbox" class="owner_t_stp_inp"
                <?php echo two_step_check('check')?>>
                <label class="owner_t_stp_on_click">
                  <div
                    class="cstm_checkbox_boll overflow-hidden owner_t_stp_on_boll d-flex justify-content-center align-items-center"
                  >
                    <img src="" class="img_w_100" alt="" />
                  </div>
                </label>
              </div>
            </div>
          </div>
        </div>
        <!-- Single Setting Tab End -->
      </div>
    </div>
  </div>
  <!-- Our Overly All Settings Wrap End -->

  <!-- Store Overly All Settings Wrap Start -->
  <div class="cstm_overly_off flex_all store_setting_overly">
    <div class="cstm_close flex_all">
      <i class="fas fa-times"></i>
    </div>

    <div class="user_settings_wrap">
      <h3 class="text-center">Set up your store settings</h3>

      <div class="all_settings_tab_wrap cstm_scrollbar">
        <!-- Single Setting Tab Start -->
        <div class="single_setting_tab">
          <div class="setting_tab_title_div">
            <input type="hidden" class="tab_input" value="off_tab" />
            <h4 class="m-0">Store Secrect Code</h4>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="setting_tab_body_div">
            <div class="tow_fector_verification_wrap">
              <label class="two_step_title mt-0 scrt_code_label_clck_title"
                >Secrect code
                <p
                  class="crntly_is_on_pp scrt_on_p_txt <?php echo store_secrect_code('on_off')?>"
                >
                  Currently is
                  <?php echo store_secrect_code('on_off')?>
                </p>
              </label>
              <div class="cstm_checkbox mt-2">
                <input type="checkbox" class="scrt_code_inpt"
                <?php echo store_secrect_code('check')?>>
                <label class="scrt_code_label_clck">
                  <div class="cstm_checkbox_boll overflow-hidden d-flex justify-content-center align-items-center">
                    
                  </div>
                </label>
              </div>
            </div>
            <h6 class="change_sec_code_heading cstm_heading cstm_relative cstm-tooltip warning_tooltip top-right tip-bottom-left" data-cstm-tooltip="Not available">
              Change Secrect Code
            </h6>
            <form action="#">
              <div class="form-group">
                <label class="form-label" for="curnt_code">Current Code</label>
                <input
                  id="curnt_code"
                  class="form-input input_animated"
                  type="text"
                />
              </div>
              <div class="form-group">
                <label class="form-label" for="new_code">New Code</label>
                <input
                  id="new_code"
                  class="form-input input_animated"
                  type="text"
                />
              </div>
              <div class="form-group">
                <label class="form-label" for="confirm_code_store"
                  >Confirm Code</label
                >
                <input
                  id="confirm_code_store"
                  class="form-input input_animated"
                  type="text"
                />
              </div>
              <button type="submit" class="cstm_btn">Change Code</button>
            </form>
          </div>
        </div>
        <!-- Single Setting Tab End -->

        <!-- Single Setting Tab Start -->
        <div class="single_setting_tab cstm_relative cstm-tooltip warning_tooltip top-right tip-bottom-left"  data-cstm-tooltip="Not available">
          <div class="setting_tab_title_div">
            <input type="hidden" class="tab_input" value="off_tab" />
            <h4 class="m-0">Store Auto Log Out</h4>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="setting_tab_body_div">
            <div class="tow_fector_verification_wrap">
              <div class="ex_null">
                <label for="auto_log_out_for" class="two_step_title mt-0"
                  >Auto log out <span>30 minutes is set</span></label
                >
                <p class="crntly_is_on_pp">Currently is On</p>
              </div>
              <div class="cstm_checkbox mt-2">
                <input type="checkbox" id="auto_log_out_for" />
                <label for="auto_log_out_for">
                  <div class="cstm_checkbox_boll"></div>
                </label>
              </div>
            </div>
            <h6 class="change_sec_code_heading cstm_heading">
              Set custom time for auto log out
            </h6>
            <form action="#">
              <div class="form-group">
                <label class="form-label" for="confirm_code_auto_log_out"
                  >Set time in minute</label
                >
                <input
                  id="confirm_code_auto_log_out"
                  class="form-input input_animated"
                  type="text"
                />
              </div>
              <button type="submit" class="cstm_btn">Update</button>
            </form>
          </div>
        </div>
        <!-- Single Setting Tab End -->

        <!-- Single Setting Tab Start -->
        <div class="single_setting_tab">
          <div class="setting_tab_title_div">
            <input type="hidden" class="tab_input" value="off_tab" />
            <h4 class="m-0">Manage Your Store Admin</h4>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div
            class="setting_tab_body_div cstm_scrollbar store_admin_wrap cstm_relative"
          ></div>
        </div>
        <!-- Single Setting Tab End -->
      </div>
    </div>
  </div>
  <!-- Store Overly All Settings Wrap End -->

  <div class="cstm_container">
    <div class="header_flex">
      <div class="mail_logo">
        <a href="#">
          <!-- <img src="./img/logo.png" alt="" class="img_w_100" /> -->
          Store Management
        </a>
      </div>
      <div class="nav_wrap">
        <nav>
          <ul class="mian_nav_ul">
            <!-- <li><a href="./">Home</a></li> -->
            <!-- <li><a href="raf.php">Raf client</a></li> -->
            <!-- <li><a href="#">Sale listing</a></li> -->
            <!-- <li><a href="./profile.php">User</a></li> -->
            <li class="cstm_relative notification_li">
              <div class="notification_count_wrap d-none">
                <span>20</span>
              </div>
              <span class="load_notification_click_span"
                ><i class="fas fa-bell"></i
              ></span>
              <div class="notifications_wrap">
                <div class="go_top_notification flex_all click_to_up">
                  <i class="fas fa-chevron-up"></i>
                </div>

                <div class="notification_header">
                  <h4 class="cstm_heading">Notifications</h4>
                  <div class="d-flex align-items-center">
                    <div class="noti_search_wrap">
                      <div class="noti_sreach_bar_icon_wrap">
                        <div class="nti_search_input_wrap">
                          <input type="text" placeholder="Find notifications" class="srch_notifi_cation" />
                        </div>
                        <div
                          class="noti_search_icon_wrap cstm-tooltip left-center cstm_relative"
                          data-cstm-tooltip=""
                        >
                        <div class="cstm-tooltip-box alws_show" style="width: 122px; text-align: center;">Search notification</div>
                        <div class="cstm-tooltip-box close_tool_tip" style="width: 50px; text-align: center;">Close</div>
                          <i class="fas fa-search"></i>
                        </div>
                      </div>
                    </div>
                    <p
                      class="clear_all_notification no_pinter cstm-tooltip left-center cstm_relative"
                      data-cstm-tooltip="Clear all notification"
                    >
                      Clear all
                    </p>
                  </div>
                  <div class="loading_long_bar notification_loading_bar">
                    <div class="loading_bar"></div>
                  </div>
                </div>
                <input type="hidden" class="scroll_noti" />
                <input type="hidden" class="currently_loaded_list" value="0" />

                <div class="ex_noti_search_wrap cstm_relative">
                  <div class="nothing_found_wrap flex_all notifi_nothing_found">
                    <div class="nothing_found_icon_wrap">
                      <img src="./img/no_page.png" alt="Nothing Found">
                    </div>
                    <p class="no_res_found text-center">No result found with <span class="live_search_tag">"<span></span>"</span></p>
                    <p class="try_another text-center">Try another search tag</p>
                  </div>
                  <div class="notification_body cstm_scrollbar"></div>
                </div>
              </div>
            </li>
            <li>
              <div class="user_log_out_wrap">
                <div class="user_profile_pic user_profile_pic_ow">
                  <img src="./users_photo/<?php owner_data('pic')?>" alt="" />
                </div>
                <div class="user_drop_down_nav">
                  <div class="user_big_profile_pic user_big_profile_pic_ow">
                    <img src="./users_photo/<?php owner_data('pic')?>" alt="" />
                  </div>
                  <h5><?php owner_data('name')?></h5>
                  <span class="our_user_span"
                    >User:
                    <?php owner_data('username')?></span
                  >
                  <div class="cstm_devider our_devider"></div>
                  <ul class="user_actions_wrap">
                    <li
                      class="user_dark_mode_on_off d-flex justify-content-between align-items-center"
                    >
                      <p class="m-0">
                        <i class="fas fa-moon"></i
                        ><label
                          class="mb-0 cstm_pointer"
                          for="cstm_ckeck_our_dark"
                          >Dark mode</label
                        >
                      </p>
                      <div class="cstm_checkbox our_dark_mode_div">
                        <input type="checkbox" id="cstm_ckeck_our_dark" />
                        <label for="cstm_ckeck_our_dark">
                          <div class="cstm_checkbox_boll"></div>
                        </label>
                      </div>
                    </li>
                    <li class="our_profile_settings_li mt-3">
                      <i class="fas fa-user-cog"></i>Manage Your Profile
                    </li>
                    <!-- <div class="cstm_devider our_devider"></div> -->
                    <li class="create_new_client_li">
                      <i class="fas fa-user-plus"></i>Create New Client
                    </li>
                    <li class="create_new_admin_li">
                      <i class="fas fa-user-secret"></i>Create New Admin
                    </li>
                    <li class="store_settings_li">
                      <i class="fas fa-cog"></i>Store Settings
                    </li>
                    <li class="manage_word_li">
                      <i class="fas fa-book"></i>Manage word
                    </li>
                    <!-- <div class="cstm_devider our_devider"></div> -->
                    <li class="owner_logout_li no_nimation">
                      <a href="./profile_function.php?logout_2"
                        ><i class="fas fa-sign-out-alt"></i>Log out</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>

<!-- Header Area End -->

<!-- <div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
  </div> -->
