// Declare globally-available queue to hold function pointers until window is loaded
var onload_function_queue = [];

// Execute all functions in queue after window is loaded
function executeOnloadFunctions()
{
    var queue_function_count = window.onload_function_queue.length;
    for (i = 0; i < queue_function_count; i++) {
        window.onload_function_queue[i]();
    }
}

// Tie on-load function execution to "window.onload" event
window.addEventListener('load', executeOnloadFunctions, false);
