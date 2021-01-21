<?php
  $page_title = 'Add Product';
  require_once('includes/load.php');
  page_require_level(2); // checking what level user has permission to view this page
  $all_category = find_all('category');
  $all_photo = find_all('media');
?>

<?php
  if(isset($_POST['add_product'])) {
    $req_fields = array('product-title', 'product-category', 'product-quantity', 'buying-price', 'selling-price' );
    validate_fields($req_fields);
    if(empty($errors)) {
      $p_name  = remove_junk($db->escape($_POST['product-title']));
      $p_cat   = remove_junk($db->escape($_POST['product-category']));
      $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
      $p_buy   = remove_junk($db->escape($_POST['buying-price']));
      $p_sale  = remove_junk($db->escape($_POST['selling-price']));
      if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "")
        $media_id = '0';
      else 
        $media_id = remove_junk($db->escape($_POST['product-photo']));
      $date    = make_date();
      $query  = "INSERT INTO products";
      $query .=" (name, quantity, buy_price, sell_price, category_id, media_id, date)";
      $query .=" VALUES";
      $query .=" ('{$p_name}', '{$p_qty}', '{$p_buy}', '{$p_sale}', '{$p_cat}', '{$media_id}', '{$date}')";
      $query .=" ON DUPLICATE KEY UPDATE name ='{$p_name}'";
      if($db->query($query)) {
        $session->msg('s',"Product added ");
        redirect('add_product.php', false);
      }
      else {
        $session->msg('d',"Sorry! Failed to add product!");
        redirect('product.php', false);
      }
    }
    else{
      $session->msg('d', $errors);
      redirect('add_product.php', false);
    }
  }
?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Add New Product</span>
        </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-12">
          <form method="post" action="add_product.php" class="clearfix">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="glyphicon glyphicon-th-large"></i>
                </span>
                <input type="text" class="form-control" name="product-title" placeholder="Product Title">
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <select class="form-control" name="product-category">
                    <option value="">Select Product Category</option>
                    <?php  foreach ($all_category as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                       <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <!-- <div class="col-md-6">
                  <select class="form-control" name="product-photo">
                    <option value="">Select Product Photo</option>
                    <php  foreach ($all_photo as $photo): ?>
                      <option value="<php echo (int)$photo['id'] ?>">
                      <php echo $photo['file_name'] ?></option>
                    <php endforeach; >
                  </select>
                </div> -->
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                    </span>
                    <input type="number" class="form-control" name="product-quantity" placeholder="Product Quantity">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fa fa-rupee"></i>
                    </span>
                    <input type="number" class="form-control" name="buying-price" placeholder="Buying Price">
                    <span class="input-group-addon">.00</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fa fa-rupee"></i>
                    </span>
                    <input type="number" class="form-control" name="selling-price" placeholder="Selling Price">
                    <span class="input-group-addon">.00</span>
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" name="add_product" class="btn btn-danger">Add product</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>