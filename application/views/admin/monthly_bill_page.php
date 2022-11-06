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
    <h2>Print or Generate Monthly Inventory Bill</h2>
    <?php if($msg = $this->session->flashdata('success')){?>
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
"><?php echo $msg?></p>
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
      </tr>
    </thead>
    <tbody>
        <?php if(!empty($monthly_bill)) { $id = 0; $total_price = 0;?>
        <?php foreach($monthly_bill as $monthly_bil) { $id++ ?>
      <tr>
        <td><?php  echo $id ?></td>
        <td><?php echo $monthly_bil['fld_product_name']?></td>
        <td><?php echo $monthly_bil['fld_product_qty']?></td>
        <td><?php echo $monthly_bil['fld_product_price']?></td>
        <td><?php echo $monthly_bil['fld_sub_total']?></td>
        <?php $total_price = $total_price + $monthly_bil['fld_sub_total'];  $margin = $total_price*(15/100);  $total_mrgin = $total_price-$margin; $profit = $total_price-$total_mrgin;} 
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

    echo '<div class = "admin_margin">
    <p style="
    position: absolute;
    margin-left: 387px;
    margin-top: 19px;
    font-size: 19px;
    height: 35px;
    widh: 20px;
    width: 232px;
    background-color: black;
    color: white;
    padding-top: 4px;
    padding-left: 7px;
    border-radius: 5px;
">Admin Margin : Rs.'.$total_mrgin.'</p>
   </div>'; 

   echo '<div class = "admin_margin">
    <p style="
    position: absolute;
    margin-left: 670px;
    margin-top: 19px;
    font-size: 19px;
    height: 35px;
    widh: 20px;
    width: 232px;
    background-color: black;
    color: white;
    padding-top: 4px;
    padding-left: 7px;
    border-radius: 5px;
">Admin Profit : Rs.'.$profit.'</p>
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
         if(confirm("Do You Want to Print This Page")){
           window.print();
         }
      })
});
</script>

</body>
</html>
