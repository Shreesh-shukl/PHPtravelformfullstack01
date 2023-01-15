<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "root";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this address failed due to" . mysqli_connect_error());
    }
    // echo "Success connectng";
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
  

    $sql = "insert into `php`.`trip` (`name`, `age`, `gender`, `phone`, `email`, `other`, `dt`) values('$name','$age','$gender','$phone','$email','$desc', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully Inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans+Semi+Condensed:wght@100&display=swap"
        rel="stylesheet">
</head>
<style></style>

<body>
    <img src="gr.jpg." alt="Must Travel" class="bg">
    <div class="container">
        <h1>Welcome to Our Travel Form</h1>
        <p>Enter your details and submit this form to confirm your trip</p>
        <p class="sub">Thanks for submitting your form, happy to share this trip.</p>
        <?php
        if($insert == true){
            echo "<p class = 'submitMsg'>Thnx for submitting our form.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name"><br>
            <input type="text" name="age" id="age" placeholder="Enter your age"><br>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender"><br>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number"><br>
            <input type="email" name="email" id="email" placeholder="Enter your email"><br>
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter any other information here."></textarea><br>
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>


        </form>
    </div>
    <script src="index.js"></script>
</body>

</html>