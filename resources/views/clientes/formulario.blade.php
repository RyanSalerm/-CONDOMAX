@csrf

<div class="card">
    <div class="card-body">
        <fieldset>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input value="{{ old('name', $usuario->name ?? '') }}" type="text" required
                            class="form-control" name="name" id="name" placeholder="Digite o nome do usuário">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="{{ old('email', $usuario->email ?? '') }}" type="email" required
                            class="form-control" name="email" id="email" placeholder="Digite o email do usuário">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input value="" type="password" {{ isset($usuario) ? '' : 'required' }} class="form-control"
                            name="password" id="password" placeholder="Digite a senha do usuário">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password_confirmation">Confirmação da senha</label>
                        <input value="" type="password" {{ isset($usuario) ? '' : 'required' }}
                            class="form-control" name="password_confirmation" id="password_confirmation"
                            placeholder="Confirme a senha do usuário">
                    </div>
                </div>
            </div>

            <div class="row"> <!-- Adicionado: role dentro da estrutura -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role">Tipo de acesso</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="comum" {{ (old('role', $usuario->role ?? '') == 'comum') ? 'selected' : '' }}>Comum</option>
                            <option value="administrador" {{ (old('role', $usuario->role ?? '') == 'administrador') ? 'selected' : '' }}>Administrador</option>
                        </select>
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>
