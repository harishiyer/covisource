/*
 * Main Js  
 */

$(function() { 

    $(".dropdown-menu a").on("click", function() {
        var value = $(this).text().toLowerCase()=="all"?"":$(this).text().toLowerCase();
        console.log("val"+value);
        $("table tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          console.log($(this).text().toLowerCase().indexOf(value));
        });
      });

      $('#twitter-post input').on("keyup", function(ev){
        var word_count = 0; 
        $('#twitter-post input').each(function(){
            word_count = word_count + $(this).val().length;
        });
        $('.tweet-char').text((280-word_count)+"/280 characters remaining");
      });

      $('#twitter-post').on('submit', function(ev){
        ev.preventDefault();


      });

})