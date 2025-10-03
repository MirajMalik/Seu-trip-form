<?php
    $insert = false;

    if(isset($_POST['name'])){

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "trip";

    $conn = mysqli_connect($server,$username,$password,$database);

    if(!$conn){
        die("connection failed to this database due to ". mysqli_connect_error());
    }

    // echo "successfully connected to DB";

    $name  = $_POST['name'];
    $batch = $_POST['batch'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` (`name`,`batch`,`email`,`phone`,`other`,`dt`) VALUES ('$name','$batch','$email','$phone','$desc',current_timestamp());";

    // echo $sql;

    if($conn->query($sql)==true){
        // echo "successfully inserted";
        $insert = true;
    }

    else{
        echo "Error : $sql <br> $conn->error";
    }

    $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cox Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="campus.jfif" alt="Southeast" srcset="">
    <div class="container">
        <h3>Welcome to SEU Cox trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        
        <?php

            if($insert == true){
                echo "<p class = 'submitMsg'>Thanks for submitting your form.We are happy to see you joining us for the Cox trip</p>";
            }

        ?>

        <div class="input-items">

            <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your name" required>
                <input type="text" name="batch" id="batch" placeholder="Enter your batch" required>
                <input type="email" name="email" id="email" placeholder="Enter your university email" required>
                <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required>
                <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any suggestion regarding this trip"></textarea>

                <div class="button">
                    <button type="submit" class="btn">Submit</button>
                    <button type="reset" class="btn">Reset</button>
                </div>
            </form>

        </div>

        



    <script src="index.js"></script>
    </div>
</body>
</html>