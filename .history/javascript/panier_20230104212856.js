let panierBtn = document.getElementById('panier');

panierBtn.addEventListener('click',()=>{

    getUserPanier(1).then(panier=>{
        panier.forEach(produit => {
            console.log(produit);
        });
    })

});


async function getUserPanier(user){
    let request = await fetch('./functions/panier.php?idUser='+user);
    let response = await request.json();
    return response;
}