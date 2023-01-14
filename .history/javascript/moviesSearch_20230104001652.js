let genreField = document.getElementById('genre');
let anneeField = document.getElementById('annee');
let movieName = document.getElementById('movie-name');

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