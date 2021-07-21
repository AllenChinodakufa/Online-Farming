const tableEditBtn = $("[data-action='edit']");
const tableDeleteBtn = $("[data-action='delete']");
const btnLogout = $("[data-action='logout']")

const loginValidate = function (formfield) {
    var check = false;

    $(`${formfield} button[type='submit']`).on("click", function () {
        console.log(check);
        if (check === true) {
            var ajax = new ajaxRequest();

            ajax.onreadystatechange = function () {

                if (ajax.readyState == 4 && ajax.status === 200) {
                    if (ajax.responseText) {
                        alert('SUCCESS!!', 'Account found, click ok to continue', 'main');
                    } else {
                        toast('OOPS!!', 'Please check your username and or password', 3000)
                    }
                }

            }
            ajax.open("POST", "../Config/loginvalidate.php");

            ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            ajax.send("username=" + $(`${formfield} input#username`).val() + "&password=" + $(`${formfield} input#password`).val());
        }
        return check;
    });

    $(`${formfield} input`).each(function () {

        $(this).on("keyup", function () {

            if ($(this).attr("type") == "email") {

                if ($(this).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                    $(this).next('.form-response').html("<span class='danger'>Invalid Entry, please try again</span>");
                    $(this).next('.form-response').attr('style', 'display: block');
                    check = false;
                } else {
                    $(this).next('.form-response').html("<span class='success'>Looks good</span>");
                    $(this).next('.form-response').attr('style', 'display: block');
                    check = true;
                }
            } else if ($(this).val().trim() == null || $(this).val().trim() == "" || $(this).val().trim().length == 0 || $(this).val().trim().length > Number($(this).attr("data-rule"))) {
                $(this).next('.form-response').html("<span class='danger'>Invalid Entry, please try again</span>");
                $(this).next('.form-response').attr('style', 'display: block');
                check = false;
            } else {
                $(this).next('.form-response').html("<span class='success'>Looks good</span>");
                $(this).next('.form-response').attr('style', 'display: block');
                check = true;
            }

        });
    });
}

const signupValidate = function (formfield) {
    var check = false;

    $(`${formfield} button[type='submit']`).on("click", function () {
        console.log(check);
        if (check === true) {
            var ajax = new ajaxRequest();

            ajax.onreadystatechange = function () {

                if (ajax.readyState == 4 && ajax.status === 200) {
                    if (ajax.responseText) {
                        console.log(ajax.responseText);
                        alert('SUCCESS!!', 'Account created, click ok to login and verify your account', 'login')
                    } else {
                        toast('OOPS!!', 'Account found, the account is already in use, please check your username and or password', 3000)
                    }
                }

            }
            ajax.open("POST", "../Config/signupvalidate.php");

            ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            ajax.send("username=" + $(`${formfield} input#username`).val() + "&password=" + $(`${formfield} input#password`).val());
        }
        return check;
    });

    $(`${formfield} input`).each(function () {

        $(this).on("keyup", function () {

            if ($(this).attr("type") == "email") {

                if ($(this).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                    $(this).next('.form-response').html("<span class='danger'>Invalid Entry, please try again</span>");
                    $(this).next('.form-response').attr('style', 'display: block');
                    check = false;
                } else {
                    $(this).next('.form-response').html("<span class='success'>Looks good</span>");
                    $(this).next('.form-response').attr('style', 'display: block');
                    check = true;
                }
            } else if ($(this).val().trim() == null || $(this).val().trim() == "" || $(this).val().trim().length == 0 || $(this).val().trim().length > Number($(this).attr("data-rule"))) {
                $(this).next('.form-response').html("<span class='danger'>Invalid Entry, please try again</span>");
                $(this).next('.form-response').attr('style', 'display: block');
                check = false;
            } else {
                $(this).next('.form-response').html("<span class='success'>Looks good</span>");
                $(this).next('.form-response').attr('style', 'display: block');
                check = true;
            }

        });
    });
}

const toast = function (header, message, duration) {
    const elem = `<div class="toast">
    <div class="toast-wrapper">
        <div class="toast-header">
            <h4>${header}</h4>
        </div>
        <div class="toast-message">
            <p>${message}</p>
        </div>
    </div>
    </div>`;
    $('body').append(elem);

    setTimeout(() => {
        $('.toast').remove();
    }, duration);
}
const logout = function (header, message) {

    const elem = `<div class="alert">
    <div class="alert-wrapper">
        <div class="alert-header">
            <h4>${header}</h4>
        </div>
        <div class="alert-body">
            <p>${message}</p>
        </div>
        <div class="alert-footer">
            <div class="alert-buttons">
                <a class="alert-button danger" data-action='dismiss'>
                    <i class="ion-ios-close-outline"></i>
                    <span>Cancel</span>
                </a>
                <a class="alert-button primary" data-action='ok'>
                    <i class="ion-ios-checkmark-outline"></i>
                    <span>Ok</span>
                </a>
            </div>
        </div>
    </div>
    </div>`;
    $('body').append(elem);

    $("[data-action='dismiss']").click(function () {
        $('.alert').remove();
    });
    $("[data-action='ok']").click(function () {
        window.location.href = `index.php`;
    });
}

const alert = function (header, message, location) {
    const elem = `<div class="alert">
    <div class="alert-wrapper">
        <div class="alert-header">
            <h4>${header}</h4>
        </div>
        <div class="alert-body">
            <p>${message}</p>
        </div>
        <div class="alert-footer">
            <div class="alert-buttons">
                <a class="alert-button danger" data-action='dismiss'>
                    <i class="ion-ios-close-outline"></i>
                    <span>Cancel</span>
                </a>
                <a class="alert-button primary" data-action='ok'>
                    <i class="ion-ios-checkmark-outline"></i>
                    <span>Ok</span>
                </a>
            </div>
        </div>
    </div>
    </div>`;
    $('body').append(elem);

    $("[data-action='dismiss']").click(function () {
        $('.alert').remove();
    });

    if (location !== null) {
        $("[data-action='ok']").click(function () {
            window.location.href = `${location}.php`;
        });
    } else {
        $("[data-action='ok']").click(function () {
            $('.alert').remove();
        });
    }
}

const toastLogout = function (header, message, duration) {
    const elem = `<div class="toast">
    <div class="toast-wrapper">
        <div class="toast-header">
            <h4>${header}</h4>
        </div>
        <div class="toast-message">
            <p>${message}</p>
        </div>
    </div>
    </div>`;
    $('body').append(elem);

    setTimeout(() => {
        $('.toast').remove();
        window.location.href = `index.php`;
    }, duration);
}

const alertLogout = function () {
    const elem = `<div class="alert">
    <div class="alert-wrapper">
        <div class="alert-header">
            <h4>ONLINE FARMING</h4>
        </div>
        <div class="alert-body">
            <p>Are you sure you would like to logout</p>
        </div>
        <div class="alert-footer">
            <div class="alert-buttons">
                <a class="alert-button danger" data-action='dismiss'>
                    <i class="ion-ios-close-outline"></i>
                    <span>Cancel</span>
                </a>
                <a class="alert-button primary" data-action='ok'>
                    <i class="ion-ios-checkmark-outline"></i>
                    <span>Ok</span>
                </a>
            </div>
        </div>
    </div>
    </div>`;
    $('body').append(elem);

    $("[data-action='dismiss']").click(function () {
        $('.alert').remove();
    });
    $("[data-action='ok']").click(function () {

        var ajax = new ajaxRequest();

        ajax.onreadystatechange = function () {

            if (ajax.readyState == 4 && ajax.status === 200) {
                toastLogout('SUCCESS', 'App will refresh in just a second', 3000);
            }

        }
        ajax.open("GET", "../Config/logout.php");

        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        ajax.send();
    });
}

const actionSheetStock = function (header, message) {
    const elem = `<div class="alert">
    <form class="alert-wrapper">
        <div class="alert-header">
            <h4>${header}</h4>
        </div>
        <div class="alert-body">
            <p>${message}</p>
            <div class="form-group">
                <label for="item">item:</label>
                <input id="item" type="text" placeholder="Your Item.." required="">
                <span class="form-response">
                    <span class="success">
                        <p>Looks good</p>
                    </span>
                </span>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input id="category" type="text" placeholder="Your Category.." required="">
                <span class="form-response">
                    <span class="success">
                        <p>Looks good</p>
                    </span>
                </span>
            </div>
            <div class="form-group">
                <label for="cost">Cost:</label>
                <input id="cost" type="text" placeholder="Your Cost.." required="">
                <span class="form-response">
                    <span class="success">
                        <p>Looks good</p>
                    </span>
                </span>
            </div>
        </div>
        <div class="alert-footer">
            <div class="alert-buttons">
                <a class="alert-button danger" data-action='dismiss'>
                    <i class="ion-ios-close-outline"></i>
                    <span>Cancel</span>
                </a>
                <a class="alert-button primary" data-action='submit'>
                    <i class="ion-ios-checkmark-outline"></i>
                    <span>Ok</span>
                </a>
            </div>
        </div>
    </form>
    </div>
    `;

    $('body').append(elem);
    validate('.alert>.alert-wrapper');

    $("[data-action='dismiss']").click(function () {
        $('.alert').remove();
    });

}

const ajaxRequest = function () {

    try {
        var req = new XMLHttpRequest();
    } catch (e1) {
        try {
            req = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e2) {
            try {
                req = new ActiveXObject("Msxml2.XMLHTPP");
            } catch (e3) {
                req = false;
            }
        }
    }
    return req;
}

tableDeleteBtn.click(function () {
    actionSheetStock('STOCK FARMING', 'So you really wanna edit this')
});

btnLogout.click(function () {
    alertLogout();
});

const validate = function (formfield) {

    var check = false;

    $(`${formfield}`).on("submit", function () {
        return check;
    });

    $(`${formfield}`).attr('onsubmit', 'false');
    $(`${formfield} [data-action='submit']`).on("click", function () {

        $(`${formfield}`).on("submit", function () {
            return check;
        });

    });

    $(`${formfield} input`).each(function () {

        $(this).on("keyup", function () {

            if ($(this).attr("type") == "email") {

                if ($(this).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                    $(this).next('.form-response').html("<span class='danger'>Invalid Entry, please try again</span>");
                    $(this).next('.form-response').attr('style', 'display: block');
                    check = false;
                } else {
                    $(this).next('.form-response').html("<span class='success'>Looks good</span>");
                    $(this).next('.form-response').attr('style', 'display: block');
                    check = true;
                }
            } else if ($(this).val().trim() == null || $(this).val().trim() == "" || $(this).val().trim().length == 0 || $(this).val().trim().length == Number($(this).attr("data-rule")) || $(this).val().trim().length > Number($(this).attr("data-rule"))) {
                $(this).next('.form-response').html("<span class='danger'>Invalid Entry, please try again</span>");
                $(this).next('.form-response').attr('style', 'display: block');
                check = false;
            } else {
                $(this).next('.form-response').html("<span class='success'>Looks good</span>");
                $(this).next('.form-response').attr('style', 'display: block');
                check = true;
            }

        });
    });

}


loginValidate('#login');

signupValidate('#register');
