# Developer Documentation - Rivers Area Memory Café WordPress Theme

## Technical Overview

This is a custom WordPress theme built from scratch for Rivers Area Memory Café, a nonprofit organization providing support for individuals with memory loss and their caregivers.

**Theme Information:**
- **Theme Name:** Rivers Area Memory Café
- **Text Domain:** `ramcafe`
- **Version:** 1.0.0
- **Requires:** WordPress 6.0+, PHP 7.4+
- **License:** GPL v2 or later

---

## File Structure

```
ramcafe/
├── style.css                    # Main stylesheet with all theme styles
├── functions.php                # Theme setup and functionality
├── header.php                   # Site header template
├── footer.php                   # Site footer template
├── index.php                    # Blog archive template
├── front-page.php              # Homepage template
├── page.php                     # Default page template
├── single.php                   # Single post template
├── page-contact.php            # Contact page template
├── page-events.php             # Events page template (NEW)
├── page-about.php              # About/Mission page template (NEW)
├── sidebar.php                  # Sidebar template
├── searchform.php              # Search form template
├── 404.php                      # 404 error page
│
├── template-parts/
│   ├── content.php             # Blog post content
│   ├── content-single.php      # Single post content
│   ├── content-page.php        # Page content
│   └── content-none.php        # No content found message
│
├── inc/
│   └── template-tags.php       # Helper functions for templates
│
├── js/
│   └── navigation.js           # Mobile menu toggle functionality
│
├── css/                         # (Empty - for additional stylesheets if needed)
├── fonts/                       # Custom brand fonts (needs setup)
├── images/                      # Theme images and assets
│
├── README.md                    # User documentation
├── PLUGINS-RECOMMENDED.md       # Plugin recommendations
└── DEVELOPER-NOTES.md          # This file
```

---

## Brand Specifications

### Colors
```css
--color-terracotta: #CE593A;    /* Primary: headings, buttons, accents */
--color-olive-green: #9AA37B;   /* Footer background */
--color-teal: #96A37B;          /* Links, secondary elements */
--color-beige: #EBDFCA;         /* Header, highlight sections */
```

### Typography
- **Primary Font:** Accia Piano Bold (for headings) - **NEEDS SETUP**
- **Secondary Font:** Deuterium Medium (for tagline) - **NEEDS SETUP**
- **Body Font:** System font stack (fallback)

### Design Notes
- Nature-inspired aesthetic with warm, welcoming colors
- Accessible design with good contrast ratios
- Mobile-first responsive design
- Tree/arch logo with river waves (client to provide)

---

## Setting Up Custom Fonts

The theme references two custom fonts that need to be installed:

### 1. Obtain Font Files
Client should provide:
- `accia-piano-bold.woff2` and `.woff` files
- `deuterium-medium.woff2` and `.woff` files

### 2. Add Font Files
Place font files in the `/fonts` directory.

### 3. Add Font Face Declarations
Add this code to the **top** of `style.css` (after the theme header, before `:root`):

```css
/* ==========================================================================
   CUSTOM FONTS
   ========================================================================== */

@font-face {
  font-family: 'Accia Piano Bold';
  src: url('fonts/accia-piano-bold.woff2') format('woff2'),
       url('fonts/accia-piano-bold.woff') format('woff');
  font-weight: bold;
  font-style: normal;
  font-display: swap;
}

@font-face {
  font-family: 'Deuterium Medium';
  src: url('fonts/deuterium-medium.woff2') format('woff2'),
       url('fonts/deuterium-medium.woff') format('woff');
  font-weight: 500;
  font-style: normal;
  font-display: swap;
}
```

**Note:** The CSS already references these fonts in the `:root` variables, so once declared, they'll work immediately.

---

## Theme Features

### Core WordPress Support
- Title tag support
- Post thumbnails (featured images)
- Custom logo
- Custom header
- Custom background
- HTML5 markup
- Block editor styles
- Responsive embeds
- Automatic feed links
- Navigation menus (2 locations: primary, footer)

### Custom Features
- **Customizer Options:**
  - Contact information (phone, email, address)
  - Social media links (Facebook, Instagram)
  - Custom logo upload
  - Header image
  - Background color

- **Widget Areas:**
  - Footer Area 1, 2, 3 (three-column footer)
  - Sidebar (for blog posts)

- **Custom Page Templates:**
  - Contact Page (`page-contact.php`)
  - Events Page (`page-events.php`) - with built-in monthly meeting info
  - About/Mission Page (`page-about.php`) - with values and mission sections

### Security Features
- Proper escaping functions used throughout
- Sanitization of user inputs
- WordPress version removed from head
- Nonce verification where needed (if expanded)

---

## Key Functions Reference

### In `functions.php`:

#### `ramcafe_setup()`
- Theme initialization
- Registers menus, image sizes, theme support features

#### `ramcafe_scripts()`
- Enqueues stylesheets and JavaScript
- Loads navigation.js for mobile menu

#### `ramcafe_widgets_init()`
- Registers 4 widget areas (3 footer, 1 sidebar)

#### `ramcafe_customize_register( $wp_customize )`
- Adds customizer sections for contact info and social media

#### `ramcafe_social_links()`
- Outputs social media icons with inline SVG
- Call with: `ramcafe_social_links();`

#### Helper Functions
- `ramcafe_excerpt_length()` - Limits excerpts to 30 words
- `ramcafe_excerpt_more()` - Custom "Read More" link
- `ramcafe_body_classes()` - Adds helpful body classes

### In `inc/template-tags.php`:

#### `ramcafe_posted_on()`
- Displays post date with formatted output

#### `ramcafe_posted_by()`
- Displays post author information

#### `ramcafe_entry_footer()`
- Shows categories, tags, and comment count

#### `ramcafe_post_thumbnail()`
- Displays featured image with proper markup

---

## Page Template Usage

### Homepage (front-page.php)
Automatically used when:
- Settings > Reading > Homepage is set to a static page

Features:
- Hero section with welcome message
- Mission statement callout
- Three-column "what we offer" section
- Upcoming events highlight
- Call-to-action buttons

### Contact Page (page-contact.php)
To use:
1. Create a page (e.g., "Contact Us")
2. In Page Attributes > Template, select "Contact Page"
3. Content will auto-populate from Customizer settings

Displays:
- Contact form (if Contact Form 7 plugin installed with shortcode in content)
- Contact information from Customizer
- Social media links
- Google Maps embed area (commented out - needs API key)

### Events Page (page-events.php)
To use:
1. Create a page titled "Events"
2. In Page Attributes > Template, select "Events Page"
3. Add intro content in the page editor

Features:
- Auto-displays monthly meeting details (third Tuesday, 1-3pm, YMCA)
- Integrates with The Events Calendar plugin if installed
- Fallback to display recent posts from "Events" category
- Contact section with CTA

### About/Mission Page (page-about.php)
To use:
1. Create a page (e.g., "About Us" or "Our Mission")
2. In Page Attributes > Template, select "About/Mission Page"
3. Write mission statement in page content

Features:
- Mission statement callout section
- "What is a Memory Café" explanation
- Who we serve section
- Core values display with icons
- Get involved CTA section

---

## Recommended Plugins

See [PLUGINS-RECOMMENDED.md](PLUGINS-RECOMMENDED.md) for full details.

**Essential:**
1. **The Events Calendar** - For recurring monthly meetings and special events
2. **Contact Form 7** - Simple, reliable contact forms
3. **Yoast SEO** - Search engine optimization
4. **UpdraftPlus** - Automated backups
5. **Wordfence Security** - Security and firewall

**Optional:**
- GiveWP (donations)
- Smush (image optimization)
- WP Accessibility (accessibility improvements)
- Site Kit by Google (analytics)

---

## Integration Notes

### The Events Calendar Plugin
The Events page template (`page-events.php`) is designed to work with The Events Calendar plugin.

**Integration checks:**
```php
if ( function_exists( 'tribe_events' ) ) {
    // Plugin is active - display calendar
} else {
    // Fallback - display recent posts from "Events" category
}
```

**To create the recurring monthly meeting:**
1. Install The Events Calendar
2. Go to Events > Add New
3. Set:
   - Title: "Monthly Memory Café Meeting"
   - Recurrence: Monthly on third Tuesday
   - Time: 1:00 PM - 3:00 PM
   - Venue: Fergus Falls YMCA

### Contact Form 7
To add contact form to Contact page:
1. Install Contact Form 7
2. Contact > Contact Forms > Copy shortcode
3. Edit Contact page
4. Add Shortcode block
5. Paste: `[contact-form-7 id="123" title="Contact form 1"]`

---

## Customizer Settings

Access: **Appearance > Customize**

### Site Identity
- Upload logo (recommended: 400×100px)
- Set site title and tagline
- Site icon (favicon)

### Contact Information (Custom Section)
- Phone number
- Email address
- Address (defaults to "Fergus Falls YMCA")

### Social Media Links (Custom Section)
- Facebook URL
- Instagram URL

**Retrieving in templates:**
```php
$phone = get_theme_mod( 'ramcafe_phone' );
$email = get_theme_mod( 'ramcafe_email' );
$address = get_theme_mod( 'ramcafe_address', 'Fergus Falls YMCA' );
$facebook = get_theme_mod( 'ramcafe_facebook' );
$instagram = get_theme_mod( 'ramcafe_instagram' );
```

---

## Navigation Menus

**Registered Locations:**
1. **Primary Menu** - Main navigation in header
2. **Footer Menu** - Secondary links in footer

**Setup:** Appearance > Menus

**Code reference:**
```php
// Display primary menu
wp_nav_menu( array(
    'theme_location' => 'primary',
    'menu_id'        => 'primary-menu',
) );

// Display footer menu
wp_nav_menu( array(
    'theme_location' => 'footer',
    'menu_id'        => 'footer-menu',
) );
```

---

## Widget Areas

**Registered Sidebars:**
1. `footer-1` - Footer Area 1 (left column)
2. `footer-2` - Footer Area 2 (middle column)
3. `footer-3` - Footer Area 3 (right column)
4. `sidebar-1` - Sidebar (appears on blog posts)

**Code reference:**
```php
if ( is_active_sidebar( 'footer-1' ) ) {
    dynamic_sidebar( 'footer-1' );
}
```

---

## Responsive Breakpoints

```css
/* Tablet and below */
@media screen and (max-width: 768px) {
    /* Mobile menu toggle appears */
    /* Single column layouts */
}

/* Mobile */
@media screen and (max-width: 480px) {
    /* Reduced spacing */
    /* Smaller typography */
}
```

**Container widths:**
- Max width: 1200px (default)
- Narrow width: 800px (for content-focused pages)

---

## Mobile Menu

JavaScript handles mobile menu toggle:
- File: `js/navigation.js`
- Adds/removes `.toggled` class
- Menu hidden by default on mobile
- Toggle button appears at 768px and below

**HTML structure:**
```html
<button class="menu-toggle" aria-controls="primary-menu">
    Menu
</button>
<nav class="main-navigation">
    <!-- Menu items -->
</nav>
```

---

## Extending the Theme

### Adding a New Page Template

1. Create file: `page-[name].php`
2. Add template header:
```php
<?php
/**
 * Template Name: Your Template Name
 */
```
3. Include header and footer:
```php
get_header();
// Your content
get_footer();
```

### Adding Custom Post Types

Add to `functions.php`:
```php
function ramcafe_custom_post_types() {
    register_post_type( 'resource', array(
        'labels' => array(
            'name' => 'Resources',
            'singular_name' => 'Resource',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest' => true,
    ));
}
add_action( 'init', 'ramcafe_custom_post_types' );
```

### Adding Shortcodes

Example shortcode function:
```php
function ramcafe_meeting_info_shortcode() {
    return '<div class="meeting-info">Third Tuesday, 1-3pm at Fergus Falls YMCA</div>';
}
add_shortcode( 'meeting_info', 'ramcafe_meeting_info_shortcode' );
```

Usage: `[meeting_info]`

---

## Code Standards

### Escaping Functions Used
- `esc_html()` - Plain text output
- `esc_attr()` - HTML attribute values
- `esc_url()` - URLs
- `wp_kses_post()` - Post content with allowed HTML

### Translation Functions
- `esc_html__()` - Translate and escape text
- `esc_attr__()` - Translate and escape attribute
- `esc_html_e()` - Translate, escape, and echo

**Text domain:** `ramcafe`

### WordPress Coding Standards
Theme follows WordPress PHP Coding Standards:
- Proper indentation (tabs for indentation, spaces for alignment)
- Meaningful variable names
- Inline documentation
- Security best practices

---

## Accessibility Features

- Semantic HTML5 elements
- Skip links for screen readers
- Proper heading hierarchy
- ARIA labels on interactive elements
- Keyboard navigation support
- High contrast color ratios
- Alt text support for images
- Focus states on interactive elements

**Screen reader text:**
```css
.screen-reader-text {
    clip: rect(1px, 1px, 1px, 1px);
    position: absolute !important;
    height: 1px;
    width: 1px;
    overflow: hidden;
}
```

---

## Performance Optimization

### Already Implemented
- System font stack with custom font fallbacks
- CSS custom properties (CSS variables)
- Minimal JavaScript (only navigation.js)
- No external dependencies (jQuery-free)
- Semantic, clean HTML

### Recommended Additions
1. **Image Optimization:** Install Smush plugin
2. **Caching:** Install WP Super Cache or W3 Total Cache
3. **CDN:** Consider Cloudflare for static assets
4. **Minification:** Consider Autoptimize plugin for CSS/JS
5. **Lazy Loading:** Built into WordPress 5.5+ for images

---

## SEO Considerations

### Built-In
- Semantic HTML structure
- Proper heading hierarchy
- Clean URL structure support
- Schema markup ready (can be added)

### Recommended
- Install Yoast SEO plugin
- Set up Google Search Console
- Create XML sitemap (Yoast handles this)
- Add Open Graph tags (Yoast handles this)

---

## Deployment Checklist

### Before Launch
- [ ] Install and configure recommended plugins
- [ ] Set up custom fonts (if font files available)
- [ ] Upload and set custom logo
- [ ] Configure Customizer settings (contact info, social media)
- [ ] Create primary navigation menu
- [ ] Create key pages (Home, About, Events, Contact)
- [ ] Assign page templates to appropriate pages
- [ ] Set static homepage (Settings > Reading)
- [ ] Configure The Events Calendar plugin
- [ ] Create recurring monthly meeting event
- [ ] Set up contact form
- [ ] Configure backup plugin
- [ ] Test mobile responsiveness
- [ ] Test all forms and links
- [ ] Check accessibility with WAVE tool
- [ ] Add favicon (Site Identity > Site Icon)
- [ ] Test 404 page
- [ ] Configure SEO plugin

### Post-Launch
- [ ] Set up Google Analytics (Site Kit plugin)
- [ ] Submit sitemap to Google Search Console
- [ ] Monitor site performance
- [ ] Set up automated backups
- [ ] Train staff on content updates

---

## Common Tasks

### Updating Brand Colors
Edit the `:root` section in `style.css`:
```css
:root {
  --color-terracotta: #CE593A;
  --color-olive-green: #9AA37B;
  /* etc. */
}
```

### Changing Default Excerpt Length
Edit in `functions.php`:
```php
function ramcafe_excerpt_length( $length ) {
    return 30; // Change this number
}
```

### Adding Footer Widget Content
1. Go to Appearance > Widgets
2. Add widgets to Footer Area 1, 2, or 3
3. Common widgets: Text, Recent Posts, Categories, Custom HTML

### Changing Monthly Meeting Info
Edit the regular meeting section in `page-events.php` (around line 58)

---

## Troubleshooting

### Fonts Not Loading
- Check font files exist in `/fonts` directory
- Verify font file paths in CSS `@font-face` declarations
- Check browser console for 404 errors
- Ensure WOFF2 and WOFF formats are provided

### Mobile Menu Not Working
- Check that `navigation.js` is enqueued
- Verify `.menu-toggle` button exists in header
- Check browser console for JavaScript errors
- Clear browser cache

### Widget Areas Not Showing
- Verify widget area is registered in `functions.php`
- Check if widgets are added in Appearance > Widgets
- Ensure `is_active_sidebar()` check is in template

### Custom Page Template Not Appearing
- Check template header comment is present
- Verify file is in theme root directory
- Clear WordPress cache
- Refresh permalinks (Settings > Permalinks > Save)

---

## Support and Maintenance

### WordPress Updates
- Keep WordPress core updated
- Update plugins regularly
- Update theme if customizations are made
- Always backup before updating

### Browser Testing
Recommended testing browsers:
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile Safari (iOS)
- Chrome Mobile (Android)

### Recommended Monitoring
- Weekly backup verification
- Monthly plugin updates
- Quarterly security scans
- Annual performance audit

---

## Version History

### Version 1.0.0 (January 2026)
- Initial theme release
- Core templates and styling
- Custom page templates (Contact, Events, About)
- Responsive design
- Accessibility features
- Customizer integration
- Plugin compatibility (The Events Calendar, Contact Form 7)

---

## Future Enhancement Ideas

### Potential Additions
1. **Resource Library:** Custom post type for downloadable resources
2. **Volunteer Portal:** Volunteer signup and management
3. **Photo Gallery:** Past event photos and activities
4. **Newsletter Signup:** Email list integration (Mailchimp, ConvertKit)
5. **Donation Integration:** Fundraising and donor management
6. **Testimonials:** Stories from community members
7. **FAQ Section:** Frequently asked questions
8. **Blog Categories:** News, Events, Resources, Stories
9. **Member Profiles:** Spotlight community members (with permission)
10. **Multi-language Support:** Spanish translation (common in Minnesota)

---

## Credits and License

**Theme Developer:** Custom development for Rivers Area Memory Café
**License:** GNU General Public License v2 or later
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html

This theme is licensed under the GPL v2 or later. Use it to make something cool, have fun, and share what you've learned.

---

## Contact for Technical Support

For theme-specific issues or customizations, contact the original developer or hire a WordPress developer familiar with custom theme development.

**Useful Resources:**
- WordPress Developer Handbook: https://developer.wordpress.org/
- WordPress Codex: https://codex.wordpress.org/
- WordPress Support Forums: https://wordpress.org/support/

---

Last Updated: January 2026
Theme Version: 1.0.0
