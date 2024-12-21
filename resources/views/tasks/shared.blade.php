<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <div class="w-full overflow-hidden bg-white shadow sm:rounded-lg">
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

        </div>
    </div>
</x-guest-layout>
