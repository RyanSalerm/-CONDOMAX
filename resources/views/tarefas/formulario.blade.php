@csrf

<div class="card">
    <div class="card-body">
        <fieldset>
            <div class="row">
                {{-- Descrição --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <input value="{{ old('description', $task->description ?? '') }}" type="text" required
                            class="form-control" name="description" id="description"
                            placeholder="Digite a descrição da tarefa">
                    </div>
                </div>

                {{-- Condomínio --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="condominium_id">Condomínio</label>
                            <select name="condominium_id" class="form-control" required>
                                <option value="">Selecione um condomínio</option>
                                @foreach($condominiums as $condominium)
                                    <option value="{{ $condominium->id }}" {{ old('condominium_id') == $condominium->id ? 'selected' : '' }}>
                                        {{ $condominium->name }}
                                    </option>
                                @endforeach
                            </select>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- Data de Manutenção --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="maintenance_date">Data de Manutenção</label>
                        <input value="{{ old('maintenance_date', $task->maintenance_date ?? '') }}" type="date" required
                            class="form-control" name="maintenance_date" id="maintenance_date">
                    </div>
                </div>

                {{-- Meses para vencimento --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="due_months">Meses para vencimento</label>
                        <input value="{{ old('due_months', $task->due_months ?? '') }}" type="number" min="0"
                            class="form-control" name="due_months" id="due_months">
                    </div>
                </div>

                {{-- Repetir a cada x meses --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="repeat_months">Repetir a cada (meses)</label>
                        <input value="{{ old('repeat_months', $task->repeat_months ?? '') }}" type="number" min="0"
                            class="form-control" name="repeat_months" id="repeat_months">
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- Prioridade --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="priority">Prioridade</label>
                        <select name="priority" id="priority" class="form-control" required>
                            <option value="Alta" {{ old('priority', $task->priority ?? '') == 'Alta' ? 'selected' : '' }}>Alta</option>
                            <option value="Média" {{ old('priority', $task->priority ?? '') == 'Média' ? 'selected' : '' }}>Média</option>
                            <option value="Baixa" {{ old('priority', $task->priority ?? '') == 'Baixa' ? 'selected' : '' }}>Baixa</option>
                        </select>
                    </div>
                </div>

                {{-- Status --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="Não iniciada" {{ old('status', $task->status ?? '') == 'Não iniciada' ? 'selected' : '' }}>Não iniciada</option>
                            <option value="Em andamento" {{ old('status', $task->status ?? '') == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                            <option value="Em execução" {{ old('status', $task->status ?? '') == 'Em execução' ? 'selected' : '' }}>Em execução</option>
                            <option value="Concluída" {{ old('status', $task->status ?? '') == 'Concluída' ? 'selected' : '' }}>Concluída</option>
                        </select>
                    </div>
                </div>

                {{-- Situação --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="situation">Situação</label>
                        <select name="situation" id="situation" class="form-control" required>
                            <option value="Em dia" {{ old('situation', $task->situation ?? '') == 'Em dia' ? 'selected' : '' }}>Em dia</option>
                            <option value="Atrasado" {{ old('situation', $task->situation ?? '') == 'Atrasado' ? 'selected' : '' }}>Atrasado</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- Observações --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="notes">Observações</label>
                        <textarea name="notes" id="notes" class="form-control" rows="3"
                            placeholder="Digite observações (opcional)">{{ old('notes', $task->notes ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- Prestador de Serviço --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="provider_id">Prestador de Serviço</label>
                        <select name="provider_id" id="provider_id" class="form-control">
                            <option value="">Nenhum</option>
                            @foreach($providers as $provider)
                                <option value="{{ $provider->id }}"
                                    {{ old('provider_id', $task->provider_id ?? '') == $provider->id ? 'selected' : '' }}>
                                    {{ $provider->name }}
                                </option>
                            @endforeach
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
