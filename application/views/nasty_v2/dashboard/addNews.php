<link href="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
<script src="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

<link href="<?= base_url(); ?>asset2/global/plugins/bootstrap-switch/css/bootstrap-switch.css" rel="stylesheet" type="text/css">
<script src="<?= base_url(); ?>asset2/global/plugins/bootstrap-switch/js/bootstrap-switch.js" type="text/javascript"></script>

<div class="row">
	<div class="col-md-12">
		<div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Add News</div>                
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form  action="<?= site_url('nasty_v2/dashboard/addNews') ?>" method = 'post' class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-body">
                    	<h3 class="form-section">News Detail</h3>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Title :</label>
                            <div class="col-md-5">
                                <input type="text" name="ne_title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Date :</label>
                            <div class="col-md-2">
                                <input type="Date" name="ne_timestamp" class="form-control">
                            </div>
                            <label class="col-sm-1 control-label">Active :</label>
                            <div class="col-md-1">
                               <div class="row pull-right">
                             <input type="checkbox" class="make-switch pull-right" name="ne_active" checked data-on-text="YES" data-off-text="NO">
                                </div>
                            </div>
                        </div>
                       
                        
                        
                         <div class="form-group">
                            <label class="col-md-3 control-label">Icon:</label>
                                <div class="fileinput fileinput-new col-md-2 " data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 190px; height: 140px; line-height: 150px;"></div>
                                    
                                        <span class="btn red btn-outline btn-file">
                                            <span class="fileinput-new"> Select image </span>
                                            <span class="fileinput-exists"> Change </span>
                                            <input type="hidden" value="" name="title"><input type="file" name="img_icon"> </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                   
                                </div>

                             <label class="col-md-1 control-label">Image Background:</label>
                                <div class="fileinput fileinput-new col-md-2" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 190px; height: 140px; line-height: 150px;"></div>
                                    
                                        <span class="btn red btn-outline btn-file">
                                            <span class="fileinput-new"> Select image </span>
                                            <span class="fileinput-exists"> Change </span>
                                            <input type="hidden" value="" name="title"><input type="file" name="img_background"> 
                                            </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-md-3 control-label">Message :</label>
                           <div class="col-md-5">
                                <textarea name="ne_msg" class="form-control"></textarea>  
                            </div>
                        </div>
                        
                            
                            
                          
                       
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" id="btnSubmit" class="btn btn-circle green">Add News</button>
                               
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
	  <script>
                    $(document).ready(function() {
                        $("#tutupUpload").click(function(){
                            $(".tableL").fadeIn("slow");
                            $("#fileUp").fadeOut("fast");
                            $("#fileUp").html("");
                        });
                        $(".img").click(function() {
                            img = $(this).prop('src');
                            bootbox.dialog({message :
                                '<div align = "center"><img src="'+img+'" class="img-responsive" alt="Image"><br/></div>'
                            });
                        });
                        $(".delImg").click(function(){
                            pi_id = $(this).prop('id');
                            if (confirm("Are you sure?")) {
                                $.when($(".t"+pi_id).html("<h2><i class='fa fa-refresh fa-spin'></i></h2>")).then(function(){
                                    $.post('<?= site_url('nasty_v2/dashboard/getAjaxDelImg') ?>', {pi_id: pi_id}, function(data) {
                                        if(data){
                                            $(".t"+pi_id).remove();                                     
                                        }else{
                                            bootbox.alert("Warning Error, Contact Jauhmerah....");
                                        }
                                    });
                                });
                            }
                        });
                    }); 
                </script>
	</div>
</div>