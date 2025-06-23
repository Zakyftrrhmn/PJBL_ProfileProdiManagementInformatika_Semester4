<div class="relative flex flex-col flex-grow bg-white rounded-b-xl">
    <div class="p-4 overflow-y-auto max-h-[45vh] space-y-3" id="chat-history-area">
        @foreach ($chatHistory as $chat)
            @if ($chat['role'] === 'user')
                <div class="flex justify-end">
                    <div class="bg-blue-500 text-white py-2 px-4 rounded-xl max-w-[75%] break-words shadow-md">
                        {{ $chat['content'] }}
                    </div>
                </div>
            @else
                <div class="flex justify-start">
                    <div class="bg-gray-200 text-gray-800 py-2 px-4 rounded-xl max-w-[75%] break-words shadow-md">
                        {!! $chat['content'] !!}
                    </div>
                </div>
            @endif
        @endforeach

        @if ($processing)
            <div class="flex justify-start">
                <div class="bg-gray-200 text-gray-800 py-2 px-4 rounded-xl max-w-[75%] break-words shadow-md">
                    <style>
                        @keyframes dot-flashing {
                            0% { background-color: #3B82F6; }
                            50%, 100% { background-color: rgba(59, 130, 246, 0.2); }
                        }
                        .animate-dot-flashing {
                            animation: dot-flashing 1s infinite alternate;
                        }
                        .animate-dot-flashing.delay-100 {
                            animation-delay: 0.1s;
                        }
                        .animate-dot-flashing.delay-200 {
                            animation-delay: 0.2s;
                        }
                    </style>
                    <span class="inline-block relative w-1.5 h-1.5 rounded-full bg-blue-500 animate-dot-flashing mr-2"></span>
                    <span class="inline-block relative w-1.5 h-1.5 rounded-full bg-blue-500 animate-dot-flashing delay-100 mr-2"></span>
                    <span class="inline-block relative w-1.5 h-1.5 rounded-full bg-blue-500 animate-dot-flashing delay-200"></span>
                    <span class="ml-2">MIPel Bot sedang mengetik...</span>
                </div>
            </div>
        @endif
    </div>

    <script>
        function scrollToBottom() {
            let chatArea = document.getElementById('chat-history-area');
            if (chatArea) {
                chatArea.scrollTop = chatArea.scrollHeight;
            }
        }

        document.addEventListener('livewire:initialized', () => {
            scrollToBottom();
            Livewire.on('messageSent', () => {
                scrollToBottom();
            });
            Livewire.hook('commit', ({ component, succeed, fail }) => {
                succeed(() => {
                    setTimeout(scrollToBottom, 50);
                });
            });
        });

        window.onload = function() {
            scrollToBottom();
        };
    </script>

    <form wire:submit.prevent="sendMessage"
          class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200 bg-white items-center flex z-1000">
        <div class="relative flex-grow">
            <input
                wire:model.live="message"
                type="text"
                id="chat-input"
                placeholder="Ketik Disini ....."
                class="block w-full py-3 px-5 text-gray-900 bg-white border border-gray-300 rounded-full appearance-none focus:outline-none focus:ring-1 focus:ring-blue-600 peer shadow-sm"
                @if($processing) disabled @endif
            >
        </div>
        <button
            type="submit"
            class="ml-2 bg-black text-white p-2.5 rounded-full hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-400 disabled:opacity-50 cursor-pointer transition-colors duration-200 ease-in-out"
            wire:loading.attr="disabled"
            wire:target="sendMessage"
            @if(empty($message) || $processing) disabled @endif
        >
            <svg class="w-5 h-5 transform rotate-45 -mt-0.5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
            </svg>
        </button>
    </form>
</div>