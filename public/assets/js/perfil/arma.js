$(document).ready(function () {
    /**==============================================
   * MODAL PARA BUSCAR UN EFECTIVO POR CIP
   ===============================================*/
   $("#agregar").on("click", ".agregarArma", function (e) {
      e.preventDefault();
      $('#modalArma').modal({show: true});
  })
  
});