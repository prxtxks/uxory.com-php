  function switchTab(tabName) {
    const buttons = document.getElementsByClassName("tab-button");
    for (let btn of buttons) btn.classList.remove("active");
    document.querySelector(`[onclick="switchTab('${tabName}')"]`).classList.add("active");

    const tabs = document.getElementsByClassName("tab-content");
    for (let tab of tabs) tab.classList.add("hidden");
    document.getElementById(tabName).classList.remove("hidden");
  }