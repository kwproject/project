<title><?php echo $title;?></title>
<body id="login">
	<h2 class="form-heading">login Ke Dashboard</h2>
	    <div class="app-cam">
			<form action="<?php echo base_url();?>index.php/login/login_form" method="post" name="login">

				<input type="text" class="text" value="Username" name="username" onfocus="this.value = '';" 
					onblur="if (this.value == '') {this.value = 'Username';}"><?php echo form_error('username');?>

				<input type="password" value="Password" name="password" onfocus="this.value = '';" 
					onblur="if (this.value == '') {this.value = 'Password';}"><?php echo form_error('password');?>
				
				<div class="submit"><input type="submit" onclick="myFunction()" value="Login"></div>
			
				<ul class="new">
					<li class="new_left"><p><a href="#">Forgot Password ?</a></p></li>
					<li class="new_right"><p class="sign">New here ?<a href="register.html"> Sign Up</a></p></li>
					<div class="clearfix"></div>
				</ul>
			</form>
	    </div>
	    <div class="copy_layout login">
	      <p>Copyright &copy; 2015. All Rights Reserved | Design by Kikik Awe Awe </p>
	   </div>
