let genreField = document.getElementById('genre');
let anneeField = document.getElementById('annee');
let movieName = document.getElementById('movie-name');


genreField.addEventListener('change', () =>{
    let genre =genreField.value;
    let annee = document.getElementById('annee').value;
    let movieName = document.getElementById('movie-name').value;
});

anneeField.addEventListener('change', () =>{
    let genre =document.getElementById('genre').value;
    let annee = anneField.value;
    let movieName = document.getElementById('movie-name').value;
    
});
movieName.addEventListener('keyup', () =>{
    let genreField = document.getElementById('genre');
    let anneeField = document.getElementById('annee');
    let movieName = movieName.value;

});