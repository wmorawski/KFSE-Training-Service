
    logInWithFacebook = function() {
      FB.login(function(response) {
        if (response.authResponse) {
          var fb = $.get('/api/fblogin', (d)=>{fb = d}).done(()=>{
          return true;
          });
        } else {
          return false;
        }
      }, { scope : 'email' });
      return false;
    };


$("#fbLogin").on("click", ()=>{
  logInWithFacebook();
});
