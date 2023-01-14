let genreField = document.getElementById('genre');
let anneeField = document.getElementById('annee');
let movieName = document.getElementById('movie-name');


genreField.addEventListener('change', () =>{
    alert(genreField.value);
});

anneeField.addEventListener('change', () =>{
    alert(anneeField.value);
    
});
movieName.addEventListener('keyup', () =>{
    alert(movieName.value);

});