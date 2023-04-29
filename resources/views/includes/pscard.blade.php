<div id="postshared" data-post="{{$postcard->id}}" class="card">
    <div class="mainpost">
        <p>{{ $postcard->post }}</p>
        <div class="po-mdi">
            @if($postcard->postvideo)
                <p>
                    <video width="100%" height="240" controls>
                        <source src="{{ $postcard->postvideo ? asset( 'storage/media/' . $postcard->postvideo ) : '' }}" type="video/mp4">
                    Your browser does not support the video tag.
                    </video>
                </p>

             @elseif($postcard->postimage)
                <p><img src="{{ $postcard->postimage ? asset( 'storage/media/' . $postcard->postimage ) : '' }}"></p>
            @endif
        </div>
    </div>

    <div class="mp-icons">
        {{-- Post comment --}}
        @if(Auth::user())
        <div class="mpi-c" data-bs-toggle="modal" data-bs-target="#postcardcomments{{ $postcard->id }}" data-id="{{ $postcard->id }}" id="postcardComment">
            <a href="#"><span class="ic-tx"><i class="fa-regular fa-message {{auth()->check() && $postcard->comments->contains('user_id',auth()->id()) ? 'redHeart' : 'greycolor'}}"></i> <div class="ccount">{{ $postcard->comments()->count() }}</div></span></a>
        </div>
        @else
        <div class="mpi-c" data-bs-toggle="modal" data-bs-target="#postcardcomments{{ $postcard->id }}" data-id="{{ $postcard->id }}" id="postcardComment">
            <a href="#"><span class="ic-tx"><i class="fa-regular fa-message"></i> <div class="ccount">{{ $postcard->comments()->count() }}</div></span></a>
        </div>
        @endif


        {{-- Post like --}}
        <div class="mpi-l">
            @if(Auth::user())
            <span class="ic-tx"> 
                <form id="liking" method="post" action="{{ route('postcard.like', $postcard->id) }}">
                    @csrf
                    <input type="hidden" name="postcard_id" class="postcard_id" value="{{ $postcard->id }}" />
                    <input type="hidden" namae="user_id" class="user_id" value="{{ Auth::user()->id }}" />
                    <input type="hidden" name="like" class="like" value="1" />
                    <button class="lk-send" id="like"><i class="fa fa-thumbs-up {{auth()->check() && $postcard->likes->contains('user_id',auth()->id()) ? 'redHeart' : 'greycolor'}}"></i></button>
                    <div class="ccount">{{$postcard->likes()->where('like' , 1)->count() ?: '0'}}</div>
                </form>
            </span>
            @else
            <span class="ic-tx"> 
                <button class="lk-send" id="like"><i class="fa fa-thumbs-up"></i></button>
                <div class="ccount">{{$postcard->likes()->where('like' , 1)->count() ?: '0'}}</div>
            </span>
            @endif
        </div>

        {{-- vote/like/dislike --}}
        <div class="lw-ld">
            @livewire('like-dislike', [$postcard]) 
        </div>
        
        {{-- Edit & Delete --}}
        @if(Auth::user() == $postcard->user)
            <div class="mpi-e" data-bs-toggle="modal" data-bs-target="#editpostcard{{ $postcard->id }}" data-id="{{ $postcard->id }}" id="editPostcard">
                <a href="#"><span class="ic-tx"><i class="fa-regular fa-edit"></i></span></a>
            </div>
            <div class="mpi-d">
                <span><a href="{{ route('delete.postcard', ['postcard_id' => $postcard->id]) }}"><span class="ic-tx"><i class="fa-regular fa-trash-o"></i></span></a></span>
            </div>
        @endif
        
        {{-- Share --}}
        <div class="mpi-s" data-bs-toggle="modal" data-bs-target="#postcardshare{{ $postcard->id }}" data-id="{{ $postcard->id }}" id="sharePostcard">            
            <span class="ic-tx"><a href="#"><span><img src="{{ asset('img/share-icon.png') }}"></span></a></span>
        </div>

        {{-- Post date --}}
        <div class="mpi-date"><span>{{ $postcard->getTimeAgo($postcard->created_at); }}</span></div>
       
    </div>
    

    {{-- Comment form --}}
    @if(Auth::user())
        <div class="comment-bx">
            <form id="SubmitComment" method="POST" action="{{ route('postcard.comment', $postcard->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="ps-tx">
                    <input id="pcardid" type="hidden" name="postcard_id" value="{{ $postcard->id }}" />
                    <textarea id="comment" class="scroll" style="resize: none" name="body" placeholder="add comment" required></textarea>
                    @error('comment')
                        <p>{{ $body }}</p>
                    @enderror
                </div> 
                
                <button type="submit" class="ps-send"> <i class="fa-regular fa-send-o"></i> </button>
            </form>  
        </div>
    @endif
</div>





