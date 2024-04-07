<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

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
                    <div class="mb-4 text-center font-bold text-2xl">
                        <h1>Old Knight of the Alter General Elections</h1>
                    </div>
                    <div class="">
                        <form action="">
                            @if (count($presidents)>0)
                                <div class="border-2 rounded border-sky-500">
                                    <div class="p-4 bg-sky-500 text-white font-bold text-xl">
                                        <h2>President - Candidates</h2>
                                    </div>

                                    <div class="p-4 grid grid-cols-1 gap-4 justify-items-center md:grid-cols-2">
                                    @foreach ($presidents as $president)
                                        <div class="">
                                            <div class="mb-6">
                                                <img src="{{asset('storage/'.$president->photo)}}" class="w-52 h-60 rounded-xl object-cover" alt="photo of candidate">
                                                <div class="radio">
                                                    <label for="president" class="text-lg font-bold capitalize"><input type="radio" name="president" value="{{$president->id}}"> {{ $president->name }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>   
                            @endif
                            
                            @if (count($vicePresidents)>0)
                                <div class="border-2 rounded border-sky-500 mt-6">
                                    <div class="p-4 bg-sky-500 text-white font-bold text-xl">
                                        <h2>Vice President - Candidates</h2>
                                    </div>

                                    <div class="p-4 grid grid-cols-1 gap-4 justify-items-center md:grid-cols-2">
                                    @foreach ($vicePresidents as $vicePresident)
                                        <div class="">
                                            <div class="mb-6">
                                                <img src="{{asset('storage/'.$vicePresident->photo)}}" class="w-52 h-60 rounded-xl object-cover" alt="photo of candidate">
                                                <div class="radio">
                                                    <label for="vicePresident" class="text-lg font-bold capitalize"><input type="radio" name="vicePresident" value="{{$vicePresident->id}}"> {{ $vicePresident->name }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if (count($finSecretarys)>0)
                                <div class="border-2 rounded border-sky-500 mt-6">
                                    <div class="p-4 bg-sky-500 text-white font-bold text-xl">
                                        <h2>Financial Secretary - Candidates</h2>
                                    </div>

                                    <div class="p-4 grid grid-cols-1 gap-4 justify-items-center md:grid-cols-2">
                                    @foreach ($finSecretarys as $finSecretary)
                                        <div class="">
                                            <div class="mb-6">
                                                <img src="{{asset('storage/'.$finSecretary->photo)}}" class="w-52 h-60 rounded-xl object-cover" alt="photo of candidate">
                                                <div class="radio">
                                                    <label for="finSecretary" class="text-lg font-bold capitalize"><input type="radio" name="finSecretary" value="{{$finSecretary->id}}"> {{ $finSecretary->name }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if (count($organisers)>0)
                                <div class="border-2 rounded border-sky-500 mt-6">
                                    <div class="p-4 bg-sky-500 text-white font-bold text-xl">
                                        <h2>Organising Secretary - Candidates</h2>
                                    </div>

                                    <div class="p-4 grid grid-cols-1 gap-4 justify-items-center md:grid-cols-2">
                                    @foreach ($organisers as $organiser)
                                        <div class="">
                                            <div class="mb-6">
                                                <img src="{{asset('storage/'.$organiser->photo)}}" class="w-52 h-60 rounded-xl object-cover" alt="photo of candidate">
                                                <div class="radio">
                                                    <label for="organiser" class="text-lg font-bold capitalize"><input type="radio" name="organiser" value="{{$organiser->id}}"> {{ $organiser->name }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if (count($secretarys)>0)
                                <div class="border-2 rounded border-sky-500 mt-6">
                                    <div class="p-4 bg-sky-500 text-white font-bold text-xl">
                                        <h2>Secretary - Candidates</h2>
                                    </div>

                                    <div class="p-4 grid grid-cols-1 gap-4 justify-items-center md:grid-cols-2">
                                    @foreach ($secretarys as $secretary)
                                        <div class="">
                                            <div class="mb-6">
                                                <img src="{{asset('storage/'.$secretary->photo)}}" class="w-52 h-60 rounded-xl object-cover" alt="photo of candidate">
                                                <div class="radio">
                                                    <label for="secretary" class="text-lg font-bold capitalize"><input type="radio" name="secretary" value="{{$secretary->id}}"> {{ $secretary->name }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div>
                                <button class="bg-sky-300 rounded p-3 mt-3 text-center hover:bg-sky-600">Submit</button>
                            </div>
                        </form>
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