
  <!-- Ini-Form-Register -->

  <div class="mx-auto w-50 mt-5">
      <form action="/register" method="post" enctype="multipart/form-data">

          <div class="form-group mt-3">
              <label for="name">Nome</label>
              <input type="text" name="name" id="name" class="form-control" required>
          </div>

          <div class="form-group mt-5">
              <label for="email">E-mail</label>
              <input type="email" name="email" id="email" class="form-control" required>
          </div>

          <div class="form-group mt-5">
              <label for="office">Cargo</label>
              <input type="text" name="office" id="office" class="form-control" required>
          </div>

          <div class="form-group mt-5">
              <label for="pass">Senha</label>
              <input type="password" name="pass" id="pass" class="form-control" required>
          </div>

          <div class="form-group mt-5">
              <label for="conf-pass">Confirme sua Senha</label>
              <input type="password" name="conf-pass" id="conf-pass" class="form-control" required>
          </div>

          <div class="form-group mt-5 w-25">
              <label for="birthDate">Data de nascimento</label>
              <input type="date" name="birthDate" id="birthDate" class="form-control p-2" required>
          </div>

          <div class="form-group mt-5 w-75">
              <label for="photo">Foto para perfil</label>
              <input type="file" name="photo" id="photo" class="form-control">
          </div>
            
          <div class="form-group mt-2 mb-2 d-flex justify-content-between">
              <button class="btn btn-primary btn-md mt-4" name="btnCad">Cadastrar</button>
              <a href="/login" class="btn btn-md btn-info mt-4 text-light">Realizar Login</a>
          </div>
      </form>
  </div>

  <!-- End-Form-Register -->