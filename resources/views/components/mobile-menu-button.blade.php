<div id="mobile-menu-button" x-data="{
    open: false,
    toggleNavbar() {
        this.open = !this.open;
        const navbar = document.getElementById('navbar');
        navbar.style.left = this.open ? '0px' : '-100%';
    },
    handleResize() {
        const windowWidth = window.innerWidth;
        const navbar = document.getElementById('navbar');
        if (windowWidth > 768) {
            navbar.style.left = '0';
        }
    },
    init() {
        window.addEventListener('resize', this.handleResize);
    },
    destroy() {
        window.removeEventListener('resize', this.handleResize);
    }
}" x-init="init()" x-on:destroy="destroy()">
    <button @click="toggleNavbar"><i class="fa-solid fa-bars"></i></button>
    <span><img src="{{ asset('img/logo_black.png') }}" alt="Logo"> Rishan Thirukumar</span>
</div>
