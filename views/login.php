<main class="login-container">
    <div class="login-card">
        <h1>Bentornato!</h1>
        <p>Inserisci i tuoi dati per ordinare</p>

        <form action="./index.php?page=authLogin" method="POST" class="login-form">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="esempio@mail.it" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="**********" required>
            </div>

            <div class="form-footer">
                <a href="#" class="forgot-password">Password dimenticata?</a>
            </div>

            <button type="submit" class="btn-primary btn-full">Accedi</button>
        </form>

        <div class="register-hint">
            Non hai un account? <a href="./index.php?page=singUp">Registrati</a>
        </div>
    </div>
</main>