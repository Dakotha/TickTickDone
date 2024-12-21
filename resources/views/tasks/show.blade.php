<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task') }}
        </h2>

        <div>
            <x-button class="bg-gray-400 hover:bg-gray-500" href="{{ route('tasks.index') }}">{{ __('Go back') }}</x-button>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="flex justify-between items-center px-4 py-6 sm:px-6">
                    <div class="flex flex-col">
                        <h3 class="text-base/7 font-semibold text-gray-900">{{ $task->name }}</h3>

                        <div>
                            <span class="text-sm/6 text-gray-500">{{ $task->priority }}</span>
                            <span class="text-sm/6 text-gray-500">|</span>
                            <span class="text-sm/6 text-gray-500">{{ $task->status }}</span>
                            <span class="text-sm/6 text-gray-500">|</span>
                            <span class="text-sm/6 text-gray-500">{{ $task->due_date }}</span>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <a href="{{ route('tasks.edit', $task->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>

                        <form class="flex items-center" id="delete-task-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="button" class="text-rose-400" onclick="confirmDelete({{ $task->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="border-t border-gray-100">
                    <dl class="divide-y divide-gray-100">
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900">Description</dt>
                            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $task->description }}</dd>
                        </div>


                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900">Created at</dt>
                            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $task->created_at }}</dd>
                        </div>

                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900">User</dt>
                            <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $task->user->name }}</dd>
                        </div>
                    </dl>
                </div>
            </div>


            <div class="overflow-hidden rounded-lg bg-white shadow">
                <div class="px-2 py-4">

                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="mt-8 flow-root">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Task ID</th>
                                                <th scope="col" class="whitespace-nowrap px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Field</th>
                                                <th scope="col" class="whitespace-nowrap px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Old value</th>
                                                <th scope="col" class="whitespace-nowrap px-3 py-3.5 text-left text-sm font-semibold text-gray-900">New value</th>
                                                <th scope="col" class="whitespace-nowrap px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date</th>
                                            </tr>
                                        </thead>

                                        <tbody class="divide-y divide-gray-200">
                                            @forelse ($histories as $history)
                                                <tr>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $history->task_id }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $history->field }}</td>
                                                    <td class="px-3 py-4 text-sm text-gray-500">{{ $history->old_value }}</td>
                                                    <td class="px-3 py-4 text-sm text-gray-500">{{ $history->new_value }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $history->created_at }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="px-3 py-4 text-sm text-gray-500">It's clear</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
