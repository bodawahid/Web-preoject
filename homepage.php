<?php
include_once('complementary/header.php');
$selectedData = $conn->query('SELECT * FROM courses');
$selectedData->execute();
$datas = $selectedData->fetchAll(PDO::FETCH_ASSOC);
// number of courses .. 
$number_of_courses = $selectedData->rowCount();
// select users count  .. 
$count = $conn->query('select * from users');
$count->execute();  
$count = $count->rowCount();
?>

<body>
    <!-- Home  -->
    <div class="home">
        <div class="overlay">
            <div class="home-content">
                <h1 class="main-address">e-learning platform</h1>
                <p class="home-description">
                    <!-- content in the front page -->
                    Step into our e-learning platform, where the virtual doors open to a vibrant, dynamic home of
                    education. As you enter, you're greeted by a seamle ss interface, a hub of endless possibilities
                    waiting to be explored.


                </p>
                <!-- start button -->
                <?php if (isset($_SESSION['username'])) : ?>
                    <a class="btn btn-start hover-opacity" href="courses.php">get started !</a></button>
                <?php else : ?>
                    <a class="btn btn-start hover-opacity" href="login.php">get started !</a></button>
                <?php endif; ?>
                <!-- learn more button -->

            </div> <!-- close home content div -->
        </div> <!-- close overlay div -->
    </div> <!-- close home div -->

    <!--  about  -->
    <div class="about pd-y">
        <div class="section-header">
            <?php if (isset($_SESSION['username'])) : ?>
                <h2 class="section-title">Let's Start Learning , <?php echo $_SESSION['username']; ?></h2>
            <?php else : ?>
                <h2 class="section-title">Let's Start Learning , My Dear</h2>
            <?php endif; ?>
            <span class="section-line"></span>
        </div> <!--close section-header div-->
        <div class="container">
            <div class="about-content">
                <?php foreach ($datas as $data) : ?>
                    <div class="about-item ltr-effect">
                        <a href="course_content.php?id=<?php echo $data['id']; ?>">
                            <img src="/images/<?php echo $data['image'] ?>" class="about-img-item" alt="course">
                            <h3 class="about-item-title mg-d"><?php echo $data['name_of_course']; ?></h3>
                            <p class="about-item-description mg-d"><?php echo $data['course_owner']; ?> </p>
                            <!-- <a href="#" class="about-item-link"></a> -->
                            <h4> Price : <?php echo '$' . $data['price']; ?></h4>
                        </a>
                    </div><!--close about-item div-->
                <?php endforeach; ?>
                <div class="clear"></div>

            </div><!--close about-content div-->
        </div><!--close container div-->
    </div><!--close about div-->

    <!-- num section -->
    <div class="numbers"> <!--parent div-->
        <div class="overlay">
            <div class="container">
                <div class="numbers-items">
                    <div class="number-item">
                        <i class="icon fa fa-file fa-2x"></i>
                        <h3 class="number-item-title"><?php echo $number_of_courses ; ?></h3>
                        <span class="number-item-text">Number Of Courses</span>
                    </div>
                    <div class="number-item">
                        <i class="icon fa fa-user fa-2x"></i>
                        <h3 class="number-item-title"><?php echo $count ; ?> </h3>
                        <span class="number-item-text">Number Of Our Users</span>
                    </div>

                </div> <!-- /numbers-items-->

            </div> <!-- /container div-->


        </div> <!--/overlay div-->

    </div> <!-- /overlay div-->
    <!-- pricing section -->
    <div class="pricing pd-y">
        <div class="section-header">
            <h2 class="section-title">pricing table</h2>
            <span class="section-line"></span>
        </div> <!--close section-header div-->
        <div class="container">
            <div class="pricing-plans">
                <div class="pricing-item tb-effect">
                    <span class="pricing-item-text">Basic Plan</span>
                    <div class="pricing-item-permonth">
                        <h3 class="dollar">$7</h3>
                        <span class="month">/ Month</span>
                    </div>
                    <ul class="pricing-list">
                        <li>1GB Disk Space</li>
                        <li>100 Email Account</li>
                        <li>24/24 Support</li>
                    </ul>
                    <button class="pricing-item-purchase">Purchase now</button>
                </div>
                <div class="pricing-item mg tb-effect">
                    <span class="pricing-item-text">silvar Plan</span>
                    <div class="pricing-item-permonth">
                        <h3 class="dollar">$18</h3>
                        <span class="month">/ Month</span>
                    </div>
                    <ul class="pricing-list">
                        <li>1GB Disk Space</li>
                        <li>150 Email Account</li>
                        <li>24/24 Support</li>
                    </ul>
                    <button class="pricing-item-purchase">Purchase now</button>
                </div>
                <div class="pricing-item tb-effect">
                    <span class="pricing-item-text">Gold Plan</span>
                    <div class="pricing-item-permonth">
                        <h3 class="dollar">$39</h3>
                        <span class="month">/ Month</span>
                    </div>
                    <ul class="pricing-list">
                        <li>1GB Disk Space</li>
                        <li>50 Email Account</li>
                        <li>24/24 Support</li>
                    </ul>
                    <button class="pricing-item-purchase">Purchase now</button>
                </div>
            </div>
        </div>
    </div>
    <!-- recommended topics -->

    <div class="service pd-y">
        <div class="container">

            <div class="service-box">
                <div class="service-item">
                    <div class="section-header">
                        <h2 class="section-title">why us</h2>
                        <span class="section-line"></span>
                    </div><!--close header div-->
                    <p class="service-item-description">

                        At Benha university platform, we're transforming e-learning. With expert-led courses,
                        personalized experiences, and cutting-edge tech, we offer accessible education and a
                        supportive
                        community. Choose us for a learning journey that's innovative and empowering.
                    </p>
                    <ul class="service-list">
                        <li><i class="fa fa-check"></i>Expertly crafted courses
                        </li>
                        <li><i class="fa fa-check"></i>Personalized learning journeys
                        </li>
                        <li><i class="fa fa-check"></i>State-of-the-art technology
                        </li>
                        <li><i class="fa fa-check"></i>Dedicated support
                        </li>
                    </ul>
                </div><!--close service item div-->
                <div class="service-item">
                    <div class="service-item-img"><img src="images/service-img.jpg" alt="service-img">
                    </div>
                </div><!--close service item div-->
                <div class="clear"></div>
            </div>
        </div><!--close container div-->
    </div><!--close service div-->

    <div class="pd-y">
        <div class="section-header ">
            <h2 class="section-title">Topics Recommended</h2>
            <span class="section-line"></span>
        </div>
        <ul class="topics-items ">
            <li class="ltr-effect"><a href="#">programming</a></li>
            <li class="ltr-effect"><a href="#">science</a></li>
            <li class="ltr-effect"><a href="#">languages</a></li>
            <li class="ltr-effect"><a href="#">data sceince</a></li>
            <li class="ltr-effect"><a href="#">business</a></li>
            <li class="ltr-effect"><a href="#">health</a></li>
            <li class="ltr-effect"><a href="#">social science</a></li>
            <li class="ltr-effect"><a href="#">engineering</a></li>
        </ul>
        <div class="clear"></div>
    </div>

    <div class="about pd-y">
        <div class="section-header">
            <h2 class="section-title">Most Purchased</h2>
            <span class="section-line"></span>
        </div> <!--close section-header div-->
        <div class="container">
            <div class="about-content">
                <?php foreach ($datas as $data) : ?>
                <div class="about-item ltr-effect">
                    <img src="images/<?php echo $data['image'] ;?>" class="about-img-item" alt="">
                    <h3 class="about-item-title mg-d"><?php echo $data['name_of_course'] ; ?></h3>
                    <p class="about-item-description mg-d"><?php echo 'price : $' . $data['price'] ; ?></p>
                    <!-- <a href="#" class="about-item-link">Purchase Course</a> -->
                    <a class="btn btn-start hover-opacity" href="courses.php">Purchase now</a></button>
                </div><!--close about-item div-->
                <?php endforeach; ?>
                <div class="clear"></div>
            </div><!--close about-content div-->
        </div><!--close container div-->
    </div><!--close about div-->
    <?php include_once('complementary/footer.php'); ?>