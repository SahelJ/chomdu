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
            <a href="<?php echo esc_url(home_url('home')); ?>"><img class="logo-header" src="<?php echo get_template_directory_uri() . '/asset/img/logo2.png'; ?>" alt="logo"></a>
            <div class="menu">
                <a class="" href="<?php echo esc_url(home_url('about')) ?>">Qui sommes-nous</a>
                <a class="" href="<?php echo esc_url(home_url('contact')) ?>">Nous contacter</a>

                <?php if (is_user_logged_in()) { ?>
                    <?php $current_user = wp_get_current_user();
                      $roles = $current_user->roles; 
                      if ($roles[0] == 'recruteur') {
                          echo '<a class="" href="'.esc_url(home_url('cv')).'">Afficher les CV</a>';
                      }else {
                        echo '<a class="" href="'.esc_url(home_url('cv')).'">Deposer un CV</a>';
                        echo '<a class="" href="'.esc_url(home_url('mon cv')).'">voir mon cv</a>';
                     }; 
                     
                     }else {
                        echo '<a class="" href="'.esc_url(home_url('cv')).'">Deposer un CV</a>';
                     }; ?>  
                     
                <a class="" href="<?php echo esc_url(home_url('home')) ?>">Acceuil</a>
            </div>
        </nav>
<div class="modal-wrapper">
    <div class="modal-content">
        <div class="userLogin">
            <?php
            // check if the user already login
            if (is_user_logged_in()) { ?>
            
            <?php } else { ?>
                <!--message wrapper-->
                <div id="message" class="alert-box"></div>


                <form method="post" id="rsUserLogin" class="form-login">
                    <?php
                    // this prevent automated script for unwanted spam
                    if (function_exists('wp_nonce_field'))
                        wp_nonce_field('rs_user_login_action', 'rs_user_login_nonce');
                    ?>
                    <input type="text" name="log" id="log" placeholder="Username" />
                    <input type="password" name="pwd" id="pwd" placeholder="Password" />

                    <div id="ckbox">
                        <input type="checkbox" name="remember" id="remember" value="true" />
                        <p>Remenber me</p>
                    </div>


                    <button type="submit" class="btn btn-blue-primary">Se connecter</button>
                    <button role="btn-register" class="btn btn-blue-primary">S'inscrire</button>
                    <!-- < !—where you’d like your user after logged in?, this set to current page-->
                    <input type="hidden" name="redirection_url" id="redirection_url" value="<?php echo esc_url(home_url('cv')); ?>" />


                </form>
            <?php } ?>
        </div>

        <div class="userRegistration textCenter">
            <!--message wrapper-->
            <div id="message" class="alert-box"></div>


            <form method="post" id="rsUserRegistration" class="form-register">
                <?php
                // to make our script safe, it's a best practice to use nonce on our form to check things out
                if (function_exists('wp_nonce_field'))
                    wp_nonce_field('rs_user_registration_action', 'rs_user_registration_nonce');
                ?>
                <input type="text" name="log" id="log" placeholder="Username" />
                <input type="password" name="pwd" id="pwd" placeholder="Password" />
                <input type="email" name="email" id="email" placeholder="email" />

                <div id="ckbox_inscription">
                    <select name="role" id="role">
                        <option value="subscriber">Abonnée</option>
                        <option value="recruteur">Recruteur</option>
                    </select>
                </div>

                <button type="submit" id="submit" class="btn btn-blue-primary">S'inscrire</button>
                <button role="btn-login" class="btn btn-blue-primary">Se connecter </button>

            </form>
        </div>
        
    </div>
</div>                                                 
    </header>