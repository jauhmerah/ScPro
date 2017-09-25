 <table class="table table-bordered table-striped flip-content" id="dataTables-example"  width="100%">
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

                                           <!--  <td><?= $item->it_id ?>
                                            </td> -->
                                            <td><?= $item->it_name; ?></td>
                                            <td><?= $item->ct_name; ?></td>
                                            <td><?= $item->ni_mg; ?> mg</td>
                                            <td><?= $item->it_qty; ?></td>
                                            
                                         
                                        </tr>
                                       
                                   <?php
                                           }
                                       }
                                        else{
                    
                                        ?>
                                         <td colspan="9"><center>No Data</center></td>
                                    <?php }?>

                        
                                    </tbody>
                                    <?php if (isset($page)) {?>
                            <tfoot>
                                <td colspan="9">
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
                                            <li class="prev <?= $prev; ?>"><a <?php if($prev!="disabled"){ ?>href="<?= site_url('Inventory/page/i2?page='.($page-10)); ?>"<?php } ?> title="Prev" ><i class="fa fa-angle-left"></i></a></li>                                            
                                            <li class="next <?= $next; ?>"><a <?php if($next!="disabled"){ ?>href="<?= site_url('Inventory/page/i2?page='.($page+10)); ?>"<?php } ?> title="Next"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                </td>
                            </tfoot> <?php 
                            } ?>
                                </table>



<script>
    $(document).ready(function() {

        $(".Lorder").click(function() {

            temp = $(this).prop('id');

            temp2 = temp.substring(1, 2);

            temp3="M"+temp2;

            if ($("."+temp).is(':visible')) {
                $("."+temp).hide('slow');
            }else{
                $("."+temp).show('slow');
                $("."+temp3).hide('slow');
            }           
    
        });
        $(".Morder").click(function() {
            temp = $(this).prop('id');

            temp2 = temp.substring(1, 2);

            temp3="L"+temp2;

            // alert(temp3);
    
            if ($("."+temp).is(':visible')) {

                $("."+temp).hide('slow');
            }else{

                $("."+temp).show('slow');
                $("."+temp3).hide('slow');

            }           
    
        });
    });
</script>