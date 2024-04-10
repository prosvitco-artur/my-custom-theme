alkima Theme Docs
-----------------

### Templates

#### Header: templates/header.php

This template is designed for the header section of a WordPress theme. It includes essential HTML structure along with PHP functions for dynamic content integration and actions for customization.

**Actions:**

*   **alkima\_theme\_head\_start:** Triggered at the beginning of the section. Use it for adding custom meta tags, stylesheets, or scripts.
    
*   **alkima\_theme\_head\_end:** Triggered at the end of the section. Ideal for additional scripts or meta tags.
    
*   **alkima\_theme\_body\_attr:** Add attributes to the tag.
    
*   **alkima\_theme\_header\_before:** Place custom content or scripts before the header.
    
*   **alkima\_theme\_header\_after:** Insert custom content or scripts after the header.
    
*   **alkima\_theme\_content\_before:** Customize content before the main section.
    
*   **alkima\_theme\_content\_top:** Add content or scripts at the top of the main section.
    

#### Footer: templates/footer.php

**Actions:**

*   **alkima\_theme\_content\_bottom:** This line calls for any actions hooked to the 'alkima\_theme\_content\_bottom' hook. This allows developers to inject custom functionality or content at the bottom of the main content area of the website.
    
*   **alkima\_theme\_footer\_before:** Here, the code executes any actions associated with the 'alkima\_theme\_footer\_before' hook. This can be utilized to add custom elements or scripts just before the footer section.
    
*   **alkima\_theme\_footer\_after:** Similar to the 'alkima\_theme\_footer\_before' hook, this line triggers any actions hooked to the 'alkima\_theme\_footer\_after' hook. Developers can utilize this hook to insert additional content or scripts immediately after the footer section.
    
*   **alkima\_theme\_footer\_class:** This action is triggered to add classes to your footer element. You can assign these classes for styling or identifying elements through JavaScript.
    
*   **alkima\_theme\_footer\_top:** This action is triggered before outputting the top part of your footer block. You can use this action to add additional content, scripts, or functionality to your footer.
    
*   **alkima\_theme\_footer\_middle:** This action is triggered between outputting the top and bottom parts of your footer block. You can use it to insert additional content or perform specific tasks.
    
*   **alkima\_theme\_footer\_bottom:** This action is triggered before outputting the bottom part of your footer block. It provides an opportunity to add content or functionality related to the bottom part of your footer.
    
*   **alkima\_theme\_footer\_bottom\_after:** This action is triggered after outputting the bottom part of your footer block. You can use this action to add additional content, scripts, or functionality after the footer block.
    
*   **alkima\_theme\_footer\_after:** This action is triggered at the end of your footer block. You can use it to perform final actions or add additional content.
    

#### Archive: template-parts.php

**Actions:**

*   **alkima\_theme\_archive\_container\_classes:** This action allows developers to add custom classes to the container div surrounding the archive content. It provides flexibility in styling or targeting specific archive pages with CSS or JavaScript.
    
*   **alkima\_theme\_start\_archive\_template:** This action is triggered at the beginning of the archive template. Developers can use this hook to insert additional content or functionality before the main archive content is displayed.
    
*   **alkima\_theme\_archive\_section\_classes:** Similar to the container classes action, this action allows developers to add custom classes to the section element containing the archive loop. It provides additional control over the styling and layout of the archive section.
    
*   **alkima\_theme\_before\_archive\_loop:** This action is called before the archive loop starts. Developers can utilize this hook to inject custom content or functionality immediately before the loop begins.
    
*   **alkima\_theme\_after\_archive\_loop:** This action is triggered twice within the archive loop: once after displaying the loop content and once after rendering the pagination. Developers can use this hook to add custom content or functionality after each loop iteration or after the pagination.
    
*   **alkima\_theme\_end\_archive\_template:** This action marks the end of the archive template. It allows developers to insert any final content or functionality at the end of the archive page.
    

### Single post content: template-parts/content-post.php

**Actions:**

*   **alkima\_theme\_archive\_card\_classes:** This action allows developers to add custom classes to the
    
    element representing the post card. Developers can use this action to apply specific styling to post cards based on certain criteria or design preferences.
    
*   **alkima\_theme\_archive\_card\_attributes:** This action provides developers with the ability to add additional attributes to the
    
    element of the post card. It enables developers to include custom attributes such as data attributes or aria roles to enhance accessibility or functionality.
    
*   **alkima\_theme\_archive\_card\_start\_title:** Triggered at the beginning of the post title section within the post card. Developers can utilize this action to inject custom content or functionality before the post title is displayed.
    
*   **alkima\_theme\_archive\_card\_before\_title:** Triggered before outputting the post title. Developers can use this action to add custom content or functionality immediately before the post title is displayed.
    
*   **alkima\_theme\_archive\_card\_after\_title:** Triggered after outputting the post title. Developers can leverage this action to insert custom content or functionality after the post title is displayed.
    
*   **alkima\_theme\_archive\_card\_after\_content:** Triggered after outputting the post content section (in this case, the post excerpt). Developers can use this action to add custom content or functionality after the post excerpt is displayed.
    

### Light-Dark mode

Switching between light and dark themes is implemented using the Bootstrap framework. The script responsible for this functionality is located at the path (static/public/switch-dark.js).

*   **getCookie(name):** This function is intended to retrieve the value of a cookie by name.
    
*   **setCookie(name, value, days):** Function to set the value of a cookie with a specified name, value, and expiration period in days.
    
*   **getPreferredTheme():** Determines the preferred theme (light or dark) based on the value of the 'theme' cookie or browser settings.
    
*   **setTheme(theme):** Sets the selected theme for the website and updates the value of the 'theme' cookie.
    
*   **showActiveTheme(theme):** Shows which theme is active, according to the current state. If the dark theme is selected, it marks the switch on the page.
    
*   **toggleTheme():** Changes the theme to the opposite one (from dark to light or from light to dark) when the switch is clicked.
    
*   **handleThemeChange():** Handles changes in the preferred theme in the browser settings and sets the corresponding theme.
    
*   Sets event handlers for the theme switch and monitors changes in the preferred theme in the browser.
    
*   Performs the initial theme setup when the page is loaded.
    

### HTML code responsible for displaying the theme switch on the page:


     add_action('alkima_theme_header_after_menu', 'alkima_theme_dark_mode_switch');
     function alkima_theme_dark_mode_switch() { ?>
        <div class="dark-mode-switch form-check form-switch d-flex align-items-center">
            <input class="form-check-input cursor-pointer" type="checkbox" id="toggleDarkMode" 
                <?= (isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark') ? 'checked' : ''; ?>>
            <label class="form-check-label visually-hidden" for="toggleDarkMode">
                <?php _e('Toggle theme', 'alkima_theme'); ?>
            </label>
       </div>
     <?php } ?>
-----------------
## Explanation of HTML elements:

*   <div class="dark-mode-switch form-check form-switch d-flex align-items-center">: Wrapper for the theme switch elements. Sets styles and alignment.
*   <input class="form-check-input cursor-pointer" type="checkbox" id="toggleDarkMode" <?= (isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark') ? 'checked' : ''; ?>>: The checkbox itself for toggling the theme. If the user has a dark theme set (based on the value of the 'theme' cookie), the checkbox will be checked.
*   <label class="form-check-label visually-hidden" for="toggleDarkMode"><?php _e('Toggle theme', 'alkima_theme'); ?></label>: Label for the checkbox that is not displayed on the page (visually-hidden) but provides a link between the checkbox and the text "Toggle theme". The text "Toggle theme" can be localized (translated) using the _e() function.

To replace the appearance of the switch, you need to remove the hook. For example:

    add_action('wp_loaded', function(){
        remove_action('alkima_theme_header_after_menu', 'alkima_theme_dark_mode_switch');
    });
    
And display a new switch elsewhere.