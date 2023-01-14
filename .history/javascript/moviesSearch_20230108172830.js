let genreField = document.getElementById('genre');
let anneeField = document.getElementById('annee');
let movieName = document.getElementById('movie-name');
let moviesSection = document.getElementById('films');
window.addEventListener('DOMContentLoaded',()=>{
    getMovies("","","").then(movies=>{
        console.log(movies);
        if(movies.length > 0){
            moviesContent(movies)
        }else{
            moviesSection.innerHTML =`<div class="alert alert-danger" role="alert" id="not-found">
            Désolé, nous n'avons pas réussi à trouver de films correspondant aux critères donnés. Veuillez affiner votre recherche ou utiliser des termes de recherche différents. </div>`;
        }

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
        let date_sortie = movie.date_sortie;
        let enCoursdeProjection = (movie.en_cours_de_projection) ? "oui" : 'non' ;
        let idFilm = movie.idFilm;
        let description = movie.resume.slice(0,50);
        let cardObj=`  <div class="card my-2" style="width: 18rem;margin-right :2px;margin-left :2px;">
                    <img src="${photo}" class="card-img-top align-self-center m-1"style="height:18rem;width :17rem; " alt="...">
                    <div class="card-body text-center">
                        <h4 class="card-title">${titre}</h4>
                        <h6  class="card-text">${genre}</h6>
                        <h6  class="card-text m-1">date de sortie : ${date_sortie}</h6>
                        <p class="card-text">${description}...</p>
                        <h5  class="card-text m-0">en cours de projection: ${enCoursdeProjection}</h5>
                            <a href="./movie.php?idFilm=${idFilm}" class="btn btn-primary my-1 align-self-center">voir plus</a>
                    </div>
                </div>`;
            moviesSection.insertAdjacentHTML('beforeend',cardObj)
    })
}