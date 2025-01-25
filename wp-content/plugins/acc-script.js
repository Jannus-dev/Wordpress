document.addEventListener('DOMContentLoaded', function () {
    const button = document.getElementById('acc-button');

    button.addEventListener('click', function () {
        fetch(acc_ajax.ajax_url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'action=acc_update_count',
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    button.textContent = `Clicked ${data.data} times`;
                }
            })
            .catch((error) => console.error('Error:', error));
    });
});
