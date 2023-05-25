<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alat - Contact</title>


    <script src="sweetalert2/jquery-3.6.0.min.js"></script>
    <script src="sweetalert2/sweetalert2.all.min.js"></script>
    <?php include('header.php'); ?>
    <!-- header-section end -->


    <!-- body starts -->    

    <!-- banner-section start -->
    <section class="banner-section inner-banner contact">
        <div class="overlay">
            <div class="banner-content d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-7 col-md-10">
                            <div class="main-content">
                                <h1>Contact Us</h1>
                                <div class="breadcrumb-area">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb d-flex align-items-center">
                                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- Apply for a loan In start -->
    <section class="apply-for-loan contact">
        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-header text-center">
                            <h2 class="title">Get in touch with us.</h2>
                            <p>Fill up the form and our team will get back to you within 24 hours</p>
                        </div>
                    </div>
                </div>                                  
            </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="form-content">
                            <form method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="single-input">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" placeholder="What's your name?">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="single-input">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" placeholder="What's your email?">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="single-input">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" placeholder="(123) 480 - 3540">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="single-input">
                                            <label for="loan">Service interested in</label>
                                            <input type="text" name="interest" id="loan" placeholder="Ex. Auto Loan, Home Loan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="single-input">
                                            <label for="message">Message</label>
                                            <textarea name="message" placeholder="I would like to get in touch with you..." cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-area text-center">
                                    <button type="submit" name="submit" class="cmn-btn">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Apply for a loan In end -->

    <!-- Need more help In start -->
    <section class="account-feature loan-feature need-more-help">
        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-header text-center">
                            <h5 class="sub-title">You can reach out to us for all your</h5>
                            <h2 class="title">Need More Help?</h2>
                            <p>Queries, complaints and feedback. We will be happy to serve you</p>
                        </div>
                    </div>
                </div>
                <div class="row cus-mar">
                    <div class="col-md-4">
                        <div class="single-box">
                            <div class="icon-box">
                                <img src="assets/images/icon/need-help-1.png" alt="icon">
                            </div>
                            <h5>Sales</h5>
                            <p>sales@Alatbank.com</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-box">
                            <div class="icon-box">
                                <img src="assets/images/icon/need-help-2.png" alt="icon">
                            </div>
                            <h5>Help & Support</h5>
                            <p>supports@Alatbank.com</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-box">
                            <div class="icon-box">
                                <img src="assets/images/icon/need-help-3.png" alt="icon">
                            </div>
                            <h5>Media & Press</h5>
                            <p>media@Alatbank.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Need more help In end -->    

    <!-- Get Start In start -->
    <section class="get-start wow fadeInUp">
        <div class="overlay">
            <div class="container">
                <div class="col-12">
                    <div class="get-content">
                        <div class="section-text">
                            <h3 class="title">Ready to get started?</h3>
                            <p>It only takes a few minutes to register your FREE Alat account.</p>
                        </div>
                        <a href="register.php" class="cmn-btn">Open an Account</a>
                        <img src="assets/images/get-start.png" alt="images">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Get Start In end -->

    <?php include('footer.php'); ?>