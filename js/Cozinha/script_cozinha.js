
let questoes = [

  {
    titulo: 'Qual o melhor lugar para comer ?',
    alternativas : ['Cama', 'Sofá', 'Mesa da cozinha', ''],
    correta: 2
  },

  {
    titulo: 'Depois de comer, deve fazer o que ?',
    alternativas : ['Deixar o prato na mesa', 'Recolher o prato e talheres e levar até a pia da cozinha', 'Assistir TV'],
    correta: 1
  },

  {
    titulo: 'Precisamos pensar em alguma pergunta ?',
    alternativas : ['Alternativa 1', 'Alternativa 2', 'Alternativa 3'],
    correta: 0
  },

  {
    
  }
]

let app = {
start: function(){

  this.Atualpos = 0;
  this.Totalpontos = 0;

  let alts = document.querySelectorAll('.alternativa');
  alts.forEach((element, index)=>{
    element.addEventListener('click', ()=>{
     this.checaResposta(index);
    })
  })

  this.atualizaPontos();
  this.mostrarquestao(questoes[this.Atualpos]);
},

 mostrarquestao: function(q){
  this.qatual = q;
  // Mostrando o titulo
  let titleDiv = document.getElementById('titulo');
  titleDiv.textContent = q.titulo;

  // Mostrando as alternativas
  let alts = document.querySelectorAll('.alternativa');
  alts.forEach(function(element, index){
    element.textContent = q.alternativas[index];
  })
},

ProximaQuest: function(){
  this.Atualpos++;
  if(this.Atualpos == questoes.length){
    this.Atualpos = 0;
  }
},

checaResposta: function(user){
  if(this.qatual.correta == user){
    console.log("Correta")
    this.Totalpontos++;
    this.mostraResposta(true);
  }
  else{
    console.log("Errada")
    this.mostraResposta(false);
  }
  this.atualizaPontos();
  this.ProximaQuest();
  this.mostrarquestao(questoes[this.Atualpos]);
},

atualizaPontos: function(){
  let scoreDiv = document.getElementById('pontos');
  scoreDiv.textContent = `Sua pontuação é: ${this.Totalpontos}`;
},

mostraResposta: function(correto){
  let resultDiv = document.getElementById('resultado');
  let resultado = '';

  // Formate com a mensagem a ser exibida
  if(correto){
    resultado = 'Resposta Correta!';
  }
  else{
    //obtendo a questão atual
    let questao = questoes[this.Atualpos];
    // obtenha o indice da resposta correta da questao atual
    let cIndice = questao.correta;
    // obtenha o texto da resposta correta da questao atual
    let cTexto = questao.alternativas[cIndice];
    resultado = `Incorreto! Resposta Correta: ${cTexto}`;
  }
  resultDiv.textContent = resultado;
}

}

app.start();

