console.log('Script loaded');
// Filter Manager for centralized filter handling
class FilterManager {
  constructor() {
      this.activeFilters = new Map();
  }

  addFilter(name, callback) {
      elementor.hooks.addFilter(name, callback);
      this.activeFilters.set(name, callback);
      console.log(`Filter ${name} added.`);
  }

  removeFilter(name) {
      if (this.activeFilters.has(name)) {
          elementor.hooks.removeFilter(name);
          this.activeFilters.delete(name);
          console.log(`Filter ${name} removed.`);
      }
  }

  clearAllFilters() {
      this.activeFilters.forEach((_, name) => this.removeFilter(name));
  }
}

const filterManager = new FilterManager();

// Define the HandleNavbarWidgetAdd hook class
class HandleNavbarWidgetAdd extends $e.modules.hookUI.After {
  getCommand() {
      return 'document/elements/create';
  }

  getId() {
      return 'handle-navbar-widget-add';
  }

  getContainerType() {
      return 'document';
  }

  getConditions(args) {
      return args.model && args.model.get('widgetType') === 'navbar';
  }

  apply(args) {
      try {
          const { container } = args;
          const parentContainer = container.parent;

          console.log('Navbar widget added:', container);
          console.log('Parent container:', parentContainer);

          parentContainer.settings.setExternalChange('content_width', 'full');

          filterManager.clearAllFilters();
          filterManager.addFilter('elements/widget/add', function(defaultAction, widgetModel) {
              if (widgetModel.get('elType') === 'widget' && widgetModel.get('widgetType') !== 'navbar' && widgetModel.get('parent_id') === parentContainer.model.get('id')) {
                  console.log('Blocked addition of non-navbar widget:', widgetModel.get('widgetType'));
                  return false;
              }
              return defaultAction;
          });
      } catch (error) {
          console.error('Error applying HandleNavbarWidgetAdd:', error);
      }
  }
}

// Define the HandleNavbarWidgetEdit hook class
class HandleNavbarWidgetEdit extends $e.modules.hookUI.After {
  getCommand() {
      return 'editor/documents/open';
  }

  getId() {
      return 'handle-navbar-widget-edit';
  }

  getContainerType() {
      return 'document';
  }

  apply() {
      try {
          const navbarWidgets = elementor.getPreviewView().el.querySelectorAll('.elementor-widget-navbar');
          navbarWidgets.forEach(navbarWidget => {
              const model = elementor.getElementView(navbarWidget).getEditModel();
              const parentContainer = model.getContainer();
  
              console.log('Editing navbar widget:', model);
              console.log('Parent container:', parentContainer);
  
              parentContainer.settings.setExternalChange('content_width', 'full');
              filterManager.clearAllFilters();
              filterManager.addFilter('elements/widget/add', function(defaultAction, widgetModel) {
                  if (widgetModel.get('elType') === 'widget' && widgetModel.get('widgetType') !== 'navbar' && widgetModel.get('parent_id') === parentContainer.model.get('id')) {
                      console.log('Blocked addition of non-navbar widget:', widgetModel.get('widgetType'));
                      return false;
                  }
                  return defaultAction;
              });
          });
      } catch (error) {
          console.error('Error applying HandleNavbarWidgetEdit:', error);
      }
  }
}

// Component class to manage hooks
class NavbarComponent extends $e.modules.ComponentBase {
  getNamespace() {
      return 'navbar-widget-handler';
  }

  defaultHooks() {
      return {
          'navbar-widget-add': HandleNavbarWidgetAdd,
          'navbar-widget-edit': HandleNavbarWidgetEdit,
      };
  }
}

// Register the component on Elementor initialization
jQuery(window).on('elementor:init', function() {
  // Attempt to register the NavbarComponent directly.
  try {
      $e.components.register(new NavbarComponent());
      console.info('NavbarComponent registered successfully.');
  } catch (error) {
      console.error('Error registering NavbarComponent:', error);
  }
});


