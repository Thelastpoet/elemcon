document.addEventListener('DOMContentLoaded', function() {
  function initElementorCustomizations() {
      elementor.hooks.addAction('panel/open_editor/container', function(panel, model, view) {
          // Get the widget models within the container
          const widgetModels = model.attributes.elements.models;

          // Check if the navbar widget is present
          const hasNavbarWidget = widgetModels.some(widgetModel => widgetModel.attributes.widgetType === 'navbar');
          console.log(hasNavbarWidget);

          if (hasNavbarWidget) {
              // Set the content width to full
              model.setSetting('content_width', 'full');

              // Get container id
              const containerId = model.get('id');

              // prevent adding new widgets to the container
              elementor.hooks.addFilter('elements/container/add', function(defaultAction, model) {
                if (model.get('elType') === 'container' && model.get('id') === containerId) {
                   return false;
                }
                return defaultAction;

              })
          }
      });
  }

  // Check if Elementor is loaded and initialize customizations
  if ('elementor:init') {
      initElementorCustomizations();
  } else {
      window.addEventListener('elementor:init', initElementorCustomizations);
  }
});