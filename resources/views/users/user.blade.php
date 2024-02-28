<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5">
                <a href="" class="bg-blue-400 px-4 py-3 rounded hover:opacity-70" class="btn">Add User</a>

                @if (session('status'))
                    <div class="p-3 bg-green-300 mt-3" id="alert-message">
                        {{ session('status') }}
                    </div>
                @endif

            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                        <table class="w-full table-auto  text-left">
                            <caption class="caption-top mb-3 underline font-bold">
                                List of User Accounts
                            </caption>
                            <thead class="border-b bg-blue-200 whitespace-nowrap">
                                <tr>
                                    <th class="px-2 py-3">Name</th>
                                    <th class="px-2 py-2">Email</th>
                                    <th class="px-2 py-2">Is System</th>
                                    <th class="px-2 py-2">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($users)<1)
                                    <tr>
                                        <td colspan="3" class="px-2 py-2"><h3 class="text-red-500">No user found</h3></td>
                                    </tr>
                                @else
                                    @foreach ($users as $user)
                                        <tr class="border-b even:bg-gray-50 whitespace-nowrap">
                                            <form action="" method="POST">
                                                @csrf
                                                <td class="px-2 py-2">{{ $user->name }}</td>
                                                <td class="px-2 py-2">{{ $user->email }}</td>
                                                <td class="px-2 py-2">{{ ($user->is_system) ? 'Yes' : 'No' }}</td>
                                                <td class="px-2 py-2">
                                                    @if (!$user->is_system)
                                                    <a href="user/{{$user->id}}" class="rounded bg-red-300 p-1 text-xs hover:opacity-80">Reset password</a>
                                                    <a href="" class="rounded p-1 text-xs bg-slate-300 hover:opacity-80 ">Disable</a>
                                                    @endif
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
    });
</script>