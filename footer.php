<footer class="hidden">
    <div class="row my-5">
        <div class="col-12 text-center">
            <p>All rights reserved. Covisource &copy; 2021.</p>
        </div>
    </div>
</footer>
<div class="story-display hidden">
    <div class="d-flex flex-column mx-auto single-story" style="height: 100%">
        <a class="close-story" href="javascript:void(0);"><i class="fa fa-times"></i></a>
        <div class="content text-center my-auto">
        </div>
    </div>
</div>

<div class="contact-button hidden">
    <p>Need Help?</p>
</div>
<div class="contact-form hidden">
    <a class="close-contact-form" href="javascript:void(0);"><i class="fa fa-times"></i></a>
    <div class="row">
      <div class="col-12 col-md-8 offset-md-2 col-xl-6 offset-lg-3 d-flex">
      <section id="request" class="my-auto">
        <h1>
            Send us your requirement
        </h1>
        <p class="pt-2">
            Please send us your COVID related requirements and we will post this on twitter and will actively try and find the help you need.
            <br><br>
            <span style="font-size: 12px">Disclaimer: Please do not solely depend on the website for assistance. For emergencies, please contact a medical professional directly. <br>Do not spam with unwanted messages. </span>
        </p>

        <div class="row">
            <div class="col-12">
                <form id="twitter-post">
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name *</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" id="name" placeholder="Enter your name"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message" class="col-sm-2 col-form-label">Message *</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" id="message" placeholder="Type your requirement here."
                                required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contact" class="col-sm-2 col-form-label">Mobile *</label>
                        <div class="col-sm-10">
                            <input type="tel" name="phonenumber" class="form-control-plaintext" id="contact"
                                Placeholder="Enter your phone number" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contact" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control-plaintext" id="email"
                                Placeholder="Enter your Email ID">
                        </div>
                    </div>


                    <div class="pb-3 text-right">
                        <p class="tweet-char">
                            280/280 Characters Left
                        </p>
                    </div>

                    <div class="my-3">
                      <p class="recaptcha-message">
                        This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                      </p>
                    </div>

                    <div class="text-right submit-button-wrapper">
                        <button class="btn btn-success px-5 g-recaptcha"
                            data-sitekey="6Lfp2McaAAAAAACgLaDBQRMRhno5mcUpjv_UYDV6" data-callback='onSubmit'
                            data-action='submit'>Submit</button>
                    </div>

                    <div class="confirmation-message">
                    </div>

                </form>
            </div>
        </div>
    </section>
      </div>
    </div>
</div>
<div class="preloader">
    <h3>COVI<strong>SOURCE</strong></h3>
    <div class="lds-facebook"><div></div><div></div><div></div></div>
</div>

<script src="dist/bundle.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<?php 
    if(isset($_GET['location'])){
        ?>
<script>
    $('.location-dropdown .dropdown-menu-right a').each(function () {
        if ($(this).data('name') == '<?php echo $_GET['location']; ?>') {
            $('.location-dropdown .dropdown-toggle').text($(this).text());
        }
    }).promise().done(function () {
        if ($('.location-dropdown .dropdown-toggle').text().trim() == 'Location') {
            $('.location-dropdown .dropdown-toggle').text('<?php echo $_GET['location']; ?>');
        }
    });
</script>
<?php 
    }
  ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</body>

</html>