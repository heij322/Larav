@extends('admin.app')

@section('content')
    <h1 class="mb-4">Заказы</h1>

    <table class="table table-striped table-bordered table-sm align-middle">
        <thead class="table-light">
            <tr>
                <th style="width: 40px;">ID</th>
                <th>Клиент</th>
                <th style="width: 130px;">Телефон</th>
                <th>Адрес</th>
                <th style="width: 110px;">Сумма</th>
                <th style="width: 110px;">Статус</th>
                <th style="width: 140px;">Дата</th>
                <th style="width: 160px;">Действия</th>
            </tr>
        </thead>

        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ number_format($order->total, 2, '.', ' ') }} руб.</td>

                {{-- Статус как цветной бейдж --}}
                <td>
                    @php
                        $statusClasses = [
                            'new'     => 'badge bg-primary',
                            'process' => 'badge bg-warning text-dark',
                            'done'    => 'badge bg-success',
                        ];

                        $statusLabels = [
                            'new'     => 'Новый',
                            'process' => 'В обработке',
                            'done'    => 'Выполнен',
                        ];

                        $badgeClass = $statusClasses[$order->status] ?? 'badge bg-secondary';
                        $badgeLabel = $statusLabels[$order->status] ?? 'Неизвестен';
                    @endphp

                    <span class="{{ $badgeClass }}">
                        {{ $badgeLabel }}
                    </span>
                </td>

                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>

                {{-- Действия: смена статуса + удалить --}}
                <td class="text-nowrap">
                    {{-- селект статуса --}}
                    <form action="{{ route('admin.orders.update', $order->id) }}"
                          method="POST"
                          class="d-inline-block me-1">
                        @csrf
                        <select name="status"
                                class="form-select form-select-sm"
                                onchange="this.form.submit()">
                            <option value="new" {{ $order->status == 'new' ? 'selected' : '' }}>Новый</option>
                            <option value="process" {{ $order->status == 'process' ? 'selected' : '' }}>В обработке</option>
                            <option value="done" {{ $order->status == 'done' ? 'selected' : '' }}>Выполнен</option>
                        </select>
                    </form>

                    {{-- кнопка удалить --}}
                    <form action="{{ route('admin.orders.delete', $order->id) }}"
                          method="POST"
                          class="d-inline-block"
                          onsubmit="return confirm('Удалить заказ #{{ $order->id }}?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                style="padding: 0 10px; line-height: 1.2;">
                            &#8722;
                        </button>
                        {{-- если у тебя точно подключён Font Awesome, можно так:
                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                style="padding: 0 10px; line-height: 1.2;">
                            <i class="fas fa-minus"></i>
                        </button>
                        --}}
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection