@extends('layouts.landing')

@section('title', 'About Us - Our Mission & Vision | ShreeSwarupOS')
@section('meta_description', 'Learn how ShreeSwarupOS is transforming restaurant operations with intuitive digital menu technology, seamless POS solutions, and automated table management.')
@section('meta_keywords', 'about ShreeSwarupOS, restaurant technology company, digital menu software team, hospitality software')

@section('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AboutPage",
  "name": "About ShreeSwarupOS",
  "description": "Empowering restaurants worldwide with digital menu and POS solutions.",
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
  --dark: #111827;
  --gray: #6b7280;
  --light: #f6f9f8;
  --border: #e5e7eb;
  --white: #ffffff;
  --card: #ffffff;
}
html.dark {
  --dark: #f3f4f6;
  --gray: #9ca3af;
  --light: #1f2937;
  --border: #374151;
  --white: #111827;
  --card: #1f2937;
}

.ab-page { font-family: 'Poppins', sans-serif; color: var(--dark); }
.ab-page *, .ab-page *::before, .ab-page *::after { box-sizing: border-box; }
.ab-page a { text-decoration: none; }

/* ── HERO ── */
.ab-hero {
  background: linear-gradient(135deg, #0f172a 0%, #0d2b22 50%, #0f1f2e 100%);
  padding: 100px 24px 80px;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.ab-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(ellipse at 25% 60%, rgba(0,182,146,0.15) 0%, transparent 55%),
    radial-gradient(ellipse at 75% 30%, rgba(255,107,44,0.07) 0%, transparent 55%);
  pointer-events: none;
}
.ab-hero-tag {
  display: inline-block;
  background: rgba(0,182,146,0.12);
  border: 1px solid rgba(0,182,146,0.3);
  color: #00b692;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  padding: 6px 18px;
  border-radius: 30px;
  margin-bottom: 24px;
}
.ab-hero h1 {
  font-size: clamp(32px, 5vw, 58px);
  font-weight: 900;
  color: #fff;
  line-height: 1.15;
  margin: 0 0 20px;
}
.ab-hero h1 em { color: #00b692; font-style: normal; }
.ab-hero p {
  font-size: 17px;
  color: rgba(255,255,255,0.7);
  max-width: 600px;
  margin: 0 auto;
  line-height: 1.8;
}

/* ── SECTIONS ── */
.ab-section { padding: 80px 24px; }
.ab-section.alt { background: var(--light); }
.ab-inner { max-width: 1180px; margin: 0 auto; }
.ab-inner-narrow { max-width: 860px; margin: 0 auto; }

.label-badge {
  display: inline-block;
  background: rgba(0,182,146,0.08);
  color: #00b692;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  padding: 5px 16px;
  border-radius: 20px;
  margin-bottom: 14px;
}
.section-head { text-align: center; margin-bottom: 56px; }
.section-head h2 {
  font-size: clamp(24px, 3.5vw, 38px);
  font-weight: 900;
  color: var(--dark);
  margin: 0 0 12px;
  line-height: 1.25;
}
.section-head h2 em { color: #00b692; font-style: normal; }
.section-head p {
  font-size: 15px;
  color: var(--gray);
  max-width: 520px;
  margin: 0 auto;
  line-height: 1.8;
}

/* ── MISSION / VISION SPLIT ── */
.mv-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 28px;
}
@media (max-width: 640px) { .mv-grid { grid-template-columns: 1fr; } }
.mv-card {
  background: var(--card);
  border: 1.5px solid var(--border);
  border-radius: 24px;
  padding: 40px 36px;
  position: relative;
  overflow: hidden;
  transition: transform .3s, box-shadow .3s;
}
.mv-card:hover { transform: translateY(-4px); box-shadow: 0 20px 50px rgba(0,182,146,0.1); }
.mv-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, #00b692, #009c7d);
}
.mv-card-icon {
  width: 56px; height: 56px;
  background: rgba(0,182,146,0.1);
  border-radius: 16px;
  display: flex; align-items: center; justify-content: center;
  color: #00b692;
  margin-bottom: 20px;
}
.mv-card h3 {
  font-size: 20px; font-weight: 800;
  color: var(--dark); margin: 0 0 12px;
}
.mv-card p {
  font-size: 14.5px; color: var(--gray);
  line-height: 1.8; margin: 0;
}

/* ── STORY SECTION ── */
.story-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 64px;
  align-items: center;
}
@media (max-width: 768px) { .story-grid { grid-template-columns: 1fr; gap: 36px; } }
.story-text h2 {
  font-size: clamp(24px, 3vw, 34px);
  font-weight: 900;
  color: var(--dark);
  margin: 0 0 16px;
  line-height: 1.25;
}
.story-text h2 em { color: #00b692; font-style: normal; }
.story-text p {
  font-size: 14.5px; color: var(--gray);
  line-height: 1.85; margin: 0 0 16px;
}
.story-text p:last-child { margin: 0; }

/* Timeline */
.timeline {
  display: flex;
  flex-direction: column;
  gap: 0;
  position: relative;
}
.timeline::before {
  content: '';
  position: absolute;
  left: 20px; top: 0; bottom: 0;
  width: 2px;
  background: linear-gradient(to bottom, #00b692, rgba(0,182,146,0.1));
}
.tl-item {
  display: flex;
  gap: 20px;
  padding-bottom: 32px;
  position: relative;
}
.tl-item:last-child { padding-bottom: 0; }
.tl-dot {
  width: 40px; height: 40px;
  border-radius: 50%;
  background: #00b692;
  border: 3px solid var(--white);
  box-shadow: 0 0 0 3px rgba(0,182,146,0.2);
  display: flex; align-items: center; justify-content: center;
  color: #fff;
  font-size: 11px; font-weight: 800;
  flex-shrink: 0;
  position: relative;
  z-index: 1;
}
.tl-content h4 {
  font-size: 14px; font-weight: 800;
  color: var(--dark); margin: 8px 0 4px;
}
.tl-content p {
  font-size: 13px; color: var(--gray);
  line-height: 1.7; margin: 0;
}

/* ── STATS ── */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
  text-align: center;
}
@media (max-width: 640px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
.stat-card {
  background: var(--card);
  border: 1.5px solid var(--border);
  border-radius: 20px;
  padding: 32px 20px;
  transition: transform .3s, border-color .3s;
}
.stat-card:hover { transform: translateY(-4px); border-color: #00b692; }
.stat-num {
  font-size: 38px; font-weight: 900;
  color: #00b692; line-height: 1;
  display: block; margin-bottom: 8px;
}
.stat-lbl {
  font-size: 13px; color: var(--gray);
  font-weight: 600;
}

/* ── VALUES ── */
.values-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}
@media (max-width: 900px) { .values-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 560px) { .values-grid { grid-template-columns: 1fr; } }
.value-card {
  background: var(--card);
  border: 1.5px solid var(--border);
  border-radius: 20px;
  padding: 32px 28px;
  display: flex;
  flex-direction: column;
  gap: 14px;
  transition: all .3s;
}
.value-card:hover {
  transform: translateY(-5px);
  border-color: #00b692;
  box-shadow: 0 16px 40px rgba(0,182,146,0.1);
}
.value-icon {
  width: 50px; height: 50px;
  border-radius: 14px;
  background: rgba(0,182,146,0.1);
  display: flex; align-items: center; justify-content: center;
  color: #00b692;
  font-size: 22px;
}
.value-card h4 { font-size: 15px; font-weight: 800; color: var(--dark); margin: 0; }
.value-card p { font-size: 13px; color: var(--gray); line-height: 1.7; margin: 0; }

/* ── TEAM ── */
.team-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
}
@media (max-width: 900px) { .team-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 480px) { .team-grid { grid-template-columns: 1fr; } }
.team-card {
  background: var(--card);
  border: 1.5px solid var(--border);
  border-radius: 20px;
  overflow: hidden;
  text-align: center;
  transition: all .3s;
}
.team-card:hover { transform: translateY(-5px); box-shadow: 0 20px 50px rgba(0,0,0,0.08); border-color: #00b692; }
.team-avatar {
  width: 100%;
  aspect-ratio: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 48px;
  background: linear-gradient(135deg, rgba(0,182,146,0.08), rgba(0,182,146,0.02));
  border-bottom: 1px solid var(--border);
}
.team-info { padding: 20px 16px; }
.team-name { font-size: 15px; font-weight: 800; color: var(--dark); margin: 0 0 4px; }
.team-role { font-size: 12px; color: #00b692; font-weight: 600; margin: 0 0 10px; }
.team-bio { font-size: 12px; color: var(--gray); line-height: 1.6; margin: 0; }

/* ── CTA ── */
.ab-cta {
  background: linear-gradient(135deg, #00b692 0%, #009c7d 100%);
  padding: 80px 24px;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.ab-cta::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse at 20% 50%, rgba(255,255,255,0.06) 0%, transparent 60%);
  pointer-events: none;
}
.ab-cta h2 { font-size: clamp(24px, 3.5vw, 40px); font-weight: 900; color: #fff; margin: 0 0 14px; line-height: 1.25; }
.ab-cta p { font-size: 15px; color: rgba(255,255,255,0.85); max-width: 480px; margin: 0 auto 36px; line-height: 1.8; }
.btn-white {
  background: #fff; color: #00b692;
  font-weight: 800; font-size: 15px;
  padding: 16px 40px; border-radius: 12px;
  text-decoration: none; display: inline-block;
  transition: transform .2s, box-shadow .2s;
  box-shadow: 0 8px 24px rgba(0,0,0,0.12);
}
.btn-white:hover { transform: translateY(-2px); box-shadow: 0 16px 40px rgba(0,0,0,0.18); }
</style>

<div class="ab-page">

{{-- ── HERO ── --}}
<section class="ab-hero">
  <div style="position:relative;z-index:1;">
    <span class="ab-hero-tag">About Us</span>
    <h1>We're on a Mission to Make<br><em>Every Restaurant Smarter</em></h1>
    <p>TableTrack was built by restaurant operators, for restaurant operators. We know the chaos — and we built the solution to tame it.</p>
  </div>
</section>

{{-- ── MISSION & VISION ── --}}
<section class="ab-section">
  <div class="ab-inner">
    <div class="section-head">
      <h2>Our <em>Mission & Vision</em></h2>
      <p>Everything we build is guided by a single goal — to make restaurant operations effortless and delightful.</p>
    </div>
    <div class="mv-grid">
      <div class="mv-card">
        <div class="mv-card-icon">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
        </div>
        <h3>Our Mission</h3>
        <p>To empower every restaurant — from a small chai stall to a fine dining chain — with powerful digital tools that simplify operations, reduce waste, and delight customers. We believe technology should work for you, not the other way around.</p>
      </div>
      <div class="mv-card">
        <div class="mv-card-icon">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
        </div>
        <h3>Our Vision</h3>
        <p>A world where every restaurant runs on data, not guesswork. Where chefs focus on cooking, waiters focus on hospitality, and owners focus on growth — because the technology handles everything else seamlessly in the background.</p>
      </div>
    </div>
  </div>
</section>

{{-- ── OUR STORY ── --}}
<section class="ab-section alt">
  <div class="ab-inner">
    <div class="story-grid">
      <div class="story-text">
        <h2>Born from<br><em>Real Restaurant Pain</em></h2>
        <p>It started with a frustrating dinner experience — misplaced orders, a confused waiter, and a paper menu that hadn't been updated in months. Our founders, who had spent years managing restaurant operations, knew there had to be a better way.</p>
        <p>In 2022, we began building TableTrack as an internal tool. Within 6 months, it had transformed operations — order errors dropped by 80%, average table turnover improved by 35%, and customer satisfaction scores soared.</p>
        <p>Today, TableTrack serves hundreds of restaurants across India and beyond. We're just getting started.</p>
      </div>
      <div class="timeline">
        <div class="tl-item">
          <div class="tl-dot">22</div>
          <div class="tl-content">
            <h4>2022 — The Idea is Born</h4>
            <p>A late-night conversation between co-founders about why restaurant operations are still stuck in the past. Prototype started in a 3-person team.</p>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">23</div>
          <div class="tl-content">
            <h4>2023 — First 50 Restaurants</h4>
            <p>Beta launched with 10 pilot restaurants. Within 6 months, 50+ restaurants were live. QR menus, table tracking, and order management shipped.</p>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">24</div>
          <div class="tl-content">
            <h4>2024 — Full Platform Launch</h4>
            <p>POS integration, analytics dashboard, multi-branch support, and staff management launched. Team grew to 20+ members.</p>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">25</div>
          <div class="tl-content">
            <h4>2025 — Scaling Fast</h4>
            <p>500+ restaurants, multiple payment integrations, mobile apps, and an enterprise tier. Expanding to Southeast Asia and the Middle East.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── STATS ── --}}
<section class="ab-section">
  <div class="ab-inner">
    <div class="section-head">
      <h2>TableTrack <em>By the Numbers</em></h2>
    </div>
    <div class="stats-grid">
      <div class="stat-card">
        <span class="stat-num">500+</span>
        <div class="stat-lbl">Restaurants Served</div>
      </div>
      <div class="stat-card">
        <span class="stat-num">2M+</span>
        <div class="stat-lbl">Orders Processed</div>
      </div>
      <div class="stat-card">
        <span class="stat-num">99.9%</span>
        <div class="stat-lbl">Platform Uptime</div>
      </div>
      <div class="stat-card">
        <span class="stat-num">4.9★</span>
        <div class="stat-lbl">Average Rating</div>
      </div>
    </div>
  </div>
</section>

{{-- ── CORE VALUES ── --}}
<section class="ab-section alt">
  <div class="ab-inner">
    <div class="section-head">
      <h2>Our <em>Core Values</em></h2>
      <p>These aren't just words on a wall — they're the principles that guide every product decision we make.</p>
    </div>
    <div class="values-grid">
      <div class="value-card">
        <div class="value-icon">🎯</div>
        <h4>Customer-First Always</h4>
        <p>Every feature we build starts with one question: does this make our customers' lives easier? If the answer isn't a clear yes, we don't ship it.</p>
      </div>
      <div class="value-card">
        <div class="value-icon">🔒</div>
        <h4>Reliability & Trust</h4>
        <p>Restaurants can't afford downtime. We obsess over uptime, security, and data integrity so you never have to worry about the platform failing you.</p>
      </div>
      <div class="value-card">
        <div class="value-icon">⚡</div>
        <h4>Speed of Innovation</h4>
        <p>The restaurant industry evolves fast. So do we. We ship meaningful updates weekly, guided directly by feedback from our users on the ground.</p>
      </div>
      <div class="value-card">
        <div class="value-icon">🌍</div>
        <h4>Inclusivity</h4>
        <p>Whether you run a roadside dhaba or a 5-star restaurant, TableTrack should be accessible, affordable, and powerful for everyone.</p>
      </div>
      <div class="value-card">
        <div class="value-icon">🤝</div>
        <h4>Genuine Partnership</h4>
        <p>We don't just sell software. We partner with restaurants, learn their challenges, and grow together. Your success is our product roadmap.</p>
      </div>
      <div class="value-card">
        <div class="value-icon">📊</div>
        <h4>Data-Driven Decisions</h4>
        <p>Great restaurants make decisions based on data. We help you collect it, understand it, and act on it — for every shift, every day.</p>
      </div>
    </div>
  </div>
</section>

{{-- ── TEAM ── --}}
<section class="ab-section">
  <div class="ab-inner">
    <div class="section-head">
      <h2>Meet <em>Our Team</em></h2>
      <p>A passionate group of designers, engineers, and restaurant industry veterans — all united by one goal.</p>
    </div>
    <div class="team-grid">
      <div class="team-card">
        <div class="team-avatar">👨‍💼</div>
        <div class="team-info">
          <div class="team-name">Mukesh Soni</div>
          <div class="team-role">Founder & CEO</div>
          <div class="team-bio">Ex-restaurant operator with 10 years of F&B experience. Obsessed with building tools that actually work in the real world.</div>
        </div>
      </div>
      <div class="team-card">
        <div class="team-avatar">👩‍💻</div>
        <div class="team-info">
          <div class="team-name">Priya Sharma</div>
          <div class="team-role">Head of Product</div>
          <div class="team-bio">Former UX lead at a hospitality-tech startup. Turns complex operations into simple, beautiful interfaces.</div>
        </div>
      </div>
      <div class="team-card">
        <div class="team-avatar">👨‍🔧</div>
        <div class="team-info">
          <div class="team-name">Rahul Verma</div>
          <div class="team-role">CTO</div>
          <div class="team-bio">Full-stack engineer with a passion for scalable architecture. Built systems handling millions of transactions.</div>
        </div>
      </div>
      <div class="team-card">
        <div class="team-avatar">👩‍🎨</div>
        <div class="team-info">
          <div class="team-name">Anjali Patel</div>
          <div class="team-role">Head of Design</div>
          <div class="team-bio">Believes every pixel matters. Creates interfaces that feel intuitive even for first-time tech users in restaurants.</div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ── CTA ── --}}
<section class="ab-cta">
  <div style="position:relative;z-index:1;">
    <h2>Ready to Join the TableTrack Family?</h2>
    <p>Start free today. No credit card required. Join 500+ restaurants who've transformed how they operate.</p>
    <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
      <a href="{{ route('restaurant_signup') }}" class="btn-white">Start For Free →</a>
      <a href="{{ route('landing.features') }}" style="display:inline-block;background:transparent;color:#fff;border:2px solid rgba(255,255,255,0.4);font-weight:700;font-size:15px;padding:16px 36px;border-radius:12px;text-decoration:none;transition:border-color .2s;" onmouseover="this.style.borderColor='#fff'" onmouseout="this.style.borderColor='rgba(255,255,255,0.4)'">
        Explore Features
      </a>
    </div>
  </div>
</section>

</div>
@endsection
