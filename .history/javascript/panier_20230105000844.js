let panierBtn = document.getElementById('panier');
let deleteProductBtn = document.getElementById('deleteproduct');
let updateProductBtn = document.getElementById('updateproduct');
panierBtn.addEventListener('click',()=>{

    getUserPanier(1).then(panier=>{
        panier.forEach(produit => {
            console.log(produit);
        });
    })

});

deleteProductBtn.addEventListener('click',()=>{
    let product =  document.getElementById('product').value;
    deleteproductFromCart(product).then(response=>{
        console.log(response);
    })
});

async function deleteproductFromCart(product){
    let request = await fetch("./functions/deleteUserProduct.php?product="+product);
    let response = await request.json();
    return response;
}
async function updateproductCart(product){
    let request = await fetch("./functions/updateUserProduct.php?product="+product);
    let response = await request.json();
    return response;
}
async function getUserPanier(user){
    let request = await fetch('./functions/panier.php?idUser='+user);
    let response = await request.json();
    return response;
}