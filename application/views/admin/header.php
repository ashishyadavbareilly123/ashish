<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Project</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;700;900&family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <div class="upperHeader">
       <p> <i class="bi bi-telephone-forward-fill"></i> &nbsp; &nbsp;Support Helpline : +91-9870565865,435860502</p>
       <marquee width="60%" direction="left" height="100px" style = "padding-top:5px" class = "maqui">
   Welcome to JMD Automobile | Welcome to JMD Automobile | Welcome to JMD Automobile | Welcome to JMD Automobile
</marquee>
       <div class = "login"><i class="bi bi-box-arrow-in-right"></i>&nbsp;&nbsp;<a  href="<?php echo base_url('admin/home/logout')?>">Logout</a></div>
    </div>
    <div class="lowerHeader">
        <?php if($this->session->userdata('user') == 'A'){?>
        <!-- <div class="admin-image">
            <img src="<?php echo base_url() ?>/assets/images/logo1.jpeg" alt="" style="height: 69px;width: 230px;margin-right: 1072px;/* left: 3px; */margin-top: -39px;">
        </div>
        </div>
         <div class = "menu_item"><a href = "<?php echo base_url('admin/order/show_monthly_bill')?>"><i class="bi bi-bank2"></i>&nbsp;&nbsp;Monthly Bill</a></div> -->
        <!-- <div class = "menu_item" style="margin-top: -81px;margin-left: 88%;"><a href = "<?php echo base_url('admin/order/show_monthly_bill')?>"><i class="bi bi-bank2"></i>&nbsp;&nbsp;Monthly Bill</a></div> --> -->



        <div class = "menu_item2">
            <img src="<?php echo base_url() ?>/assets/images/logo1.jpeg" alt="" style="height: 90px;width: 230px;margin-right: 260px;">
           </div>
            <div class = "menu_item"><a href = "<?php echo base_url('admin/home')?>"><i class="bi bi-house-fill"></i>&nbsp;&nbsp;Home</a></div>
        <div class = "menu_item"><a href = "<?php echo base_url('admin/product/add_product')?>"><i class="bi bi-house-fill"></i>&nbsp;&nbsp;Add Product</a></div>
        <div class = "menu_item"><a href = "<?php echo base_url('admin/product/total_stock_list')?>"><i class="bi bi-bank2"></i>&nbsp;&nbsp;Stock</a></div>
        <div class = "menu_item"><a href = "<?php echo base_url('admin/product/create_order')?>"><i class="bi bi-bag-plus-fill"></i>&nbsp;&nbsp;Order</a></div>
        <div class = "menu_item"><a href = "<?php echo base_url('admin/order/show_order_list')?>"><i class="bi bi-bank2"></i>&nbsp;&nbsp;Generate Bill</a></div>
        <div class = "menu_item"><a href = "<?php echo base_url('admin/order/bike_list')?>"><i class="bi bi-bank2"></i>&nbsp;&nbsp;Bike List</a></div>
        <div class = "menu_item"><a href = "<?php echo base_url('admin/order/show_monthly_bill')?>"><i class="bi bi-bank2"></i>&nbsp;&nbsp;Monthly Bill</a></div>
        
        <?php }else{?>
            <div class = "menu_item2">
            <img src="<?php echo base_url() ?>/assets/images/logo1.jpeg" alt="" style="height: 90px;width: 230px;margin-right: 260px;">
           </div>
            <div class = "menu_item"><a href = "<?php echo base_url('admin/home')?>"><i class="bi bi-house-fill"></i>&nbsp;&nbsp;Home</a></div>
        <div class = "menu_item"><a href = "<?php echo base_url('admin/product/add_product')?>"><i class="bi bi-house-fill"></i>&nbsp;&nbsp;Add Product</a></div>
        <div class = "menu_item"><a href = "<?php echo base_url('admin/product/total_stock_list')?>"><i class="bi bi-bank2"></i>&nbsp;&nbsp;Stock</a></div>
        <div class = "menu_item"><a href = "<?php echo base_url('admin/product/create_order')?>"><i class="bi bi-bag-plus-fill"></i>&nbsp;&nbsp;Order</a></div>
        <div class = "menu_item"><a href = "<?php echo base_url('admin/order/show_order_list')?>"><i class="bi bi-bank2"></i>&nbsp;&nbsp;Generate Bill</a></div>
        <div class = "menu_item"><a href = "<?php echo base_url('admin/order/bike_list')?>"><i class="bi bi-bank2"></i>&nbsp;&nbsp;Bike List</a></div>
        <div class = "menu_item"><a href = "<?php echo base_url('admin/order/bike_parts_list')?>"><i class="bi bi-bank2"></i>&nbsp;&nbsp;Bike Parts List</a></div>
        <?php }?>
        <!-- <div class = "menu_item"><a href = "#"><i class="bi bi-bank2"></i>&nbsp;&nbsp;Contact</a></div> -->
    </div><hr>
