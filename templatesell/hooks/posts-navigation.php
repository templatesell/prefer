<?php
/**
 * Post Navigation Function
 *
 * @since Prefer 1.0.0
 *
 * @param null
 * @return void
 *
 */
if (!function_exists('prefer_posts_navigation')) :
    function prefer_posts_navigation()
    {
        global $prefer_theme_options;
        $prefer_pagination_option = $prefer_theme_options['prefer-pagination-options'];
        if ('numeric' == $prefer_pagination_option) {
            echo "<div class='pagination'>";
                the_posts_pagination();
            echo "</div>";
        } elseif ('ajax' == $prefer_pagination_option) {
            $page_number = get_query_var('paged');
            if ($page_number == 0) {
                $output_page = 2;
            } else {
                $output_page = $page_number + 1;
            }
            printf(
                '<div class="ajax-pagination text-center"><div class="show-more" data-number="%1$s"><i class="fa fa-refresh"></i>%2$s</div><div id="free-temp-post"></div></div>',
                esc_attr( $output_page ),
                esc_html__( 'View More', 'prefer' )
            );
        } else {
            return false;
        }
    }
endif;
add_action('prefer_action_navigation', 'prefer_posts_navigation', 10);