
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

<body class="gray-bg">
<div class="middle-box text-center animated fadeInDown">
    <div class="panel" >
        <div class="panel-heading red-bg">
            <div>
                <h2 class="logo-name text-white">SIMA</h2>
            </div>
            <div class=" m-t-n text-white">
            <h4>Sistem Informasi Management Audit</h4>
            </div>
        </div>
        <div class="panel-body">

            <form method="post" action="<?php echo base_url() ?>login/login">
            <?php 
            foreach($tampil as $e):
                $ip = $e['ip'];
                $ip2 = 'IPADDRESS';
                $iv_key = 'honda12345';
                $encrypt_method = "AES-256-CBC";
                $key = hash('sha256',$ip2);
                $iv = substr(hash('sha256', $iv_key), 0, 16);
                $ip = base64_decode($ip);
                $ip = openssl_decrypt($ip, $encrypt_method, $key, 0, $iv); 
                  
                $username = $e['username'];
                $username2 = 'USERNAME';
                $iv_key = 'honda12345';
                $encrypt_method = "AES-256-CBC";
                $key = hash('sha256',$username2);
                $iv = substr(hash('sha256', $iv_key), 0, 16);
                $username = base64_decode($username);
                $username = openssl_decrypt($username, $encrypt_method, $key, 0, $iv);   
    
                $password = $e['password'];
                $password2 = 'PASSWORD';
                $iv_key = 'honda12345';
                $encrypt_method = "AES-256-CBC";
                $key = hash('sha256',$password2);
                $iv = substr(hash('sha256', $iv_key), 0, 16);
                $password = base64_decode($password);
                $password = openssl_decrypt($password, $encrypt_method, $key, 0, $iv);    
    
                $database = $e['db'];
                $database2 = 'DATABASE';
                $iv_key = 'honda12345';
                $encrypt_method = "AES-256-CBC";
                $key = hash('sha256',$database2);
                $iv = substr(hash('sha256', $iv_key), 0, 16);
                $database = base64_decode($database);
                $database = openssl_decrypt($database, $encrypt_method, $key, 0, $iv);    
                ?>
                
                
    
                <div class="form-group">
                <label>Hostname</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $e['id'] ?>" readonly>
                <input type="text" class="form-control" id="ip" name="ip" value="<?php echo $ip ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username ?>"  readonly>
                </div>
    
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>"  readonly>
                </div>
                
                <div class="form-group">
                    <label>Database</label>
                    <input type="text" class="form-control" id="db" name="db" value="<?php echo $database ?>"  readonly>
                </div>
                <?php endforeach; ?>
                <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success btn-block center m-t-n-xs">Set</button><br>
                </div>
                <div class="col-sm-12">
                    <a onclick="show()" class="btn btn-danger btn-block center m-t-n-xs">Update</a>
                </div>
                </div>
            </form>
        </div>
            

        </div>
    </div>

    

    <!-- Mainly scripts -->
    <script src="<?php echo base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script>
    function show() {
        $('#ip').removeAttr('readonly');
        $('#username').removeAttr('readonly');
        $('#password').removeAttr('readonly');
        $('#db').removeAttr('readonly');
    }
    </script>

</body>

</html>