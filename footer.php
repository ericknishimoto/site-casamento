<footer class="main-footer">
    <div class="pull-right hidden-xs">
      Versão 1.0.0
    </div>
    Todos os direitos reservados &copy; 2018 – Érick Nishimoto
  </footer>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- MChartJs -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Mascaras -->
<script src="dist/js/jquery.mask.min.js"></script>
<script src="dist/js/mascaras.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- Accent neutralise -->
<script src="dist/js/accent-neutralise.js"></script>

<!-- page script -->

<!-- MODAL E DATEPICKER -->
<script>
  $('a[data-target="#modal-delete"]').on('click', function (e) { 
      e.preventDefault();
      var url = $(this).data('url');
      var id = $(this).data('id');

      $('.delete').attr('href', url + id);
      $('#modal-delete').modal('show');
      return false;
  });

  $('a[data-target="#modal-altera"]').on('click', function (e) { 
      e.preventDefault();
      var id = $(this).data('id');
      var nome = $(this).data('nome');

      $('.altera-id').val(id);
      $('.altera-nome').val(nome);
      $('#modal-altera').modal('show');
      return false;
  });

  $('a[data-target="#modal-altera-motorista"]').on('click', function (e) { 
      e.preventDefault();
      var id = $(this).data('id');
      var nome = $(this).data('nome');
      var cpf = $(this).data('cpf');

      $('.altera-id').val(id);
      $('.altera-nome').val(nome);
      $('.altera-cpf').val(cpf);
      $('#modal-altera-motorista').modal('show');
      return false;
  });

  $('a[data-target="#modal-altera-produto"]').on('click', function (e) { 
      e.preventDefault();
      var id = $(this).data('id');
      var nome = $(this).data('nome');
      var empresa = $(this).data('empresa');

      $('.altera-id').val(id);
      $('.altera-nome').val(nome);
      $('.altera-empresa').val(empresa);
      $('#modal-altera-produto').modal('show');
      return false;
  });

  $(function () {
      $('#tabela').DataTable({
        'paging'      : false,
        'lengthMenu'  : false,
        'responsive'  : true
      })
    })

    //Date picker
    $('#datepicker').datepicker({
      format: 'dd/mm/yyyy',                
      language: 'pt-BR',
        autoclose: true,
        todayBtn: "linked",
        todayHighlight : true,
        orientation: "left",
      })
</script>

<!-- TABELA TODOS LANCAMENTOS -->
<script>
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example1 thead tr').clone(true).appendTo( '#example1 thead' );
    $('#example1 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="search" id="input-filtro" class="form-control filtro-width text-center" placeholder="Filtrar" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( jQuery.fn.DataTable.ext.type.search.string(this.value) ) //jQuery.fn.DataTable.ext.type.search.string: remove acentos;
                    .draw();
                    somaValores();
            }
        } );
    } );
 
    var table = $('#example1').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
        lengthChange: false,
        paging: false,
        info: false,
        autoWidth: false
    } );
  } );

  $(document).ready(function() {
    somaValores()
    let ultimoInput = document.querySelector("#thAcoes > input");
    ultimoInput.style.display="none";

    let ultimoTh = document.querySelectorAll("#thAcoes");
    ultimoTh[1].innerHTML = '<a id="limpar-input" onclick="limparInput()" class="btn btn-default">Limpar Filtro</a>';
    
  });
</script>

<!-- BOTAO LIMPAR INPUT TODOS LANCAMENTOS -->
<script>
  function limparInput(){
    $('input').val('');
    $('input').change();
  }
</script>

<!-- IGNORA ACENTOS -->
<script>
  function replaceSpecialChars(str)
    {
        str = str.replace(/[ÀÁÂÃÄÅ]/,"A");
        str = str.replace(/[àáâãäå]/,"a");
        str = str.replace(/[ÈÉÊË]/,"E");
        str = str.replace(/[Ç]/,"C");
        str = str.replace(/[ç]/,"c");

        // o resto

        return str.replace(/[^a-z0-9]/gi,''); 
    }
</script>

<!-- VALORES TODOS LANCAMENTOS -->
<script>
  function somaValores(){
       let valTotal = document.querySelectorAll("#val_total"); //Seleciona todas as ID ##val_total e captura o valor.
      let somaValTotal = 0;
       let valTotalEmpresa = document.querySelectorAll("#val_total_empresa"); //Seleciona todas as ID ##val_total e captura o valor.
      let somaValTotalEmpresa = 0;
       for (var i = 0; i < valTotal.length; i++ ){
        valor = parseFloat(valTotal[i].value);
        somaValTotal =  somaValTotal + valor
         var thValTotal = document.querySelector("#somaValTotal");
        thValTotal.innerHTML = "R$" + parseFloat(somaValTotal).toFixed(2);
      }
       for (var i = 0; i < valTotalEmpresa.length; i++ ){
        valor = parseFloat(valTotalEmpresa[i].value);
        somaValTotalEmpresa =  somaValTotalEmpresa + valor
    
        var thValTotalEmpresa = document.querySelector("#somaValTotalEmpresa");
        thValTotalEmpresa.innerHTML = "R$" + parseFloat(somaValTotalEmpresa).toFixed(2);
      }
     var campoFiltro = document.querySelector("[type=search]");
    campoFiltro.addEventListener("input", function(){ //input: escuta o input de dados;
      let valTotal = document.querySelectorAll("#val_total"); //Seleciona todas as ID ##val_total e captura o valor.
      let somaValTotal = 0;
       let valTotalEmpresa = document.querySelectorAll("#val_total_empresa"); //Seleciona todas as ID ##val_total e captura o valor.
      let somaValTotalEmpresa = 0;
       for (var i = 0; i < valTotal.length; i++ ){
        valor = parseFloat(valTotal[i].value);
        somaValTotal =  somaValTotal + valor
         var thValTotal = document.querySelector("#somaValTotal");
        thValTotal.innerHTML = "R$" + parseFloat(somaValTotal).toFixed(2);
       }
       for (var i = 0; i < valTotalEmpresa.length; i++ ){
        valor = parseFloat(valTotalEmpresa[i].value);
        somaValTotalEmpresa =  somaValTotalEmpresa + valor
    
        var thValTotalEmpresa = document.querySelector("#somaValTotalEmpresa");
        thValTotalEmpresa.innerHTML = "R$" + parseFloat(somaValTotalEmpresa).toFixed(2);
      }
    })
  };
</script>

</body>
</html>
