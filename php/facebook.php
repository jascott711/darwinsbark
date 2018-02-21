<script>

  function statusChangeCallback(response) {

    if (response.status === 'connected') {
        $('.fblogin').hide();
        $('.fblogout').show();
        getUserInfo();
    } else if (response.status === 'not_authorized') {
        $('.fblogin').show();
        $('.fblogout').hide();
    } else {
        $('.fblogin').show();
        $('.fblogout').hide();
    }
  }

  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }


  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=172923099908007&autoLogAppEvents=0';
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '172923099908007',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.12'
    });
      
    FB.AppEvents.logPageView();   

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    }); 
  }



  function getUserInfo() {
      FB.api('/me?fields=name,email,id', function(response) {
        console.log(JSON.stringify(response));

        var parseMe = JSON.stringify(response);
        obj = JSON.parse(parseMe);

        $('.header .fbname').text("Welcome " + obj.name);

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!

        var yyyy = today.getFullYear();
        var today = dd+''+mm+''+yyyy;

        console.log("Name : " + obj.name + " | Email : " + obj.email + " | ID : " + obj.id + " | Date : " + today);

        $.post(
            'php/check_user.php',
            {
              fld_user_name: obj.name,
              fld_user_email: obj.email,
              fld_facebook_id: obj.id,
              fld_user_doj: today              
            },
            function(result){
              if(result == "success") {
                $('#result').html("SUCCESS");
              } else {                
                $('#result').html("FAILED");
              }
            }

          );



     
      },{scope: 'email'});
    }
 



  function FBLogin() {
    FB.login(function(response) {
      if (response.authResponse) {
          getUserInfo(); //Get User Information.
          $('.fblogin').hide();
          $('.fblogout').show();
        } else {
         alert('Authorization failed.');
        }
      },{scope: 'public_profile,email', auth_type: 'reauthenticate'});

  } 

  function FBLogout() {
    FB.logout(function(response) {
      FB.api("/me/permissions", "delete", function(response){});
      $('.fblogin').show();
      $('.fblogout').hide();
    });

    $('.header .fbname').text("Welcome to Darwin's Bark");

  }



</script>