<div class="space-y-3">
    <form wire:submit.prevent="submitComment">
        <textarea class="w-full rounded-md" wire:model.defer="comment"></textarea>

      <div class="flex justify-between">
       <div class="flex gap-1 items-center">
        <input type="checkbox" wire:model="is_anon" id="is_anon">
        <label for="is_anon">Post Anonymously</label>
        @error('comment') <span>{{ $message }}</span> @enderror
       </div>
       <div class="">
        <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2">Post Comment</button>
       </div>
      </div>
    </form>

    <hr>

    @foreach ($comments as $comment)
        <div class="p-2 bg-white rounded-xl mb-3 space-y-2">
             <div class="">
                @if ($comment->is_anon)
                <small class="font-bold text-sm">Anonymous on <span class="font-bold text-gray-400 text-xs">{{ $comment->created_at->format('m/d/Y H:i:s A') }}</span></small>
                @else
                <small class="font-bold text-sm">Posted by {{ $comment->user->name }} on <span class="font-bold text-gray-400 text-xs">{{ $comment->created_at->format('m/d/Y H:i:s A') }}</span></small>
                @endif
             </div>

            <p class="text-sm">{{ $comment->body }}</p>

        </div>
    @endforeach
</div>
