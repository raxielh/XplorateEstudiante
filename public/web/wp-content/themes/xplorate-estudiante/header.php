<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory') ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory') ?>/assets/css/animate.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory') ?>/assets/css/site.min.css">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="main-content">

	<div class="preload">
		<div class="preload-container">
			<div class="loading-effect">
				<span></span>
				<div class="icon"></div>
			</div>
		</div>
	</div>

	<div class="header-desktop">
	    <header>
	        <div class="main-header">
	            <div class="content">
					<a href="{{ url:site }}" class="logo"><img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/logo-xplorate-new.png" alt="Logo" class="max-img"/></a>
	                <a href="{{ url:site }}" class="logo2"><img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/logo-xplorate-new2.png" alt="Logo" class="max-img"/></a>
	                <nav class="main-nav">
	                    <ul>
	                        <li>
	                            <a href="<?php bloginfo( 'url' ); ?>"><span class="inline">Bienvenido</span></a>
	                        </li>
	                        <li>
	                            <a href="<?php bloginfo( 'url' ); ?>?page_id=45"><span class="inline">Pregustas Frecuentes</span></a>
	                        </li>
	                        <li>
	                            <a href="<?php bloginfo( 'url' ); ?>?page_id=29"><span class="inline">Test</span></a>
	                        </li>
	                        <li>
	                            <a href="<?php bloginfo( 'url' ); ?>?page_id=57"><span class="inline">Contacto</span></a>
	                        </li>
	                    </ul>
	                </nav>
	                <div class="clear"></div>
	            </div>
	        </div>
	    </header>
	</div>

	<div class="header-device">
	    <a href="index.php"><img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/logo-xplorate-new.png" class="logo-device"></a>
	    <a href="index.php"><img src="<?php bloginfo('stylesheet_directory') ?>/assets/images/logo-xplorate-new2.png" class="logo-device2"></a>
	    <div class="menu-btn"><span></span></div>
	</div>

	<div class="clear"></div>