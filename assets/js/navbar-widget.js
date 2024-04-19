document.addEventListener('DOMContentLoaded', function() {
    
    function initElementorCustomizations() {
        // Hook into the panel opening for the specific widget type 'navbar'
        elementor.hooks.addAction('panel/open_editor/widget/navbar', function(view) {
            var parentContainer = view.el.closest('[data-element_type="container"]');
            if (parentContainer) {
                // Add custom class to the container to indicate it is a navbar container
                parentContainer.classList.add('navbar-container');               

                // To do, more work here
                
                // Set the container to full width
                parentContainer.style.width = '20%';
                

                // Find the child element with the class 'e-con-inner' and make it full width
                var childElement = parentContainer.querySelector('.e-con-inner');
                if (childElement) {
                    childElement.style.width = '100%';
                    childElement.style.padding = '0px !important';
                }
                
            }
        });

        // Prevent adding other widgets to the navbar container
        
    }

    // Check if Elementor is loaded and initialize customizations
    if (window.elementor && window.elementor.hooks) {
        initElementorCustomizations();
    } else {
        window.addEventListener('elementor:init', initElementorCustomizations);
    }
});

// We will also find a way to set defaults to the container like full width, responsiveness
// When we remove the widget, the container should be removed