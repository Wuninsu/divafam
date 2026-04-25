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
                                    <li><a href="{{ route('guest.home') }}">Home</a></li>
                                    <li><a href="{{ route('guest.about') }}">About Us</a></li>
                                    <li><a href="{{ route('guest.projects.index') }}">Projects</a></li>
                                    <li><a href="{{ route('guest.gallery') }}">Gallery</a></li>
                                    <li><a href="{{ route('guest.contact') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Get Involved -->
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget footer-menu">
                                <h5 class="footer-title">Get Involved</h5>
                                <ul>
                                    <li><a href="{{ route('guest.donate') }}">Donate</a></li>
                                    <li><a href="{{ route('guest.donors') }}">Our Donors</a></li>
                                    <li><a href="{{ route('guest.testimonials') }}">Impact Stories</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Newsletter & Contact -->
                        <div class="col-lg-6">
                            <div class="footer-widget footer-contact">
                                <h5 class="footer-title">Stay Connected</h5>
                                @livewire('guest.subscriber-form')

                                <div class="footer-contact-info mt-3">
                                    <div class="footer-address d-flex align-items-center">
                                        <i class="fas fa-location"></i>
                                        <p> {{setup_data('address') ?? 'Tamale, Northern Region, Ghana'}}</p>
                                    </div>
                                    <div class="footer-address d-flex align-items-center">
                                        <i class="fas fa-message"></i>
                                        <p><a
                                                href="mailto:{{setup_data('support_email')}}">{{setup_data('support_email')}}</a>
                                        </p>
                                    </div>
                                    <div class="footer-address d-flex align-items-center">
                                        <i class="fas fa-phone"></i>
                                        <p>{{setup_data('support_phone')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        .footer-contact-info .footer-address i {
                            /* width: 50px;
                            height: 50px; */
                            padding: 10px;
                            border-radius: 50%;
                            background: var(--brand-soft-4);
                            display: inline-flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 1.3rem;
                            color: var(--brand);
                            margin-right: 10px;
                        }
                    </style>
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