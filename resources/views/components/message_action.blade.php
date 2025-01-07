<div x-data="{ show: false, message: '', type: '' }" x-init="
            @if (session('success'))
                show = true;
                message = '{{ session('success') }}';
                type = 'success';
                setTimeout(() => show = false, 3000);
            @elseif (session('error'))
                show = true;
                message = '{{ session('error') }}';
                type = 'error';
                setTimeout(() => show = false, 3000);
            @elseif ($errors->any())
                    show = true;
                    message = `{!! implode('<br>', $errors->all()) !!}`;
                    type = 'error';
                    setTimeout(() => show = false, 3000);
            @endif
        " x-show="show" x-transition class="fixed top-4 right-4 p-4 rounded-lg shadow-lg" :class="type === 'error' ? 'bg-red-600 text-white' : 'bg-green-600 text-white'">
    <p x-text="message"></p>
</div>