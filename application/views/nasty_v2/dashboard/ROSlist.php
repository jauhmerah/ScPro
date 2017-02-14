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
                    <i class="fa fa-user"></i>ROS List 
                </div>                
            </div>

            <div class="portlet-body flip-scroll">
		            <div class="row">
		            		<div class="col-md-12">
					            	<div id="Request" style="width: 111%;">
					            		<div id="div1" class="task-contain" ondrop="drop(event)" ondragover="allowDrop(event)" >

						                        <h3 class="ui-sortable-handle" style="text-align: left;"> <i class="fa fa-circle-o-notch"></i> Request</h3>
						                        <hr>
						                   

						                            <div style="opacity: 1;" class="todo-task" draggable="true" ondragstart="drag(event)" id="drag1">
						                                <div class="task-header">
						                                    <div class="task-no">30</div>
						                                    <div class="task-type">Action</div>
						                                </div>
						                                <div class="task-body">
						                                    <div class="task-title">Meet with technical teams to discuss solution</div>
						                                </div>
						                                <div class="task-footer">
						                                    <div class="task-date">Due: 17/07/2012</div>
						                                </div>
						                            </div>


						                              <div style="opacity: 1;" class="todo-task" draggable="true" ondragstart="drag(event)" id="drag2">
						                                <div class="task-header">
						                                    <div class="task-no">30</div>
						                                    <div class="task-type">Action</div>
						                                </div>
						                                <div class="task-body">
						                                    <div class="task-title">Meet with technical teams to discuss solution</div>
						                                </div>
						                                <div class="task-footer">
						                                    <div class="task-date">Due: 17/07/2012</div>
						                                </div>
						                            </div>

			                        		</div>
			                        	</div>
			                        <div id="Document" style="width: 111%;">
						            	  <div id="div2" class="task-contain" ondrop="drop(event)" ondragover="allowDrop(event)" >
				                                <h3 class="ui-sortable-handle" style="text-align: left;"> <i class="fa fa-file-o"></i> Document</h3>
				                                <hr>
				                        	</div>
				                    </div>

				                    <div id="RTS" style="width: 111%;">
			                        <div id="div3" class="task-contain" ondrop="drop(event)" ondragover="allowDrop(event)" >
			                                <h3 class="ui-sortable-handle" style="text-align: left;"> 
			                                <i class="fa fa-truck"></i> RTS</h3>
			                                <hr>
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

