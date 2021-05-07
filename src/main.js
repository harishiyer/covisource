/*
 * Main Js
 */

import validate from "jquery-validation";

$(function () {
  $(".location-dropdown .dropdown-menu  a").on("click", function (ev) {
    ev.preventDefault();
    $(".location-dropdown .dropdown-toggle").text($(this).text());
    window.location.href = updateQueryStringParameter(
      window.location.href,
      "location",
      $(this).text().toLowerCase()
    );
  });

  $('.search-location').on("click", function(){
    $(".location-dropdown .dropdown-toggle").text($('.user-location').val());
    window.location.href = updateQueryStringParameter(
        window.location.href,
        "location",
        $('.user-location').val().toLowerCase()
      );
  });

  $(".donor .dropdown-menu a").on("click", function (ev) {
    ev.preventDefault();
    var value =
      $(this).text().toLowerCase() == "all" ? "" : $(this).text().toLowerCase();
    $("table tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

  $("#twitter-post input").on("keyup", function (ev) {
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

      $.ajax({
        method: "GET",
        url: "sendmail.php",
        data: {
          name: name,
          message: message,
          contact: contact,
          authorised_access: true,
        },
      })
        .done(function (data) {
          console.log(data);
        })
        .fail(function (jqXHR, textStatus) {
          alert("Twitter fetch failed. Please reload. Error : " + textStatus);
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

  $(".tweets-wrapper").html('<div class="spinner-wrapper"><div class="spinner-border m-auto" role="status"><span class="sr-only">Loading...</span></div></div>');

  $.ajax({
    method: "GET",
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
        tweet += "<p>" + tweet_data.message + "</p>";
        if (tweet_data.featured_image) {
          tweet +=
            "<p><img src=" +
            tweet_data.featured_image +
            " class='img-fluid'></p>";
        }
        tweet += "<a href='"+tweet_data.url+"' class='d-none' target='_blank'>View on Twitter</a>";
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

    $(".tweets-wrapper").html('<div class="spinner-wrapper"><div class="spinner-border m-auto" role="status"><span class="sr-only">Loading...</span></div></div>');

    $.ajax({
      method: "GET",
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
          tweet += "<p>" + tweet_data.message + "</p>";
          if (tweet_data.featured_image) {
            tweet +=
              "<p><img src=" +
              tweet_data.featured_image +
              " class='img-fluid'></p>";
          }
          tweet += "<a href='"+tweet_data.url+"' class='d-none' target='_blank'>View on Twitter</a>";
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

          $(".tweets-wrapper").html('<div class="spinner-wrapper"><div class="spinner-border m-auto" role="status"><span class="sr-only">Loading...</span></div></div>');

          $.ajax({
            method: "GET",
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
                tweet += "<p>" + tweet_data.message + "</p>";
                if (tweet_data.featured_image) {
                  tweet +=
                    "<p><img src=" +
                    tweet_data.featured_image +
                    " class='img-fluid'></p>";
                }
                tweet += "<a href='"+tweet_data.url+"' class='d-none' target='_blank'>View on Twitter</a>";
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
