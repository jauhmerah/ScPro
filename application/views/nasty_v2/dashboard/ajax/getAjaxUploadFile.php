<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Upload Attachment</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form method="post" enctype="multipart/form-data" action="">
                    <div class="col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon">Upload File : </span>
                            <input type="file" class="form-control" name="file" placeholder="Upload attachment" required>
                        </div>
                        <div class="help-block">
                            Note : File size must not larger than 20mb.
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-default btn-block btn-circle">
                            <i class="fa fa-upload" aria-hidden="true"></i> Upload
                        </button>
                    </div>
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    </form>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>File Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if ($file) {
                                        foreach ($file as $key) {
                                            ?>
                                            <tr>
                                                <td><?= $key->at_title; ?></td>
                                                <td>
                                                    <div class="btn-group-sm">
                                                        <a type="button" class="btn btn-default">
                                                            <i class="fa fa-download" aria-hidden="true"></i>
                                                        </a>
                                                        <button type="button" class="btn red">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                    <?php }
                                    }else{ ?>
                                        <tr>
                                            <td colspan="2"><p class="text-center">--No File--</p></td>
                                        </tr>
                                    <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
