<script type="text/javascript">
	var chart = AmCharts.makeChart("flavdiv", {
    "type": "serial",
  "theme": "light",
    "legend": {
        "horizontalGap": 10,
        "maxColumns": 1,
        "position": "right",
    "useGraphSettings": true,
    "markerSize": 10
    },
    "dataProvider": [{
        "year": 2003,
        "0mg": 100,
        "3mg" : 300,
        "6mg" : 250
    },
    <?php 
        $n = 0;
        $year = null;
        $month = null;
        if (sizeof($arr) != 0) {            
            foreach ($arr as $data) {
                if ($year == null && $month == null) {
                  $year = $data->year;
                  $month = $data->month;
                }                
                $text = explode("|", $data->detail);
                $rep = array('<p>','<strong>','</strong>' , '</p>' , ' ', '"');
                $text2 = str_replace($rep, '', $text[1]);
                unset($rep);
                $rep = array('<p>','<strong>','</strong>' , '</p>' , '"' );
                $tex = preg_replace( "/\r|\n/", "", $data->ca_desc );
                $tex = str_replace($rep, '', $tex);
                if ($n != 0) {
                  echo "},";
                }else{ $n++;}
                echo "{";
                "year": '<?= $text2; ?>-<?= $tex;?>',
                "0mg": <?= $data->total; ?>,
                "3mg": "<?= $data->ca_color; ?>",
                "6mg": "<?= $data->ca_color; ?>"
            }

        }else{
            echo "{"; ?>
            "flavor": 'No Data',
                "total": 0,
                "color": "black"
            <?php
        }            
        ?>
    }],
    "valueAxes": [{
        "stackType": "regular",
        "axisAlpha": 0.3,
        "gridAlpha": 0
    }],
    "graphs": [{
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "0mg",
        "type": "column",
    "color": "#ff0000",
        "valueField": "0mg"
    },{
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "3mg",
        "type": "column",
    "color": "#000000",
        "valueField": "3mg"
    },{
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "6mg",
        "type": "column",
    "color": "#000000",
        "valueField": "6mg"
    }],
    "categoryField": "year",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "position": "left"
    },
    "export": {
      "enabled": true
     }

});

</script>