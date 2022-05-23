<x-layout>
    <x-setting heading="Manage posts">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                     src="{{ asset('storage/' . $post->thumbnail) }}"
                                                     alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/posts/{{ $post->slug }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/admin/posts/{{ $post->id }}/edit"
                                           class="text-blue-500 hover:text-blue-600"
                                        >
                                            Edit
                                        </a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST"
                                              action="/admin/posts/{{ $post->id }}"
                                              class="mb-0"
                                              x-data="{conf: false, check: false}"
                                              @submit.prevent="if(conf == false) return;$el.submit()"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-xs text-gray-400"
                                                    type="submit"
                                                    @click="
                                                    check = confirm('Are you sure you want to delete: {{ $post->title }}?');
                                                    conf = check;
                                                    "
                                            >
                                                Delete
                                            </button>
                                        </form>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>
