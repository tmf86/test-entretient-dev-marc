document.addEventListener('DOMContentLoaded', function () {
    const contactForm = document.querySelector('#contact-form');
    contactForm.addEventListener('submit', validateForm);
    function validateForm() {
        const name = document.getElementById('name').value;
        if (name == "") {
            document.querySelector('.status').innerHTML = "veuillez renseigné ce champ";
            return false;
        }
        const email = document.getElementById('email').value;
        if (email == "") {
            document.querySelector('.status').innerHTML = "Email cannot be empty";
            return false;
        } else {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!re.test(email)) {
                document.querySelector('.status').innerHTML = "email non valid";
                return false;
            }
        }
        const subject = document.getElementById('subject').value;
        if (subject == "") {
            document.querySelector('.status').innerHTML = "Subject cannot be empty";
            return false;
        }
        const message = document.getElementById('message').value;
        if (message == "") {
            document.querySelector('.status').innerHTML = "veuillez renseigné ce champ";
            return false;
        }
        document.querySelector('.status').innerHTML = "Envoie...";
    }
});
