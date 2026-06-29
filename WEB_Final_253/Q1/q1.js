const GOAL = 2000;
let total_calory = 0;
let count = 0;

function pass() {
    count++;
    let input1 = Number(document.getElementById('input1').value);
    total_calory += input1;

    let msg = '';

    if (total_calory >= 0 && total_calory <= 800) {
        msg = "You're off to a healthy start!";
    } else if (total_calory >= 801 && total_calory <= 1600) {
        msg = "Good progress, keep it balanced!";
    } else if (total_calory >= 1601 && total_calory <= 1999) {
        msg = "Almost at your limit!";
    } else {
        msg = "Goal reached! Stay mindful!";
    }

    // Special rule: more than 10 entries without reaching goal
    if (count > 10 && total_calory < GOAL) {
        msg = "Be cautious of frequent snacking!";
    }

    document.getElementById('feedback_message').innerText = msg;
    document.getElementById('total_calory').innerText = "Total Calories: " + total_calory;
    document.getElementById('entry').innerText = "Entries: " + count;
    document.getElementById('input1').value = '';
}
