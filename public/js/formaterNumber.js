function formatarBRL(valor) {
    const num = valor.replace(/\D/g, '');
    return numeroFormatado = (num / 100).toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const valorInput = document.getElementById('valor');
    const form = document.getElementById('form');

    if (valorInput) {
        valorInput.addEventListener('input', function (event) {
            const valorBruto = event.target.value.replace(/\D/g, '');
            const valor = (parseInt(valorBruto || '0') / 100).toFixed(2);
            valorInput.value = formatarBRL(valor);
        });

        if (form){
            form.addEventListener('submit', function () {
                const valorBruto = valorInput.value.replace(/\D/g, '');
                const numero = (parseInt(valorBruto || '0') / 100).toFixed(2);
                valorInput.value = numero;
            });
        }
            
    }

    const brlElements = document.querySelectorAll('[data-format="brl"]');
    if (brlElements) {
        brlElements.forEach(function (elemento) {
            const valorBruto = elemento.textContent || elemento.innerText;
            elemento.textContent = formatarBRL(valorBruto);
        });    
    }
    
});