<?php
session_start();
require_once 'config/database.php';

// Redirect if already logged in
if (is_logged_in()) {
    $redirect_page = '';
    switch ($_SESSION['user_type']) {
        case 'admin':
            $redirect_page = 'admin/dashboard.php';
            break;
        case 'teacher':
            $redirect_page = 'teacher/dashboard.php';
            break;
        case 'student':
            $redirect_page = 'student/dashboard.php';
            break;
        case 'class_rep':
            $redirect_page = 'class_rep/dashboard.php';
            break;
    }
    header("Location: $redirect_page");
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitize_input($_POST['username']);
    $password = $_POST['password'];
    
    if (empty($username) || empty($password)) {
        $error = 'Please fill in all fields';
    } else {
        $query = "SELECT * FROM users WHERE (username = '$username' OR email = '$username') AND is_active = 1";
        $user = get_single_row($query);
        
        if ($user && password_verify($password, $user['password_hash'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['user_type'] = $user['user_type'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['profile_photo'] = $user['profile_photo'];
            
            // Update last login
            $user_id = $user['user_id'];
            $update_query = "UPDATE users SET last_login = NOW() WHERE user_id = $user_id";
            execute_query($update_query);
            
            // Redirect based on user type
            $redirect_page = '';
            switch ($user['user_type']) {
                case 'admin':
                    $redirect_page = 'admin/dashboard.php';
                    break;
                case 'teacher':
                    $redirect_page = 'teacher/dashboard.php';
                    break;
                case 'student':
                    $redirect_page = 'student/dashboard.php';
                    break;
                case 'class_rep':
                    $redirect_page = 'class_rep/dashboard.php';
                    break;
            }
            header("Location: $redirect_page");
            exit();
        } else {
            $error = 'Invalid username or password';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-School Online Learning Platform</title>
    <meta name="description" content="Login to E-School Online Learning Platform - Secure access to virtual classrooms">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Animated Background -->
    <div class="animated-bg"></div>
    
    <!-- Floating Particles -->
    <div class="particles" id="particles"></div>
    
    <!-- Login Container -->
    <div class="login-container">
        <div class="login-card card-glass">
            <!-- Logo Section -->
            <div class="login-header">
                <div class="logo-container">
                    <div class="logo-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h1 class="logo-text">E-School</h1>
                </div>
                <p class="login-subtitle">Online Learning Platform</p>
            </div>
            
            <!-- Login Form -->
            <form method="POST" action="" class="login-form" id="loginForm">
                <h2 class="form-title">Welcome Back!</h2>
                <p class="form-subtitle">Sign in to continue to your dashboard</p>
                
                <?php if ($error): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($success): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        <?php echo $success; ?>
                    </div>
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="username" class="form-label">
                        <i class="fas fa-user"></i> Username or Email
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        class="form-control" 
                        placeholder="Enter your username or email"
                        required
                        autocomplete="username"
                    >
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i> Password
                    </label>
                    <div class="password-input-wrapper">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-control" 
                            placeholder="Enter your password"
                            required
                            autocomplete="current-password"
                        >
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <div class="form-options">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember" id="remember">
                        <span>Remember me</span>
                    </label>
                    <a href="forgot-password.php" class="forgot-link">Forgot Password?</a>
                </div>
                
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    <i class="fas fa-sign-in-alt"></i>
                    Sign In
                </button>
                
                <div class="divider">
                    <span>OR</span>
                </div>
                
                <div class="quick-login">
                    <p class="quick-login-title">Quick Login As:</p>
                    <div class="quick-login-buttons">
                        <button type="button" class="btn-quick" onclick="quickLogin('student')">
                            <i class="fas fa-user-graduate"></i>
                            <span>Student</span>
                        </button>
                        <button type="button" class="btn-quick" onclick="quickLogin('teacher')">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Teacher</span>
                        </button>
                        <button type="button" class="btn-quick" onclick="quickLogin('admin')">
                            <i class="fas fa-user-shield"></i>
                            <span>Admin</span>
                        </button>
                    </div>
                </div>
            </form>
            
            <!-- Footer -->
            <div class="login-footer">
                <p>Don't have an account? <a href="register.php">Register here</a></p>
                <p class="copyright">&copy; 2024 E-School. All rights reserved.</p>
            </div>
        </div>
        
        <!-- Info Cards -->
        <div class="info-cards">
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-video"></i>
                </div>
                <h3>Live Classes</h3>
                <p>Join interactive virtual classrooms with webcam support</p>
            </div>
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <h3>Attendance Tracking</h3>
                <p>Automated attendance with facial verification</p>
            </div>
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-book-reader"></i>
                </div>
                <h3>Quality Education</h3>
                <p>Access learning materials and assignments anytime</p>
            </div>
        </div>
    </div>
    
    <script src="assets/js/particles.js"></script>
    <script src="assets/js/login.js"></script>
</body>
</html>
