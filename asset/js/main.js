$(document).ready(function () {
    init();
    jQuery(document).ready(function ($) {
        // for user login form
        $("form#rsUserLogin").submit(function () {
            var submit = $(".userLogin #submit"),
                preloader = $(".userLogin #preloader"),
                message = $(".userLogin #message"),
                contents = {
                    action: 'user_login',
                    nonce: this.rs_user_login_nonce.value,
                    log: this.log.value,
                    pwd: this.pwd.value,
                    remember: this.remember.value,
                    redirection_url: this.redirection_url.value
                };

            // disable button onsubmit to avoid double submision
            submit.attr("disabled", "disabled").addClass('disabled');

            // Display our pre-loading
            preloader.css({
                'visibility': 'visible'
            });

            // on my previous tutorial it just simply returned HTML but this time I decided to use JSON type so we can check for data success and redirection url.
            $.post(theme_ajax.url, contents, function (data) {

                submit.removeAttr("disabled").removeClass('disabled');
                alert('ok');
                // hide pre-loader
                preloader.css({
                    'visibility': 'hidden'
                });

                // check response data
                if (1 == data.success) {
                    // redirect to home page

                    window.location = data.redirection_url;

                } else {
                    // display return data
                    $.each(errors, (key, value) => {
                        $(`${parent} [name="${key}"]`).addClass('error').focus((e) => $(e.target).removeClass('error'))
                    });
                }

            }, 'json');

            return false;
        });
        // for user registration form
        $("form#rsUserRegistration").submit(function () {
            var submit = $(".userRegistration #submit"),
                preloader = $(".userRegistration #preloader"),
                message = $(".userRegistration #message"),
                contents = {
                    action: 'user_registration',
                    nonce: this.rs_user_registration_nonce.value,
                    log: this.log.value,
                    pwd: this.pwd.value,
                    role: this.role.value,
                    email: this.email.value,
                };

            // disable button onsubmit to avoid double submision
            submit.attr("disabled", "disabled").addClass('disabled');

            // Display our pre-loading
            preloader.css({
                'visibility': 'visible'
            });

            $.post(theme_ajax.url, contents, function (data) {
                submit.removeAttr("disabled").removeClass('disabled');

                // hide pre-loader
                preloader.css({
                    'visibility': 'hidden'
                });

                // check response data
                if (1 == data) {
                    // redirect to home page
                    window.location = theme_ajax.site_url;

                } else {
                    // display return data
                    message.html(data);
                }
            });

            return false;
        });
    });
});




const init = () => {
    initModal();
    duplicate();
}
const duplicate = () => {
    var destination_cpt = document.getElementById("destination_cpt");
    var title_cpt = document.getElementById('title_cpt');
    var cpt = $('#ajout_cpt');

    cpt.click((e) => {
        e.preventDefault();
        var source = document.getElementById("cpt");
        let evilclone = source.cloneNode(true);
        evilclone.removeAttribute("id");
        destination_cpt.appendChild(evilclone);
        title_cpt.innerHTML = "Compétences";
    })

    var destination_frm = document.getElementById("destination_frm");
    var title_frm = document.getElementById('title_frm');
    var frm = $('#ajout_frm');
    
    frm.click((e) => {
        e.preventDefault();
        var source = document.getElementById("frm");
        let evilclone = source.cloneNode(true);
        evilclone.removeAttribute("id");
        destination_frm.appendChild(evilclone);
        title_frm.innerHTML = "Formations";
    })

    var destination_exp = document.getElementById("destination_exp");
    var title_exp = document.getElementById('title_exp');
    var exp = $('#ajout_exp');
    
    exp.click((e) => {
        e.preventDefault();
        var source = document.getElementById("exp");
        let evilclone = source.cloneNode(true);
        evilclone.removeAttribute("id");
        destination_exp.appendChild(evilclone);
        title_exp.innerHTML = "Expériences";
    })

    var destination_int = document.getElementById("destination_int");
    var title_int = document.getElementById('title_int');
    var int = $('#ajout_int');
    
    int.click((e) => {
        e.preventDefault();
        var source = document.getElementById("int");
        let evilclone = source.cloneNode(true);
        evilclone.removeAttribute("id");
        destination_int.appendChild(evilclone);
        title_int.innerHTML = "Intérets";
    })

}
const initModal = () => {
    const modalsWrapper = $('.modal-wrapper');
    const modalCloseButton = $('.modal-wrapper .modal-close');
    const btnRegister = $('.modal-wrapper [role="btn-register"]');
    const btnLogin = $('.modal-wrapper [role="btn-login"]');
    const formRegister = $('.modal-wrapper .form-register');
    const formLogin = $('.modal-wrapper .form-login');

    modalCloseButton.click((e) => {
        modalsWrapper.toggleClass('active');
    })

    modalsWrapper.click((e) => {
        if (e.target == document.querySelector('.modal-wrapper')) {
            modalsWrapper.toggleClass('active');
        }
    })

    $('[role="btn-dashboard"]').click((e) => {
        e.preventDefault();
        window.location.href = './dashboard'
    });

    $('[role="btn-modal-login"]').click((e) => {
        e.preventDefault();
        // navResponsive.classList.remove('active');
        modalsWrapper.css('display', 'flex').toggleClass('active');
    });

    btnRegister.click((e) => {
        e.preventDefault();
        formLogin.css('display', 'none');
        formRegister.css('display', 'flex');
    });

    btnLogin.click((e) => {
        e.preventDefault();
        formLogin.css('display', 'flex');
        formRegister.css('display', 'none');
    });
}

