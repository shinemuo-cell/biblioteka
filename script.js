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
function newBookOpenForm(){
    document.getElementById("newBook").style.display="block";
}
function newBookCloseForm(){
    document.getElementById("newBook").style.display="none";
}

function addBookOpenForm(){
    document.getElementById("addBook").style.display="block";
}
function addBookCloseForm(){
    document.getElementById("addBook").style.display="none";
}

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

document.getElementById("userSelect").addEventListener("change", function(){
    let userId = this.value;
    fetch("getBooks.php?user_id=" + userId)
        .then(response => response.json())
        .then(data => {
            let bookSelect = document.getElementById("bookSelect");
            bookSelect.innerHTML = "";

            data.forEach(book => {
                let opt = document.createElement("option");
                opt.value = book.id;
                opt.textContent = book.title;
                bookSelect.appendChild(opt);
            });
        });
});

// slaptazodzio matomumas
document.addEventListener('DOMContentLoaded', () => {
    const passInput = document.getElementById('pass');
    const toggleBtn = document.getElementById('togglePass');
    const passHelp = document.getElementById('passHelp');

    // Show/Hide toggle
    if (passInput && toggleBtn) {
        toggleBtn.addEventListener('click', () => {
            if (passInput.type === 'password') {
                passInput.type = 'text';
                toggleBtn.textContent = 'Hide';
            } else {
                passInput.type = 'password';
                toggleBtn.textContent = 'Show';
            }
        });
    }

    // Password strength check
    passInput.addEventListener('input', () => {
        const val = passInput.value;
        const strongPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
        if (strongPattern.test(val)) {
            passHelp.textContent = "Slaptažodis stiprus ✅";
            passHelp.style.color = "green";
        } else {
            passHelp.textContent = "Slaptažodis turi būti bent 8 simboliai, su didžiąja, mažąja, skaičiumi ir specialiu simboliu ❌";
            passHelp.style.color = "red";
        }
    });
});
/*
Strength check: Regex ensures the password has:

At least 8 characters

At least 1 lowercase

At least 1 uppercase

At least 1 number

At least 1 special character (!@#$%^&*, etc.)

Shows a small help text in red/green as user types.
*/

