@extends('layouts.landing')

@section('title', 'Video Tutorials & User Guides | ShreeSwarupOS Knowledge Base')
@section('meta_description', 'Step-by-step guides and video tutorials on setup, menu creation, order processing, POS configuration, and setting up digital QR codes with ShreeSwarupOS.')
@section('meta_keywords', 'ShreeSwarupOS tutorials, restaurant software guide, QR menu setup, POS help, restaurant management guides')

@section('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "name": "ShreeSwarupOS Tutorials & Guides",
  "description": "Step-by-step guides and tutorials for using ShreeSwarupOS restaurant management system.",
  "publisher": {
    "@type": "Organization",
    "name": "ShreeSwarupOS"
  }
}
</script>
@endsection

@section('content')
<style>
:root {
  --green: #00b692;
  --green-dark: #009c7d;
  --orange: #ff6b2c;
  --dark: #0f172a;
  --gray: #475569;
  --light: #f8fafc;
  --border: #e2e8f0;
  --white: #ffffff;
  --card: #ffffff;
  --purple-glow: rgba(139, 92, 246, 0.15);
}

html.dark {
  --dark: #f8fafc;
  --gray: #94a3b8;
  --light: #0f172a;
  --border: #1e293b;
  --white: #0b0f19;
  --card: #111827;
}

.tutorials-page {
  color: var(--dark);
  background: var(--white);
  font-family: 'Poppins', sans-serif;
}

/* ── HERO SECTION ── */
.tutorials-hero {
  background: linear-gradient(135deg, #0b0f19 0%, #0d2720 50%, #0c1a26 100%);
  padding: 80px 24px 70px;
  text-align: center;
  position: relative;
  overflow: hidden;
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.tutorials-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse at 20% 60%, rgba(0, 182, 146, 0.12) 0%, transparent 60%),
    radial-gradient(ellipse at 80% 30%, rgba(139, 92, 246, 0.1) 0%, transparent 60%);
  pointer-events: none;
}

.hero-title {
  font-size: clamp(28px, 4vw, 48px);
  font-weight: 800;
  color: #ffffff;
  margin-bottom: 16px;
  line-height: 1.2;
}

.hero-subtitle {
  color: rgba(255, 255, 255, 0.65);
  font-size: 16px;
  max-width: 600px;
  margin: 0 auto 32px;
}

/* ── SEARCH CONTAINER ── */
.search-wrapper {
  max-width: 580px;
  margin: 0 auto;
  position: relative;
}

.search-input {
  width: 100%;
  padding: 16px 20px 16px 52px;
  border-radius: 99px;
  background: rgba(255, 255, 255, 0.08);
  border: 1px solid rgba(255, 255, 255, 0.15);
  color: #fff;
  font-size: 15px;
  outline: none;
  backdrop-filter: blur(12px);
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
}

.search-input::placeholder {
  color: rgba(255, 255, 255, 0.4);
}

.search-input:focus {
  background: rgba(255, 255, 255, 0.12);
  border-color: var(--green);
  box-shadow: 0 0 0 4px rgba(0, 182, 146, 0.25), 0 4px 30px rgba(0, 0, 0, 0.2);
}

.search-icon-svg {
  position: absolute;
  left: 20px;
  top: 50%;
  transform: translateY(-50%);
  color: rgba(255, 255, 255, 0.45);
  pointer-events: none;
  transition: color 0.3s;
}

.search-wrapper:focus-within .search-icon-svg {
  color: #00b692;
}

/* ── CUSTOM ROW LAYOUT (Squeeze Proof Grid) ── */
.tutorials-layout {
  display: grid;
  grid-template-columns: 280px 1fr;
  gap: 32px;
  width: 100%;
}

@media (max-width: 1024px) {
  .tutorials-layout {
    grid-template-columns: 1fr;
    gap: 24px;
  }
}

/* ── SIDEBAR STYLING ── */
.category-sidebar {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 20px;
  padding: 24px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
  position: sticky;
  top: 90px;
  transition: all 0.3s ease;
  z-index: 10;
  color: var(--dark);
}

.sidebar-title {
  font-size: 20px;
  font-weight: 800;
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  gap: 10px;
  color: var(--dark);
}

.accordion-group {
  margin-bottom: 14px;
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid var(--border);
  background: var(--card);
}

.accordion-header {
  width: 100%;
  padding: 16px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-weight: 800;
  font-size: 13.5px;
  text-transform: uppercase;
  letter-spacing: 0.6px;
  background: var(--card);
  color: var(--dark);
  cursor: pointer;
  transition: all 0.2s ease;
  border: none;
  outline: none;
}

.accordion-header:hover {
  background: var(--light);
  color: #00b692;
}

.accordion-header.active {
  background: var(--card);
  color: var(--dark);
  border-bottom: 1px solid var(--border);
}

.accordion-icon {
  transition: transform 0.3s ease;
  color: var(--gray);
}

.accordion-header.active .accordion-icon {
  transform: rotate(180deg);
  color: #00b692;
}

.accordion-content {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s ease-out;
  background: var(--light);
}

.accordion-content.expanded {
  max-height: 500px;
}

.subcategory-list {
  padding: 12px 10px;
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.subcategory-btn {
  width: 100%;
  text-align: left;
  padding: 11px 16px;
  font-size: 12.5px;
  font-weight: 700;
  color: var(--gray);
  border-radius: 8px;
  transition: all 0.2s ease;
  background: transparent;
  border: none;
  outline: none;
  cursor: pointer;
  letter-spacing: 0.4px;
}

.subcategory-btn:hover {
  background: rgba(0, 182, 146, 0.1);
  color: #00b692;
  padding-left: 20px;
}

.subcategory-btn.active {
  background: rgba(0, 182, 146, 0.16);
  color: #00b692;
  font-weight: 800;
  padding-left: 20px;
  border-left: 3px solid #00b692;
}


/* ── GRID OF CARDS ── */
.tutorials-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
  gap: 24px;
  width: 100%;
}

/* ── PREMIUM CARDS ── */
.tutorial-card {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
  transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
  display: flex;
  flex-direction: column;
  cursor: pointer;
  position: relative;
  height: 100%;
}

.tutorial-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.07);
  border-color: rgba(0, 182, 146, 0.4);
}

/* Thumbnail Styling (CSS-Based Mockup to mirror exact user screenshots) */
.thumbnail-mockup {
  height: 185px;
  background: linear-gradient(135deg, #090d16 0%, #1a102f 100%);
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 16px 20px;
}

.thumbnail-mockup::before {
  content: '';
  position: absolute;
  inset: 0;
  background: 
    radial-gradient(circle at 10% 20%, rgba(255, 107, 44, 0.15) 0%, transparent 60%),
    radial-gradient(circle at 90% 80%, rgba(139, 92, 246, 0.2) 0%, transparent 60%);
  pointer-events: none;
}

.thumbnail-left {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  z-index: 1;
  width: 32%;
}

.thumbnail-logo-shield {
  width: 54px;
  height: 54px;
  background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%);
  border-radius: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 0 20px rgba(139, 92, 246, 0.4);
  border: 1px solid rgba(255, 255, 255, 0.15);
  margin-bottom: 8px;
  position: relative;
}

.thumbnail-logo-shield::after {
  content: 'T';
  color: #fff;
  font-size: 28px;
  font-weight: 900;
  font-family: 'Poppins', sans-serif;
  letter-spacing: -1px;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.thumbnail-device-frame {
  position: absolute;
  right: -5px;
  bottom: -25px;
  width: 95px;
  height: 165px;
  background: #111827;
  border: 3px solid #2d3748;
  border-top-left-radius: 14px;
  border-top-right-radius: 14px;
  box-shadow: -5px 0 25px rgba(0,0,0,0.4);
  overflow: hidden;
  z-index: 1;
}

.thumbnail-device-screen {
  width: 100%;
  height: 100%;
  background: linear-gradient(180deg, #1e1b4b 0%, #0f0b29 100%);
  padding: 10px 6px;
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.device-header {
  height: 4px;
  background: rgba(255,255,255,0.15);
  border-radius: 2px;
  margin-bottom: 4px;
}

.device-line {
  height: 5px;
  background: rgba(255,255,255,0.06);
  border-radius: 2px;
  width: 100%;
}

.device-line.highlight {
  background: linear-gradient(90deg, #8b5cf6, #3b82f6);
  height: 8px;
  width: 80%;
}

.device-card-item {
  height: 24px;
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.08);
  border-radius: 4px;
  padding: 3px;
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.device-box {
  width: 40%;
  height: 4px;
  background: #00b692;
  border-radius: 1px;
}

.thumbnail-right {
  flex: 1;
  padding-left: 10px;
  padding-right: 70px; /* Space for the device overlap */
  z-index: 2;
  text-align: left;
  display: flex;
  flex-direction: column;
  justify-content: center;
  height: 100%;
}

.thumbnail-tagline {
  color: #9ca3af;
  font-size: 10px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 4px;
}

.thumbnail-title {
  color: #fff;
  font-size: 15px;
  font-weight: 800;
  line-height: 1.25;
  margin-bottom: 10px;
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.thumbnail-title span.yellow-text {
  color: #f59e0b;
}

.thumbnail-badge {
  align-self: flex-start;
  background: linear-gradient(135deg, #00b692 0%, #009c7d 100%);
  color: #fff;
  font-size: 8px;
  font-weight: 700;
  padding: 3px 8px;
  border-radius: 4px;
  letter-spacing: 0.2px;
  box-shadow: 0 2px 6px rgba(0, 182, 146, 0.2);
}

/* Play button overlay on hover */
.play-overlay {
  position: absolute;
  inset: 0;
  background: rgba(17, 24, 39, 0.4);
  backdrop-filter: blur(2px);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s;
  z-index: 5;
}

.tutorial-card:hover .play-overlay {
  opacity: 1;
}

.play-btn-circle {
  width: 44px;
  height: 44px;
  background: #00b692;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  transform: scale(0.8);
  transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  box-shadow: 0 4px 15px rgba(0, 182, 146, 0.4);
}

.tutorial-card:hover .play-btn-circle {
  transform: scale(1);
}

/* Card details styling */
.card-details {
  padding: 20px;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.card-tag {
  align-self: flex-start;
  font-size: 10px;
  font-weight: 700;
  padding: 4px 10px;
  border-radius: 30px;
  margin-bottom: 12px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.tag-setup { background: rgba(99, 102, 241, 0.12); color: #6366f1; }
.tag-menu { background: rgba(59, 130, 246, 0.12); color: #3b82f6; }
.tag-pos { background: rgba(16, 185, 129, 0.12); color: #10b981; }
.tag-reports { background: rgba(239, 68, 68, 0.12); color: #ef4444; }

.card-title {
  font-size: 16px;
  font-weight: 700;
  color: var(--dark);
  margin-bottom: 8px;
  line-height: 1.35;
}

.card-description {
  font-size: 13px;
  color: var(--gray);
  line-height: 1.6;
  margin: 0;
}

</style>

<div class="tutorials-page">
  <!-- HERO -->
  <section class="tutorials-hero">
    <div class="max-w-4xl mx-auto">
      <h1 class="hero-title">TableTrack Tutorials</h1>
      <p class="hero-subtitle">Learn how to configure your restaurant, customize your digital menu, manage live orders, set up physical tables, and run POS billing in TableTrack.</p>
      
      <!-- Live Search Box -->
      <div class="search-wrapper">
        <svg class="search-icon-svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <input type="text" id="tutorial-search" class="search-input" placeholder="Search tutorials (e.g. POS, QR code, Menu)..." onkeyup="filterTutorials()">
      </div>
    </div>
  </section>

  <!-- CONTENT LAYOUT -->
  <section class="py-12 px-4 md:px-8 max-w-7xl mx-auto">
    <div class="tutorials-layout">
      
      <!-- Left sidebar: categories -->
      <div>
        <div class="category-sidebar">
          <h3 class="sidebar-title">
            <svg class="text-menutiger-green" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            Categories
          </h3>
          
          <button class="subcategory-btn active w-full mb-4 py-2.5 px-4 rounded-lg bg-emerald-500/10 text-emerald-500 font-semibold border border-emerald-500/20 text-center hover:bg-emerald-500/20 transition flex items-center justify-center gap-2" id="all-categories-btn" onclick="selectSubcategory('all', this)">
            View All Tutorials
          </button>

          <!-- PURE DYNAMIC ACCORDION CONTAINER -->
          <div id="dynamic-categories-accordion-wrapper">
            <div style="font-size:13px;color:var(--gray);padding:8px 0;">Loading categories...</div>
          </div>

        </div>
      </div>

      <!-- Right section: Grid of cards -->
      <div>
        <div class="tutorials-grid" id="tutorials-grid">
          <div id="tutorials-loader" style="grid-column:1/-1;text-align:center;padding:60px 0;color:var(--gray);font-size:14px;">
            <div style="width:36px;height:36px;margin:0 auto 12px;border:3px solid rgba(0,182,146,0.15);border-top-color:#00b692;border-radius:50%;animation:legalSpin 0.8s linear infinite;"></div>
            <style>@keyframes legalSpin { to { transform: rotate(360deg); } }</style>
            <div>Loading tutorials...</div>
          </div>
        </div>

        <!-- No Results state -->
        <div id="no-results" class="hidden text-center py-16">
          <div class="text-gray-400 dark:text-gray-600 mb-4">
            <svg class="mx-auto" width="56" height="56" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
          <h3 class="text-lg font-bold text-gray-700 dark:text-gray-300">No Tutorials Found</h3>
          <p class="text-gray-400 mt-1 text-sm">Add tutorials from the SuperAdmin Panel or try searching with other keywords.</p>
        </div>
      </div>

    </div>
  </section>
</div>

<script>
const API_BASE_URL = 'http://127.0.0.1:8000';

function mapTutorialsData(items) {
  const apiHost = window.TABLETRACK_CONFIG ? window.TABLETRACK_CONFIG.apiHost : 'http://127.0.0.1:8000';
  return items.map((item) => {
    let thumb = null;
    if (item.thumbnail) {
      thumb = item.thumbnail.startsWith('http') ? item.thumbnail : `${apiHost}/user-uploads/${item.thumbnail}`;
    }
    return {
      id: item.id,
      title: item.title,
      slug: item.slug,
      displayTitle: item.title,
      category: item.category ? (item.category.name ? item.category.name.toUpperCase() : "GENERAL") : "GENERAL",
      categorySlug: item.category ? item.category.slug : "all",
      subcategory: item.sub_category ? item.sub_category.slug : (item.category ? (item.category.slug || "all") : "all"),
      tag: item.sub_category ? item.sub_category.name : (item.category ? (item.category.name || "Tutorial") : "Tutorial"),
      tagClass: "tag-setup",
      description: item.short_description || item.full_description || "Tutorial details...",
      steps: item.full_description ? item.full_description.replace(/<[^>]*>?/gm, '').split("\n").filter(s => s.trim() !== "") : [item.short_description || "Follow on-screen steps."],
      videoTitle: item.video_title || item.title,
      videoDuration: item.video_duration || "1:30",
      thumbnailUrl: thumb
    };
  });
}

let tutorialsData = [];
let activeSubcategory = 'all';

// Initialize and fetch from API
function initTutorialsPage() {
  const apiHost = window.TABLETRACK_CONFIG ? window.TABLETRACK_CONFIG.apiHost : 'http://127.0.0.1:8000';

  // 1. Fetch Live Tutorials from TableTrack API
  fetch(`${apiHost}/api/v1/public/tutorials`)
    .then(res => res.json())
    .then(res => {
      if (res.success && res.data && res.data.length > 0) {
        tutorialsData = mapTutorialsData(res.data);
      } else {
        tutorialsData = [];
      }
      filterTutorials();
    }).catch(err => {
      console.warn('Live tutorials API offline or empty:', err);
      tutorialsData = [];
      filterTutorials();
    });

  // 2. Fetch Live Categories from TableTrack API
  fetch(`${apiHost}/api/v1/public/tutorials/categories`)
    .then(res => res.json())
    .then(res => {
      if (res.success && res.data && res.data.length > 0) {
        renderDynamicCategoriesAccordion(res.data);
      } else {
        const container = document.getElementById('dynamic-categories-accordion-wrapper');
        if (container) {
          container.innerHTML = '<div class="text-xs text-gray-400 p-4 text-center border border-dashed border-gray-700 rounded-lg">No Categories in Database.<br>Add Categories from SuperAdmin Panel.</div>';
        }
      }
    }).catch(err => {
      const container = document.getElementById('dynamic-categories-accordion-wrapper');
      if (container) {
        container.innerHTML = '<div class="text-xs text-gray-400 p-4 text-center border border-dashed border-gray-700 rounded-lg">No Categories in Database.</div>';
      }
    });
}

function renderDynamicCategoriesAccordion(categories) {
  const container = document.getElementById('dynamic-categories-accordion-wrapper');
  if (!container) return;

  if (!categories || categories.length === 0) {
    container.innerHTML = '<div class="text-xs text-gray-400 p-4 text-center border border-dashed border-gray-700 rounded-lg">No Categories in Database.<br>Add Categories from SuperAdmin Panel.</div>';
    return;
  }

  container.innerHTML = ''; // Replace with live DB categories

  categories.forEach((cat, index) => {
    const isFirst = index === 0;
    const groupDiv = document.createElement('div');
    groupDiv.className = 'accordion-group';

    // Main Category Header (collapsible)
    const headerBtn = document.createElement('button');
    headerBtn.className = `accordion-header ${isFirst ? 'active' : ''}`;
    headerBtn.onclick = function() { toggleAccordion(this); };
    headerBtn.innerHTML = `
      ${cat.name.toUpperCase()}
      <svg class="accordion-icon" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
        <path d="M19 9l-7 7-7-7"></path>
      </svg>
    `;

    // Sub Categories Content
    const contentDiv = document.createElement('div');
    contentDiv.className = `accordion-content ${isFirst ? 'expanded' : ''}`;
    if (isFirst) {
      contentDiv.style.maxHeight = '500px';
    }

    const subListDiv = document.createElement('div');
    subListDiv.className = 'subcategory-list';

    if (cat.sub_categories && cat.sub_categories.length > 0) {
      cat.sub_categories.forEach(sub => {
        const subBtn = document.createElement('button');
        subBtn.className = 'subcategory-btn';
        subBtn.onclick = function() { selectSubcategory(sub.slug, this); };
        subBtn.innerText = sub.name.toUpperCase();
        subListDiv.appendChild(subBtn);
      });
    } else {
      const catBtn = document.createElement('button');
      catBtn.className = 'subcategory-btn';
      catBtn.onclick = function() { selectSubcategory(cat.slug, this); };
      catBtn.innerText = `ALL ${cat.name.toUpperCase()}`;
      subListDiv.appendChild(catBtn);
    }

    contentDiv.appendChild(subListDiv);
    groupDiv.appendChild(headerBtn);
    groupDiv.appendChild(contentDiv);
    container.appendChild(groupDiv);
  });
}



if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initTutorialsPage);
} else {
  initTutorialsPage();
}



function renderCards(cards) {
  const grid = document.getElementById('tutorials-grid');
  const noResults = document.getElementById('no-results');
  if (!grid || !noResults) return;
  grid.innerHTML = '';
  
  if (cards.length === 0) {
    noResults.classList.remove('hidden');
    return;
  }
  
  noResults.classList.add('hidden');
  
  cards.forEach(card => {
    const cardEl = document.createElement('div');
    cardEl.className = 'tutorial-card';
    cardEl.onclick = () => window.location.href = `/tutorials/${card.slug}/`;
    
    let thumbHeaderHtml = '';
    if (card.thumbnailUrl) {
      thumbHeaderHtml = `
        <div style="position:relative;height:180px;overflow:hidden;border-radius:12px 12px 0 0;background:#0d1527;">
          <img src="${card.thumbnailUrl}" alt="${card.title}" style="width:100%;height:100%;object-fit:cover;" onerror="this.style.display='none'">
          <div class="play-overlay">
            <div class="play-btn-circle">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg>
            </div>
          </div>
        </div>
      `;
    } else {
      thumbHeaderHtml = `
        <div class="thumbnail-mockup">
          <div class="play-overlay">
            <div class="play-btn-circle">
              <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z"></path>
              </svg>
            </div>
          </div>
          
          <div class="thumbnail-device-frame">
            <div class="thumbnail-device-screen">
              <div class="device-header"></div>
              <div class="device-line highlight"></div>
              <div class="device-line" style="width: 50%;"></div>
              <div class="device-card-item">
                <div class="device-box" style="background:#8b5cf6;"></div>
                <div class="device-line" style="width: 70%; height: 3px;"></div>
              </div>
              <div class="device-card-item" style="background: rgba(0, 182, 146, 0.05); border-color: rgba(0, 182, 146, 0.2);">
                <div class="device-box" style="background:#00b692;"></div>
                <div class="device-line" style="width: 90%; height: 3px;"></div>
              </div>
              <div class="device-card-item">
                <div class="device-box" style="background:#ec4899;"></div>
                <div class="device-line" style="width: 50%; height: 3px;"></div>
              </div>
            </div>
          </div>

          <div class="thumbnail-left">
            <div class="thumbnail-logo-shield"></div>
          </div>

          <div class="thumbnail-right">
            <div class="thumbnail-tagline">How to ${card.tag} in</div>
            <div class="thumbnail-title">${card.displayTitle}</div>
            <div class="thumbnail-badge">TableTrack Tutorial</div>
          </div>
        </div>
      `;
    }
    
    cardEl.innerHTML = `
      ${thumbHeaderHtml}
      <div class="card-details">
        <span class="card-tag ${card.tagClass}">${card.tag}</span>
        <h3 class="card-title">${card.title}</h3>
        <p class="card-description">${card.description}</p>
      </div>
    `;
    
    grid.appendChild(cardEl);
  });
}

function renderDynamicCategoriesAccordion(categories) {
  const container = document.getElementById('dynamic-categories-accordion-wrapper');
  if (!container) return;

  if (!categories || categories.length === 0) {
    container.innerHTML = '<div class="text-xs text-gray-400 p-4 text-center border border-dashed border-gray-700 rounded-lg">No Categories in Database.<br>Add Categories from SuperAdmin Panel.</div>';
    return;
  }

  container.innerHTML = ''; // Replace with live DB categories

  categories.forEach((cat, index) => {
    const isFirst = index === 0;
    const groupDiv = document.createElement('div');
    groupDiv.className = 'accordion-group';

    // Main Category Header (collapsible)
    const headerBtn = document.createElement('button');
    headerBtn.className = `accordion-header ${isFirst ? 'active' : ''}`;
    headerBtn.onclick = function() { toggleAccordion(this); };
    headerBtn.innerHTML = `
      ${cat.name.toUpperCase()}
      <svg class="accordion-icon" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
        <path d="M19 9l-7 7-7-7"></path>
      </svg>
    `;

    // Sub Categories Content
    const contentDiv = document.createElement('div');
    contentDiv.className = `accordion-content ${isFirst ? 'expanded' : ''}`;
    if (isFirst) {
      contentDiv.style.maxHeight = '500px';
    }

    const subListDiv = document.createElement('div');
    subListDiv.className = 'subcategory-list';

    if (cat.sub_categories && cat.sub_categories.length > 0) {
      cat.sub_categories.forEach(sub => {
        const subBtn = document.createElement('button');
        subBtn.className = 'subcategory-btn';
        subBtn.onclick = function() { selectSubcategory(sub.slug, this); };
        subBtn.innerText = sub.name.toUpperCase();
        subListDiv.appendChild(subBtn);
      });
    } else {
      const catBtn = document.createElement('button');
      catBtn.className = 'subcategory-btn';
      catBtn.onclick = function() { selectSubcategory(cat.slug, this); };
      catBtn.innerText = `ALL ${cat.name.toUpperCase()}`;
      subListDiv.appendChild(catBtn);
    }

    contentDiv.appendChild(subListDiv);
    groupDiv.appendChild(headerBtn);
    groupDiv.appendChild(contentDiv);
    container.appendChild(groupDiv);
  });
}



if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initTutorialsPage);
} else {
  initTutorialsPage();
}


function normalizeSlug(str) {
  if (!str) return '';
  return str.toLowerCase().replace(/[^a-z0-9]/g, '');
}

// Filter tutorials by search keyword & subcategory
function filterTutorials() {
  const searchEl = document.getElementById('tutorial-search');
  const searchQuery = searchEl ? searchEl.value.toLowerCase() : '';
  const targetSubcatNorm = normalizeSlug(activeSubcategory);

  const filtered = tutorialsData.filter(tutorial => {
    const matchesSearch = !searchQuery || 
                          tutorial.title.toLowerCase().includes(searchQuery) || 
                          tutorial.description.toLowerCase().includes(searchQuery) ||
                          (tutorial.tag && tutorial.tag.toLowerCase().includes(searchQuery));
                          
    if (!matchesSearch) return false;

    if (activeSubcategory === 'all') return true;

    const tutSubcatNorm = normalizeSlug(tutorial.subcategory);
    const tutCatNorm = normalizeSlug(tutorial.categorySlug || tutorial.category);

    return tutSubcatNorm === targetSubcatNorm || 
           tutCatNorm === targetSubcatNorm ||
           tutSubcatNorm.includes(targetSubcatNorm) ||
           targetSubcatNorm.includes(tutSubcatNorm);
  });
  
  renderCards(filtered);
}


// Category Filtering logic
function selectSubcategory(subcat, element) {
  activeSubcategory = subcat;
  
  // Update active styling on subcategory buttons
  const buttons = document.querySelectorAll('.subcategory-btn');
  buttons.forEach(btn => btn.classList.remove('active'));
  
  if (element) {
    element.classList.add('active');
  }
  
  // Highlight View All button separately if selected
  const allBtn = document.getElementById('all-categories-btn');
  if (subcat === 'all') {
    allBtn.className = "subcategory-btn active w-full mb-4 py-2.5 px-4 rounded-lg bg-emerald-500/10 text-emerald-500 font-semibold border border-emerald-500/20 text-center hover:bg-emerald-500/20 transition flex items-center justify-center gap-2";
  } else {
    allBtn.className = "subcategory-btn w-full mb-4 py-2.5 px-4 rounded-lg bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-600 dark:text-gray-400 font-semibold text-center transition flex items-center justify-center gap-2";
  }

  filterTutorials();
}

// Accordion Collapsing / Expanding logic
function toggleAccordion(header) {
  const content = header.nextElementSibling;
  
  header.classList.toggle('active');
  content.classList.toggle('expanded');
  
  if (content.classList.contains('expanded')) {
    content.style.maxHeight = content.scrollHeight + "px";
  } else {
    content.style.maxHeight = "0px";
  }
}
</script>
@endsection
