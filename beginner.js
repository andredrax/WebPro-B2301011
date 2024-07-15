window.addEventListener('scroll', function() {
    var sections = document.querySelectorAll('.section');
    var navLinks = document.querySelectorAll('nav a');

    sections.forEach(function(section, index) {
        var rect = section.getBoundingClientRect();
        if (rect.top >= 0 && rect.top < window.innerHeight) {
            navLinks.forEach(function(link) { link.classList.remove('active'); });
            navLinks[index].classList.add('active');
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll('.section');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });

    sections.forEach(section => {
        observer.observe(section);
    });
});
