<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
    <span class="updated"><?php echo get_the_date('l, j. F Y'); ?></span>
    <span class="vcard author"><span class="fn" style="display:none;"><?php the_author() ?></span></span>
</article>