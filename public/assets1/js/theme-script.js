// Apply the saved theme settings from local storage
document.querySelector("html").setAttribute("data-layout-mode", localStorage.getItem('layoutMode') || 'light_mode');
document.querySelector("html").setAttribute('data-layout-style', localStorage.getItem('layoutStyle') || 'default');
document.querySelector("html").setAttribute('data-nav-color', localStorage.getItem('navColor') || 'light');

// Create sidebar settings panel using jQuery


document.addEventListener("DOMContentLoaded", function() {
    // Appending theme settings to the main wrapper
    $(".main-wrapper").append(themesettings);

    const themeRadios = document.querySelectorAll('input[name="themes"]');
    const layoutRadios = document.querySelectorAll('input[name="layout"]');
    const colorRadios = document.querySelectorAll('input[name="nav_color"]');
    const resetButton = document.getElementById('resetbutton');

    function setThemeAndLayoutSettings(theme, layout, color) {
        document.documentElement.setAttribute('data-layout-mode', theme);
        document.documentElement.setAttribute('data-layout-style', layout);
        document.documentElement.setAttribute('data-nav-color', color);

        localStorage.setItem('layoutMode', theme);
        localStorage.setItem('layoutStyle', layout);
        localStorage.setItem('navColor', color);
    }

    function handleInputChange() {
        const theme = document.querySelector('input[name="themes"]:checked')?.value;
        const layout = document.querySelector('input[name="layout"]:checked')?.value;
        const color = document.querySelector('input[name="nav_color"]:checked')?.value;

        if (theme && layout && color) {
            setThemeAndLayoutSettings(theme, layout, color);
        } else {
            console.error("One or more settings not found:", {
                theme,
                layout,
                color
            });
        }
    }

    function resetThemeAndLayoutSettings() {
        setThemeAndLayoutSettings('light_mode', 'default', 'light');

        // Reset radio buttons
        const lightThemeRadio = document.querySelector('input[name="themes"][value="light_mode"]');
        const defaultLayoutRadio = document.querySelector('input[name="layout"][value="default"]');
        const lightColorRadio = document.querySelector('input[name="nav_color"][value="light"]');

        if (lightThemeRadio) lightThemeRadio.checked = true;
        if (defaultLayoutRadio) defaultLayoutRadio.checked = true;
        if (lightColorRadio) lightColorRadio.checked = true;

        // Remove sidebar background setting if applicable
        localStorage.removeItem('sidebarBg');
    }

    // Initialize radio buttons based on saved settings
    const savedTheme = localStorage.getItem('layoutMode') || 'light_mode';
    const savedLayout = localStorage.getItem('layoutStyle') || 'default';
    const savedColor = localStorage.getItem('navColor') || 'light';

    const themeRadio = document.querySelector(`input[name="themes"][value="${savedTheme}"]`);
    const layoutRadio = document.querySelector(`input[name="layout"][value="${savedLayout}"]`);
    const colorRadio = document.querySelector(`input[name="nav_color"][value="${savedColor}"]`);

    if (themeRadio) themeRadio.checked = true;
    else console.error(`Theme radio button for value "${savedTheme}" not found.`);

    if (layoutRadio) layoutRadio.checked = true;
    else console.error(`Layout radio button for value "${savedLayout}" not found.`);

    if (colorRadio) colorRadio.checked = true;
    else console.error(`Color radio button for value "${savedColor}" not found.`);

    // Adding event listeners
    themeRadios.forEach(radio => radio.addEventListener('change', handleInputChange));
    layoutRadios.forEach(radio => radio.addEventListener('change', handleInputChange));
    colorRadios.forEach(radio => radio.addEventListener('change', handleInputChange));
    if (resetButton) resetButton.addEventListener('click', resetThemeAndLayoutSettings);
});

