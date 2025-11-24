const mysql = require('mysql');
const express = require('express');
//sujungiama
const app = express();
const db = mysql.createConnection({
    hots: 'localhost',
    user: 'user',
    password: 'password',
    database: 'mano_db'
});
//jungimo tikrinimas
db.connection(err=>{
    if(err){
        console.err('Nepavyko prisijungti prie DB:',err);
        return;
    }
    console.log('Prosijungta');

    const createTableQuery= `
    CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PROMARY KEY,
    name VARCHAR(100),
    surname VARCHAR(100),
    email VARCHAR(100)
    )`;
    
    db.query(createTableQuery, (err,result)=>{
        if(err)throw err;
        console.log('Lentele sukurta');
    });

    
});

// Vartotojo iterpimas
app.get('/add', (req, res) => {
  const insertQuery = `INSERT INTO users (name, email) VALUES ('Jonas', 'jonas@example.com')`;
  db.query(insertQuery, (err, result) => {
    if (err) throw err;
    res.send('Vartotojas pridėtas!');
  });
});

// Visu vartotoju isvedimas
app.get('/users', (req, res) => {
  db.query('SELECT * FROM users', (err, results) => {
    if (err) throw err;
    res.render('users', { users: results });
  });
});

app.listen(3000, () => {
  console.log('Serveris paleistas http://localhost:3000');
});

//vartotoju pateikimas
//<h1>Vartotojai</h1>
//  <ul>
//    <% users.forEach(user => { %>
//      <li><%= user.name %> – <%= user.email %></li>
//    <% }) %>
//  </ul>