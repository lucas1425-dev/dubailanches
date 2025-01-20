<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lanchonete Dubai Lanches</title>
    <link rel="stylesheet" href="index.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <style>
        /* Estilos gerais */
body {
    font-family: Arial, sans-serif;
    color: #333;
}

/* Navbar */
.navbar {
    background-color: #343a40; /* Cor de fundo da navbar */
}

.navbar-brand {
    color: #ffffff; /* Cor do texto da marca */
}

.navbar-brand:hover {
    color: #ffc107; /* Cor do texto ao passar o mouse */
}

/* Seção do Cardápio */
.section-cardapio {
    background-color: rgba(0, 0, 0, 0.7); /* Fundo da seção do cardápio */
    padding: 50px 0;
}

.card-item {
    background-color: #ffffff; /* Fundo dos cards */
    border-radius: 10px; /* Bordas arredondadas */
    transition: transform 0.2s; /* Efeito de transição */
}

.card-item:hover {
    transform: scale(1.05); /* Efeito de zoom ao passar o mouse */
}

.card-title {
    font-weight: bold; /* Título em negrito */
}

/* Botões */
.btn-add {
    background-color: #28a745; /* Cor de fundo dos botões de adicionar */
    border: none; /* Sem borda */
}

.btn-add:hover {
    background-color: #218838; /* Cor ao passar o mouse */
}

/* Modal */
.modal-content {
    border-radius: 10px; /* Bordas arredondadas do modal */
}

.modal-header {
    background-color: #007bff; /* Cor de fundo do cabeçalho do modal */
    color: #ffffff; /* Cor do texto do cabeçalho */
}

/* Seção do Carrinho */
.cart-section {
    background-color: rgba(0, 0, 0, 0.8); /* Fundo da seção do carrinho */
    color: white; /* Cor do texto */
    padding: 20px; /* Espaçamento interno */
    margin-top: 30px; /* Margem superior */
    border-radius: 10px; /* Bordas arredondadas */
}

/* Estilo do botão flutuante do carrinho */
#btnCarrinho {
    background-color: #ffc107; /* Cor de fundo do botão */
    color: #000; /* Cor do texto */
     /* Botão redondo */
    /* Altura do botão */
    display: flex; /* Flexbox para centralizar o texto */
    align-items: center; /* Centraliza verticalmente */
    justify-content: center; /* Centraliza horizontalmente */
    font-size: 1.5rem; /* Tamanho da fonte */
}

#btnCarrinho:hover {
    background-color: #e0a800; /* Cor ao passar o mouse */
}

/* Adicionais */
.added-item {
    background-color: #f8f9fa; /* Fundo dos adicionais */
    border-radius: 5px; /* Bordas arredondadas */
    padding: 10px; /* Espaçamento interno */
    margin-bottom: 10px; /* Margem inferior */
}
    </style>
    
    <section id="inicio" class="text-center d-flex align-items-center justify-content-between" style="height: 100vh; background-color: rgba(0, 0, 0, 0.7);">
        <div class="container d-flex flex-column align-items-start">
            <h1 class="display-4 text-warning">Bem-vindo à Dubai Lanches!</h1>
            <p class="lead text-white">Descubra os melhores hambúrgueres e refrigerantes da cidade!</p>
            <a href="#cardapio" class="btn btn-lg btn-success mt-3" style="transition: transform 0.3s; padding: 10px 20px; font-size: 1.25rem;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">Ver Cardápio</a>
        </div>
        
    </section>
    <div class="text-center mb-4">
        <button class="btn btn-primary" id="btnIndustrial" onclick="mostrarLanches('industrial')">Industrial</button>
        <button class="btn btn-primary" id="btnCaseiro" onclick="mostrarLanches('caseiro')">Caseiro</button>
    </div>

    <div id="lanchesIndustrial" class="row">
    <section id="cardapio" class="section-cardapio text-center py-5">
    <div class="container">
        <h2 class="display-5 text-white">Nosso Cardápio</h2>
        <p class="text-white">Explore as opções deliciosas que temos para você!</p>

        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card card-item">
                    <img src="hbg.jpg" class="card-img-top" alt="Hambúrguer Dubai">
                    <div class="card-body">
                        <h5 class="card-title">Hambúrguer Dubai</h5>
                        <p class="card-text">Saboroso hambúrguer com carne suculenta, queijo derretido, alface e molho especial.</p>
                        <p class="fs-4">R$ 19,90</p>
                        <button class="btn btn-add w-100" onclick="abrirModalAdicionais('Hambúrguer Dubai', 19.90)">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card card-item">
                    <img src="hbg.jpg" class="card-img-top" alt="Cheeseburger Classic">
                    <div class="card-body">
                        <h5 class="card-title">Cheeseburger Classic</h5>
                        <p class="card-text">Delicioso cheeseburger com queijo, picles, ketchup e mostarda.</p>
                        <p class="fs-4">R$ 17,90</p>
                        <button class="btn btn-add w-100" onclick="abrirModalAdicionais('Cheeseburger Classic', 17.90)">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card card-item">
                    <img src="hbg.jpg" class="card-img-top" alt="Veggie Burger">
                    <div class="card-body">
                        <h5 class="card-title">Veggie Burger</h5>
                        <p class="card-text">Opção saudável com hambúrguer vegetal, tomate, rúcula e molho especial.</p>
                        <p class="fs-4">R$ 18,90</p>
                        <button class="btn btn-add w-100" onclick="abrirModalAdicionais('Veggie Burger', 18.90)">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div id="lanchesCaseiro" class="row" style="display: none;">

    <section id="cardapio" class="section-cardapio text-center py-5">
    <div class="container">
        <h2 class="display-5 text-white">Nosso Cardápio</h2>
        <p class="text-white">Explore as opções deliciosas que temos para você!</p>
        
    <div class="row">
            <div class="col-12 col-md-4">
                <div class="card card-item">
                    <img src="hbg.jpg" class="card-img-top" alt="Hambúrguer Dubai">
                    <div class="card-body">
                        <h5 class="card-title">Hambúrguer Dubai</h5>
                        <p class="card-text">Saboroso hambúrguer com carne suculenta, queijo derretido, alface e molho especial.</p>
                        <p class="fs-4">R$ 19,90</p>
                        <button class="btn btn-add w-100" onclick="abrirModalAdicionais('Hambúrguer Dubai', 19.90)">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card card-item">
                    <img src="hbg.jpg" class="card-img-top" alt="Cheeseburger Classic">
                    <div class="card-body">
                        <h5 class="card-title">Cheeseburger Classic</h5>
                        <p class="card-text">Delicioso cheeseburger com queijo, picles, ketchup e mostarda.</p>
                        <p class="fs-4">R$ 17,90</p>
                        <button class="btn btn-add w-100" onclick="abrirModalAdicionais('Cheeseburger Classic', 17.90)">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card card-item">
                    <img src="hbg.jpg" class="card-img-top" alt="Veggie Burger">
                    <div class="card-body">
                        <h5 class="card-title">Veggie Burger</h5>
                        <p class="card-text">Opção saudável com hambúrguer vegetal, tomate, rúcula e molho especial.</p>
                        <p class="fs-4">R$ 18,90</p>
                        <button class="btn btn-add w-100" onclick="abrirModalAdicionais('Veggie Burger', 18.90)">Adicionar ao Carrinho</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Modal Adicionais -->
<div id="modalAdicionais" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAdicionaisTitle">Adicionais</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Escolha os adicionais para seu lanche:</p>
                <div>
                    <button class="btn btn-primary" onclick="adicionarAdicional('Bacon', 5.00)">Adicionar Bacon (+R$ 5,00)</button>
                </div>
                <div>
                    <button class="btn btn-primary" onclick="adicionarAdicional('Cheddar', 4.00)">Adicionar Cheddar (+R$ 4,00)</button>
                </div>
                <div>
                    <button class="btn btn-primary" onclick="adicionarAdicional('Ovo', 3.00)">Adicionar Ovo (+R$ 3,00)</button>
                </div>
                <div id="adicionaisEscolhidos"></div>
                <div id="quantidadeAdicionais"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="adicionarAoCarrinho()">Adicionar ao Carrinho</button>
            </div>
        </div>
    </div>
</div>

<!-- Carrinho -->
<section id="carrinho" class="cart-section">
    <div class="container">
        <h4>Seu Carrinho</h4>
        <div id="cartItems" class="cart-items"></div>
        <div class="cart-total">
            Total: R$ <span id="cartTotal">0.00</span>
        </div>
        <div class="cart-footer">
            <button class="btn btn-finalizar" data-bs-toggle="modal" data-bs-target="#modalFinalizarPedido">Finalizar Pedido</button>
        </div>
    </div>
</section>

<!-- Modal Finalizar Pedido -->
<div class="modal fade" id="modalFinalizarPedido" tabindex="-1" aria-labelledby="modalFinalizarPedidoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFinalizarPedidoLabel">Finalizar Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Escolha a forma de pagamento</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pagamento" id="credito" value="Crédito" required>
                    <label class="form-check-label" for="credito">Cartão de Crédito</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pagamento" id="debito" value="Débito">
                    <label class="form-check-label" for="debito">Cartão de Débito</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pagamento" id="pix" value="Pix">
                    <label class="form-check-label" for="pix">Pix / QR Code</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pagamento" id="vr" value="Vr Alimentacao">
                    <label class="form-check-label" for="vr">VR Vale Alimentação</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="pagamento" id="dinheiro" value="Dinheiro">
                    <label class="form-check-label" for="dinheiro">Dinheiro</label>
                </div>

                <h5 class="mt-4">Escolha a forma de entrega</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="forma_entrega" id="entrega" value="delivery" required>
                    <label class="form-check-label" for="entrega">Entrega</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="forma_entrega" id="retirada" value="retirada">
                    <label class="form-check-label" for="retirada">Retirada no Local</label>
                </div>

                <h5 class="mt-4">Endereço de Entrega</h5>
                <form id="formPedido" method="POST" action="processar_pedido.php">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Usuário</label>
                        <input type="text" class="form-control" id="nome" name="nome_cliente" required>
                    </div>
                    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" class="form-control" name="telefone" required>
    </div>
                    <div class="mb-3">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="bairro" name="bairro" required>
                    </div>
                    <div class="mb-3">
                        <label for="rua" class="form-label">Rua</label>
                        <input type="text" class="form-control" id="rua" name="rua" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Número</label>
                        <input type="number" class="form-control" id="numero" name="numero" required>
                    </div>
                    <div class="mb-3">
                        <label for="complemento" class="form-label">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento">
                    </div>
                    <input type="hidden" id="total" name="total">
                    <input type="hidden" id="forma_pagamento" name="forma_pagamento">
                    <input type="hidden" id="forma_entrega" name="forma_entrega">
                    <button type="button" class="btn btn-primary" onclick="finalizarPedido()">Finalizar Pedido</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let carrinho = [];
    let total = 0;
    let lancheSelecionado = '';
    let precoLanche = 0;
    let adicionais = [];


    function mostrarLanches(tipo) {
    const lanchesIndustrial = document.getElementById('lanchesIndustrial');
    const lanchesCaseiro = document.getElementById('lanchesCaseiro');

    if (tipo === 'industrial') {
        lanchesIndustrial.style.display = 'flex';
        lanchesCaseiro.style.display = 'none';
        document.getElementById('btnIndustrial').classList.add('active');
        document.getElementById('btnCaseiro').classList.remove('active');
    } else {
        lanchesIndustrial.style.display = 'none';
        lanchesCaseiro.style.display = 'flex';
        document.getElementById('btnCaseiro').classList.add('active');
        document.getElementById('btnIndustrial').classList.remove('active');
    }
}



// Inicializa a exibição para mostrar os lanches industriais por padrão
document.addEventListener('DOMContentLoaded', function() {
    mostrarLanches('industrial'); // Mostra os lanches industriais por padrão
});
    function abrirModalAdicionais(lanche, preco) {
        lancheSelecionado = lanche;
        precoLanche = preco;
        adicionais = [];
        atualizarAdicionais();
        const modal = new bootstrap.Modal(document.getElementById('modalAdicionais'));
        modal.show();
    }

    function adicionarAdicional(adicional, precoAdicional) {
        let adicionalExistente = adicionais.find(item => item.nome === adicional);
        if (adicionalExistente) {
            adicionalExistente.quantidade++;
        } else {
            adicionais.push({ nome: adicional, preco: precoAdicional, quantidade: 1 });
        }
        atualizarAdicionais();
    }

    function atualizarAdicionais() {
        const adicionaisDiv = document.getElementById('adicionaisEscolhidos');
        adicionaisDiv.innerHTML = '';
        adicionais.forEach(item => {
            adicionaisDiv.innerHTML += `
                <div class="added-item">
                    <span>${item.nome} - R$ ${item.preco.toFixed(2)} x${item.quantidade}</span>
                    <button onclick="removerAdicional('${item.nome}')">Remover</button>
                </div>
            `;
        });

        const quantidadeAdicionais = document.getElementById('quantidadeAdicionais');
        quantidadeAdicionais.innerHTML = `Total de adicionais: ${adicionais.length}`;
    }

    function removerAdicional(nomeAdicional) {
        let adicional = adicionais.find(item => item.nome === nomeAdicional);
        if (adicional) {
            if (adicional.quantidade > 1) {
                adicional.quantidade--;
            } else {
                adicionais = adicionais.filter(item => item.nome !== nomeAdicional);
            }
        }
        atualizarAdicionais();
    }

    function adicionarAoCarrinho() {
        let precoTotal = precoLanche;
        adicionais.forEach(item => precoTotal += item.preco * item.quantidade);
        carrinho.push({ lanche: lancheSelecionado, adicionais: adicionais, preco: precoTotal });
        atualizarCarrinho();
        const modal = bootstrap.Modal.getInstance(document.getElementById('modalAdicionais'));
        modal.hide();
    }

    function atualizarCarrinho() {
        const cartItems = document.getElementById('cartItems');
        cartItems.innerHTML = '';
        total = 0;

        carrinho.forEach(item => {
            total += item.preco;
            let adicionaisText = item.adicionais.map(a => `${a.nome} x${a.quantidade} (+R$ ${(a.preco * a.quantidade).toFixed(2)})`).join(', ');
            cartItems.innerHTML += `
                <div class="cart-item">
                    <span>${item.lanche} ${adicionaisText} - R$ ${item.preco.toFixed(2)}</span>
                </div>
            `;
        });

        document.getElementById('cartTotal').innerText = total.toFixed(2);
    }

    function finalizarPedido() {
        const total = document .getElementById('cartTotal').innerText;
        const formaPagamento = document.querySelector('input[name="pagamento"]:checked');
        const formaEntrega = document.querySelector('input[name="forma_entrega"]:checked');

        if (!formaPagamento) {
            alert('Por favor, selecione uma forma de pagamento.');
            return;
        }

        if (!formaEntrega) {
            alert('Por favor, selecione uma forma de entrega.');
            return;
        }

        document.getElementById('total').value = total;
        document.getElementById('forma_pagamento').value = formaPagamento.value;
        document.getElementById('forma_entrega').value = formaEntrega.value;

        const lanchesInput = document.createElement('input');
        lanchesInput.type = 'hidden';
        lanchesInput.name = 'lanches';
        lanchesInput.value = JSON.stringify(carrinho.map(item => item.lanche));
        document.getElementById('formPedido').appendChild(lanchesInput);

        const adicionaisInput = document.createElement('input');
        adicionaisInput.type = 'hidden';
        adicionaisInput.name = 'adicionais';
        adicionaisInput.value = JSON.stringify(carrinho.flatMap(item => item.adicionais));
        document.getElementById('formPedido').appendChild(adicionaisInput);

        document.getElementById('formPedido').submit();
    }
</script>
<a href="#carrinho" class="btn btn-warning" id="btnCarrinho" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
        Carrinho
    </a>
</body>