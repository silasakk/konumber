<?php get_header("king") ?>


    <div class="w-section section-panel-search"><img class="tri-cat-bar-eff"
                                                     src="<?php echo get_template_directory_uri() ?>/images/tri-home.png">

        <div class="text-lbl-head-search">เลือกเบอร์ตามต้องการ</div>
        <div class="section-search">
            <div class="w-container">
                <div class="w-row">
                    <?php
                    $terms = get_terms('category-number', array(
                        'hide_empty' => 0,
                        'parent' => 0
                    ));
                    foreach ($terms as $term):

                        ?>
                        <div class="w-col w-col-2 cat-bar">
                            <a class="w-inline-block cat-bar-ln" href="<?php echo get_term_link($term) ?>">
                                <?php $image = get_field('cn_icon', $term);
                                if (!empty($image)): ?>
                                    <img width="30" src="<?php echo $image['url']; ?>"
                                         alt="<?php echo $image['alt']; ?>">
                                <?php endif; ?>

                                <div class="cat-bar-txt"><?php echo $term->name ?></div>
                            </a>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="w-section body-section">
        <div class="w-container">
            <div class="w-row">
                <div class="w-col w-col-4">
                    <div class="box-search2">
                        <div class="box-search-title">ค้นหาเบอร์ที่ต้องการ</div>
                        <div class="w-form">
                            <form id="email-form-2" name="email-form-2" data-name="Email Form 2">
                                <input class="w-input txt-search2" id="email" type="email" placeholder="กลุ่มเลข"
                                       name="email" data-name="Email" required="required">
                                <select class="w-select txt-search2" id="field" name="field">
                                    <option value="">หมวดหมู่</option>
                                    <option value="First">First Choice</option>
                                    <option value="Second">Second Choice</option>
                                    <option value="Third">Third Choice</option>
                                </select>
                                <select class="w-select txt-search2" id="field" name="field">
                                    <option value="">ผู้ให้บริการ</option>
                                    <option value="First">First Choice</option>
                                    <option value="Second">Second Choice</option>
                                    <option value="Third">Third Choice</option>
                                </select>
                                <select class="w-select txt-search2" id="field" name="field">
                                    <option value="">ราคา</option>
                                    <option value="First">First Choice</option>
                                    <option value="Second">Second Choice</option>
                                    <option value="Third">Third Choice</option>
                                </select>

                                <div class="area-rd">
                                    <div class="w-radio rd-block">
                                        <input class="w-radio-input rd-check" id="radio" type="radio" name="radio"
                                               value="Radio" data-name="Radio">
                                        <label class="w-form-label rd-search2" for="radio">ชอบเลข</label>
                                    </div>
                                    <div class="w-radio rd-block">
                                        <input class="w-radio-input rd-check" id="radio" type="radio" name="radio"
                                               value="Radio" data-name="Radio">
                                        <label class="w-form-label rd-search2" for="radio">ชอบเลข</label>
                                    </div>
                                </div>
                                <div class="area-digit"><a class="digit-btn-sel" href="#">1</a><a class="digit-btn-sel"
                                                                                                  href="#">2</a><a
                                        class="digit-btn-sel" href="#">3</a><a class="digit-btn-sel" href="#">4</a><a
                                        class="digit-btn-sel" href="#">5</a><a class="digit-btn-sel" href="#">6</a><a
                                        class="digit-btn-sel" href="#">7</a><a class="digit-btn-sel" href="#">8</a><a
                                        class="digit-btn-sel" href="#">9</a><a class="digit-btn-sel" href="#">0</a>
                                </div>
                                <input class="w-button submit-searc2" type="submit" data-wait="Please wait...">
                            </form>
                            <div class="w-form-done">
                                <p>Thank you! Your submission has been received!</p>
                            </div>
                            <div class="w-form-fail">
                                <p>Oops! Something went wrong while submitting the form</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-rank">
                        <div class="box-lank-title">ประเภทของเบอร์</div>
                        <ul class="w-list-unstyled">
                            <li class="box-rank-item"><img class="box-rank-img"
                                                           src="<?php echo get_template_directory_uri() ?>/images/mk1.png">

                                <div class="box-rank-name">Bronze King</div>
                            </li>
                            <li class="box-rank-item"><img class="box-rank-img"
                                                           src="<?php echo get_template_directory_uri() ?>/images/mk2.png">

                                <div class="box-rank-name">SILVER King</div>
                            </li>
                            <li class="box-rank-item"><img class="box-rank-img"
                                                           src="<?php echo get_template_directory_uri() ?>/images/mk3.png">

                                <div class="box-rank-name">GOLD King</div>
                            </li>
                            <li class="box-rank-item"><img class="box-rank-img"
                                                           src="<?php echo get_template_directory_uri() ?>/images/mk4.png">

                                <div class="box-rank-name">DIAMON King</div>
                            </li>
                        </ul>
                    </div>
                    <div class="box-rank box-rank-kai">
                        <div class="box-lank-title">ค้นหาจากค่าย</div>
                        <ul class="w-list-unstyled">
                            <?php
                            $terms = get_terms('provider', array(
                                'hide_empty' => 0,
                                'parent' => 0
                            ));
                            foreach ($terms as $term):

                                ?>
                                <li class="box-rank-item">

                                    <a href="<?php echo get_term_link($term) ?>">
                                        <?php $image = get_field('pv_images', $term);
                                        if (!empty($image)): ?>
                                            <img class="box-rank-img" width="58" src="<?php echo $image['url']; ?>"
                                                 alt="<?php echo $image['alt']; ?>">
                                        <?php endif; ?>
                                        <div class="box-rank-name"><?php echo $term->name ?></div>
                                    </a>
                                </li>

                            <?php endforeach; ?>

                        </ul>
                    </div>
                </div>
                <div class="w-col w-col-8">
                    <div class="text-head-feature-home">เบอร์มงคลแนะนำ</div>
                    <?php
                    $args = array(
                        'post_type' => 'number',
                        'meta_query' => array(
                            array(
                                'key' => 'fn_pin',
                                'compare' => 'EXISTS',
                            ),
                        ),
                    );
                    $the_query = new WP_Query($args); ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                        <?php
                        $term = get_the_terms(get_the_id(), 'provider');
                        $image = get_field('pv_images', $term[0]);
                        ?>
                        <div class="box-feaure-num">
                            <div class="w-row">
                                <div class="w-col w-col-3"><img class="img-feature-num"
                                                                src="<?php echo $image['url']; ?>"
                                                                alt="<?php echo $image['alt']; ?>"></div>
                                <div class="w-col w-col-6">
                                    <div class="title-feature-num"><?php echo get_the_title() ?></div>
                                    <div
                                        class="dtl-feature-num"><?php echo mb_substr(strip_tags(get_the_content()), 0, 140, 'UTF-8') ?></div>
                                </div>
                                <div class="w-col w-col-3 col-sm-feature-bb">
                                    <div class="price-box-feaure-num">
                                        <div
                                            class="txt-price-feature"><?php echo number_format(get_field('price', get_the_ID())) ?>
                                            <br><span class="span-hide">บาท</span>
                                        </div>
                                    </div>
                                    <a class="w-inline-block shop-btn" href="#"></a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>




                    <?php wp_reset_postdata(); ?>

                </div>
            </div>
        </div>
    </div>
<?php get_footer("king") ?>