<?php
  require_once('includes/load.php');
  page_require_level(2); // checking what level user has permission to view this page
?>

<?php
  $product = find_by_id('products', (int)$_GET['id']);
  if(!$product) {
    $session->msg('d', "Missing Product ID.");
    redirect('product.php');
  }
?>

<?php
  $delete_id = delete_by_id('products',(int)$product['id']);
  if($delete_id) {
      $session->msg('s', "Products Deleted.");
      redirect('product.php');
  }
  else {
      $session->msg('d',"Products Deletion Failed.");
      redirect('product.php');
  }
?>