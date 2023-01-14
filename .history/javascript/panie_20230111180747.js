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
            reponse+='<strong><a href="./signin.php">Se connecter</a></strong>';
        } 
        if(!added){
            msg=`<div class="alert alert-warning alert-dismissible fade show" role="alert" id="myAlert">
            ${reponse}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>`;
        }else{
            msg=`<div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert">
            ${reponse}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>`;
        }
        let body = document.querySelector('body');
        body.insertAdjacentHTML('beforeend',`<div class="absolute-alert">${msg}</div>`);
        let theAlert = document.querySelector('.absolute-alert');
        theAlert.addEventListener('click',function(e){
            if(e.target.classList.contains('absolute-alert')){
            theAlert.outerHTML="";
        }})
        let myAlert = document.getElementById('myAlert')
            myAlert.addEventListener('close.bs.alert', () => {
                theAlert.outerHTML="";
            })

        setTimeout(() => {theAlert.outerHTML="";},10000);    
    })

    // console.log(id);
}

panierBtn.addEventListener('click', () => {
    getUserPanier().then(data=>{
        console.log(data);
        cartDiv = `<div class="absoluteCart m-2 w-50">${data}</div>`;
        let body = document.querySelector('body');
        body.insertAdjacentHTML("beforeend",cartDiv);   

    })

})
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
*/
async function getUserPanier(){
    let request = await fetch('./functions/panier.php');
    let response = await request.json();
    let msg="";
    if(response === false){
        msg =`<div class="alert alert-info" role="alert">
            le panier est vide
            </div>`;
    }else{
        response.forEach(produit => {
            msg+=`<div class="card border-primary mb-5" style="max-width: 20rem;">
            <div class="card-header"><h1>${produit[0].titre}</h1></div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                <img src="${produit[0].photo}" width="60px" height="66px">
                    <div>
                        <p class="card-title  m-0 fw-normal">le ${produit[0].date_projection} à ${produit[0].heure_debut}</p>
                        <p class="card-text m-0 fw-normal">prix_unitaire : ${produit[0].prix_unitaire} DH</p>
                        <p class="card-text m-0 fw-normal">tickets disponible : ${produit[0].ticketsDisponible} ticket(s)</p>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-center align-items-center">
                        <h6 class="btn plus" data-idprogramme="${produit.idProgramme}"><i class="uil uil-minus-circle fs-5 text-success"></i></h6>
                        <h6> ${produit.nbrPlace} </h6>
                        <h6 class="btn minus" data-idprogramme="${produit.idProgramme}"><i class="uil uil-plus-circle fs-5 text-danger"></i></h6>
                        </div>
                        <h6>Total : ${produit.prix} DH</h6>
                        <button class="btn btn-danger" data-idprogramme="${produit.idProgramme}"><i class="uil uil-trash-alt"></i></button>
                </div>
            </div></div>`;
        });
    }

    return msg;
}

async function addProduit(programme){
    let request = await fetch('./functions/addproduct.php?idProgramme='+programme);
    let response = await request.json();
    return response; 
}
