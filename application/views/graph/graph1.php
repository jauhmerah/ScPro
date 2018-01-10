<script type="text/javascript">
var chart = AmCharts.makeChart( "g1div", {
  "type": "serial",
  "theme": "light",
  "dataProvider": [
<?php if(sizeof($arr) != 0){ 
  for ($i=0; $i < sizeof($arr); $i++) { 
    $rep = array('<p>','<strong>','</strong>' , '</p>' , ' ', '"');
    $rep2 = array('<p>','<strong>','</strong>' , '</p>' , '"');
    if (strpos($arr[$i]->color, '<strong>') !== false)
    {
        if (strpos($arr[$i]->color, '<p>') !== false)
        {
            $text = explode("|", $arr[$i]->color);
            
            $text2 = str_replace($rep, ' ', $text[1]);
        }
        else {
            $text = $arr[$i]->color;
            $text2 = str_replace($rep, ' ', $text);
        }
    }
    else {
            $text = $arr[$i]->color;
            $text2 = str_replace($rep, ' ', $text);
    } 
    

   
    
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
  "titles": [ {
  "text":"Flavour Current Quantity",
    "size": 15
    
  } ],
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
    "labelRotation": 45,
    "tickLength": 20
  },
  "export": {
    "enabled": true
  }

} );
</script>