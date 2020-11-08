<html>
    
    <head>
        
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js" ></script>
        <script>
        
            $(document).ready(function(){
                
                //global variables
                var score = 0;
                var attempts = localStorage.getItem("total_attempts");
                
                //event listeners
                $("button").on("click", gradeQuiz);
                
                $(".q5Choice").on("click", function(){
                    $(".q5Choice").css("background","");
                    $(this).css("background","rgb(255, 255, 0)");
                });
                
                //I couldn't use filter as a way of determining if the
                //image was correct, so I just used background color
                $(".q10Choice").on("click", function(){
                    $(".q10Choice").css("background","");
                    $(".q10Choice").css("filter", "");
                    $(this).css("background","rgb(255, 255, 0)");
                    $(this).css("filter", "grayscale(100%)");
                });
                
                displayQ4Choices();
                
                function displayQ4Choices(){
                    let q4ChoicesArray = ["Maine", "Rhode Island", "Maryland", "Delaware"];
                    q4ChoicesArray = _.shuffle(q4ChoicesArray);
                    
                    for (let i = 0; i < q4ChoicesArray.length; i++){
                        $("#q4Choices").append(`<input type="radio" name="q4" id="${q4ChoicesArray[i]}" value="${q4ChoicesArray[i]}"><label for="${q4ChoicesArray[i]}">${q4ChoicesArray[i]}</label>`);
                    }
                }//displayQ4Choices
                
                //functions
                function isFormValid(){
                    let isValid = true;
                    if ($("#q1").val()==""){
                        isValid=false;
                        $("#validationFdbk").html("Question 1 was not answered");
                    }
                    return isValid;
                }
                
                function rightAnswer(index){
                    $(`#q${index}Feedback`).html("Correct!");
                    $(`#q${index}Feedback`).attr("class", "bg-success text-white");
                    $(`#markImg${index}`).html("<img src = 'img/checkmark.png' alt='checkmark'>");
                    score+=10;
                }
                
                function wrongAnswer(index){
                    $(`#q${index}Feedback`).html("Incorrect!");
                    $(`#q${index}Feedback`).attr("class", "bg-warning text-white");
                    $(`#markImg${index}`).html("<img src ='img/xmark.png' alt='xmark'>");
                }
                function gradeQuiz(){
                    
                    $("validationFdbk").html(""); //resets validation feedback
                    
                    if(!isFormValid()){
                        return;
                    }
                    
                    //variables
                    let q1Response = $("#q1").val().toLowerCase();
                    let q2Response = $("#q2").val();
                    let q4Response = $("input[name=q4]:checked").val();
                    let q6Response = $("input[name=q6]:checked").val();
                    let q8Response = $("#q8").val().toLowerCase();
                    let q9Response = $("#q9").val();
                    
                    
                    //Question 1
                    if(q1Response == "sacramento"){
                        rightAnswer(1);
                    }
                    else{
                        wrongAnswer(1);
                    }
                    
                    //Question 2
                    if(q2Response == "mo"){
                        rightAnswer(2);
                    }
                    else{
                        wrongAnswer(2);
                    }
                    
                    //Question 3
                    if ($("#Jefferson").is(":checked") && $("#Roosevelt").is(":checked")
                        && !$("#Jackson").is(":checked") && !$("#Franklin").is(":checked")){
                            rightAnswer(3);
                        }
                        else{
                            wrongAnswer(3);
                        }
                    
                    //Question 4
                    if(q4Response == "Rhode Island"){
                        rightAnswer(4);
                    }
                    else{
                        wrongAnswer(4);
                    }
                    
                    //Question 5
                    if($("#seal2").css("background-color") == "rgb(255, 255, 0)"){
                        rightAnswer(5);
                    }
                    else{
                        wrongAnswer(5);
                    }
                    
                    //Question 6
                    if(q6Response == "True"){
                        rightAnswer(6);
                    }
                    else{
                        wrongAnswer(6);
                    }
                    
                    //Question 7
                    if ($("#North").is(":checked") && $("#South").is(":checked")
                        && !$("#East").is(":checked") && !$("#West").is(":checked")){
                            rightAnswer(7);
                        }
                        else{
                            wrongAnswer(7);
                        }
                    
                    //Question 8
                    if(q8Response == "trump"){
                        rightAnswer(8);
                    }
                    else{
                        wrongAnswer(8);
                    }
                    
                    //Question 9
                    if(q9Response == "fin"){
                        rightAnswer(9);
                    }
                    else{
                        wrongAnswer(9);
                    }
                    
                    //Question 10
                    if($("#fish2").css("background-color") == "rgb(255, 255, 0)"){
                        rightAnswer(10);
                    }
                    else{
                        wrongAnswer(10);
                    }
                    
                    //Total Score
                    $("#totalScore").html("Total Score:" + score);
                    if(score < 80){
                        $("#totalScore").css({"color" : "red"});
                    }
                    else{
                        $("#totalScore").attr("color","green");
                        alert("Congratulations!You scored: " + score);
                    }
                    $("#totalAttempts").html(`Total Attempts: ${++attempts}`);
                    localStorage.setItem("total_attempts", attempts);
                }
                
            })//ready
            
        </script>
        
        <title>US Quiz</title>
        
    </head>
    
    <body class="text-center">
        
        <h1 class="jumbotron">US Geography Quiz</h1>
        
        <br>
        <h3 id="validationFdbk" class="bg-danger text-white"></h3>
        <br>
        
         <!--  QUESTION ONE !-->
        <h3><span id="markImg1"></span>What is the cappital of California?</h3>
        <input type="text" id="q1">
        <br><br>
        <div id="q1Feedback"></div>
        <br>
        
        <!--  QUESTION TWO !-->
        <h3><span id="markImg2"></span>What is the longest river?</h3>
        <select id="q2">
            <option value="">Select One</option>
            <option value="ms">Mississippi</option>
            <option value="mo">Missouri</option>
            <option value="co">Colorado</option>
            <option value="de">Deleware</option>
        </select>
        <br><br>
        <div id="q2Feedback"></div>
        <br>
        
        <!-- QUESTION THREE !-->
        <h3><span id="markImg3"></span>What presidents are carved into Mt. Rushmore?</h3>
        <input type="checkbox" id="Jackson"> <label for="Jackson">A. Jackson</label>
        <input type="checkbox" id="Franklin"> <label for="Franklin">B. Franklin</label>
        <input type="checkbox" id="Jefferson"> <label for="Jefferson">Jefferson</label>
        <input type="checkbox" id="Roosevelt"> <label for="Roosevelt">T. Roosevelt</label>
        <br><br>
        <div id="q3Feedback"></div>
        <br>
        
        <!-- QUESTION FOUR !-->
        <h3><span id="markImg4"></span>What is the smallest US State?</h3>
        <!--
        <input type="radio" name="q4" id="me" value="Maine"><label for="me">Maine</label>
        <input type="radio" name="q4" id="ri" value="Rhode Island"><label for="ri">Rhode Island</label>
        <input type="radio" name="q4" id="md" value="Maryland"><label for="md">Maryland</label>
        <input type="radio" name="q4" id="de" value="Delaware"><label for="de">Delaware</label> !-->
        <div id="q4Choices"></div>
        <br><br>
        <div id="q4Feedback"></div>
        <br>
        
        <!-- QUESTION FIVE !-->
        <h3><span id="markImg5"></span>What image is the Great Seal of the State of California?</h3>
        <img src="img/seal1.png" alt="Seal 1" class="q5Choice" id="seal1">
        <img src="img/seal2.png" alt="Seal 2" class="q5Choice" id="seal2">
        <img src="img/seal3.png" alt="Seal 3" class="q5Choice" id="seal3">
        <br><br>
        <div id="q5Feedback"></div>
        <br>
        
        <!-- QUESTION SIX !-->
        <h3><span id="markImg6"></span>United States has had 45 presidents(including the current president).</h3>
        <input type="radio" name="q6" id="t" value="True"><label for="t">True</label>
        <input type="radio" name="q6" id="f" value="False"><label for="f">False</label>
        <br><br>
        <div id="q6Feedback"></div>
        <br>
        
        <!--QUESTION SEVEN !-->
        <h3><span id="markImg7"></span>Which of the following are real states?</h3>
        <input type="checkbox" id="North"> <label for="North">North Dakota</label>
        <input type="checkbox" id="East"> <label for="East">East Dakota</label>
        <input type="checkbox" id="South"> <label for="South">South Dakota</label>
        <input type="checkbox" id="West"> <label for="West">West Dakota</label>
        <br><br>
        <div id="q7Feedback"></div>
        <br>
        
        <!--QUESTION EIGHT !-->
        <h3><span id="markImg8"></span>What is the <strong>LAST NAME</strong> of the current President?</h3>
        <input type="text" id="q8">
        <br><br>
        <div id="q8Feedback"></div>
        <br>
        
        <!--QUESTION NINE !-->
        <h3><span id="markImg9"></span>Which of the following is <strong>NOT</strong> a branch of goverment.</h3>
        <select id="q9">
            <option value="">Select One</option>
            <option value="leg">Legislative</option>
            <option value="exe">Executive</option>
            <option value="fin">Financial</option>
            <option value="jud">Judicial</option>
        </select>
        <br><br>
        <div id="q9Feedback"></div>
        <br>
        
        <!--QUESTION TEN !-->
        <h3><span id="markImg10"></span></h3>
        <img src="img/goldfish.jpg" alt="Goldfish" class="q10Choice" id="fish1">
        <img src="img/gari.jpg" alt="Garibaldi" class="q10Choice" id="fish2">
        <img src="img/man.jpg" alt="Fish?" class="q10Choice" id="fish3">
        <br><br>
        <div id="q10Feedback"></div>
        <br>
        
        
        <!--  BUTTON !-->
        <button class="btn btn-outline-success">Submit Quiz</button>
        <br>
        <h2 id="totalScore"></h2>
        <h3 id="totalAttempts"></h3>
    </body>
    
</html>