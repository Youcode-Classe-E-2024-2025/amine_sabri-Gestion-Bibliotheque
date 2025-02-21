@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4"><i class="bi bi-book-half"></i> Mes Emprunts</h2>
    
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    @if(Auth::user()->role === 'admin')
                        <th class="py-2 px-4 border"><i class="bi bi-person"></i> Utilisateur</th>
                    @endif
                    <th class="py-2 px-4 border-b text-left"><i class="bi bi-book"></i> Livre</th>
                    <th class="py-2 px-4 border-b text-left"><i class="bi bi-calendar-check"></i> Date d'emprunt</th>
                    <th class="py-2 px-4 border-b text-left"><i class="bi bi-calendar-date"></i> Date de retour</th>
                    <th class="py-2 px-4 border-b text-center"><i class="bi bi-disc"></i> Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($loans as $loan)
                <tr class="border-b hover:bg-gray-50">
                    @if(Auth::user()->role === 'admin')
                        <td class="py-3 px-4">{{ $loan->user->name }}</td>
                    @endif
                    <td class="py-3 px-4">{{ $loan->book->title }}</td>
                    <td class="py-3 px-4">{{ \Carbon\Carbon::parse($loan->borrowed_at)->format('d/m/Y H:i') }}</td>
                    <td class="py-3 px-4">
                        @if($loan->returned_at)
                            {{ \Carbon\Carbon::parse($loan->returned_at)->format('d/m/Y H:i') }}
                        @else
                            <i class="bi bi-x-lg text-red-500"></i> Non retourné
                        @endif
                    </td>
                    <td class="py-3 px-4 text-center">
                        @if(is_null($loan->returned_at))
                            @if(Auth::user()->role !== 'admin') <!-- Si l'utilisateur n'est pas admin -->
                                <form action="{{ route('loans.return', $loan->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded shadow">
                                        Retourner
                                    </button>
                                </form>
                            @else
                                <button type="button" class="bg-gray-300 text-white font-semibold py-1 px-3 rounded shadow cursor-not-allowed" disabled>
                                    Désactivé
                                </button>
                            @endif
                        @else
                            <i class="bi bi-check-lg text-xl text-green-500"></i> Retourné
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
