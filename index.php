<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!--font-awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form class="shadow w-450 p-3" action="signup.php" method="post">
            
            <h4 class="display-4 fs-1">&ensp;<i class="fa-solid fa-user-plus"></i>&ensp;Create Account</h4><br>
            <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?= $_GET['error']; ?>
            </div>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
                <?= $_GET['success']; ?>
            </div>
            <?php } ?>
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="fname" class="form-control" value="<?= isset($_GET['fname']) ? $_GET['fname'] : '' ?>" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" name="uname" class="form-control" value="<?= isset($_GET['uname']) ? $_GET['uname'] : '' ?>" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Email ID</label>
                <input type="email" name="email" class="form-control" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <button class="btn btn-primary"><a href="login.php" style="color: white;text-decoration: none">Login</a></button>
        </form>
    </div>
</body>
</html>
