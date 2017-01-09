<?php 
	$orid = $this->my_func->scpro_decrypt($or_id);
?>
<!-- Input File -->
	            <div class="row">
	            	<div class="col-md-6 col-md-offset-3">					
	            		<form action="<?= site_url('nasty_v2/dashboard/uploadPaid?key=').$this->my_func->scpro_encrypt("betul"); ?>" method="POST" role="form" enctype="multipart/form-data">
	            		<div class="portlet box purple-sharp">
					        <div class="portlet-title">
					            <div class="caption">
					                <i class="fa fa-image"></i>Upload Payment Proof For 
					            </div>                
					        </div>
					        <div class="portlet-body flip-scroll" align="center">
					        <span style = "color : #b706d6;"><h2><strong>#<?= (120000+$orid); ?></strong></h2></span>
					        <div class="form-group">
	            				<div class="fileinput fileinput-new" align="center" data-provides="fileinput">
	                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;"></div>
	                                <div>
	                                    <span class="btn red btn-outline btn-file">
	                                        <span class="fileinput-new"> Select image </span>
	                                        <span class="fileinput-exists"> Change </span>
	                                        <input type="hidden" value="" name="title"><input type="file" name="fileImg"> </span>
	                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
	                                    </div><div class="clearfix">&nbsp;</div><button type="submit" class="btn btn-primary btn-circle"><i class="fa fa-upload"> Submit</i></button>
	                                </div>
	                            </div>
	            			</div>
	            			<input type="hidden" name="or_id" id="inputOr_id" class="form-control" value="<?= $or_id; ?>">					        
	            		</form>
	            	</div>
	            </div>