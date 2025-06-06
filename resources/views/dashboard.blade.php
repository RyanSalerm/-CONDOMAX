@extends('modelo.paginaInicio')

 
@section('conteudo')
    <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ $tarefasCount }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="mdi mdi-checkbox-marked-outline icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Tarefas</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ $prestadoresCount }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-info">
                                <span class="mdi mdi-toolbox"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Prestadores de Serviço</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ $condominiosCount }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <span class="icon icon-box-warning">
                                <i class="mdi mdi-home-city"></i>
                            </span>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Condomínios</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ $clientesCount }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-danger">
                                <span class="mdi mdi-account-multiple"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Clientes</h6>
                </div>
            </div>
        </div>
    </div>



<div class="row">
    <!-- Gráfico -->
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tarefas</h4>
                <div class="chart-container">
                    <canvas id="transaction-history" class="transaction-chart"></canvas>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const ctx = document.getElementById('transaction-history');

                        if (!ctx) {
                            console.error("Elemento canvas com ID 'transaction-history' não encontrado.");
                            return;
                        }

                        const chartLabels = @json($labels);
                        const chartData = @json($data);

                        if (chartLabels && chartData) {
                            new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: chartLabels,
                                    datasets: [{
                                        data: chartData,
                                        backgroundColor: [
                                            'rgba(255, 66, 74, 0.7)',
                                            'rgba(255, 171, 0, 0.7)',
                                            'rgba(143, 95, 232, 0.7)',
                                            'rgba(0, 210, 91, 0.7)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 66, 74, 0.7)',
                                            'rgba(255, 171, 0, 0.7)',
                                            'rgba(143, 95, 232, 0.7)',
                                            'rgba(0, 210, 91, 0.7)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            position: 'top',
                                        },
                                        title: {
                                            display: true,
                                            text: 'Status das Tarefas'
                                        }
                                    }
                                },
                            });
                        } else {
                            console.warn("Dados inválidos passados para o gráfico de pizza.");
                        }
                    });
                </script>
            </div>
        </div>
    </div>
<div class="col-md-8 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tarefas Pendentes por Condomínio</h4>
            <div class="table-responsive" style="overflow-x: hidden;"> <table class="table" style="table-layout: fixed; width: 95%;">
                <table class="table" style="table-layout: fixed; width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 15%;"> Tarefa </th>
                            <th style="width: 25%;"> Condomínio </th>
                            <th style="width: 20%;"> Vence em </th> <th style="width: 35%;"> Status </th>   </tr>
                    </thead>
                    <tbody>
                        @foreach ($tarefasFiltradas as $tarefa)
                            <tr>
                                <td>{{ $tarefa['id'] }}</td>
                                <td>{{ $tarefa['Condomínio']['nome'] }} ID: {{ $tarefa['Condomínio']['id'] }}</td>

                                @if($tarefa['Meses de Vencimento'] == 1)
                                    <td>{{ $tarefa['Meses de Vencimento'] }} mês</td>
                                @else
                                    <td>{{ $tarefa['Meses de Vencimento'] }} meses</td>
                                @endif

                                @php $classe = 'badge badge-outline'; @endphp
                                @if ($tarefa['Status'] === 'Não iniciada')
                                    @php $classe .= 'badge badge-outline-danger'; @endphp
                                @elseif ($tarefa['Status'] === 'Em execução')
                                    @php $classe .= 'badge badge-outline-info'; @endphp
                                @elseif ($tarefa['Status'] === 'Em andamento')
                                    @php $classe .= 'badge badge-outline-warning'; @endphp
                                @else
                                    @php $classe .= 'badge badge-outline-success'; @endphp
                                @endif
                                <td><span class="{{ $classe }}">{{ $tarefa['Status'] }}</span></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    @endsection


@extends('modelo.paginaFim')