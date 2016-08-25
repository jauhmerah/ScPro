<script>
function myFunction() {
    window.print();
}
</script>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
           <div class="tab-pane active" id="tab_1">
                        <div class="portlet box default">
                            <div class="portlet-title">
                                <div class="caption">
                                    <img src="<?= base_url(); ?>/assets/cover/favicon2.png"> Order List 
                                                                      
                                </div>
                                <span class="pull-right" style="color:red;"><h4>#100000</h4></span> 
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form action="#" class="horizontal-form">
                                <!-- begin table -->
                                <div>
	                                <table class="table table-condensed">             
	                                    <tbody>
	                                       	<tr>
	                                            <td>
	                                            	<div class="form-group">
	                                                    <label class="control-label">Name* :</label>
	                                                    <input type="text" id="name" name="name" class="form-control input-circle" placeholder="Client Name" required>
	                                                </div>
	                                            </td>
	                                            <td>
	                                            	<div class="form-group">
	                                                    <label class="control-label">Company :</label>
	                                                    <input type="text" id="company" name="company" class="form-control input-circle" placeholder="Nasty">
	                                                </div>
	                                            </td>
	                                            <td>
	                                            	<div class="form-group">
	                                                    <label class="control-label">Date Line :</label>
	                                                    <input type="date" id="dateline" name="dateline" class="form-control input-circle">
	                                                </div>
	                                            </td>
                                            </tr>	
                                            <tr>
	                                            <td>
	                                            	<div class="form-group">
	                                                    <label class="control-label">Contact Number* :</label>
	                                                    <input type="text" id="tel" name="tel" class="form-control input-circle" placeholder="Client Number" required>
	                                                </div>
	                                            </td>
	                                            <td>
	                                            	<div class="form-group">
	                                                    <label class="control-label">Country* :</label>
	                                                    <input type="text" id="country" name="country" class="form-control input-circle" placeholder="Country" required>
	                                                </div>
	                                            </td>
	                                            <td>
	                                            	<div class="form-group">
	                                                    <label class="control-label">Order Date :</label>
	                                                    <input type="date" id="orderdate" name="orderdate" class="form-control input-circle">
	                                                </div>
	                                            </td>
	                                        </tr>
	                                        <tr>
	                                        	<td>
	                                        		<div class="form-group">
	                                                    <label class="control-label">Sales Person* :</label>
	                                                    <input type="text" id="salesPerson" name="salesPerson" class="form-control input-circle" placeholder="Jauhmerah" required>
	                                                </div>
	                                        	</td>
	                                        	<td>
	                                        		<div class="form-group">
	                                                    <label class="control-label">Email* :</label>
	                                                    <input type="text" id="email" name="email" class="form-control input-circle" placeholder="jauhmerah@nastyjuice.com" required>
	                                                </div>
	                                        	</td>
	                                        	<td>
	                                        		<div class="form-group">
	                                                    <label class="control-label">Finish Date :</label>
	                                                    <input type="date" id="finishdate" name="finishdate" class="form-control input-circle">
	                                                </div>	                                        		
	                                        	</td>	                                        	
	                                        </tr>
	                                        <tr>
	                                        	<td colspan="2">
	                                        		&nbsp;
	                                        	</td>
	                                        	<td>
	                                        		<div class="form-group">
	                                                    <label class="control-label">Currency :</label>
	                                                    <select class="form-control input-circle">
	                                                        <option value="MYR">MYR</option>
	                                                        <option value="USD">USD</option>
	                                                        <option value="EURO">EURO</option>
	                                                    </select>
	                                                </div>
	                                        	</td>
	                                        </tr>                                       
	                                    </tbody>
	                                </table>
	                            </div>
                                <!-- end begin table -->
                                <h3><i class="fa fa-cogs"></i>Order Note </h3>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover">
	                                    <thead>
	                                        <tr>
	                                            <th>#</th>
	                                            <th>Type</th>
	                                            <th colspan="2"><div align="center">O Mg</div></th>
	                                            <th colspan="2"><div align="center">3 Mg</div></th>
	                                            <th colspan="2"><div align="center">6 Mg</div></th>
	                                            <th><div align="center">QTY</div></th>
	                                            <th><div align="center">UNIT $</div></th>
	                                            <th><div align="center">AMOUNT $</div></th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                       	<tr>
	                                            <td class="col-md-1">1</td>
	                                            <td class="col-md-4">Blackurrant | <strong>Bad Blood</strong> | Red</td>
	                                            <div class="col-md-4">
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            </div><div class="col-md-3">
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            </div>
	                                        </tr>
	                                        <tr>
	                                            <td class="col-md-1">2</td>
	                                            <td class="col-md-4">Manggo | <strong>Fat Boy</strong> | Yellow</td>
	                                            <div class="col-md-4">
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            </div><div class="col-md-3">
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            </div>
	                                        </tr>
	                                        <tr>
	                                            <td class="col-md-1">3</td>
	                                            <td class="col-md-4">Honey Dew | <strong>Devil Teeth</strong> | Orange</td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                        </tr>
	                                        <tr>
	                                            <td class="col-md-1">4</td>
	                                            <td class="col-md-4">Grape | <strong>Asap Grape</strong> | Purple</td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                        </tr>
	                                        <tr>
	                                            <td class="col-md-1">5</td>
	                                            <td class="col-md-4">Blackurrant + L | <strong>Wicked Haze</strong> | Pink</td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                        </tr>
	                                        <tr>
	                                            <td class="col-md-1">6</td>
	                                            <td class="col-md-4">Pineapple | <strong>Slow Blow</strong> | Cyan</td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                            <td class="numeric"><input type="text" class="form-control input-sm"></td>
	                                        </tr>
	                                    </tbody>
	                                </table>
                                </div>
                                
                                <h4 ><i class="fa fa-ship"></i>Shipping Note 
                                    </h4><span class="pull-right">
                                    <div class="mt-checkbox-inline pull-right">
	                                    <label class="mt-checkbox">
	                                        <input type="checkbox" value="0">
		                                		<strong>Worldwide</strong>
	                                        <span></span>
	                                    </label>
	                                    <label class="mt-checkbox">
	                                        <input type="checkbox" value="1">
		                                		<strong>Nationwide</strong>
	                                        <span></span>
	                                    </label>
	                                </div></span>
                                     <div >
		                                <table class="table table-striped table-condensed table-bordered">	                                    
		                                    <tbody>
		                                       	<tr>
	                                            	<th>
	                                            		Shipping Company :
	                                            	</th>
	                                            	<td colspan="4" >
	                                            		<div class="mt-checkbox-inline">
						                                    <label class="mt-checkbox">
						                                        <input type="checkbox" value="DHL">
							                                		DHL
						                                        <span></span>
						                                    </label>
						                                    <label class="mt-checkbox">
						                                        <input type="checkbox" value="ARAMEX">
							                                		ARAMEX
						                                        <span></span>
						                                    </label>
						                                    <label class="mt-checkbox">
						                                        <input type="checkbox" value="EMS">
							                                		EMS
						                                        <span></span>
						                                    </label>
						                                    <label class="mt-checkbox">
						                                        <input type="checkbox" value="">
							                                		 : _________
						                                        <span></span>
						                                    </label>
						                                </div>
	                                            	</td>                                            	
	                                            	<th>
	                                            		Tracking No
	                                            	</th>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
		                                        </tr>
		                                        <tr>
	                                            	<th>
	                                            		Shipping Optional :
	                                            	</th>
	                                            	<td colspan="4" >
	                                            		<div class="mt-checkbox-inline">
						                                    <label class="mt-checkbox">
						                                        <input type="checkbox" value="DHL">
							                                		Shop & Ship
						                                        <span></span>
						                                    </label>
						                                    <label class="mt-checkbox">
						                                        <input type="checkbox" value="ARAMEX">
							                                		Express
						                                        <span></span>
						                                    </label>
						                                    <label class="mt-checkbox">
						                                        <input type="checkbox" value="EMS">
							                                		Buyer Account
						                                        <span></span>
						                                    </label>
						                                </div>
	                                            	</td>
	                                            	<th>
	                                            		Ship Date
	                                            	</th>
	                                            	<td>
	                                            		<input type = "date" class="form-control input-circle">
	                                            	</td>
		                                        </tr>
		                                        <tr>
	                                            	<th>
	                                            		Declare Item :
	                                            	</th>
	                                            	<td colspan="4" >
	                                            		<div class="mt-checkbox-inline">
						                                    <label class="mt-checkbox">
						                                        <input type="checkbox" value="DHL">
							                                		Aromatherapy
						                                        <span></span>
						                                    </label>
						                                    <label class="mt-checkbox">
						                                        <input type="checkbox" value="ARAMEX">
							                                		Beard Oil
						                                        <span></span>
						                                    </label>
						                                    <label class="mt-checkbox">
						                                        <input type="checkbox" value="EMS">
							                                		Cake Flavoring
						                                        <span></span>
						                                    </label>
						                                    <label class="mt-checkbox">
						                                        <input type="checkbox" value="EMS">
							                                		E-Juice
						                                        <span></span>
						                                    </label>
						                                </div>
	                                            	</td>
	                                            	<th>
	                                            		Inv Attach
	                                            	</th>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
		                                        </tr>
		                                        <tr>
	                                            	<th>
	                                            		Declare Price :
	                                            	</th>
	                                            	<td colspan="4">
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
	                                            	<th>
	                                            		MSDS
	                                            	</th>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
		                                        </tr>
		                                        <tr>
	                                            	<th>
	                                            		Batch No Start :
	                                            	</th>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">                                            		
	                                            	</td>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
	                                            	<th>
	                                            		C.O.O
	                                            	</th>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
		                                        </tr>
		                                        <tr>
	                                            	<th>
	                                            		Batch No END :
	                                            	</th>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">                                            		
	                                            	</td>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
	                                            	<th>
	                                            		Small C Box
	                                            	</th>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
		                                        </tr>
		                                        <tr>
	                                            	<th>
	                                            		Batch :
	                                            	</th>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
	                                            	<th>
	                                            		Big C Box
	                                            	</th>
	                                            	<td>
	                                            		<input type = "text" class="form-control input-circle">
	                                            	</td>
		                                        </tr>	                                        
		                                    </tbody>
		                                </table>
		                            </div>                                    
                                </form>
                                <!-- END FORM-->
                                <button type="button" onclick="myFunction();" class="btn btn-primary">Print</button><span class="pull-right" style="color:red;"><h4>#100000</h4></span> 
                            </div>
                        </div>                       
                    </div>
        </div>
</div>