<?php
// require_once("conn.php");
require_once("complementary/header.php");
$id = $_SESSION['user_id'];
$insert = $conn->query("select * from booking where user_id = '$id'");
$insert->execute();
if (!isset($_SESSION["username"]) or $insert->rowCount() <= 0) {
    header("location:homepage.php");
}

$paidCourses = $conn->query("SELECT courses.id as id , courses.category as category , name_of_course  as Name ,  details  ,  image FROM booking join courses on courses.id = booking.course_id where booking.user_id ='" . $_SESSION["user_id"] . "'");
$paidCourses->execute();
$paidCoursesList = $paidCourses->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <h2>My Learning</h2>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet"href="page.css"> -->
    <style>
        a:link , a:visited  {
            color:brown ; 
        }
    </style>
</head>

<body>
    <div class="container-cat">
        <?php foreach ($paidCoursesList as $data) : ?>
            <a href="video.php?id=<?php echo $data['id']?>&number=1">
                <div class="about-item ltr-effect box-shadow">
                    <img src="images/<?php echo $data['image']; ?>" class="about-img-item" alt="">
                    <h3 class="about-item-title mg-d">
                        <?php echo $data['Name']; ?>
                    </h3>
                    <p class="about-item-description mg-d">
                        <?php echo 'price : $' . $data['category']; ?>
                    </p>
                    <!-- <a href="#" class="-item-link">Purchase Course</a> -->
                    <pstyle="color: orange ; ">Go To Course</p>
                            </div>
                        </a>
        <?php endforeach; ?>
        <div class=" clear">
                </div>
    </div><!--close about-content div-->

</body>

</html>
<?php
require_once("complementary/footer.php");
?>