// --- State Management ---
let students = [
    { id: 1, name: "Ahmad Dahlan", subject: "Matematika", score: 85 },
    { id: 2, name: "Siti Aminah", subject: "IPA", score: 92 },
    { id: 3, name: "Budi Utomo", subject: "Bahasa Inggris", score: 58 },
    { id: 4, name: "Ratna Sari", subject: "IPS", score: 75 },
];

// --- DOM Elements ---
const tableBody = document.getElementById("student-table-body");
const emptyState = document.getElementById("empty-state");
const searchInput = document.getElementById("search-input");
const modalOverlay = document.getElementById("modal-overlay");
const studentForm = document.getElementById("student-form");
const modalTitle = document.getElementById("modal-title");

// Inputs
const idInput = document.getElementById("student-id");
const nameInput = document.getElementById("name");
const subjectInput = document.getElementById("subject");
const scoreInput = document.getElementById("score");

// Stats Elements
const totalEl = document.getElementById("total-students");
const avgEl = document.getElementById("class-average");
const passedEl = document.getElementById("passed-students");

// --- Functions ---

// Render Table
function renderTable(data = students) {
    tableBody.innerHTML = "";

    if (data.length === 0) {
        emptyState.style.display = "block";
    } else {
        emptyState.style.display = "none";
        data.forEach((student) => {
            const tr = document.createElement("tr");
            const status = student.score >= 70 ? "Lulus" : "Remedial";
            const statusClass =
                student.score >= 70 ? "status-lulus" : "status-gagal";

            tr.innerHTML = `
                        <td><strong>${student.name}</strong></td>
                        <td>${student.subject}</td>
                        <td>${student.score}</td>
                        <td><span class="status-badge ${statusClass}">${status}</span></td>
                        <td style="text-align: right;">
                            <button class="btn btn-icon btn-edit" onclick="editStudent(${student.id})" title="Edit">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </button>
                            <button class="btn btn-icon btn-delete" onclick="deleteStudent(${student.id})" title="Hapus">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                            </button>
                        </td>
                    `;
            tableBody.appendChild(tr);
        });
    }
    updateStats();
}

// Update Statistics
function updateStats() {
    totalEl.textContent = students.length;

    if (students.length === 0) {
        avgEl.textContent = "0";
        passedEl.textContent = "0";
        return;
    }

    const totalScore = students.reduce((sum, s) => sum + parseInt(s.score), 0);
    const average = (totalScore / students.length).toFixed(1);
    avgEl.textContent = average;

    const passed = students.filter((s) => s.score >= 70).length;
    passedEl.textContent = passed;
}

// Open Modal (Add or Edit)
function openModal(isEdit = false) {
    modalOverlay.classList.add("open");
    if (!isEdit) {
        modalTitle.textContent = "Tambah Siswa";
        studentForm.reset();
        idInput.value = "";
    }
}

// Close Modal
function closeModal() {
    modalOverlay.classList.remove("open");
}

// Handle Add/Edit Submit
studentForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const id = idInput.value;
    const name = nameInput.value;
    const subject = subjectInput.value;
    const score = parseInt(scoreInput.value);

    if (id) {
        // Update Existing
        const index = students.findIndex((s) => s.id == id);
        if (index !== -1) {
            students[index] = { id: parseInt(id), name, subject, score };
            showToast("Data berhasil diperbarui", "success");
        }
    } else {
        // Create New
        const newStudent = {
            id: Date.now(), // Simple unique ID
            name,
            subject,
            score,
        };
        students.push(newStudent);
        showToast("Siswa berhasil ditambahkan", "success");
    }

    closeModal();
    renderTable();
});

// Edit Function
window.editStudent = function (id) {
    const student = students.find((s) => s.id === id);
    if (student) {
        idInput.value = student.id;
        nameInput.value = student.name;
        subjectInput.value = student.subject;
        scoreInput.value = student.score;
        modalTitle.textContent = "Edit Data Siswa";
        openModal(true);
    }
};

// Delete Function
window.deleteStudent = function (id) {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
        students = students.filter((s) => s.id !== id);
        renderTable();
        showToast("Data telah dihapus", "error");
    }
};

// Search Function
searchInput.addEventListener("input", (e) => {
    const keyword = e.target.value.toLowerCase();
    const filtered = students.filter(
        (s) =>
            s.name.toLowerCase().includes(keyword) ||
            s.subject.toLowerCase().includes(keyword),
    );
    renderTable(filtered);
});

// Toast Notification System
function showToast(message, type = "success") {
    const toast = document.getElementById("toast");
    const msgEl = document.getElementById("toast-message");

    msgEl.textContent = message;
    toast.className = `toast show ${type}`;

    setTimeout(() => {
        toast.classList.remove("show");
    }, 3000);
}

// Initial Render
renderTable();

// Close modal when clicking outside
modalOverlay.addEventListener("click", (e) => {
    if (e.target === modalOverlay) closeModal();
});
