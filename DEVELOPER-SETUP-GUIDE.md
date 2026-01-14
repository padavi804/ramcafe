# Developer Setup Guide - Getting Your Theme Online

This guide walks you through setting up WordPress from scratch and uploading the Rivers Area Memory Café theme.

**Your starting point:** You have the theme folder, but no WordPress account or hosting yet.

**Time needed:** 1-2 hours for complete setup

---

## Option A: Quick Demo Setup (Test Locally First)

Best if you want to see the theme working before committing to hosting.

### Using Local by Flywheel (FREE - Recommended for Testing)

**Step 1: Download Local**
1. Go to https://localwp.com/
2. Click "Download"
3. Fill in email (they'll send download link)
4. Download for Mac/Windows
5. Install the application

**Step 2: Create a New Site**
1. Open Local app
2. Click "Create a new site" (big + button)
3. **Site name:** "RAM Cafe" (or anything you want)
4. Click "Continue"
5. **Choose:** "Preferred" (recommended settings)
6. Click "Continue"
7. **Username:** admin (or your choice)
8. **Password:** Create a strong password
9. **Email:** Your email
10. Click "Add Site"

**Wait 2-3 minutes** while Local:
- Creates the WordPress site
- Sets up database
- Configures everything

**Step 3: Upload Your Theme**
1. In Local, click "Go to site folder" (folder icon)
2. Navigate to: `app/public/wp-content/themes/`
3. Copy your entire **ramcafe** folder into the themes directory
4. Back in Local, click "WP Admin" button
5. Login with the username/password you created
6. Go to **Appearance > Themes**
7. You should see "Rivers Area Memory Café" theme
8. Click **Activate**

**Step 4: View Your Site**
1. In Local, click "Open site" button
2. Your site opens in browser
3. It's now running locally on your computer!

**Step 5: Add Content**
Follow the [SETUP-GUIDE.md](SETUP-GUIDE.md) to:
- Configure Customizer settings
- Create pages
- Install plugins
- Add content

**Step 6: Show to Client**
- Click "Open site" to view
- Take screenshots for presentation
- Or do screen sharing to show them live

**Benefits:**
- ✅ Free
- ✅ Works offline
- ✅ Perfect for testing
- ✅ No hosting costs while building
- ✅ Can export and migrate later

**Drawback:**
- ❌ Only you can see it (not live on internet)
- ❌ Need to migrate to real hosting eventually

---

## Option B: Live Hosting Setup (Production Site)

Best if you're ready to go live immediately or want to show a live demo online.

---

### Phase 1: Get Domain and Hosting

#### **Step 1: Buy a Domain (10 minutes)**

**Go to Namecheap.com:**

1. Search for "riversareamemorycafe.com" (or their preferred name)
2. Check availability:
   - ✅ Available? Add to cart
   - ❌ Taken? Try variations:
     - riversareamemorycafe.org
     - ramcafe.org
     - ramemorycafe.com

3. **In cart:**
   - Domain: $12.98/year
   - **Uncheck** WhoisGuard (not needed for nonprofits)
   - **Uncheck** PremiumDNS (not needed)
   - **Don't buy hosting from Namecheap**

4. **Create account:**
   - Use YOUR email for now (you can transfer later)
   - Or use organization's email if you have it

5. **Complete purchase**
6. **Save login info** securely

**You now own the domain!** ✅

---

#### **Step 2: Get Hosting (15 minutes)**

**Recommended: SiteGround (Best for beginners)**

**Go to SiteGround.com:**

1. Click "**WordPress Hosting**"

2. **Choose plan:**
   - **StartUp**: $3.99/month (1 website) ✅ Recommended
   - GrowBig: $6.69/month (unlimited sites) - if hosting multiple sites
   - GoGeek: $10.69/month - unnecessary for this project

3. Click "**Get Plan**" under StartUp

4. **Domain section:**
   - Select "**I already have a domain**"
   - Enter: riversareamemorycafe.com (the domain you just bought)

5. **Account Information:**
   - Email: Your email
   - Password: Create strong password
   - **Save these credentials!**

6. **Payment Information:**
   - Choose 12 months ($47.88 total first year)
   - Or 24 months for better discount
   - Enter credit card

7. **Purchase Information:**
   - Data Center: Choose "Chicago" or closest to Minnesota
   - **Uncheck** extra services (not needed):
     - Domain Privacy (already from Namecheap)
     - SG Site Scanner (not essential)
     - Extra backup copies (not essential)

8. **Complete purchase**

9. **Check email:** SiteGround sends account details

**You now have hosting!** ✅

---

#### **Step 3: Connect Domain to Hosting (5 minutes)**

Your domain (Namecheap) needs to point to your hosting (SiteGround).

**In SiteGround:**

1. **Find your nameservers** - check the welcome email
   - Usually something like:
   - ns1.siteground.net
   - ns2.siteground.net

**In Namecheap:**

1. Login to Namecheap.com
2. Go to **Domain List**
3. Click **Manage** next to your domain
4. Find **Nameservers** section (about halfway down)
5. Change from "Namecheap BasicDNS" to "**Custom DNS**"
6. Enter SiteGround's nameservers:
   - ns1.siteground.net
   - ns2.siteground.net
7. Click green checkmark to save

**Wait 1-24 hours** for DNS propagation (usually 1-2 hours)

**You can continue with setup while waiting!**

---

### Phase 2: Install WordPress

#### **Step 4: Install WordPress on SiteGround (5 minutes)**

**In SiteGround:**

1. Login to SiteGround account
2. Go to "**Site Tools**" (big button)
3. In left sidebar, find "**WordPress**"
4. Click "**WordPress Installer**"
5. Click "**Install**" button

**Installation form:**

1. **Installation URL:**
   - Protocol: https:// (leave as is)
   - Domain: riversareamemorycafe.com
   - Path: (leave blank)

2. **Site Settings:**
   - Site Name: Rivers Area Memory Café
   - Site Description: A gathering place of connection, learning, and support

3. **Admin Account:**
   - Username: **DO NOT USE "admin"** - choose something unique
   - Password: Generate strong password (use the generator)
   - Admin Email: Your email
   - **Save these credentials!**

4. **Optional Settings:**
   - Language: English
   - Select "I confirm..." checkbox

5. Click "**Install**"

**Wait 2-3 minutes** for installation

**Success!** You'll see WordPress login URL and credentials

**Save this information:**
- WordPress Admin URL: https://riversareamemorycafe.com/wp-admin
- Username: [what you chose]
- Password: [generated password]

---

### Phase 3: Upload Your Theme

#### **Step 5: Prepare Theme for Upload (2 minutes)**

**On your computer:**

1. Find your **ramcafe** folder
2. **Right-click** on the folder
3. **Mac:** "Compress ramcafe"
4. **Windows:** Send to > Compressed (zipped) folder
5. You now have: **ramcafe.zip**

**This is your theme package!**

---

#### **Step 6: Upload Theme to WordPress (5 minutes)**

**Login to WordPress:**

1. Go to: riversareamemorycafe.com/wp-admin
2. Enter your username and password
3. Click "Log In"

**You're in! This is the WordPress dashboard.**

**Upload the theme:**

1. In left sidebar, hover over "**Appearance**"
2. Click "**Themes**"
3. You'll see default themes (Twenty Twenty-Four, etc.)
4. Click "**Add New Theme**" button (top)
5. Click "**Upload Theme**" button (top)
6. Click "**Choose File**"
7. Select your **ramcafe.zip** file
8. Click "**Install Now**"

**Wait for upload and installation (30 seconds)**

**You'll see:** "Theme installed successfully"

9. Click "**Activate**"

**Success!** Your theme is now active! 🎉

---

### Phase 4: Configure Your Theme

#### **Step 7: Basic Configuration (15 minutes)**

**Set up Customizer options:**

1. In WordPress admin, click "**Customize**" (top bar)

**Site Identity:**
2. Click "**Site Identity**"
3. Site Title: Rivers Area Memory Café
4. Tagline: Growing community. Celebrating connection
5. Click "**Select Logo**"
6. Upload your horizontal logo file (or it uses default)
7. Crop if needed
8. Click "**Select**"

**Contact Information:**
9. Click back arrow to go back
10. Click "**Contact Information**"
11. Phone: 218-998-9677
12. Email: riversareamemorycafe@gmail.com
13. Address: 1164 Friberg Ave, Fergus Falls, MN 56537

**Social Media:**
14. Click back arrow
15. Click "**Social Media Links**"
16. Add Facebook/Instagram URLs when available

**Colors (optional):**
17. Click back arrow
18. Click "**Colors**" if you want to adjust
19. Background color, etc.

20. Click "**Publish**" (top)

---

#### **Step 8: Create Essential Pages (30 minutes)**

**Create Home Page:**

1. Go to **Pages > Add New**
2. Title: "Home" or "Welcome"
3. In editor, add content from [SETUP-GUIDE.md](SETUP-GUIDE.md)
4. Click the + button to add blocks:
   - Paragraph blocks for text
   - Image blocks for photos
   - Heading blocks for sections
5. Click "**Publish**" (top right)
6. Click "**Publish**" again to confirm

**Create Other Pages:**

Repeat for each page:
- **About** (use template: About/Mission Page)
- **Events** (use template: Events Page)
- **Contact** (use template: Contact Page)
- **Resources**

**To assign page template:**
1. While editing page, look in right sidebar
2. Find "**Template**" dropdown
3. Select appropriate template
4. Update page

**Set Static Homepage:**

1. Go to **Settings > Reading**
2. Select "**A static page**"
3. Homepage: Choose "Home"
4. Posts page: Choose "News" (create this page first)
5. Click "**Save Changes**"

---

#### **Step 9: Create Navigation Menu (10 minutes)**

1. Go to **Appearance > Menus**
2. Menu Name: "Main Menu"
3. Click "**Create Menu**"
4. On left side, find your pages
5. Check boxes next to:
   - Home
   - About
   - Events
   - Resources
   - Contact
6. Click "**Add to Menu**"
7. Drag to reorder if needed
8. Under "Menu Settings", check "**Primary Menu**"
9. Click "**Save Menu**"

---

#### **Step 10: Install Essential Plugins (20 minutes)**

See [PLUGINS-RECOMMENDED.md](PLUGINS-RECOMMENDED.md) for full details.

**Must-have plugins:**

1. Go to **Plugins > Add New**

**The Events Calendar:**
2. Search "The Events Calendar"
3. Click "**Install Now**" on the one by "The Events Calendar Team"
4. Click "**Activate**"

**Contact Form 7:**
5. Search "Contact Form 7"
6. Install and Activate

**Yoast SEO:**
7. Search "Yoast SEO"
8. Install and Activate

**UpdraftPlus (Backups):**
9. Search "UpdraftPlus"
10. Install and Activate

**Wordfence Security:**
11. Search "Wordfence Security"
12. Install and Activate

---

### Phase 5: Add Content

#### **Step 11: Set Up Events Calendar (15 minutes)**

**Create Monthly Meeting:**

1. Go to **Events > Add New**

2. **Event Title:** "Monthly Memory Café Meeting"

3. **Description:** Use text from [SETUP-GUIDE.md](SETUP-GUIDE.md) page 3

4. **Date & Time:**
   - Click "**Recurring**" checkbox
   - Recurrence: Monthly
   - Recurs on: Third Tuesday
   - Start time: 1:00 PM
   - End time: 3:00 PM

5. **Venue:**
   - Click "Add new venue"
   - Venue: Fergus Falls YMCA Community Room
   - Address: 1164 Friberg Ave
   - City: Fergus Falls
   - State: MN
   - Zip: 56537

6. **Featured Image:**
   - Click "Set featured image" (right sidebar)
   - Upload a photo if available

7. Click "**Publish**"

**Create Special Events:**

Follow the event schedule in [SETUP-GUIDE.md](SETUP-GUIDE.md) to add:
- February 17: Launch Day
- March 17: Ask Us Anything
- April 21: Handling Tough Days
- etc.

---

#### **Step 12: Add Contact Form (5 minutes)**

1. Go to **Contact > Contact Forms**
2. You'll see "Contact form 1" already created
3. Copy the shortcode: `[contact-form-7 id="123" ...]`
4. Go to **Pages** and edit your Contact page
5. Add a **Shortcode block** where you want the form
6. Paste the shortcode
7. Click "**Update**"

**Test it:** Visit your Contact page and submit a test form

---

#### **Step 13: Add Images (As Needed)**

See [IMAGES-GUIDE.md](IMAGES-GUIDE.md) for full details.

**While editing any page:**
1. Click + to add block
2. Search "Image"
3. Select Image block
4. Upload or choose from library
5. Add alt text (important!)
6. Adjust size and alignment

---

### Phase 6: Final Checks

#### **Step 14: Test Everything (15 minutes)**

**Homepage:**
- ✅ Logo appears
- ✅ Navigation menu works
- ✅ Content displays correctly
- ✅ Colors are correct

**Responsive Test:**
- ✅ Resize browser window
- ✅ Check on phone
- ✅ Mobile menu works

**All Pages:**
- ✅ About page works
- ✅ Events page shows meeting info
- ✅ Contact form submits
- ✅ All links work

**Plugins:**
- ✅ Events Calendar displays
- ✅ Contact form works
- ✅ No error messages

---

#### **Step 15: Set Up Security (10 minutes)**

**Strong Password:**
1. Go to **Users > Profile**
2. Scroll to "Account Management"
3. Click "Set New Password"
4. Use a strong password (save in password manager)

**Wordfence Setup:**
1. Go to **Wordfence > Dashboard**
2. Run initial scan
3. Set up email alerts
4. Enable two-factor authentication (recommended)

**UpdraftPlus Backup:**
1. Go to **Settings > UpdraftPlus Backups**
2. Click "Settings" tab
3. Set schedule:
   - Files: Weekly
   - Database: Weekly
4. Save changes
5. Click "Backup Now" to create first backup

---

### Phase 7: Handoff Preparation

#### **Step 16: Create Documentation Package (30 minutes)**

**Screenshot important pages:**
1. Take screenshots of:
   - Homepage
   - Events page
   - Contact page
   - WordPress dashboard

**Create login credentials document:**
- WordPress admin URL
- Username
- Password (in password manager)
- Recovery email

**Prepare training:**
- Review [README.md](README.md) - this is for the organization
- Highlight sections they'll use most
- Note what they CAN change vs. what needs a developer

---

## Your Complete Setup Checklist

Use this as you go:

```
□ Domain purchased (Namecheap)
□ Hosting purchased (SiteGround)
□ Domain pointed to hosting (nameservers)
□ WordPress installed
□ Theme uploaded and activated
□ Logo uploaded
□ Contact info added in Customizer
□ Pages created (Home, About, Events, Contact, Resources)
□ Page templates assigned
□ Static homepage set
□ Navigation menu created
□ Essential plugins installed:
  □ The Events Calendar
  □ Contact Form 7
  □ Yoast SEO
  □ UpdraftPlus
  □ Wordfence
□ Monthly meeting event created
□ Contact form added to Contact page
□ Initial content added
□ Site tested on desktop
□ Site tested on mobile
□ Security configured
□ First backup created
□ Documentation prepared for handoff
```

---

## Cost Summary

**One-Time:**
- Domain registration: $12.98/year
- SiteGround hosting (first year): $47.88

**Or Local (free):**
- Local by Flywheel: $0
- (Migrate to paid hosting when ready)

**First Year Total: ~$60**

**Ongoing:**
- Domain renewal: ~$13/year
- Hosting renewal: ~$96/year (regular price)
- Total: ~$109/year

---

## Troubleshooting

### "Theme doesn't appear after uploading"
- Check you uploaded a ZIP file
- Make sure you zipped the ramcafe folder, not the parent folder
- Try uploading via FTP if WordPress upload fails

### "Site shows blank page after activation"
- There may be a PHP error
- Check error log in SiteGround
- Deactivate theme, fix error, reactivate

### "Logo doesn't show"
- Make sure logo file is in /images/ folder
- Or upload via Customizer > Site Identity > Logo

### "Domain doesn't work yet"
- DNS propagation can take 24 hours
- Check nameservers are set correctly in Namecheap
- Use https://www.whatsmydns.net/ to check propagation

### "Can't login to WordPress"
- Check you're using correct URL: yourdomain.com/wp-admin
- Try password reset
- Check spam folder for reset email

---

## Next Steps

Once your setup is complete:

1. **Review with client:** Show them the live site
2. **Training session:** Walk through [README.md](README.md)
3. **Handoff:** Transfer ownership using [HANDOFF-GUIDE.md](HANDOFF-GUIDE.md)
4. **Support:** Decide on ongoing support arrangement

---

## Quick Reference

| Task | Location |
|------|----------|
| Add/edit pages | Pages > All Pages |
| Upload theme | Appearance > Themes > Add New > Upload |
| Change logo | Appearance > Customize > Site Identity |
| Install plugins | Plugins > Add New |
| Create events | Events > Add New |
| Add menu | Appearance > Menus |
| Backup site | Settings > UpdraftPlus |
| Security scan | Wordfence > Scan |

---

## Resources

- **WordPress Docs:** https://wordpress.org/documentation/
- **SiteGround Tutorials:** https://www.siteground.com/tutorials/
- **Theme Docs:** See README.md and other guides in theme folder

---

**You've got this!** Follow these steps and you'll have a professional WordPress site running in a few hours.

If you get stuck, SiteGround has 24/7 chat support that can help with hosting/WordPress questions.

Last Updated: January 2026
