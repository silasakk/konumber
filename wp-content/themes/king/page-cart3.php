<?php get_header('king') ?>
<div class="w-container">
    <div class="cart-sec">
        <h1 class="h-cart">สั่งซื้อสินค้า</h1>
        <div class="w-row step-cart-list">
            <div class="w-col w-col-4 step-cart-list col-step">
                <div class="step-num "><strong>1</strong>
                </div>
                <div class="step-text ">ข้อมูลการส่ง<span>ซื้อ</span>
                </div>
            </div>
            <div class="w-col w-col-4 step-cart-list">
                <div class="step-num"><strong>2</strong>
                </div>
                <div class="step-text">วิธีการชำระเงิน</div>
            </div>
            <div class="w-col w-col-4 step-cart-list">
                <div class="step-num active"><strong>3</strong>
                </div>
                <div class="step-text active">ยืนยันการสั่งซื้อ</div>
            </div>
        </div>
        <div class="w-row col-th-mid">
            <div class="w-col w-col-8">
                <div class="text-th">รายการ</div>
            </div>
            <div class="w-col w-col-2">
                <div class="text-th">จำนวน</div>
            </div>
            <div class="w-col w-col-2">
                <div class="text-th">ราคา</div>
            </div>
        </div>

        <?php foreach($order_detail as $value): ?>
        <div class="w-row row-con-mid">
            <div class="w-col w-col-8 col-con-mid">
                <div class="box-feaure-num cart-box">
                    <div class="w-row">
                        <?php
                        $term = get_the_terms($value->product_id, 'provider');
                        $image = get_field('pv_images', $term[0]);
                        ?>
                        <div class="w-col w-col-3"><img src="<?php echo $image["url"] ?>">
                        </div>
                        <div class="w-col w-col-9">
                            <div class="title-feature-num"><?php echo $value->product_name ?></div>
                            <div class="dtl-feature-num">
                                <?php $content = get_info_item($value->product_id); ?>
                                <?php echo ($content[0]->post_content) ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="w-col w-col-2 col-con-mid">
                <div class="text-th">1</div>
            </div>
            <div class="w-col w-col-2 col-con-mid">
                <div class="text-th"><?php echo number_format($value->product_price) ?> บาท</div>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="w-row col-th-mid">
            <div class="w-col w-col-8">
                <div class="text-th">รายการ</div>
            </div>
            <div class="w-col w-col-2">
                <div class="text-th">ยอดที่ต้องชำระ</div>
            </div>
            <div class="w-col w-col-2">

                <div class="text-th"><?php echo number_format($orders[0]->price_total) ?> บาท</div>
            </div>
        </div>
        <div class="cart-order-num">ORDER ID <span class="ordernum-cart"><?php echo $orders[0]->id ?></span>
        </div>
        <div class="label-state">ข้อมูลผู้สั่งซื้อ / ข้อมูลผู้รับสินค้า</div>
        <div class="addr-panel">
            <div class="addr-block">
                <div class="w-row">
                    <div class="w-col w-col-6">
                        <div class="lbl-addr">ชื่อ</div>
                    </div>
                    <div class="w-col w-col-6">
                        <div class="lbl-addr-value"><?php echo $orders[0]->fullname  ?></div>
                    </div>
                </div>
            </div>
            <div class="addr-block">
                <div class="w-row">
                    <div class="w-col w-col-6">
                        <div class="lbl-addr">เบอร์มือถือ</div>
                    </div>
                    <div class="w-col w-col-6">
                        <div class="lbl-addr-value"><?php echo $orders[0]->tel ?></div>
                    </div>
                </div>
            </div>
            <div class="addr-block">
                <div class="w-row">
                    <div class="w-col w-col-6">
                        <div class="lbl-addr">ที่อยู่</div>
                    </div>
                    <div class="w-col w-col-6">
                        <div class="lbl-addr-value"><?php echo $orders[0]->addr ." ". $orders[0]->district . " " . $orders[0]->aumphur ." ". $orders[0]->province ." ". $orders[0]->postcode ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="label-state">ข้อมูลการชำระเงิน / ช่องทางชำระงิน</div>
        <div class="addr-panel">
            <div class="addr-block">
                <div class="w-row">
                    <div class="w-col w-col-6">
                        <div class="lbl-addr">ช่องทางการชำระเงิน</div>
                    </div>
                    <div class="w-col w-col-6">
                        <div class="lbl-addr-value">BANK</div>
                    </div>
                </div>
            </div>
            <div class="addr-block">
                <div class="w-row">
                    <div class="w-col w-col-6">
                        <div class="lbl-addr">ยอดที่ต้องชำระ</div>
                    </div>
                    <div class="w-col w-col-6">
                        <div class="lbl-addr-value"><?php echo number_format($orders[0]->price_total) ?> บาท</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-row frm-row">
            <div class="w-col w-col-5"></div>
            <div class="w-col w-col-7">
                <a class="w-inline-block btn-back-cart" href="<?php echo site_url("cart2") ?>">
                    <div>ย้อนกลับ</div>
                </a>
                <a class="w-inline-block btn-back-cart btn-cart-next" href="<?php echo site_url("") ?>">
                    <div>ดำเนินการต่อ</div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php get_footer('king') ?>
