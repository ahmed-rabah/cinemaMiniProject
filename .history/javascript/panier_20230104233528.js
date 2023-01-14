let panierBtn = document.getElementById('panier');
let deleteProductBtn = document.getElementById('deleteproduct');
panierBtn.addEventListener('click',()=>{

    getUserPanier(1).then(panier=>{
        panier.forEach(produit => {
            console.log(produit);
        });
    })

});

deleteProductBtn.addEventListener('click',()=>{
    let product =  document.getElementById('product').value;
    let user ="1"; // to modify later on
    deleteproductFromCart(product,user).then(response=>{
        console.log(response);
    })
});

async function deleteproductFromCart(product,user){
    let request = await fetch("./functions/deleteUserProduct.php?user="+user+"&product="+product);
    let response = await request.json();
    return response;
}
async function getUserPanier(user){
    let request = await fetch('./functions/panier.php?idUser='+user);
    let response = await request.json();
    return response;
}