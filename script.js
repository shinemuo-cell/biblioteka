const mysql = require('mysql');
const express = require('express');
//sujungiama
const app = express();
const db = mysql.createConnection({
    host: 'localhost',
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
    console.log('Prisijungta');

    const createTableQuery= `
    CREATE TABLE IF NOT EXISTS books(
    id INT AUTO_INCREMENT PROMARY KEY,
    name VARCHAR(100),
    author VARCHAR(100),
    metai INT,
    isbn INT,
    kiekis INT
    )`;
    
    db.query(createTableQuery, (err,result)=>{
        if(err)throw err;
        console.log('Lentele sukurta');
    });

    
});

// Visu knygu isvedimas
app.get('/books', (req, res) => {
  db.query('SELECT * FROM books', (err, results) => {
    if (err) throw err;
    res.render('books', { books: results });
  });
});

app.listen(3000, () => {
  console.log('Serveris paleistas http://localhost:3000');
});
