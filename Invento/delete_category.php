<?php
  require_once('includes/load.php');
  page_require_level(1); // checking what level user has permission to view this page
?>

<?php
  $category = find_by_id('category', (int)$_GET['id']);
  if(!$category) {
    $session->msg("d","Missing Category ID.");
    redirect('category.php');
  }
?>

<?php
  $delete_id = delete_by_id('category', (int)$category['id']);
  if($delete_id ) {
      $session->msg('s',"Category Deleted.");
      redirect('category.php');
  }
  else {
      $session->msg('d',"Category Deletion Failed.");
      redirect('category.php');
  }
?>