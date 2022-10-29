let tentativas = 6;
let listaDinamica = [];
let palavraSecretaCategoria;
let palavraSecretaSorteada;
const palavras = [

    palavra001 = {
        nome: "ARVORE",
        categoria:"OBJETOS - QUINTAL"
    },
    palavra002 = {
        nome: "BALANÇO",
        categoria:"OBJETOS - QUINTAL"
    },
    palavra003 = {
        nome: "CASINHA",
        categoria:"OBJETOS - QUINTAL"
    },
    palavra004 = {
        nome: "CERCA",
        categoria:"OBJETOS - QUINTAL"
    },
    palavra005 = {
        nome: "ESCORREGADOR",
        categoria:"OBJETOS - QUINTAL"
    },
    palavra006 = {
        nome: "GRAMA",
        categoria:"OBJETOS - QUINTAL"
    },
    palavra007 = {
        nome: "PASSARINHO",
        categoria:"OBJETOS - QUINTAL"
    },
    palavra008 = {
        nome: "PULA-PULA",
        categoria:"OBJETOS - QUINTAL"
    },
    palavra009 = {
        nome: "MANGUEIRA",
        categoria:"OBJETOS - QUINTAL"
    },
    palavra0010 = {
        nome: "BORBOLETAS",
        categoria:"OBJETOS - QUINTAL"
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
            document.getElementById("imagem").style.background  = "url('../../img/Jogo_de_Palavras/imagem0.jpg";
            break;
        case 4:
            document.getElementById("imagem").style.background  = "url('../../img/Jogo_de_Palavras/imagem1.jpg";
            break;
        case 3:
            document.getElementById("imagem").style.background  = "url('../../img/Jogo_de_Palavras/imagem2.jpg";
            break;
        case 2:
            document.getElementById("imagem").style.background  = "url('../../img/Jogo_de_Palavras/imagem3.jpg";
            break;
        case 1:
            document.getElementById("imagem").style.background  = "url('../../img/Jogo_de_Palavras/imagem4.jpg";
            break;
        case 0:
            document.getElementById("imagem").style.background  = "url('../../img/Jogo_de_Palavras/imagem5.jpg";
            break;
        default:
            document.getElementById("imagem").style.background  = "url('../../img/Jogo_de_Palavras/imagem6.jpg";
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




