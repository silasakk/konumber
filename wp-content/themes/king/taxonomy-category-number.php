<?php get_header("king") ?>
    <?php $current_term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') ); ?>


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
    <div class="w-section body-section cat-sec">
        <div class="w-container">
            <?php if($current_term->parent == 0): ?>
            <div class="w-row">
                <?php
                $terms = get_terms('category-number', array(
                    'hide_empty' => 0,
                    'parent' => $current_term->term_id
                ));

                foreach ($terms as $t):?>

                    <div class="w-col w-col-4 col-sub-bg">
                        <div class="sub-cat-list">
                            <a href="<?php echo get_term_link($t) ?>">
                                <?php $image = get_field('cn_icon', $t);
                                if (!empty($image)): ?>
                                    <img  class="ico-sub-list" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                <?php endif; ?>
                                <div class="txt-sub-list"><?php echo $t->name ?></div>
                                <img src="<?php echo get_template_directory_uri() ?>/images/bg-cat.png">
                            </a>
                        </div>
                        <div class="dtl-sub-list">
                            <?php echo get_field('cn_shot_description', $t) ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <?php else: ?>
                <div class="cat-dtl-head"><img src="<?php echo get_template_directory_uri() ?>/images/Rectangle-12.png">
                    <div class="cat-dtl-head-col">
                        <div class="w-row">
                            <div class="w-col w-col-5"><img class="head-cdtail-ico" src="<?php echo  get_template_directory_uri() ?>/images/sb1.png">
                                <div class="head-cdetail-text"><?php echo  $current_term->name ?></div>
                            </div>
                            <div class="w-col w-col-7">
                                <div class="right-top-cdetail">
                                    <div class="dtl-right-cdetail-txt"><?php echo  get_field('cn_shot_description',$current_term) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-row row-content-cdetail">
                    <div class="w-col w-col-6">
                        <div class="thumb-vdo">
                            <a target="_blank" href="https://www.youtube.com/watch?v=Z-qjxO_ZJKM">
                                <img class="thumb-vdo-bg" src="http://img.youtube.com/vi/Z-qjxO_ZJKM/hqdefault.jpg">
                                <img class="thumb-player" src="<?php echo get_template_directory_uri() ?>/images/vdo-player.jpg">
                            </a>
                        </div>
                        <div class="vdo-dtl-panel"><img class="ico-qou" src="<?php echo get_template_directory_uri() ?>/images/ico-qou.png">
                            <div class="vdo-dtl-text"><?php echo  get_field('cn_full_description',$current_term) ?></div>
                        </div>
                    </div>
                    <div class="w-col w-col-6">
                        <div class="text-head-feature-home">เบอร์มงคลแนะนำ</div>
                        <?php
                        $args = array(
                            'post_type' => 'number',
                            'posts_per_page' => 4,
                            'tax_query' => array(
                                'relation' => 'AND',
                                array(
                                    'taxonomy' => 'category-number',
                                    'field'    => 'term_id',
                                    'terms'    => $current_term->term_id
                                )
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
                    </div>
                </div>
            <?php endif ?>

        </div>
    </div>
<?php get_footer("king") ?>