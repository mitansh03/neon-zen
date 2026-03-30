# Neon Zen — Website Version History

All versions are tracked via Git. Use the commands below to roll back to any version instantly.

---

## How to Roll Back

### Roll back the full codebase to any version:
```bash
cd "d:/Documents/WebSite for yoga"
git reset --hard <commit-hash>
```

### Then redeploy to Vercel:
```bash
cd preview
npx vercel --prod --yes
```

### Roll back just the preview without touching WP theme:
```bash
git checkout <commit-hash> -- preview/
cd preview && npx vercel --prod --yes
```

> ⚠️ `git reset --hard` is destructive. If you want a safe rollback that keeps history, use:
> ```bash
> git revert <commit-hash>
> ```

---

## Version Log

---

### v8 — Cyberpunk UI Upgrade ← CURRENT / LIVE
- **Commit:** `631b3f7`
- **Full hash:** `631b3f722eec8b8c0e549a8d624e46498729462d`
- **Date:** 2026-03-30
- **Live URL:** https://yoga-bangalore.vercel.app
- **GitHub:** https://github.com/mitansh03/neon-zen/tree/631b3f7

**What's in this version:**
- Syncopate + Space Mono fonts (Cyberpunk UI design system)
- Shadcn-style CSS token system (`--zen-glow-xs/sm/md/lg/btn`)
- CRT scanlines overlay on hero section
- Periodic glitch animation on logo brand name
- Stats bar — 200+ members, 21 classes/week, 4 instructors, 98% satisfaction
- Neon grid background on schedule and CTA sections
- Glassmorphism testimonial cards with neon top border
- Neon left-accent border on about cards
- Space Mono for nav, labels, schedule times (HUD feel)
- SVG icons replace emoji in about cards
- shadcn-style focus ring on form inputs (neon glow)
- Neon bottom border on footer

**Roll back FROM this version to v7:**
```bash
git reset --hard 3603aad && cd preview && npx vercel --prod --yes
```

---

### v7 — Bio-Thermal Image Fix
- **Commit:** `3603aad`
- **Full hash:** `3603aadd998a31bf38e39caf09e29f2b2762fe81`
- **Date:** 2026-03-29

**What's in this version:**
- Fixed broken Bio-Thermal class card image (dead Unsplash URL replaced)

**Restore this version:**
```bash
git reset --hard 3603aad && cd preview && npx vercel --prod --yes
```

---

### v6 — All Images Updated
- **Commit:** `f91ad9c`
- **Full hash:** `f91ad9c7249c15b6d50f1dd73314ec90ace057d4`
- **Date:** 2026-03-29

**What's in this version:**
- All section images replaced with unique yoga/studio Unsplash photos
- No duplicate images across any section

**Restore this version:**
```bash
git reset --hard f91ad9c && cd preview && npx vercel --prod --yes
```

---

### v5 — Nav Active State Fix
- **Commit:** `ecafefe`
- **Full hash:** `ecafefe0bc757d95c2bf4161534f2869280c97af`
- **Date:** 2026-03-22

**What's in this version:**
- Fixed navbar active tab not updating correctly when scrolling between sections
- Replaced IntersectionObserver with scroll-position logic

**Restore this version:**
```bash
git reset --hard ecafefe && cd preview && npx vercel --prod --yes
```

---

### v4 — Schedule, Testimonials, CTA + Full Animations
- **Commit:** `9ff88b7`
- **Full hash:** `9ff88b71c3d30b0f66fc2cf6e3e5ed1390ffe026`
- **Date:** 2026-03-22

**What's in this version:**
- New sections: Weekly Schedule (7-day grid), Testimonials (3 cards), CTA strip
- Complete animation system: scroll reveal, parallax, directional variants
- Magnetic cursor on CTA buttons, WhatsApp pulse, modal animations
- "Reviews" added to nav

**Restore this version:**
```bash
git reset --hard 9ff88b7 && cd preview && npx vercel --prod --yes
```

---

### v3 — Auto-Popup Contact Form (Meta Ad Lead Gen)
- **Commit:** `8e43b1f`
- **Full hash:** `8e43b1fb4d48b0b0a97ca43fe2907e696472b108`
- **Date:** 2026-03-22

**What's in this version:**
- Contact modal auto-opens 3 seconds after page load (for Meta ad traffic)
- Modal has dismiss option
- Sections: Hero, About, Classes, Contact only

**Restore this version:**
```bash
git reset --hard 8e43b1f && cd preview && npx vercel --prod --yes
```

---

### v2 — Contact Modal + Vercel Preview
- **Commit:** `3833222`
- **Full hash:** `3833222ff544e2e30555d767964e40a11149ee3e`
- **Date:** 2026-03-22

**What's in this version:**
- Popup contact form modal added
- Static HTML preview created and first deployed to Vercel

**Restore this version:**
```bash
git reset --hard 3833222 && cd preview && npx vercel --prod --yes
```

---

### v1 — Initial Launch
- **Commit:** `9acc539`
- **Full hash:** `9acc53931b335686785de991b9a5c9a3857c465a`
- **Date:** 2026-03-22

**What's in this version:**
- Full WordPress theme (`zen-yoga/`) built from scratch
- Sections: Hero, About, Classes, Contact
- Dark neon design system (`#CCFF00` on `#0A0A0A`)
- Mobile-first responsive CSS, WhatsApp button, mobile nav

**This is the earliest version — cannot roll back further.**

---

## Quick Reference Table

| Version | Commit    | Date       | Description                            |
|---------|-----------|------------|----------------------------------------|
| **v8**  | `631b3f7` | 2026-03-30 | Cyberpunk UI, stats bar, fonts ← **LIVE** |
| v7      | `3603aad` | 2026-03-29 | Bio-Thermal image fix                  |
| v6      | `f91ad9c` | 2026-03-29 | All images updated                     |
| v5      | `ecafefe` | 2026-03-22 | Nav active state fix                   |
| v4      | `9ff88b7` | 2026-03-22 | Schedule, testimonials, CTA sections   |
| v3      | `8e43b1f` | 2026-03-22 | Auto-popup lead gen form               |
| v2      | `3833222` | 2026-03-22 | Contact modal + Vercel deploy          |
| v1      | `9acc539` | 2026-03-22 | Initial theme launch                   |

---

## Vercel Rollback (Without Touching Code)

You can also roll back just the live site from Vercel's dashboard:

1. Go to https://vercel.com/mitansh-sahares-projects/yoga-bangalore
2. Click **Deployments**
3. Find the old deployment → click **...** → **Promote to Production**
