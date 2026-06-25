// Global state management
const Goal = 2000;
let totalcalorie = 0;
let entrycount = 0;

// Attach event listener
document.getElementById("addbtn").addEventListener("click", function () {

    let inputField = document.getElementById("calorieInput");

    let mealcal = parseInt(inputField.value);

    if (isNaN(mealcal) || mealcal <= 0) return;

    totalcalorie += mealcal;
    entrycount++;

    let feedback = "";

    if (totalcalorie <= 800) {
        feedback = "You're off to a healthy start!";
    } else if (totalcalorie <= 1600) {
        feedback = "Good progress, Keep it balanced!";
    } else if (totalcalorie <= 1999) {
        feedback = "Almost at your limit!";
    } else {
        feedback = "Goal reached! Stay mindful!";
    }
    if (entrycount > 10 && totalcalorie < Goal) {
        feedback = "Be cautious of frequent snacking!";
    }

    document.getElementById("feedbackLabel").innerHTML =
        `Total Calories: ${totalcalorie} / ${Goal}<br>
         Feedback: ${feedback}`;

    inputField.value = "";
});