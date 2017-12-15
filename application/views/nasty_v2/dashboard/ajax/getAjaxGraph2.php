<pre>
    <?= print_r($arr); ?>
</pre>
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
                unset($text2);
                if((strpos($data->detail, '|') != false))
                {
                    $text = explode("|", $data->detail);
                    $rep = array('<p>','<strong>','</strong>' , '</p>' , ' ', '"');
                    
                    $text2 = str_replace($rep, '', $text[1]);
                    $text2 = preg_replace( "/\r|\n/", "", $text2 );
                }
                else
                {
                    $text2 = $data->detail;
                }
                
                
                //
                unset($rep);
                $rep = array('<p>','<strong>','</strong>' , '</p>' , '"' );
                $tex = preg_replace( "/\r|\n/", "", $data->ca_desc );
                $tex = str_replace($rep, '', $tex);
                ?>
                "flavor": '<?= $text2; ?> - <?= $tex; ?>',
                "total": <?= $data->total; ?>,
                "color": "<?= $data->ca_color; ?>"
                <?php
            }
        }else{
            echo "{"; ?>
            "flavor": 'No Data',
                "total": 0,
                "color": "black"
            <?php
        }            
        ?>
    }
  ],
  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
    "title": "Total Flavor"
  }],
  "startDuration": 1,
  "graphs": [{
    "balloonText": "<b>[[category]]: [[value]]</b>",
    "fillColorsField": "color",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "total"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "flavor",
  "categoryAxis": {
    "gridPosition": "start",
    "labelRotation": 45
  },
  "export": {
    "enabled": true
  }

});

</script>