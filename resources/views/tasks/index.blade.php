<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>

        <div>
            <x-button href="{{ route('tasks.create') }}">{{ __('Add New Task') }}</x-button>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">
            <div class="overflow-hidden rounded-lg bg-white shadow">
                <form method="GET" action="{{ route('tasks.index') }}" class="px-4 py-5 sm:p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                        <div>
                            <label for="priority" class="block text-sm font-medium text-gray-900">Priority</label>
                            <div class="mt-2">
                                <select
                                    class="block w-full bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 rounded"
                                    name="priority"
                                    id="priority"
                                >
                                    <option value="">All</option>
                                    <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                                    <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-900">Status</label>
                            <div class="mt-2">
                                <select
                                    class="block w-full bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 rounded"
                                    name="status"
                                    id="status"
                                >
                                    <option value="">All</option>
                                    <option value="to-do" {{ request('status') == 'to-do' ? 'selected' : '' }}>To-Do</option>
                                    <option value="in progress" {{ request('status') == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="due_date" class="block text-sm font-medium text-gray-900">Due Date</label>
                            <div class="mt-2">
                                <input
                                    class="block w-full bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 rounded"
                                    type="date"
                                    name="due_date"
                                    id="due_date"
                                    value="{{ request('due_date') }}"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between items-center space-x-4 mt-4">
                        <div>
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded shadow">
                                Apply Filters
                            </button>
                            <a href="{{ route('tasks.index') }}" class="ml-2 px-4 py-2 bg-gray-300 text-gray-800 text-sm font-medium rounded shadow">
                                Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>






            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-10 overflow-hidden">
                @forelse ($tasks as $task)
                    <div class="group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500 rounded shadow flex flex-col justify-between">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-x-4 md:gap-x-6">
                            <div>
                                <span
                                    @class([
                                        'inline-flex items-center gap-x-2 p-3 ring-4 ring-white',
                                        'text-green-400' => $task->status === 'to-do',
                                        'text-yellow-700' => $task->status === 'in progress',
                                        'text-blue-400' => $task->status === 'done',
                                    ])
                                >
                                    <x-task-status-icon :status="$task->status" />
                                    {{ $task->statusLabel }}
                                </span>
                            </div>

                            <div>
                                <span
                                    @class([
                                        'inline-flex items-center gap-x-2 p-3 ring-4 ring-white',
                                        'text-gray-400' => $task->priority === 'low',
                                        'text-yellow-400' => $task->priority === 'medium',
                                        'text-rose-400' => $task->priority === 'high',
                                    ])
                                >
                                    <x-task-priority-icon :priority="$task->priority" />
                                    {{ $task->priorityLabel }}
                                </span>
                            </div>

                            <div>
                                <span class="inline-flex items-center gap-x-2 p-3 text-teal-700 ring-4 ring-white">
                                    @datetime($task->due_date)
                                </span>
                            </div>
                        </div>


                        <div class="mt-8 flex-1">
                            <h3 class="text-base font-semibold text-gray-900">{{ $task->name }}</h3>

                            <p class="mt-2 text-sm text-gray-500">{{ Str::limit($task->description, 100, ' ...') }}</p>
                        </div>


                        <div class="flex flex-col space-y-10">
                            <div class="flex justify-between items-center mt-8">
                                <div class="flex items-center space-x-6">
                                    <x-button class="bg-yellow-400" href="{{ route('tasks.edit', $task->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </x-button>

                                    <x-button href="{{ route('tasks.show', $task->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                        </svg>
                                    </x-button>
                                </div>

                                <form id="delete-task-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="text-rose-400" onclick="confirmDelete({{ $task->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            <div>
                                @if ($task->share_token && $task->isTokenValid())
                                    <div class="flex items-center space-x-4">
                                        <input id="share-link-{{ $task->id }}" type="text" class="flex-1" value="{{ route('tasks.shared', $task->share_token) }}" readonly>
                                        <button type="button" class="btn btn-success" onclick="copyToClipboard({{ $task->id }})">
                                            {{ __('Copy Link') }}
                                        </button>
                                    </div>
                                @else
                                    <form method="GET" action="{{ route('tasks.share', $task) }}">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Generate Share Link') }}
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full flex justify-center items-center bg-white p-6 rounded shadow">
                        <p class="text-gray-500">No tasks found.</p>
                    </div>
                @endforelse
            </div>

            <div>
                {{ $tasks->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
