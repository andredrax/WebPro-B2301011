document.addEventListener("DOMContentLoaded", function() {
    const themeSelect = document.getElementById("theme");
    const fontSizeInput = document.getElementById("fontSize");
    const zoomInButton = document.getElementById("zoomIn");
    const zoomOutButton = document.getElementById("zoomOut");
    const settingsContainer = document.querySelector(".settings-container");
    
    // Load saved settings if available
    loadSettings();
  
    // Change theme
    themeSelect.addEventListener("change", function() {
      document.body.className = themeSelect.value;
    });
  
    // Adjust font size
    fontSizeInput.addEventListener("input", function() {
      settingsContainer.style.fontSize = fontSizeInput.value + "px";
    });
  
    // Zoom In
    zoomInButton.addEventListener("click", function() {
      let currentFontSize = parseInt(window.getComputedStyle(settingsContainer).fontSize);
      if (currentFontSize < 24) {
        settingsContainer.style.fontSize = (currentFontSize + 2) + "px";
      }
    });
  
    // Zoom Out
    zoomOutButton.addEventListener("click", function() {
      let currentFontSize = parseInt(window.getComputedStyle(settingsContainer).fontSize);
      if (currentFontSize > 12) {
        settingsContainer.style.fontSize = (currentFontSize - 2) + "px";
      }
    });
  
    // Save settings
    document.querySelector("button[onclick='saveSettings()']").addEventListener("click", saveSettings);
  
    function saveSettings() {
      localStorage.setItem("theme", themeSelect.value);
      localStorage.setItem("fontSize", fontSizeInput.value);
      localStorage.setItem("notifications", document.getElementById("notifications").checked);
      alert("Settings saved!");
    }
  
    function loadSettings() {
      const savedTheme = localStorage.getItem("theme");
      const savedFontSize = localStorage.getItem("fontSize");
      const savedNotifications = localStorage.getItem("notifications");
  
      if (savedTheme) {
        themeSelect.value = savedTheme;
        document.body.className = savedTheme;
      }
  
      if (savedFontSize) {
        fontSizeInput.value = savedFontSize;
        settingsContainer.style.fontSize = savedFontSize + "px";
      }
  
      if (savedNotifications) {
        document.getElementById("notifications").checked = savedNotifications === "true";
      }
    }
    document.addEventListener("DOMContentLoaded", function() {
        const settingsContainer = document.querySelector(".settings-container");
    
        // Load settings
        function loadSettings() {
            const savedTheme = localStorage.getItem("theme");
            const savedFontSize = localStorage.getItem("fontSize");
            const savedNotifications = localStorage.getItem("notifications");
    
            if (savedTheme) {
                document.body.className = savedTheme;
            }
    
            if (savedFontSize) {
                if (settingsContainer) {
                    settingsContainer.style.fontSize = savedFontSize + "px";
                } else {
                    document.body.style.fontSize = savedFontSize + "px";
                }
            }
    
            if (savedNotifications) {
                const notificationEnabled = savedNotifications === "true";
                // Apply notification settings as needed
            }
        }
    
        loadSettings();
    });
    
    
  });
  