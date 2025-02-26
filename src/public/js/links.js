let links = document.querySelectorAll('.links-update-clicks');

for (let i = 0; i < links.length; i++) {
    links[i].addEventListener('click', function (e) {
        e.preventDefault();
        let link_id = this.getAttribute('id').replace('link-', '');

        fetch('/dashboard/updateClicks', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            },
            body: JSON.stringify({
                link_id: link_id
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    window.open(this.href, '_blank');
                    window.location.reload();
                }
            })
            .catch(error => console.error("Error en la solicitud:", error));
    });
}