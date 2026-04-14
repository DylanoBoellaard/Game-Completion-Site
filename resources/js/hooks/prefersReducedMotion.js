export function prefersReducedMotion() {
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
}

const QUERY = '(prefers-reduced-motion: no-preference)';

export function prefersReducedMotion2() {
    const mediaQueryList = window.matchMedia(QUERY);

    let prefersReducedMotion = !mediaQueryList.matches;
    let listeners = [];

    function notify() {
        listeners.forEach(cb => cb(prefersReducedMotion));
    }

    function handleChange(event) {
        prefersReducedMotion = !event.matches;
        notify();
    }

    // Add listener (cross-browser)
    if (mediaQueryList.addEventListener) {
        mediaQueryList.addEventListener('change', handleChange);
    } else {
        mediaQueryList.addListener(handleChange);
    }

    function get() {
        return prefersReducedMotion;
    }

    function subscribe(callback) {
        listeners.push(callback);

        // optional: return unsubscribe
        return () => {
            listeners = listeners.filter(cb => cb !== callback);
        };
    }

    function cleanup() {
        if (mediaQueryList.removeEventListener) {
            mediaQueryList.removeEventListener('change', handleChange);
        } else {
            mediaQueryList.removeListener(handleChange);
        }
    }

    return {
        get,
        subscribe,
        cleanup,
    };
}