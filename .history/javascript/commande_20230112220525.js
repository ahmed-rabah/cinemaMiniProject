let form =  document.getElementById('buyingForm');



form.addEventListener('submit', function(e){
    e.preventDefault();
    let cardType = document.getElementById('cardType').value;
    let cardNumber = document.getElementById('cardNumber').value;
    FinaliserCommande(cardType, cardNumber).then(response=>{
        let complited = response.complited;
        let reponse = response.response;
        let connected = response.connected;
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
            'Content-type': 'application/json; charset=UTF-8',
        },
        });
    let response = await request.json();
    return response;
    
    //doing get just for testing
    // let request =  await fetch('./functions/finaliserCommande.php?type='+cardType+'&number='+cardNumber);
}