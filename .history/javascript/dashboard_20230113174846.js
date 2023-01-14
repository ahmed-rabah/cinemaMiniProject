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
            let content =`<table class="table table-hover table-dark">
                            <thead>
                                <tr>
                                <th scope="col">numero produit</th>
                                <th scope="col">programme</th>
                                <th scope="col">date projection</th>
                                <th scope="col">Places</th>
                                <th scope="col">total</th>
                                <th scope="col">Ticket</th>
                                </tr>
                            </thead><tbody>`;
            response.forEach(produit=>{
                content+=
            })
        }
    })
})


async function getUserProduct(){
    let request = await fetch("./functions/userDashboard.php");
    return request.json();
}