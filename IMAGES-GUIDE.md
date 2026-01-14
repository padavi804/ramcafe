# Images Guide - Rivers Area Memory Café Theme

## Quick Answer: When to Add Images

**Short answer:** Add images in WordPress, not in the theme files.

**Why?** The theme is just the design framework. All your actual content (text, images, etc.) gets added through the WordPress admin interface.

---

## Where Images Are Already Set Up

### 1. **Logo** ✅ Done!
- **Location:** Already included in theme at `/images/logo-horizontal.png`
- **How to change:** Upload your own via Appearance > Customize > Site Identity > Logo
- **Recommended:** Use "Horizontal Logo - River Blue & Autumn Orange" from your brand files

### 2. **Default Assets** ✅ Done!
- Theme styling and structure is complete
- Placeholder areas for images are built in

---

## Adding Images in WordPress (Once Theme is Installed)

### For Page/Post Content Images

**Where:** While editing a page or post in WordPress

**Steps:**
1. Click the **+ (Add block)** button where you want an image
2. Search for "Image" and select it
3. Choose:
   - **Upload** - Add a new image from your computer
   - **Media Library** - Use a previously uploaded image
4. Fill in **Alt Text** (brief description for accessibility)
5. Adjust alignment and size as needed
6. Click **Update** or **Publish**

**Recommended sizes:**
- **Full width images:** 1200px wide
- **Featured images:** 1200px × 630px
- **In-content photos:** 800px wide
- **Thumbnails:** 400px × 400px

---

### For Featured Images (Blog Posts/Events)

**What are featured images?** The main image that represents a post or event.

**Steps:**
1. While editing a post/page, look in the right sidebar
2. Find **Featured Image**
3. Click **Set featured image**
4. Upload or select an image
5. Click **Set featured image** button

**Where they appear:**
- Blog listing pages
- Event cards
- Social media previews when shared

---

### For Homepage Banner/Hero Image

**Steps:**
1. Edit your Homepage in WordPress
2. Add an **Image** block at the top
3. Upload a wide, high-quality photo (1600px × 600px recommended)
4. This becomes your hero/banner image

**Image ideas:**
- Photo from a Memory Café gathering
- Scenic Minnesota landscape (rivers, nature)
- Group photo of participants enjoying activities
- Activities in action (painting, music, socializing)

---

### For Background Images

**Location:** Appearance > Customize > Background Image

**When to use:** If you want a subtle background pattern or texture behind your content.

**Note:** Your theme uses solid colors by default, which is cleaner and more accessible.

---

## Image Best Practices

### File Formats
- **Photos:** JPG (smaller file size)
- **Graphics/logos:** PNG (better quality, transparent backgrounds)
- **Never use:** BMP or TIFF (too large)

### File Sizes
- Keep images under 200KB when possible
- Use image compression tools:
  - TinyPNG.com
  - Compressor.io
  - Or install the Smush plugin (see PLUGINS-RECOMMENDED.md)

### Image Naming
- **Good:** `memory-cafe-watercolor-activity-feb-2026.jpg`
- **Bad:** `IMG_1234.jpg`
- Use descriptive names with hyphens

### Accessibility
- **Always add Alt Text** - Describe what's in the image
- **Good alt text:** "Group of seniors painting watercolors at YMCA Memory Café"
- **Bad alt text:** "image123" or leaving it blank

---

## Recommended Images to Gather

For your website, collect these types of images:

### Essential:
1. **Logo files** (you have these) ✅
2. **YMCA location photo** - Exterior or the community room
3. **Activity photos** - People engaged in café activities
4. **Group photos** - Participants and volunteers (with permission)

### Nice to Have:
5. **Nature photos** - Rivers, trees, landscapes (matches your brand)
6. **Team photos** - Karen, Brianna, volunteers
7. **Partner logos** - YMCA, Pioneer Care, etc.
8. **Event-specific photos** - For each monthly topic

---

## Where Images Are Stored

### In WordPress:
- All uploaded images go to **Media Library**
- Access via **Media > Library** in WordPress admin
- WordPress automatically creates multiple sizes of each image

### In Theme (for developers):
- `/images/` folder contains theme assets only
- Default logo is stored here
- Don't put content images in the theme folder

---

## Adding Images to Specific Page Templates

### Homepage (front-page.php)
Upload via WordPress editor when creating your "Home" page

### Events Page (page-events.php)
- Page content: Add via WordPress editor
- Event images: Add through The Events Calendar plugin

### About Page (page-about.php)
Upload via WordPress editor when creating your "About" page

### Contact Page (page-contact.php)
Add optional images via WordPress editor

---

## Photo Ideas for Memory Café

### Activities:
- Watercolor painting session
- Musical performances / sing-alongs
- YMCA fitness activities
- Gardening projects
- Arts and crafts
- Social time with refreshments

### People (get permission first):
- Participants engaged in activities
- Volunteers helping
- Care partners together
- Team members (Karen, Brianna, staff)

### Places:
- Fergus Falls YMCA exterior
- Community room setup
- Welcoming entrance
- Activity tables arranged
- Refreshment area

### Nature (brand-appropriate):
- Minnesota rivers (Pelican, Ottertail, Red River)
- Trees and natural landscapes
- Rural Minnesota scenery
- Seasonal photos (spring flowers, autumn colors)

---

## Common Image Questions

### Q: Can I edit images in WordPress?
**A:** Basic cropping only. For advanced editing, use:
- Photoshop / GIMP (desktop)
- Canva.com (online, free)
- Photos app (Mac)

### Q: How many images should I add?
**A:**
- Homepage: 1-2 large images
- About page: 2-4 images
- Each blog post: 1 featured image + 1-3 content images
- Events: 1 image per event

### Q: What if I don't have photos yet?
**A:**
- Use stock photos temporarily from:
  - Unsplash.com (free, high quality)
  - Pexels.com (free)
- Search for: "seniors activities", "community gathering", "Minnesota nature"
- Replace with real photos as you take them

### Q: Can I add videos?
**A:** Yes!
1. Upload to YouTube or Vimeo first
2. In WordPress, paste the video URL into a **Video** block
3. Or use the **YouTube** or **Vimeo** block

---

## Image File Organization Tips

Keep your source files organized on your computer:

```
Rivers Area Memory Café/
├── Branding/
│   └── Logos/ (keep all logo variations)
├── Photos/
│   ├── Events/
│   │   ├── 2026-02-February/
│   │   ├── 2026-03-March/
│   │   └── ...
│   ├── Activities/
│   ├── People/ (with photo release forms)
│   └── Locations/
└── Graphics/
    └── Social Media/
```

This makes it easy to find images when you need to upload them to WordPress.

---

## Copyright & Permissions

**Important:**
- ✅ Use your own photos
- ✅ Use stock photos from free sites (Unsplash, Pexels)
- ✅ Get photo releases for people's faces
- ❌ Don't use Google Image Search results (usually copyrighted)
- ❌ Don't use photos without permission

**Photo Release:** Get written permission from participants before using their photos on the website.

---

## Quick Reference

| Task | Where to Do It |
|------|---------------|
| Upload logo | Appearance > Customize > Site Identity |
| Add page images | While editing page in WordPress |
| Add featured images | Right sidebar when editing post |
| View all images | Media > Library |
| Edit image alt text | Media Library > Click image > Edit |
| Delete unused images | Media Library > Select > Delete |

---

## Need Help?

- **Image compression:** Use Smush plugin (see PLUGINS-RECOMMENDED.md)
- **Photo editing:** Try Canva.com (free, user-friendly)
- **Stock photos:** Unsplash.com or Pexels.com
- **Questions:** Contact your website administrator

---

**Remember:** The theme is complete - you just need to add your content and images through WordPress once it's installed!

Last Updated: January 2026
