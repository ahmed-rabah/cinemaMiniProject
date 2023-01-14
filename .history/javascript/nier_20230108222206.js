let panierBtn = document.getElementById('panier');
let deleteProductBtn = document.getElementById('deleteproduct');
let updateProductBtn = document.getElementById('updateproduct');
let addProductBtn =  document.getElementById('addProduct');

window.addEventListener('load',()=>{
    let addBtns = document.querySelectorAll('.addToCart');
console.log("begin");
addBtns.forEach(addBtn=>{
let programmeID  = addBtn.dataSet.programmeID;

console.log(programmeID);

});
console.log("ends");


})
/*
panierBtn.addEventListener('click',()=>{

    getUserPanier(1).then(panier=>{
        panier.forEach(produit => {
            console.log(produit);
        });
    })

});

addProductBtn.addEventListener('click',()=>{
    addProduct(programme).then(response=>{
        console.log(response);
    })
});

deleteProductBtn.addEventListener('click',()=>{
    deleteproductFromCart(programme).then(response=>{
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
    let request = await fetch("./functions/deleteUserProduct.php?idProgramme="+product);
    let response = await request.json();
    return response;
}
async function updateproductCart(product,status){
    let request = await fetch("./functions/updateUserProduct.php?idProgramme="+product+"&status="+status);
    let response = await request.json();
    return response;
}
async function getUserPanier(){
    let request = await fetch('./functions/panier.php');
    let response = await request.json();
    return response;
}

async function addProduct(programme){
    let request = await fetch('./functions/addproduct.php?idProgramme='+programme);
    let response = await request.json();
    return response; 
}

*/