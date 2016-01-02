<footer>
    <nav>
        <?php wp_nav_menu(array('theme_location' => 'footer-nav')); ?>
    </nav>
    <p>&copy;&nbsp;<?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
</footer>
<?php wp_footer(); ?>
</body>
</html>
