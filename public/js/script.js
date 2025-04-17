
    // Toggle dropdown menu
    function toggleDropdown() {
        const menu = document.getElementById('user-menu');
        menu.classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    window.addEventListener('click', function(e) {
        const menu = document.getElementById('user-menu');
        const button = document.getElementById('user-menu-button');
        
        if (!button.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
        }
    });

    // Toggle mobile menu
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOpen = document.getElementById('menu-open');
        const menuClose = document.getElementById('menu-close');
        
        mobileMenu.classList.toggle('hidden');
        menuOpen.classList.toggle('hidden');
        menuClose.classList.toggle('hidden');
    }
    
    function toggleNotificationDropdown() {
        const dropdown = document.getElementById('notification-dropdown');
        dropdown.classList.toggle('hidden');
    }

    function toggleDropdown() {
        const menu = document.getElementById('user-menu');
        menu.classList.toggle('hidden');
    }

    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('menu-open');
        const closeIcon = document.getElementById('menu-close');

        mobileMenu.classList.toggle('hidden');
        openIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    }

    // Optional: klik di luar dropdown untuk menutup
    document.addEventListener('click', function (event) {
        const notifButton = event.target.closest('[onclick="toggleNotificationDropdown()"]');
        const notifDropdown = document.getElementById('notification-dropdown');
        if (!notifButton && !event.target.closest('#notification-dropdown')) {
            notifDropdown?.classList.add('hidden');
        }
    });


