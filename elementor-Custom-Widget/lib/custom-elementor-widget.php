<?php 

/**
 * 
 */
namespace Elementor;
class NewsWidget extends Widget_Base{
	
	public function get_name(){
		return "first-widget";
	}

	public function get_title(){
		return "About Us";
	}
	
	public function get_icon(){
		return "fa fa-html5";
	}
	
	public function get_categories() {
		return [ 'basic' ];
	}
	
	// Single Section Control
	protected function _register_controls() {
		$this->start_controls_section(
			'section-one',
			[
				'label' => __('Title', 'mahib'),
				'tab' 	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section_one_title',
			[
				'label' => __('Section Title', 'mahib'),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'mahib' )
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section-two',
			[
				'label' => __('Description', 'mahib'),
				'tab' 	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'item_description',
			[
				'label' => __( 'Description', 'mahib' ),
				'type' => Controls_Manager::WYSIWYG,
				//'default' => __( 'Default description', 'mahib' ),
				'placeholder' => __( 'Type your description here', 'mahib' ),
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section-three',
			[
				'label' => __('Image', 'mahib'),
				'tab' 	=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'mahib' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' =>Utils::get_placeholder_image_src(),
				]
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section-style',
			[
				'label' => __('Styles', 'mahib'),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->end_controls_section();
	}
	// End Register Control
	
	// Rendering Data On Frontend
	protected function _content_template() {
		?>
		<h3>{{{ settings.section_one_title }}}</h3>
		<img src="{{{ settings.image.url }}}">
		<p>{{{ settings.item_description }}}</p>\
		<?php
	}
	
}
Plugin::instance()->widgets_manager->register_widget_type( new NewsWidget );