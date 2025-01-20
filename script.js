let carrinho = [];
let totalCarrinho = 0;

function abrirModalAdicionais(nome, preco) {
    document.getElementById('modalAdicionaisTitle').innerText = `Adicionar ${nome}`;
    document.getElementById('modalAdicionais').dataset.nome = nome;
    document.getElementById('modalAdicionais').dataset.preco = preco;
    
    // Limpa os checkboxes do modal
    document.getElementById('adicional1').checked = false;
    document.getElementById('adicional2').checked = false;
    document.getElementById('adicional3').checked = false;

    const modal = new bootstrap.Modal(document.getElementById('modalAdicionais'));
    modal.show();
}

function adicionarAoCarrinho() {
    const nome = document.getElementById('modalAdicionais').dataset.nome;
    const preco = parseFloat(document.getElementById('modalAdicionais').dataset.preco);
    const adicionais = [];
    
    if (document.getElementById('adicional1').checked) adicionais.push(document.getElementById('adicional1').value);
    if (document.getElementById('adicional2').checked) adicionais.push(document.getElementById('adicional2').value);
    if (document.getElementById('adicional3').checked) adicionais.push(document.getElementById('adicional3').value);
    
    const item = {
        nome: nome,
        preco: preco,
        adicionais: adicionais
    };
    
    carrinho.push(item);
    totalCarrinho += preco;
    atualizarCarrinho();
    
    const modal = bootstrap.Modal.getInstance(document.getElementById('modalAdicionais'));
    modal.hide();
}

function atualizarCarrinho() {
    const listaCarrinho = document.getElementById('listaCarrinho');
    listaCarrinho.innerHTML = '';
    carrinho.forEach(item => {
        listaCarrinho.innerHTML += `<p>${item.nome} - R$ ${item.preco.toFixed(2)} ${item.adicionais.length > 0 ? '(Adicionais: ' + item.adicionais.join(', ') + ')' : ''}</p>`;
    });
    document.getElementById('cartTotal').innerText = `Total: R$ ${totalCarrinho.toFixed(2)}`;
}

function finalizarPedido() {
    const formaPagamento = prompt("Digite a forma de pagamento (ex: Cartão, Dinheiro):");
    const formaEntrega = prompt("Digite a forma de entrega (ex: Entrega, Retirada):");
    
    const dadosPedido = {
        nome_cliente: prompt("Digite seu nome:"),
        rua: prompt("Digite sua rua:"),
        bairro: prompt("Digite seu bairro:"),
        numero: prompt("Digite seu número:"),
        forma_pagamento: formaPagamento,
        forma_entrega: formaEntrega,
        lanches: JSON.stringify(carrinho),
        adicionais: JSON.stringify(carrinho.flatMap(item => item.adicionais))
    };

    fetch('processar_pedido.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dadosPedido)
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Exibe a resposta do servidor
        // Limpa o carrinho após finalizar o pedido
        carrinho = [];
        totalCarrinho = 0;
        atualizarCarrinho();
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Ocorreu um erro ao finalizar o pedido.');
    });
}