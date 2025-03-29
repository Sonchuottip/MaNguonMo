<?php
/**
 * Template Name: Home
 */

get_header();
?>

<main id="primary">
        
    <?php
        /**
         * Hook - technical_blogging_action_home_banner.
         *
         * @hooked technical_blogging_home_banner_section - 10
         */
        do_action( 'technical_blogging_action_home_banner' );

        /**
         * Hook - technical_blogging_action_featured_topics.
         *
         * @hooked technical_blogging_featured_topics_section - 10
         */
        do_action( 'technical_blogging_action_featured_topics' );

         /**
         * Hook - technical_blogging_action_home_extra.
         *
         * @hooked technical_blogging_home_extra_section - 10
         */
        do_action( 'technical_blogging_action_home_extra' );
    ?>
    
</main>

<?php
get_footer();