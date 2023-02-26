<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-transparent text-yellow-500 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-auto ml-auto mr-0 py-2 px-5 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900 mt-3']) }}>
    {{ $slot }}
</button>
