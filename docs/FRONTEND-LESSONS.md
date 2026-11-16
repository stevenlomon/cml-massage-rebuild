# Frontend Lessons Learned

Practical fixes discovered during the CML Massage & Wellness rebuild. Kept here so the same mistakes aren't repeated.

---

## Carousel overflow on mobile

**Problem:** Carousel tracks use `display: flex` + `translateX` transforms to slide cards. On mobile viewports (e.g. 375px) the off-screen cards extended past the right edge of the viewport, causing the entire page to scroll horizontally.

**Root cause:** The carousel *wrapper* elements (`.reviews-carousel`, `.treatment-reviews-carousel`, `.quals-carousel`) only had `position: relative` — no overflow clipping. The flex children (`.review-card`, `.qual-card`) at `flex: 0 0 85vw` on mobile naturally exceeded the wrapper's bounds.

**Fix:** Add `overflow: hidden` to every carousel wrapper. The `translateX` transform on the inner track still works because transforms operate in the element's own coordinate space regardless of the parent's overflow.

```css
.reviews-carousel,
.treatment-reviews-carousel,
.quals-carousel {
    overflow: hidden;
}
```

**Takeaway:** Any sliding/translating carousel needs `overflow: hidden` on the outer container. Without it the off-screen cards widen the page's scrollable area.

---

## Full-bleed sections and height

**Problem:** Sections that span the full viewport width (banners, heroes) initially had fixed `height` or `min-height` values that broke on different screen sizes or when content grew.

**Fix:** Let content drive the height. Use `aspect-ratio` or padding on the image container and let the text side grow naturally. Avoid hard pixel heights on content sections.

**Takeaway:** Content-driven height beats fixed height for responsive layouts.

---

## Section CSS independence

**Problem:** Styles from one section leaked into or conflicted with another because selectors weren't scoped tightly enough.

**Fix:** Scope every section's styles under its own class (`.treatment-hero`, `.about-banner`, `.reviews-carousel`, etc.) so each section is self-contained.

**Takeaway:** Each section should be independently styled — changing one must not break another.

---

## Mobile nav and body scroll

**Problem:** Opening the mobile hamburger menu didn't prevent the body from scrolling underneath, and closing it sometimes left a visual shift.

**Fix:** The mobile nav uses `position: absolute` + `display: none/block` toggling. No body scroll lock is needed because the overlay is transparent and tapping outside closes it. The visual shift was a browser-pane rendering artifact, not a real CSS bug.

**Takeaway:** Investigate apparent layout bugs before adding workarounds — they may be tooling artifacts.

---

## Touch swipe on carousels

**Problem:** Mobile users had no way to swipe between carousel cards; only the prev/next buttons worked.

**Fix:** Added a reusable `addSwipe(el, onLeft, onRight)` helper with a 40px horizontal threshold and a vertical-scroll guard (`Math.abs(dx) > Math.abs(dy)`) to prevent swipe from hijacking normal page scrolling.

**Takeaway:** Touch targets need a dead-zone threshold and must respect the dominant scroll axis.

---

## CSS `order` for mobile-only visual reordering

**Problem:** Needed Benify and Wellnet partner logos swapped on mobile only, without changing DOM order (which would affect desktop).

**Fix:** Used CSS `order` inside a `@media (max-width: 768px)` block to visually reorder flex children on mobile only.

**Takeaway:** Use CSS `order` for viewport-specific visual reordering instead of duplicating markup or using JavaScript.
