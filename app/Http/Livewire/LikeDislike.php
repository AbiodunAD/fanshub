<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Postcard;
use Illuminate\Validation\ValidationException;

class LikeDislike extends Component
{
    public Postcard $postcard; 
    public ?Vote $userVote = null; 
    public int $likes = 0; 
    public int $dislikes = 0; 
    public int $lastUserVote = 0; 
 
    public function mount(Postcard $postcard)
    {
        $this->postcard = $postcard;
        $this->userVote = $postcard->userVotes; 
        $this->likes = $postcard->likesCount; 
        $this->dislikes = $postcard->dislikesCount;
        $this->lastUserVote = $this->userVote->vote ?? 0; 
    } 

    public function like()
    {
        $this->validateAccess(); 
        
        if ($this->hasVoted(1)) {
            $this->updateVote(0); 
            return;
        }
 
        $this->updateVote(1);
    }
 
    public function dislike()
    {
        $this->validateAccess(); 

        if ($this->hasVoted(-1)) {
            $this->updateVote(0); 
            return;
        }
 
        $this->updateVote(-1); 
    }

    public function render()
    {
        return view('livewire.like-dislike');
    }

    private function updateVote(int $val)
    {
        if ($this->userVote) {
            $this->post->votes()->update(['user_id' => auth()->id(), 'vote' => $val]);
        } else {
            $this->userVote = $this->post->votes()->create(['user_id' => auth()->id(), 'vote' => $val]);
        }
 
        $this->setLikesAndDislikesCount($val); 

        $this->lastUserVote = $val;
    }

    private function validateAccess()
    {
        throw_if(
            auth()->guest(),
            ValidationException::withMessages(['unauthenticated' => 'You need to <a href="' . route('login') . '" class="underline">login</a> to like/dislike'])
        );
    }

    private function setLikesAndDislikesCount(int $val)
    {
        match (true) {
            $this->lastUserVote === 0 && $val === 1 => $this->likes++,
            $this->lastUserVote === 0 && $val === -1 => $this->dislikes++,
            $this->lastUserVote === 1 && $val === 0 => $this->likes--,
            $this->lastUserVote === -1 && $val === 0 => $this->dislikes--,
            $this->lastUserVote === -1 && $val === 1 => call_user_func(function () {
                $this->dislikes--;
                $this->likes++;
            }),
            $this->lastUserVote === 1 && $val === -1 => call_user_func(function () {
                $this->dislikes++;
                $this->likes--;
            }),
        };
    } 
}
