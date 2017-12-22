
<!-- Input File -->
	            <div class="row">
	            	<div class="col-md-6 col-md-offset-3">					
	            		<form action="<?= site_url('nasty_v2/dashboard/uploadBarcode?key=').$this->my_func->scpro_encrypt("betul"); ?>" method="POST" role="form" enctype="multipart/form-data">
	            		<div class="portlet box blue-madison">
					        <div class="portlet-title">
					            <div class="caption">
					                <i class="fa fa-image"></i>Barcode Info
					            </div>                
					        </div>
					        <div class="portlet-body flip-scroll">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-4">
												<div class="fileinput fileinput-new" align="center" data-provides="fileinput">
													<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;"></div>
													<div class="row">
														<span class="btn green soft btn-outline btn-file">
															<span class="fileinput-new"> Select Barcode image </span>
															<span class="fileinput-exists"> Change </span>
															<input type="hidden" value="" name="title"><input type="file" name="fileImg"> </span>
															<a href="javascript:;" class="btn  green soft  fileinput-exists" data-dismiss="fileinput"> Remove </a>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<label><big><b>Barcode Number :</b></big></label>
												<input type="text" name="number" class="form-control">
												<div class="clearfix">&nbsp;</div><button type="submit" class="btn green-steel" class="form-control"><i class="fa fa-upload"></i> Submit</button>
											</div>
											
										</div>
									</div>
								</div>
            				</div>
	            			<!-- <input type="hidden" name="or_id" id="inputOr_id" class="form-control" value="<?= $or_id; ?>">					         -->
	            		</div>
	            		</form>
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