<?php 
 require("header.php");
?>
<script>
    function onSubmit(token){
      $("#twitter-post").trigger('submit');
    } 
</script>
<div class="content-wrapper">

    <div class="row">
        <div class="col-12 col-lg-6 col-xl-8 order-md-last order-last d-none">
            <!--section id="important-banner">
                <div class="row">
                    <div class="col-12 col-md-6 col-xl-4 widget widget-1">
                        <div class="widget-container text-center py-5">
                            <h1>Plasma Donors</h1>  
            
                            <div class="learn-more">
                                <a href="./donors.php<?php echo isset($_GET['location']) ? "?location=".$_GET['location']:""; ?>">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-xl-4 widget widget-1">
                        <div class="widget-container text-center py-5">
                            <h1>Beds Availability</h1>
                           
                            <div class="learn-more">
                                <a>Coming Soon</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-xl-4 widget widget-1">
                        <div class="widget-container text-center py-5">
                            <h1>Donate</h1>
                        
                            <div class="learn-more">
                                <a href="https://covid.giveindia.org/" target="_blank">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section-->

            <!--div class="row mid-section">
                <div class="col-12 col-md-6 col-lg-7 col-xl-8">
                    <section id="request">
                        <hr>
                        <br class="d-none d-md-block">
                        <h1>
                            Post you requirement on twitter
                        </h1>
                        <p>
                            Please post your requirements COVID related requirements here and we will post this in twitter to find someone who can help you. We will actively try and find the help you need. 
                        </p>
                        
                        <div class="row">
                            <div class="col-12">
                                <form id="twitter-post">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control-plaintext" id="name" placeholder="Enter your name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="message" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                        <textarea class="form-control" rows="5" id="message" placeholder="Type your message here." required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="contact" class="col-sm-2 col-form-label">Mobile</label>
                                        <div class="col-sm-10">
                                        <input type="tel" name="phonenumber" class="form-control-plaintext" id="contact" Placeholder="Enter your phone number" required>
                                        </div>
                                    </div>
                                    <div class="pb-3 text-right">
                                        <p class="tweet-char">
                                            280/280 Characters Left
                                        </p>
                                    </div>

                                    <div class="text-right">
                                        <button class="btn btn-success px-5 g-recaptcha" 
                                            data-sitekey="6Lfp2McaAAAAAACgLaDBQRMRhno5mcUpjv_UYDV6" 
                                            data-callback='onSubmit' 
                                            data-action='submit'>Submit</button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    
                </div>
            </div-->
            
            
        </div>
        <div class="col-12 col-lg-12 col-xl-12 order-first order-md-first">
            <section id="twitter-feed">
                <div class="row mx-md-0">
                    <div class="col-12 col-xl-6 px-xl-4 pb-0 pt-4 order-2 order-xl-first">
                        <h1>Latest COVID-19 data from twitter</h1>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="dropdown show dropright">
                                    <a class="btn btn-secondary dropdown-toggle data-filter-list" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Filter
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#">Oxygen</a>
                                        <a class="dropdown-item" href="#">Need Oxygen</a>
                                        <a class="dropdown-item" href="#">Oxygen Concentrator</a>
                                        <a class="dropdown-item" href="#">Plasma</a>
                                        <a class="dropdown-item" href="#">Need Plasma</a>
                                        <a class="dropdown-item" href="#">Donate Plasma</a>
                                        <a class="dropdown-item" href="#">Donate Blood</a>
                                        <a class="dropdown-item" href="#">ICU</a>
                                        <a class="dropdown-item" href="#">Need ICU</a>
                                        <a class="dropdown-item" href="#">Beds</a>
                                        <a class="dropdown-item" href="#">Need Beds</a>
                                        <a class="dropdown-item" href="#">Beds Available</a>
                                        <a class="dropdown-item" href="#">Vaccination</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 pt-4 pb-2 covid-data-filter">
                                <a href="javascript: void(0);" class="btn btn-success mr-2 px-4 mb-3">Covid</a>
                                <a href="javascript: void(0);" class="btn btn-success mr-2 px-4 mb-3">Covid-19</a>
                                <a href="javascript: void(0);" class="btn btn-success mr-2 px-4 mb-3">Covid19</a>
                                <a href="javascript: void(0);" class="btn btn-success mr-2 px-4 mb-3">Coronavirus</a>
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="col-12 px-md-4 col-xl-5 pt-2 pb-xl-5 offset-xl-1 d-flex order-first order-xl-2">
                        <div class="w-100 stories ml-xl-auto mx-auto ml-md-0 mr-md-auto ml-0 mt-auto">
                            <div class="story">
                                <div style="background-color: #ef4437" class="content active">
                                    <div class="inner-content">Vaccination</div>
                                    <div class="story-content d-none">
                                    <div class="pb-3"><img src="https://healthifyme.imgix.net/static/images/vaccinateme/logo_v3.svg" class="img-fluid"></div>
                                        <div dir="col" class="">
                                            <div class="pb-3">
                                                <div class="">
                                                <span color="text-color" class="">Powered by</span>
                                                <a href="https://www.healthifyme.com" target="_blank" rel="noreferrer">
                                                    <img src="https://healthifyme.imgix.net/static/images/logos/Hme_logo_black.png" alt="HealthifyMe" class="">
                                                </a>
                                                </div>
                                            </div>
                                            <div class="pb-5 mb-4">
                                                <span color="text-color" class="">India's Largest Health and Fitness App</span>
                                            </div>
                                            <a href="https://www.vaccinateme.in/covid/" target="_blank">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                                <!--div class="text-center description">
                                    <p>Vaccination<br>Slots<p>
                                </div-->
                            </div> 
                            <div class="story">
                                <div style="background-color: #ef4437" class="content active" data-type="video"><div class="inner-content">Mild Covid Homecare</div></div>
                            </div>
                            <div class="story">
                                <div class="content"><div class="inner-content">Comming<br>Soon</div></div>
                            </div>
                            <div class="story">
                                <div class="content"><div class="inner-content">Comming<br>Soon</div></div>
                            </div>
                            <div class="story">
                                <div class="content"><div class="inner-content">Comming<br>Soon</div></div>
                            </div>
                            <div class="story">
                                <div class="content"><div class="inner-content">Comming<br>Soon</div></div>
                            </div>
                        </div>
                    </div>
 
                    <div class="masonary-wrapper order-last">
                        <div class="tweets-wrapper">
                        
                        </div>  
                    </div> 
                </div>
            </section>
        </div>
    </div>

    <div class="row py-5 my-5 px-md-4">
        <div class="col-12 col-md-5">
            <section id="about-us">
                <h1>
                    <strong>Who Are We</strong>
                </h1>
                <p>
                    We are a bunch of IT professionals, who are trying to help the community like many others to overcome the deadly virus. We have created a simple dashboard to help you navigate important data about covid situation in different parts of India.
                </p>
                <p>
                    We hope that people might be able to connect with each other through this platform and will be able help each other out in this tough times.
                </p>
                <p>
                    If you have any suggestions or questions, feel free to reach out to us at <a href="mailto:covidhelpinghandsource@gmail.com">covidhelpinghandsource@gmail.com</a>.
                </p>

                <h1 class="mt-5">
                    <strong>Meet the developers</strong>
                </h1>
                <p> 
                    <a class="" href="https://github.com/kajal785"><i class="fab fa-github"></i></a>&nbsp;&nbsp;Kajal Singh&nbsp;&nbsp;&nbsp;&nbsp;
                </p>
                <p> 
                    <a class="" href="https://github.com/harishiyer"><i class="fab fa-github"></i></a>&nbsp;&nbsp;Harish Iyer&nbsp;&nbsp;&nbsp;&nbsp;
                </p>
                <p>
                    Girish R
                </p>
                <p>
                    KR 
                </p>
                <p>
                    Sunita 
                </p>

                <h1 class="pt-5">
                    <strong>Disclaimer</strong>
                </h1>
                <p>
                    All the data is pulled straight from twitter. Please verify the sources in case you need to contact anybody.
                </p>

            </section>
        </div>
        <div class="col-12 text-center">
            <h4 class="mt-5 text-center">Stay Safe. Wear a Mask.</h4>
        </div>
        <!--div class="col-12 col-md-5 offset-md-1 pb-5 pb-md-0 order-first order-md-last">
            <section id="about-us">
                <h1 class="pb-2">
                    <strong>Useful Links</strong>
                </h1>

                <ul>
                    <li>
                        <h4><a href="#">Click Here</a> to register yourself as a plasma donor.</h4>
                    </li>
                </ul>
            </section>
        </div-->
    </div>

</div>
<?php 
 require("footer.php");
?>