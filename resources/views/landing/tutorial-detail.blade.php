@extends('layouts.landing')

@php
    $tutorialTitle = isset($dbTutorial) && $dbTutorial->title ? $dbTutorial->title : ucwords(str_replace('-', ' ', $slug));
    $tutorialDesc = isset($dbTutorial) && $dbTutorial->short_description ? strip_tags($dbTutorial->short_description) : 'Learn how to use ' . $tutorialTitle . ' on ShreeSwarupOS restaurant management system.';
@endphp

@section('title', $tutorialTitle . ' - ShreeSwarupOS Tutorial')
@section('meta_description', $tutorialDesc)
@section('meta_keywords', strtolower($tutorialTitle) . ', ShreeSwarupOS tutorial, restaurant management guide')

@section('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "TechArticle",
      "headline": "{{ addslashes($tutorialTitle) }}",
      "description": "{{ addslashes($tutorialDesc) }}",
      "publisher": {
        "@type": "Organization",
        "name": "ShreeSwarupOS"
      }
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "{{ url('/') }}"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Tutorials",
          "item": "{{ route('landing.tutorials') }}"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "{{ addslashes($tutorialTitle) }}"
        }
      ]
    }
  ]
}
</script>
@endsection

@section('content')
<style>
:root {
  --green: #00b692;
  --green-dark: #009c7d;
  --orange: #ff6b2c;
  --dark: #111827;
  --gray: #6b7280;
  --light: #f8fafc;
  --border: #e5e7eb;
  --white: #ffffff;
  --card: #ffffff;
}

html.dark {
  --dark: #f3f4f6;
  --gray: #9ca3af;
  --light: #111827;
  --border: #374151;
  --white: #111827;
  --card: #1f2937;
}

.tutorial-detail-page {
  color: var(--dark);
}

/* ── HERO BANNER ── */
.detail-hero {
  background: linear-gradient(135deg, #0b0f19 0%, #0d2720 50%, #0c1a26 100%);
  padding: 60px 24px;
  position: relative;
  overflow: hidden;
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

.detail-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse at 20% 60%, rgba(0, 182, 146, 0.12) 0%, transparent 60%),
    radial-gradient(ellipse at 80% 30%, rgba(139, 92, 246, 0.1) 0%, transparent 60%);
  pointer-events: none;
}

.breadcrumb {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
  color: rgba(255, 255, 255, 0.5);
  margin-bottom: 16px;
}

.breadcrumb a {
  color: rgba(255, 255, 255, 0.7);
  text-decoration: none;
  transition: color 0.2s;
}

.breadcrumb a:hover {
  color: var(--green);
}

.detail-hero-title {
  font-size: clamp(24px, 3.5vw, 36px);
  font-weight: 800;
  color: #ffffff;
  margin-bottom: 12px;
  line-height: 1.25;
}

.detail-hero-badge {
  display: inline-block;
  background: linear-gradient(135deg, #00b692 0%, #009c7d 100%);
  color: #fff;
  font-size: 11px;
  font-weight: 700;
  padding: 4px 12px;
  border-radius: 30px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  box-shadow: 0 2px 6px rgba(0, 182, 146, 0.25);
}

/* ── LAYOUT GRID ── */
.detail-layout {
  display: grid;
  grid-template-columns: 300px 1fr;
  gap: 40px;
  width: 100%;
}

@media (max-width: 1024px) {
  .detail-layout {
    grid-template-columns: 1fr;
    gap: 32px;
  }
}

/* ── SIDEBAR NAV ── */
.detail-sidebar {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 16px;
  padding: 24px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
  position: sticky;
  top: 90px;
  align-self: start;
}

.sidebar-heading {
  font-size: 15px;
  font-weight: 750;
  color: var(--dark);
  margin-bottom: 16px;
  padding-bottom: 12px;
  border-bottom: 1px solid var(--border);
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.sidebar-links-list {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.sidebar-tutorial-link {
  display: flex;
  flex-direction: column;
  padding: 10px 14px;
  border-radius: 8px;
  text-decoration: none;
  background: transparent;
  color: var(--gray);
  border: 1px solid transparent;
  transition: all 0.2s;
  text-align: left;
}

.sidebar-tutorial-link:hover {
  background: var(--light);
  color: var(--green);
}

.sidebar-tutorial-link.active {
  background: rgba(0, 182, 146, 0.08);
  border-color: rgba(0, 182, 146, 0.25);
  color: var(--green);
  font-weight: 600;
}

.sidebar-link-title {
  font-size: 13px;
  line-height: 1.4;
}

.sidebar-link-tag {
  font-size: 9px;
  text-transform: uppercase;
  margin-top: 4px;
  font-weight: 700;
  letter-spacing: 0.2px;
}

/* ── MAIN CONTENT ── */
.detail-main-content {
  background: var(--card);
  border: 1px solid var(--border);
  border-radius: 16px;
  padding: 32px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
}

.tutorial-meta-desc {
  font-size: 15px;
  color: var(--gray);
  line-height: 1.7;
  margin-bottom: 32px;
}

/* Video Player Simulation */
.video-player-container {
  margin-bottom: 40px;
}

.video-player-mockup {
  border-radius: 16px;
  overflow: hidden;
  background: #000;
  position: relative;
  aspect-ratio: 16/9;
  box-shadow: 0 8px 30px rgba(0,0,0,0.15);
  border: 1px solid var(--border);
}

.video-screen {
  width: 100%;
  height: 100%;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #0d0e15 0%, #191b2b 100%);
}

.video-glow {
  position: absolute;
  width: 150px;
  height: 150px;
  background: radial-gradient(circle, rgba(139, 92, 246, 0.25) 0%, transparent 70%);
}

.video-play-indicator {
  z-index: 2;
  width: 64px;
  height: 64px;
  border-radius: 50%;
  background: rgba(0, 182, 146, 0.9);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  cursor: pointer;
  box-shadow: 0 0 20px rgba(0, 182, 146, 0.5);
  transition: transform 0.2s, background 0.2s;
}

.video-play-indicator:hover {
  transform: scale(1.1);
  background: #00b692;
}

.video-title-overlay {
  position: absolute;
  top: 18px;
  left: 20px;
  font-size: 12px;
  color: rgba(255, 255, 255, 0.7);
  font-weight: 600;
  z-index: 10;
}

.video-controls {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(0deg, rgba(0,0,0,0.9) 0%, transparent 100%);
  padding: 16px 18px;
  display: flex;
  flex-direction: column;
  gap: 8px;
  opacity: 0.95;
  z-index: 10;
}

.video-progress-bar {
  height: 4px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 2px;
  position: relative;
  overflow: hidden;
  cursor: pointer;
}

.video-progress-fill {
  width: 0%;
  height: 100%;
  background: #00b692;
  border-radius: 2px;
  transition: width 0.1s linear;
}

.video-control-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #fff;
  font-size: 12px;
}

.video-control-left {
  display: flex;
  align-items: center;
  gap: 16px;
}

/* Steps list styling */
.steps-container {
  margin-top: 36px;
}

.steps-heading {
  font-size: 18px;
  font-weight: 800;
  color: var(--dark);
  margin-bottom: 24px;
  display: flex;
  align-items: center;
  gap: 8px;
  padding-bottom: 10px;
  border-bottom: 1px solid var(--border);
}

.step-item {
  display: flex;
  gap: 16px;
  align-items: flex-start;
  margin-bottom: 20px;
}

.step-number {
  width: 26px;
  height: 26px;
  background: rgba(0, 182, 146, 0.12);
  border: 1.5px solid rgba(0, 182, 146, 0.25);
  border-radius: 50%;
  color: #00b692;
  font-size: 12px;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  margin-top: 2px;
}

.step-text {
  font-size: 14.5px;
  color: var(--gray);
  line-height: 1.7;
  margin: 0;
}

.back-btn-wrapper {
  margin-top: 40px;
  padding-top: 20px;
  border-top: 1px solid var(--border);
}

.btn-back-tutorials {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  color: var(--gray);
  text-decoration: none;
  font-size: 14px;
  font-weight: 600;
  transition: color 0.2s;
}

.btn-back-tutorials:hover {
  color: var(--green);
}
</style>

<div class="tutorial-detail-page">
  <!-- HERO BANNER -->
  <section class="detail-hero">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
      <div class="breadcrumb">
        <a href="/">Home</a>
        <span>&rsaquo;</span>
        <a href="/tutorials">Tutorials</a>
        <span>&rsaquo;</span>
        <span id="breadcrumb-current" style="color: #fff;">Setup</span>
      </div>
      
      <span class="detail-hero-badge" id="tutorial-badge">Setup</span>
      <h1 class="detail-hero-title" id="tutorial-title">Tutorial Title</h1>
    </div>
  </section>

  <!-- MAIN BODY LAYOUT -->
  <section class="py-12 px-4 md:px-8 max-w-7xl mx-auto">
    <div class="detail-layout">
      
      <!-- Left sidebar: Other related tutorials -->
      <div>
        <div class="detail-sidebar">
          <h3 class="sidebar-heading">Related Tutorials</h3>
          <div class="sidebar-links-list" id="sidebar-related-links">
            <!-- Populated by JS -->
          </div>
        </div>
      </div>

      <!-- Right section: Main detailed view -->
      <div>
        <div class="detail-main-content">
          <p class="tutorial-meta-desc" id="tutorial-desc">Tutorial description here...</p>
          
          <!-- Video Player Container -->
          <div class="video-player-container">
            <div id="youtube-iframe-wrapper" class="video-player-mockup" style="display: none; aspect-ratio: 16/9; width: 100%;">
            </div>
            <div id="mockup-video-wrapper" class="video-player-mockup">
              <div class="video-screen">
                <div class="video-title-overlay" id="video-overlay-title">Tutorial Video Preview</div>
                <div class="video-glow"></div>
                <div class="video-play-indicator" onclick="simulateVideoPlay()">
                  <svg id="video-play-icon" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"></path>
                  </svg>
                </div>
                
                <div class="video-controls">
                  <div class="video-progress-bar" onclick="clickProgress(event)">
                    <div id="video-progress-fill" class="video-progress-fill"></div>
                  </div>
                  <div class="video-control-row">
                    <div class="video-control-left">
                      <span id="video-play-btn" style="cursor:pointer;" onclick="simulateVideoPlay()">▶</span>
                      <span id="video-time">0:00 / 0:00</span>
                    </div>
                    <div>1080p HD</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Step by Step Instructions -->
          <div class="steps-container">
            <h4 class="steps-heading">
              <svg class="text-emerald-500" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
              </svg>
              Step-by-step Setup Guide
            </h4>
            <div id="steps-list-container" class="space-y-4">
              <!-- Populated by JS -->
            </div>
          </div>

          <div class="back-btn-wrapper">
            <a href="/tutorials" class="btn-back-tutorials">
              <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
              </svg>
              Back to All Tutorials
            </a>
          </div>

        </div>
      </div>

    </div>
  </section>
</div>

<script>
// Tutorial data will be fetched dynamically from API
const serverTutorial = null; // loaded via API fetch below
const serverRelated = [];    // loaded via API fetch below
const fallbackTutorialsData = [

  {
    id: 1,
    title: "How to Setup Restaurant Profile",
    slug: "how-to-setup-restaurant-profile",
    category: "SETUP",
    subcategory: "REST_SETTINGS",
    tag: "Setup",
    tagClass: "tag-setup",
    description: "Configure your restaurant details, business hours, default currencies, tax rates, and upload your brand logo.",
    steps: [
      "Navigate to the <b>Superadmin / Restaurant Settings</b> panel.",
      "Fill in your restaurant details: name, phone, address, and select timezone.",
      "Upload your restaurant logo and choose a custom theme color.",
      "Configure your standard business operation hours (opening and closing timings).",
      "Set your default tax configuration (GST / VAT rates) and click <b>Save Settings</b>."
    ],
    videoTitle: "How to Setup Restaurant Profile in TableTrack?",
    videoDuration: "1:40"
  },
  {
    id: 2,
    title: "How to Add Tables & Generate QR Codes",
    slug: "how-to-add-tables-generate-qr-codes",
    category: "SETUP",
    subcategory: "TABLES_QR",
    tag: "Setup",
    tagClass: "tag-setup",
    description: "Add physical tables to your restaurant layout, map them, and generate downloadable QR codes for contactless dining.",
    steps: [
      "Select <b>Table Management</b> from the admin dashboard sidebar.",
      "Click on <b>+ Add Table</b> and specify details: Table Name/Number and seating capacity.",
      "Select the specific area or room mapping (e.g. Rooftop, Indoor, Garden).",
      "Click <b>Generate QR</b> to create custom dine-in QR codes.",
      "Download and print the QR files. Customers can scan these to browse your menu and order."
    ],
    videoTitle: "How to Generate Table QR Codes in TableTrack?",
    videoDuration: "1:25"
  },
  {
    id: 3,
    title: "How to Manage Staff & Waiters",
    slug: "how-to-manage-staff-waiters",
    category: "SETUP",
    subcategory: "STAFF",
    tag: "Setup",
    tagClass: "tag-setup",
    description: "Add waiters, managers, and delivery staff. Track active waiter requests and table assignments.",
    steps: [
      "Go to the <b>Staff Management</b> section on your admin dashboard.",
      "Tap on <b>+ Add Staff</b> and enter their name, contact details, and secure login PIN.",
      "Select their job role type: Waiter, Chef, Manager, or Delivery Executive.",
      "Assign specific table areas to waiters to optimize service delivery.",
      "Track staff attendance and real-time customer table service requests."
    ],
    videoTitle: "How to Manage Staff & Waiters in TableTrack?",
    videoDuration: "1:55"
  },
  {
    id: 4,
    title: "How to Create Menu Categories",
    slug: "how-to-create-menu-categories",
    category: "MENU",
    subcategory: "MENU_CAT",
    tag: "Menu",
    tagClass: "tag-menu",
    description: "Organize your food menu by creating structural categories (e.g. Starters, Main Course, Drinks).",
    steps: [
      "Go to the <b>Menu Manager</b> and click on <b>Categories</b>.",
      "Tap on <b>+ Add Category</b> at the top right header.",
      "Enter the category name (e.g. Desserts) and upload a category thumbnail icon.",
      "Toggle category visibility (Active / Inactive status).",
      "Click <b>Save</b>. You can now drag and drop categories to reorder their layout."
    ],
    videoTitle: "How to Create Menu Categories in TableTrack?",
    videoDuration: "1:15"
  },
  {
    id: 5,
    title: "How to Add Menu Items",
    slug: "how-to-add-menu-items",
    category: "MENU",
    subcategory: "MENU_ITEMS",
    tag: "Menu",
    tagClass: "tag-menu",
    description: "Add dish names, descriptions, base prices, tax rates, food tags, and upload eye-catching product images.",
    steps: [
      "Open <b>Menu Manager -> Item List</b>.",
      "Click on <b>+ Add Item</b> and select its category (e.g., Beverages).",
      "Input the dish name, description, base price, and applicable tax rate.",
      "Toggle tags like Veg, Non-Veg, Egg, Gluten-Free, or Chef Special.",
      "Upload high-quality photos of the dish and tap <b>Save Item</b> to publish it to your QR menu."
    ],
    videoTitle: "How to Add Menu Items in TableTrack?",
    videoDuration: "2:05"
  },
  {
    id: 6,
    title: "How to Add Modifier Groups",
    slug: "how-to-add-modifier-groups",
    category: "MENU",
    subcategory: "MENU_MODS",
    tag: "Menu",
    tagClass: "tag-menu",
    description: "Create customizable add-ons (e.g., extra toppings, size choices) to let customers customize their orders.",
    steps: [
      "Navigate to the <b>Modifiers</b> master configuration tab.",
      "Tap <b>+ Add Modifier Group</b> (e.g., Pizza Toppings, Coffee Size).",
      "Add individual modifier options, specifying name and additional price (e.g. Extra Cheese +$1.50).",
      "Select selection limits: Single Choice (Radio) or Multiple Choice (Checkbox).",
      "Map this modifier group to specific menu items and click <b>Save</b>."
    ],
    videoTitle: "How to Setup Menu Modifiers in TableTrack?",
    videoDuration: "1:45"
  },
  {
    id: 7,
    title: "How to Place Order via POS",
    slug: "how-to-place-order-via-pos",
    category: "POS",
    subcategory: "POS_SYSTEM",
    tag: "POS",
    tagClass: "tag-pos",
    description: "Take walk-in or phone orders, select table mapping, customize items in the cart, and process checks.",
    steps: [
      "Open the **POS screen** from your billing terminal.",
      "Select the order type: Dine-In, Takeaway, or Delivery.",
      "Select a table number from the interactive visual table map.",
      "Click on menu items to add them to the cart. Click item details to add custom modifiers.",
      "Select the customer profile, apply discount vouchers, and tap <b>Place Order</b>."
    ],
    videoTitle: "How to Place Orders via POS Billing in TableTrack?",
    videoDuration: "2:20"
  },
  {
    id: 8,
    title: "How to Manage KOT (Kitchen Orders)",
    slug: "how-to-manage-kot-kitchen-orders",
    category: "POS",
    subcategory: "KOT",
    tag: "POS",
    tagClass: "tag-pos",
    description: "Send orders to the kitchen instantly, print Kitchen Order Tickets, and track preparation status.",
    steps: [
      "When a POS or QR code order is placed, it generates a Kitchen Order Ticket (KOT) automatically.",
      "The KOT details are sent directly to the **Kitchen Display System (KDS)** or printed on the kitchen thermal printer.",
      "Kitchen staff can view preparation details, modifications, and elapsed time.",
      "Once prepared, click **Mark as Ready** to notify the server to pick up and serve the dish."
    ],
    videoTitle: "How to Manage Kitchen KOTs in TableTrack?",
    videoDuration: "1:30"
  },
  {
    id: 9,
    title: "How to Manage Table Reservations",
    slug: "how-to-manage-table-reservations",
    category: "POS",
    subcategory: "RESERVATIONS",
    tag: "POS",
    tagClass: "tag-pos",
    description: "Record advance table bookings, manage customer details, assign tables, and track reservation timelines.",
    steps: [
      "Go to the **Bookings & Reservations** tab in the main sidebar.",
      "Click on **+ New Booking** and enter guest details: Name, Mobile, and Date/Time.",
      "Select the table(s) to hold for the booking slot.",
      "Save the reservation. The interactive table map will block the selected tables for the slot.",
      "When the guest arrives, mark their status as **Seated** to automatically open a billing session."
    ],
    videoTitle: "How to Book Table Reservations in TableTrack?",
    videoDuration: "1:50"
  },
  {
    id: 10,
    title: "How to Export Sales Reports",
    slug: "how-to-export-sales-reports",
    category: "REPORTS",
    subcategory: "REPORTS",
    tag: "Reports",
    tagClass: "tag-reports",
    description: "Analyze restaurant revenue performance, track daily sales, check payment modes, and download statements.",
    steps: [
      "Access the **Reports Dashboard** from the bottom menu list.",
      "Choose a specific report category: Order Report, Payment Mode Report, or Staff Commission Report.",
      "Set your start date and end date filters for the transaction statement.",
      "Check total gross revenue, tax collections, discount amounts, and net earnings.",
      "Click the **Excel** or **PDF** button at the top header to save or email the statement."
    ],
    videoTitle: "How to Export and Analyze Sales Reports in TableTrack?",
    videoDuration: "1:58"
  },
  {
    id: 11,
    title: "How to Upgrade Package Plans",
    slug: "how-to-upgrade-package-plans",
    category: "REPORTS",
    subcategory: "BILLING",
    tag: "Reports",
    tagClass: "tag-reports",
    description: "View current subscription package details, manage payments, and upgrade to premium plans.",
    steps: [
      "Go to your restaurant's **Billing Dashboard**.",
      "View your current subscription package details, expiry date, and limit usages.",
      "Click on **Upgrade Plan** to browse available standard, pro, or premium enterprise plans.",
      "Choose your billing cycle (Monthly or Annual billing options).",
      "Process the subscription renewal payment securely using credit card, stripe, or razorpay."
    ],
    videoTitle: "How to Upgrade Subscription Packages in TableTrack?",
    videoDuration: "1:20"
  }
];

// Active tutorial slug
const activeSlug = "{{ $slug }}";

function getYouTubeEmbedUrl(url) {
  if (!url) return null;
  let videoId = null;
  const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
  const match = url.match(regExp);
  if (match && match[2] && match[2].length === 11) {
    videoId = match[2];
  } else {
    const shortsMatch = url.match(/shorts\/([a-zA-Z0-9_-]{11})/);
    if (shortsMatch) videoId = shortsMatch[1];
  }
  return videoId ? `https://www.youtube.com/embed/${videoId}?autoplay=0&rel=0` : null;
}

document.addEventListener('DOMContentLoaded', async () => {
  let tutorial = null;

  // Try API fetch first
  try {
    const slugToFetch = activeSlug.includes('{{') ? window.location.pathname.split('/').filter(Boolean).pop() : activeSlug;
    const res = await fetch(`http://127.0.0.1:8000/api/v1/public/tutorials/${slugToFetch}`);
    if (res.ok) {
      const apiData = await res.json();
      if (apiData.success && apiData.data) {
        const t = apiData.data;
        tutorial = {
          id: t.id,
          title: t.title,
          slug: t.slug,
          category: t.category ? t.category.name.toUpperCase() : "GENERAL",
          tag: t.category ? t.category.name : "Tutorial",
          tagClass: "tag-setup",
          description: t.short_description || t.full_description || "Tutorial details...",
          steps: t.full_description ? t.full_description.split("\n").filter(s => s.trim() !== "") : [t.short_description || "Follow on-screen instructions."],
          videoTitle: t.video_title || t.title,
          videoDuration: t.video_duration || "1:30",
          youtubeUrl: t.youtube_url || null
        };
      }
    }
  } catch (err) {
    console.warn('API fetch failed, falling back', err);
  }

  if (!tutorial) {
    if (typeof serverTutorial !== 'undefined' && serverTutorial) {
      tutorial = {
        id: serverTutorial.id,
        title: serverTutorial.title,
        slug: serverTutorial.slug,
        category: serverTutorial.category ? serverTutorial.category.name.toUpperCase() : "GENERAL",
        tag: serverTutorial.category ? serverTutorial.category.name : "Tutorial",
        tagClass: "tag-setup",
        description: serverTutorial.short_description || serverTutorial.full_description || "Tutorial details...",
        steps: serverTutorial.full_description ? serverTutorial.full_description.split("\n").filter(s => s.trim() !== "") : [serverTutorial.short_description || "Follow on-screen instructions."],
        videoTitle: serverTutorial.video_title || serverTutorial.title,
        videoDuration: serverTutorial.video_duration || "1:30",
        youtubeUrl: serverTutorial.youtube_url || null
      };
    } else {
      tutorial = fallbackTutorialsData.find(t => t.slug === activeSlug) || fallbackTutorialsData[0];
    }
  }

  renderTutorialDetails(tutorial);
  renderRelatedLinks(tutorial);
});


function renderTutorialDetails(tutorial) {
  // Update header text fields
  document.getElementById('tutorial-title').innerText = tutorial.title;
  document.getElementById('breadcrumb-current').innerText = tutorial.title;
  document.getElementById('tutorial-badge').innerText = tutorial.tag;
  document.getElementById('tutorial-badge').className = `detail-hero-badge ${tutorial.tagClass}`;
  
  // Update description
  document.getElementById('tutorial-desc').innerHTML = tutorial.description;

  // Handle YouTube Video vs Mockup Player
  const embedUrl = getYouTubeEmbedUrl(tutorial.youtubeUrl);
  const ytWrapper = document.getElementById('youtube-iframe-wrapper');
  const mockupWrapper = document.getElementById('mockup-video-wrapper');

  if (embedUrl && ytWrapper) {
    ytWrapper.style.display = 'block';
    if (mockupWrapper) mockupWrapper.style.display = 'none';
    ytWrapper.innerHTML = `
      <iframe src="${embedUrl}" title="${tutorial.title}" 
        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
        allowfullscreen style="width: 100%; height: 100%; aspect-ratio: 16/9; border-radius: 16px;">
      </iframe>`;
  } else {
    if (ytWrapper) ytWrapper.style.display = 'none';
    if (mockupWrapper) mockupWrapper.style.display = 'block';
    
    // Update video player titles
    document.getElementById('video-overlay-title').innerText = tutorial.videoTitle || tutorial.title;
    
    // Set duration
    const parts = (tutorial.videoDuration || "1:30").split(':');
    currentVideoDurationSec = (parseInt(parts[0] || 0) * 60) + parseInt(parts[1] || 0);
    videoCurrentSec = 0;
    currentPlayState = false;
    
    document.getElementById('video-progress-fill').style.width = '0%';
    document.getElementById('video-time').innerText = `0:00 / ${tutorial.videoDuration || "1:30"}`;
    document.getElementById('video-play-btn').innerText = '▶';
    document.getElementById('video-play-icon').innerHTML = '<path d="M8 5v14l11-7z"></path>';
    clearInterval(playbackTimer);
  }
  
  // Populate steps list
  const stepsList = document.getElementById('steps-list-container');
  stepsList.innerHTML = '';
  (tutorial.steps || []).forEach((step, idx) => {
    const stepEl = document.createElement('div');
    stepEl.className = 'step-item';
    stepEl.innerHTML = `
      <span class="step-number">${idx + 1}</span>
      <p class="step-text">${step}</p>
    `;
    stepsList.appendChild(stepEl);
  });
}

function renderRelatedLinks(activeTutorial) {
  const relatedContainer = document.getElementById('sidebar-related-links');
  relatedContainer.innerHTML = '';

  let relatedList = [];
  if (serverRelated && serverRelated.length > 0) {
    relatedList = serverRelated.map(t => ({
      title: t.title,
      slug: t.slug,
      tag: t.category ? t.category.name : 'Tutorial'
    }));
  } else {
    relatedList = fallbackTutorialsData.filter(t => t.category === activeTutorial.category);
  }

  relatedList.forEach(t => {
    const link = document.createElement('a');
    link.href = `/tutorials/${t.slug}/`;
    link.className = `sidebar-tutorial-link ${t.slug === activeTutorial.slug ? 'active' : ''}`;
    
    link.innerHTML = `
      <span class="sidebar-link-title">${t.title}</span>
      <span class="sidebar-link-tag text-emerald-500">${t.tag || 'Tutorial'}</span>
    `;
    
    relatedContainer.appendChild(link);
  });
}


// ── VIDEO PLAYBACK SIMULATION STATE ──
let playbackTimer = null;
let currentPlayState = false;
let currentVideoDurationSec = 90; 
let videoCurrentSec = 0;

function simulateVideoPlay() {
  currentPlayState = !currentPlayState;
  
  const playBtn = document.getElementById('video-play-btn');
  const playIcon = document.getElementById('video-play-icon');
  
  if (currentPlayState) {
    playBtn.innerText = '⏸';
    playIcon.innerHTML = '<path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"></path>'; // Pause icon
    
    playbackTimer = setInterval(() => {
      videoCurrentSec++;
      if (videoCurrentSec >= currentVideoDurationSec) {
        videoCurrentSec = 0;
      }
      
      const pct = (videoCurrentSec / currentVideoDurationSec) * 100;
      document.getElementById('video-progress-fill').style.width = `${pct}%`;
      
      const curMin = Math.floor(videoCurrentSec / 60);
      const curSec = String(videoCurrentSec % 60).padStart(2, '0');
      const totMin = Math.floor(currentVideoDurationSec / 60);
      const totSec = String(currentVideoDurationSec % 60).padStart(2, '0');
      
      document.getElementById('video-time').innerText = `${curMin}:${curSec} / ${totMin}:${totSec}`;
    }, 1000);
  } else {
    playBtn.innerText = '▶';
    playIcon.innerHTML = '<path d="M8 5v14l11-7z"></path>'; // Play icon
    clearInterval(playbackTimer);
  }
}

function clickProgress(e) {
  const bar = e.currentTarget;
  const rect = bar.getBoundingClientRect();
  const clickX = e.clientX - rect.left;
  const pct = clickX / rect.width;
  
  videoCurrentSec = Math.floor(pct * currentVideoDurationSec);
  document.getElementById('video-progress-fill').style.width = `${pct * 100}%`;
  
  const curMin = Math.floor(videoCurrentSec / 60);
  const curSec = String(videoCurrentSec % 60).padStart(2, '0');
  const totMin = Math.floor(currentVideoDurationSec / 60);
  const totSec = String(currentVideoDurationSec % 60).padStart(2, '0');
  
  document.getElementById('video-time').innerText = `${curMin}:${curSec} / ${totMin}:${totSec}`;
}
</script>
@endsection
