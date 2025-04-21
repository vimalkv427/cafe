@include('website.include.header')
@include('website.include.menubar')

<div class="page-header">
    <div class="page-header-content bg_image_header jarallax">
        <div class="container">
            <h1 class="heading">Contact Us</h1>
        </div>
    </div>
</div>

<div class="main-wrapper">
    <div class="contact homestyle">
        <div class="gmap_wrapper">
            <div class="gmapbox">
                <div id="googleMap" class="map"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="contact_us">
                                <div class="section_header">
                                    <h2 class="section_title">Keep in Touch</h2>
                                    <h6 class="section_sub_title">Send us mail if you have anything to suggest</h6>
                                </div>
                                <form class="contact_form" action="" method="post">
                                    @csrf
                                    <div class="form-container">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Your Name*" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Your Email Address*" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" placeholder="Message Here*" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input class="button" type="submit" value="Send" name="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <h3 class="sec_large_title">Visit any of Our Branch & Have a great Culinary Experience</h3>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="keepintouch">
                        <div class="communication">
                            <div class="info_body">
                                <h5>New York</h5>
                                <p>112/9 Madison Park, New York <br>
                                    hungrybuzz.ny@gmail.com<br>
                                    +33 123 456 789 (hungry)
                                </p>
                            </div>
                        </div>
                        <div class="communication">
                            <div class="info_body">
                                <h5>California</h5>
                                <p>987 Sunset Blvd, California <br>
                                    hungrybuzz.ca@gmail.com<br>
                                    +33 987 654 321 (hungry)
                                </p>
                            </div>
                        </div>
                        <div class="communication">
                            <div class="info_body">
                                <h5>Utah</h5>
                                <p>456 Salt Lake City, Utah <br>
                                    hungrybuzz.ut@gmail.com<br>
                                    +33 456 789 012 (hungry)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('website.include.footer')
