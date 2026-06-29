let point=0;
function pass(){
    let input1= document.getElementById("input1").value;
    if(input1.length>=6){
        point+=Math.floor(input1.length/2)*10;

        for(let i=0; i<input1.length;i++){
            if(input1[i]>='A' && input1[i]<='Z'){
                point+=15;
                break;
            }
        }
        for(let i=0; i<input1.length;i++){
            if(input1[i]>='a' && input1[i]<='z'){
                point+=15;
                break;
            }
        }
        for(let i=0; i<input1.length;i++){
            if(input1[i]>='0' && input1[i]<='9'){
                point+=20;
                break;
            }
        }
        for(let i=0; i<input1.length;i++){
            if(input1[i]=='!'|| input1[i]=='@'|| input1[i]=='#'|| input1[i]=='$'|| input1[i]=='%'||input1[i]=='^'||input1[i]=='&'||input1[i]=='*'){
                point+=25;
                break;
            }
        }
        if(point>100){
            document.getElementById("show").innerText="Perfect Password";
        }else if(point>90){
            document.getElementById("show").innerText="Very_strong";
        }else if(point>70){
            document.getElementById("show").innerText="Strong";
        }else if(point>50){
            document.getElementById("show").innerText="Medium";
        }else if(point>30){
            document.getElementById("show").innerText="Weak";
        }else{
            document.getElementById("show").innerText="Very Weak";
        }        
    }
    else{
        document.getElementById("show").innerText="very week";
    }
}