<?php
if ( ! is_active_sidebar( 'shop_sidebar' ) ) {
    return;
}
?>

<div class="col-md-3 pull-left">
    <div class="sidebar_widget shop_sidebar">
        <?php dynamic_sidebar('shop_sidebar') ?>
    </div>
</div>