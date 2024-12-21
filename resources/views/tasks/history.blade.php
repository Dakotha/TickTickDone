<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks History') }}
        </h2>

        <div>
            <x-button class="bg-gray-400 hover:bg-gray-500" href="{{ route('tasks.index') }}">{{ __('Go back') }}</x-button>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


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
