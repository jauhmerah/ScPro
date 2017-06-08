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

           .container {
  max-width: 100%;
}
.wrapper {
  white-space: nowrap;
  overflow-x: scroll;
}

.scroll-wrapper {
  width: 100%;
}


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
                /*width: 100%;   */  
                font-size: 10px;     
           }     
     
           .task-body {      
               background-color: #EBEBEB;        
               width: 100%;      
               min-height:40px;      
               clear: both;
               font-size: 14px;      
           }     
           .task-header {        
               background-clip: padding-box;     
               background-color: #343434;        
               border-radius: 2px 2px 0 0;       
               color: white;     
               font-family: "Lato",sans-serif;       
               height: 35px;     
               position: relative;       
           }     
           .task-footer {        
               background-clip: padding-box;     
               background-color: #EBEBEB;        
               border-radius: 0 0 2px 2px;       
               color: gray;      
               height: 23px;     
               position: relative;       
           }     
           .task-no {        
            float:left;      
            padding: 2px;
            font-size: 14px;        
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
               font-size: 14px;      
               font-style: italic;       
           }     
     
           .todo-task > .task-description{       
               font-size: 14px;      
           }







           
</style>


<div class="row">
	<div class="col-md-12">

		<div class="portlet box purple">
			 <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i> 
                </div>                
            </div>

            <div class="portlet-body flip-scroll">

 
                  <div class="row">       
                          <div class="col-md-12">     
                                <div class="portlet box green col-md-4" >
                                     <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-flag"></i>ROS 
                                        </div>

                                    </div>
                                     <div class="portlet-body" style="overflow-y: scroll;height:500px; ">
                                            <div class="row">
                                              <?php
                                            $n = 0;

                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    if ($user->pr_id == 8){
                                                        $orid = $this->my_func->scpro_encrypt($user->or_id);
                                                    $n++ ?>
                                            <div style="opacity: 1;" class="todo-task col-lg-11">
                                                <div class="task-header">
                                                    <div class="task-no"><?php 
                                                            if ($user->or_id) {
                                                                $id = '#'.(120000+$user->or_id);
                                                                echo '<span><strong>'.$id.'</strong></span>';
                                                            } else {
                                                                echo "--Not Set--";
                                                            }
                                                            ?></div>
                                                    <div class="task-type pull-right">
                                                      <?= ucwords($user->cl_country); ?>
                                                        <?php
                                                            $fc = $this->my_flag->flag_code(ucwords($user->cl_country));
                                                            if ($fc != "") {
                                                                ?>
                                                                <img class="flag flag-<?= $fc; ?>"/>
                                                                <?php
                                                            }
                                                            ?>
                                                  </div>
                                                </div>
                                                <div class="task-body">
                                                    <div class="task-title">
                                                    Client :
                                                    <?php 
                                                            $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                                            echo $view;
                                                            ?></div>
                                                    Sales Person :<?php 
                                    $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                    echo $view;
                                    ?>

                                                </div>

                                                <div class="task-footer">
                                                    <div class="task-date">Date: <?php 
                                                                $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                                                echo $view ;
                                                                ?></div>
                                                </div>
                                            </div>


                                                    <?php 
                                                            }   
                                                        }
                                                        if ($n==0){

                                                             ?>
                                                            

                                                          <?php   
                                                        }

                                                     }
                                                    
                                                        ?>





                                            </div>
                                        </div>
                                </div>

                                <div class="portlet box blue col-md-4" >
                                     <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-file"></i>DOC
                                        </div>                
                                    </div>

                                    <div class="portlet-body flip-scroll" style="overflow-y: scroll;height:500px; ">
                                            <div class="row" >

                                                <?php
                                            $n = 0;

                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    if ($user->pr_id == 9){
                                                        $orid = $this->my_func->scpro_encrypt($user->or_id);
                                                    $n++ ?>
                                            <div style="opacity: 1;" class="todo-task col-lg-11">
                                                <div class="task-header">
                                                    <div class="task-no"><?php 
                                                            if ($user->or_id) {
                                                                $id = '#'.(120000+$user->or_id);
                                                                echo '<span><strong>'.$id.'</strong></span>';
                                                            } else {
                                                                echo "--Not Set--";
                                                            }
                                                            ?></div>
                                                    <div class="task-type pull-right">
                                                      <?= ucwords($user->cl_country); ?>
                                                        <?php
                                                            $fc = $this->my_flag->flag_code(ucwords($user->cl_country));
                                                            if ($fc != "") {
                                                                ?>
                                                                <img class="flag flag-<?= $fc; ?>"/>
                                                                <?php
                                                            }
                                                            ?>
                                                  </div>
                                                </div>
                                                <div class="task-body">
                                                    <div class="task-title">
                                                    Client :
                                                    <?php 
                                                            $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                                            echo $view;
                                                            ?></div>
                                                    Sales Person :<?php 
                                    $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                    echo $view;
                                    ?>

                                                </div>

                                                <div class="task-footer">
                                                    <div class="task-date">Date: <?php 
                                                                $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                                                echo $view ;
                                                                ?></div>
                                                </div>
                                            </div>


                                                    <?php 
                                                            }   
                                                        }
                                                        if ($n==0){

                                                             ?>
                                                            <center>-- No Data --</center>

                                                          <?php   
                                                        }

                                                     }
                                                    
                                                        ?>





                                            </div>
                                        </div>
                                </div>

                                <div class="portlet box red col-md-4" >
                                     <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-paper-plane"></i>RTS 
                                        </div>                
                                    </div>
                                    <div class="portlet-body flip-scroll" style="overflow-y: scroll;height:500px; ">
                                            <div class="row">

                                                 <?php
                                            $n = 0;

                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    if ($user->pr_id == 10){
                                                        $orid = $this->my_func->scpro_encrypt($user->or_id);
                                                    $n++ ?>
                                            <div style="opacity: 1;" class="todo-task col-lg-11">
                                                <div class="task-header">
                                                    <div class="task-no"><?php 
                                                            if ($user->or_id) {
                                                                $id = '#'.(120000+$user->or_id);
                                                                echo '<span><strong>'.$id.'</strong></span>';
                                                            } else {
                                                                echo "--Not Set--";
                                                            }
                                                            ?></div>
                                                    <div class="task-type pull-right">
                                                      <?= ucwords($user->cl_country); ?>
                                                        <?php
                                                            $fc = $this->my_flag->flag_code(ucwords($user->cl_country));
                                                            if ($fc != "") {
                                                                ?>
                                                                <img class="flag flag-<?= $fc; ?>"/>
                                                                <?php
                                                            }
                                                            ?>
                                                  </div>
                                                </div>
                                                <div class="task-body">
                                                    <div class="task-title">
                                                    Client :
                                                    <?php 
                                                            $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                                            echo $view;
                                                            ?></div>
                                                    Sales Person :<?php 
                                    $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                    echo $view;
                                    ?>

                                                </div>

                                                <div class="task-footer">
                                                    <div class="task-date">Date: <?php 
                                                                $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                                                echo $view ;
                                                                ?></div>
                                                </div>
                                            </div>


                                                    <?php 
                                                            }   
                                                        }
                                                        if ($n==0){

                                                             ?>
                                                            <center>-- No Data --</center>

                                                          <?php   
                                                        }

                                                     }
                                                    
                                                        ?>



                                            </div>
                                        </div>

                                </div>       
                          </div>      
                </div>        
          
          </div>                        
    </div>

    	</div>
    </div>

<div class="row">
  <div class="col-md-12">

    <div class="portlet box purple">
       <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i> 
                </div>                
            </div>

            <div class="portlet-body flip-scroll">

 
                  <div class="row">       
                          <div class="col-md-12">     
                                <div class="portlet box green col-md-4" >
                                     <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-plane"></i>Shipped 
                                        </div>

                                    </div>
                                     <div class="portlet-body" style="overflow-y: scroll;height:500px; ">
                                            <div class="row">
                                              <?php
                                            $n = 0;

                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    if ($user->pr_id == 11){
                                                        $orid = $this->my_func->scpro_encrypt($user->or_id);
                                                    $n++ ?>
                                            <div style="opacity: 1;" class="todo-task col-lg-11">
                                                <div class="task-header">
                                                    <div class="task-no"><?php 
                                                            if ($user->or_id) {
                                                                $id = '#'.(120000+$user->or_id);
                                                                echo '<span><strong>'.$id.'</strong></span>';
                                                            } else {
                                                                echo "--Not Set--";
                                                            }
                                                            ?></div>
                                                    <div class="task-type pull-right">
                                                      <?= ucwords($user->cl_country); ?>
                                                        <?php
                                                            $fc = $this->my_flag->flag_code(ucwords($user->cl_country));
                                                            if ($fc != "") {
                                                                ?>
                                                                <img class="flag flag-<?= $fc; ?>"/>
                                                                <?php
                                                            }
                                                            ?>
                                                  </div>
                                                </div>
                                                <div class="task-body">
                                                    <div class="task-title">
                                                    Client :
                                                    <?php 
                                                            $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                                            echo $view;
                                                            ?></div>
                                                    Sales Person :<?php 
                                    $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                    echo $view;
                                    ?>

                                                </div>

                                                <div class="task-footer">
                                                    <div class="task-date">Date: <?php 
                                                                $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                                                echo $view ;
                                                                ?></div>
                                                </div>
                                            </div>


                                                    <?php 
                                                            }   
                                                        }
                                                        if ($n==0){

                                                             ?>
                                                            
                                                             <center>-- No Data --</center>
                                                          <?php   
                                                        }

                                                     }
                                                    
                                                        ?>





                                            </div>
                                        </div>
                                </div>

                                <div class="portlet box blue col-md-4" >
                                     <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-truck"></i>Arrived
                                        </div>                
                                    </div>

                                    <div class="portlet-body flip-scroll" style="overflow-y: scroll;height:500px; ">
                                            <div class="row" >

                                                <?php
                                            $n = 0;

                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    if ($user->pr_id == 12){
                                                      if(strtotime('-12 day') < strtotime($user->or_date) ){
                                                        $orid = $this->my_func->scpro_encrypt($user->or_id);
                                                    
                                                    $n++ ?>
                                            <div style="opacity: 1;" class="todo-task col-lg-11">
                                                <div class="task-header">
                                                    <div class="task-no"><?php 
                                                            if ($user->or_id) {
                                                                $id = '#'.(120000+$user->or_id);
                                                                echo '<span><strong>'.$id.'</strong></span>';
                                                            } else {
                                                                echo "--Not Set--";
                                                            }
                                                            ?></div>
                                                    <div class="task-type pull-right">
                                                      <?= ucwords($user->cl_country); ?>
                                                        <?php
                                                            $fc = $this->my_flag->flag_code(ucwords($user->cl_country));
                                                            if ($fc != "") {
                                                                ?>
                                                                <img class="flag flag-<?= $fc; ?>"/>
                                                                <?php
                                                            }
                                                            ?>
                                                  </div>
                                                </div>
                                                <div class="task-body">
                                                    <div class="task-title">
                                                    Client :
                                                    <?php 
                                                            $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                                            echo $view;
                                                            ?></div>
                                                    Sales Person :<?php 
                                    $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                    echo $view;
                                    ?>

                                                </div>

                                                <div class="task-footer">
                                                    <div class="task-date">Date: <?php 
                                                                $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                                                echo $view ;
                                                                ?></div>
                                                </div>
                                            </div>


                                                    <?php 
                                                              }
                                                            }   
                                                        }
                                                        if ($n==0){

                                                             ?>
                                                            <center>-- No Data --</center>

                                                          <?php   
                                                        }

                                                     }
                                                    
                                                        ?>





                                            </div>
                                        </div>
                                </div>

                                <div class="portlet box red col-md-4" >
                                     <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-rotate-right"></i>Return 
                                        </div>                
                                    </div>
                                    <div class="portlet-body flip-scroll" style="overflow-y: scroll;height:500px; ">
                                            <div class="row">

                                                 <?php
                                            $n = 0;

                                            if (sizeof($arr1) != 0) { 
                                                foreach ($arr1 as $user) {
                                                    if ($user->pr_id == 13){
                                                        $orid = $this->my_func->scpro_encrypt($user->or_id);
                                                    $n++ ?>
                                            <div style="opacity: 1;" class="todo-task col-lg-11">
                                                <div class="task-header">
                                                    <div class="task-no"><?php 
                                                            if ($user->or_id) {
                                                                $id = '#'.(120000+$user->or_id);
                                                                echo '<span><strong>'.$id.'</strong></span>';
                                                            } else {
                                                                echo "--Not Set--";
                                                            }
                                                            ?></div>
                                                    <div class="task-type pull-right">
                                                      <?= ucwords($user->cl_country); ?>
                                                        <?php
                                                            $fc = $this->my_flag->flag_code(ucwords($user->cl_country));
                                                            if ($fc != "") {
                                                                ?>
                                                                <img class="flag flag-<?= $fc; ?>"/>
                                                                <?php
                                                            }
                                                            ?>
                                                  </div>
                                                </div>
                                                <div class="task-body">
                                                    <div class="task-title">
                                                    Client :
                                                    <?php 
                                                            $view = ($user->cl_name == null) ? "--Not Set--" : $user->cl_name ;
                                                            echo $view;
                                                            ?></div>
                                                    Sales Person :<?php 
                                    $view = ( $user->us_username == null) ? "--Not Set--" :  $user->us_username ;
                                    echo $view;
                                    ?>

                                                </div>

                                                <div class="task-footer">
                                                    <div class="task-date">Date: <?php 
                                                                $view = ( $user->or_date == null) ? "--Not Set--" :  date_format(date_create($user->or_date) , 'd-M-Y' ) ;
                                                                echo $view ;
                                                                ?></div>
                                                </div>
                                            </div>


                                                    <?php 
                                                            }   
                                                        }
                                                        if ($n==0){

                                                             ?>
                                                            <center>-- No Data --</center>

                                                          <?php   
                                                        }

                                                     }
                                                    
                                                        ?>



                                            </div>
                                        </div>

                                </div>       
                          </div>      
                </div>        
          
          </div>                        
    </div>

      </div>
    </div>



</div>


<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



