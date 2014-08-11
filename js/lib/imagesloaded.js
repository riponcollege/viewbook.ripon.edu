function onImageReady(selector, handler) {
    var list;

    // If given a string, use it as a selector; else use what we're given
    list = typeof selector === 'string' ? $(selector) : selector;

    // Hook up each image individually
    list.each(function(index, element) {
        if (element.complete) {
            // Already loaded, fire the handler (asynchronously)
            setTimeout(function() {
                fireHandler.call(element);
            }, 0); // Won't really be 0, but close
        }
        else {
            // Hook up the handler
            $(element).bind('load', fireHandler);
        }
    });

    function fireHandler(event) {
        // Unbind us if we were bound
        $(this).unbind('load', fireHandler);

        // Call the handler
        handler.call(this);
    }
}

// Usage:
onImageReady("#photos img:first");