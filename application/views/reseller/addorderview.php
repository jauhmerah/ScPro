<div class="row">
<div class= "col-xs-12">
<div>
<pre><?php print_r($arr);print_r($nico); ?></pre>

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12"><strong>
                <h1 class="page-header"><?= $arr->oip_desc; ?>
                    <small><?= $arr->oip_code; ?></small>
                </h1>
            </strong></div>
        </div>
        <!-- /.row -->
        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <img class="img-responsive" src="<?= base_url().'assets/uploads/product/'.$arr->oip_img; ?>" alt="<?= $arr->oip_desc; ?>">
            </div>

            <div class="col-md-4">
                <?= $arr->oip_detail; ?>
            </div>

        </div>
        <div class="clearfix">
         <br>
        </div>
        <!-- /.row -->
        <!-- Related Projects Row -->
        <div class="panel panel-default">
            <div class="panel-heading">
        <div class="row">
            <div class="col-xs-8">
                <h3 class="page-header"><?= $arr->oip_desc; ?> <?php foreach ($nico as $n) { ?>
                <span class="label" style="color: black; background-color: <?= $n->ni_color; ?>;"><?= $n->ni_mg; ?> Mg</span><?php } ?>
                </h3>
            </div>
            <div class="col-xs-4">
                <h3 class="page-header"><span class="pull-right">Avaliable Size : <span id="size"><?= $arr->oip_size; ?></span> pcs</span></h3>
            </div>
        </div>
        </div>
        <div class="panel-body">
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">Series:</label>
                    <div class="col-sm-10">
                        <select name="" id="input" class="form-control input-circle">
                            <option value="">-- Select One --</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">Flavor:</label>
                    <div class="col-sm-10">
                        <select name="" id="input" class="form-control input-circle">
                            <option value="">-- Select One --</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix">
            <br>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="input" class="col-sm-2 control-label">Nico mg:</label>
                    <div class="col-sm-10">
                        <select name="" id="input" class="form-control input-circle">
                            <option value="">-- Select One --</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xs-6" style="padding-right: 30px;">
                <span><i class="fa fa-spinner fa-spin"></i> <i class="fa fa-flask"></i> Flavor Brewing Now...</span><span class="pull-right"><button type="button" class="btn btn-success btn-circle"><i class="fa fa-plus"></i> Add</button></span>
            </div>
        </div>
        <!-- /.row -->
        <hr>
        <div class="row">
            <a href="#">
            <div class="col-sm-3 col-xs-6" style="position: relative;">
            <div class="mt-element-ribbon">
            <div class="ribbon ribbon-right ribbon-vertical-right ribbon-shadow ribbon-border-dash-vert ribbon-color-primary uppercase" style="position: absolute; float: right; ">
                <div class="ribbon-sub ribbon-bookmark" ></div>
                <i class="fa fa-star"></i>
            </div>
            <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">                  
            </div>
            </div>
            </a>

            <a href="#">
            <div class="col-sm-3 col-xs-6" style="background-image: url('<?= base_url().'assets/uploads/product/'.$arr->oip_img; ?>'); background-repeat: no-repeat; height: auto; background-size: contain;">
            <div class="ribbon ribbon-right ribbon-vertical-right ribbon-shadow ribbon-border-dash-vert ribbon-color-primary uppercase">
                <div class="ribbon-sub ribbon-bookmark"></div>
                <i class="fa fa-star"></i>
            </div>                
            </div></a>
        </div>   
            </div>
        </div>
    </div>
</div>
</div>