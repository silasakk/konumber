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
    <div class="w-section result-section">
        <div class="w-container">
            <h1 class="re-head-top">ผลการทำนายเบอร์</h1>
            <div class="digit-search">
                <div class="w-form">
                    <form id="email-form" name="email-form" data-name="Email Form">
                        <input class="w-input txt-digit" id="digit[]" value="<?php echo $_POST['digit'][0] ?>" type="email" placeholder="0" name="digit[]" data-name="digit[]" maxlength="1">
                        <input class="w-input txt-digit" id="digit[]" value="<?php echo $_POST['digit'][1] ?>" type="email" placeholder="8" name="digit[]" data-name="digit[]">
                        <input class="w-input txt-digit" id="digit[]" value="<?php echo $_POST['digit'][2] ?>" type="email" placeholder="2" name="digit[]" data-name="digit[]"><img class="space-digit" src="<?php echo get_template_directory_uri() ?>/images/space-digit.png">
                        <input class="w-input txt-digit" id="digit[]" value="<?php echo $_POST['digit'][3] ?>" type="email" placeholder="6" name="digit[]" data-name="digit[]">
                        <input class="w-input txt-digit" id="digit[]" value="<?php echo $_POST['digit'][4] ?>" type="email" placeholder="3" name="digit[]" data-name="digit[]">
                        <input class="w-input txt-digit" id="digit[]" value="<?php echo $_POST['digit'][5] ?>" type="email" placeholder="4" name="digit[]" data-name="digit[]"><img class="space-digit" src="<?php echo get_template_directory_uri() ?>/images/space-digit.png">
                        <input class="w-input txt-digit" id="digit[]" value="<?php echo $_POST['digit'][6] ?>" type="email" placeholder="3" name="digit[]" data-name="digit[]">
                        <input class="w-input txt-digit" id="digit[]" value="<?php echo $_POST['digit'][7] ?>" type="email" placeholder="6" name="digit[]" data-name="digit[]">
                        <input class="w-input txt-digit" id="digit[]" value="<?php echo $_POST['digit'][8] ?>" type="email" placeholder="9" name="digit[]" data-name="digit[]">
                        <input class="w-input txt-digit" id="digit[]" value="<?php echo $_POST['digit'][9] ?>" type="email" placeholder="8" name="digit[]" data-name="digit[]">
                    </form>

                </div>
            </div>

            <?php
            $numd = array();
            $temp ="";
            ;foreach($_POST['digit'] as $key => $value){
                $temp .= $value;


                if($key % 2){
                    $numd[] = $temp;
                    $temp = "";
                }
            }
            $numd = array_unique($numd);


            ?>

            <div>
                <?php foreach($numd as $value): ?>

                    <?php
                    $args = array(
                        'post_type' => 'mean',
                        's' => trim($value)

                    );
                    $the_query = new WP_Query( $args ); ?>

                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php $t = $terms = get_the_terms( get_the_ID(), 'mean-point' ); ?>

                        <div class="w-row row-re-list">
                            <div class="w-col w-col-3">
                                <div class="re-digit-bk">
                                    <?php

                                        $point = "";
                                        if($t[0]->slug == "good")
                                            $point = "green";

                                        if($t[0]->slug == "bad")
                                            $point = "red"

                                    ?>
                                    <div class="digit-bk-num <?php echo $point  ?>"><?php echo get_the_title() ?></div>
                                </div>
                            </div>
                            <div class="w-col w-col-9">
                                <div class="re-panel-txt">
                                    <div class="title-re-page-box"></div>
                                    <div class="dtl-re-page-box">
                                        <?php echo mb_substr(get_the_content(),0,300) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>


                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php get_footer("king") ?>