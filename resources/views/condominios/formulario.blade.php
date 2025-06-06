@csrf
<div class="card">
    <div class="card-body">
        <fieldset>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input value="{{ old('name', $condominio->name ?? '') }}" type="text" required
                            class="form-control" name="name" id="name" placeholder="Nome">
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="responsible">Responsável</label>
                            <input value="{{ old('responsible', $condominio->responsible ?? '') }}" type="text" required
                                class="form-control" name="responsible" id="responsible" placeholder="Responsável">
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact">Contato</label>
                        <input value="{{ old('contact', $condominio->contact ?? '') }}" type="text" required
                            class="form-control" name="contact" id="contact" placeholder="Contato">
                    </div>
                </div>  
            </div>

            <div class="row">
                <h4 class="col-md-12">Endereço</h4>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="address_type">Tipo de Logradouro</label>
                        <input type="text" class="form-control" name="address_type" placeholder="Ex: Rua, Av.">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="address_street">Nome do Logradouro</label>
                        <input type="text" class="form-control" name="address_street" placeholder="Nome do Logradouro">
                    </div>
                </div>

               <div class="col-md-3">
                    <div class="form-group">
                        <label for="address_number">Número</label>
                        <input type="text" class="form-control" name="address_number" placeholder="Número">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="address_neighborhood">Bairro</label>
                        <input type="text" class="form-control" name="address_neighborhood" placeholder="Bairro">
                        </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="address_city">Cidade</label>
                        <input type="text" class="form-control" name="address_city" placeholder="Cidade">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="address_state">Estado</label>
                        <input type="text" class="form-control" name="address_state" placeholder="Estado">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="address_country">País</label>
                        <input type="text" class="form-control" name="address_country" placeholder="Brasil">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="address_cep">CEP</label>
                        <input type="text" class="form-control" name="address_cep" placeholder="CEP">
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
