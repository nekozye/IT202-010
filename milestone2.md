<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 Arcade Project</td></tr>
<tr><td> <em>Student: </em> Jong Hyun Choi(jc865)</td></tr>
<tr><td> <em>Generated: </em> 4/15/2022 7:26:40 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone-2-arcade-project/grade/jc865" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone2 branch </li>
<li>Create a new markdown file called milestone2.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone2.md link (from Milestone2) into the proposal.md file under each milestone2 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone2.md</li>
<li>Add/commit/push the changes to Milestone2</li>
<li>PR Milestone2 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 3</li>
<li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on github and everywhere else.
Images are only accepted from dev or prod, not local host.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Pick a game... </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> What game will you be doing?</td></tr>
<tr><td> <em>Response:</em> <p>The game is continuation of the shoot-em up game.<br>Vertical shooter like galaga or<br>similar clones.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly describe it and its mechanics</td></tr>
<tr><td> <em>Response:</em> <p>Movement of side to side at this moment.<br>Shooting can be done by pressing<br>space.<br>Bomb that deletes all enemy falling down for period of time is also<br>available.</p><br><p>Shooting speed is variable, I have a plan of making one-game only speed<br>boost that you can buy using shop mechanic.<br>Bomb will be purchasable.<br>One time use<br>only of a shop that makes next game with &quot;guideline&quot; visible to shoot<br>will be also available.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot showing something of the game</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone2/pictures/Project/Milestone%202/game/game.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is the current gameplay with bomb activated.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/50">https://github.com/nekozye/IT202-010/pull/50</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jc865-prod.herokuapp.com/Project/game.php">https://jc865-prod.herokuapp.com/Project/game.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Saving Score </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing a notice telling the user their score was saved</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/blob/Milestone2/pictures/Project/Milestone%202/game/save_with_login.png?raw=true">https://github.com/nekozye/IT202-010/blob/Milestone2/pictures/Project/Milestone%202/game/save_with_login.png?raw=true</a> </td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a notice telling the user their score wasn't saved because they're logged out</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone2/pictures/Project/Milestone%202/game/no_save_login.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>The warning flash pops up with more user friendly message to log in<br>to save the data.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of your scores table with some score entries (preferably different users with multiple scores each)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone2/pictures/Project/Milestone%202/code/score_table.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>Score Table within database.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly describe the code flow of saving a score from the game</td></tr>
<tr><td> <em>Response:</em> <p>The game, unfortunately is not a server-side friendly game due to it&#39;s nature.<br>The<br>real-time nature of the game limits the ongoing web-based communications, unless separate UDP<br>connection is made. with TCP HTTP protocol, it is not possible.</p><br><p>Therefore, score is<br>saved after the game over is triggered.<br>The score is based on the enemies<br>that are destroyed, and there could be a server-side limitation, where it sends<br>the whole enemy list that was killed instead of the enemy if security<br>is necessary.<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/50">https://github.com/nekozye/IT202-010/pull/50</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User's last 10 scores </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the latest scores for the user from their profile page (show at least a few scores)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone2/pictures/Project/Milestone%202/profile/score_listed_on_profilie.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>A Latest score table with modified th from examples to get rid of<br>internal id number.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the scores are being pulled and displayed</td></tr>
<tr><td> <em>Response:</em> <p>The scores are being pulled with the request handler partials, where it calls<br>appropriate php functions.<br>the function returns with database query with current user&#39;s id saved<br>in session.</p><br><p>dbquery = &quot;SELECT username, Shoot_UP_Scores.score, Shoot_UP_Scores.created from Shoot_UP_Scores join Users on Shoot_UP_Scores.user_id<br>= Users.id&quot;;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/50">https://github.com/nekozye/IT202-010/pull/50</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jc865-prod.herokuapp.com/Project/profile.php">https://jc865-prod.herokuapp.com/Project/profile.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Create function(s) for outputiting the 3 different scoreboard durations (weekly, monthly, lifetime) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot (or screenshots) showing the function(s)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone2/pictures/Project/Milestone%202/code/low_level_database_call_multispan.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>Lower-Level Backbone for table query search.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone2/pictures/Project/Milestone%202/code/partial_table_display_selector.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>Higher level partial code that can be called with pre-set variables as augments.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain the process of how the code works</td></tr>
<tr><td> <em>Response:</em> <p>When the partial code is called, it checks for two variables. if not,<br>they are set to default.</p><br><p>The duration variable, when set to one of the<br>timed duration, gets sent through one function that is on table query search<br>php.<br>This searcher is one of the hookups in function.php, and it selects database<br>query with calculated timespan based on passed on variable.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/50">https://github.com/nekozye/IT202-010/pull/50</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Home Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the scoreboads, the link to the game and description, and the proper heading</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone2/pictures/Project/Milestone%202/home/scores_table.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>Same as above picture, the scoreboards also contain the game list. Heading is<br>now called scoreboards.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the different pieces are retrieved and shown to the user</td></tr>
<tr><td> <em>Response:</em> <p>The 4 tables are just same partial called 4 times, with different variable<br>set beforehand.<br>the game table is a partial function that is set manually.</p><br><p>both table<br>is surrounded by div which is given with keyframe animation of fade-in<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/50">https://github.com/nekozye/IT202-010/pull/50</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://jc865-prod.herokuapp.com/Project/home.php">https://jc865-prod.herokuapp.com/Project/home.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone2/pictures/Project/Milestone%202/code/markdown.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>The markdown setup that is done. no link directly, but date is setup.<br>when it is done.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone2 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://github.com/nekozye/IT202-010/blob/Milestone2/pictures/Project/Milestone%202/code/project_board.png?raw=true"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is the project board.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone-2-arcade-project/grade/jc865" target="_blank">Grading</a></td></tr></table>