
<div id="login_form" class="modal login">
    <form class="modal-content animate" action="php/util/login.php" method="post">
        <div class="closecontainer">
            <span onclick="close_login_form()" class="close">&times;</span>
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Inserisci lo Username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Inserisci la Password" name="password" required>
        
            <button type="submit">Login</button>
        </div>

        <div class="container">
            <button type="button" onclick="close_login_form()" class="cancelbtn">Cancel</button>
        </div>
    </form>
</div>
    
