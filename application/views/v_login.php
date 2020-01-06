
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo SITE_NAME ?> | <?php echo $judul ?></title>

    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="red-bg">


<div class="middle-box text-center animated fadeInDown">
        <div>
            <div>
                <h2 class="logo-name">SIMA</h2>
            </div>
            <div class="label-danger">
            <h3>Sistem Management Audit</h3>
            </div>
            
            <form method="post" action="<?php echo base_url() ?>login/login">
            <div class="input-group m-b">
                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span> 
                <input type="text" placeholder="Username" class="form-control" name="username">
            </div>

            <div class="input-group m-b">
                <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span> 
                <input type="password" placeholder="Password" class="form-control" name="password">
            </div>
                <button type="submit" class="btn btn-default full-width center sm-b">Login</button>

            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

</body>

</html>
