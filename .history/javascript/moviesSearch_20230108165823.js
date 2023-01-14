let genreField = document.getElementById('genre');
let anneeField = document.getElementById('annee');
let movieName = document.getElementById('movie-name');
let moviesSearch = document.getElementById('films');
window.addEventListener('DOMContentLoaded',()=>{
    getMovies("","","").then(movies=>{
        console.log(movies);
        // movies.forEach(movie=>{
        //     console.log(movie);
        // })
    })
})
genreField.addEventListener('change', () =>{
    let genre =genreField.value;
    let annee = document.getElementById('annee').value;
    let movie = document.getElementById('movie-name').value;
    console.log("./functions/moviesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie);
    getMovies(genre,annee,movie).then(movies=>{
        movies.forEach(movie=>{
            console.log(movie);
        })
    })
});

anneeField.addEventListener('change', () =>{
    let genre =document.getElementById('genre').value;
    let annee = anneeField.value;
    let movie = document.getElementById('movie-name').value;
    
    getMovies(genre,annee,movie).then(movies=>{
        movies.forEach(movie=>{
            console.log(movie);
        })
    })
});
movieName.addEventListener('keyup', () =>{
    let genre = document.getElementById('genre').value;
    let annee = document.getElementById('annee').value;
    let movie = movieName.value;
    getMovies(genre,annee,movie).then(movies=>{
        movies.forEach(movie=>{
            console.log(movie);
        })
      
    })
    
});
movieName.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
      event.preventDefault();
    }
  });

async function getMovies(genre,annee,movie){
    
    let request  = await fetch("./functions/moviesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie);
    let response = await request.json();
    return response;
}

function moviesContent(movies){
    moviesSection.innerHTML ='';
    movies.forEach(movie=>{
        let titre = movie.titre;
        let photo = movie.photo;
        let genre = movie.libelle;
        let date_projection = movie.date_projection;
        let heure_debut = movie.heure_debut;
        let prix_unitaire = movie.prix_unitaire;
        let idmovie = movie.idmovie;
        let description = movie.resume.slice(0,50);
        let cardObj=`  <div class="card my-2" style="width: 18rem;margin-right :2px;margin-left :2px;">
                    <img src="${photo}" class="card-img-top align-self-center m-1"style="height:18rem;width :17rem; " alt="...">
                    <div class="card-body text-center">
                        <h4 class="card-title">${titre}</h4>
                        <h6  class="card-text">${genre}</h6>
                        <h6  class="card-text m-1">projecté le ${date_projection} à  ${heure_debut}</h6>
                        <p class="card-text">${description}...</p>
                        <h5  class="card-text m-0">prix unitaire : ${prix_unitaire} DH</h5>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-success me-2 addToCart">ajouter au panier</button>
                            <a href="./movie.php?idmovie=${idmovie}" class="btn btn-primary ms-1">voir plus</a>
                        </div>
                    </div>
                </div>`;
            moviesSection.insertAdjacentHTML('beforeend',cardObj)
    })
}