<div class="row menu">
	<div class="col-lg-4">
	<div class="col-lg-10 col-sm-offset-1">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-plus-square fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">Add</div>
						<div><i class="fa fa-pencil-square-o fa-2x"></i></div>
					</div>
				</div>
			</div>
			<a id="click">
				<div class="panel-footer">
					<span class="pull-left">Add News</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div></div>
	<div class="col-lg-4">
	<div class="col-lg-10 col-sm-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-th-list fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">View</div>
						<div><i class="fa fa-eye fa-2x"></i></div>
					</div>
				</div>
			</div>
			<a href="<?= site_url('dashboard/page/a12') ?>">
				<div class="panel-footer">
					<span class="pull-left">View list</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div></div>
	<div class="col-lg-4">
	<div class="col-lg-10 col-sm-offset-1">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-trash fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">Delete</div>
						<div><i class="fa fa-exclamation-triangle fa-2x"></i></div>
					</div>
				</div>
			</div>
			<a href="#">
				<div class="panel-footer">
					<span class="pull-left">Delete</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div></div>
</div>
<script>
	$(document).ready(function() {
		$('#submit_btn').click(function() {		
			if ($('#img').get(0).files.length === 0) {
				alert('No Image selected!!!');
			}else{
				$("#submitform").click();
			}			
		});
		$('#click').click(function() {
			$.when($('.menu').hide('slow')).then($('.addform').show('slow'));			
		});
	});	
</script>

<div class="row addform"><!--style="display: none;-->
	<div class="col-md-12">
		<div class="panel panel-green">
			<!-- Default panel contents -->
		
			<div class="panel-heading">Add New Production</div>
			<div class="panel-body">
				<!-- Table -->
				<form id = "add_form" enctype="multipart/form-data" method="post" action="<?= site_url('dashboard/add_news'); ?>">
				<table class="table table-hover">
					<tbody>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Client Name</span><span class="pull-right"> :</span></td>
							<td class="col-md-8"><input type="text" name="title" id="title" class="form-control" placeholder="Title" required="required"></td>
						</tr>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Contact Number</span><span class="pull-right"> :</span></td>
							<td class="col-md-8"><textarea name="msg" id="inputMsg" class="form-control" rows="3" placeholder="Message / html / iframe" required="required"></textarea></td>
						</tr>
						<tr class="row">
							<td class="col-md-4"><span class="pull-left">Country</span><span class="pull-right"> :</span></td>
							<td class="col-md-8">
							</td>
						</tr>
					</tbody>
				</table>
				
				<hr>

				<span align = "center"><h3>Order List</h3></span>
				<hr>
				<div class="row">
					<div class="col-xs- col-sm- col-md- col-lg-">
						
					</div>
				</div>
				<input type="submit" id = "submitform" style="display: none;"></input>
				</form>					

			</div>

			<div class="panel-footer">
				<span class="pull-right"><button type="button" class="btn btn-primary" id="submit_btn">Submit</button></span>
				<div class="clearfix"></div>
			</div>	
				
		</div>

	</div>
</div>
