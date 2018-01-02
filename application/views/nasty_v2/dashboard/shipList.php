<script>
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
</script>
<style>
.label-medium {
  vertical-align: super;
  font-size: medium;
}

.label-large {
  vertical-align: super;
  font-size: large;
}

.label-bs {
  vertical-align: super;
}
</style>
<?php
	$us_id = $this->my_func->scpro_decrypt($this->session->userdata('us_id'));
	$us_name = $this->my_func->scpro_decrypt($this->session->userdata('us_username'));
	?>
<link href="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css">
					<script src="<?= base_url(); ?>asset2/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

<div class="row">
	<div class="col-md-12">	
		<div class="portlet box green-haze">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list"></i>Logs
                </div>
                      
            </div>
             <?php $us_lvl = $this->my_func->scpro_decrypt($this->session->userdata('us_lvl'));?>
            <div class="portlet-body flip-scroll">
	            <div class="row tableL">
	            <form id="formSearch" action="<?= site_url('nasty_v2/dashboard/page/i21'); ?>" method="POST" role="form">
	            	<div class="col-md-12">
	            		 <div class="col-md-2">
						 
	            		</div> 
	            		<div class="col-md-4">
	            			<div class="form-group">
	            				<label for="input" class="col-sm-2 control-label">Search</label>
	            				<div class="col-sm-10">
	            					<input type="search" name="search" id="search" class="form-control input-circle" placeholder="Search" required>
	            				</div>
	            			</div>
	            		</div>
	            		<div class="col-md-4">
	            			<div class="form-group">
	            				<label for="inputFilter" class="col-sm-2 control-label">Filter</label>
	            				<div class="col-sm-10">
	            					<select name="filter" id="inputFilter" class="form-control input-circle">
	            						<option value="-1">-- Select Filter --</option>
	            						<option value="1">Item Name</option>
	            						<option value="2">Username</option>
	            						<option value="3">Date</option>
	            						<option value="4">Status</option>
	            					</select>
	            				</div>
	            			</div>
	            		</div>
	            		<div class="col-md-2">
	            			<button type="button" class="btn btn-default " id="sub"><i class="fa fa-search"></i> Search</button><!--  -->
	            		</div>
	            	</div>
	            </form>
	            </div>
	            <div class="clearfix">
	            	&nbsp;
	            </div>
	            <div class="row tableL">
	            	<div class="col-md-12">
	            		<table class="table table-bordered table-striped flip-content">
		                    <thead class="flip-content">
		                        <tr>
		                            <th>#</th>
		                            <th>Item</th>
		                            <th>Strength</th>
		                            <th>From</th>
		                            <th>To</th>
		                            <th>Diff</th>
		                            <th>User</th>
		                            <th>Date</th>
		                            <th>Status</th>
		                            
		                        </tr>
		                    </thead>
		                    <tbody>
		                    <?php
		                    	$n = 0; 
		                    	if (sizeof($result) != 0) { 
		                    		foreach ($result as $key) {
		                    			$n++;
		                    			?>
		                    	
		                    		<tr class="Lorder" id="L<?= $n; ?>">
		                            <td><?= $n; ?></td>
		                            <td><?php 
                                    $view = ($key->ty2_desc == null) ? "--Not Set--" : $key->ty2_desc ;
                                    echo $view;
                                    ?>
                                 </td>
		                            <td><?php 
                                    $view = ($key->ni_mg == null) ? "--Not Set--" : $key->ni_mg ;
                                    echo $view;
                                    ?> mg</td>
                                    <td><?php 
                                    $view = ($key->fi_from == null) ? "--Not Set--" : $key->fi_from ;
                                    echo $view;
                                    ?></td>
		                             <td><?php 
                                    $view = ($key->fi_to == null) ? "--Not Set--" : $key->fi_to ;
                                    echo $view;
                                    ?></td>
                                   
		                            <td><?php 
                                    $view = ($key->fi_diff == null) ? "--Not Set--" : $key->fi_diff ;

                                    if($view>=0){
                                    	echo '+'.$view;
                                    }
                                    else{
                                    	echo $view;
                                    }

                                    
                                    ?></td>
                                     <td>
                                     <?php 
                                    $view = ( $key->us_username == null) ? "--Not Set--" :  $key->us_username ;
                                    echo $view;
                                    ?>

                                 	
		                            <td><?= date_format(date_create($key->fi_date) , 'l' ) ; ?>
                        <br>                        
                        <strong><?= date_format(date_create($key->fi_date) , 'd-m-Y' ) ; ?></strong>
						<br>
						<?= date_format(date_create($key->fi_date) , 'G:i:s' ) ; ?>
						</td>	           
                                    <td class="mt-element-ribbon">                                    
                                    	<div class="pull-left"> 
                                    	
                                    	<span class="label label-large" style="background-color: <?= $key->ls_color; ?>"><?= $key->ls_desc; ?></span>
                                    	
                                    	</div>
                                    </td>
		                                            
		                        </tr>
		                    	<?php
		                    		}
		                    	}
		                    	?>
		                    </tbody>
		                    
		                    <tfoot>
							<?php
                           $lastRow = $numPage + sizeof($result);
							?>	
		                    	<td colspan="9">
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
		                    </tfoot> 
		                </table>

	            	</div>
	            </div>
	            
            </div>
        </div>
	</div>
</div>

