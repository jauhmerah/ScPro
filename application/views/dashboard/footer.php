			</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->

    <!-- jQuery-->

    <script>
        $(document).ready(function() {
            $('.menu').click(function() {
                alert($(this).children('a').attr('id'));
            });
        });
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?= base_url(); ?>asset/js/plugins/morris/raphael.min.js"></script>
    <script src="<?= base_url(); ?>asset/js/plugins/morris/morris.min.js"></script>
    <script src="<?= base_url(); ?>asset/js/plugins/morris/morris-data.js"></script>



</body>

</html>
