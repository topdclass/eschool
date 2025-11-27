<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-School - Online Learning Platform</title>
    <meta name="description" content="E-School Online Learning Platform - Secure virtual classrooms with webcam integration and attendance tracking">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: var(--spacing-2xl);
        }
        
        .hero-content {
            max-width: 800px;
            animation: fadeInUp 0.8s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .hero-title {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: var(--spacing-lg);
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: var(--spacing-2xl);
            opacity: 0.95;
        }
        
        .hero-buttons {
            display: flex;
            gap: var(--spacing-lg);
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .hero-btn {
            padding: 1.25rem 2.5rem;
            font-size: 1.125rem;
            border-radius: var(--radius-xl);
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-sm);
            transition: all var(--transition-base);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        .hero-btn-primary {
            background: white;
            color: var(--primary-color);
        }
        
        .hero-btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        }
        
        .hero-btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
            backdrop-filter: blur(10px);
        }
        
        .hero-btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
        }
        
        .features-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--spacing-xl);
            margin-top: var(--spacing-2xl);
            padding: var(--spacing-2xl);
        }
        
        .feature-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: var(--spacing-xl);
            border-radius: var(--radius-2xl);
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all var(--transition-base);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto var(--spacing-lg);
            font-size: 2.5rem;
            color: var(--primary-color);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .feature-title {
            font-size: 1.5rem;
            margin-bottom: var(--spacing-sm);
            color: white;
        }
        
        .feature-description {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.125rem;
            }
            
            .hero-buttons {
                flex-direction: column;
            }
            
            .features-section {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="animated-bg"></div>
    
    <!-- Floating Particles -->
    <div class="particles" id="particles"></div>
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-graduation-cap"></i>
                E-School
            </h1>
            <p class="hero-subtitle">
                Your Gateway to Quality Online Education<br>
                Learn Anywhere, Anytime with Live Virtual Classrooms
            </p>
            
            <div class="hero-buttons">
                <a href="login.php" class="hero-btn hero-btn-primary">
                    <i class="fas fa-sign-in-alt"></i>
                    Login to Your Account
                </a>
                <a href="register.php" class="hero-btn hero-btn-secondary">
                    <i class="fas fa-user-plus"></i>
                    Create New Account
                </a>
            </div>
            
            <!-- Features -->
            <div class="features-section">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <h3 class="feature-title">Live Classes</h3>
                    <p class="feature-description">
                        Join interactive virtual classrooms with real-time video and audio
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-camera"></i>
                    </div>
                    <h3 class="feature-title">Webcam Attendance</h3>
                    <p class="feature-description">
                        Automated attendance tracking with webcam verification
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h3 class="feature-title">Secure Access</h3>
                    <p class="feature-description">
                        Class representatives control teacher admission for security
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <h3 class="feature-title">Assignments</h3>
                    <p class="feature-description">
                        Submit and track assignments with online grading
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3 class="feature-title">Real-time Chat</h3>
                    <p class="feature-description">
                        Communicate with teachers and classmates during sessions
                    </p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="feature-title">Progress Tracking</h3>
                    <p class="feature-description">
                        Monitor your academic progress with detailed analytics
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <script src="assets/js/particles.js"></script>
</body>
</html>
