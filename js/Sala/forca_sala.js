let tentativas = 6;
let listaDinamica = [];
let palavraSecretaCategoria;
let palavraSecretaSorteada;
const palavras = [

    palavra001 = {
        nome: "ALMOFADAS",
        categoria:"OBJETOS - SALA"
    },
    palavra002 = {
        nome: "ESTANTE",
        categoria:"OBJETOS - SALA"
    },
    palavra003 = {
        nome: "LAREIRA",
        categoria:"OBJETOS - SALA"
    },
    palavra004 = {
        nome: "POLTRONA",
        categoria:"OBJETOS - SALA"
    },
    palavra005 = {
        nome: "PUFFS",
        categoria:"OBJETOS - SALA"
    },
    palavra006 = {
        nome: "SOFA",
        categoria:"OBJETOS - SALA"
    },
    palavra007 = {
        nome: "TV",
        categoria:"OBJETOS - SALA"
    },
    palavra008 = {
        nome: "CADEIRA",
        categoria:"OBJETOS - SALA"
    },
    palavra009 = {
        nome: "RELOGIO",
        categoria:"OBJETOS - SALA"
    },
    palavra010 = {
        nome: "APARELHO-DE-SOM",
        categoria:"OBJETOS - SALA"
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
            document.getElementById("imagem").style.background  = "url('../../img/Forca/forca01.png";
            break;
        case 4:
            document.getElementById("imagem").style.background  = "url('../../img/Forca/forca02.png";
            break;
        case 3:
            document.getElementById("imagem").style.background  = "url('../../img/Forca/forca03.png";
            break;
        case 2:
            document.getElementById("imagem").style.background  = "url('../../img/Forca/forca04.png";
            break;
        case 1:
            document.getElementById("imagem").style.background  = "url('../../img/Forca/forca05.png";
            break;
        case 0:
            document.getElementById("imagem").style.background  = "url('../../img/Forca/forca06.png";
            break;
        default:
            document.getElementById("imagem").style.background  = "url('../../img/Forca/forca07.png";
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




