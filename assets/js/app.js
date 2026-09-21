// TETAP: seluruh file ini sama dengan proyek Rental, tidak ada yang diganti.

// ===== Hamburger menu =====
function initNavToggle() {
    const toggleBtn = document.getElementById("nav-toggle-btn");
    const nav = document.querySelector("header nav");
    if (!toggleBtn || !nav) return;

    toggleBtn.addEventListener("click", function () {
        nav.classList.toggle("nav-open");
    });
}

// ===== Konfirmasi hapus =====
// Memakai event delegation di document. Tombol .btn-hapus mengirim
// permintaan hapus ke server (POST) lewat data-id dan data-action,
// sehingga data di database ikut terhapus.
function initHapusConfirm() {
    document.addEventListener("click", function (e) {
        const btn = e.target.closest(".btn-hapus");
        if (!btn) return;

        const row = btn.closest("tr");
        const nama = btn.dataset.nama || (row ? row.querySelector("td")?.textContent : "data ini");
        const yakin = confirm("Yakin ingin menghapus \"" + nama + "\"?");
        if (!yakin) return;

        if (btn.dataset.id && btn.dataset.action) {
            const form = document.createElement("form");
            form.method = "post";
            form.action = btn.dataset.action;

            const input = document.createElement("input");
            input.type = "hidden";
            input.name = "id";
            input.value = btn.dataset.id;

            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        } else if (row) {
            row.remove();
        }
    });
}

// ===== Filter/pencarian tabel real-time =====
function initTableFilter() {
    const input = document.getElementById("search-input");
    const table = document.querySelector(".table-responsive table");
    if (!input || !table) return;

    input.addEventListener("keyup", function () {
        const keyword = input.value.toLowerCase();
        const rows = table.querySelectorAll("tbody tr");
        rows.forEach(function (row) {
            const teks = row.textContent.toLowerCase();
            row.style.display = teks.includes(keyword) ? "" : "none";
        });
    });
}

// ===== Validasi form (client-side) =====
function tampilkanError(input, pesan) {
    hapusError(input);
    const span = document.createElement("span");
    span.className = "error";
    span.textContent = pesan;
    input.insertAdjacentElement("afterend", span);
}

function hapusError(input) {
    const next = input.nextElementSibling;
    if (next && next.classList.contains("error")) {
        next.remove();
    }
}

// Semua input ber-atribut "required" wajib diisi. Input angka juga
// dicek terhadap atribut min dan max miliknya.
function initValidasiForm() {
    const form = document.getElementById("form-tambah");
    if (!form) return;

    form.addEventListener("submit", function (e) {
        let valid = true;

        form.querySelectorAll("input[required]").forEach(function (input) {
            hapusError(input);

            if (input.value.trim() === "") {
                tampilkanError(input, "Field ini wajib diisi.");
                valid = false;
                return;
            }

            if (input.type === "number") {
                const nilai = parseInt(input.value, 10);
                const min = input.min !== "" ? parseInt(input.min, 10) : null;
                const max = input.max !== "" ? parseInt(input.max, 10) : null;

                if (isNaN(nilai)) {
                    tampilkanError(input, "Isi dengan angka.");
                    valid = false;
                } else if (min !== null && max !== null && (nilai < min || nilai > max)) {
                    tampilkanError(input, "Nilai harus di antara " + min + " dan " + max + ".");
                    valid = false;
                } else if (min !== null && nilai < min) {
                    tampilkanError(input, "Nilai minimal " + min + ".");
                    valid = false;
                }
            }
        });

        if (!valid) {
            e.preventDefault();
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    initNavToggle();
    initHapusConfirm();
    initTableFilter();
    initValidasiForm();
});
