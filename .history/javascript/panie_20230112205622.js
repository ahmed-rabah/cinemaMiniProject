let panierBtn = document.getElementById('panier');
let deleteProductBtn = document.getElementById('deleteproduct');
let updateProductBtn = document.getElementById('updateproduct');
let addProductBtn =  document.getElementById('addProduct');
let cartContainer = document.getElementById('cartContainer');

window.addEventListener('DOMContentLoaded',()=>{
    getUserPanier("container").then(data=>{
            cartContainer.innerHTML = data;
        })
})
window.addEventListener('load',()=>{
    setTotalPrice()
})
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

        // setTimeout(() => {theAlert.outerHTML="";},10000);   
    })

    // console.log(id);
}
panierBtn.addEventListener('click', () => {
    userCart()
    let cart = document.querySelector('.absoluteCart');
    cart.classList.toggle('show-cart');
})

async function deleteproductFromCart(product){
    let request = await fetch("./functions/deleteUserProduct.php?idProgramme="+product);
    let response = await request.json();
    let deleted = response.deleted;
    let reponse = response.response;
    let connected = response.connected;
    let msg="";
    let cartItem = document.getElementById('cart'+product);
    if(!connected) {
        reponse+='<strong><a href="./signin.php">Se connecter</a></strong>';
    } 
    if(!deleted){
        msg=`<div class="alert alert-warning alert-dismissible fade show" role="alert" id="myAlert">
        ${reponse}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`;
      cartItem.insertAdjacentHTML('beforebegin',msg);
    }else{
        msg=`<div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert">
        ${reponse}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`;
      cartItem.outerHTML=msg;
      setTotalPrice()
    }
    // let cart = document.querySelector('.absoluteCart');

}
async function updateproductCart(product,status){
    let request = await fetch("./functions/updateUserProduct.php?idProgramme="+product+"&status="+status);
    let response = await request.json();
    let updated = response.updated;
    let reponse = response.response;
    let connected = response.connected;
    let msg="";
    let cartItem = document.getElementById('cart'+product);
    if(!connected) {
        reponse+='<strong><a href="./signin.php">Se connecter</a></strong>';
    } 
    if(connected && updated === false){
        msg=`<div class="alert alert-danger alert-dismissible fade show" role="alert" id="myAlert">
        ${reponse}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`;
    }else{
        msg=`<div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert">
        ${reponse}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`;
        getCartItem(product).then(result => {
            cartItem.insertAdjacentHTML('beforebegin',msg);
            cartItem.outerHTML = result ; 
            
        })
        setTotalPrice();
    }
    // let body = document.querySelector('body');
    // body.insertAdjacentHTML('beforeend',`<div class="absolute-alert">${msg}</div>`);
    // let theAlert = document.querySelector('.absolute-alert');
    // theAlert.addEventListener('click',function(e){
    //     if(e.target.classList.contains('absolute-alert')){
    //     theAlert.outerHTML="";
    // }})
    // let myAlert = document.getElementById('myAlert')
    //     myAlert.addEventListener('close.bs.alert', () => {
    //         theAlert.outerHTML="";
    //     })

    // setTimeout(() => {theAlert.outerHTML="";},10000);   
               
}

function userCart(){
    getUserPanier().then(data=>{
        console.log(data);
        let cartDiv = document.querySelector('.absoluteCart');
        cartDiv.innerHTML=data;
        let Final = document.createElement('a');
        Final.setAttribute('href',"./finaliserCommande.php");
        Final.className="btn btn-primary w-100  finaliserBtn";
        Final.innerHTML="finaliser la commande";
        cartDiv.prepend(Final);
    })
    
}

async function getCartItem(item){
    let request = await fetch('./functions/panier.php?item='+item);
    let response = await request.json();
    let msg="";
    if(response === false){
        msg =`<div class="alert alert-primary h-25" role="alert">
        le panier est vide
        </div>`;
    }else{
        msg=cartItemInfos(response);
         }
    
    return msg;
}
async function getTotalPrice(){
    let request = await fetch('./functions/panier.php?total=oui');
    let response =request.text();
    return response;
}
function setTotalPrice(){

getTotalPrice().then((totalPrice)=>{
    // console.log(totalPrice);
    let totalPriceField = document.getElementById('totalPrice');
    totalPriceField.innerHTML = totalPrice;
})

}
async function getUserPanier(){
    let request = await fetch('./functions/panier.php');
    let response = await request.json();
    let msg="";
    if(response === false){
        msg =`<div class="alert alert-primary h-25" role="alert">
        le panier est vide
            </div>`;
    }else{
        response.forEach(produit => {
            msg+=cartItemInfos(produit);
        });
    }
    
    return msg;
}

async function addProduit(programme){
    let request = await fetch('./functions/addproduct.php?idProgramme='+programme);
    let response = await request.json();
    return response; 
}

function cartItemInfos(produit){
        return `<div class="card border-primary  mb-2 w-100"  id="cart${produit.idProgramme}">
        <div class="card-header"><h4>${produit[0].titre}</h4></div>
        <div class="card-body  text-dark">
        <div class="d-flex justify-content-center">
        <img src="${produit[0].photo}" width="60px" height="66px">
        <div class="ms-1">
        <p class="card-title  m-0 fw-normal">le <strong>${produit[0].date_projection}</strong> à <strong>${produit[0].heure_debut}</strong></p>
        <p class="card-text m-0 fw-normal">prix_unitaire :<strong> ${produit[0].prix_unitaire} DH</strong></p>
        <p class="card-text m-0 fw-normal">tickets disponible :<strong> ${produit[0].ticketsDisponible}</strong> ticket(s)</p>
        </div>
        </div>
        </div>        
        <div class="card-footer d-flex justify-content-between align-items-center p-1">
        <div class="d-flex justify-content-center align-items-center">
        <h6 class="btn minus" onclick="updateproductCart(${produit.idProgramme},'minus')"><i class="uil uil-minus-circle fs-5 text-danger"></i></h6>
        <h6> ${produit.nbrPlace} </h6>
        <h6 class="btn plus" onclick="updateproductCart(${produit.idProgramme},'plus')"><i class="uil uil-plus-circle fs-5 text-success"></i></h6>
        </div>
        <h6>Total : ${produit.prix} DH</h6>
        <button class="btn btn-danger"  onclick="deleteproductFromCart(${produit.idProgramme})"><i class="uil uil-trash-alt"></i></button>
        </div>
        </div>`;
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

*/
// })