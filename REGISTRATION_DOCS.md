# Registration System Documentation

## Overview
The E-School registration system allows new users to create accounts as Students, Teachers, or Class Representatives. The system features modern UI/UX design, comprehensive validation, and secure password handling.

## Files Created

### 1. `register.php` (Main Registration Page)
- **Location**: `c:\Users\SurFace Book\Desktop\ESCHOOL APP\register.php`
- **Purpose**: User registration interface with role-based signup
- **Features**:
  - Role selection (Student, Teacher, Class Representative)
  - Form validation (client-side and server-side)
  - Password strength requirements
  - Email and username uniqueness checking
  - Secure password hashing using PHP's `password_hash()`
  - Responsive design matching login page aesthetics

### 2. `assets/css/register.css` (Styling)
- **Location**: `c:\Users\SurFace Book\Desktop\ESCHOOL APP\assets\css\register.css`
- **Purpose**: Modern, responsive styling for registration page
- **Features**:
  - Glassmorphism effects
  - Animated user type selector cards
  - Smooth transitions and hover effects
  - Mobile-responsive layout
  - Custom scrollbar styling
  - Password strength indicator styling

### 3. `assets/js/register.js` (Client-side Logic)
- **Location**: `c:\Users\SurFace Book\Desktop\ESCHOOL APP\assets\js\register.js`
- **Purpose**: Interactive form validation and user experience enhancements
- **Features**:
  - Real-time password match validation
  - Username format validation (3-20 characters, alphanumeric + underscore)
  - Email format validation
  - Password strength indicator (5 levels: Very Weak to Strong)
  - Toggle password visibility
  - Auto-dismiss success alerts
  - Form submission loading state

## Registration Form Fields

### Required Fields:
1. **User Type** (Radio buttons)
   - Student
   - Teacher
   - Class Representative

2. **Full Name** (Text input)
   - Validation: Required
   - Stored in: `users.full_name`

3. **Username** (Text input)
   - Validation: Required, 3-20 characters, alphanumeric + underscore only
   - Uniqueness: Checked against database
   - Stored in: `users.username`

4. **Email Address** (Email input)
   - Validation: Required, valid email format
   - Uniqueness: Checked against database
   - Stored in: `users.email`

5. **Password** (Password input)
   - Validation: Required, minimum 6 characters
   - Security: Hashed using `password_hash()` with PASSWORD_DEFAULT
   - Stored in: `users.password_hash`

6. **Confirm Password** (Password input)
   - Validation: Must match password field

### Optional Fields:
1. **Phone Number** (Tel input)
   - Stored in: `users.phone_number`

2. **Address** (Textarea)
   - Stored in: `users.address`

### Additional Requirements:
- **Terms and Conditions** (Checkbox)
  - Must be checked to submit form

## Validation Rules

### Server-Side Validation:
1. All required fields must be filled
2. Email must be valid format
3. Password must be at least 6 characters
4. Passwords must match
5. User type must be valid (student, teacher, or class_rep)
6. Username must be unique
7. Email must be unique

### Client-Side Validation:
1. Real-time username format checking (alphanumeric + underscore, 3-20 chars)
2. Real-time email format validation
3. Real-time password match checking
4. Password strength indicator (5 levels)
5. Visual feedback (green/red borders)

## Password Security

### Strength Levels:
1. **Very Weak** (20%) - Less than 6 characters
2. **Weak** (40%) - 6+ characters
3. **Fair** (60%) - 10+ characters or mixed case
4. **Good** (80%) - Mixed case + numbers
5. **Strong** (100%) - Mixed case + numbers + special characters

### Hashing:
- Algorithm: `PASSWORD_DEFAULT` (currently bcrypt)
- Cost: Default (10 rounds)
- Storage: 255 character field in database

## User Experience Features

### Visual Feedback:
- ✅ Green border for valid input
- ❌ Red border for invalid input
- 💪 Real-time password strength indicator
- 👁️ Toggle password visibility
- ⏳ Loading state on form submission

### Animations:
- Slide-in animations for form and info section
- Bounce animation for logo
- Hover effects on user type cards
- Smooth transitions on all interactive elements

### Responsive Design:
- **Desktop (1200px+)**: Two-column layout with features list
- **Tablet (768px-1199px)**: Single column, features hidden
- **Mobile (< 768px)**: Optimized single column layout
- **Small Mobile (< 480px)**: Stacked user type cards

## Database Integration

### Table: `users`
Fields populated during registration:
- `username` - Unique username
- `email` - Unique email address
- `password_hash` - Hashed password
- `full_name` - User's full name
- `user_type` - Role (student, teacher, class_rep)
- `phone_number` - Optional phone number
- `address` - Optional address
- `is_active` - Set to 1 (active)
- `date_registered` - Auto-populated (CURRENT_TIMESTAMP)
- `created_at` - Auto-populated (CURRENT_TIMESTAMP)

## Error Handling

### Common Errors:
1. **Empty required fields**: "Please fill in all required fields"
2. **Invalid email**: "Please enter a valid email address"
3. **Short password**: "Password must be at least 6 characters long"
4. **Password mismatch**: "Passwords do not match"
5. **Invalid user type**: "Invalid user type selected"
6. **Username taken**: "Username already exists. Please choose another one."
7. **Email taken**: "Email already registered. Please use another email or login."
8. **Database error**: "Registration failed. Please try again."

### Success Message:
"Registration successful! You can now login with your credentials."

## Security Measures

1. **Input Sanitization**: All inputs sanitized using `sanitize_input()` function
2. **Password Hashing**: Passwords hashed using bcrypt algorithm
3. **SQL Injection Prevention**: Using parameterized queries (via helper functions)
4. **XSS Prevention**: Output escaped using `htmlspecialchars()`
5. **CSRF Protection**: Session-based (can be enhanced with tokens)
6. **Email Validation**: Server-side validation using `filter_var()`
7. **Username Validation**: Pattern matching for allowed characters

## Integration with Existing System

### Login Integration:
- Link to login page: `login.php`
- Login page has link back to registration: `register.php`

### Session Management:
- Redirects logged-in users to their respective dashboards
- Uses existing session checking from `config/database.php`

### Database Functions Used:
- `sanitize_input()` - Input sanitization
- `get_single_row()` - Query single record
- `execute_query()` - Execute INSERT/UPDATE queries
- `is_logged_in()` - Check if user is logged in

## Testing Checklist

### Functional Testing:
- [ ] Register as Student
- [ ] Register as Teacher
- [ ] Register as Class Representative
- [ ] Test duplicate username
- [ ] Test duplicate email
- [ ] Test password mismatch
- [ ] Test short password
- [ ] Test invalid email format
- [ ] Test invalid username format
- [ ] Test successful registration
- [ ] Test login after registration

### UI/UX Testing:
- [ ] Responsive design on mobile
- [ ] Responsive design on tablet
- [ ] Responsive design on desktop
- [ ] Password visibility toggle
- [ ] Password strength indicator
- [ ] Real-time validation feedback
- [ ] Form submission loading state
- [ ] Alert auto-dismiss
- [ ] Smooth animations

### Security Testing:
- [ ] SQL injection attempts
- [ ] XSS attempts
- [ ] Password hashing verification
- [ ] Session hijacking prevention
- [ ] CSRF protection

## Future Enhancements

### Potential Improvements:
1. **Email Verification**: Send verification email before activation
2. **CAPTCHA**: Add reCAPTCHA to prevent bot registrations
3. **Profile Photo Upload**: Allow users to upload profile picture during registration
4. **Social Login**: Integration with Google, Facebook, etc.
5. **Two-Factor Authentication**: Optional 2FA setup
6. **Password Recovery**: Forgot password functionality
7. **Username Suggestions**: Suggest available usernames if taken
8. **Class Selection**: Allow students to select class during registration
9. **Teacher Verification**: Admin approval for teacher accounts
10. **Registration Analytics**: Track registration metrics

## Troubleshooting

### Common Issues:

**Issue**: Form doesn't submit
- **Solution**: Check browser console for JavaScript errors
- **Solution**: Verify all required fields are filled
- **Solution**: Check terms and conditions checkbox

**Issue**: "Registration failed" error
- **Solution**: Check database connection
- **Solution**: Verify `users` table exists
- **Solution**: Check database user permissions

**Issue**: Password strength indicator not showing
- **Solution**: Verify `register.js` is loaded
- **Solution**: Check browser console for errors
- **Solution**: Clear browser cache

**Issue**: Styling looks broken
- **Solution**: Verify `register.css` is loaded
- **Solution**: Check `style.css` (base styles) is loaded
- **Solution**: Clear browser cache

**Issue**: Redirects to dashboard after registration
- **Solution**: This is expected if user is already logged in
- **Solution**: Logout first, then access registration page

## Support

For issues or questions:
1. Check this documentation
2. Review error messages in browser console
3. Check PHP error logs
4. Verify database schema matches `database/schema.sql`
5. Ensure all dependencies are installed

## Changelog

### Version 1.0.0 (2024-11-24)
- Initial release
- User registration with role selection
- Real-time form validation
- Password strength indicator
- Responsive design
- Security measures implemented
