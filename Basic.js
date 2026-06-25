//This guide is designed for the Browser Console. To run these scripts, open
//Google Chrome or Firefox, right-click anywhere, select Inspect, navigate to the
//Console tab, paste your code, and hit Enter.
// 1 Essential JavaScript Coding Elements


// 1.1 Inputs and Outputs
// When practicing JS without HTML, we use prompt() to take inputs from the user and
// console.log() to display the output. Note: prompt() always returns a String. If you
// need a number, you must convert it using Number() or parseInt().


 // Outputting a message
console . log(" Welcome to JavaScript !") ;

// Taking string input
let userName = prompt (" What is your name ?") ;
console . log("Hello , " + userName ) ;

// Taking numeric input
let ageInput = prompt (" Enter your age:") ;
let age = Number ( ageInput ) ; // Conversion
console . log(" You will be " + ( age + 1) + " next year .") ;

// 1.2 Variables and Data Types
// Variables store data. Use const for values that never change, and let for values that
// will change.

const pi = 3.14159; // Number ( Constant )
let score = 0; // Number ( Variable )
let isGameOver = false ; // Boolean
let playerName = " John "; // String


// 1.3 Operators (Arithmetic & Logical)
// Operators are used to perform calculations or evaluate conditions.

// Arithmetic
let sum = 10 + 5;
let remainder = 10 % 3; // Modulus ( Returns 1)
// Comparison and Logical
let isAdult = ( age >= 18) ;
let hasTicket = true ;
let canEnter = ( isAdult && hasTicket ) ; // Logical AND

// 1.4 Control Flow (If/Else)
// Used to make decisions in your code based on conditions.

let marks = Number ( prompt (" Enter your marks :") ) ;
if ( marks >= 80) {
 console . log(" You got an A+!") ;
} else if ( marks >= 40) {
 console . log(" You passed .") ;
} else {
 console . log(" You failed .") ;
}

// 1.5 Loops
// Loops repeat a block of code until a certain condition is met.
// For Loop ( ideal when you know how many iterations you need )

for ( let i = 1; i <= 3; i ++) {
 console . log(" Attempt number : " + i) ;
}
// While Loop ( ideal for continuing until a state changes )
let count = 3;
while ( count > 0) {
 console . log(" Countdown : " + count ) ;
 count --; // Decrement by 1
 }

//  1.6 Functions
// Functions encapsulate code so it can be reused multiple times.

// Defining a standard function
function calculateArea (width , height ) {
return width * height ;
}

// Using the function with prompt and console
let w = Number ( prompt (" Enter width :") ) ;
let h = Number ( prompt (" Enter height :") ) ;
let area = calculateArea (w, h) ;
console . log(" The area is: " + area ) ;

// 1.7 Arrays: Basics and Modification
// Arrays are special variables that hold multiple values. You can add, remove, and replace
// elements using built-in array methods.

let fruits =[" Apple ", " Banana "];

// Adding elements
fruits . push (" Mango ") ; // Adds to the end -> [" Apple " , " Banana" , " Mango "]
fruits . unshift (" Kiwi ") ; // Adds to the beginning - >[" Kiwi " , "Apple " , " Banana " , " Mango "]

// Removing elements
fruits . pop () ; // Removes from the end - >[" Kiwi " , "Apple " , " Banana "]
fruits . shift () ; // Removes from the beginning -> [" Apple" , " Banana "]

// Splice : array . splice ( startIndex , deleteCount , newItems ...)
fruits . splice (1 , 1 , " Orange ") ; // Replaces " Banana " with " Orange "-> [" Apple " , " Orange "]


// 1.8 Advanced Array Methods (Map, Filter, Reduce)

// These are powerful methods that loop through arrays and return new data without chang-
// ing the original array.
let nums =[10 , 20 , 30];

// 1. map (): Transforms every element
let doubled = nums . map(n => n * 2) ;
console . log( doubled ) ; // Output :[20 , 40 , 60]

// 2. filter (): Keeps elements that pass a true / false test
let over15 = nums . filter (n => n > 15) ;
console . log( over15 ) ; // Output :[20 , 30]

// 3. reduce (): Boils the array down to a single value
let sum = nums . reduce (( total , n) => total + n, 0) ;
console . log( sum) ; // Output : 60

// Accessing Previous/Next Elements in Filter
// When using methods like filter(), the callback provides three arguments: the current
// element, its index, and the original array. You can use the index to look backward or
// forward.

let temps = [20 , 22 , 21 , 25];
// Keep days that are hotter than the previous day
let hotterDays = temps . filter (( temp , index , array ) => {
// Check boundaries : skip the first day because it has no previous day

    if ( index === 0) return false ;

    let prevTemp = array [ index - 1]; // Access the previous element
    return temp > prevTemp ; // Keep if true
}) ;
console . log( hotterDays ) ; // Output :[22 , 25]


// 2 Standard Practice Problems (With Solutions)

// Problem 1: Temperature Converter
// Task: Ask the user for a temperature in Celsius. Convert it to Fahrenheit and print the
// result.
let celsiusStr = prompt (" Enter temperature in Celsius :") ;
let celsius = Number ( celsiusStr ) ;
let fahrenheit = ( celsius * 9/5) + 32;
console . log( celsius + "C is equal to " + fahrenheit + "F.") ;

// Problem 2: Even or Odd Checker
// Task: Ask the user for a number. Print whether the number is Even or Odd.
let num = Number ( prompt (" Enter a number to check Even / Odd:") ) ;
if ( num % 2 === 0) {
console . log( num + " is an Even number .") ;
} else {
console . log( num + " is an Odd number .") ;
}

// Problem 3: Simple ATM Logic (Functions & Flow)
// Task: Initialize a balance of 5000. Ask the user if they want to ’withdraw’ or ’deposit’.
// Ask for the amount. Warn them if they try to withdraw more than they have.

let balance = 5000;
let action = prompt (" Type ’withdraw ’ or ’deposit ’:") ;
let amount = Number ( prompt (" Enter the amount :") ) ;

function processTransaction ( actionType , amt) {
    if ( actionType === " deposit ") {
        balance += amt;
        console . log(" Deposited : " + amt + ". New Balance : " +balance ) ;
    } else if ( actionType === " withdraw ") {
        if ( amt > balance ) {
        console . log(" Error : Insufficient funds !") ;
        } else {
        balance -= amt;
        console . log(" Withdrew : " + amt + ". New Balance : " +balance ) ;
        }
    }
}
processTransaction ( action , amount ) ;

// Problem 4: Array Filter - Student Grades
// Task: Given an array of grades, ask the user for a passing threshold. Use filter() to
// print only the passing grades.

let grades =[45 , 82 , 33 , 90 , 67 , 50];
let passingScore = Number ( prompt (" Enter the passing score (e.g. ,60):") ) ;

let passingGrades = grades . filter ( grade => grade >= passingScore );
console . log(" Passing grades : " + passingGrades ) ;