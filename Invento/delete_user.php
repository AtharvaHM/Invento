<?php
  require_once('includes/load.php');
  page_require_level(1); // checking what level user has permission to view this page
?>

<?php
  $delete_id = delete_by_id('users',(int)$_GET['id']);
  if($delete_id) {
    $session->msg('s', "User Deleted.");
    redirect('users.php');
  }
  else {
    $session->msg('d',"User Deletion Failed.");
    redirect('users.php');
  }
?>