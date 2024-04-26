import './bootstrap';
import Alpine from 'alpinejs'
 
window.Alpine = Alpine
 
Alpine.start()

document.addEventListener("DOMContentLoaded", function () {
    const tabLinks = document.querySelectorAll('.tab-link');
    const tabContents = document.querySelectorAll('.tab-content');
    const sidebarLinks = document.querySelectorAll('.sidebar-link');

    // Function to handle tab link click
    function handleTabClick(event) {
        event.preventDefault();

        const target = this.getAttribute('data-tab');
        const href = this.getAttribute('href');

        // Remove active class from all tab links
        tabLinks.forEach(link => {
            link.classList.remove('active');
        });

        // Remove active class from all tab contents
        tabContents.forEach(content => {
            content.style.display = 'none';
        });

        // Add active class to the clicked tab link
        this.classList.add('active');

        // Show the selected tab content
        document.getElementById(target + '-content').style.display = 'block';

        // Redirect to the corresponding page or view
        if (href) {
            window.location.href = href;
        }
    }

    // Add click event listeners to sidebar links
    sidebarLinks.forEach(link => {
        link.addEventListener('click', handleTabClick);
    });
});