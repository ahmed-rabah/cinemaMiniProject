let form = document.getElementById('user_signin');
let loginBtn =document.getElementById('loginBtn');

loginBtn.addEventListener('click', function(e){
  e.preventDefault();
  let inputs = form.querySelectorAll('input');
inputs.forEach(function(input){
  let id = input.id;
  let value = input.value;
  let response ="";
  let state= false;
  switch (id) {
      case 'username':
                      let response = usernamevalidation(value).response;
                      let state = usernamevalidation(value).state;
                      validationChanges(input, state,response);
          break;
      case 'password':
          response = passwordvalidation(value).response;
          state = passwordvalidation(value).state;
          validationChanges(input, state,response);
          break;
      default:
          console.error("something went wrong");
          break;
  
  }

});
}
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
  response= "Le mot de passe doit contenir au moins un caractère spécial.";
} else if (password.length < 8) {
  state= false;
response= "Le mot de passe doit comporter au moins 8 caractères.";
}
return {response: response, state: state}
}
