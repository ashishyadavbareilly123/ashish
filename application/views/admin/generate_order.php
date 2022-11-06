<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Stock List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/generate_order.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
</head>
<body>
 <div class="container">
  <h2 class = "heading">Generate Order</h2>
    <?php if($msg = $this->session->flashdata('qty')){?>
    <div class="loginMsg">
        <p><?php echo $msg?></p>
    </div>
    <?php } ?>
  <?php echo form_open('admin/order/order_generate',array('class' => 'form-inline')); ?>
    <div class="container2">
    <div class="form-group">
      <label for="product">Product Name:-</label>
      <select class="form-control" name = "product" id = "prodt" required>
        <option value = '' selected disabled>--Select Product--</option>
          <?php foreach($product_lists as $list){?>
            <option value="<?php echo $list['fld_product_id'] ?>"><?php echo $list['fld_product_name'] ?></option>
          <?php } ?>
    </select>&nbsp;&nbsp;
    <div class="form-group">
      <label for="qty">Quantity:-</label>
      <input type="number" class="form-control" id="qty" placeholder="Enter Qty" name="qty" min="1" required>
    </div>&nbsp;&nbsp;
    <div class="form-group">
      <label for="price">Price:-</label>
      <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" readonly="readonly">
      <input type="hidden" class="form-control" id="hiddenField" name="hiddenField">
      <input type="hidden" class="form-control" id="hiddenName" name="product_name">
      <!-- <input type="hidden" class="form-control" id="hiddenId" name="product_name"> -->
    </div>
    
    <div class="form-group" style="margin-right: 680px;margin-top: 33px;">
      <label for="price">Product Identity-</label>
      <!-- <input type="text" class="form-control" id="price" name="identity" placeholder="Enter identity"> -->
      <select class="form-control" name="identity">
        <option value="" selected disabled>--select--</option>
        <option value="product">Product</option>
      </select>
    </div><br/>
    <div class="form-group" style="margin-top: -58px;">
      <label for="margin">Margin in Price:-</label>
      <input type="number" class="form-control" id="margin" name="margin" placeholder="Enter margin" min = '0' required>
    </div>
    <button type="submit" class="btn btn-success" style="position: absolute;
    margin-top: 52px;
    left: 230px;">Submit</button>
    <?php form_close();?>
  </div>
</div>

<script type = "text/javascript">
    $(document).ready(function(){
       $("#prodt").change(function(){
        var selectVal = $(this).find(":selected").val();
        var selectProductName = $(this).find(":selected").html();
        $('#hiddenField').val(selectVal);
        $('#hiddenName').val(selectProductName);
            $.ajax({
                   type : 'POST',
                   url : "<?php echo base_url() ?>"+"admin/product/get_select_product_price",
                   datatype : 'json',
                   data : { product_id : selectVal },
                   success : function(result){
                      if(result){
                        $('#price').val(result);
                        console.log(result);
                      }else if(result == "failed"){
                        console.log("Data not found");
                      }
                   }
                })
  });
});
</script>

</body>
</html>
