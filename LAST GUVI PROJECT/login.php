<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login from</title>
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="register.css">
    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function(){

                $("#but_submit").click(function(){
                    var email = $("#txt_uname").val().trim();
                    var password = $("#txt_pwd").val().trim();

                    if( email != "" && password != "" ){
                        $.ajax({
                            url:'checkUser.php',
                            type:'post',
                            data:{email:email,password:password},
                            success:function(response){
                                var msg = "";
                                if(response == 1){
                                  window.location = "index.php";
                                }else{
                                    msg = "Invalid email and password!";
                                }
                                $("#message").html(msg);
                            }
                        });
                    }
                });

            });
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
                <img src="log image.jpg" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                alt="Sample photo">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Login</h3>
                            
                  <form class="px-md-2" method="POST">
                                
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example4cg">Email</label>
                      <input type="email" name="txt_uname" id="txt_uname" class="form-control" placeholder="enter your email" required >                                               
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example4cg">Password</label>
                      <input type="password" name="txt_pwd" id="txt_pwd" class="form-control" placeholder="enter your password" required><br>
                    </div>

                    <div class="d-flex justify-content-center">
                      <button type="button" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="but_submit" id="but_submit">Login</button>
                    </div>

                                
                    <p class="text-center text-muted mt-5 mb-0">Don't have an account? <a href="register.php" class="fw-bold text-body">
                    <u>Register here</u></a></p>
                  </form>      
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
             
   

   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
      
</body>
</html>