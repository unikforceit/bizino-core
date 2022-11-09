<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;

/**
 *
 * Image with Video Widget .
 *
 */
class Bizino_Faq_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinofaq';
    }

    public function get_title()
    {
        return __('Bizino Faq', 'bizino');
    }


    public function get_icon()
    {
        return 'eicon-image-hotspot';
    }


    public function get_categories()
    {
        return ['bizino'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'faq_section',
            [
                'label' => __('Faq Items', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'faq_style',
            [
                'label' => __('FAQ Style', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Style One', 'bizino'),
                    '2' => __('Style Two', 'bizino'),
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'faq_title',
            [
                'label' => __('Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => __('Business leaders Ideas', 'bizino')
            ]
        );
        $repeater->add_control(
            'faq_text',
            [
                'label' => __('Text', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 3,
                'default' => __('Duis sed odio sit amet nibh vulputate cursus mauris Morbi ac cumsan ipsuy veli Nam nec tincidunt auctor uis sed odio sit amet ipsome nec tellus il tincidu ilm auctor Clas', 'bizino')
            ]
        );

        $this->add_control(
            'faq_list',
            [
                'label' => __('Faq List', 'bizino'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'faq_title' => __('Business leaders Ideas', 'bizino'),
                    ],
                    [
                        'faq_title' => __('Defined as Systems Integrating', 'bizino'),
                    ],
                    [
                        'faq_title' => __('Modules Together for Establishing', 'bizino'),
                    ],
                    [
                        'faq_title' => __('Turn contribute to Organisational', 'bizino'),
                    ],
                ],
                'title_field' => '{{{ faq_title }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'video_btn_style_section',
            [
                'label' => __('Video Button Style', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['video_btn' => 'yes']
            ]
        );

        $this->add_control(
            'video_btn_color',
            [
                'label' => __('Video Button Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-btn i' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'video_btn_hover_color',
            [
                'label' => __('Video Button Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-btn:hover i' => 'color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'video_btn_background_color',
            [
                'label' => __('Video Button Background Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-btn i' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'video_btn_background_hover_color',
            [
                'label' => __('Video Button Background Hover Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-btn:hover i' => 'background-color: {{VALUE}}',
                ]
            ]
        );

        $this->add_control(
            'video_btn_ripple_effect_color',
            [
                'label' => __('Video Button Ripple Effect Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .play-btn:after,{{WRAPPER}} .play-btn:before' => 'background-color: {{VALUE}}!important;',
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $uniq_id = uniqid('accordion');
        $uniq_item = uniqid();
        if ($settings['faq_style'] == '1') {
            ?>
            <!--==============================
            FAQ Area
            ==============================-->
            <section class="faq-cs">
                <div class="accordion accordion-style1" id="accordionStyle<?php echo esc_attr($uniq_item); ?>">
                    <?php if ($settings['faq_list']) {
                        $loop = 0;
                        foreach ($settings['faq_list'] as $faq) {
                            $loop++;
                            if ($loop == 1) {
                                $show = 'show';
                                $exp = 'true';
                            } else {
                                $show = '';
                                $exp = 'false';
                            }
                            ?>
                            <div class="accordion-item">
                                <div class="accordion-header" id="heading<?php echo esc_attr($faq['_id'] . $uniq_item); ?>">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo esc_attr($faq['_id'] . $uniq_item); ?>" aria-expanded="<?php echo esc_attr($exp); ?>" aria-controls="collapse<?php echo esc_attr($faq['_id'] . $uniq_item); ?>">
                                        <?php echo esc_html($faq['faq_title']); ?>
                                    </button>
                                </div>
                                <div id="collapse<?php echo esc_attr($faq['_id'] . $uniq_item); ?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" aria-labelledby="heading<?php echo esc_attr($faq['_id'] . $uniq_item); ?>" data-bs-parent="#accordionStyle<?php echo esc_attr($uniq_item); ?>">
                                    <div class="accordion-body">
                                        <p><?php echo esc_html($faq['faq_text']); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </section>
            <?php
        } else {
            ?>
            <div class="accordion" id="accordion<?php echo esc_attr($uniq_item); ?>">
                <?php if ($settings['faq_list']) {
                    $loop2 = 0;
                    foreach ($settings['faq_list'] as $faq) {
                        $loop2++;
                        if ($loop2 == 1) {
                            $show2 = 'show';
                            $exp2 = 'true';
                        } else {
                            $show2 = '';
                            $exp2 = 'false';
                        }
                        ?>
                        <div class="accordion-item">
                            <p class="m-0 accordion-header" id="h<?php echo esc_attr($faq['_id'] . $uniq_item); ?>">
                                <button class="py-3 accordion-button fw-bold" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#c<?php echo esc_attr($faq['_id'] . $uniq_item); ?>"
                                        aria-expanded="<?php echo esc_attr($exp2); ?>"
                                        aria-controls="c<?php echo esc_attr($faq['_id'] . $uniq_item); ?>"><?php echo esc_html($faq['faq_title']); ?></button></p>
                            <div id="c<?php echo esc_attr($faq['_id'] . $uniq_item); ?>" class="accordion-collapse collapse <?php echo esc_attr($show2); ?>"
                                 aria-labelledby="h<?php echo esc_attr($faq['_id'] . $uniq_item); ?>"
                                 data-bs-parent="#accordion<?php echo esc_attr($uniq_item); ?>">
                                <div class="accordion-body">
                                    <?php echo esc_html($faq['faq_text']); ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
            <?php
        }
    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Bizino_Faq_Widget());