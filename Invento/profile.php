<?php
  $page_title = 'My profile';
  require_once('includes/load.php');
  page_require_level(3); // checking what level user has permission to view this page
?>

<?php
  $user_id = (int)$_GET['id'];
  if(empty($user_id)):
    redirect('home.php',false);
  else:
    $user_p = find_by_id('users',$user_id);
  endif;
?>

<?php include_once('layouts/header.php'); ?>

<div class="row" style = "margin-left:33%;">
  <div class="col-md-4">
    <div class="panel profile">
      <div class="jumbotron text-center bg-red">
        <img class="img-circle img-size-2" src="uploads/users/<?php echo $user_p['image'];?>" alt="">
        <h4><b><?php echo first_character($user_p['name']); ?></b></h4>
      </div>
      <?php if( $user_p['id'] === $user['id']):?>
        <ul class="nav nav-pills nav-stacked">
          <li><a href="edit_account.php"> <i class="glyphicon glyphicon-edit"></i>Edit Profile</a></li>
        </ul>
      <?php endif;?>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>