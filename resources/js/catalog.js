document.addEventListener("alpine:init", () => {
    const categoryMap = {
        tax_filing: "تقييم الضرائب",
        financial_reporting: "التقارير المالية",
        compliance: "الامتثال",
    };

    const emptyForm = {
        id: "",
        name: "",
        arabic_name: "",
        category: "tax_filing",
        category_ar: categoryMap["tax_filing"],
        cost: 0,
        description: "",
        arabic_description: "",
        documents: "",
        arabic_documents: "",
    };

    Alpine.data("catalogPage", () => ({
        isOpen: false,
        isEditMode: false,
        form: { ...emptyForm },

        syncArabicCategory() {
            this.form.category_ar = categoryMap[this.form.category] ?? "";
        },

        openCreate() {
            this.isEditMode = false;
            this.form = { ...emptyForm };
            this.isOpen = true;
        },

        openEdit(item) {
            this.isEditMode = true;
            this.form = {
                id: item.id,
                name: item.name,
                arabic_name: item.arabic_name || "",
                category: item.category_key || "tax_filing",
                category_ar:
                    item.category_ar || categoryMap[item.category_key] || "",
                cost: item.cost || 0,
                description: item.description || "",
                arabic_description: item.arabic_description || "",
                documents: item.documents || "",
                arabic_documents: item.arabic_documents || "",
            };
            this.isOpen = true;
        },

        close() {
            this.isOpen = false;
            setTimeout(() => {
                this.form = { ...emptyForm };
                this.isEditMode = false;
            }, 200);
        },

        save() {
            console.log("Saving catalog item:", {
                mode: this.isEditMode ? "edit" : "create",
                data: this.form,
            });
            this.close();
        },
    }));
});
