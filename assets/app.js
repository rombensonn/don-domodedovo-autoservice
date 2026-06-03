(() => {
    const searchInput = document.querySelector("[data-service-search]");
    const chips = Array.from(document.querySelectorAll("[data-category-filter]"));
    const groups = Array.from(document.querySelectorAll("[data-category]")).filter((node) => node.classList.contains("price-group"));
    const rows = Array.from(document.querySelectorAll("[data-service-row]"));
    const emptyState = document.querySelector("[data-empty-state]");
    const serviceTarget = document.querySelector("[data-service-select-target]");
    const leadForm = document.querySelector("#lead-form");
    let activeCategory = "all";

    const normalize = (value) => (value || "").toLocaleLowerCase("ru-RU").trim();

    const applyFilters = () => {
        const query = normalize(searchInput ? searchInput.value : "");
        let visibleRows = 0;

        rows.forEach((row) => {
            const rowCategory = row.dataset.category;
            const rowText = normalize(row.dataset.search || row.textContent);
            const categoryMatch = activeCategory === "all" || rowCategory === activeCategory;
            const queryMatch = query === "" || rowText.includes(query);
            const isVisible = categoryMatch && queryMatch;

            row.hidden = !isVisible;
            if (isVisible) {
                visibleRows += 1;
            }
        });

        groups.forEach((group) => {
            const groupCategory = group.dataset.category;
            const categoryMatch = activeCategory === "all" || groupCategory === activeCategory;
            const hasVisibleRows = Array.from(group.querySelectorAll("[data-service-row]")).some((row) => !row.hidden);

            group.hidden = !categoryMatch || !hasVisibleRows;
            if (!group.hidden && (query !== "" || activeCategory !== "all")) {
                group.open = true;
            }
        });

        if (emptyState) {
            emptyState.hidden = visibleRows !== 0;
        }
    };

    chips.forEach((chip) => {
        chip.addEventListener("click", () => {
            activeCategory = chip.dataset.categoryFilter || "all";
            chips.forEach((item) => item.classList.toggle("is-active", item === chip));
            applyFilters();
        });
    });

    if (searchInput) {
        searchInput.addEventListener("input", applyFilters);
    }

    document.addEventListener("click", (event) => {
        const button = event.target.closest("[data-service-select]");
        if (!button || !serviceTarget) {
            return;
        }

        const service = button.dataset.serviceSelect || "";
        serviceTarget.value = service;
        serviceTarget.dispatchEvent(new Event("change", { bubbles: true }));

        if (leadForm) {
            leadForm.scrollIntoView({ behavior: "smooth", block: "start" });
        }
    });

    const phoneInput = document.querySelector("#phone");
    if (phoneInput) {
        phoneInput.addEventListener("input", () => {
            phoneInput.value = phoneInput.value.replace(/[^\d\s()+-]/g, "");
        });
    }

    if (document.body.dataset.staticPage === "true" && leadForm) {
        const form = leadForm.querySelector("form");
        if (form) {
            form.addEventListener("submit", (event) => {
                event.preventDefault();
                const oldMessage = form.querySelector(".form-message.static");
                if (oldMessage) {
                    oldMessage.remove();
                }
                const message = document.createElement("div");
                message.className = "form-message success static";
                message.setAttribute("role", "status");
                message.textContent = "Публичная версия на GitHub Pages не принимает заявки. Позвоните в сервис или откройте PHP-версию на сервере с поддержкой PHP.";
                form.prepend(message);
            });
        }
    }

    const desktopMotionAllowed = window.matchMedia("(min-width: 761px)").matches
        && !window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    if (desktopMotionAllowed && "IntersectionObserver" in window) {
        const revealItems = document.querySelectorAll(
            ".intent-card, .service-tile, .showcase-card, .process-step, .price-group, .review-card, .feature-list li, .lead-form, .contact-panel"
        );
        revealItems.forEach((item) => item.classList.add("reveal-item"));

        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }
                entry.target.classList.add("is-visible");
                observer.unobserve(entry.target);
            });
        }, { threshold: 0.08, rootMargin: "0px 0px -8% 0px" });

        revealItems.forEach((item) => revealObserver.observe(item));
    }

    const mobileCta = document.querySelector(".mobile-cta");
    if (mobileCta) {
        const syncMobileCta = () => {
            const shouldShow = window.matchMedia("(max-width: 760px)").matches && window.scrollY > 520;
            mobileCta.classList.toggle("is-active", shouldShow);
        };
        syncMobileCta();
        window.addEventListener("scroll", syncMobileCta, { passive: true });
        window.addEventListener("resize", syncMobileCta);
    }

    applyFilters();
})();
