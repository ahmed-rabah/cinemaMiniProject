let genreField = document.getElementById('genre');
let anneeField = document.getElementById('annee');
let movieName = document.getElementById('movie-name');
let projectionDate = document.getElementById('projection');


genreField.addEventListener('change', () =>{
    let genre =genreField.value;
    let annee = document.getElementById('annee').value;
    let movie = document.getElementById('movie-name').value;
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
    movieName.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
          event.preventDefault();
        }
      });

});

async function getProgrammes(genre,annee,projection,movie){  
    let request  = await fetch("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&projection="+projection+"&movie="+movie);
    let response = await request.json();
    return response;
}