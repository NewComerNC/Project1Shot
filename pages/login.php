<?php
include 'connect_db.php';
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="../css/style.css">


</head>

<body>

  <div class="login_form">
    <setion class="login-wrapper">

      <div class="logo">
        <img src= "../pic/UTCC_1S_Logo.png" alt="logo" align = "top">
      </div>

      <form id="form_login" method="post" action="check_login.php">

        <label for="username">User Name</label>
        <input name = "ad_name"  required  placeholder="Username" id = "ad_name" type="text" autocapitalize="off" autocorrect="off"/>
        <label for="password">Password</label>
        <input name = "ad_pass" required id= "ad_pass"  placeholder="Password" type="password" />
        <div>
			<label style="color:red;" id="error_message">
					<?php
						if(isset($_GET["error_message"])){
							echo $_GET["error_message"];
						}
					?>
	    	</label>
		</div>

        <button type="submit" id="Submit" value="Login">Sign In</button>

      </form>

    </section>
  </div>

    <script  src="../js/index.js"></script>

</body>
</html>
