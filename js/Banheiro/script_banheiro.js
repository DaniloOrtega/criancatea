
let questoes = [

  {
    titulo: 'Qual é a cor da tolhada ?',
    alternativas : ['Rosa', 'Branca', 'Marrom', ''],
    correta: 2
  },

  {
    titulo: 'Quantos tapetes tem no banheiro ?',
    alternativas : ['1 Tapete', '2 Tapetes', 'Não tem tapetes'],
    correta: 1
  },

  {
    titulo: 'Qual é a cor da Pia e do Vaso Sanitario?',
    alternativas : ['Preto', 'Marrom', 'Branco'],
    correta: 2
  },

  {
    titulo: 'Qual é a cor da Lixeira ?',
    alternativas : ['Não tem lixeira', 'Amarela', 'Branca'],
    correta: 0
  },

  {
    titulo: 'Qual é a cor da Azulejo ?',
    alternativas : ['Branco', 'Verde', 'Azul'],
    correta: 0
  },

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

