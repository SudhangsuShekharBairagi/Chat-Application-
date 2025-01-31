document.addEventListener("DOMContentLoaded", () => {
  const cardRipple = document.querySelector(".Mybtn,.form form .button,.container .form .feedbackFormAni form .button input");

  cardRipple.addEventListener("mouseover", (e) => {
    const x = e.pageX - cardRipple.offsetLeft;
    const y = e.pageY - cardRipple.offsetTop;

    cardRipple.style.setProperty("--posX", x + "px");
    cardRipple.style.setProperty("--posY", y + "px");
  });

  // ripple anumation on card 
  const cards = document.querySelectorAll('.featuresCard,.feedbackForm');
  let lastScrollY = window.scrollY;


  function isScrollingDown() {
    const currentScrollY = window.scrollY;
    const isScrollingDown = currentScrollY > lastScrollY;
    lastScrollY = currentScrollY;
    return isScrollingDown;
  }


  function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return rect.top < window.innerHeight && rect.bottom > 0;
  }


  function applyRippleEffect() {
    const scrollingDown = isScrollingDown();

    cards.forEach(card => {
      if (isInViewport(card)) {

        if (!card.classList.contains('scroll-ripple')) {
          const ripple = card.querySelector('::before');


          if (scrollingDown) {

            card.style.setProperty('--ripple-x', '0%');
            card.style.setProperty('--ripple-y', '0%');
          } else {

            card.style.setProperty('--ripple-x', '100%');
            card.style.setProperty('--ripple-y', '100%');
          }


          card.classList.add('scroll-ripple');
        }
      } else {

        card.classList.remove('scroll-ripple');
      }
    });
  }

  // Listen for the scroll event and apply the ripple effect
  window.addEventListener('scroll', applyRippleEffect);

  // Apply ripple effect on page load to handle already visible cards
  applyRippleEffect();

});
