<?php include_once("adminComp/header.php"); ?>
<?php
$error = "";
if (isset($_SESSION["adminUserName"])) {
    header("location:adminHome.php");
    exit();
}
if (isset($_POST["submit"])) {
    if (empty($_POST["email"]) or empty($_POST["password"])) {
        $error =  "Please fill all the inputs";
    } else {
        $email = $_POST["email"];
        $user_password = $_POST["password"];
        $login = $conn->query("SELECT * FROM admins WHERE email='$email'");
        $login->execute();
        $data = $login->fetch(PDO::FETCH_ASSOC);
        if ($login->rowCount() > 0) {
            if (password_verify($user_password, $data["password"])) {
                $_SESSION['adminRole'] = $data['role'];
                $_SESSION["adminId"] = $data["id"];
                $_SESSION['adminUserName'] =  $data['username'];
                header('location:adminHome.php');
                exit();
            } else {
                $error =  "Email or Password is wrong";
            }
        } else {
            $error =  "Email or Password is wrong";
        }
    }
}
?>
<body>
    <div class="card">
        <h1 style="text-align: center; ">Admin Login</h1>
        <form action="adminLogin.php" method="post" class="form-f">
            <input id="username" class="login-input bord" name="email" type="email" placeholder="Enter your email">
            <input id="password" class="login-input bord" name="password" type="password" placeholder="Enter a password">
            <input class="login-input send" type="submit" value="LOGIN" name="submit">
            <?php if(!empty($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif;?>
        </form>
    </div>
</body>
<?php include_once("adminComp/footer.php");
