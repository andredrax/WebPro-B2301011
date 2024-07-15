<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses - Edswandres' Mathematics Hub</title>
    <link rel="stylesheet" href="styless.css">
    <link href="https://fonts.googleapis.com/css2?family=Proxima+Nova:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo">
                <a href="firsties.html">
                    <img src="NEW.jpg" alt="Edswandres' Mathematics Hub Logo" class="logo-image">
                </a>
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="firsties.php"><strong>Home</strong></a></li>
                    <li><a href="forum.html"><strong>Forum</strong></a></li>
                    <li><a href="quizzes.html"><strong>Quizzes</strong></a></li>
                    <li class="search-bar">
                        <input type="text" placeholder="Search..." class="search-input">
                        <button class="search-button">🔎</button>
                    </li>
                    <li><a href="certificate.html"><strong>Certificate</strong></a></li>
                    <li><a href="contactpage11.html"><strong>Contact & Support</strong></a></li>
                    <li><a href="login2.html"><strong>Login</strong></a></li>
                    <li>
                        <button class="dashboard-btn" onclick="openRightNav()">🧑</button>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    
    <div class="hero">
        <div class="slider">
            <div class="slides">
                <div class="slide" style="background-image: url('image11.jpg');"></div>
                <div class="slide" style="background-image: url('image4.jpg');"></div>
                <div class="slide" style="background-image: url('image13.jpg');"></div>
            </div>
            <div class="overlay"></div>
            <div class="hero-content">
                <h2>Welcome to Edswandres' Mathematics Hub</h2>
                <p>Your journey to excellence starts here.</p>
                <div class="search-bar">
                    <input type="text" placeholder="Search..." class="search-input">
                    <button class="search-button">🔎</button>
                </div>
                <div class="lets-go-btn">
                    <a href="/courses" class="btn">Let's Go</a>
                </div>
            </div>            
            <div class="nav-arrows">
                <div class="prev">&#10094;</div>
                <div class="next">&#10095;</div>
            </div>
        </div>
    </div>
    
   <!-- Right Sidebar (Dashboard) -->
<!-- Right Sidebar (Dashboard) -->
<!-- Right Sidebar (Dashboard) -->
<div id="rightSidebar" class="sidebar right-sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeRightNav()">×</a>
    <div class="profile-info">
        <div class="profile-emoji">🧑</div>
        <div class="progress-circle">
            <svg>
                <circle cx="50" cy="50" r="45"></circle>
                <circle cx="50" cy="50" r="45" id="progress"></circle>
            </svg>
            <div class="progress-value">75%</div>
            <?php
            // Start session to access session variables
            session_start();

            // Check if user is logged in
            if (isset($_SESSION['first_name'])) {
                $firstName = $_SESSION['first_name'];
                echo '<div class="profile-name">';
                echo '<p style="color: white;">' . $firstName . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <div class="sidebar-search">
        <input type="text" placeholder="Search..." class="search-input">
        <button class="search-button">🔎</button>
    </div>
    <a href="#">Recently Accessed Courses</a>
    <a href="#">Recently Accessed Quizzes</a>
    <a href="editprofile.html">Edit Profile</a> <!-- Updated link -->
    <a href="#">Track Your Progress</a>
    <a href="settingspage.html">Settings</a>
    <a href="#">Logout</a>
    
</div>



    <section class="features">
        <div class="container">
            <div class="feature-card">
                <img src="Beginnerq.jpg" alt="Beginner">
                <div class="card-content">
                    <h2>Beginner</h2>
                    <p><strong>Don't know where to start?🤷‍♂️</strong> Join the Beginner course</p>
                    <a href="beginner.html" class="btn-orange">Start Beginner Course</a>
                </div>
            </div>
            <div class="feature-card">
                <img src="Advanced.jpg" alt="Advanced">
                <div class="card-content">
                    <h2>Advanced</h2>
                    <p><strong>Looking for next level maths problems🧐</strong> Join us to learn more😍</p>
                    <a href="advanced-tutorial.html" class="btn-orange">Explore Advanced</a>
                </div>
            </div>
            <div class="feature-card">
                <img src="Expert.jpg" alt="Expert">
                <div class="card-content">
                    <h2>Expert</h2>
                    <p><strong>Want to explore more into the Mathematics world?</strong> Join the Expert course</p>
                    <a href="expert-tutorial.html" class="btn-orange">Master Expert Level</a>
                </div>
            </div>
        </div>
    </section>
    <section class="info-section learn-mathematics">
        <div class="container">
            <div class="section-text">
                <h2>Learn Mathematics</h2>
            </div>
            <div class="section-image">
                <img src="image1.jpg" alt="Learn Mathematics">
            </div>
            <div class="section-content">
                <p>Don't be shy, let's get started on your math journey.</p>
                <div class="btn-wrapper">
                    <a href="#" class="btn-orange">Don't be shy, click me!</a>
                </div>
            </div>
        </div>
    </section>
    <section class="info-section test-your-knowledge">
        <div class="container">
            <div class="section-text">
                <h2>Test your Knowledge</h2>
            </div>
            <div class="section-image">
                <img src="image8.jpg" alt="Test your Knowledge">
            </div>
            <div class="section-content">
                <p>Don't be shy, let's get started on your math journey.</p>
                <div class="btn-wrapper">
                    <a href="#" class="btn-orange">Don't be shy, click me!</a>
                </div>
            </div>
        </div>
    </section>
    <section class="info-section get-your-certificate">
        <div class="container">
            <div class="section-text">
                <h2>Get your Certificate</h2>
            </div>
            <div class="section-image">
                <img src="image10.jpg" alt="Get your Certificate">
            </div>
            <div class="section-content">
                <p>Don't be shy, let's get started on your math journey.</p>
                <div class="btn-wrapper">
                    <a href="#" class="btn-orange">Don't be shy, click me!</a>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="footer-container">
            <div class="footer-left">
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="footer-right">
                <div class="social-icons">
                    <a href="#" target="_blank" class="social-icon">
                        <img src="th.jpeg" alt="Facebook">
                    </a>
                    <a href="#" target="_blank" class="social-icon">
                        <img src="twitter.jpeg" alt="Twitter">
                    </a>
                    <a href="#" target="_blank" class="social-icon">
                        <img src="Instagram.jpeg" alt="Instagram">
                    </a>
                </div>
                <div class="about-us">
                    <p>About Us: Edswandres' Learning Hub is dedicated to providing quality education in mathematics.</p>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2024 Edswandres' Learning Hub. All rights reserved.</p>
        </div>
    </footer>
    <script src="scrips.js"></script>
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
        }

        function openRightNav() {
            document.getElementById("rightSidebar").style.width = "250px";
        }

        function closeRightNav() {
            document.getElementById("rightSidebar").style.width = "0";
        }
    </script>
</body>
</html>
