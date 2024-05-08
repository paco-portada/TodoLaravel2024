<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
                <table class="w-full text-md rounded mb-4">
                    <thead>
                    <tr>
                        <th>
                        <div class="flex-auto text-left text-2xl mt-4 mb-4 dark:text-white">Tasks List</div>
                        </th>
                        <th><div class="flex-auto text-right float-right mt-4 mb-4">
                        <a href="/task" class="bg-blue-500 dark:bg-cyan-700 hover:bg-gray-700 text-white font-bold mr-8 py-2 px-4 rounded">Add a new Task</a>                        
                    </div></th>
                    </tr>
                    <tr class="border-b dark:text-white text-center">
                        <th class="text-left p-3 px-5">Task</th>
                        <th class="text-left p-3 px-5">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->tasks as $task)
                        <tr class="border-b hover:bg-orange-100 dark:text-white text-center">
                            <td class="p-3 px-5">
                                {{$task->description}}
                            </td>
                            <td class="p-3 px-5">                                  
                            <form action="/task/{{$task->id}}" class="inline-block">
                                <a href="/task/{{$task->id}}" name="edit" class="text-sm bg-gray-500 hover:bg-gray-700 text-white py-1 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>    
                                <button type="submit" name="delete" formmethod="POST" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                {{ csrf_field() }}
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</x-app-layout>