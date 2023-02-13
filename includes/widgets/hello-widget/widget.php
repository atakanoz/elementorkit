<?php
/**
 * Kit Hello Widget
 * ------------------------
 *
 * @package Elementor Kit
 * @subpackage Widgets
 * @author author
 * @since 1.0.0
 *
 * ------------------------
 */
class Kit_Hello_Widget extends \Elementor\Widget_Base {

	/**
	 * Get the widget's name.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'kit_hello_widget';
	}

	/**
	 * Get the widget's title.
	 *
	 * @return string
	 */
	public function get_title() {
		return esc_html__( 'Hello World', 'elementor-addon' );
	}

	/**
	 * Get the widget's icon.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-code';
	}

	/**
	 * Add the widget to a category.
	 * Previously setup in the class-widgets.php file.
	 *
	 * @return string|array
	 */
	public function get_categories() {
		return array( 'custom-category' );
	}

	/**
	 * Add the keyword of the widget.
	 *
	 * @return string|array
	 */
	public function get_keywords() {
		return array( 'hello', 'world' );
	}


	/**
	 * Register the controls.
	 *
	 * @return void
	 */
	protected function register_controls() {

		// Content Tab Start.
		// ----------------------------------------.
		$this->start_controls_section(
			'section_title',
			array(
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'elementor-addon' ),
				'type'    => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Hello world', 'elementor-addon' ),
			)
		);

		$this->end_controls_section();

		// Style Tab Start.
		// ----------------------------------------.
		$this->start_controls_section(
			'section_title_style',
			array(
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Text Color', 'elementor-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget.
	 *
	 * @return string
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		?>

<p class="hello-world">
	<?php esc_html_e( 'Hello world!' . $settings['title'] ); ?>
</p>

<?php
	}
}