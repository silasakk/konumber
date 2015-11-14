<div class="w-section footer-section">
    <div class="w-container">
        <div class="footer-list">
            <div class="w-row">
                <div class="w-col w-col-4"><img class="footer-logo"
                                                src="<?php echo get_template_directory_uri() ?>/images/logo.png">

                    <div class="webname">kingofnumber.com</div>
                </div>
                <div class="w-col w-col-4">
                    <div class="footer-contact">CALL CENTER | 095-998-9656
                        <br>LINE ID | KINGOFNUMBER
                    </div>
                    <div class="footer-menu">หน้าหลัก | เกี่ยวกับเรา | ร้่านค้า | ติดต่อเรา</div>
                </div>
                <div class="w-col w-col-4"><img class="fbb"
                                                src="<?php echo get_template_directory_uri() ?>/images/fbb.png">
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="txt-cpr">Copyright © 2015 KING OF NUMBER | All rights reserved.</div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/angular.min.js"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/moment.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/pikaday.js"></script>

<?php echo wp_footer() ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/webflow.js"></script>
<script>
    jQuery(".txt-digit").on("keypress", function () {

        jQuery(".txt-digit").eq(parseInt(jQuery(".txt-digit").index($(this))) + 1).focus();
    })
    var picker = new Pikaday({
        field: document.getElementById('datepicker'),
        format: 'YYYY-MM-DD',
        onSelect: function() {
            console.log(this.getMoment().format('YYYY-MM-DD'));
        }
    });
</script>

<!--[if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>