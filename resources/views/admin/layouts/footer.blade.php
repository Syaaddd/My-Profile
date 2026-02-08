<footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 py-4 px-6">
    <div class="flex flex-col md:flex-row items-center justify-between">
        <p class="text-sm text-gray-600 dark:text-gray-400">
            © {{ date('Y') }} Portfolio Admin Panel. All rights reserved.
        </p>
        <div class="flex items-center space-x-4 mt-2 md:mt-0">
            <span class="text-sm text-gray-500 dark:text-gray-500">Version 1.0</span>
            <a href="{{ route('home') }}" target="_blank" class="text-sm text-primary-600 dark:text-primary-400 hover:underline">
                Lihat Website
            </a>
        </div>
    </div>
</footer>