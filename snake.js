﻿var cvs = document.getElementById("canvas");
var ctx = document.getElementById("canvas").getContext("2d");

var snakeW = 20;
var snakeH = 20;
var len, snake, snakeX, snakeY,id,score=0,eat,dead,left,right,down;
var dir = "right",mov="manual";
var food, n = 0, Sspeed = 0, p = 1;

var visited;

visited = []

var maze;

maze = [];

eat = document.getElementById("eat");
dead = document.getElementById("dead");
left = document.getElementById("left");
right = document.getElementById("right");
up = document.getElementById("up");
down = document.getElementById("down");

function drawSnake(x, y) {
    ctx.fillStyle = "white";
    ctx.fillRect(x * snakeW, y * snakeH, snakeW, snakeH);
    ctx.fillStyle = "black";
    ctx.strokeRect(x * snakeW, y * snakeH, snakeW, snakeH);
}

len = 4;
snake = [];
                                                    //create snake using array and loop.
for (var i = len - 1; i >= 0; i--) {
    snake.push({
        x: i,
        y: 0
    })
}
if (mov == "manual") {
    document.addEventListener("keydown", dirControl);          //****event listener to activate dirControl function.

    function dirControl(e) {                                   //dirControl to control direction "dir" of snake.
        if (e.keyCode == 37 && dir != "right") { dir = "left"; left.play(); }
        else if (e.keyCode == 38 && dir != "down") { dir = "up"; up.play(); }
        else if (e.keyCode == 39 && dir != "left") { dir = "right"; right.play(); }
        else if (e.keyCode == 40 && dir != "up") { dir = "down"; down.play();}
    }
}

food = {
    x: Math.round(Math.random() * ((cvs.width / snakeW) -2)+1),
    y: Math.round(Math.random() * ((cvs.height / snakeH )-2)+1 )
}

function drawFood(x, y) {
    for (var i = 0; i < snake.length; i++) {
        if (x == snake[i].x && y==snake[i].y) {
            x++;
            y++;
        }
    }
    ctx.fillStyle = "red";
    ctx.fillRect(x * snakeW, y * snakeH, snakeW, snakeH);
    ctx.fillStyle = "black";
    ctx.strokeRect(x * snakeW, y * snakeH, snakeW, snakeH);
}

function automov() {
    mov = "auto";
}

function draw() {                                  //drawing snake function.

    ctx.clearRect(0, 0, cvs.width, cvs.height);            //**** clearing previus drawn image.

    for (var i = 0; i < snake.length; i++) {

        var X = snake[i].x;
        var Y = snake[i].y;
        
        drawSnake(X, Y);
    }

    snakeX = snake[0].x;                       //saving position of head.
    snakeY = snake[0].y;

    if (mov == "auto") {
        auto();
    }

    if (dir == "left") { snakeX--;}                   //snake movements.
    else if (dir == "right") { snakeX++;}
    else if (dir == "up") { snakeY--;}
    else if (dir == "down") { snakeY++; }

    if (snakeX == food.x && snakeY == food.y) {                  //snake when eats what will occur.
        tscore();
        eat.play();
        food = {
            x: Math.round(Math.random() * (cvs.width / snakeW - 1) + 1),
            y: Math.round(Math.random() * (cvs.height / snakeH - 1) + 1)
        }
    }                                                                       //when doesn't eats then.
    else {
        snake.pop();
    }

    snake.unshift({ x: snakeX, y: snakeY });                                //saving new block to snake by unshift method.

    drawFood(food.x, food.y);                                            //draw food on canvas.

   
       // mazeConstruct();
    

    for (var i = 1; i < snake.length; i++) {                                                 //when snake bites itself.
        if (snakeX == snake[i].x && snakeY == snake[i].y) {
            dead.play();
            clearInterval(id);
            document.getElementById("score").innerHTML = score * Sspeed;
           // exit(1);
        }
    }
    

    if (snakeX < 0 || snakeY < 0 || snakeX > (cvs.width / snakeW)-1 || snakeY > (cvs.height / snakeH)-1) {
        if (n > 1) {
            dead.play();
            clearInterval(id);
            document.getElementById("score").innerHTML = score * Sspeed;
           // exit(1);
        }
    }
    n++;
}

if (n == 0) {
    draw();
    n++;
}

function speed(x) {
    if (x == 1) id = setInterval(draw, 100); 
    if (x == 2) id = setInterval(draw, 80);
    if (x == 3) id = setInterval(draw, 60);
    if (x == 4) id = setInterval(draw, 40);
    if (x == 5) id = setInterval(draw, 20);
    document.getElementById("dropdown-content").style.display = "none";
    Sspeed = x;
}

function tscore() {
    score++;
    document.getElementById("score").innerHTML = score * Sspeed;
}


                                              //*to write auto code 

function auto() {

    if (snakeX <= food.x && snakeY <= food.y && dir != "up") {
        while (snakeY < food.y ) {
            dir = "down";
            return;
        }
        while (snakeX < food.x) {
            dir = "right";
            return;
        }
     }

    if (snakeX <= food.x && snakeY >= food.y && dir != "down") {
        while (snakeY > food.y) {
            dir = "up";
            return;
        }
        while (snakeX < food.x) {
            dir = "right";
            return;
        }
    }

    if (snakeX >= food.x && snakeY >= food.y && dir != "down") {
        while (snakeY > food.y) {
            dir = "up";
            return;
        }
        while (snakeX > food.x) {
            dir = "left";
            return;
        }
    }

    if (snakeX >= food.x && snakeY <= food.y && dir != "up") {
        while (snakeY < food.y) {
            dir = "down";
            return;
        }
        while (snakeX > food.x) {
            dir = "left";
            return;
        }
    }

                                                      //if dir is up or down.

    if (snakeX <= food.x && snakeY <= food.y && dir != "left") {
        while (snakeX < food.x) {
            dir = "right";
            return;
        }
        while (snakeY < food.y) {
            dir = "down";
            return;
        }      
    }

    if (snakeX <= food.x && snakeY >= food.y && dir != "left") {
        while (snakeX < food.x) {
            dir = "right";
            return;
        }
        while (snakeY > food.y) {
            dir = "up";
            return;
        }
    }

    if (snakeX >= food.x && snakeY >= food.y && dir != "right") {
        while (snakeX > food.x) {
            dir = "left";
            return;
        }
        while (snakeY > food.y) {
            dir = "up";
            return;
        }
       
    }

    if (snakeX >= food.x && snakeY <= food.y && dir != "right") {
        while (snakeX > food.x) {
            dir = "left";
            return;
        }
        while (snakeY < food.y) {
            dir = "down";
            return;
        }     
    }









    if (snakeX >= food.x && snakeY == food.y && dir != "down") {
        
            dir = "up;"
            return;
    }
    if (snakeX == food.x && snakeY <= food.y && dir != "right") {
        dir = "left";
        return;
    }
    if (snakeX <= food.x && snakeY == food.y && dir != "down") {

        dir = "up";
        return;
    }
    if (snakeX == food.x && snakeY >= food.y && dir != "right") {
        dir = "left";
        return;
    }
}






/*
while (snakeX <= food.x) {
    dir = "right";
}
while (snakeY <= food.y) {
    dir = "down";
}
while (snakeX >= food.x) {
   dir = "left";
}
while (snakeY >= food.y) {
    dir = "up";
}*/



function mazeConstruct()
{
    maze.push({
        x: 0,
        y: 0
    })
    visited.push({
        x: 0,
        y: 0
    })

    for (var i = 0; i < maze.length; i++) {
        maze.pop();
    }
    for (var i = 0; i < visited.length; i++) {
        visited.pop();
    }

    maze.push({
        x: snakeX,
        y: snakeY
    })

    var  mazex, mazey;

    for (var i = 0; i > -1; i++) {

        mazex = maze[maze.length-1].x;
        mazey = maze[maze.length-1].y;

        if (mazex == food.x && mazey == food.y) {
            return;
            break;
        }

        if (visit(mazex + 1, mazey)==1) {
            maze.push({ x: mazex + 1,y: mazey });

        }

        else if (visit(mazex, mazey + 1)==1) {
            maze.push({ x: mazex, y: mazey + 1 });
         
        }

        else if (visit(mazex, mazey - 1)==1){
            maze.push({ x: mazex, y: mazey - 1 });
          
        }

        else if (visit(mazex - 1, mazey)==1) {
            maze.push({ x: mazex - 1, y: mazey });
           
        }

        else{
            visited.push({
                x: maze[maze.length-1].x,
                y: maze[maze.length-1].y
            })
            maze.pop();
        }
    }
    return;
}

function visit(x, y) {

    for (var i = 0; i < visited.length; i++) {

        if (x == visited[i].x && y == visited[i].y) {
            return 0;
        }
    }

    for (var i = 0; i < snake.length; i++) {

        if (x == snake[i].x && y == snake[i].y) {
            return 0;
        }
    }

    if (x < 0 || y < 0 || x > (cvs.width / snakeW) || y > (cvs.height / snakeH)) {
        if (n > 1) {
            return 0;
        }
    }
    return 1;
}


