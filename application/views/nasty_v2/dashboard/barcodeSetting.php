<?php 
$url = $this->uri->segment(5,1);
?>

<link href="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
					<script src="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<div class="row">
	<div class="col-md-12">
           <div class="tab-pane active" id="tab_1">
                        <div class="portlet box blue-soft ribbon mt-element-ribbon" >
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gears" aria-hidden="true"></i> Barcode Setting                                   
                                </div>
                            
                            </div>
							
                           <div class="portlet-body form">

							<div class="notification">
								
							</div>
							<div class="clearfix">
								&nbsp;
							</div>
							 <div class="row tableC">
								<!-- <form id="formSearch" action="<?= site_url('nasty_v2/dashboard/page/i2'); ?>" method="POST" role="form"> -->
									<div class="col-md-12">
										<div class="col-md-5">
										</div> 
										<div class="col-md-7">
											<div class="form-group">
											<div class="col-sm-4">
												<label for="input" class="control-label">Barcode </label>
											</div>
												
												<div class="col-sm-5">
													<input type="search" name="search" id="search" class="form-control input-circle" placeholder="Barcode No." onmouseover="this.focus();" required>
												</div>
												<div class="col-sm-2">
													<button type="button" class="clearBtn btn bg-green-sharp btn-circle btn-md" title="Clear Field"><i class="fa fa-eraser" aria-hidden="true"></i> Clear Field</button>													
												</div>
												
											</div>
										</div>
								
									</div>
								<!-- </form> -->
							</div>
							<div class="clearfix">
								&nbsp;
							</div>
							 <div class="row tableC">
                           		<div class="table-responsive">
                           			<div class="col-md-12" id="divTableItem" name="divTableItem">
                           				
											<table class="table table-bordered">
											<thead>
												<tr>
													<th>#</th>
													<th>Barcode</th>
													<th>Item</th>
													<th>Category</th>
												
													<th>Action</th>
												
												</tr>
											</thead>
											<tbody>
											<?php
											$n=0;
									
										foreach ($result as $key) { 
											$n++;


											?>
											
												
											
												<tr  >
													<td><?= $n; ?></td>
													<td><?= $key->bi_code; ?></td>
													<td><?= $key->ty2_desc; ?> | <strong><?= $key->ni_mg; ?> mg</strong></td>
													<td><?= $key->ca_desc; ?></td>
													
													<td>
													<center>
												<a href="<?= site_url('nasty_v2/dashboard/page/i41?view=').$this->my_func->scpro_encrypt($key->bi_id); ?>" title="View Finish Item">                                                    
												<button type="button" class="btn bg-grey-salt btn-circle btn-md"title="View"><i class="fa fa-eye"></i> </button>
                                                </a>
												&nbsp;&nbsp;-&nbsp;&nbsp;
												<a href="<?= site_url('nasty_v2/dashboard/page/i42?edit=').$this->my_func->scpro_encrypt($key->bi_id); ?>"  title="Edit Finish Item">
												<button type="button" class="btn bg-green-turquoise btn-circle btn-md" title="Edit"><i class="fa fa-edit"></i></button>
                                                </a>
												&nbsp;&nbsp;-&nbsp;&nbsp;
												<button type="button" class="deleteBtn btn bg-red btn-circle btn-md" id="<?= $n.'del' ?>" name="<?= $n.'del' ?>" title="Delete"><i class="fa fa-trash"></i></button>
												<input type="hidden" class="form-control <?= $n.'del' ?>" value="<?= $this->my_func->scpro_encrypt($key->bi_id); ?>">
												
												
													</center>
													</td>
													
												</tr>
												<div name="divDanger" id="divDanger">		
												</div>
					 							<?php } ?>
						 
												</tbody>
												<tfoot>
												<?php
												$lastRow = $numPage + sizeof($result);
													?>
												<tr>
												<td colspan="6">
													<ul class="pagination">
													<li>
													<div class="pull-right">
														<?= $link; ?>
													</div>
														
													</li>
														
													</ul>
													<div class="pull-right">
														<span class="btn disabled">Showing <?= ($numPage+1); ?> to <?= $lastRow; ?> of <?= $total; ?> records</span>
													</div> 
												</td>
											</tr>
										</tfoot>
										</table>
					</div>
				</div>
				</div>
				<div id="fileUp" style="display:none;">
	            	
	            </div>


                            </div> 
                        </div>                       
                    </div>
        </div>
</div>
<script>


		


	$(document).ready(function() {

		$("#search").keyup(function(){
					
            search = $("#search").val();
			
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxTableItem'); ?>', {search : search}, function(data) {
               
                $("#divTableItem").html(data);
            });

			$("#search").val($("#search").val().replace(' ', ','));
			
			 
		});
	
        $(".barcodeBtn").click(function(){

			id = $(this).prop('id');
               
            be = $("."+id).val();

			url = "<?= $url; ?>";


			$.post('<?= site_url('nasty_v2/dashboard/getAjaxBarcode'); ?>', {be_id : be , page : url}, function(data) {
               
                $("#divDanger").html(data);
            });
			
		});
			
		$(".clearBtn").click(function(){
			$("#search").val('');
			$.post('<?= site_url('nasty_v2/dashboard/getAjaxTableItem'); ?>', {}, function(data) {
               
                $("#divTableItem").html(data);
            });
		});

		$(".deleteBtn").click(function(){
            id = $(this).prop('id');
                    
                    beid = $("."+id).val();
              
                    bootbox.confirm({
                        message: "Are you sure that you want to delete this item?",
                        buttons: {
                            confirm: {
                                label: 'Yes',
                                className: 'btn-success'
                               
                            },
                            cancel: {
                                label: 'No',
                                className: 'btn-danger'
                            }
                        },
                        callback: function (result) {
                     if(result == true){
                                
                                $.post('<?= site_url('nasty_v2/dashboard/del_item'); ?>', {id: beid}, function(data) {
                                    
                                    $(window).attr("location", "<?= site_url('nasty_v2/dashboard/page/i4').'/'.$url; ?>");
                                    
                                });

                            }
                            
                            
                        }
                    });
		});
            
	});

</script>