<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

/**
 *
 * Services Widget .
 *
 */
class Bizino_Service_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinoservices';
    }

    public function get_title()
    {
        return __('Bizino Services', 'bizino');
    }

    public function get_icon()
    {
        return 'eicon-editor-code';
    }

    public function get_categories()
    {
        return ['bizino'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'chose_us_content',
            [
                'label' => __('Services', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'features_style',
            [
                'label' => __('Services Style', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one' => __('Style One', 'bizino'),
                    'two' => __('Style Two', 'bizino'),
                    'three' => __('Style Three', 'bizino'),
                    'four' => __('Style Four', 'bizino'),
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'service_4_content',
            [
                'label' => __('Services', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'service4_item_image',
            [
                'label' => __('Upload Item Image', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->add_control(
            'service4_title', [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Safe Cleaning Supplies', 'bizino'),
                'rows' => 2,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'service4_link',
            [
                'label' => __('Title Link', 'bizino'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('www.example.com', 'bizino'),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'service4_content', [
                'label' => __('Content', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipm dolor amet, consectetur magm maiores.Ipsa dolor sit ilmesy magnam maores.', 'bizino'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        /*-----------------------------------------title styling------------------------------------*/

        $this->start_controls_section(
            'title_styling',
            [
                'label' => __('Title Styling', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'features_title_color',
            [
                'label' => __('Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service p' => 'color: {{VALUE}}!important;',
                    '{{WRAPPER}} h4' => 'color: {{VALUE}}!important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_title_typography',
                'label' => __('Title Typography', 'bizino'),
                'selectors' => [
                    '{{WRAPPER}} .service p',
                    '{{WRAPPER}} .h4'
                ]
            ]
        );

        $this->add_responsive_control(
            'features_title_margin',
            [
                'label' => __('Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .service p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'features_title_padding',
            [
                'label' => __('Title Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .service p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
            ?>

                <div class="service-style1">
                    <div class="service-icon">
                        <div class="vs-shape1"></div>
                        <?php
                        if (!empty($settings['service4_item_image']['url'])) {
                            echo bizino_img_tag(array(
                                'url' => esc_url($settings['service4_item_image']['url']),
                            ));
                        }
                        ?>
                    </div>
                    <h3 class="service-title h5">
                        <a class="text-inherit"
                           href="<?php echo esc_url($settings['service4_link']['url']); ?>">
                            <?php echo esc_html($settings['service4_title']); ?>
                        </a>
                    </h3>
                    <?php
                    if (!empty($settings['service4_content'])) {
                        echo '<p class="service-text">' . htmlspecialchars_decode(esc_html($settings['service4_content'])) . '</p>';
                    }
                    ?>
                </div>

            <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Service_Widget());