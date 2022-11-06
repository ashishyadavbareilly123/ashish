<?php foreach ($bike_lists as $bike_list) {?>
<section>
<div class="col-lg-12 product">
<div class="col-lg-5 image">
    <img src="<?php echo base_url().$bike_list['fld_image'] ?>?>" alt="">
</div>
<div class="col-lg-7 description">
    <p class = "title"><?php echo $bike_list['fld_product_name'] ?></p>
    <p class = "desc"><?php echo $bike_list['fld_product_desc'] ?></p>
    <p class= "price">Product Price:- &nbsp;<span style = "color:green">Rs. <?php echo $bike_list['fld_product_price'] ?></span></p>
    <p class= "price">Total Stock:- &nbsp;<span style = "color:green"><?php echo $bike_list['fld_total_stock'] ?></span></p>
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
