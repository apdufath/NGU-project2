import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    initPhotoPreview();
    initGrowthChart();
    initDeleteConfirm();
    initSortLinks();
    initButtonLoading();
});

function initButtonLoading() {
    document.querySelectorAll('[data-button]').forEach((element) => {
        element.addEventListener('click', () => {
            if (element.tagName === 'BUTTON' && element.type === 'submit') {
                return;
            }

            if (element.dataset.loading === 'false') {
                return;
            }

            element.classList.add('is-loading');
            element.setAttribute('aria-busy', 'true');

            const spinner = element.querySelector('.glass-btn-spinner');
            spinner?.classList.remove('hidden');
        });
    });

    document.querySelectorAll('form[data-loading]').forEach((form) => {
        form.addEventListener('submit', () => {
            const submitter = form.querySelector('[type="submit"]');

            if (!submitter) {
                return;
            }

            submitter.classList.add('is-loading');
            submitter.setAttribute('aria-busy', 'true');
            submitter.disabled = true;

            const spinner = submitter.querySelector('.glass-btn-spinner');
            spinner?.classList.remove('hidden');
        });
    });
}

function initPhotoPreview() {
    const input = document.getElementById('photo');
    const preview = document.getElementById('photo-preview');
    const placeholder = document.getElementById('photo-placeholder');

    if (!input || !preview) return;

    input.addEventListener('change', (event) => {
        const file = event.target.files?.[0];

        if (!file) return;

        const reader = new FileReader();
        reader.onload = (e) => {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            placeholder?.classList.add('hidden');
        };
        reader.readAsDataURL(file);
    });
}

function initGrowthChart() {
    const canvas = document.getElementById('growthChart');

    if (!canvas) return;

    const data = JSON.parse(canvas.dataset.chart || '[]');

    if (!data.length) return;

    const ctx = canvas.getContext('2d');
    const width = canvas.parentElement.clientWidth;
    const height = 220;
    canvas.width = width;
    canvas.height = height;

    const padding = 40;
    const chartWidth = width - padding * 2;
    const chartHeight = height - padding * 2;
    const maxValue = Math.max(...data.map((item) => item.total), 1);
    const barWidth = Math.max((chartWidth / data.length) - 16, 24);

    ctx.clearRect(0, 0, width, height);

    data.forEach((item, index) => {
        const barHeight = (item.total / maxValue) * chartHeight;
        const x = padding + index * (barWidth + 16);
        const y = height - padding - barHeight;

        const gradient = ctx.createLinearGradient(0, y, 0, height - padding);
        gradient.addColorStop(0, '#c084fc');
        gradient.addColorStop(1, '#7e22ce');

        ctx.fillStyle = gradient;
        ctx.beginPath();
        ctx.roundRect(x, y, barWidth, barHeight, 8);
        ctx.fill();

        ctx.fillStyle = 'rgba(255,255,255,0.7)';
        ctx.font = '11px Inter, sans-serif';
        ctx.textAlign = 'center';
        ctx.fillText(item.total, x + barWidth / 2, y - 8);
        ctx.fillText(item.label, x + barWidth / 2, height - 12);
    });
}

function initDeleteConfirm() {
    document.querySelectorAll('[data-confirm]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            const message = form.dataset.confirm || 'Are you sure?';

            if (!confirm(message)) {
                event.preventDefault();
            }
        });
    });
}

function initSortLinks() {
    document.querySelectorAll('[data-sort]').forEach((link) => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            const url = new URL(window.location.href);
            const field = link.dataset.sort;
            const currentSort = url.searchParams.get('sort');
            const currentDirection = url.searchParams.get('direction') || 'asc';

            url.searchParams.set('sort', field);
            url.searchParams.set(
                'direction',
                currentSort === field && currentDirection === 'asc' ? 'desc' : 'asc'
            );

            window.location.href = url.toString();
        });
    });
}

window.addEventListener('resize', () => {
    initGrowthChart();
});
