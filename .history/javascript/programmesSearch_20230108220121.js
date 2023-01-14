let genreField = document.getElementById('genre');
let anneeField = document.getElementById('annee');
let movieName = document.getElementById('movie-name');
let projectionDate = document.getElementById('projection');
let programmesSection = document.getElementById('programms');
window.addEventListener('DOMContentLoaded', () =>{
    // console.log("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);
    getProgrammes("","","","").then(programmes=>{
        console.log(programmes);
            if(programmes.length > 0){
                ProgrammesContent(programmes)
            }else{
                programmesSection.innerHTML =`<div class="alert alert-danger" role="alert" id="not-found">
                Désolé, nous n'avons pas réussi à trouver de programmes correspondant aux critères donnés. Veuillez affiner votre recherche ou utiliser des termes de recherche différents. </div>`;
            }
    
    })
})
genreField.addEventListener('change', () =>{
    let genre =genreField.value;
    let annee = document.getElementById('annee').value;
    let movie = document.getElementById('movie-name').value;
    let projection = document.getElementById('projection').value;
//    console.log("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);
    getProgrammes(genre,annee,projection,movie).then(programmes=>{
        console.log(programmes);
        if(programmes.length > 0){
            ProgrammesContent(programmes)
        }else{
            programmesSection.innerHTML =`<div class="alert alert-danger" role="alert" id="not-found">
            Désolé, nous n'avons pas réussi à trouver de programmes correspondant aux critères donnés. Veuillez affiner votre recherche ou utiliser des termes de recherche différents. </div>`;
        }

    })
});

anneeField.addEventListener('change', () =>{
    let genre =document.getElementById('genre').value;
    let annee = anneeField.value;
    let projection = document.getElementById('projection').value;
    let movie = document.getElementById('movie-name').value;
    // console.log("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);
    getProgrammes(genre,annee,projection,movie).then(programmes=>{
        if(programmes.length > 0){
            ProgrammesContent(programmes)
        }else{
            programmesSection.innerHTML =`<div class="alert alert-danger" role="alert" id="not-found">
            Désolé, nous n'avons pas réussi à trouver de programmes correspondant aux critères donnés. Veuillez affiner votre recherche ou utiliser des termes de recherche différents. </div>`;
        }



    })
});
projectionDate.addEventListener('change', () =>{
    let genre =document.getElementById('genre').value;
    let annee = document.getElementById('annee').value;
    let movie = document.getElementById('movie-name').value;
    let projection = projectionDate.value;
    // console.log("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);
    getProgrammes(genre,annee,projection,movie).then(programmes=>{
        if(programmes.length > 0){
            ProgrammesContent(programmes)
        }else{
            programmesSection.innerHTML =`<div class="alert alert-danger" role="alert" id="not-found">
            Désolé, nous n'avons pas réussi à trouver de programmes correspondant aux critères donnés. Veuillez affiner votre recherche ou utiliser des termes de recherche différents. </div>`;
        }


    })
});
movieName.addEventListener('keyup', () =>{
    let genre = document.getElementById('genre').value;
    let annee = document.getElementById('annee').value;
    let projection = document.getElementById('projection').value;
    let movie = movieName.value;
    // console.log("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);
    getProgrammes(genre,annee,projection,movie).then(programmes=>{
        if(programmes.length > 0){
            ProgrammesContent(programmes)
        }else{
            programmesSection.innerHTML =`<div class="alert alert-danger" role="alert" id="not-found">
            Désolé, nous n'avons pas réussi à trouver de programmes correspondant aux critères donnés. Veuillez affiner votre recherche ou utiliser des termes de recherche différents. </div>`;
        }

    })
});

movieName.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        
      event.preventDefault();
    }
  });
async function getProgrammes(genre,annee,projection,movie){  
    let request  = await fetch("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);
    let response = await request.json();
    return response;
}


function ProgrammesContent(programmes){
    programmesSection.innerHTML ='';
    programmes.forEach(programme=>{
        let titre = programme.titre;
        let photo = programme.photo;
        let genre = programme.libelle;
        let date_projection = programme.date_projection;
        let heure_debut = programme.heure_debut;
        let prix_unitaire = programme.prix_unitaire;
        let idProgramme = programme.idProgramme;
        let description = programme.resume.slice(0,50);
        let cardObj=`  <div class="card my-2" style="width: 18rem;margin-right :2px;margin-left :2px;">
                    <img src="${photo}" class="card-img-top align-self-center m-1"style="height:18rem;width :17rem; " alt="...">
                    <div class="card-body text-center">
                        <h4 class="card-title">${titre}</h4>
                        <h6  class="card-text">${genre}</h6>
                        <h6  class="card-text m-1">projecté le ${date_projection} à  ${heure_debut}</h6>
                        <p class="card-text">${description}...</p>
                        <h5  class="card-text m-0">prix unitaire : ${prix_unitaire} DH</h5>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-success me-2 addToCart" data-programmeID="${idProgramme}">ajouter au panier</button>
                            <a href="./programme.php?idProgramme=${idProgramme}" class="btn btn-primary ms-1">voir plus</a>
                        </div>
                    </div>
                </div>`;
            programmesSection.insertAdjacentHTML('beforeend',cardObj)
    })
}