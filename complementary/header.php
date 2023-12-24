<?php require_once "conn.php"; ?>
<?php
$courses = $conn->query("SELECT Distinct category FROM courses");
$courses->execute();
$coursesList = $courses->fetchAll(PDO::FETCH_ASSOC);
// get url of the current page 
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
else
    $url = "http://";
// Append the host(domain name, ip) to the URL.   
$url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL   
$url .= $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html>

<head>
    <title> Benha university | Online E-learning platform</title>
    <meta charset="utf-8">
    <meta name="keywords" content="E-learning">
    <meta name="description" content="E-learning platform">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!-- include library -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ephesis&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="page.css">
    <link rel="icon" href="images/uni_logo.png">
</head>

<body>
    <!-- header or nav bar -->
    <?php if ($url == 'http://localhost:8000/homepage.php') : ?>
        <nav class="header">
        <?php else : ?>
            <nav class="header-other">
            <?php endif; ?>
            <div class="container">
                <div class="header-content"> <!-- to fix the float problem-->
                    <div class="logo">
                        <a href="homepage.php">Benha university</a>
                        <!-- close logo div -->
                    </div>

                    <ul class="nav" id="nav">
                        <li><a href="homepage.php" class="active">Home</a></li>
                        <!-- <li><a href="#">About</a></li> -->
                        <li><a href="contact.php">Contact</a></li>
                        <li class="dropdown"><a href="#">Category</a>
                            <ul class="dropdown-menu">
                                <?php foreach ($coursesList as $cat) : ?>
                                    <li>
                                        <a href="categoryPage.php?category=<?php echo $cat['category']; ?>"><?php echo $cat["category"]; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        </li>
                        <!-- added when user creates an email -->
                        <?php if (isset($_SESSION['username'])) : ?>
                            <li class="dropdown"><a href="#"><?php echo $_SESSION['username']; ?></a>
                                <ul class="dropdown-menu">
                                    <li><a href="myCourses.php">My Courses</a></li>
                                    <!-- <li><a href="profile.php">Account Settings</a></li> -->
                                    <li><a href="logout.php">Log Out</a></li>
                                </ul>
                            </li>
                        <?php else : ?>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="registeration.php">Registration</a></li>
                        <?php endif; ?>
                    </ul>

                    <div class="clear"></div> <!-- to solve float problem-->
                    <!-- close header content  div -->

                </div>
                <!-- close container div -->

            </div>
            <!-- close header div -->
            </nav>
            <?php if ($url = 'http://localhost:8000/homepage.php') : ?>
                <script src="js/javaa.js"></script>
            <?php endif; ?>
</body>