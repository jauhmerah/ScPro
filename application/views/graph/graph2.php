<script type="text/javascript">
var chart = AmCharts.makeChart( "g2div", {
  "type": "serial",
  "theme": "light",
  "dataProvider": [
<?php if(sizeof($arr) != 0){ 
  for ($i=0; $i < sizeof($arr); $i++) { 
  ?>
  {
    "color": "<?= $arr[$i]->nico." Mg" ; ?>",
    "total": <?= $arr[$i]->total; ?>
  } 
  <?php 
  if ($i + 1 != sizeof($arr)) {
    echo ",";
  }
  } }else{ ?>
  {
    "color": "No Data",
    "total": 0
  }
<?php  } ?>]
  ,
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "total"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "color",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  },
  "export": {
    "enabled": true
  }

} );

</script>