// Gestion des menus déroulants au clic
document.addEventListener('DOMContentLoaded', function() {
  // Menu principal
  const dropdowns = document.querySelectorAll('.dropdown');
  
  dropdowns.forEach(dropdown => {
    dropdown.addEventListener('click', function(e) {
      e.stopPropagation();
      const menu = this.querySelector('.dropdown-menu');
      if (menu) menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    });
  });

  // Sous-menus
  const submenus = document.querySelectorAll('.dropdown-submenu');
  
  submenus.forEach(submenu => {
    submenu.addEventListener('click', function(e) {
      e.stopPropagation();
      const menu = this.querySelector('.dropdown-menu');
      if (menu) menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    });
  });

  // Fermer les menus quand on clique ailleurs
  document.addEventListener('click', function() {
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
      menu.style.display = 'none';
    });
  });
});
function searchFunction() {
    let input = document.getElementById("searchBar").value.toLowerCase();
    let items = document.querySelectorAll("#searchResults li");

    items.forEach(item => {
        let text = item.textContent.toLowerCase();
        item.style.display = text.includes(input) ? "block" : "none";
    });
}
document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.card');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(card => {
        observer.observe(card);
    });
});

