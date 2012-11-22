  <!-- Top Bar -->
<div class="fixed contain-to-grid">
  <nav class="top-bar">
    <ul>
      <!-- Title Area -->
      <li class="name">
        <h1>
          <a href="#">
            <?php echo $title;?> - 
            <?php echo $user_id;?>
          </a>
        </h1>
      </li>
      <li class="toggle-topbar"><a href="#"></a></li>
    </ul>

    <section>
      <!-- Right Nav Section -->
      <ul class="right">
        
        <li class="divider"></li>
        <li class="has-dropdown" id="auth-login">
          
        </li>
      </ul>
    </section>
  </nav>
</div>
  <!-- End Top Bar -->
<!--
<script type="text/html" id="tmpl_menu_logged">
  <a id="auth-displayname" href="#"><img class="profile_image_bar" width="26" src="<%=profile_image_url%>"/><%=username%></a>
  <ul class="dropdown" >
    <li><a href="#" id="auth-logoutlink" onclick="click_logout_facebook(); return false;">Esci</a></li>
  </ul>
</script>
-->
<script id="tmpl_menu_logged" type="text/x-handlebars-template">
  <a id="auth-displayname" href="#"><img class="profile_image_bar" width="26" src="{{profile_image_url}}"/>{{username}}</a>
  <ul class="dropdown" >
    <li><a href="#" id="auth-logoutlink" onclick="click_logout_facebook(); return false;">Esci</a></li>
  </ul>
</script>

<!--
<script type="text/html" id="tmpl_menu_notlogged">
    <a id="auth-displayname" href="#">Login</a>
    <ul class="dropdown"  >
      <li><a href="#" id="auth-loginlink"  onclick="click_login_facebook(); return false;">Login</a></li>
    </ul>
</script>
-->
<script id="tmpl_menu_notlogged" type="text/x-handlebars-template">
    <a id="auth-displayname" href="#">Login</a>
    <ul class="dropdown"  >
      <li><a href="#" id="auth-loginlink"  onclick="click_login_facebook(); return false;">Login</a></li>
    </ul>
</script>
