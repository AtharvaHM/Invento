<?php
  require_once('includes/load.php');
  page_require_level(3); // checking what level user has permission to view this page
?>

<?php 
  $d_sale = find_by_id('sales',(int)$_GET['id']);
  if(!$d_sale) {
    $session->msg('d', "Missing Sale ID.");
    redirect('sales.php');
  }
?>

<?php
  $delete_id = delete_by_id('sales',(int)$d_sale['id']);
  if($delete_id) {
      $session->msg('s', "Sale Deleted.");
      redirect('sales.php');
  }
  else {
      $session->msg('d', "Sale Deletion Failed.");
      redirect('sales.php');
  }
?>