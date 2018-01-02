<?php
    $orid = "#".(120000 + $or_id);
?>
<div class="portlet light portlet-fit ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            <span class="caption-subject bold font-green uppercase"> Timeline Order Code : <?= $orid; ?></span>
            <span class="caption-helper"></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="mt-timeline-2">
            <div class="mt-timeline-line border-grey-steel"></div>
            <ul class="mt-container">
                <?php
                if ($size = sizeof($tl) != 0) {
                    $i = 0;
                    foreach ($tl as $tl2) {
                        $i++;
                        if ($i%2 != 0) { ?>
                            <!-- Timeline Section  -->
                            <li class="mt-item">
                                <div class="mt-timeline-icon border-grey-steel text-center" style="background-color: <?= $tl2->pr_color; ?>; color : #ccc;">
                                        <h3><?= $tl2->pr_icon; ?></h3>
                                </div>
                                <div class="mt-timeline-content">
                                    <div class="mt-content-container border-left-before-dark border-dark" style="background-color: <?= $tl2->pr_color; ?>; color : #ccc;">
                                        <div class="mt-title">
                                            <h2 class="mt-content-title"><?= $tl2->pr_desc ?></h2>
                                        </div>
                                        <div class="mt-author">
                                            <div class="mt-avatar text-center align-top">
                                                <h4 ><i class="fa fa-user" aria-hidden="true"></i></h4>
                                            </div>
                                            <div class="mt-author-name">
                                                <span class="font-white text-uppercase"><?= $tl2->us_username; ?></span>
                                            </div>
                                            <div class="mt-author-notes font-white"><?= date("D - d F Y : g:i A",time($tl2->tl_date)); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!--End Timeline Section  -->
                    <?php }else{ ?>
                            <!-- Timeline Section  -->
                            <li class="mt-item">
                                <div class="mt-timeline-icon text-center" style="background-color: <?= $tl2->pr_color; ?>; color : #ccc;">
                                    <h3><?= $tl2->pr_icon; ?></h3>
                                </div>
                                <div class="mt-timeline-content">
                                    <div class="mt-content-container border-right-before-dark border-dark" style="background-color: <?= $tl2->pr_color; ?>; color : #ccc;">
                                        <div class="mt-title">
                                            <h2 class="mt-content-title"><?= $tl2->pr_desc ?></h2>
                                        </div>
                                        <div class="mt-author">
                                            <div class="mt-avatar text-center align-top">
                                                <h4 ><i class="fa fa-user" aria-hidden="true"></i></h4>
                                            </div>
                                            <div class="mt-author-name">
                                                <span class="font-white text-uppercase"><?= $tl2->us_username; ?></span>
                                            </div>
                                            <div class="mt-author-notes font-white"><?= date("D - d F Y : g:i A",time($tl2->tl_date)); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!--End Timeline Section  -->
                    <?php }
                    }
                }else{
                    echo "No data";
                }
                ?>
            </ul>
        </div>
    </div>
</div>
</div>
<!-- END CONTENT BODY -->
