<?php
require(__DIR__ . "/../../partials/nav.php");
?>

<script src="<?php echo get_url('helpers.js'); ?>"></script>

<div class="container h-100">
  <div class="floating-wrapper mx-auto my-auto row align-items-center">
    <div class="bg-secondary rounded form-floating">
      <div style="text-align:center;">
        <canvas id="canvas" width="400" height="600" tabindex="1">
        </canvas>
      </div>
    </div>
  </div>
</div>

<script>
  // Arcade Shooter game

  // Get a reference to the canvas DOM element
  var canvas = document.getElementById('canvas');
  // Get the canvas drawing context
  var context = canvas.getContext('2d');

  // Game data object that stores all data
  function GameData() {
    return {
      score: 0,
      leftBombCount: 2,

      AddPoints: function(p) {
        this.score += p;
      },

      AddBomb: function(p) {
        this.bomb += p;
      },
    }
  }

  // Create an object representing a square on the canvas
  function makeSquare(x, y, length, speed) {
    return {
      x: x,
      y: y,
      l: length,
      s: speed,
      draw: function() {
        context.fillRect(this.x, this.y, this.l, this.l);
      }
    };
  }

  function makeSpecialPlayer(x, y, length, speed) {

    var ship = makeSquare(x, y, length, speed);
    ship.draw = function() {
      context.fillRect(this.x, this.y, this.l, this.l);
      //little tiny cannon
      context.fillRect(this.x + (this.l / 2) - (this.l / 2 / 3), this.y - (this.l / 3), this.l / 3, this.l / 3);
    }
    return ship;

  }

  function makeRectangle(x, y, width, height, speed) {
    return {
      x: x,
      y: y,
      w: width,
      h: height,
      s: speed,
      draw: function() {
        context.fillRect(this.x, this.y, this.w, this.h);
      }
    };
  }


  // The ship the user controls
  var shiplength = 25;

  var ship = makeSpecialPlayer(canvas.width / 2 - (shiplength / 2), canvas.height - shiplength - (shiplength / 5), shiplength, 4);

  // Flags to tracked which keys are pressed
  var up = false;
  var down = false;

  var left = false;
  var right = false;


  var space = false;

  // Is a bullet already on the canvas?
  var shooting = false;

  // Is a bomb already on the canvas?
  var bombing = false;
  var b_exploding = false;
  var bombprojectileshow = false;

  // The bulled shot from the ship
  var bullet = makeSquare(0, 0, 10, 10);


  // Bomb


  var bomb = makeSquare(0, 0, 15, 2);
  var bombprojectileid = null;

  var bombresidue = null;

  // An array for enemies (in case there are more than one)
  var enemies = [];

  // Add an enemy object to the array
  var enemyBaseSpeed = 2;

  function makeEnemy() {
    var enemySize = Math.round((Math.random() * 15)) + 15;
    var enemyX = Math.round(Math.random() * (canvas.width - enemySize * 2)) + enemySize;
    var enemyY = 0;
    var enemySpeed = Math.round(Math.random() * enemyBaseSpeed) + enemyBaseSpeed;
    enemies.push(makeSquare(enemyX, enemyY, enemySize, enemySpeed));
  }

  function removeEnemy(enemies, indextoRemove) {
    enemies.splice(indextoRemove, 1);
    gameData.AddPoints(1);
    shooting = false;
    // Make the game harder
    if (gameData.score % 10 === 0 && timeBetweenEnemies > 1000) {
      clearInterval(timeoutId);
      timeBetweenEnemies -= 1000;
      timeoutId = setInterval(makeEnemy, timeBetweenEnemies);
      //get one bomb every levelup
      gameData.AddBomb(1);
    } else if (gameData.score % 5 === 0) {
      enemyBaseSpeed += 1;
    }

  }

  // Check if number a is in the range b to c (exclusive)
  function isWithin(a, b, c) {
    return (a > b && a < c);
  }

  function hasValue(o, varname) {
    return (Object.keys(o).indexOf(varname) > -1);
  }


  // Return true if two rectangles a and b are colliding, false otherwise
  function isColliding(a, b) {
    var result = false;

    if (a == null || b == null) {
      return false;
    }

    // if any of them is square, convert them to rectangle for comparisons



    if (hasValue(a, "l")) {
      a = makeRectangle(a.x, a.y, a.l, a.l, a.s);
    }

    if (hasValue(b, "l")) {
      b = makeRectangle(b.x, b.y, b.l, b.l, b.s);
    }


    if (isWithin(a.x, b.x, b.x + b.w) || isWithin(a.x + a.w, b.x, b.x + b.w)) {
      if (isWithin(a.y, b.y, b.y + b.h) || isWithin(a.y + a.h, b.y, b.y + b.h)) {
        result = true;
      }
    }



    return result;
  }

  // Track the user's data
  var gameData = GameData();






  // The delay between enemies (in milliseconds)
  var timeBetweenEnemies = 5 * 1000;

  // The bomb explosion timer (in millisec)
  var timeOfBombBeingExploded = 7 * 1000;

  // ID to track the spawn timeout
  var timeoutId = null;

  // Show the game menu and instructions
  function menu() {
    erase();
    context.fillStyle = '#FFFFFF';
    context.font = '36px Arial';
    context.textAlign = 'center';
    context.fillText('Shoot \'Em!', canvas.width / 2, canvas.height / 4);
    context.font = '24px Arial';
    context.fillText('Click to Start', canvas.width / 2, canvas.height / 2);
    context.font = '18px Arial';
    context.fillText('Left / Right to move, Space to shoot.', canvas.width / 2, (canvas.height / 4) * 3);
    context.font = '18px Arial';
    context.fillText('Left Control Button to Use Bomb.', canvas.width / 2, (canvas.height / 4) * 3 + 20);
    // Start the game on a click
    canvas.addEventListener('click', startGame);
  }

  // Start the game
  function startGame() {
    // Kick off the enemy spawn interval
    timeoutId = setInterval(makeEnemy, timeBetweenEnemies);
    // Make the first enemy
    setTimeout(makeEnemy, 1000);
    // Kick off the draw loop
    draw();
    // Stop listening for click events
    canvas.removeEventListener('click', startGame);
  }

  // Show the end game screen
  function endGame() {
    // Stop the spawn interval
    clearInterval(timeoutId);
    // Show the final score
    erase();
    context.fillStyle = '#FFFFFF';
    context.font = '24px Arial';
    context.textAlign = 'center';
    context.fillText('Game Over. Final Score: ' + gameData.score, canvas.width / 2, canvas.height / 2);

    //send data
    postData({
      type: "game_end_save",
      data: gameData.score
    }).then(response => {
      console.log(response);


      if (response.status === 200) {
        flash(response.message, response.message_type);
      } else {
        flash(response.message, response.message_type);
      }
    });

  }


  // Listen for keydown events
  canvas.addEventListener('keydown', function(event) {
    event.preventDefault();
    if (event.keyCode === 38) { // UP
      up = true;
    }
    if (event.keyCode === 40) { // DOWN
      down = true;
    }

    // change so it is more close to left right shooting game
    if (event.keyCode === 37) { // LEFT
      left = true;
    }
    if (event.keyCode === 39) { // RIGHT
      right = true;
    }


    if (event.keyCode === 32) { // SPACE
      shoot();
    }

    //modification, item usage key.
    if (event.keyCode === 17) { // Left control
      useItem();
    }
  });

  // Listen for keyup events
  canvas.addEventListener('keyup', function(event) {
    event.preventDefault();
    if (event.keyCode === 38) { // UP 
      up = false;
    }
    if (event.keyCode === 40) { // DOWN
      down = false;
    }

    if (event.keyCode === 37) { // LEFT
      left = false;
    }
    if (event.keyCode === 39) { // RIGHT
      right = false;
    }
  });

  // Clear the canvas
  function erase() {
    context.fillStyle = '#1e0838';
    context.fillRect(0, 0, canvas.width, canvas.height);
  }

  // Shoot the bullet (if not already on screen)
  function shoot() {
    if (!shooting) {
      shooting = true;
      bullet.x = ship.x + ship.l / 2 - bullet.l / 2;
      bullet.y = ship.y - ship.l / 2 + bullet.l / 2;
    }
  }

  // Use the item
  function useItem() {
    if (!bombing && gameData.leftBombCount > 0) {
      bombing = true;
      bombprojectileshow = true;
      bomb.x = ship.x + ship.l / 2 - bomb.l / 2;
      bomb.y = ship.y - ship.l / 2 + bomb.l / 2;
      gameData.leftBombCount -= 1;
    }
  }

  // bomb explosion timer setup
  function bombCanter() {
    b_exploding = true;
    bombprojectileshow = false;

    clearInterval(bombprojectileid);

    bombprojectileid = setInterval(residueRemover, timeOfBombBeingExploded);


    var offsety = bomb.y;
    var offsetx = 0;

    bombresidue = makeRectangle(offsetx, offsety, canvas.width, bomb.l, 0);
  }

  function residueRemover() {
    b_exploding = false;
    bombing = false;
    bombresidue = null;

    clearInterval(bombprojectileid);

  }




  // The main draw loop
  function draw() {
    erase();
    var gameOver = false;
    // Move and draw the enemies
    enemies.forEach(function(enemy) {
      enemy.y += enemy.s;
      if (enemy.y > canvas.height) {
        gameOver = true;
      }
      context.fillStyle = '#00FF00';
      enemy.draw();
    });

    // Collide the ship with enemies
    enemies.forEach(function(enemy, i) {
      if (isColliding(enemy, ship)) {
        gameOver = true;
      }
    });
    // Move the ship
    /*   if (down) {
         ship.y += ship.s;
       }
       if (up) {
         ship.y -= ship.s;
      }
    */

    if (left) {
      ship.x -= ship.s;
    }
    if (right) {
      ship.x += ship.s;
    }

    // Don't go out of bounds
    /*
      if (ship.y < 0) {
        ship.y = 0;
      }
      if (ship.y > canvas.height - ship.l) {
        ship.y = canvas.height - ship.l;
      }
    */

    if (ship.x < 0) {
      ship.x = 0;
    }
    if (ship.x > canvas.width - ship.l) {
      ship.x = canvas.width - ship.l;
    }

    // Draw the ship
    context.fillStyle = '#FF0000';
    ship.draw();
    // Move and draw the bullet
    if (shooting) {
      // Move the bullet
      bullet.y -= bullet.s;
      // Collide the bullet with enemies
      enemies.forEach(function(enemy, i) {
        if (isColliding(bullet, enemy)) {
          removeEnemy(enemies, i);
        }



      });
      // Collide with the wall
      if (bullet.y < 0) {
        shooting = false;
      }
      // Draw the bullet
      context.fillStyle = '#FFFFFF';
      bullet.draw();
    }

    // Draw bomb

    context.fillStyle = '#EB34E5';

    if (bombing) {
      if (bombprojectileshow) {
        bomb.y -= bomb.s;
        bomb.draw();

        if (bomb.y < canvas.height / 2) {
          bombCanter();
        }

      }


      // draw explosion

      if (b_exploding) {


        enemies.forEach(function(enemy, i) {
          if (isColliding(enemy, bombresidue)) {
            removeEnemy(enemies, i);
          }
        });

        context.globalAlpha = 0.2;

        bombresidue.draw();

        context.globalAlpha = 1.0;
      }
    }



    // Draw the score
    context.fillStyle = '#FFFFFF';
    context.font = '24px Arial';
    context.textAlign = 'left';
    context.fillText('Score: ' + gameData.score, 1, 25)

    // Draw the Bomb Count
    context.fillStyle = '#FFFFFF';
    context.font = '24px Arial';
    context.textAlign = 'left';
    context.fillText('Bomb: ' + gameData.leftBombCount, 1, 50)

    // End or continue the game
    if (gameOver) {
      endGame();
    } else {
      window.requestAnimationFrame(draw);
    }
  }


  async function postData(data = {}, url = "/Project/api/game-backend.php") {

    console.log(Object.keys(data).map(function(key) {
      return "" + key + "=" + data[key]; // line break for wrapping only
    }).join("&"));
    let example = 1;
    if (example === 1) {
      // Default options are marked with *
      const response = await fetch(url, {
        method: 'POST', // *GET, POST, PUT, DELETE, etc.
        mode: 'cors', // no-cors, *cors, same-origin
        cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
        credentials: 'same-origin', // include, *same-origin, omit
        headers: {
          //'Content-Type': 'application/json'
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        redirect: 'follow', // manual, *follow, error
        referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
        body: Object.keys(data).map(function(key) {
          return "" + key + "=" + data[key]; // line break for wrapping only
        }).join("&") //JSON.stringify(data) // body data type must match "Content-Type" header
      });
      return response.json(); // parses JSON response into native JavaScript objects


    } else if (example === 2) {
      //making XMLHttpRequest awaitable
      //https://stackoverflow.com/a/48969580
      return new Promise(function(resolve, reject) {
        let xhr = new XMLHttpRequest();
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.open("POST", url);
        xhr.onload = function() {
          if (this.status >= 200 && this.status < 300) {
            resolve(xhr.response);
          } else {
            reject({
              status: this.status,
              statusText: xhr.statusText
            });
          }
        };
        xhr.onerror = function() {
          reject({
            status: this.status,
            statusText: xhr.statusText
          });
        };
        xhr.send(Object.keys(data).map(function(key) {
          return "" + key + "=" + data[key]; // line break for wrapping only
        }).join("&"));
      });
    } else if (example === 3) {
      //make jQuery awaitable
      //https://petetasker.com/using-async-await-jquerys-ajax
      //check if jQuery is present
      if (window.$) {
        let result;

        try {
          result = await $.ajax({
            url: url,
            type: 'POST',
            data: Object.keys(data).map(function(key) {
              return "" + key + "=" + data[key]; // line break for wrapping only
            }).join("&")
          });

          return result;
        } catch (error) {
          console.error(error);
        }
      }
    }
  }


  // Start the game
  menu();
  canvas.focus();
</script>

<?php
require(__DIR__ . "/../../partials/flash.php");
