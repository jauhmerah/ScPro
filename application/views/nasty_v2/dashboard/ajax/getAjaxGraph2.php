<script type="text/javascript">
	var chart = AmCharts.makeChart("flavdiv", {
  "type": "serial",
  "theme": "light",
  "marginRight": 70,
  "dataProvider": [
  <?php 
        $n = 0;
        if (sizeof($arr) != 0) {            
            foreach ($arr as $data) {
                if ($n != 0) {
                echo "},";
                }else{ $n++;}
                echo "{";
                ?>
                "country": "<?= $data->detail; ?>",
                "visits": <?= $data->total; ?>,
                "color": "<?= $data->ca_color; ?>"
                <?php
            }
        }else{
            echo "{";
        }            
        ?>
    }
  ],
  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
    "title": "Total Flavor By Month"
  }],
  "startDuration": 1,
  "graphs": [{
    "balloonText": "<b>[[category]]: [[value]]</b>",
    "fillColorsField": "color",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "labelRotation": 45
  },
  "export": {
    "enabled": true
  }

});

</script>