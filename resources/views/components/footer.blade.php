@if (session('status') || session('error'))
    <div id="toast-message" class="fixed bottom-4 right-4 flex items-center p-4 max-w-xs bg-white border rounded-lg shadow-lg transition-transform transform-gpu translate-y-12 opacity-0"
         style="z-index: 9999; transition: all 0.5s ease-in-out;">
        <!-- Icon based on success or error -->
        <div class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-green-100 text-green-500" id="toast-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <!-- Message -->
        <div class="ml-3 text-sm font-semibold text-gray-700" id="toast-message-text">
            {{ session('status') ?? session('error') }}
        </div>

        <!-- Close Button -->
        <button class="ml-auto text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-0" id="toast-close">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toast = document.getElementById('toast-message');
        var toastClose = document.getElementById('toast-close');
        var toastIcon = document.getElementById('toast-icon');

        // Show the toast with animation
        setTimeout(function () {
            toast.classList.remove('translate-y-12', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
        }, 200);

        // Automatically hide the toast after 5 seconds
        setTimeout(function () {
            toast.classList.add('translate-y-12', 'opacity-0');
        }, 5000);

        // Close toast on clicking the close button
        toastClose.addEventListener('click', function () {
            toast.classList.add('translate-y-12', 'opacity-0');
        });

        // Change the icon for error messages
        @if (session('error'))
            toastIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>`;
        toastIcon.classList.remove('bg-green-100', 'text-green-500');
        toastIcon.classList.add('bg-red-100', 'text-red-500');
        @endif
    });
</script>

</div>
</body>

</html>
