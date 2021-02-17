<?php
/*
Template Name: home
*/



get_header(); ?>
<div class="header-nuage animate">
    <div class="header-text wrap">
        <h2 class="h2-anim">fast,reliable,flexible,support</h2>
        <h3 class="h3-anim">Employemant screening & background check services</h3>
        <a href="">learn more about us</a>
    </div>
</div>
<section class="descriptif wrap">
    <div>
        <div class="descriptif-text">
            <div class="descriptif-title">
                <h2 class="h2-anim">Select the rigth candidate</h2>
                <h4 class="h4-anim">Over 5,500 client worlwide</h4>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae maxime voluptas ipsum eum, suscipit
                    unde
                    ratione saepe aperiam!</p>
            </div>

        </div>
        <div class="descriptif-info">
            <h2 class="h2-anim">Social media <span>. featured services</span></h2>
            <h4 class="h4-anim">Discover the good ...</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis distinctio dolores natus cum debitis, illo
                eos quibusdam autem, fugiat beatae aliquam magnam tempora doloremque inventore quod repellat quas
                dolorum nulla!</p>
            <div class="descriptif-link">
                <a href="">learn more</a>
                <a href="">view simple</a>
            </div>
        </div>
    </div>
    <div class="shape"><img src="<?php echo get_template_directory_uri() ?>/asset/img/fond_chemise.jpg" alt=""></div>
</section>
<section class="services wrap">
    <div class="services-title">
        <h4 class="h4-anim">Our services</h4>
        <a href="">
            <h2 class="h2-anim">View all services</h2>
        </a>
    </div>
    <div class="trait"></div>
    <div class="services-all">
        <div class="services-info">
            <div class="services-article">
                <h5 class="h5-anim">Drug testing</h5>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                    </svg></a>
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia doloribus quis at. Rerum hic
                autem, eveniet rem sint veniam quam veritatis, eos iste nostrum mollitia recusandae impedit
                reprehenderit eum nisi?</p>
        </div>
        <div class="services-info">
            <div class="services-article">
                <h5 class="h5-anim">Drug testing</h5>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                    </svg></a>
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia doloribus quis at. Rerum hic
                autem, eveniet rem sint veniam quam veritatis, eos iste nostrum mollitia recusandae impedit
                reprehenderit eum nisi?</p>
        </div>
        <div class="services-info">
            <div class="services-article">
                <h5 class="h5-anim">Drug testing</h5>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                    </svg></a>
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia doloribus quis at. Rerum hic
                autem, eveniet rem sint veniam quam veritatis, eos iste nostrum mollitia recusandae impedit
                reprehenderit eum nisi?</p>
        </div>
    </div>
</section>
<div class="header-nuage2 animate">
    <div class="header-text2 wrap">
        <h2 class="h2-anim">Fast,reliable,flexible,support</h2>
        <h3 class="h3-anim">Employemant screening & background check services</h3>
        <a href="">Learn more about us</a>
    </div>
</div>
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
                    <input type="hidden" name="redirection_url" id="redirection_url" value="<?php echo esc_url(home_url('home')); ?>" />


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

                <div id="ckbox">
                    <select name="role" id="role">
                        <option value="subscribe">Subscribe</option>
                        <option value="recruteur">Recruteur</option>
                    </select>
                </div>

                <button type="submit" id="submit" class="btn btn-blue-primary">S'inscrire</button>
                <button role="btn-login" class="btn btn-blue-primary">Se connecter </button>

            </form>
        </div>
    </div>
</div>                                                                                                                                                                                            } ?>


<?php get_footer();
