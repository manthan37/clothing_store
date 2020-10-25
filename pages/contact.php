<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>
    <?php include '../includes/header.php' ?>
    <div class="container">
        <div class="header">Reach us out <i class="far fa-envelope"></i></div>
        <form action="explore.php" method="post">
            <table style="margin:0 auto;">
                <tr>
                    <td><label for="username">Full name</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="username" id="username"></td>
                </tr>
                <tr>
                    <td><label for="email" id="email_label">Email</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="email" id="email"></td>
                </tr>
                <tr>
                    <td><label for="message">Add a message</label></td>

                </tr>
                <tr>
                    <td><textarea name="username" id="message" style="background-color: transparent; width: 198px; height: 75px; color: white; resize: none;"></textarea></td>
                </tr>

                <tr>
                    <td><button id="submit" type="submit" name="submit" value="submit">Send</button></td>
                </tr>
            </table>

        </form>
    </div>



    <?php include '../includes/footer.php'; ?>
</body>

</html>