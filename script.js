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
        p.innerHTML = "Usuário não encontrado!";
    }

    divpopup.appendChild(divpopupcontent);
    divpopupcontent.appendChild(span);
    divpopupcontent.appendChild(h2);
    divpopupcontent.appendChild(p);
    
    let body = document.querySelector(".container");
    body.appendChild(divpopup);

    document.getElementById('closePopup').addEventListener('click', function() {
        if (status == 0) {
            window.location.href = "index.php";
        }
        divpopup.parentNode.removeChild(divpopup);
    });
}