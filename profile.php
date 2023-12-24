<?php require_once("complementary/header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Your Name - Profile</title>
</head>
<body>

    <header>
        <h1>Your Name</h1>
        <p>Web Developer</p>
    </header>

    <section class="profile-container">
        <img src="your-profile-picture.jpg" alt="Your Name" class="profile-picture">
        
        <div class="profile-details">
            <h2>About Me</h2>
            <p>
                Hello! I'm Your Name, a passionate web developer with experience in HTML, CSS, and JavaScript.
                I love creating user-friendly and responsive websites.
            </p>

            <h2>Skills</h2>
            <ul>
                <li>HTML</li>
                <li>CSS</li>
                <li>JavaScript</li>
                <!-- Add more skills as needed -->
            </ul>

            <h2>Contact</h2>
            <p>Email: your.email@example.com</p>

            <h2>Connect with Me</h2>
            <ul>
                <li><a href="https://linkedin.com/in/yourname" target="_blank">LinkedIn</a></li>
                <li><a href="https://twitter.com/yourusername" target="_blank">Twitter</a></li>
                <!-- Add more social media links as needed -->
            </ul>
        </div>
    </section>

</body>
</html>
<!-- styles.css: -->
<style>
/* css */
/* Copy code */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 1em;
}

.profile-container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}

.profile-picture {
    border-radius: 50%;
    max-width: 150px;
    height: auto;
    margin: 0 20px 20px 0;
}

.profile-details {
    flex: 1;
}

h2 {
    margin-top: 20px;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    display: inline-block;
    margin: 0 10px;
}

a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
}
</style>


<?php require_once("complementary/header.php"); ?>
