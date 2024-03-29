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
        //read in db
        $query = "select * from users where username = '$username' limit 1";
        $result = mysqli_query($con,$query);

        if($result){
            if($result && mysqli_num_rows($result)>0)
        {
            $user_data = mysqli_fetch_assoc($result);
            if($user_data['password'] === $password)
            {

                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.html");
                die;
            }
            
        }
        }

        
        echo "Wrong Username or Password";
    }else {
        echo "Wrong Username or Password";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WePlan - Login</title>
    <link rel="stylesheet" href="login.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="auto-group-dp3d-s3m" id="V5BmbdL5ihDchoCRW4DP3d">Welcome!</div>
    <div class="container2">
        <h3>Login</h3>
        <form method="POST" id="signup-form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Minimum 8 letters" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn" value="signup">Login</button>
            </div>
        </form>
        <p class="login-link">Don't Have an account? <a href="signup.php">Sign in</a>.</p>
    </div>
    <script src="signup.js"></script>
</body>
</html>
