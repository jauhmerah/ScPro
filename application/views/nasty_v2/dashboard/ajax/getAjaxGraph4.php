<script type="text/javascript">
	var chart = AmCharts.makeChart("flavdiv", {
  "type": "serial",
  "theme": "light",
  "marginRight": 70,
  "dataProvider": [{
    "flavor": '<?= $new; ?>',
    "total": <?= $newtot; ?>,
    "color": "#3598dc"
  },{
    "flavor": '<?= $inprogress; ?>',
    "total": <?= $data->total; ?>,
    "color": "<?= $data->ca_color; ?>"
  },{
    "flavor": '<?= $text2; ?>-<?= $tex;?>',
    "total": <?= $data->total; ?>,
    "color": "<?= $data->ca_color; ?>"
  },{
    "flavor": '<?= $text2; ?>-<?= $tex;?>',
    "total": <?= $data->total; ?>,
    "color": "<?= $data->ca_color; ?>"
  },{
    "flavor": '<?= $text2; ?>-<?= $tex;?>',
    "total": <?= $data->total; ?>,
    "color": "<?= $data->ca_color; ?>"
  }],
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