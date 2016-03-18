<?php
/***********************************************************************************************/
/* Add a menu option to link to the customizer */
/***********************************************************************************************/
add_action('admin_menu', 'display_custom_options_link');
function display_custom_options_link() {
	add_theme_page('Damol Options', 'Damol Options', 'edit_theme_options', 'customize.php');
}

/***********************************************************************************************/
/* Add options in the theme customizer page */
/***********************************************************************************************/
add_action('customize_register', 'damol_customize_register');
function damol_customize_register($wp_customize) {
	// Logo 
	$wp_customize->add_section('damol_logo', array(
		'title' => __('Logo', 'damol-framework'),
		'description' => __('Permite subir tu logo personalizado.', 'damol-framework'),
		'priority' => 35
	));
	
	$wp_customize->add_setting('damol_custom_settings[logo]', array(
		'default' => IMAGES . '/logo.png',
		'type' => 'option'
	));
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('Carga tu Logo', 'damol-framework'),
		'section' => 'damol_logo',
		'settings' => 'damol_custom_settings[logo]'
	)));

	####>>>>>>>>>>>> REDES SOCIALES >>>>>>>>>>>>>>>>>>
	$wp_customize->add_section('damol_contact_fb', array(
		'title' => __('Facebook de contacto', 'damol-framework'),
		'description' => __('Escribe el Facebook de contacto', 'damol-framework'),
		'priority' => 37
	));
	
	$wp_customize->add_setting('damol_custom_settings[contact_fb]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('damol_custom_settings[contact_fb]', array(
		'label'    => __('Facebook de contacto', 'damol-framework'),
		'section'  => 'damol_contact_fb',
		'settings' => 'damol_custom_settings[contact_fb]',
		'type'     => 'text'
	));


	
	// Contact Email
	$wp_customize->add_section('damol_contact_email', array(
		'title' => __('Correo Contacto de Formulario', 'damol-framework'),
		'description' => __('Escribe el Correo Contacto de Formulario', 'damol-framework'),
		'priority' => 37
	));
	
	$wp_customize->add_setting('damol_custom_settings[contact_email]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('damol_custom_settings[contact_email]', array(
		'label'    => __('Dirección Contacto de Formulario', 'damol-framework'),
		'section'  => 'damol_contact_email',
		'settings' => 'damol_custom_settings[contact_email]',
		'type'     => 'text'
	));

	//Customizar celular
	$wp_customize->add_section('damol_contact_cel', array(
		'title' => __('Celular de Contacto', 'damol-framework'),
		'description' => __('Celular de Contacto', 'damol-framework'),
		'priority' => 39
	));
	
	$wp_customize->add_setting('damol_custom_settings[contact_cel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('damol_custom_settings[contact_cel]', array(
		'label'    => __('Escribe el o los números de celular del contacto separados por comas', 'damol-framework'),
		'section'  => 'damol_contact_cel',
		'settings' => 'damol_custom_settings[contact_cel]',
		'type'     => 'text'
	));

	//Customizar telefono
	$wp_customize->add_section('damol_contact_tel', array(
		'title' => __('Telefono de Contacto', 'damol-framework'),
		'description' => __('Telefono de Contacto', 'damol-framework'),
		'priority' => 39
	));
	
	$wp_customize->add_setting('damol_custom_settings[contact_tel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('damol_custom_settings[contact_tel]', array(
		'label'    => __('Escribe el numero de teléfono', 'damol-framework'),
		'section'  => 'damol_contact_tel',
		'settings' => 'damol_custom_settings[contact_tel]',
		'type'     => 'text'
	));

	//Customizar Direccion
	$wp_customize->add_section('damol_contact_address', array(
		'title' => __('Direccion de Contacto', 'damol-framework'),
		'description' => __('Direccion de Contacto', 'damol-framework'),
		'priority' => 40
	));
	
	$wp_customize->add_setting('damol_custom_settings[contact_address]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('damol_custom_settings[contact_address]', array(
		'label'    => __('Escribe la Direccion del contacto ', 'damol-framework'),
		'section'  => 'damol_contact_address',
		'settings' => 'damol_custom_settings[contact_address]',
		'type'     => 'text'
	));

	//Customizar MAPA
	$wp_customize->add_section('damol_contact_mapa', array(
		'title' => __('Mapa de Contacto', 'damol-framework'),
		'description' => __('Mapa de Contacto', 'damol-framework'),
		'priority' => 41
	));
	
	$wp_customize->add_setting('damol_custom_settings[contact_mapa]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('damol_custom_settings[contact_mapa]', array(
		'label'    => __('Escribe latitud y longitud de mapa sepador por coma', 'damol-framework'),
		'section'  => 'damol_contact_mapa',
		'settings' => 'damol_custom_settings[contact_mapa]',
		'type'     => 'text'
	));
	
}	
?>