<!-- Company Income -->
<script type="text/javascript">
var chart = AmCharts.makeChart("<?= $box; ?>", {
    "theme": "light",
    "type": "serial",
    "dataProvider": [<?php 
  $size = sizeof($data);
  for ($i=0; $i < $size ; $i++) {
      ?>
  {
    "year": "<?= $data[$i]['date'] ?>",
    "net": <?= $data[$i]['net'] ?>,
    "sales": <?= $data[$i]['acc'] ?>
  }<?php
    if ($i+1 != $size) {
       echo ",";
     } 
  }
?>],
    "valueAxes": [{
        "unit": "MYR",
        "position": "left",
        "title": "Total Income",
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "Net Sales [[category]] : <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "Net Sales",
        "type": "column",
        "valueField": "net"
    }, {
        "balloonText": "Approved Income [[category]] : <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "Approved Income",
        "type": "column",
        "clustered":false,
        "columnWidth":0.5,
        "valueField": "sales"
    }],
    "plotAreaFillAlphas": 0.1,
    "categoryField": "year",
    "categoryAxis": {
        "gridPosition": "start"
    },
    "export": {
      "enabled": true
     }

});
</script>