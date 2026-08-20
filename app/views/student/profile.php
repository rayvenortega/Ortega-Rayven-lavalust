<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($title); ?></title>

    <style>

        * {
            box-sizing: border-box;
        }

        :root {
            --deep-violet: #241044;
            --violet: #6c35c9;
            --bright-violet: #8f5bea;
            --soft-violet: #b99af5;
            --lavender: #f4edff;
            --pale: #faf8ff;
            --white: #ffffff;

            --text: #302340;
            --muted: #81738f;

            --border: #e8def5;
        }


        /* =========================================
           BODY
        ========================================= */

        body {
            margin: 0;

            min-height: 100vh;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            color: var(--text);

            background:

                radial-gradient(
                    circle at 8% 12%,
                    rgba(185,154,245,.28),
                    transparent 24%
                ),

                radial-gradient(
                    circle at 92% 20%,
                    rgba(108,53,201,.17),
                    transparent 25%
                ),

                radial-gradient(
                    circle at 50% 100%,
                    rgba(143,91,234,.12),
                    transparent 35%
                ),

                #f8f5ff;
        }


        /* =========================================
           TOP NAVIGATION
        ========================================= */

        .topbar {
            position: sticky;

            top: 0;

            z-index: 100;

            padding: 12px 0;

            background:
                rgba(36,16,68,.94);

            backdrop-filter: blur(18px);

            border-bottom:
                1px solid rgba(255,255,255,.10);

            box-shadow:
                0 8px 30px rgba(36,16,68,.18);
        }


        .nav {
            width:
                min(
                    1100px,
                    calc(100% - 32px)
                );

            min-height: 52px;

            margin: auto;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;
        }


        /* BRAND */

        .brand {
            display: flex;

            align-items: center;

            gap: 11px;

            color: #fff;

            font-size: 17px;

            font-weight: 800;
        }


        .brand-mark {
            width: 38px;

            height: 38px;

            display: grid;

            place-items: center;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #8f5bea,
                    #b99af5
                );

            color: #fff;

            font-size: 17px;

            box-shadow:
                0 5px 18px rgba(143,91,234,.35);
        }


        /* NAV BUTTONS */

        .nav-actions {
            display: flex;

            align-items: center;

            gap: 9px;
        }


        .nav-button {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding:
                10px 14px;

            border-radius: 11px;

            color: #fff;

            text-decoration: none;

            font-size: 12px;

            font-weight: 800;

            transition:
                .25s ease;
        }


        .nav-home {
            background:
                rgba(255,255,255,.08);

            border:
                1px solid
                rgba(255,255,255,.14);
        }


        .nav-profile {
            background:
                linear-gradient(
                    135deg,
                    #7440d0,
                    #9162e9
                );

            box-shadow:
                0 5px 16px
                rgba(143,91,234,.25);
        }


        .nav-button:hover {
            transform:
                translateY(-2px);

            background:
                rgba(255,255,255,.18);
        }


        /* =========================================
           PAGE
        ========================================= */

        .page {
            width:
                min(
                    1100px,
                    calc(100% - 32px)
                );

            margin: auto;

            padding:
                50px 0 70px;
        }


        /* =========================================
           PROFILE LAYOUT
        ========================================= */

        .profile-wrapper {
            display: grid;

            grid-template-columns:
                310px
                minmax(0,1fr);

            min-height: 650px;

            overflow: hidden;

            border-radius: 30px;

            background:
                rgba(255,255,255,.94);

            border:
                1px solid
                rgba(255,255,255,.9);

            box-shadow:
                0 30px 80px
                rgba(64,36,105,.14);
        }


        /* =========================================
           LEFT PROFILE PANEL
        ========================================= */

        .profile-side {
            position: relative;

            display: flex;

            flex-direction: column;

            justify-content: space-between;

            padding: 32px 25px;

            color: #fff;

            background:
                linear-gradient(
                    155deg,
                    #28104b 0%,
                    #4b1d88 48%,
                    #7040c5 100%
                );

            overflow: hidden;
        }


        .profile-side::before {
            content: "";

            position: absolute;

            width: 280px;

            height: 280px;

            right: -160px;

            top: -100px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.07);
        }


        .profile-side::after {
            content: "";

            position: absolute;

            width: 190px;

            height: 190px;

            left: -120px;

            bottom: 40px;

            border-radius: 50%;

            background:
                rgba(185,154,245,.08);
        }


        .side-content {
            position: relative;

            z-index: 2;
        }


        /* PROFILE ICON */

        .profile-avatar {
            width: 92px;

            height: 92px;

            margin-bottom: 22px;

            display: grid;

            place-items: center;

            border-radius: 28px;

            background:
                linear-gradient(
                    145deg,
                    #9a6bea,
                    #c2a4fa
                );

            border:
                5px solid
                rgba(255,255,255,.18);

            box-shadow:
                0 15px 35px
                rgba(0,0,0,.20);

            font-size: 27px;

            font-weight: 900;
        }


        .protected-label {
            display: inline-flex;

            padding:
                6px 10px;

            margin-bottom: 13px;

            border-radius: 20px;

            background:
                rgba(255,255,255,.11);

            border:
                1px solid
                rgba(255,255,255,.15);

            font-size: 10px;

            font-weight: 800;

            letter-spacing: 1px;

            text-transform: uppercase;
        }


        .side-name {
            margin: 0 0 9px;

            font-size: 29px;

            line-height: 1.15;

            font-weight: 900;
        }


        .side-course {
            margin: 0;

            color:
                rgba(255,255,255,.72);

            font-size: 13px;

            line-height: 1.6;
        }


        /* SIDE FOOTER */

        .side-footer {
            position: relative;

            z-index: 2;

            padding-top: 22px;

            border-top:
                1px solid
                rgba(255,255,255,.13);
        }


        .side-footer-label {
            margin-bottom: 6px;

            color:
                rgba(255,255,255,.55);

            font-size: 9px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: 1px;
        }


        .side-footer-text {
            margin: 0;

            color:
                rgba(255,255,255,.85);

            font-size: 12px;

            line-height: 1.5;
        }


        /* =========================================
           RIGHT CONTENT
        ========================================= */

        .profile-content {
            padding:
                34px 36px 38px;

            background:
                linear-gradient(
                    145deg,
                    #ffffff,
                    #fbf9ff
                );
        }


        /* CONTENT HEADER */

        .content-header {
            display: flex;

            align-items: flex-end;

            justify-content: space-between;

            gap: 20px;

            margin-bottom: 25px;

            padding-bottom: 20px;

            border-bottom:
                1px solid
                var(--border);
        }


        .content-title {
            margin: 0 0 5px;

            color:
                var(--deep-violet);

            font-size: 23px;

            font-weight: 900;
        }


        .content-subtitle {
            margin: 0;

            color:
                var(--muted);

            font-size: 12px;
        }


        .verified {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding:
                8px 11px;

            border-radius: 10px;

            background:
                #f0e8ff;

            color:
                #6841a5;

            font-size: 10px;

            font-weight: 800;

            white-space: nowrap;
        }


        .verified-dot {
            width: 7px;

            height: 7px;

            border-radius: 50%;

            background:
                #8f5bea;

            box-shadow:
                0 0 0 4px
                rgba(143,91,234,.12);
        }


        /* =========================================
           MIDDLEWARE
        ========================================= */

        .middleware {
            display: flex;

            align-items: center;

            gap: 13px;

            margin-bottom: 23px;

            padding:
                14px 16px;

            border-radius: 13px;

            background:
                #f7f1ff;

            border:
                1px solid
                #e8dcf7;

            color:
                #705c87;

            font-size: 12px;

            font-weight: 700;

            line-height: 1.5;
        }


        .verification-icon {
            width: 34px;

            height: 34px;

            flex-shrink: 0;

            display: grid;

            place-items: center;

            border-radius: 10px;

            background:
                #e7d9ff;

            color:
                #713dc4;

            font-weight: 900;
        }


        /* =========================================
           DETAILS
        ========================================= */

        .details {
            display: grid;

            grid-template-columns:
                repeat(2,minmax(0,1fr));

            gap: 13px;
        }


        .item {
            position: relative;

            min-height: 91px;

            padding:
                18px 18px 17px 21px;

            border-radius: 15px;

            border:
                1px solid
                var(--border);

            background:
                #fff;

            overflow: hidden;

            transition:
                .25s ease;
        }


        .item::before {
            content: "";

            position: absolute;

            left: 0;

            top: 0;

            bottom: 0;

            width: 4px;

            background:
                linear-gradient(
                    180deg,
                    #7040c5,
                    #b99af5
                );
        }


        .item:hover {
            transform:
                translateY(-3px);

            border-color:
                #d9c9ef;

            box-shadow:
                0 10px 25px
                rgba(78,43,124,.09);
        }


        .wide {
            grid-column:
                1 / -1;
        }


        /* =========================================
           LABEL
        ========================================= */

        .label {
            display: block;

            margin-bottom: 7px;

            color:
                #9a8ba9;

            font-size: 9px;

            font-weight: 900;

            text-transform: uppercase;

            letter-spacing: 1px;
        }


        /* =========================================
           VALUE
        ========================================= */

        .value {
            display: block;

            color:
                #49395c;

            font-size: 14px;

            font-weight: 800;

            line-height: 1.5;

            word-break: break-word;
        }


        /* =========================================
           SPECIAL INFORMATION
        ========================================= */

        .address-card {
            min-height: 100px;
        }


        .contact-card {
            border-top:
                3px solid
                #8f5bea;
        }


        .hobbies-card {
            border-top:
                3px solid
                #a77bea;
        }


        .facebook-card {
            border-top:
                3px solid
                #7040c5;
        }


        /* =========================================
           FACEBOOK BUTTON
        ========================================= */

        .facebook-link {
            display: inline-flex;

            align-items: center;

            gap: 9px;

            padding:
                7px 10px;

            border-radius: 9px;

            background:
                #f2eaff;

            color:
                #7040c5;

            text-decoration: none;

            font-size: 12px;

            font-weight: 800;

            transition:
                .2s ease;
        }


        .facebook-link:hover {
            background:
                #e8d9ff;

            color:
                #4b1d88;

            transform:
                translateX(2px);
        }


        .facebook-icon {
            width: 24px;

            height: 24px;

            display: grid;

            place-items: center;

            border-radius: 7px;

            background:
                #7040c5;

            color: #fff;

            font-size: 12px;

            font-weight: 900;
        }


        /* =========================================
           MOBILE
        ========================================= */

        @media (max-width: 800px) {

            .profile-wrapper {
                grid-template-columns: 1fr;
            }

            .profile-side {
                min-height: auto;

                padding: 28px 24px;
            }

            .side-footer {
                margin-top: 30px;
            }

            .profile-content {
                padding:
                    27px 22px 30px;
            }

        }


        @media (max-width: 600px) {

            .page {
                width:
                    calc(100% - 20px);

                padding-top: 25px;
            }

            .nav {
                width:
                    calc(100% - 22px);
            }

            .brand {
                font-size: 15px;
            }

            .nav-actions {
                width: 100%;
            }

            .nav-button {
                flex: 1;
            }

            .profile-wrapper {
                border-radius: 22px;
            }

            .details {
                grid-template-columns: 1fr;
            }

            .wide {
                grid-column: auto;
            }

            .content-header {
                align-items: flex-start;

                flex-direction: column;
            }

            .verified {
                width: 100%;

                justify-content: center;
            }

            .student-name {
                font-size: 29px;
            }

        }

    </style>

</head>


<body>


    <!-- =========================================
         NAVIGATION
    ========================================= -->

    <header class="topbar">

        <nav class="nav">


            <div class="brand">

                <span class="brand-mark">
                    ✦
                </span>

                Violet Student Portal

            </div>


            <div class="nav-actions">

                <a
                    class="nav-button nav-home"
                    href="<?= site_url('student'); ?>"
                >
                    ← Home
                </a>

                <a
                    class="nav-button nav-profile"
                    href="<?= site_url('student/profile'); ?>"
                >
                    Profile
                </a>

            </div>


        </nav>

    </header>


    <!-- =========================================
         MAIN
    ========================================= -->

    <main class="page">


        <section class="profile-wrapper">


            <!-- =====================================
                 LEFT PROFILE PANEL
            ===================================== -->

            <aside class="profile-side">


                <div class="side-content">


                    <div class="profile-avatar">
                        RV
                    </div>


                    <span class="protected-label">
                        ✦ Protected Profile
                    </span>


                    <h1 class="side-name">
                        <?= htmlspecialchars($name); ?>
                    </h1>


                    <p class="side-course">

                        <?= htmlspecialchars($course); ?>

                        <br>

                        <?= htmlspecialchars($year); ?>

                        ·

                        Section
                        <?= htmlspecialchars($section); ?>

                    </p>


                </div>


                <div class="side-footer">

                    <div class="side-footer-label">
                        Student Portal
                    </div>

                    <p class="side-footer-text">
                        Laboratory Exercise No. 3
                    </p>

                </div>


            </aside>


            <!-- =====================================
                 RIGHT CONTENT
            ===================================== -->

            <section class="profile-content">


                <!-- CONTENT HEADER -->

                <div class="content-header">

                    <div>

                        <h2 class="content-title">
                            Personal Information
                        </h2>

                        <p class="content-subtitle">
                            Your registered student information
                        </p>

                    </div>


                    <div class="verified">

                        <span class="verified-dot"></span>

                        Middleware Verified

                    </div>

                </div>


                <!-- =================================
                     MIDDLEWARE MESSAGE
                ================================= -->

                <div class="middleware">


                    <div class="verification-icon">
                        ✓
                    </div>


                    <div>

                        <?= htmlspecialchars(
                            $middleware_message,
                            ENT_QUOTES,
                            'UTF-8'
                        ); ?>

                    </div>


                </div>


                <!-- =================================
                     INFORMATION CARDS
                ================================= -->

                <div class="details">


                    <!-- STUDENT ID -->

                    <div class="item">

                        <span class="label">
                            Student ID
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($student_id); ?>
                        </span>

                    </div>


                    <!-- STUDENT NAME -->

                    <div class="item">

                        <span class="label">
                            Student Name
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($name); ?>
                        </span>

                    </div>


                    <!-- COURSE -->

                    <div class="item">

                        <span class="label">
                            Course
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($course); ?>
                        </span>

                    </div>


                    <!-- YEAR -->

                    <div class="item">

                        <span class="label">
                            Year Level
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($year); ?>
                        </span>

                    </div>


                    <!-- SECTION -->

                    <div class="item">

                        <span class="label">
                            Section
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($section); ?>
                        </span>

                    </div>


                    <!-- EMAIL -->

                    <div class="item">

                        <span class="label">
                            Email Address
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($email); ?>
                        </span>

                    </div>


                    <!-- ADDRESS -->

                    <div class="item wide address-card">

                        <span class="label">
                            Home Address
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($address); ?>
                        </span>

                    </div>


                    <!-- CONTACT -->

                    <div class="item contact-card">

                        <span class="label">
                            Contact Number
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($contact); ?>
                        </span>

                    </div>


                    <!-- HOBBIES -->

                    <div class="item hobbies-card">

                        <span class="label">
                            Hobbies & Interests
                        </span>

                        <span class="value">
                            <?= htmlspecialchars($hobbies); ?>
                        </span>

                    </div>


                    <!-- FACEBOOK -->

                    <div class="item wide facebook-card">

                        <span class="label">
                            Social Media
                        </span>

                        <span class="value">

                            <a
                                class="facebook-link"
                                href="<?= htmlspecialchars($facebook); ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                            >

                                <span class="facebook-icon">
                                    f
                                </span>

                                Open Facebook Profile
                                ↗

                            </a>

                        </span>

                    </div>


                </div>


            </section>


        </section>


    </main>


</body>

</html>

