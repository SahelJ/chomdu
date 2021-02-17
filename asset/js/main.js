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
    initForm('.form-forgot');
    initForm('.form-recovery');
    initForm('.form-login', (response) => {
        if (response.errors) loginErrorHandler('.form-login', response.errors);
    })
    initForm('.form-register', (response) => {
        if (response.errors) loginErrorHandler('.form-register', response.errors);
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

const loginErrorHandler = (parent, errors) => {
    $.each(errors, (key, value) => {
        $(`${parent} [name="${key}"]`).addClass('error').focus((e) => $(e.target).removeClass('error'))
    });
}
const initForm = (formClass, successHandler = () => {}) => {
    const form = $(formClass);
    form.on('submit', (e) => {
        e.preventDefault();
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            dataType: 'json',
            success: (response) => {
                successHandler(response);
                if (response.success) {
                    if (!$('.btn[type="submit"]').hasClass('btn-success')) {
                        $('.btn[type="submit"]').toggleClass('btn-success').css('cursor', 'not-allowed');

                    }
                } else {
                    if (!$('.btn[type="submit"]').hasClass('btn-error')) {
                        $('.btn[type="submit"]').toggleClass('btn-error');
                        setTimeout(() => {
                            $('.btn[type="submit"]').toggleClass('btn-error');
                        }, 2000)
                    }
                }
                initError(response.errors);
            },
            error: () => {
                if (!$('.btn[type="submit"]').hasClass('btn-error')) {
                    $('.btn[type="submit"]').toggleClass('btn-error');
                    setTimeout(() => {
                        $('.btn[type="submit"]').toggleClass('btn-error');
                    }, 2000)
                }
            }
        })
    });
}

const initError = (errors) => {
    const errorContainer = $('.errors-wrapper .errors-container');
    $.each(errors, (key, value) => {
        errorContainer.append(`
		<div class="error-item">
		  <h6>Une erreur est survenue</h6>
		  <p><span>${key}</span>: ${value}</p>
		  <div class="btn btn-white" onclick="$(this).parent().remove();">Fermer</div>
		</div>
	  `)
    });
}