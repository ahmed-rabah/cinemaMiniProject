let form = document.getElementById('user_signin');
let loginBtn =document.getElementById('loginBtn');







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
