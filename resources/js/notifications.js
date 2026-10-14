document.addEventListener("alpine:init", () => {
    Alpine.data("notificationsPage", () => ({
        // ═══ Filter ═══
        typeFilter: "all", // 'all' | 'status_change' | 'document_request' | 'payment_reminder'

        // ═══ Send reminder form ═══
        reminderService: "svc_002",

        // ═══ البيانات من الـ Blade ═══
        notifications: window.notificationsData || [],

        // ═══ Computed: الفلترة ═══
        get filteredNotifications() {
            if (this.typeFilter === "all") return this.notifications;
            return this.notifications.filter(
                (n) => n.type_key === this.typeFilter,
            );
        },

        // ═══ Actions ═══
        sendReminder() {
            console.log("Sending reminder for service:", this.reminderService);
            // بعدين: fetch POST
        },
    }));
    Alpine.data("notificationsBell", () => ({
        open: false,
        unreadCount: 4, // ثابت مؤقتاً — بعدين يتحسب من DB

        queue: [
            {
                id: 1,
                type: "Document request",
                title: "Current CR copy",
                subtitle: "Commercial Registry Renewal",
                url: "/services/svc_003",
            },
            {
                id: 2,
                type: "Document request",
                title: "Lease contract",
                subtitle: "Commercial Registry Renewal",
                url: "/services/svc_003",
            },
            {
                id: 3,
                type: "Document request",
                title: "Payroll register",
                subtitle: "Payroll Compliance Review — Aug 2026",
                url: "/services/svc_008",
            },
            {
                id: 4,
                type: "Overdue",
                title: "Annual Financial Statement Preparation",
                subtitle: "Overdue",
                url: "/services/svc_002",
            },
        ],
    }));
});
