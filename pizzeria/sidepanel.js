function toggleSidePanel() {
    let sidePanel = document.getElementById('sidePanel');
    
   
    if (sidePanel.style.display === 'block') {
        sidePanel.style.display = 'none'; 
    } else {
        sidePanel.style.display = 'block'; 
    }
}