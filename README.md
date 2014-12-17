<img width=150 src='http://codeagon.com/imgs/logotransparentcropped.png'>

<strong>For the 2014 Koding Hackathon. </strong>

<strong>Codeagon</strong> is a competitive learning environment for programming - specifically Python, for now.

Users sign up, click 'Compete', and then enter a queue of users to be matched up against other users, and then are pitted head-to-head against each oher in a timed programming contest round. The first to complete it successfully gains 100 points, and the loser is notified, and encouraged to try again. The competition continues as more and more users enter the queue.

Programming input is handled by a sandboxed PyPy implementation. Input is saved to file, evaluated by PyPy, and then output is saved to a second file and returned to the user in an output window. It's also checked to see if the output matches the expected answer, and if it does, the user wins that round.

Available at the following koding.com URL: http://utkk6b01bf3c.tims.koding.io/.<br>
Also available at www.codeagon.com, but this URL shouldn't be used for evaluation, as that URL soon will point to a Heroku instance so we can continue work on it.

This application is written with rapidly prototyped PHP, with MySQL as a DB, and <strong>heavy</strong> use of AJAX. For the frontend, a basic Bootstrap/Jquery combo was a quick solution. For the future, we'd like to use a JS server-side framework for enhanced real-time functionality, but decided on PHP to solve a complex problem with simple bits of code.

Note that spinning up this application separate from the above URL will need a DB init file, for problems. Would add to the repo, but do not want to be disqualified for editing anything on the VM, so that'll have to wait.

Thanks for looking!
