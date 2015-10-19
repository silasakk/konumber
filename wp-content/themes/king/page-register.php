<?php get_header("king") ?>

   <div class="w-section body-section">
    <div class="w-container">
      <div class="cart-sec">
        <div class="w-row">
          <div class="w-col w-col-6">
            <div class="panel-regis">
              <div class="txt-head-panel">REGISTER</div>
              <div class="w-form">
                <form id="email-form" name="email-form" data-name="Email Form">
                  <input class="w-input txt-frm-k lg-page" id="field-2" type="text" placeholder="FIRSTNAME" name="field-2" required="required" data-name="Field 2">
                  <input class="w-input txt-frm-k lg-page" id="field-2" type="text" placeholder="LASTNAME" name="field-2" required="required" data-name="Field 2">
                  <input class="w-input txt-frm-k lg-page" id="field-2" type="text" placeholder="EMAIL" name="field-2" required="required" data-name="Field 2">
                  <input class="w-input txt-frm-k lg-page" id="field-2" type="text" placeholder="PASSWORD" name="field-2" required="required" data-name="Field 2">
                  <input class="w-input txt-frm-k lg-page" id="field-2" type="text" placeholder="CONFIRM PASSWORD" name="field-2" required="required" data-name="Field 2">
                </form>
                <div class="w-form-done">
                  <p>Thank you! Your submission has been received!</p>
                </div>
                <div class="w-form-fail">
                  <p>Oops! Something went wrong while submitting the form</p>
                </div>
              </div>
              <a class="w-inline-block btn-back-cart btn-cart-next lg-age" href="#">
                <div>REGISTER</div>
              </a>
            </div>
          </div>
          <div class="w-col w-col-6">
            <div class="panel-login">
              <div class="txt-head-panel">SIGN IN</div>
              <div class="w-form">
                <form id="email-form" name="email-form" data-name="Email Form">
                  <input class="w-input txt-frm-k lg-page" id="field-2" type="text" placeholder="EMAIL" name="field-2" required="required" data-name="Field 2">
                  <input class="w-input txt-frm-k lg-page" id="field-2" type="text" placeholder="PASSWORD" name="field-2" required="required" data-name="Field 2">
                </form>
                <div class="w-form-done">
                  <p>Thank you! Your submission has been received!</p>
                </div>
                <div class="w-form-fail">
                  <p>Oops! Something went wrong while submitting the form</p>
                </div>
              </div>
              <a class="w-inline-block btn-back-cart btn-cart-next lg-age" href="#">
                <div>LOGIN</div>
              </a>
              <a class="w-inline-block fb-btn" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/fb-btn.png">
              </a><a class="btn-forgot" href="#">Forgot passsword</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php get_footer("king") ?>