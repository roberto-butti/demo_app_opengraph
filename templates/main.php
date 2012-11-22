<?php include("blocks/html_header.php");?>
<body>
  <div id="fb-root"></div>
  <?php require("blocks/js.php");?>
    <script type="text/javascript">
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '<?php echo AppInfo::appID(); ?>', // App ID
          channelUrl : '//<?php echo $_SERVER["HTTP_HOST"]; ?>/channel.html', // Channel File
          status     : true, // check login status
          cookie     : true, // enable cookies to allow the server to access the session
          xfbml      : true // parse XFBML
        });

        

        // Listen to the auth.login which will be called when the user logs in
        // using the Login button
        FB.Event.subscribe('auth.login', function(response) {
          // We want to reload the page now so PHP can read the cookie that the
          // Javascript SDK sat. But we don't want to use
          // window.location.reload() because if this is in a canvas there was a
          // post made to this page and a reload will trigger a message to the
          // user asking if they want to send data again.
          window.location = window.location;
        });
        FB.Event.subscribe('auth.statusChange', function(response) {
          console.log("auth.statusChange");
          var results = document.getElementById("auth-login");

          if (response.authResponse) {
            console.log("response");
            // user has auth'd your app and is logged into Facebook
            FB.api('/me', function(me){
              var username= "";
              var profile_image_url="";
              if (me.name) {
                username = me.name;
                profile_image_url="http://graph.facebook.com/"+me.id+"/picture?type=square"
              }
              var dataObject= {};
              var results = document.getElementById("auth-login");
              dataObject.username= username;
              dataObject.profile_image_url = profile_image_url;
              //results.innerHTML = tmpl("tmpl_menu_logged", dataObject);
              var source = $("#tmpl_menu_logged").html();
              var template = Handlebars.compile(source);
              results.innerHTML = template(dataObject);
              load_feeds_user();
            })


          } else {
            // user has not auth'd your app, or is not logged into Facebook
            var source = $("#tmpl_menu_notlogged").html();
            console.log(source);
            var template = Handlebars.compile(source);
            console.log(template);
            results.innerHTML = template();
            //results.innerHTML = tmpl("tmpl_menu_notlogged");

          }
        });
        /*
        document.getElementById('auth-loginlink').addEventListener('click', function(){
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
        }); // END addEventListener click auth-loginlink
        
        document.getElementById('auth-logoutlink').addEventListener('click', function(){
          FB.logout();
        });
        */
        

        FB.Canvas.setAutoGrow();
      };

      // Load the SDK Asynchronously
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
  

  
  <!-- Top Bar -->

  <?php require("blocks/navbar.php");?>
  
<div class="container">
  <div class="row">
    <div class="eight columns">
      <h2>
        
        <img class="logo" src="/assets/images/fb_apps_circle.png" />
        Demo App Open Graph
        </h2>
      <p>Demo Application with strong integration with Facebook</p>
      <hr />
    </div>
    <div class="four columns">
      <p id="user_feed"></p>
<script type="text/html" id="tmpl_show_user_feeds">
  <ul>
  <% for ( var i = 0; i < data.length; i++ ) { %>
    <li><a href="http://graph.facebook.com/<%=data[i].id%>"><%=data[i].story%></a></li>
  <% } %>
  </ul>
</script>
 
      <hr />
    </div>
  </div>

  <div class="row">
    <div class="eight columns">
      <!--      GRID EXAMPLE
      <h3>The Grid</h3>

      <div class="row">
        <div class="twelve columns">
          <div class="panel">
            <p>This is a twelve column section in a row. Each of these includes a div.panel element so you can see where the columns are - it's not required at all for the grid.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="six columns">
          <div class="panel">
            <p>Six columns</p>
          </div>
        </div>
        <div class="six columns">
          <div class="panel">
            <p>Six columns</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="four columns">
          <div class="panel">
            <p>Four columns</p>
          </div>
        </div>
        <div class="four columns">
          <div class="panel">
            <p>Four columns</p>
          </div>
        </div>
        <div class="four columns">
          <div class="panel">
            <p>Four columns</p>
          </div>
        </div>
      </div>
    -->
      
      
      <h3>Tabs</h3>
      <dl class="tabs">
        <dd class="active"><a href="#simple1">Simple Tab 1</a></dd>
        <dd><a href="#simple2">Simple Tab 2</a></dd>
        <dd><a href="#simple3">Simple Tab 3</a></dd>
      </dl>

      <ul class="tabs-content">
        <li class="active" id="simple1Tab">This is simple tab 1's content. Pretty neat, huh?</li>
        <li id="simple2Tab">This is simple tab 2's content. Now you see it!</li>
        <li id="simple3Tab">This is simple tab 3's content. It's, you know...okay.</li>
      </ul>
      
      
      
      <h3>Buttons</h3>

      <div class="row">
        <div class="six columns">
          <p><a href="#" class="small button">Small Button</a></p>
          <p><a href="#" class="button">Medium Button</a></p>
          <p><a href="#" class="large button">Large Button</a></p>
        </div>
        <div class="six columns">
          <p><a href="#" class="small alert button">Small Alert Button</a></p>
          <p><a href="#" class="success button">Medium Success Button</a></p>
          <p><a href="#" class="large secondary button">Large Secondary Button</a></p>
        </div>
      </div>
      
    </div>

    <div class="four columns">
      <h4>Getting Started</h4>
      <p>We're stoked you want to try Foundation! To get going, this file (index.html) includes some basic styles you can modify, play around with, or totally destroy to get going.</p>

      <h4>Other Resources</h4>
      <p>Once you've exhausted the fun in this document, you should check out:</p>
      <ul class="disc">
        <li><a href="http://foundation.zurb.com/docs">Foundation Documentation</a><br />Everything you need to know about using the framework.</li>
        <li><a href="http://github.com/zurb/foundation">Foundation on Github</a><br />Latest code, issue reports, feature requests and more.</li>
        <li><a href="http://twitter.com/foundationzurb">@foundationzurb</a><br />Ping us on Twitter if you have questions. If you build something with this we'd love to see it (and send you a totally boss sticker).</li>
      </ul>
    </div>
  </div>

  
  <div class="row">
    <div class="twelve columns">
      <h3>Orbit</h3>
      <div id="featured">
        <img src="http://placehold.it/1200x250&text=Slide_1" alt="slide image">
        <img src="http://placehold.it/1200x250&text=Slide_2" alt="slide image">
        <img src="http://placehold.it/1200x250&text=Slide_3" alt="slide image">
      </div>
    </div>
  </div>
  
  
  
  <div class="row">
    <div class="twelve columns">
      <h3>Reveal</h3>
      <p><a href="#" data-reveal-id="exampleModal" class="button">Example modal</a></p>
    </div>
  </div>
  
  <div id="exampleModal" class="reveal-modal">
    <h2>This is a modal.</h2>
    <p>
      Reveal makes these very easy to summon and dismiss. The close button is simple an anchor with a unicode 
      character icon and a class of <code>close-reveal-modal</code>. Clicking anywhere outside the modal will 
      also dismiss it.
    </p>
    <a class="close-reveal-modal">?</a>
  </div>
  
</div>  
  <!-- Included JS Files (Uncompressed) -->
  <!--
  
  <script src="/assets/foundation/javascripts/jquery.js"></script>
  
  <script src="/assets/foundation/javascripts/jquery.foundation.mediaQueryToggle.js"></script>
  
  <script src="/assets/foundation/javascripts/jquery.foundation.forms.js"></script>
  
  <script src="/assets/foundation/javascripts/jquery.foundation.reveal.js"></script>
  
  <script src="/assets/foundation/javascripts/jquery.foundation.orbit.js"></script>
  
  <script src="/assets/foundation/javascripts/jquery.foundation.navigation.js"></script>
  
  <script src="/assets/foundation/javascripts/jquery.foundation.buttons.js"></script>
  
  <script src="/assets/foundation/javascripts/jquery.foundation.tabs.js"></script>
  
  <script src="/assets/foundation/javascripts/jquery.foundation.tooltips.js"></script>
  
  <script src="/assets/foundation/javascripts/jquery.foundation.accordion.js"></script>
  
  <script src="/assets/foundation/javascripts/jquery.placeholder.js"></script>
  
  <script src="/assets/foundation/javascripts/jquery.foundation.alerts.js"></script>
  
  <script src="/assets/foundation/javascripts/jquery.foundation.topbar.js"></script>
  
  -->
  
  <!-- Included JS Files (Compressed) -->
  <script src="/assets/foundation/javascripts/jquery.js"></script>
  <script src="/assets/foundation/javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="/assets/foundation/javascripts/app.js"></script>
  <script src="/assets/javascript/base.js"></script>
</body>
</html>
