let commandeBtn = document.getElementById('commander');


commandeBtn.addEventListener('click', function(){

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