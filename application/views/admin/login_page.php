<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/login.css">
        <title>Inventory Project</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;700;900&family=Roboto:wght@100&display=swap" rel="stylesheet"> 
        <style>
            .button{
                margin-right: 243px;
            }
        </style>    
    </head>
    <body>
     <div class="container" style="margin-bottom: 149px;">
      <div class="col-sm-4" style="margin-left: 384px;">
            <h1 style = "padding-bottom: 26px";>Sign In Form</h1>
            <?php if($msg = $this->session->flashdata('invailid_up')){?>
                <div class="loginMsg">
                    <p><?php echo $msg?></p>
                </div>
                <?php } ?>
                <?php echo form_open('login/user_login'); ?>
                <div class= "row">
                    <div class="form-group">
                        <label for="uname" style="margin-right: 344px;">Username</label>
                        <?php echo form_input(['class' => "form-control", 'id'=>'uname' ,'placeholder' => 'Enter username', 'name' => 'username','value' => set_value('username'),'autocomplete'=>"on"]); ?>
                    </div>
                    <div class="">
                        <?php echo form_error('username'); ?>
                    </div>
                </div>
                <div class= "row">
                    <div class="form-group">
                        <label for="pass" style="margin-right: 344px;">Password</label>
                        <?php echo form_password(['class' => 'form-control', 'id'=>'pass' , 'placeholder' => 'Enter Password', 'name' => 'password', 'value' => set_value('password')]); ?>
                    <div class="">
                        <?php echo form_error('password'); ?>
                    </div>
                </div>
                <?php echo form_submit(['class' => 'btn btn-primary button', 'value' => 'Submit']); ?>
                <?php echo form_reset(['class' => 'btn btn-default', 'value' => 'Reset']); ?>
            </div>
    </div>
    </div>
    </body>

</html>