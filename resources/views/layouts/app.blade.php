<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

@include('layouts.guest.head')

<body>
    <div class="main-wrapper">


        <!-- Header -->
        @include('layouts.guest.navbar')
        <!-- /Header -->


        <main>
            @yield('content')
        </main>


        <!-- Footer -->
        @include('layouts.guest.footer')
        <!-- /Footer -->


        <!-- Back to Top Button -->
        <button id="back-to-top" class="back-to-top-btn" aria-label="Back to Top">
            <i class="fa fa-arrow-up"></i>
        </button>
    </div>


    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>

    <!-- Bootstrap Bundle -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AOS (Animate on Scroll) -->
    <script src="{{ asset('assets/plugins/aos/aos.js') }}"></script>

    <!-- Slick Slider -->
    <script src="{{ asset('assets/plugins/slick/slick.js') }}"></script>

    <!-- Font Awesome JS -->
    <script src="{{ asset('assets/plugins/fontawesome/js/fontawesome.min.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

    <!-- Custom Script -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    <script>
        // Theme system
const html = document.documentElement;
const toggleButtons = document.querySelectorAll(".theme-toggle"); // changed

function loadTheme() {
    const saved = localStorage.getItem("theme");

    if (saved) {
        html.setAttribute("data-bs-theme", saved);
    } else {
        const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
        html.setAttribute("data-bs-theme", prefersDark ? "dark" : "light");
    }

    updateIcon();
}

// attach event to ALL buttons
toggleButtons.forEach(toggleBtn => {
    toggleBtn.addEventListener("click", () => {
        const current = html.getAttribute("data-bs-theme");
        const newTheme = current === "dark" ? "light" : "dark";

        html.setAttribute("data-bs-theme", newTheme);
        localStorage.setItem("theme", newTheme);

        updateIcon();
    });
});

function updateIcon() {
    const theme = html.getAttribute("data-bs-theme");

    // update ALL icons
    toggleButtons.forEach(btn => {
        const icon = btn.querySelector("i");
        if (icon) {
            icon.className = theme === "dark" ? "bi bi-sun" : "bi bi-moon";
        }
    });
}

loadTheme();

        (function() {
            const darkMode = localStorage.getItem("darkMode");
            const themeClass = darkMode === "enabled" ? "dark-mode" : "light-mode";

            // Apply the theme class to the document immediately
            document.documentElement.className = themeClass;

            // Wait for DOMContentLoaded to set up event listeners
            document.addEventListener("DOMContentLoaded", () => {
                // Mobile Toggle Elements
                const mobileDarkModeToggle = document.getElementById("mobile-dark-mode-toggle");
                const mobileLightModeToggle = document.getElementById("mobile-light-mode-toggle");
                const mobileThemeToggleTitle = document.getElementById("mobile-theme-toggle-title");

                // Toggle Theme function
                const toggleMode = (isDarkMode) => {
                    document.documentElement.classList.toggle("dark-mode", isDarkMode);
                    localStorage.setItem(
                        "darkMode",
                        isDarkMode ? "enabled" : "disabled"
                    );
                    updateToggleButtons(isDarkMode);
                };

                // Update the theme toggle buttons
                const updateToggleButtons = (isDarkMode) => {
                    if (isDarkMode) {
                        mobileDarkModeToggle.classList.remove("activate");
                        mobileLightModeToggle.classList.add("activate");
                        mobileThemeToggleTitle.textContent = "Dark"; // Update mobile title
                    } else {
                        mobileLightModeToggle.classList.remove("activate");
                        mobileDarkModeToggle.classList.add("activate");
                        mobileThemeToggleTitle.textContent = "Light"; // Update mobile title
                    }
                };

                // Initial activation based on current theme
                updateToggleButtons(themeClass === "dark-mode");

                // Add event listeners if elements are present
                if (mobileDarkModeToggle && mobileLightModeToggle) {
                    mobileDarkModeToggle.addEventListener("click", () => toggleMode(true));
                    mobileLightModeToggle.addEventListener("click", () => toggleMode(false));
                }
            });
        })();

        var myCarousel = new bootstrap.Carousel(document.getElementById('bs-carousel'), {
            interval: 10000, // Transition every 4 seconds
            ride: 'carousel', // Auto-start carousel
            pause: 'hover', // Pause on hover
            wrap: true, // Loop back to the first slide
            keyboard: true, // Enable keyboard navigation (left/right arrow keys)
            touch: true, // Enable touch swipe support for mobile
            slide: true, // Use sliding transitions instead of fade
            focus: false // Carousel operates even when not in focus
        });


        // Get the button
        var backToTopBtn = document.getElementById("back-to-top");

        // When the user scrolls down 100px from the top of the document, show the button
        window.onscroll = function() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                backToTopBtn.classList.add("show");
            } else {
                backToTopBtn.classList.remove("show");
            }
        };

        // When the user clicks on the button, scroll to the top of the document
        backToTopBtn.onclick = function() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
        };
    </script>

    @stack('scripts')
</body>

</html>