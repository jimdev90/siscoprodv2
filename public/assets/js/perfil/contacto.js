$(document).ready(function () {
    /**==============================================
   * MODAL PARA BUSCAR UN EFECTIVO POR CIP
   ===============================================*/
   $("#agregar").on("click", ".agregarFamilia", function (e) {
      e.preventDefault();
      $('#modalFamilia').modal({show: true});
  })
});