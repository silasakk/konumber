<?php get_header("king") ?>

    <div class="w-section body-section">
        <div class="w-container">
            <div class="cart-sec">
                <div class="w-row">
                    <?php $msg = flashdata('message'); ?>
                    <?php if ($msg): ?>
                        <div class="auth-msg"><?php echo $msg ?></div>
                    <?php endif; ?>
                    <div class="w-col w-col-6">
                        <div class="panel-regis">
                            <div class="txt-head-panel">REGISTER</div>

                            <div class="w-form">

                                <form action="<?php echo site_url() ?>/wp-admin/admin-post.php" method="post"
                                      id="email-form" name="email-form" data-name="Email Form">
                                    <input autocomplete="off" type="hidden" name="action" value="register">
                                    <input autocomplete="off" class="w-input txt-frm-k lg-page" id="firstname"
                                           type="text" placeholder="FIRSTNAME" name="firstname" required="required">
                                    <input autocomplete="off" class="w-input txt-frm-k lg-page" id="lastname"
                                           type="text" placeholder="LASTNAME" name="lastname" required="required">
                                    <input autocomplete="off" class="w-input txt-frm-k lg-page" id="email" type="text"
                                           placeholder="EMAIL" name="email" required="required">
                                    <input autocomplete="off" class="w-input txt-frm-k lg-page" id="psswd" type="password"
                                           placeholder="PASSWORD" name="psswd" required="required">
                                    <input autocomplete="off" class="w-input txt-frm-k lg-page" id="con_psswd"
                                           type="password" placeholder="CONFIRM PASSWORD" name="con_psswd"
                                           required="required">
                                    <button class="w-inline-block btn-back-cart btn-cart-next lg-age" type="submit">
                                        <div>REGISTER</div>
                                    </button>
                                </form>
                                <div class="w-form-done">
                                    <p>Thank you! Your submission has been received!</p>
                                </div>
                                <div class="w-form-fail">
                                    <p>Oops! Something went wrong while submitting the form</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="w-col w-col-6">
                        <div class="panel-login">
                            <div class="txt-head-panel">SIGN IN</div>
                            <div class="w-form">


                                <form id="email-form" name="email-form" data-name="Email Form"
                                      action="<?php echo site_url() ?>/wp-admin/admin-post.php" method="post">
                                    <input autocomplete="off" type="hidden" name="action" value="login">
                                    <input autocomplete="off" class="w-input txt-frm-k lg-page" id="email" type="email"
                                           placeholder="EMAIL" name="email" required="required" data-name="Field 2">
                                    <input autocomplete="off" class="w-input txt-frm-k lg-page" id="psswd" type="password"
                                           placeholder="PASSWORD" name="psswd" required="required" data-name="Field 2">
                                    <button class="w-inline-block btn-back-cart btn-cart-next lg-age" type="submit">
                                        <div>LOGIN</div>
                                    </button>
                                </form>
                                <div class="w-form-done">
                                    <p>Thank you! Your submission has been received!</p>
                                </div>
                                <div class="w-form-fail">
                                    <p>Oops! Something went wrong while submitting the form</p>
                                </div>
                            </div>

                            <a class="w-inline-block fb-btn" href="#">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/fb-btn.png">
                            </a>

                            <a class="btn-forgot" href="#">Forgot passsword</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer("king") ?>