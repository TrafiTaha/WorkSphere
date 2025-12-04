# WorkSphere - Modern Coworking Platform

WorkSphere is a complete Laravel 10 application for managing a modern coworking space. Users can browse workspaces, book desks and meeting rooms, and manage their bookings through an intuitive dashboard.

## 🚀 Features

### Public Features
- **Modern Landing Page** with hero section, services showcase, pricing plans, and testimonials
- **Workspace Browsing** - View available workspaces with detailed information
- **Responsive Design** - Built with Tailwind CSS for mobile-first experience

### Member Features
- **User Authentication** - Secure login/registration with Laravel Breeze
- **Member Dashboard** - View booking statistics and upcoming reservations
- **Workspace Booking System** - Book workspaces with date/time selection
- **Booking Management** - View, edit, and cancel bookings
- **Real-time Price Calculation** - Automatic price estimation based on hours

### Admin Features
- **Admin Dashboard** - Comprehensive statistics and analytics
- **Workspace Management** - Full CRUD operations for workspaces
- **Pricing Plan Management** - Manage subscription plans
- **Testimonial Management** - Control featured testimonials
- **Booking Overview** - Monitor all bookings and revenue

## 📋 Requirements

- PHP 8.1+
- Composer
- Node.js & NPM
- SQLite (or MySQL/PostgreSQL)

## 🛠️ Installation

1. **Navigate to the project directory:**
   ```bash
   cd worksphere
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies:**
   ```bash
   npm install
   ```

4. **Environment setup:**
   - The `.env` file is already configured with SQLite
   - Database file is created at `database/database.sqlite`

5. **Generate application key (if not done):**
   ```bash
   php artisan key:generate
   ```

6. **Run migrations and seeders:**
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Build assets:**
   ```bash
   npm run dev
   ```

8. **Start the development server:**
   ```bash
   php artisan serve
   ```

9. **Visit the application:**
   - Open your browser to `http://127.0.0.1:8000`

## 👤 Default Users

After seeding, you can login with:

**Admin Account:**
- Email: `admin@worksphere.com`
- Password: `password`

**Member Accounts:**
- Email: `test@example.com` (or any seeded user)
- Password: `password`

## 📁 Project Structure

### Models
- **User** - User accounts with role-based access (admin/member)
- **Workspace** - Coworking spaces (desks, offices, meeting rooms)
- **Booking** - User reservations with status tracking
- **PricingPlan** - Subscription plans with features
- **Testimonial** - Customer reviews and ratings

### Controllers
- **LandingController** - Public homepage
- **BookingController** - Member booking management
- **Admin/DashboardController** - Admin statistics
- **Admin/WorkspaceController** - Workspace CRUD
- **Admin/PricingPlanController** - Pricing plan CRUD
- **Admin/TestimonialController** - Testimonial CRUD

### Key Routes
- `/` - Landing page
- `/login` - User login
- `/register` - User registration
- `/dashboard` - Member dashboard (redirects admins to admin dashboard)
- `/bookings` - Booking management
- `/admin/dashboard` - Admin dashboard
- `/admin/workspaces` - Workspace management
- `/admin/pricing-plans` - Pricing plan management
- `/admin/testimonials` - Testimonial management

## 🎨 Technologies Used

- **Backend:** Laravel 10
- **Frontend:** Blade Templates, Tailwind CSS
- **JavaScript:** Vue 3, Chart.js (installed for future dashboard enhancements)
- **Authentication:** Laravel Breeze
- **Database:** SQLite (configurable to MySQL/PostgreSQL)

## 🔐 Security Features

- Role-based access control (Admin/Member)
- Admin middleware protection
- CSRF protection on all forms
- Password hashing with bcrypt
- User authorization for booking operations

## 📊 Database Schema

### Users Table
- Standard Laravel auth fields + `role` (admin/member)

### Workspaces Table
- name, type, description, price_per_hour, price_per_day
- capacity, amenities (JSON), is_available

### Bookings Table
- user_id, workspace_id, start_time, end_time
- total_price, status (pending/confirmed/cancelled/completed), notes

### Pricing Plans Table
- name, description, price, duration
- features (JSON), is_popular

### Testimonials Table
- name, position, company, content
- rating, avatar, is_featured

## 🚧 Future Enhancements

- Payment gateway integration (Stripe/PayPal)
- Email notifications for bookings
- Calendar view for availability
- Advanced search and filtering
- Mobile app (API ready)
- Multi-language support
- Reporting and analytics with Chart.js visualizations

## 📝 License

This project is open-sourced software licensed under the MIT license.

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!

---

**Built with ❤️ using Laravel 10 & Tailwind CSS**

