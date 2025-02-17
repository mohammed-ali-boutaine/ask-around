import fs from "fs"; 

fetch("https://countriesnow.space/api/v0.1/countries")
    .then((response) => response.json())
    .then((response) => {
        let cities = [];
        for (let row of response.data) {
            cities.push(...row.cities);
        }

        console.log("Total Cities:", cities.length); 
        const jsonData = JSON.stringify(cities, null, 2);

        fs.writeFile("cities.json", jsonData, (err) => {
            if (err) {
                console.error("Error writing file:", err);
            } else {
                console.log("File saved successfully as cities.json!");
            }
        });
    })
    .catch((error) => console.error("Error fetching data:", error));
