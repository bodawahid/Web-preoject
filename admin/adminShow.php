<?php include_once("adminComp/header.php");
if (!isset($_SESSION['adminUserName'])) {
    header('location:adminLogin.php');
}
if ($_SESSION['adminRole'] == 1) {
    header('location:adminHome.php');
}
// select data from admin users table ... 
$selected = $conn->query("SELECT * FROM admins");
$selected->execute();
$data = $selected->fetchAll(PDO::FETCH_ASSOC);
// echo "sdssss" ; 
?>

<head>

</head>

<body>
    <div class="card-content">
        <?php if ($_SESSION['adminRole'] != 1) : ?>
            <div class="mg">
                <a href="adminRegister.php" class="btn">Create a new Admin</a>
            </div>
        <?php endif; ?>
        <table>
            <thead>
                <th>
                    #
                </th>
                <th>
                    username
                </th>
                <th>
                    email
                </th>
                <th>
                    status
                </th>
                <th>
                    Update
                </th>
                <th>
                    Delete
                </th>
            </thead>
            <?php foreach ($data as $row) : ?>
                <tbody>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td>
                        <?php echo $row['username'];  ?>
                    </td>
                    <td>
                        <?php echo $row['email'];  ?>
                    </td>
                    <?php if ($row['role'] == 0) : ?>
                        <td>
                            <?php echo 'SuperAdmin' ?>
                        </td>
                    <?php else : ?>
                        <td>
                            <?php echo 'Normal Admin' ?>
                        </td>
                    <?php endif; ?>
                    <td>
                        <a href="adminUpdate.php?id=<?php echo $row['id']; ?>" class="btn">Update</a>

                    </td>
                    <td>
                        <a href="adminDelete.php?id=<?php echo $row['id']; ?>" class="btn">Delete</a>

                    </td>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>




<?php include_once("adminComp/footer.php");
