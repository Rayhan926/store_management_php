$(document).ready(function () {
  var dark_mode = localStorage.getItem("theme");
  if (dark_mode == "dark") {
    trans();
    document.documentElement.setAttribute("data-theme", "dark");
    $(".our_dark_mode_div input").prop("checked", true);
  }

  function trans() {
    document.documentElement.classList.add("html_transition");
    window.setTimeout(() => {
      document.documentElement.classList.remove("html_transition");
    }, 1000);
  }

  $(".setting_tab_title_div .tab_input").val("off_tab");

  $(".cstm_overly").click(function (e) {
    if (e.target.classList.contains("show_all")) {
      $(this).removeClass("show_all");
    }
  });

  $(".client_due_total_pay_input input").keyup(function () {
    var total_due = Number($.trim($(".client_due_total_input input").val()));
    var this_val = $.trim($(".client_due_total_pay_input input").val());

    //var minus = (total_due - this_val)
    //$(".client_due_will_input input").val(minus)

    if (this_val * 1 > total_due) {
      //cstm_alert_div('Amount should be less then or equal to the total amount', 5000)
      $(".client_due_will_input input").val("");
    } else if (!this_val.match("^(0|[1-9][0-9]*)$")) {
      //cstm_alert_div('Amount should be only number', 4000)
      $(".client_due_will_input input").val("");
    } else {
      var minus = total_due - this_val * 1;
      $(".client_due_will_input input").val(minus);
    }
  });

  $(".cstm_close").click(function () {
    $(this).parent().removeClass("show_all");
  });

  $(".owner_chng_pic_form").submit(function (e) {
    e.preventDefault();
    var formdata = new FormData(this);
    $.ajax({
      url: "./actions/edit.php",
      type: "post",
      data: formdata,
      contentType: false,
      processData: false,
      beforeSend: function () {
        $(".profile_pic_load_owner").show();
        $(".owner_pro_pic_save_btn, .owner_pro_pic_cancel_btn").addClass(
          "cstm_btn_disabled"
        );
        $(".owner_pro_pic_save_btn, .owner_pro_pic_cancel_btn").attr(
          "disabled",
          true
        );
        $(".owner_pro_pic_save_btn").text("Saving..");
      },
      success: function (data) {
        $(".profile_pic_load_owner").hide();
        $(".owner_pro_pic_save_btn, .owner_pro_pic_cancel_btn").removeClass(
          "cstm_btn_disabled"
        );
        $(".owner_pro_pic_save_btn, .owner_pro_pic_cancel_btn").attr(
          "disabled",
          false
        );
        $(".owner_pro_pic_save_btn").text("Save");
        if (data == "yes") {
          cstm_alert_div("Profile picture changed successfully", 4000);
          $(".user_profile_pic_ow img, .user_big_profile_pic_ow img").attr(
            "src",
            $(".profile_pic_preview_owner img").attr("src")
          );

          $(".owner_pro_pic_inp_cls").val("");
          $(".owner_pro_pic_chose_btn").removeClass("d-none");
          $(
            ".owner_pro_pic_cancel_btn, .owner_pro_pic_save_btn, .owner_pro_pic_chose_again_btn"
          ).addClass("d-none");
        } else {
          cstm_alert_div(wrng, 4000);
        }
      },
    });
  });

  /*setInterval(() => {
    $(".cstm_alert").append('<div class="cstm_alert_box"><p>Lorem ipsum, dolor</p></div>')
  }, 1000);*/

  /*======= Global Close It Start======== */
  $(".close_it").click(function () {
    var data_type = $(this).data("closetype");
    if (data_type != "") {
      if (data_type == "slide") {
        $(this).parent().slideToggle(200);
      } else if (data_type == "fade") {
        $(this).parent().fadeToggle(500);
      } else {
        $(this).parent().removeClass(data_type);
      }
    }
  });
  /*======= Global Close It End======== */

  /*======= Animated Input Start======== */
  $(document).on("focus", ".input_animated", function () {
    $(this).parents(".form-group").addClass("focused");
  });

  $(document).on("click", ".single_notification_actions_wrap", function () {
    $(".single_notification_actions_wrap_ul").removeClass("show_all");
    $(this)
      .children(".single_notification_actions_wrap_ul")
      .addClass("show_all");
  });

  $(document).on("blur", ".input_animated", function () {
    var inputValue = $(this).val();
    if (inputValue == "") {
      $(this).removeClass("filled");
      $(this).parents(".form-group").removeClass("focused");
    } else {
      $(this).addClass("filled");
    }
  });
  /*======= Animated Input End======== */

  /* ============ User Profile Setting Tab Open Close Start================ */

  $(".setting_tab_title_div").click(function () {
    var tab_input = $(this).children(".tab_input").val();
    if (tab_input == "off_tab") {
      $(".setting_tab_body_div").slideUp(200);
      $(".setting_tab_title_div .tab_input").val("off_tab");
      $(".setting_tab_title_div i").removeClass("rotate_once");

      $(this).next(".setting_tab_body_div").slideDown(200);
      $(this).children(".tab_input").val("on_tab");
      $(this).children("i").addClass("rotate_once");
    } else {
      $(this).next(".setting_tab_body_div").slideUp(200);
      $(this).children(".tab_input").val("off_tab");
      $(this).children("i").removeClass("rotate_once");
    }
  });

  $(".user_profile_pic").click(function () {
    $(".user_drop_down_nav").toggleClass("show_all");
    $(".user_drop_down_nav").toggleClass("animate_li");
  });

  $(document).click(function (e) {
    var trigger = $(".user_log_out_wrap");
    if (trigger !== e.target && !trigger.has(e.target).length) {
      $(".user_drop_down_nav").removeClass("show_all");
      $(".user_drop_down_nav").removeClass("animate_li");
    }
  });

  $(".user_settings_on_li").click(function () {
    show_all("user_setting_overly");
  });
  $(".our_profile_settings_li").click(function () {
    show_all("our_setting_overly");
  });
  $(".store_settings_li").click(function () {
    show_all("store_setting_overly");
    get_store_all_admin("store_admin_wrap");
  });
  $(".create_new_admin_li").click(function () {
    show_all("new_admin_setting_overly");
  });

  $(".due_fiter_div").click(function () {
    show_all("filter_dur_all_option_wrap");
  });

  $(document).on("click", ".due_list_more_option_wrap", function () {
    $(".due_list_more_option_ul").removeClass("show_all");
    $(this).children(".due_list_more_option_ul").addClass("show_all");
  });

  $(".client_parts_dots_wrap").click(function () {
    show_all("client_parts_ul");
  });

  $(document).on("click", ".single_client_more_actions_wrap", function () {
    $(".single_client_more_action_ul").removeClass("show_all");
    $(this).children(".single_client_more_action_ul").addClass("show_all");
  });

  $(document).on("click", ".client_due_list_wrap_three_dot_wrap", function () {
    $(".client_due_list_wrap_three_dot_wrap ul").removeClass("show_all");
    $(this).children("ul").addClass("show_all");
  });

  $(".notification_li").click(function () {
    show_all("notifications_wrap");
  });
  $(".create_new_client_li").click(function () {
    show_all("create_new_client_overly");
  });

  $(".click_to_up").click(function () {
    scroll_top(".notification_body");
  });

  $(document).on("click", function (e) {
    outside_close("client_parts_dots_wrap", "client_parts_ul", "show_all", e);
    outside_close(
      "single_notification_actions_wrap",
      "single_notification_actions_wrap_ul",
      "show_all",
      e
    );
    outside_close(
      "due_list_more_option_wrap",
      "due_list_more_option_ul",
      "show_all",
      e
    );
    outside_close("notification_li", "notifications_wrap", "show_all", e);
    outside_close("due_fiter_div", "filter_dur_all_option_wrap", "show_all", e);
    outside_close(
      "single_client_more_actions_wrap",
      "single_client_more_action_ul",
      "show_all",
      e
    );
    outside_close(
      "client_due_list_wrap_three_dot_wrap",
      "client_due_list_wrap_three_dot_wrap ul",
      "show_all",
      e
    );
  });

  $(".list_view_span").click(function () {
    $(".grid_view_span").removeClass("active_layout");
    $(this).addClass("active_layout");
    $(".all_clients_list_body").removeClass("grid_view");
    $(".all_clients_list_header").slideDown(200);
  });
  $(".grid_view_span").click(function () {
    $(".list_view_span").removeClass("active_layout");
    $(this).addClass("active_layout");
    $(".all_clients_list_body").addClass("grid_view");
    $(".all_clients_list_header").slideUp(200);
  });

  $(".profile_part_on_off").click(function () {
    $(".client_profile_view_wrap").toggleClass("toggle_all");
    $(".blur_div").toggleClass("toggle_bar");
    setTimeout(() => {
      $(".all_list_of_sml_img_wrap").toggleClass(
        "show_all_list_of_sml_img_wrap"
      );
    }, 300);
  });

  $(".add_due_list_on_off_span").click(function () {
    $(".payment_list_wrap").slideUp(200);
    $(".add_new_due_list_wrap").slideToggle(200);
    //$(window).scrollTop(999999999);
  });
  $(".add_due_close").click(function () {
    var product_name = $(".client_due_list_add_form .product_name").val();
    var product_price = $(".client_due_list_add_form .product_price").val();
    var product_note = $(".client_due_list_add_form .product_note").val();
    if (product_name != "" || product_price != "" || product_note != "") {
      cstm_confirm(
        "list_close",
        "Are You Sure To Discard",
        "You are going to close a processing list.",
        "Discard"
      );
      $(".dlt_btn").click(function () {
        var conf_code = $(".conf_code").val();
        if (conf_code == "list_close") {
          close_confirm();
          $(".add_new_due_list_wrap").slideUp(200);
          $(".client_due_list_add_form .product_name").val("");
          $(".client_due_list_add_form .product_price").val("");
          $(".client_due_list_add_form .product_note").val("");
        }
      });
    } else {
      $(".client_due_list_add_form .product_name").val("");
      $(".client_due_list_add_form .product_price").val("");
      $(".client_due_list_add_form .product_note").val("");
      $(".add_new_due_list_wrap").slideUp(200);
    }
  });

  $(".payment_due_list_on_off_span").click(function () {
    $(".add_new_due_list_wrap").slideUp(200);
    $(".payment_list_wrap").slideToggle(200);
    //$(window).scrollTop(999999999);
  });

  $(".payment_close").click(function () {
    var check = $(".client_due_total_pay_input input").val();
    if (check != "" && check.match("^(0|[1-9][0-9]*)$")) {
      cstm_confirm(
        "pay_close",
        "Are You Sure To Discard",
        "You are going to close a processing payment.",
        "Discard"
      );
      $(".dlt_btn").click(function () {
        var conf_code = $(".conf_code").val();
        if (conf_code == "pay_close") {
          close_confirm();
          $(".payment_list_wrap").slideUp(200);
          $(".client_due_total_pay_input input").val("");
        }
      });
    } else {
      $(".client_due_total_pay_input input").val("");
      $(".payment_list_wrap").slideUp(200);
    }
  });

  $(".go_one_stap_back").click(function () {
    $(".client_profile_view_extar_wrap").slideUp();
    $(".all_down_part_wrap").slideDown();
    var ee = $(".client_due_list_add_form .hidden_user_id_due_list").val();
    single_client_data(ee);
    setTimeout(() => {
      $(".all_list_of_sml_img_wrap").removeClass(
        "show_all_list_of_sml_img_wrap"
      );
      $(".due_fiter_div span p").text("Last 15 rows");
      $(".client_profile_view_wrap").removeClass("toggle_all");
      $(".blur_div").addClass("toggle_bar");
      $(".user_filter_duee_list_ul_by_ow li").removeClass("active_filter");
      $(".user_filter_duee_list_ul_by_ow .default_filter_li").addClass(
        "active_filter"
      );
      $(".crntly_filter_value").val("15");
    }, 1000);
  });

  $(".create_new_client_form .male_box input").click(function () {
    $(".gander_box").removeClass("red_active");
    $(".gander_box").addClass("active");
  });

  $(".c_new_wrap .c_chose_btn").click(function () {
    $(".c_new_wrap .hidden_file_c").click();
  });
  $(".c_new_wrap .hidden_file_c").change(function () {
    pro_pic_preview(this, "c_new_wrap");
  });

  $(".edit_admn_wrap .c_chose_btn").click(function () {
    $(".edit_admn_wrap .hidden_file_c").click();
  });
  $(".edit_admn_wrap .hidden_file_c").change(function () {
    pro_pic_preview(this, "edit_admn_wrap");
  });

  $(".edit_c_wrap .c_chose_btn").click(function () {
    $(".edit_c_wrap .hidden_file_c").click();
  });
  $(".edit_c_wrap .hidden_file_c").change(function () {
    pro_pic_preview(this, "edit_c_wrap");
  });

  $(".owner_pro_pic_chose_btn, .owner_pro_pic_chose_again_btn").click(
    function () {
      $(".owner_pro_pic_inp_cls").click();
    }
  );

  $(".owner_pro_pic_inp_cls").change(function () {
    if (this.files && this.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $(".profile_pic_preview_owner img").attr("src", e.target.result);
        $(".owner_pro_pic_chose_btn").addClass("d-none");
        $(
          ".owner_pro_pic_cancel_btn, .owner_pro_pic_save_btn, .owner_pro_pic_chose_again_btn"
        ).removeClass("d-none");
      };
      reader.readAsDataURL(this.files[0]);
    }
  });

  $(".owner_pro_pic_cancel_btn").click(function () {
    $(".profile_pic_preview_owner img").attr(
      "src",
      $(".user_profile_pic_ow img").attr("src")
    );
    $(".owner_pro_pic_inp_cls").val("");
    $(".owner_pro_pic_chose_btn").removeClass("d-none");
    $(
      ".owner_pro_pic_cancel_btn, .owner_pro_pic_save_btn, .owner_pro_pic_chose_again_btn"
    ).addClass("d-none");
  });

  $(".cr_new_admin_wrap .admin_pic_chose_btn").click(function () {
    $(".cr_new_admin_wrap .admin_pic_input").click();
  });
  $(".cr_new_admin_wrap .admin_pic_input").change(function () {
    pro_pic_preview(this, "cr_new_admin_wrap");
  });

  $(".forgot_pass").click(function () {
    $(".user_main_login_wrap").addClass("current");
    $(".forgot_pass_wrap").addClass("previous");
  });

  $(".close_find_wrap").click(function () {
    $(".user_main_login_wrap").removeClass("current");
    $(".forgot_pass_wrap").removeClass("previous");
  });

  function pro_pic_preview(input, con) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $("." + con + " .profile_img_create").addClass("c_pic_selected");
        $("." + con + " .profile_img_create img").attr("src", e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  $(".c_new_wrap .c_pic_cancel").click(function () {
    $(".hidden_file_c").val("");
    $(".create_new_client_form .profile_img_create").removeClass(
      "c_pic_selected"
    );
    $(".create_new_client_form .profile_img_create img").attr("src", "");
  });

  $(".edit_c_wrap .c_pic_cancel").click(function () {
    $(".hidden_file_c").val("");
    $(".edit_c_wrap .profile_img_create").removeClass("c_pic_selected");
    $(".edit_c_wrap .profile_img_create img").attr("src", "");
  });

  $(".cr_new_admin_wrap .c_pic_cancel").click(function () {
    $(".cr_new_admin_wrap .admin_pic_input").val("");
    $(".cr_new_admin_wrap .profile_img_create").removeClass("c_pic_selected");
    $(".cr_new_admin_wrap .admin_pic_input .profile_img_create img").attr(
      "src",
      ""
    );
  });
  $(".edit_admn_wrap .c_pic_cancel").click(function () {
    $(".edit_admn_wrap .admin_pic_input").val("");
    $(".edit_admn_wrap .profile_img_create").removeClass("c_pic_selected");
    $(".edit_admn_wrap .admin_pic_input .profile_img_create img").attr(
      "src",
      ""
    );
  });

  /* ============ User Profile Setting Tab Open Close End================ */

  $(".add_new_email_span").click(function () {
    $(".add_new_email_user_wrap").slideToggle(200);
    setTimeout(() => {
      $(".all_settings_tab_wrap ").scrollTop(9999999);
    }, 200);
  });

  $(".password_show_hide").click(function () {
    var curnt = $(this).parent().children("input").attr("type");
    if (curnt == "password") {
      $(this).parent().children("input").attr("type", "text");
      $(this).children().addClass("fa-eye-slash");
      $(this).children().removeClass("fa-eye");
      $(this).parent().children("input").focus();
    } else {
      $(this).parent().children("input").attr("type", "password");
      $(this).children().addClass("fa-eye");
      $(this).children().removeClass("fa-eye-slash");
      $(this).parent().children("input").focus();
    }
  });

  //////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////
  $(".style_toggle").click(function () {
    var href = $(".dark_theme").attr("href");
    if (href == "./css/dark.css") {
      $(".dark_theme").attr("href", "./css/dark_off.css");
    } else {
      $(".dark_theme").attr("href", "./css/dark.css");
    }
  });

  //////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////

  $(".notification_body").scroll(function () {
    scroll_count(".notification_body", 300, "click_to_up", "show_all");
  });

  $(".user_filter_ul_wrap li").click(function () {
    $(".user_filter_ul_wrap li").removeClass("active_filter");
    $(this).addClass("active_filter");
    var value = $(this).data("filter-value");
    var this_text = $(this).text();
    client_due_is(value);
    let text = "";

    if (value != "18446744073709551615") {
      text = `Currently showing last ${value} rows.`;
      $(".cstm_alert").html(
        '<div class="cstm_alert_box "><p>' + text + "</p></div>"
      );
    } else {
      text = "Currently showing all of the rows";
      $(".cstm_alert").html(
        '<div class="cstm_alert_box "><p>' + text + "</p></div>"
      );
    }

    $(".curnt_active_filter_span").html(
      this_text + '<i class="fas fa-sort-down"></i>'
    );

    $(".cstm_alert .cstm_alert_box").slideDown(200);
    setTimeout(() => {
      $(".cstm_alert .cstm_alert_box").fadeOut();
    }, 4000);
  });

  $(document).on("click", ".cstm_alert_box", () => {
    $(".cstm_alert_box").remove();
  });

  client_due_is("15");
  check_profile_pic();
  /////////////////// XXXXXXXXXXXXXXXXXXXX JQUERY IS END HERE XXXXXXXXXXXXXXXXXXXX ///////////////////
});

$(".noti_search_icon_wrap").click(function () {
  $(".noti_search_wrap").toggleClass("show_noti_search_wrap");
  $(".noti_search_wrap")
    .find(".noti_search_icon_wrap i")
    .toggleClass("fa-times");
  $(this).parent().find("input").val("");
  $(this).find(".alws_show").fadeToggle(0);
  $(this).find(".close_tool_tip").fadeToggle(0);
});

/* ============ Functions Start ================ */

function outside_close(click_on, close_to, close_class, e) {
  var trigger = $("." + click_on);
  if (trigger !== e.target && !trigger.has(e.target).length) {
    $("." + close_to).removeClass(close_class);
  }
}

function scroll_top(e) {
  $(e).scrollTop(0);
}

function scroll_count(e, count, what_to, what_rem) {
  var scroll_count = $(e).scrollTop();
  if (scroll_count < count) {
    $("." + what_to).removeClass(what_rem);
  } else {
    $("." + what_to).addClass(what_rem);
  }
}
function show_all(e) {
  $("." + e).addClass("show_all");
}

///////////// Get Client Due List Start /////////////////

function client_due_is(e) {
  var users_due = "users_due";
  $.ajax({
    url: "profile_function.php",
    type: "post",
    data: { users_due: users_due, limit_row: e },
    beforeSend: function () {
      $(".all_due_list_showcase_wrap").html(
        '<div class="loading_long_bar slim_loading overflow-hidden d-block"><div class="loading_bar"></div></div>'
      );
    },
    success: function (data) {
      if (data == "no") {
      } else if (data == "no_row") {
        $(".all_due_list_showcase_wrap").html(
          '<div class="no_due_list_here"><h3>Your all due will be appear here</h3><p>Currently has no due in your account.</p></div>'
        );
      } else {
        $(".all_due_list_showcase_wrap").html(data);
      }
    },
  });
}

///////////// Get Client Due List End ///////////////////

$(".not_now_btn").click(function () {
  $(".would_u_like_to_pic").removeClass("show_all");
  var pic_alert = "off";
  $.ajax({
    url: "./actions/edit.php",
    type: "post",
    data: { pic_alert: pic_alert },
  });
});
$(".yes_btn").click(function () {
  $(".would_u_like_to_pic").removeClass("show_all");
  show_all("user_setting_overly");

  setTimeout(() => {
    var tab_input = $(".ch_pr_pic_tab").children(".tab_input").val();
    if (tab_input == "off_tab") {
      $(".setting_tab_body_div").slideUp(200);
      $(".setting_tab_title_div .tab_input").val("off_tab");
      $(".setting_tab_title_div i").removeClass("rotate_once");

      $(".ch_pr_pic_tab").next(".setting_tab_body_div").slideDown(200);
      $(".ch_pr_pic_tab").children(".tab_input").val("on_tab");
      $(".ch_pr_pic_tab").children("i").addClass("rotate_once");
    } else {
      $(".ch_pr_pic_tab").next(".setting_tab_body_div").slideUp(200);
      $(".ch_pr_pic_tab").children(".tab_input").val("off_tab");
      $(".ch_pr_pic_tab").children("i").removeClass("rotate_once");
    }
  }, 400);
});
function check_profile_pic() {
  var pic_alert_per = "pic_alert";
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { pic_alert_per: pic_alert_per },
    success: function (data) {
      if (data != "off") {
        setTimeout(() => {
          var src = $(".user_p_pic_sml_check img").attr("src");
          if (
            src == "./users_photo/male.png" ||
            src == "./users_photo/female.png"
          ) {
            $(".would_u_like_to_pic").addClass("show_all");
          }
        }, 1000);
      }
    },
  });
}

function view_more_user(e) {
  setTimeout(() => {
    $(".client_row_id_" + e + " .single_client_more_action_ul ").removeClass(
      "show_all"
    );
  }, 150);
  $(".client_row_id_" + e + " .mobile_view_more_info_wrap").addClass(
    "show_all"
  );
}
function close_view_more_user(e) {
  $(".client_row_id_" + e + " .mobile_view_more_info_wrap").removeClass(
    "show_all"
  );
}
