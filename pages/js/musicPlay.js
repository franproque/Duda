

const audio =document.querySelector('.audio')
audio.addEventListener('timeupdate', atualizar , false);
var barraProgress =  document.getElementById('rola')
let cont =0;
document.querySelector('.play').addEventListener('click',xPlay,false);

function atualizar(){
    var x =  (audio.currentTime*100)/audio.duration
   
    document.getElementById('rola').style.width=`${x}%`
}

function xPlay(){
if(cont%2 ==0 || cont==0){


audio.play()
}else{
    audio.pause()
}
cont++;
}
/*
function proximo(){
    barraProgress.style.width=`0%`
    audio.src="";

}*/


function carregaMusicas(){
    var data = new FormData();
    data.append('tipo',2)
    var musicas =fetch('http://localhost/Duda/controllers/Musica.php',{
        method:'post',
        body:data
    }).then(
        res=>res.json()
    ).then(json=> {
        json.forEach(element => {
            tabela = document.querySelector('table')
            var linha   = tabela.insertRow(-1);
            var coluna1 = linha.insertCell(0);
            var coluna2 = linha.insertCell(1);
            var coluna3 = linha.insertCell(2);
            var entrada = `   <input type="text" id='${element.id}cv' value='${element.musica}'>`
            coluna3.setAttribute('hidden',"true")
            coluna3.setAttribute('id',element.id+"c")
            linha.setAttribute('id',element.id)
            linha.setAttribute('onclick','clickMusic(this.id)')
            coluna1.innerHTML=element.id;
            coluna2.innerHTML=element.nome;
            coluna3.innerHTML=entrada;
        });
    })

   
}



   
            


function clickMusic(element){
audio.src=document.getElementById(element+'cv').value;
xPlay()

}
function inicio(){
    carregaMusicas()
  
}

inicio();