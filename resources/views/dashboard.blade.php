<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} - Hello <b>{{ Auth::user()->name }}</b>
            /
            <b>Total users:
                <span><b>{{ count($users) }}</b></span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sl No</th>
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($users as $data)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                {{-- <td>{{ $data->created_at->diffForHumans() }}</td> --}}
                                <td>{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
