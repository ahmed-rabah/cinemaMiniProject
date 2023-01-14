let form = document.getElementById('user_signin');
let loginBtn =document.getElementById('loginBtn');

loginBtn.addEventListener('click', function(e){
  e.preventDefault();
  let inputs = form.querySelectorAll('input');
  let ALLvalid = false ; 
  inputs.forEach(function(input){
  let id = input.id;
  let value = input.value;
  let response ="";
  let usernameState= false ;
  let passwordState = false;
    switch (id) {
        case 'username':
                        response = usernamevalidation(value).response;
                        usernameState = usernamevalidation(value).state;
                        validationChanges(input, usernameState,response);
            break;
        case 'password':
            response = passwordvalidation(value).response;
            passwordState = passwordvalidation(value).state;
            validationChanges(input, passwordState,response);
            break;
        default:
            console.error("something went wrong");
            break;
    
    }

});
ALLvalid = userState && passwordState ;  
if (ALLvalid) {
  console.log("valid");
  console.log(ALLvalid);
} else {
  console.log("not valid");
}
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
// if(state == true){
//   feedbackField.classList.add("text-success","m-0","p-0");
//   inputField.classList.add("is-valid");
// }
}
//username validation
function usernamevalidation(value){
  let response="";
  let state=true;
      if(value === ''){
          response ="username est obligatoire";
          state = false;
      }
      return {
          response,
          state};
}
//password validation

function passwordvalidation(password) {
  let response ="";
  let state = true;
if(password == ""){
  state= false;
response= "Le champs mot de passe est obligatoire";
}else if (password.length < 8) {
  state= false;
response= "Le mot de passe doit comporter au moins 8 caractères.";
}
return {response,state}
}
