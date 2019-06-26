<?php
add_filter('get_search_form', function($form) {
    $form = '<form action="'.esc_url(home_url("/")).'" class="search-form mb-20" method="get">
                <input type="text" name="s" class="form-control search-field" id="search" placeholder="'.esc_attr__('Search', 'manohar').'">
                <button type="submit" class="mdi mdi-magnify search-submit"></button>
            </form>';
    return $form;
});