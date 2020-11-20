const hamburger = document.querySelector('.hamburger'),
      menu = document.querySelector('.menu'),
      closeElem = document.querySelector('.menu__close')
      anchors = document.querySelectorAll('a[href*="#"]');
    
hamburger.addEventListener('click', () => {
    menu.classList.add('active');
});

closeElem.addEventListener('click', () => {
    menu.classList.remove('active');
});

const percent = document.querySelectorAll('.skills__percent'),
      line = document.querySelectorAll('.skills__level__bgline-line')

percent.forEach( (item, i) => {
    line[i].style.width = item.innerHTML;
});

for (let anchor of anchors) {
    anchor.addEventListener('click', function (e) {
      e.preventDefault()
      
      const blockID = anchor.getAttribute('href').substr(1)
      
      document.getElementById(blockID).scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      })
    })
  }

//Validate
function valideForm(form){
    $(form).validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            } 
        },
        messages: {
            name: "Please specify your name",
            email: {
              required: "We need your email address to contact you",
              email: "Your email address must be in the format of name@domain.com"
            }
        }
    })
}

valideForm('#send-form')
/* valideForm('#send form')
valideForm('#order form') */

//Letters
$('form').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "mailer/smart.php",
        data: $(this).serialize(),
    })
    return false;
});