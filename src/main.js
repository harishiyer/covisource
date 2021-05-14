/*
 * Main Js
 */

import validate from "jquery-validation";
import "slick-carousel";

$(function () {

  $(".stories").slick({
    slidesToShow: 4,
    adaptiveHeight: true,
    variableWidth: true,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        },
      },
    ],
  }); 

  $(".location-dropdown .dropdown-menu  a:not(.search-location)").on(
    "click",
    function (ev) {
      ev.preventDefault();
      $(".location-dropdown .dropdown-toggle").text($(this).text());
      window.location.href = updateQueryStringParameter(
        window.location.href,
        "location",
        $(this).text().toLowerCase()
      );
    }
  );

  $("#select-location").valid();

  $("#select-location").on("submit", function (ev) {
    ev.preventDefault();
  });

  $(".search-location").on("click", function (ev) {
    ev.preventDefault();
    if ($("#select-location").valid()) {
      console.log("valid");
      $(".location-dropdown .dropdown-toggle").text($(".user-location").val());
      window.location.href = updateQueryStringParameter(
        window.location.href,
        "location",
        $(".user-location").val().toLowerCase()
      );
    }
  });

  $("#select-location input").on("keyup", function (e) {
    if (e.key === "Enter" || e.keyCode === 13) {
      $(".search-location").trigger("click");
    }
  });

  $(".donor .dropdown-menu a").on("click", function (ev) {
    ev.preventDefault();
    var value =
      $(this).text().toLowerCase() == "all" ? "" : $(this).text().toLowerCase();
    $("table tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

  $("#twitter-post input:not([type='email'])").on("keyup", function (ev) {
    var word_count = 0;
    $("#twitter-post input").each(function () {
      word_count = word_count + $(this).val().length;
    });
    $(".tweet-char").text(280 - word_count + "/280 characters remaining");
  });

  $("#twitter-post").validate({
    rules: {
      phonenumber: "customphone",
    },
  });

  $("#twitter-post").on("submit", function (ev) {
    ev.preventDefault();

    $("#twitter-post").validate();
    if ($("#twitter-post").valid()) {
      var name = $("#twitter-post #name").val();
      var message = $("#twitter-post #message").val();
      var contact = $("#twitter-post #contact").val();
      var email = $("#twitter-post #email").val();

      $('.submit-button-wrapper').hide();
      $('.confirmation-message').html('<p><div class="spinner-border m-auto" role="status"><span class="sr-only">Loading...</span></div></p>');

      $.ajax({
        method: "POST",
        url: "sendmail.php",
        data: {
          name: name,
          message: message,
          contact: contact,
          email: email,
          authorised_access: true,
        },
      })
        .done(function (data) {
          $('.confirmation-message').html("<p>"+data+"</p>");
        })
        .fail(function (jqXHR, textStatus) {
          alert("Message sending failed. Please reload. Error : " + textStatus);
          $('.confirmation-message').hide();
          $('.submit-button-wrapper').show();
        });
    }
  });

  var windowUrl = window.location.search;
  var urlParams = new URLSearchParams(windowUrl);
  var location = urlParams.get("location");

  if (!location) {
    location = "India";
  }

  var filter = "";
  $(".covid-data-filter a").each(function () {
    filter += $(this).text().trim().toLowerCase() + ",";
  });

  filter = filter.slice(0, -1);

  $(".tweets-wrapper").html(
    '<div class="spinner-wrapper"><div class="spinner-border m-auto" role="status"><span class="sr-only">Loading...</span></div></div>'
  );

  $(".story .active").on("click", function (ev) {
    ev.preventDefault();
    var data_type = $(this).data("type");
    if (data_type == "video") {
      var video_html =
        '<div class="embed-responsive embed-responsive-1by1 my-auto">';
      video_html +=
        '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/xTvd7oAEyhs?&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
      video_html += "</div>";
      $(".story-display .single-story .content").html(video_html);
      $(".story-display .single-story").css({
        "background-color": "black",
        "box-shadow": "0px 0px 6px white",
      });
      $(".story-display .close-story").css({ color: "white" });
    } else {
      var story_content = $(this).find(".story-content").html();
      $(".story-display .single-story .content").html(story_content);
    }
    $(".story-display").fadeIn(500);
  });

  $(".close-story").on("click", function (ev) {
    ev.preventDefault();
    $(".story-display").fadeOut(500, function () {
      $(".story-display .single-story .content").empty();
      $(".story-display .single-story").css({
        "background-color": "",
        "box-shadow": "",
      });
      $(".story-display .close-story").css({ color: "" });
    });
  });

  $.ajax({
    method: "POST",
    url: "get_twitter_data.php",
    data: {
      location: location,
      filter: filter,
    },
  })
    .done(function (data) {
      data = JSON.parse(data);

      $(".tweets-wrapper").empty();
      data.forEach(function (tweet_data) {
        var tweet = "<div class='tweet'>";
        tweet += "<div class='row'>";
        tweet += "<div class='col-2 px-0 d-none'>";
        tweet +=
          "<img src='" +
          tweet_data.profile_image +
          "' class='twitter-profile-image img-fluid'>";
        tweet += "</div>";
        tweet += "<div class='col-12'>";
        tweet +=
          "<p><strong>" +
          tweet_data.name +
          "</strong> <span><a href='https://twitter.com/" +
          tweet_data.screen_name +
          "'>@" +
          tweet_data.screen_name +
          "</a></span></p>";
        tweet += "</div>";
        tweet += "<div class='col-12'>";
        tweet += "<p>" + urlify(tweet_data.message) + "</p>";
        if (tweet_data.featured_image) {
          tweet +=
            "<p><img src=" +
            tweet_data.featured_image +
            " class='img-fluid'></p>";
        }
        tweet +=
          "<a href='" +
          tweet_data.url +
          "' class='d-none' target='_blank'>View on Twitter</a>";
        tweet += "</div>";
        tweet += "</div>";
        tweet += "</div>";
        $(".tweets-wrapper").append(tweet);
      });
    })
    .fail(function (jqXHR, textStatus) {
      alert("Twitter fetch failed. Please reload. Error : " + textStatus);
    });

  $("#twitter-feed .dropdown .dropdown-menu a").on("click", function (ev) {
    ev.preventDefault();
    $(".covid-data-filter").append(
      '<a href="javascript: void(0);" class="btn btn-success mr-2 px-4 mb-3 is-removable">' +
        $(this).text() +
        '&nbsp;&nbsp;&nbsp;&nbsp;<span class="fas fa-times"></span></a>'
    );

    var filter = "";
    $(".covid-data-filter a").each(function () {
      filter += $(this).text().trim().toLowerCase() + ",";
    });
    filter = filter.slice(0, -1);

    $(".tweets-wrapper").html(
      '<div class="spinner-wrapper"><div class="spinner-border m-auto" role="status"><span class="sr-only">Loading...</span></div></div>'
    );

    $.ajax({
      method: "POST",
      url: "get_twitter_data.php",
      data: {
        location: location,
        filter: filter,
        single_filter: true,
      },
    })
      .done(function (data) {
        data = JSON.parse(data);
        $(".tweets-wrapper").empty();
        data.forEach(function (tweet_data) {
          var tweet = "<div class='tweet'>";
          tweet += "<div class='row'>";
          tweet += "<div class='col-2 px-0 d-none'>";
          tweet +=
            "<img src='" +
            tweet_data.profile_image +
            "' class='twitter-profile-image img-fluid'>";
          tweet += "</div>";
          tweet += "<div class='col-12'>";
          tweet +=
            "<p><strong>" +
            tweet_data.name +
            "</strong> <span><a href='https://twitter.com/" +
            tweet_data.screen_name +
            "'>@" +
            tweet_data.screen_name +
            "<a></span></p>";
          tweet += "</div>";
          tweet += "<div class='col-12'>";
          tweet += "<p>" + urlify(tweet_data.message) + "</p>";
          if (tweet_data.featured_image) {
            tweet +=
              "<p><img src=" +
              tweet_data.featured_image +
              " class='img-fluid'></p>";
          }
          tweet +=
            "<a href='" +
            tweet_data.url +
            "' class='d-none' target='_blank'>View on Twitter</a>";
          tweet += "</div>";
          tweet += "</div>";
          tweet += "</div>";
          $(".tweets-wrapper").append(tweet);
        });

        $(".is-removable").on("click", function (ev) {
          ev.preventDefault();
          $(this).remove();

          var filter = "";
          $(".covid-data-filter a").each(function () {
            filter += $(this).text().trim().toLowerCase() + ",";
          });

          filter = filter.slice(0, -1);

          $(".tweets-wrapper").html(
            '<div class="spinner-wrapper"><div class="spinner-border m-auto" role="status"><span class="sr-only">Loading...</span></div></div>'
          );

          $.ajax({
            method: "POST",
            url: "get_twitter_data.php",
            data: {
              location: location,
              filter: filter,
            },
          })
            .done(function (data) {
              data = JSON.parse(data);
              $(".tweets-wrapper").empty();
              data.forEach(function (tweet_data) {
                var tweet = "<div class='tweet'>";
                tweet += "<div class='row'>";
                tweet += "<div class='col-2 px-0 d-none'>";
                tweet +=
                  "<img src='" +
                  tweet_data.profile_image +
                  "' class='twitter-profile-image img-fluid'>";
                tweet += "</div>";
                tweet += "<div class='col-12'>";
                tweet +=
                  "<p><strong>" +
                  tweet_data.name +
                  "</strong> <span><a href='https://twitter.com/" +
                  tweet_data.screen_name +
                  "'>@" +
                  tweet_data.screen_name +
                  "<a></span></p>";
                tweet += "</div>";
                tweet += "<div class='col-12'>";
                tweet += "<p>" + urlify(tweet_data.message) + "</p>";
                if (tweet_data.featured_image) {
                  tweet +=
                    "<p><img src=" +
                    tweet_data.featured_image +
                    " class='img-fluid'></p>";
                }
                tweet +=
                  "<a href='" +
                  tweet_data.url +
                  "' class='d-none' target='_blank'>View on Twitter</a>";
                tweet += "</div>";
                tweet += "</div>";
                tweet += "</div>";
                $(".tweets-wrapper").append(tweet);
              });
            })
            .fail(function (jqXHR, textStatus) {
              alert(
                "Twitter fetch failed. Please reload. Error : " + textStatus
              );
            });
        });
      })
      .fail(function (jqXHR, textStatus) {
        alert("Twitter fetch failed. Please reload. Error : " + textStatus);
      });
  });

  $('.contact-button').on('click', function(){
    $('.contact-form').fadeToggle();
    $('.contact-button').fadeToggle(); 
    $('.location-dropdown').fadeOut();
  });

  $(".close-contact-form").on("click", function (ev) {
    ev.preventDefault();
    $('.contact-form').fadeToggle();
    $('.contact-button').fadeToggle();
    $('.location-dropdown').fadeIn();
  });

});

function updateQueryStringParameter(uri, key, value) {
  var re = new RegExp("([?|&])" + key + "=.*?(&|$)", "i");
  var separator = uri.indexOf("?") !== -1 ? "&" : "?";
  if (uri.match(re)) {
    return uri.replace(re, "$1" + key + "=" + value + "$2");
  } else {
    return uri + separator + key + "=" + value;
  }
}

$.validator.addMethod(
  "customphone",
  function (value, element) {
    return this.optional(element) || /^(\+91-|\+91|0)?\d{10}$/.test(value);
  },
  "Please enter a valid phone number"
);

function urlify(text) {
  var urlRegex = /(https?:\/\/[^\s]+)/g;
  return text.replace(urlRegex, function (url) {
    return '<a target="_blank" href="' + url + '">' + url + "</a>";
  });
  // or alternatively
  // return text.replace(urlRegex, '<a href="$1">$1</a>')
}
