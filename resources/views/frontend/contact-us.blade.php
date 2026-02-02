@extends('layouts.frontend.index')

@section('contents')
    <section id="section-hero" class="section-dark no-top no-bottom text-light jarallax relative mh-500 jarallax">
        <img src="{{ asset('frontend/images/background/4.webp') }}" class="jarallax-img" alt="">
        <div class="gradient-edge-bottom h-50"></div>
        <div class="sw-overlay op-5"></div>
        <div class="abs w-80 bottom-10 z-2 w-100">
            <div class="container">
                <div class="row align-items-center justify-content-between gx-5">
                    <div class="col-lg-6">
                        <div class="relative wow mask-right">
                            <div class="text-start">
                                <h1 class="fs-96 text-uppercase fs-sm-10vw mb-0 lh-1">Contact</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 wow fadeInRight" data-wow-delay=".3s">
                        <p class="mb-0">Join thought leaders, developers, researchers, and founders as we celebrate
                            innovation and excellence in the tech industry.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="subtitle">Get In Touch</div>
                    <h2 class="wow fadeInUp">We’re here to answer your questions.</h2>

                    <p class="col-lg-8">Have a question, suggestion, or just want to say hi? We’re here and happy to
                        hear from you!</p>

                    <div class="spacer-single"></div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="relative mb-4">
                                <i class="abs fs-28 p-3 bg-color text-light rounded-1 icofont-location-pin"></i>
                                <div class="ms-80px">
                                    <h4 class="mb-0">Event Location</h4>
                                    121 AI Blvd, San Francisco, BCA 94107
                                </div>
                            </div>

                            <div class="relative mb-4">
                                <i class="abs fs-28 p-3 bg-color text-light rounded-1 icofont-envelope"></i>
                                <div class="ms-80px">
                                    <h4 class="mb-0">Send a Message</h4>
                                    excellence@orionsm.com
                                </div>
                            </div>

                            <div class="relative mb-4">
                                <i class="abs fs-28 p-3 bg-color text-light rounded-1 icofont-phone"></i>
                                <div class="ms-80px">
                                    <h4 class="mb-0">Call Us Directly</h4>
                                    +1 123 456 789
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="bg-dark-2 rounded-1 p-60 relative">
                        <form name="contactForm" id="contact_form" method="post" action="#">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <h3>Get In Touch</h3>
                                    <p>Have a question, suggestion, or just want to say hi? Fill out the form below
                                        and we’ll get back to you soon.</p>

                                    <div class="field-set">
                                        <input type="text" name="name" id="name" class="form-underline"
                                            placeholder="Your Name" required>
                                    </div>

                                    <div class="field-set">
                                        <input type="text" name="email" id="email" class="form-underline"
                                            placeholder="Your Email" required>
                                    </div>

                                    <div class="field-set">
                                        <input type="text" name="phone" id="phone" class="form-underline"
                                            placeholder="Your Phone" required>
                                    </div>

                                    <div class="field-set">
                                        <textarea name="message" id="message" class="form-underline h-100px" placeholder="Your Message" required></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="g-recaptcha" data-sitekey="6LdW03QgAAAAAJko8aINFd1eJUdHlpvT4vNKakj6"></div>
                            <div id='submit' class="mt-3">
                                <input type='submit' id='send_message' value='Send Message' class="btn-main">
                            </div>

                            <div id="success_message" class='success'>
                                Your message has been sent successfully. Refresh this page if you want to send more
                                messages.
                            </div>
                            <div id="error_message" class='error'>
                                Sorry there was an error sending your form.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Branches Section -->
    <section class="relative bg-dark-3">
        <div class="branches-glow-bg"></div>
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <div class="subtitle wow fadeInUp">Our Locations</div>
                    <h2 class="wow fadeInUp" data-wow-delay=".2s">Visit Our Branches Worldwide</h2>
                    <p class="wow fadeInUp" data-wow-delay=".3s">We're proud to serve you from multiple locations
                        around the globe. Find the nearest branch and connect with our team.</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Branch 1 -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".1s">
                    <div class="branch-card">
                        <div class="branch-gradient branch-gradient-1"></div>
                        <div class="branch-content">
                            <div class="branch-icon">
                                <i class="icofont-location-pin"></i>
                            </div>
                            <h4 class="branch-title">San Francisco HQ</h4>
                            <div class="branch-badge">Main Office</div>
                            <div class="branch-details">
                                <div class="detail-item">
                                    <i class="icofont-google-map"></i>
                                    <span>121 AI Blvd, San Francisco, BCA 94107</span>
                                </div>
                                <div class="detail-item">
                                    <i class="icofont-phone"></i>
                                    <span>+1 123 456 789</span>
                                </div>
                                <div class="detail-item">
                                    <i class="icofont-envelope"></i>
                                    <span>excellence@orionsm.com</span>
                                </div>
                            </div>
                            <a href="#" class="branch-btn">
                                <span>Get Directions</span>
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Branch 2 -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="branch-card">
                        <div class="branch-gradient branch-gradient-2"></div>
                        <div class="branch-content">
                            <div class="branch-icon">
                                <i class="icofont-location-pin"></i>
                            </div>
                            <h4 class="branch-title">New York Office</h4>
                            <div class="branch-badge">East Coast Hub</div>
                            <div class="branch-details">
                                <div class="detail-item">
                                    <i class="icofont-google-map"></i>
                                    <span>456 Tech Avenue, New York, NY 10001</span>
                                </div>
                                <div class="detail-item">
                                    <i class="icofont-phone"></i>
                                    <span>+1 987 654 321</span>
                                </div>
                                <div class="detail-item">
                                    <i class="icofont-envelope"></i>
                                    <span>excellence@orionsm.com</span>
                                </div>
                            </div>
                            <a href="#" class="branch-btn">
                                <span>Get Directions</span>
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Branch 3 -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="branch-card">
                        <div class="branch-gradient branch-gradient-3"></div>
                        <div class="branch-content">
                            <div class="branch-icon">
                                <i class="icofont-location-pin"></i>
                            </div>
                            <h4 class="branch-title">London Office</h4>
                            <div class="branch-badge">European Hub</div>
                            <div class="branch-details">
                                <div class="detail-item">
                                    <i class="icofont-google-map"></i>
                                    <span>789 Innovation Street, London, EC1A 1BB</span>
                                </div>
                                <div class="detail-item">
                                    <i class="icofont-phone"></i>
                                    <span>+44 20 7946 0958</span>
                                </div>
                                <div class="detail-item">
                                    <i class="icofont-envelope"></i>
                                    <span>excellence@orionsm.com</span>
                                </div>
                            </div>
                            <a href="#" class="branch-btn">
                                <span>Get Directions</span>
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Branch 4 -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="branch-card">
                        <div class="branch-gradient branch-gradient-4"></div>
                        <div class="branch-content">
                            <div class="branch-icon">
                                <i class="icofont-location-pin"></i>
                            </div>
                            <h4 class="branch-title">Tokyo Office</h4>
                            <div class="branch-badge">Asia Pacific Hub</div>
                            <div class="branch-details">
                                <div class="detail-item">
                                    <i class="icofont-google-map"></i>
                                    <span>101 Tech District, Shibuya, Tokyo 150-0002</span>
                                </div>
                                <div class="detail-item">
                                    <i class="icofont-phone"></i>
                                    <span>+81 3 1234 5678</span>
                                </div>
                                <div class="detail-item">
                                    <i class="icofont-envelope"></i>
                                    <span>excellence@orionsm.com</span>
                                </div>
                            </div>
                            <a href="#" class="branch-btn">
                                <span>Get Directions</span>
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Branch 5 -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="branch-card">
                        <div class="branch-gradient branch-gradient-5"></div>
                        <div class="branch-content">
                            <div class="branch-icon">
                                <i class="icofont-location-pin"></i>
                            </div>
                            <h4 class="branch-title">Singapore Office</h4>
                            <div class="branch-badge">Southeast Asia Hub</div>
                            <div class="branch-details">
                                <div class="detail-item">
                                    <i class="icofont-google-map"></i>
                                    <span>234 Marina Bay, Singapore 018980</span>
                                </div>
                                <div class="detail-item">
                                    <i class="icofont-phone"></i>
                                    <span>+65 6789 1234</span>
                                </div>
                                <div class="detail-item">
                                    <i class="icofont-envelope"></i>
                                    <span>excellence@orionsm.com</span>
                                </div>
                            </div>
                            <a href="#" class="branch-btn">
                                <span>Get Directions</span>
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Branch 6 -->
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="branch-card">
                        <div class="branch-gradient branch-gradient-6"></div>
                        <div class="branch-content">
                            <div class="branch-icon">
                                <i class="icofont-location-pin"></i>
                            </div>
                            <h4 class="branch-title">Sydney Office</h4>
                            <div class="branch-badge">Australia Hub</div>
                            <div class="branch-details">
                                <div class="detail-item">
                                    <i class="icofont-google-map"></i>
                                    <span>567 Harbor Drive, Sydney, NSW 2000</span>
                                </div>
                                <div class="detail-item">
                                    <i class="icofont-phone"></i>
                                    <span>+61 2 9876 5432</span>
                                </div>
                                <div class="detail-item">
                                    <i class="icofont-envelope"></i>
                                    <span>excellence@orionsm.com</span>
                                </div>
                            </div>
                            <a href="#" class="branch-btn">
                                <span>Get Directions</span>
                                <i class="icofont-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
