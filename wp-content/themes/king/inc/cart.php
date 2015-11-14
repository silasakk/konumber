<?php


add_action( 'wp_ajax_add_cart', 'add_cart' );
add_action( 'wp_ajax_nopriv_add_cart', 'add_cart' );
//add cart
function add_cart() {

    $info = get_info_item($_POST['item_code']);

    if(!isset($_COOKIE['products'])){

        $term = get_the_terms($info[0]->ID, 'provider');
        $image = get_field('pv_images', $term[0]);

        $item = array(

            '0' => array(
                'id' => $info[0]->ID,
                'icon' => $image["url"],
                'name' => $info[0]->post_title,
                'price' => get_field('price',$info[0]->ID)
            )
        );
        $prod = json_encode($item, true);
        setcookie ('products', $prod , time()+2678400, COOKIEPATH, COOKIE_DOMAIN, false);

    }else{



        $prod = $_COOKIE['products'];

        $prod = stripslashes($prod);

        $prod = json_decode($prod,true);

        $key = findKey($prod, 'id', $info[0]->ID);

        if ($key === null) {

            $term = get_the_terms($info[0]->ID, 'provider');
            $image = get_field('pv_images', $term[0]);

            $item = array(
                'id' => $info[0]->ID,
                'icon' => $image["url"],
                'name' => $info[0]->post_title,
                'price' => get_field('price',$info[0]->ID)
            );
            $prod[] = $item;

            $prod = json_encode($prod);

            setcookie ('products', $prod , time()+2678400, COOKIEPATH, COOKIE_DOMAIN, false);

        } else {

            $prod = json_encode(array("error"=>1));

        }



    }

    header('Content-Type: application/json');
    echo $prod;
    exit;

}

add_action( 'wp_ajax_remove_cart', 'remove_cart' );
add_action( 'wp_ajax_nopriv_remove_cart', 'remove_cart' );
//remove cart
function remove_cart() {


    $prod = $_COOKIE['products'];

    $prod = stripslashes($prod);

    $prod = json_decode($prod,true);

    $key = findKey($prod, 'id', $_POST['item_code']);

    unset($prod[$key]);

    $prod = json_encode($prod);

    setcookie ('products', $prod , time()+2678400, COOKIEPATH, COOKIE_DOMAIN, false);

    header('Content-Type: application/json');
    echo $prod;
    exit;

}

add_action( 'wp_ajax_load_cart', 'load_cart' );
add_action( 'wp_ajax_nopriv_load_cart', 'load_cart' );
//load cart
function load_cart() {

    $prod = $_COOKIE['products'];

    $prod = stripslashes($prod);

    $prod = json_decode($prod,true);

    $prod = json_encode($prod);

    header('Content-Type: application/json');
    echo $prod;
    exit;

}

//get info item
function get_info_item($id){
    $id = base64_decode($id);
    $args = array(
        'post_type' => "number",
        'p' => $id
    );

    $query = new WP_Query($args);
    return $query->get_posts();

}

//search duplicate
function findKey(array $array, $wantedKey, $match) {
    foreach ($array as $key => $value){
        if ($value[$wantedKey] == $match) {
            return $key;
        }
    }
}
