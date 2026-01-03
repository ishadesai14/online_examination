<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Online Examination Website</title> 
    <!-- Link to Bootstrap CSS (you can use a CDN or a local file) --> 
    <linkrel="stylesheet" 
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <!-- Embedded CSS --> 
    <style> 
        /* Global styles */ 
        body { 
            font-family:Times New Roman; 
            margin: 0; 
            padding: 0; 
            background-color: #f2f2f2; /* Light gray background */ 
            color: #333; 
        } 
        /* Header styles */ 
        header {
             background-color: #000; /* Dark background */ 
            color: #fff; 
            padding: 15px 0; 
            font-size: 20px; 
            text-align: left; 
            position: fixed; /* Fixed position */ 
            top: 0; /* Stick to the top */ 
            width: 100%; /* Full width */ 
            z-index: 1000; /* Ensure it is above other content */ 
        } 
        body { 
            padding-top: 60px; /* Adjust the top padding to avoid content being 
hidden behind the fixed header */ 
        } 
        header nav ul { 
            list-style-type: none; 
            margin: 0; 
            padding: 0; 
        } 
        header nav ul li { 
            display: inline-block; 
            margin-right: 30px; 
        }
          header nav ul li a { 
            color: #fff; 
            text-decoration: none; 
            transition: color 0.3s; 
        } 
        header nav ul li a:hover { 
            color: #8c8c8c; 
        } 
        /* Banner styles */ 
        .banner { 
            background-image: url('banner.jpg'); 
            background-size: cover; 
            color: #000; 
            text-align: center; 
            padding: 100px 0; 
        } 
        .banner h1 { 
            font-size: 3.5em; /* Larger font size */ 
            margin-bottom: 20px; 
        } 
        .banner p { 
            font-size: 1.8em; /* Larger font size */ 
        }
         /* Section styles */ 
        .features, 
        .how-it-works, 
        .popular-courses, 
        .testimonials, 
        .call-to-action, 
        footer { 
            padding: 50px 0; /* Increased padding for better spacing */ 
            text-align: center; 
        } 
        .features h2, 
        .how-it-works h2, 
        .popular-courses h2, 
        .testimonials h2, 
        .call-to-action h2, 
        footer h2 { 
            font-size: 3em; /* Larger font size */ 
            margin-bottom: 40px; 
            color: #343a40; 
        } 
        .features ul { 
            list-style-type: none; 
            padding: 0; 
        } 
        .features ul li { 
            margin-bottom: 10px; /* Increased spacing between list items */ 
            font-size: 1.6em; /* Larger font size */ 
        } 
        .testimonial { 
            background-color: #f9f9f9; /* Light background */ 
            border-radius: 10px; 
            padding: 40px; /* Increased padding */ 
            margin: 0 auto 50px; 
            max-width: 800px; /* Increased maximum width */ 
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1); 
        } 
        .testimonial p { 
            font-style: italic; 
            font-size: 1.4em; /* Larger font size */ 
        } 
        .btn { 
            background-color: #007bff; 
            color: #fff; 
            padding: 18px 36px; 
            text-decoration: none; 
            border-radius: 8px; 
 font-size: 1.6em; /* Larger font size */ 
            transition: background-color 0.3s; 
        } 
        .btn:hover { 
            background-color: #0056b3; 
        } 
        footer { 
            background-color: #000; 
            color: #fff; 
            padding: 15px 0; /* Increased padding */ 
        } 
        footer p { 
            margin: 0; 
            font-size: 1.1em; /* Larger font size */ 
        } 
        /* New CSS for key features and how-it-works section */ 
        .container-info { 
            background-color: #f8f8f8; 
        } 
        .info-card, 
        .step-card { 
            margin-bottom: 30px; 
            padding: 20px; /* Added padding for hover effect */
             transition: transform 0.3s, box-shadow 0.3s; 
        } 
        .info-card:hover, 
        .step-card:hover { 
            transform: translateY(-10px); 
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); 
        } 
        .info-card img, 
        .step-card img { 
            max-width: 100%; 
            height: auto; 
        } 
        .info-card h3, 
        .step-card h3 { 
            margin-top: 15px; 
            font-size: 1.6em; 
        } 
        .info-card p, 
        .step-card p { 
            font-size: 1em; 
            color: #555; 
        } 
        /* Center heading styles */ 
            .center-heading { 
            text-align: center; 
        } 
        /* About Us Section Styles */ 
        .about-us { 
            padding: 50px 0; 
            background-color: #ffffff; /* White background for contrast */ 
            text-align: center; 
        } 
        .about-us h2 { 
            font-size: 3em; /* Larger font size for the heading */ 
            margin-bottom: 40px; 
            color: #343a40; /* Dark color for the heading */ 
        } 
        .about-us-text { 
            font-size: 1.4em; /* Larger font size for the text */ 
            color: #555; /* Medium dark text color */ 
            margin-bottom: 20px; /* Space between paragraphs */ 
            line-height: 1.6; /* Increased line height for better readability */ 
        } 
        .about-us-box { 
            background-color: #f9f9f9; /* Light background */ 
            border-radius: 10px;
              padding: 40px; /* Padding inside the box */ 
            margin: 0 auto; 
            max-width: 800px; /* Maximum width for the box */ 
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1); 
        } 
        /* Additional styling for carousel indicators */ 
        .carousel-indicators li { 
            background-color: #007bff; 
        } 
        .carousel-indicators .active { 
            background-color: #0056b3; 
        } 
    </style> 
</head> 
<body> 
    <header> 
        <nav> 
            <ul> 
                <li><a href="index.php">Home</a></li> 
                <li><a href="#about-us">About Us</a></li> 
                <!--<li><a href="#">Contact Us</a></li>--> 
                <li><a href="login.php">Login</a></li> 
                <li><a href="registration.php">SignUp</a></li> 
</ul> 
        </nav> 
    </header> 
    <!-- Banner Section --> 
    <section class="banner"> 
        <h1>Welcome to our Online Examination Platform</h1> 
        <p>Experience the convenience and flexibility of taking exams online.</p> 
    </section> 
    <!-- Features Section --> 
    <section class="container-fluid container-info"> 
        <h2 class="center-heading">Key Features</h2> 
        <div class="container"> 
            <div class="row justify-content-center pt-5"> 
                <div class="col-md-3 col-sm-6 info-card text-center"> 
                    <h3>Flexible Scheduling</h3> 
                    <p>Schedule your exams at your convenience.</p> 
                </div> 
                <div class="col-md-3 col-sm-6 info-card text-center"> 
                    <h3>Secure Environment</h3> 
                    <p>Take exams in a secure and monitored environment.</p> 
                </div> 
                <div class="col-md-3 col-sm-6 info-card text-center"> 
                    <h3>Instant Results</h3> 
   <p>Get your results immediately after completing the exam.</p> 
                </div> 
                <div class="col-md-3 col-sm-6 info-card text-center"> 
                    <h3>Access Anywhere</h3> 
                    <p>Take exams from any device with an internet connection.</p> 
                </div> 
            </div> 
        </div> 
    </section> 
    <!-- How It Works Section --> 
    <section class="container-fluid container-info"> 
        <h2 class="center-heading">How It Works</h2> 
        <div class="container"> 
            <div class="row justify-content-center pt-5"> 
                <div class="col-md-3 col-sm-6 step-card text-center"> 
                    <h3>Register</h3> 
                    <p>Sign up for an account on our platform. Provide your details to 
create a secure profile and gain access to our exam services.</p> 
                </div> 
                <div class="col-md-3 col-sm-6 step-card text-center"> 
                    <h3>Schedule</h3> 
                    <p>Choose a convenient time for your exam. Our flexible scheduling 
options allow you to select a time that fits your busy life.</p> 
    </div> 
                <div class="col-md-3 col-sm-6 step-card text-center"> 
                    <h3>Take Exam</h3> 
                    <p>Take your exam online with ease. Follow the instructions and 
complete your exam within the given time frame.</p> 
                </div> 
                <div class="col-md-3 col-sm-6 step-card text-center"> 
                    <h3>Receive Results</h3> 
                    <p>Get your results immediately after completing the exam. View your 
performance and analyze your strengths and weaknesses.</p> 
                </div> 
            </div> 
        </div> 
    </section> 
    <!-- Testimonials Section --> 
    <section class="testimonials"> 
        <h2>Testimonials</h2> 
        <div class="testimonial"> 
            <p>"I loved the flexibility of taking exams online. It saved me a lot of time 
and hassle."</p> 
            <p>- Amitabh Verma</p> 
        </div> 
    </section> 
    <!-- About Us Section -->
       <section id="about-us" class="about-us container-info"> 
        <h2 class="center-heading">About Us</h2> 
        <div id="aboutUsCarousel" class="carousel slide" data-ride="carousel" data
interval="5000"> 
            <div class="carousel-inner"> 
                <div class="carousel-item active"> 
                    <div class="about-us-box"> 
                        <p class="about-us-text"> 
                            Welcome to our Online Examination Platform, where we prioritize 
convenience, flexibility, and security for all your exam needs. Our platform is 
designed to provide a seamless and efficient examination experience, allowing you 
to focus on what truly matters – your performance. 
                        </p> 
                    </div> 
                </div> 
                <div class="carousel-item"> 
                    <div class="about-us-box"> 
                        <p class="about-us-text"> 
                            Our team is dedicated to creating a user-friendly and secure 
environment for students and professionals alike. With our cutting-edge technology 
and robust security measures, we ensure that your exams are conducted in a safe and 
monitored setting. 
                        </p> 
                    </div> 
                </div>
                <div class="carousel-item"> 
                    <div class="about-us-box"> 
                        <p class="about-us-text"> 
                            Join us today and experience the future of online examinations. 
Whether you're a student preparing for a crucial test or a professional seeking 
certification, our platform offers the tools and support you need to succeed. 
                        </p> 
                    </div> 
                </div> 
            </div> 
            <a class="carousel-control-prev" href="#aboutUsCarousel" role="button" 
data-slide="prev"> 
                <span class="carousel-control-prev-icon" aria-hidden="true"></span> 
                <span class="sr-only">Previous</span> 
            </a> 
            <a class="carousel-control-next" href="#aboutUsCarousel" role="button" 
data-slide="next"> 
                <span class="carousel-control-next-icon" aria-hidden="true"></span> 
                <span class="sr-only">Next</span> 
            </a> 
            <ol class="carousel-indicators"> 
                <lidata-target="#aboutUsCarousel" data-slide-to="0" class="active"></li> 
                <li data-target="#aboutUsCarousel" data-slide-to="1"></li> 
                <li data-target="#aboutUsCarousel" data-slide-to="2"></li>
                </ol> 
        </div> 
    </section> 
    <!-- Call to Action Section --> 
    <section class="call-to-action"> 
        <h2>Ready to get started?</h2> 
        <a href="registration.php" class="btn">Sign Up Now</a> 
        <a href="login.php" class="btn">Log In Now</a> 
    </section> 
    <!-- Footer Section --> 
    <footer> 
        <div class="contact-info"> 
            <p>Contact Us: ishadesai1409@gmail.com</p> 
        </div> 
        <div class="social-media"></div> 
        <div class="copyright"> 
            <p>&copy; 2024 Online Examination. All rights reserved.</p> 
        </div> 
    </footer> 
    <!-- Link to Bootstrap JS and dependencies (optional) --> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script 
src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"><
/script> 
    <script 
src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></scrip
t> 
    <!-- Smooth Scroll Script --> 
    <script> 
        document.querySelectorAll('header nav ul li a').forEach(anchor => { 
            anchor.addEventListener('click', function (e) { 
                if (this.getAttribute('href').startsWith('#')) { 
                    e.preventDefault(); 
                    document.querySelector(this.getAttribute('href')).scrollIntoView({ 
                        behavior: 'smooth' 
                    }); 
                } 
            }); 
        }); 
    </script> 
</body> 
</html>
