const menuCarrinho = document.querySelector('.menu-carrinho')

// lista dos item do carrin
const itensCarrinho = []

// funcao para salvar os itens
function AdicionaCarrinho(element) {
    alert("Novo item adicionado ao carrinho!")
    const valor = document.querySelector(".contagem");
    let novoValor = parseInt(valor.textContent) + 1;
    valor.innerHTML = novoValor;

    itensCarrinho.appendChild(element);
}

function listaItens() {
    for (var i = 0; i < itensCarrinho.length; i++) {
        menuCarrinho.appendChild(itensCarrinho)
    }
}