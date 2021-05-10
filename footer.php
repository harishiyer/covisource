
  <footer>
    <div class="row my-5">
      <div class="col-12 text-center"> 
        <p>All rights reserved. Covisource &copy; 2021.</p>
      </div>
    </div>
  </footer>
  <div class="story-display">
    <div class="d-flex flex-column mx-auto single-story" style="height: 100%">
      <a class="close-story" href="javascript:void(0);"><i class="fa fa-times"></i></a>
      <div class="text-center my-auto">
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
  </div>
  <script src="dist/bundle.js"></script> 
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <?php 
    if(isset($_GET['location'])){
        ?>
        <script>
            $('.location-dropdown .dropdown-menu-right a').each(function(){
                if($(this).data('name') == '<?php echo $_GET['location']; ?>'){
                    $('.location-dropdown .dropdown-toggle').text($(this).text());
                }
            }).promise().done(function(){
              if($('.location-dropdown .dropdown-toggle').text().trim() == 'Set Location'){
                $('.location-dropdown .dropdown-toggle').text('<?php echo $_GET['location']; ?>');
              }
            });    
        </script>
        <?php 
    }
  ?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</body>
</html>