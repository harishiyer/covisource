/*
 * Main Js  
 */

$(function() { 

    $("donor .dropdown-menu a").on("click", function() {
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
      
      var filter = "";
      $('.covid-data-filter a').each(function(){
        filter += ($(this).text().trim().toLowerCase())+",";
      }); 

      $.ajax({
          method: "GET",
          url: "get_twitter_data.php",
          data: {
            'location' : 'pune',
            'filter'   : filter,
          },
      }).done(function(data){
        data = JSON.parse(data);      
        data.forEach(function(tweet_data){
            var tweet = "<div class='tweet'>";
                tweet += "<div class='row'>";
                tweet += "<div class='col-2 px-0'>";
                tweet += "<img src='"+tweet_data.profile_image+"' class='twitter-profile-image img-fluid'>"; 
                tweet += "</div>"; 
                tweet += "<div class='col-10'>";
                tweet += "<p><strong>"+tweet_data.name+"</strong> <span><a href='https://twitter.com/"+tweet_data.screen_name+"'>@"+tweet_data.screen_name+"<a></span></p>";
                tweet += "</div>"; 
                tweet += "<div class='col-10 offset-2'>";
                tweet += "<p>"+tweet_data.message+"</p>";
                tweet += "<a href='https://twitter.com/'>View on Twitter</a>";
                tweet += "</div>"; 
                tweet += "</div>"; 
                tweet += "</div>"; 
                $('.tweets-wrapper').append(tweet);
        });
        
        
      }).fail(function(jqXHR, textStatus){
        alert( "Twitter fetch failed. Please reload. Error : " + textStatus );
      });

      $('#twitter-feed .dropdown .dropdown-menu a').on("click", function(ev){

        $('.covid-data-filter').append('<a href="javascript: void(0);" class="btn btn-success mr-2 px-4 mb-3 is-removable">'+$(this).text()+'   <span class="fas fa-close"></span></a>');

        var filter = "";
        $('.covid-data-filter a').each(function(){
            filter += ($(this).text().trim().toLowerCase())+",";
        });

        $.ajax({
            method: "GET",
            url: "get_twitter_data.php",
            data: {
              'location' : 'pune',
              'filter'   : filter,
            },
        }).done(function(data){
            $('.tweets-wrapper').append(data);
          
          
          
        }).fail(function(jqXHR, textStatus){
          alert( "Twitter fetch failed. Please reload. Error : " + textStatus );
        });

        

        $('.is-removable').on('click', function(){
            $(this).remove();
    
            var filter = "";
            $('.covid-data-filter a').each(function(){
                filter += ($(this).text().trim().toLowerCase())+",";
            }); 

            $.ajax({
                method: "GET",
                url: "get_twitter_data.php",
                data: {
                  'location' : 'pune',
                  'filter'   : filter,
                },
            }).done(function(data){
              data = JSON.parse(data); 
              $('.tweets-wrapper').empty();     
              data.forEach(function(tweet_data){
                  var tweet = "<div class='tweet'>";
                      tweet += "<div class='row'>";
                      tweet += "<div class='col-2 px-0'>";
                      tweet += "<img src='"+tweet_data.profile_image+"' class='twitter-profile-image img-fluid'>"; 
                      tweet += "</div>"; 
                      tweet += "<div class='col-10'>";
                      tweet += "<p><strong>"+tweet_data.name+"</strong> <span><a href='https://twitter.com/"+tweet_data.screen_name+"'>@"+tweet_data.screen_name+"<a></span></p>";
                      tweet += "</div>"; 
                      tweet += "<div class='col-10 offset-2'>";
                      tweet += "<p>"+tweet_data.message+"</p>";
                      tweet += "<a href='https://twitter.com/'>View on Twitter</a>";
                      tweet += "</div>"; 
                      tweet += "</div>"; 
                      tweet += "</div>"; 
                      $('.tweets-wrapper').append(tweet);
              });
              
              
            }).fail(function(jqXHR, textStatus){
              alert( "Twitter fetch failed. Please reload. Error : " + textStatus );
            });

            console.log(filter); 
        });
         
      });

     
})  