
import { toggleSidebar, toggleDarkMode, initTheme } from './toggle';

window.toggleSidebar = toggleSidebar;
window.toggleDarkMode = toggleDarkMode;
document.addEventListener('DOMContentLoaded', () => {
    initTheme();
});


document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('blog_image');
    const preview = document.getElementById('image-preview');
    const text = document.getElementById('upload-text');

    input.addEventListener('change', (e) => {
        const file = e.target.files[0];

        if (!file) return;

        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');

        text.textContent = 'Change Image';
    });
});
