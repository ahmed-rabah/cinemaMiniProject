
window.addEventListener('DOMContentLoaded',{
let programmeId = document.getElementById('programmeID').Value;
    getProgramme(programmeId).then(programme=>{});
})

async function getProgramme(programme){  
    let request  = await fetch("./functions/programmeSearch.php?idProgramme="+programme);
    let response = await request.json();
    return response;
}