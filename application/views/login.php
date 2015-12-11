<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Dashboard</title>
    
    
    
    <link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_login.css">    
  </head>

  <body>

    <div class="login-card">
        <h1>Login Admin</h1><br>
      <?php echo form_open('login/login_form') ?>
        <input type="text" name="username" placeholder="Username" required="true">
        <input type="password" name="password" placeholder="Password" required="true">
        <input type="submit" name="login" class="login login-submit" value="login">
      </form>
    </div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

    
    
    
    
  </body>
</html>
