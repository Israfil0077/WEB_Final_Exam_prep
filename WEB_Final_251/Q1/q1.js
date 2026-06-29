let attempts = 0;

function pass() {
    let input1 = document.getElementById('input1').value;
    attempts++;

    let point = 0;

    // Length: +10 for every 2 characters (min 6 required)
    if (input1.length >= 6) {
        point += Math.floor(input1.length / 2) * 10;
    }

    // Uppercase: +15
    if (/[A-Z]/.test(input1)) point += 15;

    // Lowercase: +15
    if (/[a-z]/.test(input1)) point += 15;

    // Numbers: +20
    if (/[0-9]/.test(input1)) point += 20;

    // Special characters: +25
    if (/[!@#$%^&*]/.test(input1)) point += 25;

    let msg = '';

    if (input1.length < 6) {
        msg = "Too short! Minimum 6 characters required.";
    } else if (point >= 100) {
        msg = "Perfect Password! Score: " + point;
    } else if (point >= 91) {
        msg = "Very Strong. Score: " + point;
    } else if (point >= 71) {
        msg = "Strong. Score: " + point;
    } else if (point >= 51) {
        msg = "Medium. Score: " + point;
    } else if (point >= 31) {
        msg = "Weak. Score: " + point;
    } else {
        msg = "Very Weak. Score: " + point;
    }

    // More than 8 attempts without reaching Strong
    if (attempts > 8 && point < 71) {
        msg += " | Need practice! Tips: Use uppercase, numbers & special chars (!@#$%).";
    }

    document.getElementById('show').innerText = msg;
}
