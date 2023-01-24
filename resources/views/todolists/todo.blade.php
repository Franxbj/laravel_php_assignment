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
                    
                <table class="w-full p-4 table-auto">
    
                    <thead>
                        <tr >
                            <x-column>ID</x-column>
                            <x-column>Todo Item</x-column>
                            <x-column>Todo Description</x-column>
                            <x-column>Status</x-column>
                            <x-column>Actions</x-column>
                            
                        </tr>
                    </thead>
                    
                    <tbody >
                        
                        @foreach($todo as $todo)
                            <tr >
                            
                                <x-column>{{$todo->id}}</x-column>
                                <x-column><a href ="/todo/view/{{$todo->id}}">{{$todo->todo_name}}</a></x-column>
                                <x-column>{{$todo->todo_description}}</x-column>
                                <x-column>{{$todo->Status}}</x-column>
                                <x-column>
                                    <a href="/todo/edit/{{$todo->id}}">Edit</a>
                                    <a href="/todo/delete/{{$todo->id}}">Delete</a>
                                </x-column>
                            </tr>
                           
                        @endforeach
                    </tbody>
                </table>
                

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
