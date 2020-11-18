$(document).ready(function () {
  const total_custommer_due = "";

  $(".data_get_input").val("yes");
  $(".currently_loaded_list").val("0");
  $(".ver_fi_cation_on_off").val("");
  $(".crntly_filter_value").val("15");

  //////////// Creating New Client Start /////////////////
  $(".create_new_client_form").submit(function (e) {
    e.preventDefault();

    var c_1 = $.trim($(".c_new_wrap .c_1").val());
    var c_2 = $.trim($(".c_new_wrap .c_2").val());
    var c_4 = $.trim($(".c_new_wrap .c_4").val());
    var c_6 = $.trim($(".c_new_wrap .c_6").val());
    var c_7 = $.trim($(".c_new_wrap .c_7").val());
    var c_address = $.trim($(".c_new_wrap .c_address").val());

    var validate = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    var formdata = new FormData(this);

    if (c_1 == "") {
      remove_input_check("c_new_wrap");
      input_check("c_new_wrap .c_1");
    } else if (c_address == "") {
      remove_input_check("c_new_wrap");
      input_check("c_new_wrap .c_address");
    } else if (c_2 == "") {
      remove_input_check("c_new_wrap");
      input_check("c_new_wrap .c_2");
    } else if (!c_2.match("^(0|[1-9][0-9]*)$")) {
      remove_input_check("c_new_wrap");
      input_check("c_new_wrap .c_2");
      success_message(
        "Phone number should be only number",
        "c_new_wrap",
        "bg_danger",
        4000
      );
    } else if (c_2.length !== 11) {
      remove_input_check("c_new_wrap");
      input_check("c_new_wrap .c_2");
      success_message(
        "Phone number must be 11 character",
        "c_new_wrap",
        "bg_danger",
        4000
      );
    } else if (!$(".c_new_wrap .c_3").is(":checked")) {
      remove_input_check("c_new_wrap");
      $(".c_new_wrap form .gander_box").addClass("active red_active");
    } else if (c_4 != "" && validate.test(c_4) == false) {
      remove_input_check("c_new_wrap");
      input_check("c_new_wrap .c_4");
      success_message("Enter a valid email", "c_new_wrap", "bg_danger", 3000);
    } else if (c_6 == "") {
      remove_input_check("c_new_wrap");
      input_check("c_new_wrap .c_6");
    } else if (c_7 == "") {
      remove_input_check("c_new_wrap");
      input_check("c_new_wrap .c_7");
    } else {
      remove_input_check("c_new_wrap");

      $.ajax({
        url: "./actions/create.php",
        type: "post",
        data: formdata,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $(".c_new_wrap .loading_long_bar").show();
          $(".create_new_client_form .submit_c_btn").addClass(
            "cstm_btn_disabled"
          );
          $(".create_new_client_form .submit_c_btn").attr("disabled", true);
          $(".create_new_client_form .submit_c_btn").text(
            "Creating New Client.."
          );
        },
        success: function (data) {
          if (data == "yes") {
            $(".c_new_wrap .loading_long_bar").hide();
            $(".create_new_client_form .submit_c_btn").removeClass(
              "cstm_btn_disabled"
            );
            $(".create_new_client_form .submit_c_btn").attr("disabled", false);
            $(".create_new_client_form .submit_c_btn").text(
              "Create New Client"
            );
            empty_input_val("create_new_client_form");
            success_message(
              "New client created successfully",
              "c_new_wrap",
              "bg_primary",
              5000
            );
            get_client("on");
            live_client_count();
            last_notification();
          } else if (data == "user_exist") {
            $(".c_new_wrap .loading_long_bar").hide();
            $(".create_new_client_form .submit_c_btn").removeClass(
              "cstm_btn_disabled"
            );
            $(".create_new_client_form .submit_c_btn").attr("disabled", false);
            $(".create_new_client_form .submit_c_btn").text(
              "Create New Client"
            );
            remove_input_check("c_new_wrap");
            success_message(
              "User name already taken!",
              "c_new_wrap",
              "bg_danger",
              6000
            );
            input_check("create_new_client_form .c_6");
          } else {
            $(".c_new_wrap .loading_long_bar").hide();
            $(".create_new_client_form .submit_c_btn").removeClass(
              "cstm_btn_disabled"
            );
            $(".create_new_client_form .submit_c_btn").attr("disabled", false);
            $(".create_new_client_form .submit_c_btn").text(
              "Create New Client"
            );
            success_message(
              "Failed to create, Try again.",
              "c_new_wrap",
              "bg_danger",
              5000
            );
          }
        },
      });
    }
  });
  //////////// Creating New Client End /////////////////

  //////////// Creating New Admin Start /////////////////
  $(".cr_new_admin_form").submit(function (e) {
    e.preventDefault();

    var c_1 = $.trim($(".cr_new_admin_wrap .c_1").val());
    var c_3 = $.trim($(".cr_new_admin_wrap .c_3").val());
    var c_4 = $.trim($(".cr_new_admin_wrap .c_4").val());
    var c_5 = $.trim($(".cr_new_admin_wrap .c_5").val());

    var validate = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    var formdata = new FormData(this);

    if (c_1 == "") {
      remove_input_check("cr_new_admin_wrap");
      input_check("cr_new_admin_wrap .c_1");
    } else if (!$(".cr_new_admin_wrap .c_2").is(":checked")) {
      remove_input_check("cr_new_admin_wrap");
      $(".cr_new_admin_wrap form .gander_box").addClass("active red_active");
    } else if (c_3 == "") {
      remove_input_check("cr_new_admin_wrap");
      input_check("cr_new_admin_wrap .c_3");
    } else if (c_3 != "" && validate.test(c_3) == false) {
      remove_input_check("cr_new_admin_wrap");
      input_check("cr_new_admin_wrap .c_3");
      success_message(
        "Enter a valid email",
        "cr_new_admin_wrap",
        "bg_danger",
        3000
      );
    } else if (c_4 == "") {
      remove_input_check("cr_new_admin_wrap");
      input_check("cr_new_admin_wrap .c_4");
    } else if (c_5 == "") {
      remove_input_check("cr_new_admin_wrap");
      input_check("cr_new_admin_wrap .c_5");
    } else {
      remove_input_check("cr_new_admin_wrap");

      $.ajax({
        url: "./actions/create.php",
        type: "post",
        data: formdata,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $(".cr_new_admin_wrap .loading_long_bar").show();
          $(".cr_new_admin_form .submit_c_btn").addClass("cstm_btn_disabled");
          $(".cr_new_admin_form .submit_c_btn").attr("disabled", true);
          $(".cr_new_admin_form .submit_c_btn").text("Creating New Admin..");
        },
        success: function (e) {
          if (e == "yes") {
            $(".cr_new_admin_wrap .loading_long_bar").hide();
            $(".cr_new_admin_form .submit_c_btn").removeClass(
              "cstm_btn_disabled"
            );
            $(".cr_new_admin_form .submit_c_btn").attr("disabled", false);
            $(".cr_new_admin_form .submit_c_btn").text("Create New Admin");
            empty_input_val("cr_new_admin_form");
            success_message(
              "New admin created successfully",
              "cr_new_admin_wrap",
              "bg_primary",
              5000
            );
          } else if (e == "owner_exist") {
            $(".cr_new_admin_wrap .loading_long_bar").hide();
            $(".cr_new_admin_form .submit_c_btn").removeClass(
              "cstm_btn_disabled"
            );
            $(".cr_new_admin_form .submit_c_btn").attr("disabled", false);
            $(".cr_new_admin_form .submit_c_btn").text("Create New Admin");
            remove_input_check("cr_new_admin_wrap");
            success_message(
              "User name already taken!",
              "cr_new_admin_wrap",
              "bg_danger",
              6000
            );
            input_check("cr_new_admin_form .c_4");
          } else {
            $(".cr_new_admin_wrap .loading_long_bar").hide();
            $(".cr_new_admin_form .submit_c_btn").removeClass(
              "cstm_btn_disabled"
            );
            $(".cr_new_admin_form .submit_c_btn").attr("disabled", false);
            $(".cr_new_admin_form .submit_c_btn").text("Create New Client");
            success_message(
              "Failed to create, Try again.",
              "cr_new_admin_wrap",
              "bg_danger",
              5000
            );
          }
        },
      });
    }
  });
  //////////// Creating New Admin End /////////////////

  //////////// Edit Client Profile End /////////////////

  $(".edit_client_form").submit(function (e) {
    e.preventDefault();

    var c_1_edit = $.trim($(".edit_c_wrap .c_1").val());
    var c_2_edit = $.trim($(".edit_c_wrap .c_2").val());
    var c_4_edit = $.trim($(".edit_c_wrap .c_4").val());
    var edit_id = $.trim($(".edit_c_wrap .user_edit_id").val());
    var c_address_edit = $.trim($(".edit_c_wrap .c_address_edit").val());

    var validate_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    var formdata = new FormData(this);

    if (c_1_edit == "") {
      remove_input_check("edit_c_wrap");
      input_check("edit_c_wrap .c_1");
    } else if (c_address_edit == "") {
      remove_input_check("edit_c_wrap");
      input_check("edit_c_wrap .c_address_edit");
    } else if (c_2_edit == "") {
      remove_input_check("edit_c_wrap");
      input_check("edit_c_wrap .c_2");
    } else if (!c_2_edit.match("^(0|[1-9][0-9]*)$")) {
      remove_input_check("edit_c_wrap");
      input_check("edit_c_wrap .c_2");
      success_message(
        "Phone number should be only number",
        "edit_c_wrap",
        "bg_danger",
        4000
      );
    } else if (c_2_edit.length !== 11) {
      remove_input_check("edit_c_wrap");
      input_check("edit_c_wrap .c_2");
      success_message(
        "Phone number must be 11 character",
        "edit_c_wrap",
        "bg_danger",
        4000
      );
    } else if (!$(".edit_c_wrap .c_3").is(":checked")) {
      remove_input_check("edit_c_wrap");
      $(".edit_c_wrap .gander_box").addClass("active red_active");
    } else if (c_4_edit != "" && validate_email.test(c_4_edit) == false) {
      remove_input_check("edit_c_wrap");
      input_check("edit_c_wrap .c_4");
      success_message("Enter a valid email", "edit_c_wrap", "bg_danger", 3000);
    } else {
      remove_input_check("edit_c_wrap");

      $.ajax({
        url: "./actions/edit.php",
        type: "post",
        data: formdata,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $(".edit_c_wrap .loading_long_bar").show();
          $(".edit_client_form .submit_c_edit_btn").addClass(
            "cstm_btn_disabled"
          );
          $(".edit_client_form .submit_c_edit_btn").attr("disabled", true);
          $(".edit_client_form .submit_c_edit_btn").text(
            "Editing Client Profile.."
          );
        },
        success: function (e) {
          if (e == "yes") {
            $(".edit_c_wrap .loading_long_bar").hide();
            $(".edit_client_form .submit_c_edit_btn").removeClass(
              "cstm_btn_disabled"
            );
            $(".edit_client_form .submit_c_edit_btn").attr("disabled", false);
            $(".edit_client_form .submit_c_edit_btn").text("Edit Client");
            empty_input_val("edit_client_form");
            $(".edit_client_overly").hide();
            cstm_alert_div("Profile Edited Succesfully", 4000);
            setTimeout(() => {
              $(".edit_client_overly").removeClass("show_all");
              $(".edit_client_overly").show();
            }, 500);
            single_client_data(edit_id);
            last_notification();
          } else {
            $(".edit_c_wrap .loading_long_bar").hide();
            $(".edit_client_form .submit_c_edit_btn").removeClass(
              "cstm_btn_disabled"
            );
            $(".edit_client_form .submit_c_edit_btn").attr("disabled", false);
            $(".edit_client_form .submit_c_edit_btn").text("Edit Client");
            success_message(
              "Failed to edit, Try again.",
              "edit_c_wrap",
              "bg_danger",
              5000
            );
          }
        },
      });
    }
  });

  //////////// Edit Client Profile End /////////////////

  //////////// Edit Admin Profile End /////////////////

  $(".edit_admin_form").submit(function (e) {
    e.preventDefault();

    var c_1_edit = $.trim($(".edit_admn_wrap .c_1").val());
    var c_4_edit = $.trim($(".edit_admn_wrap .c_4").val());
    var edit_id = $.trim($(".edit_admn_wrap .user_edit_id").val());

    var validate_email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    var formdata = new FormData(this);

    if (c_1_edit == "") {
      remove_input_check("edit_admn_wrap");
      input_check("edit_admn_wrap .c_1");
    } else if (!$(".edit_admn_wrap .c_3").is(":checked")) {
      remove_input_check("edit_admn_wrap");
      $(".edit_admn_wrap .gander_box").addClass("active red_active");
    } else if (c_4_edit != "" && validate_email.test(c_4_edit) == false) {
      remove_input_check("edit_admn_wrap");
      input_check("edit_admn_wrap .c_4");
      success_message(
        "Enter a valid email",
        "edit_admn_wrap",
        "bg_danger",
        3000
      );
    } else {
      remove_input_check("edit_admn_wrap");

      $.ajax({
        url: "./actions/edit.php",
        type: "post",
        data: formdata,
        contentType: false,
        processData: false,
        beforeSend: function () {
          $(".edit_admn_wrap .loading_long_bar").show();
          $(".edit_admin_form .submit_c_edit_btn").addClass(
            "cstm_btn_disabled"
          );
          $(".edit_admin_form .submit_c_edit_btn").attr("disabled", true);
          $(".edit_admin_form .submit_c_edit_btn").text(
            "Editing Admin Profile.."
          );
        },
        success: function (e) {
          if (e == "yes") {
            $(".edit_admn_wrap .loading_long_bar").hide();
            $(".edit_admin_form .submit_c_edit_btn").removeClass(
              "cstm_btn_disabled"
            );
            $(".edit_admin_form .submit_c_edit_btn").attr("disabled", false);
            $(".edit_admin_form .submit_c_edit_btn").text("Edit Admin");
            empty_input_val("edit_admin_form");
            $(".edit_admin_overly").hide();
            cstm_alert_div("Profile Edited Succesfully", 4000);
            setTimeout(() => {
              $(".edit_admin_overly").removeClass("show_all");
              single_admin_data(edit_id);
              $(".edit_admin_overly").show();
            }, 500);
          } else {
            $(".edit_admn_wrap .loading_long_bar").hide();
            $(".edit_admin_form .submit_c_edit_btn").removeClass(
              "cstm_btn_disabled"
            );
            $(".edit_admin_form .submit_c_edit_btn").attr("disabled", false);
            $(".edit_admin_form .submit_c_edit_btn").text("Edit Admin");
            success_message(
              "Failed to edit, Try again.",
              "edit_admn_wrap",
              "bg_danger",
              5000
            );
          }
        },
      });
    }
  });

  //////////// Edit Admin Profile End /////////////////

  //////////////////// Client Due List Adding Start ////////////////

  $(".client_due_list_add_form").submit(function (e) {
    e.preventDefault();

    var yes_no = $(".form_submit_yes_no").val();

    if (yes_no == "true") {
      var old_f1 = $.trim($(".client_due_list_add_form .product_name").val());
      var last_one = old_f1.substr(-1);
      if (last_one == ",") {
        var f_1 = old_f1.substring(0, old_f1.length - 1);
      } else {
        var f_1 = old_f1;
      }
      var f_2 = $.trim($(".client_due_list_add_form .product_price").val());
      var f_3 = $.trim($(".client_due_list_add_form .product_note").val());
      var f_4 = $.trim(
        $(".client_due_list_add_form .hidden_user_id_due_list").val()
      );
      var f_4_refer = $(".rafer_user_id").val();

      if (f_1 == "") {
        $(".client_due_list_add_form input").removeClass("border_red");
        cstm_alert_div("Product Name Required", 3000);
        $(".client_due_list_add_form .product_name").focus();
        $(".client_due_list_add_form .product_name").addClass("border_red");
        return false;
      } else if (f_2 == "") {
        $(".client_due_list_add_form input").removeClass("border_red");
        cstm_alert_div("Product Price Required", 3000);
        $(".client_due_list_add_form .product_price").focus();
        $(".client_due_list_add_form .product_price").addClass("border_red");
        return false;
      } else if (f_2 != "" && !f_2.match("^(0|[1-9][0-9]*)$")) {
        $(".client_due_list_add_form input").removeClass("border_red");
        cstm_alert_div("Product Price should be a number", 3000);
        $(".client_due_list_add_form .product_price").focus();
        $(".client_due_list_add_form .product_price").addClass("border_red");
      } else if (f_2 <= 0) {
        $(".client_due_list_add_form input").removeClass("border_red");
        cstm_alert_div("Product Price can not be 0", 3000);
        $(".client_due_list_add_form .product_price").focus();
        $(".client_due_list_add_form .product_price").addClass("border_red");
      } else if (
        f_4 != f_4_refer ||
        !f_4.match("^(0|[1-9][0-9]*)$") ||
        !f_4_refer.match("^(0|[1-9][0-9]*)$") ||
        f_4 == "" ||
        f_4_refer == ""
      ) {
        $(".client_due_list_add_form input").removeClass("border_red");
        cstm_alert_div("Invalid User ID! Please refresh the page.", 3000);
      } else {
        $.ajax({
          url: "./actions/create.php",
          type: "post",
          data: { f_1: f_1, f_2: f_2, f_3: f_3, f_4: f_4 },
          beforeSend: function () {
            $(".client_due_list_add_form button").addClass("cstm_btn_disabled");
            $(".client_due_list_add_form button").attr("disabled", true);
            $(".pay_form_heading i").removeClass("d-none");
          },
          success: function (data) {
            if (data == "yes") {
              cstm_alert_div("List added successfully", 3000);
              $(".pay_form_heading i").addClass("d-none");
              $(".client_due_list_add_form button").removeClass(
                "cstm_btn_disabled"
              );
              $(".client_due_list_add_form button").attr("disabled", false);
              $(".client_due_list_add_form input").removeClass("border_red");
              $(".client_due_list_add_form .product_name").val("").focus();
              $(".client_due_list_add_form .product_price").val("");
              $(".client_due_list_add_form .product_note").val("");
              get_client_due_list(f_4, "1", "a");
              // current_month_due();

              var crnt_due = Number($(".current_month_due span").text());
              var store_crnt_due = Number($(".store_total_due_h  span").text());
              var clinet_crnt_due = Number(
                $(".client_profile_total_due span").text()
              );
              animating_count(".current_month_due span", crnt_due + f_2 * 1);
              animating_count(
                ".client_profile_total_due span",
                clinet_crnt_due + f_2 * 1
              );
              animating_count(
                ".store_total_due_h span",
                store_crnt_due + f_2 * 1
              );
              $(".client_due_total_input input").val(clinet_crnt_due + f_2 * 1);

              last_notification();
              //total_due(f_4);
              setTimeout(() => {
                $(".client_due_list_wrap_body").scrollTop(9999999999999);
              }, 100);
              report_length_check();
            } else {
              cstm_alert_div(wrng, 3000);
            }
          },
        });
      }
    }
  });

  //////////////////// Client Due List Adding End ////////////////

  $(".cstm_confirm .cncl_btn").click(function () {
    close_confirm();
    setTimeout(() => {
      $(".notifications_wrap").removeClass("infinity_show");
    }, 1000);
  });

  // Toggle Dark Mode
  $(".our_dark_mode_div input").click(function () {
    if ($(this).is(":checked")) {
      trans();
      document.documentElement.setAttribute("data-theme", "dark");
      localStorage.setItem("theme", "dark");
    } else {
      trans();
      document.documentElement.setAttribute("data-theme", "light");
      localStorage.removeItem("theme");
    }
  });

  function trans() {
    document.documentElement.classList.add("html_transition");
    window.setTimeout(() => {
      document.documentElement.classList.remove("html_transition");
    }, 1000);
  }

  $(document).on("click", ".client_list_img", function () {
    let check_check_it = $(this)
      .children(".action_list_chekcbox")
      .prop("checked");
    if (check_check_it == false) {
      $(this).children(".action_list_chekcbox").prop("checked", true);
      $(this).addClass("rotate_picture");
      $(this).find(".selected_icon_wrap").addClass("show_selected_icon_wrap");
      $(".all_c_action_wrap").slideDown(200);
    } else {
      $(this).children(".action_list_chekcbox").prop("checked", false);
      $(this).removeClass("rotate_picture");
      $(this)
        .find(".selected_icon_wrap")
        .removeClass("show_selected_icon_wrap");

      var check_input = $(
        ".single_client_list .action_list_chekcbox:checkbox:checked"
      ).length;

      if (check_input == 0) {
        $(".all_c_action_wrap").slideUp(200);
      }
    }
  });

  // $(document).on("click", ".single_client_list", function () {
  //   $(this).children(".action_list_chekcbox").prop("checked", false);
  //   // $(this).removeClass("brbd_selected");
  //   setTimeout(() => {
  //     $(this).find(".circle-loader").removeClass("rotate_loader");
  //     $(this).find(".circle-loader").removeClass("load-complete");
  //     $(this).find(".checkmark").hide();
  //   }, 200);

  //   var check_input = $(
  //     ".single_client_list .action_list_chekcbox:checkbox:checked"
  //   ).length;

  //   if (check_input == 0) {
  //     $(".all_c_action_wrap").slideUp(200);
  //   }
  // });

  $(".block_all_btn").click(function () {
    $(".single_client_list .action_list_chekcbox").each(function () {
      if ($(this).is(":checked")) {
        var check_id = $(this).val();
        $.ajax({
          url: "./actions/edit.php",
          type: "post",
          data: { check_id: check_id },
          beforeSend: function () {},
          success: function (data) {
            if (data == "yes") {
              $(
                ".client_row_id_" +
                  check_id +
                  " .single_client_more_action_ul .block_li"
              ).slideUp(200);
              $(
                ".client_row_id_" +
                  check_id +
                  " .single_client_more_action_ul .unblock_li"
              ).slideDown(200);
              $(
                ".client_row_id_" + check_id + " .client_info p span"
              ).removeClass("d-none");
              cstm_alert_div("User Bloked Succesfully", 4000);
            } else {
              cstm_confirm(
                "null_user",
                "Something Went Wrong",
                "Look like database failed to connect, or please check your internet connection.",
                "Ok",
                ""
              );
            }
          },
        });
      }
    });
  });

  $(".delete_all_btn").click(function () {
    var check_input = $(
      ".single_client_list .action_list_chekcbox:checkbox:checked"
    ).length;
    cstm_confirm(
      "dlt_all_check",
      "Are You Sure To Delete",
      "You are going to delete " +
        check_input +
        " user. By clicking Ok you will lose all of data for those User and those data are not undoable.",
      "Ok, Delete It",
      ""
    );
    $(".confirm_btn_wrap .dlt_btn").click(function () {
      if ($(".confirm_btn_wrap .conf_code").val() == "dlt_all_check") {
        close_confirm();
        $(".single_client_list .action_list_chekcbox").each(function () {
          if ($(this).is(":checked")) {
            var check_id = $(this).val();
            $.ajax({
              url: "./actions/delete.php",
              type: "post",
              data: { check_id: check_id },
              beforeSend: function () {},
              success: function (data) {
                if (data == "yes") {
                  $(".client_row_id_" + check_id).addClass("cstm_deleting");
                  setTimeout(() => {
                    $(".client_row_id_" + check_id).fadeOut();
                  }, 300);
                  cstm_alert_div("User Deleted Succesfully", 4000);
                  live_client_count();
                  current_month_due();
                } else {
                  cstm_confirm(
                    "null_user",
                    "Something Went Wrong",
                    "Look like database failed to connect, or please check your internet connection.",
                    "Ok",
                    ""
                  );
                }
              },
            });
          }
        });
      }
    });
  });

  //////////// User Login Start /////////////////

  $(".user_login_submit").submit(function (e) {
    e.preventDefault();
    var user_name = $.trim($(".user_login_submit .login_username").val());
    var password = $.trim($(".user_login_submit .login_password").val());

    if (user_name == "") {
      remove_input_check("user_main_login_wrap");
      input_check("user_login_submit .login_username");
    } else if (password == "") {
      remove_input_check("user_main_login_wrap");
      input_check("user_login_submit .login_password");
    } else {
      remove_input_check("user_main_login_wrap");
      $.ajax({
        url: "./actions/get.php",
        type: "post",
        data: { user_name: user_name, password: password },
        beforeSend: function () {
          $(".login_form_wrap .loading_long_bar").show();
          $(".login_form_wrap button").addClass("cstm_btn_disabled");
          $(".login_form_wrap button").attr("disabled", true);
        },
        success: function (data) {
          if (data == "wrong_user") {
            dismiss_all();
            $(".login_form_wrap .loading_long_bar").hide();
            $(".login_form_wrap button").removeClass("cstm_btn_disabled");
            $(".login_form_wrap button").attr("disabled", false);
            $(".login_error_wrap").html(
              '<div class="user_login_error_div shake_animation"><li class="red">Wrong Username</li></div>'
            );
            remove_input_check("user_main_login_wrap");
            input_check("user_login_submit .login_username");
          } else if (data == "wrong_password") {
            dismiss_all();
            $(".login_form_wrap .loading_long_bar").hide();
            $(".login_form_wrap button").removeClass("cstm_btn_disabled");
            $(".login_form_wrap button").attr("disabled", false);
            $(".login_error_wrap").html(
              '<div class="user_login_error_div shake_animation"><li class="red">Wrong Password</li></div>'
            );
            remove_input_check("user_main_login_wrap");
            input_check("user_login_submit .login_password");
          } else if (data == "user_block") {
            dismiss_all();
            $(".login_form_wrap .loading_long_bar").hide();
            $(".login_form_wrap button").removeClass("cstm_btn_disabled");
            $(".login_form_wrap button").attr("disabled", false);
            $(".login_error_wrap").html(
              '<div class="user_login_error_div shake_animation"><li class="red">Your account has been<br/> blocked.</li></div>'
            );
          } else if (data == "proceed_user") {
            dismiss_all();
            $(".login_form_wrap .loading_long_bar").hide();
            $(".login_form_wrap button").removeClass("cstm_btn_disabled");
            $(".login_form_wrap button").attr("disabled", false);
            $(".login_error_wrap").html(
              '<div class="user_login_error_div"><li class="green">Log in successfull.</li></div>'
            );
            window.location.href = "./profile.php";
          } else if (data == "proceed_owner_for_two_step") {
            $(".null_usr").val(user_name);
            $(".null_pass").val(password);

            $.ajax({
              url: "./actions/get.php",
              type: "post",
              data: { username_ownr: user_name, password_ownr: password },
              success: function (data_3) {
                if (data_3 != "no") {
                  var res = $.parseJSON(data_3);
                  var code_is = res[0];
                  var emial_iss = res[1];

                  var otp_title1 = "Nadira Store";
                  var otp_title2 =
                    "Your verification code to log in to your dashboard";
                  var otp_email_is = emial_iss;
                  var otp_code = "Your verification code is " + code_is;
                  $.ajax({
                    url: "./actions/send_otp.php",
                    type: "post",
                    data: {
                      otp_title1: otp_title1,
                      otp_title2: otp_title2,
                      otp_email_is: otp_email_is,
                      otp_code: otp_code,
                    },
                    success: function (data_4) {
                      dismiss_all();
                      if (data_4 != "no") {
                        $(".login_form_wrap").append(
                          ' <div class="after_send_otp_wrap two_step_wrappp"> <div class="find_alert_div_wrap"></div><div onclick="close_two_step()" class="close_it saasas flex_all" onclick="close_widget(4)"> <span><i class="fas fa-arrow-left"></i></span> </div><h6 class="two_step_title">Two-step Verification</h6> <p class="two_step_para">We sent a 6-digit code to your e-mail</p><form onsubmit="return false" class="two_step_submit_form w-100"> <div class="form-group"> <input type="text" placeholder="Enter your 6-digit code" class="tw_step_input_code"/> </div><div class="resend_code_wrap"> <button type="submit" class="two_step_submit_btn" onclick="get_two_step_code()">Submit</button> <button class="resend_otp resend_code_sending_btn_when_login" type="button">Resend Code</button> </div></form> </div>'
                        );

                        setTimeout(() => {
                          $(".user_main_login_wrap").addClass("current");
                          $(".two_step_wrappp").addClass("previous");
                        }, 200);
                      }
                    },
                  });
                }
              },
            });
          } else if (data == "proceed_owner") {
            $(".null_usr").val(user_name);
            $(".null_pass").val(password);
            dismiss_all();
            store_code();
          }
        },
      });
    }
  });

  //////////// User Login End /////////////////

  ////////// Find Account Start ////////////

  $(".find_account_form").submit(function (e) {
    e.preventDefault();
    var find_val = $.trim($(".find_account_form .find_input").val());

    if (find_val == "") {
      remove_input_check("forgot_pass_wrap");
      input_check("forgot_pass_wrap .find_input");
    } else {
      $.ajax({
        url: "./actions/get.php",
        type: "post",
        data: { find_val: find_val },
        beforeSend: function () {
          $(".login_form_wrap .loading_long_bar").show();
          $(".find_account_form  button").addClass("cstm_btn_disabled");
          $(".find_account_form  button").attr("disabled", true);
          $(".find_account_form  button").text("Finding..");
        },
        success: function (data) {
          $(".login_form_wrap .loading_long_bar").hide();
          $(".find_account_form  button").removeClass("cstm_btn_disabled");
          $(".find_account_form  button").attr("disabled", false);
          $(".find_account_form  button").text("Find");
          if (data == "no") {
            forgot_pass_wrap(
              "forgot_pass_wrap",
              "Something went wrong Try again leter.",
              4000,
              ""
            );
          } else if (data == "no_user_found") {
            forgot_pass_wrap("forgot_pass_wrap", "No user found.", 2000, "");
          } else if (data == "block") {
            forgot_pass_wrap(
              "forgot_pass_wrap",
              "You are currently block by your owner.",
              4000,
              ""
            );
          } else if (data == "no_email") {
            forgot_pass_wrap(
              "forgot_pass_wrap",
              "You have previously no added email with your account. Contact your store owner to add an email with your account.<br/><br/> Password reset is only available for e-mail address.",
              10000,
              "bg_soft"
            );
          } else {
            var get = $.parseJSON(data);
            var email = get[0];
            var img = get[1];
            var name = get[2];
            var user = get[3];
            var gender = get[4];
            var r_type = get[5];
            if (img == "") {
              if (gender == "male") {
                //$(".otp_send_wrap .find_user_img img").attr('src', './users_photo/male.png');
                var fn_img = "male.png";
              } else {
                //$(".otp_send_wrap .find_user_img img").attr('src', './users_photo/female.png');
                var fn_img = "female.png";
              }
            } else {
              //$(".otp_send_wrap .find_user_img img").attr('src', './users_photo/'+img);
              var fn_img = img;
            }
            $(".reset_type").val(r_type);
            $(".login_form_wrap").append(
              ' <div class="otp_send_wrap"> <div class="find_alert_div_wrap"></div><div class="close_it saasas flex_all" onclick="close_widget(1)"> <span><i class="fas fa-arrow-left"></i></span> </div><div class="find_user_details_wrap"> <div class="find_user_img"> <img src="./users_photo/' +
                fn_img +
                '" alt=""> </div><div class="find_user_name_user_id"> <h5>' +
                name +
                "</h5> <span>User: " +
                user +
                '</span> </div></div><p class="send_otp_txt">Send verification code to your e-mail</p><input type="hidden" class="selected_email"> <input type="hidden" class="username_for_otp" value="' +
                user +
                '"> <form class="send_otp_form" onsubmit="return false"> <div class="all_mail_wrap cstm_scrollbar"> <div class="single_mail_wrap"> <div class="cstm_radio"> <input onclick="get_selected_email(1)" type="radio" id="' +
                email +
                '" name="email_otp" value="' +
                email +
                '" class="exxxxx_1"> <label for="' +
                email +
                '"> <div class="cstm_radio_boll"></div></label> </div><div class="mail_text"> <label for="' +
                email +
                '"><span>' +
                email +
                '</span></label> </div></div></div><button type="submit" class="send_rest_cd_btn">Send Code</button> </form> </div>'
            );
            setTimeout(() => {
              $(".forgot_pass_wrap").removeClass("previous");
              $(".forgot_pass_wrap").addClass("current");
              $(".otp_send_wrap").addClass("previous");
              //$(".otp_send_wrap .username_for_otp").val(user);
            }, 100);

            /*$(".otp_send_wrap .find_user_name_user_id h5").text(name)
          $(".otp_send_wrap .find_user_name_user_id span").text('User: '+user)
          $(".otp_send_wrap .all_mail_wrap").html('<div class="single_mail_wrap"> <div class="cstm_radio"> <input onclick="get_selected_email(1)" type="radio" id="'+email+'" name="email_otp" value="'+email+'" class="exxxxx_1"> <label for="'+email+'"> <div class="cstm_radio_boll"></div></label> </div><div class="mail_text"> <label for="'+email+'"><span>'+email+'</span></label> </div></div>')*/

            /**        
    <!-- After Find User To Send OTP Start -->
      <div class="otp_send_wrap">
        <div class="find_alert_div_wrap"></div>
          <div class="close_it saasas flex_all" data-closetype="fade">
            <span>&times;</span>
          </div>
          <div class="find_user_details_wrap">
            <div class="find_user_img">
              <img src="./users_photo/'+fn_img+'" alt="">
            </div>
            <div class="find_user_name_user_id">
              <h5>'+name+'</h5>
              <span>User: '+user+'</span>
            </div>
          </div>
          <p class="send_otp_txt">Send verification code to your e-mail</p>
          <input type="hidden" class="selected_email">
          <input type="hidden" class="username_for_otp">
          <form class="send_otp_form">
            <div class="all_mail_wrap cstm_scrollbar">
              <div class="single_mail_wrap"> 
                <div class="cstm_radio"> 
                  <input onclick="get_selected_email(1)" type="radio" id="'+email+'" name="email_otp" value="'+email+'" class="exxxxx_1"> 
                  <label for="'+email+'"> 
                    <div class="cstm_radio_boll"></div>
                  </label> 
                  </div>
                  <div class="mail_text"> 
                    <label for="'+email+'"><span>'+email+'</span></label> 
                  </div>
                </div>
            </div>
            <button type="submit">Send Code</button>
          </form>
        </div>
        <!-- After Find User To Send OTP End --> */
          }
        },
      });
    }
  });

  ////////// Find Account End ////////////

  /////////// Sending Otp Start ////////////

  $(document).on("click", ".send_rest_cd_btn", function () {
    var selected = $(".otp_send_wrap .selected_email").val();
    var username_for_otp = $(".otp_send_wrap .username_for_otp").val();
    var re_type = $(".reset_type").val();

    var validate = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (selected == "") {
      forgot_pass_wrap(
        "otp_send_wrap",
        "Please select an e-mail.",
        4000,
        "bg_soft"
      );
    } else if (selected != "" && validate.test(selected) == false) {
      forgot_pass_wrap("otp_send_wrap", "Your e-mail is invalid.", 3000, "");
    } else {
      $.ajax({
        url: "./actions/edit.php",
        type: "post",
        data: {
          otp_email: selected,
          otp_user: username_for_otp,
          re_type: re_type,
        },
        beforeSend: function () {
          $(".login_form_wrap .loading_long_bar").show();
          $(".otp_send_wrap button").addClass("cstm_btn_disabled");
          $(".otp_send_wrap button").attr("disabled", true);
          $(".otp_send_wrap button").text("Creating Code..");
        },
        success: function (data) {
          if (data != "no") {
            var otp_title1 = "Nadira Store";
            var otp_title2 = "Verification Code";
            var otp_email_is = selected;
            var otp_code = "Your verification code is " + data;
            $.ajax({
              url: "./actions/send_otp.php",
              type: "post",
              data: {
                otp_title1: otp_title1,
                otp_title2: otp_title2,
                otp_email_is: otp_email_is,
                otp_code: otp_code,
              },
              beforeSend: function () {
                $(".otp_send_wrap button").text("Sending Code..");
              },
              success: function (data_2) {
                $(".login_form_wrap .loading_long_bar").hide();
                var trim_value = $.trim(data_2);
                if (trim_value == "no") {
                  forgot_pass_wrap("otp_send_wrap", "Failed to sent", 4000, "");
                } else {
                  //forgot_pass_wrap('otp_send_wrap','Email Sent Successfully',4000,'bg_soft')
                  $(".otp_send_wrap button").removeClass("cstm_btn_disabled");
                  $(".otp_send_wrap button").attr("disabled", false);
                  $(".otp_send_wrap button").text("Send Code");

                  $(".login_form_wrap").append(
                    ' <div class="after_send_otp_wrap"> <div class="find_alert_div_wrap"></div><div class="close_it saasas flex_all" onclick=close_widget(2)> <span><i class="fas fa-arrow-left"></i></span> </div><h3 class="en_ur_code">Enter your Code</h3> <h6 class="otp_send_to_email">We sent a 6-digit code to <span>' +
                      selected +
                      '</span></h6> <form class="submiting_otp_form w-100" onsubmit="return false"> <div class="form-group"> <label class="form-label" for="for_otp">Enter your code</label> <input id="for_otp" class="form-input input_animated submiting_otp_input" type="text"/> </div><div class="resend_code_wrap"> <button type="submit" class="submit_oto_btn doc_sub_otp_button">Submit</button> <button class="resend_otp resend_code_sending_btn" type="button">Resend Code</button> </div></form> </div>'
                  );

                  setTimeout(() => {
                    $(".otp_send_wrap").removeClass("previous");
                    $(".otp_send_wrap").addClass("current");
                    $(".after_send_otp_wrap").addClass("previous");
                    $(".after_send_otp_wrap .otp_send_to_email span").text(
                      '"' + selected + '"'
                    );
                  }, 200);
                }
              },
            });
          }
        },
      });
    }
  });

  /////////// Sending Otp End //////////////

  /////////// Resend Code Start ///////////

  $(document).on("click", ".resend_code_sending_btn", function () {
    var selected = $(".otp_send_wrap .selected_email").val();
    var username_for_otp = $(".otp_send_wrap .username_for_otp").val();
    var re_type = $(".reset_type").val();

    var validate = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (selected == "") {
      forgot_pass_wrap(
        "otp_send_wrap",
        "Please select an e-mail.",
        4000,
        "bg_soft"
      );
    } else if (selected != "" && validate.test(selected) == false) {
      forgot_pass_wrap("otp_send_wrap", "Your e-mail is invalid.", 3000, "");
    } else {
      $.ajax({
        url: "./actions/edit.php",
        type: "post",
        data: {
          otp_email: selected,
          otp_user: username_for_otp,
          re_type: re_type,
        },
        beforeSend: function () {
          $(".login_form_wrap .loading_long_bar").show();
          $(".resend_code_sending_btn").addClass("cstm_btn_disabled");
          $(".resend_code_sending_btn").attr("disabled", true);
          $(".resend_code_sending_btn").text("Resening Code..");
        },
        success: function (data) {
          if (data != "no") {
            var otp_title1 = "Nadira Store";
            var otp_title2 = "Verification Code";
            var otp_email_is = selected;
            var otp_code = "Your verification code is " + data;
            $.ajax({
              url: "./actions/send_otp.php",
              type: "post",
              data: {
                otp_title1: otp_title1,
                otp_title2: otp_title2,
                otp_email_is: otp_email_is,
                otp_code: otp_code,
              },
              success: function (data_2) {
                $(".login_form_wrap .loading_long_bar").hide();
                var trim_value = $.trim(data_2);
                if (trim_value == "no") {
                  forgot_pass_wrap("otp_send_wrap", "Failed to sent", 4000, "");
                } else {
                  $(".submit_oto_btn").removeClass("cstm_btn_disabled");
                  $(".submit_oto_btn").attr("disabled", false);

                  forgot_pass_wrap(
                    "after_send_otp_wrap",
                    "Code Sent Successfully",
                    4000,
                    "bg_soft"
                  );
                  $(".resend_code_sending_btn").removeClass(
                    "cstm_btn_disabled"
                  );
                  $(".resend_code_sending_btn").attr("disabled", false);
                  $(".resend_code_sending_btn").text("Resend Code");
                }
              },
            });
          }
        },
      });
    }
  });

  /////////// Resend Code End /////////////

  /////////// Resend Code Start ///////////

  $(document).on("click", ".resend_code_sending_btn_when_login", function () {
    var selected = $(".null_usr").val();
    var pass = $(".null_pass").val();

    if (selected == "" || pass == "") {
      forgot_pass_wrap("two_step_wrappp ", wrng, 4000, "");
    } else {
      $.ajax({
        url: "./actions/get.php",
        type: "post",
        data: { username_ownr: selected, password_ownr: pass },
        beforeSend: function () {
          $(".login_form_wrap .loading_long_bar").show();
          $(".resend_code_sending_btn_when_login").addClass(
            "cstm_btn_disabled"
          );
          $(".resend_code_sending_btn_when_login").attr("disabled", true);
          $(".resend_code_sending_btn_when_login").text("Resending Code..");
        },
        success: function (data_3) {
          $(".resend_code_sending_btn_when_login").removeClass(
            "cstm_btn_disabled"
          );
          $(".resend_code_sending_btn_when_login").attr("disabled", false);
          $(".resend_code_sending_btn_when_login").text("Resend Code");
          if (data_3 != "no") {
            var res = $.parseJSON(data_3);
            var code_is = res[0];
            var emial_iss = res[1];

            var otp_title1 = "Nadira Store";
            var otp_title2 =
              "Your verification code to log in to your dashboard";
            var otp_email_is = emial_iss;
            var otp_code = "Your verification code is " + code_is;
            $.ajax({
              url: "./actions/send_otp.php",
              type: "post",
              data: {
                otp_title1: otp_title1,
                otp_title2: otp_title2,
                otp_email_is: otp_email_is,
                otp_code: otp_code,
              },
              success: function (data_4) {
                dismiss_all();

                if (data_4 != "no") {
                  forgot_pass_wrap(
                    "two_step_wrappp ",
                    "Code resend successfully",
                    4000,
                    "bg_soft"
                  );
                } else {
                  forgot_pass_wrap("two_step_wrappp ", wrng, 4000, "");
                }
              },
            });
          }
        },
      });
    }
  });

  /////////// Resend Code End /////////////

  /////////////////// Submiting Otp Code Start ///////////

  $(document).on("click", ".doc_sub_otp_button", function () {
    var submiting_otp = $.trim(
      $(".submiting_otp_form .submiting_otp_input").val()
    );
    var re_type = $.trim($(".reset_type").val());

    if (submiting_otp == "") {
      remove_input_check("after_send_otp_wrap");
      input_check("after_send_otp_wrap .submiting_otp_input");
    } else if (!submiting_otp.match("^(0|[1-9][0-9]*)$")) {
      forgot_pass_wrap(
        "after_send_otp_wrap",
        "Code should be only number",
        4000,
        ""
      );
    } else if (submiting_otp.length != 6) {
      forgot_pass_wrap(
        "after_send_otp_wrap",
        "Code should be equal to 6 digit",
        4000,
        ""
      );
    } else {
      var email_is = $.trim($(".otp_send_wrap .selected_email").val());
      var username_is = $.trim($(".otp_send_wrap .username_for_otp").val());

      $.ajax({
        url: "./actions/create.php",
        type: "post",
        data: {
          email_is: email_is,
          username_is: username_is,
          submiting_otp: submiting_otp,
          re_type: re_type,
        },
        beforeSend: function () {
          $(".login_form_wrap .loading_long_bar").show();
          $(".after_send_otp_wrap .submit_oto_btn").addClass(
            "cstm_btn_disabled"
          );
          $(".after_send_otp_wrap .submit_oto_btn").attr("disabled", true);
          $(".after_send_otp_wrap .submit_oto_btn").text("Submiting Code..");
        },
        success: function (data) {
          $(".login_form_wrap .loading_long_bar").hide();
          $(".after_send_otp_wrap .submit_oto_btn").removeClass(
            "cstm_btn_disabled"
          );
          $(".after_send_otp_wrap .submit_oto_btn").attr("disabled", false);
          $(".after_send_otp_wrap .submit_oto_btn").text("Submit");

          if (data == "no") {
            forgot_pass_wrap(
              "after_send_otp_wrap",
              "Something went wrong, Try again leter",
              4000,
              ""
            );
          } else if (data == "wrong") {
            forgot_pass_wrap(
              "after_send_otp_wrap",
              "Wrong Verification Code",
              4000,
              ""
            );
          } else if (data == "yes") {
            $(".login_form_wrap").append(
              ' <div class="finally_change_pass_wrap"> <div class="find_alert_div_wrap"></div><div class="close_it saasas flex_all" onclick="close_widget(3)"> <span><i class="fas fa-arrow-left"></i></span> </div><h4>Enter your new password</h4> <form class="finally_changing_from w-100" onsubmit="return false"> <div class="form-group"> <label class="form-label" for="new_pass">New password</label> <input id="new_pass" class="form-input input_animated" type="text"/> </div><div class="form-group"> <label class="form-label" for="conf_pass">Confirm Password</label> <input id="conf_pass" class="form-input input_animated" type="text"/> </div><div class="log_in_me_with_change_pass"> <label class="checkbox bounce"> <input type="checkbox" id="log_in_me"> <svg viewBox="0 0 21 21"> <polyline points="5 10.75 8.5 14.25 16 6"></polyline> </svg> </label> <label for="log_in_me" class="log_in_me_label">Log in me to my account</label> </div><button type="submit" class="chng_pass_btn doc_chng_pass_button">Change password</button> </form> </div>'
            );

            setTimeout(() => {
              $(".after_send_otp_wrap").removeClass("previous");
              $(".after_send_otp_wrap").addClass("current");
              $(".finally_change_pass_wrap").addClass("previous");
            }, 200);
          }
        },
      });
    }
  });

  /////////////////// Submiting Otp Code End /////////////

  ///////////////// Finally Changing Password Start /////////////

  $(document).on("click", ".doc_chng_pass_button", function () {
    var new_pass = $.trim($(".finally_changing_from #new_pass").val());
    var conf_pass = $.trim($(".finally_changing_from #conf_pass").val());
    var re_type = $.trim($(".reset_type").val());

    var auth_user = $.trim($(".otp_send_wrap .username_for_otp").val());
    var auth_email = $.trim($(".otp_send_wrap .selected_email").val());
    if ($(".finally_changing_from #log_in_me").is(":checked")) {
      var log_in_me = "yes";
    } else {
      var log_in_me = "no";
    }

    if (new_pass == "") {
      remove_input_check("finally_change_pass_wrap");
      input_check("finally_change_pass_wrap #new_pass");
    } else if (conf_pass == "") {
      remove_input_check("finally_change_pass_wrap");
      input_check("finally_change_pass_wrap #conf_pass");
    } else if (new_pass !== conf_pass) {
      forgot_pass_wrap(
        "finally_change_pass_wrap",
        "New and Confirm password are not matched",
        4000,
        ""
      );
    } else {
      remove_input_check("finally_change_pass_wrap");
      $.ajax({
        url: "./actions/edit.php",
        type: "post",
        data: {
          auth_user: auth_user,
          auth_email: auth_email,
          new_pass: new_pass,
          log_in_me: log_in_me,
          re_type: re_type,
        },
        beforeSend: function () {
          $(".login_form_wrap .loading_long_bar").show();
          $(".finally_change_pass_wrap .chng_pass_btn").addClass(
            "cstm_btn_disabled"
          );
          $(".finally_change_pass_wrap .chng_pass_btn").attr("disabled", true);
          $(".finally_change_pass_wrap .chng_pass_btn").text(
            "Changing Password.."
          );
        },
        success: function (data) {
          $(".null_usr").val(auth_user);
          $(".null_pass").val(new_pass);

          if (data == "no") {
            chng_pass_dismiss();
            forgot_pass_wrap(
              "finally_change_pass_wrap",
              "Something went wrong, Try again leter",
              4000,
              ""
            );
          } else if (data == "normal_yes") {
            chng_pass_dismiss();
            forgot_pass_wrap(
              "finally_change_pass_wrap",
              "Password Changed Successfully",
              2000,
              "bg_success"
            );
            setTimeout(() => {
              $(".finally_change_pass_wrap").removeClass("previous");
              setTimeout(() => {
                $(".after_send_otp_wrap").removeClass("current");
                setTimeout(() => {
                  $(".otp_send_wrap").removeClass("current");
                  setTimeout(() => {
                    $(".forgot_pass_wrap").removeClass("current");
                    setTimeout(() => {
                      $(".user_main_login_wrap").removeClass("current");
                    }, 100);
                  }, 100);
                }, 100);
              }, 100);
            }, 2000);
          } else if (data == "login_yes") {
            chng_pass_dismiss();
            forgot_pass_wrap(
              "finally_change_pass_wrap",
              "Password Changed Successfully",
              2000,
              "bg_success"
            );
            setTimeout(() => {
              forgot_pass_wrap(
                "finally_change_pass_wrap",
                "Redirecting into your account",
                2000,
                "bg_success"
              );
              setTimeout(() => {
                window.location.href = "./profile.php";
              }, 1500);
            }, 2000);
          } else if (data == "login_dash_yes") {
            chng_pass_dismiss();
            forgot_pass_wrap(
              "finally_change_pass_wrap",
              "Password Changed Successfully",
              2000,
              "bg_success"
            );
            setTimeout(() => {
              forgot_pass_wrap(
                "finally_change_pass_wrap",
                "Redirecting into your dashboard",
                2000,
                "bg_success"
              );
              setTimeout(() => {
                store_code();
              }, 1500);
            }, 2000);
          } else if (data == "login_with_two_step") {
            $.ajax({
              url: "./actions/get.php",
              type: "post",
              data: { username_ownr: auth_user, password_ownr: new_pass },
              success: function (data_3) {
                if (data_3 != "no") {
                  var res = $.parseJSON(data_3);
                  var code_is = res[0];
                  var emial_iss = res[1];

                  var otp_title1 = "Nadira Store";
                  var otp_title2 =
                    "Your verification code to log in to your dashboard";
                  var otp_email_is = emial_iss;
                  var otp_code = "Your verification code is " + code_is;
                  $.ajax({
                    url: "./actions/send_otp.php",
                    type: "post",
                    data: {
                      otp_title1: otp_title1,
                      otp_title2: otp_title2,
                      otp_email_is: otp_email_is,
                      otp_code: otp_code,
                    },
                    success: function (data_4) {
                      dismiss_all();
                      if (data_4 != "no") {
                        chng_pass_dismiss();
                        $(".login_form_wrap").append(
                          ' <div class="after_send_otp_wrap two_step_wrappp"> <div class="find_alert_div_wrap"></div><div onclick="close_two_step()" class="close_it saasas flex_all" data-closetype="fade"> <span><i class="fas fa-long-arrow-alt-left"></i></span> </div><h6 class="two_step_title">Two-step Verification</h6> <p class="two_step_para">We sent a 6-digit code to your e-mail</p><form onsubmit="return false" class="two_step_submit_form w-100"> <div class="form-group"> <input type="text" placeholder="Enter your 6-digit code" class="tw_step_input_code"/> </div><div class="resend_code_wrap"> <button type="submit" class="two_step_submit_btn" onclick="get_two_step_code()">Submit</button> <button class="resend_otp resend_code_sending_btn" type="button">Resend Code</button> </div></form> </div>'
                        );

                        setTimeout(() => {
                          $(".user_main_login_wrap").addClass("current");
                          $(".finally_change_pass_wrap ").removeClass(
                            "previous"
                          );
                          $(".finally_change_pass_wrap ").addClass("current");
                          $(".two_step_wrappp").addClass("previous");
                        }, 200);
                      }
                    },
                  });
                } else {
                  alert(wrng);
                }
              },
            });
          }
        },
      });
    }
  });

  ///////////////// Finally Changing Password End ///////////////

  setInterval(() => {
    scroll_notification();
    unseen_notification();
  }, 1000 * 300);

  $(".load_notification_click_span").click(function () {
    if ($(".currently_loaded_list").val() == "0") {
      scroll_notification();
      $(".currently_loaded_list").val("1");
    }
    var all_seen = "seen";
    $.ajax({
      url: "./actions/edit.php",
      type: "post",
      data: { all_seen: all_seen },
      success: function (e) {
        if (e == "yes") {
          $(".load_notification_click_span i").removeClass("animated_icon_s");
          $(".notification_count_wrap").addClass("d-none");
        }
      },
    });
  });

  ////////// Owner Two Step VErification On Off Start

  $(".owner_t_stp_on_click, .two_step_title_ow_clck").click(function () {
    var inp = $(".owner_t_stp_inp").prop("checked");

    if (inp == false) {
      var on_two_step = "on";
      $.ajax({
        url: "./actions/edit.php",
        type: "post",
        data: { on_two_step: on_two_step },
        beforeSend: function () {
          $(".owner_t_stp_on_boll").html('<div class="spinner_double"></div>');
        },
        success: function (data) {
          $(".owner_t_stp_on_boll").html("");
          if (data == "yes") {
            $(".owner_t_stp_inp").prop("checked", true);
            cstm_alert_div("Two-step verification is On", 3000);
            $(".tw_stp_off_p_txt").removeClass("Off");
            $(".tw_stp_off_p_txt").text("Currently is On");
          } else {
            cstm_alert_div(wrng, 4000);
          }
        },
      });
    } else {
      var off_two_step = "off";
      $.ajax({
        url: "./actions/edit.php",
        type: "post",
        data: { off_two_step: off_two_step },
        beforeSend: function () {
          $(".owner_t_stp_on_boll").html('<div class="spinner_double"></div>');
        },
        success: function (data) {
          $(".owner_t_stp_on_boll").html("");
          if (data == "yes") {
            $(".owner_t_stp_inp").prop("checked", false);
            cstm_alert_div("Two-step verification is Off", 3000);
            $(".tw_stp_off_p_txt").addClass("Off");
            $(".tw_stp_off_p_txt").text("Currently is Off");
          } else {
            cstm_alert_div(wrng, 4000);
          }
        },
      });
    }
  });
  ////////// Owner Two Step VErification On Off End

  ////////// Store Secrect Code On Off Start

  $(".scrt_code_label_clck, .scrt_code_label_clck_title").click(function () {
    var inp = $(".scrt_code_inpt").prop("checked");

    if (inp == false) {
      var scrt_on = "on";
      $.ajax({
        url: "./actions/edit.php",
        type: "post",
        data: { scrt_on: scrt_on },
        beforeSend: function () {
          $(".scrt_code_label_clck .cstm_checkbox_boll").html(
            '<div class="spinner_double"></div>'
          );
        },
        success: function (data) {
          $(".scrt_code_label_clck .cstm_checkbox_boll").html("");
          if (data == "yes") {
            $(".scrt_code_inpt").prop("checked", true);
            cstm_alert_div("Store secrect code is On", 3000);
            $(".scrt_on_p_txt").removeClass("Off");
            $(".scrt_on_p_txt").text("Currently is On");
          } else {
            cstm_alert_div(wrng, 4000);
          }
        },
      });
    } else {
      var scrt_off = "off";
      $.ajax({
        url: "./actions/edit.php",
        type: "post",
        data: { scrt_off: scrt_off },
        beforeSend: function () {
          $(".scrt_code_label_clck .cstm_checkbox_boll").html(
            '<div class="spinner_double"></div>'
          );
        },
        success: function (data) {
          $(".scrt_code_label_clck .cstm_checkbox_boll").html("");
          if (data == "yes") {
            $(".scrt_code_inpt").prop("checked", false);
            cstm_alert_div("Store secrect code is Off", 3000);
            $(".scrt_on_p_txt").addClass("Off");
            $(".scrt_on_p_txt").text("Currently is Off");
          } else {
            cstm_alert_div(wrng, 4000);
          }
        },
      });
    }
  });
  ////////// Store Secrect Code On Off End

  /////////////// Owner Change Password When Logged In Start

  $(".owner_chng_pass_whn_loged_in_form").submit(function (e) {
    e.preventDefault();

    var pass_1 = $.trim($(".crnt_ow_pass").val());
    var pass_2 = $.trim($(".new_ow_pass").val());
    var pass_3 = $.trim($(".con_ow_pass").val());
    var veri_on = $.trim($(".ow_ver_cod_inpt").val());
    var veri = $.trim($(".ver_fi_cation_on_off").val());
    var remove = "ow_pass_body_div";
    if (pass_1 == "" && veri != "on") {
      remove_input_check(remove);
      input_check(remove + " .crnt_ow_pass");
    } else if (veri == "on" && veri_on == "") {
      remove_input_check(remove);
      input_check(remove + " .ow_ver_cod_inpt");
    } else if (pass_2 == "") {
      remove_input_check(remove);
      input_check(remove + " .new_ow_pass");
    } else if (pass_3 == "") {
      remove_input_check(remove);
      input_check(remove + " .con_ow_pass");
    } else if (pass_2 !== pass_3) {
      remove_input_check(remove);
      input_check(remove + " .con_ow_pass");
      input_check(remove + " .new_ow_pass");
      $(".ow_pass_change_error_p").text(
        "New and Confirm password are not matched!"
      );
    } else {
      if (veri == "on") {
        remove_input_check(remove);
        $.ajax({
          url: "./actions/get.php",
          type: "post",
          data: { pass_2_veri: pass_2, veri: veri_on },
          beforeSend: function () {
            $(".ow_pass_body_div .loading_long_bar").show();
          },
          success: function (data_3) {
            $(".ow_pass_body_div .loading_long_bar").hide();
            if (data_3 == "yes") {
              cstm_alert_div("Password changed successfully", 4000);
              $(".ow_pass_change_error_p").text("");
              empty_input_val(remove);
              $(".ow_cur_nt_pass").slideDown(200);
              $(".ow_ver_fication_code").slideUp(200);
              $(".ow_frogot_pass_whn_lg_in").show();
              $(".ow_frogot_pass_loading").html("");
              $(".ow_frogot_pass_whn_lg_in_re_send").hide();
            } else if (data_3 == "wrong") {
              remove_input_check(remove);
              input_check(remove + " .ver_fi_cation_on_off");
              $(".ow_pass_change_error_p").text("Wrong verification code");
            } else {
              cstm_alert_div(wrng, 4000);
              $(".ow_pass_change_error_p").text("");
            }
          },
        });
      } else {
        remove_input_check(remove);
        $.ajax({
          url: "./actions/get.php",
          type: "post",
          data: { pass_1: pass_1 },
          beforeSend: function () {
            $(".ow_pass_body_div .loading_long_bar").show();
          },
          success: function (data_1) {
            if (data_1 == "yes") {
              $.ajax({
                url: "./actions/edit.php",
                type: "post",
                data: { pass_2: pass_2 },
                success: function (data_2) {
                  $(".ow_pass_body_div .loading_long_bar").hide();
                  if (data_2 == "yes") {
                    cstm_alert_div("Password changed successfully", 4000);
                    $(".ow_pass_change_error_p").text("");
                    empty_input_val(remove);
                  } else {
                    cstm_alert_div(wrng, 4000);
                    $(".ow_pass_change_error_p").text("");
                  }
                },
              });
            } else {
              $(".ow_pass_body_div .loading_long_bar").hide();
              input_check(remove + " .crnt_ow_pass");
              $(".ow_pass_change_error_p").text("Incorrect Password!");
            }
          },
        });
      }
    }
  });

  /////////////// Owner Change Password When Logged In End

  /////////////// Owner Forgot Password When Logged In Start

  $(".ow_frogot_pass_whn_lg_in").click(function () {
    cstm_confirm(
      "frgt_ow_pass",
      "Send Verification Code",
      "By clicking Ok, we will send a 6-digit code to your e-mail to verify that it’s you.",
      "Ok, Send Code",
      ""
    );

    $(".dlt_btn").click(function () {
      if ($(".conf_code").val() === "frgt_ow_pass") {
        close_confirm();
        var forgot_ow_pass = "forgot";
        $.ajax({
          url: "./actions/get.php",
          type: "post",
          data: { forgot_ow_pass: forgot_ow_pass },
          beforeSend: function () {
            $(".ow_frogot_pass_whn_lg_in").hide();
            $(".ow_pass_body_div .loading_long_bar").show();
            $(".ow_frogot_pass_loading").html(
              'Creating code<i class="fas fa-sync-alt rotate_right ml-2"></i>'
            );
          },
          success: function (data) {
            if (data != "no") {
              var result = $.parseJSON(data);
              var code = result[0];
              var mail = result[1];

              var otp_title1 = "Nadira Store";
              var otp_title2 = "Verification code";
              var otp_email_is = mail;
              var otp_code = "Your verification code is " + code;
              $.ajax({
                url: "./actions/send_otp.php",
                type: "post",
                data: {
                  otp_title1: otp_title1,
                  otp_title2: otp_title2,
                  otp_email_is: otp_email_is,
                  otp_code: otp_code,
                },
                beforeSend: function () {
                  $(".ow_frogot_pass_loading").html(
                    'Sending code<i class="fas fa-sync-alt rotate_right ml-2"></i>'
                  );
                },
                success: function (data_4) {
                  if (data_4 != "no") {
                    $(".ver_fi_cation_on_off").val("on");
                    $(".ow_pass_body_div .loading_long_bar").hide();
                    $(".ow_frogot_pass_loading").html(
                      'Code sent successfully<i class="fas fa-check ml-2"></i>'
                    );
                    $(".ow_frogot_pass_whn_lg_in_re_send").show();
                    $(".ow_cur_nt_pass").slideUp(200);
                    $(".ow_ver_fication_code").slideDown(200);
                  } else {
                    cstm_alert_div("Something went wrong!", 3000);
                    $(".ow_pass_body_div .loading_long_bar").hide();
                    $(".ow_frogot_pass_loading").html("");
                  }
                },
              });
            } else {
              cstm_alert_div(wrng, 4000);
              $(".ow_pass_body_div .loading_long_bar").hide();
              $(".ow_frogot_pass_loading").html("");
            }
          },
        });
      }
    });
  });

  $(".ow_frogot_pass_whn_lg_in_re_send").click(function () {
    var forgot_ow_pass = "forgot";
    $.ajax({
      url: "./actions/get.php",
      type: "post",
      data: { forgot_ow_pass: forgot_ow_pass },
      beforeSend: function () {
        $(".ow_frogot_pass_whn_lg_in").hide();
        $(".ow_frogot_pass_whn_lg_in_re_send").hide();
        $(".ow_pass_body_div .loading_long_bar").show();
        $(".ow_frogot_pass_loading").html(
          'Creating code<i class="fas fa-sync-alt rotate_right ml-2"></i>'
        );
      },
      success: function (data) {
        if (data != "no") {
          var result = $.parseJSON(data);
          var code = result[0];
          var mail = result[1];

          var otp_title1 = "Nadira Store";
          var otp_title2 = "Verification code";
          var otp_email_is = mail;
          var otp_code = "Your verification code is " + code;
          $.ajax({
            url: "./actions/send_otp.php",
            type: "post",
            data: {
              otp_title1: otp_title1,
              otp_title2: otp_title2,
              otp_email_is: otp_email_is,
              otp_code: otp_code,
            },
            beforeSend: function () {
              $(".ow_frogot_pass_loading").html(
                'Resending code<i class="fas fa-sync-alt rotate_right ml-2"></i>'
              );
            },
            success: function (data_4) {
              if (data_4 != "no") {
                $(".ver_fi_cation_on_off").val("on");
                $(".ow_pass_body_div .loading_long_bar").hide();
                $(".ow_frogot_pass_loading").html(
                  'Code sent successfully<i class="fas fa-check ml-2"></i>'
                );
                $(".ow_frogot_pass_whn_lg_in_re_send").show();
                $(".ow_frogot_pass_whn_lg_in_re_send").show();
              } else {
                cstm_alert_div("Something went wrong!", 3000);
                $(".ow_pass_body_div .loading_long_bar").hide();
                $(".ow_frogot_pass_loading").html("");
              }
            },
          });
        } else {
          cstm_alert_div(wrng, 4000);
          $(".ow_pass_body_div .loading_long_bar").hide();
          $(".ow_frogot_pass_loading").html("");
        }
      },
    });
  });

  /////////////// Owner Forgot Password When Logged In End

  //// Client Payment Start

  $(".client_payment_form").submit(function (e) {
    e.preventDefault();

    var total_due = Number($.trim($(".client_due_total_input input").val()));
    var this_val = $.trim($(".client_due_total_pay_input input").val());

    var user_id = $.trim(
      $(".client_due_list_add_form .hidden_user_id_due_list").val()
    );
    var user_refer_id = $(".rafer_user_id").val();

    //var minus = (total_due - this_val)
    //$(".client_due_will_input input").val(minus)

    if (this_val == "") {
      cstm_alert_div("Payment amount required", 4000);
      $(".client_due_total_pay_input input").focus();
    } else if (this_val * 1 > total_due) {
      cstm_alert_div(
        "Amount should be less then or equal to the total amount",
        5000
      );
      $(".client_due_will_input input").val("");
    } else if (!this_val.match("^(0|[1-9][0-9]*)$")) {
      cstm_alert_div("Amount should be only number", 4000);
      $(".client_due_will_input input").val("");
    } else if (this_val * 1 == 0 || this_val * 1 < 0) {
      cstm_alert_div("Amount can not be 0 or less then 0", 4000);
    } else if (
      user_id != user_refer_id ||
      !user_id.match("^(0|[1-9][0-9]*)$") ||
      !user_refer_id.match("^(0|[1-9][0-9]*)$") ||
      user_id == "" ||
      user_refer_id == ""
    ) {
      $(".client_due_list_add_form input").removeClass("border_red");
      cstm_alert_div("Invalid User ID! Please refresh the page.", 3000);
    } else {
      $.ajax({
        url: "./actions/create.php",
        type: "post",
        data: {
          user_pay_is: this_val,
          user_total_due: total_due,
          user_pay_id_is: user_id,
        },
        beforeSend: function () {
          $(".pay_form_heading i").removeClass("d-none");
          $(".user_pay_submit_btnn").addClass("cstm_btn_disabled");
          $(".user_pay_submit_btnn").attr("disabled", true);
        },
        success: function (data) {
          if (data == "yes") {
            $(".client_due_total_pay_input input").val("");
            $(".client_due_will_input input").val("");
            $(".pay_form_heading i").addClass("d-none");
            $(".user_pay_submit_btnn").removeClass("cstm_btn_disabled");
            $(".user_pay_submit_btnn").attr("disabled", false);

            $.ajax({
              url: "./actions/get.php",
              type: "post",
              data: { total_Due_id: user_id },
              success: function (data) {
                if (data != "no") {
                  animating_count(".client_profile_total_due span", data);
                  $(".client_due_total_input input").val(data);
                  total_custommer_due = data;
                  store_total_due();
                }
              },
            });
            cstm_alert_div("Payment successfull.", 4000);
            get_client_due_list(user_id, "15", "h");
            $(".client_due_list_wrap_body").scrollTop(99999999999999999999);
            current_month_due();
            store_total_due();
            report_length_check();
            current_month_due_collect();
            last_notification();
          } else {
            cstm_alert_div(wrng, 5000);
          }
        },
      });
    }
  });

  //// Client Payment End

  ////////// User Due List Filter Start

  $(".user_filter_duee_list_ul_by_ow li").click(function () {
    $(".user_filter_duee_list_ul_by_ow li").removeClass("active_filter");
    $(this).addClass("active_filter");
    var filter_value = $(this).data("userlist-filter");
    var user_id = $(".hidden_user_id_due_list").val();
    var crnt_value = $(".crntly_filter_value").val();
    var no_list = $(".user_no_due_list").val();

    if (crnt_value != filter_value && no_list != "0") {
      var crnt_value = $(".crntly_filter_value").val(filter_value);
      if (filter_value != "18446744073709551615") {
        $(".client_due_list_wrap_filter .due_fiter_div span p").text(
          "Last " + filter_value + " rows"
        );
        get_client_due_list(user_id, filter_value, "h");
        cstm_alert_div(
          "Currently showing last " + filter_value + " rows",
          4000
        );
      } else {
        $(".client_due_list_wrap_filter .due_fiter_div span p").text(
          "Lifetime"
        );
        get_client_due_list(user_id, filter_value, "h");
        cstm_alert_div("Currently showing all of the rows", 4000);
      }
    }
    setTimeout(() => {
      $(".user_filter_duee_list_ul_by_ow").removeClass("show_all");
    }, 150);
  });

  ////////// User Due List Filter End

  $(".sgst_form").submit(function (e) {
    e.preventDefault();
    var typ = $(".sgst_form_type").val();
    var main_wrd = $.trim($(".edt_sgst_input_main").val());
    var related_wrd = $.trim($(".edt_sgst_input_related").val());
    var sgst_edit_id = $(".edt_sgst_input_re_id").val();

    if (main_wrd == "") {
      $(".edt_sgst_input_main").addClass("border_red");
      $(".edt_sgst_input_related").removeClass("border_red");
      $(".edt_sgst_input_main").focus();
      //$("#main_wrd").focus()
    } else if (related_wrd == "") {
      $(".edt_sgst_input_main").removeClass("border_red");
      $(".edt_sgst_input_related").addClass("border_red");
      $(".edt_sgst_input_related").focus();
    } else {
      if (typ == "updt") {
        $.ajax({
          url: "./actions/edit.php",
          type: "post",
          data: {
            main_wrd_ed: main_wrd,
            related_wrd_ed: related_wrd,
            sgst_edit_id_n: sgst_edit_id,
          },
          beforeSend: () => {
            $(".sgst_form .sgst_fire_btn").attr("disabled", true);
            $(".sgst_form .sgst_fire_btn").html(
              '<div class="slim_spinner_normal"></div>'
            );
          },
          success: function (e) {
            $(".sgst_form .sgst_fire_btn").attr("disabled", false);
            if (e == "yes") {
              $(".edit_sgst_wrap_overly").removeClass("show_all");
              $(".edt_sgst_input_main").removeClass("border_red");
              $(".edt_sgst_input_main").val("");
              $(".edt_sgst_input_related").removeClass("border_red");
              $(".edt_sgst_input_related").val("");

              $(".find_sgst_row_id_" + sgst_edit_id).addClass("h_light_p");
              setTimeout(() => {
                $(".find_sgst_row_id_" + sgst_edit_id).removeClass("h_light_p");
              }, 800);
              $(
                ".find_sgst_row_id_" + sgst_edit_id + " .main_word_wrap p"
              ).text(main_wrd);
              $(
                ".find_sgst_row_id_" + sgst_edit_id + " .related_word_wrap  p"
              ).text(related_wrd);
              cstm_alert_div("List edited successfully", 4000);
            } else {
              alert(wrng);
            }
          },
        });
      } else if (typ == "sbmt") {
        $.ajax({
          url: "./actions/create.php",
          type: "post",
          data: { main_wrd: main_wrd, related_wrd: related_wrd },
          beforeSend: () => {
            $(".sgst_form .sgst_fire_btn").attr("disabled", true);
            $(".sgst_form .sgst_fire_btn").html(
              '<div class="slim_spinner_normal"></div>'
            );
          },
          success: function (e) {
            $(".sgst_form .sgst_fire_btn").attr("disabled", false);
            if (e != "no") {
              $(".edit_sgst_wrap_overly").removeClass("show_all");
              $(".suggested_list_wrap").append(e);
              $(".edt_sgst_input_re_id").val("");
              cstm_alert_div("List added successfully", 4000);

              $(".edt_sgst_input_main").removeClass("border_red");
              $(".edt_sgst_input_main").val("");
              $(".edt_sgst_input_related").removeClass("border_red");
              $(".edt_sgst_input_related").val("");
            } else {
              alert(wrng);
            }
          },
        });
      }
    }
  });

  $(".add_new_sgst").click(function () {
    $(".edit_sgst_wrap_overly").addClass("show_all");
    $(".edit_sgst_wrap h4").text("Add New List");
    $(".sgst_form button").text("Add");
    $(".sgst_form .sgst_form_type").val("sbmt");
    $(".edt_sgst_input_re_id").val("");
    $(".edt_sgst_input_main").val("");
    $(".edt_sgst_input_related").val("");
  });

  $(".manage_word_li").click(function () {
    $(".sgst_overly_main_wrap").addClass("show_all");
    get_all_sgst();
  });

  $(".suggest_container .nti_search_input_wrap input").keyup(function () {
    var val = $(this).val();
    search_data(val, "single_suggested_list_wrap", "sgst_nothing_found");
  });

  $(".clients_search_box input").keyup(function () {
    var val = $(this).val();
    search_data(val, "all_clients_list_body .cstm_col", "client_nothing_found");
  });

  $(".srch_notifi_cation").keyup(function () {
    var val = $(this).val();
    search_data(val, "single_notification_wrap", "notifi_nothing_found");
  });

  $(".client_due_list_wrap_search input").keyup(function () {
    var val = $(this).val();
    search_data(
      val,
      "client_due_list_wrap_single_due_list_wrap",
      "due_list_nothing_found"
    );
  });

  $(document).on("click", ".delete_user__li", function () {
    var dataIs = $(this).data("deleteuserli");
    cstm_confirm(
      "dlt_ing_usr",
      "Are You Sure To Delete?",
      "You are going to delete this user. By clicking Ok you will delete all the data about this user and those data are not undoable.",
      "Yes, Delete it",
      dataIs
    );
  });

  $(document).on("click", ".user_list_delete__li", function () {
    var dataIs = $(this).data("usrlistdtl");
    cstm_confirm(
      "dtl_due_list",
      "Are You Sure To Delete?",
      "You are going to delete this list.",
      "Ok , Delete it",
      dataIs
    );
  });

  $(document).on("click", ".dtl__admin__span", function () {
    var dataIs = $(this).data("dtladminid");
    cstm_confirm(
      "dlt_ing_admin",
      "Are You Sure To Delete?",
      "You are going to delete this Admin. By clicking Ok you will delete all the data about this admin.",
      "Yes, Delete it",
      dataIs
    );
  });

  $(document).on("click", ".sgst_dlt_spn", function () {
    var dataIs = $(this).data("deletesgst");
    cstm_confirm(
      "dlt_sgst",
      "Are You Sure To Delete?",
      "You are going to delete a list",
      "Yes, Delete it",
      dataIs
    );
  });

  $(".confirm_btn_wrap .dlt_btn").click(function () {
    var match = $(".confirm_btn_wrap .conf_code").val();
    var idIs = $(".confirm_btn_wrap .actin_id_is").val();
    if (match == "dlt_ing_usr" && idIs != "") {
      delete_user(idIs);
    } else if (match == "dtl_due_list" && idIs != "") {
      delete_due_list(idIs);
    } else if (match == "dlt_ing_admin" && idIs != "") {
      delete_admin(idIs);
    } else if (match == "dlt_sgst" && idIs != "") {
      delete_sgst_list(idIs);
    }
  });

  $(".clear_all_notification").click(function () {
    cstm_confirm(
      "dtl_noti",
      "Are You Sure To Delete",
      "You are going to delete all the notifications.",
      "Yes, Delete All",
      ""
    );
    $(".notifications_wrap").addClass("infinity_show");
    $(".dlt_btn").click(function () {
      if ($(".conf_code").val() == "dtl_noti") {
        close_confirm();
        var dtl_all_noti = "owner_notification";
        $.ajax({
          url: "./actions/delete.php",
          type: "post",
          data: { dtl_all_noti: dtl_all_noti },
          beforeSend: function () {
            $(".notification_loading_bar").show();
          },
          success: function (data) {
            $(".notification_loading_bar").hide();
            if (data == "yes") {
              $(".notification_body").html("");
              cstm_nothing_found(
                "notification_body",
                "nothing_found.png",
                "No Notification",
                "You have currently no notifications to show."
              );
              setTimeout(() => {
                $(".notifications_wrap").removeClass("infinity_show");
              }, 1000);
              $(".notification_count_wrap").addClass("d-none");
              $(".clear_all_notification").addClass("no_pinter");
            } else {
              $(".notification_body").html("");
              cstm_nothing_found(
                "notification_body",
                "error.png",
                "Something Went Wrong!",
                "Look like database failed to connect, or please check your internet connection."
              );
              setTimeout(() => {
                $(".notifications_wrap").removeClass("infinity_show");
              }, 2000);
              setTimeout(() => {
                $(".notifications_wrap").removeClass("infinity_show");
              }, 1000);
            }
          },
        });
      }
    });
  });

  //////////// Edit Single Due list Start /////////////////

  $(".edit_due_list_form").submit(function (e) {
    e.preventDefault();

    var e_p_name = $.trim($(".edit_due_list_wrap .edit_p_name").val());
    var e_p_price = $.trim($(".edit_due_list_wrap .edit_p_price").val());
    var e_p_note = $.trim($(".edit_due_list_wrap .edit_p_note").val());
    var e_p_id = $.trim($(".edit_due_list_wrap .edit_p_id").val());

    if (e_p_name == "") {
      remove_input_check("edit_due_list_wrap");
      input_check("edit_due_list_wrap .edit_p_name");
    } else if (e_p_price == "") {
      remove_input_check("edit_due_list_wrap");
      input_check("edit_due_list_wrap .edit_p_price");
    } else if (e_p_price != "" && !e_p_price.match("^(0|[1-9][0-9]*)$")) {
      remove_input_check("edit_due_list_wrap");
      input_check("edit_due_list_wrap .edit_p_price");
      success_message(
        "Product Price Must Be A Number",
        "edit_due_list_wrap",
        "bg_danger",
        4000
      );
    } else {
      remove_input_check("edit_due_list_wrap");
      $.ajax({
        url: "./actions/edit.php",
        type: "post",
        data: {
          e_p_name: e_p_name,
          e_p_price: e_p_price,
          e_p_note: e_p_note,
          e_p_id: e_p_id,
        },
        beforeSend: function () {
          $(".edit_due_list_overly .loading_long_bar").show();
          $(".edit_due_list_overly .submit_c_edit_btn").addClass(
            "cstm_btn_disabled"
          );
          $(".edit_due_list_overly .submit_c_edit_btn").attr("disabled", true);
          $(".edit_due_list_overly .submit_c_edit_btn").text(
            "Editing Client List.."
          );
        },
        success: function (data) {
          if (data == "yes") {
            if (e_p_note != "") {
              $(
                ".due_list_id_" + e_p_id + " .inner_list_ul .view_note_li"
              ).show();
            } else {
              $(
                ".due_list_id_" + e_p_id + " .inner_list_ul .view_note_li"
              ).hide();
            }

            current_month_due();
            store_total_due();
            total_due($(".hidden_user_id_due_list").val());
            $(".due_list_id_" + e_p_id + " .product_name span").text(e_p_name);
            $(".due_list_id_" + e_p_id + " .product_price span").text(
              e_p_price + " tk"
            );
            $(".edit_due_list_overly .loading_long_bar").hide();
            $(".edit_due_list_overly .submit_c_edit_btn").removeClass(
              "cstm_btn_disabled"
            );
            $(".edit_due_list_overly .submit_c_edit_btn").attr(
              "disabled",
              false
            );
            $(".edit_due_list_overly .submit_c_edit_btn").text("Edit List");
            empty_input_val("edit_due_list_overly");
            $(".edit_due_list_overly").hide();
            cstm_alert_div("List Edited Succesfully", 4000);
            setTimeout(() => {
              $(".edit_due_list_overly").removeClass("show_all");
              $(".edit_due_list_overly").show();
            }, 500);

            report_length_check();
          } else {
            $(".edit_due_list_wrap .loading_long_bar").hide();
            $(".edit_due_list_overly .submit_c_edit_btn").removeClass(
              "cstm_btn_disabled"
            );
            $(".edit_due_list_overly .submit_c_edit_btn").attr(
              "disabled",
              false
            );
            $(".edit_due_list_overly .submit_c_edit_btn").text("Edit Client");
            success_message(
              "Failed to edit, Try again.",
              "edit_due_list_wrap",
              "bg_danger",
              5000
            );
          }
        },
      });
    }
  });

  //////////// Edit Single Due list End /////////////////
  $(".edit_admin_overly .cstm_close").click(function () {
    empty_input_val("edit_admin_overly");
  });
  $(".confirm_btn_wrap .dlt_btn, .confirm_btn_wrap .cncl_btn").click(
    function () {
      if ($(".conf_code").val() === "null_user") {
        close_confirm();
      }
    }
  );

  $(".edit_client_overly .cstm_close").click(function () {
    empty_input_val("edit_client_overly");
  });

  var typingTimer;

  $(".suggest_input_wrap .product_name").keyup(function (event) {
    if ($(".onnOffSuggest input").prop("checked") == true) {
      clearTimeout(typingTimer);
      if (
        $.trim($(".suggest_input_wrap .product_name").val().length) > 0 &&
        event.keyCode !== 38 &&
        event.keyCode !== 40 &&
        event.keyCode !== 13 &&
        event.keyCode !== 32 &&
        $(".form_submit_yes_no").val() == "true"
      ) {
        if ($.trim($(".suggest_input_wrap .product_name").val().length) <= 1) {
          var doneTypingInterval = 1200; //1200
          typingTimer = setTimeout(doneTyping, doneTypingInterval);
        } else if (
          $.trim($(".suggest_input_wrap .product_name").val().length) <= 2
        ) {
          var doneTypingInterval = 500;
          typingTimer = setTimeout(doneTyping, doneTypingInterval);
        } else if (
          $.trim($(".suggest_input_wrap .product_name").val().length) > 2
        ) {
          var doneTypingInterval = 200;
          typingTimer = setTimeout(doneTyping, doneTypingInterval);
        }
      }

      var last_cher = $.trim($(this).val().substr(-1));
      var last_cher_two = $.trim($(this).val().substr(-2));
      var last_cher_three = $.trim($(this).val().substr(-3));
      var last_cher_four = $.trim($(this).val().substr(-4));

      var main_val = $.trim($(this).val());
      var remove_last = $.trim(main_val.substring(0, main_val.length - 1));
      var remove_last_two = $.trim(main_val.substring(0, main_val.length - 2));
      var remove_last_three = $.trim(
        main_val.substring(0, main_val.length - 3)
      );
      var remove_last_four = $.trim(main_val.substring(0, main_val.length - 4));

      if (
        last_cher_two == "kg" ||
        last_cher_two == "Kg" ||
        last_cher_two == "kG" ||
        last_cher_two == "KG"
      ) {
        $(this).val(remove_last_two + " কেজি");
      } else if (
        last_cher_two == "gm" ||
        last_cher_two == "gM" ||
        last_cher_two == "Gm" ||
        last_cher_two == "GM"
      ) {
        $(this).val(remove_last_two + " গ্রাম");
      } else if (
        last_cher_three == "ltr" ||
        last_cher_three == "Ltr" ||
        last_cher_three == "lTr" ||
        last_cher_three == "ltR" ||
        last_cher_three == "LTR"
      ) {
        $(this).val(remove_last_three + " লিটার");
      } else if (
        last_cher_two == "dd" ||
        last_cher_two == "Dd" ||
        last_cher_two == "dD" ||
        last_cher_two == "DD"
      ) {
        $(this).val(remove_last_two + " ডার্বি");
      } else if (
        last_cher_two == "pp" ||
        last_cher_two == "Pp" ||
        last_cher_two == "pP" ||
        last_cher_two == "PP"
      ) {
        $(this).val(remove_last_two + " পার্টনার");
      } else if (
        last_cher_four == "pack" ||
        last_cher_four == "Pack" ||
        last_cher_four == "PACK"
      ) {
        $(this).val(remove_last_four + " পেকেট");
      }

      if (last_cher == "0") {
        $(this).val(remove_last + "০");
      } else if (last_cher == "1") {
        $(this).val(remove_last + "১");
      } else if (last_cher == "2") {
        $(this).val(remove_last + "২");
      } else if (last_cher == "3") {
        $(this).val(remove_last + "৩");
      } else if (last_cher == "4") {
        $(this).val(remove_last + "৪");
      } else if (last_cher == "5") {
        $(this).val(remove_last + "৫");
      } else if (last_cher == "6") {
        $(this).val(remove_last + "৬");
      } else if (last_cher == "7") {
        $(this).val(remove_last + "৭");
      } else if (last_cher == "8") {
        $(this).val(remove_last + "৮");
      } else if (last_cher == "9") {
        $(this).val(remove_last + "৯");
      }
    } else {
      $(".suggested_word_wrap").slideUp(50);
    }
    if ($(this).val().length == 0) {
      $(".suggested_word_wrap").slideUp(50);
      $(".suggested_word_wrap ul").text("");
      $(".form_submit_yes_no").val("true");
    }
  });

  $(document).on("click", ".suggested_word_wrap ul li", function () {
    var this_txt = $(this).text();
    var prev_val = $.trim($(".suggest_input_wrap .product_name").val());
    var splittedSource = prev_val
      .replace(/\s{2,}/g, " ")
      .split(" ")
      .pop();

    $(".suggest_input_wrap .product_name")
      .focus()
      .val(
        prev_val.substring(0, prev_val.length - splittedSource.length) +
          this_txt +
          " , "
      );
    $(".form_submit_yes_no").val("true");
    $(".suggested_word_wrap ul li").removeClass("highlight");
    $(".suggested_word_wrap ul").text("");
  });

  $(window).keyup(function (e) {
    if (e.keyCode === 13) {
      e.preventDefault();
      var getList = $(".suggested_word_wrap ul li.highlight").text();
      var this_txt = getList;
      var prev_val = $.trim($(".suggest_input_wrap .product_name").val());
      var splittedSource = prev_val
        .replace(/\s{2,}/g, " ")
        .split(" ")
        .pop();

      if ($(".form_submit_yes_no").val() == "false") {
        $(".suggest_input_wrap .product_name")
          .focus()
          .val(
            prev_val.substring(0, prev_val.length - splittedSource.length) +
              this_txt +
              " , "
          );
        $(".form_submit_yes_no").val("true");
        $(".suggested_word_wrap ul li").removeClass("highlight");
        $(".suggested_word_wrap ul").text("");
      }
    }

    if (
      e.keyCode != 37 &&
      e.keyCode != 38 &&
      e.keyCode != 39 &&
      e.keyCode != 40
    ) {
      $(".form_submit_yes_no").val("true");
    }

    // if (e.keyCode === 16 && !$(".onnOffSuggest input").is(":checked")) {
    //   $(".onnOffSuggest input").attr("checked", true);
    // } else if (e.keyCode === 16 && $(".onnOffSuggest input").is(":checked")) {
    //   $(".onnOffSuggest input").attr("checked", false);
    // }
  });

  $(".tdy_coll_li").click(() => {
    get_todays_collection();
  });

  ///////////////////// XXXXXXXXXXXXXXXXXXXXXXXXXXX ///////////////////////
});
get_client("");
auto_input_check();
cstm_tooltip();
live_client_count();
current_month_due();
unseen_notification();
report_length_check();
store_total_due();
current_month_due_collect();
const wrng = "Something went wrong! Try again later";

/////////// Deleting User Start ////////////

function close_widget(e) {
  if (e == 1) {
    close_deep(".otp_send_wrap", ".forgot_pass_wrap", 1);
  } else if (e == 2) {
    close_deep(".after_send_otp_wrap", ".otp_send_wrap", 1);
  } else if (e == 3) {
    close_deep(".finally_change_pass_wrap", ".after_send_otp_wrap", 1);
  } else if (e == 4) {
    close_deep(".after_send_otp_wrap.two_step_wrappp ", "", 0);
  } else if (e == 5) {
    close_deep(".menual_widget", "", 0);
  }
}

function close_deep(a, b, c) {
  $(a).removeClass("previous");

  if (b == "") {
    $(".user_main_login_wrap").removeClass("current");
  }

  if (c == 1 && b != "") {
    $(b).removeClass("current").addClass("previous");
  }

  setTimeout(() => {
    $(a).remove();
  }, 1500);
}

function delete_user(e) {
  $.ajax({
    url: "./actions/delete.php",
    type: "post",
    data: { usr_delete_id: e },
    beforeSend: function () {},
    success: function (data) {
      close_confirm();
      if (data == "yes") {
        live_client_count();
        current_month_due();
        last_notification();
        store_total_due();
        current_month_due_collect();
        $(".client_row_id_" + e).addClass("cstm_deleting");
        setTimeout(() => {
          $(".client_row_id_" + e)
            .parent()
            .fadeOut(300);
          setTimeout(() => {
            $(".client_row_id_" + e)
              .parent()
              .remove();
          }, 300);
        }, 200);
        report_length_check();
      }
    },
  });
}

/////////// Deleting User End ////////////

//////////// Getting All Client Start ///////////////

function get_selected_email(e) {
  $(".otp_send_wrap .selected_email").val($(".exxxxx_" + e).val());
}
function forgot_pass_wrap(a, b, c, d) {
  $("." + a + " .find_alert_div_wrap").html(
    '<div class="find_alert_div ' + d + '"><p>' + b + "</p></div>"
  );
  $("." + a + " .find_alert_div_wrap .find_alert_div").slideDown(200);
  setTimeout(() => {
    $("." + a + " .find_alert_div_wrap .find_alert_div").slideUp(200);
  }, c);
}

function get_client(offset_row) {
  var table_name = "users";
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { table_name: table_name, offset_row: offset_row },
    beforeSend: function () {
      $(".all_clients_list_body .loading_long_bar").show();
    },
    success: function (e) {
      if (e == "no") {
        $(".all_clients_list_body .loading_long_bar").hide();
        cstm_nothing_found(
          "all_clients_list_body",
          "error.png",
          "Something Went Wrong!",
          "Look like database failed to connect, or please check your internet connection."
        );
      } else if (e == "no_user") {
        $(".all_clients_list_body .loading_long_bar").hide();
        /*cstm_nothing_found('all_clients_list_body', 'nothing_found.png', 'Currently Has No Client!', 'You have no client to show.')*/
      } else {
        $(".all_clients_list_body .loading_long_bar").hide();
        $(".all_clients_list_body").append(e);
        remove_cstm_nothing_found("all_clients_list_body");
      }
    },
  });
}

//////////// Getting All Client End /////////////////

//////////// Getting Client Data To Edit Start ///////////////

function edit_user(e) {
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { user_data: e },
    beforeSend: function () {
      $(".edit_client_overly").addClass("show_all");
      $(".edit_c_wrap .loading_long_bar").show();
    },
    success: function (e) {
      if (e == "no") {
        $(".edit_c_wrap .loading_long_bar").hide();
        $(".edit_client_overly").removeClass("show_all");
        empty_input_val("edit_client_overly");
        setTimeout(() => {
          cstm_confirm(
            "null_user",
            "Something Went Wrong",
            "Look like database failed to connect, or please check your internet connection.",
            "Ok",
            ""
          );
        }, 500);
      } else if (e == "no_user") {
        $(".edit_c_wrap .loading_long_bar").hide();
        $(".edit_client_overly").removeClass("show_all");
        empty_input_val("edit_client_overly");
        setTimeout(() => {
          cstm_confirm(
            "null_user",
            "Nothing Found",
            "We have nothing to show about this user ID",
            "Ok",
            ""
          );
        }, 500);
      } else {
        $(".edit_c_wrap .loading_long_bar").hide();
        $(".edit_c_wrap .form-group").addClass("focused");
        $(".edit_c_wrap .gander_box ").addClass("active");
        var data = $.parseJSON(e);
        var name = data[0];
        var phone = data[1];
        var gender = data[2];
        var email = data[3];
        var image = data[4];
        var id = data[5];
        var address = data[6];

        $(".edit_c_wrap .user_edit_id").val(id);
        $(".edit_c_wrap .curnt_pic_path").val(image);
        if (image != "") {
          $(".edit_c_wrap .profile_img_create").addClass("c_pic_selected");
          $(".edit_c_wrap .c_pic_preview_wrap img").attr(
            "src",
            "./users_photo/" + image
          );
        }

        $(".edit_c_wrap .c_1").val(name);
        $(".edit_c_wrap .c_2").val(phone);
        $(".edit_c_wrap .c_address_edit").val(address);
        if (gender == "male") {
          $(".edit_c_wrap #male_radio_edit").prop("checked", true);
        } else {
          $(".edit_c_wrap #female_radio_edit").prop("checked", true);
        }
        $(".edit_c_wrap .c_4").val(email);
        //$(".edit_c_wrap .c_1").val(name);
        $(".edit_c_wrap .cstm_heading").text("Edit " + name + "'s Profile");
        auto_input_check();
      }
    },
  });
}

//////////// Getting Client Data To Edit End /////////////////

//////////// Getting Admin Data To Edit Start ///////////////

function edit_admin(e) {
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { admin_data: e },
    beforeSend: function () {
      $(".edit_admin_overly").addClass("show_all");
      $(".edit_admn_wrap .loading_long_bar").show();
    },
    success: function (e) {
      if (e == "no") {
        $(".edit_admn_wrap .loading_long_bar").hide();
        $(".edit_admin_overly").removeClass("show_all");
        empty_input_val("edit_admin_overly");
        setTimeout(() => {
          cstm_confirm(
            "null_user",
            "Something Went Wrong",
            "Look like database failed to connect, or please check your internet connection.",
            "Ok",
            ""
          );
        }, 500);
      } else if (e == "no_user") {
        $(".edit_admn_wrap .loading_long_bar").hide();
        $(".edit_admin_overly").removeClass("show_all");
        empty_input_val("edit_admin_overly");
        setTimeout(() => {
          cstm_confirm(
            "null_user",
            "Nothing Found",
            "We have nothing to show about this admin ID",
            "Ok",
            ""
          );
        }, 500);
      } else {
        $(".edit_admn_wrap .loading_long_bar").hide();
        $(".edit_admn_wrap .form-group").addClass("focused");
        $(".edit_admn_wrap .gander_box ").addClass("active");
        var data = $.parseJSON(e);
        var name = data[0];
        var gender = data[1];
        var email = data[2];
        var image = data[3];
        var id = data[4];

        $(".edit_admn_wrap .user_edit_id").val(id);
        $(".edit_admn_wrap .curnt_pic_path").val(image);
        if (image != "") {
          $(".edit_admn_wrap .profile_img_create").addClass("c_pic_selected");
          $(".edit_admn_wrap .c_pic_preview_wrap img").attr(
            "src",
            "./users_photo/" + image
          );
        }

        $(".edit_admn_wrap .c_1").val(name);

        if (gender == "male") {
          $(".edit_admn_wrap #male_radio_edit_admin").prop("checked", true);
        } else {
          $(".edit_admn_wrap #female_radio_edit_admin").prop("checked", true);
        }
        $(".edit_admn_wrap .c_4").val(email);
        //$(".edit_admn_wrap .c_1").val(name);
        $(".edit_admn_wrap .cstm_heading").text("Edit " + name + "'s Profile");
      }
    },
  });
}

//////////// Getting Admin Data To Edit End /////////////////

/////////// Get Single Client Data Start ///////////////

function single_client_data(e) {
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { s_data: e },
    beforeSend: function () {
      $(".client_row_id_" + e).addClass("cstm_opacity_5");
    },
    success: function (get) {
      if (get != "no") {
        $(".client_row_id_" + e).removeClass("cstm_opacity_5");
        var data = $.parseJSON(get);
        var name = data[0];
        var img = data[1];
        var gender = data[2];
        var address = data[3];
        var total_due = data[4];
        var last_pay_date = data[5];
        var last_pay_day = data[6];
        var last_day_hide = data[7];

        $(
          ".client_row_id_" + e + " .client_details_img_name .client_info h4"
        ).text(name);
        $(
          ".client_row_id_" + e + " .client_details_img_name .client_info p"
        ).text(address);
        $(".client_row_id_" + e + " .client_total_due_body span").text(
          total_due
        );
        $(".client_row_id_" + e + " .mob_totl_du").text(total_due);
        $(".client_row_id_" + e + " .client_last_pay_body .c_l_pay_date").text(
          last_pay_date
        );
        $(".client_row_id_" + e + " .mob_lst_py_dt").text(last_pay_date);
        $(".client_row_id_" + e + " .client_last_pay_body .c_l_pay_day").text(
          last_pay_day
        );
        $(".client_row_id_" + e + " .mob_lst_py_day_ago").text(last_pay_day);

        if (last_day_hide == "r_t_c") {
          $(
            ".client_row_id_" + e + " .client_last_pay_body .c_l_pay_day"
          ).removeClass("d-none");
        }

        if (img == "") {
          if (gender == "male") {
            $(".client_row_id_" + e + " .client_details_img_name img").attr(
              "src",
              "./users_photo/male.png"
            );
          } else {
            $(".client_row_id_" + e + " .client_details_img_name img").attr(
              "src",
              "./users_photo/female.png"
            );
          }
        } else {
          $(".client_row_id_" + e + " .client_details_img_name img").attr(
            "src",
            "./users_photo/" + img
          );
        }
      } else {
        alert(wrng);
      }
    },
  });
}

/////////// Get Single Client Data End /////////////////

/////////// Get Single Admin Data Start ///////////////

function single_admin_data(e) {
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { admn_data: e },
    beforeSend: function () {
      $(".admin_row_id_" + e).addClass("cstm_opacity_5");
    },
    success: function (get) {
      if (get != "no") {
        $(".admin_row_id_" + e).removeClass("cstm_opacity_5");
        var data = $.parseJSON(get);
        var name = data[0];
        var img = data[1];
        $(".admin_row_id_" + e + " .single_store_admin_name h6").text(name);
        $(".admin_row_id_" + e + " .single_store_admin_img img").attr(
          "src",
          "./users_photo/" + img
        );
      } else {
        alert(wrng);
      }
    },
  });
}

/////////// Get Single Admin Data End /////////////////

/////////// Get Single Client Data End /////////////////
function block_user(e) {
  $(
    ".client_row_id_" +
      e +
      " .single_client_more_actions_wrap .single_client_more_action_ul"
  ).addClass("infinity_show");

  $.ajax({
    url: "./actions/edit.php",
    type: "post",
    data: { block_id: e },
    beforeSend: function () {
      $(
        ".client_row_id_" +
          e +
          " .single_client_more_actions_wrap .single_client_more_action_ul .loading_long_bar"
      ).show();
    },
    success: function (data) {
      if (data == "yes") {
        $(".client_row_id_" + e + " .single_client_more_action_ul").removeClass(
          "infinity_show"
        );
        $(
          ".client_row_id_" +
            e +
            " .single_client_more_actions_wrap .single_client_more_action_ul .loading_long_bar"
        ).hide();
        cstm_alert_div("User Blocked Successfully", 4000);
        $(
          ".client_row_id_" + e + " .single_client_more_action_ul .block_li"
        ).slideUp(200);
        $(
          ".client_row_id_" + e + " .single_client_more_action_ul .unblock_li"
        ).slideDown(200);
        $(".client_row_id_" + e + " .cstommer_block_tol_wrap").removeClass(
          "d-none"
        );
        last_notification();
      } else {
        $(".client_row_id_" + e + " .single_client_more_action_ul").removeClass(
          "infinity_show"
        );
        $(
          ".client_row_id_" +
            e +
            " .single_client_more_actions_wrap .single_client_more_action_ul .loading_long_bar"
        ).hide();
        cstm_alert_div(wrng, 5000);
      }
    },
  });
}
/////////// Get Single Client Data End /////////////////

/////////// Get Single Client Data End /////////////////
function unblock_user(e) {
  $(
    ".client_row_id_" +
      e +
      " .single_client_more_actions_wrap .single_client_more_action_ul"
  ).addClass("infinity_show");

  $.ajax({
    url: "./actions/edit.php",
    type: "post",
    data: { unblock_id: e },
    beforeSend: function () {
      $(
        ".client_row_id_" +
          e +
          " .single_client_more_actions_wrap .single_client_more_action_ul .loading_long_bar"
      ).show();
    },
    success: function (data) {
      if (data == "yes") {
        $(".client_row_id_" + e + " .single_client_more_action_ul").removeClass(
          "infinity_show"
        );
        $(
          ".client_row_id_" +
            e +
            " .single_client_more_actions_wrap .single_client_more_action_ul .loading_long_bar"
        ).hide();
        cstm_alert_div("User Unblocked Successfully", 4000);
        $(
          ".client_row_id_" + e + " .single_client_more_action_ul .block_li"
        ).slideDown(200);
        $(
          ".client_row_id_" + e + " .single_client_more_action_ul .unblock_li"
        ).slideUp(200);
        $(".client_row_id_" + e + " .cstommer_block_tol_wrap").addClass(
          "d-none"
        );
        last_notification();
      } else {
        $(".client_row_id_" + e + " .single_client_more_action_ul").removeClass(
          "infinity_show"
        );
        $(
          ".client_row_id_" +
            e +
            " .single_client_more_actions_wrap .single_client_more_action_ul .loading_long_bar"
        ).hide();
        cstm_alert_div(wrng, 5000);
      }
    },
  });
}
/////////// Get Single Client Data End /////////////////

function success_message(e, parent, bg, time) {
  $("." + parent + " .cstm_successfull p").html(e);
  $("." + parent + " .cstm_successfull").addClass(bg);
  $("." + parent + " .cstm_successfull").show();

  setTimeout(() => {
    $("." + parent + " .cstm_successfull").slideUp(300);
    setTimeout(() => {
      $("." + parent + " .cstm_successfull").removeClass(
        "bg_danger bg_primary bg_success"
      );
    }, 500);
  }, time);
}

function input_check(e) {
  $("." + e).focus();
  $("." + e)
    .parent()
    .addClass("input_check_border");
  return false;
}
function remove_input_check(parent) {
  $("." + parent + " .cstm_successfull").hide();
  $("." + parent + " form .form-group").removeClass("input_check_border");
  $("." + parent + " .gander_box").removeClass("red_active");
}
function empty_input_val(e) {
  $("." + e + " input")
    .not("." + e + " input[type='radio']")
    .val("");
  $("." + e + " .profile_img_create").removeClass("c_pic_selected");
  $("." + e + " .profile_img_create img").attr("src", "");
  $("." + e + " input")
    .parent()
    .removeClass("focused");
  $(".gander_box").removeClass("active");
  $(".gander_box input").prop("checked", false);

  $(".hidden_file_c").val("");
  $(".create_new_client_form .profile_img_create").removeClass(
    "c_pic_selected"
  );
  $(".create_new_client_form .profile_img_create img").attr("src", "");
}

function auto_input_check() {
  $(".form-group input").each(function () {
    if ($(this).val() != "") {
      $(this).parent().addClass("focused");
    } else {
      $(this).parent().removeClass("focused");
    }
  });
}

function cstm_nothing_found(appen, img, title, desc) {
  $("." + appen).append(
    '<div class="cstm_no_user_or_failed_wrap"><div class="cstm_no_user_or_failed_icon" ><img src="./img/' +
      img +
      '" alt="Icon" class="img_w_100"></div><h3>' +
      title +
      "</h3><p>" +
      desc +
      "</p></div>"
  );
}
function remove_cstm_nothing_found(e) {
  $("." + e + " .cstm_no_user_or_failed_wrap").remove();
}

function cstm_confirm(a, b, c, d, e) {
  $(".conf_code").val(a);
  if (b != "") {
    $(".conf_title").html(b);
  }
  if (c != "") {
    $(".conf_desc").html(c);
  }
  if (d != "") {
    $(".dlt_btn").text(d);
  }
  if (e != "") {
    $(".actin_id_is").val(e);
  }
  $(".cstm_confirm").show();
}

function close_confirm() {
  $(".cstm_confirm").hide();
  $(".conf_code").val("");
  $(".actin_id_is").val("");
  $(".actin_id_is").val("");
  $(".conf_title").text("Are you sure to delete?");
  $(".conf_desc").text(
    "This can’t be undone and you are going to delete it permanently."
  );
  $(".dlt_btn").text("Delete it");
}
function cstm_alert_div(e, time) {
  var random = Math.floor(Math.random() * 100000 + 1);
  $(".cstm_alert").append(
    '<div class="cstm_alert_box rand_' + random + '"><p>' + e + "</p></div>"
  );
  $(".cstm_alert .rand_" + random).slideDown(200);
  setTimeout(() => {
    $(".cstm_alert .cstm_alert_box.rand_" + random).fadeOut();
    setTimeout(() => {
      $(".cstm_alert .cstm_alert_box.rand_" + random).remove();
    }, 200);
  }, time);
}
function cstm_alert_div_html(ee, timee) {
  $(".cstm_alert").html('<div class="cstm_alert_box"><p>' + ee + "</p></div>");
  $(".cstm_alert .cstm_alert_box").slideDown(200);
  setTimeout(() => {
    $(".cstm_alert .cstm_alert_box").remove();
  }, timee);
}

/*============== Custom Tooltip Start ==================== */

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
/*============== Custom Tooltip End ==================== */

function change_pass_user(e) {
  $(".single_client_list  .chng_pass_form_id_" + e).slideDown(200);
}
/*================ User Password Change Start ================ */

function change_pass_submit(e) {
  var new_pass = $.trim(
    $(
      ".single_client_list  .chng_pass_form_id_" + e + " .usr_chng_pass_input"
    ).val()
  );
  var usr_name = $.trim(
    $(
      ".single_client_list  .chng_pass_form_id_" +
        e +
        " .usr_chng_pass_username"
    ).val()
  );
  if (new_pass != "" && usr_name != "") {
    $(
      ".single_client_list  .chng_pass_form_id_" + e + " .usr_chng_pass_input"
    ).removeClass("border_red");
    $.ajax({
      url: "./actions/edit.php",
      type: "post",
      data: { id: e, new_pass: new_pass, usr_name: usr_name },
      beforeSend: function () {
        $(
          ".client_row_id_" +
            e +
            " .single_client_more_actions_wrap .single_client_more_action_ul .loading_long_bar"
        ).show();
        $(".chng_pass_form_id_" + e + " button").addClass("cstm_btn_disabled");
        $(".chng_pass_form_id_" + e + " button").attr("disabled", true);
        $(".chng_pass_form_id_" + e + " button").text("Changing..");
      },
      success: function (ret) {
        if (ret == "yes") {
          $(
            ".client_row_id_" +
              e +
              " .single_client_more_actions_wrap .single_client_more_action_ul .loading_long_bar"
          ).hide();
          cstm_alert_div("User password changed successfully", 4000);
          $(".chng_pass_form_id_" + e + " button").removeClass(
            "cstm_btn_disabled"
          );
          $(".chng_pass_form_id_" + e + " button").attr("disabled", false);
          $(".chng_pass_form_id_" + e + " button").text("Change");
          $(
            ".single_client_list  .chng_pass_form_id_" +
              e +
              " .usr_chng_pass_input"
          ).val("");
          setTimeout(() => {
            $(".single_client_list  .chng_pass_form_id_" + e).slideUp(200);
          }, 2000);
          last_notification();
        } else {
          $(".chng_pass_form_id_" + e + " button").removeClass(
            "cstm_btn_disabled"
          );
          $(".chng_pass_form_id_" + e + " button").attr("disabled", false);
          $(".chng_pass_form_id_" + e + " button").text("Change");
          $(
            ".client_row_id_" +
              e +
              " .single_client_more_actions_wrap .single_client_more_action_ul .loading_long_bar"
          ).hide();
          cstm_alert_div(wrng, 4000);
        }
      },
    });
  } else {
    $(
      ".single_client_list  .chng_pass_form_id_" + e + " .usr_chng_pass_input"
    ).focus();
    $(
      ".single_client_list  .chng_pass_form_id_" + e + " .usr_chng_pass_input"
    ).addClass("border_red");
  }
}

/*================ User Password Change End ================ */

/*=================== Getting Store All Admin Start========================== */

function get_store_all_admin(e) {
  var tb_name = "owner";
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { tb_name: tb_name },
    success: function (data) {
      if (data == "no") {
        $("." + e).html(
          '<div class="sml_no_found"><div class="sml_no_img"><img src="./img/error.png" class="img_w_100" alt=""></div><h5>Error 404!</h5><p>Something went wrong. Try again leter</p></div>'
        );
      } else if (data == "no_user") {
        $("." + e).html(
          '<div class="sml_no_found"><div class="sml_no_img"><img src="./img/nothing_found.png" class="img_w_100" alt=""></div><h5>No Admin Found</h5><p>You have currently no admin to show</p></div>'
        );
      } else {
        $("." + e).html(data);
      }
    },
  });
}

/*=================== Getting Store All Admin End========================== */

/////////// Deleting Admin Start ////////////

function delete_admin(e) {
  $.ajax({
    url: "./actions/delete.php",
    type: "post",
    data: { admin_delete_id: e },
    beforeSend: function () {},
    success: function (data) {
      if (data == "yes") {
        close_confirm();
        //live_client_count()
        $(".admin_row_id_" + e).addClass("cstm_deleting");
        setTimeout(() => {
          $(".admin_row_id_" + e).fadeOut();
          setTimeout(() => {
            get_store_all_admin("store_admin_wrap");
          }, 200);
        }, 100);
      } else {
        close_confirm();
      }
    },
  });
}

/////////// Deleting Admin End ////////////

/////////// Get Client Data For Inner Section Start ///////////////
function go_to_profile(e) {
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { s_data_for_inner: e },
    beforeSend: function () {
      $(".loading_content_wrap").show();
      $(".product_list_loader").show();
      $(window).scrollTop(999999999);
      $(".client_profile_view_extar_wrap").slideDown();
      $(".all_down_part_wrap").slideUp();
    },
    success: function (get) {
      if (get == "no") {
        cstm_alert_div(wrng, 4000);
      } else if (get == "no_user") {
        cstm_alert_div("No User Found! Look like this user is deleted.", 4000);
        $(".loading_content_wrap").hide();
        $(".product_list_loader").hide();
        $(".client_profile_view_extar_wrap").slideUp();
        $(".all_down_part_wrap").slideDown();
      } else {
        $(".loading_content_wrap").hide();
        $(".product_list_loader").hide();
        $(".client_due_list_wrap_body").html("");
        get_client_due_list(e, "15", "h");

        $(".admin_row_id_" + e).removeClass("cstm_opacity_5");
        var data = $.parseJSON(get);
        var name = data[0];
        var img = data[1];
        var username = data[2];
        var phone = data[3];
        var gender = data[4];
        var address = data[5];
        var email = data[6];
        var join = data[7];
        var last_pay = data[8];
        var block = data[9];

        if (img == "" && gender == "male") {
          $(".client_profile_wrap_img img").attr(
            "src",
            "./users_photo/male.png"
          );
          $(".all_list_of_sml_img_wrap img").attr(
            "src",
            "./users_photo/male.png"
          );
        } else if (img == "" && gender == "female") {
          $(".client_profile_wrap_img img").attr(
            "src",
            "./users_photo/female.png"
          );
          $(".all_list_of_sml_img_wrap img").attr(
            "src",
            "./users_photo/female.png"
          );
        } else {
          $(".client_profile_wrap_img img").attr("src", "./users_photo/" + img);
          $(".all_list_of_sml_img_wrap  img").attr(
            "src",
            "./users_photo/" + img
          );
        }
        total_due(e);
        if (block == "block") {
          $(".block_toltip_div").removeClass("d-none");
        } else {
          $(".block_toltip_div").addClass("d-none");
        }
        $(".client_due_list_wrap_heading span").text(name);
        $(".client_profile_wrap h4.client_profile_name span").text(name);
        $(".client_profile_user span").text(username);
        $(".client_profile_phone span").text(phone);

        $(".client_profile_address span").text(address);
        if (email == "") {
          $(".client_profile_email span").text("-- -- --");
        } else {
          $(".client_profile_email span").text(email);
        }
        $(".client_profile_joined span").text(join);
        $(".client_profile_gender span").text(gender);
        $(".client_profile_last_payment span").text(last_pay);

        $(".rafer_user_id").val(e);
        $(".hidden_user_id_due_list").val(e);

        $(".all_clients_list_body").scrollTop(0);
      }
    },
  });
}
/////////// Get Client Data For Inner Section End /////////////////

//////////////////// Getting Client Due List Start //////////////

function get_client_due_list(id, offset, insert) {
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { due_list_id: id, due_offset: offset },
    beforeSend: function () {
      $(".ex_list_body_wrap .loading_long_bar").show();
    },
    success: function (data) {
      $(".ex_list_body_wrap .loading_long_bar").hide();
      if (data == "no") {
        cstm_nothing_found(
          "client_due_list_wrap_body",
          "error.png",
          "Something Went Wrong!",
          "Look like database failed to connect, or please check your internet connection."
        );
      } else if (data == "no_list") {
        $(".user_no_due_list").val("0");
        cstm_nothing_found(
          "client_due_list_wrap_body",
          "nothing_found.png",
          "No List To Show",
          "We have nothing to show about this user."
        );
      } else if (data != "no" && data != "no_list") {
        $(".user_no_due_list").val("");
        $(".client_due_list_wrap_body .cstm_no_user_or_failed_wrap").remove();
        if (insert == "h") {
          $(".client_due_list_wrap_body").html(data);
        } else if (insert == "a") {
          $(".client_due_list_wrap_body").append(data);
        }
      }
    },
  });
}

//////////////////// Getting Client Due List End ////////////////

////////////////// Getting Data For Edit Single Due List Start ///////////////////////

function edit_due_list(e) {
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { due_id: e },
    beforeSend: function () {
      $(".edit_due_list_overly").addClass("show_all");
      $(".edit_due_list_overly .loading_long_bar").show();
    },
    success: function (data) {
      if (e == "no") {
        $(".edit_due_list_overly .loading_long_bar").hide();
        cstm_alert_div(wrng, 5000);
      } else if (e == "no_list") {
        $(".edit_due_list_overly .loading_long_bar").hide();
        cstm_alert_div("Nothing Found!", 3000);
      } else {
        $(".edit_due_list_overly .loading_long_bar").hide();
        var data_is = $.parseJSON(data);
        var name = data_is[0];
        var price = data_is[1];
        var note = data_is[2];
        var id = data_is[3];

        $(".edit_due_list_overly .edit_p_name").val(name);
        $(".edit_due_list_overly .edit_p_price").val(price);
        $(".edit_due_list_overly .edit_p_note").val(note);
        $(".edit_due_list_overly .edit_p_id").val(id);
        auto_input_check();
      }
    },
  });
}

////////////////// Getting Data For Edit Single Due List End ///////////////////////

//////////// Delete Single Due list Start ///////////////

function delete_due_list(e) {
  $.ajax({
    url: "./actions/delete.php",
    type: "post",
    data: { due_dlt_id: e },
    beforeSend: function () {},
    success: function (data) {
      close_confirm();
      if (data == "yes") {
        //cstm_alert_div('List Deleted Successfully',5000);
        current_month_due();
        total_due($(".hidden_user_id_due_list").val());
        $(".due_list_id_" + e).addClass("cstm_deleting");
        setTimeout(() => {
          $(".due_list_id_" + e).fadeOut();
        }, 200);

        var random = Math.floor(Math.random() * 100000 + 1);
        $(".cstm_alert").html(
          '<div class="cstm_alert_box rand_' +
            random +
            '"><p>List Deleted Successfully</p></div>'
        );
        $(".cstm_alert .rand_" + random).slideDown(200);
        setTimeout(() => {
          $(".cstm_alert .cstm_alert_box.rand_" + random).fadeOut();
          setTimeout(() => {
            $(".cstm_alert .cstm_alert_box.rand_" + random).remove();
          }, 200);
        }, 3000);
        last_notification();
        report_length_check();
      } else {
        cstm_alert_div(wrng, 5000);
      }
    },
  });
}

//////////// Delete Single Due list End /////////////////

////////// Getting Current Month Due Start ///////////////////

function current_month_due() {
  var get_month_due = "users_due";
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { get_month_due: get_month_due },
    beforeSend: function () {
      $(".due_on_this_month").append(
        '<div class="loading_long_bar slim_loading d-block"><div class="loading_bar"></div></div>'
      );
    },
    success: function (data) {
      $(".due_on_this_month .loading_long_bar").remove();
      if (data != "no") {
        animating_count(".current_month_due span", data);
      }
    },
  });
}

//////// Due Collect On This Month

function current_month_due_collect() {
  var get_month_due_collect = "users_due_collect";
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { get_month_due_collect: get_month_due_collect },
    beforeSend: function () {
      $(".collect_box").append(
        '<div class="loading_long_bar slim_loading d-block"><div class="loading_bar"></div></div>'
      );
    },
    success: function (data) {
      $(".collect_box .loading_long_bar").remove();
      if (data != "no") {
        animating_count(".due_cllect_on_this_mont_h span", data);
      }
    },
  });
}

function animating_count(wrap_is, data_is) {
  var prev_num = Number($(wrap_is).text());
  var crnt_num = Number(data_is);

  if (crnt_num < 5) {
    var interval = setInterval(() => {
      var prev_num_new = Number($(wrap_is).text());
      if (prev_num_new == crnt_num || prev_num_new > crnt_num) {
        clearInterval(interval);
        $(wrap_is).text(crnt_num);
      } else {
        var add = prev_num_new + 1;
        $(wrap_is).text(add);
      }
    }, 60);
  } else if (crnt_num > prev_num) {
    var how_much = crnt_num - prev_num;
    var devide = how_much / 10;
    var round = Math.round(devide);
    if (round < 5) {
      round = 1;
    } else {
      round = round;
    }

    var interval = setInterval(() => {
      var prev_num_new = Number($(wrap_is).text());
      if (prev_num_new == crnt_num || prev_num_new > crnt_num) {
        clearInterval(interval);
        $(wrap_is).text(crnt_num);
      } else {
        var add = prev_num_new + round;
        $(wrap_is).text(add);
      }
    }, 60);
  } else if (crnt_num < prev_num) {
    var how_much = prev_num - crnt_num;
    var devide = how_much / 10;
    var round = Math.round(devide);
    if (round < 5) {
      round = 1;
    } else {
      round = round;
    }

    var interval = setInterval(() => {
      var prev_num_new = Number($(wrap_is).text());
      if (prev_num_new <= crnt_num || prev_num_new < crnt_num) {
        clearInterval(interval);
        $(wrap_is).text(crnt_num);
      } else {
        var add = prev_num_new - round;
        $(wrap_is).text(add);
      }
    }, 60);
  }
}

////////// Getting Current Month Due End /////////////////////

////////// View Note Start /////////////////
function view_note(e) {
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { view_note_id: e },
    beforeSend: function () {},
    success: function (data) {
      if (data != "no") {
        $(".note_overly").addClass("show_all");
        $(".note_overly p").text(data);
      }
    },
  });
}
////////// View Note End /////////////////

/////////////// Getting Notification Start /////////////////////

function load_notification(offset, limit) {
  //var n_offset = Number($.trim($(".currently_loaded_list").val()));
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { n_offset: offset, n_limit: limit },
    beforeSend: function () {
      $(".notification_loading_bar").show();
    },
    success: function (data) {
      $(".notification_loading_bar").hide();
      if (data == "no_row") {
        cstm_nothing_found(
          "notification_body",
          "nothing_found.png",
          "No Notification",
          "You have currently no notifications to show."
        );
      } else if (data == "no") {
        cstm_nothing_found(
          "notification_body",
          "error.png",
          "Something Went Wrong!",
          "Look like database failed to connect, or please check your internet connection."
        );
      } else {
        $(".notification_body .cstm_no_user_or_failed_wrap").remove();
        $(".notification_body").html(data);
        $(".currently_loaded_list").val(n_offset + limit * 1);
      }
    },
  });
}

function scroll_notification() {
  var get_all = "owner_notification";
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { get_all: get_all },
    beforeSend: function () {
      $(".notification_loading_bar").show();
    },
    success: function (data) {
      $(".notification_loading_bar").hide();
      if (data == "no_row") {
        cstm_nothing_found(
          "notification_body",
          "nothing_found.png",
          "No Notification",
          "You have currently no notifications to show."
        );
      } else if (data == "no") {
        cstm_nothing_found(
          "notification_body",
          "error.png",
          "Something Went Wrong!",
          "Look like database failed to connect, or please check your internet connection."
        );
      } else {
        $(".clear_all_notification").removeClass("no_pinter");
        $(".notification_body .cstm_no_user_or_failed_wrap").remove();
        $(".notification_body").html(data);
      }
    },
  });
}

/////////////// Getting Notification End ///////////////////////

/////////////// Getting Last Notification Start /////////////////////

function last_notification() {
  var last_n = "owner_notification";
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { last_n: last_n },
    beforeSend: function () {},
    success: function (data) {
      if (data == "no") {
        cstm_nothing_found(
          "notification_body",
          "error.png",
          "Something Went Wrong!",
          "Look like database failed to connect, or please check your internet connection."
        );
      } else {
        $(".clear_all_notification").removeClass("no_pinter");
        $(".notification_body .cstm_no_user_or_failed_wrap").remove();
        $(".notification_body").prepend(data);
        unseen_notification();
      }
    },
  });
}

/////////////// Getting Last Notification End ///////////////////////

/////////// Unseen Notification Check Start

function unseen_notification() {
  var unssen_notification = "unseen";
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { unssen_notification: unssen_notification },
    success: function (data) {
      if (data != "0") {
        $(".notification_count_wrap").removeClass("d-none");
        $(".load_notification_click_span i").addClass("animated_icon_s");
        $(".notification_count_wrap span").html(data);
      } else {
        $(".notification_count_wrap").addClass("d-none");
      }
    },
  });
}

/////////// Unseen Notification Check End

//// Store Total Due Start
function store_total_due() {
  var store_total = "due";
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { store_total: store_total },
    beforeSend: function () {
      $(".total_due_boxxx").append(
        '<div class="loading_long_bar slim_loading d-block"><div class="loading_bar"></div></div>'
      );
    },
    success: function (data) {
      $(".total_due_boxxx .loading_long_bar").remove();
      if (data != "no") {
        animating_count(".store_total_due_h span", data);
      }
    },
  });
}
//// Store Total Due End

//// Client Total Due Start

function total_due(e) {
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { total_Due_id: e },
    success: function (data) {
      if (data != "no") {
        animating_count(".client_profile_total_due span", data);
        $(".client_due_total_input input").val(data);
        total_custommer_due = data;
        //store_total_due();
      }
    },
  });
}

//// Client Total Due End

///////////  Live Client Count Start ///////////
function live_client_count() {
  var live_client_count = "live_client_count";
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { live_client_count: live_client_count },
    beforeSend: function () {
      $(".total_client_box").append(
        '<div class="loading_long_bar slim_loading d-block"><div class="loading_bar"></div></div>'
      );
    },
    success: function (data) {
      $(".total_client_box .loading_long_bar").remove();
      if (data != "no") {
        animating_count(".totl_cl_count span", data);
      }
      if (data == "0") {
        setTimeout(() => {
          cstm_nothing_found(
            "all_clients_list_body",
            "nothing_found.png",
            "Currently Has No Client!",
            "You have no client to show."
          );
        }, 400);
      }
    },
  });
}
///////////  Live Client Count End ///////////

function close_it() {
  $(".single_client_list  .change_usr_pass_form_wrap").slideUp(200);
}

function close_two_step() {
  $(".user_main_login_wrap").removeClass("current");
  $(".two_step_wrappp").removeClass("previous");
  setTimeout(() => {
    $(".two_step_wrappp").remove();
  }, 1000);
}

function get_two_step_code() {
  var code = $.trim($(".tw_step_input_code").val());
  var usr = $.trim($(".null_usr").val());
  var pass = $.trim($(".null_pass").val());

  if (code == "") {
    forgot_pass_wrap("two_step_wrappp", "Code is required", 3000, "");
  } else if (code != "" && !code.match("^(0|[1-9][0-9]*)$")) {
    forgot_pass_wrap("two_step_wrappp", "Code must be only number", 4000, "");
  } else if (code != "" && code.length != 6) {
    forgot_pass_wrap("two_step_wrappp", "Code must be 6-digit", 4000, "");
  } else {
    $.ajax({
      url: "./actions/get.php",
      type: "post",
      data: { code: code, usr: usr, pass: pass },
      beforeSend: function () {
        $(".login_form_wrap .loading_long_bar").show();
        $(".two_step_submit_btn").addClass("cstm_btn_disabled");
        $(".two_step_submit_btn").attr("disabled", true);
        $(".two_step_submit_btn").text("Submiting..");
      },
      success: function (data) {
        $(".login_form_wrap .loading_long_bar").hide();
        $(".two_step_submit_btn").removeClass("cstm_btn_disabled");
        $(".two_step_submit_btn").attr("disabled", false);
        $(".two_step_submit_btn").text("Submit");
        if (data == "yes") {
          store_code();
        } else if (data == "wrong_code") {
          forgot_pass_wrap(
            "two_step_wrappp",
            "Wrong verification code",
            3000,
            ""
          );
        } else {
          forgot_pass_wrap("two_step_wrappp", wrng, 5000, "");
        }
      },
    });
  }
}

function get_scret_code() {
  var code = $.trim($(".str_code_input").val());
  var usr = $.trim($(".null_usr").val());
  var pass = $.trim($(".null_pass").val());

  if (code == "") {
    forgot_pass_wrap("store_code_wrap", "Code is required", 3000, "");
  } else {
    $.ajax({
      url: "./actions/get.php",
      type: "post",
      data: { store_code: code, store_usr: usr, store_pass: pass },
      beforeSend: function () {
        $(".login_form_wrap .loading_long_bar").show();
        $(".str_cod_submit_btn").addClass("cstm_btn_disabled");
        $(".str_cod_submit_btn").attr("disabled", true);
        $(".str_cod_submit_btn").text("Submiting..");
      },
      success: function (data) {
        $(".login_form_wrap .loading_long_bar").hide();
        $(".str_cod_submit_btn").removeClass("cstm_btn_disabled");
        $(".str_cod_submit_btn").attr("disabled", false);
        $(".str_cod_submit_btn").text("Submit");
        if (data == "yes") {
          window.location.href = "./";
        } else if (data == "wrong_code") {
          forgot_pass_wrap(
            "store_code_wrap",
            "Wrong code! Try again",
            4000,
            ""
          );
        } else {
          forgot_pass_wrap("store_code_wrap", wrng, 5000, "");
        }
      },
    });
  }
}

function store_code() {
  var check_store_code = "store_code";

  var cokkie_usr = $.trim($(".null_usr").val());
  var cokkie_pass = $.trim($(".null_pass").val());

  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: {
      check_store_code: check_store_code,
      cokkie_usr: cokkie_usr,
      cokkie_pass: cokkie_pass,
    },
    success: function (data) {
      if (data == "yes") {
        $(".login_form_wrap").append(
          ' <div class="after_send_otp_wrap store_code_wrap menual_widget"> <div class="find_alert_div_wrap"></div><div onclick="close_widget(5)" class="close_it saasas flex_all"> <span><i class="fas fa-arrow-left"></i></span> </div><h6 class="two_step_title">Store Secrect Code</h6> <p class="two_step_para">Enter your store secrect code.</p><form onsubmit="return false" class="store_form_submit w-100"> <div class="form-group"> <input type="text" placeholder="Enter your store code" class="str_code_input"/> </div><div class="resend_code_wrap"> <button type="submit" class="str_cod_submit_btn" onclick="get_scret_code()">Submit</button> </div></form> </div>'
        );

        setTimeout(() => {
          $(".user_main_login_wrap").addClass("current");
          $(".two_step_wrappp").addClass("current");
          $(".two_step_wrappp").removeClass("previous");
          $(".store_code_wrap").addClass("previous");
        }, 200);
      } else {
        window.location.href = "./";
      }
    },
  });
}

function dismiss_all() {
  $(".login_form_wrap .loading_long_bar").hide();
  $(".login_form_wrap button").removeClass("cstm_btn_disabled");
  $(".login_form_wrap button").attr("disabled", false);
}
function chng_pass_dismiss() {
  $(".login_form_wrap .loading_long_bar").hide();
  $(".finally_change_pass_wrap .chng_pass_btn").removeClass(
    "cstm_btn_disabled"
  );
  $(".finally_change_pass_wrap .chng_pass_btn").attr("disabled", false);
  $(".finally_change_pass_wrap .chng_pass_btn").text("Change Password");
}

function no_more_notification() {
  var no_more_noti = "owner_notification";
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { no_more_noti: no_more_noti },
    success: function (data) {
      if (data == "yes") {
        $(".clear_all_notification").addClass("no_pinter");
        cstm_nothing_found(
          "notification_body",
          "nothing_found.png",
          "No Notification",
          "You have currently no notifications to show."
        );
      }
    },
  });
}

////////// Remove Single Notification Start

function remove_single_notification(e) {
  $.ajax({
    url: "./actions/delete.php",
    type: "post",
    data: { rem_si_noti: e },
    beforeSend: function () {
      $(
        ".sing_notifi_id_" + e + " .single_notification_actions_wrap i"
      ).addClass("fa-sync-alt rotate_right");
    },
    success: function (data) {
      if (data == "yes") {
        $(
          ".sing_notifi_id_" + e + " .single_notification_actions_wrap i"
        ).removeClass("fa-ellipsis-v fa-sync-alt rotate_right");
        $(
          ".sing_notifi_id_" + e + " .single_notification_actions_wrap i"
        ).addClass("fa-check");
        setTimeout(() => {
          $(".sing_notifi_id_" + e).addClass("cstm_deleting");
          setTimeout(() => {
            $(".sing_notifi_id_" + e).fadeOut();
            setTimeout(() => {
              $(".sing_notifi_id_" + e).remove();
              no_more_notification();
            }, 400);
          }, 200);
        }, 100);
        cstm_alert_div("Notification removed", 3000);
      } else {
        cstm_alert_div("Failed to remove notification", 4000);
      }
    },
  });
}

////////// Remove Single Notification End
function report_length_check() {
  setTimeout(() => {
    $(".count_h4_lenght span").each(function () {
      var length_is = $(this).text().length;
      if (length_is >= 10) {
        $(this).parent().removeClass("sml_store_report");
        $(this).parent().addClass("sml_store_report_2x");
      } else if (length_is >= 8) {
        $(this).parent().removeClass("sml_store_report_2x");
        $(this).parent().addClass("sml_store_report");
      } else {
        $(this).parent().removeClass("sml_store_report");
      }
    });
  }, 2000);
}
// Sgst Select All Start

function get_all_sgst() {
  var tbl_nm = "sgst_word";
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { tbl_nm: tbl_nm },
    beforeSend: function () {
      $(".suggested_list_wrap").html(
        '<div class="loading_long_bar slim_loading overflow-hidden d-block"><div class="loading_bar"></div></div>'
      );
    },
    success: function (e) {
      $(".suggested_list_wrap").html(e);
    },
  });
}
// Sgst Select All End

// Sgst List Delete Start

function delete_sgst_list(id_dtl) {
  $.ajax({
    url: "./actions/delete.php",
    type: "post",
    data: { sgst_dlt_id: id_dtl },
    beforeSend: () => {
      close_confirm();
      $(".find_sgst_row_id_" + id_dtl + " .actions_wrap .sgst_dlt_spn")
        .html('<div class="slim_spinner slim_12 ml-0"></div>')
        .addClass("ml-5");
    },
    success: function (e) {
      $(".find_sgst_row_id_" + id_dtl + " .actions_wrap .sgst_dlt_spn").html(
        "Delete"
      );

      if (e == "yes") {
        $(".find_sgst_row_id_" + id_dtl).addClass("cstm_deleting");
        $(".find_sgst_row_id_" + id_dtl).fadeOut();
        setTimeout(() => {
          $(".find_sgst_row_id_" + id_dtl).remove();
        }, 1000);
        cstm_alert_div_html("List deleted", 3000);
      } else {
        cstm_alert_div_html("Failed to delete !", 3000);
      }
    },
  });
}
function update_sgst_list(id) {
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { sgst_edit_id: id },
    beforeSend: () => {
      $(".find_sgst_row_id_" + id + " .actions_wrap .sgst_edit_spn").html(
        '<div class="slim_spinner slim_12"></div>'
      );
    },
    success: (e) => {
      $(".find_sgst_row_id_" + id + " .actions_wrap .sgst_edit_spn").html(
        "Edit"
      );
      if (e != "no") {
        var result = $.parseJSON(e);
        var val_1 = result[0];
        var val_2 = result[1];
        $(".edt_sgst_input_main").val(val_1);
        $(".edt_sgst_input_related").val(val_2);
        $(".edt_sgst_input_re_id").val(id);
        $(".edit_sgst_wrap_overly").addClass("show_all");
        $(".edit_sgst_wrap h4").text("Edit List");
        $(".sgst_form button").text("Update");
        $(".sgst_form .sgst_form_type").val("updt");
      }
    },
  });
}

// $(".suggest_input_wrap .product_name").blur(function () {
//   setTimeout(() => {
//     $(".suggested_word_wrap").slideUp(50);
//   }, 100);
// });

//user is "finished typing," do something
function doneTyping() {
  var source = $.trim($(".suggest_input_wrap .product_name").val());
  var splittedSource = source
    .replace(/\s{2,}/g, " ")
    .split(" ")
    .pop();
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { get_sugst: splittedSource },
    success: function (e) {
      if (e != "no" && e != "no_row") {
        $(".suggested_word_wrap ul").html(e);
        $(".suggested_word_wrap").slideDown(80);
        $(".suggested_word_wrap ul").scrollTop(0);
        $(".form_submit_yes_no").val("false");

        fire_drop("1");
      } else if (e == "no_row") {
        $(".suggested_word_wrap").slideUp(50);
        $(".suggested_word_wrap ul").text("");
        $(".form_submit_yes_no").val("false");
      } else {
        $(".suggested_word_wrap").slideUp(50);
        $(".suggested_word_wrap ul").text("");
      }
    },
  });
}

/*===========================================
======================================================================================
============================================= */

function search_data(inpVal, searchDiv, nothingDiv) {
  var thisVal = inpVal.length;
  var prev_length = $("." + searchDiv).length;
  if (prev_length > 0) {
    $("." + searchDiv).removeClass("grant");
    if (thisVal > 0) {
      var val = inpVal.toLowerCase();

      $("." + searchDiv).hide();

      $("." + searchDiv).each(function () {
        var text = $(this).children().text().toLowerCase();

        if (text.indexOf(val) != -1) {
          $(this).show();
          $(this).addClass("grant");
        }
      });
    } else {
      $("." + searchDiv).show();
    }

    var grant = $("." + searchDiv + ".grant").length;
    if (grant >= 1) {
      $("." + nothingDiv).removeClass("show_all");
    } else {
      $("." + nothingDiv).addClass("show_all");
      $("." + nothingDiv + " .live_search_tag span").text(inpVal);
    }
  }
  if (thisVal === 0) {
    $("." + nothingDiv).removeClass("show_all");
  }
}

function fire_drop(val) {
  var currentLI = val;
  var listItems = $(".suggested_word_wrap ul .li_" + currentLI);

  $(listItems).addClass("highlight");
  $(window).keydown(function (event) {
    var scrl = $(".suggested_word_wrap ul").scrollTop();
    if (event.keyCode === 38) {
      $(".suggested_word_wrap ul li").removeClass("highlight");
      var firstLi = $(".suggested_word_wrap ul li").first().data("limit-li");
      var toNum_and_Add = Number(currentLI);
      if (toNum_and_Add > firstLi) {
        var minus = toNum_and_Add - 1;
        var makeString = minus.toString();
        $(".suggested_word_wrap ul .li_" + makeString).addClass("highlight");
        currentLI = makeString;
      } else {
        $(".suggested_word_wrap ul li").first().addClass("highlight");
      }

      $(".suggested_word_wrap ul").scrollTop(scrl - 35);
    } else if (event.keyCode === 40) {
      $(".suggested_word_wrap ul li").removeClass("highlight");
      var lastLi = $(".suggested_word_wrap ul li").last().data("limit-li");

      var toNum_and_Add = Number(currentLI);
      var plus = toNum_and_Add + 1;
      if (plus <= lastLi) {
        var makeString = plus.toString();
        $(".suggested_word_wrap ul .li_" + makeString).addClass("highlight");
        currentLI = makeString;
      } else {
        $(".suggested_word_wrap ul li").last().addClass("highlight");
      }

      if (Number(currentLI) > 5) {
        $(".suggested_word_wrap ul").scrollTop(scrl + 35);
      }
    }
  });
}

function get_todays_collection() {
  var tdy_coll_li = "tdy_coll_li";
  $(".animation_today_tk_wrap span").text(0);
  $(".today_result_wrap").css({
    opacity: "0",
    transform: "translateY(4rem)",
    clipPath: "circle(100% at center)",
    background: "transparent",
  });
  $(".today_more_details_list_wrap").css({
    clipPath: "circle(0% at center)",
  });
  $(".view_more_det").removeClass("abs_view_more_det");
  $(".view_more_det").text("View more");
  $(".todays_collections_wrap .canvas_partical").remove();
  $(".todays_spinner_wrap").removeClass("spinner_double_fill");
  $(".todays_spinner_wrap").removeClass("spinner_double_fill_width");
  $(".todays_spinner_wrap .spinner_double").removeClass("adadad");
  $(".todays_spinner_wrap").removeClass("spinner_double_fill_width_aa");
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { tdy_coll_li: tdy_coll_li },
    beforeSend: () => {
      show_all("todays_collections_overly");
    },
    success: (e) => {
      console.log(e);
      if (e == "no") {
        cstm_alert_div(wrng, 4000);
      } else if (e <= "0" || e == "no_collect") {
        $(".todays_collections_overly").removeClass("show_all");
        cstm_alert_div("No due collect in today.", 4000);
      } else if (e != "no_collect" && e != "no") {
        setTimeout(() => {
          $(".todays_spinner_wrap").addClass("spinner_double_fill");

          setTimeout(() => {
            $(".todays_spinner_wrap").addClass("spinner_double_fill_width");

            setTimeout(() => {
              $(".todays_spinner_wrap .spinner_double").addClass("adadad");
              $(".todays_spinner_wrap").addClass(
                "spinner_double_fill_width_aa"
              );

              setTimeout(() => {
                var myCanvas = document.createElement("canvas");
                myCanvas.className = "canvas_partical";
                $(".todays_collections_wrap").append(myCanvas);

                var myConfetti = confetti.create(myCanvas, {
                  resize: true,
                  useWorker: true,
                });
                myConfetti({
                  particleCount: 400,
                  spread: 60,
                  origin: { y: 1 },
                });
                $(".today_result_wrap").css({
                  opacity: "1",
                  transform: "translateY(0)",
                });
                animating_count(".animation_today_tk_wrap span", e * 1);
              }, 100);
            }, 300);
          }, 600);
        }, 1000);
      } else {
        cstm_alert_div(wrng, 4000);
      }
    },
  });
}
$(".view_more_det").click(() => {
  var today_paid_name = "today_paid_name";
  $.ajax({
    url: "./actions/get.php",
    type: "post",
    data: { today_paid_name: today_paid_name },
    beforeSend: () => {
      $(".view_more_det").addClass("abs_view_more_det");
      $(".view_more_det").html('<div class="spinner_double"></div>');
    },
    success: function (e) {
      setTimeout(() => {
        $(".today_result_wrap").css({
          background: "var(--bg_primary)",
          clipPath: "circle(0px at center)",
          opacity: "1",
          transform: "translateY(0)",
        });
        setTimeout(() => {
          $(".today_more_details_list_wrap").css({
            clipPath: "circle(100% at center)",
          });
        }, 500);
      }, 1000);
      $(".all_list_tod_wrap ul").html(e);
    },
  });
});

//function view_more_collection() {}
