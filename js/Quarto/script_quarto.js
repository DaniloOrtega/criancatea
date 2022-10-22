
let questoes = [

  {
    titulo: 'Quantas bolas tem no quarto ?',
    alternativas : ['2 Bolas', '1 Bola', 'Não tem bolas no quarto', ''],
    correta: 1
  },

  {
    titulo: 'Qual é a cor do livro ?',
    alternativas : ['Preto', 'Verde', 'Azul'],
    correta: 2
  },

  {
    titulo: 'Qual é a cor do skate ?',
    alternativas : ['Vermelho', 'Azul', 'Preto'],
    correta: 0
  },

  {
    titulo: 'Que horas o relogio esta marcando ?',
    alternativas : ['10 Horas', '8 horas', '3 horas'],
    correta: 2
  },

  {
    titulo: 'Qual é o animal que está no quarto ?',
    alternativas : ['Gato', 'Cachorro', 'Coelho'],
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

