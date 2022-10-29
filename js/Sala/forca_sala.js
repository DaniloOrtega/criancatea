let tentativas = 6;
let listaDinamica = [];
let palavraSecretaCategoria;
let palavraSecretaSorteada;
const palavras = [

    palavra001 = {
        nome: "ALMOFADAS",
        categoria:"Número De Chances:"
    },
    palavra002 = {
        nome: "ESTANTE",
        categoria:"Número De Chances:"
    },
    palavra003 = {
        nome: "LAREIRA",
        categoria:"Número De Chances;"
    },
    palavra004 = {
        nome: "POLTRONA",
        categoria:"Número De Chances:"
    },
    palavra005 = {
        nome: "PUFFS",
        categoria:"Número De Chances:"
    },
    palavra006 = {
        nome: "SOFA",
        categoria:"Número De Chances:"
    },
    palavra007 = {
        nome: "TV",
        categoria:"Número De Chances:"
    },
    palavra008 = {
        nome: "CADEIRA",
        categoria:"Número De Chances:"
    },
    palavra009 = {
        nome: "RELOGIO",
        categoria:"Número De Chances:"
    },
    palavra010 = {
        nome: "APARELHO-DE-SOM",
        categoria:"Número De Chances:"
    },

   
   
];


criarPalavraSecreta();
function criarPalavraSecreta(){
    const indexPalavra = parseInt(Math.random() * palavras.length)
    
    palavraSecretaSorteada = palavras[indexPalavra].nome;
    palavraSecretaCategoria = palavras[indexPalavra].categoria;
}

montarPalavraNaTela();
function montarPalavraNaTela(){
    const categoria = document.getElementById("categoria");
    categoria.innerHTML = palavraSecretaCategoria;

    const palavraTela = document.getElementById("palavra-secreta");
    palavraTela.innerHTML = "";
   
    for(i = 0; i < palavraSecretaSorteada.length; i++){
        if(listaDinamica[i] == undefined){
            listaDinamica[i] = "&nbsp;"
            palavraTela.innerHTML = palavraTela.innerHTML + "<div class='letras'>" + listaDinamica[i] + "</div>"
        }
        else{
            palavraTela.innerHTML = palavraTela.innerHTML + "<div class='letras'>" + listaDinamica[i] + "</div>"
        }
    }
}

function verificaLetraEscolhida(letra){
    document.getElementById("tecla-" + letra).disabled = true;
    if(tentativas > 0)
    {
        mudarStyleLetra("tecla-" + letra);
        comparalistas(letra);
        montarPalavraNaTela();
    }    
}

function mudarStyleLetra(tecla){
    document.getElementById(tecla).style.background = "#C71585";
    document.getElementById(tecla).style.color = "#ffffff";
}

function comparalistas(letra){
    const pos = palavraSecretaSorteada.indexOf(letra)
    if(pos < 0){
        tentativas--
        carregaImagemForca();

        if(tentativas == 0){
            abreModal("OPS!", "Não foi dessa vez ... A palavra secreta era <br>" + palavraSecretaSorteada);
        }
    }
    else{
        for(i = 0; i < palavraSecretaSorteada.length; i++){
            if(palavraSecretaSorteada[i] == letra){
                listaDinamica[i] = letra;
            }
        }
    }
    
    let vitoria = true;
    for(i = 0; i < palavraSecretaSorteada.length; i++){
        if(palavraSecretaSorteada[i] != listaDinamica[i]){
            vitoria = false;
        }
    }

    if(vitoria == true)
    {
        abreModal("PARABÉNS!", "Você venceu...");
        tentativas = 0;
    }
}

function carregaImagemForca(){
    switch(tentativas){
        case 5:
            document.getElementById("imagem").style.background  = "url('../../img/Jogo_de_Palavras/Numero Cinco.png";
            break;
        case 4:
            document.getElementById("imagem").style.background  = "url('../../img/Jogo_de_Palavras/Numero Quatro.png";
            break;
        case 3:
            document.getElementById("imagem").style.background  = "url('../../img/Jogo_de_Palavras/Numero Tres.png";
            break;
        case 2:
            document.getElementById("imagem").style.background  = "url('../../img/Jogo_de_Palavras/Numero Dois.png";
            break;
        case 1:
            document.getElementById("imagem").style.background  = "url('../../img/Jogo_de_Palavras/Numero Um.png";
            break;
        case 0:
            document.getElementById("imagem").style.background  = "url('../../img/Jogo_de_Palavras/Numero Zero.png";
            break;
        default:
            document.getElementById("imagem").style.background  = "url('../../img/Jogo_de_Palavras/Numero Seis.png";
            break;
    }
}

function abreModal(titulo, mensagem){
    let modalTitulo = document.getElementById("exampleModalLabel");
    modalTitulo.innerText = titulo;

    let modalBody = document.getElementById("modalBody");
    modalBody.innerHTML = mensagem;

    $("#myModal").modal({
        show: true
    });
}

let bntReiniciar = document.querySelector("#btnReiniciar")
bntReiniciar.addEventListener("click", function(){
    location.reload();
});




