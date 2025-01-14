<div>
    <h2>{{ $game->title }}</h2>
    <p>{{ $game->description }}</p>
    <img src="{{ asset('storage/gameCovers/' . $game->cover) }}" alt="{{ $game->title }}" class="img-fluid">

    <!-- Comments Section -->
    <h3>Comments</h3>
    <form wire:submit.prevent="submitComment">
        <div class="form-group">
            <label for="content">Your Comment</label>
            <textarea wire:model="content" id="content" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <select wire:model="rating" class="form-control">
                <option value="">Select Rating</option>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>

    <!-- List of Comments -->
    <div class="mt-4">
        @foreach($game->comments as $comment)
            <div class="card mt-2">
                <div class="card-body">
                    <p>{{ $comment->content }}</p>
                    <strong>{{ $comment->rating }} Stars</strong> - {{ $comment->user->name }}
                </div>
            </div>
        @endforeach
    </div>
</div>

