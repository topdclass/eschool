# E-School Online Learning Platform

## Overview
E-School is a comprehensive online learning platform designed for schools experiencing closures due to insecurity. The system enables students to attend virtual classes with webcam integration for attendance verification, while class representatives manage teacher admissions to ensure security and proper class management.

## Features

### 🎓 Student Features
- **Live Virtual Classes**: Join online classes with webcam and microphone support
- **Automatic Attendance**: Webcam snapshots automatically captured for attendance verification
- **Real-time Chat**: Communicate with teachers and classmates during sessions
- **Assignments**: View, submit, and track assignments
- **Learning Materials**: Access course materials uploaded by teachers
- **Attendance Tracking**: View personal attendance records and statistics

### 👨‍🏫 Teacher Features
- **Session Management**: Start and manage live online classes
- **Admission Requests**: Request admission from class representatives before starting sessions
- **Attendance Monitoring**: View real-time attendance with webcam verification
- **Assignment Creation**: Create and grade assignments
- **Material Upload**: Share learning materials with students
- **Student Management**: Track student progress and performance

### 🎯 Class Representative Features
- **Teacher Admission Control**: Approve or reject teacher requests to join classes
- **Session Monitoring**: Monitor all ongoing sessions in the class
- **Attendance Overview**: View class-wide attendance statistics
- **Classmate Management**: Access to class roster and student information

### 👤 Admin Features
- **User Management**: Manage students, teachers, and class representatives
- **Class Management**: Create and manage classes and subjects
- **System Settings**: Configure system-wide settings
- **Reports**: Generate attendance and performance reports

## Technology Stack

### Backend
- **PHP 7.4+**: Server-side scripting
- **MySQLi**: Database management
- **Session Management**: Secure user authentication

### Frontend
- **HTML5**: Structure and semantic markup
- **CSS3**: Modern styling with custom properties
- **JavaScript (ES6+)**: Interactive functionality
- **WebRTC API**: Webcam and microphone access

### Design
- **Custom CSS Framework**: Modern, responsive design system
- **Google Fonts**: Inter and Outfit font families
- **Font Awesome 6**: Icon library
- **Glassmorphism**: Modern UI effects
- **Gradient Backgrounds**: Premium visual aesthetics

## Installation

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Modern web browser with WebRTC support

### Setup Instructions

1. **Clone or Download the Project**
   ```
   Place the ESCHOOL APP folder in your web server directory (e.g., htdocs for XAMPP)
   ```

2. **Create Database**
   - Open phpMyAdmin or MySQL command line
   - Create a new database named `eschool_db`
   - Import the schema:
     ```sql
     mysql -u root -p eschool_db < database/schema.sql
     ```

3. **Configure Database Connection**
   - Open `config/database.php`
   - Update database credentials if needed:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_USER', 'root');
     define('DB_PASS', '');
     define('DB_NAME', 'eschool_db');
     ```

4. **Set Permissions**
   - Ensure the `uploads` directory is writable:
     ```
     chmod 777 uploads/
     chmod 777 uploads/snapshots/
     ```

5. **Access the Application**
   - Open your browser and navigate to:
     ```
     http://localhost/ESCHOOL APP/
     ```

## Default Login Credentials

### Admin
- **Username**: admin
- **Password**: admin123

### Demo Accounts
You can create additional accounts through the admin panel or use the quick login feature on the login page.

## Directory Structure

```
ESCHOOL APP/
├── api/                    # API endpoints
│   ├── handle-admission.php
│   ├── save-snapshot.php
│   └── ...
├── assets/                 # Static assets
│   ├── css/               # Stylesheets
│   │   ├── style.css
│   │   ├── login.css
│   │   ├── dashboard.css
│   │   └── classroom.css
│   ├── js/                # JavaScript files
│   │   ├── particles.js
│   │   ├── login.js
│   │   ├── webcam.js
│   │   ├── classroom.js
│   │   └── dashboard.js
│   └── images/            # Image files
├── config/                # Configuration files
│   └── database.php
├── database/              # Database schema
│   └── schema.sql
├── student/               # Student portal
│   ├── dashboard.php
│   ├── join-class.php
│   └── ...
├── teacher/               # Teacher portal
│   ├── dashboard.php
│   ├── teach-class.php
│   └── ...
├── class_rep/             # Class representative portal
│   ├── dashboard.php
│   └── ...
├── admin/                 # Admin portal
│   └── ...
├── uploads/               # Uploaded files
│   └── snapshots/         # Webcam snapshots
├── login.php              # Login page
├── logout.php             # Logout script
└── index.php              # Landing page
```

## Key Features Explained

### Webcam Integration
The system uses the WebRTC API to access student and teacher webcams:
- Automatic snapshot capture when students join classes
- Manual snapshot option for attendance verification
- Snapshots stored securely in the database
- Privacy controls for camera and microphone

### Admission Control System
Security feature where class representatives control teacher access:
1. Teacher requests to start a session
2. Class representative receives notification
3. Class rep approves or rejects the request
4. Upon approval, session becomes active
5. Students can join the approved session

### Real-time Features
- Live session status updates
- Chat messaging during classes
- Participant list with online status
- Session timer and duration tracking

## Browser Compatibility

### Recommended Browsers
- Google Chrome 90+
- Mozilla Firefox 88+
- Microsoft Edge 90+
- Safari 14+

### Required Browser Features
- WebRTC support
- MediaDevices API
- getUserMedia API
- Canvas API for snapshot capture

## Security Features

1. **Session Management**: Secure PHP sessions with timeout
2. **Input Sanitization**: All user inputs sanitized to prevent SQL injection
3. **Password Hashing**: Bcrypt password hashing
4. **Role-based Access Control**: Different permissions for each user type
5. **Webcam Verification**: Visual attendance confirmation
6. **Admission Control**: Class rep approval required for sessions

## Troubleshooting

### Webcam Not Working
- Ensure browser has camera permissions
- Check if camera is not being used by another application
- Try using HTTPS (required for some browsers)
- Check browser console for errors

### Database Connection Error
- Verify database credentials in `config/database.php`
- Ensure MySQL service is running
- Check if database `eschool_db` exists

### Session Not Starting
- Clear browser cache and cookies
- Check if class representative has approved the request
- Verify teacher is assigned to the subject

## Future Enhancements

- [ ] Video recording of sessions
- [ ] Screen sharing for teachers
- [ ] Whiteboard functionality
- [ ] Breakout rooms for group work
- [ ] Mobile application
- [ ] Email notifications
- [ ] SMS alerts
- [ ] Advanced analytics and reporting
- [ ] Integration with learning management systems

## Support

For issues, questions, or contributions:
- Check the documentation
- Review the code comments
- Test with default credentials first

## License

This project is developed for educational purposes.

## Credits

- **Design**: Modern UI/UX with glassmorphism effects
- **Icons**: Font Awesome 6
- **Fonts**: Google Fonts (Inter, Outfit)
- **Framework**: Custom PHP/MySQLi implementation

---

**Version**: 1.0.0  
**Last Updated**: November 2024  
**Developer**: E-School Development Team
