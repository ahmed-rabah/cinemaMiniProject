let genreField = document.getElementById('genre');
let anneeField = document.getElementById('annee');
let movieName = document.getElementById('movie-name');


genreField.addEventListener('change', () =>{
    let genre =genreField.value;
    let annee = document.getElementById('annee').value;
    let movie = document.getElementById('movie-name').value;
});

anneeField.addEventListener('change', () =>{
    let genre =document.getElementById('genre').value;
    let annee = anneeField.value;
    let movie = document.getElementById('movie-name').value;
    
});
movieName.addEventListener('keyup', () =>{
    let genre = document.getElementById('genre');
    let annee = document.getElementById('annee');
    let movie = movieName.value;
    getMovies(genre,annee,movie).then(movies=>{
        movies.forEach(movie => {
            console.log(movie);
        });
    })

});

async function getMovies(genre,annee,movie){
    let request  = await fetch("./functions/moviesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie);
    let response = await request.json();
    return response;
}