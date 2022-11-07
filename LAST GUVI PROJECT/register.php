<?php 
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration from</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/register.css">
      
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

     <!--SUBMIT SCRIPT-->

    <script>
       <script>
       <?php 
$error_message = "";$success_message = "";

// Register user
if(isset($_POST['btnsignup'])){
   $fname = trim($_POST['fname']);
   $lname = trim($_POST['lname']);
   $email = trim($_POST['email']);
   $password = trim($_POST['password']);
   $confirmpassword = trim($_POST['confirmpassword']);

   $isValid = true;

   // Check fields are empty or not
   if($fname == '' || $lname == '' || $email == '' || $password == '' || $confirmpassword == ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }

   // Check if confirm password matching or not
   if($isValid && ($password != $confirmpassword) ){
     $isValid = false;
     $error_message = "Confirm password not matching";
   }

   // Check if Email-ID is valid or not
   if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $isValid = false;
     $error_message = "Invalid Email-ID.";
   }

   if($isValid){

     // Check if Email-ID already exists
     $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       $isValid = false;
       $error_message = "Email-ID is already existed.";
     }

   }

   // Insert records
   if($isValid){
     $insertSQL = "INSERT INTO users(fname,lname,email,password ) values(?,?,?,?)";
     $stmt = $con->prepare($insertSQL);
     $stmt->bind_param("ssss",$fname,$lname,$email,$password);
     $stmt->execute();
     $stmt->close();

     $success_message = "Account created successfully.";
   }
}
?>


</script>


    </script>
   
</head>
<body>

    <!--NAV BAR STARTS-->
    
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#"><span class="text-success"><i><b>GUVI</b></i></span><span class="text-danger"><i><b>Project</b></i></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>              
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="register.php">SignUp</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
              </li>
              <!--<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="getrecords_ajax.php">Fetch records</a>
              </li>-->
            </ul>            
          </div>
        </div>
      </nav><br><br>
    
    <!--NAV BAR ENDS-->

    <!--REG FORM STARTS-->

    <section class="h-100 h-custom">
      <div class="container py-5 h-100">
        <div class="shadow-lg p-3 mb-5 bg-body rounded">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3 bg-dark">
                <img src="reg image.jpg" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                alt="Sample photo">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Create an account</h3>
                  
                  <?php 
            // Display Error message
            if(!empty($error_message)){
            ?>
            <div class="alert alert-danger">
              <strong>Error!</strong> <?= $error_message ?>
            </div>

            <?php
            }
            ?>

            <?php 
            // Display Success message
            if(!empty($success_message)){
            ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?= $success_message ?>
            </div>

            <?php
            }
            ?>
                  
                  <form class="px-md-2" method="POST">
                    <div class="form-outline mb-4">
                      <label class="form-label" for="lname">First Name</label>
                      <input type="text" name="fname" id="lname" class="form-control" placeholder="First name" required>                           
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control" placeholder="Last name" required>                           
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" name="email" id="email" class="form-control" placeholder="email" required>                            
                    </div>
                                        
                    <div class="form-outline mb-4">
                      <label class="form-label" for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="password" required>                            
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="pwd">Confirm Password </label>
                      <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="confrim password" required>                            
                    </div>

                    <div class="d-flex justify-content-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" id="getusers" name="btnsignup">Register</button>
                    </div>

                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php" class="fw-bold text-body">
                      <u>Login here</u></a>
                    </p>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
                
      
 
    <!--REG FORM ENDS-->

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
      
</body>
</html>