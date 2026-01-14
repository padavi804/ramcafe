# Rivers Area Memory Café WordPress Theme

## Theme Overview

This custom WordPress theme is designed specifically for Rivers Area Memory Café, featuring warm, nature-inspired design elements with your brand colors and a focus on community engagement.

## Installation Instructions

1. **Upload Theme Files**
   - Compress the entire `ramcafe` folder into a ZIP file
   - Go to your WordPress admin dashboard
   - Navigate to **Appearance > Themes**
   - Click **Add New** → **Upload Theme**
   - Choose the ZIP file and click **Install Now**
   - Once installed, click **Activate**

2. **Initial Setup**
   After activating the theme, you'll need to set up a few things:

### Setting Up Your Logo

1. Go to **Appearance > Customize**
2. Click on **Site Identity**
3. Click **Select logo** to upload your logo image
4. Upload the Rivers Area Memory Café logo file
5. Adjust the size if needed
6. Click **Publish** to save

### Setting Up Menus

1. Go to **Appearance > Menus**
2. Create a new menu (e.g., "Main Menu")
3. Add pages to your menu:
   - Home
   - About
   - Events
   - News
   - Contact
4. Under **Menu Settings**, check **Primary Menu**
5. Click **Save Menu**

For the footer menu (optional):
1. Create another menu (e.g., "Footer Menu")
2. Add pages like Privacy Policy, Terms, etc.
3. Check **Footer Menu** under Menu Settings
4. Click **Save Menu**

### Adding Contact Information

1. Go to **Appearance > Customize**
2. Look for **Contact Information** section
3. Fill in:
   - **Phone Number**: Your main phone number
   - **Email Address**: Your contact email
   - **Address**: Fergus Falls YMCA (or full address)
4. Click **Publish**

### Adding Social Media Links

1. In **Appearance > Customize**
2. Click on **Social Media Links**
3. Add your URLs:
   - **Facebook URL**: Your Facebook page URL
   - **Instagram URL**: Your Instagram profile URL
4. Click **Publish**

### Uploading Your Logo

Your theme comes with a default logo, but you should upload your official logo:

1. Go to **Appearance > Customize**
2. Click **Site Identity**
3. Click **Select Logo**
4. Upload your logo file (the horizontal version works best)
5. Adjust the crop if needed
6. Click **Select** then **Publish**

**Recommended logo:** Use the "Horizontal Logo - River Blue & Autumn Orange" PNG file from your brand materials.

**Note:** The theme already has a default logo in place, so the site won't look broken if you haven't uploaded one yet.

### Setting Up Your Homepage

1. Go to **Pages > Add New**
2. Create a page titled "Home" or "Welcome"
3. Add your mission statement and welcoming content
4. Set a featured image (optional)
5. Click **Publish**

Now set it as your homepage:
1. Go to **Settings > Reading**
2. Under **Your homepage displays**, select **A static page**
3. Choose your "Home" page for **Homepage**
4. If you want a blog, create a "News" page and select it for **Posts page**
5. Click **Save Changes**

---

## Managing Content (Non-Technical Guide)

### Creating and Editing Pages

**To Create a New Page:**
1. Go to **Pages > Add New**
2. Enter your page title in the top field
3. Add content in the main editor (it works like Microsoft Word)
4. Use the formatting toolbar to:
   - Make text **bold** or *italic*
   - Create lists
   - Add links
   - Insert images
5. Click **Publish** when done

**To Edit an Existing Page:**
1. Go to **Pages > All Pages**
2. Hover over the page you want to edit
3. Click **Edit**
4. Make your changes
5. Click **Update**

### Adding Images

1. Click where you want the image in your content
2. Click the **Add Media** button (above the editor)
3. Either:
   - **Upload Files**: Drag your image or click **Select Files**
   - **Media Library**: Choose from previously uploaded images
4. Select your image and fill in:
   - **Alt Text**: Brief description (important for accessibility)
   - **Alignment**: Left, Center, Right, or None
   - **Size**: Choose appropriate size
5. Click **Insert into page**

### Creating Blog Posts (News & Updates)

1. Go to **Posts > Add New**
2. Enter your post title
3. Add your content
4. On the right sidebar:
   - **Categories**: Check relevant categories (Events, News, etc.)
   - **Tags**: Add keywords separated by commas
   - **Featured Image**: Click **Set featured image** to add a main image
5. Click **Publish**

### Using the Contact Page Template

1. Create a new page or edit existing "Contact" page
2. On the right sidebar, look for **Page Attributes**
3. Under **Template**, select **Contact Page**
4. Click **Update/Publish**

The contact page will automatically display your contact information from the Customizer.

---

## Widget Areas (Sidebars)

Your theme has widget areas where you can add blocks of content.

**To Add Widgets:**
1. Go to **Appearance > Widgets**
2. You'll see these areas:
   - **Footer Area 1, 2, 3**: Three columns in your footer
   - **Sidebar**: Appears on blog posts

3. Click on an area to expand it
4. Click the **+** button to add a widget
5. Popular widgets:
   - **Text**: Add custom HTML or text
   - **Recent Posts**: Show latest blog posts
   - **Categories**: List of post categories
   - **Custom HTML**: Add custom content

---

## Theme Colors Reference

Your brand colors are already built into the theme:

- **Terracotta** (#CE593A): Main headings, buttons, accents
- **Olive Green** (#9AA37B): Footer background
- **Teal** (#96A37B): Links, secondary elements
- **Beige** (#EBDFCA): Headers, highlight sections

These colors are used automatically throughout your site!

---

## Font Usage

The theme is set up to use your brand fonts:

- **Accia Piano Bold**: Main headings and site title
- **Deuterium Medium**: Tagline and secondary text

### Setting Up Custom Brand Fonts

Your brand uses two special fonts:
- **Accia Piano Bold** (for main headings)
- **Deuterium Medium** (for tagline)

**These fonts need to be installed by a developer.** The theme is already configured to use them, but the actual font files need to be:
1. Placed in the `/fonts` folder
2. Declared in the stylesheet

**If you don't have these font files yet:**
- The theme will use fallback fonts (Georgia for headings, Arial for secondary text)
- Your site will still look professional, but won't have the exact brand typography
- Contact your designer to obtain the font files
- Once you have the files, hire a developer to install them (this is a 15-minute task)

**For developers:** See [DEVELOPER-NOTES.md](DEVELOPER-NOTES.md) for technical font setup instructions.

---

## Troubleshooting Common Issues

### My logo is too big/small
1. Go to **Appearance > Customize > Site Identity**
2. Use the cropping tool to resize
3. Or edit your logo file to be around 400px wide

### Images aren't showing up
- Make sure the image file size isn't too large (under 2MB recommended)
- Check that the image format is JPG, PNG, or GIF
- Try re-uploading the image

### Menu items are in wrong order
1. Go to **Appearance > Menus**
2. Drag and drop menu items to reorder them
3. Click **Save Menu**

### Page content is too wide/narrow
The theme automatically handles content width, but you can use these WordPress block alignment options:
- **Wide width**: Makes content wider
- **Full width**: Makes content span the full screen

### Need to undo a change?
WordPress saves revisions of your pages and posts. To restore a previous version:
1. Edit the page/post
2. Look for **Revisions** in the right sidebar
3. Click to browse previous versions
4. Click **Restore This Revision**

---

## Important WordPress Best Practices

1. **Always keep WordPress and plugins updated**
   - Go to **Dashboard > Updates** regularly
   - Update WordPress core, themes, and plugins

2. **Use categories and tags**
   - This helps organize your content
   - Makes it easier for visitors to find related posts

3. **Set featured images**
   - Always add a featured image to posts
   - Recommended size: 1200px × 630px

4. **Write good alt text for images**
   - Helps with accessibility
   - Improves SEO
   - Describe what's in the image

5. **Preview before publishing**
   - Click **Preview** button before publishing
   - Check how it looks on different devices

6. **Save drafts frequently**
   - WordPress auto-saves, but manually click **Save Draft** periodically
   - Prevents losing work if your browser closes

---

## Getting Help

- **WordPress Support**: https://wordpress.org/support/
- **WordPress Learn**: https://learn.wordpress.org/
- **Theme Issues**: Contact your web developer

---

## Quick Reference Card

### Most Common Tasks

| Task | Navigation Path |
|------|----------------|
| Edit homepage | Pages > All Pages > Edit "Home" |
| Add blog post | Posts > Add New |
| Change logo | Appearance > Customize > Site Identity |
| Edit menu | Appearance > Menus |
| Add contact info | Appearance > Customize > Contact Information |
| Upload image | Media > Add New |
| Change colors | (Contact developer - colors are in theme code) |

---

## Site Backup

**Important:** Always maintain backups of your website!

Recommended backup plugins (free):
- **UpdraftPlus**
- **BackWPup**
- **Duplicator**

Set up automatic weekly backups to save:
- Database (your content)
- Themes and plugins
- Uploaded media files

---

Last Updated: January 2026
Theme Version: 1.0.0
