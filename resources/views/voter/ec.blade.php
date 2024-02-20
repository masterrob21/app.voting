<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EC Officials') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5">
                <a href="" class="bg-blue-400 px-4 py-3 rounded hover:opacity-70" class="btn">Add EC</a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <table class="w-full table-auto  text-left">
                            <caption class="caption-top mb-3 underline font-bold">
                                List of EC Officials
                            </caption>
                            <thead class="border-b bg-blue-200">
                                <tr>
                                    <th class="px-2 py-3">#</th>
                                    <th class="px-2 py-2">Name</th>
                                    <th class="px-2 py-2">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($ecs)<1)
                                    <tr class="border-b">
                                        <td colspan="3" class="px-2 py-2"><h3 class="text-red-500 font-semibold">No voter found</h3></td>
                                    </tr>
                                @else
                                    @foreach ($ecs as $ec)
                                        <tr class="border-b">
                                            <td class="px-2 py-2">{{ 1 }}</td>
                                            <td class="px-2 py-2">{{ $ec->userid }}</td>
                                            <td class="px-2 py-2">
                                                <a href="" class="rounded bg-red-300 p-1 text-xs hover:opacity-80">Remove</a>
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
</x-app-layout>
