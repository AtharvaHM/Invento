<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true))
    redirect('home.php', false);
?>

<?php include_once('layouts/header.php'); ?>
<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,800&display=swap" rel="stylesheet">
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
}
.login-page .text-center{
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
  padding: 20px 20px;
}
h1 {
  font-family: "Work Sans", sans-serif;
  font-weight: 800;
  font-size: 5em;
  width: 5em;
  line-height: 0.9em;
  margin-left: auto;
  margin-right: auto;
 }


/* Style the rainbow text element. */
.rainbow-text {
  /* Create a conic gradient. */
  /* Double percentages to avoid blur (#000 10%, #fff 10%, #fff 20%, ...). */
  background: #CA4246;
  background-color: #CA4246;
  background: conic-gradient(
    #CA4246 16.666%, 
    #E16541 16.666%, 
    #E16541 33.333%, 
    #F18F43 33.333%, 
    #F18F43 50%, 
    #8B9862 50%, 
    #8B9862 66.666%, 
    #476098 66.666%, 
    #476098 83.333%, 
    #A7489B 83.333%);
  
  /* Set thee background size and repeat properties. */
  background-size: 57%;
  background-repeat: repeat;
  
  /* Use the text as a mask for the background. */
  /* This will show the gradient as a text color rather than element bg. */
  background-clip:initial;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent; 
  
  /* Animate the text when loading the element. */
  /* This animates it on page load and when hovering out. */
  animation: rainbow-text-animation-rev 0.5s ease forwards;

}

/* Add animation on hover. */
.rainbow-text:hover {
  animation: rainbow-text-animation 0.5s ease forwards;
}
/* Move the background and make it larger. */
/* Animation shown when hovering over the text. */
@keyframes rainbow-text-animation {
  0% {
    background-size: 57%;
    background-position: 0 0;
  }
  20% {
    background-size: 57%;
    background-position: 0 1em;
  }
  100% {
    background-size: 300%;
    background-position: -9em 1em;
  }
}

/* Move the background and make it smaller. */
/* Animation shown when entering the page and after the hover animation. */
@keyframes rainbow-text-animation-rev {
  0% {
    background-size: 300%;
    background-position: -9em 1em;
  }
  20% {
    background-size: 57%;
    background-position: 0 1em;
  }
  100% {
    background-size: 57%;
    background-position: 0 0;
  }
}
</style>

<div class="login-page">
  <div class="text-center">
    <h1  class="rainbow-text">Welcome</h1>
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
      <button type="submit" class="btn btn-info  pull-right">Login  <span class="glyphicon glyphicon-circle-arrow-right"></button>
    </div>
  </form>
  </div>
  </div>
<?php include_once('layouts/footer.php'); ?>