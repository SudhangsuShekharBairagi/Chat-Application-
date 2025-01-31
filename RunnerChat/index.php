<?php include_once "header.php"; ?>

<body>
    
    <div class="container">
   
        <nav class="navbar navbar-expand-lg navbarDesign " id="navbarSection">
            <div class="container-fluid containerdiv">
                <a class="navbar-brand brandName" href="#">RUNNER</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link hover-underline-animation" href="#featuresSection">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-underline-animation" href="#contactUs">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-underline-animation" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-underline-animation" href="signup.php">Sign Up</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <label for="theme-toggle" id="theme-toggle-icon">
                            <i class="fa-solid fa-moon"></i>
                        </label>
                        <input type="checkbox" class="theme-toggle" id="theme-toggle">
                    </span>
                </div>
            </div>
        </nav>

        <div class="hero">
            <div class="heroClass">
                <h1 id="heroHiding">WELCOME <span> <br>TO  </span> RUNNER <span> A CHAT APPLICATION<br></span></h1>
                <p>This platform is designed to provide users with a simple, secure, and fast way to communicate in
                    real-time.<br> Whether you're connecting with friends, family, or colleagues, our app allows for
                    seamless conversations.</p>
                <p>This chat application is a project developed as part of our 5th semester group minor project at
                    MAKUAT.<br> Our team of five friends came together to build this platform, combining our skills in
                    JavaScript, HTML, CSS, and PHP.<br> We've worked hard to create an intuitive and user-friendly
                    experience, and we hope you enjoy using it as much as we enjoyed creating it!</p>
                <a class="Mybtn" href="signup.php"><span>Get Started<span></a>
            </div>
        </div>
        <!-- features card  -->
        <section class="features" id="featuresSection">
            <h2 id="featuresHeader">Key Features</h2>
            <div class="featuresBox">
                <div class="card featuresCard card-all">
                    <div class="card-body card-index">
                        <i class="fas fa-comments"></i>
                        <h3 class="card-title">Real-time Messaging</h3>
                        <p class="card-body">Experience lightning-fast chat with friends and colleagues.</p>
                    </div>
                </div>

                <div class="card featuresCard card-all">
                    <div class="card-body card-index">
                        <i class="fas fa-file-upload"></i>
                        <h3 class="card-title">File Sharing</h3>
                        <p class="card-body">Easily share files, images, and videos within your conversations.</p>
                    </div>
                </div>

                <div class="card featuresCard card-all">
                    <div class="card-body card-index">
                        <i class="fas fa-lock"></i>
                        <h3 class="card-title">Secure Conversations</h3>
                        <p class="card-body">Your conversations are protected with end-to-end encryption.</p>
                    </div>
                </div>

                <div class="card featuresCard card-all">
                    <div class="card-body card-index">
                        <i class="fas fa-sync-alt"></i>
                        <h3 class="card-title">Cross-Platform Support</h3>
                        <p class="card-body">Access your chats on mobile, desktop, or any other device.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Users Say -->
        <section class="features" id="featuresSection">
            <h2 id="featuresHeader">What Our Users Say</h2>
            <div class="featuresBox">
                <div class="card featuresCard card-all">
                    <div class="card-body card-index">
                        <p class="card-body">“Super intuitive and easy to use! I love how smooth the conversations flow
                            without any delays.”</p>
                        <div class="stars">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <h3 class="card-title">- Shekhar B., Early User</h3>
                    </div>
                </div>

                <div class="card featuresCard card-all">
                    <div class="card-body card-index">
                        <p class="card-body">“The group chat feature is amazing! It's perfect for planning events with
                            friends or just having fun discussions.”</p>
                        <div class="stars">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <h3 class="card-title">- S Roy., Beta Tester</h3>
                    </div>
                </div>
                <div class="card featuresCard card-all">
                    <div class="card-body card-index">
                        <p class="card-body">“I'm impressed by the secure messaging. Knowing that my chats are encrypted
                            gives me peace of mind.”</p>
                        <div class="stars">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <h3 class="card-title">- Sujoy Sen., User</h3>
                    </div>
                </div>
              
            </div>
        </section>

        <!-- How chat works cards -->
        <section class="features" id="featuresSection">
            <h2 id="featuresHeader">How It Works</h2>
            <div class="featuresBox">
                <div class="card featuresCard card-all">
                    <div class="card-body card-index">
                        <i class="fas fa-comments"></i>
                        <h3 class="card-title">Sign Up</h3>
                        <p class="card-body">Create your account by signing up with your email address and choosing a
                            password. It's quick and easy!</p>
                    </div>
                </div>

                <div class="card featuresCard card-all">
                    <div class="card-body card-index">
                        <i class="fas fa-file-upload"></i>
                        <h3 class="card-title">Find Friends</h3>
                        <p class="card-body">Connect with your friends by searching for their usernames or adding them
                            directly to your contacts.</p>
                    </div>
                </div>

                <div class="card featuresCard card-all">
                    <div class="card-body card-index">
                        <i class="fas fa-lock"></i>
                        <h3 class="card-title">Start Chatting</h3>
                        <p class="card-body">Send text messages, emojis, and even create group chats for effortless
                            communication with friends or teams.</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- faq cards -->
        <section class="features" id="featuresSection">
            <h2 id="featuresHeader">Frequently Asked Questions</h2>
            <div class="featuresBox">
                <div class="card featuresCard card-all">
                    <div class="card-body card-index">
                        <h3 class="card-title">How can I sign up?</h3>
                        <p class="card-body">Signing up is easy! Just click on the "Sign Up" button on the homepage,
                            fill out your details, and you're ready to start chatting.</p>
                    </div>
                </div>

                <div class="card featuresCard card-all">
                    <div class="card-body card-index">
                        <h3 class="card-title">How do I reset my password?</h3>
                        <p class="card-body">We are still working on reset password feature. Sorry for your problem. If
                            you want to change your password now your can <a class="nav-link hover-underline-animation"
                                href="#contactUs">contact us</a></p>
                    </div>
                </div>

                <div class="card featuresCard card-all">
                    <div class="card-body card-index">
                        <h3 class="card-title">Can I use the app on mobile devices?</h3>
                        <p class="card-body">Yes, our app is fully responsive and works smoothly on both desktop and
                            mobile devices, so you can chat on the go!</p>
                    </div>
                </div>

            </div>
        </section>

        <section class="form feedbackForm" id = "feedbackForm">

            <div class="feedbackHeader">
                <h2>Please give your feedback here</h2>
            </div>
            <div class="feedbackFormAni">
                <form action="#" method="POST" id="feedbackForm" enctype="multipart/form-data" autocomplete="off">
                    <div class="error-text"></div>
                    <div class="name-details">
                        <div class="field input">
                            <label>First Name</label>
                            <input type="text" name="fname" placeholder="First name" required>
                        </div>
                        <div class="field input">
                            <label>Last Name</label>
                            <input type="text" name="lname" placeholder="Last name" required>
                        </div>
                    </div>
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="field input">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <div class="field button">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>
        </section>

        <footer>
            <div class="backToTop">
                <a class="hover-underline-animation" href="#navbarSection">Back to top</a>
            </div>
            <h2 class="contactUs" id="contactUs">Contact us</h2>
            <div class="contact">

                <div class="contactSection">
                    <i class="fa-regular fa-hashtag"></i>
                    <h4>Follow us</h4>
                    <div class="mediaIcon">
                    <a class="hover-underline-animation" href="https://twitter.com" target="_blank"> <i class="fab fa-twitter"></i> </a>
                    <a class="hover-underline-animation" href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                    <a class="hover-underline-animation" href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="contactSection">
                    <i class="fa-solid fa-phone"></i>
                    <h4>Call us</h4>
                    <a>7029120726</a>
                    <a>7029120726</a>
                    <a>7029120726</a>
                </div>
                <div class="contactSection">
                    <i class="fa-regular fa-envelope"></i>
                    <h4>Email us</h4>
                    <a class="hover-underline-animation" href="bairagisudhangsu@gmail.com"
                        target="_blank">bairagisudhangsu@gmail.com</a>
                    <a class="hover-underline-animation" href="ssbariagi06j@gmail.com"
                        target="_blank">ssbariagi06j@gmail.com</a>
                    <a class="hover-underline-animation" href="bairagisudhangsu02@gmail.com"
                        target="_blank">bairagisudhangsu02@gmail.com</a>
                </div>
            </div>

            <div class="footerCopyRights">
                <p>
                    <a class="hover-underline-animation" href="/privacy">Privacy Policy</a> |
                    <a class="hover-underline-animation" href="/terms">Terms of Service</a>
                </p>
                <p>© 2024 ChatApp. All rights reserved.</p>
            </div>
            <div>
        </footer>
 
    </div>
    <script src="javascript/feedback.js"></script>
    <script src="javascript/themeMode.js"></script>

</body>

</html>