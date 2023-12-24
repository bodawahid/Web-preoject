<?php include_once "adminComp/header.php";
if (!isset($_SESSION['adminUserName'])) {
    header('location:adminLogin.php');
}
if ($_SESSION['adminRole'] == 1) {
    $adminId = $_SESSION['adminId'];
    $data = $conn->query("SELECT * FROM courses where owner_id = '$adminId'");
    $data->execute();
    $courseData = $data->fetchAll(PDO::FETCH_ASSOC);
} else {
    $data = $conn->query("SELECT * FROM courses");
    $data->execute();
    $courseData = $data->fetchAll(PDO::FETCH_ASSOC);
}
?>


<body>
    <div class="card-content">
        <div class="mg">
            <a href="adminCreateCourse.php" class="btn">Create a new Course</a>
        </div>
        <table class="table-courses">
            <thead>
                <th>
                    #
                </th>
                <th>
                    Course Image
                </th>
                <th>
                    Course Name
                </th>
                <th>
                    Course Details
                </th>
                <th>
                    Duration
                </th>
                <th>
                    Price
                </th>
                <th>
                    Update
                </th>
                <th>
                    Delete
                </th>
            </thead>
            <?php foreach ($courseData as $data) : ?>
                <tbody>
                    <td>
                        <?php echo $data['id']; ?>
                    </td>
                    <td>
                        <img src="../images/<?php echo $data['image']; ?>" width="200" height="200">
                    </td>
                    <td>
                        <?php echo $data['name_of_course'];  ?>
                    </td>
                    <td>
                        <?php echo $data['details'];  ?>
                    </td>
                    <td>
                        <?php echo $data['duration'];  ?>

                    </td>
                    <td>
                        <?php echo $data['price'];  ?>
                    </td>
                    <td>
                        <a href="adminCourseUpdate.php?id=<?php echo $data['id']; ?>" class="btn">Update</a>

                    </td>
                    <td>
                        <a href="adminCourseDelete.php?id=<?php echo $data['id']; ?>" class="btn">Delete</a>

                    </td>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>
<?php include_once "adminComp/footer.php" ?>;