document.addEventListener("alpine:init", () => {
    Alpine.data("documentsPage", () => ({
        // ═══ Tabs ═══
        activeTab: "requests", // 'requests' | 'files'

        // ═══ Filter ═══
        statusFilter: "pending", // 'pending' | 'fulfilled' | 'all'

        // ═══ البيانات (من الـ Blade) ═══
        requests: window.documentRequestsData || [],

        // ═══ Computed: الفلترة ═══
        get filteredRequests() {
            if (this.statusFilter === "all") return this.requests;
            return this.requests.filter(
                (r) => r.status.toLowerCase() === this.statusFilter,
            );
        },
    }));
});
