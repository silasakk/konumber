<?php
/**
 * king functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package king
 */

if (!function_exists('king_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function king_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on king, use a find and replace
         * to change 'king' to the name of your theme in all the template files.
         */
        load_theme_textdomain('king', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'king'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('king_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }
endif; // king_setup
add_action('after_setup_theme', 'king_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function king_content_width()
{
    $GLOBALS['content_width'] = apply_filters('king_content_width', 640);
}

add_action('after_setup_theme', 'king_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function king_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'king'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'king_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function king_scripts()
{
    //wp_enqueue_style( 'king-style', get_stylesheet_uri() );
    wp_enqueue_script('ajax-main', get_template_directory_uri() . '/js/main.js', array(), '', true);

    wp_localize_script('ajax-main', 'ajax_object', array('ajaxUrl' => admin_url('admin-ajax.php'), 'siteUrl' => site_url()));

    wp_enqueue_script('king-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    wp_enqueue_script('king-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'king_scripts');












//--------------------------------------------------
// REGISTER FUNCTION
//--------------------------------------------------
add_action('admin_post_register', 'prefix_admin_register');
add_action('admin_post_nopriv_register', 'prefix_admin_register');
function prefix_admin_register()
{
    global $wpdb;
    $check_user = $wpdb->get_results("SELECT * from users where email = '" . $_POST["email"] . "' ");
    if (count($check_user)) {
        //Redirect
        set_flashdata(array("message" => "Email นี้มีผู้ใช้แล้ว"));
        wp_redirect(site_url('register?msg=1'));
        exit;
    } else {
        //SQL --------------------------
        $data = array(
            'firstname' => $_POST["firstname"],
            'lastname' => $_POST["lastname"],
            'email' => $_POST["email"],
            'psswd' => md5($_POST["psswd"]),
            'created_at' => date("Y-m-d H:i:s"),

        );
        //INSERT --------------------
        $wpdb->insert("users", $data);
        //Redirect
        set_flashdata(array("message" => "สมัครสมาชิกเรียบร้อยแล้ว กรุณาเข้าสู่ระบบ"));
        wp_redirect(site_url('register'));
        exit;
    }
}

//--------------------------------------------------
// Login FUNCTION
//--------------------------------------------------
add_action('admin_post_login', 'prefix_admin_login');
add_action('admin_post_nopriv_login', 'prefix_admin_login');
function prefix_admin_login()
{
    global $wpdb;
    $check_user = $wpdb->get_results("SELECT * from users where email = '" . $_POST["email"] . "' and psswd = '" . md5($_POST["psswd"]) . "' ");
    if (count($check_user)) {

        //login success Redirect
        if (!isset($_COOKIE["user_id"])) {
            setcookie('user_id', $check_user[0]->id, time() + 2678400, COOKIEPATH, COOKIE_DOMAIN, false);
        } else {
            $_COOKIE["user_id"] = $check_user[0]->id;
        }
        wp_redirect(site_url());
        exit;
    } else {
        //login fail Redirect
        set_flashdata(array("message" => "อีเมล์หรือพาสเวิร์ดไม่ถูกต้อง"));
        wp_redirect(site_url('register'));
        exit;
    }
}

add_action('wp_ajax_user_logout', 'user_logout');
add_action('wp_ajax_nopriv_user_logout', 'user_logout');
//logout
function user_logout()
{

    setcookie('user_id', '', time() - 300, COOKIEPATH, COOKIE_DOMAIN, false);
    return 1;
    die;
    // Handle request then generate response using WP_Ajax_Response
}

// get user
function get_user($user_id)
{
    global $wpdb;
    $check_user = $wpdb->get_results("SELECT * from users where id = '" . $user_id . "' ");
    return $check_user[0];
}

// block page
function block_page($query)
{
    if ($query->is_page('register')) {
        if ($_COOKIE["user_id"]) {
            wp_redirect(site_url());
            exit;

        }

    }
    if($query->is_page('cart1') || $query->is_page('cart2')){

        if(!$_COOKIE["user_id"]){
            set_flashdata(array("message" => "กรุณา \"เข้าสู่ระบบ\" หรือ \"สมัครสมาชิก \"ก่อนสั่งซื้อ"));
            wp_redirect(site_url('register'));
            exit;
        }
    }



}
add_action('pre_get_posts', 'block_page');


// get addr
function get_addr($query)
{
    global $wpdb;
    if ($query->is_page('cart1')) {
        if ($_COOKIE["user_id"]) {

            $addr = $wpdb->get_results("SELECT * FROM address WHERE user_id = '{$_COOKIE["user_id"]}' ");
            $query->set('addr', $addr);


        }
    }
}
add_action('pre_get_posts', 'get_addr');

// get info cart3
function get_info_cart3($query)
{
    global $wpdb;
    if ($query->is_page('cart3')) {
        if ($_COOKIE["user_id"]) {

            $addr = $wpdb->get_results("SELECT * FROM address WHERE user_id = '{$_COOKIE["user_id"]}' ");
            $query->set('addr', $addr);

            $order = $wpdb->get_results("SELECT * from orders where id = '{$_GET["order"]}' ");
            $query->set('orders', $order);

            $order_detail = $wpdb->get_results("SELECT * from order_details where order_id = '{$_GET["order"]}' ");
            $query->set('order_detail', $order_detail);

        }
    }
}
add_action('pre_get_posts', 'get_info_cart3');


//--------------------------------------------------
// CART 1 save Address
//--------------------------------------------------
add_action('admin_post_cart1', 'cart1');
add_action('admin_post_nopriv_cart1', 'cart1');
function cart1()
{
    global $wpdb;
    $check_user = $wpdb->get_results("SELECT * from address where user_id = '{$_COOKIE["user_id"]}' ");
    if (count($check_user)) {

        $data = array(

            'card' => $_POST["card"],
            'tel' => $_POST["tel"],
            'fullname' => $_POST["fullname"],
            'birthdate' => $_POST["birthdate"],
            'sex' => $_POST["sex"],
            'addr' => $_POST["addr"],
            'district' => $_POST["district"],
            'aumphur' => $_POST["aumphur"],
            'province' => $_POST["province"],
            'postcode' => $_POST["postcode"],

        );
        $wpdb->update('address', $data, array('id' => $check_user[0]->id), '', array('%d'));


    } else {

        $data = array(
            'user_id' => $_COOKIE["user_id"],
            'card' => $_POST["card"],
            'tel' => $_POST["tel"],
            'fullname' => $_POST["fullname"],
            'birthdate' => $_POST["birthdate"],
            'sex' => $_POST["sex"],
            'addr' => $_POST["addr"],
            'district' => $_POST["district"],
            'aumphur' => $_POST["aumphur"],
            'province' => $_POST["province"],
            'postcode' => $_POST["postcode"],
            'created_at' => date("Y-m-d H:i:s")

        );

        $wpdb->insert("address", $data);


    }


    wp_redirect(site_url('cart2'));
    exit;
}

//--------------------------------------------------
// CART 2 save payment medthod
//--------------------------------------------------
add_action('admin_post_cart2', 'cart2');
add_action('admin_post_nopriv_cart2', 'cart2');
function cart2()
{

    global $wpdb;
    //sumprice
    $price_total = array();

    $prod = $_COOKIE['products'];

    $prod = stripslashes($prod);

    $prod = json_decode($prod, true);
    foreach ($prod as $val) {
        $price_total[] = $val["price"];
    }
    $price_total = array_sum($price_total);

    //insert order
    $check_user = $wpdb->get_results("SELECT * from address where user_id = '{$_COOKIE["user_id"]}' ");


    $data = array(
        'user_id' => $_COOKIE["user_id"],
        'card' => $check_user[0]->card,
        'tel' => $check_user[0]->tel,
        'fullname' => $check_user[0]->fullname,
        'birthdate' => $check_user[0]->birthdate,
        'sex' => $check_user[0]->sex,
        'addr' => $check_user[0]->addr,
        'district' => $check_user[0]->district,
        'aumphur' => $check_user[0]->aumphur,
        'province' => $check_user[0]->province,
        'postcode' => $check_user[0]->postcode,
        'price_total' => $price_total,
        'payment_medthod' => "bank",

        'created_at' => date("Y-m-d H:i:s")

    );

    $wpdb->insert("orders", $data);


    //insert order detail
    $order_id = $wpdb->insert_id;
    foreach ($prod as $val) {
        $data = array(
            'order_id' => $order_id,
            'product_id' => $val["id"],
            'product_name' => $val["name"],
            'product_price' => $val["price"],
            'created_at' => date("Y-m-d H:i:s")

        );
        $wpdb->insert("order_details", $data);
    }

    wp_redirect(site_url('cart3?order=' . $order_id));
    exit;

}




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Session
 */
require get_template_directory() . '/inc/session.php';

/**
 * Load Cart
 */
require get_template_directory() . '/inc/cart.php';
