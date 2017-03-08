<?php 
	if (!isset($mode)) {
		$mode = 0;
	}	
?>
<script>
	function moveTo() {
		return confirm('Are you sure?');
	}
</script>

 <style type="text/css">
            .task-contain{
             background-color: white;
                border-left: 2px solid #D8D8DC;   
                border-right: 2px solid #D8D8DC;
                border-top: 3px solid #D8D8DC;   
                border-bottom: 3px solid #D8D8DC;
                box-shadow: 0 1px 1px 0 rgba(50, 50, 50, 0.75);
                float: left;
                height: 100%;
                margin: 0;
                min-height: 240px;
                padding: 15px;
                text-align: center;
                width: 30%;
            }

                #sprintcontainer{
                margin: 0 auto;
                width: 100%;
                min-height: 100%;
                background-color: transparent;
                border: 0;
            }

            .task-list {
                background-color: white;
                border-left: 2px solid #D8D8DC;   
                border-right: 2px solid #D8D8DC;
                border-top: 3px solid #D8D8DC;   
                border-bottom: 3px solid #D8D8DC;
                box-shadow: 0 1px 1px 0 rgba(50, 50, 50, 0.75);
                float: left;
                height: 100%;
                margin: 0;
                min-height: 240px;
                padding: 15px;
                text-align: center;
                width: 30%;
            }

            .task-list input, .task-list textarea{
                width: 240px;
                margin: 1px 5px;
            }

            .task-list input{
                height: 30px;
            }

            .todo-task{
                margin: 5px;
                padding: 5px;
                 width: 100%;
                 font-size: 10px;
            }

            .task-body {
                background-color: #EBEBEB;   
                width: 100%;
                min-height:40px;
                clear: both;
            }
            .task-header {
                background-clip: padding-box;
                background-color: #343434;
                border-radius: 2px 2px 0 0;
                color: white;
                font-family: "Lato",sans-serif;
                height: 22px;
                position: relative;
            }
            .task-footer {
                background-clip: padding-box;
                background-color: #EBEBEB;
                border-radius: 0 0 2px 2px;
                color: gray;
                height: 22px;
                position: relative;
            }
            .task-no {
             float:left;
             padding: 2px;
            }
            .task-type {
             float:left;
             padding: 2px;
            }
            .task-date {
             float:left;
             padding: 2px;
            }

            .task-list input[type="button"]{
                width: 100px;
                margin: 5px;

            }

            .todo-task > .task-header{
                font-weight: bold;
            }

            .todo-task > .task-date{
                font-size: 10px;
                font-style: italic;
            }

            .todo-task > .task-description{
                font-size: 10px;
            }

</style>


<div class="row">
	<div class="col-md-12">
		<div class="portlet box purple">
			 <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>RTS List 
                </div>                
            </div>

            <div class="portlet-body flip-scroll">
		            <div class="row">
                    <div class="col-md-12">
                     <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">RTS</a></li>
                        <li><a data-toggle="tab" href="#menu1">Shipped</a></li>
                        <li><a data-toggle="tab" href="#menu2">Arrived</a></li>
                        <li><a data-toggle="tab" href="#menu3">Return</a></li>
                      </ul>

                      <div class="tab-content">
                        

                        <div id="home" class="tab-pane fade in active">
                         <div class="col-md-12">
                           <h3>RTS List</h3>
                                   <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Order Code</th>
                                                <th>Order Date</th>
                                                <th>Sales Person</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php
                                            $n = 0;

                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    if ($user->pr_id == 10){
                                                        $orid = $this->my_func->scpro_encrypt($user->or_id);
                                                    $n++;
                                                    ?>

                                                    <tr class="clickable" data-toggle="collapse" id="row<?= $n ?>" data-target=".row<?= $n ?>" onclick="location.href='<?= site_url('nasty_v2/dashboard/page/a111?v=2&view=').$orid; ?>'" style="cursor: pointer">
                                                          <td><?= $n; ?></td>
                                                           <td><?php 
                                                            $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                                            echo $view;
                                                            ?><span class="pull-right">
                                                            <?= ucwords($user->cl_country); ?>
                                                            <?php
                                                            $fc = $this->my_flag->flag_code(ucwords($user->cl_country));
                                                            if ($fc != "") {
                                                                ?>
                                                                <img class="flag flag-<?= $fc; ?>"/>
                                                                <?php
                                                            }
                                                            ?></span></td>
                                                            <td><?php 
                                                            if ($user->or_id) {
                                                                $id = '#'.(120000+$user->or_id);
                                                                echo '<span style = "color : #b706d6;"><strong>'.$id.'</strong></span>';
                                                            } else {
                                                                echo "--Not Set--";
                                                            }
                                                            ?></td>
                                                            <td><?php 
                                                                $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                                                echo $view ;
                                                                ?></td>
                                                            <td><?php 
                                                            $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                                            echo $view;
                                                            ?></td>
                                                            
                                                    </tr>

                        


                                                    <?php 
                                                            }
                                                           
                                                        }
                                                        if ($n==0){

                                                             ?>
                                                              <tr>
                                                                <td colspan="5" style="text-align: center;">--No Data--</td>

                                                            </tr>

                                                          <?php   
                                                        }

                                                     }
                                                    
                                                        ?>
                                                        

                                                       

                                        </tbody>



                            </table>
                            </div>

                        </div>


                        <div id="menu1" class="tab-pane fade active">
                          <div class="col-md-12">
                           <h3>Shipped List</h3>
                              <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Order Code</th>
                                                <th>Order Date</th>
                                                <th>Sales Person</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php
                                            $n = 0;

                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    if ($user->pr_id == 11){
                                                        $orid = $this->my_func->scpro_encrypt($user->or_id);
                                                    $n++;
                                                    ?>

                                                    <tr class="clickable" data-toggle="collapse" id="row<?= $n ?>" data-target=".row<?= $n ?>" onclick="location.href='<?= site_url('nasty_v2/dashboard/page/a111?v=2&view=').$orid; ?>'" style="cursor: pointer">
                                                          <td><?= $n; ?></td>
                                                           <td><?php 
                                                            $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                                            echo $view;
                                                            ?><span class="pull-right">
                                                            <?= ucwords($user->cl_country); ?>
                                                            <?php
                                                            $fc = $this->my_flag->flag_code(ucwords($user->cl_country));
                                                            if ($fc != "") {
                                                                ?>
                                                                <img class="flag flag-<?= $fc; ?>"/>
                                                                <?php
                                                            }
                                                            ?></span></td>
                                                            <td><?php 
                                                            if ($user->or_id) {
                                                                $id = '#'.(120000+$user->or_id);
                                                                echo '<span style = "color : #b706d6;"><strong>'.$id.'</strong></span>';
                                                            } else {
                                                                echo "--Not Set--";
                                                            }
                                                            ?></td>
                                                            <td><?php 
                                                                $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                                                echo $view ;
                                                                ?></td>
                                                            <td><?php 
                                                            $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                                            echo $view;
                                                            ?></td>
                                                            
                                                    </tr>

                        


                                                    <?php 
                                                            }
                                                           
                                                        }
                                                        if ($n==0){

                                                             ?>
                                                              <tr>
                                                                <td colspan="5" style="text-align: center;">--No Data--</td>

                                                            </tr>

                                                          <?php   
                                                        }

                                                     }
                                                    
                                                        ?>
                                                        

                                                       

                                        </tbody>



                            </table>
                            </div>
                          
                        </div>
                        <div id="menu2" class="tab-pane fade">
                          <div class="col-md-12">
                           <h3>Arrived List</h3>
                               <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Order Code</th>
                                                <th>Order Date</th>
                                                <th>Sales Person</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php
                                            $n = 0;

                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    if ($user->pr_id == 12){
                                                        $orid = $this->my_func->scpro_encrypt($user->or_id);
                                                    $n++;
                                                    ?>

                                                    <tr class="clickable" data-toggle="collapse" id="row<?= $n ?>" data-target=".row<?= $n ?>" onclick="location.href='<?= site_url('nasty_v2/dashboard/page/a111?v=2&view=').$orid; ?>'" style="cursor: pointer">
                                                          <td><?= $n; ?></td>
                                                           <td><?php 
                                                            $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                                            echo $view;
                                                            ?><span class="pull-right">
                                                            <?= ucwords($user->cl_country); ?>
                                                            <?php
                                                            $fc = $this->my_flag->flag_code(ucwords($user->cl_country));
                                                            if ($fc != "") {
                                                                ?>
                                                                <img class="flag flag-<?= $fc; ?>"/>
                                                                <?php
                                                            }
                                                            ?></span></td>
                                                            <td><?php 
                                                            if ($user->or_id) {
                                                                $id = '#'.(120000+$user->or_id);
                                                                echo '<span style = "color : #b706d6;"><strong>'.$id.'</strong></span>';
                                                            } else {
                                                                echo "--Not Set--";
                                                            }
                                                            ?></td>
                                                            <td><?php 
                                                                $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                                                echo $view ;
                                                                ?></td>
                                                            <td><?php 
                                                            $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                                            echo $view;
                                                            ?></td>
                                                            
                                                    </tr>

                        


                                                    <?php 
                                                            }
                                                           
                                                        }
                                                        if ($n==0){

                                                             ?>
                                                              <tr>
                                                                <td colspan="5" style="text-align: center;">--No Data--</td>

                                                            </tr>

                                                          <?php   
                                                        }

                                                     }
                                                    
                                                        ?>
                                                        

                                                       

                                        </tbody>



                            </table>
                            </div>
                          
                        </div>
                     
                        <div id="menu3" class="tab-pane fade">
                          <div class="col-md-12">
                           <h3>Return List</h3>
                                <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Order Code</th>
                                                <th>Order Date</th>
                                                <th>Sales Person</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php
                                            $n = 0;

                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    if ($user->pr_id == 13){
                                                        $orid = $this->my_func->scpro_encrypt($user->or_id);
                                                    $n++;
                                                    ?>

                                                    <tr class="clickable" data-toggle="collapse" id="row<?= $n ?>" data-target=".row<?= $n ?>" onclick="location.href='<?= site_url('nasty_v2/dashboard/page/a111?v=2&view=').$orid; ?>'" style="cursor: pointer">
                                                          <td><?= $n; ?></td>
                                                           <td><?php 
                                                            $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                                            echo $view;
                                                            ?><span class="pull-right">
                                                            <?= ucwords($user->cl_country); ?>
                                                            <?php
                                                            $fc = $this->my_flag->flag_code(ucwords($user->cl_country));
                                                            if ($fc != "") {
                                                                ?>
                                                                <img class="flag flag-<?= $fc; ?>"/>
                                                                <?php
                                                            }
                                                            ?></span></td>
                                                            <td><?php 
                                                            if ($user->or_id) {
                                                                $id = '#'.(120000+$user->or_id);
                                                                echo '<span style = "color : #b706d6;"><strong>'.$id.'</strong></span>';
                                                            } else {
                                                                echo "--Not Set--";
                                                            }
                                                            ?></td>
                                                            <td><?php 
                                                                $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                                                echo $view ;
                                                                ?></td>
                                                            <td><?php 
                                                            $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                                            echo $view;
                                                            ?></td>
                                                            
                                                    </tr>

                        


                                                    <?php 
                                                            }
                                                           
                                                        }
                                                        if ($n==0){

                                                             ?>
                                                              <tr>
                                                                <td colspan="5" style="text-align: center;">--No Data--</td>

                                                            </tr>

                                                          <?php   
                                                        }

                                                     }
                                                    
                                                        ?>
                                                        

                                                       

                                        </tbody>



                            </table>   
                            </div>
                          
                        </div>
                        <div id="menu2" class="tab-pane fade">
                          <div class="col-md-12">
                           <h3>Delivered List</h3>
                                <table class="table table-condensed table-striped flip-content">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>Shipping No.</th>
                                            <th>Quantity</th>
                                            <th>Placed On</th>
                                            <th>Shipping To</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                 </table>      
                            </div>
                        </div>
                      </div>



		            	    
            </div>
            </div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script type="text/javascript">
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}






	 var $container = $('.task-container');
    var $task = $('.todo-task');

$task.draggable({
    addClasses: false,
    connectToSortable: ".task-container",
});

$container.droppable({
    accept: ".todo-task"
});


$(".ui-droppable").sortable({
    placeholder: "ui-state-highlight",
    opacity: .5,
    helper: 'original',
    beforeStop: function (event, ui) {
        newItem = ui.item;
    },
    receive: function (event, ui) {
//get task-type and task id.
            console.log($(this).closest('.task-header').html());
            var tasktype = $(this).closest('.task-type').html();
            var taskid = $(this).closest('.task-no').html();

            dropElement = $(this).closest('.ui-droppable').attr('id');
            // console.log($(this).closest('.ui-droppable').attr('id'));

            //save the status and the order of the item.
            if (dropElement == "backlog")
            {
                // save the status of the item
            }
            else if (dropElement == "pending")
            {
                // save the status of the 
            }
            else if (dropElement == "inProgress")
            {
            }
            else if (dropElement == "completed")
            {
            }
    }
}).disableSelection().droppable({
    over: ".ui-droppable",
    activeClass: 'highlight',
    drop: function (event, ui) {
        $(this).addClass("ui-state-highlight");
    }
});


</script>





<script>
	$(document).ready(function() {
		$(".Lorder").click(function() {
			temp = $(this).prop('id');
			if ($("."+temp).is(':visible')) {
				$("."+temp).hide('slow');
			}else{
				$("."+temp).show('slow');
			}			
			//alert("jadi");
		});

		$('#proO').click(function() {
			$("#newOrder").hide('slow');
			$("#proOrder").show('slow');
		});
		$('#newO').click(function() {
			$("#newOrder").show('slow');
			$("#proOrder").hide('slow');
		});

		$(".tekan").click(function() {
			btnID = $(this).prop('id');
			hid = $("."+btnID).val();
			tdRow = $("."+btnID).prop('id');
			$.when($("."+tdRow).html('<i class="fa fa-spinner fa-spin"></i> Loading...')).then(function(){
				$.post('<?= site_url('nasty_v2/dashboard/getAjaxProItem') ?>', {key: hid}, function(data) {
					if (data) {
						$("."+tdRow).html('<span class="label label-success">Done</span>');
					} else {
						$("."+tdRow).html('<span class="label label-warning">Something wrong!!!</span>');
					}					
				});
			});
		});

	});
</script>

