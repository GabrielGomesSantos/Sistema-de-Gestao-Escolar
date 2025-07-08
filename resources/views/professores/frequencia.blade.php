@extends('layout.app')

@section('title', 'Frequência')

@section('content')
@php
    $chamadaConfirmada = $confirmada ?? false;
    $dataChamada = \Carbon\Carbon::parse($data ?? now());
@endphp

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Chamada do Dia - {{ $turma->nome ?? 'Turma' }}</h2>
        <a href="#" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Voltar
        </a>
    </div>

    <form action="{{ route('professor.frequencia.store', ['turma' => $turma->id]) }}" method="POST" id="formFrequencia">
        @csrf

        <div class="mb-3 row align-items-center">
            <label for="data" class="col-form-label col-sm-2">Data da Chamada:</label>
            <div class="col-sm-6 d-flex align-items-center gap-2">
                <button type="button" id="btnAnterior" class="btn btn-outline-primary">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <span id="dataLabel" style="min-width: 130px; text-align: center; font-weight: 500;">
                    {{ $dataChamada->format('d/m/Y') }}
                </span>

                <button type="button" id="btnProximo" class="btn btn-outline-primary">
                    <i class="bi bi-chevron-right"></i>
                </button>

                <input type="hidden" name="data" id="dataInput" value="{{ $dataChamada->format('Y-m-d') }}">
            </div>
        </div>

        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-0" style="max-height: 450px; overflow-y: auto;">
                <table class="table table-hover mb-0">
                    <thead class="table-light sticky-top" style="top: 0; z-index: 1;">
                        <tr>
                            <th>Aluno</th>
                            <th>Presença</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alunos as $aluno)
                        <tr>
                            <td>{{ $aluno->nome }}</td>
                            <td>
                                <select name="frequencia[{{ $aluno->id }}]" class="form-select" {{ $chamadaConfirmada ? 'disabled' : '' }}>
                                    <option value="presente" {{ (!($frequencias[$aluno->id] ?? null) || $frequencias[$aluno->id] == 'presente') ? 'selected' : '' }}>Presente</option>
                                    <option value="faltou" {{ ($frequencias[$aluno->id] ?? '') == 'faltou' ? 'selected' : '' }}>Faltou</option>
                                    <option value="justificou" {{ ($frequencias[$aluno->id] ?? '') == 'justificou' ? 'selected' : '' }}>Justificou</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="text-end mt-4">
            @if(!$chamadaConfirmada)
                <button type="submit" class="btn btn-success" id="btnConfirmar">
                    <i class="bi bi-check2-circle me-1"></i> Confirmar Chamada
                </button>
            @else
                <div class="alert alert-info mb-0">Chamada confirmada para esta data. Não é possível editar.</div>
            @endif
        </div>
    </form>
</div>

<script>
    const dataLabel = document.getElementById('dataLabel');
    const dataInput = document.getElementById('dataInput');
    const btnAnterior = document.getElementById('btnAnterior');
    const btnProximo = document.getElementById('btnProximo');
    const formFrequencia = document.getElementById('formFrequencia');
    const selectElements = () => formFrequencia.querySelectorAll('select[name^="frequencia"]');

    function formatDateBR(date) {
        const d = String(date.getDate()).padStart(2, '0');
        const m = String(date.getMonth() + 1).padStart(2, '0');
        const y = date.getFullYear();
        return `${d}/${m}/${y}`;
    }

    function formatDateISO(date) {
        const d = String(date.getDate()).padStart(2, '0');
        const m = String(date.getMonth() + 1).padStart(2, '0');
        const y = date.getFullYear();
        return `${y}-${m}-${d}`;
    }

    function normalizeDate(date) {
        return new Date(date.getFullYear(), date.getMonth(), date.getDate());
    }

    // Inicializa com a data que vem do Blade
    let currentDate = normalizeDate(new Date(dataInput.value + 'T00:00:00'));

    function updateDateDisplay() {
        dataLabel.textContent = formatDateBR(currentDate);
        dataInput.value = formatDateISO(currentDate);
    }

    async function carregarFrequencia() {
        const isoDate = formatDateISO(currentDate);
        updateDateDisplay();

        try {
            const response = await fetch(`/professor/frequencia/dados?data=${isoDate}&turma_id={{ $turma->id }}`);
            if (!response.ok) throw new Error('Erro na requisição');

            const data = await response.json();

            const chamadaConfirmada = Object.keys(data).length > 0;
            const hoje = normalizeDate(new Date());
            const podeEditar = currentDate.getTime() === hoje.getTime() && !chamadaConfirmada;

            selectElements().forEach(select => {
                const alunoId = select.name.match(/\d+/)[0];
                const valor = data[alunoId] || 'presente';
                select.value = valor;
                select.disabled = !podeEditar;
            });

            // Botões
            btnAnterior.disabled = false;
            btnProximo.disabled = false;

            const btnConfirmar = document.getElementById('btnConfirmar');
            if (btnConfirmar) btnConfirmar.disabled = !podeEditar;

            // Alerta
            let alertInfo = formFrequencia.querySelector('.alert-info');
            if (!podeEditar) {
                if (!alertInfo) {
                    const div = document.createElement('div');
                    div.classList.add('alert', 'alert-info', 'mb-0');
                    div.textContent = chamadaConfirmada
                        ? 'Chamada confirmada para esta data. Não é possível editar.'
                        : 'Só é possível registrar chamada na data atual.';
                    formFrequencia.appendChild(div);
                }
            } else {
                if (alertInfo) alertInfo.remove();
            }

        } catch (error) {
            console.error('Erro ao carregar frequência:', error);
        }
    }

    btnAnterior.addEventListener('click', () => {
        currentDate.setDate(currentDate.getDate() - 1);
        carregarFrequencia();
    });

    btnProximo.addEventListener('click', () => {
        currentDate.setDate(currentDate.getDate() + 1);
        carregarFrequencia();
    });

    // Inicializa a tela
    carregarFrequencia();
</script>



@endsection
