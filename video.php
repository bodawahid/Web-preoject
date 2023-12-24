<?php require_once("complementary/header.php");
$id = $_GET['id'];
$number = $_GET['number'];
$user_id =  $_SESSION['user_id'];

$check = $conn->query("select * from booking where user_id = '$user_id' and course_id = '$id' ");
$check->execute();
if ($check->rowCount() <= 0) {
    header("location:homepage.php");
}
// selecting only one video 
$video = $conn->query("SELECT * FROM videos where course_id = '$id' and number_of_video = '$number' ");
$video->execute();
$videoData = $video->fetch(PDO::FETCH_ASSOC);
// selecting number of videos
$videos = $conn->query("SELECT * FROM videos where course_id = '$id' order by number_of_video");
$videos->execute();
$videosData = $videos->fetchALL(PDO::FETCH_ASSOC);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <style> 
    .lol {
        display: inline-block;
        /* width: fit-content; */
        background-color: red;
    }
    </style> -->
</head>

<body>
    <video style="display: block; margin:auto" src="videos/<?php echo $videoData['video']; ?>" width="1000" height="700" controls>
    </video>
    <?php foreach ($videosData as $video) : ?>
        <?php $array = explode('.',$video['video']) ; ?>
    <a class="lololo" href="video.php?id=<?php echo $id ; ?>&number=<?php echo $video['number_of_video'] ; ?>"><button class="btn" style="background-color:#0c1529; color:white ;padding: 10px; margin-left: 16%  ;"><?php  echo $array[0]; ?></button></p>
    <?php endforeach; ?>
</body>
</html>
<?php require_once('complementary/footer.php'); ?>