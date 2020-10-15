<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location:home.php');
  	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page" style="background-color:#2ec1ac">
<div class="login-box">
  	<div class="login-logo">
  		<b>Welcome to Online Voting System: Admin's Login</b>
  	</div>
  
  	<div class="login-box-body"  style="margin:auto;padding:20px;border: 3px solid black;">
    	<p class="login-box-msg" style="font-size:3vw;text-align:center">Sign in here</p>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="Username" required>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
        		<div class="col-xs-8">
        		     <input type="button" onclick="window.location='../index.php'" style="float:right;"class="Redirect btn btn-primary btn-flat" value="Click Here for voter login"/>
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>