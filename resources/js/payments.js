document.addEventListener("alpine:init", () => {
    Alpine.data("paymentsPage", () => ({
        isOpen: false,
        form: {
            client_id: "",
            service_id: "",
            amount: "",
            date: new Date().toISOString().split("T")[0],
            method: "Cash",
            attachment: "",
            notes: "",
        },

        openCreate() {
            this.form = {
                client_id: "",
                service_id: "",
                amount: "",
                date: new Date().toISOString().split("T")[0],
                method: "Cash",
                attachment: "",
                notes: "",
            };
            this.isOpen = true;
        },

        close() {
            this.isOpen = false;
        },

        save() {
            console.log("Saving payment:", this.form);
            this.close();
        },
    }));
});
