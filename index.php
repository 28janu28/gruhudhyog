<?php
require_once('admin/config.php');

$qery_for_fetching_product_dataset_papad = "SELECT id, name, category_id, price, qty, seller_id, image_name, image_path, category_name, seller_name  FROM product WHERE category_id=1";
$result = $conn->query($qery_for_fetching_product_dataset_papad);
$product_dataset_papad = [];
if ($result->num_rows > 0) {
    $product_dataset_papad = $result->fetch_all(MYSQLI_ASSOC);
}

$qery_for_fetching_product_dataset_khakhra = "SELECT id, name, category_id, price, qty, seller_id, image_name, image_path, category_name, seller_name  FROM product WHERE category_id=2";
$result = $conn->query($qery_for_fetching_product_dataset_khakhra);
$product_dataset_khakhra = [];
if ($result->num_rows > 0) {
    $product_dataset_khakhra = $result->fetch_all(MYSQLI_ASSOC);
}

$qery_for_fetching_product_dataset_pickle = "SELECT id, name, category_id, price, qty, seller_id, image_name, image_path, category_name, seller_name  FROM product WHERE category_id=3";
$result = $conn->query($qery_for_fetching_product_dataset_pickle);
$product_dataset_pickle = [];
if ($result->num_rows > 0) {
    $product_dataset_pickle = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gruh Udhyog</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-light navbar-light">
        <div class="container-fluid">
            <a href="index.html" class="navbar-brand">Gruh <span>Udhyog</span></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="notification.html" class="nav-item nav-link">Update</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                    <a href="login.html" class="nav-item nav-link loginBtn">Login</a>
                    <a href="Register.html" class="nav-item nav-link regBtn">Register</a>
                    <a href="login.html" class="nav-item nav-link" style="display: none;" id="loggedInUser">Hi, Vivek</a>

                    <div class="nav-item dropdown">

                        <div class="dropdown-menu">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="single.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->


    <!-- Carousel Start -->
    <div class="carousel">
        <div class="container-fluid">
            <div class="owl-carousel">
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="img/papd.jpg" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h1> <span>Papad</span></h1>
                        <p>
                            "So long as you have food in your mouth you should all question for the time being."
                        </p>
                        <div class="carousel-btn">
                            <a class="btn custom-btn" href="#catalogue">View Menu</a>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="img/aachar.jpg" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h1><span>Pickles</span> </h1>
                        <p>
                            A different situation<br>
                            "I am in a Pickles."
                        </p>
                        <div class="carousel-btn">
                            <a class="btn custom-btn" href="">View Menu</a>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img">
                        <img src="img/khakhra2.jpg" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h1> <span>Khakhara</span></h1>
                        <p>
                            "Breakfast in 12 Words And aromatic Tea with 1 wheat Khakhara to go with is perfect"
                        </p>
                        <div class="carousel-btn">
                            <a class="btn custom-btn" href="">View Menu</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Video Modal Start-->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->

    <!-- Product Catalogue Start -->
    <div class="food" id="catalogue">
        <div class="container">
            <div class="row align-items-center">
                <!-- food catalogue -->
                <div class="col-md-4">
                    <div class="food-item">
                        <i class="flaticon-burger"></i>
                        <h2>Papad</h2>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor auctor quis sem.
                        </p>
                        <a onclick="showPapads()" class="btn btn-primary" style="color: white; background-color: green;">View Papads</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="food-item">
                        <i class="flaticon-burger"></i>
                        <h2>Khakhra</h2>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor auctor quis sem.
                        </p>
                        <a onclick="showKhakhras()" class="btn btn-primary" style="color: white; background-color: green;">View Khakhras</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="food-item">
                        <i class="flaticon-burger"></i>
                        <h2>Pickle</h2>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasel nec pretium mi. Curabit facilis ornare velit non vulputa. Aliquam metus tortor auctor quis sem.
                        </p>
                        <a onclick="showPickles()" class="btn btn-primary" style="color: white; background-color: green;">View Pickles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Catalogue End -->

    <!-- Papad Start -->
    <div class="food" id="papads" style="display: none;">
        <div class="container">
            <div class="row align-items-center">
                <!-- food catalogue -->
                <?php if (!empty($product_dataset_papad)) { ?>
                    <?php foreach ($product_dataset_papad as $product) { ?>
                        <div class="col-md-4">
                            <div class="food-item">
                            <img src="<?php echo $product['image_path']; ?><?php echo $product['image_name'].'.jpg'; ?>" width="120" height="120">
                                <h2><?php echo $product['name']; ?></h2>
                                <h5>Net Qty : <?php echo $product['qty'].' gm'; ?></h5>
                                <h5>Price : <?php echo $product['price'].' ₹'; ?></h5>
                                <a href="#">Add to Cart</a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Papad End -->

    <!-- Khakhra Start -->
    <div class="food" id="khakhras" style="display: none;">
        <div class="container">
            <div class="row align-items-center">
                <!-- food catalogue -->
                <?php if (!empty($product_dataset_khakhra)) { ?>
                    <?php foreach ($product_dataset_khakhra as $product) { ?>
                        <div class="col-md-4">
                            <div class="food-item">
                            <img src="<?php echo $product['image_path']; ?><?php echo $product['image_name'].'.jpg'; ?>" width="120" height="120">
                                <h2><?php echo $product['name']; ?></h2>
                                <h5>Net Qty : <?php echo $product['qty'].' gm'; ?></h5>
                                <h5>Price : <?php echo $product['price'].' ₹'; ?></h5>
                                <a href="#">Add to Cart</a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Khakhra End -->

    <!-- Pickle Start -->
    <div class="food" id="pickles" style="display: none;">
        <div class="container">
            <div class="row align-items-center">
                <!-- food catalogue -->
                <?php if (!empty($product_dataset_pickle)) { ?>
                    <?php foreach ($product_dataset_pickle as $product) { ?>
                        <div class="col-md-4">
                            <div class="food-item">
                            <img src="<?php echo $product['image_path']; ?><?php echo $product['image_name'].'.jpg'; ?>" width="120" height="120">
                                <h2><?php echo $product['name']; ?></h2>
                                <h5>Net Qty : <?php echo $product['qty'].' gm'; ?></h5>
                                <h5>Price : <?php echo $product['price'].' ₹'; ?></h5>
                                <a href="#">Add to Cart</a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Pickle End -->

    <!-- Testimonial Start -->
    <!-- <div class="testimonial">
            <div class="container">
                <div class="owl-carousel testimonials-carousel">
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="img/testimonial-1.jpg" alt="Image">
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput
                        </p>
                        <h2>Client Name</h2>
                        <h3>Profession</h3>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="img/testimonial-2.jpg" alt="Image">
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput
                        </p>
                        <h2>Client Name</h2>
                        <h3>Profession</h3>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="img/testimonial-3.jpg" alt="Image">
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput
                        </p>
                        <h2>Client Name</h2>
                        <h3>Profession</h3>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-img">
                            <img src="img/testimonial-4.jpg" alt="Image">
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet elit. Phasel nec preti mi. Curabit facilis ornare velit non vulput
                        </p>
                        <h2>Client Name</h2>
                        <h3>Profession</h3>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- Testimonial End -->


    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="section-header text-center">
                <p>Contact Us</p>
                <h2>Contact For Any Query</h2>
            </div>
            <div class="row align-items-center contact-information">
                <div class="col-md-6 col-lg-3">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Address</h3>
                            <p>123 Street, NY, USA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Call Us</h3>
                            <p>+012 345 6789</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Email Us</h3>
                            <p>info@example.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-share"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Follow Us</h3>
                            <div class="contact-social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row contact-form">
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1600663868074!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-md-6">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn custom-btn" type="submit" id="sendMessageButton">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const getFlag = urlParams.get('login');
            const user = urlParams.get('user');
            if (getFlag === 'success') {
                $(".loginBtn").html("Logout");
                $(".loginBtn").attr("href", "index.html");
                $(".regBtn").html("Hi " + user);
                $(".regBtn").attr("href", "#");
            }
        });

        function showPapads() {
            $("#papads").css("display", "block");
            $("#khakhras").css("display", "none");
            $("#pickles").css("display", "none");
        }

        function showKhakhras() {
            $("#papads").css("display", "none");
            $("#khakhras").css("display", "block");
            $("#pickles").css("display", "none");
        }

        function showPickles() {
            $("#papads").css("display", "none");
            $("#khakhras").css("display", "none");
            $("#pickles").css("display", "block");
        }
    </script>
</body>

</html>