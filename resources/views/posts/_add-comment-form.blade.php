@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center ">
                <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}"
                     alt="Your avatar or profile picture"
                     width="60"
                     height="60"
                     class="rounded-full"
                >
                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <x-form.textarea name="body" placeholder="Write something here."/>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.button>Submit</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register"
           class="bold hover:underline text-blue-500"
        >
            Register
        </a>
        or
        <a href="/login"
           class="bold hover:underline text-blue-500"
        >
            log in
        </a>
        to leave a comment.
    </p>
@endauth
