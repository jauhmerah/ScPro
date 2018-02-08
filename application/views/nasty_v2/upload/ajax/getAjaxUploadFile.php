<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Upload Attachment</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form method="post" enctype="multipart/form-data" action="<?= site_url('nasty_v2/upload/fileProcess'); ?>">
                    <div class="col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon">Upload File : </span>
                            <input type="file" class="form-control" name="file" placeholder="Upload attachment" required>
                        </div>
                    </div>
                    <input type="hidden" name="key" value="<?= $this->mf->scpro_encrypt('uploadfile'); ?>">
                    <input type="hidden" name="id" value="<?= $id ;?>">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-default btn-block btn-circle">
                            <i class="fa fa-upload" aria-hidden="true"></i> Upload
                        </button>
                    </div>
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    </form>
                </div>
                <div class="help-block">
                    Note : File size must not larger than 10mb. File allowed jpg|png|jpeg|doc|docx|pdf.
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
                                                <td><a target="_blank" href="<?= base_url('assets/uploads/attachment/'.$key->at_url); ?>" ><?= $key->at_title; ?></a></td>
                                                <td>
                                                    <div class="btn-group-sm">
                                                        <a type="button" class="btn btn-default" target="_blank" href="<?= base_url('assets/uploads/attachment/'.$key->at_url); ?>" download title="Download">
                                                            <i class="fa fa-download" aria-hidden="true"></i>
                                                        </a>
                                                        <a type="button" onclick="return delClick();" class="btn red" href="<?= site_url('nasty_v2/upload/delFile?del='.$this->mf->scpro_encrypt($key->at_id)); ?>" title="Delete File">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </a>
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
<script type="text/javascript">
    function delClick() {
        return confirm('Are you sure?');
    }
</script>
