<?php use_stylesheet('/min/?f=css/global/widescreen.css', '', array('raw_name' => true))?>
<?php use_stylesheet('/min/?f=EasyUI/themes/default/easyui.css', '', array('raw_name' => true))?>
<?php use_javascript('/EasyUI/jquery.easyui.min.js')?>

<div id="layout" class="easyui-layout" data-options="fit:true" style="width:720px; height: 450px; ">
  <div title="Filtro" data-options="region:'south', collapsible:true, collapsed:true" style="height:150px">
    Norte
  </div>

  <div title="Menú" data-options="region:'west', collapsible:true, collapsed:true" style="width: 200px">
    Izquierda
  </div>

  <div title="Reporte" data-options="region:'center'">
    Centro
    <button id="btnFiltro">Filtros</button>
    <button id="btnMenu">Menu</button>
  </div>


</div>


<script>
  $(function() {

    var layout  = $('#layout').layout(),
        west    = layout.layout('panel','west');

    alert(layout);

    $('#btnFiltro').on('click', function() {
      var collapsed = west.panel('options').collapsed;
      if ( collapsed ) {
        $('#layout').layout('expand', 'north');
      }
      else {
        $('#layout').layout('collapse', 'north');
      }
      console.log(collapsed);  // get the west panel
    });
  });
</script>
