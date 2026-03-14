/**
 * Scroll-triggered fade-in animations via IntersectionObserver.
 * Respects prefers-reduced-motion -- elements shown instantly if motion is reduced.
 */
export function initAnimations() {
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // If reduced motion: just make everything visible immediately
  if (prefersReduced) {
    document.querySelectorAll('.fade-in').forEach(el => {
      el.classList.add('fade-in--visible');
    });
    return;
  }

  if (typeof IntersectionObserver === 'undefined') {
    document.querySelectorAll('.fade-in').forEach(el => el.classList.add('fade-in--visible'));
    return;
  }

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('fade-in--visible');
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.08, rootMargin: '0px 0px -40px 0px' }
  );

  document.querySelectorAll('.fade-in').forEach((el) => observer.observe(el));

  // Typing effect on h1 elements with class "type-in"
  document.querySelectorAll('h1.type-in').forEach(el => {
    const text = el.textContent;
    el.textContent = '';
    el.style.visibility = 'visible';
    let i = 0;
    const interval = setInterval(() => {
      el.textContent += text[i];
      i++;
      if (i >= text.length) clearInterval(interval);
    }, 40);
  });
}
