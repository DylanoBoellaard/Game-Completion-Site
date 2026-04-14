export function useRandomInterval2(callback, min, max) {
    let timeoutId;

    function run() {
        const delay = Math.floor(Math.random() * (max - min + 1)) + min;
        timeoutId = setTimeout(() => {
            callback();
            run();
        }, delay);
    }

    run();

    return () => clearTimeout(timeoutId);
}

function random(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}

export function useRandomInterval(callback, minDelay, maxDelay) {
    let timeoutId = null;
    let currentCallback = callback;

    function setCallback(newCallback) {
        currentCallback = newCallback;
    }

    function start() {
        const isEnabled =
            typeof minDelay === 'number' && typeof maxDelay === 'number';

        if (!isEnabled) return;

        function handleTick() {
            const nextTickAt = random(minDelay, maxDelay);

            timeoutId = window.setTimeout(() => {
                currentCallback();
                handleTick();
            }, nextTickAt);
        }

        handleTick();
    }

    function stop() {
        if (timeoutId !== null) {
            window.clearTimeout(timeoutId);
        }
    }

    // auto-start (like useEffect)
    start();

    return {
        stop,
        setCallback, // optional: lets you update callback dynamically
    };
}