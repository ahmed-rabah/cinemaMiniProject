let panierBtn = document.getElementById('panier');
let deleteProductBtn = document.getElementById('deleteproduct');
let updateProductBtn = document.getElementById('updateproduct');
let addProductBtn =  document.getElementById('addProduct');


function addProduct(id){
    addProduit(id).then(response=>{
        let added = response.added;
        let reponse = response.response;
        let connected = response.connected;
       let msg="";
        if(!connected) {
            response+='<strong><a href="./signin.php">Se connecter</a></strong>';
        } 
        if(!added){
            msg=`<div class="alert alert-warning alert-dismissible fade show" role="alert">
            ${reponse}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>`;
        }else{
            msg=`<div class="alert alert-success alert-dismissible fade show" role="alert">
            ${reponse}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>`;
        }
        document.insertAdjacentHTML('beforeend',`<div class="absolute-alert">${msg}</div>`);
        let theAlert = document.querySelector('.absolute-alert');
        theAlert.addEventListener('click',function(e){
            if(e.target.classList.contains('absolute-alert')){
            theAlert.outerHTML="";
        }})
    })

    // console.log(id);
}
// window.addEventListener('load',()=>{
    //     let addBtns = document.querySelectorAll('.addToCart');
// console.log("begin");
// addBtns.forEach(addBtn=>{
// let programmeID  = addBtn.dataSet.programmeID;
// console.log("ok");
// console.log(programmeID);

// });
// console.log("ends");


// })
/*
panierBtn.addEventListener('click',()=>{
    
    getUserPanier(1).then(panier=>{
        panier.forEach(produit => {
            console.log(produit);
        });
    })
    
});

// addProductBtn.addEventListener('click',()=>{
//     addProduct(programme).then(response=>{
    //         console.log(response);
    //     })
// });

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

*/
async function addProduit(programme){
    let request = await fetch('./functions/addproduct.php?idProgramme='+programme);
    let response = await request.json();
    return response; 
}
