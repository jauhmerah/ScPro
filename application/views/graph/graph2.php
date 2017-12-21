<script type="text/javascript">
var chart = AmCharts.makeChart( "g2div", {
  "type": "serial",
  "theme": "light",
  "dataProvider": [
<?php if(sizeof($arr) != 0){ 
  for ($i=0; $i < sizeof($arr); $i++) { 
    $text = explode("|", $arr[$i]->color);
    $rep = array('<p>','<strong>','</strong>' , '</p>' , ' ', '"');
    $rep2 = array('<p>','<strong>','</strong>' , '</p>' , '"');
    $text2 = str_replace($rep, '', $text[1]);
    $text2 = preg_replace( "/\r|\n/", "", $text2 );
    $text3 = str_replace($rep2, '', $arr[$i]->series );    
    $text1 = preg_replace( "/\r|\n/", "", $text3 );
  ?>
  {
    "color": "<?= $text2."-".$text1."-".$arr[$i]->mg."mg" ; ?>",
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