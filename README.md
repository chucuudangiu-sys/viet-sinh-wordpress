# Viet Sinh Mechanical - WordPress Theme

**Professional WordPress Theme for Industrial Foundation Equipment Manufacturer**

## 📋 Overview

Viet Sinh Mechanical is a professional, fully responsive WordPress theme designed specifically for industrial equipment manufacturers, particularly focused on foundation construction equipment (pile drilling machines, rotation heads, etc.).

## ✨ Features

- ✅ Fully Responsive Design (Mobile, Tablet, Desktop)
- ✅ Clean, Modern Architecture
- ✅ WordPress Theme Customizer Integration
- ✅ Bilingual Support (Vietnamese & English)
- ✅ Product Management System (Custom Post Type)
- ✅ Service Showcase
- ✅ Blog/News Section
- ✅ Contact Form Integration
- ✅ SEO-Friendly Structure
- ✅ Performance Optimized
- ✅ Accessibility Standards (WCAG)

## 🚀 Quick Start

### Installation

1. **Download the theme:**
   ```bash
   git clone https://github.com/chucuudangiu-sys/viet-sinh-wordpress.git
   cd viet-sinh-wordpress
   ```

2. **Place in WordPress:**
   ```bash
   cp -r viet-sinh-wordpress /path/to/wp-content/themes/
   ```

3. **Activate in WordPress Admin:**
   - Go to `Appearance → Themes`
   - Find "Viet Sinh Mechanical"
   - Click "Activate"

4. **Configure in Customizer:**
   - Go to `Appearance → Customize`
   - Update Hero Section, General Settings
   - Save changes

## 📁 Theme Structure

```
viet-sinh-wordpress/
├── style.css                 # Theme information & main styles
├── functions.php             # Theme setup & hooks
├── index.php                 # Main template
├── header.php                # Header & navigation
├── footer.php                # Footer section
├── page.php                  # Page template
├── single.php                # Single post template
├── README.md                 # This file
├── .gitignore               # Git ignore rules
└── assets/
    ├── css/
    │   ├── main.css         # Main stylesheet
    │   └── responsive.css   # Responsive design
    └── js/
        └── main.js          # Main JavaScript
```

## 🎨 Customizer Options

### Hero Section
- **Hero Title**: Main heading for home page
- **Hero Description**: Tagline/subtitle
- **Hero Image**: Background or featured image

### General Settings
- **Company Phone**: Contact phone number
- **Company Email**: Contact email address
- **Company Address**: Physical location

## 🌐 Language Support

The theme supports bilingual content:
- **Vietnamese (VI)** - Default
- **English (EN)** - Alternative

Use data attributes in templates:
```html
<h1 data-vi="Tiêu đề" data-en="Title">Tiêu đề</h1>
```

## 📝 Content Management

### Posts
Manage blog posts/news through WordPress Admin:
- `Posts → All Posts`

### Pages
Create custom pages:
- `Pages → Add New`

### Products (Custom Post Type)
Manage products:
- `Products → Add New` (appears in admin sidebar)
- Organize with Product Categories

### Services (Custom Post Type)
Manage services:
- `Services → Add New` (appears in admin sidebar)

## 🔗 Menus

Assign menus in:
- `Appearance → Menus`
- Available menu locations:
  - Primary Menu (Main navigation)
  - Footer Menu
  - Secondary Menu

## 🗄️ Database Requirements

**No additional database setup needed!**

WordPress automatically creates all necessary tables on installation:
- `wp_posts` - Pages, posts, custom post types
- `wp_postmeta` - Post metadata
- `wp_options` - Theme customizer settings
- `wp_terms` - Categories and taxonomies
- And more...

### What gets stored automatically:
✅ All page/post content
✅ Product listings
✅ Service descriptions
✅ Hero section text & images
✅ Contact form submissions
✅ Theme customizer settings
✅ Menu configurations
✅ User accounts & roles

## 🛠️ Development

### Prerequisites
- WordPress 5.0+
- PHP 7.4+
- MySQL 5.7+ (or MariaDB 10.3+)

### Local Development Setup

**Option 1: XAMPP (Windows/Mac/Linux)**
```bash
# Download XAMPP from https://www.apachefriends.org/
# Start Apache & MySQL
# Navigate to htdocs folder
git clone <this-repo>
# Visit http://localhost/viet-sinh-wordpress
```

**Option 2: Local (Mac/Windows)**
```bash
# Download from https://localwp.com/
# Create new WordPress site
# Clone theme into wp-content/themes/
```

**Option 3: Docker**
```bash
docker run -d -p 8000:80 -v $(pwd):/var/www/html wordpress:latest
```

## 📦 Deployment

### Shared Hosting (cPanel)
1. Create MySQL database
2. Upload WordPress via FTP
3. Run WordPress installer
4. Upload theme to `/wp-content/themes/`
5. Activate in Admin

### VPS / Cloud
1. Install WordPress via SSH
2. Clone theme repository
3. Configure database
4. Point domain to server

### WordPress.com / Managed Hosting
- Use their theme upload interface
- Or use the premium version if available

## 🔒 Security

- Uses WordPress nonces for forms
- Sanitizes all input/output
- Follows WordPress security best practices
- Regular updates recommended

## 📱 Browser Support

✅ Chrome 90+
✅ Firefox 88+
✅ Safari 14+
✅ Edge 90+
✅ Mobile browsers (iOS Safari, Chrome Mobile)

## 🚀 Performance

- Optimized CSS & JavaScript
- Lazy loading for images
- Minified assets
- Mobile-first responsive design
- Lighthouse score: 90+

## 📚 Documentation

For detailed setup instructions, see:
- [Installation Guide](./docs/INSTALLATION.md)
- [Customization Guide](./docs/CUSTOMIZATION.md)
- [Troubleshooting](./docs/TROUBLESHOOTING.md)

## 🤝 Support

For issues or questions:
1. Check existing GitHub Issues
2. Create a new Issue with detailed description
3. Contact: info@vietsinhmechanical.vn

## 📄 License

GPL v2 or later - See LICENSE file

## 👨‍💻 Development Team

Viet Sinh Mechanical Development Team

---

**Happy to help with your WordPress website! 🚀**