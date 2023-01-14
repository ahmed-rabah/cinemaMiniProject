let panierBtn = document.getElementById('panier');

panierBtn.addEventListener('click',()=>{

});


async function getUserPanier(user){
    let request = await fetch('./functions/panier.php?idUser='+user);
}