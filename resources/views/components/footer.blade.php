@if (session('status') || session('error'))
    <div id="toast-message" class="fixed bottom-4 right-4 flex items-center p-4 max-w-xs border rounded-lg shadow-lg transition-transform transform-gpu translate-y-12 opacity-0"
         style="z-index: 9999; transition: all 0.5s ease-in-out;">
        <!-- Icon based on success or error -->
        <div class="inline-flex items-center justify-center h-8 w-8 rounded-full text-white" id="toast-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <!-- Message -->
        <div class="ml-3 text-sm font-semibold text-white" id="toast-message-text">
            {{ session('status') ?? session('error') }}
        </div>

        <!-- Close Button -->
        <button class="ml-auto text-white hover:text-gray-200 focus:outline-none focus:ring-0" id="toast-close">
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

        // Apply gradient based on success or error
        @if (session('status'))
        toast.classList.add('bg-gradient-to-r', 'from-[#28a745]', 'via-[#218838]', 'to-[#1e7e34]');
        @elseif (session('error'))
        toast.classList.add('bg-gradient-to-r', 'from-[#dc3545]', 'via-[#c82333]', 'to-[#bd2130]');
        toastIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>`;
        @endif

        // Show the toast with animation
        setTimeout(function () {
            toast.classList.remove('translate-y-12', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
        }, 200);

        // Automatically hide the toast after 5 seconds
        setTimeout(function () {
            toast.classList.add('translate-y-full', 'opacity-0');
        }, 5000);

        // Completely hide or remove the toast after the transition (e.g., after 5.5 seconds)
        setTimeout(function () {
            toast.style.display = 'none'; // Optionally: toast.remove(); to completely remove from the DOM
        }, 5500);

        // Close toast on clicking the close button
        toastClose.addEventListener('click', function () {
            toast.classList.add('translate-y-full', 'opacity-0');
            setTimeout(function () {
                toast.style.display = 'none'; // Optionally: toast.remove();
            }, 500); // Match the animation duration
        });
    });
</script>



</div>
</body>

</html>
