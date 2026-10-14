document.addEventListener("alpine:init", () => {
    // ═══════════════════════════════════════════════
    // صفحة القائمة (index)
    // ═══════════════════════════════════════════════
    Alpine.data("servicesPage", () => ({
        isOpen: false,
        isEditMode: false,
        form: {
            id: null,
            name: "",
            client_id: "",
            status: "pending_documents",
            remaining: 0,
            due_date: "",
            assigned_to: "",
        },

        openCreate() {
            this.isEditMode = false;
            this.form = {
                id: null,
                name: "",
                client_id: "",
                status: "pending_documents",
                remaining: 0,
                due_date: "",
                assigned_to: "",
            };
            this.isOpen = true;
        },
        openEdit(item) {
            this.isEditMode = true;
            this.form = { ...item };
            this.isOpen = true;
        },
        close() {
            this.isOpen = false;
        },
        save() {
            console.log("Saving:", this.form);
            this.close();
        },

        // Assign
        isAssignOpen: false,
        assignMode: "catalog",
        assignForm: {
            client_id: "",
            catalog_id: "",
            service_name: "",
            service_name_ar: "",
            cost: 4500,
            frequency: "one-time",
            start_date: "",
            due_date: "",
            assigned_to: "",
        },
        catalogs: [
            {
                id: "cat_001",
                name: "Quarterly VAT Filing",
                name_ar: "إقرار ضريبة القيمة المضافة الربع سنوي",
                cost: 4500,
            },
            {
                id: "cat_002",
                name: "Annual Financial Statement Preparation",
                name_ar: "إعداد القوائم المالية السنوية",
                cost: 12000,
            },
            {
                id: "cat_003",
                name: "Commercial Registry Renewal",
                name_ar: "تجديد السجل التجاري",
                cost: 2000,
            },
            {
                id: "cat_004",
                name: "Corporate Tax Return",
                name_ar: "الإقرار الضريبي للشركات",
                cost: 8000,
            },
            {
                id: "cat_005",
                name: "Payroll Compliance Review",
                name_ar: "مراجعة امتثال الرواتب",
                cost: 3000,
            },
            {
                id: "cat_006",
                name: "Business License Application",
                name_ar: "طلب ترخيص تجاري",
                cost: 1500,
            },
        ],

        openAssign() {
            this.assignMode = "catalog";
            this.assignForm = {
                client_id: "",
                catalog_id: "",
                service_name: "",
                service_name_ar: "",
                cost: 4500,
                frequency: "one-time",
                start_date: new Date().toISOString().split("T")[0],
                due_date: "",
                assigned_to: "",
            };
            this.isAssignOpen = true;
        },
        closeAssign() {
            this.isAssignOpen = false;
        },
        onCatalogChange() {
            const cat = this.catalogs.find(
                (c) => c.id === this.assignForm.catalog_id,
            );
            if (cat) {
                this.assignForm.service_name = cat.name;
                this.assignForm.service_name_ar = cat.name_ar;
                this.assignForm.cost = cat.cost;
            }
        },
        setAssignMode(mode) {
            this.assignMode = mode;
            if (mode === "custom") {
                this.assignForm.catalog_id = "";
                this.assignForm.service_name = "";
                this.assignForm.service_name_ar = "";
            }
        },
        assignService() {
            console.log("Assigning:", this.assignForm);
            this.closeAssign();
        },
    }));

    // ═══════════════════════════════════════════════
    // صفحة التفاصيل (show)
    // ═══════════════════════════════════════════════
    Alpine.data("serviceShowPage", () => ({
        newStatus: "",
        statusOpen: false,
        statusLabels: {
            pending_documents: "Pending Documents",
            in_progress: "In Progress",
            under_review: "Under Review",
            completed: "Completed",
            on_hold: "On Hold",
            cancelled: "Cancelled",
            overdue: "Overdue",
        },

        isPaymentOpen: false,
        paymentForm: {
            amount: "",
            method: "Bank Transfer",
            date: "",
            attachment: "",
        },

        isRequestDocOpen: false,
        requestDocForm: { name: "", name_ar: "" },

        isUploadOpen: false,
        isDragging: false,
        uploadForm: { filename: "", request_id: "" },

        saveStatus() {
            if (!this.newStatus) return;
            console.log("Saving status:", this.newStatus);
        },

        openRecordPayment() {
            this.paymentForm = {
                amount: "",
                method: "Bank Transfer",
                date: new Date().toISOString().split("T")[0],
                attachment: "",
            };
            this.isPaymentOpen = true;
        },
        closePayment() {
            this.isPaymentOpen = false;
        },
        savePayment() {
            console.log("Recording payment:", this.paymentForm);
            this.closePayment();
        },

        openRequestDoc() {
            this.requestDocForm = { name: "", name_ar: "" };
            this.isRequestDocOpen = true;
        },
        closeRequestDoc() {
            this.isRequestDocOpen = false;
        },
        saveRequestDoc() {
            console.log("Requesting doc:", this.requestDocForm);
            this.closeRequestDoc();
        },

        openUpload() {
            this.uploadForm = { filename: "", request_id: "" };
            this.isUploadOpen = true;
        },
        closeUpload() {
            this.isUploadOpen = false;
            this.isDragging = false;
        },
        handleDrop(e) {
            this.isDragging = false;
            const file = e.dataTransfer.files[0];
            if (file) this.uploadForm.filename = file.name;
        },
        saveUpload() {
            console.log("Uploading:", this.uploadForm);
            this.closeUpload();
        },

        sendReminder() {
            console.log("Sending payment reminder...");
        },
    }));
});
