import "./bootstrap";
import Alpine from "alpinejs";

// ═══ Alpine Components (register BEFORE Alpine.start()) ═══
import "./catalog";
import "./services";
import "./payments";
import "./documents";
import "./notifications";

// ═══ Alpine ═══
window.Alpine = Alpine;
Alpine.start();

// ═══ Heavy Libraries (dynamic — تُحمّل عند الحاجة) ═══
window.loadApexCharts = () => import("apexcharts");
window.loadFlatpickr = () => import("flatpickr");
window.loadSwiper = () => import("swiper");
