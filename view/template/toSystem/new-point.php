<form action="/point-register" method="post">
    <input type="hidden" name="newPoint" id="newPoint" value="<?= (isset($_SESSION['id'])) ? (int)$_SESSION['id'] : ''; ?>">
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-secondary btn-md mt-2">Bater Ponto</button>
        <a href="/list-data" class="btn btn-primary btn-md mt-2">Recarregar</a>
    </div>
</form>