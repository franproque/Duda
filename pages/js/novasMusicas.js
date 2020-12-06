function cadastrar(){
    let data = new FormData();
    data.append('tipo',1);
    data.append('nome',document.getElementById('nome').value)
    data.append('artista',document.getElementById('artista').value)
    data.append('arstistaSec',document.getElementById('artistaSec').value)
    data.append('musica',document.getElementById('musica').value)
    data.append('estilo',document.getElementById('estilo').value)

    fetch('http://localhost/Duda/controllers/Musica.php',{
        method:'post',
        body:data
    }).then(
        function (x){
            alert(x);
        }
    )
}


function carregaArtistas(){

    var t = fetch('http://localhost/Duda/controllers/Artista.php').then(res=>res.json()).then(

    function(x){
        var t=document.getElementById('artista')
        x.forEach(element => {
            var option = document.createElement('option')
            option.setAttribute('value',element.id)
            var texto= document.createTextNode(element.nome)
            option.appendChild(texto)
            t.appendChild(option);
            //t+=t.innerHTML=`<option value='${element.id}'> ${element.nome} </option>`
        });
    }
    )

}

function carregaEstilo(){
    fetch('http://localhost/Duda/controllers/Estilo.php').then(res=>res.json()).then(json=>{
        var t=document.getElementById('estilo')    
    json.forEach(element => {
        var option = document.createElement('option')
        option.setAttribute('value',element.id)
        var texto= document.createTextNode(element.estilo)
        option.appendChild(texto)
        t.appendChild(option);
        });
    })
}
onload=carregaArtistas(),carregaEstilo();