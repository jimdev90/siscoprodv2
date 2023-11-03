$(document).ready(function () {
    /**==============================================
   * MODAL PARA BUSCAR UN EFECTIVO POR CIP
   ===============================================*/
   $("#agregar").on("click", ".agregarProfesion", function (e) {
      e.preventDefault();
      $('#modalProfesion').modal({show: true});
  })
  
});