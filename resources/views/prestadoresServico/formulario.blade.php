@csrf

<div class="card">
    <div class="card-body">
        <fieldset>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input value="{{ old('name', $prestador->name ?? '') }}" type="text" required
                            class="form-control" name="name" id="name" placeholder="Nome">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="{{ old('email', $prestador->email ?? '') }}" type="email" required
                            class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Telefone</label>
                        <input value="{{ old('phone', $prestador->phone ?? '') }}" type="text" required
                            class="form-control" name="phone" id="phone" placeholder="Telefone">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="area">Área</label>
                        <input value="{{ old('area', $prestador->area ?? '') }}" type="text" required
                            class="form-control" name="area" id="area" placeholder="Área de atuação">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="notes">Anotações</label>
                        <textarea class="form-control" name="notes" id="notes" placeholder="Anotações" required>{{ old('notes', $prestador->notes ?? '') }}</textarea>
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
