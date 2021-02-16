<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package chomdu
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">

		<?php wp_head(); ?>
	</head>

	<body>
	<?php wp_body_open(); ?>
    <header>
        <div class="header-haut">
            <div class="header-banniere wrap">
                <a href="">
                    <p>ChomDu.fr</p>
                </a>
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>login</a>
            </div>
        </div>
        <nav class="wrap">
            <a href="#"><img class="logo-header" src="<?php echo get_template_directory_uri().'/asset/img/logo2.png'; ?>" alt="logo"></a>
            <div class="menu">
                <a class="" href="#">Qui sommes-nous</a>
                <a class="" href="#">Nous contacter</a>
                <a class="" href="#">déposer un CV</a>
                <a class="" href="#">Comment ça marche</a>
                <a class="" href="<?php echo esc_url(home_url('home')) ?>">acceuil</a>
            </div>
        </nav>
      
    </header>
