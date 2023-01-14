let form =  document.getElementById('buyingForm');



form.addEventListener('submit', function(e){
    e.preventDefault();
    let cardType = document.getElementById('cardType').value;
    let cardNumber = document.getElementById('cardNumber').value;
    FinaliserCommande(cardType, cardNumber).then(response=>{
        alert("response"+ response)
        // let complited = response.complited;
        // let reponse = response.response;
        // let connected = response.connected;
        // alert(connected);
        // alert(complited);
        // alert(reponse);
    //     let msg="";
    //     if(!connected) {
    //         reponse+='<strong><a href="./signin.php">Se connecter</a></strong>';
    //     } 
    //     if(!complited){
    //         msg=`<div class="alert alert-warning alert-dismissible fade show" role="alert" id="myAlert">
    //         ${reponse}
    //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //       </div>`;
    //     }else{
    //         msg=`<div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert">
    //         ${reponse}
    //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //       </div>`;
    //       setTimeout(() => {
    //         location.href="./dashboard.php"
    //       }, 10000);
    //     }
    //     let body = document.querySelector('body');
    //     body.insertAdjacentHTML('beforeend',`<div class="absolute-alert">${msg}</div>`);
    //     let theAlert = document.querySelector('.absolute-alert');
    //     theAlert.addEventListener('click',function(e){
    //         if(e.target.classList.contains('absolute-alert')){
    //         theAlert.outerHTML="";
    //     }})
    //     let myAlert = document.getElementById('myAlert')
    //         myAlert.addEventListener('close.bs.alert', () => {
    //             theAlert.outerHTML="";
    //         })

    })
})




async function FinaliserCommande(cardType,cardNumber){
    let request = await fetch('./functions/finaliserCommande.php', {
        method: 'POST',
        body: JSON.stringify({
            type: cardType,
            number:cardNumber 
        }),
        headers: {
            "Content-type": "application/json; charset=UTF-8"
        }
        });
    let response = await request.json();
    return response;
    
    //doing get just for testing
    // let request =  await fetch('./functions/finaliserCommande.php?type='+cardType+'&number='+cardNumber);
}