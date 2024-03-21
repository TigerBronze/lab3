<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGN UP</title>
    <!-- Include Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <!-- Container for the sign-up form -->
    <div class="container">
        <!-- Form for user sign-up -->
        <form action="signup-check.php" method="post" class="mt-5 p-4 border" onsubmit="return validateForm()">
            <!-- Sign-up heading -->
            <h2 class="mb-4">SIGN UP</h2>
            <!-- Display error messages if any -->
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
            <?php } ?>
            <!-- Display success message if sign-up is successful -->
            <?php if (isset($_GET['success'])) { ?>
                <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
            <?php } ?>

            <!-- Input fields for user information -->
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="First_name" class="form-label">First Name</label>
                    <input type="text" id="First_name" name="First_name" class="form-control" placeholder="First Name">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="Middle_name" class="form-label">Middle Name</label>
                    <input type="text" id="Middle_name" name="Middle_name" class="form-control" placeholder="Middle Name">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="Lastname" class="form-label">Last Name</label>
                    <input type="text" id="Lastname" name="Lastname" class="form-control" placeholder="Last Name">
                </div>
            </div>

            <div class="mb-3">
                <label for="uname" class="form-label">User Name</label>
                <input type="text" id="uname" name="uname" class="form-control" placeholder="User Name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Ex. email@gmail.com">
                <div id="emailError" class="text-danger"></div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="re_password" class="form-label">Re Password</label>
                    <input type="password" id="re_password" name="re_password" class="form-control" placeholder="Re_Password">
                </div>
            </div>

            <!-- Submit button for sign-up -->
            <button type="submit" class="btn btn-primary">Sign Up</button>
            <!-- Link to redirect to login page if user already has an account -->
            <a href="index.php" class="btn btn-secondary">Already have an account?</a>
        </form>
    </div>
    <!-- Include Bootstrap JavaScript for interactive elements -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var emailError = document.getElementById('emailError');

            // Regular expression to check email format
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                emailError.innerHTML = "Invalid email format: should contains @, gmail, .com";
                return false;
            } else {
                emailError.innerHTML = "";
                return true;
            }
        }
    </script>
</body>
</html>
