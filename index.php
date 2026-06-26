<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paraverse Hub | FEU Tech Landing Pages</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #0b0f19;
            --text-color: #f3f4f6;
            --primary-glow: rgba(59, 130, 246, 0.15);
            --card-bg: rgba(255, 255, 255, 0.03);
            --card-border: rgba(255, 255, 255, 0.07);
            --card-hover-border: rgba(59, 130, 246, 0.4);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow-x: hidden;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(59, 130, 246, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(16, 185, 129, 0.06) 0%, transparent 50%);
        }

        /* Ambient Header styling */
        header {
            padding: 2.5rem 2rem 1.5rem;
            text-align: center;
            position: relative;
        }

        .logo-container {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .logo-icon {
            font-size: 2.5rem;
            background: linear-gradient(135deg, #3b82f6, #10b981);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 0 10px rgba(59, 130, 246, 0.3));
        }

        .logo-text {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            font-size: 2rem;
            letter-spacing: -0.03em;
            background: linear-gradient(to right, #ffffff, #9ca3af);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle {
            font-size: 1.1rem;
            color: #9ca3af;
            font-weight: 300;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Grid Layout */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            width: 100%;
        }

        /* Premium Glass Card Design */
        .card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 18px;
            padding: 2.25rem 2rem;
            text-decoration: none;
            color: var(--text-color);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 240px;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.05) 0%, transparent 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .card-header-icon {
            font-size: 2.25rem;
            margin-bottom: 1.5rem;
            display: inline-block;
            transition: transform 0.4s ease;
        }

        .card-title {
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
            font-size: 1.35rem;
            margin-bottom: 0.75rem;
            color: #ffffff;
            letter-spacing: -0.01em;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-desc {
            font-size: 0.95rem;
            color: #9ca3af;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .card-footer-link {
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            color: #9ca3af;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        /* Hover States */
        .card:hover {
            transform: translateY(-6px);
            border-color: var(--card-hover-border);
            box-shadow: 
                0 12px 30px -10px rgba(0, 0, 0, 0.5),
                0 0 20px 0 var(--primary-glow);
        }

        .card:hover::before {
            opacity: 1;
        }

        .card:hover .card-header-icon {
            transform: scale(1.1) rotate(-5deg);
        }

        .card:hover .card-footer-link {
            color: #ffffff;
        }

        .card:hover .card-footer-link i {
            transform: translateX(4px);
        }

        /* Modules Custom Accents */
        .card-discourse:hover {
            --card-hover-border: rgba(59, 130, 246, 0.5);
            --primary-glow: rgba(59, 130, 246, 0.2);
        }
        .card-discourse .card-header-icon {
            color: #3b82f6;
        }

        .card-gco:hover {
            --card-hover-border: rgba(245, 158, 11, 0.5);
            --primary-glow: rgba(245, 158, 11, 0.2);
        }
        .card-gco .card-header-icon {
            color: #f59e0b;
        }

        .card-icare:hover {
            --card-hover-border: rgba(16, 185, 129, 0.5);
            --primary-glow: rgba(16, 185, 129, 0.2);
        }
        .card-icare .card-header-icon {
            color: #10b981;
        }

        .card-networkmap:hover {
            --card-hover-border: rgba(139, 92, 246, 0.5);
            --primary-glow: rgba(139, 92, 246, 0.2);
        }
        .card-networkmap .card-header-icon {
            color: #8b5cf6;
        }

        .card-flipcard:hover {
            --card-hover-border: rgba(236, 72, 153, 0.5);
            --primary-glow: rgba(236, 72, 153, 0.2);
        }
        .card-flipcard .card-header-icon {
            color: #ec4899;
        }

        /* Footer styling */
        footer {
            padding: 2rem;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            font-size: 0.85rem;
            color: #4b5563;
        }

        footer strong {
            color: #6b7280;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            header {
                padding: 1.5rem 1rem;
            }
            .logo-text {
                font-size: 1.75rem;
            }
            .grid {
                grid-template-columns: 1fr;
            }
            .container {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="logo-container">
            <i class="bi bi-box-seam-fill logo-icon"></i>
            <span class="logo-text">PARAVERSE HUB</span>
        </div>
        <p class="subtitle">FEU Tech Student & Educational Support Applications Portal. Choose a module below to launch the dashboard.</p>
    </header>

    <div class="container">
        <div class="grid">
            <!-- Discourse Landing -->
            <a href="/discourse-landing/" class="card card-discourse">
                <div>
                    <i class="bi bi-chat-text-fill card-header-icon"></i>
                    <h2 class="card-title">Discourse Landing</h2>
                    <p class="card-desc">Academic & social communities platform. Connect with peers, share learning resources, and participate in discussion forums.</p>
                </div>
                <span class="card-footer-link">Launch Module <i class="bi bi-arrow-right"></i></span>
            </a>

            <!-- GCO Connect -->
            <a href="/gco-connect/" class="card card-gco">
                <div>
                    <i class="bi bi-heart-pulse-fill card-header-icon"></i>
                    <h2 class="card-title">GCO Connect</h2>
                    <p class="card-desc">Student Guidance & Counseling portal. Secure a counseling session, access wellness resources, and contact therapists.</p>
                </div>
                <span class="card-footer-link">Launch Module <i class="bi bi-arrow-right"></i></span>
            </a>

            <!-- iCare -->
            <a href="/icare/" class="card card-icare">
                <div>
                    <i class="bi bi-journal-bookmark-fill card-header-icon"></i>
                    <h2 class="card-title">iCare Support</h2>
                    <p class="card-desc">FEU Tech Academic Peer Support. Access free peer tutoring, join study groups, and browse class directories.</p>
                </div>
                <span class="card-footer-link">Launch Module <i class="bi bi-arrow-right"></i></span>
            </a>

            <!-- Network Map -->
            <a href="/network-map/" class="card card-networkmap">
                <div>
                    <i class="bi bi-diagram-3-fill card-header-icon"></i>
                    <h2 class="card-title">Network Map</h2>
                    <p class="card-desc">Interactive curriculum visualization. See prerequisites, view course flows, and track your academic path.</p>
                </div>
                <span class="card-footer-link">Launch Module <i class="bi bi-arrow-right"></i></span>
            </a>

            <!-- Flipcard Puzzle -->
            <a href="/flip-card/" class="card card-flipcard">
                <div>
                    <i class="bi bi-grid-3x3-gap-fill card-header-icon"></i>
                    <h2 class="card-title">Flipcard Puzzle</h2>
                    <p class="card-desc">Fun memory card game. Play on dynamic grid sizes, flip cards to find matches, and challenge your friends.</p>
                </div>
                <span class="card-footer-link">Launch Game <i class="bi bi-arrow-right"></i></span>
            </a>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> <strong>Educational Innovation and Technology Hub</strong>. All Rights Reserved.</p>
    </footer>

</body>
</html>
