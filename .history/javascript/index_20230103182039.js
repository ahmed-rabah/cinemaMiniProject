let genreField = document.getElementById('genre');
let anneeField = document.getElementById('annee');
let movieName = document.getElementById('movie-name');
let projectionDate = document.getElementById('projection');


genreField.addEventListener('change', () =>{
    let genre =genreField.value;
    let annee = document.getElementById('annee').value;
    let movie = document.getElementById('movie-name').value;
    let projection = document.getElementById('projection');
    getProgrammes(genre,annee,projection,movie).then(programmes=>{
        programmes.forEach(programme=>{
            console.log(programme);
        })
    })
});

anneeField.addEventListener('change', () =>{
    let genre =document.getElementById('genre').value;
    let annee = anneeField.value;
    let projection = document.getElementById('projection');
    let movie = document.getElementById('movie-name').value;
    getProgrammes(genre,annee,projection,movie).then(programmes=>{
        programmes.forEach(programme=>{
            console.log(programme);
        })
    })
});
projectionDate.addEventListener('change', () =>{
    let genre =document.getElementById('genre').value;
    let annee = document.getElementById('annee');
    let movie = document.getElementById('movie-name').value;
    let projection = projectionDate.value;
    getProgrammes(genre,annee,projection,movie).then(programmes=>{
        programmes.forEach(programme=>{
            console.log(programme);
        })
    })
});
movieName.addEventListener('keyup', () =>{
    let genre = document.getElementById('genre').value;
    let annee = document.getElementById('annee').value;
    let projection = document.getElementById('projection');
    let movie = movieName.value;
    getProgrammes(genre,annee,projection,movie).then(programmes=>{
        programmes.forEach(programme=>{
            console.log(programme);
        })
      
    })
    // movieName.addEventListener("keydown", function(event) {
    //     if (event.key === "Enter") {
    //       event.preventDefault();
    //     }
    //   });

});

async function getProgrammes(genre,annee,projection,movie){  
    let request  = await fetch("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&projection="+projection+"&movie="+movie);
    let response = await request.json();
    return response;
}