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
                                <tr class="text-center">
                                <th scope="col">numero produit</th>
                                <th scope="col"  colspan="2">film</th>
                                <th scope="col"  colspan="2">date projection</th>
                                <th scope="col">numero de salle</th>
                                <th scope="col">Places</th>
                                <th scope="col">total</th>
                                <th scope="col">Ticket</th>
                                </tr>
                            </thead>
                            <tbody>`;
            response.forEach(produit=>{
                content+=`<tr>
                            <th scope="row">${produit.id_produit}</th>
                            <td><img src="${produit.photo}"width="100" height="100"></td>
                            <td><h6>${produit.titre}</h6></td>
                            <td>le <strong>${produit.date_projection}</strong></td>
                            <td> à <strong>${produit.heure_debut}</strong></td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>`;
            })
            content+=`  </tbody>
                        </table>`;
                        produits.innerHTML = content;
        }
    })
})


async function getUserProduct(){
    let request = await fetch("./functions/userDashboard.php");
    return request.json();
}