<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voter Register') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5">
                <a href="{{ route('voter.create') }}" class="bg-blue-400 px-4 py-3 rounded hover:opacity-70" class="btn">Add voter</a>
            </div>

            @if (session('status'))
                    <div class="p-3 bg-green-300 mt-3" id="alert-message">
                        {{ session('status') }}
                    </div>
                @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <table class="w-full table-auto  text-left">
                            <caption class="caption-top mb-3 underline font-bold">
                                List of Voters
                            </caption>
                            <thead class="border-b bg-blue-200">
                                <tr>
                                    <th class="px-2 py-3">#</th>
                                    <th class="px-2 py-2">Name</th>
                                    <th class="px-2 py-2">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($voters)<1)
                                    <tr class="border-b">
                                        <td colspan="3" class="px-2 py-2"><h3 class="text-red-500 font-semibold">No voter found</h3></td>
                                    </tr>
                                @else
                                    @php
                                        $i = 0;
                                    @endphp 
                                    @foreach ($voters as $voter)
                                    @php
                                        $i++; 
                                    @endphp
                                   
                                        <tr class="border-b">
                                            <form action="" method="POST" id="delete_form">
                                                @csrf
                                                @method('delete')
                                            <td class="px-2 py-2">{{ $i }}</td>
                                            <td class="px-2 py-2">
                                                {{ $voter->name }}
                                            </td>
                                            <td cl3ss="px-2 py-2">
                                                <button class="rounded bg-red-300 p-1 text-xs hover:opacity-80 btn_remove" name="{{$voter->name}}" id="{{$voter->id}}">Remove</button>
                                            </td>
                                            </form>
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
</x-app-layout>

<script type="module">
    $(document).ready(function(){
        setTimeout(() => {
            $('#alert-message').fadeOut();
        }, 3000);

        $(document).on('click', '.btn_remove', function(e){
            e.preventDefault();
            
            const voterName = $(this).attr('name');
            const id = $(this).attr('id');
            const confirm_ok = confirm('Do you want delete the voter ' + voterName);

            const form = document.getElementById('delete_form');
            form.action = '/voter/' + id + '/delete' ;

            if (confirm_ok) {
                $('#delete_form').submit();
            }
        });
    });
</script>