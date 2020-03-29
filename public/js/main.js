const planning = document.getElementById('planning');

if (planning) {
    planning.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger delete-planning') {
            if (confirm('Are you sure?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/planning/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    });
}