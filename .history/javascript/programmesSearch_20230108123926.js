let genreField = document.getElementById('genre');
let anneeField = document.getElementById('annee');
let movieName = document.getElementById('movie-name');
let projectionDate = document.getElementById('projection');
let programmesSection = document.getElementById('films');
window.addEventListener('DOMContentLoaded', () =>{
    // console.log("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);
    getProgrammes("","","","").then(programmes=>{
        if(programmes.length > 0){
            // programmes.forEach(programme=>{console.log(programme);})
        //     <div class="card" style="width: 18rem;">
        //     <img src="./images/Up.jpg" class="card-img-top align-self-center m-1"style="height:18rem;width :17rem; " alt="...">
        //     <div class="card-body text-center">
        //         <h4 class="card-title">Zodiac</h4>
        //         <h6  class="card-text">action</h6>
        //         <h6  class="card-text m-1">projecté le 12-12-12 à  12:00:00</h6>
        //         <p class="card-text">Some quick example text to build on the card title and make</p>
        //         <h5  class="card-text m-0">prix unitaire : 50dh</h5>
        //         <div class="d-flex justify-content-between">
        //             <button class="btn btn-success me-2">ajouter au panier</button>
        //             <a href="./programme?idProgramme=idFilm" class="btn btn-primary ms-1">voir plus</a>
        //         </div>
        //     </div>
        // </div>
        }else{
            // programmesSection.innerHTML =`hello`;
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
            programmesSection.innerHTML ='';
            programmes.forEach(programme=>{
                let titre = programme;
            })
                //     <div class="card" style="width: 18rem;">
        //     <img src="./images/Up.jpg" class="card-img-top align-self-center m-1"style="height:18rem;width :17rem; " alt="...">
        //     <div class="card-body text-center">
        //         <h4 class="card-title">Zodiac</h4>
        //         <h6  class="card-text">action</h6>
        //         <h6  class="card-text m-1">projecté le 12-12-12 à  12:00:00</h6>
        //         <p class="card-text">Some quick example text to build on the card title and make</p>
        //         <h5  class="card-text m-0">prix unitaire : 50dh</h5>
        //         <div class="d-flex justify-content-between">
        //             <button class="btn btn-success me-2">ajouter au panier</button>
        //             <a href="./programme?idProgramme=idFilm" class="btn btn-primary ms-1">voir plus</a>
        //         </div>
        //     </div>
        // </div>
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
    console.log("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);
    getProgrammes(genre,annee,projection,movie).then(programmes=>{
        // console.log(programmes);


    })
});
projectionDate.addEventListener('change', () =>{
    let genre =document.getElementById('genre').value;
    let annee = document.getElementById('annee').value;
    let movie = document.getElementById('movie-name').value;
    let projection = projectionDate.value;
    console.log("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);
    getProgrammes(genre,annee,projection,movie).then(programmes=>{
        // console.log(programmes);

    })
});
movieName.addEventListener('keyup', () =>{
    let genre = document.getElementById('genre').value;
    let annee = document.getElementById('annee').value;
    let projection = document.getElementById('projection').value;
    let movie = movieName.value;
    console.log("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);
    getProgrammes(genre,annee,projection,movie).then(programmes=>{
        programmes.forEach(programme=>{
            // programmes.forEach(programme=>{console.log(programme);})
        })
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