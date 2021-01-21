<?php
  $page_title = 'Home Page';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true))
    redirect('index.php', false);
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
  <div class="col-md-12">
    <div class="panel">
      <div class="text-center">
        <h2>This is the INVENTO Home Page!</h2>
        <p>Just see around and find out how this website works.</p>
        <img src="uploads/warehouse.jpg" width='800px' height='480px' alt="No Image Found">
      </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>