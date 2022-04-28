<table><tr><td> <em>Assignment: </em> JavaScript & CSS Challenge</td></tr>
<tr><td> <em>Student: </em> Jong Hyun Choi(jc865)</td></tr>
<tr><td> <em>Generated: </em> 2/19/2022 1:54:13 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/javascript-csschallenge/grade/jc865" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ul>
<li>Reminder: Make sure you start in dev and it&#39;s up to date<ol>
<li><code>git checkout dev</code></li>
<li><code>git pull origin dev</code></li>
<li><code>git checkout -b M3-Challenge-HW</code></li>
</ol>
</li>
</ul>
<ol>
<li>Create a copy of the template given here: <a href="https://gist.github.com/MattToegel/77e4b66e3c73c074ea215562ebce717c">https://gist.github.com/MattToegel/77e4b66e3c73c074ea215562ebce717c</a> </li>
<li>Implement the changes defined in the body of the code</li>
<li><strong>Do not</strong> edit anything where the comments tell you not to edit, you will lose points for not following directions</li>
<li>Make changes where the comments tell you (via TODO&#39;s or just above the lines that tell you not to edit below)<ol>
<li><strong>Hint</strong>: Just change things in the designated <code>&lt;style&gt;</code> and <code>&lt;script&gt;</code> tags</li>
<li><strong>Important</strong>: The function that drives one of the challenges is <code>updateCurrentPage(str)</code> which takes 1 parameter, a string of the word to display as the current page. This function is not included in the code of the page, along with a few other things, are linked via an external js file. Make sure you do not delete this line.</li>
</ol>
</li>
<li>Create a branch called M3-Challenge-HW if you haven&#39;t yet</li>
<li>Add this template to that branch (git add/git commit)</li>
<li>Make a pull request for this branch once you push it</li>
<li>You may manually deploy the HW branch to dev to get the evidence for the below prompts</li>
<li>Create a new file <strong>m3_submission.md</strong> file in the hw branch and fill it with the output generated from this page (be careful not to paste more than once)</li>
<li>Add, commit, and push the submission file</li>
<li>Close the pull request by merging it to dev (double-check all looks good on dev)</li>
<li>Manually create a new pull request from dev to prod (i.e., base: prod &lt;- compare: dev)</li>
<li>Complete the merge to deploy to production</li>
<li>Submit the direct link of the m3_submission.md from the prod branch to Canvas for this submission</li>
</ol>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Completed Challenge Screenshots </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of the Primary page with the checklist items completed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://raw.githubusercontent.com/nekozye/IT202-010/M3-Challenge-HW/pictures/M3/problem1-sub1.png?token=GHSAT0AAAAAABRASWFDINOUYRLBMRU2Y724YQ2NXRA"/></td></tr>
<tr><td> <em>Caption:</em> <p>The screenshot of web browser when it is loaded without any anchors<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot showing after the login link is clicked (be sure to include the url)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://raw.githubusercontent.com/nekozye/IT202-010/M3-Challenge-HW/pictures/M3/problem1-sub2.png?token=GHSAT0AAAAAABRASWFCQM6MDZ743QUCFVZUYQ2OWNA"/></td></tr>
<tr><td> <em>Caption:</em> <p>The screenshot of web browser after &quot;login nav&quot; is clicked<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot showing after the register link is clicked (be sure to include the url)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://raw.githubusercontent.com/nekozye/IT202-010/M3-Challenge-HW/pictures/M3/problem1-sub3.png?token=GHSAT0AAAAAABRASWFCQPU4QBGE4C2H3GRWYQ2OWOQ"/></td></tr>
<tr><td> <em>Caption:</em> <p>The screenshot of web browser after &quot;register nav&quot; is clicked<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Screenshot showing after the profile link is clicked (be sure to include the url)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://raw.githubusercontent.com/nekozye/IT202-010/M3-Challenge-HW/pictures/M3/problem1-sub4.png?token=GHSAT0AAAAAABRASWFC7LO3N2OY6HK4SOVMYQ2OWPQ"/></td></tr>
<tr><td> <em>Caption:</em> <p>The screenshot of web browser after &quot;profile nav&quot; is clicked<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Screenshot showing after the logout link is clicked (be sure to include the url)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://raw.githubusercontent.com/nekozye/IT202-010/M3-Challenge-HW/pictures/M3/problem1-sub5.png?token=GHSAT0AAAAAABRASWFDRBZULIVXAR5Z4ZWUYQ2OWQA"/></td></tr>
<tr><td> <em>Caption:</em> <p>The screenshot of web browser after &quot;logout nav&quot; is clicked<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Explain Solutions (Grader use this section to determine completion of each challenge) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Briefly explain how you made the navigation horizontal</td></tr>
<tr><td> <em>Response:</em> <p>css, with nav li {float:left} is what made navigation horizontal.</p><br><p>by making the text<br>display into a block, it shrinked the navigation to fit all in one<br>line, therefore making it horizontal instead of vertical.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how you remove the navigation list item markers</td></tr>
<tr><td> <em>Response:</em> <p>text-decoration: none; one line of code inside nav li a css selector<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you gave the navigation a background</td></tr>
<tr><td> <em>Response:</em> <pre><code>        list-style-type:&lt;br&gt;none;<br>        background-color:&lt;br&gt;#597f85;<br>        margin:&lt;br&gt;0;<br>        padding:&lt;br&gt;0;<br></code></pre><br><p>of nav ul css selector.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how you made the links (or their surrounding area) change color on mouseover/hover</td></tr>
<tr><td> <em>Response:</em> <p>background-color: #395357;</p><br><p>of nav li a:hover css selector.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain how you changed the challenge list bullet points to checkmarks (✓)</td></tr>
<tr><td> <em>Response:</em> <p>using the selector li:not(nav *):before, i had made content: &#39;✓ &#39;; . Also,<br>list-style-type of ul:not(nav *) was set to none to remove the bullet point.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain how you made the first character of the h1 tags and anchor tags uppercased</td></tr>
<tr><td> <em>Response:</em> <p>h1{<br>            text-transform:<br>capitalize;<br>        }</p><br><pre><code>&lt;br&gt;   a{<br>     &lt;br&gt;  text-transform: capitalize;<br>    }&lt;br&gt;<br></code></pre><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain/describe your custom styling of your choice</td></tr>
<tr><td> <em>Response:</em> <p>the current custom style choice is making a background block change color and<br>persistant. i use both css and class tags for this. when the link<br>is clicked, it removes the &quot;selected-nav&quot; class for other list elements a href<br>and adds &quot;selected-nav&quot; class for the element that is selected.<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Briefly explain how the styling for the challenge list doesn't impact the navigation list</td></tr>
<tr><td> <em>Response:</em> <p>i used the :not(nav *) selector for tasks that needs to be not<br>implemented in navigation list.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 9: </em> Briefly explain how you updated the content of the h1 tag with the link text</td></tr>
<tr><td> <em>Response:</em> <p>using window.location.hash.substring(1);<br>i extracted the anchor of the url.</p><br><p>this was used to call function<br>updateCurrentPage(the_string);<br><br></p><br></td></tr>
<tr><td> <em>Sub-Task 10: </em> Briefly explain how you updated the content of the title tag with the link text</td></tr>
<tr><td> <em>Response:</em> <p>same as above. the function updateCurrentPage(the_string) did both works.<br><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Comment briefly talking about what you learned and/or any difficulties you encountered and how you resolved them (or attempted to)</td></tr>
<tr><td> <em>Response:</em> <p>What I learned that static documents like css style and html can be<br>edited using javascript, and ironically javascript and css can be inline imbedded within<br>html file.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a link to your pull request (hw branch to dev only)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/pull/8">https://github.com/nekozye/IT202-010/pull/8</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to your solution html file from prod (again you can assume the url at this point)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/nekozye/IT202-010/blob/prod/public_html/M3/challenge.html">https://github.com/nekozye/IT202-010/blob/prod/public_html/M3/challenge.html</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/javascript-csschallenge/grade/jc865" target="_blank">Grading</a></td></tr></table>