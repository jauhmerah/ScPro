<!DOCTYPE html>
<html>
<head>
 
  <title>OrdYs UK | QR Code</title>
<style type="text/css">
  body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 22.8cm;
  height: 100%; 
}
page[size="A4"][layout="portrait"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="portrait"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="portrait"] {
  width: 21cm;
  height: 14.8cm;  
}

p{
  margin-left: 0.5cm;
  margin-right: 0.5cm;
}
h3{

  margin-left: 0.5cm;
}
h4{

  margin-right: 0.5cm;
}
hr{
  margin-left: 0.5cm;
}
.firstLine td{
  border-top: 2px solid black;
    border-bottom: 2px solid black;
}
.border_label{

  border-style: solid;

}
.label_qr{
        /* Avery 5160 labels -- CSS and HTML by MM at Boulder Information Services */
        width: 5.315748in; /* plus .6 inches from padding */
        height: 4.36in; /* plus .125 inches from padding */
   
      

        outline: 1px dotted; /* outline doesn't occupy space like border does */
        }
#logo
{
    margin-right: 0.7cm;

}

@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}

</style>

<!-- <link rel="Stylesheet" href="<?php echo base_url();?>dist/css/stylesheet.css"/> -->
 </head> 
<body>
  <page size="A4">
      <?php 
          if (isset($arr)) {
                $num=count($arr['item']);
                $n=0;
                $stat="y";
            foreach ($arr['item'] as $key) {
              $n++;
      ?>
        <div class="label_qr">
        <div class=clear style="height: 60px;"></div>
          <div class="border_label">
            <div class=clear style="height: 5px;"></div>
             <img src="<?php echo base_url();?>assets/nasty/logo-address.png" width="217" height="60">
              <img src="<?php echo base_url();?>assets/nasty/nastylogo2.png" width="80" height="80" align="right" id="logo">
              <br>
              <P>
              Item Detial

                <?php 
                   
                      foreach ($qr as $ket) {
                      if ($ket->si_id == $key->si_id) {
                      $stat="n";
                ?>
                
            <img src="<?php echo base_url();?><?= $ket->qrs_url;?>" width="100" height="100" align="right" id="qr"> 

              <?php }
              }
              if($stat==""){ ?>

              <img src="<?php echo base_url();?>assets/nasty/checked.png" width="100" height="100" align="right" id="qr">
              <?php }?>
             
              </p>
            
              <hr/>
              <P>
               
               <?= $key->ty2_desc; ?>
              <br/>
              <?= $key->ca_desc; ?>  | <?= $key->ni_mg; ?>mg
              <br/>
              Quantity :<?= $key->si_qty; ?>pcs
              </P>

             
              <h3>Shipping Id : <?php $code = 1000 + $arr['ship']->sh_id; echo $code."-SH"; ?> </h3>
              <h4 align="right"><?= $n; ?>/<?= $num; ?></h4>
          </div>
        </div>
        <?php 
            }
          }
      ?>
      
      </div>
       

  </page>
<!-- <script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script> -->
<script>

    
   //window.print();

  
  </script>
</body>
</html>
