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
    $full_name = sanitize_input($_POST['full_name']);
    $username = sanitize_input($_POST['username']);
    $email = sanitize_input($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $user_type = sanitize_input($_POST['user_type']);
    $phone_number = sanitize_input($_POST['phone_number']);
    $address = sanitize_input($_POST['address']);
    
    // Validation
    if (empty($full_name) || empty($username) || empty($email) || empty($password) || empty($user_type)) {
        $error = 'Please fill in all required fields';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match';
    } elseif (!in_array($user_type, ['student', 'teacher', 'class_rep'])) {
        $error = 'Invalid user type selected';
    } else {
        // Check if username already exists
        $check_username = "SELECT user_id FROM users WHERE username = '$username'";
        $username_exists = get_single_row($check_username);
        
        if ($username_exists) {
            $error = 'Username already exists. Please choose another one.';
        } else {
            // Check if email already exists
            $check_email = "SELECT user_id FROM users WHERE email = '$email'";
            $email_exists = get_single_row($check_email);
            
            if ($email_exists) {
                $error = 'Email already registered. Please use another email or login.';
            } else {
                // Hash password
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert new user
                $insert_query = "INSERT INTO users (username, email, password_hash, full_name, user_type, phone_number, address, is_active) 
                                VALUES ('$username', '$email', '$password_hash', '$full_name', '$user_type', '$phone_number', '$address', 1)";
                
                if (execute_query($insert_query)) {
                    $success = 'Registration successful! You can now login with your credentials.';
                    // Clear form fields
                    $full_name = $username = $email = $phone_number = $address = '';
                } else {
                    $error = 'Registration failed. Please try again.';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - E-School Online Learning Platform</title>
    <meta name="description" content="Register for E-School Online Learning Platform - Join our virtual classrooms">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Animated Background -->
    <div class="animated-bg"></div>
    
    <!-- Floating Particles -->
    <div class="particles" id="particles"></div>
    
    <!-- Register Container -->
    <div class="register-container">
        <div class="register-card card-glass">
            <!-- Logo Section -->
            <div class="register-header">
                <div class="logo-container">
                    <div class="logo-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h1 class="logo-text">E-School</h1>
                </div>
                <p class="register-subtitle">Online Learning Platform</p>
            </div>
            
            <!-- Register Form -->
            <form method="POST" action="" class="register-form" id="registerForm">
                <h2 class="form-title">Create Your Account</h2>
                <p class="form-subtitle">Join our learning community today</p>
                
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
                
                <!-- User Type Selection -->
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-user-tag"></i> I am registering as
                    </label>
                    <div class="user-type-selector">
                        <label class="user-type-option">
                            <input type="radio" name="user_type" value="student" required checked>
                            <div class="user-type-card">
                                <i class="fas fa-user-graduate"></i>
                                <span>Student</span>
                            </div>
                        </label>
                        <label class="user-type-option">
                            <input type="radio" name="user_type" value="teacher" required>
                            <div class="user-type-card">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span>Teacher</span>
                            </div>
                        </label>
                        <label class="user-type-option">
                            <input type="radio" name="user_type" value="class_rep" required>
                            <div class="user-type-card">
                                <i class="fas fa-user-tie"></i>
                                <span>Class Rep</span>
                            </div>
                        </label>
                    </div>
                </div>
                
                <!-- Full Name -->
                <div class="form-group">
                    <label for="full_name" class="form-label">
                        <i class="fas fa-id-card"></i> Full Name
                    </label>
                    <input 
                        type="text" 
                        id="full_name" 
                        name="full_name" 
                        class="form-control" 
                        placeholder="Enter your full name"
                        value="<?php echo isset($full_name) ? htmlspecialchars($full_name) : ''; ?>"
                        required
                        autocomplete="name"
                    >
                </div>
                
                <!-- Username -->
                <div class="form-group">
                    <label for="username" class="form-label">
                        <i class="fas fa-user"></i> Username
                    </label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        class="form-control" 
                        placeholder="Choose a unique username"
                        value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>"
                        required
                        autocomplete="username"
                        pattern="[a-zA-Z0-9_]{3,20}"
                        title="Username must be 3-20 characters (letters, numbers, underscore only)"
                    >
                    <small class="form-hint">3-20 characters (letters, numbers, underscore only)</small>
                </div>
                
                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i> Email Address
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-control" 
                        placeholder="Enter your email address"
                        value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"
                        required
                        autocomplete="email"
                    >
                </div>
                
                <!-- Phone Number -->
                <div class="form-group">
                    <label for="phone_number" class="form-label">
                        <i class="fas fa-phone"></i> Phone Number (Optional)
                    </label>
                    <input 
                        type="tel" 
                        id="phone_number" 
                        name="phone_number" 
                        class="form-control" 
                        placeholder="Enter your phone number"
                        value="<?php echo isset($phone_number) ? htmlspecialchars($phone_number) : ''; ?>"
                        autocomplete="tel"
                    >
                </div>
                
                <!-- Address -->
                <div class="form-group">
                    <label for="address" class="form-label">
                        <i class="fas fa-map-marker-alt"></i> Address (Optional)
                    </label>
                    <textarea 
                        id="address" 
                        name="address" 
                        class="form-control" 
                        placeholder="Enter your address"
                        rows="2"
                        autocomplete="street-address"
                    ><?php echo isset($address) ? htmlspecialchars($address) : ''; ?></textarea>
                </div>
                
                <!-- Password -->
                <div class="form-row">
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
                                placeholder="Create a password"
                                required
                                autocomplete="new-password"
                                minlength="6"
                            >
                            <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <small class="form-hint">Minimum 6 characters</small>
                    </div>
                    
                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="confirm_password" class="form-label">
                            <i class="fas fa-lock"></i> Confirm Password
                        </label>
                        <div class="password-input-wrapper">
                            <input 
                                type="password" 
                                id="confirm_password" 
                                name="confirm_password" 
                                class="form-control" 
                                placeholder="Confirm your password"
                                required
                                autocomplete="new-password"
                                minlength="6"
                            >
                            <button type="button" class="password-toggle" onclick="togglePassword('confirm_password')">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Terms and Conditions -->
                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="terms" id="terms" required>
                        <span>I agree to the <a href="#" class="link-primary">Terms and Conditions</a> and <a href="#" class="link-primary">Privacy Policy</a></span>
                    </label>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    <i class="fas fa-user-plus"></i>
                    Create Account
                </button>
                
                <!-- Divider -->
                <div class="divider">
                    <span>OR</span>
                </div>
                
                <!-- Login Link -->
                <div class="login-link">
                    <p>Already have an account? <a href="login.php" class="link-primary">Sign in here</a></p>
                </div>
            </form>
            
            <!-- Footer -->
            <div class="register-footer">
                <p class="copyright">&copy; 2024 E-School. All rights reserved.</p>
            </div>
        </div>
        
        <!-- Info Section -->
        <div class="info-section">
            <div class="info-content">
                <h2 class="info-title">Why Join E-School?</h2>
                <p class="info-description">Experience the future of education with our cutting-edge online learning platform</p>
                
                <div class="features-list">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-video"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Live Virtual Classes</h3>
                            <p>Join interactive sessions with real-time webcam integration and screen sharing</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Smart Attendance</h3>
                            <p>Automated attendance tracking with facial verification technology</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-book-reader"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Quality Resources</h3>
                            <p>Access comprehensive learning materials and assignments anytime, anywhere</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Track Progress</h3>
                            <p>Monitor your academic performance with detailed analytics and reports</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Collaborative Learning</h3>
                            <p>Connect with peers and teachers in a supportive learning environment</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Secure Platform</h3>
                            <p>Your data is protected with industry-standard security measures</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/js/particles.js"></script>
    <script src="assets/js/register.js"></script>
</body>
</html>
