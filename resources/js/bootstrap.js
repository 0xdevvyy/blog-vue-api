
import { toggleSidebar, toggleDarkMode, initTheme } from './toggle';

window.toggleSidebar = toggleSidebar;
window.toggleDarkMode = toggleDarkMode;
document.addEventListener('DOMContentLoaded', () => {
    initTheme();
});
