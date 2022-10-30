<section id="steps-module" class="steps-module">
    <div class="container steps-module__container">
        <div class="steps-module__picture">
            <?php $image = get_field('steps-picture'); ?>
            <?php if ($image) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </div>
        <?php if( have_rows('module-steps') ): ?>
            <?php while( have_rows('module-steps') ): the_row(); ?>

                <!-- step 1 loop -->
                <?php if( have_rows('step_1') ): ?>
                    <?php while( have_rows('step_1') ): the_row(); 
                        $desc = get_sub_field('description');
                        $num = get_sub_field('number');
                    ?>
                        <div class="single-step steps-module__step-1">
                            <h4><?php echo $desc; ?></h4>
                            <span><?php echo $num; ?></span>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- /step 1 loop -->

                <!-- step 2 loop -->
                <?php if( have_rows('step_2') ): ?>
                    <?php while( have_rows('step_2') ): the_row(); 
                        $desc = get_sub_field('description');
                        $num = get_sub_field('number');
                    ?>
                        <div class="single-step steps-module__step-2">
                            <h4><?php echo $desc; ?></h4>
                            <span><?php echo $num; ?></span>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- /step 2 loop -->

                <!-- step 3 loop -->
                <?php if( have_rows('step_3') ): ?>
                    <?php while( have_rows('step_3') ): the_row(); 
                        $desc = get_sub_field('description');
                        $num = get_sub_field('number');
                    ?>
                        <div class="single-step steps-module__step-3">
                            <h4><?php echo $desc; ?></h4>
                            <span><?php echo $num; ?></span>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- /step 3 loop -->

                <!-- step 4 loop -->
                <?php if( have_rows('step_4') ): ?>
                    <?php while( have_rows('step_4') ): the_row(); 
                        $desc = get_sub_field('description');
                        $num = get_sub_field('number');
                    ?>
                        <div class="single-step steps-module__step-4">
                            <h4><?php echo $desc; ?></h4>
                            <span><?php echo $num; ?></span>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- /step 4 loop -->

                <!-- step 5 loop -->
                <?php if( have_rows('step_5') ): ?>
                    <?php while( have_rows('step_5') ): the_row(); 
                        $desc = get_sub_field('description');
                        $num = get_sub_field('number');
                    ?>
                        <div class="single-step steps-module__step-5">
                            <h4><?php echo $desc; ?></h4>
                            <span><?php echo $num; ?></span>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <!-- /step 5 loop -->

            <?php endwhile; ?>
        <?php endif; ?>

    </div>
</section>