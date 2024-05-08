<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
            
                <form method="POST" action="/task/{{ $task->id }}">
    
                    <div class="form-group">
                        <textarea name="description" class="bg-gray-100 dark:text-white dark:bg-gray-800 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white">{{$task->description }}</textarea>    
                        @if ($errors->has('description'))
                            <span class="text-danger dark:text-white dark:bg-red-500">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
    
                    <div class="form-group">
                        <button type="submit" name="update" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Update task</button>
                    </div>
                {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</x-app-layout>