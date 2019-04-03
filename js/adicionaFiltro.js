//CAPTURA TODOS OS ELEMENTOS COM ID == CATEGORIA, DENTRO DE UM ARRAY;
var buttons = document.querySelectorAll('#categoria');

//ADICIONA UM LISTENER PARA CADA ELEMENTO CAPTURADO NO ARRAY
for (var i = 0; i < buttons.length; i++) {
    var self = buttons[i];

    //ADICIONA EVENTO DE CLICK CHAMANDO A FUNCAO filtraPresentes
    self.addEventListener('click', function () {  
        filtraPresentes(this.textContent.trim());
    });
};