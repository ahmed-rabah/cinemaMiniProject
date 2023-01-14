let activeLink = document.getElementById('accueil');
let produits = document.getElementById('produits');
let parameter = document.getElementById('param');
activeLink.classList.remove('active');

window.addEventListener('DOMContentLoaded',()=>{
    getUserProduct().then(products=>{
        let connected = products.connected;
        let success = products.success;
        let response = products.response;
        console.log(products);
        if(connected === false) {
            response+='<strong><a href="./signin.php">Se connecter</a></strong>';
        }else if(success === false) {
            msg =`<div class="alert alert-warning w-100 fw-bold fs-4" role="alert">${response}</div>`;
        }else{
            let content =`<table class="table table-hover table-dark w-100">
                            <thead>
                                <tr class="text-center fs-4">
                                <th scope="col">Produit</th>
                                <th scope="col"  colspan="2">Film</th>
                                <th scope="col">Projection</th>
                                <th scope="col">Salle</th>
                                <th scope="col">Places</th>
                                <th scope="col">Total</th>
                                <th scope="col">Ticket</th>
                                </tr>
                            </thead>
                            <tbody>`;
            response.forEach(produit=>{
                let PDFgenerated = produit.PDFprinted ? {"disabled":"btn-secondary disabled","msg":"recu dejà générer"} : {"disabled":"btn-primary","msg":"générer le recu"}; 
                content+=`<tr class="text-center">
                            <th scope="row" class="pt-5">${produit.id_produit}</th>
                            <td><img src="${produit.photo}"width="100" height="100"></td>
                            <td class="pt-5"><h5>${produit.titre}</h5></td>
                            <td class="pt-5">le <strong>${produit.date_projection}</strong> à <strong>${produit.heure_debut}</strong></td>
                            <td class="pt-5 fs-5">${produit.num_salle}</td>
                            <td class="pt-5"><strong>${produit.nombre_places}</strong> ticket(s)</td>
                            <td class="pt-5"><strong>${produit.prix}</strong>dh</td>
                            <td class="pt-5"><button type="button" class="btn  ${PDFgenerated.disabled}" onclick="generatePDF(${produit.id_produit})">${PDFgenerated.msg}</button></td>
                        </tr>`;
            })
            content+=`  </tbody>
                        </table>`;
                        produits.innerHTML = content;
        }
    })
})

function generatePDF(produit) {
    generator(produit).then(response=>{
        let downloaded = reponse.downloaded;
        let connected = reponse.connected;
        let reponse = response.reponse;
        let msg="";
        if(!connected) {
            reponse+='<strong><a href="./signin.php">Se connecter</a></strong>';
        } 
        if(!downloaded){
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

    })
}
async function generator(produit){
    let request = await fetch("./PDFgenerateur/PDF.generator.php?id_produit="+produit);
    return request.json();
}
async function getUserProduct(){
    let request = await fetch("./functions/userDashboard.php");
    return request.json();
}