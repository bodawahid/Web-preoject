<?php require_once("complementary/header.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .contact-container {
            max-width: 800px;
            margin: 150px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .h2 {
            color: #333;
        }

        form {
            display: grid;
            gap: 10px;
        }

        /* label {
            font-weight: bold;
        } */

        input,
        textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 2px ;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

  

    <section class="contact-container">
        <h2 xlass="head">Contact US</h2>

        <form action="phpmailer.php?send=<?php $_SESSION['send'] = 1; echo $_SESSION['send'] ;?>" method="post">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required placeholder="please enter your name">

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required placeholder="please enter your email">

            <label for="message">Your Message:</label>
            <textarea id="message" name="message" rows="5" required placeholder="please enter your message "></textarea>

            <button type="submit" name="submit">Send Message</button>
        </form>
    </section>
    <?php require_once("complementary/footer.php"); ?>

</body>

</html>