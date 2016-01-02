<?php while (have_posts()) : the_post(); ?>
    <article>
        <header>
            <h2 class="entry-title"><?php the_title(); ?></h2>
            <span class="updated"><?php echo get_the_date('l, j. F Y'); ?></span>
            <span class="vcard author"><span class="fn" style="display:none;"><?php the_author() ?></span></span>
        </header>
        <div>
            <?php the_content(); ?>
            <footer>
                <p>Kategorie, Tag, Permalink</p>
            </footer>
        </div>
    </article>
<?php endwhile; ?>