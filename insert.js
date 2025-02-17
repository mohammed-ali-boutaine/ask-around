import fs from "fs";
import sqlite3 from "sqlite3";

// Step 1: Connect to SQLite Database (or create it)
const db = new sqlite3.Database("database/database.sqlite", (err) => {
    if (err) {
        console.error("Error opening database:", err);
    } else {
        console.log("Connected to SQLite database.");
    }
});

// Step 2: Create Table if not exists
db.run(`CREATE TABLE IF NOT EXISTS villes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT UNIQUE
)`, (err) => {
    if (err) console.error("Error creating table:", err);
    else console.log("Table 'villes' is ready.");
});

// Step 3: Read JSON File
fs.readFile("cities.json", "utf8", (err, data) => {
    if (err) {
        console.error("Error reading JSON file:", err);
        return;
    }

    const cities = JSON.parse(data);

    // Step 4: Insert Data into Table
    const stmt = db.prepare("INSERT OR IGNORE INTO villes (name) VALUES (?)");

    cities.forEach((city) => {
        stmt.run(city, (err) => {
            if (err) {
                console.error(`Error inserting ${city}:`, err);
            }
        });
    });

    stmt.finalize(() => {
        console.log("Data insertion completed!");
        db.close();
    });
});
