document.addEventListener('DOMContentLoaded', function() {
  var parent = document.querySelector('.splitview'),
    topPanel = parent.querySelector('.top'),
    handle = parent.querySelector('.handle'),   
});
parent.addEventListener('mousemove', function(event) {
        // Move the handle.
        handle.style.left = event.clientX + 'px';
 		// Adjust the top panel width.
        topPanel.style.width = event.clientX + 'px';
});