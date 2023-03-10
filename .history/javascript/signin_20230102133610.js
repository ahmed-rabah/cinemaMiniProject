let form = document.getElementById('user_signin');
let loginBtn =document.getElementById('loginBtn');

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
          case 'confirmer_password':
              response = validateConfirmationPasswords(value).response;
              state = validateConfirmationPasswords(value).state;
              validationChanges(input, state,response);
              break;
              case 'username':
                  usernamevalidation(value).then(res=>{
                          let response = res.response;
                          let state = res.state;
                          validationChanges(input, state,response);
                  });
              break;
          case 'email':
              emailvalidation(value).then(resul=>{
                  let response = resul.response;
                  let state = resul.state;
                  validationChanges(input, state,response);
                  });
              break;  
          default:
              console.error("something went wrong");
              break;
      
      }
  })
  });





// input classes (valid - invalid)
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
function usernamevalidation(value){
  let response="";
  let state=false;
      if(value === ''){
          response ="username est obligatoire";
      }else if(!valideUsername(value) && !only_nums_and_chars(value)){
          response ="les caract??res sp??ciaux ne sont pas valid??s";
      }else if(!valideUsername(value) && only_nums_and_chars(value)){
          response ="username doit commenc?? par un charact??re (et taille > 4)";
      }else if(valideUsername(value)){
          response="username valid??";
          state=true;
      }
      return {
          response,
          state};
}
//password validation

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
  response= "Le mot de passe doit contenir au moins un caract??re sp??cial.";
} else if (password.length < 8) {
  state= false;
response= "Le mot de passe doit comporter au moins 8 caract??res.";
}
return {response: response, state: state}
}
