<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViiCheck - ระบบช่วยเหลือฉุกเฉินและติดต่อเจ้าของรถ</title>
    <meta name="description" content="ระบบช่วยเหลือฉุกเฉินและติดต่อเจ้าของรถที่ครอบคลุมทั่วประเทศไทย">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
      <link href="https://kit-pro.fontawesome.com/releases/v6.4.0/css/pro.min.css" rel="stylesheet">


    <link rel="stylesheet" href="styles.css">
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            /* Primary Colors */
            --primary: #db2d2e;
            --primary-dark: #b02426;
            --primary-light: #e55a5b;
            --primary-bg: rgba(219, 45, 46, 0.1);

            /* Neutral Colors */
            --white: #ffffff;
            --black: #000000;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;

            /* Background Colors */
            --bg-primary: var(--white);
            --bg-secondary: var(--gray-50);
            --bg-accent: var(--primary-bg);

            /* Text Colors */
            --text-primary: var(--gray-900);
            --text-secondary: var(--gray-600);
            --text-muted: var(--gray-500);
            --text-white: var(--white);

            /* Border Colors */
            --border-light: var(--gray-200);
            --border-medium: var(--gray-300);

            /* Shadows */
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-emergency: 0 10px 30px -5px rgba(219, 45, 46, 0.3);

            /* Gradients */
            --gradient-primary: linear-gradient(135deg, var(--primary), var(--primary-light));
            --gradient-hero: linear-gradient(135deg, rgba(219, 45, 46, 0.9), rgba(181, 36, 38, 0.9));

            /* Transitions */
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);

            /* Border Radius */
            --radius-sm: 6px;
            --radius-md: 8px;
            --radius-lg: 12px;
            --radius-xl: 16px;
            --radius-2xl: 20px;

            /* Spacing */
            --space-1: 0.25rem;
            --space-2: 0.5rem;
            --space-3: 0.75rem;
            --space-4: 1rem;
            --space-5: 1.25rem;
            --space-6: 1.5rem;
            --space-8: 2rem;
            --space-10: 2.5rem;
            --space-12: 3rem;
            --space-16: 4rem;
            --space-20: 5rem;
            --space-24: 6rem;
        }

        body {
            font-family: 'Prompt', sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            background-color: var(--bg-primary);
            overflow-x: hidden;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--space-4);
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: var(--space-3) var(--space-6);
            border: none;
            border-radius: var(--radius-md);
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: var(--transition);
            font-size: 14px;
            gap: var(--space-2);
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: var(--text-white);
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-emergency);
        }

        .btn-outline {
            background: transparent;
            color: #fff;
            border: 2px solid #fff;
        }

        .btn-outline:hover {
            background: #fff;
            color: var(--primary);
        }

        .btn-large {
            padding: var(--space-4) var(--space-8);
            font-size: 16px;
        }

        /* Typography */
        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
        }

        /* Section Styles */
        .section-header {
            text-align: center;
            margin-bottom: var(--space-16);
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 2.5rem);
            font-weight: 700;
            margin-bottom: var(--space-4);
            color: var(--text-primary);
        }

        .section-description {
            font-size: 1.125rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-light);
            transition: var(--transition);
        }

        .profile-dropdown {
            position: relative;
            display: inline-block;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            min-width: 150px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 999;
            border-radius: 8px;
            padding: 0;
            list-style: none;
        }

        .dropdown-menu li a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
        }

        .dropdown-menu li a:hover {
            background-color: #f0f0f0;
        }

        /* เปิดเมื่อ hover */
        .profile-dropdown:hover .dropdown-menu {
            display: block;
        }

        /* เปิดเมื่อคลาส active ถูกเพิ่ม */
        .profile-dropdown.active .dropdown-menu {
            display: block;
        }



        .dropdown-item {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            padding: var(--space-3) var(--space-4);
            color: var(--text-primary);
            text-decoration: none;
            transition: var(--transition);
            border-radius: var(--radius-sm);
            margin: var(--space-1);
            width: 200px;

        }

        .dropdown-item:hover {
            background: var(--bg-secondary);
            color: var(--primary);
        }

        .dropdown-item i {
            font-size: 14px;
            width: 16px;
        }

        .dropdown-divider {
            height: 1px;
            background: var(--border-light);
            margin: var(--space-2) var(--space-4);
        }

        /* Mobile Profile Menu */
        .mobile-profile-menu {
            margin-top: var(--space-4);
            padding-top: var(--space-4);
            border-top: 1px solid var(--border-light);
        }

        .mobile-profile-header {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            padding: var(--space-3) 0;
            color: var(--text-primary);
            font-weight: 600;
            border-bottom: 1px solid var(--border-light);
            margin-bottom: var(--space-2);
        }

        .mobile-profile-item {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            padding: var(--space-3) 0;
            color: var(--text-primary);
            text-decoration: none;
            transition: var(--transition);
            border-bottom: 1px solid var(--border-light);
        }

        .mobile-profile-item:hover {
            color: var(--primary);
        }

        .mobile-profile-item:last-child {
            border-bottom: none;
        }

        .mobile-profile-item i {
            font-size: 14px;
            width: 16px;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 64px;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: var(--space-2);
        }

        .logo-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-white);
        }

        .logo-icon {
            height: 40px;
            width: 80px;
        }

        .logo-text {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
        }

        .nav-menu {
            display: flex;
            gap: var(--space-8);
        }

        .nav-link {
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .nav-cta {
            display: flex;
            gap: var(--space-4);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-primary);
        }

        .mobile-nav {
            display: none;
            padding: var(--space-4) 0;
            border-top: 1px solid var(--border-light);
            flex-direction: column;
            gap: var(--space-4);
        }

        .mobile-nav-link {
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 500;
            padding: var(--space-2) 0;
        }

        .mobile-cta {
            display: flex;
            flex-direction: column;
            gap: var(--space-2);
            padding-top: var(--space-4);
        }

        /* Hero Section */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: var(--text-white);
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse"><path d="M 50 0 L 0 0 0 50" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="1000" height="1000" fill="url(%23grid)"/></svg>');
            opacity: 0.5;
        }

        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 700;
            margin-bottom: var(--space-6);
            line-height: 1.1;
        }

        .hero-description {
            font-size: 1.25rem;
            margin-bottom: var(--space-8);
            opacity: 0.9;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            gap: var(--space-4);
            justify-content: center;
            margin-bottom: var(--space-12);
            flex-wrap: wrap;
        }

        .hero-features {
            display: flex;
            gap: var(--space-8);
            justify-content: center;
            flex-wrap: wrap;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            font-weight: 500;
        }

        .feature-item i {
            font-size: 1.25rem;
            color: var(--primary-light);
        }

        /* Stats Section */
        .stats {
            padding: var(--space-20) 0;
            background: linear-gradient(45deg, var(--bg-primary) 0%, var(--bg-secondary) 50%, var(--bg-primary) 100%);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--space-8);
            margin-bottom: var(--space-16);
        }

        .stat-card {
            background: var(--white);
            padding: var(--space-8);
            border-radius: var(--radius-2xl);
            text-align: center;
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
            border: 1px solid var(--border-light);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-emergency);
        }

        .stat-icon {
            width: 64px;
            height: 64px;
            background: var(--primary-bg);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto var(--space-6);
            font-size: 2rem;
            color: var(--primary);
            transition: var(--transition);
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.1);
        }

        .stat-value {
            font-size: clamp(2rem, 4vw, 2.5rem);
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: var(--space-2);
            transition: var(--transition);
        }

        .stat-card:hover .stat-value {
            color: var(--primary);
        }

        .stat-label {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: var(--space-2);
        }

        .stat-description {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .achievement-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: var(--space-2);
            background: var(--gradient-primary);
            color: var(--text-white);
            padding: var(--space-4) var(--space-8);
            border-radius: 50px;
            font-weight: 600;
            max-width: fit-content;
            margin: 0 auto;
            box-shadow: var(--shadow-emergency);
        }

        /* Services Section */
        .services {
            padding: var(--space-20) 0;
            background: var(--bg-primary);
        }


        .services-grid:hover .service-card:hover {
            background-color: transparent !important;
            width: 100%;
        }

        @media (min-width: 1200px) {
            .services-grid {
                display: flex;
            }

            .services-grid:not(.active):hover .service-card:hover .service-content {
                display: flex;
                align-items: center;
            }


            .services-grid:not(.active):hover .service-card:hover .service-content .video-placeholder {

                width: 400px;
            }

            .services-grid:not(.active):hover .service-card:hover .service-content .img-fix,
            .service-card.active .img-fix {
                width: 300px;
                margin-bottom: 15px;
            }

            .img-fix-none {
                display: none !important;
            }

            .services-grid:not(.active):hover .service-card:hover .service-content .img-fix-none,
            .service-card.active .img-fix-none {
                display: block !important;
            }

            .services-grid:not(.active):hover .service-card:hover .service-content .gallery-image-how-to-use {
                display: block;
            }

            .services-grid:not(.active):hover>.service-card:not(:hover) .service-steps,
            .services-grid:not(.active):hover>.service-card:not(:hover) .service-video,
            .services-grid:not(.active):hover>.service-card:not(:hover) .service-title {
                display: none;
            }

            .services-grid:not(.active):hover>.service-card:not(:hover) .service-header {
                height: 100%;
            }

            .services-grid:not(.active):hover>.service-card:not(:hover) {
                width: 145px;
            }






            .service-card.active .service-content {
                display: flex !important;
                align-items: center !important;
            }


            .service-card.active .video-placeholder {
                width: 400px !important;
            }

            .service-card.active .service-content .gallery-image-how-to-use {
                display: block !important;
            }


            .services-grid.active>.service-card:not(.active) .service-title {
                display: none !important;
            }

            .services-grid.active>.service-card:not(.active) .service-header {
                height: 100% !important;
            }

            .services-grid.active>.service-card:not(.active) {
                width: 145px !important;
            }

            .btn-step-img {
                background-color: #db2d2e;
                color: #fff;
                border: 1px solid #db2d2e;
                padding: 2px 10px;
                border-radius: 10px;
                cursor: pointer;
            }

            .service-card-child {
                background: var(--white);
                border-radius: var(--radius-2xl);
                box-shadow: var(--shadow-lg);
                transition: var(--transition);
                border: 1px solid var(--border-light);
                width: 100%;
                margin: 0 10px;
                height: 605px;
                overflow: hidden;
            }
        }

        @media (max-width: 1200px) {
            .btn-step-img {
                display: none;
            }

            .services-grid {
                display: block;
            }

            .service-card-child {
                background: var(--white);
                border-radius: var(--radius-2xl);
                box-shadow: var(--shadow-lg);
                transition: var(--transition);
                border: 1px solid var(--border-light);
                width: 100%;
                margin: 0 10px;
            }

            .service-card {
                margin-bottom: 15px;
            }
        }




        .gallery-image-how-to-use {
            display: none;
            width: 400px;
            border-radius: 10px;
            margin-top: 15px;
        }



        .service-card {
            padding: 0 10px;
            width: 100%;
            transition: all .15s ease-in-out;

        }

        /* .service-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-xl);
    } */

        .service-header {
            padding: var(--space-8);
            background: var(--bg-secondary);
            display: flex;
            align-items: center;
            gap: var(--space-4);
        }

        .service-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient-primary);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-white);
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .service-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .service-video {
            padding: var(--space-6);
        }

        .img-fix {
            aspect-ratio: 16/9 !important;
            background: var(--gray-100) !important;
            border-radius: var(--radius-lg) !important;
            flex-direction: column !important;
            align-items: center;
            justify-content: center !important;
            gap: var(--space-2) !important;
            color: var(--text-secondary) !important;
            cursor: pointer !important;
            transition: var(--transition) !important;
        }

        .video-placeholder {
            aspect-ratio: 16/9;
            background: var(--gray-100);
            border-radius: var(--radius-lg);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: var(--space-2);
            color: var(--text-secondary);
            cursor: pointer;
            transition: var(--transition);
        }

        .video-placeholder:hover {
            background: var(--primary-bg);
            color: var(--primary);
        }

        .video-placeholder i {
            font-size: 3rem;
        }

        .service-steps {
            padding: 0 var(--space-6) var(--space-6);
        }

        .service-steps h4 {
            font-weight: 600;
            margin-bottom: var(--space-4);
            color: var(--text-primary);
        }

        .service-steps ol {
            padding-left: var(--space-4);
            color: var(--text-secondary);
        }

        .service-steps li {
            margin-bottom: var(--space-2);
            line-height: 1.6;
        }

        .service-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: var(--space-4);
            padding: var(--space-6);
            overflow: auto;
            max-height: 450px;
        }

        .gallery-item {
            aspect-ratio: 1;
        }

        .image-placeholder {
            width: 100%;
            height: 100%;
            background: var(--gray-100);
            border-radius: var(--radius-md);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: var(--space-1);
            color: var(--text-muted);
            font-size: 0.75rem;
            text-align: center;
            padding: var(--space-2);
            transition: var(--transition);
        }

        .image-placeholder:hover {
            background: var(--primary-bg);
            color: var(--primary);
        }

        .image-placeholder.large {
            aspect-ratio: 4/3;
            font-size: 1rem;
        }

        .image-placeholder i {
            font-size: 1.5rem;
        }

        .image-placeholder.large i {
            font-size: 3rem;
        }

        /* Awards Section */
        .awards {
            padding: var(--space-20) 0;
            background: var(--bg-secondary);
        }

        .awards-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--space-12);
            align-items: center;
        }

        .award-image .image-placeholder {
            aspect-ratio: 4/3;
            background: var(--gray-100);
            border-radius: var(--radius-2xl);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: var(--space-4);
            color: var(--text-secondary);
            font-size: 1.125rem;
        }

        .awards-list {
            display: flex;
            flex-direction: column;
            gap: var(--space-6);
        }

        .award-item {
            display: flex;
            align-items: center;
            gap: var(--space-4);
            padding: var(--space-6);
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-md);
            transition: var(--transition);
        }

        .award-item:hover {
            transform: translateX(8px);
            box-shadow: var(--shadow-lg);
        }

        .award-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-white);
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .award-content h4 {
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: var(--space-1);
        }

        .award-content p {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        /* Gallery Section */
        .gallery {
            padding: var(--space-20) 0;
            background: var(--bg-primary);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--space-6);
        }

        .gallery-grid .gallery-item {
            aspect-ratio: 4/3;
            position: relative;
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: var(--transition);
        }

        .gallery-grid .gallery-item:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-emergency);
        }

        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-grid .gallery-item:hover .gallery-image {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: white;
            padding: var(--space-5);
            transform: translateY(100%);
            transition: var(--transition);
        }

        .gallery-grid .gallery-item:hover .gallery-overlay {
            transform: translateY(0);
        }

        .gallery-overlay span {
            font-weight: 500;
            font-size: 0.875rem;
        }

        /* Partners Section */
        .partners {
            padding: var(--space-20) 0;
            background: var(--bg-secondary);
            overflow: hidden;
            /* ซ่อนเกินขอบ */
        }

        .partners-marquee {
            overflow: hidden;
            margin-top: var(--space-10);
            position: relative;
        }

        .partners-track {
            display: flex;
            gap: var(--space-8);
            animation: marquee 30s linear infinite;
            width: max-content;
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .partners-track:hover {
            animation-play-state: paused;
        }

        .partner-item {
            flex: 0 0 auto;
            width: 250px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: var(--space-4);
            padding: var(--space-8);
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            min-width: 200px;
            flex-shrink: 0;
        }

        .partner-item:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .partner-logo {
            width: 80px;
            height: 80px;
            background: var(--primary-bg);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 2rem;
        }

        .partner-name {
            font-weight: 600;
            color: var(--text-primary);
            text-align: center;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }


        /* Footer */
        .footer {
            background: var(--gray-900);
            color: var(--gray-300);
            padding: var(--space-20) 0 var(--space-8);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--space-12);
            margin-bottom: var(--space-12);
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            margin-bottom: var(--space-4);
        }

        .footer-logo .logo-text {
            color: var(--text-white);
        }

        .footer-description {
            margin-bottom: var(--space-6);
            line-height: 1.6;
        }

        .social-links {
            display: flex;
            gap: var(--space-3);
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: var(--gray-800);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-400);
            text-decoration: none;
            transition: var(--transition);
        }

        .social-link:hover {
            background: var(--primary);
            color: var(--text-white);
            transform: translateY(-2px);
        }

        .footer-title {
            color: var(--text-white);
            font-weight: 600;
            margin-bottom: var(--space-4);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: var(--space-2);
        }

        .footer-links a {
            color: var(--gray-400);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: var(--space-3);
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: var(--space-3);
        }

        .contact-item i {
            color: var(--primary);
            width: 20px;
        }

        .footer-bottom {
            border-top: 1px solid var(--gray-800);
            padding-top: var(--space-8);
        }

        .footer-bottom-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: var(--space-4);
        }

        .footer-bottom-links {
            display: flex;
            gap: var(--space-6);
        }

        .footer-bottom-links a {
            color: var(--gray-400);
            text-decoration: none;
            font-size: 0.875rem;
            transition: var(--transition);
        }

        .footer-bottom-links a:hover {
            color: var(--primary);
        }

        /* Responsive Design */
        @media (max-width: 768px) {

            .nav-menu,
            .nav-cta {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .mobile-nav.active {
                display: flex;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .hero-features {
                flex-direction: column;
                align-items: center;
                gap: var(--space-4);
            }

            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: var(--space-4);
            }

            .services-grid {
                grid-template-columns: 1fr;
            }

            .awards-content {
                grid-template-columns: 1fr;
                gap: var(--space-8);
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: var(--space-4);
            }

            .partners-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: var(--space-4);
            }

            .footer-bottom-content {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 var(--space-3);
            }

            .service-steps ol {
                padding-left: var(--space-3);
            }

            .award-item {
                flex-direction: column;
                text-align: center;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: var(--space-8);
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        /* Scroll animations */
        .animate-on-scroll {
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Loading states */
        .loading {
            animation: pulse 1.5s ease-in-out infinite;
        }

        .usage-image-container {
            width: 100%;
            aspect-ratio: 1 / 1;
            /* ทำให้เป็นกรอบสี่เหลี่ยมจัตุรัส */
            overflow: hidden;
            border-radius: 10px;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .usage-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* ทำให้ภาพเต็มกรอบและตัดส่วนเกิน */
            object-position: center;
            display: block;
        }

        .usage-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 20px;
        }.profile-btn{
            background-color: #fff;
            border: 1px solid var(--primary);
            color: var(--primary);
        }
    </style>



</head>

<body class="">
    <a id="a_up_short" style="margin-right:10px;margin-bottom: 15px;" href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- ============== COOKIE ============== -->
    <!-- Cookie Consent by https://www.cookiewow.com -->
    <script type="text/javascript" src="https://cookiecdn.com/cwc.js"></script>
    <script id="cookieWow" type="text/javascript" src="https://cookiecdn.com/configs/B9xBa3fozaLCfhakLM3pgqtW" data-cwcid="B9xBa3fozaLCfhakLM3pgqtW"></script>

    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="container">
            <div class="nav-content">
                <!-- Logo -->
                <div class="nav-logo">
                    <div class="logo-icon">
                        <a href="{{URL::to('/')}}"><img width="110%" src="{{ asset('/img/logo/VII-check-LOGO-W-v1.png') }}"></a>

                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="nav-menu" id="navMenu">
                    <a href="{{ url('/') }}#home" class="nav-link">หน้าแรก</a>
                    <a href="{{ url('/') }}#services" class="nav-link">บริการ</a>
                    <a href="{{ url('/') }}#awards" class="nav-link">รางวัล</a>
                    <a href="{{ url('/') }}#gallery" class="nav-link">ภาพการใช้งาน</a>
                    <a href="{{ url('/') }}#contact" class="nav-link">ติดต่อ</a>
                </div>

                <!-- CTA Buttons -->
                <div class="nav-cta">
                    <button class="btn btn-primary">
                        <i class="fas fa-exclamation-triangle"></i>
                        SOS ฉุกเฉิน
                    </button>

                    <!-- Profile Dropdown -->
                    <div class="profile-dropdown" id="profileDropdown">
                        <button class="btn btn-outline profile-btn" id="profileBtn">
                            <i class="fas fa-user"></i>
                            โปรไฟล์
                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                        </button>
                        <div class="dropdown-menu" id="dropdownMenu">
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-edit"></i>
                                แก้ไขโปรไฟล์
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-cog"></i>
                                admin partner
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i>
                                ออกจากระบบ
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <!-- Mobile Navigation -->
            <div class="mobile-nav" id="mobileNav">
                <a href="#home" class="mobile-nav-link">หน้าแรก</a>
                <a href="#services" class="mobile-nav-link">บริการ</a>
                <a href="#awards" class="mobile-nav-link">รางวัล</a>
                <a href="#gallery" class="mobile-nav-link">ภาพการใช้งาน</a>
                <a href="#contact" class="mobile-nav-link">ติดต่อ</a>
                <div class="mobile-cta">
                    <button class="btn btn-outline">
                        <i class="fas fa-comment"></i>
                        ติดต่อเรา
                    </button>
                    <button class="btn btn-primary">
                        SOS ฉุกเฉิน
                    </button>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <!-- Footer -->
    <footer id="contact" class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <div class="logo-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <span class="logo-text">ViiCheck</span>
                    </div>
                    <p class="footer-description">
                        ระบบช่วยเหลือฉุกเฉินและติดต่อเจ้าของรถที่ครอบคลุมทั่วประเทศไทย
                        พร้อมให้บริการ 24 ชั่วโมง
                    </p>
                    <div class="social-links">
                        <a href="https://www.facebook.com/ViiCheck-100959585396310" class="social-link">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://line.me/R/ti/p/%40702ytkls" class="social-link">
                            <i class="fab fa-line"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-section">
                    <h4 class="footer-title">บริการ</h4>
                    <ul class="footer-links">
                        <li><a href="#services">ViiSOS ฉุกเฉิน</a></li>
                        <li><a href="#services">ViiMOVE ติดต่อเจ้าของรถ</a></li>
                        <li><a href="#services">ระบบแจ้งซ่อม</a></li>
                        <li><a href="#gallery">ภาพการใช้งาน</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4 class="footer-title">เกี่ยวกับเรา</h4>
                    <ul class="footer-links">
                        <li><a href="#awards">รางวัลที่ได้รับ</a></li>
                        <li><a href="#home">เกี่ยวกับ ViiCheck</a></li>
                        <li><a href="#">ข่าวสาร</a></li>
                        <li><a href="#">ร่วมงานกับเรา</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4 class="footer-title">ติดต่อเรา</h4>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>02-0277856 (24 ชั่วโมง)</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>contact.viicheck@gmail.com</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>กรุงเทพมหานคร, ประเทศไทย</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p>&copy; 2024 ViiCheck. สงวนลิขสิทธิ์.</p>
                    <div class="footer-bottom-links">
                        <a href="{{ url('/privacy_policy') }}">นโยบายความเป็นส่วนตัว</a>
                        <a href="{{ url('/terms_of_service') }}">เงื่อนไขการใช้งาน</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>