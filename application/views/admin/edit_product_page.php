<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/add_product.css">
        <title>Inventory Project</title>        
    </head>
    <body>
     <div class="container">
     <h1>Add Product</h1>  
	<?php echo form_open_multipart('admin/product/update_product'); ?>
    <?php echo form_hidden('fld_product_id',$product->fld_product_id); ?>
  <div class= "row">
    <div class="col-lg-6">
  <div class="form-group">
    <label for="product">Product Name</label>
    <?php echo form_input(['class' => "form-control", 'placeholder' => 'Enter product name', 'name' => 'fld_product_name', 'value' => set_value('fld_product_name', $product->fld_product_name)]); ?>
  </div>
  <div class="col-lg-8">
    <?php echo form_error('fld_product_name'); ?>
  </div>
</div>
</div>
<div class= "row">
  <div class="col-lg-6">
  <div class="form-group">
    <label for="stock">Stock</label>
	<?php echo form_input(['class' => 'form-control','type'=>'number', 'placeholder' => 'Enter stock here', 'name' => 'fld_total_stock', 'value' => set_value('fld_total_stock', $product->fld_total_stock) ,'min'=>'1']); ?>
  </div>
  <div class="col-lg-8">
    <?php echo form_error('fld_total_stock'); ?>
  </div>
</div>
</div>
<div class= "row">
    <div class="col-lg-6">
  <div class="form-group">
    <label for="price">Price</label>
    <?php echo form_input(['class' => "form-control",'type'=>'number', 'placeholder' => 'Enter price here', 'name' => 'fld_product_price', 'value' => set_value('fld_product_price', $product->fld_product_price),'min'=>'1']); ?>
  </div>
  <div class="col-lg-8">
    <?php echo form_error('fld_product_price'); ?>
  </div>
</div>
</div>

<div class= "row">
    <div class="col-lg-6">
  <div class="form-group">
    <label for="description">Description</label>
    <?php echo form_textarea(['class' => "form-control",'rows'=>'4', 'placeholder' => 'Enter description here', 'name' => 'fld_product_desc', 'value' => set_value('fld_product_desc', $product->fld_product_desc)]); ?>
  </div>
  <div class="col-lg-8">
    <?php echo form_error('fld_product_desc'); ?>
  </div>
</div>
</div>
<div class= "row">
    <div class="col-lg-6">
  <div class="form-group">
    <label for="image">Image</label>
   <input type="file" name="fld_image" class = "form-control"/>
  </div>
  <div class="col-lg-8">
    <?php echo form_error('fld_image'); ?>
  </div>
</div>
</div>
<?php echo form_submit(['class' => 'btn btn-primary', 'value' => 'Submit']); ?>
<?php echo form_reset(['class' => 'btn btn-default', 'value' => 'Reset']); ?>
</div>
</div>
</body>
</html>