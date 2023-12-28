<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <?php
    var_dump($_POST);
    if(isset($_POST['submit'])){
        // var_dump($_POST) ;
        // 1. Infomation get
        $username = $_POST['username'] ;
        $pswd = $_POST['pswd'] ;
        $email = $_POST['email'] ;
        // $pic = $_POST['pic'] ;
        $status = $_POST['status'] ;
        // $target_dir = "images/";
        $pic = $_FILES["pic"]["name"];
        $target_file = "images/".$_FILES["pic"]["name"];
      
          if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
            echo "The file ".$_FILES["pic"]["name"]. " สำเร็จ";
          } else {
            echo "Sorry ";
          }
    
        // 2. Database Connect
        $conn = mysqli_connect("localhost","root","123456","member") ;
        if(!$conn){ 
            echo "database not connect";
        }
        $sql = "INSERT INTO users values('','$username','$pswd','$email','$pic','$status')" ;
        $result = mysqli_query($conn, $sql) ;
        if($result) {
            echo "OK" ;
        } else {
            echo "Error insert" ;
        }
    }
    ?>

<div class="container mt-3">
  <h2>ลงทะเบียนสมาชิก</h2>
  <form action="register.php"  method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">

      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>

    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>

    <div class="mb-3 mt-3">
      <label for="username">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>

    <div class="mb-3 mt-3">
      <label for="username">Picture:</label>
      <input type="file" class="form-control" id="pic" placeholder="Enter picture" name="pic">
    </div>

    <div class="mb-3 mt-3">
      <label for="username">Status:</label>
      <input type="text" class="form-control" id="status" placeholder="Enter status" name="status">
    </div>

    <div class="form-check mb-3"> 
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>