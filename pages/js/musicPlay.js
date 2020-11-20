

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