<!-- <script>
	function onDel() {
		return false;
		//confirm('Are You Sure ?');
	}
	$(document).ready(function() {

		$("#sub").click(function() {
			if (searchFun()) {
				$("#formSearch").submit();
			} else {
				$("#inputFilter").focus();
			}
		});
		function searchFun() {
			filter = $("#inputFilter").val();
			if (filter == -1) {
				bootbox.alert("Please select Filter");
				return false;} else {return true;}
		}
	});	
</script> -->

<link href="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
					<script src="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<div class="row">
	<div class="col-md-12">	
		<div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cubes"></i>Finish Item List
                </div>
            </div>
            <div class="portlet-body flip-scroll">
	            <div class="row tableL">
	           
	            	<div class="col-md-12">
	            		
	            		<div class="col-md-5">
	            			<div class="form-group">
	            				<label for="input" class="col-sm-2 control-label">Category</label>
	            				<div class="col-sm-10">
	            					<select name="category" id="category" class="form-control input-circle">
	            						<option value="-1" >Select Category</option>
                                                            <?php foreach ($lvl as $key) {
                                                                ?>
                                                                <option style="background-color: <?= $key->ct_color; ?>" value="<?= $key->ct_id; ?>" > <?= $key->ct_name; ?></option>
                                                                <?php
                                                            } ?>
	            					</select>
	            				</div>
	            			</div>
	            		</div>
	            		<div class="col-md-5">
	            			<div class="form-group">
	            				<label for="inputFilter" class="col-sm-2 control-label">MG</label>
	            				<div class="col-sm-10">
	            					<select name="subcategory" id="subcategory" class="form-control input-circle">
	            						 <option value="-1">Select Nicotine</option>
                                      <?php
										foreach ($mg as $key) {
											if ($key->ni_mg == -1) { ?>
											<option style = "background-color: <?= $key->ni_color; ?> ;" value="<?= $key->ni_id; ?>">-- No Mg --</option>
									<?php	}else{ ?>
											<option style = "background-color: <?= $key->ni_color; ?> ;" value="<?= $key->ni_id; ?>"><?= $key->ni_mg; ?> Mg</option>
									<?php }} ?>
	            					</select>
	            				</div>
	            			</div>
	            		</div>











	            		<div class="col-md-2">
	            			<button type="button" class="btn btn-default " id="sub"><i class="fa fa-search"></i> Search</button>
	            		</div>
	            	</div>
	            </div>
	            <div class="clearfix">
	            	&nbsp;
	            </div>
	            <div class="row tableL">
	            	<div class="col-md-12">
	            		<div id="dt">
	            		<table class="table table-bordered table-striped flip-content">
		                    <thead class="flip-content">
		                        <tr>
		                            <th>#</th>
                                    <!-- <th>Item Code</th> -->
                                    <th>Item Name</th>
                                    <th>Category</th>
                                    <th>Nicotine</th>
                                    <th>Quantity</th>
                                    
		                        </tr>
		                    </thead>
		                    <tbody>
		                     <?php
                                $n = 0; 
                                    if($arr != null){
                                    foreach ($arr as $item){
                                        $n++;
                                        ?>
                                        <tr>
                                            <td><?= $n ?></td>

                                    <!--         <td><?= $item->it_id ?>
                                            </td> -->
                                            <td><?= $item->it_name; ?></td>
                                            <td><?= $item->ct_name; ?></td>
                                            <td><?= $item->ni_mg; ?> mg</td>
                                            <td><?= $item->it_qty; ?></td>
                                           
                                        </tr>
                                        
                                   <?php
                                           }
                                }else{
                    
                                        ?>
                                         <td colspan="8"><center>No Data</center></td>
                                        <?php } ?>                                     
		                    </tbody>
		                    <?php if (isset($page)) {?>
		                    <tfoot>
		                    	<td colspan="7">
			                	<div class="col-md-5 col-sm-5">
			                		<div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing <?= ($page+1); ?> to <?= ($page+$row); ?> of <?= $total; ?> records</div>
			                	</div>
			                	<div class="col-md-7 col-sm-7" align="right">
			                		<div class="dataTables_paginate paging_bootstrap_full_number" id="sample_1_paginate">
			                			<ul class="pagination" style="visibility: visible;">
			                			<?php
			                			$prev = "";
			                			$next = "";
			                				if ($page == 0) {
			                					$prev = "disabled";
			                				}
			                				if ($total <= ($page + 10)) {
			                					$next = "disabled";
			                				}
			                			?>
			                				<li class="prev <?= $prev; ?>"><a <?php if($prev!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/f1?page='.($page-10)); ?>"<?php } ?> title="Prev" ><i class="fa fa-angle-left"></i></a></li>			                				
			                				<li class="next <?= $next; ?>"><a <?php if($next!="disabled"){ ?>href="<?= site_url('nasty_v2/dashboard/page/f1?page='.($page+10)); ?>"<?php } ?> title="Next"><i class="fa fa-angle-right"></i></a></li>
			                			</ul>
			                		</div>
			                	</div>
				                </td>
		                    </tfoot> <?php 
		                    } ?>
		                </table>
		                </div>
	            	</div>
	            </div>
	            
            </div>
        </div>
	</div>
</div>

<script>
	$(document).ready(function() {
		 $('#sub').click(function() {

            cat = $('#category').val();

            sub = $('#subcategory').val();
           
            $.post('<?= site_url('nasty_v2/dashboard/getAjaxTable2'); ?>', {cat_id : cat , ni_id : sub}, function(data) {
               
                $("#dt").html(data);
            });
        });
	});

</script>
