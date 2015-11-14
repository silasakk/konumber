<?php get_header('king') ?>
<div class="w-container">
    <div class="cart-sec">
        <h1 class="h-cart">สั่งซื้อสินค้า</h1>
        <div class="w-row step-cart-list">
            <div class="w-col w-col-4 step-cart-list col-step">
                <div class="step-num"><strong>1</strong>
                </div>
                <div class="step-text">ข้อมูลการส่ง<span>ซื้อ</span>
                </div>
            </div>
            <div class="w-col w-col-4 step-cart-list">
                <div class="step-num active"><strong>2</strong>
                </div>
                <div class="step-text active">วิธีการชำระเงิน</div>
            </div>
            <div class="w-col w-col-4 step-cart-list">
                <div class="step-num"><strong>3</strong>
                </div>
                <div class="step-text">ยืนยันการสั่งซื้อ</div>
            </div>
        </div>
        <div class="label-state">ข้อมูลการชำระเงิน / ช่องทางชำระงิน</div>
        <div class="w-form pay-form">
            <form id="email-form" name="email-form" data-name="Email Form" method="post" action="<?php echo site_url() ?>/wp-admin/admin-post.php">
                <input type="hidden" name="action" value="cart2">
                <div class="w-row">
                    <div class="w-col w-col-3"></div>
                    <div class="w-col w-col-3">
                        <div class="w-radio rd-pay-form">
                            <input checked class="w-radio-input" id="radio" type="radio" name="radio" value="Radio" data-name="Radio">
                            <label class="w-form-label" for="radio">BANKING</label>
                        </div>
                    </div>
                    <div class="w-col w-col-3"></div>
                    <div class="w-col w-col-3"></div>
                </div>
                <div class="w-row row-bank">
                    <div class="w-col w-col-3"></div>
                    <div class="w-col w-col-3"><img src="<?php echo get_template_directory_uri() ?>/images/bank1.png">
                        <div class="bank-text">ชื่อบัญชี : นาย สมศี จิตดีงาม
                            <br>เลขที่บัญชี : xxx-xx-xxx-xxx-x</div>
                    </div>
                    <div class="w-col w-col-3"><img src="<?php echo get_template_directory_uri() ?>/images/bank3.jpg">
                        <div class="bank-text">ชื่อบัญชี : นาย สมศี จิตดีงาม
                            <br>เลขที่บัญชี : xxx-xx-xxx-xxx-x</div>
                    </div>
                    <div class="w-col w-col-3"></div>
                </div>
                <div class="w-row row-bank">
                    <div class="w-col w-col-3"></div>
                    <div class="w-col w-col-3"><img src="<?php echo get_template_directory_uri() ?>/images/bank2.png">
                        <div class="bank-text">ชื่อบัญชี : นาย สมศี จิตดีงาม
                            <br>เลขที่บัญชี : xxx-xx-xxx-xxx-x</div>
                    </div>
                    <div class="w-col w-col-3"><img src="<?php echo get_template_directory_uri() ?>/images/bank4.png">
                        <div class="bank-text">ชื่อบัญชี : นาย สมศี จิตดีงาม
                            <br>เลขที่บัญชี : xxx-xx-xxx-xxx-x</div>
                    </div>
                    <div class="w-col w-col-3"></div>
                </div>
                <div class="w-row frm-row">
                    <div class="w-col w-col-5"></div>
                    <div class="w-col w-col-7">
                        <a class="w-inline-block btn-back-cart" href="<?php echo site_url('cart1') ?>">
                            <div>ย้อนกลับ</div>
                        </a>
                        <button type="submit" class="w-inline-block btn-back-cart btn-cart-next">
                            <div>ดำเนินการต่อ</div>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<?php get_footer('king') ?>
