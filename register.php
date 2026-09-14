<?php
include "config/conn.php";
$message = "";
$messageType = "";
if (isset($_POST['register_btn'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Password minimum 6 characters
    if (strlen($password) < 6) {
        $message = "Password must be at least 6 characters.";
        $messageType = "danger";
    }
    // Invalid email
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email address.";
        $messageType = "danger";
    }
    // Password confirmation
    elseif ($password != $confirm_password) {
        $message = "Password does not match.";
        $messageType = "danger";
    }
    else {
        // Check email
        $check = sqlsrv_query( $conn, "SELECT id FROM users WHERE email = ?", array($email) );
        if (sqlsrv_fetch_array($check, SQLSRV_FETCH_ASSOC)) {
            $message = "Email already exists.";
            $messageType = "warning";
        }
        else 
            {   // Password hash
                $password = password_hash($password, PASSWORD_DEFAULT);
            // Insert
            $sql = "INSERT INTO users (name, email, phone, password, createddate)
                    VALUES (?, ?, ?, ?, GETDATE())";
            $params = array( $name, $email,  $phone, $password );
            $result = sqlsrv_query($conn, $sql, $params
            );
            if ($result) {
                echo "<script>
                        alert('Registration Successful!');
                        window.location.href = 'login.php';
                      </script>";
                exit;
            } else {
                $message = "Registration Failed!";
                $messageType = "danger";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

</head>

<body class="bg-light">
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <!-- Register Card -->
        <div class="card shadow border-0 rounded-4 p-3" style="width: 100%; max-width: 500px;">
            <!-- Icon -->
            <div class="text-center mb-2">
                <div class="bg-primary text-white rounded-circle d-inline-flex justify-content-center align-items-center"
                    style="width:50px;height:50px;">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
            </div>
            <!-- Heading -->
            <div class="text-center mb-2">
                <h4 class="text-primary fw-bold mb-1">
                    Admin Register
                </h4>
                <small class="text-muted">Create your admin account</small>
            </div>
            <!-- Message -->
            <?php if ($message != "") { ?>
            <div class="alert alert-<?php echo $messageType; ?> py-2">
                <?php echo $message; ?>
            </div>
            <?php } ?>
            <!-- Form -->
            <form method="POST">
                <!-- Name -->
                <div class="mb-2">
                    <label class="form-label fw-semibold mb-1">Name</label>
                    <input type="text" name="name" class="form-control form-control-sm" placeholder="Enter your name"
                        required>
                </div>
                <!-- Email -->
                <div class="mb-2">
                    <label class="form-label fw-semibold mb-1">Email</label>
                    <input type="email" name="email" class="form-control form-control-sm" placeholder="Enter your email"
                        required>
                </div>
                <!-- Phone -->
                <div class="mb-2">
                    <label class="form-label fw-semibold mb-1">Phone</label>
                    <input type="text" name="phone" class="form-control form-control-sm"
                        placeholder="Enter phone number" required>
                </div>
                <!-- Password -->
                <div class="row">
                    <!-- Password -->
                    <div class="col-md-6 mb-2">
                        <label class="form-label fw-semibold mb-1">
                            Password
                        </label>
                        <input type="password" name="password" class="form-control form-control-sm"
                            placeholder="Enter password" required>
                    </div>
                    <!-- Confirm Password -->
                    <div class="col-md-6 mb-2">
                        <label class="form-label fw-semibold mb-1">
                            Confirm Password
                        </label>
                        <input type="password" name="confirm_password" class="form-control form-control-sm"
                            placeholder="Confirm password" required>
                    </div>
                </div>
                <!-- Register Button -->
                <button type="submit" name="register_btn" class="btn btn-primary btn-sm w-100 py-2">
                    <i class="fa-solid fa-user-plus me-2"></i>Register
                </button>
                <!-- Login -->
                <p class="text-center text-muted small mt-2 mb-0">
                    Already have an account?
                    <a href="login.php" class="text-decoration-none fw-semibold">Login</a>
                </p>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


</body>

</html>