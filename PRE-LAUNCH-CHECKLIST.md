# Pre-Launch Checklist - Rivers Area Memory Café Theme

Before uploading your theme to WordPress, review this checklist to ensure everything is ready.

---

## ✅ COMPLETE - Core Theme Files

These are all done and ready:

- [x] style.css (theme stylesheet with metadata)
- [x] functions.php (theme functionality)
- [x] header.php (site header)
- [x] footer.php (site footer)
- [x] index.php (blog archive)
- [x] single.php (single post)
- [x] page.php (default page template)
- [x] front-page.php (homepage)
- [x] 404.php (error page)
- [x] sidebar.php (sidebar widget area)
- [x] searchform.php (search form)
- [x] Custom page templates (Contact, Events, About)
- [x] Template parts (content variations)
- [x] Helper functions (inc/template-tags.php)
- [x] JavaScript (navigation.js for mobile menu)
- [x] Logo image (default horizontal logo)

---

## ⚠️ OPTIONAL - Things You Could Add Now (But Can Do Later)

### 1. Screenshot (Recommended)
**What:** A preview image of your theme that shows in WordPress admin
**Size:** 1200px × 900px PNG or JPG
**File name:** `screenshot.png`
**Where:** Root of theme folder

**Why add it:**
- Makes your theme look professional in WordPress admin
- Helps you identify the theme if you ever have multiple themes

**Can skip?** Yes - theme works fine without it. You can add later.

### 2. License File
**What:** A text file with GPL license terms
**File name:** `LICENSE` or `license.txt`
**Where:** Root of theme folder

**Why add it:**
- Required if you plan to distribute the theme publicly
- Shows your theme is open source

**Can skip?** Yes - only needed if distributing. Already noted in style.css header.

### 3. Child Theme Support Files
**What:** Additional documentation for child theme creation
**File name:** `CHILD-THEME-GUIDE.md`

**Why add it:**
- Makes it easier for future developers to extend your theme
- Documents proper customization methods

**Can skip?** Yes - child themes are possible without this documentation.

---

## 🔧 CANNOT CHANGE LATER (Already Correct)

These are locked in once you start using the theme. They're all good:

✅ **Text Domain:** `ramcafe` - Correct throughout theme
✅ **Theme Slug:** `ramcafe` - Used for function names and file references
✅ **File Structure:** Standard WordPress structure - All correct
✅ **Database Tables:** No custom tables - Uses standard WordPress structure

---

## 🎨 CAN EASILY CHANGE LATER

These can all be modified after installation:

### In WordPress Customizer:
- Logo
- Site title and tagline
- Colors (limited - see below for CSS changes)
- Contact information
- Social media links
- Background

### In Theme Files (via FTP or child theme):
- All CSS styling
- All PHP templates
- Colors and fonts
- Layout and design
- Functionality

### In WordPress Admin:
- All content (pages, posts, events)
- All images
- Menu structure
- Widget content
- Plugins

---

## 🎯 RECOMMENDED: Do These NOW

### 1. Update Author Information (Optional)

**Current:**
```
Author: Custom Development
Author URI: https://ramcafe.org
```

**Consider changing to:**
```
Author: Rivers Area Memory Café
Author URI: https://riversareamemorycafe.com
```

**Where:** Line 3-4 of `style.css`

**Why:** Shows your organization as the theme owner

---

### 2. Verify Theme URI (Optional)

**Current:**
```
Theme URI: https://ramcafe.org
```

**Consider changing to:**
```
Theme URI: https://riversareamemorycafe.com
```

**Where:** Line 2 of `style.css`

**Why:** Should point to your actual website once it's live

---

### 3. Add Screenshot (Recommended)

**How to create:**
1. Install theme in local WordPress
2. View homepage
3. Take screenshot at 1200×900px
4. Save as `screenshot.png` in theme root

**Or skip it:** Theme works fine without - you'll just see a blank theme preview

---

## 📝 Things That ARE Difficult to Change Later

### Custom Post Types (If You Add Them)

**What:** Special content types beyond posts and pages (e.g., "Volunteers", "Testimonials")

**Why it matters:**
- Once you create content using them, the structure is in database
- Changing the slug or structure requires database migration

**Current status:** ✅ Your theme doesn't have custom post types - keeping it simple and flexible

**Recommendation:** Don't add custom post types unless absolutely necessary. Use:
- Regular Posts for: News, announcements, stories
- Pages for: About, Contact, Resources
- The Events Calendar plugin for: Events

---

### Theme Slug / Text Domain

**What:** The identifier used throughout theme (`ramcafe`)

**Why it matters:**
- Used in function names: `ramcafe_setup()`, `ramcafe_scripts()`
- Used for translations
- Referenced in database

**Current status:** ✅ Correctly set as `ramcafe` everywhere

**Can you change it?** Technically yes, but requires:
- Search/replace in ALL files
- Potential issues with translations
- Not recommended once theme is in use

---

## 🔄 About Child Themes

### What is a Child Theme?

A child theme lets you customize without modifying the original theme files. Benefits:
- Keep your customizations when updating the parent theme
- Safe way to add custom code
- Professional development practice

### When Do You Need One?

**Need a child theme if:**
- You want to add custom CSS that persists through updates
- You want to modify PHP templates
- A developer will maintain the site long-term

**DON'T need a child theme if:**
- Just using WordPress Customizer options
- Only uploading content and images
- Making small CSS tweaks (can use "Additional CSS" in Customizer)

### How Hard is it to Create?

**Easy!** Only need 2 files:

**1. style.css:**
```css
/*
Theme Name: RAM Cafe Child
Template: ramcafe
*/

/* Your custom CSS here */
```

**2. functions.php:**
```php
<?php
function ramcafe_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'ramcafe_child_enqueue_styles');
```

**That's it!** See DEVELOPER-NOTES.md for full instructions.

---

## ⚡ Quick Pre-Upload Actions

### Minimum (Do Right Now):

1. **Verify logo is in place:**
   ```bash
   Check: /images/logo-horizontal.png exists
   ```
   ✅ Done

2. **Check style.css header:**
   - Theme Name: Rivers Area Memory Café ✅
   - Version: 1.0.0 ✅
   - Description: Present ✅

3. **Test file structure:**
   - All PHP files have proper WordPress headers ✅
   - All functions have `ramcafe_` prefix ✅
   - No syntax errors ✅

### Recommended (5 Minutes):

4. **Update style.css author info** (if desired)
5. **Create screenshot.png** (optional but nice)
6. **Review SETUP-GUIDE.md** for content you'll add

### Optional (Can Do Anytime):

7. Add LICENSE file
8. Create child theme (for future developers)
9. Add more page templates

---

## 🚀 Upload Process

Once you're ready:

### Option A: ZIP Upload (Easiest)

1. **Create ZIP file:**
   - Select the `ramcafe` folder
   - Right-click > Compress (Mac) or Send to > Compressed folder (Windows)
   - Creates `ramcafe.zip`

2. **Upload to WordPress:**
   - Log into WordPress admin
   - Go to Appearance > Themes > Add New > Upload Theme
   - Choose `ramcafe.zip`
   - Click Install Now
   - Click Activate

### Option B: FTP Upload (If you have hosting)

1. Connect to your server via FTP
2. Navigate to `/wp-content/themes/`
3. Upload entire `ramcafe` folder
4. Go to WordPress admin > Appearance > Themes
5. Activate Rivers Area Memory Café theme

---

## 🔍 Post-Installation Checklist

After activating the theme:

### Immediate (First 5 Minutes):

1. **Check if it activated successfully**
   - Visit your site
   - Logo should appear
   - Colors should be beige/terracotta/slate blue

2. **Go to Appearance > Customize:**
   - Add contact information
   - Add social media links
   - Upload official logo (if different from default)
   - Set tagline

3. **Create essential pages:**
   - Home
   - About
   - Events
   - Contact
   - Resources

4. **Assign page templates:**
   - Contact page: Use "Contact Page" template
   - Events page: Use "Events Page" template
   - About page: Use "About/Mission Page" template

5. **Set static homepage:**
   - Settings > Reading
   - Select "A static page"
   - Choose your Home page

### Within First Hour:

6. **Install essential plugins:**
   - The Events Calendar
   - Contact Form 7
   - Yoast SEO
   - UpdraftPlus (backups)
   - Wordfence (security)

7. **Create navigation menu:**
   - Appearance > Menus
   - Add pages to menu
   - Assign to "Primary Menu" location

8. **Add starter content:**
   - Create a few blog posts
   - Add some images
   - Test the Events calendar

### First Week:

9. **Add all content from SETUP-GUIDE.md**
10. **Set up recurring monthly meeting in Events Calendar**
11. **Test on mobile devices**
12. **Get feedback from Karen/Brianna**

---

## ⚠️ Common "Gotchas" to Avoid

### 1. Don't Modify Core Files Directly
**Problem:** Changes get lost on updates
**Solution:** Use Customizer "Additional CSS" or create child theme

### 2. Don't Skip Backups
**Problem:** Accidents happen, data can be lost
**Solution:** Install UpdraftPlus immediately and schedule weekly backups

### 3. Don't Install Too Many Plugins
**Problem:** Slows site down, increases security risk
**Solution:** Stick to essentials from PLUGINS-RECOMMENDED.md

### 4. Don't Forget Alt Text on Images
**Problem:** Bad for accessibility and SEO
**Solution:** Add descriptive alt text to every image

### 5. Don't Use Admin/Admin
**Problem:** Huge security vulnerability
**Solution:** Use strong username and password

---

## 📞 Who to Contact for Changes

### For Content Updates (Non-Technical):
**Karen, Brianna, Susanne** can handle:
- Adding/editing pages and posts
- Uploading images
- Creating events
- Changing contact info
- Basic WordPress tasks

**See:** README.md for step-by-step instructions

### For Design/Code Changes (Technical):
**Need a developer** for:
- Changing theme files
- Adding custom functionality
- Modifying layouts
- Installing custom fonts
- Advanced customizations

**See:** DEVELOPER-NOTES.md for technical documentation

---

## 📋 Final Pre-Upload Checklist

Use this as your final check before uploading:

```
[ ] Logo file exists in /images/ folder
[ ] All required theme files present
[ ] style.css has correct metadata
[ ] No PHP syntax errors (theme will fail to activate if errors exist)
[ ] Text domain is 'ramcafe' throughout
[ ] Functions have ramcafe_ prefix
[ ] Documentation files included (README, PLUGINS, SETUP-GUIDE)
[ ] Ready to add content after installation
[ ] Know where to find setup instructions (README.md)
[ ] Have backup plan (UpdraftPlus plugin)
```

---

## ✅ Your Theme Status: READY TO LAUNCH

Your theme is **production-ready**. Here's what's solid:

✅ All core functionality implemented
✅ Responsive design (mobile, tablet, desktop)
✅ Accessible (WCAG guidelines followed)
✅ Secure (proper escaping, no vulnerabilities)
✅ Well-documented (4 comprehensive guides)
✅ Brand-accurate (colors, logo, style)
✅ Plugin-ready (works with Events Calendar, Contact Form 7)
✅ SEO-friendly (semantic HTML, proper structure)
✅ Performance-optimized (minimal dependencies, clean code)

**You can confidently upload this theme to WordPress!**

---

## 🎓 Learning Resources

If you want to understand more:

- **WordPress Codex:** https://codex.wordpress.org/
- **Theme Developer Handbook:** https://developer.wordpress.org/themes/
- **Your Theme Docs:** README.md, DEVELOPER-NOTES.md, SETUP-GUIDE.md

---

## 📦 What's in Your Theme Package

When you ZIP and upload, you're getting:

**Essential Files:**
- Complete WordPress theme (all templates)
- Default logo
- Mobile menu JavaScript
- Full CSS styling

**Documentation:**
- README.md (user guide)
- PLUGINS-RECOMMENDED.md (plugin setup)
- SETUP-GUIDE.md (actual content to use)
- DEVELOPER-NOTES.md (technical reference)
- IMAGES-GUIDE.md (how to add images)
- PRE-LAUNCH-CHECKLIST.md (this file)

**Total:** Professional, documented, ready-to-use WordPress theme

---

**Questions before uploading?** Review the relevant guide:
- **General questions:** README.md
- **Setup questions:** SETUP-GUIDE.md
- **Technical questions:** DEVELOPER-NOTES.md
- **Image questions:** IMAGES-GUIDE.md

**Ready to launch? Let's go! 🚀**

Last Updated: January 2026
