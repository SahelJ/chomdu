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
    <meta charset="<?php bloginfo('charset'); ?>">
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
                
                <?php if (is_user_logged_in()) { ?>
                    <a href="<?php echo wp_logout_url(esc_url(home_url('home'))); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>Logout</a>
                    
                <?php } else {
                ?> 
                <button <?= (isLogged()) ? 'role="btn-dashboard"' : 'role="btn-modal-login"' ?> class="nav-item btn btn-blue-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>Se connecter</button> <?php
                } ?>
                
            </div>
        </div>
        <nav class="wrap">
            <a href="#"><img class="logo-header" src="<?php echo get_template_directory_uri() . '/asset/img/logo2.png'; ?>" alt="logo"></a>
            <div class="menu">
                <a class="" href="<?php echo esc_url(home_url('about')) ?>">Qui sommes-nous</a>
                <a class="" href="<?php echo esc_url(home_url('contact')) ?>">Nous contacter</a>
                
                <?php if (is_user_logged_in()) { ?>
                    <?php $current_user = wp_get_current_user();
                      $roles = $current_user->roles;   
                      if ($roles == 'recruteur') {
                          echo '<a class="" href="#">Afficher les CV</a>';
                      }else if($roles == 'subscriber'){
                          echo '<a class="" href="#">Deposer un CV</a>';
                      }else {
                          echo '<a class="" href="#">Deposer un CV</a>';
                      }; ?>
                    <?php  }  ?>
                <a class="" href="<?php echo esc_url(home_url('home')) ?>">Acceuil</a>
            </div>
        </nav>

    </header>