			</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->

    <!-- jQuery-->
    <script>
        $(document).ready(function() {
            $('.btn-file').on('change', 'input[type="file"]', function() {
                var file = $(this)[0].files;
                var filename = "";
                for (var i = 0; i < file.length; i++) {
                    filename += file[i].name + " , ";
                }
                var target = $(this).data('target');
                $(target).val(filename);
            });
        });
    </script>

    <!-- Bootstrap Core JavaScript 
    <script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script>-->

    <!-- Morris Charts JavaScript 
    <script src="<?= base_url(); ?>asset/js/plugins/morris/raphael.min.js"></script>
    <script src="<?= base_url(); ?>asset/js/plugins/morris/morris.min.js"></script>
    <script src="<?= base_url(); ?>asset/js/plugins/morris/morris-data.js"></script>-->



</body>

</html>
