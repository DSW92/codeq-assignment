<section id="page-header" class="page-header">
    <div class="container page-header__container">
        <?php if (get_field('header-heading')) : ?>
            <h1><?php the_field('header-heading'); ?></h1>
        <?php endif; ?>
        <?php if (get_field('header-subtitle')) : ?>
            <h2><?php the_field('header-subtitle'); ?></h2>
        <?php endif; ?>
    </div>
</section>