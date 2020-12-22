grecaptcha.ready(function() {
    grecaptcha.execute('6LcOFcUUAAAAACxL0G1pQBRKL52GS4vU_8gE18RR', {action: 'homepage'}).then(function(token) {
        document.getElementById('g-recaptcha-responce').value=token;
    });
});