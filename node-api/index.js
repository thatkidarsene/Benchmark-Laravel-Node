const express = require('express');
const mysql = require('mysql2/promise');

const app = express();
const pool = mysql.createPool({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'testdb'
});

app.get('/users', async (req, res) => {
  const [rows] = await pool.query("SELECT id, name, email FROM users LIMIT 1000");
  res.json(rows);
});

app.listen(3000, () => console.log('Node API on port 3000'));
