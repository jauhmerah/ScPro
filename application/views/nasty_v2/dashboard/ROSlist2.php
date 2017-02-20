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
					            	<table class="table table-bordered table-striped flip-content">
                                        <thead class="flip-content">
                                            <tr>
                                                <th>#</th>
                                                <th>Client Name</th>
                                                <th>Order Code</th>
                                                <th>Order Date</th>
                                                <th>Sales Person</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php
                                            $n = 0; 
                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    if (($user->pr_id == 8) or ($user->pr_id == 10)){
                                                    $n++;
                                                    ?>
                                                    <tr>
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
                                                            <td class="mt-element-ribbon">
                                                        
                                                                <select class="pr_id form-control"  id='pr_id' name='pr_id'>
                                                            <?php foreach ($lvl as $key) {
                                                                ?>
                                                                

                                                                <option value="<?= $key->pr_id ?>" <?php if($key->pr_id == $user->pr_id){echo " selected ";} ?>> <?= $key->pr_desc; ?></option>
                                                                <?php
                                                            } ?>
                                                            
                                                                </select>
                                                            <div class="clear" style="height: 10px"></div>
                                                                <div class="pull-right" >

                                                                <button type="button" id="button_pr" class="button_pr btn btn-primary btn-circle btn-xs pull-right" style="display: none;">Save</button>
                                                            
                                                            

                                                            </td>
                                                    </tr>
                                                    <?php 
                                                            }
                                                        }
                                                    } ?>

                                        </tbody>



                            </table>
			                    
			                </div>
		            </div>
            </div>

		</div>
	</div>
</div>
<script>
//var num = 1;

var btn = document.getElementsByClassName('button_pr');

// function showButton(){
//   btn.style.display="block";
// }
 $(document).ready(function() {
     $(".pr_id").change(function() {
        
            document.getElementsById("button_pr").style.display ='block';

    });
  });
</script>










