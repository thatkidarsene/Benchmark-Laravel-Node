process.env.NODE_ENV = "production";
const express = require("express");
const mysql = require("mysql2/promise");

const app = express();
const pool = mysql.createPool({
  host: "127.0.0.1",
  user: "root",
  password: "",
  database: "testdb",
  port: 3306,
});

app.get("/users", async (req, res) => {
  const [rows] = await pool.query(
    "SELECT id, name, email FROM users LIMIT 1000"
  );
  res.json(rows);
});

app.listen(3000, () => console.log("Node API on port 3000"));
