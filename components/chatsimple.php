<script>
  const EXPERTISE_CLIENT_ID = "d46c4cf2-5d66-42c5-9ace-f37294f0cc4e";

  function getTheme() {
    // Tailwind dark mode: <html class="dark">
    return document.documentElement.classList.contains("dark") ? "dark" : "light";
  }

  function loadExpertiseAI(theme) {
    // Remove existing widget + script
    document.querySelector("expertise-ai")?.remove();
    document.querySelector('script[data-expertise]')?.remove();

    // Expose theme globally (only works if their embed reads it)
    window.__expertiseTheme = theme; // "dark" | "light"

    // Re-inject widget element
    const widget = document.createElement("expertise-ai");
    widget.setAttribute("client", EXPERTISE_CLIENT_ID);
    document.body.appendChild(widget);

    // Re-inject script
    const script = document.createElement("script");
    script.src = "https://cdn.expertise.ai/genweb/ai-genweb.js";
    script.defer = true;
    script.setAttribute("data-expertise", "true");
    document.body.appendChild(script);
  }

  // Initial load
  loadExpertiseAI(getTheme());

  // Reload widget on theme toggle click
  document.getElementById("theme-toggle")?.addEventListener("click", () => {
    // wait for your theme toggle code to apply/remove the "dark" class
    setTimeout(() => loadExpertiseAI(getTheme()), 50);
  });
</script>