<?php include("include/config.php"); ?>
<?php
if (isset($_SESSION['useradmin'])) { echo '<script>window.location ="dashboard.php";</script>'; }


if(isset($_POST['submit'])) 
{
$myusername=mysqli_real_escape_string($db,$_POST['username']); 
$mypassword=mysqli_real_escape_string($db,$_POST['password']); 

$sql="SELECT * FROM admins WHERE admin_email='$myusername' and admin_pass='$mypassword'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);
if($count==1)
{
$_SESSION['useradmin']=$myusername;
$_SESSION['admin_id'] = $row['admin_id'];
$_SESSION['admin_name'] = $row['admin_name'];

	echo '<script>window.location ="dashboard.php";</script>';
}
else 
{
	$error="Invalid Username or Password";
}
}
?>
  
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
    <title>  Nishant | login</title>
    <link rel="shortcut icon" href="assests/img/157x259.png" />
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="bg-img">
         <div class="content">
             
             <img src="assets/images/avatars/admin.jpg" alt="" class="img-fluid2" />
            <header>Nishant</header>
            <p style="color:red;"></p>
            <form action="#" method="POST">
               <div class="field">
                  <span class="fa fa-user"></span>
                  <input type="text" name="username" required placeholder="Email">
               </div>
               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="password" name="password" class="pass-key" required placeholder="Password">
                  <span class="show">SHOW</span>
               </div>
               <div class="pass">
                  <!--<a href="#">Forgot Password?</a>-->
               </div>
               <div class="field">
                  <input type="submit" name="submit" value="LOGIN">
               </div>
            </form>
          
            <!--<div class="signup">-->
            <!--   Don't have account?-->
            <!--   <a href="#">Signup Now</a>-->
            <!--</div>-->
          </div> 
      </div>
    
      <script>
         const pass_field = document.querySelector('.pass-key');
         const showBtn = document.querySelector('.show');
         showBtn.addEventListener('click', function(){
          if(pass_field.type === "password"){
            pass_field.type = "text";
            showBtn.textContent = "HIDE";
            showBtn.style.color = "#3498db";
          }else{
            pass_field.type = "password";
            showBtn.textContent = "SHOW";
            showBtn.style.color = "#222";
          }
         });
      </script>
   </body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Poppins:400,500&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  user-select: none;
}

  .img-fluid2 { 
       max-width: 44%; 
       height: 135px; 
        background: white; 
        border-radius: 50%; 
         margin: auto;
       border: 0.3rem solid blueviolet; 
      object-fit:cover importent; 
    }
.bg-img{
  background: rgba(0,0,0,0.7);
  height: 100vh;
  background-size: cover;
  background-position: center;
}
.bg-img:after{
  position: absolute;
  content: '';
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(0,0,0,0.7);
}
.content{
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: 999;
  text-align: center;
  padding: 60px 32px;
  width: 370px;
  transform: translate(-50%,-50%);
  background: rgba(255,255,255,0.04);
   background: wheat;
  box-shadow: -1px 4px 28px 0px rgba(0,0,0,0.75);
}
.content header{
  color: black;
  font-size: 18px;
  font-weight: 500;
  margin: 0 0 35px 0;
  font-family: 'Montserrat',sans-serif;
}
.field{
  position: relative;
  height: 45px;
  width: 100%;
  display: flex;
  background: rgba(255,255,255,0.94);
}
.field span{
  color: #222;
  width: 40px;
  line-height: 45px;
}
.field input{
  height: 100%;
  width: 100%;
  background: transparent;
  border: none;
  outline: none;
  color: #222;
  font-size: 16px;
  font-family: 'Poppins',sans-serif;
}
.space{
  margin-top: 16px;
}
.show{
  position: absolute;
  right: 13px;
  font-size: 13px;
  font-weight: 700;
  color: #222;
  display: none;
  cursor: pointer;
  font-family: 'Montserrat',sans-serif;
}
.pass-key:valid ~ .show{
  display: block;
}
.pass{
  text-align: left;
  margin: 10px 0;
}
.pass a{
  color: white;
  text-decoration: none;
  font-family: 'Poppins',sans-serif;
}
.pass:hover a{
  text-decoration: underline;
}
.field input[type="submit"]{
  background: #4d3f2c;
  border: 1px solid #4d3f2c;
  color: white;
  font-size: 18px;
  letter-spacing: 1px;
  font-weight: 600;
  cursor: pointer;
  font-family: 'Montserrat',sans-serif;
}
.field input[type="submit"]:hover{
  background: #2691d9;
}
.login{
  color: #540adf;
  margin: 20px 0;
  font-family: 'Poppins',sans-serif;
}
.links{
  display: flex;
  cursor: pointer;
  color: white;
  margin: 0 0 20px 0;
}
.facebook,.instagram{
  width: 100%;
  height: 45px;
  line-height: 45px;
  margin-left: 10px;
}
.facebook{
  margin-left: 0;
  background: #4267B2;
  border: 1px solid #3e61a8;
}
.instagram{
  background: #E1306C;
  border: 1px solid #df2060;
}
.facebook:hover{
  background: #3e61a8;
}
.instagram:hover{
  background: #df2060;
}
.links i{
  font-size: 17px;
}
i span{
  margin-left: 8px;
  font-weight: 500;
  letter-spacing: 1px;
  font-size: 16px;
  font-family: 'Poppins',sans-serif;
}
.signup{
  font-size: 15px;
  color: white;
  font-family: 'Poppins',sans-serif;
}
.signup a{
  color: #3498db;
  text-decoration: none;
}
.signup a:hover{
  text-decoration: underline;
}
</style>
  




