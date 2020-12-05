const utterance = new SpeechSynthesisUtterance();

utterance.lang="pt-BR";



utterance.text="Oii Eu Sou o Francisco"


function fala(){
speechSynthesis.speak(utterance);

}