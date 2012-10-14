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
  } , {scope: 'email,user_likes,user_checkins'}
  );
}

function click_logout_facebook() {
  console.log("click_logout_facebook calling FB.logout();");
  FB.logout();
  console.log("click_logout_facebook done");
}

