<style media="screen">
    @keyframes blink {
        50% {
            color: transparent
        }
    }

    .loader__dot {
        animation: 1s blink infinite
    }

    .loader__dot:nth-child(2) {
        animation-delay: 250ms
    }

    .loader__dot:nth-child(3) {
        animation-delay: 500ms
    }
</style>
<div class="row">
    <div class="col-md-6">
        <div class="panel border-grey-gallery">
            <div class="panel-heading bg-grey-gallery bg-font-grey-gallery">
                <h3 class="panel-title">Insert Form</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon input-circle-left"><i class="fa fa-slack"></i> Order Code</span>
                            <input type="text" class="form-control input-circle-right" placeholder="NS......" autofocus id="input">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="btn-group btn-group-md btn-block">
                            <button type="button" class="btn btn-primary btn-circle-left" id="search">
                              <i class="fa fa-search" aria-hidden="true"></i> Search
                            </button>
                            <button type="button" class="btn dark btn-circle-right" id="reset">
                              <i class="fa fa-refresh" aria-hidden="true"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div id="img">
            <img src="<?= base_url('assets/nasty/nastylogo.png'); ?>" alt="" class="img-rounded center-block">
        </div>
        <div class="text-center" id="loading" style="display : none;">
            <h1><i class="fa fa-refresh fa-spin" aria-hidden="true"></i> Searching<span class="loader__dot">.</span><span class="loader__dot">.</span><span class="loader__dot">.</span></h1>
        </div>
        <div class="orderDetail">

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#search').click(function(event) {
            var or_id = $('#input').val();
            if (or_id) {
                alert(or_id);
            }else{
                bootbox.alert('Order Must not empty');
                $('#input').focus();
            }
        });
    });
</script>
