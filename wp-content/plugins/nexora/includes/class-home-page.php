<?php

if (!defined('ABSPATH')) exit;

class Nexora_Home_Page {

    public function __construct() {
        add_shortcode('nexora_home', [$this, 'render_home_page']);
    }

    function render_home_page() {
        ob_start();
        ?>
        
        <div class="nexora-home">

            <!-- HERO -->
            <section class="hero">

                <div class="hero-content">
                    <h1>
                        Connect. Grow. <span>Discover.</span>
                    </h1>

                    <p>Build meaningful connections and grow your network on Nexora</p>

                    <div class="hero-buttons">
                        <a href="<?php echo home_url('/registration-page'); ?>" class="btn primary">Get Started</a>
                        <a href="<?php echo home_url('/login-page'); ?>" class="btn secondary">Login</a>
                    </div>
                </div>

                <div class="hero-bg"></div>

            </section>

            <!-- FEATURES -->
            <section class="features">
                <div class="feature-card">
                    <h3>Create Profile</h3>
                    <p>Show your identity and skills</p>
                </div>

                <div class="feature-card">
                    <h3>Make Connections</h3>
                    <p>Connect with like-minded people</p>
                </div>

                <div class="feature-card">
                    <h3>Discover Users</h3>
                    <p>Explore new profiles easily</p>
                </div>
            </section>

            <!-- STEPS -->
            <section class="steps">
                <div>1. Sign Up</div>
                <div>2. Build Profile</div>
                <div>3. Connect</div>
            </section>

            <!-- CTA -->
            <section class="cta">
                <h2>Ready to build your network?</h2>
                <a href="<?php echo home_url('/registration-page'); ?>" class="btn primary">Join Nexora</a>
            </section>

        </div>

        <?php
        return ob_get_clean();
    }
}