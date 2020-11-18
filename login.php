<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="./vendor/bootstrap/bootstrap.min.css">
  <!-- Fontawesome CSS File -->
  <link rel="stylesheet" href="./vendor/fontawesome/css/all.min.css">
  <!-- Main Custom CSS File -->
  <link rel="stylesheet" href="./css/style.css">
  <!-- Responsive Css File -->
  <link rel="stylesheet" href="./css/responsive.css">
</head>
<body>

  <input type="hidden" class="null_usr">
  <input type="hidden" class="null_pass">
  <input type="hidden" class="reset_type">

  <div class="login_wrap flex_all">
    <div class="login_flex_wrap">
      <div class="login_about_us_wrap">
        <div class="store_logo flex_all">
          <img src="./img/login_logo.png" alt="">
        </div>
        <div class="about_store">
          <ul>
            <li>Log in to access your data</li>
            <li>We always keep your data secret</li>
            <li>For any help : +88 4554 455 45</li>
            <li class="learn_more_login"><a href="#">Learn more</a></li>
          </ul>
        </div>
      </div>
      <div class="login_form_wrap">
        
        <div class="loading_long_bar">
          <div class="loading_bar"></div>
        </div>

        <div class="user_main_login_wrap">
          <div class="login_error_wrap"> </div>
        <!-- User Login Start -->
        <h4>Log in</h4>
        <form class="user_login_submit">
          <div class="form-group">
            <label class="form-label" for="username">Your username</label>
            <input id="username" class="form-input input_animated login_username" autocomplete="off" type="text"/>
          </div>

          <div class="form-group mb-4">
            <div class="password_show_hide">
              <i class="fas fa-eye"></i>
            </div>
            <label class="form-label" for="password">Your password</label>
            <input id="password" class="form-input input_animated login_password" autocomplete="off" type="password"/>
          </div>

          <button type="submit">Log in</button>
          <div>
            <p class="forgot_pass">Forgot password?</p>
          </div>
        </form>
        <!-- User Login End -->
        </div>

        <!-- Forgot Password Search By Username or Email Start -->
          <div class="forgot_pass_wrap">
            <div class="find_alert_div_wrap"></div>
            <div class="close_it close_find_wrap flex_all" data-closetype="">
              <span><i class="fas fa-arrow-left" style="font-size: 16px"></i></span>
            </div>
            <h4>Find your account</h4>
            <form class="find_account_form w-100">
              <div class="forgot_pass_margin"></div>
              <div class="form-group">
                <label class="form-label" for="forgot_pass">Your username</label>
                <input id="forgot_pass" class="form-input input_animated find_input" autocomplete="off" type="text"/>
              </div>
              <button type="submit">Find</button>
            </form>
            <div class="find_alert_div"></div>
          </div>
        <!-- Forgot Password Search By Username or Email End -->
      </div>
    </div>
  </div>

  

  <!-- Jquery Library File -->
  <script src="./vendor/jquery/jquery.js"></script>
  <!-- Bootstrap JS File -->
  <script src="./vendor/bootstrap/bootstrap.min.js"></script>
  <!-- Main Custom JS File -->
  <script src="./js/main.js"></script>
  <script src="./js/app.js"></script>
  <script type="text/javascript">
    localStorage.clear();
  </script>

</body>
</html>