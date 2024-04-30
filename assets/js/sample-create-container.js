var navbarWidget = api.run( 'document/elements/create', {
    model: {
        elType: 'container',
        isInner: false,
        settings: {
            title: 'navbar'
        },
        elements: [
            {
                elType: 'widget',
                widgetType: 'navbar',
            }
        ]
    },
    container: elementor.getPreviewContainer(),
});

var container = elementor.getContainer(widget.id)


