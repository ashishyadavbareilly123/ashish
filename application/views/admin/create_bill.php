<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/create_bill.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;700;900&family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>
<body>
<div class="header">
<div class="heading" style="display: flex;justify-content: left;">
<img src="<?php echo base_url()?>/assets/images/logo1.jpeg" alt="" style="height: 102px;margin-top: 26px;
">
<p style="margin-left: 163px;height: 40px;margin-top: 53px;font-size: 31px;font-weight: bold;
">Print or Generate Inventory Bill</p>
</div>
    <div class = "details" style="height: 150px;background-color: antiquewhite;padding-top: 2px;margin-top:20px;">
    <div class="contact" style="margin-left: -951px;">
      <h3>J.M.D Automobile</h3>
      <p style="margin-left: 149px;">Sareya ward No.13,Near Oriented Bank of Commerse</p>
      <p style="margin-left: 15px;">Banjari Road,Gopalganj-841428</p>
      <p style="margin-left: 46px;">Email: jmdautomobile.co@gmail.com</p>
      </div>
      <div class="number" style="margin-left: 592px;margin-top: -125px;">
        <p><b>BILL No:- </b><?php
            echo 'BL'.$bill_number[0]['fld_bill_no'];
         ?>
         </p>
         <p style="margin-left: 70px;"><b>GST NO :- </b>10KPKPK7621Q1ZB</p>
         <p style="margin-left: -4px;"><b>DATE :- </b><?php echo date("d/m/Y")?></p>
      </div>
    </div>
    <?php if($msg = $this->session->flashdata('success')){?>
                <div>
                    <p style="
    height: 43px;
    width: 640px;
    background-color: green;
    color: white;
    margin-left: 342px;
    text-align: center;
    padding-top: 8px;
    font-size: 20px;
    margin-top: 70px;
"><?php echo $msg?></p>
                </div>
    <?php } ?>

    <?php if($msg2 = $this->session->flashdata('cheses')){?>
                <div>
                    <p style="
    height: 43px;
    width: 457px;
    background-color: green;
    color: white;
    margin-left: 443px;
    text-align: center;
    padding-top: 8px;
    font-size: 20px;
    margin-top: 70px;
"><?php echo $msg2?></p>
                </div>
    <?php } ?>


</div>
<div class="container">
  <table class="table table-hover mt-4" style="
    margin-top: 32px;
">
    <thead>
      <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Product Qty</th>
        <th>Product Price</th>
        <th>Sub Total</th>
        <th>Delete</th>
        <th>Chasis No</th>
        <th>Insurence Expiry Date</th>
        <th>Moter S.No</th>
        <th>Charger S.No</th>
        <th>Battery S.No</th>
      </tr>
    </thead>
    <tbody>
        <?php if(!empty($order_lists)) { $id = 0; $total_price = 0;?>
        <?php foreach($order_lists as $list) { if($list['fld_type'] == 'product'){$id++ ?>
      <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $list['fld_product_name']?></td>
        <td><?php echo $list['fld_product_qty']?></td>
        <td><?php echo $list['fld_product_price']?></td>
        <td><?php echo $list['fld_sub_total']?></td>
        <td><button class = "btn btn-danger delete-btn" data-ids = "<?php echo $list['fld_product_id']?>" data-id = "<?php echo $list['fld_order_id']?>">Delete<button></td>
        <td>
          <input type="text" class = "form-control" id = "cheses_no" style="width: 118px;" name = "chases" required>
          <input type="text" class = "form-control" id = "battery_no" style="width: 94px;position: absolute;margin-left: 302px;margin-top: -35px;" name = "battery" required>
          <input type="text" class = "form-control" id = "charger_no" style="width: 94px;position: absolute;margin-left: 402px;margin-top: -35px;" name = "charger"  required>
          <input type="text" class = "form-control" id = "moter_no" style="width: 94px;position: absolute;margin-left: 503px;margin-top: -35px;" name = "moter" required>
          <!-- <input type="text" class = "form-control" id = "battery" style="width: 118px;" name = "chases" required> --> 
          <input type="hidden" name = "order_id" id = "order_ids" value = "<?php echo $list['fld_order_id']?>">
        </td>
        <td><input type="date" id="expiry"  class = "form-control" name = "expiry_date" style="margin-left: 1px;width: 141px;"></td>
        <?php $total_price = $total_price + $list['fld_sub_total'];
        
        }else{
          $id++ ?>
      <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $list['fld_product_name']?></td>
        <td><?php echo $list['fld_product_qty']?></td>
        <td><?php echo $list['fld_product_price']?></td>
        <td><?php echo $list['fld_sub_total']?></td>
        <td><button class = "btn btn-danger delete-btn"  data-ids = "<?php echo $list['fld_product_id']?>" data-id = "<?php echo $list['fld_order_id']?>">Delete<button></td>
        <?php $total_price = $total_price + $list['fld_sub_total'];
        }
      } 
        // data-id attibute ke sath ajax me click button ko likhen a tarika niche

    echo '<div class = "totalAmount">
     <p style = "height: 36px;
     width: 224px;
     background-color: black;
     color: white;
     padding: 5px;
     font-size: 19px;
     position: absolute;
     margin-left: 115px;
     margin-top: 18px;
     border-radius: 5px;">Total Amount : Rs.'.$total_price.'</p>
    </div>'; 

      echo '<div><button id = "btnClick"  class = "btn btn-primary printbtn">Print</button></div>';

      } else {?>
      </tr>
    </tbody>
  </table>
  <h1 style = "text-align:center">Data not available</h1>
        <?php } ?>
  </div>

  <script type = "text/javascript">
    $(document).ready(function(){
      $('#btnClick').click(function(){
         var cheses = $('#cheses_no').val();
         var charger = $('#charger_no').val();
         var battery = $('#battery_no').val();
         var moter = $('#moter_no').val();
         var order_id = $('#order_ids').val();
         var expiry_date = $('#expiry').val();
         if(cheses == '' && expiry_date == ''){
            alert('Please Fill Cheses Number and expiry insurence date');
         }else{
           if(confirm("Do You Want to Print This Page")){
             window.print();
             $.ajax({
                    type : 'POST',
                    url : "<?php echo base_url() ?>"+"admin/order/update_status",
                    datatype : 'json',
                    data : { id : '1',cheses : cheses,charger : charger,battery : battery,moter : moter,order_id : order_id,expiry_date : expiry_date},
                    success : function(result){
                       if(result){
                        location.reload(true);
                       }
                    }
                 })
           }
         }
         
      })

      $(document).on("click",".delete-btn", function(){
         var order_id = $(this).data("id");
         var product_id = $(this).data("ids");
         
          if(confirm("Do You Want to remove This Product from list")){
          
           $.ajax({
                  type : 'POST',
                  url : "<?php echo base_url() ?>"+"admin/order/delete_product",
                  datatype : 'json',
                  data : { o_id : order_id,product_id : product_id },
                  success : function(result){
                     if(result){
                      // console.log(result);
                      location.reload(true);
                     }
                  }
               })
         }
      })
});
</script>

</body>
</html>
