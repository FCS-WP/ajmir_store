<?php
    add_action( 'woocommerce_after_shop_loop_item_title', 'add_product_short_description_to_product_loop' );
    function add_product_short_description_to_product_loop(){

        if(!is_shop()){
            return;
        }

        global $product;
        $limit = 13;
        $text = $product->get_short_description();
        if ($text && str_word_count($text, 0) > $limit) {
            $arr = str_word_count($text, 2);
            $pos = array_keys($arr);
            $text = substr($text, 0, $pos[$limit]);
        }

        echo "<div class='short_desc'>" . $text . "</div>";
    }