
  <footer>
    <div class="row my-5">
      <div class="col-12 text-center"> 
        <p>All rights reserved. Covisource &copy; 2021.</p>
      </div>
    </div>
  </footer>
  <script src="https://www.google.com/recaptcha/enterprise.js?render=6LenJMcaAAAAADRhOfYcakbO13mnthvQLLfR-q-R"></script>
  <script src="dist/bundle.js"></script> 
  <?php 
    if(isset($_GET['location'])){
        ?>
        <script>
            $('.location-dropdown .dropdown-menu-right a').each(function(){
                if($(this).data('name') == '<?php echo $_GET['location']; ?>'){
                    $('.location-dropdown .dropdown-toggle').text($(this).text());
                }
            });    
        </script>
        <?php
    }
  ?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</body>
</html>