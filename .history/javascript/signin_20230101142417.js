
  function allvalid(username="username", email="email", password="password", confirmer_password="confirm_password"){
      function getCookie(name) {
          var nameEQ = name + "=";
          var ca = document.cookie.split(';');
          for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
          }
          return null;
        }
        let validUsername  = getCookie(username);
        let validemail  = getCookie(email);
        let validpassword  = getCookie(password);
        let validconfirmer_password  = getCookie(confirmer_password);

        if(validconfirmer_password =="true" && validpassword == "true" && validemail == "true" && validUsername == "true"){
            return true;
        }else{
            return false;
        }
  }
  
//  if(allvalid("username","email","password","confirmer_password")){
//     console.log("good");
//  }else{
//     console.log("bad");
//  }