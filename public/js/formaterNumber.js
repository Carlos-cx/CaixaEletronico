function formatarBRL(valor) {
    const num = valor.replace(/\D/g, '');
    return (num / 100).toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const preco = document.getElementById('valor');
    const form = document.getElementById('form');

    if (preco) {
        
        preco.addEventListener('input', function (e) {
            const raw = e.target.value.replace(/\D/g, '');
            const valor = (parseInt(raw || '0') / 100).toFixed(2);
            preco.value = formatarBRL(valor);
        });

        if (form){
            form.addEventListener('submit', function () {
                const raw = preco.value.replace(/\D/g, '');
                const numero = (parseInt(raw || '0') / 100).toFixed(2);
                preco.value = numero; // envia como 1234.56
            });
        }
            
    }

    const brlElements = document.querySelectorAll('[data-format="brl"]');
    if (brlElements) {
        brlElements.forEach(function (el) {
            const raw = el.textContent || el.innerText;
            el.textContent = formatarBRL(raw);
        });    
    }
    

});