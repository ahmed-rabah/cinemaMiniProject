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
            response+='<div class="alert alert-warning" role="alert"></div>';
        }elseif(success === false) {
            msg =`<div class="alert alert-warning" role="alert">${response}</div>`;
        }
    })
})


async function getUserProduct(){
    let request = await fetch("./functions/userDashboard.php");
    return request.json();
}