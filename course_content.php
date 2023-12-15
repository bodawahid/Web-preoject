<?php include_once("complementary/header.php") ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        section {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1, h2 {
            color: #333;
        }

        p {
            line-height: 1.6;
            color: #666;
        }

        .requirements, .payment {
            margin-top: 30px;
        }

        footer {
            text-align: center;
            padding: 1em;
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>

    <header>
        <h1>Course Title</h1>
    </header>

    <section>
        <h2>Description</h2>
        <p>This is a brief description of the course content. Provide details about what participants will learn and any other relevant information.</p>

        <div class="requirements">
            <h2>Requirements</h2>
            <p>List the prerequisites or any materials/steps participants need before taking the course.</p>
        </div>

        <div class="payment">
            <h2>Payment</h2>
            <p>Include information about the payment process, fees, and any payment methods accepted.</p>
        </div>
    </section>
</body>
</html>
<?php include_once("complementary/footer.php") ; ?>