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

function addBookOpenForm(){
    document.getElementById("userBook").style.display="block";
}
function addBookCloseForm(){
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

