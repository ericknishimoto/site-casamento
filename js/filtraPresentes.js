function filtraPresentes(categoria){

    //CAPTURA TODOS OS ELEMENTOS COM ID == presente
    var presentes = document.querySelectorAll("#presente");
    //CAPTURA O ELEMENTOS COM CLASS == mostratTodos
    var botaoTodos = document.querySelector(".mostrarTodos");
    //CAPTURA SOMENTE O TEXTO DO ITEM botaoTodos
    var todos = botaoTodos.textContent.trim();

    //PARA CADA ELEMENTO CAPTURADO FAÇA...
    for (var i = 0; i < presentes.length; i++ ){

        var presente = presentes[i];
        var rotuloCategoria = presente.querySelector(".badge-presente");
        var categoriaTexto = rotuloCategoria.textContent.trim();

        if ( categoriaTexto != categoria  && categoria != todos){
            presente.classList.add("invisivel");
        }else if( categoria == "Todos"){
            presente.classList.remove("invisivel");
        }else{
            presente.classList.remove("invisivel");
        }
    }
}
