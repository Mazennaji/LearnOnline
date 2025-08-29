# LearnOnline

LearnOnline 📚💻
LearnOnline is a full-featured online learning platform that allows students to enroll in courses, track progress, leave reviews, and make payments. The platform is built with HTML, CSS, JavaScript, PHP, and MySQL and supports both free and paid courses.

Project Goals 🎯
The goal of this project is to provide a modern and interactive E-learning platform where users can:
⚪ Browse and search courses by category.
⚪ View detailed course descriptions, weekly breakdowns, and pricing.
⚪ Enroll in both free and paid courses.
⚪ Leave star-based reviews and feedback.
⚪ Unenroll from courses when desired.
⚪ Make secure payments for premium courses.
This project demonstrates full-stack web development with database integration, user authentication, and payment system implementation.

Features
✅ User Authentication (Login/Register)
✅ Browse courses with categories and search functionality
✅ Detailed course view with instructor info, duration, and weekly content
✅ Star-based review system with JSON storage
✅ Enroll & Unenroll functionality
✅ Payment integration for premium courses
✅ Responsive UI with Bootstrap

Tech Stack 🛠️
⚪ Frontend: HTML, CSS, Bootstrap, JavaScript
⚪ Backend: PHP
⚪ Database: MySQL
⚪ Data Storage: JSON (for reviews)

Steps Performed 📌
⚪ Frontend Development
    • Designed responsive UI using HTML, CSS, Bootstrap.
    • Added dynamic interactivity with JavaScript.
⚪ Database Setup
    • Designed relational database with courses, users, and enrollments tables.
    • Connected frontend and backend using PHP + MySQL (PDO).
⚪ Course Management
    • Stored course data in courses.json (101 detailed course entries).
    • Displayed full details including price, description, and weekly breakdown.
⚪ Enrollment System
    • Implemented logic for free and paid courses.
    • Users can enroll/unenroll depending on login state and payment status.
⚪ Review System
    • Added a 5-star rating system.
    • Reviews stored in reviews.json.
⚪ Payment Integration
    • Built payment handling for paid courses.
    • Securely validates user transactions.
    
📊 Project Structure
 LearnOnline/
│── assets/            # Images, CSS, JS files  
│── includes/          # Reusable PHP components (header, footer, etc.)  
│── database/          # MySQL setup and scripts  
│── courses.json       # Course data  
│── reviews.json       # Review data  
│── index.php          # Homepage  
│── course_detail.php  # Full course details page  
│── enroll.php         # Handles enrollment  
│── payment.php        # Payment system  
│── unenroll.php       # Handles unenrollment  
│── login.php          # User authentication  
│── register.php       # User registration  

🔑 How It Works
⚪Browse Courses – User navigates through categories and views details.
⚪Enroll – If free → enroll directly. If paid → proceed to payment.
⚪Learn – Access weekly breakdowns and course content.
⚪Review – Submit star ratings and feedback.
⚪Unenroll – Opt out from any enrolled course.

🌐 Live Demo : learnonline.rf.gd

