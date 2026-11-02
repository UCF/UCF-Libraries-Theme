function loadOccuspace(container) {
    const ids = container.dataset.ids;

    fetch(
        `${occuspaceData.restUrl}?ids=${encodeURIComponent(ids)}`
    )
    .then(response => response.json())
    .then(data => {

        let html = '<div class="grid">';

        data.forEach(floor => {

            let progressClass = '';

            switch (floor.class) {
                case 'not-busy':
                    progressClass = 'progress-bar-success';
                    break;

                case 'busy':
                    progressClass = 'progress-bar-warning';
                    break;

                case 'very-busy':
                    progressClass = 'progress-bar-danger';
                    break;
            }

            html += `
                <div id="id_${floor.id}" class="grid-item">
                    <div class="card ${floor.class} busy-card">

                        <h3 class="busy-heading ${floor.class}">
                            ${floor.name}
                        </h3>

                        <span class="busy-text">
                            ${floor.status}
                            - ${floor.percentage}% Occupied
                        </span>

                        <div class="progress">
                            <div
                                class="progress-bar ${progressClass}"
                                role="progressbar"
                                aria-valuenow="${floor.percentage}"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                style="width:${floor.percentage}%;">
                            </div>
                        </div>

                    </div>
                </div>
            `;
        });

        html += '</div>';
        const updated = new Date().toLocaleTimeString([], {
            hour: 'numeric',
            minute: '2-digit'
        });

        html += `
            <p class="availability-updated">
                Availability data last updated at ${updated}.
            </p>
        `;
        container.innerHTML = html;
    })
    .catch(error => {
        console.error(error);
        container.innerHTML = `        
        <div class="alert alert-warning">
            Occupancy data is temporarily unavailable.
        </div>`;
    });
}
document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.occuspace-container').forEach(container => {
        const refreshData = () => {
            loadOccuspace(container);
        };
        refreshData();
        setInterval(() => {
            if (!document.hidden) {
                refreshData();
            }
        }, 90000); // every 90 seconds
    });

});