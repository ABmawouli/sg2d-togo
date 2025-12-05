 const ctx = document.getElementById('activityChart')?.getContext('2d');
        if (ctx) {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Janv', 'Févr', 'Mars', 'Avril', 'Mai', 'Juin'],
                    datasets: [{
                        label: 'Utilisateurs actifs',
                        data: [200, 250, 300, 280, 350, 400],
                        backgroundColor: 'rgba(0,123,255,0.2)',
                        borderColor: 'rgba(0,123,255,1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        }