<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/bootstrap.js"></script>
    <title>Register users</title>
</head>
<body >
    <div class="container my-5">
    <div class="row justify-content-center " id="sign_in">
    
    <div class="col-lg-4">
    
    <div class="card-header bg-info text-center">
        <h4>PLEASE SIGNUP HERE</h4>
     </div>
     <!--validate user inputs-->
     <?php
     use Defuse\Crypto\Crypto;
     use  Defuse\Crypto\Key;
    function  validate()
    {   
        require "vendor/autoload.php";
        $firstname=$_POST['firstname'];
        $surname=$_POST['surname'];
        $passkey=$_POST['password'];
        $confirmed_password=$_POST['confirmed_password'];
        //encrypting the data
        require "vendor/autoload.php";
        $password="my";
        $encryped_fname=Crypto::encryptWithPassword($firstname,$password);
        $encryped_sname=Crypto::encryptWithPassword($surname,$password);
        $encryped_passkey=Crypto::encryptWithPassword($passkey,$password);
        require("connect.php");
    if($passkey == $confirmed_password)
        {
            if(strlen($passkey) <6 )
            {
               echo "use a six keys or more keys password";
            }
            else{
            $insert_qwery="insert into users(firstname,surname,password) values ('$encryped_fname','$encryped_sname','$encryped_passkey')";
        $committed_qwery=mysqli_query($connection,$insert_qwery);
        if($committed_qwery)
        {
            echo "Rgistrattion successful";
        }
        else
        {
            echo "Failed to insert"; 
        }
        }
    }
    else
        {
            echo "THE TWO PASSWORDS DIDNOT MATCH";
        }
    }
        
        
    
    
   if(isset($_POST['sign']))
   {
       validate();
   }


  
    ?>
    <div class="card">
    <div class="card-body">
    <form  method="post">
    <input type="text" class="form-control text-center my-3" placeholder="FIRST NAME" required name="firstname">
    <input type="text" class="form-control text-center my-3" placeholder="SURNAME  " required name="surname">
    <input type="password" class="form-control text-center my-3" placeholder="ENTER PASSWORD " required name="password">
    <input type="password" class="form-control text-center my-3" placeholder="CONFIRM PASSWORD" required  name="confirmed_password">
    <div class="row justify-content-center">
    <input type="submit"  class="btn btn-lg btn-info px-5" name="sign" value="SIGN UP">
    </div>
    </form>
    
    
    </div>
    
    </div>
    
    </div>
    </div>
    
    
    </div>
    <div class="row justify-content-center my-5">
        <div class="col-lg-2">
            <a href="decrypt.php"><button class="btn-outline-primary btn-lg">VIEW DECRYPED DATA</button></a>
        </div>
    </div>
</body>
</html>