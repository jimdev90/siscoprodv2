$(document).ready(function () {
    /**==============================================
   * MODAL PARA BUSCAR UN EFECTIVO POR CIP
   ===============================================*/
   $("#agregar").on("click", ".agregarDomicilio", function (e) {
      e.preventDefault();
      $('#modalDomicilio').modal({show: true});
  })
  
});