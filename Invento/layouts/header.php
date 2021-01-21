<?php $user = current_user(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>
      <?php
        if (!empty($page_title))
          echo remove_junk($page_title);
        elseif(!empty($user))
          echo ucfirst($user['name']);
        else
          echo "Simple inventory System";
      ?>
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="libs/css/main.css"/>
  </head>
  <body>
    <?php  if ($session->isUserLoggedIn(true)): ?>
      <header id="header">
        <div class="logo pull-left">INVENTO</div>
        <div class="header-content">
          <div class="header-date pull-left">
            <strong>
               <?php
                // Set the new timezone
                date_default_timezone_set('Asia/Kolkata');
                $timestamp = time();
                echo(date("F d, Y h:i:s", $timestamp));
              ?>
              
            </strong>
          </div>
          <div class="pull-right clearfix">
            <ul class="info-menu list-inline list-unstyled">
              <li class="profile">
                <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
                <?php if($user['image']==='no_image.jpg'): ?>
                  <img class="img-avatar img-circle" src="uploads/users/no_icon.jpg" alt="" class="img-circle img-inline">
                <?php else: ?>
                  <img src="uploads/users/<?php echo $user['image'];?>" alt="user-image" class="img-circle img-inline">
                <?php endif;?>
                  <span><?php echo remove_junk(ucfirst($user['name'])); ?> <i class="caret"></i></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="profile.php?id=<?php echo (int)$user['id'];?>">
                      <i class="glyphicon glyphicon-user"></i>
                      Profile
                    </a>
                  </li>
                  <li>
                    <a href="edit_account.php" title="edit account">
                      <i class="glyphicon glyphicon-cog"></i>
                      Settings
                    </a>
                  </li>
                  <li class="last">
                    <a href="logout.php">
                      <i class="glyphicon glyphicon-off"></i>
                      Logout
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </header>
      <div class="sidebar">
        <?php
          if($user['user_level'] === '1'):
            include_once('admin_menu.php'); // admin menu
          elseif($user['user_level'] === '2'):
            include_once('special_menu.php'); // special user menu
          elseif($user['user_level'] === '3'):
            include_once('user_menu.php'); //  User menu
          endif;
        ?>
      </div>
    <?php endif;?>

    <div class="page">
      <div class="container-fluid">