
let questoes = [

  {
    titulo: 'Quantos quadros tem na parede ?',
    alternativas : ['Nenhum Quadro', '2 Quadros', '4 Quadros'],
    correta: 2
  },

  {
    titulo: 'Qual é a cor da cortina ?',
    alternativas : ['Verde', 'Azul', 'Não cortina'],
    correta: 1
  },

  {
    titulo: 'O sofá tem quantos lugares ?',
    alternativas : ['2 Lugares', '3 Lugares', '1 Lugar'],
    correta: 0
  },

  {
    titulo: 'Quantos livros tem na mesa de centro ?',
    alternativas : ['Nenhum Livro', '3 Livros', '2 Livros'],
    correta: 2
  },

  {
    titulo: 'Quantos vasos tem na sala ?',
    alternativas : ['2 Vasos', 'Nenhum Vaso', '1 Vaso'],
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

