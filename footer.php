
  <footer>
    <div class="row my-5">
      <div class="col-12 text-center"> 
        <p>All rights reserved. Covisource &copy; 2021.</p>
      </div>
    </div>
  </footer>
  <script src="dist/bundle.js"></script> 
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <?php 
    if(isset($_GET['location'])){
        ?>
        <script>
            $('.location-dropdown .dropdown-menu-right a').each(function(){
                if($(this).data('name') == '<?php echo $_GET['location']; ?>'){
                    $('.location-dropdown .dropdown-toggle').text($(this).text());
                }else{
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