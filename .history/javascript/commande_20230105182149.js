let commandeBtn = document.getElementById('commander');







async function FinaliserCommande(cardType,cardNumber){
    let request = await fetch("./functions/finaliserCommande.php?type="+cardType+"&number="+cardNumber);
    let response = await request.json();
    return response;

}