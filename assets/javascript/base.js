// nav bar activation http://foundation.zurb.com/docs/navigation.php
$(document).foundationTopBar();

function click_login_facebook() {
  console.log("click_login_facebook calling FB.login();");
  FB.login(function(response) {
    if (response.authResponse) {
      console.log('Welcome!  Fetching your information.... ');
      FB.api('/me', function(response) {
        console.log('Good to see you, ' + response.name + '.');
      });
    } else {
      console.log('User cancelled login or did not fully authorize.');
    }
  } , {scope: 'email,user_likes,user_checkins,user_status'}
  );
}

function click_logout_facebook() {
  console.log("click_logout_facebook calling FB.logout();");
  FB.logout();
  console.log("click_logout_facebook done");
}


function load_feeds_user() {
  var dataObject= {};
  FB.api('/me/feed', function(response) {
    console.log(response);
    var results = document.getElementById("user_feed");
    results.innerHTML = tmpl("tmpl_show_user_feeds", response);
  });

}

