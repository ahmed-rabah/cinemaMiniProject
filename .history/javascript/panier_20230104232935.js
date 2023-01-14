let panierBtn = document.getElementById('panier');
let deleteProductBtn = document.getElementById('product');
panierBtn.addEventListener('click',()=>{

    getUserPanier(1).then(panier=>{
        panier.forEach(produit => {
            console.log(produit);
        });
    })

});


async function deleteproductFromCart(product,user){
    let request = await fetch("./deleteUserProduct?user="+user+"&product="+product);
    let response = await request.json();
    return response;
}
async function getUserPanier(user){
    let request = await fetch('./functions/panier.php?idUser='+user);
    let response = await request.json();
    return response;
}