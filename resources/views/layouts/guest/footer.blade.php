<footer class="footer">
    <div class="footer-bg">
        <img src="assets/img/bg/footer-bg-01.png" class="footer-bg-1" alt="">
        <img src="assets/img/bg/footer-bg-02.png" class="footer-bg-2" alt="">
    </div>

    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row row-gap-4">
                <!-- About -->
                <div class="col-lg-4">
                    <div class="footer-about">
                        <div class="footer-logo">
                            <img src="assets/img/divafam-logo.svg" alt="Divafam Logo">
                        </div>
                        <p>
                            Divafam is a nonprofit organization rooted in the power of family, community,
                            and growth. We train women and youth in sustainable vegetable farming,
                            equipping them with the skills to thrive and build self-sustaining livelihoods.
                        </p>
                    </div>
                </div>

                <!-- Links -->
                <div class="col-lg-8">
                    <div class="row row-gap-4">
                        <!-- Quick Links -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget footer-menu">
                                <h5 class="footer-title">Quick Links</h5>
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/about">About Us</a></li>
                                    <li><a href="/programs">Programs</a></li>
                                    <li><a href="/training">Training</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Support -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget footer-menu">
                                <h5 class="footer-title">Get Involved</h5>
                                <ul>
                                    <li><a href="/volunteer">Volunteer</a></li>
                                    <li><a href="/donate">Donate</a></li>
                                    <li><a href="/events">Events</a></li>
                                    <li><a href="/blog">Blog</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Newsletter & Contact -->
                        <div class="col-lg-6">
                            <div class="footer-widget footer-contact">
                                <h5 class="footer-title">Stay Connected</h5>
                                <div class="subscribe-input">
                                    <form action="/newsletter/subscribe" method="POST">
                                        @csrf
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter your Email Address">
                                        <button type="submit"
                                            class="btn btn-primary btn-sm inline-flex align-items-center">
                                            <i class="isax isax-send-2 me-1"></i>Subscribe
                                        </button>
                                    </form>
                                </div>

                                <div class="footer-contact-info mt-3">
                                    <div class="footer-address d-flex align-items-center">
                                        <img src="assets/img/icon/icon-20.svg" alt="Location" class="img-fluid me-2">
                                        <p> Tamale, Northern Region, Ghana </p>
                                    </div>
                                    <div class="footer-address d-flex align-items-center">
                                        <img src="assets/img/icon/icon-19.svg" alt="Email" class="img-fluid me-2">
                                        <p><a href="mailto:info@divafam.org">info@divafam.org</a></p>
                                    </div>
                                    <div class="footer-address d-flex align-items-center">
                                        <img src="assets/img/icon/icon-21.svg" alt="Phone" class="img-fluid me-2">
                                        <p>+233 24 123 4567</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- ./Links -->
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row row-gap-2">
                <div class="col-md-6">
                    <div class="text-center text-md-start">
                        <p class="text-white">Copyright &copy; 2025 Divafam. All rights reserved.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="d-flex align-items-center justify-content-center justify-content-md-end footer-link">
                        <li><a href="/terms">Terms & Conditions</a></li>
                        <li><a href="/privacy">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
