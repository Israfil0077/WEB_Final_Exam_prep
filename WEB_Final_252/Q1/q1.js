const calory_goal=2000;
let total_calory =0;
let count =0;
function pass()
{
    count++;
    let input1= Number(document.getElementById('input1').value);    
    total_calory+=input1;
    if(total_calory>=0 && total_calory<=800){
        document.getElementById('feedback_message').innerText="You are of to a healthy start";
    }
    else if(total_calory>=801 && total_calory<=1600){
        document.getElementById('feedback_message').innerText="Good progress, keep it balanced!";
    }
    else if(total_calory>=1601 && total_calory<=1999){
        document.getElementById('feedback_message').innerText="Almost at your limit!";
    }
    else{
        document.getElementById('feedback_message').innerText="Goal reached!stay mindful!";
    }
    if(count>=10 && total_calory<calory_goal){
       document.getElementById('feedback_message').innerText="Be cautius of frequent snacking";
    }
    document.getElementById('total_calory').innerText="Total calory:"+total_calory;
    document.getElementById('entry').innerText="Entry: "+count;

    document.getElementById('input1').value="";
}