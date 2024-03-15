<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Positions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5">
                <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'addPosition')">
                    {{ __('Add Position') }}
                </x-primary-button>
            </div>

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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <table class="w-full table-auto  text-left">
                            <caption class="caption-top mb-3 underline font-bold">
                                List of Positions
                            </caption>
                            <thead class="border-b bg-blue-200">
                                <tr>
                                    <th class="px-2 py-3">#</th>
                                    <th class="px-2 py-2">Position</th>
                                    <th class="px-2 py-2">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($positions)<1)
                                    <tr class="border-b">
                                        <td colspan="3" class="px-2 py-2"><h3 class="text-red-500 font-semibold">No position found</h3></td>
                                    </tr>
                                @else
                                    @php
                                        $i = 0;
                                    @endphp 
                                    @foreach ($positions as $position)
                                    @php
                                        $i++; 
                                    @endphp
                                   
                                        <tr class="border-b even:bg-gray-50">
                                            <form action="" method="POST" id="delete_form">
                                                @csrf
                                                @method('delete')
                                            <td class="px-2 py-2">{{ $i }}</td>
                                            <td class="px-2 py-2">
                                                {{ $position->position }}
                                            </td>
                                            <td cl3ss="px-2 py-2">
                                                <button class="rounded bg-red-300 p-1 text-xs hover:opacity-80 btn_remove" name="{{$position->name}}" id="{{$position->id}}">Remove</button>
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

    {{-- Modal for adding positions --}}
    <x-modal name="addPosition" :show="$errors->isNotEmpty()" focusable>
        <form method="post" action="{{route('positions.store')}}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('New Position') }}
            </h2>

            <div class="mt-6">
                <x-input-label for="position" value="{{ __('position') }}" class="sr-only" />

                <x-text-input
                    id="position"
                    name="position"
                    type="text"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Position') }}"
                />

                <x-input-error :messages="$errors->get('position')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Add Position') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>

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