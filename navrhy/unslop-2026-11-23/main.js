// Tři Mistři – návrh 23. 11. 2026. Menu, předvyplnění služby a příprava poptávky do e-mailu.
(() => {
  const header = document.querySelector(".header");
  const menuBtn = document.querySelector(".menu-btn");
  if (header && menuBtn) {
    const setOpen = (open) => {
      header.classList.toggle("open", open);
      menuBtn.setAttribute("aria-expanded", String(open));
      menuBtn.querySelector(".menu-label").textContent = open ? "Zavřít" : "Menu";
    };
    menuBtn.addEventListener("click", () => setOpen(!header.classList.contains("open")));
    header.querySelectorAll(".nav a").forEach((a) => a.addEventListener("click", () => setOpen(false)));
    document.addEventListener("keydown", (e) => { if (e.key === "Escape") setOpen(false); });
  }

  // Rychlý výběr služby na úvodu předvyplní poptávku
  const quick = document.querySelector("[data-quick]");
  const serviceSelect = document.querySelector("#f-sluzba");
  if (quick && serviceSelect) {
    quick.addEventListener("submit", (e) => {
      e.preventDefault();
      const value = quick.querySelector("select").value;
      if (value) serviceSelect.value = value;
      document.querySelector("#poptavka").scrollIntoView();
      setTimeout(() => document.querySelector("#f-jmeno").focus({ preventScroll: true }), 400);
    });
  }

  // Výpis vybraných fotek
  const fileInput = document.querySelector("#f-fotky");
  const fileList = document.querySelector("[data-files]");
  if (fileInput && fileList) {
    fileInput.addEventListener("change", () => {
      const files = [...fileInput.files].slice(0, 5);
      fileList.textContent = files.length ? "Vybráno: " + files.map((f) => f.name).join(", ") : "";
    });
  }

  // Návrh nemá serverovou část: poptávka se připraví v e-mailové aplikaci
  const form = document.querySelector("[data-inquiry]");
  if (form) {
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      if (!form.reportValidity()) return;
      const v = (id) => (form.querySelector(id)?.value || "").trim();
      const lines = [
        "Jméno: " + v("#f-jmeno"),
        "Telefon: " + v("#f-telefon"),
        v("#f-email") && "E-mail: " + v("#f-email"),
        "Služba: " + (v("#f-sluzba") || "Nevím / jiná služba"),
        v("#f-mesto") && "Místo realizace: " + v("#f-mesto"),
        "",
        v("#f-popis"),
      ].filter((l) => l !== false && l !== "");
      const subject = "Poptávka: " + (v("#f-sluzba") || "malby, nátěry a povrchy");
      window.location.href = "mailto:info@trimistri.cz?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(lines.join("\n"));
      const status = form.querySelector("[data-status]");
      if (status) status.textContent = "Připravili jsme e-mail s vaší poptávkou. Fotky k němu prosím přiložte a odešlete ho.";
    });
  }
})();
