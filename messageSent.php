<?php require_once("complementary/header.php");
if (!isset($_SESSION['send']) or !isset($_SESSION['username'])) {
    header('location:homepage.php');
}
unset($_SESSION['send']); ?>
<html>

<head>
    <meta http-equiv="refresh" content="5;url=contact.php">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5c5946fe44.js" crossorigin="anonymous"></script>
    <title>Pay Page</title>
</head>


<body>


    <div class="home">
        <div class="overlay">
            <div class="home-content">
                <h1 class="main-address">Message is Sent Successfully</h1>
            </div> <!-- close overlay div -->
        </div> <!-- close home div -->

</body>

</html>