<?php include_once("adminComp/header.php"); ?>
<?php
if ($_SESSION['role'] != 0 or !isset($_SESSION['adminId'])) {
    header("location:adminHome.php");
    exit();
}
$error = "";
$err_username = "";
$err_pass =  "";
$err_email = "";
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirmPassword'])) {
        $error = 'Please Fill All The Inputs';
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $username_verification = preg_match('/[^a-zA-Z]/', $username);
        $length = strlen($password);
        $upper = preg_match('/[A-Z]/', $password);
        $lower = preg_match('/[a-z]/', $password);
        $specialCharacters = preg_match('/[^A-Za-z0-9]/', $password);
        if ($username_verification) {
            $err_username = 'Please Write The UserName In Correct form ';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err_email =  "Email is not a valid";
        }
        if (!$upper or !$lower or !$specialCharacters) {

            $err_pass = 'Write The Password correctly';
        } else if ($length < 8)
            $err_pass =  "Password must be more than 8 letters ";
        if ($password != $confirmPassword) {
            $error_pass = "Password doesn't match";
        }
        if (empty($err_pass) and  empty($err_email) and empty($err_username) and empty($error)) {
            $email_verify = $conn->query("SELECT * FROM admins WHERE email = '$email' ");
            $email_verify->execute();
            if ($email_verify->rowCount() > 0) {
                $error = "Email is Already Registered";
            } else {
                $inserted = $conn->prepare("INSERT INTO admins (username,email,password) VALUES (:username,:email,:password)");
                $inserted->execute(
                    [
                        ":username" => $username,
                        ":email" => $email,
                        ":password" => password_hash($password, PASSWORD_DEFAULT)
                    ]
                );
                $admin_id = $conn->lastInsertId();
                $_SESSION['adminRole'] = $data['role'];
                $_SESSION['adminId'] = $admin_id;
                $_SESSION['adminUserName'] = $username;
                header('location:adminHome.php');
                exit();
            }
        }
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Page</title>
</head>

<body>
    <div class=" card">
        <h1 class="heading1" style="text-align: center; ">Register</h1>
        <form action="adminRegister.php" method="post" class="form-f">
            <!-- <label for="username">UserName</label> -->
            <input class="login-input bord" name="username" type="text" placeholder="Enter a username">
            <?php if (!empty($err_username)) : ?>
                <div class="alert alert-danger"> <?php echo $err_username; ?></div>
            <?php endif; ?>
            <input class="login-input bord" name="email" type="email" placeholder="Enter a email">
            <?php if (!empty($err_email)) : ?>
                <div class="alert alert-danger"> <?php echo $err_email; ?></div>
            <?php endif; ?>
            <input class="login-input bord" name="password" type="password" placeholder="Enter a password">
            <input class="login-input bord" name="confirmPassword" type="password" placeholder="Enter Confirmation password">
            <?php if(!empty($err_pass)): ?>
            <div class="alert alert-danger"> <?php echo $err_pass; ?></div>
            <?php endif ;?>
            <input class="login-input send" name="submit" type="submit" value="Register">
            <?php if(!empty($error)): ?>
            <div class="alert alert-danger"> <?php echo $error; ?></div>
            <?php endif ;?>
        </form>
    </div>
    <?php include_once("adminComp/footer.php"); ?>
</body>

</html>