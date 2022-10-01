<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

/**
 *
 * Blog Post Widget .
 *
 */
class Bizino_Blog_Post extends Widget_Base
{

    public function get_name()
    {
        return 'bizinoblogpost';
    }

    public function get_title()
    {
        return __('Blog Post', 'bizino');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['bizino'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'blog_post_section',
            [
                'label' => __('Blog Post', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'blog_style',
            [
                'label' => __('Blog Style', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Style One', 'bizino'),
                    '2' => __('Style Two', 'bizino'),
                    '3' => __('Style Three', 'bizino'),
                    '4' => __('Style Four', 'bizino'),
                ],
            ]
        );

        $this->add_control(
            'blog_post_count',
            [
                'label' => __('No of Post to show', 'bizino'),
                'type' => Controls_Manager::TEXT,
                'default' => __('4', 'bizino')
            ]
        );

        $this->add_control(
            'title_count',
            [
                'label' => __('Title Length', 'bizino'),
                'type' => Controls_Manager::TEXT,
                'default' => __('5', 'bizino'),
            ]
        );

        $this->add_control(
            'excerpt_count',
            [
                'label' => __('Excerpt Length', 'bizino'),
                'type' => Controls_Manager::TEXT,
                'default' => __('16', 'bizino'),
            ]
        );

        $this->add_control(
            'blog_post_order',
            [
                'label' => __('Order', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => __('ASC', 'bizino'),
                    'DESC' => __('DESC', 'bizino'),
                ],
                'default' => 'DESC'
            ]
        );

        $this->add_control(
            'blog_post_order_by',
            [
                'label' => __('Order By', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ID' => __('ID', 'bizino'),
                    'author' => __('Author', 'bizino'),
                    'title' => __('Title', 'bizino'),
                    'date' => __('Date', 'bizino'),
                    'rand' => __('Random', 'bizino'),
                ],
                'default' => 'ID'
            ]
        );

        $this->add_control(
            'exclude_cats',
            [
                'label' => __('Exclude Categories', 'bizino'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->bizino_get_categories(),
            ]
        );

        $this->add_control(
            'exclude_tags',
            [
                'label' => __('Exclude Tags', 'bizino'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->bizino_get_tags(),
            ]
        );

        $this->add_control(
            'exclude_post_id',
            [
                'label' => __('Exclude Post', 'bizino'),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->bizino_post_id(),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'slider_control_section',
            [
                'label' => __('Slider Control', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'slide_to_show',
            [
                'label' => __('Slide To Show', 'bizino'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 3,
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'post_title_style_section',
            [
                'label' => __('Title', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'post_title_color',
            [
                'label' => __('Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-title a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'post_title_color_hover',
            [
                'label' => __('Title Color Hover', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-title a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'post_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .blog-title',
            ]
        );

        $this->add_responsive_control(
            'post_title_margin',
            [
                'label' => __('Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .blog-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'post_title_padding',
            [
                'label' => __('Title Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .blog-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'meta_style',
            [
                'label' => __('Meta', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'meta_color',
            [
                'label' => __('Meta Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .meta-box a,{{WRAPPER}} .blog-steped .blog-date' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typography',
                'label' => __('Meta Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .meta-box a,{{WRAPPER}} .blog-steped .blog-date',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'excerpt_style',
            [
                'label' => __('Excerpt', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'excerpt_color',
            [
                'label' => __('Excerpt Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-content .blog-text' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'excerpt_typography',
                'label' => __('Excerpt Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .blog-content .blog-text',
            ]
        );
        $this->end_controls_section();
    }

    public function bizino_get_categories()
    {
        $cats = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach ($cats as $singlecat) {
            $catarr[$singlecat->term_id] = __($singlecat->name, 'bizino');
        }

        return $catarr;
    }

    public function bizino_get_tags()
    {
        $cats = get_terms(array(
            'taxonomy' => 'post_tag',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach ($cats as $singlecat) {
            $catarr[$singlecat->term_id] = __($singlecat->name, 'bizino');
        }

        return $catarr;
    }

    // Get Specific Post
    public function bizino_post_id()
    {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
        );

        $bizino_post = new WP_Query($args);

        $postarray = [];

        while ($bizino_post->have_posts()) {
            $bizino_post->the_post();
            $postarray[get_the_Id()] = get_the_title();
        }
        wp_reset_postdata();
        return $postarray;
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $exclude_post = $settings['exclude_post_id'];

        if (!empty($settings['exclude_cats']) && empty($settings['exclude_tags']) && empty($settings['exclude_post_id'])) {
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => esc_attr($settings['blog_post_count']),
                'order' => esc_attr($settings['blog_post_order']),
                'orderby' => esc_attr($settings['blog_post_order_by']),
                'ignore_sticky_posts' => true,
                'category__not_in' => $settings['exclude_cats']
            );
        } elseif (!empty($settings['exclude_cats']) && !empty($settings['exclude_tags']) && empty($settings['exclude_post_id'])) {
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => esc_attr($settings['blog_post_count']),
                'order' => esc_attr($settings['blog_post_order']),
                'orderby' => esc_attr($settings['blog_post_order_by']),
                'ignore_sticky_posts' => true,
                'category__not_in' => $settings['exclude_cats'],
                'tag__not_in' => $settings['exclude_tags']
            );
        } elseif (!empty($settings['exclude_cats']) && !empty($settings['exclude_tags']) && !empty($settings['exclude_post_id'])) {
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => esc_attr($settings['blog_post_count']),
                'order' => esc_attr($settings['blog_post_order']),
                'orderby' => esc_attr($settings['blog_post_order_by']),
                'ignore_sticky_posts' => true,
                'category__not_in' => $settings['exclude_cats'],
                'tag__not_in' => $settings['exclude_tags'],
                'post__not_in' => $exclude_post
            );
        } elseif (!empty($settings['exclude_cats']) && empty($settings['exclude_tags']) && !empty($settings['exclude_post_id'])) {
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => esc_attr($settings['blog_post_count']),
                'order' => esc_attr($settings['blog_post_order']),
                'orderby' => esc_attr($settings['blog_post_order_by']),
                'ignore_sticky_posts' => true,
                'category__not_in' => $settings['exclude_cats'],
                'post__not_in' => $exclude_post
            );
        } elseif (empty($settings['exclude_cats']) && !empty($settings['exclude_tags']) && !empty($settings['exclude_post_id'])) {
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => esc_attr($settings['blog_post_count']),
                'order' => esc_attr($settings['blog_post_order']),
                'orderby' => esc_attr($settings['blog_post_order_by']),
                'ignore_sticky_posts' => true,
                'tag__not_in' => $settings['exclude_tags'],
                'post__not_in' => $exclude_post
            );
        } elseif (empty($settings['exclude_cats']) && !empty($settings['exclude_tags']) && empty($settings['exclude_post_id'])) {
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => esc_attr($settings['blog_post_count']),
                'order' => esc_attr($settings['blog_post_order']),
                'orderby' => esc_attr($settings['blog_post_order_by']),
                'ignore_sticky_posts' => true,
                'tag__not_in' => $settings['exclude_tags'],
            );
        } elseif (empty($settings['exclude_cats']) && empty($settings['exclude_tags']) && !empty($settings['exclude_post_id'])) {
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => esc_attr($settings['blog_post_count']),
                'order' => esc_attr($settings['blog_post_order']),
                'orderby' => esc_attr($settings['blog_post_order_by']),
                'ignore_sticky_posts' => true,
                'post__not_in' => $exclude_post
            );
        } else {
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => esc_attr($settings['blog_post_count']),
                'order' => esc_attr($settings['blog_post_order']),
                'orderby' => esc_attr($settings['blog_post_order_by']),
                'ignore_sticky_posts' => true
            );
        }

        $this->add_render_attribute('wrapper', 'class', 'row blog-vs-carousel');

        if ($settings['blog_style'] == '1') {
            $this->add_render_attribute('wrapper', 'data-slick-arrows', 'false');
            $this->add_render_attribute('wrapper', 'data-slide-to-show', $settings['slide_to_show']['size']);
        }

        $blogpost = new WP_Query($args);

        if ($blogpost->have_posts()) {
            if ($settings['blog_style'] == '1') {
                ?>
                <!--==============================
                Blog Area
                ==============================-->
                <section class="blog-cs">
                        <div class="row vs-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2">
                            <?php
                            while ($blogpost->have_posts()) {
                                $blogpost->the_post();
                                ?>
                                <div class="col-xl-4">
                                    <div class="vs-blog blog-style1">
                                        <div class="blog-img">
                                            <a href="<?php echo esc_url(bizino_blog_date_permalink()); ?>"><?php the_post_thumbnail('home-slider-blog-image', array('class' => 'w-100')); ?></a>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-category">
                                                <a href="blog.html">Business</a>
                                            </div>
                                            <?php
                                            if (get_the_title()) {
                                                echo '<h3 class="blog-title h5"><a href="' . esc_url(get_permalink()) . '">' . esc_html(wp_trim_words(get_the_title(), $settings['title_count'], '')) . '</a></h3>';
                                            }
                                            ?>
                                            <div class="blog-bottom">
                                                <?php echo '<div class="blog-avater">' . get_avatar(get_the_author_meta('ID'), 60) . '</div>'; ?>
                                                <div class="media-body">
                                                    <?php echo '<a href="' . esc_url(bizino_blog_date_permalink()) . '" class="blog-date">' . esc_html(get_the_date('d M, Y')) . '</a>'; ?>
                                                    <?php echo '<p class="blog-writter">' . esc_html(get_the_author()) . '</p>'; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            wp_reset_postdata(); ?>
                        </div>
                </section>
                <?php
            } elseif ($settings['blog_style'] == '2') {
                ?>
                <!--==============================
                   Blog Area
                   ==============================-->
                <section class="blog2-cs">
                        <div class="row vs-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2">
                            <?php
                            while ($blogpost->have_posts()) {
                                $blogpost->the_post();
                                ?>
                                <div class="col-xl-4">
                                    <div class="vs-blog blog-style2">
                                        <div class="blog-img">
                                            <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_post_thumbnail('home-slider-blog-image', array('class' => 'w-100')); ?></a>
                                        </div>
                                        <div class="blog-body">
                                            <div class="blog-date">
                                                <?php echo '<a href="' . esc_url(bizino_blog_date_permalink()) . '">' . esc_html(get_the_date('d M, Y')) . '</a>'; ?>
                                            </div>
                                            <div class="blog-content">
                                                <div class="blog-meta">
                                                    <?php echo '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '"><i class="fas fa-user"></i>' . esc_html(get_the_author()) . '</a>'; ?>
                                                    <a href="<?php echo esc_url(get_permalink() . '#respond'); ?>"><i
                                                                class="fad fa-comment-alt-lines"></i><?php echo esc_html(get_comments_number()); ?>
                                                        Comments</a>
                                                </div>
                                                <?php
                                                if (get_the_title()) {
                                                    echo '<h3 class="blog-title h5"><a href="' . esc_url(get_permalink()) . '">' . esc_html(wp_trim_words(get_the_title(), $settings['title_count'], '')) . '</a></h3>';
                                                }
                                                ?>
                                                <?php echo '<a href="' . esc_url(get_the_permalink()) . '" class="icon-btn style4"><i class="far fa-long-arrow-right"></i></a>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            wp_reset_postdata(); ?>
                        </div>
                </section>
                <?php
            } elseif ($settings['blog_style'] == '3') {
                ?>
                <!--==============================
                Blog Area
                ==============================-->
                <section class="blog3-cs">
                        <div class="row vs-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2">
                            <?php
                            while ($blogpost->have_posts()) {
                                $blogpost->the_post();
                                ?>
                                <div class="col-xl-4">
                                    <div class="vs-blog blog-style2 layout2">
                                        <div class="blog-img">
                                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                                <?php the_post_thumbnail('home-slider-blog-image', array('class' => 'w-100')); ?>
                                            </a>
                                        </div>
                                        <div class="blog-body">
                                            <div class="blog-date">
                                                <?php echo '<a href="' . esc_url(bizino_blog_date_permalink()) . '">' . esc_html(get_the_date('d M, Y')) . '</a>'; ?>
                                            </div>
                                            <div class="blog-content">
                                                <div class="blog-meta">
                                                    <?php echo '
                                                    <a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">
                                                        <i class="fas fa-user"></i>
                                                        ' . esc_html(get_the_author()) . '</a>'; ?>
                                                    <a href="<?php echo esc_url(get_permalink() . '#respond'); ?>"><i
                                                                class="fad fa-comment-alt-lines"></i><?php echo esc_html(get_comments_number()); ?>
                                                        Comments</a>
                                                </div>
                                                <?php
                                                if (get_the_title()) {
                                                    echo '<h3 class="blog-title h5"><a href="' . esc_url(get_permalink()) . '">' . esc_html(wp_trim_words(get_the_title(), $settings['title_count'], '')) . '</a></h3>';
                                                }
                                                ?>
                                                <a href="<?php echo esc_url(get_permalink()); ?>" class="icon-btn style4"><i class="far fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            wp_reset_postdata(); ?>
                        </div>
                </section>
                <?php
            } else {
                ?>

                <?php
            }
        }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Blog_Post());