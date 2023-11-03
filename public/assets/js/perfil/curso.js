$(document).ready(function () {
    /**==============================================
   * MODAL PARA BUSCAR UN EFECTIVO POR CIP
   ===============================================*/
   $("#agregar").on("click", ".agregarCurso", function (e) {
      e.preventDefault();
      $('#modalCurso').modal({show: true});
  })
});