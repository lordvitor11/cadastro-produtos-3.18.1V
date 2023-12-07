function popup(status) {
    let divpopup = document.createElement('div');
    divpopup.classList.add('popup');

    let divpopupcontent = document.createElement('div');
    divpopupcontent.classList.add('popup-content');

    let span = document.createElement('span');
    span.classList.add('close');
    span.setAttribute('id', 'closePopup');
    span.innerHTML = "&times;";
    
    let h2 = document.createElement('h2');
    let p = document.createElement('p');

    if (status == 0) {
        h2.innerHTML = "Sucesso";
        p.innerHTML = "Logado(a) com sucesso!";
    } else if (status == 1) {
        h2.innerHTML = "Erro";
        p.innerHTML = "Credenciais inválidas!";
    } else if (status == 2) {
        h2.innerHTML = "Erro";
        p.innerHTML = "Usuário não encontrado!";
    } else if (status == 3) {
        h2.innerHTML = "Sucesso";
        p.innerHTML = "Cadastrado(a) com sucesso!";
    } else if (status == 4) {
        h2.innerHTML = "Erro";
        p.innerHTML = "CPF já cadastrado!";
    } else if (status == 5) {
        h2.innerHTML = "Erro";
        p.innerHTML = "E-mail já cadastrado!";
    } else if (status == 6) {
        h2.innerHTML = "Sucesso";
        p.innerHTML = "O produto foi adicionado ao carrinho!";
    } else if (status == 7) {
        h2.innerHTML = "Erro";
        p.innerHTML = "Você precisa estar logado(a) para adicionar produtos ao carrinho!";
    }

    divpopup.appendChild(divpopupcontent);
    divpopupcontent.appendChild(span);
    divpopupcontent.appendChild(h2);
    divpopupcontent.appendChild(p);
    
    document.addEventListener("DOMContentLoaded", function() {
        let body = document.body;
        body.appendChild(divpopup);

        document.getElementById('closePopup').addEventListener('click', function() {
            if (status == 0) {
                window.location.href = "index.php";
            } else if (status == 3) {
                window.location.href = "index.php";
            }
            
            divpopup.parentNode.removeChild(divpopup);
        });
    });
}

function quantity(input) {

    let xhr = new XMLHttpRequest();

    xhr.open('POST', 'carrinho.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            setTimeout(() => {
                location.reload();
            }, 2000);
        }
    };

    let elementValue = document.getElementById(input.classList.item(0));
    let counter = document.querySelector(".counter .number");
    let valor = parseInt(counter.innerHTML);

    let dados = "";

    if (input.id == "add") {
        elementValue.innerHTML = valor + 1;
        dados = `tipo=add&id=${input.id}`;
    } else {
        elementValue.innerHTML = valor > 0 ? valor - 1 : 0;
        dados = `tipo=remove&id=${input.id}`;
    }

    xhr.send(dados);
}
