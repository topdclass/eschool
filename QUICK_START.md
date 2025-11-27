# E-School Quick Start Guide

## 🚀 Get Started in 5 Minutes!

### Step 1: Setup (2 minutes)

1. **Extract the files**
   - Place the "ESCHOOL APP" folder in your web server directory
   - For XAMPP: `C:\xampp\htdocs\`
   - For WAMP: `C:\wamp64\www\`

2. **Start your server**
   - Open XAMPP/WAMP Control Panel
   - Start Apache and MySQL

### Step 2: Create Database (1 minute)

1. Open phpMyAdmin: `http://localhost/phpmyadmin`
2. Click "New" → Create database: `eschool_db`
3. Select the database → Click "Import"
4. Choose file: `ESCHOOL APP/database/schema.sql`
5. Click "Go"

### Step 3: Access the System (30 seconds)

1. Open browser: `http://localhost/ESCHOOL APP/`
2. Click "Login to Your Account"

### Step 4: Login (30 seconds)

**Default Admin Credentials:**
- Username: `admin`
- Password: `admin123`

### Step 5: Explore! (1 minute)

✅ You're in! Now explore the features.

---

## 📱 User Roles & Access

### 👤 Admin
**What you can do:**
- Manage all users
- Create classes and subjects
- Assign teachers to subjects
- View system reports
- Configure settings

**Quick Actions:**
1. Add a new class
2. Create subjects
3. Add teachers and students
4. Assign class representatives

### 👨‍🏫 Teacher
**What you can do:**
- Start live sessions
- Take attendance
- Create assignments
- Upload materials
- View student progress

**Quick Actions:**
1. Click "Start New Session"
2. Select your class and subject
3. Wait for class rep approval
4. Begin teaching!

### 🎓 Student
**What you can do:**
- Join live classes
- Submit assignments
- View attendance
- Access materials
- Chat with teachers

**Quick Actions:**
1. Check for live classes
2. Click "Join Class Now"
3. Allow webcam access
4. Attend the class!

### 🎯 Class Representative
**What you can do:**
- Approve teacher requests
- Monitor class sessions
- View classmate list
- Track attendance

**Quick Actions:**
1. Check pending requests
2. Approve/Reject teachers
3. Monitor live sessions
4. View class statistics

---

## 🎥 Using the Virtual Classroom

### For Students:

1. **Join a Class**
   - Go to Dashboard
   - Find "Live Classes" section
   - Click "Join Class Now"

2. **Allow Webcam**
   - Browser will ask for camera permission
   - Click "Allow"
   - Your video will appear

3. **During Class**
   - Use controls at bottom:
     - 📹 Toggle camera
     - 🎤 Toggle microphone
     - ✋ Raise hand
     - 💬 Open chat
     - 📸 Take snapshot

4. **Leave Class**
   - Click "Leave" button
   - Confirm exit

### For Teachers:

1. **Start a Session**
   - Click "Start New Session"
   - Select class and subject
   - Add topic (optional)
   - Click "Start Session"

2. **Wait for Approval**
   - Class rep will receive notification
   - Wait for approval
   - You'll be redirected automatically

3. **Teach**
   - Your webcam activates
   - See all students
   - Use chat for communication
   - Monitor attendance

4. **End Session**
   - Click "End Session"
   - Confirm
   - Attendance is saved automatically

### For Class Representatives:

1. **Receive Request**
   - Notification appears
   - View teacher details
   - Check subject and time

2. **Approve/Reject**
   - Click "Approve" to allow
   - Click "Reject" to deny
   - Teacher is notified

---

## 💡 Tips & Tricks

### Webcam Tips:
- ✅ Ensure good lighting
- ✅ Position camera at eye level
- ✅ Check background
- ✅ Test before class
- ✅ Close other apps using camera

### Performance Tips:
- ✅ Use Chrome or Firefox
- ✅ Close unnecessary tabs
- ✅ Ensure stable internet
- ✅ Update your browser
- ✅ Clear cache regularly

### Security Tips:
- ✅ Change default password
- ✅ Don't share credentials
- ✅ Logout after use
- ✅ Use strong passwords
- ✅ Enable HTTPS in production

---

## 🔧 Common Issues & Solutions

### Issue: Webcam not working
**Solution:**
1. Check browser permissions
2. Close other apps using camera
3. Try different browser
4. Restart computer

### Issue: Can't login
**Solution:**
1. Check username/password
2. Try default credentials
3. Clear browser cache
4. Check database connection

### Issue: Session not starting
**Solution:**
1. Wait for class rep approval
2. Check if you're assigned to subject
3. Verify database connection
4. Check error logs

### Issue: Page not loading
**Solution:**
1. Check if Apache is running
2. Verify URL is correct
3. Check file permissions
4. Review .htaccess file

---

## 📞 Getting Help

### Documentation:
- 📖 README.md - Full documentation
- 🔧 INSTALLATION.md - Detailed setup
- 📊 PROJECT_SUMMARY.md - Feature overview
- 📁 DIRECTORY_STRUCTURE.md - File organization

### Troubleshooting:
1. Check browser console (F12)
2. Review PHP error logs
3. Verify database connection
4. Check file permissions

### Support:
- Review documentation files
- Check code comments
- Test with default credentials
- Verify prerequisites

---

## 🎯 Next Steps

### After Initial Setup:

1. **Customize**
   - Change school name
   - Upload school logo
   - Update colors/theme
   - Configure settings

2. **Add Users**
   - Create teacher accounts
   - Add students
   - Assign class reps
   - Set up classes

3. **Test**
   - Create test class
   - Start test session
   - Join as student
   - Test all features

4. **Deploy**
   - Enable HTTPS
   - Set strong passwords
   - Configure backups
   - Train users

---

## ⚡ Keyboard Shortcuts

### Login Page:
- `Alt + S` - Quick login as Student
- `Alt + T` - Quick login as Teacher
- `Alt + A` - Quick login as Admin

### During Class:
- `Space` - Toggle microphone
- `V` - Toggle video
- `C` - Open chat
- `H` - Raise hand
- `Esc` - Close panels

---

## 📊 System Requirements

### Minimum:
- PHP 7.4+
- MySQL 5.7+
- 2GB RAM
- Modern browser

### Recommended:
- PHP 8.0+
- MySQL 8.0+
- 4GB RAM
- Chrome/Firefox latest
- SSD storage
- Stable internet

---

## ✅ Pre-Launch Checklist

Before going live:
- [ ] Database created and imported
- [ ] Default password changed
- [ ] Test all user roles
- [ ] Webcam tested
- [ ] HTTPS enabled
- [ ] Backups configured
- [ ] Users trained
- [ ] Documentation reviewed

---

## 🎉 You're Ready!

Congratulations! You now have a fully functional online school platform.

**Remember:**
- Start with test accounts
- Test all features thoroughly
- Train users before launch
- Keep backups
- Monitor performance

**Happy Teaching! 📚**

---

**Version**: 1.0.0  
**Last Updated**: November 2024  
**For Support**: Check documentation files
