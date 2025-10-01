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
                            <img src="{{setup_data('logo')}}" alt="Divafam Logo" width="100px">
                        </div>
                        <p>
                            {{setup_data('footer_text')}}
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
                                    <li><a href="/gallery">Gallery</a></li>
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
                                    {{-- <li><a href="/events">Events</a></li> --}}
                                    <li><a href="/blog">Blog</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Newsletter & Contact -->
                        <div class="col-lg-6">
                            <div class="footer-widget footer-contact">
                                <h5 class="footer-title">Stay Connected</h5>
                                <div class="subscribe-input">
                                    @livewire('guest.subscriber-form')
                                </div>

                                <div class="footer-contact-info mt-3">
                                    <div class="footer-address d-flex align-items-center">
                                        <img src="assets/img/icon/icon-20.svg" alt="Location" class="img-fluid me-2">
                                        <p> {{setup_data('address') ?? 'Tamale, Northern Region, Ghana'}}</p>
                                    </div>
                                    <div class="footer-address d-flex align-items-center">
                                        <img src="assets/img/icon/icon-19.svg" alt="Email" class="img-fluid me-2">
                                        <p><a
                                                href="mailto:{{setup_data('support_email')}}">{{setup_data('support_email')}}</a>
                                        </p>
                                    </div>
                                    <div class="footer-address d-flex align-items-center">
                                        <img src="assets/img/icon/icon-21.svg" alt="Phone" class="img-fluid me-2">
                                        <p>{{setup_data('support_phone')}}</p>
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
                        <p class="text-white">Copyright &copy; {{date('Y')}} Divafam. All rights reserved.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="d-flex align-items-center justify-content-center justify-content-md-end footer-link">
                        <li><a href="{{route('guest.faqs')}}">Faq's</a></li>
                        <li><a href="{{route('guest.terms')}}">Terms & Conditions</a></li>
                        <li><a href="{{route('guest.privacy')}}">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>