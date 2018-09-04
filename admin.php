<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/boostrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel = "stylesheet" type = "text/css" href = "css/custom.css" />
    <link rel="stylesheet" href="css/font-awsome/css/all.css">
 </head>
</head>
<body style="background:url('img/bg-login.jpg');background-size:cover;">
<div class="wrapper">
  <div class="one" >
        <div class="from-group inputLogin">
        <div class="card">
            <div class="card-header">
                LOGIN
            </div>
            <div class="card-body login" >
            <?php
                $status=@$_GET['status'];
                if($status=='0'){
                    echo '<div class="alert alert-danger center">Username atau Password Tidak Ditemukan</div>';
                }
            ?>
                <form action="AdminLTE/login_admin.php" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-prepend" >
                        <span class="input-group-text" id="inputGroup-sizing-default">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <input type="text" id="username" name="username" class="form-control username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="username" required>
                </div>
                <div class="input-group mb-3" >
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                        <i class="fas fa-unlock"></i>
                        </span>
                    </div>
                    <input type="text" id="pswd" name="pswd" class="form-control pswd" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="username" required>
                </div>
                    <button type="submit" class="btn btn-primary form-control btn-login">Login <span>
                    <i class="fas fa-arrow-circle-right"></i>
                </form>
            </div>
        </div>
          <!-- <input type="text" class="form-control"placeholder="username">
          <input type="password"class="form-control" placeholder="Password"> -->
        </div>
  </div>
</div>
    
</body>
<script src=css/boostrap/js/bootstrap.min.js""></script>
<script src="css/font-awsome/js/all.js"></script>
</html>