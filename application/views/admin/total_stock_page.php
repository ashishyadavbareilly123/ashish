<!DOCTYPE html>
<html lang="en">
<head>
  <title>Total Stock</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/stock_list.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;700;900&family=Roboto:wght@100&display=swap" rel="stylesheet">

</head>
<body>
<div class="header">
    <h2>Show Stock List</h2>
    <?php if ($productmsg = $this->session->flashdata('required')): 
    $msgclass = $this->session->flashdata('msg_art')
    ?>
    <div class = "row">
      <div class="col-lg-6" style="margin-top:50px;margin-left: 333px;">
        <div class = "alert alert-danger">
            <p style="margin-left:11px">
              <?php echo $productmsg ?>
            </p>
        </div>
      </div>
  </div>
  <?php endif;?>

  <?php if ($productmsg = $this->session->flashdata('msg')): 
    $msgclass = $this->session->flashdata('msg_art')
    ?>
    <div class = "row">
      <div class="col-lg-6" style="margin-top:50px;margin-left: 333px;">
        <div class = "alert alert-success">
            <p style="margin-left:11px">
              <?php echo $productmsg ?>
            </p>
        </div>
      </div>
  </div>
  <?php endif;?>


</div>
<div class="container mt-3">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th style = "text-align:center">Image</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Total Stock</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
        <?php if(!empty($stock_list)){ $id = 0;?>
        <?php foreach($stock_list as $list) { $id++ ?>
      <tr>
       <td><?php echo $id ?></td>
        <td class = "image"> <img src="<?php echo base_url().$list['fld_image'] ?>" alt=""></td>
        <td><?php echo $list['fld_product_name']?></td>
        <td><?php echo $list['fld_product_price']?></td>
        <td><?php echo $list['fld_total_stock']?></td>
        <td><?=
        form_open('admin/product/edit_product'),
        form_hidden('id', $list['fld_product_id']),
        form_submit(['class' => 'btn btn-primary', 'value' => 'EDIT', 'name' => 'edit']),
        form_close();
         ?>
        </td>
      </tr>
      <?php } } else {?>
        <div>Data not available</div>
        <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
