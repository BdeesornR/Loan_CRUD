import Swal from "sweetalert2";

window.onView = function onView(id) {
    window.location.href = "/details/" + id;
};

window.onEdit = function onEdit(id) {
    window.location.href = "/edit/" + id;
};

window.onDelete = function onDelete(id) {
    fetch("/delete/" + id, {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')[
                "content"
            ],
        },
    })
        .then((res) => {
            console.log(res);
            Swal.fire({
                icon: "success",
                title: "Success",
                text: "The selected Loan has been delete.",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/main";
            });
        })
        .catch((err) => {
            console.log(err);
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: err.data.message,
                confirmButtonText: "OK",
            });
        });
};
