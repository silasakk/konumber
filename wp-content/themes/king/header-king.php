<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Fri Oct 16 2015 10:46:50 GMT+0000 (UTC) -->
<html data-wf-site="55a14004bfe460f221651fb8" data-wf-page="55a14004bfe460f221651fb9"
      xmlns="http://www.w3.org/1999/html" ng-app="myApp" >
<head>
    <meta charset="utf-8">
    <title>kingofnumber</title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Webflow">
    <?php wp_head() ?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/webflow.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/pikaday.css">

    <link rel="stylesheet" type="text/css"
          href="<?php echo get_template_directory_uri() ?>/css/kingofnumber.webflow.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/king.css">

    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/modernizr.js"></script>

</head>
<body class="web-body"  ng-cloak>
<div class="w-section head-section" >
    <div class="bar-head" ng-controller="cartController">
        <div class="w-container">
            <div class="sp-call">
                <div class="sp-i"></div>
                <div class="sp-text">CALL CENTER | 095-998-9656</div>
            </div>
            <div class="w-hidden-main w-hidden-medium w-hidden-small sp-nav-mobile"><a class="sp-nav-mobile-a" href="#"></a>
            </div>


            <div class="sp-lang sp-cart" ng-mouseenter="load_cart()">
                <a class="sp-acc-a" ><i class="fa fa-shopping-cart"></i> ตระกร้าสินค้า </a>

                <a class="w-inline-block sp-lang-item" href="#"><img class="lang-item"
                                                                     src="<?php echo get_template_directory_uri() ?>/images/th-th.png">
                </a>
                <a class="w-inline-block sp-lang-item" href="#"><img class="lang-item" width="24"
                                                                     src="<?php echo get_template_directory_uri() ?>/images/en-en.png">
                </a>
                <a class="w-inline-block sp-lang-item" href="#"><img class="lang-item"
                                                                     src="<?php echo get_template_directory_uri() ?>/images/cn-cn.png">
                </a>
                <ul class="sp-acc-a-cart" ng-model="products">
                    <li ng-repeat="product in products">
                       <img src="{{product.icon}}" width="30px;" />  {{product.name}} <div class="cl-cart"  ng-click="removeCart(product,$index)"><i class="fa fa-times"></i></div>
                    </li>


                    <li>
                       <a href="<?php echo site_url("cart1") ?>"><img src="<?php echo get_template_directory_uri() ?>/images/checkout.png" width="30"> CHECKOUT </a>
                    </li>



                </ul>
            </div>

            <?php if ($_COOKIE["user_id"]): $user = get_user($_COOKIE["user_id"]) ?>

                <div class="sp-account">
                    <a class="sp-acc-a" href="่javascript:;"><i class="fa fa-user"></i> <?php echo $user->email ?></a>
                    <ul class="sp-acc-a-sub">
                        <li><a href="#">เปลี่ยนรหัสผ่าน</a></li>
                        <li><a id="user_logout" href="#">ออกจากระบบ</a></li>
                    </ul>
                </div>

            <?php else: ?>
            <div class="sp-account"><a class="sp-acc-a" href="<?php echo site_url("register") ?>">SIGN IN</a><a
                    class="sp-acc-a" href="<?php echo site_url("register") ?>">REGISTER</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="banner-top">
    <div class="w-container"><img class="top-logo" src="<?php echo get_template_directory_uri() ?>/images/logo.png">

        <div class="king-nav-bar"><a class="nav-item" href="<?php echo site_url() ?>">Home</a><a class="nav-item"
                                                                                                 href="<?php echo site_url() ?>/category-number/การงาน">Cateogry</a><a
                class="nav-item" href="#">How To pay</a><a class="nav-item" href="#">Payment</a><a
                class="nav-item nav-item-last" href="<?php echo site_url('contact') ?>">Contact</a>
        </div>
    </div>
    <?php if(is_page('homepage')): ?>
    <div class="search-top">
        <div class="w-container con-search-top">
            <h1 class="head-web">ค้นหาเบอร์ที่คุณต้องการ</h1><img class="space-hr"
                                                                  src="<?php echo get_template_directory_uri() ?>/images/space-hr.png">

            <div class="intro-web">จากสุดยอดเบอร์มงคล จำนวน <span class="span-hl">55,713</span> เบอร์ จาก <span
                    class="span-hl">742</span> ร้านค้า
            </div>
            <div class="digit-search">
                <div class="w-form">
                    <form id="email-form" action="<?php echo site_url() ?>/search_number" method="post"
                          name="email-form" data-name="Email Form">
                        <input class="w-input txt-digit" id="digit[]" type="text" maxlength="1" name="digit[]" size="1"
                               autocomplete="off"
                               data-name="digit[]" maxlength="1">
                        <input class="w-input txt-digit" id="digit[]" type="text" maxlength="1" name="digit[]" size="1"
                               autocomplete="off"
                               data-name="digit[]">
                        <input class="w-input txt-digit" id="digit[]" type="text" maxlength="1" name="digit[]" size="1"
                               autocomplete="off"
                               data-name="digit[]"><img class="space-digit"
                                                        src="<?php echo get_template_directory_uri() ?>/images/space-digit.png">
                        <input class="w-input txt-digit" id="digit[]" type="text" maxlength="1" name="digit[]" size="1"
                               autocomplete="off"
                               data-name="digit[]">
                        <input class="w-input txt-digit" id="digit[]" type="text" maxlength="1" name="digit[]" size="1"
                               autocomplete="off"
                               data-name="digit[]">
                        <input class="w-input txt-digit" id="digit[]" type="text" maxlength="1" name="digit[]" size="1"
                               autocomplete="off"
                               data-name="digit[]"><img class="space-digit"
                                                        src="<?php echo get_template_directory_uri() ?>/images/space-digit.png">
                        <input class="w-input txt-digit" id="digit[]" type="text" maxlength="1" name="digit[]" size="1"
                               autocomplete="off"
                               data-name="digit[]">
                        <input class="w-input txt-digit" id="digit[]" type="text" maxlength="1" name="digit[]" size="1"
                               autocomplete="off"
                               data-name="digit[]">
                        <input class="w-input txt-digit" id="digit[]" type="text" maxlength="1" name="digit[]" size="1"
                               autocomplete="off"
                               data-name="digit[]">
                        <input class="w-input txt-digit" id="digit[]" type="text" maxlength="1" name="digit[]" size="1"
                               autocomplete="off"
                               data-name="digit[]">
                        <button style="border: none;background-color:transparent;z-index: 9" type="submit"
                                class="top-search-btn" href="#" data-ix="fade"></button>
                    </form>

                </div>

            </div>
            <img class="div-iphone" src="<?php echo get_template_directory_uri() ?>/images/iphone.png"
                 data-ix="iphone">

        </div>
        <img class="bg-search-top" src="<?php echo get_template_directory_uri() ?>/images/bg-search-digit.png"
             data-ix="top-20">
    </div>
    <?php endif; ?>
</div>