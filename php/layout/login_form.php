
<div id="login_form" class="modal">
    <form class="modal-content animate" action="/action_page.php" method="post">
        <div class="closecontainer">
            <span onclick="close_login_form()" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Inserisci lo Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Inserisci la Password" name="psw" required>
        
            <button type="submit">Login</button>
        </div>

        <div class="container">
            <button type="button" onclick="close_login_form()" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</div>
    
