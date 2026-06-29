# 📚 UIU Web Programming — Final Exam Prep

Solved final exam questions for **CSE 4165 / CSE 465 Web Programming** at United International University (UIU).  
If you have an exam coming up, this repo is all you need. Every question from 4 past papers is solved and organized by trimester.

---

## 📁 Folder Structure

```
WEB_Final_Exam_prep/
│
├── Final_Exam_question_Web_programming.pdf   ← All 4 past papers in one PDF
│
├── WEB_Final_243/   ← Fall 2024
│   ├── Q1/          ← JavaScript: Number Guessing Game
│   └── Q2/          ← PHP: Pizza Party Calculator
│
├── WEB_Final_251/   ← Spring 2025
│   ├── Q1/          ← JavaScript: Password Strength Checker
│   ├── Q2/          ← PHP: Venue Booking Calculator
│   └── Q3/          ← PHP + MySQL: Employee Database (uiutech_final)
│
├── WEB_Final_252/   ← Summer 2025
│   ├── Q1/          ← JavaScript: Calorie Tracker
│   │   ├── q1.html / q1.js          ← Full solution
│   │   └── q1_template.html / .js   ← Blank template to practice
│   ├── Q2/          ← PHP: Movie Screen Calculator
│   │   ├── q2.php        ← Full solution
│   │   └── template.php  ← Reusable PHP form template
│   └── Q3/          ← PHP + MySQL: Sales Database (sundarban)
│
└── WEB_Final_253/   ← Fall 2025
    ├── Q1/          ← JavaScript: (in progress)
    ├── Q2/          ← PHP: Sales Performance System
    └── Q3/          ← PHP + MySQL: Library Database (campus_library)
```

---

## 🧠 Exam Pattern (Read This First)

Every paper has **exactly 3 questions** worth **30 marks total**:

| Q | Topic | Marks | What it always asks |
|---|-------|-------|---------------------|
| 1 | JavaScript | 10 | HTML input + JS function + if/else tiers + attempt counter |
| 2 | PHP | 10 | HTML form → `$_POST` → `ceil()` math → table output |
| 3 | PHP + MySQL | 10 | 4 sub-queries: GROUP BY, UPDATE, conditional UPDATE with cap, SELECT with label |

> Once you understand the pattern, every question becomes the same problem with different variable names.

---

## ⚡ Quick Reference

### JavaScript Template (Q1)

Every JS question follows this structure:

```javascript
// Global variables — must be outside the function
let total = 0;
let attempts = 0;
const GOAL = 2000;

function pass() {
    let input1 = Number(document.getElementById('input1').value);
    total += input1;
    attempts++;

    let msg = '';
    if (total <= 800)       msg = "You're off to a healthy start!";
    else if (total <= 1600) msg = "Good progress, keep it balanced!";
    else if (total < 2000)  msg = "Almost at your limit!";
    else                    msg = "Goal reached! Stay mindful!";

    // Special rule: too many attempts without reaching goal
    if (attempts > 10 && total < GOAL) msg = "Be cautious of frequent snacking!";

    document.getElementById('show').innerText = msg;
    document.getElementById('input1').value = '';  // clear input
}
```

```html
<!-- HTML side — always the same structure -->
<input type="number" id="input1">
<button onclick="pass()">Add</button>
<p id="show"></p>
<script src="q1.js"></script>
```

---

### PHP Template (Q2)

Every PHP question uses `ceil()`. The formula never changes:

```php
<!DOCTYPE html>
<html lang="en">
<body>
    <form action="" method="POST">
        input1: <input type="number" name="input1"><br><br>
        input2: <input type="number" name="input2"><br><br>
        input3: <input type="number" name="input3"><br><br>
        <button name="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input1 = (int)$_POST['input1'];
        $input2 = (int)$_POST['input2'];
        $input3 = (int)$_POST['input3'];

        // --- your logic here ---
        $output1 = ceil($input1 / $input2);              // always ceil() for "minimum units"
        $output2 = ($output1 * $input2) - $input1;       // empty seats / leftover
        $output3 = $output2 * $input3;                   // wasted money

        echo "<table border='1'>";
        echo "<tr>
                <th>Input1</th><th>Input2</th><th>Input3</th>
                <th>Output1</th><th>Output2</th><th>Output3</th>
              </tr>";
        echo "<tr>
                <td>$input1</td><td>$input2</td><td>$input3</td>
                <td>$output1</td><td>$output2</td><td>$output3</td>
              </tr>";
        echo "</table>";
    }
    ?>
</body>
</html>
```

---

### MySQL Template (Q3)

Q3 always has exactly 4 sub-questions. Learn these 4 patterns:

```php
$conn = new mysqli("localhost", "root", "", "db_name");
if ($conn->connect_error) die("Failed: " . $conn->connect_error);

// Q3.1 — COUNT + GROUP BY (+ HAVING if "only include" appears)
$sql = "SELECT Status, COUNT(*) AS total
        FROM book_loans
        GROUP BY Status
        HAVING COUNT(*) > 1";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo $row['Status'] . ": " . $row['total'] . "<br>";
}

// Q3.2 — UPDATE with WHERE condition
$sql = "UPDATE book_loans
        SET Status = 'Grace Period', PenaltyFee = 0
        WHERE Status = 'Overdue' AND DaysOverdue < 7";
$conn->query($sql);

// Q3.3 — Conditional UPDATE with cap (bonus/penalty)
// Cap check goes inside WHERE — not in PHP
$sql = "UPDATE book_loans
        SET PenaltyFee = PenaltyFee * 1.10
        WHERE PenaltyFee > 20
          AND (PenaltyFee * 1.10) <= 50";
$conn->query($sql);

// Q3.4 — SELECT with label or sort
$sql = "SELECT BookTitle, SUM(PenaltyFee) AS total_fee
        FROM book_loans
        GROUP BY BookTitle
        ORDER BY total_fee DESC";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo $row['BookTitle'] . " — " . $row['total_fee'] . "<br>";
}
```

---

## 🗄️ SQL Files Included

Import these into phpMyAdmin before running the PHP files:

| File | Database | Table |
|------|----------|-------|
| `WEB_Final_251/Q3/employee_final.sql` | `uiutech_final` | `employee_final` |
| `WEB_Final_252/Q3/sales_data.sql` | `sundarban` | `sales_data` |
| `WEB_Final_253/Q3/book_loans.sql` | `campus_library` | `book_loans` |

### How to import:
1. Open **phpMyAdmin** → `http://localhost/phpmyadmin`
2. Click **Import** tab
3. Choose the `.sql` file → click **Go**

---

## 💻 XAMPP Setup (First Time? Start Here)

XAMPP is a free tool that lets you run PHP and MySQL on your own computer. You need this to run the PHP and MySQL files in this repo.

### Step 1 — Download XAMPP

1. Go to 👉 [https://www.apachefriends.org](https://www.apachefriends.org)
2. Click **Download** for Windows (or your OS)
3. Run the installer — keep clicking **Next** with default settings
4. Install location will be `C:\xampp\` — don't change this

### Step 2 — Start XAMPP

1. Open **XAMPP Control Panel** (search it in Start menu)
2. Click **Start** next to **Apache** → turns green ✅
3. Click **Start** next to **MySQL** → turns green ✅

> If Apache doesn't start, port 80 is blocked. Click **Config** → **Apache (httpd.conf)** → find `Listen 80` → change to `Listen 8080`. Then use `http://localhost:8080/` instead of `http://localhost/` everywhere below.

### Step 3 — Put the repo inside htdocs

`htdocs` is the folder where XAMPP looks for your PHP files.

1. Open `C:\xampp\htdocs\`
2. Clone or paste this entire repo folder there

It should look like this:
```
C:\xampp\htdocs\
└── WEB_Final_Exam_prep-main\
    ├── WEB_Final_243\
    ├── WEB_Final_251\
    ├── WEB_Final_252\
    └── WEB_Final_253\
```

### Step 4 — Import SQL files into phpMyAdmin

You need to do this **before** running any Q3 file.

1. Open your browser → go to `http://localhost/phpmyadmin`
2. Click **New** on the left sidebar → type the database name → click **Create**

| Database name to create | SQL file to import |
|-------------------------|--------------------|
| `uiutech_final` | `WEB_Final_251/Q3/employee_final.sql` |
| `sundarban` | `WEB_Final_252/Q3/sales_data.sql` |
| `campus_library` | `WEB_Final_253/Q3/book_loans.sql` |

3. Click on the database you just created (left sidebar)
4. Click the **Import** tab at the top
5. Click **Choose File** → select the `.sql` file → click **Go**
6. You should see a success message — the table and data are now loaded

### Step 5 — Open in browser

| File type | Where to open |
|-----------|--------------|
| `q1.html` (JavaScript) | Double-click to open directly in browser — no XAMPP needed |
| `q2.php` (PHP) | `http://localhost/WEB_Final_Exam_prep-main/WEB_Final_243/Q2/q2.php` |
| `q3.php` (PHP + MySQL) | `http://localhost/WEB_Final_Exam_prep-main/WEB_Final_251/Q3/q3.php` |

**URL pattern to remember:**
```
http://localhost/  [folder name]  /  [Q folder]  /  [filename]
```

**Example URLs for each trimester:**
```
http://localhost/WEB_Final_Exam_prep-main/WEB_Final_243/Q2/q2.php
http://localhost/WEB_Final_Exam_prep-main/WEB_Final_251/Q2/q2.php
http://localhost/WEB_Final_Exam_prep-main/WEB_Final_251/Q3/q3.php
http://localhost/WEB_Final_Exam_prep-main/WEB_Final_252/Q2/q2.php
http://localhost/WEB_Final_Exam_prep-main/WEB_Final_252/Q3/q3.php
http://localhost/WEB_Final_Exam_prep-main/WEB_Final_253/Q2/q2.php
http://localhost/WEB_Final_Exam_prep-main/WEB_Final_253/Q3/q3.php
```

---

## 🛠️ How to Run

### JavaScript (Q1)
1. Open the `Q1/` folder
2. Open `q1.html` directly in your browser — no server needed

### PHP (Q2)
1. Move the `Q2/` folder into `htdocs/` (XAMPP) or `www/` (WAMP)
2. Start Apache from XAMPP/WAMP control panel
3. Open `http://localhost/Q2/q2.php` in your browser

### PHP + MySQL (Q3)
1. Import the `.sql` file into phpMyAdmin first
2. Move the `Q3/` folder into `htdocs/`
3. Open `http://localhost/Q3/q3.php` in your browser

---

## ✅ Exam Day Checklist

- [ ] JS: global variables are **outside** the function
- [ ] JS: link `<script src="q1.js">` at the **bottom** of `<body>`
- [ ] JS: clear input after each click → `document.getElementById('input1').value = ''`
- [ ] PHP: closing tags use **forward slash** `/` not backslash `\`
- [ ] PHP: all `<td>` and `<th>` tags go **inside** the echo string quotes
- [ ] PHP: use `ceil()` for "minimum complete units" (screens, venues, pizzas)
- [ ] MySQL: Q3.3 cap condition goes inside `WHERE`, not in PHP
- [ ] MySQL: import the `.sql` file before running `q3.php`

---

## 📌 Common Mistakes to Avoid

| Mistake | Fix |
|---------|-----|
| `echo "<tr>" <td>$var</td> "</tr>"` | Everything must be inside the quotes: `echo "<tr><td>$var</td></tr>"` |
| `echo "</table>"` written as `echo "<\table>"` | Use `/` not `\` for closing HTML tags |
| JS variable declared inside function resets every click | Declare counter/total in **global scope** |
| PHP form not submitting | Add a space: `action="" method="POST"` not `action=""method="POST"` |
| MySQL runs before DB is imported | Import `.sql` file in phpMyAdmin first |

---

## 👤 Author

**Md.Israfil Hossain (ID-0112230585)** — UIU CSE student  
Prepared this repo the night before the final. If it helped you, give it a ⭐ and share it with your batch.

> Pull requests welcome — if you solve a missing question (like `WEB_Final_253/Q1`), add it in!
