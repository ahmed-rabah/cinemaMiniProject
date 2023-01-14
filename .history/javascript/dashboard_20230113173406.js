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
            let content ="";
        }
    })
})


async function getUserProduct(){
    let request = await fetch("./functions/userDashboard.php");
    return request.json();
}