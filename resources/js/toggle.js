// Sidebar Toggle
export function toggleSidebar() { 
    const sidebar = document.getElementById('sidebar'); 
    const overlay = document.getElementById('sidebarOverlay');
    sidebar.classList.toggle('-translate-x-full'); 
    overlay.classList.toggle('hidden'); 
    document.body.classList.toggle('overflow-hidden'); 
}


// Dark Mode Toggle
export function toggleDarkMode() {
    const html = document.documentElement;
    const buttons = document.querySelectorAll('.theme-toggle');

    if (html.classList.contains('dark')) {
        html.classList.remove('dark');
        localStorage.theme = 'light';
    } else {
        html.classList.add('dark');
        localStorage.theme = 'dark';
    }

    buttons.forEach(button => {
        const lightIcon = button.querySelector('.light-icon');
        const darkIcon = button.querySelector('.dark-icon');

        if (html.classList.contains('dark')) {
            lightIcon.classList.add('hidden');
            darkIcon.classList.remove('hidden');
        } else {
            lightIcon.classList.remove('hidden');
            darkIcon.classList.add('hidden');
        }
    });
}


// Initialize theme on load
export function initTheme() {
    const html = document.documentElement;
    const buttons = document.querySelectorAll('.theme-toggle');

    const isDark =
        localStorage.theme === 'dark' ||
        (!('theme' in localStorage) &&
            window.matchMedia('(prefers-color-scheme: dark)').matches);

    html.classList.toggle('dark', isDark);

    buttons.forEach(button => {
        const lightIcon = button.querySelector('.light-icon');
        const darkIcon = button.querySelector('.dark-icon');

        if (isDark) {
            lightIcon.classList.add('hidden');
            darkIcon.classList.remove('hidden');
        } else {
            lightIcon.classList.remove('hidden');
            darkIcon.classList.add('hidden');
        }
    });
}