<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>login page</title>
</head>
<body>
    <?php
    var_dump($_POST['first_name']);
        $data_form=array("first_name"=>"","last_name"=>"","email"=>"","password"=>"");
        $data_error=array("first_name"=>"","last_name"=>"","email"=>"","password"=>"");
    // if($_SERVER['REQUEST_METHOD']=='POST')
    // {
    //     if
    // }

    // ?>

    <form action="" method="POST">
        <div class="container">
        <div class="form-row">
            <div class="col">
            <label for="firstname">FirstName</label>
            <input type="text" name="first_name" class="form-control" placeholder="First name">
            </div>
            <div class="col">
            <label for="lastname">LastName</label>
            <input type="text" name="last_name" class="form-control" placeholder="Last name">
            </div>
        </div>


    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Password</label>
        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
        </div>
      </div>
</div>
  
    </form>
    
    <script src="bootstrap.min.js"></script>
    <script src="jquery.min.js"></script>
    
</body>
</html>






