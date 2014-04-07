<style>
  .detail {
    border: 1px solid black;
    margin: 0 0 5px 0;
    padding: 3px;
  }

  .head {
    border-bottom: 1px solid black;
    font-size: large;
    text-align: center;
    width: 100%;
  }

  .realizada {
    background: lightblue;
  }

  .trans {
    background: lightred;
  }

  .cellData {
    float: left;
    margin: 1px 4px;
  }

  .tableData .cols01 {width: 051px}
  .tableData .cols02 {width: 110px}
  .tableData .cols03 {width: 169px}
  .tableData .cols04 {width: 228px}
  .tableData .cols05 {width: 287px}
  .tableData .cols06 {width: 346px}
  .tableData .cols07 {width: 405px}
  .tableData .cols08 {width: 464px}
  .tableData .cols09 {width: 523px}
  .tableData .cols10 {width: 582px}
  .tableData .cols11 {width: 641px}
  .tableData .cols12 {width: 700px}

  .label {
    font-weight: bold;
    /* border-bottom: 1px dashed darkgray; /**/
  }

  .cellData .value {
    background: #DDD;
    border-radius: 3px;

  .menubar a {
    background: white;
    border: 1px solid black;
    color: blue;
    margin: 0 0 3px 0;
    padding: 2px 4px;
    text-decoration: none;
  }

  .menubar a:hover {
    background: lightgray;
  }
</style>
<div class="menubar clearfix">
  <a href="<?php echo url_for('agenda/show?slug='.$cirugia->getQuirofano()->getSlug()) ?>">Agenda de <?php echo $cirugia->getQuirofano() ?></a>
</div>

<?php
switch ($cirugia->getStatus())
{
// Datos a mostrar cuando la cirugia esta finalizada
  case 100:
    include_partial("detailsFinalizada", array('cirugia' => $cirugia));

// Datos a mostrar cuando la cirugia este en transoperatorio
  case 10:
    include_partial("detailsTransoperatorio", array('cirugia' => $cirugia));

// Datos a mostrar cuando la cirugia esta programada o diferida
  case -50:
  case 1:
    include_partial("detailsProgramacion", array('cirugia' => $cirugia));
}

