  <!-- Ini-Form-Login -->

  <div class="w-50">
      <form action="/login" method="post">

          <div class="form-group mt-3">
              <label for="email">E-mail</label>
              <input type="email" name="email" id="email" class="form-control" required>
          </div>

          <div class="form-group mt-3">
              <label for="pass">Senha</label>
              <input type="password" name="pass" id="pass" class="form-control" required>
          </div>

          <div class="d-flex justify-content-between border-top border-secondary mt-3">
              <button class="btn btn-primary btn-md mt-3">Entrar</button>

              <a href="/register" class="btn btn-md btn-warning mt-3">Cadastre-se</a>
          </div>
      </form>
  </div>

  <!-- End-Form-Login -->