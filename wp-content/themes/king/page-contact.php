<?php get_header("king") ?>

<div class="w-container">
    <h1>Contact Us</h1>
    <div class="w-row">
        <div class="w-col w-col-sm-12">
            <div id="contact-map" style="width: 100%;height: 400px; margin-bottom: 60px;border: 2px solid #5B57FF;"></div>
            <script>
                var map;
                var infowindow = null;
                function initMap() {
                    var mlat = '<?php echo get_field('lat') ?>';
                    var mlng = '<?php echo get_field('lng') ?>';
                    map = new google.maps.Map(document.getElementById('contact-map'), {
                        center: {lat: parseFloat(mlat), lng: parseFloat(mlng)},
                        zoom: 12
                    });


                    var beachMarker = new google.maps.Marker({
                        position: {lat: parseFloat(mlat), lng: parseFloat(mlng)},
                        map: map
                    });

                    var contentString = '<div id="content">' +
                        '<div id="siteNotice">' +
                        '</div>' +
                        '<div class="content-on-map">' +
                        '<p class="company"><span class="name">บริษัท คิง ออฟ นัมเบอร์ จำกัด</span></p>' +
                        '</div>' +
                        '</div>';


                    google.maps.event.addListener(beachMarker, 'click', function () {
                        if (infowindow) {
                            infowindow.close();
                        }
                        infowindow = new google.maps.InfoWindow({
                            content: contentString
                        });
                        infowindow.open(map, beachMarker);
                    });
                }

            </script>
        </div>

    </div>
    <div class="cart-sec">
        <div class="w-row">
            <div class="w-col w-col w-col-6">
                <div class="con-info">
                    <img class="top-logo" src="<?php echo get_template_directory_uri() ?>/images/logo.png">
                    <br><br>
                    <h4>บริษัท คิง ออฟ นัมเบอร์ จำกัด</h4>
                    <div class="hh-lbl">Tel :</div>
                    <div class="hh-lbl2"><?php echo get_field('contact-tel') ?></div>
                    <div class="hh-lbl">Address :</div>
                    <div class="hh-lbl2"><?php echo get_field('contact-address') ?></div>
                </div>
            </div>
            <div class="w-col w-col w-col-6">
                <?php echo do_shortcode('[contact-form-7 id="74" title="Contact form 1"]') ?>
            </div>

        </div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAie0L_KUaGbOBd7DTBEVlmytqsCo16m1I&callback=initMap"
        async defer></script>
<?php  get_footer('king'); ?>
