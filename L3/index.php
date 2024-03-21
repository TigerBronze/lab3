<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <!-- Login form -->
                <form action="login.php" method="post" class="p-4 border">
                    <!-- Login title -->
                    <h2 class="mb-4">LOGIN</h2>
                    <?php if (isset($_GET['error'])) { ?>
                        <!-- Display error message if provided via GET parameter -->
                        <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
                    <?php } ?>
                    <div class="mb-3">
                        <label for="uname" class="form-label">User Name</label>
                        <!-- Input field for username -->
                        <input type="text" id="uname" name="uname" class="form-control" placeholder="User Name">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <!-- Input field for password -->
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <!-- Login button -->
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <!-- Link to sign up page -->
                    <a href="signup.php" class="btn btn-secondary btn-block">Create new account</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
