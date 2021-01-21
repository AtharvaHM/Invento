<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true))
    redirect('home.php', false);
?>

<?php include_once('layouts/header.php'); ?>

<style>
  body{
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-weight: 400;
  overflow-x: hidden;
  overflow-y: auto;
  background: #C9FFBF;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFAFBD, #C9FFBF);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFAFBD, #C9FFBF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  height: 100%;
  width: 100%;
}a{
  color: #777;
  text-decoration: none;
}.padding-top{
  padding-top: 20px;
}.login-page{
  width: 650px;
  margin-left: 15%;
  padding: 20px 20px;
  background-color: #f9f9f9;
  border: 1px solid #f2f2f2;
  border-radius: 5%;
}.login-page .text-center{
  margin-bottom: 35px;
}.box{
  padding: 30px;
  background-color: #f9f9f9;
  border: 1px solid #f2f2f2;
}.page{
  position: relative;
  display: block;
  top: 50px;
  left: 0;
  padding: 35px 15px 20px 270px;
}

  .sidenav {
  width: 273px;
  background-color: #111;
  overflow-x: hidden;
  position: absolute;
  overflow-y: hidden;
}
  .main{
margin-left: 273px; /* Same as the width of the sidenav */
  padding: 20px 25px;
}
</style>

<div class="login-page">
  <div class="text-center">
    <h1>Welcome</h1>
    <p>Sign in to start your session</p>
  </div>
  <?php echo display_msg($msg); ?>
  <div class="sidenav"><img src="libs\images\login.jpeg" style="float:left"></div>
  <div class="main">
  <form method="post" action="auth.php" class="clearfix">
  <div class="form-group">
    <label for="username" class="control-label">Username</label>
    <input type="name" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="Password" class="control-label">Password</label>
      <input type="password" name= "password" class="form-control" placeholder="password">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-info  pull-right">Login  <span class="glyphicon glyphicon-circle-arrow-right"></span></button>
    </div>
  </form>
  </div>
  </div>

<?php include_once('layouts/header.php'); ?>