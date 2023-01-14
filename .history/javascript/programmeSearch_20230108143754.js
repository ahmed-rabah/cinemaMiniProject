let programmeId = document.getElementById('programmeID').Value;

window.addEventListener('DOMContentLoaded',{
    getProgramme(programmeId).then();
})

async function getProgramme(programme){  
    let request  = await fetch("./functions/programmeSearch.php?idProgramme="+programme);
    let response = await request.json();
    return response;
}