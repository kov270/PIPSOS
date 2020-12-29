const canvas = document.querySelector('canvas');
const context = canvas.getContext('2d');
const TWOPI = 2 * Math.PI;

class Eye {
    constructor(x, y) {
        this.x = x;
        this.y = y;
        this.width = 40;
        this.height = 40;
        this.pupil = { x: 0, y: 0, width: 10, height: 10 };
    }

    draw() {
        const {x, y} = this;

        context.save();
        context.translate(x, y);

        this.drawOutline();
        this.drawPupil()

        context.restore();
    }

    drawOutline() {
        const {width, height} = this;

        context.beginPath();
        context.ellipse(0, 0, width, height, 0, 0, TWOPI);
        context.stroke();
    }

    drawPupil() {
        const {x, y, width, height} = this.pupil;

        context.beginPath();
        context.ellipse(x, y, width, height, 0, 0, TWOPI);
        context.fill();
    }

    track(object) {
        const {x, y, width, height, pupil} = this;
        const xDiff = (x - object.x);
        const yDiff = (y - object.y);
        const angle = Math.atan2(yDiff, xDiff) - Math.PI;

        if (!isNaN(angle)) {
            const cX = (width * Math.cos(angle));
            const cY = (height * Math.sin(angle));
            const pX = pupil.width * Math.cos(angle);
            const pY = pupil.height * Math.sin(angle);

            pupil.x = cX - pX;
            pupil.y = cY - pY;
        }
    }
}

window.addEventListener('mousemove', e => {
    mouse.x = e.clientX;
    mouse.y = e.clientY;
});

const mouse = { x: 0, y: 0 };
const leftEye = new Eye(100, 100);
const rightEye = new Eye(200, 100);

function tick() {
    context.clearRect(0, 0, 250, 200);

    leftEye.track(mouse);
    leftEye.draw();

    rightEye.pupil.x = leftEye.pupil.x;
    rightEye.pupil.y = leftEye.pupil.y;
    rightEye.draw();

    requestAnimationFrame(tick);
}

tick();