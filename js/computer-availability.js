function fetchComputerAvailabilityData(container) {

        const ids = container.dataset.ids
            .split(',')
            .map(id => id.trim());

        const slugs = container.dataset.slugs
            ? container.dataset.slugs.split(',').map(slug => slug.trim())
            : [];
        fetch(computerAvailability.restUrl)
            .then(response => response.json())
            .then(data => {
                let html = '<div class="computer-availability grid-busy">';
                let locationIndex = 0;
                const baseUrl = container.dataset.baseUrl;

                data.forEach(location => {

                    const idIndex = ids.indexOf(String(location.group_id));

                    if (idIndex === -1) {
                        return;
                    }

                    const machinesTotal =
                        location.utilization_availability.total_count;

                    const machinesAvailable =
                        location.utilization_availability.available_count;

                    const percentAvailable =
                        machinesTotal > 0
                            ? Math.round(
                                (machinesAvailable / machinesTotal) * 100
                            )
                            : 0;

                    let busyClass = '';
                    let progressColor = '';
                    let statusText = '';

                    if (percentAvailable > 50) {
                        busyClass = 'not-busy';
                        progressColor = 'progress-bar-success';
                        statusText = 'Not Busy';
                    }
                    else if (percentAvailable > 20) {
                        busyClass = 'busy';
                        progressColor = 'progress-bar-warning';
                        statusText = 'Busy';
                    }
                    else {
                        busyClass = 'very-busy';
                        progressColor = 'progress-bar-danger';
                        statusText = 'Very Busy';
                    }

                    html += `
                        <div class="grid-item">
                            <div class="card ${busyClass} busy-card">

                                <h3 class="busy-heading ${busyClass}">
                                    ${location.group.name}
                                    <i class="fa fa-desktop"></i>
                                </h3>

                                <span class="busy-text">
                                    ${statusText}<br>
                                    Computers Available:
                                    ${machinesAvailable} / ${machinesTotal}
                                </span>

                                <div class="progress">
                                    <div
                                        id="occupancy_bar"
                                        class="progress-bar ${progressColor}"
                                        role="progressbar"
                                        aria-valuenow="${percentAvailable}"
                                        aria-valuemin="0"
                                        aria-valuemax="100"
                                        style="width:${percentAvailable}%;">
                                    </div>
                                </div>
                    `;

                    if (
                        slugs[idIndex] &&
                        slugs[idIndex] !== ''
                    ) {
                        const url = `${baseUrl}${slugs[idIndex]}/`;

                        html += `
                            <a
                                class="btn btn-default"
                                href="${url}"
                                title="View ${location.group.name} Computer Map">
                                View Computer Map
                            </a>
                        `;
                    } else {
                        html += `
                            <a
                                class="btn btn-default disabled"
                                href="#"
                                title="${location.group.name} Computer Map Disabled">
                                View Computer Map
                            </a>
                        `;
                    }
                     html += `
                            </div>
                        </div>
                    `;
                });
                const updated = new Date().toLocaleTimeString([], {
                    hour: 'numeric',
                    minute: '2-digit'
                });

                html += `
                    </div>
                    <p class="availability-updated">
                        Availability data last updated at ${updated}.
                    </p>
                `;
            container.innerHTML = html;
        })
        .catch(error => {

                console.error(error);

                container.innerHTML =
                    '<p>Unable to determine computer availability.</p>';

        });

}

document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.computer-availability-container').forEach(container => {

        const refreshData = () => {
            fetchComputerAvailabilityData(container);
        };
        refreshData();
        setInterval(() => {
            if (!document.hidden) {
                refreshData();
            }
        }, 360000);   // Refresh every 6 minutes

    });

});