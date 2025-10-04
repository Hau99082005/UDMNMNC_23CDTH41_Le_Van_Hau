<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="description" content="Khám phá Nhật Bản cùng chúng tôi: tour du lịch, văn hóa, ẩm thực và trải nghiệm độc đáo. Đặt tour Nhật Bản giá tốt, lịch trình phong phú.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- ⚡ OPTIMIZED FONTS - Chỉ load weights thực sự dùng -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Inter font - CHỈ 4 WEIGHTS (tiết kiệm 40%) -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap"></noscript>
    
    <!-- ⚡ FontAwesome CDN - DIRECT LOAD -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    
    <!-- Preload CRITICAL font files -->
    <link rel="preload" as="font" type="font/woff2" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/webfonts/fa-solid-900.woff2" crossorigin>
    <link rel="preload" as="font" type="font/woff2" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/webfonts/fa-brands-400.woff2" crossorigin>
    <link rel="preload" as="font" type="font/woff2" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/webfonts/fa-regular-400.woff2" crossorigin>
    
    <!-- 🎨 MODERN DESIGN CSS - ULTRA PREMIUM -->
    <style id="critical-inline-bypass-cache">
    /* ===== FONT DISPLAY OPTIMIZATION - Override CDN @font-face ===== */
    @font-face{font-family:"Font Awesome 6 Free";font-style:normal;font-weight:400;font-display:swap;src:url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/webfonts/fa-regular-400.woff2) format("woff2")}
    @font-face{font-family:"Font Awesome 6 Free";font-style:normal;font-weight:900;font-display:swap;src:url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/webfonts/fa-solid-900.woff2) format("woff2")}
    @font-face{font-family:"Font Awesome 6 Brands";font-style:normal;font-weight:400;font-display:swap;src:url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/webfonts/fa-brands-400.woff2) format("woff2")}
    
    /* ===== FONTAWESOME OPTIMIZATION ===== */
    .fas, .far, .fab, .fa {
        font-family: "Font Awesome 6 Free", "Font Awesome 6 Brands" !important;
        font-weight: 900 !important;
        font-style: normal !important;
        font-variant: normal !important;
        text-rendering: auto !important;
        line-height: 1 !important;
        -webkit-font-smoothing: antialiased !important;
        -moz-osx-font-smoothing: grayscale !important;
        display: inline-block !important;
        font-display: swap !important;
    }
    
    .far {
        font-weight: 400 !important;
    }
    
    .fab {
        font-family: "Font Awesome 6 Brands" !important;
        font-weight: 400 !important;
    }
    
    
    /* Performance optimization for icons */
    .fas, .far, .fab, .fa {
        will-change: transform !important;
        backface-visibility: hidden !important;
        transform: translateZ(0) !important;
    }
    
    /* Accessibility - Visually hidden text */
    .visually-hidden {
        position: absolute !important;
        width: 1px !important;
        height: 1px !important;
        padding: 0 !important;
        margin: -1px !important;
        overflow: hidden !important;
        clip: rect(0, 0, 0, 0) !important;
        white-space: nowrap !important;
        border: 0 !important;
    }
    
    /* ===== VARIABLES - HIGH CONTRAST ===== */
    :root{
        --primary:#dc2626;--primary-dark:#b91c1c;--secondary:#1f2937;--accent:#ea580c;
        --dark:#000000;--gray:#374151;--white:#ffffff;--bg-light:#f9fafb;
        --shadow-sm:0 1px 3px rgba(0,0,0,0.2);--shadow:0 4px 20px rgba(0,0,0,0.25);
        --shadow-lg:0 20px 50px rgba(0,0,0,0.35);--radius:16px;--radius-lg:24px;
        --transition:all 0.4s cubic-bezier(0.25,0.46,0.45,0.94);
        --gradient-primary:linear-gradient(135deg,#dc2626 0%,#b91c1c 50%,#991b1b 100%);
        --gradient-dark:linear-gradient(135deg,#1f2937 0%,#111827 100%);
        --gradient-hero:linear-gradient(135deg,rgba(31,41,55,0.95) 0%,rgba(17,24,39,0.9) 100%);
    }
    
    /* ===== BASE - WHITE THEME ===== */
    *{box-sizing:border-box;margin:0;padding:0;}
    html{background:#ffffff!important;min-height:100vh!important;}
    body{font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;color:var(--dark);overflow-x:hidden;line-height:1.6;background:#ffffff!important;min-height:100vh!important;}
    .container{width:100%;max-width:1240px;margin:0 auto;padding:0 28px;}
    
    /* All sections white background */
    .site-content{background:#ffffff!important;}
    .site-main{background:#ffffff!important;}
    .featured-posts{background:#ffffff!important;}
    .testimonials{background:#f8f9fa!important;}
    .news-section{background:#f8f9fa!important;}
    .contact-form-section{background:#ffffff!important;}
    
    /* ===== HIGH CONTRAST FIXES ===== */
    .gallery-tab{background:#ffffff!important;border:2px solid #000000!important;color:#000000!important;padding:12px 24px!important;border-radius:25px!important;font-weight:700!important;cursor:pointer!important;transition:var(--transition)!important;box-shadow:0 2px 8px rgba(0,0,0,0.1)!important;}
    .gallery-tab:hover{background:#000000!important;border-color:#000000!important;color:#ffffff!important;transform:translateY(-2px)!important;box-shadow:0 4px 15px rgba(0,0,0,0.2)!important;}
    .gallery-tab.active{background:var(--gradient-primary)!important;border-color:var(--primary)!important;color:#ffffff!important;box-shadow:0 4px 15px rgba(220,38,38,0.3)!important;}
    
    /* ===== REMOVE WHITE OVERLAY FROM POST IMAGES ===== */
    .post-card::before{display:none!important;}
    .post-card::after{display:none!important;}
    .post-thumbnail::before{display:none!important;}
    .post-thumbnail::after{display:none!important;}
    .post-image::before{display:none!important;}
    .post-image::after{display:none!important;}
    .post-card *::before{display:none!important;}
    .post-card *::after{display:none!important;}
    .article-card::before{display:none!important;}
    .article-card::after{display:none!important;}
    .card::before{display:none!important;}
    .card::after{display:none!important;}
    
    /* ===== REMOVE WHITE OVERLAY FROM TOUR CARDS ===== */
    .tour-card::before{display:none!important;}
    .tour-card::after{display:none!important;}
    .tour-card *::before{display:none!important;}
    .tour-card *::after{display:none!important;}
    .tour-image::before{display:none!important;}
    .tour-image::after{display:none!important;}
    .tour-image *::before{display:none!important;}
    .tour-image *::after{display:none!important;}
    
    /* ===== REMOVE ALL OVERLAYS FROM SEARCH RESULTS ===== */
    .tour-grid .tour-card::before{display:none!important;}
    .tour-grid .tour-card::after{display:none!important;}
    .tour-grid .tour-image::before{display:none!important;}
    .tour-grid .tour-image::after{display:none!important;}
    .tour-grid .tour-image *::before{display:none!important;}
    .tour-grid .tour-image *::after{display:none!important;}
    .tour-grid .tour-card *::before{display:none!important;}
    .tour-grid .tour-card *::after{display:none!important;}
    
    /* ===== FORCE IMAGE VISIBILITY ===== */
    .tour-image img{opacity:1!important;visibility:visible!important;display:block!important;}
    .tour-grid .tour-image img{opacity:1!important;visibility:visible!important;display:block!important;}
    
    /* ===== REMOVE BACKGROUND OVERLAYS ===== */
    .tour-image{background:none!important;background-color:transparent!important;}
    .tour-grid .tour-image{background:none!important;background-color:transparent!important;}
    .tour-card .tour-image{background:none!important;background-color:transparent!important;}
    
    /* ===== REMOVE ANY WHITE BACKGROUNDS ===== */
    .tour-image::before{background:none!important;background-color:transparent!important;}
    .tour-image::after{background:none!important;background-color:transparent!important;}
    .tour-card::before{background:none!important;background-color:transparent!important;}
    .tour-card::after{background:none!important;background-color:transparent!important;}
    
    /* Post card styling without white overlay */
    .post-card{background:transparent!important;border-radius:var(--radius-lg)!important;overflow:hidden!important;box-shadow:var(--shadow)!important;transition:var(--transition)!important;position:relative!important;}
    .post-card:hover{transform:translateY(-8px)!important;box-shadow:var(--shadow-lg)!important;}
    .post-thumbnail{position:relative!important;overflow:hidden!important;}
    .post-image{width:100%!important;height:250px!important;object-fit:cover!important;transition:var(--transition)!important;border-radius:var(--radius-lg) var(--radius-lg) 0 0!important;}
    .post-card:hover .post-image{transform:scale(1.1)!important;}
    .post-content{background:rgba(255,255,255,0.95)!important;padding:25px!important;margin-top:-50px!important;position:relative!important;z-index:2!important;backdrop-filter:blur(10px)!important;border-radius:0 0 var(--radius-lg) var(--radius-lg)!important;}
    .post-title{font-size:18px!important;font-weight:700!important;margin:0 0 15px 0!important;line-height:1.4!important;color:#000000!important;}
    .post-title a{color:#000000!important;text-decoration:none!important;transition:var(--transition)!important;}
    .post-title a:hover{color:var(--primary)!important;}
    .post-excerpt{color:#374151!important;font-size:14px!important;line-height:1.6!important;margin:0 0 20px 0!important;}
    .post-meta{display:flex!important;gap:20px!important;margin-bottom:20px!important;font-size:12px!important;color:#374151!important;}
    .post-meta span{display:flex!important;align-items:center!important;gap:5px!important;}
    .post-meta i{font-size:12px!important;color:var(--primary)!important;}
    .read-more-btn{display:inline-flex!important;align-items:center!important;gap:8px!important;color:var(--primary)!important;text-decoration:none!important;font-weight:600!important;font-size:14px!important;transition:var(--transition)!important;}
    .read-more-btn:hover{color:var(--primary-dark)!important;transform:translateX(5px)!important;}
    
    /* Tour card styling without white overlay */
    .tour-card{background:#ffffff!important;border-radius:var(--radius-lg)!important;overflow:hidden!important;box-shadow:var(--shadow)!important;transition:var(--transition)!important;position:relative!important;}
    .tour-card:hover{transform:translateY(-8px)!important;box-shadow:var(--shadow-lg)!important;}
    .tour-image{position:relative!important;overflow:hidden!important;display:block!important;}
    .tour-image img{width:100%!important;height:250px!important;object-fit:cover!important;transition:var(--transition)!important;border-radius:var(--radius-lg) var(--radius-lg) 0 0!important;}
    .tour-card:hover .tour-image img{transform:scale(1.1)!important;}
    .tour-info{background:#ffffff!important;padding:25px!important;position:relative!important;z-index:2!important;}
    .tour-title{font-size:18px!important;font-weight:700!important;margin:0 0 15px 0!important;line-height:1.4!important;color:#000000!important;}
    .tour-title a{color:#000000!important;text-decoration:none!important;transition:var(--transition)!important;}
    .tour-title a:hover{color:var(--primary)!important;}
    .tour-excerpt{color:#374151!important;font-size:14px!important;line-height:1.6!important;margin:0 0 20px 0!important;}
    .tour-meta{display:flex!important;gap:20px!important;margin-bottom:20px!important;font-size:12px!important;color:#374151!important;}
    .tour-meta span{display:flex!important;align-items:center!important;gap:5px!important;}
    .tour-meta i{font-size:12px!important;color:var(--primary)!important;}
    
    /* Search page specific fixes */
    .tour-grid{display:grid!important;grid-template-columns:repeat(auto-fit,minmax(300px,1fr))!important;gap:30px!important;margin-top:30px!important;}
    .tour-duration{position:absolute!important;top:15px!important;right:15px!important;background:rgba(0,0,0,0.7)!important;color:#ffffff!important;padding:5px 12px!important;border-radius:20px!important;font-size:12px!important;font-weight:600!important;z-index:3!important;}
    .tour-category{display:inline-block!important;background:var(--gradient-primary)!important;color:#ffffff!important;padding:6px 15px!important;border-radius:20px!important;font-size:12px!important;font-weight:600!important;margin-bottom:15px!important;text-transform:uppercase!important;}
    .tour-footer{margin-top:20px!important;}
    .tour-footer .btn{background:var(--gradient-primary)!important;color:#ffffff!important;border:none!important;padding:12px 24px!important;border-radius:var(--radius)!important;font-weight:600!important;text-decoration:none!important;display:inline-flex!important;align-items:center!important;gap:8px!important;transition:var(--transition)!important;}
    .tour-footer .btn:hover{transform:translateY(-2px)!important;box-shadow:0 6px 20px rgba(220,38,38,0.4)!important;}
    
    /* ===== SEARCH PAGE IMAGE FIXES ===== */
    .site-main .tour-image{position:relative!important;overflow:hidden!important;display:block!important;background:none!important;}
    .site-main .tour-image img{width:100%!important;height:250px!important;object-fit:cover!important;display:block!important;opacity:1!important;visibility:visible!important;background:none!important;}
    .site-main .tour-card{position:relative!important;background:#ffffff!important;border-radius:12px!important;overflow:hidden!important;box-shadow:0 4px 20px rgba(0,0,0,0.1)!important;}
    .site-main .tour-card::before{display:none!important;content:none!important;}
    .site-main .tour-card::after{display:none!important;content:none!important;}
    .site-main .tour-image::before{display:none!important;content:none!important;}
    .site-main .tour-image::after{display:none!important;content:none!important;}
    
    /* ===== REMOVE ALL OVERLAYS FROM SEARCH PAGE ===== */
    .site-main .tour-card *::before{display:none!important;content:none!important;}
    .site-main .tour-card *::after{display:none!important;content:none!important;}
    .site-main .tour-image *::before{display:none!important;content:none!important;}
    .site-main .tour-image *::after{display:none!important;content:none!important;}
    
    /* ===== FORCE IMAGE DISPLAY ===== */
    .site-main .tour-image a{display:block!important;position:relative!important;}
    .site-main .tour-image a img{display:block!important;width:100%!important;height:250px!important;object-fit:cover!important;opacity:1!important;visibility:visible!important;}
    
    /* ===== REMOVE ALL WHITE OVERLAYS ===== */
    .site-main .tour-image a::before{display:none!important;content:none!important;}
    .site-main .tour-image a::after{display:none!important;content:none!important;}
    .site-main .tour-image a *::before{display:none!important;content:none!important;}
    .site-main .tour-image a *::after{display:none!important;content:none!important;}
    
    /* ===== FORCE IMAGE VISIBILITY ===== */
    .site-main .tour-image a img{opacity:1!important;visibility:visible!important;display:block!important;background:none!important;}
    .site-main .tour-image a img::before{display:none!important;content:none!important;}
    .site-main .tour-image a img::after{display:none!important;content:none!important;}
    
    /* ===== REMOVE ALL OVERLAYS FROM SEARCH RESULTS ===== */
    .site-main .tour-card .tour-image{position:relative!important;overflow:hidden!important;display:block!important;background:none!important;}
    .site-main .tour-card .tour-image::before{display:none!important;content:none!important;}
    .site-main .tour-card .tour-image::after{display:none!important;content:none!important;}
    .site-main .tour-card .tour-image *::before{display:none!important;content:none!important;}
    .site-main .tour-card .tour-image *::after{display:none!important;content:none!important;}
    
    /* ===== FORCE IMAGE DISPLAY IN SEARCH ===== */
    .site-main .tour-card .tour-image img{display:block!important;width:100%!important;height:250px!important;object-fit:cover!important;opacity:1!important;visibility:visible!important;background:none!important;}
    .site-main .tour-card .tour-image img::before{display:none!important;content:none!important;}
    .site-main .tour-card .tour-image img::after{display:none!important;content:none!important;}
    
    /* ===== REMOVE ALL OVERLAYS FROM SEARCH PAGE ===== */
    .site-main .tour-card .tour-image a{display:block!important;position:relative!important;background:none!important;}
    .site-main .tour-card .tour-image a::before{display:none!important;content:none!important;}
    .site-main .tour-card .tour-image a::after{display:none!important;content:none!important;}
    .site-main .tour-card .tour-image a *::before{display:none!important;content:none!important;}
    .site-main .tour-card .tour-image a *::after{display:none!important;content:none!important;}
    
    /* ===== FORCE IMAGE VISIBILITY IN SEARCH ===== */
    .site-main .tour-card .tour-image a img{display:block!important;width:100%!important;height:250px!important;object-fit:cover!important;opacity:1!important;visibility:visible!important;background:none!important;}
    .site-main .tour-card .tour-image a img::before{display:none!important;content:none!important;}
    .site-main .tour-card .tour-image a img::after{display:none!important;content:none!important;}
    
    /* ===== REMOVE ALL OVERLAYS FROM SEARCH PAGE ===== */
    .site-main .tour-card .tour-image a img{display:block!important;width:100%!important;height:250px!important;object-fit:cover!important;opacity:1!important;visibility:visible!important;background:none!important;}
    .site-main .tour-card .tour-image a img::before{display:none!important;content:none!important;}
    .site-main .tour-card .tour-image a img::after{display:none!important;content:none!important;}
    
    /* ===== FORCE IMAGE DISPLAY IN SEARCH ===== */
    .site-main .tour-card .tour-image a img{display:block!important;width:100%!important;height:250px!important;object-fit:cover!important;opacity:1!important;visibility:visible!important;background:none!important;}
    .site-main .tour-card .tour-image a img::before{display:none!important;content:none!important;}
    .site-main .tour-card .tour-image a img::after{display:none!important;content:none!important;}
    
    /* ===== REMOVE DARK OVERLAY FROM IMAGES ===== */
    .site-main .tour-card .tour-image{background:none!important;background-color:transparent!important;}
    .site-main .tour-card .tour-image::before{display:none!important;content:none!important;background:none!important;background-color:transparent!important;}
    .site-main .tour-card .tour-image::after{display:none!important;content:none!important;background:none!important;background-color:transparent!important;}
    .site-main .tour-card .tour-image a{background:none!important;background-color:transparent!important;}
    .site-main .tour-card .tour-image a::before{display:none!important;content:none!important;background:none!important;background-color:transparent!important;}
    .site-main .tour-card .tour-image a::after{display:none!important;content:none!important;background:none!important;background-color:transparent!important;}
    .site-main .tour-card .tour-image a img{background:none!important;background-color:transparent!important;opacity:1!important;filter:none!important;}
    .site-main .tour-card .tour-image a img::before{display:none!important;content:none!important;background:none!important;background-color:transparent!important;}
    .site-main .tour-card .tour-image a img::after{display:none!important;content:none!important;background:none!important;background-color:transparent!important;}
    
    /* ===== REMOVE ALL DARK OVERLAYS ===== */
    .site-main .tour-card .tour-image{background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image::before{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image::after{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a{background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a::before{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a::after{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a img{background:none!important;background-color:transparent!important;opacity:1!important;filter:none!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a img::before{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a img::after{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    
    /* ===== FORCE IMAGE BRIGHTNESS ===== */
    .site-main .tour-card .tour-image a img{opacity:1!important;filter:brightness(1)!important;filter:contrast(1)!important;filter:saturate(1)!important;}
    .site-main .tour-card .tour-image a img::before{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a img::after{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    
    /* ===== REMOVE ALL DARK OVERLAYS FROM SEARCH PAGE ===== */
    .site-main .tour-card .tour-image{background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image::before{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image::after{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a{background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a::before{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a::after{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a img{background:none!important;background-color:transparent!important;opacity:1!important;filter:none!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a img::before{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a img::after{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    
    /* ===== FORCE IMAGE BRIGHTNESS IN SEARCH ===== */
    .site-main .tour-card .tour-image a img{opacity:1!important;filter:brightness(1)!important;filter:contrast(1)!important;filter:saturate(1)!important;}
    .site-main .tour-card .tour-image a img::before{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a img::after{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    
    /* ===== REMOVE ALL DARK OVERLAYS FROM SEARCH PAGE ===== */
    .site-main .tour-card .tour-image{background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image::before{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image::after{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a{background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a::before{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a::after{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a img{background:none!important;background-color:transparent!important;opacity:1!important;filter:none!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a img::before{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    .site-main .tour-card .tour-image a img::after{display:none!important;content:none!important;background:none!important;background-color:transparent!important;box-shadow:none!important;}
    
    /* Contact form buttons */
    .jvcf-submit{background:var(--gradient-primary)!important;color:#ffffff!important;border:none!important;padding:12px 24px!important;border-radius:var(--radius)!important;font-weight:700!important;font-size:14px!important;cursor:pointer!important;transition:var(--transition)!important;box-shadow:0 3px 10px rgba(220,38,38,0.3)!important;}
    .jvcf-submit:hover{transform:translateY(-2px)!important;box-shadow:0 6px 20px rgba(220,38,38,0.4)!important;}
    
    
    /* Contact buttons */
    .contact-btn{background:var(--gradient-primary)!important;color:#ffffff!important;border:none!important;padding:10px 20px!important;border-radius:var(--radius)!important;font-weight:700!important;font-size:13px!important;text-decoration:none!important;transition:var(--transition)!important;box-shadow:0 3px 10px rgba(220,38,38,0.3)!important;}
    .contact-btn:hover{transform:translateY(-2px)!important;box-shadow:0 6px 20px rgba(220,38,38,0.4)!important;color:#ffffff!important;}
    
    /* Body text contrast */
    body{color:#000000!important;}
    
    /* Section titles */
    .section-title{color:#000000!important;font-weight:800!important;text-shadow:1px 1px 2px rgba(0,0,0,0.1)!important;}
    
    /* ===== HERO SLIDER - TRANSPARENT DARK ELEMENTS ===== */
    #image-slider,.image-slider-section{position:relative!important;width:100%!important;min-height:500px!important;overflow:hidden!important;border-radius:0 0 var(--radius-lg) var(--radius-lg)!important;box-shadow:var(--shadow-lg)!important;}
    #image-slider .carousel{position:relative!important;width:100%!important;height:500px!important;border-radius:0 0 var(--radius-lg) var(--radius-lg)!important;overflow:hidden!important;}
    #image-slider .carousel-inner{height:100%!important;border-radius:0 0 var(--radius-lg) var(--radius-lg)!important;}
    #image-slider .carousel-item{height:500px!important;position:relative!important;overflow:hidden!important;transition:opacity 0.8s ease-in-out!important;}
    #image-slider .carousel-item img{position:absolute!important;top:0!important;left:0!important;width:100%!important;height:100%!important;object-fit:cover!important;object-position:center!important;transition:transform 1.2s ease!important;}
    #image-slider .carousel-item:hover img{transform:scale(1.08)!important;}
    #image-slider .carousel-caption{background:rgba(0,0,0,0.3)!important;padding:40px!important;border-radius:var(--radius)!important;backdrop-filter:blur(20px)!important;border:1px solid rgba(255,255,255,0.1)!important;animation:slideInUp 0.8s ease-out!important;}
    #image-slider .carousel-control-prev,#image-slider .carousel-control-next{width:60px!important;height:60px!important;background:rgba(255,255,255,0.15)!important;border-radius:50%!important;backdrop-filter:blur(10px)!important;border:2px solid rgba(255,255,255,0.3)!important;transition:var(--transition)!important;opacity:0.7!important;}
    #image-slider .carousel-control-prev:hover,#image-slider .carousel-control-next:hover{background:rgba(255,255,255,0.25)!important;transform:scale(1.15)!important;opacity:1!important;box-shadow:0 8px 25px rgba(0,0,0,0.2)!important;}
    #image-slider .carousel-control-prev-icon,#image-slider .carousel-control-next-icon{filter:brightness(0) invert(1)!important;width:24px!important;height:24px!important;}
    #image-slider .carousel-indicators{bottom:25px!important;margin-bottom:0!important;}
    #image-slider .carousel-indicators button{width:14px!important;height:14px!important;border-radius:50%!important;background:rgba(255,255,255,0.4)!important;border:2px solid rgba(255,255,255,0.6)!important;margin:0 8px!important;transition:all 0.4s ease!important;opacity:0.7!important;}
    #image-slider .carousel-indicators button.active{background:var(--primary)!important;transform:scale(1.3)!important;opacity:1!important;box-shadow:0 0 15px rgba(229,62,62,0.6)!important;border-color:var(--primary)!important;}
    #image-slider .carousel-indicators button:hover{opacity:1!important;transform:scale(1.1)!important;}
    @keyframes slideInUp{0%{transform:translateY(30px);opacity:0;}100%{transform:translateY(0);opacity:1;}}
    @media(min-width:768px){#image-slider,.image-slider-section{min-height:600px!important;}#image-slider .carousel,#image-slider .carousel-item{height:600px!important;}}
    @media(min-width:992px){#image-slider,.image-slider-section{min-height:700px!important;}#image-slider .carousel,#image-slider .carousel-item{height:700px!important;}}
    
    /* ===== TOP BAR - LIKE IMAGE DESIGN ===== */
    .top-bar{background:#2d3748!important;padding:8px 0!important;border-bottom:none!important;position:relative!important;display:block!important;}
    .top-bar-content{display:flex!important;justify-content:space-between!important;align-items:center!important;flex-direction:row!important;gap:0!important;}
    .contact-info{display:flex!important;gap:20px!important;align-items:center!important;flex-wrap:wrap!important;}
    .contact-item{display:inline-flex!important;align-items:center!important;gap:8px!important;background:transparent!important;padding:0!important;border-radius:0!important;font-size:14px!important;font-weight:500!important;color:#ffffff!important;box-shadow:none!important;transition:var(--transition)!important;}
    .contact-item:hover{transform:none!important;box-shadow:none!important;background:transparent!important;color:#ffffff!important;}
    .contact-item i{color:#ffffff!important;font-size:14px!important;font-family:"Font Awesome 6 Free"!important;font-weight:900!important;}
    .contact-item a{color:#ffffff!important;text-decoration:none!important;}
    .contact-separator{color:#ffffff!important;font-size:14px!important;margin:0 10px!important;}
    .top-bar-actions{display:flex!important;gap:20px!important;align-items:center!important;}
    .social-icons-top{display:flex!important;gap:20px!important;align-items:center!important;}
    .social-icons-top a{color:#ffffff!important;font-size:16px!important;text-decoration:none!important;transition:var(--transition)!important;}
    .social-icons-top a:hover{color:#ffffff!important;opacity:0.7!important;}
    .social-separator{color:#ffffff!important;font-size:14px!important;margin:0 10px!important;}
    .search-toggle,.user-icon,.topbar-user{display:none!important;}
    
    /* ===== HEADER - DULICHVIETNHAT.VN STYLE ===== */
    .site-header{background:#ffffff!important;padding:16px 0!important;position:sticky!important;top:0!important;z-index:999!important;box-shadow:0 2px 10px rgba(0,0,0,0.05)!important;border-bottom:1px solid #e5e7eb!important;}
    .header-wrapper{display:flex!important;flex-direction:row!important;justify-content:space-between!important;align-items:center!important;gap:30px!important;flex-wrap:nowrap!important;}
    .site-branding{flex-shrink:0!important;}
    .logo-link{display:flex!important;align-items:center!important;text-decoration:none!important;transition:var(--transition)!important;}
    .logo-link:hover{transform:none!important;}
    .site-title{color:#dc2626!important;font-size:24px!important;font-weight:800!important;margin:0!important;line-height:1.2!important;}
    .main-navigation{display:flex!important;align-items:center!important;flex:1!important;justify-content:center!important;}
    .primary-menu{display:flex!important;gap:30px!important;margin:0!important;padding:0!important;list-style:none!important;}
    .primary-menu > li{position:relative!important;}
    .primary-menu > li > a{color:#374151!important;text-decoration:none!important;font-weight:600!important;font-size:16px!important;padding:12px 0!important;transition:var(--transition)!important;}
    .primary-menu > li > a:hover{color:var(--primary)!important;}
    .has-dropdown > a{display:flex!important;align-items:center!important;gap:5px!important;}
    .dropdown-icon{font-size:12px!important;transition:var(--transition)!important;}
    .has-dropdown:hover .dropdown-icon{transform:rotate(180deg)!important;}
    .sub-menu{position:absolute!important;top:100%!important;left:0!important;background:#ffffff!important;min-width:250px!important;box-shadow:0 4px 20px rgba(0,0,0,0.1)!important;border-radius:8px!important;padding:10px 0!important;margin:0!important;list-style:none!important;opacity:0!important;visibility:hidden!important;transform:translateY(-10px)!important;transition:var(--transition)!important;z-index:1000!important;}
    .has-dropdown:hover .sub-menu{opacity:1!important;visibility:visible!important;transform:translateY(0)!important;}
    .sub-menu li{padding:0!important;}
    .sub-menu li a{color:#374151!important;text-decoration:none!important;font-size:14px!important;padding:10px 20px!important;display:block!important;transition:var(--transition)!important;}
    .sub-menu li a:hover{background:#f3f4f6!important;color:var(--primary)!important;}
    .custom-logo{max-height:40px!important;width:auto!important;filter:none!important;}
    .logo-container{display:flex!important;align-items:center!important;gap:6px!important;}
    .vj-logo{display:flex!important;gap:1px!important;}
    .v-letter{color:#00a859!important;font-size:24px!important;font-weight:900!important;text-shadow:1px 1px 2px rgba(0,0,0,0.3)!important;transition:var(--transition)!important;}
    .j-letter{color:#e31e24!important;font-size:24px!important;font-weight:900!important;text-shadow:1px 1px 2px rgba(0,0,0,0.3)!important;transition:var(--transition)!important;}
    .logo-link:hover .v-letter,.logo-link:hover .j-letter{transform:none!important;}
    .logo-text{display:flex!important;flex-direction:row!important;gap:1px!important;align-items:baseline!important;}
    .site-title{font-size:18px!important;font-weight:800!important;color:#000000!important;line-height:1!important;letter-spacing:0!important;}
    .site-tagline{display:none!important;}
    
    /* ===== NAVIGATION - RESPONSIVE DESIGN ===== */
    .main-navigation{display:flex!important;align-items:center!important;}
    .primary-menu{display:flex!important;gap:30px!important;margin:0!important;padding:0!important;list-style:none!important;}
    .primary-menu > li{position:relative!important;}
    .primary-menu > li > a{color:#374151!important;text-decoration:none!important;font-weight:600!important;font-size:16px!important;padding:12px 0!important;transition:var(--transition)!important;}
    .primary-menu > li > a:hover{color:var(--primary)!important;}
    .has-dropdown > a{display:flex!important;align-items:center!important;gap:5px!important;}
    .dropdown-icon{font-size:12px!important;transition:var(--transition)!important;}
    .has-dropdown:hover .dropdown-icon{transform:rotate(180deg)!important;}
    .sub-menu{position:absolute!important;top:100%!important;left:0!important;background:#ffffff!important;min-width:250px!important;box-shadow:0 4px 20px rgba(0,0,0,0.1)!important;border-radius:8px!important;padding:10px 0!important;margin:0!important;list-style:none!important;opacity:0!important;visibility:hidden!important;transform:translateY(-10px)!important;transition:var(--transition)!important;z-index:1000!important;}
    .has-dropdown:hover .sub-menu{opacity:1!important;visibility:visible!important;transform:translateY(0)!important;}
    .sub-menu li{padding:0!important;}
    .sub-menu li a{color:#374151!important;text-decoration:none!important;font-size:14px!important;padding:10px 20px!important;display:block!important;transition:var(--transition)!important;}
    .sub-menu li a:hover{background:#f3f4f6!important;color:var(--primary)!important;}
    .menu-toggle{display:none!important;align-items:center!important;justify-content:center!important;width:40px!important;height:40px!important;background:transparent!important;border:none!important;cursor:pointer!important;transition:var(--transition)!important;flex-shrink:0!important;border-radius:6px!important;}
    .menu-toggle:hover{transform:none!important;background:#f3f4f6!important;}
    .menu-toggle i{font-size:18px!important;color:#374151!important;}
    .menu-toggle:hover i{color:#000000!important;}
    
    /* Mobile Menu Overlay */
    .mobile-menu-overlay{position:fixed!important;top:0!important;left:0!important;width:100%!important;height:100%!important;background:#ffffff!important;z-index:998!important;display:none!important;opacity:0!important;transition:opacity 0.3s ease!important;}
    .mobile-menu-overlay.active{display:block!important;opacity:1!important;}
    
    /* Mobile Menu Drawer */
    .mobile-menu-drawer{position:fixed!important;top:0!important;left:-300px!important;width:300px!important;height:100%!important;background:#ffffff!important;z-index:999!important;transition:left 0.3s ease!important;box-shadow:2px 0 10px rgba(0,0,0,0.1)!important;}
    .mobile-menu-drawer.active{left:0!important;}
    
    .mobile-menu-header{display:flex!important;align-items:center!important;justify-content:space-between!important;padding:20px!important;border-bottom:1px solid #e5e7eb!important;}
    .mobile-menu-close{width:32px!important;height:32px!important;background:transparent!important;border:none!important;cursor:pointer!important;display:flex!important;align-items:center!important;justify-content:center!important;}
    .mobile-menu-close i{font-size:18px!important;color:#374151!important;}
    
    .mobile-menu-nav{padding:20px 0!important;}
    .mobile-menu-nav ul{list-style:none!important;padding:0!important;margin:0!important;}
    .mobile-menu-nav ul li{margin:0!important;}
    .mobile-menu-nav ul li a{display:block!important;padding:15px 20px!important;color:#374151!important;text-decoration:none!important;font-size:16px!important;font-weight:600!important;transition:var(--transition)!important;border-left:3px solid transparent!important;}
    .mobile-menu-nav ul li a:hover{background:#f8f9fa!important;color:#000000!important;border-left-color:var(--primary)!important;}
    .mobile-menu-nav ul li.current-menu-item a{background:#f8f9fa!important;color:#000000!important;border-left-color:var(--primary)!important;}
    
    /* Mobile menu drawer active state */
    .mobile-menu-drawer.active{left:0!important;}
    
    /* ===== FOOTER - CLEAN MINIMAL ===== */
    .site-footer{background:#f8f9fa!important;color:var(--dark)!important;padding:60px 0 30px!important;position:relative!important;overflow:hidden!important;margin-bottom:0!important;border-top:1px solid #e5e7eb!important;}
    .site-footer::before{content:'';position:absolute!important;top:0!important;left:0!important;right:0!important;height:2px!important;background:var(--primary)!important;}
    .site-footer::after{display:none!important;}
    
    /* Ensure white background everywhere */
    #page{background:#ffffff!important;min-height:100vh!important;}
    #content{background:#ffffff!important;}
    main{background:#ffffff!important;}
    section{background:#ffffff!important;}
    .section-padding{background:#ffffff!important;}
    .footer-widgets{display:grid!important;grid-template-columns:repeat(auto-fit,minmax(250px,1fr))!important;gap:40px!important;margin-bottom:40px!important;position:relative!important;z-index:1!important;}
    .footer-widget{background:transparent!important;border:none!important;padding:0!important;border-radius:0!important;box-shadow:none!important;transition:var(--transition)!important;}
    .footer-widget:hover{background:transparent!important;transform:none!important;box-shadow:none!important;border:none!important;}
    
    /* Footer Widget Titles */
    .footer-widget h3,.footer-widget .widget-title{color:var(--dark)!important;font-size:18px!important;font-weight:700!important;margin:0 0 20px 0!important;padding-bottom:10px!important;border-bottom:2px solid var(--primary)!important;display:block!important;position:relative!important;text-transform:none!important;letter-spacing:0!important;}
    .footer-widget h3::after,.footer-widget .widget-title::after{display:none!important;}
    
    /* Contact Details - Clean & Professional */
    .footer-widget .contact-details{display:block!important;}
    .footer-widget .contact-details p{color:var(--gray)!important;font-size:14px!important;line-height:1.6!important;margin:0 0 12px 0!important;display:block!important;padding-left:0!important;}
    .footer-widget .contact-details p::before{display:none!important;}
    .footer-widget .address{margin-bottom:15px!important;line-height:1.6!important;}
    .footer-widget .hotline,.footer-widget .email{margin-bottom:10px!important;}
    .footer-widget .hotline a,.footer-widget .email a{color:var(--dark)!important;text-decoration:none!important;transition:var(--transition)!important;font-weight:500!important;}
    .footer-widget .hotline a:hover,.footer-widget .email a:hover{color:var(--primary)!important;}
    .footer-widget .office-branch{margin-top:20px!important;padding-top:15px!important;border-top:1px solid #e5e7eb!important;}
    .footer-widget .office-title{font-weight:600!important;color:var(--dark)!important;margin:0 0 8px 0!important;font-size:14px!important;}
    .footer-widget .office-address{color:var(--gray)!important;line-height:1.6!important;margin:0!important;}
    
    /* Footer Links */
    .footer-widget ul{list-style:none!important;padding:0!important;margin:0!important;}
    .footer-widget ul li{margin-bottom:10px!important;padding-left:0!important;position:relative!important;line-height:1.6!important;}
    .footer-widget ul li::before{display:none!important;}
    .footer-widget ul li a{color:var(--gray)!important;text-decoration:none!important;transition:var(--transition)!important;display:inline-block!important;font-size:14px!important;}
    .footer-widget ul li a:hover{color:var(--primary)!important;transform:none!important;}
    
    /* ===== SOCIAL ICONS - ULTRA BRAND COLORS ===== */
    .social-icons{display:flex!important;gap:20px!important;margin-top:24px!important;flex-wrap:wrap!important;}
    .social-icons a{width:60px!important;height:60px!important;display:flex!important;align-items:center!important;justify-content:center!important;border-radius:50%!important;color:#fff!important;transition:var(--transition)!important;position:relative!important;overflow:hidden!important;border:3px solid rgba(255,255,255,0.2)!important;backdrop-filter:blur(10px)!important;}
    .social-icons a::before{content:'';position:absolute!important;inset:0!important;background:rgba(255,255,255,0.2)!important;transform:scale(0)!important;transition:transform 0.5s cubic-bezier(0.4,0,0.2,1)!important;border-radius:50%!important;}
    .social-icons a:hover{transform:translateY(-8px) scale(1.1)!important;border-color:rgba(255,255,255,0.4)!important;box-shadow:0 15px 35px rgba(0,0,0,0.3)!important;}
    .social-icons a:hover::before{transform:scale(1)!important;}
    .social-icons a i{color:#fff!important;font-size:28px!important;font-family:"Font Awesome 6 Brands"!important;font-weight:400!important;display:inline-block!important;z-index:1!important;position:relative!important;line-height:1!important;}
    .social-icons a.facebook i{font-family:"Font Awesome 6 Brands"!important;}
    .social-icons a.instagram i{font-family:"Font Awesome 6 Brands"!important;}
    .social-icons a.youtube i{font-family:"Font Awesome 6 Brands"!important;}
    .social-icons a.zalo i{font-family:"Font Awesome 6 Free"!important;font-weight:900!important;}
    .social-icons a.facebook{background:linear-gradient(135deg,#1877F2 0%,#42A5F5 100%)!important;box-shadow:0 12px 30px rgba(24,119,242,0.5)!important;}
    .social-icons a.instagram{background:radial-gradient(circle at 30% 107%,#fdf497 0%,#fdf497 5%,#fd5949 45%,#d6249f 60%,#285AEB 90%)!important;box-shadow:0 12px 30px rgba(214,36,159,0.5)!important;}
    .social-icons a.youtube{background:linear-gradient(135deg,#FF0000 0%,#FF5722 100%)!important;box-shadow:0 12px 30px rgba(255,0,0,0.5)!important;}
    .social-icons a.zalo{background:linear-gradient(135deg,#0068FF 0%,#2196F3 100%)!important;box-shadow:0 12px 30px rgba(0,104,255,0.5)!important;}
    
    /* ===== PAYMENT ICONS - ULTRA MODERN ===== */
    .payment-icons{display:flex!important;gap:20px!important;align-items:center!important;justify-content:center!important;}
    .payment-icons i{font-size:40px!important;color:var(--gray)!important;font-family:"Font Awesome 6 Brands"!important;font-weight:400!important;display:inline-block!important;transition:var(--transition)!important;padding:8px!important;border-radius:var(--radius)!important;background:#f8f9fa!important;border:1px solid #e5e7eb!important;}
    .payment-icons i:hover{color:var(--primary)!important;transform:scale(1.2) translateY(-3px)!important;background:#ffffff!important;box-shadow:var(--shadow)!important;}
    
    /* ===== FOOTER BOTTOM ===== */
    .footer-bottom{text-align:center!important;padding-top:20px!important;border-top:1px solid #e5e7eb!important;color:var(--gray)!important;font-size:13px!important;}
    .footer-bottom-inner{display:flex!important;justify-content:center!important;align-items:center!important;flex-wrap:wrap!important;gap:20px!important;}
    .copyright{font-weight:500!important;color:var(--dark)!important;}
    
    /* ===== SEARCH OVERLAY MODAL - MODERN DESIGN ===== */
    .search-overlay{position:fixed!important;top:0!important;left:0!important;width:100%!important;height:100%!important;background:rgba(0,0,0,0.85)!important;z-index:9999!important;display:none!important;align-items:center!important;justify-content:center!important;padding:20px!important;backdrop-filter:blur(10px)!important;}
    .search-overlay.active{display:flex!important;animation:fadeIn 0.3s ease-out!important;}
    @keyframes fadeIn{0%{opacity:0;}100%{opacity:1;}}
    .search-modal{background:#ffffff!important;border-radius:24px!important;padding:0!important;max-width:700px!important;width:100%!important;box-shadow:0 25px 80px rgba(0,0,0,0.4)!important;position:relative!important;animation:modalSlideIn 0.4s cubic-bezier(0.25,0.46,0.45,0.94)!important;overflow:hidden!important;}
    @keyframes modalSlideIn{0%{transform:translateY(-60px) scale(0.95);opacity:0;}100%{transform:translateY(0) scale(1);opacity:1;}}
    .search-modal-header{background:linear-gradient(135deg,#f8fafc 0%,#e2e8f0 100%)!important;padding:30px 40px 20px!important;border-bottom:1px solid #e5e7eb!important;position:relative!important;}
    .search-modal-title{font-size:28px!important;font-weight:800!important;color:#000000!important;margin:0!important;text-align:center!important;letter-spacing:-0.02em!important;}
    .search-modal-close{position:absolute!important;top:20px!important;right:20px!important;width:44px!important;height:44px!important;background:rgba(0,0,0,0.1)!important;border:none!important;border-radius:50%!important;display:flex!important;align-items:center!important;justify-content:center!important;cursor:pointer!important;transition:var(--transition)!important;color:#374151!important;backdrop-filter:blur(10px)!important;}
    .search-modal-close:hover{background:var(--primary)!important;color:#fff!important;transform:scale(1.1) rotate(90deg)!important;box-shadow:0 4px 15px rgba(220,38,38,0.3)!important;}
    .search-modal-form{padding:30px 40px 40px!important;background:#ffffff!important;}
    .search-modal-input{width:100%!important;padding:20px 24px!important;border:2px solid #e5e7eb!important;border-radius:16px!important;font-size:18px!important;outline:none!important;transition:var(--transition)!important;background:#ffffff!important;color:#000000!important;font-weight:500!important;margin-bottom:20px!important;}
    .search-modal-input::placeholder{color:#9ca3af!important;font-weight:400!important;}
    .search-modal-input:focus{border-color:var(--primary)!important;box-shadow:0 0 0 4px rgba(220,38,38,0.1)!important;transform:translateY(-2px)!important;}
    .search-modal-btn{width:100%!important;padding:18px 24px!important;background:var(--gradient-primary)!important;color:#ffffff!important;border:none!important;border-radius:16px!important;font-weight:700!important;font-size:16px!important;cursor:pointer!important;transition:var(--transition)!important;text-transform:uppercase!important;letter-spacing:0.5px!important;position:relative!important;overflow:hidden!important;}
    .search-modal-btn::before{content:''!important;position:absolute!important;top:0!important;left:-100%!important;width:100%!important;height:100%!important;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.3),transparent)!important;transition:left 0.6s!important;}
    .search-modal-btn:hover{transform:translateY(-3px)!important;box-shadow:0 12px 30px rgba(220,38,38,0.4)!important;}
    .search-modal-btn:hover::before{left:100%!important;}
    .search-modal-btn:active{transform:translateY(-1px)!important;}
    
    /* Search suggestions */
    .search-suggestions{margin-top:20px!important;padding:0 40px 30px!important;background:#ffffff!important;}
    .search-suggestion-title{font-size:14px!important;font-weight:600!important;color:#6b7280!important;margin-bottom:12px!important;text-transform:uppercase!important;letter-spacing:0.5px!important;}
    .search-suggestion-tags{display:flex!important;gap:8px!important;flex-wrap:wrap!important;}
    .search-suggestion-tag{background:#f3f4f6!important;color:#374151!important;padding:8px 16px!important;border-radius:20px!important;font-size:13px!important;font-weight:500!important;cursor:pointer!important;transition:var(--transition)!important;border:1px solid #e5e7eb!important;}
    .search-suggestion-tag:hover{background:var(--primary)!important;color:#ffffff!important;transform:translateY(-2px)!important;box-shadow:0 4px 12px rgba(220,38,38,0.3)!important;}
    
    /* ===== BACK TO TOP ===== */
    .back-to-top{position:fixed!important;bottom:32px!important;right:32px!important;width:56px!important;height:56px!important;background:var(--gradient-primary)!important;color:#fff!important;border-radius:50%!important;display:flex!important;align-items:center!important;justify-content:center!important;box-shadow:0 8px 24px rgba(239,68,68,0.4)!important;opacity:0!important;visibility:hidden!important;transition:var(--transition)!important;z-index:999!important;text-decoration:none!important;}
    .back-to-top.show{opacity:1!important;visibility:visible!important;}
    .back-to-top:hover{transform:translateY(-5px)!important;box-shadow:0 12px 32px rgba(239,68,68,0.5)!important;}
    .back-to-top i{font-size:20px!important;font-family:"Font Awesome 6 Free"!important;font-weight:900!important;}
    
    /* ===== RESPONSIVE - ULTRA PROFESSIONAL ===== */
    
    /* Tablet - Large (992px - 1199px) */
    @media(max-width:1199px){
        .container{padding:0 24px!important;}
        .primary-menu>li>a{padding:14px 20px!important;font-size:15px!important;}
        .consultation-btn{padding:14px 30px!important;font-size:15px!important;}
        .footer-widgets{gap:60px!important;}
        .footer-widget{padding:32px!important;}
    }
    
    /* Tablet - Medium (768px - 991px) */
    @media(max-width:991px){
        .primary-menu{display:none!important;}
        .consultation-btn{display:none!important;}
        .menu-toggle{display:flex!important;align-items:center!important;justify-content:center!important;}
        .header-wrapper{gap:20px!important;}
        .footer-widgets{grid-template-columns:repeat(2,1fr)!important;gap:50px!important;}
        .site-header{padding:12px 0!important;}
        .logo-container{gap:6px!important;}
        .site-title{font-size:18px!important;}
        .v-letter,.j-letter{font-size:24px!important;}
        .top-bar{padding:6px 0!important;}
        .contact-item{font-size:13px!important;}
        .social-icons-top a{font-size:14px!important;}
    }
    
    /* Mobile - Large (576px - 767px) */
    @media(max-width:767px){
        .container{padding:0 20px!important;}
        .site-header{padding:10px 0!important;}
        .header-wrapper{gap:15px!important;}
        .site-title{font-size:16px!important;}
        .v-letter,.j-letter{font-size:22px!important;}
        .custom-logo{max-height:42px!important;}
        .primary-menu{display:none!important;}
        .consultation-btn{display:none!important;}
        .footer-widgets{grid-template-columns:1fr!important;gap:50px!important;}
        .footer-widget{padding:32px 24px!important;}
        .footer-widget h3,.footer-widget .widget-title{font-size:20px!important;margin-bottom:24px!important;}
        .footer-widget .contact-details p{font-size:15px!important;}
        .footer-widget ul li a{font-size:15px!important;}
        .site-footer{padding:70px 0 30px!important;}
        .footer-bottom-inner{flex-direction:column!important;text-align:center!important;gap:28px!important;}
        .payment-icons{justify-content:center!important;gap:16px!important;}
        .payment-icons i{font-size:36px!important;}
        .back-to-top{bottom:24px!important;right:24px!important;width:52px!important;height:52px!important;}
        .back-to-top i{font-size:20px!important;}
        .social-icons{gap:16px!important;}
        .social-icons a{width:52px!important;height:52px!important;}
        .social-icons a i{font-size:24px!important;}
        .top-bar{padding:6px 0!important;}
        .contact-info{gap:15px!important;}
        .contact-item{font-size:12px!important;}
        .social-icons-top{gap:15px!important;}
        .social-icons-top a{font-size:14px!important;}
    }
    
    /* Mobile - Small (< 576px) */
    @media(max-width:575px){
        .container{padding:0 16px!important;}
        .site-header{padding:8px 0!important;}
        .header-wrapper{gap:12px!important;}
        .site-title{font-size:14px!important;}
        .v-letter,.j-letter{font-size:20px!important;}
        .custom-logo{max-height:38px!important;}
        .logo-container{gap:4px!important;}
        .primary-menu{display:none!important;}
        .consultation-btn{display:none!important;}
        .menu-toggle{width:44px!important;height:44px!important;}
        .footer-widgets{gap:40px!important;}
        .footer-widget{padding:28px 20px!important;}
        .footer-widget h3,.footer-widget .widget-title{font-size:18px!important;margin-bottom:22px!important;}
        .footer-widget .contact-details p{font-size:14px!important;}
        .footer-widget ul li{margin-bottom:14px!important;}
        .footer-widget ul li a{font-size:14px!important;}
        .site-footer{padding:60px 0 24px!important;}
        .footer-bottom{font-size:13px!important;}
        .payment-icons{gap:12px!important;}
        .payment-icons i{font-size:32px!important;}
        .back-to-top{bottom:20px!important;right:20px!important;width:48px!important;height:48px!important;}
        .back-to-top i{font-size:18px!important;}
        .social-icons{gap:14px!important;}
        .social-icons a{width:48px!important;height:48px!important;border-width:2px!important;}
        .social-icons a i{font-size:22px!important;}
        .top-bar{padding:4px 0!important;}
        .contact-info{gap:10px!important;}
        .contact-item{font-size:11px!important;}
        .social-icons-top{gap:10px!important;}
        .social-icons-top a{font-size:12px!important;}
        
        /* Search Modal Mobile */
        .search-overlay{padding:10px!important;}
        .search-modal{max-width:100%!important;margin:10px!important;border-radius:20px!important;}
        .search-modal-header{padding:20px 20px 15px!important;}
        .search-modal-title{font-size:22px!important;}
        .search-modal-close{top:15px!important;right:15px!important;width:36px!important;height:36px!important;}
        .search-modal-form{padding:20px!important;}
        .search-modal-input{padding:16px 20px!important;font-size:16px!important;border-radius:12px!important;}
        .search-modal-btn{padding:16px 20px!important;font-size:15px!important;border-radius:12px!important;}
        .search-suggestions{padding:0 20px 20px!important;}
        .search-suggestion-tag{padding:6px 12px!important;font-size:12px!important;}
    }
    
    /* ===== HEADER ACTIONS STYLING ===== */
    .header-actions .search-toggle:hover{background:#f3f4f6!important;color:#000000!important;}
    .header-actions a:hover{background:#f3f4f6!important;color:#000000!important;}
    .consultation-btn:hover{transform:translateY(-2px)!important;box-shadow:0 6px 20px rgba(220,38,38,0.4)!important;color:#ffffff!important;}
    
    /* User Menu Dropdown */
    .user-menu{position:relative!important;}
    .user-menu:hover .user-menu-dropdown{opacity:1!important;visibility:visible!important;transform:translateY(0)!important;}
    .user-menu-dropdown li a:hover{background:#f3f4f6!important;color:var(--primary)!important;}
    
    /* ===== MOBILE RESPONSIVE - DULICHVIETNHAT.VN STYLE ===== */
    @media(max-width:991px){
        .top-bar{display:none!important;}
        .site-header{padding:12px 0!important;}
        .header-wrapper{flex-direction:row!important;justify-content:space-between!important;gap:15px!important;}
        .site-branding{flex:1!important;display:flex!important;justify-content:center!important;align-items:center!important;}
        .site-title{font-size:20px!important;}
        .main-navigation{display:none!important;}
        .primary-menu{display:none!important;}
        .header-actions{display:none!important;}
        .menu-toggle{display:flex!important;align-items:center!important;justify-content:center!important;width:40px!important;height:40px!important;background:transparent!important;border:none!important;cursor:pointer!important;transition:var(--transition)!important;flex-shrink:0!important;border-radius:6px!important;}
        .menu-toggle:hover{transform:none!important;background:#f3f4f6!important;}
        .menu-toggle i{font-size:18px!important;color:#374151!important;}
        .menu-toggle:hover i{color:#000000!important;}
    }
    
    /* Mobile Banner Fixes */
    @media(max-width:767px){
        #image-slider,.image-slider-section{min-height:350px!important;}
        #image-slider .carousel,#image-slider .carousel-item{height:350px!important;}
        #image-slider .carousel-caption{padding:20px 15px!important;font-size:12px!important;background:rgba(0,0,0,0.4)!important;backdrop-filter:blur(5px)!important;border-radius:10px!important;margin:0 15px!important;}
        #image-slider .carousel-caption h2{font-size:20px!important;margin-bottom:10px!important;color:#ffffff!important;font-weight:800!important;}
        #image-slider .carousel-caption p{font-size:12px!important;margin-bottom:15px!important;color:#ffffff!important;}
        #image-slider .carousel-caption .btn{font-size:12px!important;padding:8px 16px!important;background:var(--gradient-primary)!important;border:none!important;border-radius:20px!important;color:#ffffff!important;font-weight:600!important;}
    }
    
    @media(max-width:991px) and (min-width:768px){
        #image-slider,.image-slider-section{min-height:400px!important;}
        #image-slider .carousel,#image-slider .carousel-item{height:400px!important;}
        #image-slider .carousel-caption{padding:25px 20px!important;font-size:14px!important;background:rgba(0,0,0,0.4)!important;backdrop-filter:blur(5px)!important;border-radius:12px!important;margin:0 20px!important;}
        #image-slider .carousel-caption h2{font-size:24px!important;margin-bottom:12px!important;color:#ffffff!important;font-weight:800!important;}
        #image-slider .carousel-caption p{font-size:14px!important;margin-bottom:18px!important;color:#ffffff!important;}
        #image-slider .carousel-caption .btn{font-size:14px!important;padding:10px 20px!important;background:var(--gradient-primary)!important;border:none!important;border-radius:25px!important;color:#ffffff!important;font-weight:600!important;}
    }
    </style>
    
    <!-- Bootstrap CSS Overrides -->
    <style>
    /* Top Bar Styling */
    .top-bar {
        background: #1f2937 !important;
        color: #fff !important;
        padding: 8px 0 !important;
        font-size: 14px !important;
    }
    
    .top-bar .container {
        max-width: 1200px !important;
    }
    
    .top-bar a {
        color: #fff !important;
        text-decoration: none !important;
        transition: opacity 0.3s ease !important;
    }
    
    .top-bar a:hover {
        opacity: 0.8 !important;
    }
    
    /* Header Styling */
    .site-header {
        background: #fff !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05) !important;
        position: sticky !important;
        top: 0 !important;
        z-index: 999 !important;
    }
    
    .navbar {
        padding: 16px 0 !important;
    }
    
    /* Logo Styling */
    .navbar-brand .site-title {
        font-size: 1.8rem !important;
        font-weight: 800 !important;
        margin: 0 !important;
    }
    
    .navbar-brand .site-title .text-success {
        color: #00a859 !important;
    }
    
    .navbar-brand .site-title .text-danger {
        color: #e31e24 !important;
    }
    
    .navbar-brand .site-title .text-primary {
        color: #2563eb !important;
    }
    
    /* Navigation Styling */
    .navbar-nav .nav-link {
        font-weight: 600 !important;
        color: #374151 !important;
        padding: 12px 20px !important;
        transition: color 0.3s ease !important;
        font-size: 16px !important;
    }
    
    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: #dc2626 !important;
    }
    
    .navbar-nav .nav-link.dropdown-toggle::after {
        margin-left: 8px !important;
        vertical-align: middle !important;
    }
    
    /* Dropdown Menu Styling */
    .dropdown-menu {
        border: none !important;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1) !important;
        border-radius: 8px !important;
        padding: 8px 0 !important;
        margin-top: 8px !important;
        min-width: 220px !important;
    }
    
    .dropdown-item {
        padding: 10px 20px !important;
        font-size: 14px !important;
        color: #374151 !important;
        transition: all 0.3s ease !important;
    }
    
    .dropdown-item:hover {
        background-color: #f8f9fa !important;
        color: #dc2626 !important;
    }
    
    /* Button Styling */
    .btn-danger {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%, #991b1b 100%) !important;
        border: none !important;
        box-shadow: 0 3px 10px rgba(220,38,38,0.3) !important;
        transition: all 0.3s ease !important;
        font-weight: 700 !important;
        padding: 12px 24px !important;
        border-radius: 6px !important;
    }
    
    .btn-danger:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 6px 20px rgba(220,38,38,0.4) !important;
        background: linear-gradient(135deg, #b91c1c 0%, #991b1b 50%, #7f1d1d 100%) !important;
    }
    
    .btn-outline-secondary {
        border: 1px solid #d1d5db !important;
        color: #374151 !important;
        transition: all 0.3s ease !important;
        padding: 8px 12px !important;
        border-radius: 6px !important;
    }
    
    .btn-outline-secondary:hover {
        background-color: #f3f4f6 !important;
        border-color: #9ca3af !important;
        color: #000 !important;
    }
    
    /* Mobile Responsive */
    @media (max-width: 991.98px) {
        .top-bar {
            display: none !important;
        }
        
        .navbar-collapse {
            background: #fff !important;
            border-radius: 8px !important;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1) !important;
            margin-top: 1rem !important;
            padding: 1rem !important;
        }
        
        .navbar-nav {
            text-align: center !important;
        }
        
        .navbar-nav .nav-item {
            margin: 0.25rem 0 !important;
        }
        
        .navbar-nav .nav-link {
            padding: 15px 20px !important;
        }
        
        .d-flex.gap-3 {
            justify-content: center !important;
            margin-top: 1rem !important;
            flex-wrap: wrap !important;
            gap: 1rem !important;
        }
        
        .btn-danger {
            width: 100% !important;
            margin-bottom: 0.5rem !important;
        }
    }
    
    /* Hover Effects */
    .navbar-nav .nav-item:hover .dropdown-menu {
        display: block !important;
    }
    
    .dropdown:hover .dropdown-menu {
        display: block !important;
    }
    
    /* Search Modal Styling */
    .search-modal-content {
        border: none !important;
        border-radius: 16px !important;
        box-shadow: 0 25px 80px rgba(0,0,0,0.4) !important;
        overflow: hidden !important;
    }
    
    .search-modal-header {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%) !important;
        border-bottom: 1px solid #e5e7eb !important;
        padding: 24px 32px 20px !important;
        position: relative !important;
    }
    
    .search-modal-title {
        font-size: 24px !important;
        font-weight: 800 !important;
        color: #000000 !important;
        margin: 0 !important;
        display: flex !important;
        align-items: center !important;
    }
    
    .search-modal-title i {
        color: #dc2626 !important;
        font-size: 20px !important;
    }
    
    .search-modal-close {
        position: absolute !important;
        top: 20px !important;
        right: 20px !important;
        width: 40px !important;
        height: 40px !important;
        background: rgba(0,0,0,0.1) !important;
        border: none !important;
        border-radius: 50% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        color: #374151 !important;
        backdrop-filter: blur(10px) !important;
    }
    
    .search-modal-close:hover {
        background: #dc2626 !important;
        color: #fff !important;
        transform: scale(1.1) rotate(90deg) !important;
        box-shadow: 0 4px 15px rgba(220,38,38,0.3) !important;
    }
    
    .search-modal-body {
        padding: 32px !important;
        background: #ffffff !important;
    }
    
    .search-form-group {
        margin-bottom: 24px !important;
    }
    
    .search-label {
        display: block !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        color: #374151 !important;
        margin-bottom: 12px !important;
    }
    
    .search-input-group {
        display: flex !important;
        gap: 0 !important;
        border-radius: 12px !important;
        overflow: hidden !important;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1) !important;
    }
    
    .search-field {
        flex: 1 !important;
        padding: 16px 20px !important;
        border: 2px solid #e5e7eb !important;
        border-right: none !important;
        border-radius: 12px 0 0 12px !important;
        font-size: 16px !important;
        outline: none !important;
        transition: all 0.3s ease !important;
        background: #ffffff !important;
        color: #000000 !important;
        font-weight: 500 !important;
    }
    
    .search-field::placeholder {
        color: #9ca3af !important;
        font-weight: 400 !important;
    }
    
    .search-field:focus {
        border-color: #dc2626 !important;
        box-shadow: 0 0 0 4px rgba(220,38,38,0.1) !important;
        transform: translateY(-2px) !important;
    }
    
    .search-submit {
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 50%, #991b1b 100%) !important;
        color: #ffffff !important;
        border: none !important;
        padding: 16px 24px !important;
        border-radius: 0 12px 12px 0 !important;
        font-weight: 700 !important;
        font-size: 16px !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        text-transform: uppercase !important;
        letter-spacing: 0.5px !important;
        position: relative !important;
        overflow: hidden !important;
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        min-width: 140px !important;
        justify-content: center !important;
    }
    
    .search-submit::before {
        content: '' !important;
        position: absolute !important;
        top: 0 !important;
        left: -100% !important;
        width: 100% !important;
        height: 100% !important;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent) !important;
        transition: left 0.6s !important;
    }
    
    .search-submit:hover {
        transform: translateY(-3px) !important;
        box-shadow: 0 12px 30px rgba(220,38,38,0.4) !important;
        background: linear-gradient(135deg, #b91c1c 0%, #991b1b 50%, #7f1d1d 100%) !important;
    }
    
    .search-submit:hover::before {
        left: 100% !important;
    }
    
    .search-submit:active {
        transform: translateY(-1px) !important;
    }
    
    /* Search Suggestions */
    .search-suggestions {
        margin-top: 24px !important;
        padding-top: 24px !important;
        border-top: 1px solid #e5e7eb !important;
    }
    
    .suggestions-title {
        font-size: 14px !important;
        font-weight: 600 !important;
        color: #6b7280 !important;
        margin-bottom: 12px !important;
        text-transform: uppercase !important;
        letter-spacing: 0.5px !important;
    }
    
    .suggestion-tags {
        display: flex !important;
        gap: 8px !important;
        flex-wrap: wrap !important;
    }
    
    .suggestion-tag {
        background: #f3f4f6 !important;
        color: #374151 !important;
        padding: 8px 16px !important;
        border-radius: 20px !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        text-decoration: none !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        border: 1px solid #e5e7eb !important;
    }
    
    .suggestion-tag:hover {
        background: #dc2626 !important;
        color: #ffffff !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 4px 12px rgba(220,38,38,0.3) !important;
        text-decoration: none !important;
    }
    
    /* Modal Animation */
    .modal.fade .modal-dialog {
        transition: transform 0.4s cubic-bezier(0.25,0.46,0.45,0.94) !important;
        transform: translateY(-60px) scale(0.95) !important;
    }
    
    .modal.show .modal-dialog {
        transform: translateY(0) scale(1) !important;
    }
    
    /* Mobile Responsive */
    @media (max-width: 768px) {
        .search-modal-content {
            margin: 20px !important;
            border-radius: 12px !important;
        }
        
        .search-modal-header {
            padding: 20px 20px 15px !important;
        }
        
        .search-modal-title {
            font-size: 20px !important;
        }
        
        .search-modal-close {
            top: 15px !important;
            right: 15px !important;
            width: 36px !important;
            height: 36px !important;
        }
        
        .search-modal-body {
            padding: 20px !important;
        }
        
        .search-input-group {
            flex-direction: column !important;
            gap: 0 !important;
        }
        
        .search-field {
            border-radius: 12px 12px 0 0 !important;
            border-right: 2px solid #e5e7eb !important;
            border-bottom: none !important;
        }
        
        .search-submit {
            border-radius: 0 0 12px 12px !important;
            min-width: auto !important;
        }
        
        .suggestion-tags {
            justify-content: center !important;
        }
    }
    </style>
    
    <!-- JavaScript for Enhanced Dropdown -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        try {
        // Enhanced dropdown hover functionality
        const dropdownItems = document.querySelectorAll('.nav-item.dropdown');
        
        dropdownItems.forEach(function(item) {
            const dropdownToggle = item.querySelector('.dropdown-toggle');
            const dropdownMenu = item.querySelector('.dropdown-menu');
            
            if (dropdownToggle && dropdownMenu) {
                // Show dropdown on hover
                item.addEventListener('mouseenter', function() {
                    dropdownMenu.classList.add('show');
                    dropdownToggle.setAttribute('aria-expanded', 'true');
                });
                
                // Hide dropdown when mouse leaves
                item.addEventListener('mouseleave', function() {
                    dropdownMenu.classList.remove('show');
                    dropdownToggle.setAttribute('aria-expanded', 'false');
                });
                
                // Keep dropdown open when hovering over menu
                dropdownMenu.addEventListener('mouseenter', function() {
                    dropdownMenu.classList.add('show');
                    dropdownToggle.setAttribute('aria-expanded', 'true');
                });
                
                dropdownMenu.addEventListener('mouseleave', function() {
                    dropdownMenu.classList.remove('show');
                    dropdownToggle.setAttribute('aria-expanded', 'false');
                });
            }
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Add active class to current page menu item
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        
        navLinks.forEach(function(link) {
            const linkHref = link.getAttribute('href');
            if (linkHref === currentPath || 
                (currentPath === '/' && (linkHref === '/' || linkHref.endsWith('/'))) ||
                (currentPath !== '/' && linkHref.includes(currentPath))) {
                link.classList.add('active');
            }
        });
        
        // Search Modal Enhancement
        const searchModal = document.getElementById('searchModal');
        const searchField = document.getElementById('search-field');
        
        if (searchModal && searchField) {
            // Focus search field when modal opens
            searchModal.addEventListener('shown.bs.modal', function() {
                searchField.focus();
            });
            
            // Handle search form submission
            const searchForm = document.querySelector('.search-form');
            if (searchForm) {
                searchForm.addEventListener('submit', function(e) {
                    const searchValue = searchField.value.trim();
                    if (searchValue === '') {
                        e.preventDefault();
                        searchField.focus();
                        return false;
                    }
                });
            }
            
            // Auto-fill search field from suggestion tags
            const suggestionTags = document.querySelectorAll('.suggestion-tag');
            suggestionTags.forEach(function(tag) {
                tag.addEventListener('click', function(e) {
                    e.preventDefault();
                    const searchText = this.textContent.trim();
                    searchField.value = searchText;
                    searchField.focus();
                    
                    // Close modal and submit search
                    const modal = bootstrap.Modal.getInstance(searchModal);
                    if (modal) {
                        modal.hide();
                    }
                    
                    // Submit search after modal closes
                    setTimeout(function() {
                        searchForm.submit();
                    }, 300);
                });
            });
            
            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Ctrl/Cmd + K to open search
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                    e.preventDefault();
                    const modal = new bootstrap.Modal(searchModal);
                    modal.show();
                }
                
                // Escape to close search
                if (e.key === 'Escape' && searchModal.classList.contains('show')) {
                    const modal = bootstrap.Modal.getInstance(searchModal);
                    if (modal) {
                        modal.hide();
                    }
                }
            });
        }
        } catch (error) {
            console.error('JavaScript error in header:', error);
        }
    });
    </script>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <!-- Top Bar - Contact Info & Social Media -->
    <div class="top-bar bg-dark text-white py-2 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex gap-4">
                        <span><i class="fas fa-phone me-2"></i>1900 2108</span>
                        <span><i class="fas fa-envelope me-2"></i>info@dulichvietnhat.vn</span>
        </div>
    </div>

            </div>
        </div>
    </div>

    <header id="masthead" class="site-header bg-white shadow-sm sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light py-3">
                <!-- Logo Section -->
                <a class="navbar-brand d-flex align-items-center" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('VJ LINKS - Trang chủ', 'doan'); ?>">
                        <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                        <h1 class="site-title mb-0 d-flex align-items-center">
                            <span class="text-success fw-bold fs-3" aria-hidden="true">V</span>
                            <span class="text-danger fw-bold fs-3" aria-hidden="true">J</span>
                            <span class="text-primary fw-bold fs-3" aria-hidden="true">LINKS</span>
                            <span class="text-dark fs-6 align-super" aria-hidden="true">®</span>
                            <span class="visually-hidden"><?php esc_html_e('VJ LINKS', 'doan'); ?></span>
                                </h1>
                        <?php endif; ?>
                    </a>

                <!-- Mobile Menu Toggle -->
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Về trang chủ', 'doan'); ?>"><?php esc_html_e('Trang chủ','doan'); ?></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo esc_url(home_url('/lich-khoi-hanh')); ?>" data-bs-toggle="dropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Xem lịch khởi hành tour', 'doan'); ?>">
                                <?php esc_html_e('Lịch khởi hành','doan'); ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo esc_url(home_url('/tour-nhat-ban-mua-thu-2025')); ?>" aria-label="<?php esc_attr_e('Xem tour Nhật Bản mùa thu 2025', 'doan'); ?>"><?php esc_html_e('Tour Nhật mùa thu 2025','doan'); ?></a></li>
                                <li><a class="dropdown-item" href="<?php echo esc_url(home_url('/tour-5-ngay-4-dem')); ?>" aria-label="<?php esc_attr_e('Xem tour Nhật Bản 5 ngày 4 đêm', 'doan'); ?>"><?php esc_html_e('Tour 5 Ngày 4 Đêm','doan'); ?></a></li>
                                <li><a class="dropdown-item" href="<?php echo esc_url(home_url('/tour-7-ngay-6-dem')); ?>" aria-label="<?php esc_attr_e('Xem tour Nhật Bản 7 ngày 6 đêm', 'doan'); ?>"><?php esc_html_e('Tour 7 Ngày 6 Đêm','doan'); ?></a></li>
                                <li><a class="dropdown-item" href="<?php echo esc_url(home_url('/tour-6-ngay-5-dem')); ?>" aria-label="<?php esc_attr_e('Xem tour Nhật Bản 6 ngày 5 đêm', 'doan'); ?>"><?php esc_html_e('Tour 6 Ngày 5 Đêm','doan'); ?></a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo esc_url(home_url('/hinh-anh-thuc-te')); ?>" aria-label="<?php esc_attr_e('Xem hình ảnh thực tế tour', 'doan'); ?>"><?php esc_html_e('Hình ảnh thực tế','doan'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo esc_url(home_url('/kham-pha-nhat-ban')); ?>" aria-label="<?php esc_attr_e('Khám phá văn hóa Nhật Bản', 'doan'); ?>"><?php esc_html_e('Khám phá Nhật Bản','doan'); ?></a>
                        </li>
                    </ul>

                    <!-- Header Actions -->
                    <div class="d-flex align-items-center gap-3">
                        <a href="<?php echo esc_url(home_url('/dang-ky-tu-van')); ?>" class="btn btn-danger btn-sm fw-bold px-4" aria-label="<?php esc_attr_e('Đăng ký tư vấn du lịch Nhật Bản', 'doan'); ?>">
                            <i class="fas fa-phone me-2" aria-hidden="true"></i><?php esc_html_e('Đăng ký tư vấn','doan'); ?>
                        </a>
                        
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#searchModal" aria-label="<?php esc_attr_e('Mở tìm kiếm', 'doan'); ?>">
                            <i class="fas fa-search" aria-hidden="true"></i>
                            <span class="visually-hidden"><?php esc_html_e('Tìm kiếm', 'doan'); ?></span>
                        </button>
                        
                        <?php 
                            $acc_page = get_page_by_path('tai-khoan');
                            $account_url = $acc_page ? get_permalink($acc_page) : ( is_user_logged_in() ? admin_url('profile.php') : wp_login_url() );
                        ?>
                    <?php if ( is_user_logged_in() ) : ?>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Menu tài khoản', 'doan'); ?>">
                                <i class="fas fa-user" aria-hidden="true"></i>
                                <span class="visually-hidden"><?php esc_html_e('Tài khoản', 'doan'); ?></span>
                            </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="<?php echo esc_url($account_url); ?>"><?php esc_html_e('Tài khoản của tôi','doan'); ?></a></li>
                                <?php if ( current_user_can('edit_posts') ) : ?>
                                        <li><a class="dropdown-item" href="<?php echo esc_url( admin_url() ); ?>"><?php esc_html_e('Bảng điều khiển','doan'); ?></a></li>
                                <?php endif; ?>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?php echo esc_url( wp_logout_url( home_url('/') ) ); ?>"><?php esc_html_e('Đăng xuất','doan'); ?></a></li>
                            </ul>
                        </div>
                    <?php else : ?>
                            <a href="<?php echo esc_url($account_url); ?>" class="btn btn-outline-secondary btn-sm" aria-label="<?php esc_attr_e('Đăng nhập tài khoản', 'doan'); ?>">
                            <i class="fas fa-user" aria-hidden="true"></i>
                            <span class="visually-hidden"><?php esc_html_e('Đăng nhập', 'doan'); ?></span>
                        </a>
                    <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>

    </header>

    <!-- Bootstrap Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content search-modal-content">
                <div class="modal-header search-modal-header">
                    <h5 class="modal-title search-modal-title" id="searchModalLabel">
                        <i class="fas fa-search me-2"></i><?php esc_html_e('Tìm kiếm', 'doan'); ?>
                    </h5>
                    <button type="button" class="btn-close search-modal-close" data-bs-dismiss="modal" aria-label="<?php esc_attr_e('Đóng tìm kiếm', 'doan'); ?>">
                        <i class="fas fa-times" aria-hidden="true"></i>
                        <span class="visually-hidden"><?php esc_html_e('Đóng', 'doan'); ?></span>
                </button>
            </div>
                <div class="modal-body search-modal-body">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <div class="search-form-group">
                            <label for="search-field" class="search-label"><?php esc_html_e('Tìm kiếm cho:', 'doan'); ?></label>
                            <div class="search-input-group">
                                <input type="search" 
                                       id="search-field" 
                                       class="search-field" 
                                       placeholder="<?php esc_attr_e('Tìm kiếm ...', 'doan'); ?>" 
                                       value="<?php echo get_search_query(); ?>" 
                                       name="s" 
                                       autocomplete="off"
                                       autofocus>
                                <button type="submit" class="search-submit" aria-label="<?php esc_attr_e('Thực hiện tìm kiếm', 'doan'); ?>">
                            <i class="fas fa-search" aria-hidden="true"></i>
                                    <span><?php esc_html_e('Tìm kiếm', 'doan'); ?></span>
                        </button>
        </div>
                        </div>
                    </form>
                    
                    <!-- Search Suggestions -->
                    <div class="search-suggestions">
                        <h6 class="suggestions-title"><?php esc_html_e('Tìm kiếm phổ biến:', 'doan'); ?></h6>
                        <div class="suggestion-tags">
                            <a href="<?php echo esc_url(home_url('/?s=tour+nhat+ban')); ?>" class="suggestion-tag" aria-label="<?php esc_attr_e('Tìm kiếm tour Nhật Bản', 'doan'); ?>">Tour Nhật Bản</a>
                            <a href="<?php echo esc_url(home_url('/?s=tour+tokyo')); ?>" class="suggestion-tag" aria-label="<?php esc_attr_e('Tìm kiếm tour Tokyo', 'doan'); ?>">Tour Tokyo</a>
                            <a href="<?php echo esc_url(home_url('/?s=tour+osaka')); ?>" class="suggestion-tag" aria-label="<?php esc_attr_e('Tìm kiếm tour Osaka', 'doan'); ?>">Tour Osaka</a>
                            <a href="<?php echo esc_url(home_url('/?s=tour+kyoto')); ?>" class="suggestion-tag" aria-label="<?php esc_attr_e('Tìm kiếm tour Kyoto', 'doan'); ?>">Tour Kyoto</a>
                            <a href="<?php echo esc_url(home_url('/?s=du+lich+nhat+ban')); ?>" class="suggestion-tag" aria-label="<?php esc_attr_e('Tìm kiếm du lịch Nhật Bản', 'doan'); ?>">Du lịch Nhật Bản</a>
            </div>
            </div>
        </div>
            </div>
        </div>
    </div>

  



    <?php if ( ! is_single() && ! is_search() && ! is_page('lich-khoi-hanh') && ! is_page('dang-ky-tu-van') 
    && ! is_page('hinh-anh-thuc-te')
    && ! is_page('kham-pha-nhat-ban')
    && ! is_page('tour-nhat-ban-mua-thu-2025')
    && ! is_page('tour-7-ngay-6-dem')
    && ! is_page('tour-6-ngay-5-dem')
    && ! is_page('tour-5-ngay-4-dem')
    && ! is_page_template('page-dang-ky-tu-van.php')  
    && ! is_page_template('page-tai-khoan.php') 
    && ! is_page('tai-khoan') 
     ) : ?>
      
        <section id="image-slider" class="image-slider-section">
            <?php
            $slides = new WP_Query(array(
                'post_type'      => 'slider',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => array('menu_order' => 'ASC', 'date' => 'DESC'),
            ));
            $slide_items = array();
            if ( $slides->have_posts() ) {
                while ( $slides->have_posts() ) { $slides->the_post();
                    $post_id = get_the_ID();
                    $title   = get_the_title();
                    $img_url = '';
                    $img_url = get_the_post_thumbnail_url($post_id, 'full');
                    if ( ! $img_url && function_exists('get_field') ) {
                        $acf_img = get_field('image', $post_id);
                        if (is_array($acf_img) && isset($acf_img['url'])) { $img_url = $acf_img['url']; }
                        elseif (is_string($acf_img)) { $img_url = $acf_img; }
                        if (! $img_url) {
                            $acf_img = get_field('slider_image', $post_id);
                            if (is_array($acf_img) && isset($acf_img['url'])) { $img_url = $acf_img['url']; }
                            elseif (is_string($acf_img)) { $img_url = $acf_img; }
                        }
                    }
                    if ( ! $img_url ) {
                        $meta_keys = array('image', 'slider_image', '_thumbnail_id');
                        foreach ($meta_keys as $k) {
                            $val = get_post_meta($post_id, $k, true);
                            if ($val) {
                                if (is_numeric($val)) { $img_url = wp_get_attachment_url(intval($val)); }
                                elseif (filter_var($val, FILTER_VALIDATE_URL)) { $img_url = $val; }
                            }
                            if ($img_url) break;
                        }
                    }
                    if ( ! $img_url ) {
                        $content = get_post_field('post_content', $post_id);
                        if ($content && preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $content, $m)) {
                            $img_url = esc_url_raw($m[1]);
                        }
                    }

    
                    if ( ! $img_url ) {
                        $attachments = get_children(array(
                            'post_parent'    => $post_id,
                            'post_type'      => 'attachment',
                            'post_mime_type' => 'image',
                            'numberposts'    => 1,
                            'orderby'        => 'menu_order ID',
                            'order'          => 'ASC',
                        ));
                        if ($attachments) {
                            $att = array_shift($attachments);
                            $img_url = wp_get_attachment_url($att->ID);
                        }
                    }

                    if ($img_url) {
                        $slide_items[] = array(
                            'title' => $title,
                            'img'   => $img_url,
                        );
                    }
                }
                wp_reset_postdata();
            }

            if ( ! empty($slide_items) ) :
                $slide_count = count($slide_items);
            ?>
            <div id="homeCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000" data-bs-pause="hover">
                <div class="carousel-indicators">
                    <?php for ($i = 0; $i < $slide_count; $i++) : ?>
                        <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="<?php echo esc_attr($i); ?>" class="<?php echo $i === 0 ? 'active' : ''; ?>" aria-current="<?php echo $i === 0 ? 'true' : 'false'; ?>" aria-label="<?php echo esc_attr(sprintf(__('Chuyển đến ảnh %d', 'doan'), $i + 1)); ?>"></button>
                    <?php endfor; ?>
                </div>
                <div class="carousel-inner">
                    <?php foreach ($slide_items as $index => $item) : ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <img src="<?php echo esc_url($item['img']); ?>" 
                                 class="d-block w-100" 
                                 alt="<?php echo esc_attr($item['title']); ?>"
                                 width="1920" 
                                 height="600"
                                 loading="<?php echo $index === 0 ? 'eager' : 'lazy'; ?>"
                                 <?php echo $index === 0 ? 'fetchpriority="high"' : ''; ?>>
                            <div class="carousel-caption d-none d-md-block">
                          
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev" aria-label="<?php esc_attr_e('Ảnh trước', 'doan'); ?>">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"><?php esc_html_e('Trước', 'doan'); ?></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next" aria-label="<?php esc_attr_e('Ảnh tiếp theo', 'doan'); ?>">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"><?php esc_html_e('Tiếp theo', 'doan'); ?></span>
                </button>
            </div>
            <?php else : ?>
                <div class="container"><p><?php esc_html_e('Chưa có slider nào được đăng hoặc thiếu ảnh.', 'doan'); ?></p></div>
            <?php endif; ?>
        </section>
    <?php endif; ?>

    <!-- ⚡ FONTAWESOME OPTIMIZATION SCRIPT -->
    <script>
    (function() {
        'use strict';
        try {
        
        // Optimize icon rendering for FontAwesome
        function optimizeIcons() {
            const icons = document.querySelectorAll('.fas, .far, .fab, .fa');
            icons.forEach(icon => {
                // Add performance optimizations
                icon.style.willChange = 'transform';
                icon.style.backfaceVisibility = 'hidden';
                icon.style.transform = 'translateZ(0)';
                icon.style.fontDisplay = 'swap';
                
                // Ensure proper font family
                if (icon.classList.contains('fab')) {
                    icon.style.fontFamily = '"Font Awesome 6 Brands"';
                } else {
                    icon.style.fontFamily = '"Font Awesome 6 Free"';
                }
            });
            
            console.log('FontAwesome icons optimized:', icons.length);
        }
        
        // Run optimizations when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', optimizeIcons);
        } else {
            optimizeIcons();
        }
        
        // Re-optimize after a short delay to ensure FontAwesome is loaded
        setTimeout(optimizeIcons, 500);
        
        } catch (error) {
            console.error('FontAwesome optimization error:', error);
        }
    })();
    </script>

    <div id="content" class="site-content">
