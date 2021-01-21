<?php include_once('includes/load.php'); ?>

<?php
  $req_fields = array('username', 'password' );
  validate_fields($req_fields);
  $username = remove_junk($_POST['username']);
  $password = remove_junk($_POST['password']);
  if(empty($errors)) {
    $user = authenticate($username, $password);
    if($user):
      $session->login($user['id']); // create session with id
      updateLastLogIn($user['id']); // update Sign in time
      // redirect user to group home page by user level
      if($user['user_level'] === '1'):
        $session->msg("s", "Hello ".$user['username'].", Welcome to INVENTO.");
        redirect('home.php',false);
      elseif ($user['user_level'] === '2'):
        $session->msg("s", "Hello ".$user['username'].", Welcome to INVENTO.");
        redirect('home.php',false);
      else:
        $session->msg("s", "Hello ".$user['username'].", Welcome to INVENTO.");
        redirect('home.php',false);
      endif;
    else:
      $session->msg("d", "Sorry Username/Password incorrect.");
      redirect('index.php',false);
    endif;
  }
  else {
    $session->msg("d", $errors);
    redirect('login.php',false);
  }
?>