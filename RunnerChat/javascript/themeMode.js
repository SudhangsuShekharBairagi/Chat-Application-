
document.addEventListener('DOMContentLoaded', () => {

  const themeToggle = document.getElementById('theme-toggle');
  const body = document.body;
  const themeIcon = document.querySelector('#theme-toggle-icon i');


  if (localStorage.getItem('dark-mode') === 'enabled') {
    body.classList.add('dark-mode');
    themeIcon.classList.replace('fa-moon', 'fa-sun');
  }


  themeToggle.addEventListener('change', () => {
    body.classList.toggle('dark-mode');

    if (body.classList.contains('dark-mode')) {
      localStorage.setItem('dark-mode', 'enabled');
      themeIcon.classList.replace('fa-moon', 'fa-sun');
    } else {
      localStorage.setItem('dark-mode', 'disabled');
      themeIcon.classList.replace('fa-sun', 'fa-moon');
    }
  });


});





