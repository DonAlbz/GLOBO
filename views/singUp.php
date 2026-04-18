<main class="login-container">
    <div class="login-card">
        <h1>Crea un account</h1>
        <p>Unisciti alla nostra community</p>

        <form action="./index.php?page=authSingUp" method="POST" class="login-form">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="esempio@mail.it" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Minimo 6 caratteri" required>
            </div>

            <div class="form-group">
                <label for="address">Indirizzo di spedizione</label>
                <input type="text" id="address" name="address" placeholder="Via, Numero, Città, CAP" required>
            </div>

            <button type="submit" class="btn-primary btn-full">Registrati</button>
        </form>

        <div class="register-hint">
            Hai già un account? <a href="./index.php?page=login">Accedi</a>
        </div>
    </div>
</main>