let commandeBtn = document.getElementById('commander');


commandeBtn.addEventListener('click', function(){

})




async function FinaliserCommande(cardType,cardNumber){
    let request = await fetch("./functions/finaliserCommande.php?type="+cardType+"&number="+cardNumber);
    let response = await request.json();
    return response;
}