const A_goal = 100; // goal
const A_current = 20; // current value
const A_percentage = ((A_current / A_goal) * 100).toFixed(0); // Calculate percentage and round it to 0 decimal places

// Set the text content of the percentage and details elements
document.getElementById('A_percentageText').innerText = `${A_percentage}%`;
document.getElementById('A_detailsText').innerText = `${A_current}/${A_goal} min`;

const activityctx = document.getElementById('activityChart').getContext('2d');
const activityChart = new Chart(activityctx, {
    type: 'doughnut',
    data: {
        labels: ['Activity', 'Nonactivity'],
        datasets: [{
            label: 'Activity Breakdown',
            data: [A_current, A_goal - A_current],
            backgroundColor: [
                'rgba(167, 58, 4)',
                'rgba(217, 217, 217)'
            ],
            borderColor: [
                'rgba(167, 58, 4)',
                'rgba(217, 217, 217)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: false,
        cutout: '80%',
        hover: {
            mode: null
        },
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                enabled: false
            }
        }
    },
    plugins: [
        {
            id: 'roundedBorder',
            afterDraw(chart) {
                const { ctx, chartArea: { width, height } } = chart;
                const meta = chart.getDatasetMeta(0);
                const arc = meta.data[0];
                const centerX = (width / 2) + chart.chartArea.left;
                const centerY = (height / 2) + chart.chartArea.top;
                const radius = (arc.outerRadius + arc.innerRadius) / 2;
                const thickness = (arc.outerRadius - arc.innerRadius) / 2;
                const startAngle = arc.startAngle;
                const endAngle = arc.endAngle;

                // Draw rounded start cap
                ctx.beginPath();
                ctx.arc(centerX + radius * Math.cos(startAngle), centerY + radius * Math.sin(startAngle), thickness, 0, 2 * Math.PI);
                ctx.fillStyle = arc.options.backgroundColor;
                ctx.fill();

                // Draw rounded end cap
                ctx.beginPath();
                ctx.arc(centerX + radius * Math.cos(endAngle), centerY + radius * Math.sin(endAngle), thickness, 0, 2 * Math.PI);
                ctx.fillStyle = arc.options.backgroundColor;
                ctx.fill();
            }
        }
    ]
});
