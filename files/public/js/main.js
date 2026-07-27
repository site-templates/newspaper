/*
    Newspaper — the interaction layer.

    Everything here is a progressive enhancement: with JavaScript off, the
    navigation still works, nothing is hidden, and the paper stays fully
    readable. The matching transitions live in resources/css/site.css.
*/

// Flag the document early so CSS only hides reveal targets when JS will
// actually reveal them. This file loads with defer, before first paint.
document.documentElement.classList.add('js');

document.addEventListener('DOMContentLoaded', function () {
    pressBar();
    drawer();
    megaMenus();
    revealOnScroll();
    markCurrentMenuItem();
});

/*
    The press bar stays tucked above the viewport while the full masthead is
    on screen, then slides down once the reader passes it (see #pressbar in
    site.css).
*/
function pressBar() {
    const bar = document.getElementById('pressbar');
    const masthead = document.querySelector('[data-masthead]');

    if (!bar) {
        return;
    }

    function threshold() {
        return masthead ? Math.max(masthead.offsetHeight - 56, 120) : 320;
    }

    function evaluate() {
        bar.toggleAttribute('data-scrolled', window.scrollY > threshold());
    }

    evaluate();
    window.addEventListener('scroll', evaluate, { passive: true });
    window.addEventListener('resize', evaluate, { passive: true });
}

/*
    The left drawer. Every [data-drawer-toggle] button flips the same
    menu-open class on <html>; site.css slides the drawer in from the left,
    dims the page behind it, and locks scrolling. Escape and the backdrop
    close it from anywhere.
*/
function drawer() {
    const root = document.documentElement;
    const toggles = document.querySelectorAll('[data-drawer-toggle]');
    const backdrop = document.querySelector('[data-drawer-backdrop]');

    if (!toggles.length) {
        return;
    }

    function setOpen(open) {
        root.classList.toggle('menu-open', open);
        toggles.forEach(function (button) {
            button.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    }

    toggles.forEach(function (button) {
        button.addEventListener('click', function () {
            setOpen(!root.classList.contains('menu-open'));
        });
    });

    if (backdrop) {
        backdrop.addEventListener('click', function () {
            setOpen(false);
        });
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            setOpen(false);
        }
    });

    // Following a link should always close the drawer.
    document.querySelectorAll('[data-drawer] a').forEach(function (link) {
        link.addEventListener('click', function () {
            setOpen(false);
        });
    });
}

/*
    The mega panels. Each desk link renders a full-width panel of matching
    stories under the desk navigation; panels that came out empty (Today,
    About, All Stories) are removed here. The rest open on hover with a
    short grace period so the pointer can travel from link to panel.
*/
function megaMenus() {
    const nav = document.querySelector('[data-desknav]');

    if (!nav) {
        return;
    }

    let closeTimer = null;

    function closeAll() {
        nav.querySelectorAll('.mega-panel.is-open').forEach(function (panel) {
            panel.classList.remove('is-open');
        });
        nav.querySelectorAll('[data-mega-open]').forEach(function (trigger) {
            trigger.removeAttribute('data-mega-open');
        });
    }

    nav.querySelectorAll('[data-mega-panel]').forEach(function (panel) {
        const name = panel.getAttribute('data-mega-panel');
        const trigger = nav.querySelector('[data-mega-trigger="' + CSS.escape(name) + '"]');

        // A desk with no matching stories gets no dropdown.
        if (!trigger || !panel.querySelector('article')) {
            panel.remove();
            return;
        }

        function open() {
            clearTimeout(closeTimer);
            closeAll();
            panel.classList.add('is-open');
            trigger.setAttribute('data-mega-open', '');
        }

        function scheduleClose() {
            clearTimeout(closeTimer);
            closeTimer = setTimeout(closeAll, 160);
        }

        trigger.closest('li').addEventListener('mouseenter', open);
        trigger.closest('li').addEventListener('mouseleave', scheduleClose);
        panel.addEventListener('mouseenter', function () {
            clearTimeout(closeTimer);
        });
        panel.addEventListener('mouseleave', scheduleClose);
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeAll();
        }
    });
}

/*
    Scroll reveals. Elements carrying [data-reveal] fade up as they enter the
    viewport; the .reveal-N utilities stagger groups. Reduced-motion readers
    see everything immediately (site.css).
*/
function revealOnScroll() {
    const targets = document.querySelectorAll('[data-reveal]');

    if (!targets.length || !('IntersectionObserver' in window)) {
        targets.forEach(function (el) {
            el.classList.add('is-visible');
        });
        return;
    }

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.05 });

    targets.forEach(function (el) {
        observer.observe(el);
    });
}

/*
    Mark the desk link that matches the current page so the masthead can
    style it via aria-[current].
*/
function markCurrentMenuItem() {
    const path = window.location.pathname.replace(/\/$/, '') || '/';

    document.querySelectorAll('header nav a').forEach(function (link) {
        const href = link.getAttribute('href') || '';
        const target = href.split('#')[0].replace(/\/$/, '') || '/';

        if (href.indexOf('#') === -1 && target === path) {
            link.setAttribute('aria-current', 'page');
        }
    });
}
