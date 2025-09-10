# PHP Blog CMS

A lightweight Content Management System (CMS) built with PHP and MySQL. The project allows admins to manage posts securely while providing a clean public interface for readers.

---
## ✨ Features
- Admin authentication (login/logout with session management)
- Secure session handling (session_regenerate_id, session timeout, cookie params)
- Post management (Create, Edit, Delete posts)
- Delete confirmation with Bootstrap modal
- Error & success messages for all actions
- Featured image upload (optional enhancement)
- Public-facing pages:
    - Homepage – list of posts
    - Single Post view
- Input sanitization (XSS protection with htmlspecialchars)
- Structured project with admin and public separation

---
## 🛠️ Technologies Used
- PHP (Procedural)
- MySQL (with prepared statements)
- HTML5 / CSS3 / Bootstrap 5
- Git & GitHub

---
## 📂 Project Structure
Blog-CMS/
│── config.php          # Database connection
│── authenticate.php    # Authentication logic
│── README.md           # Documentation
|── screenshots         # README screenshots
│
├── admin/              # Admin-only pages
│   ├── auth_check.php  # Session validation
│   ├── login.php       # Admin login
│   ├── logout.php      # Logout
│   ├── dashboard.php   # Admin dashboard
│   ├── posts.php       # Manage posts
│   ├── create_post.php # Add new post
│   ├── edit_post.php   # Update post
│   ├── delete_post.php # Delete post
│
├── public/             # Public-facing pages
│   ├── index.php       # Blog homepage
│   └── post.php        # Single post view

⚙️ Setup Instructions
1. Clone the repo: git clone https://github.com/dikewonsi/Blog-CMS.git
2. Import the database:
     - Create a MySQL database (e.g., blog_cms)
     - Import the provided SQL file.
3. Configure database in config.php:
     $conn = mysqli_connect("localhost", "root", "", "blog_cms");
4. Run the app on your local server (XAMPP, WAMP, Laragon, etc.)
5. Login to /admin/login.php with the seeded admin account, or create your own in the database.
6. Start managing posts!

Screenshots
-------------
1. Admin Login (screenshots/login.png)
2. Dashboard - (screenshots/dashboard.png)
3. Manage Posts - (screenshots/manage.png)
4. Create Post - (screenshots/create-post.png)
6. Delete Confirmation - (screenshots/delete-modal.png)
7. Public Homepage - (screenshots/all-posts.png)
8. Single Post View - (screenshots/single-post.png)