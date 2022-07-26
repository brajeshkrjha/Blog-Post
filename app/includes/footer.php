<!-- Footer -->
<div class="footer">
        <div class="footer-content">

            <div class="footer-section about">
                <h1 class="logo-text"><span>Blog</span>Post</h1>
                <p>
                    BlogPost is a blogging website, created by the team Hyper Block. Feel free to read awesome blogs under different categories. You can send a request to be an admin user in order to create/manage blogs. Or you can simply signup/login as a normal user.
                </p>
                <div class="contact">
                    <span><i class="fas fa-phone"></i>&nbsp; 123-456-789</span>
                    <span><i class="fas fa-envelope"></i>&nbsp; teamBlogPost@gmail.com</span>
                </div>
            </div>
            <div class="footer-section links">
                <h2>Quick Links</h2>
                <br>
                <ul>
                    <a href="<?php echo BASE_URL . '/about.php' ?>">
                        <li>Our Team</li>
                    </a>
                    <a href="#">
                        <li>Terms and Conditions</li>
                    </a>

                </ul>
            </div>
            <div class="footer-section contact-form">
                <h2>Contact us</h2>
                <br>
                <form action="index.html" method="post">
                    <input type="email" name="email" class="text-input contact-input" placeholder="Your email address">
                    <textarea rows="4" name="message" class="text-input contact-input" placeholder="Your message"></textarea>
                    <buton type="submit" class="btn btn-big contact-btn">
                        <i class="fas fa-envelope"></i> Send
                    </buton>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; Brajesh Jha
        </div>
    </div>
    <!-- Footer ends -->