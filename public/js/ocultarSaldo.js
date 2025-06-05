const btnVisibility = document.getElementById('btn-saldo-visivel');
const VisivelOn = document.getElementById('imgVisivelOn');
const VisivelOff = document.getElementById('imgVisivelOff');
const campoSaldo = document.getElementById('saldo');
const saldo = campoSaldo.textContent;

btnVisibility.addEventListener("click", function(){
    if (window.getComputedStyle(imgVisivelOn, null).display === 'block') {
        VisivelOn.style.display = "none";
        VisivelOff.style.display = "block";
        campoSaldo.textContent = "*********";
    }else{
        VisivelOn.style.display = "block";
        VisivelOff.style.display = "none";
        campoSaldo.textContent = formatarBRL(saldo);
    }
});