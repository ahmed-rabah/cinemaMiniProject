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
    let genreField = document.getElementById('genre');
    let anneeField = document.getElementById('annee');
    let movie = movieName.value;


});

async function getMovies(genre,annee,movie){
    let  = await fetch("./functions/moviesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie);
}