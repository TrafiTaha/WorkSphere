# WorkSphere - Quick Start Guide

## 🎯 Getting Started in 5 Minutes

### Step 1: Access the Application
The development server is already running! Open your browser to:
```
http://127.0.0.1:8000
```

### Step 2: Explore the Landing Page
You'll see the beautiful WorkSphere landing page with:
- Hero section with call-to-action buttons
- Services showcase (WiFi, Desks, 24/7 Access, Coffee)
- Featured workspaces
- Pricing plans
- Customer testimonials
- Contact form

### Step 3: Login as Admin
Click "Login" in the navigation bar and use:
- **Email:** `admin@worksphere.com`
- **Password:** `password`

You'll be redirected to the **Admin Dashboard** where you can:
- View statistics (users, workspaces, bookings, revenue)
- Manage workspaces, pricing plans, and testimonials
- Monitor recent bookings

### Step 4: Explore Admin Features
From the admin dashboard, try:
- **Add Workspace** - Create new coworking spaces
- **View All Workspaces** - See and manage existing spaces
- **Add Pricing Plan** - Create subscription plans
- **Add Testimonial** - Add customer reviews

### Step 5: Test Member Features
1. Logout from admin account
2. Click "Register" to create a new member account
3. After registration, you'll see the **Member Dashboard** with:
   - Welcome message
   - Booking statistics
   - Quick action buttons
   - Upcoming bookings list

### Step 6: Create a Booking
1. Click "New Booking" button
2. Select a workspace from the dropdown
3. Choose start and end times
4. Watch the price calculate automatically
5. Add optional notes
6. Click "Create Booking"

### Step 7: Manage Bookings
- View all your bookings in the "View All Bookings" page
- Click "View" to see booking details
- Click "Edit" to modify upcoming bookings
- Click "Cancel" to cancel a booking

## 📱 Key URLs

| Page | URL | Access |
|------|-----|--------|
| Landing Page | `/` | Public |
| Login | `/login` | Public |
| Register | `/register` | Public |
| Member Dashboard | `/dashboard` | Members |
| My Bookings | `/bookings` | Members |
| New Booking | `/bookings/create` | Members |
| Admin Dashboard | `/admin/dashboard` | Admin Only |
| Manage Workspaces | `/admin/workspaces` | Admin Only |
| Manage Pricing Plans | `/admin/pricing-plans` | Admin Only |
| Manage Testimonials | `/admin/testimonials` | Admin Only |

## 🔑 Test Accounts

### Admin Account
- Email: `admin@worksphere.com`
- Password: `password`
- Access: Full admin privileges

### Member Accounts
The seeder created 10 member accounts. You can use:
- Email: `test@example.com` (or check database for other seeded users)
- Password: `password`
- Access: Member features only

## 🎨 What's Included

### ✅ Completed Features
- [x] Modern landing page with Tailwind CSS
- [x] User authentication (Laravel Breeze)
- [x] Role-based access (Admin/Member)
- [x] Member dashboard with statistics
- [x] Admin dashboard with analytics
- [x] Workspace booking system
- [x] Booking management (create, view, edit, cancel)
- [x] Real-time price calculation
- [x] Database with sample data (20 workspaces, 10 users, bookings, etc.)
- [x] Responsive design
- [x] Vue 3 and Chart.js installed (ready for enhancements)

### 🎯 Sample Data Included
- **1 Admin User** - Full access to admin panel
- **10 Member Users** - Can create bookings
- **20 Workspaces** - Various types (desks, offices, meeting rooms)
- **9 Pricing Plans** - Different subscription options
- **10 Testimonials** - Customer reviews (3 featured)
- **Multiple Bookings** - Sample booking data for testing

## 🛠️ Development Commands

### Start Development Server
```bash
cd worksphere
php artisan serve
```

### Compile Assets (in another terminal)
```bash
cd worksphere
npm run dev
```

### Reset Database with Fresh Data
```bash
php artisan migrate:fresh --seed
```

### Create New Admin User
```bash
php artisan tinker
```
Then run:
```php
User::create([
    'name' => 'Your Name',
    'email' => 'your@email.com',
    'password' => bcrypt('password'),
    'role' => 'admin'
]);
```

## 🐛 Troubleshooting

### Server Not Running?
```bash
cd worksphere
php artisan serve
```

### Assets Not Loading?
```bash
npm run dev
```

### Database Issues?
```bash
php artisan migrate:fresh --seed
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
```

## 📞 Support

For issues or questions, check:
- `README_WORKSPHERE.md` - Full documentation
- Laravel Documentation: https://laravel.com/docs/10.x
- Tailwind CSS: https://tailwindcss.com/docs

---

**Enjoy using WorkSphere! 🚀**

