// Instagram Reel Animation Script
document.addEventListener('DOMContentLoaded', function() {
    // Add scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all feature cards and jewelry items
    document.querySelectorAll('.feature-card, .jewelry-item').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });

    // Add click effect to CTA button
    const ctaButton = document.querySelector('.cta-button');
    ctaButton.addEventListener('click', function() {
        this.style.transform = 'scale(0.95)';
        setTimeout(() => {
            this.style.transform = 'scale(1)';
        }, 150);
    });

    // Add sparkle animation to jewelry shapes
    document.querySelectorAll('.jewelry-shape').forEach(shape => {
        shape.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
            this.style.transition = 'transform 0.3s ease';
        });

        shape.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // Auto-scroll effect for continuous viewing
    let scrollPosition = 0;
    const scrollSpeed = 1;

    function autoScroll() {
        window.scrollBy(0, scrollSpeed);
        scrollPosition += scrollSpeed;

        // Reset scroll when reaching bottom
        if (scrollPosition >= document.body.scrollHeight - window.innerHeight) {
            window.scrollTo(0, 0);
            scrollPosition = 0;
        }
    }

    // Start auto-scroll after 3 seconds
    setTimeout(() => {
        const autoScrollInterval = setInterval(autoScroll, 50);

        // Stop auto-scroll on user interaction
        document.addEventListener('touchstart', () => clearInterval(autoScrollInterval));
        document.addEventListener('mousedown', () => clearInterval(autoScrollInterval));
        document.addEventListener('wheel', () => clearInterval(autoScrollInterval));
    }, 3000);

    // Add loading animation
    const body = document.body;
    body.style.opacity = '0';
    body.style.transition = 'opacity 0.5s ease';

    setTimeout(() => {
        body.style.opacity = '1';
    }, 100);
});