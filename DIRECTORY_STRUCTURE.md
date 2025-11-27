# E-School Directory Structure

## Complete File and Folder Organization

```
ESCHOOL APP/
│
├── 📁 api/                                    # API Endpoints
│   ├── 📄 handle-admission.php                # Handle teacher admission requests
│   ├── 📄 save-snapshot.php                   # Save webcam snapshots
│   ├── 📄 send-chat-message.php               # Send chat messages (to be created)
│   ├── 📄 get-chat-messages.php               # Get chat messages (to be created)
│   ├── 📄 get-participants.php                # Get session participants (to be created)
│   ├── 📄 raise-hand.php                      # Handle hand raise (to be created)
│   ├── 📄 heartbeat.php                       # Session heartbeat (to be created)
│   ├── 📄 leave-session.php                   # Leave session (to be created)
│   ├── 📄 check-updates.php                   # Check for updates (to be created)
│   └── 📄 check-admission-requests.php        # Check new requests (to be created)
│
├── 📁 assets/                                 # Static Assets
│   │
│   ├── 📁 css/                                # Stylesheets
│   │   ├── 📄 style.css                       # Main stylesheet (4000+ lines)
│   │   ├── 📄 login.css                       # Login page styles
│   │   ├── 📄 dashboard.css                   # Dashboard styles
│   │   └── 📄 classroom.css                   # Virtual classroom styles
│   │
│   ├── 📁 js/                                 # JavaScript Files
│   │   ├── 📄 particles.js                    # Background particle animation
│   │   ├── 📄 login.js                        # Login page functionality
│   │   ├── 📄 webcam.js                       # Webcam management class
│   │   ├── 📄 classroom.js                    # Classroom interactions
│   │   ├── 📄 dashboard.js                    # Dashboard functionality
│   │   ├── 📄 class-rep.js                    # Class rep functions
│   │   └── 📄 teacher.js                      # Teacher functions (to be created)
│   │
│   └── 📁 images/                             # Image Assets
│       ├── 📄 logo.png                        # School logo
│       ├── 📄 default.jpg                     # Default profile photo
│       └── 📄 favicon.ico                     # Browser favicon
│
├── 📁 config/                                 # Configuration Files
│   └── 📄 database.php                        # Database configuration & utilities
│
├── 📁 database/                               # Database Files
│   └── 📄 schema.sql                          # Complete database schema
│
├── 📁 student/                                # Student Portal
│   ├── 📄 dashboard.php                       # Student dashboard
│   ├── 📄 join-class.php                      # Join live class
│   ├── 📄 classes.php                         # My classes (to be created)
│   ├── 📄 attendance.php                      # Attendance records (to be created)
│   ├── 📄 assignments.php                     # Assignments list (to be created)
│   ├── 📄 submit-assignment.php               # Submit assignment (to be created)
│   ├── 📄 materials.php                       # Learning materials (to be created)
│   ├── 📄 messages.php                        # Messages (to be created)
│   └── 📄 profile.php                         # Student profile (to be created)
│
├── 📁 teacher/                                # Teacher Portal
│   ├── 📄 dashboard.php                       # Teacher dashboard
│   ├── 📄 teach-class.php                     # Teach live class (to be created)
│   ├── 📄 my-classes.php                      # My classes (to be created)
│   ├── 📄 sessions.php                        # Session history (to be created)
│   ├── 📄 attendance.php                      # View attendance (to be created)
│   ├── 📄 assignments.php                     # Manage assignments (to be created)
│   ├── 📄 create-assignment.php               # Create assignment (to be created)
│   ├── 📄 materials.php                       # Upload materials (to be created)
│   ├── 📄 students.php                        # View students (to be created)
│   ├── 📄 profile.php                         # Teacher profile (to be created)
│   │
│   └── 📁 api/                                # Teacher API Endpoints
│       ├── 📄 start-session.php               # Start new session
│       └── 📄 end-session.php                 # End session (to be created)
│
├── 📁 class_rep/                              # Class Representative Portal
│   ├── 📄 dashboard.php                       # Class rep dashboard
│   ├── 📄 admission-requests.php              # Manage requests (to be created)
│   ├── 📄 class-sessions.php                  # View sessions (to be created)
│   ├── 📄 attendance.php                      # Class attendance (to be created)
│   ├── 📄 classmates.php                      # Classmate list (to be created)
│   └── 📄 profile.php                         # Profile (to be created)
│
├── 📁 admin/                                  # Admin Portal
│   ├── 📄 dashboard.php                       # Admin dashboard (to be created)
│   ├── 📄 users.php                           # Manage users (to be created)
│   ├── 📄 classes.php                         # Manage classes (to be created)
│   ├── 📄 subjects.php                        # Manage subjects (to be created)
│   ├── 📄 reports.php                         # Generate reports (to be created)
│   ├── 📄 settings.php                        # System settings (to be created)
│   └── 📄 profile.php                         # Admin profile (to be created)
│
├── 📁 uploads/                                # User Uploads
│   ├── 📁 snapshots/                          # Webcam snapshots
│   ├── 📁 assignments/                        # Assignment files
│   ├── 📁 materials/                          # Learning materials
│   └── 📁 profiles/                           # Profile photos
│
├── 📄 .htaccess                               # Apache configuration
├── 📄 index.php                               # Landing page
├── 📄 login.php                               # Login page
├── 📄 logout.php                              # Logout script
├── 📄 register.php                            # Registration page (to be created)
├── 📄 forgot-password.php                     # Password recovery (to be created)
├── 📄 unauthorized.php                        # Unauthorized access (to be created)
├── 📄 404.php                                 # 404 error page (to be created)
├── 📄 403.php                                 # 403 error page (to be created)
├── 📄 500.php                                 # 500 error page (to be created)
│
├── 📄 README.md                               # Main documentation
├── 📄 INSTALLATION.md                         # Installation guide
├── 📄 PROJECT_SUMMARY.md                      # Project summary
└── 📄 DIRECTORY_STRUCTURE.md                  # This file
```

## Directory Descriptions

### `/api/`
Contains all API endpoints for AJAX requests. These files handle data operations and return JSON responses.

**Purpose**: Backend logic for real-time features
**Access**: Called via JavaScript fetch/AJAX
**Security**: Session validation required

### `/assets/`
Static assets including CSS, JavaScript, and images.

#### `/assets/css/`
- **style.css**: Core design system with custom properties
- **login.css**: Login page specific styles
- **dashboard.css**: Dashboard layout and components
- **classroom.css**: Virtual classroom interface

#### `/assets/js/`
- **particles.js**: Animated background particles
- **login.js**: Login form handling and validation
- **webcam.js**: WebRTC webcam management class
- **classroom.js**: Live class interactions
- **dashboard.js**: Dashboard functionality
- **class-rep.js**: Class representative features

#### `/assets/images/`
- **logo.png**: School branding
- **default.jpg**: Default user avatar
- **favicon.ico**: Browser tab icon

### `/config/`
Configuration files for database and system settings.

**database.php**: 
- Database connection
- Helper functions
- Input sanitization
- Query execution utilities

### `/database/`
Database schema and migration files.

**schema.sql**:
- Complete database structure
- Default data
- Indexes and constraints

### `/student/`
Student portal with all student-facing features.

**Key Files**:
- **dashboard.php**: Main student dashboard
- **join-class.php**: Virtual classroom interface

### `/teacher/`
Teacher portal for class management.

**Key Files**:
- **dashboard.php**: Teacher control panel
- **teach-class.php**: Teaching interface

**API Subfolder**:
- Teacher-specific API endpoints

### `/class_rep/`
Class representative portal for admission control.

**Key Files**:
- **dashboard.php**: Class rep dashboard
- Admission request management

### `/admin/`
Administrative portal for system management.

**Features**:
- User management
- Class and subject configuration
- System settings
- Reports and analytics

### `/uploads/`
User-generated content storage.

**Subfolders**:
- **snapshots/**: Webcam attendance photos
- **assignments/**: Student submissions
- **materials/**: Teacher uploads
- **profiles/**: User profile pictures

**Security**: 
- Write permissions required
- File type validation
- Size restrictions

## File Naming Conventions

### PHP Files
- **Lowercase with hyphens**: `join-class.php`
- **Descriptive names**: `handle-admission.php`
- **Action-based**: `start-session.php`

### CSS Files
- **Lowercase with hyphens**: `dashboard.css`
- **Purpose-based**: `classroom.css`

### JavaScript Files
- **Lowercase with hyphens**: `class-rep.js`
- **Feature-based**: `webcam.js`

## Access Control

### Public Access
- `index.php` - Landing page
- `login.php` - Login page
- `register.php` - Registration

### Authenticated Access
- All `/student/` files
- All `/teacher/` files
- All `/class_rep/` files
- All `/admin/` files
- All `/api/` endpoints

### Role-Based Access
- **Student**: `/student/` directory
- **Teacher**: `/teacher/` directory
- **Class Rep**: `/class_rep/` directory
- **Admin**: `/admin/` directory

## File Permissions

### Recommended Permissions

**Linux/Mac**:
```bash
# PHP files
chmod 644 *.php

# Directories
chmod 755 */

# Upload directories
chmod 777 uploads/
chmod 777 uploads/snapshots/
chmod 777 uploads/assignments/
chmod 777 uploads/materials/
chmod 777 uploads/profiles/

# Configuration files
chmod 600 config/database.php
```

**Windows**:
- Read/Write for Users on upload directories
- Read-only for other files

## Important Notes

1. **Never commit** `config/database.php` with real credentials
2. **Always backup** the `uploads/` directory
3. **Secure** the `api/` directory from direct access
4. **Protect** the `config/` directory
5. **Monitor** the `uploads/` directory size

## Development Guidelines

### Adding New Features

1. **Create appropriate directory**
   - Student features → `/student/`
   - Teacher features → `/teacher/`
   - API endpoints → `/api/`

2. **Follow naming conventions**
   - Use descriptive names
   - Use hyphens for spaces
   - Keep lowercase

3. **Update documentation**
   - Add to README.md
   - Update this file
   - Comment your code

4. **Test thoroughly**
   - Check all user roles
   - Verify permissions
   - Test on mobile

## Maintenance Tasks

### Regular Checks
- [ ] Monitor upload directory size
- [ ] Review error logs
- [ ] Check database size
- [ ] Verify backups
- [ ] Update dependencies

### Security Audits
- [ ] Review file permissions
- [ ] Check for unauthorized files
- [ ] Verify access controls
- [ ] Test input validation
- [ ] Review session security

---

**Last Updated**: November 2024  
**Version**: 1.0.0  
**Maintained by**: E-School Development Team
