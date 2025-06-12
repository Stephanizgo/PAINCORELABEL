// Automatically updates the year
document.getElementById("year").textContent = new Date().getFullYear();

// Register ScrollTrigger plugin
gsap.registerPlugin(ScrollTrigger);

// GSAP Animations
document.addEventListener('DOMContentLoaded', () => {
  // Header slide-down animation
  gsap.to('header', {
    y: 0,
    duration: 1,
    ease: "elastic.out(1, 0.5)"
  });

  // Hero image animation
  gsap.to('.hero-image', {
    opacity: 1,
    scale: 1,
    duration: 1.5,
    ease: "elastic.out(1, 0.5)"
  });

  // Releases list animation
  gsap.to('.release-item', {
    opacity: 1,
    y: 0,
    duration: 0.8,
    stagger: 0.3,
    ease: "back.out(1.7)",
    scrollTrigger: {
      trigger: '.releases',
      start: "top 80%",
      toggleActions: "play none none reset"
    }
  });

  // Coming soon section
  gsap.to('.expect', {
    opacity: 1,
    y: 0,
    duration: 0.8,
    ease: "back.out(1.7)",
    scrollTrigger: {
      trigger: '.expect',
      start: "top 80%",
      toggleActions: "play none none reset"
    }
  });

  // Footer animation
  gsap.to('footer', {
    opacity: 1,
    y: 0,
    duration: 1,
    ease: "power2.out",
    scrollTrigger: {
      trigger: 'footer',
      start: "top 90%",
      once: true
    }
  });
});

// Socials page animation
gsap.to('.social-item', {
  opacity: 1,
  y: 0,
  duration: 0.8,
  stagger: 0.3,
  ease: "back.out(1.7)",
  scrollTrigger: {
    trigger: '.socials',
    start: "top 80%",
    toggleActions: "play none none reset"
  }
});