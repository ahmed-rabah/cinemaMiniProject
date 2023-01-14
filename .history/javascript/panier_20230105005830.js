let panierBtn = document.getElementById('panier');
let deleteProductBtn = document.getElementById('deleteproduct');
let updateProductBtn = document.getElementById('updateproduct');
let addProduct =  document.getElementById('addProduct');
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

updateProductBtn.addEventListener('click',()=>{
    let product =  document.getElementById('product').value;
    updateproductCart(product,nbr).then(response=>{
        console.log(response);
    })
});


async function deleteproductFromCart(product){
    let request = await fetch("./functions/deleteUserProduct.php?product="+product);
    let response = await request.json();
    return response;
}
async function updateproductCart(product,nbrPlace){
    let request = await fetch("./functions/updateUserProduct.php?product="+product+"&nbrPlace="+nbrPlace);
    let response = await request.json();
    return response;
}
async function getUserPanier(user){
    let request = await fetch('./functions/panier.php?idUser='+user);
    let response = await request.json();
    return response;
}

async function addProduct(user,programme){
    let request = await fetch('./functions/addproduct.php?idUser='+user+"$idProgramme="+programme);
    let response = await request.json();
    return response; 
}