<?php
session_start();
include "config/conn.php";
$message = "";
$messageType = "";
if (isset($_POST['login_btn'])) {
    $name = trim($_POST['name']);
    $password = $_POST['password'];
    // Check empty fields
    if (empty($name) || empty($password)) {
        $message = "Name and password are required.";
        $messageType = "danger";
    }
    else {
        // Find user by name
        $sql = "SELECT name, password FROM users WHERE name = ?";
        $params = array($name);
        $result = sqlsrv_query($conn, $sql, $params);
        if ($result === false) {
            $message = "Database error.";
            $messageType = "danger";
        }
        elseif ($user = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            // Verify password
            if (password_verify($password, $user['password']))
            {
                $_SESSION['user_name'] = $user['name'];
                $message = "Login Successful!";
                $messageType = "success";
                echo "
                    <script>
                        setTimeout(function(){ window.location='index.php';},1000);
                    </script>
                ";
            }
            else 
            {
                $message = "Invalid name or password.";
                $messageType = "danger";
            }

        } else {
            $message = "Invalid name or password.";
            $messageType = "danger";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <!-- Login Card -->
        <div class="card shadow border-0 rounded-4 p-3" style="width: 100%; max-width: 400px;">
            <!-- Icon -->
            <div class="text-center mb-2">
                <div class="bg-primary text-white rounded-circle d-inline-flex justify-content-center align-items-center"
                    style="width:50px;height:50px;">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
            <!-- Heading -->
            <div class="text-center mb-3">
                <h4 class="text-primary fw-bold mb-1">Admin Login</h4>
                <small class="text-muted">Welcome back! Please login</small>
            </div>
            <!-- Message -->
            <?php if ($message != "") { ?>
            <div class="alert alert-<?php echo $messageType; ?> py-2">
                <?php echo htmlspecialchars($message); ?>
            </div>
            <?php } ?>

            <!-- Login Form -->
            <form method="POST">
                <!-- Name -->
                <div class="mb-2">
                    <label class="form-label fw-semibold mb-1">Name</label>
                    <input type="text" name="name" class="form-control form-control-sm" placeholder="Enter your name"
                        required>
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label fw-semibold mb-1">Password</label>
                    <input type="password" name="password" class="form-control form-control-sm"
                        placeholder="Enter your password" required>
                </div>
                <!-- Login Button -->
                <button type="submit" name="login_btn" class="btn btn-primary btn-sm w-100 py-2">
                    <i class="fa-solid fa-right-to-bracket me-2"></i>
                    Login
                </button>
                <!-- Register -->
                <p class="text-center text-muted small mt-3 mb-0">
                    Don't have an account?
                    <a href="register.php" class="text-decoration-none fw-semibold">
                        Register
                    </a>
                </p>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>