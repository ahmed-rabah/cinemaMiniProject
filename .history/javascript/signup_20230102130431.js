window.addEventListener('DOMContentLoaded',()=>{
    setCookie("username",'true',-3);
    setCookie("password",'true',-3);
    setCookie("confirmer_password",'true',-3);
    setCookie("email",'',-3);

})
let form = document.getElementById('user_signup');
let submitBtn =document.getElementById('submit-button');
submitBtn.addEventListener('click', function(e){
    e.preventDefault();
    let inputs = form.querySelectorAll('input');
    setTimeout(function(){inputval(inputs,"submit");},100);
});
let inputs = form.querySelectorAll('input');
    inputval(inputs,"keyup");

    function coockieSetting(input,bool){
        if(bool == false){
            setCookie(input,'false',120000);
        }
        if(bool == true){
            setCookie(input,'true',120000);
        }
    }
function inputval(inputs,mode){
  if (mode == "keyup") {

    inputs.forEach(function(input){
        input.addEventListener('keyup',function(){
            let id = input.id;
            let value = input.value;
            let response ="";
            let state= false;
            switch (id) {
                case 'password':
                    response = passwordvalidation(value).response;
                    state = passwordvalidation(value).state;
                    validationChanges(input, state,response);
                    break;
                case 'username':
                        usernamevalidation(value).then(res=>{
                                let response = res.response;
                                let state = res.state;
                                validationChanges(input, state,response);
                        });
                    break;
                default:
                    console.log("something went wrong");
                    break;
            
            }
        })
        });
        // if(allvalid("username","email","password","confirmer_password")){
        //     console.log("good");
        //  }else{
        //     console.log("bad");
        //  }
    }
    if(mode == "submit"){
    inputs.forEach(function(input){
            let id = input.id;
            let value = input.value;
            let response ="";
            let state= false;
            switch (id) {
                case 'username':
                        usernamevalidation(value).then(res=>{
                                let response = res.response;
                                let state = res.state;
                                coockieSetting(id,state);
                                validationChanges(input, state,response);
                        });
                    break;
                case 'password':
                    response = passwordvalidation(value).response;
                    state = passwordvalidation(value).state;
                    coockieSetting(id,state);
                    validationChanges(input, state,response);
                    break;     
                default:
                    console.error("something went wrong");
                    break;
            
            }

        });
        if(allvalid("username","email","password","confirmer_password")){
            form.submit();
         }else{
            console.log("bad");
         }
    } 
}
function classeremoval(target,...classes){
        classes.forEach(classe => {
            if (target.classList.contains(classe)) {
                target.classList.remove(classe);
            }
        });
}
function validationChanges(inputField,state,response){
    classeremoval(inputField,"is-valid","is-invalid");
    let feedbackField =document.getElementById(inputField.getAttribute("aria-describedby"));
    classeremoval(feedbackField,"text-success","text-danger");
    feedbackField.innerHTML = response ; 
    if(state == false){
        feedbackField.classList.add("text-danger","m-0","p-0");
        inputField.classList.add("is-invalid");
    }
    if(state == true){
        feedbackField.classList.add("text-success","m-0","p-0");
        inputField.classList.add("is-valid");
    }
}
//username validation
function valideUsername(str) {
    return /^[a-zA-Z]/.test(str) && str.length >= 4 && /^[a-zA-Z][0-9a-zA-Z_-]*$/.test(str);
  }
function only_nums_and_chars(str) {
    return /^[0-9a-zA-Z_-]*$/.test(str);
  }

  async function existantUsername(username){
    let response = await fetch('./functions/emailChecking.php?username='+username);
                let data= await response.json();
                // .then(data => {result= data;}).catch(err => {console.log(err)});
     return data;
}

 function usernamevalidation(value){
    let response="";
    let state=false;
        if(value === ''){
            response ="username est obligatoire";
        }else if(!valideUsername(value) && !only_nums_and_chars(value)){
            response ="les caractéres spéciaux ne sont pas validés";
        }else if(!valideUsername(value) && only_nums_and_chars(value)){
            response ="username doit commencé par un charactère (et taille > 4)";
        }else if(valideUsername(value)){
            response="username validé";
            state=true;
        }
        // console.log(state+'  '+response);
        return {
            response,
            state};
}

//email validation
function isValidEmail(email) {
    const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    return emailRegex.test(email);
  }
  
async function existantEmail(email){
    let result = await fetch('./functions/emailChecking.php?email='+email)
                .then(response => response.json())
                .catch(err => {console.log(err)});
     return result;
}
async function emailvalidation(email){
    let response="";
    let state=false;
    let data = await existantEmail(email);
    if(email === ''){
        response ="email est obligatoire";
    }else if(!isValidEmail(email)){
        response="syntaxe du mail est incorrecte \n exemples : username@exemple.com";
    }else if(data == true){
        response="email existe déja , ressayer avec autre email";
    }else if(data == false && isValidEmail(email)){
        response="email validé";
        state =true;
    }
    // console.log(response+"  "+state);
    return {
        response:response,
        state:state};
}
// password validation

function passwordvalidation(password) {
        let response ="Mot de passe valide";
        let state = true;
     if(password == ""){
        state= false;
      response= "Le champs mot de passe est obligatoire";
     }else if (!/[A-Z]/.test(password)) {
        state= false;
        response= "Le mot de passe doit contenir au moins une lettre majuscule.";
    }else if (!/[a-z]/.test(password)) {
        state= false;
        response= "Le mot de passe doit contenir au moins une lettre minuscule.";
    }else if (!/[0-9]/.test(password)) {
        state= false;
        response= "Le mot de passe doit contenir au moins un chiffre.";
    }else if (!/[!@#$%^&*()_+=-]/.test(password)) {
        state= false;
        response= "Le mot de passe doit contenir au moins un caractère spécial.";
    } else if (password.length < 8) {
        state= false;
      response= "Le mot de passe doit comporter au moins 8 caractères.";
    }
    return {response: response, state: state}
  }

//passwordVerification 
function passwordsMatch(confirmPWD,password){
    return confirmPWD === password;
}
function validateConfirmationPasswords(confirmPWD){
    let response ="" , state=false;
    let password =document.getElementById('password').value;
    if( confirmPWD ==""){
        response ="le champs confirmation est obligatoire";
    }else if(!passwordsMatch(confirmPWD,password)){
        response="les deux mots de passes ne sont pas identifique";
    }
    else if(passwordsMatch(confirmPWD,password)){
        response ="les deux mots de passes sont identique";
        state = true;
    }
    return {response,
        state};
}


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
             
function setCookie(name, value, seconds) {
    var expires = "";
    if (seconds) {
      var date = new Date();
      date.setTime(date.getTime() +seconds);
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
  } 
