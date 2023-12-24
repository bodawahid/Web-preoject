<?php include_once("complementary/header.php"); ?>

<?php
if (isset($_GET['category'])) {
    $category = $_GET["category"];
    $cat = $conn->query("SELECT * FROM courses WHERE category ='" . $_GET["category"] . "'");
    $cat->execute();
}
else { 
    $cat = $conn->query("SELECT * FROM courses") ;
    $cat->execute() ;
}
$categoryCourses = $cat->fetchAll(PDO::FETCH_ASSOC);
$courses = $conn->query("SELECT DISTINCT category FROM courses");
$courses->execute();
$coursesList = $courses->fetchAll(PDO::FETCH_ASSOC);
?>
<html>

<head>
    <style>
        .containerDiv {
            left: 100px;
            top: 150px;
            width: 90%;
            margin: auto;
            /* will be in the middle of the webpage*/
        }

        .sidenav {
            height: 20%;
            width: 10%;
            position: fixed;
            /* z-index: 1; */
            top: 0;
            left: 0;
            background-color: grey;
            overflow-x: hidden;
            padding-top: 20px;
            margin-top: 4%;
        }

        .sidenav a:hover {
            color: black;
        }

        /* /The navigation menu links / */

        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: whitesmoke;
            display: block;
        }

        .about-content {

            overflow-x: scroll;
        }
    </style>
</head>

<body>
    <div class="sidenav">
        <ul>
            <li>
            <a href="categoryPage.php">All Courses</a>
            </li>
            <?php foreach ($coursesList as $key) : ?>
                <li>
                    <a href="categoryPage.php?category=<?php echo $key['category']; ?>"><?php echo $key["category"]; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="container-cat">
        <?php foreach ($categoryCourses as $course) : ?>
            <div class="">
                <a href="course_content.php?id=<?php echo $course['id']; ?>">
                    <div class="about-item ltr-effect">
                        <img src="images/<?php echo $course['image']; ?>" class="about-img-item" alt="">
                        <h3 class="about-item-title mg-d"><?php echo $course['name_of_course']; ?></h3>
                        <p class="about-item-description mg-d"><?php echo 'price : $' . $course['price']; ?></p>
                        <!-- <a href="#" class="-item-link">Purchase Course</a> -->
                        <p>Purchase now</p>
                    </div>
                </a>
            </div><!--close about-item div-->
        <?php endforeach; ?>
        <div class="clear"></div>
    </div><!--close about-content div-->
</body>

</html>


<?php include_once("complementary/footer.php"); ?>