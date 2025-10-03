# Design System Documentation
## Du Lịch Việt Nhật - Premium Edition

### 🎨 Color Palette

#### Primary Colors
```css
--color-primary-500: #ef4444  /* Main Red */
--color-primary-600: #dc2626  /* Hover Red */
--color-primary-700: #b91c1c  /* Active Red */
```

#### Accent Colors
```css
--color-accent-500: #f97316   /* Orange */
--color-accent-600: #ea580c   /* Dark Orange */
```

#### Neutral Colors
```css
--color-gray-50: #f9fafb      /* Lightest */
--color-gray-100: #f3f4f6
--color-gray-200: #e5e7eb
--color-gray-300: #d1d5db
--color-gray-600: #4b5563
--color-gray-900: #111827     /* Darkest */
```

### 📐 Spacing System

Based on 4px increments:
```css
--space-1: 0.25rem   /* 4px */
--space-2: 0.5rem    /* 8px */
--space-3: 0.75rem   /* 12px */
--space-4: 1rem      /* 16px */
--space-6: 1.5rem    /* 24px */
--space-8: 2rem      /* 32px */
--space-12: 3rem     /* 48px */
--space-16: 4rem     /* 64px */
--space-20: 5rem     /* 80px */
```

### 🔤 Typography

#### Font Family
```css
font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
```

#### Font Sizes
```css
--font-size-xs: 0.75rem      /* 12px */
--font-size-sm: 0.875rem     /* 14px */
--font-size-base: 1rem       /* 16px */
--font-size-lg: 1.125rem     /* 18px */
--font-size-xl: 1.25rem      /* 20px */
--font-size-2xl: 1.5rem      /* 24px */
--font-size-3xl: 1.875rem    /* 30px */
--font-size-4xl: 2.25rem     /* 36px */
--font-size-5xl: 3rem        /* 48px */
```

#### Font Weights
```css
--font-weight-normal: 400
--font-weight-medium: 500
--font-weight-semibold: 600
--font-weight-bold: 700
--font-weight-extrabold: 800
--font-weight-black: 900
```

### 🖼️ Image Specifications

#### Card Images
- **Aspect Ratio**: 16:10 (1.6:1)
- **Recommended Sizes**:
  - Thumbnail: 680×425px
  - Medium: 1024×640px
  - Large: 1600×1000px
- **Format**: JPEG (quality 85%) or WebP
- **Object-fit**: cover (center positioned)

#### Hero Slider
- **Aspect Ratio**: 21:9 (cinematic)
- **Recommended Size**: 1920×823px
- **Format**: JPEG or WebP
- **Effect**: Ken Burns animation

### 🎭 Effects & Shadows

#### Shadow Levels
```css
--shadow-sm: 0 1px 3px rgba(0,0,0,0.1)
--shadow-base: 0 4px 6px rgba(0,0,0,0.1)
--shadow-md: 0 10px 15px rgba(0,0,0,0.1)
--shadow-lg: 0 20px 25px rgba(0,0,0,0.1)
--shadow-xl: 0 25px 50px rgba(0,0,0,0.25)
```

#### Border Radius
```css
--radius-sm: 0.375rem   /* 6px */
--radius-base: 0.5rem   /* 8px */
--radius-md: 0.75rem    /* 12px */
--radius-lg: 1rem       /* 16px */
--radius-xl: 1.5rem     /* 24px */
--radius-full: 9999px   /* Fully rounded */
```

### 🎬 Animations

#### Durations
```css
--transition-fast: 150ms
--transition-base: 250ms
--transition-slow: 350ms
--transition-smooth: 500ms
```

#### Easing Functions
```css
cubic-bezier(0.165, 0.84, 0.44, 1)  /* Smooth */
cubic-bezier(0.4, 0, 0.2, 1)        /* Standard */
```

### 🎴 Components

#### Card Structure
```html
<article class="post-card">
  <div class="post-thumbnail">
    <img src="image.jpg" alt="Title">
    <span class="category-tag">Category</span>
  </div>
  <div class="post-content">
    <h3 class="post-title">
      <a href="#">Title</a>
    </h3>
    <p class="post-excerpt">Description...</p>
    <div class="post-meta">
      <span><i class="fas fa-calendar"></i> Date</span>
      <span><i class="fas fa-eye"></i> Views</span>
    </div>
    <a href="#" class="read-more-btn">
      Read more <i class="fas fa-arrow-right"></i>
    </a>
  </div>
</article>
```

#### Button Variants
```html
<!-- Primary -->
<button class="btn btn-primary">Primary Button</button>

<!-- Secondary -->
<button class="btn btn-secondary">Secondary Button</button>

<!-- Outline -->
<button class="btn btn-outline">Outline Button</button>
```

### 📱 Responsive Breakpoints

```css
/* Mobile */
@media (max-width: 767px) { }

/* Tablet */
@media (min-width: 768px) and (max-width: 1023px) { }

/* Desktop */
@media (min-width: 1024px) { }

/* Large Desktop */
@media (min-width: 1280px) { }

/* Extra Large */
@media (min-width: 1536px) { }
```

### 🎯 Grid System

```css
.posts-grid,
.tours-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 32px;
}

/* Responsive */
@media (min-width: 768px) {
  grid-template-columns: repeat(2, 1fr);
}

@media (min-width: 1024px) {
  grid-template-columns: repeat(3, 1fr);
}
```

### ♿ Accessibility

#### Focus States
```css
:focus-visible {
  outline: 2px solid var(--color-primary-500);
  outline-offset: 2px;
}
```

#### Reduced Motion
```css
@media (prefers-reduced-motion: reduce) {
  * {
    animation-duration: 0.01ms !important;
    transition-duration: 0.01ms !important;
  }
}
```

### 🎨 Usage Examples

#### Creating a Card
```php
<article class="post-card">
  <div class="post-thumbnail">
    <?php the_post_thumbnail('large'); ?>
    <span class="category-tag">Travel</span>
  </div>
  <div class="post-content">
    <h3 class="post-title">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h3>
    <p class="post-excerpt">
      <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
    </p>
    <a href="<?php the_permalink(); ?>" class="read-more-btn">
      Read more <i class="fas fa-arrow-right"></i>
    </a>
  </div>
</article>
```

#### Custom Colors
```css
/* Override in your custom CSS */
:root {
  --color-primary-500: #your-color;
  --color-accent-500: #your-accent;
}
```

### 📋 Checklist for New Components

- [ ] Uses design system colors
- [ ] Follows spacing system
- [ ] Has hover/focus states
- [ ] Responsive on all breakpoints
- [ ] Accessible (ARIA, keyboard nav)
- [ ] Smooth animations
- [ ] Dark mode compatible (optional)
- [ ] Print-friendly styles

---

**Last Updated**: Version 2.1.0

