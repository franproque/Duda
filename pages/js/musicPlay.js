
var nMusica=0;
const audio =document.querySelector('.audio')

var barraProgress =  document.getElementById('rola')
let cont =0;
document.querySelector('.play').addEventListener('click',xPlay,false);

function atualizar(){
    var x =  (audio.currentTime*100)/audio.duration
    document.querySelector('.total-time').innerHTML=secToStr(audio.duration);

   
    document.getElementById('rola').style.width=`${x}%`
    document.querySelector('.sec').innerHTML=secToStr(audio.currentTime);
    if(audio.currentTime==audio.duration){
        
        audio.removeEventListener('timeupdate', atualizar , false);
        var ate=true
        while(ate){
            try{
                nMusica  =nMusica+1
                clickMusic(nMusica);
                ate=false;
            }catch{
                if(nMusica> 5000){
                    ate=false;

                }else{
                    ate= true;
                }
                
            }
            
        }
        
    }
}

function xPlay(){
if(cont%2 ==0 || cont==0){


audio.play()
audio.addEventListener('timeupdate', atualizar , false);
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
    nMusica=parseInt(element);
    console.log(element)
    console.log(nMusica)
    document.getElementById('rola').style.width=`0%`;
audio.src=document.getElementById(element+'cv').value;
audio.addEventListener('timeupdate', atualizar , false);
audio.play()
}
function inicio(){
    carregaMusicas()
  
}


function secToStr( sec_num ) {
    sec_num = Math.floor( sec_num );
    var horas   = Math.floor(sec_num / 3600);
    var minutos = Math.floor((sec_num - (horas * 3600)) / 60);
    var segundos = sec_num - (horas * 3600) - (minutos * 60);

    if (horas   < 10) {horas   = "0"+horas;}
    if (minutos < 10) {minutos = "0"+minutos;}
    if (segundos < 10) {segundos = "0"+segundos;}
    var tempo    = horas+':'+minutos+':'+segundos;
    return tempo;
}
inicio();