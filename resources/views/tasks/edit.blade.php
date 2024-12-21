<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit task') }}
        </h2>

        <div>
            <x-button class="bg-gray-400 hover:bg-gray-500" href="{{ route('tasks.index') }}">{{ __('Go back') }}</x-button>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-hidden rounded-lg bg-white shadow">
                <div class="px-20 py-5 sm:p-6">

                    <form
                        class="flex flex-col space-y-10"
                        action="{{ route('tasks.update', $task) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block text-sm/6 font-medium text-gray-900">Task name</label>
                            <div class="mt-2">
                                <input
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                    type="text"
                                    name="name"
                                    id="name"
                                    value="{{ $task->name }}"
                                    required
                                >
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <div>
                            <label for="description" class="block text-sm/6 font-medium text-gray-900">Task description</label>
                            <div class="mt-2">
                                <textarea
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                    name="description"
                                    id="description"
                                    rows="4"
                                >{{ $task->description }}</textarea>
                            </div>
                        </div>


                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                            <div>
                                <label for="priority" class="block text-sm/6 font-medium text-gray-900">Priority</label>
                                <div class="mt-2 grid grid-cols-1">
                                    <select
                                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        name="priority"
                                        id="priority"
                                        required
                                    >
                                        <option value="low" {{ $task->priority === 'low' ? 'selected' : '' }}>Low</option>
                                        <option value="medium" {{ $task->priority === 'medium' ? 'selected' : '' }}>Medium</option>
                                        <option value="high" {{ $task->priority === 'high' ? 'selected' : '' }}>High</option>
                                    </select>
                                    @error('priority')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div>
                                <label for="status" class="block text-sm/6 font-medium text-gray-900">Status</label>
                                <div class="mt-2 grid grid-cols-1">
                                    <select
                                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        name="status"
                                        id="status"
                                        required
                                    >
                                        <option value="to-do" {{ $task->status === 'to-do' ? 'selected' : '' }}>To-Do</option>
                                        <option value="in progress" {{ $task->status === 'in progress' ? 'selected' : '' }}>In progress</option>
                                        <option value="done" {{ $task->status === 'done' ? 'selected' : '' }}>Done</option>
                                    </select>
                                    @error('status')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div>
                                <label for="due_date" class="block text-sm/6 font-medium text-gray-900">Due date</label>
                                <div class="mt-2">
                                    <input
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        type="date"
                                        name="due_date"
                                        id="due_date"
                                        value="{{ $task->due_date }}"
                                        required
                                    >
                                    @error('due_date')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <button
                            class="px-4 py-2 bg-green-400 rounded shadow text-white"
                            type="submit"
                        >Update Task</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
