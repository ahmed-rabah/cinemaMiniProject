let genreField = document.getElementById('genre');
let anneeField = document.getElementById('annee');
let movieName = document.getElementById('movie-name');
let projectionDate = document.getElementById('projection');


genreField.addEventListener('change', () =>{
    let genre =genreField.value;
    let annee = document.getElementById('annee').value;
    let movie = document.getElementById('movie-name').value;
    let projection = document.getElementById('projection').value;
   console.log("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);

    getProgrammes(genre,annee,projection,movie).then(programmes=>{
            console.log(programmes);

    })
});

anneeField.addEventListener('change', () =>{
    let genre =document.getElementById('genre').value;
    let annee = anneeField.value;
    let projection = document.getElementById('projection').value;
    let movie = document.getElementById('movie-name').value;
    console.log("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);
    getProgrammes(genre,annee,projection,movie).then(programmes=>{
        console.log(programmes);


    })
});
projectionDate.addEventListener('change', () =>{
    let genre =document.getElementById('genre').value;
    let annee = document.getElementById('annee').value;
    let movie = document.getElementById('movie-name').value;
    let projection = projectionDate.value;
    console.log("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);
    getProgrammes(genre,annee,projection,movie).then(programmes=>{
        console.log(programmes);

    })
});
movieName.addEventListener('keyup', () =>{
    let genre = document.getElementById('genre').value;
    let annee = document.getElementById('annee').value;
    let projection = document.getElementById('projection').value;
    let movie = movieName.value;
    console.log("./functions/programmesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);
    getProgrammes(genre,annee,projection,movie).then(programmes=>{
        console.log(programmes);


      
    })
    // movieName.addEventListener("keydown", function(event) {
    //     if (event.key === "Enter") {
    //       event.preventDefault();
    //     }
    //   });

});
async function getProgrammes(genre,annee,projection,movie){  
    let request  = await fetch("./functions/prograesSearch.php?genre="+genre+"&annee="+annee+"&movie="+movie+"&projection="+projection);
    let response = await request.json();
    return response;
}