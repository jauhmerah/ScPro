<?php 
    $saleperson = $this->my_func->scpro_decrypt($this->session->userdata('us_username'));
    if (isset($client)) {
        ?>
<pre>
<?php print_r($client); echo date('m/d/Y'); ?>
</pre>
<div class="col-md-8">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group has-success">
                <label class="control-label">Name* :</label>
                <input readOnly type="text" id="name" value = "<?= $client->cl_name; ?>" name="name" class="form-control input-circle" placeholder="Client Name" required>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group has-success">
                <label class="control-label">Company :</label>
                <input readOnly type="text" id="company" value = "<?= $client->cl_company; ?>" name="company" class="form-control input-circle" placeholder="Nasty">
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group has-success">
                <label class="control-label">Contact Number* :</label>
                <input readOnly type="text" id="tel" value = "<?= $client->cl_tel; ?>" name="tel" class="form-control input-circle" placeholder="Client Number" required>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group has-success">
                <label class="control-label">Country* :</label>
                <input readOnly type="text" id="country" value = "<?= $client->cl_country; ?>" name="country" class="form-control input-circle" placeholder="Country" required>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Sales Person* :</label>
                <input type="text" id="salesPerson" readonly name="salesPerson" class="form-control input-circle" value="<?= $saleperson; ?>" >
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6 has-success">
            <div class="form-group">
                <label class="control-label">Email* :</label>
                <input readOnly type="text" id="email" value = "<?= $client->cl_email; ?>" name="email" class="form-control input-circle" placeholder="Email" required>
            </div>
        </div>
        <!--/span-->
    </div>
</div>
<div class="col-md-4">
    <div class="row">                                                   
        <div class="form-group col-md-12">
            <label class="control-label">Date Line :</label>
            <input type="date" id="dateline" name="dateline" class="form-control input-circle">
        </div>
        <!--/span-->
    </div>
    <div class="row">   
        <div class="form-group col-md-12">
            <label class="control-label">Order Date :</label>
            <input type="date" readonly id="orderdate" name="orderdate" value = "<?= date('Y-m-d'); ?>" class="form-control input-circle">
        </div>                                                  
        <!--/span-->
    </div>
    <div class="row">   
        <div class="form-group col-md-12">
            <label class="control-label">Finish Date :</label>
            <input type="date" id="finishdate" name="finishdate" class="form-control input-circle">
        </div>                                                  
        <!--/span-->
    </div>
    <div class="row">   
        <div class="form-group col-md-12">
            <label class="control-label">Currency :</label>
            <select class="form-control input-circle">
                <option value="MYR">MYR</option>
                <option value="USD">USD</option>
                <option value="EURO">EURO</option>
            </select>
        </div>                                                  
        <!--/span-->
    </div>
</div>
        <?php
    }else{
        ?>


<div class="col-md-8">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Name* :</label>
                <input type="text" id="name" name="name" class="form-control input-circle" placeholder="Client Name" required>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Company :</label>
                <input type="text" id="company" name="company" class="form-control input-circle" placeholder="Nasty">
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Contact Number* :</label>
                <input type="text" id="tel" name="tel" class="form-control input-circle" placeholder="Client Number" required>
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Country* :</label>
                <input type="text" id="country" name="country" class="form-control input-circle" placeholder="Country" required>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Sales Person* :</label>
                <input type="text" id="salesPerson" readonly name="salesPerson" class="form-control input-circle" value="<?= $saleperson; ?>" >
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Email* :</label>
                <input type="text" id="email" name="email" class="form-control input-circle" placeholder="Email" required>
            </div>
        </div>
        <!--/span-->
    </div>
</div>
<div class="col-md-4">
    <div class="row">                                                   
        <div class="form-group col-md-12">
            <label class="control-label">Date Line :</label>
            <input type="date" id="dateline" name="dateline" class="form-control input-circle">
        </div>
        <!--/span-->
    </div>
    <div class="row">   
        <div class="form-group col-md-12">
            <label class="control-label">Order Date :</label>
            <input type="date" readonly id="orderdate" name="orderdate" value = "<?= date('Y-m-d'); ?>" class="form-control input-circle">
        </div>                                                  
        <!--/span-->
    </div>
    <div class="row">   
        <div class="form-group col-md-12">
            <label class="control-label">Finish Date :</label>
            <input type="date" id="finishdate" name="finishdate" class="form-control input-circle">
        </div>                                                  
        <!--/span-->
    </div>
    <div class="row">   
        <div class="form-group col-md-12">
            <label class="control-label">Currency :</label>
            <select class="form-control input-circle">
                <option value="MYR">MYR</option>
                <option value="USD">USD</option>
                <option value="EURO">EURO</option>
            </select>
        </div>                                                  
        <!--/span-->
    </div>
</div>
 <?php
    }
?>