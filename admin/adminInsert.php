<?php include_once("adminComp/header.php");
$err = "";
ini_set('upload_max_filesize', '500M');
ini_set('post_max_size', '500M');
// get courses of this admin  ....  
$id = $_SESSION['adminId'];
$courses = $conn->query("SELECT * FROM courses WHERE owner_id = '$id'");
$courses->execute();
$courseData = $courses->fetchAll(PDO::FETCH_ASSOC);
// insert vidoes  
if (isset($_POST["submit"])) {
    if (empty($_POST["videoName"]) or  empty($_POST["course"]) or empty($_POST['number']))
        $err = "Please Fill All The Inputs";
    else {
        $number = $_POST['number'];
        $course_id = $_POST['course'] ; 
        $check = $conn->query("SELECT * FROM videos WHERE number_of_video = '$number'  and course_id = '$course_id'");
        $check->execute();
        if ($check->rowCount() > 0) {
            $err = "Video Is Already Existed";
        } else {
            $name = $_POST['videoName'];
            $video = $_FILES['video']['name'];
            $course_id = $_POST['course'];
            $dir_video =  $_SERVER['DOCUMENT_ROOT'] . '/videos/' . basename($video);
            $insert = $conn->prepare("INSERT INTO videos (name,video,number_of_video,course_id) VALUES (:name,:video,:number,:course_id)");
            $insert->execute(
                [
                    ":name" => $name,
                    ":video" => $video,
                    ":number" => $number,
                    ":course_id" => $course_id,
                ]
            );
            if (move_uploaded_file($_FILES['video']['tmp_name'], $dir_video))
                header('location:adminCourses.php');
        }
    }
}
?>

<body>
    <div class="card">
        <?php if ($courses->rowCount() > 0) : ?>
            <h1 style="text-align: center; ">New Course</h1>
            <form enctype="multipart/form-data" action="adminInsert.php" method="post" class="form-f">
                <label for="VideoName">Video Name</label>
                <input id="videoName" class="login-input bord" name="videoName" type="text" placeholder="Enter Video Name">
                <label for="video">Video</label>
                <input id="video" class="login-input bord" name="video" type="file">
                <label for="number">number of video</label>
                <input id="number" class="login-input bord" name="number" type="number">
                <label for="category">Course</label>
                <select name="course" id="category">
                    <option selected hidden>Choose A Course</option>
                    <?php foreach ($courseData as $data) : ?>
                        <option value="<?php echo $data['id']; ?>"><?php echo $data['name_of_course']; ?></option>
                    <?php endforeach; ?>
                </select>
                <input class="login-input send" type="submit" value="Create Course" name="submit">
            </form>
        <?php else : ?>
            <h1 style="text-align: center; ">You Don't Have Any Courses , Create a New One</h1>
            <a href="adminCreateCourse.php" class="btn">Create a new Course</a>
        <?php endif;  ?>
        <?php if (!empty($err)) : ?>
            <div class="alert alert-danger"><?php echo $err; ?></div>
        <?php endif; ?>
    </div>
</body>

<?php include_once("adminComp/footer.php"); ?>