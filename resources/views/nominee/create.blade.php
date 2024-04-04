<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Nominees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-red-400 font-bold text-center text-lg mb-4 underline">New Nominee</h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <form action="{{ route('nominee.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-4">
                        <x-input-label for="userid" :value="__('UserName')" />
                        <select name="userid" id="userid" class="block mt-1 w-full" autofocus required>
                            <option value=""> ...</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('userid')" class="mt-2" />
                    </div>
                    
                    <div class="mt-4">
                        <x-input-label for="position" :value="__('Position')" />
                        <select name="position" id="position" class="block mt-1 w-full" required>
                            <option value=""> ...</option>
                            @foreach ($positions as $position)
                                <option value="{{$position->id}}">{{$position->position}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('position')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="photo" :value="__('Photo')" />
                        <input type="file" class="block mt-1 w-full" name="photo" required>
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div>

                    <div class="mt-4 flex flex-row-reverse">
                        <x-primary-button >
                            {{ __('Add nominee') }}
                        </x-primary-button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>

