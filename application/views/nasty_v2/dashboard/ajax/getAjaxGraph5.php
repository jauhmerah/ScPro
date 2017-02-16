<!-- Company Income -->
<script type="text/javascript">
var chart = AmCharts.makeChart( "paiddiv", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "autoMargins": false,
  "marginLeft": 30,
  "marginRight": 8,
  "marginTop": 10,
  "marginBottom": 26,
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 8,
    "color": "#ffffff"
  },
  "dataProvider": [
<?php 
  $size = sizeof($data);
  for ($i=0; $i < $size ; $i++) {       
    if ($i != ($size-1)) {
      ?>
  {
    "year": "<?= $data[$i]['date'] ?>",
    "sales": <?= $data[$i]['acc'] ?>,
    "net": <?= $data[$i]['net'] ?>
  },
      <?php
    } else { ?>
  {
    "year": "<?= $data[$i]['date'] ?>",
    "sales": <?= $data[$i]['acc'] ?>,
    "net": <?= $data[$i]['net'] ?>,
    "dashLengthColumn": 5,
    "alpha": 0.2,
    "additional": "(projection)"
  }      
    <?php }
    
  }
?>],
  "valueAxes": [ {
    "axisAlpha": 0,
    "position": "left"
  } ],
  "startDuration": 1,
  "graphs": [ {
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Sales",
    "type": "column",
    "valueField": "sales",
    "dashLengthField": "dashLengthColumn"
  }, {
    "id": "graph2",
    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
    "bullet": "round",
    "lineThickness": 3,
    "bulletSize": 7,
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "useLineColorForBulletBorder": true,
    "bulletBorderThickness": 3,
    "fillAlphas": 0,
    "lineAlpha": 1,
    "title": "Net Sales",
    "valueField": "net",
    "dashLengthField": "dashLengthLine"
  }],
  "categoryField": "year",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "tickLength": 0
  },
  "export": {
    "enabled": true
  }
} );

</script>