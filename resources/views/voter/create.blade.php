<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Voter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <div class="mb-4">
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="Search for a voter"  />
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
                                    <td colspan="3"><h3 class="text-red-300">No available user</h3></td>
                                </tr>
                            @else
                                @foreach ($users as $user)
                                
                                <tr class="border-b even:bg-gray-50 whitespace-nowrap ">
                                    <form action="/voter/{{ $user->id }}" method="post">
                                        @csrf
                                        @method('post')

                                    <td class="p-2 capitalize">{{ $user->name }}</td>
                                    <td class="p-2">{{ $user->email }}</td>
                                    <td class="p-2"><button class="rounded bg-green-400 hover:opacity-80 text-sm p-2">Add</button></td>
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
