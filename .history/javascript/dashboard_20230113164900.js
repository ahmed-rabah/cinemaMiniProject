let activeLink = document.getElementById('accueil');
let produits = document.getElementById('produits');
let parameter = document.getElementById('param');
activeLink.classList.remove('active');




async function getUserProduct(){
    let request = await fetch("./functions/userDashboard.php");
    return request.json();
}