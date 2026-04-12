# KC Tennis Blast Theme Documentation

## Overview

The KC Tennis Blast theme is a custom WordPress block theme designed to support an editor-driven workflow. It allows content editors and designers to build and update pages using the WordPress Site Editor without modifying theme code.

The theme provides a consistent visual system, reusable layout components, and minimal custom functionality, while keeping content separate from presentation.

This documentation is intended to support developers and maintainers who may continue development or manage the theme in the future.

---

## Purpose of the Theme

This theme is designed to:

- provide a consistent visual identity across the site
- enable non-technical users to manage content using the WordPress editor
- separate layout (templates) from content (editor-managed blocks)
- support reuse across different WordPress sites
- include lightweight custom functionality where required (e.g. coaches carousel)

---

## Theme Approach

This theme follows a **block theme architecture**, meaning:

- templates are built using block markup (HTML-based templates)
- content is managed entirely through the block editor
- global styles are controlled via `theme.json`
- shared sections (header, footer) are reusable template parts

This approach reduces reliance on PHP and makes the theme easier to maintain and extend.

---

## Theme Structure

```text
kc-tennis-blast/
├── assets/
│   └── css/
│       └── editor.css              # Editor styling
├── inc/
│   └── jetpack.php                 # Optional compatibility
├── js/
│   └── coaches-carousel.js         # Custom carousel logic
├── parts/
│   ├── header.html                 # Site header
│   └── footer.html                 # Site footer
├── templates/
│   ├── front-page.html             # Homepage template
│   ├── page.html                   # Standard page template
│   ├── index.html                  # Fallback template
│   └── 404.html                    # Error page
├── functions.php                   # Theme setup and assets
├── style.css                       # Theme metadata + styles
└── theme.json                      # Global styles and settings
```

---

## Core Features

### Editor-Driven Content

All page content is managed through the WordPress editor. Templates only define layout structure, ensuring content is not hardcoded into the theme.

This allows designers and content editors to update pages without developer involvement.

---

### Global Styling (`theme.json`)

The theme uses `theme.json` to define:

- colour palette
- typography (fonts, sizes)
- layout widths
- spacing
- default block styles

This ensures consistency across all pages and allows site-wide changes without editing CSS.

---

### Reusable Template Parts

The theme includes reusable template parts:

#### Header
- site logo
- navigation menu
- call-to-action button

#### Footer
- contact information
- quick links
- social links

Changes to these files apply globally across all templates.

---

### Page Templates

The theme includes a minimal set of templates:

- `front-page.html` → homepage layout  
- `page.html` → standard content pages  
- `index.html` → fallback template  
- `404.html` → error page  

Templates are intentionally simple to prioritise flexibility in the editor.

---

### Coaches Carousel

The theme includes a custom JavaScript file:

`js/coaches-carousel.js`

This provides:

- slide switching on interaction  
- automatic rotation (interval-based)  
- safe execution when the component is not present  

This is the only custom interactive feature in the theme and is isolated for maintainability.

---

### Editor Styling

The theme includes `assets/css/editor.css` to improve visual consistency between:

- backend editor view  
- frontend display  

This helps content editors design pages more accurately.

---

### Typography

The theme uses external fonts:

- Inter (body text)  
- Alumni Sans (headings)  

Fonts are loaded via `functions.php` and integrated with `theme.json`.

---

## Design System

### Colours

Defined in `theme.json`:

- Background: `#e9e9e9`  
- Dark: `#111111`  
- Green: `#0f4f34`  
- Lime: `#c9ef2f`  
- White: `#ffffff`  

---

### Layout

- Content width: `1200px`  
- Wide width: `1400px`  

These values ensure consistent alignment across pages.

---

## Key Files Explained

### `theme.json`

Controls global styles and editor behaviour. This is the primary location for:

- colours  
- typography  
- spacing  
- layout  

Use this before adding custom CSS.

---

### `functions.php`

Handles:

- theme setup (block support, editor styles)  
- font loading  
- JavaScript enqueue (carousel)  

This file is intentionally minimal.

---

### `style.css`

Contains:

- theme metadata
- base styling  

Some starter-theme styles remain and may be cleaned up if required.

---

### `templates/*.html`

Define page structure using block markup.

These should not contain content, only layout.

---

### `parts/header.html` and `parts/footer.html`

Reusable structural components used across templates.

---

### `js/coaches-carousel.js`

Controls the coach slider behaviour.

Modify this file if carousel functionality needs to change.

---

## Key Design Decisions

### Editor-First Approach

The theme prioritises WordPress block editing so that content can be managed without modifying code.

This supports collaboration between developers and non-technical team members.

---

### Separation of Content and Presentation

Templates define structure only. All content is created and managed through the editor.

This ensures:

- reusability  
- flexibility  
- easier content updates  

---

## Working With This Theme

When making changes:

- Use the **Site Editor** for layout and content  
- Use `theme.json` for global design changes  
- Use `parts/` files for header/footer updates  
- Use `style.css` for additional styling if needed  
- Use `functions.php` only for functionality changes  
- Use `js/coaches-carousel.js` for carousel updates  

---

## Important Notes

- Do not hardcode content into templates  
- Avoid editing WordPress core files  
- Keep components reusable and modular  
- Maintain separation between content and structure  

---

## Maintenance Considerations

The theme is stable but includes some areas for future cleanup:

- remove unused starter-theme files if no longer required  
- update theme metadata in `style.css`  
- review `404.html` formatting if rendering issues occur  
- ensure unused PHP templates are removed if fully block-based  

---

## Summary

The KC Tennis Blast theme is a lightweight, editor-focused WordPress theme designed for maintainability and flexibility.

It combines:

- block-based templates  
- reusable layout components  
- centralised styling via `theme.json`  
- minimal custom functionality  
