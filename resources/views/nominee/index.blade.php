@php
    $i = 0;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nominees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5">
                <a href="{{ route('nominee.index') }}" class="bg-blue-400 px-4 py-3 rounded hover:opacity-70" class="btn">Add a nominee</a>
                @if (session('status'))
                <x-flash>
                    {{ session('status') }}
                </x-flash>
            @endif

            @if (session('warning'))
                 <x-flash type="warning">
                    {{ session('warning') }}
                 </x-flash>
            @endif
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <table class="w-full table-auto  text-left">
                            <caption class="caption-top mb-3 underline font-bold">
                                List of Nominees
                            </caption>
                            <thead class="border-b bg-blue-200">
                                <tr>
                                    <th class="px-2 py-3">#</th>
                                    <th class="px-2 py-2">Name</th>
                                    <th class="px-2 py-2">Position</th>
                                    <th class="px-2 py-2">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($nominees)<1)
                                    <tr class="border-b">
                                        <td colspan="4" class="px-2 py-2"><h3 class="text-red-500 font-semibold">No nominee available</h3></td>
                                    </tr>
                                @else
                                    @foreach ($nominees as $nominee)
                                    @php
                                        $i++
                                    @endphp
                                        <tr class="border-b even:bg-gray-50">
                                            <td class="px-2 py-2">{{ $i }}</td>
                                            <td class="px-2 py-2">{{ $nominee->name }}</td>
                                            <td class="px-2 py-2">{{ $nominee->position }}</td>
                                            <td class="px-2 py-2">
                                                <form action="" method="POST" id="delete_nominee_form">
                                                    @csrf
                                                    @method('delete')
                                                <button class="btn-remove rounded bg-red-300 p-1 text-xs hover:opacity-80" id="{{ $nominee->id }}">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function(){

            setTimeout(() => {
                $('#alert-message').fadeOut();
            }, 3000);

            $(document).on('click', '.btn-remove', function(e){
                e.preventDefault();

                const id = $(this).attr('id');
                const form = document.getElementById('delete_nominee_form');
                const confirm_ok = confirm('You are about to remove an official, Do you want to proceed.');

                form.action = '/ec/' + id + '/delete';

                if(confirm_ok){
                    $('#delete_ec_form').submit();
                }
            });

        });
    </script>
</x-app-layout>
