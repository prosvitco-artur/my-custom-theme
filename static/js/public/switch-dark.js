(() => {
    'use strict';

    const getCookie = (name) => {
        const cookies = document.cookie.split('; ');
        for (const cookie of cookies) {
            const [cookieName, cookieValue] = cookie.split('=');
            if (cookieName === name) {
                return cookieValue;
            }
        }
        return null;
    };

    const setCookie = (name, value, days) => {
        let expires = '';
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = `; expires=${date.toUTCString()}`;
        }
        document.cookie = `${name}=${value || ''}${expires}; path=/`;
    };

    const getPreferredTheme = () => {
        const storedTheme = getCookie('theme');
        return storedTheme || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
    };

    const setTheme = (theme) => {
        document.documentElement.setAttribute('data-bs-theme', theme);
        setCookie('theme', theme, 365); // Зберігаємо тему в куках на 365 днів
    };

    const showActiveTheme = (theme) => {
        const themeToggler = document.querySelector('#toggleDarkMode');
        if (!themeToggler) return;

        const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`);

        document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
            element.classList.remove('active');
            element.setAttribute('aria-pressed', 'false');
        });
        if(!btnToActive) return;
        
        btnToActive.classList.add('active');
        btnToActive.setAttribute('aria-pressed', 'true');
        themeToggler.setAttribute('aria-label', `Toggle theme (${btnToActive.dataset.bsThemeValue})`);
    };

    const toggleTheme = () => {
        const currentTheme = document.documentElement.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        setTheme(newTheme);
        showActiveTheme(newTheme);
    };

    const themeSwitcher = document.getElementById('toggleDarkMode');
    if (themeSwitcher) {
        themeSwitcher.addEventListener('click', toggleTheme);
    }

    const handleThemeChange = () => {
        const preferredTheme = getPreferredTheme();
        console.log('Theme changed to', preferredTheme);
        setTheme(preferredTheme);
        showActiveTheme(preferredTheme);
    };

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', handleThemeChange);

    const initialTheme = getPreferredTheme();
    setTheme(initialTheme);
    showActiveTheme(initialTheme);

})();
