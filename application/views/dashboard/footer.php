			</div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->

    <!-- jQuery-->

    <script>
        $(document).ready(function() {
            var parent_page = "<?= $this->parent_page; ?>/";
            $('.menu').click(function() {
                var menu = $(this).children('a').attr('id');
                alert(menu);
                $.when($('.active').attr('class', 'menu')).then($(this).attr('class', 'menu active'));
                $.post(parent_page + "getAjaxWebsitePage", {menu: menu}, function(data) {
                    
                });
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
