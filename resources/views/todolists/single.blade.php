<x-app-layout>
    <x-slot name="header" >
        <div class="flex  justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __($title) }}        
            </h2>

            <a href="{{route('new-todo')}}" class="border px-2 py-2 bg-blue-500">New Todo</a>
        </div> 
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <h1>{{$todo->todo_name}}</h1>
                <br>
                <p>{{$todo->todo_description}}</p>
                <p>{{$todo->Status}}</p>
                

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
