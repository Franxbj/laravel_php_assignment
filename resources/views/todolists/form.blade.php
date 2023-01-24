<x-app-layout>
    <x-slot name="header" >
        <div class="flex  justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if($flag ==='new')
                    Create New Todo Item 
                @else
                    Modify Todo Item
                @endif
            </h2>

            <a href="{{route('new-todo')}}" class="border px-2 py-2 bg-blue-500">New Todo</a>
        </div> 
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <h2>What is your Todo Item</h2> <hr><br><br>

                <form action="{{$route}}" method="Post">
                    @csrf
                    <label class="m-2" >Todo Name!</label>
                    <x-text-input placeholder="Todo Name here" class="w-full p-3 m-2 shadow" name="todo_name" required value="{{($flag==='new')?old('todo_name'):$todo->todo_name}}"> </x-text-input> <br><br>
                    <label class="m-2" >Todo Description </label>
                    <textarea id="" cols="" rows="4" class="w-full p-3 m-2 border-0 shadow" name="todo_description">{{($flag==='new')?old('todo_description'):$todo->todo_description}}</textarea> <br><br>
                    
                    <label for="Status">Status:</label>
                    <select name="Status" id="status">
                    <option value="ongoing">NotStarted</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                    </select> <br><br>

                    <x-danger-button class="button">Create</x-danger-button>
                </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
