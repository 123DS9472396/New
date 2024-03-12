<?php
session_start();
include("database_connection.php");
    include("connections.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            //save in d
            $user_id = random_num(20);
            $sql = "INSERT INTO `users`(`user_id`, `username`, `password`) VALUES ('$user_id','$username','$password')";
            $result = mysqli_query($conn,$sql);

            // header("Location: login.php");
            // die;
        }else {
            echo "Enter correct Info";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WePlan - Signup</title>
    <link rel="stylesheet" href="signup.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="auto-group-dp3d-s3m" id="V5BmbdL5ihDchoCRW4DP3d">Welcome!</div>
    <div class="container2">
        <h3>Create a new account</h3>
        <form method="POST" id="signup-form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="E-mail" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Minimum 8 letters" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Your Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Enter the Same Password as above" required>
                <span id="passwordError" style="color: red;"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn" value="signup">Create</button>
            </div>
        </form>
        <p class="login-link">Already Have an account? <a href="login.php">Log in</a>.</p>
    </div>
    <script src="signup.js"></script>
</body>
</html>
