function newBookOpenForm(){
    document.getElementById("newBook").style.display="block";
}
//forma parodoma
function newBookCloseForm(){
    document.getElementById("newBook").style.display="none";
}
//forma paslepiama

//cia tas pats tik kita forma (knygos kiekio didinimas)
function addBookOpenForm(){
    document.getElementById("addBook").style.display="block";
}
function addBookCloseForm(){
    document.getElementById("addBook").style.display="none";
}
function addBookForUserOpenForm(){
    document.getElementById("userBook").style.display="block";
}
function addBookForUserCloseForm(){
    document.getElementById("userBook").style.display="none";
}
	// Funkcijos vartotojo informacijos keitimo langui
function editUserOpenForm(){
    document.getElementById("editUser").style.display="block";
}
function editUserCloseForm(){
    document.getElementById("editUser").style.display="none";
}
// Funkcijos darbuotojams pridėti
function newEmployeeOpenForm() {
    document.getElementById("newEmployee").style.display = "block";
}
function newEmployeeCloseForm() {
    document.getElementById("newEmployee").style.display = "none";
}

function editEmployeeOpenForm(employeeId) {

    document.getElementById("editEmployee").style.display = "block";
    document.getElementById("edit_id").value = employeeId; // Nustato paslėptą ID lauką
}

function editEmployeeCloseForm() {
    document.getElementById("editEmployee").style.display = "none";
}

document.addEventListener("DOMContentLoaded", () => {

    // ------------------------------
    // PASSWORD SHOW / HIDE + VALIDATION
    // ------------------------------
    const passInput = document.getElementById("pass");
    const toggleBtn = document.getElementById("togglePass");
    const passHelp = document.getElementById("passHelp");
    const form = passInput?.closest("form");

    if (passInput && toggleBtn && passHelp && form) {

        // SHOW / HIDE
        toggleBtn.addEventListener("click", () => {
            if (passInput.type === "password") {
                passInput.type = "text";
                toggleBtn.textContent = "Slėpti";
            } else {
                passInput.type = "password";
                toggleBtn.textContent = "Rodyti";
            }
        });

        // LIVE WEAK/STRENGTH INDICATOR (YOU WERE MISSING THIS)
        passInput.addEventListener("input", () => {
            const val = passInput.value;
            const strongPattern =
                /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

            if (strongPattern.test(val)) {
                passHelp.textContent = "Slaptažodis stiprus";
                // passHelp.style.color = "green";
            } else {
                passHelp.textContent =
                    "Bent 8 simboliai, didžioji, mažoji, skaičius ir specialus simbolis";
                passHelp.style.color = "red";
            }
        });

        // BLOCK FORM SUBMIT IF WEAK
        form.addEventListener("submit", function (e) {
            const val = passInput.value;
            const strongPattern =
                /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

            if (!strongPattern.test(val)) {
                e.preventDefault();
                passHelp.textContent =
                    "Negalima registruotis su silpnu slaptažodžiu!";
                passHelp.style.color = "red";
                passInput.focus();
            }
        });
    }

});

document.getElementById('userSelect').addEventListener('change', function() {
    var userId = this.value;
    var bookSelect = document.getElementById('bookSelect');
    bookSelect.innerHTML = '<option value="">Pasirinkite knygą</option>';

    if(userId) {
        fetch('getBooks.php?user_id=' + userId)
            .then(response => response.json())
            .then(data => {
                data.forEach(book => {
                    var opt = document.createElement('option');
                    opt.value = book.id;
                    opt.textContent = book.name + ' (' + book.author + ')';
                    bookSelect.appendChild(opt);
                });
            });
    }
});