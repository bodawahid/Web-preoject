<?php include_once("adminComp/header.php"); ?>
<?php
$id = $_GET['id'];
$error = "";
// $err_username = "";
// $err_pass =  "";
// $err_email = "";
// $success =  "";
// $adminId = $_SESSION["admin_id"];
$data = $conn->query("SELECT * FROM courses WHERE id = " . $_GET['id']);
$data->execute();
$courseData = $data->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['submit'])) {
    $courseName = $courseData['name_of_course'];
    $courseDetails = $courseData['details'];
    $courseImage = $courseData['image'];
    $coursePrice = $courseData['price'];
    $courseCategory = $courseData['category'];
    $courseLanguage = $courseData['language'];
    $courseLevel = $courseData['level'];
    $courseDuration = $courseData['duration'];
    if (!empty($_POST["coursename"]))
        $courseName = $_POST["coursename"];
    if (!empty($_POST["details"]))
        $courseDetails = $_POST["details"];
    if (!empty($_POST["image"]))
        $courseImage = $_POST["image"];
    if (!empty($_POST["price"]))
        $coursePrice = $_POST["price"];
    if (!empty($_POST["category"]))
        $courseCategory = $_POST["category"];
    if (!empty($_POST["language"]))
        $courseLanguage = $_POST["language"];
    if (!empty($_POST["level"]))
        $courseLevel = $_POST["level"];
    if (!empty($_POST["duration"]))
        $courseDuration = $_POST["duration"];
    $image =  $_FILES['image']['name'];
    $targetFile =  $_SERVER['DOCUMENT_ROOT'] . "/images/" . basename($image);
    $updateCourse = $conn->prepare('UPDATE courses SET name_of_course = :coursename , details = :details , image = :image , price = :price , category = :category ,updated_at = :updated_at , language = :language , level = :level , duration = :duration WHERE id =' . $_GET["id"]);
    $updateCourse->execute(array(
        ':coursename' => $_POST['coursename'],
        ':details' => $_POST['details'],
        ':image' => $image,
        ':price' => $_POST['price'],
        ':category' => $_POST['category'],
        ':language' => $_POST['language'],
        ':level' => $_POST['level'],
        ':duration' => $_POST['duration'],
        ':updated_at' => date('Y-m-d H:i:s'),
    ));
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile))
        header('location:adminCourses.php');
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
    <div class="card">
        <h1 class="heading1" style="text-align: center; ">Update</h1>
        <form action="adminCourseUpdate.php?id=<?php echo $id ; ?>" enctype="multipart/form-data" method="post" class="form-f">

            <label for="username">Course Name</label>
            <input class="login-input bord" name="coursename" type="text" placeholder="Update Your Course Name" value="<?php echo $courseData["name_of_course"]; ?>">


            <label for="username">Details</label>
            <input class="login-input bord" name="details" type="text" placeholder="Enter details" value=" <?php echo $courseData["details"]; ?>">


            <label for="username">Image</label>
            <input class="login-input bord" name="image" type="file" accept="image/png, image/gif, image/jpeg , image/jpg" required>

            <label for="username">Price</label>
            <input type="number" class="login-input bord" name="price" placeholder="Enter your price" value="<?php echo $courseData["price"]; ?>">

            <label for="username">Category</label>
            <select name="category" id="category">
                <option value="<?php echo $courseData['category'] ;?>" selected hidden>choose </option>
                <option value="web development">Web Development</option>
                <option value="data science">Data Science</option>
                <option value="network">Network</option>
                <option value="game development">Game Development</option>
                <option value="software design">Software Design</option>
                <option value="Database design">Database Design</option>
            </select>
            <label for="username">Language</label>
            <input class="login-input bord" name="language" type="text" placeholder="Enter the course language" value="<?php echo $courseData['language']; ?>">

            <label for="username">level</label>
            <input class="login-input bord" name="level" type="text" placeholder="Enter Course Level" value="<?php echo $courseData["level"]; ?>">

            <label for="username">Duration</label>
            <input class="login-input bord" name="duration" type="text" placeholder="Enter Course Duration" value="<?php echo $courseData['duration']; ?>">


            <input class="login-input send" name="submit" type="submit" value="Update">
            <?php if(!empty($error)) :?>
            <div class="error"> <?php echo $error ?></div>
            <?php endif ; ?>


        </form>
    </div>
    <?php include_once("adminComp/footer.php"); ?>
</body>

</html>