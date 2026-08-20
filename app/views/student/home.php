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
            --violet-dark: #32105f;
            --violet-deep: #4c1d95;
            --violet: #6d28d9;
            --violet-mid: #8b5cf6;
            --violet-light: #a78bfa;
            --lavender: #f4efff;
            --lavender-2: #ebe2ff;
            --white: #ffffff;
            --text: #33234d;
            --muted: #827394;
            --border: #e7ddf4;
        }

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
                    circle at 15% 15%,
                    rgba(167, 139, 250, .25),
                    transparent 25%
                ),
                radial-gradient(
                    circle at 85% 85%,
                    rgba(109, 40, 217, .16),
                    transparent 28%
                ),
                linear-gradient(
                    135deg,
                    #faf8ff,
                    #f2edff,
                    #e9e0fb
                );
        }


        /* =========================================
           TOP NAVIGATION
        ========================================= */

        .topbar {
            position: sticky;

            top: 0;

            z-index: 100;

            background:
                linear-gradient(
                    100deg,
                    #32105f,
                    #4c1d95,
                    #6d28d9
                );

            box-shadow:
                0 8px 30px rgba(50, 16, 95, .20);
        }

        .nav {
            width:
                min(
                    1150px,
                    calc(100% - 36px)
                );

            min-height: 76px;

            margin: auto;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;
        }

        .brand {
            display: flex;

            align-items: center;

            gap: 12px;

            color: white;

            font-size: 18px;

            font-weight: 900;
        }

        .brand-icon {
            width: 40px;
            height: 40px;

            display: grid;

            place-items: center;

            border-radius: 13px;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,.25),
                    rgba(255,255,255,.08)
                );

            border:
                1px solid rgba(255,255,255,.22);

            font-size: 18px;
        }

        .nav-links {
            display: flex;

            align-items: center;

            gap: 9px;
        }

        .nav-btn {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 10px 16px;

            border-radius: 12px;

            color: white;

            text-decoration: none;

            font-size: 13px;

            font-weight: 800;

            transition: .25s ease;
        }

        .home-btn {
            background:
                rgba(255,255,255,.16);

            border:
                1px solid rgba(255,255,255,.25);
        }

        .profile-btn {
            background:
                rgba(255,255,255,.06);

            border:
                1px solid rgba(255,255,255,.15);
        }

        .nav-btn:hover {
            transform: translateY(-2px);

            background:
                rgba(255,255,255,.24);
        }


        /* =========================================
           MAIN CONTAINER
        ========================================= */

        .page {
            width:
                min(
                    1150px,
                    calc(100% - 36px)
                );

            margin: auto;

            padding: 48px 0 70px;
        }


        /* =========================================
           DASHBOARD
        ========================================= */

        .dashboard {
            display: grid;

            grid-template-columns:
                290px
                minmax(0, 1fr);

            gap: 22px;

            align-items: stretch;
        }


        /* =========================================
           LEFT PROFILE PANEL
        ========================================= */

        .profile-panel {
            position: relative;

            overflow: hidden;

            min-height: 560px;

            padding: 30px 24px;

            border-radius: 26px;

            color: white;

            background:
                linear-gradient(
                    160deg,
                    #32105f 0%,
                    #4c1d95 48%,
                    #7c3aed 100%
                );

            box-shadow:
                0 25px 60px rgba(76,29,149,.22);
        }

        .profile-panel::before {
            content: "";

            position: absolute;

            width: 220px;
            height: 220px;

            top: -90px;
            right: -100px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.08);
        }

        .profile-panel::after {
            content: "";

            position: absolute;

            width: 150px;
            height: 150px;

            bottom: -75px;
            left: -70px;

            border-radius: 50%;

            background:
                rgba(255,255,255,.07);
        }


        /* =========================================
           PROFILE ICON
        ========================================= */

        .profile-avatar {
            position: relative;

            width: 92px;
            height: 92px;

            margin: 10px auto 22px;

            display: grid;

            place-items: center;

            border-radius: 28px;

            background:
                linear-gradient(
                    135deg,
                    #a78bfa,
                    #c4b5fd
                );

            color: #32105f;

            font-size: 28px;

            font-weight: 900;

            border:
                5px solid rgba(255,255,255,.18);

            box-shadow:
                0 15px 30px rgba(0,0,0,.18);
        }

        .profile-status {
            position: relative;

            width: max-content;

            margin: auto;

            padding: 6px 11px;

            border-radius: 999px;

            background:
                rgba(255,255,255,.12);

            border:
                1px solid rgba(255,255,255,.16);

            font-size: 10px;

            font-weight: 900;

            letter-spacing: .8px;

            text-transform: uppercase;
        }

        .profile-name {
            position: relative;

            margin: 20px 0 7px;

            text-align: center;

            font-size: 24px;

            line-height: 1.2;

            font-weight: 900;
        }

        .profile-course {
            position: relative;

            margin: 0;

            text-align: center;

            color:
                rgba(255,255,255,.72);

            font-size: 13px;

            line-height: 1.5;
        }


        /* =========================================
           LEFT PANEL MENU
        ========================================= */

        .panel-menu {
            position: relative;

            margin-top: 34px;

            display: grid;

            gap: 10px;
        }

        .menu-item {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 13px 14px;

            border-radius: 13px;

            color:
                rgba(255,255,255,.82);

            background:
                rgba(255,255,255,.07);

            border:
                1px solid rgba(255,255,255,.08);

            font-size: 12px;

            font-weight: 700;
        }

        .menu-icon {
            width: 30px;
            height: 30px;

            display: grid;

            place-items: center;

            border-radius: 9px;

            background:
                rgba(255,255,255,.12);

            font-size: 13px;
        }


        /* =========================================
           RIGHT CONTENT
        ========================================= */

        .content {
            min-width: 0;

            padding: 30px;

            border-radius: 26px;

            background:
                rgba(255,255,255,.92);

            border:
                1px solid rgba(255,255,255,.8);

            box-shadow:
                0 25px 65px rgba(76,29,149,.11);
        }


        /* =========================================
           CONTENT HEADER
        ========================================= */

        .content-header {
            display: flex;

            align-items: flex-end;

            justify-content: space-between;

            gap: 20px;

            padding-bottom: 22px;

            border-bottom:
                1px solid var(--border);

            margin-bottom: 22px;
        }

        .eyebrow {
            margin: 0 0 7px;

            color: var(--violet);

            font-size: 10px;

            font-weight: 900;

            text-transform: uppercase;

            letter-spacing: 1.4px;
        }

        .content-title {
            margin: 0;

            color: var(--violet-dark);

            font-size: 30px;

            line-height: 1.1;

            font-weight: 900;
        }

        .content-subtitle {
            margin: 7px 0 0;

            color: var(--muted);

            font-size: 13px;
        }


        /* =========================================
           NOTICE
        ========================================= */

        .notice {
            display: flex;

            align-items: center;

            gap: 13px;

            margin-bottom: 22px;

            padding: 14px 16px;

            border-radius: 14px;

            background:
                linear-gradient(
                    135deg,
                    #f6f0ff,
                    #fbf9ff
                );

            border:
                1px solid #e4d7f6;

            border-left:
                4px solid var(--violet);

            color: #684b89;

            font-size: 13px;

            font-weight: 700;

            line-height: 1.5;
        }

        .notice-icon {
            width: 32px;
            height: 32px;

            flex-shrink: 0;

            display: grid;

            place-items: center;

            border-radius: 10px;

            background:
                var(--lavender-2);

            color:
                var(--violet);

            font-weight: 900;
        }


        /* =========================================
           INFORMATION TITLE
        ========================================= */

        .section-heading {
            display: flex;

            align-items: center;

            gap: 10px;

            margin-bottom: 14px;
        }

        .section-heading h2 {
            margin: 0;

            color: #49336a;

            font-size: 14px;

            font-weight: 900;
        }

        .section-line {
            flex: 1;

            height: 1px;

            background:
                var(--border);
        }


        /* =========================================
           INFORMATION GRID
        ========================================= */

        .info-grid {
            display: grid;

            grid-template-columns:
                repeat(
                    2,
                    minmax(0, 1fr)
                );

            gap: 13px;

            margin-bottom: 22px;
        }

        .info {
            position: relative;

            min-height: 92px;

            padding: 17px 18px;

            overflow: hidden;

            border:
                1px solid var(--border);

            border-radius: 15px;

            background:
                linear-gradient(
                    135deg,
                    #ffffff,
                    #faf7ff
                );

            transition: .25s ease;
        }

        .info:hover {
            transform:
                translateY(-3px);

            border-color:
                #d5c4ed;

            box-shadow:
                0 10px 24px
                rgba(76,29,149,.09);
        }

        .info::after {
            content: "";

            position: absolute;

            width: 65px;
            height: 65px;

            right: -28px;
            bottom: -28px;

            border-radius: 50%;

            background:
                rgba(139,92,246,.08);
        }

        .info-label {
            display: block;

            margin-bottom: 7px;

            color:
                #988ba8;

            font-size: 9px;

            font-weight: 900;

            text-transform: uppercase;

            letter-spacing: 1px;
        }

        .info-value {
            position: relative;

            z-index: 2;

            display: block;

            color:
                #493765;

            font-size: 14px;

            font-weight: 800;

            line-height: 1.45;

            word-break: break-word;
        }


        /* =========================================
           FEATURED STUDENT CARD
        ========================================= */

        .featured {
            position: relative;

            margin-top: 4px;

            padding: 19px;

            border-radius: 17px;

            background:
                linear-gradient(
                    135deg,
                    #eee5ff,
                    #f8f4ff
                );

            border:
                1px solid #dfd0f3;
        }

        .featured-top {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            margin-bottom: 12px;
        }

        .featured-title {
            margin: 0;

            color:
                #4c2b72;

            font-size: 13px;

            font-weight: 900;
        }

        .secure-label {
            padding: 5px 9px;

            border-radius: 999px;

            color:
                #654095;

            background:
                rgba(255,255,255,.65);

            font-size: 9px;

            font-weight: 900;

            text-transform: uppercase;
        }

        .featured-text {
            margin: 0;

            color:
                #7e7090;

            font-size: 12px;

            line-height: 1.6;
        }


        /* =========================================
           BOTTOM ACTION BUTTONS
        ========================================= */

        .action-row {
            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 10px;

            margin-top: 22px;
        }

        .action-btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            min-width: 170px;

            padding: 13px 18px;

            border-radius: 13px;

            text-decoration: none;

            font-size: 12px;

            font-weight: 900;

            transition: .25s ease;
        }

        .secondary-btn {
            color:
                #654487;

            background:
                #f3edff;

            border:
                1px solid #e1d4f5;
        }

        .primary-btn {
            color: white;

            background:
                linear-gradient(
                    135deg,
                    #4c1d95,
                    #6d28d9,
                    #8b5cf6
                );

            box-shadow:
                0 10px 24px
                rgba(109,40,217,.22);
        }

        .action-btn:hover {
            transform:
                translateY(-3px);
        }

        .primary-btn:hover {
            box-shadow:
                0 15px 30px
                rgba(109,40,217,.30);
        }

        .secondary-btn:hover {
            background:
                #e9ddff;
        }


        /* =========================================
           SECURITY FOOTER
        ========================================= */

        .security-note {
            margin: 20px 0 0;

            padding-top: 16px;

            border-top:
                1px solid var(--border);

            color:
                #92859f;

            font-size: 11px;

            line-height: 1.6;

            text-align: right;
        }

        .security-note strong {
            color:
                #694596;
        }


        /* =========================================
           MOBILE
        ========================================= */

        @media (max-width: 850px) {

            .dashboard {
                grid-template-columns: 1fr;
            }

            .profile-panel {
                min-height: auto;

                padding: 25px;
            }

            .panel-menu {
                grid-template-columns:
                    repeat(3, 1fr);

                margin-top: 25px;
            }

            .menu-item {
                justify-content: center;
            }

            .menu-item span:last-child {
                display: none;
            }

        }


        @media (max-width: 680px) {

            .page {
                width:
                    calc(100% - 24px);

                padding:
                    25px 0 40px;
            }

            .nav {
                width:
                    calc(100% - 24px);

                min-height: 70px;

                flex-direction: column;

                justify-content: center;

                padding: 12px 0;

                gap: 10px;
            }

            .nav-links {
                width: 100%;

                justify-content: center;
            }

            .content {
                padding: 22px 18px;
            }

            .content-header {
                align-items:
                    flex-start;

                flex-direction:
                    column;
            }

            .content-title {
                font-size: 26px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .panel-menu {
                grid-template-columns: 1fr;
            }

            .menu-item {
                justify-content:
                    flex-start;
            }

            .menu-item span:last-child {
                display: inline;
            }

            .action-row {
                flex-direction:
                    column-reverse;

                align-items:
                    stretch;
            }

            .action-btn {
                width: 100%;
            }

            .security-note {
                text-align:
                    center;
            }

        }

    </style>

</head>


<body>


    <!-- =========================================
         TOP NAVIGATION
    ========================================= -->

    <header class="topbar">

        <nav class="nav">

            <div class="brand">

                <span class="brand-icon">
                    ✦
                </span>

                Violet Student Portal

            </div>


            <div class="nav-links">

                <a
                    class="nav-btn home-btn"
                    href="<?= site_url('student'); ?>"
                >
                    ⌂ Home
                </a>

                <a
                    class="nav-btn profile-btn"
                    href="<?= site_url('student/profile'); ?>"
                >
                    ◉ Profile
                </a>

            </div>

        </nav>

    </header>



    <!-- =========================================
         MAIN
    ========================================= -->

    <main class="page">

        <div class="dashboard">


            <!-- =====================================
                 LEFT PROFILE PANEL
            ===================================== -->

            <aside class="profile-panel">


                <div class="profile-avatar">
                    RV
                </div>


                <div class="profile-status">
                    ✦ Student Account
                </div>


                <h1 class="profile-name">
                    <?= htmlspecialchars($name); ?>
                </h1>


                <p class="profile-course">
                    <?= htmlspecialchars($course); ?>
                    <br>
                    <?= htmlspecialchars($year); ?>
                    · Section <?= htmlspecialchars($section); ?>
                </p>


                <!-- SIDE MENU -->

                <div class="panel-menu">

                    <div class="menu-item">

                        <span class="menu-icon">
                            ◆
                        </span>

                        <span>
                            Student Information
                        </span>

                    </div>


                    <div class="menu-item">

                        <span class="menu-icon">
                            ✓
                        </span>

                        <span>
                            Account Verified
                        </span>

                    </div>


                    <div class="menu-item">

                        <span class="menu-icon">
                            🔒
                        </span>

                        <span>
                            Protected Access
                        </span>

                    </div>

                </div>

            </aside>



            <!-- =====================================
                 RIGHT CONTENT
            ===================================== -->

            <section class="content">


                <!-- CONTENT HEADER -->

                <div class="content-header">

                    <div>

                        <p class="eyebrow">
                            Student Dashboard
                        </p>

                        <h2 class="content-title">
                            Personal Information
                        </h2>

                        <p class="content-subtitle">
                            Your registered student information
                            is displayed below.
                        </p>

                    </div>

                </div>



                <!-- NOTICE -->

                <?php if (!empty($notice)): ?>

                    <div class="notice">

                        <div class="notice-icon">
                            !
                        </div>

                        <div>

                            <?= htmlspecialchars(
                                $notice,
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>

                        </div>

                    </div>

                <?php endif; ?>



                <!-- INFORMATION TITLE -->

                <div class="section-heading">

                    <h2>
                        Account Details
                    </h2>

                    <div class="section-line"></div>

                </div>



                <!-- INFORMATION GRID -->

                <div class="info-grid">


                    <!-- STUDENT ID -->

                    <div class="info">

                        <span class="info-label">
                            Student ID
                        </span>

                        <span class="info-value">
                            <?= htmlspecialchars($student_id); ?>
                        </span>

                    </div>


                    <!-- NAME -->

                    <div class="info">

                        <span class="info-label">
                            Student Name
                        </span>

                        <span class="info-value">
                            <?= htmlspecialchars($name); ?>
                        </span>

                    </div>


                    <!-- COURSE -->

                    <div class="info">

                        <span class="info-label">
                            Course
                        </span>

                        <span class="info-value">
                            <?= htmlspecialchars($course); ?>
                        </span>

                    </div>


                    <!-- YEAR -->

                    <div class="info">

                        <span class="info-label">
                            Year Level
                        </span>

                        <span class="info-value">
                            <?= htmlspecialchars($year); ?>
                        </span>

                    </div>


                    <!-- SECTION -->

                    <div class="info">

                        <span class="info-label">
                            Section
                        </span>

                        <span class="info-value">
                            <?= htmlspecialchars($section); ?>
                        </span>

                    </div>


                    <!-- EMAIL -->

                    <div class="info">

                        <span class="info-label">
                            Email Address
                        </span>

                        <span class="info-value">
                            <?= htmlspecialchars($email); ?>
                        </span>

                    </div>


                </div>



                <!-- FEATURED SECURITY CARD -->

                <div class="featured">

                    <div class="featured-top">

                        <h3 class="featured-title">
                            🔐 Protected Student Profile
                        </h3>

                        <span class="secure-label">
                            Middleware Active
                        </span>

                    </div>

                    <p class="featured-text">
                        Your complete profile is protected by
                        <strong>StudentMiddleware</strong>.
                        Use the protected profile button below
                        to view additional student information.
                    </p>

                </div>



                <!-- BUTTONS -->

                <div class="action-row">


                    <a
                        class="action-btn secondary-btn"
                        href="<?= site_url('student'); ?>"
                    >
                        ← Back to Dashboard
                    </a>


                    <a
                        class="action-btn primary-btn"
                        href="<?= site_url('student/open-profile'); ?>"
                    >
                        ✦ Open Protected Profile
                    </a>


                </div>



                <!-- SECURITY NOTE -->

                <p class="security-note">

                    Access to
                    <strong>/student/profile</strong>
                    and
                    <strong>/profile</strong>
                    is restricted.
                    Protected access is provided through
                    <strong>StudentMiddleware</strong>.

                </p>


            </section>

        </div>

    </main>


</body>

</html>

