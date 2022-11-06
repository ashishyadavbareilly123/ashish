<?php foreach($expiry_product as $expiry){?>

    <!-- <div class = "row" style="margin-left: 435px;">
      <div class="col-lg-6" style="margin-top:50px">
        <div class = "alert alert-danger ?>">
            <p style="margin-left:40px">
              <?php echo 'Alert ! Your product <span style = "color:blue">'.$expiry['fld_product_name'] .'</span> Insurence will be expired tomorrow'?>
            </p>
        </div>
      </div>
  </div>
     -->
<?php }?>
<?php foreach ($products as $product) {?>
<section>
    <div class="col-lg-12 product">
    <div class="col-lg-5 image">
        <img src="<?php echo base_url().$product['fld_image']?>" alt="">
    </div>
    <div class="col-lg-7 description">
        <p class = "title"><?php echo $product['fld_product_name'] ?></p>
        <p class = "desc"><?php echo $product['fld_product_desc'] ?></p>
        <p class= "price">Product Price:- &nbsp;<span style = "color:green">Rs. <?php echo $product['fld_product_price'] ?></span></p>
        <p class= "price">Total Stock:- &nbsp;<span style = "color:green"><?php echo $product['fld_total_stock'] ?></span></p>
     <div class="button">
              <a href = "#" class = "btn btn-primary">View Details</a>
     </div>
    </div>
</section>
<?php }?>

<!-- <script type = "text/javascript">
    $(document).ready(function(){
     alert();    
    });
</script> -->
