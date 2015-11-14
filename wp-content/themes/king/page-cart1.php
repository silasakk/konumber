<?php get_header("king") ?>

<div class="w-container">
    <div class="cart-sec">
        <h1 class="h-cart">สั่งซื้อสินค้า</h1>
        <div class="w-row step-cart-list">
            <div class="w-col w-col-4 step-cart-list col-step">
                <div class="step-num active"><strong>1</strong>
                </div>
                <div class="step-text active">ข้อมูลการส่ง<span>ซื้อ</span>
                </div>
            </div>
            <div class="w-col w-col-4 step-cart-list">
                <div class="step-num"><strong>2</strong>
                </div>
                <div class="step-text">วิธีการชำระเงิน</div>
            </div>
            <div class="w-col w-col-4 step-cart-list">
                <div class="step-num"><strong>3</strong>
                </div>
                <div class="step-text">ยืนยันการสั่งซื้อ</div>
            </div>
        </div>
        <div class="label-state">ข้อมูลผู้สั่งซื้อ / ข้อมูลผู้รับสินค้า</div>
        <div class="frmk-form">
            <div class="w-form">
                <?php $addr = $addr[0] ?>
                <form class="frm-warp" id="email-form" name="email-form" data-name="Email Form" method="post" action="<?php echo site_url() ?>/wp-admin/admin-post.php">
                    <input type="hidden" name="action" value="cart1">
                    <div class="w-row frm-row">
                        <div class="w-col w-col-5">
                            <label class="frm-k lbl">หมายเลขบัตรประชาชน</label>
                        </div>
                        <div class="w-col w-col-7">
                            <input class="w-input txt-frm-k" id="field" type="text" name="card" required="required" value="<?php echo $addr->card ?>">
                        </div>
                    </div>
                    <div class="w-row frm-row">
                        <div class="w-col w-col-5">
                            <label class="frm-k lbl">ชื่อ - นามสกุล</label>
                        </div>
                        <div class="w-col w-col-7">
                            <input class="w-input txt-frm-k" id="field" type="text" name="fullname" required="required" value="<?php echo $addr->fullname ?>">
                        </div>
                    </div>
                    <div class="w-row frm-row">
                        <div class="w-col w-col-5">
                            <label class="frm-k lbl">เบอร์มือถือ</label>
                        </div>
                        <div class="w-col w-col-7">
                            <input class="w-input txt-frm-k" id="field" type="text" name="tel" required="required" value="<?php echo $addr->tel ?>">
                        </div>
                    </div>
                    <div class="w-row frm-row">
                        <div class="w-col w-col-5">
                            <label class="frm-k lbl">วันเกิด</label>
                        </div>
                        <div class="w-col w-col-7">
                            <input  class="w-input txt-frm-k" id="datepicker" type="text" onkeypress="return false" name="birthdate" required="required" value="<?php echo $addr->birthdate ?>">
                        </div>
                    </div>
                    <div class="w-row frm-row">
                        <div class="w-col w-col-5">
                            <label class="frm-k lbl">เพศ</label>
                        </div>
                        <div class="w-col w-col-7">
                            <div class="w-radio rd-k">
                                <input <?php echo ($addr->sex == "male")? "checked" : "" ?> class="w-radio-input" id="male" type="radio" name="sex" value="male" data-name="sex">
                                <label <?php echo ($addr->sex == "female")? "checked" : "" ?> class="w-form-label" for="male">ชาย</label>
                            </div>
                            <div class="w-radio rd-k">
                                <input class="w-radio-input" id="male" type="radio" name="sex" value="female" data-name="sex">
                                <label class="w-form-label" for="male">หญิง</label>
                            </div>
                        </div>
                    </div>
                    <div class="w-row frm-row">
                        <div class="w-col w-col-5">
                            <label class="frm-k lbl">บ้านเลขที่ / ถนน</label>
                        </div>
                        <div class="w-col w-col-7">
                            <input class="w-input txt-frm-k" id="field" type="text" name="addr" required="required" value="<?php echo $addr->addr ?>">
                        </div>
                    </div>
                    <div class="w-row frm-row">
                        <div class="w-col w-col-5">
                            <label class="frm-k lbl">แขวง / ตำบล</label>
                        </div>
                        <div class="w-col w-col-7">
                            <input class="w-input txt-frm-k" id="field" type="text" name="district" required="required" value="<?php echo $addr->district ?>">
                        </div>
                    </div>
                    <div class="w-row frm-row">
                        <div class="w-col w-col-5">
                            <label class="frm-k lbl">เขต / อำเภอ</label>
                        </div>
                        <div class="w-col w-col-7">
                            <input class="w-input txt-frm-k" id="field" type="text" name="aumphur" required="required" value="<?php echo $addr->aumphur ?>">
                        </div>
                    </div>
                    <div class="w-row frm-row">
                        <div class="w-col w-col-5">
                            <label class="frm-k lbl">จังหวัด</label>
                        </div>
                        <div class="w-col w-col-7">
                            <input class="w-input txt-frm-k" id="field" type="text" name="province" required="required" value="<?php echo $addr->province ?>">
                        </div>
                    </div>
                    <div class="w-row frm-row">
                        <div class="w-col w-col-5">
                            <label class="frm-k lbl">รหัสไปรษณีย์</label>
                        </div>
                        <div class="w-col w-col-7">
                            <input class="w-input txt-frm-k" id="field" type="text" name="postcode" required="required" value="<?php echo $addr->postcode ?>">
                        </div>
                    </div>
                    <div class="w-row frm-row">
                        <div class="w-col w-col-5"></div>
                        <div class="w-col w-col-7">
                            <a class="w-inline-block btn-back-cart" href="<?php echo site_url() ?>">
                                <div>เลือกเบอร์เิ่มเติม</div>
                            </a>
                            <button type="submit" class="w-inline-block btn-back-cart btn-cart-next" >
                                <div>ดำเนินการต่อ</div>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php  get_footer('king'); ?>
