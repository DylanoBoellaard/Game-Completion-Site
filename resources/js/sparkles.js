function generateSparkle(color) {
    return {
        id: String(random(10000, 99999)),
        createdAt: Date.now(),
        color,
        size: random(10, 20),
        style: {
            top: random(0, 100) + "%",
            left: random(0, 100) + "%",
        },
    };
}

import { random } from "./utils/random";
import { range } from "./utils/range";
import { prefersReducedMotion } from "./hooks/prefersReducedMotion";
import { useRandomInterval } from "./hooks/randomInterval";

document.querySelectorAll(".sparkles").forEach(initSparkles);

function initSparkles(root) {
    const container = root.querySelector(".sparkles-container");
    const color = root.dataset.color || "#FFC700";

    let sparkles = range(3).map(() => generateSparkle(color));

    function render() {
        container.innerHTML = "";

        sparkles.forEach((sp) => {
            const el = document.createElement("span");
            el.className = "sparkle";

            el.style.top = sp.style.top;
            el.style.left = sp.style.left;

            const svg = document.createElementNS(
                "http://www.w3.org/2000/svg",
                "svg",
            );
            svg.setAttribute("width", sp.size);
            svg.setAttribute("height", sp.size);
            svg.setAttribute("viewBox", "0 0 68 68");

            const path = document.createElementNS(
                "http://www.w3.org/2000/svg",
                "path",
            );
            path.setAttribute("fill", sp.color);
            path.setAttribute(
                "d",
                "M26.5 25.5C19.0043 33.3697 0 34 0 34C0 34 19.1013 35.3684 26.5 43.5C33.234 50.901 34 68 34 68C34 68 36.9884 50.7065 44.5 43.5C51.6431 36.647 68 34 68 34C68 34 51.6947 32.0939 44.5 25.5C36.5605 18.2235 34 0 34 0C34 0 33.6591 17.9837 26.5 25.5Z",
            );

            svg.appendChild(path);
            el.appendChild(svg);
            container.appendChild(el);
        });
    }

    function tick() {
        const sparkle = generateSparkle(color);
        const now = Date.now();

        sparkles = sparkles.filter((sp) => now - sp.createdAt < 750);
        sparkles.push(sparkle);

        render();
    }

    if (!prefersReducedMotion()) {
        useRandomInterval(tick, 500, 750);
    }

    render();
}
