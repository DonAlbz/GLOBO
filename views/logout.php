<main class="logout-container">
    <div class="logout-card">
        <div class="icon-container">
            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <circle cx="8.5" cy="7" r="4"></circle>
                <line x1="18" y1="8" x2="23" y2="13"></line>
                <line x1="23" y1="8" x2="18" y2="13"></line>
            </svg>
        </div>
        <h1>La tua sessione è scaduta</h1>
        <p>Per motivi di sicurezza o se hai fatto il logout, sei stato disconnesso. Effettua nuovamente l'accesso per continuare a ordinare i tuoi prodotti preferiti.</p>

        <div class="logout-actions">
            <button class="btn-primary" onclick="window.location.href='./index.php?page=login'">Accedi di nuovo</button>
            <a href="./index.php?page=home" class="btn-secondary-link">Torna alla Home</a>
        </div>
    </div>
</main>