# The Vision - Business Excellence Platform

## About 
The Vision is a comprehensive content management platform designed to showcase inspiring journeys of GCC business leaders and enterprises. Our platform highlights stories of innovation, resilience, and ambition across the Gulf region.

## Features
- **Content Management**: Create and manage interviews, ads, podcasts, and events
- **User Authentication**: Secure login system with session management
- **Media Upload**: Support for image uploads with storage management
- **Responsive Design**: Modern and mobile-friendly interface
- **Admin Dashboard**: Comprehensive dashboard for content management

## Technologies Used
- **Backend**: Laravel 11
- **Frontend**: Tailwind CSS
- **Database**: MySQL/SQLite
- **Authentication**: Custom session-based auth system
- **File Storage**: Laravel storage with symbolic links

## Getting Started

### Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL/SQLite

### Installation
1. Clone the repository
```bash
git clone https://github.com/Mohamedizeldeen/blog-app.git
cd theVision
```

2. Install dependencies
```bash
composer install
npm install
```

3. Environment setup
```bash
cp .env.example .env
php artisan key:generate
```

4. Database setup
```bash
php artisan migrate:fresh --seed
```

5. Storage link
```bash
php artisan storage:link
```

6. Run the application
```bash
php artisan serve
```

### Default Login Credentials
- **Email**: Mohamed@email.com
- **Password**: 123456

## Project Structure
```
app/
├── Http/Controllers/     # Application controllers
│   ├── AuthController.php
│   ├── InterviewController.php
│   ├── AdController.php
│   ├── PodcastController.php
│   └── EventController.php
├── Models/              # Eloquent models
│   ├── User.php
│   ├── Interview.php
│   ├── Ad.php
│   ├── Podcast.php
│   └── Event.php
├── Middleware/          # Custom middleware
│   └── CheckAuth.php
resources/views/         # Blade templates
├── dashboard.blade.php
├── login.blade.php
├── welcome.blade.php
├── interviews/
├── ads/
├── podcasts/
└── events/
```

## Security Features
- Custom authentication middleware
- Session management with regeneration
- Password hashing with bcrypt
- CSRF protection
- Input validation and sanitization

## Content Types
1. **Interviews**: Feature business leaders and their journeys
2. **Ads**: Promotional content and advertisements
3. **Podcasts**: Audio content and podcast episodes
4. **Events**: Business events and networking opportunities

## API Endpoints
- `GET /visionAdminDashboard` - Main dashboard
- `GET /thevisionlogin` - Login page
- `POST /thevisionlogin` - Login processing
- `GET /interviews` - List all interviews
- `POST /CreateInterview` - Create new interview
- Similar patterns for ads, podcasts, and events

## Contributing
1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License
This project is licensed under the MIT License.

## Contact
For more information about The Vision platform, please contact us at info@thevision-media.com