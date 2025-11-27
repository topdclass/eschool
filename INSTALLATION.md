# E-School Installation Guide

## Quick Start Guide

Follow these steps to get your E-School platform up and running:

### Step 1: Prerequisites Check

Before installation, ensure you have:
- ✅ PHP 7.4 or higher installed
- ✅ MySQL 5.7 or higher installed
- ✅ Apache or Nginx web server
- ✅ phpMyAdmin (recommended) or MySQL command line access
- ✅ Modern web browser (Chrome, Firefox, Edge, or Safari)

### Step 2: Server Setup

#### For XAMPP Users:
1. Download and install XAMPP from https://www.apachefriends.org/
2. Start Apache and MySQL services from XAMPP Control Panel
3. Copy the "ESCHOOL APP" folder to `C:\xampp\htdocs\`

#### For WAMP Users:
1. Download and install WAMP from http://www.wampserver.com/
2. Start WAMP server
3. Copy the "ESCHOOL APP" folder to `C:\wamp64\www\`

#### For Linux Users:
1. Install LAMP stack:
   ```bash
   sudo apt update
   sudo apt install apache2 mysql-server php libapache2-mod-php php-mysql
   ```
2. Copy the "ESCHOOL APP" folder to `/var/www/html/`

### Step 3: Database Setup

#### Method 1: Using phpMyAdmin (Recommended)
1. Open your browser and go to `http://localhost/phpmyadmin`
2. Click on "New" in the left sidebar
3. Create a database named `eschool_db`
4. Select the `eschool_db` database
5. Click on "Import" tab
6. Click "Choose File" and select `database/schema.sql` from the ESCHOOL APP folder
7. Click "Go" to import the database

#### Method 2: Using MySQL Command Line
1. Open Command Prompt (Windows) or Terminal (Linux/Mac)
2. Navigate to the ESCHOOL APP directory
3. Run these commands:
   ```bash
   mysql -u root -p
   CREATE DATABASE eschool_db;
   USE eschool_db;
   SOURCE database/schema.sql;
   EXIT;
   ```

### Step 4: Configure Database Connection

1. Open the file `config/database.php` in a text editor
2. Update the database credentials if needed:
   ```php
   define('DB_HOST', 'localhost');     // Usually 'localhost'
   define('DB_USER', 'root');          // Your MySQL username
   define('DB_PASS', '');              // Your MySQL password
   define('DB_NAME', 'eschool_db');    // Database name
   ```
3. Save the file

### Step 5: Set File Permissions

#### For Windows:
- Right-click on the `uploads` folder
- Properties → Security → Edit
- Give "Full Control" to "Users"

#### For Linux/Mac:
```bash
cd /var/www/html/ESCHOOL\ APP
chmod -R 777 uploads/
chmod -R 777 uploads/snapshots/
```

### Step 6: Create Required Directories

Ensure these directories exist:
```
ESCHOOL APP/
├── uploads/
│   ├── snapshots/
│   ├── assignments/
│   ├── materials/
│   └── profiles/
```

If they don't exist, create them manually.

### Step 7: Access the Application

1. Open your web browser
2. Navigate to:
   - For XAMPP/WAMP: `http://localhost/ESCHOOL APP/`
   - For custom setup: `http://your-domain/ESCHOOL APP/`

3. You should see the E-School landing page

### Step 8: First Login

Use these default credentials to login:

**Admin Account:**
- Username: `admin`
- Password: `admin123`

**Important:** Change the default admin password immediately after first login!

### Step 9: Initial Configuration

After logging in as admin:

1. **Create Classes:**
   - Go to Admin Dashboard → Classes
   - Add your school classes (e.g., Grade 10A, Grade 11B)

2. **Create Subjects:**
   - Go to Admin Dashboard → Subjects
   - Add subjects (e.g., Mathematics, English, Science)

3. **Create Users:**
   - Add Teachers
   - Add Students
   - Assign Class Representatives

4. **Assign Subjects to Classes:**
   - Link subjects to classes
   - Assign teachers to subjects

### Step 10: Test the System

1. **Test Student Login:**
   - Create a test student account
   - Login and explore the student dashboard

2. **Test Teacher Login:**
   - Create a test teacher account
   - Try starting a session

3. **Test Class Rep Login:**
   - Assign a student as class representative
   - Test the admission approval system

4. **Test Webcam:**
   - Join a live class
   - Ensure webcam permissions are granted
   - Verify snapshot capture works

## Troubleshooting

### Issue: Database Connection Error

**Solution:**
1. Verify MySQL service is running
2. Check database credentials in `config/database.php`
3. Ensure database `eschool_db` exists
4. Test connection using phpMyAdmin

### Issue: Webcam Not Working

**Solution:**
1. Use HTTPS (webcam requires secure connection in some browsers)
2. Grant camera permissions when prompted
3. Check if camera is being used by another application
4. Try a different browser

### Issue: Page Not Found (404)

**Solution:**
1. Verify the URL is correct
2. Check if Apache/Nginx is running
3. Ensure mod_rewrite is enabled (for Apache)
4. Check file permissions

### Issue: Blank White Page

**Solution:**
1. Enable error reporting in PHP:
   - Edit `php.ini`
   - Set `display_errors = On`
   - Restart Apache
2. Check PHP error logs
3. Verify all required PHP extensions are installed

### Issue: Upload Directory Not Writable

**Solution:**
1. Set correct permissions on uploads folder
2. For Windows: Give "Full Control" to Users
3. For Linux: `chmod 777 uploads/`

## Security Recommendations

### After Installation:

1. **Change Default Password:**
   - Login as admin
   - Go to Profile → Change Password
   - Use a strong password

2. **Update Database Credentials:**
   - Use a strong MySQL password
   - Don't use 'root' user in production

3. **Enable HTTPS:**
   - Get an SSL certificate
   - Configure your web server for HTTPS
   - This is required for webcam functionality in production

4. **Disable Directory Listing:**
   - Add to `.htaccess`:
     ```
     Options -Indexes
     ```

5. **Set Proper File Permissions:**
   - Only uploads folder should be writable
   - Other files should be read-only

## Performance Optimization

1. **Enable PHP OPcache:**
   - Edit `php.ini`
   - Set `opcache.enable=1`

2. **Optimize MySQL:**
   - Add indexes to frequently queried columns
   - Enable query caching

3. **Enable Gzip Compression:**
   - Add to `.htaccess`:
     ```
     <IfModule mod_deflate.c>
       AddOutputFilterByType DEFLATE text/html text/css text/javascript
     </IfModule>
     ```

## Backup Recommendations

### Regular Backups:

1. **Database Backup:**
   ```bash
   mysqldump -u root -p eschool_db > backup_$(date +%Y%m%d).sql
   ```

2. **Files Backup:**
   - Backup the entire ESCHOOL APP folder
   - Especially the `uploads` directory

3. **Automated Backups:**
   - Set up cron jobs (Linux) or Task Scheduler (Windows)
   - Backup daily to a secure location

## Support and Help

If you encounter issues:

1. Check the README.md file
2. Review the troubleshooting section above
3. Check browser console for JavaScript errors
4. Check PHP error logs
5. Verify all prerequisites are met

## Next Steps

After successful installation:

1. Customize the system settings
2. Add your school logo
3. Configure email notifications (if needed)
4. Train teachers and students on using the platform
5. Conduct a test session before going live

---

**Congratulations!** Your E-School platform is now ready to use! 🎉

For questions or support, refer to the README.md file or check the code documentation.
