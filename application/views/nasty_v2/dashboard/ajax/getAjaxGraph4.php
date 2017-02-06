<script type="text/javascript">
var chart = AmCharts.makeChart( "orderdiv", {
  "type": "pie",
  "theme": "light",
  "titles": [ {
    "text": "Total Order",
    "size": 16
  } ],
  "dataProvider": [ {
    "flavor": 'New',
    "total": <?= $new; ?>
  },{
    "flavor": 'In Progress',
    "total": <?= $inprogress; ?>
  },{
    "flavor": 'Complete',
    "total": <?= $complete; ?>
  },{
    "flavor": 'UnConfirm',
    "total": <?= $unconfirm; ?>
  },{
    "flavor": 'On hold In Progress',
    "total": <?= $onhold; ?>
  }],
  "valueField": "total",
  "titleField": "flavor",
  "startEffect": "elastic",
  "startDuration": 2,
  "labelRadius": 15,
  "innerRadius": "50%",
  "depth3D": 10,
  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
  "angle": 15,
  "export": {
    "enabled": true
  }
} );

</script>