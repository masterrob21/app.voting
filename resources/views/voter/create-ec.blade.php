<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add EC') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <div class="mb-4">
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="Search for EC official"  />
                   </div>

                   <div>
                    <table class="table w-full table-auto border-collapse border border-x-0 text-left">
                        <thead class="bg-blue-300 uppercase">
                            <tr class="">
                                <th class="p-3">Name</th>
                                <th class="p-3">Email</th>
                                <th class="p-3">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($users)<1)
                                <tr>
                                    <td colspan="3" class="p-2"><h3 class="text-red-600">No EC official available</h3></td>
                                </tr>
                            @else
                                @foreach ($users as $user)
                                
                                <tr class="border-b even:bg-gray-50 whitespace-nowrap ">
                                    <form action="" method="POST" id="addEC_form">
                                        @csrf
                                    <td class="p-2 capitalize">{{ $user->name }}</td>
                                    <td class="p-2">{{ $user->email }}</td>
                                    <td class="p-2">
                                        <button class="rounded bg-green-400 hover:opacity-80 text-sm p-2 btn-addec" name="{{$user->name}}" id="{{ $user->id }}">Add</button>
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

    <script type="module">
     $(document).ready(function(){
        $(document).on('click', '.btn-addec', function(e){
            e.preventDefault();
            
            const form = document.getElementById('addEC_form');
            const id = $(this).attr('id');
            const name = $(this).attr('name');
            const confirmAdd = confirm('You are about to add an EC official "' + name + '", Do you want to proceed?');

            form.action = '/ec/' + id;

            if(confirmAdd){
                $('#addEC_form').submit();
            }

        });
     });
    </script>
</x-app-layout>
