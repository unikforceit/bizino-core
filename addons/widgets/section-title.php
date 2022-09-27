<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;

/**
 *
 * Section Title Widget .
 *
 */
class Bizino_Section_Title_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'bizinosectiontitle';
    }

    public function get_title()
    {
        return __('Section Title', 'bizino');
    }

    public function get_icon()
    {
        return 'fa fa-code';
    }

    public function get_categories()
    {
        return ['bizino'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_title_section',
            [
                'label' => __('Section Title', 'bizino'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title_style',
            [
                'label' => __('Title Style', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('Style One', 'bizino'),
                    '2' => __('Style Two', 'bizino'),
                ],
            ]
        );


        $this->add_control(
            'section_icon',
            [
                'label' => esc_html__('Icon', 'bizino'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => ['title_style' => ['2']],
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => __('Section Title', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('One Of The Best Business Advice Agency...', 'bizino')
            ]
        );
        $this->add_control(
            'section_title_tag',
            [
                'label' => __('Title Tag', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                ],
                'default' => 'h2',
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label' => __('Section Subtitle', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Best Company of the year Awarded', 'bizino'),
            ]
        );

        $this->add_control(
            'section_subtitle_tag',
            [
                'label' => __('Subitle Tag', 'bizino'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'p' => 'P',
                    'span' => 'span',
                ],
                'default' => 'span',
                'condition' => ['section_subtitle!' => '']
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __('Section Description', 'bizino'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('In today’s world, building a business also means you’ll need a strong
                website and social media presence. These can help you learn your customers better. With them, you can
                even request customers’ email addresses so you can reach them directly...', 'bizino')
            ]
        );

        $this->add_responsive_control(
            'section_title_align',
            [
                'label' => __('Alignment', 'bizino'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'bizino'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'bizino'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'bizino'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style_section',
            [
                'label' => __('Section Title Style', 'bizino'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_title_color',
            [
                'label' => __('Section Title Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title-selector' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'section_title!' => ''
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'section_title_typography',
                'label' => __('Section Title Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .title-selector',
                'condition' => [
                    'section_title!' => ''
                ]
            ]
        );

        $this->add_responsive_control(
            'section_title_margin',
            [
                'label' => __('Section Title Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .title-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_title!' => ''
                ]
            ]
        );

        $this->add_responsive_control(
            'section_title_padding',
            [
                'label' => __('Section Title Padding', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .title-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_title!' => ''
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __('Border', 'bizino'),
                'selector' => '{{WRAPPER}} .title-selector',
                'condition' => [
                    'section_title!' => ''
                ],
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'section_subtitle_color',
            [
                'label' => __('Section Subtitle Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .subtitle-selector' => 'color: {{VALUE}}!important',
                ],
                'condition' => [
                    'section_subtitle!' => ''
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'section_subtitle_typography',
                'label' => __('Section Subtitle Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .subtitle-selector',
                'condition' => [
                    'section_subtitle!' => ''
                ],
            ]
        );

        $this->add_responsive_control(
            'section_subtitle_margin',
            [
                'label' => __('Section Subtitle Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .subtitle-selector' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_subtitle!' => ''
                ],
            ]
        );

        $this->add_control(
            'section_description_color',
            [
                'label' => __('Section Description Color', 'bizino'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title .desc' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'section_description!' => ''
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'section_description_typography',
                'label' => __('Section Description Typography', 'bizino'),
                'selector' => '{{WRAPPER}} .section-title .desc',
                'condition' => [
                    'section_description!' => ''
                ],
            ]
        );

        $this->add_responsive_control(
            'section_description_margin',
            [
                'label' => __('Section Description Margin', 'bizino'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .section-title .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_description!' => ''
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

//        $this->add_render_attribute( 'wrapper', 'class', 'section-title' );
//
//        echo '<div '.$this->get_render_attribute_string( 'wrapper' ).' >';
//
//    	if($settings['title_style'] == '2'){
//        	if( ! empty( $settings['section_icon']['url'] ) ){
//				echo '<div class="sec-icon">';
//					echo bizino_img_tag( array(
//	                        'url'   => esc_url( $settings['section_icon']['url'] )
//	                    ) );
//				echo '</div>';
//			}
//		}
//
//		if( !empty( $settings['section_subtitle'] ) ) {
//			echo '<'.esc_attr($settings['section_subtitle_tag']).' class="sub-title subtitle-selector">'.wp_kses_post( $settings['section_subtitle'] ).'</'.esc_attr($settings['section_subtitle_tag']).'>';
//		}
//
//		if( ! empty( $settings['section_title'] ) ) {
//        	echo '<'.esc_attr($settings['section_title_tag']).' class="sec-title title-selector">'.wp_kses_post( $settings['section_title'] ).'</'.esc_attr($settings['section_title_tag']).'>';
//		}
//		if( ! empty( $settings['section_description'] ) ){
//				echo bizino_paragraph_tag( array(
//					'text'	=> wp_kses_post( $settings['section_description'] ),
//					'class'	=> 'desc'
//				) );
//			}
//		echo '</div>';

        if ($settings['title_style'] == '1') {
            ?>
            <!--    Title Style 1        -->
            <div class="sec-line"></div>
            <?php
            if (!empty($settings['section_subtitle'])) {
                echo '<' . esc_attr($settings['section_subtitle_tag']) . ' class="sec-subtitle">' . wp_kses_post($settings['section_subtitle']) . '</' . esc_attr($settings['section_subtitle_tag']) . '>';
            }
            ?>
            <?php
            if (!empty($settings['section_title'])) {
                echo '<' . esc_attr($settings['section_title_tag']) . ' class="sec-title">' . wp_kses_post($settings['section_title']) . '</' . esc_attr($settings['section_title_tag']) . '>';
            }
            ?>
            <?php
            if( ! empty( $settings['section_description'] ) ){
				echo bizino_paragraph_tag( array(
					'text'	=> wp_kses_post( $settings['section_description'] ),
					'class'	=> 'mb-xl-4 pb-xl-3 pe-xxl-4'
				) );
			}
            ?>

            <?php
        } else {
            ?>
            <!--    Title Style 2        -->
            <div class="title-area">
                <div class="sec-pills">
                    <div class="pill"></div>
                    <div class="pill"></div>
                    <div class="pill"></div>
                </div>
                <?php
                if (!empty($settings['section_subtitle'])) {
                    echo '<' . esc_attr($settings['section_subtitle_tag']) . ' class="sec-subtitle">' . wp_kses_post($settings['section_subtitle']) . '</' . esc_attr($settings['section_subtitle_tag']) . '>';
                }
                ?>
                <?php
                if (!empty($settings['section_title'])) {
                    echo '<' . esc_attr($settings['section_title_tag']) . ' class="sec-title">' . wp_kses_post($settings['section_title']) . '</' . esc_attr($settings['section_title_tag']) . '>';
                }
                ?>
            </div>

            <?php
        }
    }
}
\Elementor\Plugin::instance()->widgets_manager->register( new \Bizino_Section_Title_Widget() );