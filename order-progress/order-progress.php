<?php
// GMTO
function pre_order_status_shortcode() {
    global $product;

    // Get the current product ID
    $product_id = $product->get_id();

    // Check if the product is a pre-order
    $is_pre_order = get_post_meta($product_id, '_is_pre_order', true);
    
    // Get pre-order limit
    $pre_order_limit = get_field('pre_order_limit', $product_id);

    if ($is_pre_order === 'yes') {
        // Count pre-orders
        $pre_order_count = 0;
        $orders = wc_get_orders(array(
            'status' => 'pre-ordered'
        ));
		$ordered_product_id = "";
        foreach ($orders as $order) {
			foreach($order->get_items() as $item_id => $item){
				$ordered_product_id = $item->get_product_id();
				if($ordered_product_id == $product_id){
            		$pre_order_count += $order->get_item_count();				
				}
			}
			
        }

        // Calculate progress
        $progress = ($pre_order_count / $pre_order_limit) * 100;
        $progress = min(100, $progress); // Ensure progress doesn't exceed 100%

        // Create progress bar
        $progress_bar = '<div style = "width:100%;border:1px solid #d2af6e; border-radius:20px; margin:.5rem 0;"> <div class="pre-order-progress-bar" style="width: ' . $progress . '%; height:30px; background-color:#07332f; border-radius:20px;"></div></div>';
        
        // Create status text
        $status_text = $pre_order_count . '/' . $pre_order_limit . ' Pre order';
        if ($pre_order_count >= $pre_order_limit) {
            $status_text .= ' - Product under manufacturing process';
        }
        // Get pre-order date
        $pre_order_date = get_post_meta($product_id, '_pre_order_date', true);
        $remaining_days = ceil((strtotime($pre_order_date) - time()) / (60 * 60 * 24));
        $remaining_days_text = $remaining_days > 0 ? $remaining_days . ' Days Remaining' : 'Last day for Pre-Order';

        return '<p style="font-size:22px; font-weight:bold; margin:0;">' . $remaining_days_text . '</p>' . $progress_bar . '<p style="margin-left:auto; width:fit-content; font-size:24px;font-weight:bold;">' . $progress . '% Funded</p>';
    } else {
        return "";
    }
}
add_shortcode('pre_order_status', 'pre_order_status_shortcode');
