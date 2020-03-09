<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/bootstrap.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="row justify-content-center">
    <div class="col-5">
    <table class="table table-unbordered">
    
    <tr class="bg-info">
    <thead id="text"> <b>THE FOLLOWING PEOPLE REGISTRED </b></thead>
    <th>FIRST NAME</th>
    <th>SURNAME</th>
    </tr>
    <?php
        use Defuse\Crypto\Crypto;
        use  Defuse\Crypto\Key;
        require "vendor/autoload.php";
        require("connect.php");
        $fetch_qwery = "select * from users";
        $results=mysqli_query($connection,$fetch_qwery);

while($row = mysqli_fetch_assoc($results))
   
    {  
        $password="my";
        $fname=$row['firstname'];
        $surname=$row['surname'];
        $dencryped_fname=Crypto::decryptWithPassword($fname,$password);
        $dencryped_sname=Crypto::decryptWithPassword($surname,$password);
         ?>
        <tr>
        <td> <?php  echo  $dencryped_fname ?></td>
        <td> <?php  echo  $dencryped_sname ?> </td>
        
        </tr>


    <?php
    }
    ?>
    
    </table>
    
    </div>
    
    </div>
</body>
</html>